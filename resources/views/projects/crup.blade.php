@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">{{ __('Project Information') }}</h5>
                </div>
                <div class="card-body">
                    <form action="{{ empty($project) ? route('projects.store') : route('projects.update', $project) }}"
                        method="Post" enctype="multipart/form-data">
                        @csrf
                        @if (!empty($project))
                            @method('PUT')
                        @endif
                        <!--name-->
                        <div class="row">
                            <div class="col">
                                <div class="row">
                                    <div class="col-md-4 col-form-label">
                                        <label for="title_ar">{{ __('Title AR') }}:</label>
                                    </div>
                                    <div class="col-8">
                                    <input class="form-control" type="text" name="title_ar" required @if (!empty($project)) value="{{ $project->title_ar }}" @else
                                            value="{{ old('title_ar') }}" @endif>
                                    </div>
                                    <div class="col-md-4 col-form-label">
                                        <label for="text_ar">{{ __('Text AR') }}:</label>
                                    </div>
                                    <div class="col-8">
                                        <textarea class="form-control my-1" type="text" required
                                            name="text_ar">@if (!empty($project)){{ $project->text_ar }} @else{{ old('text_ar') }} @endif</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="row">
                                    <div class="col-md-4 col-form-label">
                                        <label for="title_en">{{ __('Title EN') }}:</label>
                                    </div>
                                <div class="col-8"><input class="form-control" type="text" name="title_en" dir="ltr" @if (!empty($project)) value="{{ $project->title_en }}" @else
                                            value="{{ old('title_en') }}" @endif required>
                                    </div>

                                    <div class="col-md-4 col-form-label">
                                        <label for="text_en">{{ __('Text EN') }}:</label>
                                    </div>
                                    <div class="col-8">
                                        <textarea class="form-control my-1" type="text" required dir="ltr"
                                            name="text_en">@if (!empty($project)){{ $project->text_en }} @else{{ old('text_en') }} @endif</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="state">{{ __('state') }}</label>
                                    <select id="state" class="custom-select" name="state" required>
                                        @if (!empty($project))
                                            <option value="{{ $project->state }}" selected>{{ __($project->state) }}
                                            </option>
                                        @endif
                                        <option value="waiting">{{ __('Waiting') }}</option>
                                        {{-- <option value="undeployed">{{__("undeployed")}}</option> --}}
                                        <option value="closed">{{ __('Closed') }}</option>
                                    </select>
                                </div>
                            </div>

                            <!--Image-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="image">{{ __('Image') }}:</label>
                                    @if (!empty($project))
                                        <img src="{{ asset(config('path.pro_img') . $project->image) }}"
                                            class="img-fluid img-thumbnail">
                                    @endif
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="image">
                                        <label class="custom-file-label text-left">No file chosen</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group float-left">
                            <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                            {{-- <a href="{{ route('projects.index') }}" type="button"
                            class="btn btn-secondary ">{{ __('Cancel') }}</a> --}}
                            <a href="#" class="btn btn-secondary"
                                onclick="location.href = document.referrer; return false;">{{ __('Cancel') }}</a>
                        </div>
                    </form>
                </div>
            </div>
            {{-- </div> --}}
        </div>
    @endsection
