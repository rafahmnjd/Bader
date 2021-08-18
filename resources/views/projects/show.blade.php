@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-9 col-md-8 right-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-2 shadow">
                        <div class="card-body">
                            <div class="col-md-12 grid-margin">
                                <div class="card rounded">
                                    <!-- card-header -->
                                    <div class="card-header">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <div class="ml-2">
                                                    <span>
                                                        <h4>
                                                            @if (config('app.locale') == 'ar')
                                                                {{ $project->title_ar }}
                                                            @else
                                                                {{ $project->title_en }}
                                                            @endif
                                                        </h4>
                                                    </span>
                                                </div>
                                            </div>
                                            <ul class="d-sm-flex my-0">
                                                {{ __('Date of publication') }}: {{ $project->created_at }}
                                            </ul>
                                        </div>
                                    </div>

                                    <!-- card-body -->
                                    <!-- text with image -->
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <div class="ml-2">
                                                    <span>
                                                        <h6 class="mb-3 tx-14">
                                                            {{ __('Belonging to') }} :
                                                            <a href="{{ route('charities.show', $project->charity) }}">
                                                                @if (config('app.locale') == 'ar')
                                                                    {{ $project->charity->name_ar }}
                                                                @else
                                                                    {{ $project->charity->name_en }}
                                                                @endif
                                                            </a>
                                                        </h6>
                                                    </span>
                                                </div>
                                            </div>
                                            <ul class="d-sm-flex my-0">
                                                <div class="card-body">
                                                    <h5>{{ __('State') }} : {{ __($project->state) }}</h5>
                                                </div>

                                            </ul>
                                        </div>
                                        <p>
                                            @if (config('app.locale') == 'ar')
                                                {{ $project->text_ar }}
                                            @else
                                                {{ $project->text_en }}
                                            @endif
                                        </p>
                                        <img class="card-img-bottom"
                                            src="{{ asset(config('path.pro_img') . $project->image) }}" alt=""
                                            style="max-block-size: 25rem">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Newest Projects --}}
        <div class="col-lg-3 col-md-4 order-6 order-lg-12 order-md-6 order-sm-6 mb-1">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-2 shadow">
                        <div class="card-body ">
                            <h5 class="card-title">
                                {{ __('Newest Projects') }}
                            </h5>
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
                                            @if (app()->getLocale() == 'ar')
                                                {{ $project->text_ar }}
                                            @else {{ $project->text_en }}
                                            @endif
                                        </p>
                                    </a>
                                @endforeach
                            </div>
                            @if (app()->getLocale() == 'ar')
                                <a class="@if (app()->getLocale() == 'ar') float-left
                                @else
                                    float-right @endif"
                                    href="{{ route('search.projects') }}">{{ __('View more') }} <i
                                        class="fa fa-arrow-circle-left"></i></a>
                            @else
                                <a class="float-right" href="{{ route('search.projects') }}">{{ __('View more') }} <i
                                        class="fa fa-arrow-circle-right"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
