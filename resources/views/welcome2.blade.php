@extends('layouts.app')
@section('style')
<!-- include my style -->
<link rel="stylesheet" type="text/css" href="{{ asset('css/statistics.css') }}">
@endsection
@section('content')
<div class="row">
    <div class="col-lg-3 col-md-4 d-none d-sm-none d-md-block">
        <div class="row">
            <div class="col">
                <div class="list-group p-1">
                    {{-- Newest Charities --}}
                    <a class="list-group-item list-group-item-action active list-group-item-light " aria-current="true">
                        <h5 class='text-gray'>{{ __('Newest Charities') }}</h5>
                    </a>
                    @foreach ($charities as $ch)
                    <a class="list-group-item list-group-item-action px-2" href="{{ route('charities.show', $ch) }}">
                        <img width="40" height="40" src="{{ asset(config('path.ch_logo') . $ch->logo) }}"
                            class="img-fluid border border-wight" alt="Card image cap">
                        @if (app()->getLocale() == 'ar'){{ $ch->name_ar }} @else
                        {{ $ch->name_en }}@endif
                    </a>
                    @endforeach
                </div>

                <div class="list-group p-1">
                    {{-- <Newest Projects> --}}
                    <a class="list-group-item list-group-item-action active list-group-item-light " aria-current="true">
                        <h5 class='text-gray'>{{ __('Newest Projects') }}</h5>
                    </a>
                    @foreach ($projects as $project)
                    <a class="list-group-item list-group-item-action px-2" href="#">
                        <h4>
                            @if (app()->getLocale() == 'ar')
                            {{ $project->title_ar }} @else {{ $project->title_en }}@endif
                        </h4>
                        @if (app()->getLocale() == 'ar'){{ $project->text_ar }}
                        @else {{ $project->text_en }}@endif
                    </a>
                    @endforeach
                </div>

                <div class="list-group p-1">
                    {{-- <Newest Jobs> --}}
                    <a class="list-group-item list-group-item-action active list-group-item-light " aria-current="true">
                        <h5 class='text-gray'>{{ __('Newest Jobs') }}</h5>
                    </a>
                    @foreach ($jobs as $job)
                    <a class="list-group-item list-group-item-action px-2" href="#">
                        <h4>
                            @if (app()->getLocale() == 'ar')
                            {{ $job->job_title_ar }} @else {{ $job->job_title_en }}@endif
                        </h4>
                        @if (app()->getLocale() == 'ar')
                        {{ $job->job_details_ar }}
                        @else {{ $job->job_details_en }}@endif
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    {{-- statistics --}}
    <div class="col-lg-6 d-none d-sm-none d-md-block">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
        <div class="container">
            <div class="row">

                <div class="col">
                    <div class="card-box bg-orange">
                        <div class="inner">
                            <h3> 5464 </h3>
                            <p> {{ __('Affiliate charities') }} </p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-user-plus" aria-hidden="true"></i>
                        </div>
                        <a href="{{ route('search.charities') }}" class="card-box-footer">View More <i
                                class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col">
                    <div class="card-box bg-red">
                        <div class="inner">
                            <h3> 723 </h3>
                            <p> {{ __('Established projects') }} </p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-cogs"></i>
                        </div>
                        <a href="{{ route('search.projects') }}" class="card-box-footer">View More <i
                                class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card-box bg-blue">
                        <div class="inner">
                            <h3> 13436 </h3>
                            <p> {{ __('Shortage materials') }} </p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-search-minus" aria-hidden="true"></i>
                        </div>
                        <a href="{{ route('search.shortages') }}" class="card-box-footer">View More <i
                                class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col">
                    <div class="card-box bg-green">
                        <div class="inner">
                            <h3> ₹185358 </h3>
                            <p> {{ __('Surplus materials') }} </p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-search-plus" aria-hidden="true"></i>
                        </div>
                        <a href="{{ route('search.surpluses') }}" class="card-box-footer">View More <i
                                class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- About the website --}}
    <div class="col-lg-3 col-md-4 d-none d-sm-none d-md-block">
        <a class="list-group-item list-group-item-action  active list-group-item-light " aria-current="true">
            <h5 class='text-gray'>{{ __('About the website') }}</h5>
        </a>
        <a class="list-group-item list-group-item-action px-2">{{ __('about_content1') }}</a>
        <a class="list-group-item list-group-item-action px-2">{{ __('about_content2') }}</a>
        <a class="list-group-item list-group-item-action px-2">{{ __('about_content3') }}</a>



        <div class="card">
            <div class="card-header">
                Featured
            </div>
            <a class="list-group-item list-group-item-action  active list-group-item-light " aria-current="true">
                <h5 class='text-gray'>{{ __('About the website') }}</h5>
            </a>
            <a class="list-group-item list-group-item-action px-2">{{ __('about_content1') }}</a>
            <a class="list-group-item list-group-item-action px-2">{{ __('about_content2') }}</a>
            <a class="list-group-item list-group-item-action px-2">{{ __('about_content3') }}</a>

        </div>
    </div>

</div>
@endsection
