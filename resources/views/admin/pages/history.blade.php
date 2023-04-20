@extends('layouts.admin.app', ['body_class' => '', 'title' => 'History And Evolution'])
@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <h1>History And Evolution</h1>
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

                        <form id="history_settings"  method="POST" enctype="multipart/form-data">
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
                                <label for="exampleInputEmail1">History Details<span class="text-danger">*</span></label>
                                
                                <table class="table table-bordered table-striped" id="user_table">
                                    <thead>
                                       
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Year</label>
                                                    <input type="number" name="year" id="year" class="form-control" value="" />
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Heading</label>
                                                    <input type="text" name="year_heading" id="year_heading" class="form-control" value="" />
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Sub Heading</label>
                                                    <input type="text" name="year_sub_heading" id="year_sub_heading" class="form-control" value="" />
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Content</label>
                                                    <textarea name="year_content" id="year_content" cols="30" rows="10" class="form-control" > </textarea>
                                                </div>
                                            </td>
                                        </tr>
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
<script src="{{ getAdminAsset('tinymce/tinymce.min.js') }}"></script>
<script>
    tinymce.init({
        selector: 'textarea#description',
        height: 300,
    });

    if ($("#history_settings").length > 0) {    
        $("#history_settings").validate({
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

                var data = new FormData($('#history_settings')[0]);

               
                console.log(data);
                $.ajax({
                    url: "{{ route('admin.page.store-history-settings')}}",
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
                        getDataForEdit('history');
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
        getDataForEdit('history');
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

                    var editCount = 1;
                    $.each(returnedData[0].history, function(key,value) {
                        dynamic_field(editCount);
                        editCount++;
                        $('#year_'+(key+1)).val(value.year);
                        $('#year_heading_'+(key+1)).html(value.heading);
                        $('#year_sub_heading_'+(key+1)).html(value.sub_heading);
                        $('#year_content_'+(key+1)).html(value.content);
                    });

                }else{
                    $('#title,#banner_title,#seo_url,#banner_sub_title,#seotitle,#ogtitle,#twtitle,#seodescription,#og_description,#twitter_description,#seokeywords').val('');   
                }
            }
        });
    }


    var count = 1;

    dynamic_field(count);

    function dynamic_field(number)
    {

            html = '<tr>';
            html += '<td><div class="form-group"><label for="exampleInputEmail1">Year</label><input type="number" name="year[]" id="year_'+number+'" class="form-control year" value="" /></div>';
            html += '   <div class="form-group dynamic-sub-heading"> <label for="exampleInputEmail1">Sub Heading</label><textarea name="year_sub_heading[]" id="year_sub_heading_'+number+'" cols="30" rows="4" class="form-control" ></textarea> </div>';
            html += '</td><td>   <div class="form-group"><label for="exampleInputEmail1">Heading</label><textarea  name="year_heading[]" id="year_heading_'+number+'" class="form-control" cols="30" rows="4"></textarea> </div>';
            html += '    <div class="form-group"><label for="exampleInputEmail1">Content</label><textarea name="year_content[]" id="year_content_'+number+'" cols="30" rows="4" class="form-control" > </textarea></div>';
            html += '</td>';
            
            if(number > 1)
            {
                html += '<td><button type="button" name="remove" id="" class="btn btn-danger remove">Remove</button></td></tr>';
                $('tbody').append(html);
            }
            else
            {   
                html += '<td><button type="button" name="add" id="add" class="btn btn-success">Add</button></td></tr>';
                $('tbody').html(html);
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
