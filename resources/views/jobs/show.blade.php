@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-9 col-md-8 right-wrapper">
            <div class="card mb-2 shadow">
                <div class="card-body">
                    {{-- <div class="col-md-12 grid-margin"> --}}
                    <div class="card rounded">
                        <!-- card-header -->
                        <div class="card-header">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <div class="ml-2">
                                        <span>
                                            <h4>
                                                @if (config('app.locale') == 'ar')
                                                    {{ $job->job_title_ar }}
                                                @else
                                                    {{ $job->job_title_en }}
                                                @endif
                                            </h4>
                                        </span>
                                    </div>
                                </div>
                                <ul class="d-sm-flex my-0">
                                    {{ __('Date of publication') }}: {{ $job->created_at }}
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
                                                <a href="{{ route('charities.show', $job->charity) }}">
                                                    @if (config('app.locale') == 'ar')
                                                        {{ $job->charity->name_ar }}
                                                    @else
                                                        {{ $job->charity->name_en }}
                                                    @endif
                                                </a>
                                            </h6>
                                        </span>
                                    </div>
                                </div>
                                <ul class="d-sm-flex my-0">
                                    <div class="card-body">
                                        <h5>{{ __('State') }} : {{ __($job->state) }}</h5>
                                    </div>
                                </ul>
                            </div>
                            <p>
                                @if (config('app.locale') == 'ar')
                                    {{ $job->job_details_ar }}
                                @else
                                    {{ $job->job_details_en }}
                                @endif
                            </p>
                            <div>
                                <p>
                                    @if (config('app.locale') == 'ar')
                                        {{ $job->location_ar }}
                                    @else
                                        {{ $job->location_en }}
                                    @endif
                                </p>
                            </div>
                            <form action="{{ route('jobReqs.store', $job) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <label>{{ __('Upload CV') }} : </label>
                                <input type="file" name="cv" class="form-control" required>
                                <br>
                                <button class="btn btn-primary @if (config('app.locale')=='ar' ) float-left @else float-right @endif">{{ __('Submit') }}</button>
                            </form>
                        </div>
                    </div>
                    {{-- </div> --}}
                </div>
            </div>
        </div>

        {{-- Newest Jobs --}}
        <div class="col-lg-3 col-md-4 order-6 order-lg-12 order-md-6 order-sm-6 mb-1">
            <div class="card mb-2 shadow ">
                <div class="card-body ">
                    <h5 class="card-title">{{ __('Newest Jobs') }}
                    </h5>
                    <hr class="mb-0">
                    <div class="list-group list-group-flush">
                        @foreach ($jobs as $job)
                            <a class="list-group-item list-group-item-action" href="{{ route('jobs.show', $job) }}">
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
                            float-right @endif" href="{{ route('search.jobs') }}">{{ __('View more') }}
                            <i class="fa fa-arrow-circle-left"></i></a>
                    @else
                        <a class="float-right" href="{{ route('search.jobs') }}">{{ __('View more') }}
                            <i class="fa fa-arrow-circle-right"></i></a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
