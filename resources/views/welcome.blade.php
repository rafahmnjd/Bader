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
{{-- @section('bodyTag')
onload="resetSelection()"
@endsection --}}
@section('content')
<div class="row">

    {{-- first column --}}
    <div class="col-lg-3 col-md-12 order-12 order-lg-1 order-md-12 order-sm-12 my-1">
        <div class="row">
            {{-- Newest Projects --}}
            <div class="col-lg-12 col-md-6 col-sm-12 my-1">
                <div class="card my-2 shadow">
                    <div class="card-body ">
                        <h5 class="card-title">{{ __('Newest Projects') }} <small
                                class="@if (app()->getLocale() == 'ar')float-left @else float-right @endif">
                                <span>{{$counts["proj"]}}</span> <small>{{__('of projects')}}</small>
                            </small></h5>
                        <hr class="my-0">

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
            <div class="col-lg-12 col-md-6 col-sm-12 my-1">

                <div class="card my-2 shadow">
                    <div class="card-body ">
                        <h5 class="card-title">{{ __('Newest Jobs') }}<small
                                class="@if (app()->getLocale() == 'ar')float-left @else float-right @endif">
                                <span>{{$counts["job"]}}</span><small> {{__('of jobs')}}</small></small>
                        </h5>
                        <hr class="my-0">
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
    <div class="col-lg-6 col-md-8 order-1 order-lg-4 order-md-4 order-sm-1 my-1">
        {{-- statistics --}}
        <div class="row">
            <div class="col-md-4 my-1 px-2">
                <div class="card-box my-2 bg-primary shadow">
                    <div class="inner">
                        <h3>{{$counts["volun"]}}</h3>
                        <p class="text-left"> {{ __('of Volunteers') }} </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user-plus" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-4  my-1 px-2">
                <div class="card-box my-2 bg-red shadow">
                    <div class="inner">
                        <h3> {{$counts["benef"]}} </h3>
                        <p class="text-left"> {{ __('of Benefactores') }} </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-heartbeat"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-4 my-1 px-2">
                <div class="card-box my-2 themYellow shadow">
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
            <div class="col-md-6 col-sm-6 my-1 px-2">
                <div class="card shadow my-2">
                    <div class="card-body">
                        <h5 class="card-title">{{__('Closed Shortages')}}</h5>
                        <p class="card-text text-gray m-0">
                            <span class="px-1 @if(app()->getLocale() == 'ar') float-left @else float-right @endif"
                                dir="ltr">
                                {{$completed["short"]}} /{{$counts["short"]}}
                            </span>
                        </p>
                        <br>
                        <div class="progress" style="height: 5px;">
                            <div class="progress-bar bg-success" role="progressbar"
                                style="width:{{$percents["short"]}}%" aria-valuenow="{{$percents["short"]}}"
                                aria-valuemin="0" aria-valuemax="100">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 my-1 px-2">
                <div class="card shadow my-2">
                    <div class="card-body">
                        <h5 class="card-title">{{__('Complited Projects')}}</h5>
                        <p
                            class="card-text @if(app()->getLocale() == 'ar') float-left @else float-right @endif text-gray m-0">
                            <span class="px-1" dir="ltr">{{$completed["proj"]}} / {{$counts["proj"]}}</span>
                        </p>
                        <br>
                        <div class="progress" style="height: 5px;">
                            <div class="progress-bar bg-info" role="progressbar" style="width:{{$percents["proj"]}}%"
                                aria-valuenow="{{$percents["proj"]}}" aria-valuemin="0" aria-valuemax="100">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 my-1 px-2">
                <div class="card shadow my-2">
                    <div class="card-body">
                        <canvas id="itemByGov"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-12 my-1 px-2 ">
                <div class="card shadow my-2">
                    <div class="card-body">
                        <canvas id="chByGov"></canvas>
                    </div>
                </div>
            </div>

        </div>
    </div>

    {{-- third column--}}
    <div class="col-lg-3 col-md-4 order-6 order-lg-12 order-md-6 order-sm-6 my-1">
        {{-- Charities --}}
        <div class="card shadow my-2">
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
@section('script')
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/chart.min.js')}}"
    integrity="sha512-asxKqQghC1oBShyhiBwA+YgotaSYKxGP1rcSYTDrB0U6DxwlJjU59B67U8+5/++uFjcuVM8Hh5cokLjZlhm3Vg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $(document).ready(function () {
            var ctx = $('#chByGov');
            var jslabels = [];
            var chval = [];
            var itemByGov=$('#itemByGov');
            var colors = [
                // 'rgba(255, 0, 0, 0.4)',
                'rgba(255, 0, 93, 0.25)',
                'rgba(255, 0, 191, 0.25)',
                'rgba(204, 0, 255, 0.25)',
                'rgba(102, 0, 255, 0.25)',
                'rgba(0, 34, 255, 0.25)',
                'rgba(0, 119, 255, 0.25)',
                'rgba(0, 187, 255, 0.25)',
                'rgba(0, 255, 247, 0.25)',
                'rgba(0, 255, 140, 0.25)',
                'rgba(0, 255, 30, 0.25)',
                'rgba(178, 255, 0, 0.25)',
                'rgba(255, 225, 0, 0.25)',
                'rgba(255, 140, 0, 0.25)',
                'rgba(255, 55, 0, 0.25)',
            ];
            var borderColors =[
                // 'rgba(255, 0, 0, 1)',
                'rgba(255, 0, 93, 0.5)',
                'rgba(255, 0, 191, 0.5)',
                'rgba(204, 0, 255, 0.5)',
                'rgba(102, 0, 255, 0.5)',
                'rgba(0, 34, 255, 0.5)',
                'rgba(0, 119, 255, 0.5)',
                'rgba(0, 187, 255, 0.5)',
                'rgba(0, 255, 247, 0.5)',
                'rgba(0, 255, 140, 0.5)',
                'rgba(0, 255, 30, 0.5)',
                'rgba(178, 255, 0, 0.5)',
                'rgba(255, 225, 0, 0.5)',
                'rgba(255, 140, 0, 0.5)',
                'rgba(255, 55, 0, 0.5)',
            ];

            @foreach ($ch_gov_Chart as $ch)
                jslabels.push("{!! $ch->name_ar !!}");
                chval.push("{!!$ch->val!!}");
            @endforeach
            var chByGov = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    // labels:labels
                    labels: jslabels,
                    datasets: [{
                        label: "charties count",
                        // data: val,
                        data: chval,
                        backgroundColor:colors,
                        borderColor:borderColors,
                        borderWidth: 1
                    }]
                },
                options: {
                    plugins: {
                        legend: {
                            display: true,
                            position:'left',
                        }
                    }
                }
            });

            var itemdata = {
                labels: jslabels,
                datasets: [
                    @for($i=0; $i < count($item_gov_chart) ; $i++) {
                        <?php $lindex=$item_gov_chart[$i]->item_name;?>
                        label:"{!! $lindex !!}",
                        data:[<?php
                                $firstId=$item_gov_chart[$i]->gov_id;
                                for($j=1;$j<$firstId;$j++){
                                    echo("0,");
                                }
                                echo($item_gov_chart[$i]->val.",");
                                $firstId = $firstId+1;
                                $i=$i+1;
                                // console("{!! $i !!}");
                                while($i<count($item_gov_chart) && $lindex==$item_gov_chart[$i]->item_name){
                                    for($j=$firstId;$j<$item_gov_chart[$i]->gov_id;$j++){ echo("0,"); }
                                      $firstId = $item_gov_chart[$i]->gov_id;
                                       echo($item_gov_chart[$i]->val);
                                    echo(",");
                                        $firstId=$firstId+1;
                                        $i+=1;
                                }
                                $i-=1;
                                for($j=$firstId;$j<=14;$j++){
                                    echo("0,");
                                }?>
                            ],
                        backgroundColor:[colors[{!!$i!!}]],
                        borderColor:[borderColors[{!!$i!!}]],
                        borderWidth: 1
                    },
                    @endfor
                ],
            };

            var myChart = new Chart(itemByGov, {
                type: 'bar',
                data: itemdata,
                options: {
                    title: {
                                display: true,
                                text: 'Custom Chart Title'
                    }
                }
            });
        });
</script>
@endsection
