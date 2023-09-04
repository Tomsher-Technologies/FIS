@extends('layouts.admin.app', ['body_class' => '', 'title' => 'Team Members'])
@section('content')

    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <h1>Product Enquiries</h1>
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
                    <div class="">
                        <!-- <h3> Filters </h3> -->
                        <form class="" id="classes" action="" method="GET" autocomplete="off">
                            
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="#">Search By Product SKU</label>
                                    <input type="text" class="form-control" value="{{ $sku_search }}" id="sku" name="sku" placeholder="Enter Product SKU">
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="#">Search By Name/Email/Phone/Company</label>
                                    <input type="text" class="form-control" value="{{ $title_search }}" id="title_search" name="title_search" placeholder="Enter Name/Email/Phone/Company">
                                </div>

                                <div class="form-group col-md-2">
                                    <label for="#">Date</label>
                                    <input type="text" class="form-control" value="{{ $date_search }}" id="date_search" name="date_search" placeholder="YYYY-MM-DD" >
                                </div>

                                <div class="form-group col-md-3 filterDiv">
                                    <button type="submit" class="btn btn-primary">Filter</button>
                                    <a href="{{ route('admin.product-enquiries') }}"  class="btn btn-info">Reset</a>
                                </div>
                            </div>
                        </form>
                    </div>

                        <table class="table table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">Sl. No</th>
                                    <th scope="col" class="text-center">Product SKU</th>
                                    <th scope="col">Name</th>
                                    <th scope="col" class="text-center">Email</th>
                                    <th scope="col" class="text-center">Phone</th>
                                    <th scope="col" class="text-center">Company</th>
                                    <th scope="col" class="w-30">Message</th>
                                    <th scope="col" class="text-center">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($enquiries[0]))
                                    @foreach($enquiries as $key => $enc)
                                        <tr>
                                            <td class="text-center">{{ $key + 1 + ($enquiries->currentPage() - 1) * $enquiries->perPage() }}</td>
                                            <td class="text-center">{{ $enc->product_sku }}</td>
                                            <td>{{ $enc->name }}</td>
                                            <td class="text-center">{{ $enc->email }}</td>
                                            <td class="text-center">{{ $enc->phone }}</td>
                                            <td class="text-center">{{ $enc->company }}</td>
                                            <td>{{ $enc->content }}</td>
                                            <td class="text-center">{{ \Carbon\Carbon::parse($enc->created_at)->format('d/m/Y')}} </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="7" class="text-center">No data found.</td>
                                    </tr>
                                @endif

                            </tbody>
                        </table>
                        <div class="aiz-pagination float-right">
                            {{ $enquiries->appends(request()->input())->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>                  
@endsection
@push('header')

<link rel="stylesheet" href="{{ getAdminAsset('css/vendor/bootstrap-datepicker3.min.css') }}" />
@endpush
@push('footer')
<script src="{{ getAdminAsset('js/vendor/bootstrap-datepicker.js') }}"></script>
<script>
    $(document).ready(function() {
        // $('#teamtable').DataTable();
       
        $('#date_search').datepicker({
            format: "yyyy-mm-dd",
            autoclose: true
        });
    } );

    
   
 </script>
@endpush