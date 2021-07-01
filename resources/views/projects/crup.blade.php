@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">{{__("Job Info")}}</h5>
            </div>
            <div class="card-body">
                <form action="{{empty($project)? route('projects.store') : route('projects.update',$project)}}" method="Post"
                    enctype="multipart/form-data">
                    @csrf
                    @if (!empty($project))
                    @method('PUT')
                    @endif

                    <!--name-->
                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <div class="col-md-4 col-form-label">
                                    <label for="title_ar">{{ __('title_ar') }}:</label>
                                </div>
                                <div class="col-8">
                                    <input class="form-control" type="text" name="title_ar" required
                                        @if(!empty($project))value="{{$project->title_ar}}" @else
                                        value="{{old('title_ar')}}" @endif>
                                </div>
                                <div class="col-md-4 col-form-label">
                                    <label for="text_ar">{{ __('text_ar') }}:</label>
                                </div>
                                <div class="col-8">
                                    <textarea class="form-control my-1" type="text" required
                                        name="text_ar">@if(!empty($project)){{$project->details_ar}} @else{{old('text_ar')}} @endif</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <div class="col-md-4 col-form-label">
                                    <label for="title_en">{{ __('title_en') }}:</label>
                                </div>
                                <div class="col-8"><input class="form-control" type="text" name="project_title_en"
                                        @if(!empty($project))value="{{$project->title_en}}" @else
                                        value="{{old('title_en')}}" @endif required>
                                </div>

                                <div class="col-md-4 col-form-label">
                                    <label for="text_en">{{ __('text_en') }}:</label>
                                </div>
                                <div class="col-8">
                                    <textarea class="form-control my-1" type="text" required
                                        name="text_en">@if(!empty($project)){{$project->text_en}} @else{{old('text_en')}} @endif</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="state">{{__("state")}}</label>
                                <select id="state" class="custom-select" name="state" required>
                                    <option value="waiting">{{__("waiting")}}</option>
                                    {{-- <option value="undeployed">{{__("undeployed")}}</option> --}}
                                    <option value="closed">{{__("closed")}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="tag">{{__('tags')}}</label>
                                <input type="text" class="form-control" name="tag" id="tag" @if(!empty($project))value="{{$project->tag}}" @else value="{{old('tag')}}"@endif>
                            </div>
                        </div>
                        <div class="col d-flex align-items-end d-flex justify-content-end">
                            <button type="submit"class="btn btn-primary">{{__("save")}}</button>
                        </div>
                    </div>
                    <!--Image-->
                    <div class="row">
                        <div class="col-md-2 col-form-label ">
                            <label for="image">{{ __('Logo') }}:</label>
                        </div>
                        @if (!empty($charity))
                        <div class="col-md-2 col-form-label ">
                            <img src="{{ asset(config('path.proj_image').$charity->image) }}" class="img-fluid img-thumbnail">
                        </div>
                        @endif
                        <div class="@if(!empty($charity))col-md-8 @else col-md-10 @endif input-group mt-3">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="image" @if (empty($charity)) required @endif>
                                <label class="custom-file-label text-left">No file chosen</label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
