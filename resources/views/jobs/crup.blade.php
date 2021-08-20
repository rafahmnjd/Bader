@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">{{ __('Job Information') }}</h5>
                </div>
                <div class="card-body">
                    <form action="{{ empty($job) ? route('jobs.store') : route('jobs.update', $job) }}" method="Post"
                        enctype="multipart/form-data">
                        @csrf
                        @if (!empty($job))
                            @method('PUT')
                        @endif

                        <!--name-->
                        <div class="row">
                            <div class="col">
                                <div class="row">
                                    <div class="col-md-4 col-form-label">
                                        <label for="job_title_ar">{{ __('Title AR') }}:</label>
                                    </div>
                                    <div class="col-8">
                                    <input class="form-control" type="text" name="job_title_ar" required @if (!empty($job)) value="{{ $job->job_title_ar }}" @else
                                            value="{{ old('job_title_ar') }}" @endif>
                                    </div>
                                    <div class="col-md-4 col-form-label">
                                        <label for="job_details_ar">{{ __('Job details AR') }}:</label>
                                    </div>
                                    <div class="col-8">
                                        <textarea class="form-control my-1" type="text" required
                                            name="job_details_ar">@if (!empty($job)){{ $job->job_details_ar }} @else{{ old('job_details_ar') }} @endif</textarea>
                                    </div>
                                    <div class="col-md-4 col-form-label">
                                        <label for="location_ar">{{ __('Location AR') }}:</label>
                                    </div>
                                    <div class="col-8">
                                        <textarea class="form-control my-1" type="text"
                                            name="location_ar">@if (!empty($job)){{ $job->location_ar }} @else{{ old('location_ar') }} @endif</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="row">
                                    <div class="col-md-4 col-form-label">
                                        <label for="job_title_en">{{ __('Title EN') }}:</label>
                                    </div>
                                <div class="col-8"><input class="form-control" type="text" name="job_title_en" @if (!empty($job)) value="{{ $job->job_title_en }}" @else
                                            value="{{ old('job_title_en') }}" @endif required>
                                    </div>

                                    <div class="col-md-4 col-form-label">
                                        <label for="job_details_en">{{ __('Job details EN') }}:</label>
                                    </div>
                                    <div class="col-8">
                                        <textarea class="form-control my-1" type="text" required
                                            name="job_details_en">@if (!empty($job)){{ $job->job_details_en }} @else{{ old('job_details_en') }} @endif</textarea>
                                    </div>
                                    <div class="col-md-4 col-form-label">
                                        <label for="location_en">{{ __('Location EN') }}:</label>
                                    </div>
                                    <div class="col-8">
                                        <textarea class="form-control my-1" type="text"
                                            name="location_en">@if (!empty($job)){{ $job->location_en }} @else{{ old('location_en') }} @endif</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="state">{{ __('State') }}</label>
                                    <select id="state" class="custom-select" name="state" required>
                                        @if (!empty($job))
                                            <option value="{{ $job->state }}" selected>{{ __($job->state) }}</option>
                                        @endif
                                        <option value="waiting">{{ __('Waiting') }}</option>
                                        <option value="undeployed">{{ __('undeployed') }}</option>
                                        <option value="closed">{{ __('Closed') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="tag">{{ __('Tags') }}</label>
                                    <input type="text" class="form-control" name="tag" id="tag" @if (!empty($job)) value="{{ $job->tag }}" @else value="{{ old('tag') }}" @endif>
                                </div>
                            </div>
                            <div class="col d-flex align-items-end d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
