@extends('layouts.admin.app', ['body_class' => '', 'title' => 'Packaging'])
@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <h1>Packaging</h1>
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

                        <form id="package_settings"  method="POST" enctype="multipart/form-data">
                            @csrf

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
                                <label for="exampleInputEmail1">Steps</label>
                                
                                <table class="table table-bordered table-striped" >
                                    <thead>
                                       
                                    </thead>
                                    <tbody id="steps_table">
                                       
                                    </tbody>
                                </table>
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

<script>

    if ($("#awards_settings").length > 0) {    
        $("#awards_settings").validate({
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
                }
            },
           
            submitHandler: function(e) {
                
                $.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $('#submit').html('Please Wait...');
                $("#submit"). attr("disabled", true);

                var data = new FormData($('#awards_settings')[0]);
                $.ajax({
                    url: "{{ route('admin.page.store-package-settings')}}",
                    type: "POST",
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function( response ) {
                        $('#submit').html('Submit');
                        $("#submit"). attr("disabled", false);
                        
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Successfully Saved',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        getDataForEdit('package');
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
        getDataForEdit('package');
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

                    var editCount = 1;
                    $.each(returnedData[0].packages, function(key,value) {
                        dynamic_field(editCount);
                        editCount++;
                        $('#package_title_'+(key+1)).val(value.title);
                        $('#package_content_'+(key+1)).html(value.content);
                    });

                }else{
                    $('#banner_title,#seo_url,#banner_sub_title,#seotitle,#ogtitle,#twtitle,#seodescription,#og_description,#twitter_description,#seokeywords').val('');   
                }
            }
        });
    }


    var count = 1;

    dynamic_field(count);

    function dynamic_field(number)
    {

            html = '<tr>';
            html += '<td><div class="form-group"><label for="exampleInputEmail1">Title</label><input type="text" name="package_title[]" id="package_title_'+number+'" class="form-control year" value="" /></div>';
            html += '   <div class="form-group"> <label for="exampleInputEmail1">Content</label><textarea name="package_content[]" id="package_content_'+number+'" cols="40" rows="4" class="form-control" ></textarea> </div>';
            html += '</td>';
            
            if(number > 1)
            {
                html += '<td><button type="button" name="remove" id="" class="btn btn-danger remove">Remove</button></td></tr>';
                $('#steps_table').append(html);
            }
            else
            {   
                html += '<td><button type="button" name="add" id="add" class="btn btn-success">Add</button></td></tr>';
                $('#steps_table').html(html);
            }
        
    }

    $(document).on('click', '#add', function(){
        count++;
        dynamic_field(count);
    });

    $(document).on('click', '.remove', function(){
        count--;
        $(this).closest("tr").remove();
    });

</script>
@endpush
