@extends('layouts.admin.app', ['body_class' => '', 'title' => 'Mission And Vision'])
@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <h1>Mission & Vision</h1>
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

                        <form id="mission_settings"  method="POST" enctype="multipart/form-data">
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
                                <label for="exampleInputEmail1">Description<span class="text-danger">*</span></label>
                                <textarea name="description" id="description" cols="30" rows="10" class="form-control" > </textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Vision<span class="text-danger">*</span></label>
                                <textarea name="vision" id="vision" cols="30" rows="4" class="form-control" > </textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Mission<span class="text-danger">*</span></label>
                                <textarea name="mission" id="mission" cols="30" rows="4" class="form-control" > </textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Mid Image </label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input"
                                            name="mid_image" id="mid_image">
                                        <label class="custom-file-label" for="mid_image">Choose file</label>
                                       
                                    </div>
                                </div>
                                <div id="current_mid_image"></div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Heading<span class="text-danger">*</span></label>
                                <input type="text" name="heading2" id="heading2" class="form-control" value="" />
                            </div>
                            <h3>Mission and vision</h3>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Title<span class="text-danger">*</span></label>
                                <input type="text" name="title1" id="title1" class="form-control" value="" />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Content<span class="text-danger">*</span></label>
                                <input type="text" name="content1" id="content1" class="form-control" value="" />
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
                            <h3>Our Challenges</h3>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Title<span class="text-danger">*</span></label>
                                <input type="text" name="title2" id="title2" class="form-control" value="" />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Content<span class="text-danger">*</span></label>
                                <input type="text" name="content2" id="content2" class="form-control" value="" />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Image</label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input"
                                            name="image2" id="image2">
                                        <label class="custom-file-label" for="image2">Choose file</label>
                                       
                                    </div>
                                </div>
                                <div id="current_image2"></div>
                            </div>
                            <h3>Our Team</h3>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Title<span class="text-danger">*</span></label>
                                <input type="text" name="title3" id="title3" class="form-control" value="" />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Content<span class="text-danger">*</span></label>
                                <input type="text" name="content3" id="content3" class="form-control" value="" />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Image</label>
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

    if ($("#mission_settings").length > 0) {    
        $("#mission_settings").validate({
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
                vision: {
                    required: true
                },
                mission: {
                    required: true
                }, 
                heading2: {
                    required: true
                }, 
                title1: {
                    required: true
                }, 
                content1: {
                    required: true
                }, 
                title2: {
                    required: true
                }, 
                content2: {
                    required: true
                },
                title3: {
                    required: true
                }, 
                content3: {
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

                var data = new FormData($('#mission_settings')[0]);

                $.ajax({
                    url: "{{ route('admin.page.store-mission-vision')}}",
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
                        getDataForEdit('mission_vision');
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
        getDataForEdit('mission_vision');
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
                    $('#vision').html(returnedData[0].vision.content);
                    $('#mission').html(returnedData[0].mission.content);
                    $('#heading2').val(returnedData[0].heading2);
                    $('#title1').val(returnedData[0].mission_vision.value);
                    $('#content1').val(returnedData[0].mission_vision.content);
                    $('#title2').val(returnedData[0].challenges.value);
                    $('#content2').val(returnedData[0].challenges.content);
                    $('#title3').val(returnedData[0].our_team.value);
                    $('#content3').val(returnedData[0].our_team.content);
            
                    $('#seotitle').val(returnedData[0].seo_title);
                    $('#ogtitle').val(returnedData[0].og_title);
                    $('#twtitle').val(returnedData[0].twitter_title);
                    $('#seodescription').val(returnedData[0].seo_description);
                    $('#og_description').val(returnedData[0].og_description);
                    $('#twitter_description').val(returnedData[0].twitter_description);
                    $('#seokeywords').val(returnedData[0].keywords);
                    tinymce.get("description").setContent(returnedData[0].content);
                    if(returnedData[0].banner_image != ''){
                       var html = ' <label for="exampleInputEmail1">Current Image</label> <img class="w-20 d-block mb-3" src="'+ returnedData[0].banner_image +' " alt="">';
                       $('#current_image').html(html);
                    }
                    if(returnedData[0].image != ''){
                       var html = ' <label for="exampleInputEmail1">Current Mid Image</label> <img class="w-20 d-block mb-3" src="'+ returnedData[0].image +' " alt="">';
                       $('#current_mid_image').html(html);
                    }
                    if(returnedData[0].mission_vision.image != ''){
                       var html = ' <label for="exampleInputEmail1">Current Image</label> <img class="w-20 d-block mb-3" src="'+ returnedData[0].mission_vision.image +' " alt="">';
                       $('#current_image1').html(html);
                    }
                    if(returnedData[0].challenges.image != ''){
                       var html = ' <label for="exampleInputEmail1">Current Image</label> <img class="w-20 d-block mb-3" src="'+ returnedData[0].challenges.image +' " alt="">';
                       $('#current_image2').html(html);
                    }
                    if(returnedData[0].our_team.image != ''){
                       var html = ' <label for="exampleInputEmail1">Current Image</label> <img class="w-20 d-block mb-3" src="'+ returnedData[0].our_team.image +' " alt="">';
                       $('#current_image3').html(html);
                    }

                }else{
                    $('#title,#banner_title,#seo_url,#banner_sub_title,#seotitle,#ogtitle,#twtitle,#seodescription,#og_description,#twitter_description,#seokeywords').val('');   
                }
            }
        });
    }

</script>
@endpush
