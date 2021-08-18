@extends('layouts.app')
@section('style')
    <!-- include my style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/ch_show.css') }}">
    @yield('middstyle')
@endsection
@section('content')
    {{-- <div class="container"> --}}
    <div class="profile-page tx-13">
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="profile-header">
                    <div class="cover">
                        <div class="gray-shade"></div>
                        <figure>
                            <img src="{{ asset(config('path.covers') . $charity->cover) }}" class="img-fluid"
                                style="max-height: 25rem" alt="profile cover">
                        </figure>
                        <div class="cover-body d-flex justify-content-between align-items-center">
                            <div>
                                <img class="profile-pic" src="{{ asset(config('path.ch_logo') . $charity->logo) }}"
                                    alt="profile">
                                <span class="profile-name">
                                    @if (config('app.locale') == 'ar')
                                        {{ $charity->name_ar }}
                                    @else
                                        {{ $charity->name_en }}
                                    @endif
                                </span>
                            </div>

                            <!-- Write a new activity -->
                            @if (Auth::check() && $charity->user_id == Auth::user()->id)
                                <div class="d-none d-md-block">
                                    <button class="btn btn-light btn-icon-text btn-edit-profile">
                                        <a href="@yield('create_href')">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-edit btn-icon-prepend">
                                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                            </svg>
                                            @yield('create_word')
                                        </a>
                                    </button>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="header-links">
                        <ul class="links d-flex align-items-center mt-3 mt-md-0">

                            <!-- Projects -->
                            <li class="header-link-item ml-3 pl-3 border-left d-flex align-items-center @if (!empty($projects)) active @endif">
                                <a class="pt-1px d-none d-md-block"
                                    href="{{ route('charities.projects', $charity) }}">{{ __('Projects') }}</a>
                            </li>
                            <!-- Jobs -->
                            <li class="header-link-item ml-3 pl-3 border-left d-flex align-items-center @if (!empty($jobs)) active @endif">
                                <a class="pt-1px d-none d-md-block"
                                    href="{{ route('charities.jobs', $charity) }}">{{ __('Jobs') }}</a>
                            </li>
                            <!-- Shortage -->
                            <li class="header-link-item ml-3 pl-3 border-left d-flex align-items-center @if (!empty($shortages)) active @endif">
                                <a class="pt-1px d-none d-md-block"
                                    href="{{ route('charities.shortage', $charity) }}">{{ __('Shortages') }}</a>
                            </li>
                            <!-- Surplus -->
                            <li class="header-link-item ml-3 pl-3 border-left d-flex align-items-center @if (!empty($surpluses)) active @endif">
                                <a class="pt-1px d-none d-md-block"
                                    href="{{ route('charities.surplus', $charity) }}">{{ __('Surpluses') }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row profile-body">
            <!-- left wrapper start -->
            <div class="d-none d-md-block col-md-4 col-xl-3 left-wrapper">
                <div class="card rounded">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <h6 class="card-title tx-11 font-weight-bold mb-0">{{ __('About') }}:</h6>
                        </div>
                        <p>
                            @if (config('app.locale') == 'ar')
                                {{ $charity->info_ar }}
                            @else
                                {{ $charity->info_en }}
                            @endif
                        </p>
                        <div class="mt-3">
                            <label class="tx-11 font-weight-bold mb-0 ">{{ __('License') }}:</label>
                            <p class="text-muted">{{ $charity->license }}</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 font-weight-bold mb-0 ">{{ __('Email') }}:</label>
                            <p class="text-muted">{{ $charity->email }}</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 font-weight-bold mb-0 ">{{ __('Phone') }}:</label>
                            <p class="text-muted">{{ $charity->phone }}</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 font-weight-bold mb-0 ">{{ __('Mobile') }}:</label>
                            <p class="text-muted">{{ $charity->mobile }}</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 font-weight-bold mb-0 ">{{ __('Whatsapp') }}:</label>
                            <p class="text-muted">{{ $charity->whatsapp }}</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 font-weight-bold mb-0 ">{{ __('Facebook') }}:</label>
                            <p class="text-muted">{{ $charity->facebook }}</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 font-weight-bold mb-0 ">{{ __('Address') }}:</label>
                            <p class="text-muted">
                                @if (config('app.locale') == 'ar')
                                    {{ $charity->address_ar }}
                                @else
                                    {{ $charity->address_en }}
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- left wrapper end -->
            <!-- middle wrapper start -->
            <div class="col-md-8 col-xl-6 middle-wrapper">
                @yield('middile')
            </div>

            <!-- middle wrapper end -->
            <!-- right wrapper start -->
            {{-- Newest Jobs --}}
            <div class="d-none d-xl-block col-xl-3 right-wrapper">
                <div class="row">
                    <div class="col-md-12">
                        {{-- <div class="card mb-2 shadow ">
                            <div class="card-body ">
                                <h5 class="card-title">{{ __('Newest Jobs') }}
                                </h5>
                                <hr class="mb-0">
                                <div class="list-group list-group-flush">
                                    @foreach ($charity->jobs as $job)
                                        <a class="list-group-item list-group-item-action"
                                            href="{{ route('jobs.show', $job) }}">
                                            <h6 class="font-weight-bold">
                                                @if (app()->getLocale() == 'ar')
                                                {{ $job->job_title_ar }} @else {{ $job->job_title_en }}
                                                @endif
                                            </h6>
                                            <p class="card-text text-truncate">
                                                @if (app()->getLocale() == 'ar')
                                                    {{ $job->job_details_ar }}
                                                @else {{ $job->job_details_en }}@endif
                                            </p>
                                        </a>
                                    @endforeach
                                </div>
                                @if (app()->getLocale() == 'ar')
                                    <a class="@if (app()->getLocale() == 'ar') float-left
                                    @else
                                        float-right @endif"
                                        href="{{ route('search.jobs') }}">{{ __('View more') }} <i
                                            class="fa fa-arrow-circle-left"></i></a>
                                @else
                                    <a class="float-right" href="{{ route('search.jobs') }}">{{ __('View more') }}
                                        <i class="fa fa-arrow-circle-right"></i></a>
                                @endif
                            </div>
                        </div> --}}

                        {{-- Charities --}}
                        {{-- <div class="card shadow mb-2">
                            <div class="card-body">
                                <h5 class="card-title">{{ __('Newest Charities') }}</h5>
                                <hr>
                                <div class="list-group">
                                    @foreach ($charity as $ch)
                                        <a class="list-group-item list-group-item-action border-0 "
                                            href="{{ route('charities.show', $ch) }}">
                                            <div class="row align-items-center">
                                                <div class="col p-0 text-center">
                                                    <img src="{{ asset(config('path.ch_logo') . $ch->logo) }}"
                                                        class="img-fluid px-1" style="max-height: 3rem">
                                                </div>
                                                <div class="col-md-9 col-sm-10 p-0 ">
                                                    @if (app()->getLocale() == 'ar')
                                                    {{ $ch->name_ar }} @else
                                                        {{ $ch->name_en }}@endif
                                                </div>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                                @if (app()->getLocale() == 'ar')
                                    <a class="@if (app()->getLocale() == 'ar') float-left
                                    @else float-right @endif"
                                        href="{{ route('search.charities') }}">{{ __('View more') }} <i
                                            class="fa fa-arrow-circle-left"></i></a>
                                @else
                                    <a class="float-right" href="{{ route('search.charities') }}">{{ __('View more') }}
                                        <i class="fa fa-arrow-circle-right"></i></a>
                                @endif
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
            <!-- right wrapper end -->
        </div>
    </div>
@endsection
