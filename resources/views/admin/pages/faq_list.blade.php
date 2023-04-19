@extends('layouts.admin.app', ['body_class' => '', 'title' => 'Help & FAQ'])
@section('content')

    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <h1>Help & FAQ</h1>
                <div class="text-zero top-right-button-container">
                <a href="{{ route('admin.page.faq-settings') }}" class="btn btn-primary btn-lg top-right-button mr-1">FAQ Settings</a>
                    <a href="{{ route('admin.page.faq-create') }}" class="btn btn-primary btn-lg top-right-button mr-1">CREATE NEW FAQ</a>
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

                    <table class="table" id="faqtable">
                        <thead>
                            <tr>
                                <th class="">#</th>
                                <th class="">Title</th>
                                <th class="">Status</th>
                                <th class="">Created At</th>
                                <th class="">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($faqs)
                                @php $i=0; @endphp
                                @foreach($faqs as $faq)
                                    @php $i++; @endphp
                                    <tr id="row_{{ $faq->id }}">
                                        <td>{{ $i }}</td>
                                        <td> {{ $faq->title }}</td>
                                        <td> 
                                            @if($faq->status == 1)
                                               <span class="success"> Enabled </span>
                                            @else
                                                <span class="error"> Disabled </span>
                                            @endif
                                            <!-- <input type="checkbox" id="switch" onChange="changeStatus({{ $faq->status }}, {{ $faq->id }})" name="some-switch" @if($faq->status == '1') checked  @else ''  @endif>
                                            <label class="switch-label" for="switch"></label> -->
                                        </td>
                                        <td> {{ \Carbon\Carbon::parse($faq->created_at)->format('d/m/Y H:i')}}</td>
                                        <td>
                                            <a class="btn btn-info" href="{{ route('admin.page.faq-edit', $faq->id) }}">
                                                <i class="fa fa-edit"></i> Edit
                                            </a>
                                            <a class="btn btn-danger delete_faq" href="#" id="" data-id="{{ $faq->id }}" onClick="deleteFaq({{ $faq->id }})">
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
        $('#faqtable').DataTable();
    } );

    
    function deleteFaq(id){
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
                    url: "{{ route('admin.page.delete-faq')}}",
                    type: "POST",
                    data: 'id='+ id,
                    success: function( response ) {
                        $('#row_'+id).css('display','none');
                        Swal.fire(
                            'Deleted!',
                            'FAQ has been deleted.',
                            'success'
                        );
                    }
                });
            } 
            
        })
    }

    function changeStatus(status,faqid){
        alert(status);
        alert(faqid);
        Swal.fire({
            title: 'Are you sure?',
            text: "Do you want to change the status?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes!'
        }).then(function(result) {
            if (result.isConfirmed) {
                var data = []
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{ route('admin.page.change-faq-status')}}",
                    type: "POST",
                    data: {  status: status, id:faqid },
                    success: function( response ) {
                        Swal.fire(
                            'Status changed successfully',
                            '',
                            'success'
                        );
                    }
                });
            } 
            
        })
    }
 
 </script>
@endpush