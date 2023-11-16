@extends('layouts.admin.app', ['body_class' => '', 'title' => 'Team Members'])
@section('content')

    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <h1>Team Members</h1>
                <div class="text-zero top-right-button-container">
                    <a href="{{ route('admin.page.team-member-create') }}" class="btn btn-primary btn-lg top-right-button mr-1">CREATE NEW MEMBER</a>
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
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                    <table class="table" id="teamtable">
                        <thead>
                            <tr>
                                <th class="">#</th>
                                <th class="">Name</th>
                                <th class="">Designation</th>
                                <th class="">Type</th>
                                <th class="">Status</th>
                                <th class="">Created At</th>
                                <th class="">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($teams)
                                @php $i=0; @endphp
                                @foreach($teams as $team)
                                    @php $i++; @endphp
                                    <tr id="row_{{ $team->id }}">
                                        <td>{{ $i }}</td>
                                        <td> {{ $team->name }}</td>
                                        <td> {{ $team->designation }}</td>
                                        <td> 
                                            @if($team->type == 'director')
                                               <span class=""> Board Of Director </span>
                                            @else
                                                <span class=""> Management </span>
                                            @endif
                                           
                                        </td>
                                        <td> 
                                            @if($team->status == 1)
                                               <span class="badge badge-success"> Enabled </span>
                                            @else
                                                <span class="badge badge-danger"> Disabled </span>
                                            @endif
                                           
                                        </td>
                                        <td> {{ \Carbon\Carbon::parse($team->created_at)->format('d/m/Y H:i')}}</td>
                                        <td>
                                            <a class="btn btn-info" href="{{ route('admin.page.member-edit', $team->id) }}">
                                                <i class="fa fa-edit"></i> Edit
                                            </a>
                                            <a class="btn btn-danger delete_team" href="#" id="" data-id="{{ $team->id }}" onClick="deleteTeam({{ $team->id }})">
                                                <i class="fa fa-trash"></i> Delete
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>                  
@endsection
@push('header')
<link rel="stylesheet"  href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
@endpush
@push('footer')
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#teamtable').DataTable();
    } );

    
    function deleteTeam(id){
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
                    url: "{{ route('admin.page.delete-member')}}",
                    type: "POST",
                    data: 'id='+ id,
                    success: function( response ) {
                        $('#row_'+id).css('display','none');
                        Swal.fire(
                            'Deleted!',
                            'Member has been deleted.',
                            'success'
                        );
                    }
                });
            } 
            
        })
    }

    
 </script>
@endpush