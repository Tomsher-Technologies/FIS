@extends('layouts.admin.app', ['body_class' => '', 'title' => 'Privacy Policy & Terms and Conditions'])
@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <h1> @if(isset($member['id'])) Edit Member  @else  Create Member  @endif</h1>
                <div class="text-zero top-right-button-container">
                    <a href="{{ route('admin.page.teams') }}" class="btn btn-primary btn-lg top-right-button mr-1">Go Back To List</a>
                </div>
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
                    @php $name = $designation =  $id = $image = $oldimage = '' ;  @endphp
                    @if($member)
                        @php 
                            $name = $member['name'];
                            $designation = $member['designation'];
                            $id = $member['id'];
                            $oldimage = $member['image'];
                            $image = Storage::url('teams/'. $member['image']);
                        @endphp
                    @endif
                        <form id="add_member" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Member Type<span class="text-danger">*</span></label>
                                <select name="type" class="form-control  mb-3">
                                    <!-- <option value="director">Board Of Director</option> -->
                                    <option value="management">Management </option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Name<span class="text-danger">*</span></label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ $name }}" />
                                <input type="hidden" name="member_id" id="member_id" class="form-control" value="{{ $id }}" />
                                <input type="hidden" name="oldimage" id="oldimage" class="form-control" value="{{ $oldimage }}" />
                            </div>
                            
                            <div class="form-group">
                                <label for="exampleInputEmail1">Designation<span class="text-danger">*</span></label>
                                <input type="text" name="designation" id="designation" class="form-control" value="{{ $designation }}" />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Image </label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input"
                                            name="image" id="image">
                                        <label class="custom-file-label" for="image">Choose file</label>
                                       
                                    </div>
                                </div>
                                @if(isset($member['image']) && $member['image'] != NULL)
                                <div id="current_image">
                                    <label for="exampleInputEmail1">Current Image</label> 
                                    <img class="w-20 d-block mb-3" src="{{ $image }}" alt="">
                                </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Status</label>
                              
                                <select wire:model="status" name="status" class="form-control mb-3">
                                    <option value="1" {{ ($member) ? ($member["status"]  == 1 ? "selected" : "" )  : '' }}>  Enabled </option>
                                    <option value="0" {{ ($member) ? ($member["status"] == 0 ? "selected" : "" ) : ''  }}  > Disabled </option>
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
        selector: 'textarea#designation',
        height: 400,
    });
   

    if ($("#add_member").length > 0) {
        $("#add_member").validate({
            rules: {
                name: {
                    required: true
                },
                designation: {
                    required: true
                },      
            },
            messages: {
                name: {
                    required: "Please enter a Name"
                },
                designation: {
                    required: "Please enter Designation"
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
                var formdata = new FormData($('#add_member')[0]);
            
                $.ajax({
                    url: "{{ route('admin.page.store-member')}}",
                    type: "POST",
                    data: formdata,
                    processData: false,
                    contentType: false,
                    success: function( response ) {
                        var returnedData = JSON.parse(response);
                        $('#submit').html('Submit');
                        $("#submit"). attr("disabled", false);
                        $('.custom-file-label').html('Choose file');
                        if($("#member_id").val() ==''){
                            $("#add_member")[0].reset();
                        }else{
                            var html = ' <label for="exampleInputEmail1">Current Image</label> <img class="w-20 d-block mb-3" src="'+ returnedData.image +' " alt="">';
                            $('#current_image').html(html);
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
