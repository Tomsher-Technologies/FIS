@extends('layouts.admin.app', ['body_class' => '', 'title' => 'Board Of Directors & Management'])
@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <h1>Board Of Directors & Management</h1>
                <div class="separator mb-5"></div>
            </div>
        </div>

        <div class="rpw">
            <div class="col-12">
                <x-status />
            </div>
        </div>

        <div class="row">
            <div class="col-8 offset-2">
                <div class="card">
                    <div class="card-body">

                        <form id="directors"  method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="exampleInputEmail1">Type<span class="text-danger">*</span></label>
                                <select name="type" class="form-control  mb-3" onChange="getDataForEdit(this.value)">
                                    <option value="directors">Board Of Directors</option>
                                    <option value="management">Management </option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Banner Title<span class="text-danger">*</span></label>
                                <input name="banner_title" id="banner_title" class="form-control" />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">SEO URL<span class="text-danger">*</span></label>
                                <input name="seo_url" id="seo_url" class="form-control" />
                            </div>
                            
                            <div class="form-group">
                                <label for="exampleInputEmail1">Banner Sub Title<span class="text-danger">*</span></label>
                                <input name="banner_sub_title" id="banner_sub_title" class="form-control" />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Banner Image </label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input"
                                            name="image" id="image">
                                        <label class="custom-file-label" for="image">Choose file</label>
                                       
                                    </div>
                                </div>
                                <div id="current_image"></div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Title<span class="text-danger">*</span></label>
                                <input type="text" name="title" id="title" class="form-control" value="" />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Sub Title<span class="text-danger">*</span></label>
                                <input type="text" name="sub_title" id="sub_title" class="form-control" value="" />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Careers Content<span class="text-danger">*</span></label>
                                <textarea name="careers" id="careers"  cols="30" rows="3" class="form-control" > </textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Latest News Content<span class="text-danger">*</span></label>
                                <textarea name="latest_news" id="latest_news" cols="30" rows="3" class="form-control" > </textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Contact Content<span class="text-danger">*</span></label>
                                <textarea name="contact_content" id="contact_content" cols="30" rows="3" class="form-control" > </textarea>
                            </div>

                            @include('admin.common.seo_form')

                            <button type="submit"  onclick="tinyMCE.triggerSave(true,true);"  class="btn btn-primary mb-0" id='submit'>Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>                  
@endsection

@push('footer')
<script src="{{ getAdminAsset('tinymce/tinymce.min.js') }}"></script>
<script>
    if ($("#directors").length > 0) {    
        $("#directors").validate({
            rules: {
                banner_title: {
                    required: true
                },
                seo_url: {
                    required: true
                },  
                banner_sub_title: {
                    required: true
                },    
                title: {
                    required: true
                },
                sub_title: {
                    required: true
                }, 
                careers: {
                    required: true
                }, 
                latest_news: {
                    required: true
                }, 
                contact_content: {
                    required: true
                }, 
            },
            messages: {
                banner_title: {
                    required: "Please enter a Banner Title"
                },
                seo_url: {
                    required: "SEO URL is required"
                },
                banner_sub_title: {
                    required: "Please enter a Banner Sub Title"
                },  
                title: {
                    required: "Please enter a Title"
                },
                description: {
                    required: "Please enter Description"
                }, 
            },
           
            submitHandler: function(e) {
                
                $.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $('#submit').html('Please Wait...');
                $("#submit"). attr("disabled", true);

                var data = new FormData($('#directors')[0]);
              
                $.ajax({
                    url: "{{ route('admin.page.store-directors')}}",
                    type: "POST",
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function( response ) {
                        var returnedData = JSON.parse(response);
                        $('#submit').html('Submit');
                        $("#submit"). attr("disabled", false);
                        
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Successfully Saved',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        getDataForEdit(returnedData.type);
                    }
                });
            }
        })
    }
    $('#banner_title').keyup(function() {
        $slug = slugify($(this).val());
        $('#seo_url').val($slug);
    });

    setTimeout(function(){
        getDataForEdit('directors');
    }, 500);

    
    function getDataForEdit(type){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{ route('admin.page.get-data')}}",
            type: "POST",
            data: 'type='+ type,
            success: function( response ) {
                var returnedData = JSON.parse(response);
                if(returnedData[0]){
                    $('#banner_title').val(returnedData[0].banner_text);
                    $('#seo_url').val(returnedData[0].seo_url);
                    $('#banner_sub_title').val(returnedData[0].banner_content);
                    $('#title').val(returnedData[0].heading);
                   
                    $('#sub_title').val(returnedData[0].sub_heading);
                    $('#contact_content').html(returnedData[0].contact_content.content);
                    $('#careers').html(returnedData[0].career_content.content);
                    $('#latest_news').html(returnedData[0].latest_news.content);
                    
            
                    $('#seotitle').val(returnedData[0].seo_title);
                    $('#ogtitle').val(returnedData[0].og_title);
                    $('#twtitle').val(returnedData[0].twitter_title);
                    $('#seodescription').val(returnedData[0].seo_description);
                    $('#og_description').val(returnedData[0].og_description);
                    $('#twitter_description').val(returnedData[0].twitter_description);
                    $('#seokeywords').val(returnedData[0].keywords);
            
                    if(returnedData[0].banner_image != ''){
                       var html = ' <label for="exampleInputEmail1">Current Image</label> <img class="w-20 d-block mb-3" src="'+ returnedData[0].banner_image +' " alt="">';
                       $('#current_image').html(html);
                    }

                }else{
                    $('#sub_title,#banner_title,#seo_url,#banner_sub_title,#title,#heading2,#seotitle,#ogtitle,#twtitle,#seodescription,#og_description,#twitter_description,#seokeywords').val('');
                    $('#contact_content,#careers,#latest_news').html('');
                    $('#current_image').html('');
                }
            }
        });
    }
    
</script>
@endpush
