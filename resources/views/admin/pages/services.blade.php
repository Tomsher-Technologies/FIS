@extends('layouts.admin.app', ['body_class' => '', 'title' => 'Services'])
@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <h1>Services</h1>
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

                        <form id="services_settings"  method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="exampleInputEmail1">Service Type<span class="text-danger">*</span></label>
                                <select name="type" class="form-control  mb-3" onChange="getDataForEdit(this.value)">
                                    <option value="wholesaler">Wholesaler And Retailer</option>
                                    <option value="manufacturer">Manufacturer </option>
                                    <option value="office_stationery">Office Stationery </option>
                                    <option value="import_exports">Import & Exports </option>
                                    <option value="csr_activities">CSR Activities </option>
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
                                <label for="exampleInputEmail1">Description<span class="text-danger">*</span></label>
                                <textarea name="description" id="description" cols="30" rows="10" class="form-control" > </textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Image</label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input"
                                            name="image1" id="image1">
                                        <label class="custom-file-label" for="image1">Choose file</label>
                                       
                                    </div>
                                </div>
                                <div id="current_image1"></div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Sub Content <span class="text-danger">*</span></label>
                                <div wire:ignore>
                                    <textarea name="block_content" id="block_content" cols="30" rows="10" class="form-control" > </textarea>
                                </div> 
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Benefit Title<span class="text-danger">*</span></label>
                                <input type="text" name="heading2" id="heading2" class="form-control" value="" />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Benefit Content<span class="text-danger">*</span></label>
                                <textarea name="content2" id="content2" cols="30" rows="10" class="form-control" > </textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Benefit Image</label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input"
                                            name="image3" id="image3">
                                        <label class="custom-file-label" for="image3">Choose file</label>
                                       
                                    </div>
                                </div>
                                <div id="current_image3"></div>
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
    tinymce.init({
        selector: 'textarea#description',
        height: 300,
    });
    tinymce.init({
        selector: 'textarea#block_content',
        height: 300,
    });
    tinymce.init({
        selector: 'textarea#content2',
        height: 300,
    });

    if ($("#services_settings").length > 0) {    
        $("#services_settings").validate({
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
                description: {
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

                var data = new FormData($('#services_settings')[0]);

                $.ajax({
                    url: "{{ route('admin.page.store-services')}}",
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
        getDataForEdit('wholesaler');
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
                    $('#description').html(returnedData[0].content);
                    $('#block_content').html(returnedData[0].block_content);
                    $('#heading2').val(returnedData[0].heading2);
                    $('#content2').html(returnedData[0].content2);
            
                    $('#seotitle').val(returnedData[0].seo_title);
                    $('#ogtitle').val(returnedData[0].og_title);
                    $('#twtitle').val(returnedData[0].twitter_title);
                    $('#seodescription').val(returnedData[0].seo_description);
                    $('#og_description').val(returnedData[0].og_description);
                    $('#twitter_description').val(returnedData[0].twitter_description);
                    $('#seokeywords').val(returnedData[0].keywords);
                    tinymce.get("description").setContent(returnedData[0].content);
                    tinymce.get("block_content").setContent(returnedData[0].block_content);
                    tinymce.get("content2").setContent(returnedData[0].content2);
                    if(returnedData[0].banner_image != ''){
                       var html = ' <label for="exampleInputEmail1">Current Image</label> <img class="w-20 d-block mb-3" src="'+ returnedData[0].banner_image +' " alt="">';
                       $('#current_image').html(html);
                    }
                    if(returnedData[0].image1 != ''){
                       var html = ' <label for="exampleInputEmail1">Current Image</label> <img class="w-20 d-block mb-3" src="'+ returnedData[0].image1 +' " alt="">';
                       $('#current_image1').html(html);
                    }
                    
                    if(returnedData[0].image3 != ''){
                       var html = ' <label for="exampleInputEmail1">Current Benefit Image</label> <img class="w-20 d-block mb-3" src="'+ returnedData[0].image3 +' " alt="">';
                       $('#current_image3').html(html);
                    }

                }else{
                    $('#banner_title,#seo_url,#banner_sub_title,#title,#heading2,#seotitle,#ogtitle,#twtitle,#seodescription,#og_description,#twitter_description,#seokeywords').val('');
                    $('#description,#block_content,#content2,#current_image,#current_image1,#current_image3').html('');
                    tinymce.get("content2").setContent('');
                    tinymce.get("description").setContent('');
                    tinymce.get("block_content").setContent('');
                }
            }
        });
    }

</script>
@endpush
