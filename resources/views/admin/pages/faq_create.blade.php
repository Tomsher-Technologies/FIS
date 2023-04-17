@extends('layouts.admin.app', ['body_class' => '', 'title' => 'Privacy Policy & Terms and Conditions'])
@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <h1> @if(isset($faq['id'])) Edit FAQ  @else  Create FAQ  @endif</h1>
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
                    @php $title = $desc =  $id = '';  @endphp
                    @if($faq)
                        @php 
                            $title = $faq['title'];
                            $desc = $faq['description'];
                            $id = $faq['id'];
                        @endphp
                    @endif
                        <form id="add_faq" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Title<span class="text-danger">*</span></label>
                                <input type="text" name="title" id="title" class="form-control" value="{{ $title }}" />
                                <input type="hidden" name="faq_id" id="faq_id" class="form-control" value="{{ $id }}" />
                            </div>
                            
                            <div class="form-group">
                                <label for="exampleInputEmail1">Description<span class="text-danger">*</span></label>
                                <div wire:ignore>
                                    <textarea name="description" id="description" cols="30" rows="10" class="form-control" > {{ $desc }}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Status</label>
                              
                                <select wire:model="status" name="status" class="form-control mb-3">
                                    <option value="1" {{ ($faq) ? ($faq["status"]  == 1 ? "selected" : "" )  : '' }}>  Enabled </option>
                                    <option value="0" {{ ($faq) ? ($faq["status"] == 0 ? "selected" : "" ) : ''  }}  > Disabled </option>
                                </select>
                            </div>

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
   

    if ($("#add_faq").length > 0) {
        $("#add_faq").validate({
            rules: {
                title: {
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
                var formdata = $('#add_faq').serializeArray();
                formdata.push({name: 'description', value: tinyMCE.get('description').getContent()});
                $.ajax({
                    url: "{{ route('admin.page.store-faq')}}",
                    type: "POST",
                    data: formdata,
                    success: function( response ) {
                        $('#submit').html('Submit');
                        $("#submit"). attr("disabled", false);
                        if($("#faq_id").val() ==''){
                            $("#add_faq")[0].reset();
                        }
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
    
   
</script>
@endpush
