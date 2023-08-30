@extends('layouts.admin.app', ['body_class' => '', 'title' => 'Team Members'])
@section('content')

    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <h1>All Enquiries</h1>
                <div class="text-zero top-right-button-container">
                  
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
                                <th class="">Email</th>
                                <th class="">Phone</th>
                                <th class="">Subject</th>
                                <th class="" style="width:40% !important;">Message</th>
                                <th class="">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($enquiries)
                                @php $i=0; @endphp
                                @foreach($enquiries as $team)
                                    @php $i++; @endphp
                                    <tr id="row_{{ $team->id }}">
                                        <td>{{ $i }}</td>
                                        <td> {{ $team->name }}</td>
                                        <td> {{ $team->email }}</td>
                                        <td> 
                                        {{ $team->phone }}
                                           
                                        </td>
                                        <td> 
                                        {{ $team->subject }}
                                        </td>
                                        <td> 
                                        {{ $team->message }}
                                        </td>
                                        <td> {{ \Carbon\Carbon::parse($team->created_at)->format('d/m/Y H:i')}}</td>
                                       
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

    
   
 </script>
@endpush