@extends('layouts.app')
@section('style')
    <!-- include my style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/search.css') }}">
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 card-margin">
                <div class="card search-form">
                    <div class="card-body p-0">
                        <form id="search-form" method="POST" action="@yield('search_form_action')">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="input-group row mx-0">
                                        <div class="col-1 px-0">
                                            <button type="submit" class="btn btn-base">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search">
                                                    <circle cx="11" cy="11" r="8"></circle>
                                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                                </svg>
                                            </button>
                                        </div>
                                        <input type="text" placeholder="{{ __('Search...') }}" class="col form-control" id="search" name="data">
                                        <div class="col-2 px-0">
                                            <button class="btn btn-outline-wight dropdown-toggle" type="button" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                @yield('search_class')
                                            </button>
                                            <div class="dropdown-menu">
                                                   <a class="dropdown-item" href="{{ route('search.charities') }}">{{ __('Charities') }}</a>
                                                   <a class="dropdown-item" href="{{ route('search.projects') }}">{{ __('Projects') }}</a>
                                                   <a class="dropdown-item" href="{{ route('search.jobs') }}">{{ __('Jobs') }}</a>
                                                   <a class="dropdown-item" href="{{ route('search.shortages') }}">{{ __('Shortages') }}</a>
                                                   <a class="dropdown-item" href="{{ route('search.surpluses') }}">{{ __('Surpluses') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card card-margin">
                    <div class="card-body">
                        <div class="row search-body">
                            <div class="col-lg-12">
                                <div class="search-result">
                                    <div class="result-header">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                {{-- <div class="records">Showing: <b>1-20</b> of <b>200</b> result</div> --}}
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="result-actions">
                                                    <div class="result-sorting">
                                                        <span>Sort By:</span>
                                                        <select class="form-control border-0" id="exampleOption">
                                                            <option value="1">Relevance</option>
                                                            <option value="2">Names (A-Z)</option>
                                                            <option value="3">Names (Z-A)</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                     @yield('search_middile')
                                </div>
                            </div>
                        </div>
                        <nav class="d-flex justify-content-center">
                            @yield('search_pagination')
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
