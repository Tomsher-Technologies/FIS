@extends('layouts.admin.app', ['body_class' => '', 'title' => 'About Us'])
@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <h1>About Us Settings</h1>
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

                        <form id="about_settings"  method="POST" enctype="multipart/form-data">
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
                                <label for="exampleInputEmail1">Title<span class="text-danger">*</span></label>
                                <input type="text" name="title" id="title" class="form-control" value="" />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Sub Title<span class="text-danger">*</span></label>
                                <input type="text" name="sub_title" id="sub_title" class="form-control" value="" />
                            </div>
                            
                            <div class="form-group">
                                <label for="exampleInputEmail1">Description<span class="text-danger">*</span></label>
                                <textarea name="description" id="description" cols="30" rows="10" class="form-control" > </textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Block Content<span class="text-danger">*</span></label>
                                <textarea name="block_content" id="block_content" cols="30" rows="10" class="form-control" > </textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Image 1</label>
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
                                <label for="exampleInputEmail1">Image 2</label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input"
                                            name="image2" id="image2">
                                        <label class="custom-file-label" for="image2">Choose file</label>
                                       
                                    </div>
                                </div>
                                <div id="current_image2"></div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Image 3</label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input"
                                            name="image3" id="image3">
                                        <label class="custom-file-label" for="image3">Choose file</label>
                                       
                                    </div>
                                </div>
                                <div id="current_image3"></div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Established In UAE<span class="text-danger">*</span></label>
                                <input type="text" name="established" id="established" class="form-control" value="" />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Title 2<span class="text-danger">*</span></label>
                                <input type="text" name="heading2" id="heading2" class="form-control" value="" />
                            </div>
                            
                            <div class="form-group">
                                <label for="exampleInputEmail1">Description 2 <span class="text-danger">*</span></label>
                                <div wire:ignore>
                                    <textarea name="content2" id="content2" cols="30" rows="10" class="form-control" > </textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Products</label>
                                <input type="number" name="happy_clients" id="happy_clients" class="form-control" value="" />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Years of experience</label>
                                <input type="number" name="skilled_experts" id="skilled_experts" class="form-control" value="" />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Showrooms</label>
                                <input type="number" name="finished_projects" id="finished_projects" class="form-control" value="" />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Factories</label>
                                <input type="number" name="media_posts" id="media_posts" class="form-control" value="" />
                            </div>
                            
                            @include('admin.common.seo_form')

                            <button type="submit" onclick="tinyMCE.triggerSave(true,true);" class="btn btn-primary mb-0" id='submit'>Save</button>
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

    if ($("#about_settings").length > 0) {
        $("#about_settings").validate({
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
                description: {
                    required: true
                }, 
                block_content: {
                    required: true
                }, 
                established: {
                    required: true
                }, 
                heading2: {
                    required: true
                },
                content2: {
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
            },
           
            submitHandler: function(e) {
                
                $.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $('#submit').html('Please Wait...');
                $("#submit"). attr("disabled", true);
               
                var data = new FormData($('#about_settings')[0]);
            
                $.ajax({
                    url: "{{ route('admin.page.store-about-settings')}}",
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
                        getDataForEdit('about_us');
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
        getDataForEdit('about_us');
    }, 1000);
    
    
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

                    $('#title').val(returnedData[0].heading);
                    $('#sub_title').val(returnedData[0].sub_heading);
                    $('#established').val(returnedData[0].established);
                    $('#heading2').val(returnedData[0].heading2);
                    $('#happy_clients').val(returnedData[0].happy_clients);
                    $('#skilled_experts').val(returnedData[0].skilled_experts);
                    $('#finished_projects').val(returnedData[0].finished_projects);
                    $('#media_posts').val(returnedData[0].media_posts);

                    tinymce.get("description").setContent(returnedData[0].content);
                    tinymce.get("block_content").setContent(returnedData[0].block_content);
                    tinymce.get("content2").setContent(returnedData[0].content2);
                    if(returnedData[0].banner_image != ''){
                       var html = ' <label for="exampleInputEmail1">Current Banner Image</label> <img class="w-20 d-block mb-3" src="'+ returnedData[0].banner_image +' " alt="">';
                       $('#current_image').html(html);
                    }
                    if(returnedData[0].image1 != ''){
                       var html = ' <label for="exampleInputEmail1">Current Image1</label> <img class="w-20 d-block mb-3" src="'+ returnedData[0].image1 +' " alt="">';
                       $('#current_image1').html(html);
                    }
                    if(returnedData[0].image2 != ''){
                       var html = ' <label for="exampleInputEmail1">Current Image2</label> <img class="w-20 d-block mb-3" src="'+ returnedData[0].image2 +' " alt="">';
                       $('#current_image2').html(html);
                    }
                    if(returnedData[0].image3 != ''){
                       var html = ' <label for="exampleInputEmail1">Current Image3</label> <img class="w-20 d-block mb-3" src="'+ returnedData[0].image3 +' " alt="">';
                       $('#current_image3').html(html);
                    }
                }else{
                    $('#banner_title,#seo_url,#banner_sub_title,#seotitle,#ogtitle,#twtitle,#seodescription,#og_description,#twitter_description,#seokeywords').val('');
                    $('#about_settings')[0].reset();
                }
            }
        });
    }
</script>
@endpush
