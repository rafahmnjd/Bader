@extends('layouts.app')
@section('style')
    <!-- include my style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/proReqs.css') }}">
@endsection
@section('content')

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="{{ asset(config('path.ch_logo') . $project->charity->logo) }}" alt="Admin"
                                class="rounded-circle" width="150">
                            <div class="mt-3 r">
                                <h4>
                                    @if (config('app.locale') == 'ar')
                                        {{ $project->charity->name_ar }}
                                    @else
                                        {{ $project->charity->name_en }}
                                    @endif
                                </h4>
                                <p class="text-secondary mb-1 text-center">
                                    @if (config('app.locale') == 'ar')
                                        {{ $project->charity->info_ar }}
                                    @else
                                        {{ $project->charity->info_en }}
                                    @endif
                                </p>
                                <button class="btn btn-outline-primary text-center">
                                    <a href="{{ route('charities.show', $project->charity) }}">
                                        {{ __('Show Page') }}
                                    </a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mt-3">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-globe mr-2 icon-inline">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="2" y1="12" x2="22" y2="12"></line>
                                    <path
                                        d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z">
                                    </path>
                                </svg>{{ __('Email') }}</h6>
                            <span class="text-secondary">{{ $project->charity->email }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-github mr-2 icon-inline">
                                    <path fill-rule="evenodd"
                                        d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511zM15.854.146a.5.5 0 0 1 0 .708L11.707 5H14.5a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5v-4a.5.5 0 0 1 1 0v2.793L15.146.146a.5.5 0 0 1 .708 0z" />
                                </svg>{{ __('Phone') }}</h6>
                            <span class="text-secondary">{{ $project->charity->phone }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="bi bi-phone">
                                    <path
                                        d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h6zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z" />
                                    <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                                </svg>{{ __('Mobile') }}</h6>
                            <span class="text-secondary">{{ $project->charity->mobile }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="bi bi-house">
                                    <path fill-rule="evenodd"
                                        d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                                    <path fill-rule="evenodd"
                                        d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                                </svg>{{ __('Address') }}</h6>
                            <span class="text-secondary">
                                @if (config('app.locale') == 'ar')
                                    {{ $project->charity->address_ar }}
                                @else
                                    {{ $project->charity->address_en }}
                                @endif
                            </span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-md-8">
                <div class="media g-mb-30 media-comment">
                    <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">
                        <div class="g-mb-15">
                            <h5 class="h5 g-color-gray-dark-v1 mb-0">
                                @if (config('app.locale') == 'ar')
                                    {{ $project->title_ar }}
                                @else
                                    {{ $project->title_en }}
                                @endif
                            </h5>
                            <span class="g-color-gray-dark-v4 g-font-size-12">{{ $project->created_at }}</span>
                        </div>

                        <p>
                            @if (config('app.locale') == 'ar')
                                {{ $project->text_ar }}
                            @else
                                {{ $project->text_en }}
                            @endif
                        </p>

                        <h3>{{ __('Project Requirments') }}:</h3>

                        @foreach ($projReqs as $projReq)
                            <p>
                                @if (config('app.locale') == 'ar')
                                    {{ $projReq->name_ar }}
                                @else
                                    {{ $projReq->name_en }}
                                @endif
                            </p>
                            <p>
                                @if (config('app.locale') == 'ar')
                                    {{ $projReq->details_ar }} - {{ __('Need') }}({{ number_format($projReq->quantity) }})
                                @else
                                    {{ $projReq->details_en }} - {{ __('Need') }}({{ number_format($projReq->quantity )}})
                                @endif
                            </p>

                            <ul class="list-inline d-sm-flex my-0">
                                <li class="list-inline-item ml-auto">
                                    <button class="btn btn-light btn-icon-text btn-edit-profile">
                                        <a href="#">
                                            {{ __('Fill') }}
                                        </a>
                                    </button>
                                    <button class="btn btn-light btn-icon-text btn-edit-profile">
                                        <a href="#">
                                            {{ __('Message') }}
                                        </a>
                                    </button>
                                </li>
                            </ul>
                            <hr>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
