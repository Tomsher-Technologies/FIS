@extends('layouts.admin.app',['body_class'=>'','title'=>'Users'])
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Users</h1>
                <div class="text-zero top-right-button-container">
                    <a href="{{ route('admin.users.create') }}" class="btn btn-primary btn-lg top-right-button mr-1">ADD NEW
                        USER</a>
                </div>
                <div class="separator mb-5"></div>
            </div>
        </div>

        <div class="rpw">
            <div class="col-12">
                <x-status />
                <x-errors />
            </div>
        </div>

        <div class="row">
            @if ($users)
                <div class="col-lg-12 col-md-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">No:</th>
                                        <th scope="col">User Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr id="row_{{$user->id}}">
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            
                                            <td>{!! $user->status ? "<span class='badge badge-success'>Enabled</span>":"<span class='badge badge-danger'>Disabled</span>" !!}</td>
                                            <td>
                                                
                                                <a href="{{ route('admin.users.edit', $user) }}"
                                                    class="btn btn-secondary mb-1">Edit</a>
                                                @if($user->id != 1)
                                                    <a class="btn btn-danger delete_faq" href="#" id="" data-id="{{ $user->id }}" onClick="deleteUser({{ $user->id }})">
                                                    <i class="fa fa-trash"></i> Delete
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection

@push('footer')
<script >
function deleteUser(id){
        Swal.fire({
            title: 'Are you sure?',
            text: "It will permanently deleted !",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then(function(result) {
            if (result.isConfirmed) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{ route('admin.delete-user')}}",
                    type: "POST",
                    data: 'id='+ id,
                    success: function( response ) {
                        $('#row_'+id).css('display','none');
                        Swal.fire(
                            'Deleted!',
                            'User has been deleted.',
                            'success'
                        );
                    }
                });
            } 
            
        })
    }
</script>
@endpush
