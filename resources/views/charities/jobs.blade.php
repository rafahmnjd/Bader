@extends('charities.layout')
@section('create_href', route('jobs.create'))
@section('create_word', __('Add a new job'))
@section('middile')
    <div class="row">
        @foreach ($jobs as $job)
            <div class="col-md-12 grid-margin">
                <div class="card rounded">
                    <!-- card-header -->
                    <div class="card-header">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <div class="ml-2">
                                    <img class="img-xs rounded-circle"
                                        src="{{ asset(config('path.ch_logo') . $charity->logo) }}" alt="">
                                    <span>
                                        @if (config('app.locale') == 'ar')
                                            {{ $charity->name_ar }}
                                        @else
                                            {{ $charity->name_en }}
                                        @endif
                                    </span>
                                </div>
                            </div>

                            <ul class="d-sm-flex my-0">
                                {{ $job->created_at }}
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
                                        <h3 class="mb-3 tx-14">
                                            @if (config('app.locale') == 'ar')
                                                {{ $job->job_title_ar }}
                                            @else
                                                {{ $job->job_title_en }}
                                            @endif
                                        </h3>
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
                        <form action="{{ route('jobReqs.store', $job) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <span>{{ __('Upload CV') }} : </span>
                            <input type="file" name="cv" class="form-control">
                        </form>
                    </div>
                </div>
            </div>

        @endforeach
    </div>
@endsection
