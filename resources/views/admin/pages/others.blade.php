@extends('layouts.admin.app', ['body_class' => '', 'title' => 'Other Pages'])
@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <h1>Other Page Settings</h1>
                
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

                        <form id="other_settings"  method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Page Type<span class="text-danger">*</span></label>
                                <select name="type" class="form-control  mb-3" onChange="getDataForEdit(this.value)">
                                    <option value="agencies">Agencies</option>
                                    <option value="news">News </option>
                                    <option value="brands">Brands </option>
                                    <option value="careers">Careers </option>
                                    <!-- <option value="materials">Materials </option> -->
                                    <option value="media_center">Media Center </option>
                                    <option value="product_catalogue">Product Catalogues </option>
                                    <option value="agencies_catalogue">Agencies Catalogues </option>
                                    <option value="store_location">Store Location </option>
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
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" name="title" id="title" class="form-control" value="" />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Sub Title</label>
                                <input type="text" name="sub_title" id="sub_title" class="form-control" value="" />
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

<script>

    if ($("#other_settings").length > 0) {
        $("#other_settings").validate({
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

                var data = new FormData($('#other_settings')[0]);

                $.ajax({
                    url: "{{ route('admin.page.store-other-settings')}}",
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
        getDataForEdit('agencies');
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
                    $('#banner_title,#seo_url,#banner_sub_title,#seotitle,#ogtitle,#twtitle,#seodescription,#og_description,#twitter_description,#seokeywords').val('');
                   
                }
            }
        });
    }
</script>
@endpush
