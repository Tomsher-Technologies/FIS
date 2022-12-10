@extends('layouts.admin.app', ['body_class' => '', 'title' => 'Search'])
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Search</h1>
                <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                    <ol class="breadcrumb pt-0">
                        <li class="breadcrumb-item active" aria-current="page">Showing {{ $searchResults->count() }} results.</li>
                    </ol>
                </nav>
                <div class="separator mb-5"></div>
            </div>
            <div class="col-lg-12 col-xl-12">
                @foreach ($searchResults->groupByType() as $type => $modelSearchResults)
                    <h2>{{ ucfirst($type) }}</h2>

                    @foreach ($modelSearchResults as $searchResult)
                        <ul>
                            <li><a href="{{ $searchResult->url }}">{{ $searchResult->title }}</a></li>
                        </ul>
                    @endforeach
                @endforeach
            </div>
        </div>

    </div>
@endsection


@push('header')
@endpush
