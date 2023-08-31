@extends('layouts.admin.app', ['body_class' => '', 'title' => 'Contact Us'])
@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <h1>Contact Us</h1>
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

                        <form id="contact_us" enctype="multipart/form-data">
                            @csrf
                           
                            <div class="form-group">
                                <label for="exampleInputEmail1">Title<span class="text-danger">*</span></label>
                                <input name="title" id="title" class="form-control" />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">SEO URL<span class="text-danger">*</span></label>
                                <input name="seo_url" id="seo_url" class="form-control" />
                            </div>
                            
                            <div class="form-group">
                                <label for="exampleInputEmail1">Sub Title<span class="text-danger">*</span></label>
                                <input name="sub_title" id="sub_title" class="form-control" />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Heading</label>
                                <input name="heading2" id="heading2" class="form-control" />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Description<span class="text-danger">*</span></label>
                                <div wire:ignore>
                                    <textarea name="description" id="description" cols="30" rows="10" class="form-control" ></textarea>
                                </div>
                            </div>

                            @include('admin.common.seo_form')

                            <button type="submit" class="btn btn-primary mb-0" id='submit'>Save</button>
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
        height: 400,
    });
   

    if ($("#contact_us").length > 0) {
        $("#contact_us").validate({
            rules: {
                title: {
                    required: true
                },
                seo_url: {
                    required: true
                },  
                sub_title: {
                    required: true
                },
                description: {
                    required: true
                },      
            },
            messages: {
                title: {
                    required: "Please enter a Title"
                },
                seo_url: {
                    required: "SEO URL is required"
                },
                sub_title: {
                    required: "Please enter a Sub Title"
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
                var formdata = $('#contact_us').serializeArray();
                formdata.push({name: 'description', value: tinyMCE.get('description').getContent()});
                $.ajax({
                    url: "{{ route('admin.page.store-contact')}}",
                    type: "POST",
                    data: formdata,
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
                    }
                });
            }
        })
    }
    $('#title').keyup(function() {
        $slug = slugify($(this).val());
        $('#seo_url').val($slug);
    });

    setTimeout(function(){
        getDataForEdit('contact');
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
                    $('#title').val(returnedData[0].heading);
                    $('#seo_url').val(returnedData[0].seo_url);
                    $('#sub_title').val(returnedData[0].sub_heading);
                    tinymce.get("description").setContent(returnedData[0].content);
                    $('#heading2').val(returnedData[0].heading2);
                    $('#seotitle').val(returnedData[0].seo_title);
                    $('#ogtitle').val(returnedData[0].og_title);
                    $('#twtitle').val(returnedData[0].twitter_title);
                    $('#seodescription').val(returnedData[0].seo_description);
                    $('#og_description').val(returnedData[0].og_description);
                    $('#twitter_description').val(returnedData[0].twitter_description);
                    $('#seokeywords').val(returnedData[0].keywords);
                }else{
                    $('#title,#seo_url,#sub_title,#seotitle,#ogtitle,#twtitle,#seodescription,#og_description,#twitter_description,#seokeywords').val('');
                   
                }
            }
        });
    }
</script>
@endpush
