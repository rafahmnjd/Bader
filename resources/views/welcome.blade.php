@extends('layouts.app')
@section('style')
<style>
    .image-parent {
        max-width: 20%;
    }
</style>
<link rel="stylesheet" href="{{asset('css/statistics.css')}}">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
@endsection
@section('bodyTag')
onload="resetSelection()"
@endsection
@section('content')
<div class="row">
    {{-- first column --}}
    <div class="col-lg-3 col-md-12 order-12 order-lg-1 order-md-12 order-sm-12 mb-1">
        <div class="row">
            {{-- Newest Projects --}}
            <div class="col-lg-12 col-md-6 col-sm-12 mb-1">
                <div class="card mb-2 shadow">
                    <div class="card-body ">
                        <h5 class="card-title">{{ __('Newest Projects') }} <small
                                class="@if (app()->getLocale() == 'ar')float-left @else float-right @endif">
                                <span>{{$counts["proj"]}}</span> <small>{{__('of projects')}}</small>
                            </small></h5>
                        <hr class="mb-0">

                        <div class="list-group list-group-flush ">
                            @foreach ($projects as $project)
                            <a class="list-group-item list-group-item-action px-0"
                                href="{{ route('projects.show', $project) }}">
                                <h6 class="font-weight-bold">
                                    @if (app()->getLocale() == 'ar')
                                    {{ $project->title_ar }} @else {{ $project->title_en }}@endif
                                </h6>
                                <p class="card-text text-truncate">
                                    @if (app()->getLocale() == 'ar'){{ $project->text_ar }}
                                    @else {{ $project->text_en }}
                                    @endif
                                </p>
                            </a>
                            @endforeach
                        </div>
                        @if (app()->getLocale() == 'ar')
                        <a class="@if(app()->getLocale() == 'ar') float-left @else float-right @endif"
                            href="{{ route('search.projects') }}">{{__('View more')}} <i
                                class="fa fa-arrow-circle-left"></i></a>
                        @else
                        <a class="float-right" href="{{ route('search.projects') }}">{{__('View more')}} <i
                                class="fa fa-arrow-circle-right"></i></a>@endif
                    </div>
                </div>
            </div>
            {{-- Newest Jobs --}}
            <div class="col-lg-12 col-md-6 col-sm-12 mb-1">

                <div class="card mb-2 shadow">
                    <div class="card-body ">
                        <h5 class="card-title">{{ __('Newest Jobs') }}<small
                                class="@if (app()->getLocale() == 'ar')float-left @else float-right @endif">
                                <span>{{$counts["job"]}}</span><small> {{__('of jobs')}}</small></small>
                        </h5>
                        <hr class="mb-0">
                        <div class="list-group list-group-flush">
                            @foreach ($jobs as $job)
                            <a class="list-group-item list-group-item-action" href="{{ route('jobs.show', $job) }}">
                                <h6 class="font-weight-bold">
                                    @if (app()->getLocale() == 'ar')
                                    {{ $job->job_title_ar }} @else {{ $job->job_title_en }}@endif
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
                        <a class="@if(app()->getLocale() == 'ar') float-left @else float-right @endif"
                            href="{{ route('search.jobs') }}">{{__('View more')}} <i
                                class="fa fa-arrow-circle-left"></i></a>
                        @else
                        <a class="float-right" href="{{ route('search.jobs') }}">{{__('View more')}} <i
                                class="fa fa-arrow-circle-right"></i></a>@endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- second column --}}
    <div class="col-lg-6 col-md-8 order-1 order-lg-4 order-md-4 order-sm-1 mb-1">
        {{-- statistics --}}
        <div class="row">
            <div class="col-md-4 mb-1 px-2">
                <div class="card-box bg-primary shadow">
                    <div class="inner">
                        <h3>{{$counts["volun"]}}</h3>
                        <p class="text-left"> {{ __('of Volunteers') }} </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user-plus" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-1 px-2">
                <div class="card-box bg-red shadow">
                    <div class="inner">
                        <h3> {{$counts["benef"]}} </h3>
                        <p class="text-left"> {{ __('of Benefactores') }} </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-heartbeat"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-1 px-2">
                <div class="card-box bg-green">
                    <div class="inner">
                        <h3> {{$counts["ch"]}} </h3>
                        <p class="text-left"> {{ __('of Charities') }} </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-home" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-6 mb-1 px-2">

                <div class="card shadow mb-2">
                    <div class="card-body">
                        <h6 class="card-title">{{__('Closed Shortages')}}</h6>
                        <p class="card-text text-gray m-0">
                            <span class="px-1 @if(app()->getLocale() == 'ar') float-left @else float-right @endif"
                                dir="ltr">
                                {{$completed["short"]}} /{{$counts["short"]}}
                            </span>
                        </p>
                        <br>
                        <div class="progress" style="height: 5px;">
                            <div class="progress-bar bg-success" role="progressbar"
                                style="width:{{$percents["short"]}}%"
                                aria-valuenow="{{$percents["short"]}}" aria-valuemin="0"
                                aria-valuemax="100">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 mb-1 px-2">
                <div class="card shadow mb-2">
                    <div class="card-body">
                        <h6 class="card-title">{{__('Complited Projects')}}</h6>
                        <p
                            class="card-text @if(app()->getLocale() == 'ar') float-left @else float-right @endif text-gray m-0">
                            <span class="px-1" dir="ltr">{{$completed["proj"]}} / {{$counts["proj"]}}</span>
                        </p>
                        <br>
                        <div class="progress" style="height: 5px;">
                            <div class="progress-bar bg-info" role="progressbar"
                                style="width:{{$percents["proj"]}}%"
                                aria-valuenow="{{$percents["proj"]}}" aria-valuemin="0"
                                aria-valuemax="100">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- third column--}}
    <div class="col-lg-3 col-md-4 order-6 order-lg-12 order-md-6 order-sm-6 mb-1">
        {{-- Charities --}}
        <div class="card shadow mb-2">
            <div class="card-body">
                <h5 class="card-title">{{__('Newest Charities')}}</h5>
                {{-- <p class="card-text"><small>{{__('charity _count',['num'=>$chCount])}}</small></p> --}}
                <hr>

                <div class="list-group">
                    @foreach ($charities as $ch)
                    <a class="list-group-item list-group-item-action border-0 "
                        href="{{ route('charities.show', $ch) }}">
                        <div class="row align-items-center">
                            <div class="col p-0 text-center">
                                <img src="{{ asset(config('path.ch_logo') . $ch->logo) }}" class="img-fluid px-1"
                                    style="max-height: 3rem">
                            </div>
                            <div class="col-md-9 col-sm-10 p-0 ">
                                @if (app()->getLocale() == 'ar'){{ $ch->name_ar }} @else
                                {{ $ch->name_en }}@endif
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
                @if (app()->getLocale() == 'ar')
                <a class="@if(app()->getLocale() == 'ar') float-left @else float-right @endif"
                    href="{{ route('search.charities') }}">{{__('View more')}} <i
                        class="fa fa-arrow-circle-left"></i></a>
                @else
                <a class="float-right" href="{{ route('search.charities') }}">{{__('View more')}} <i
                        class="fa fa-arrow-circle-right"></i></a>@endif
            </div>
        </div>
    </div>
</div>
@endsection
