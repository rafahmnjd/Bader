@extends('layouts.app')
@section('content')

<div class="row justify-content-center">
    <div class="col-md">
        <div class="card">
            <div class="card-header"></div>
            <div class="card-body">
                <form action="{{empty($volunteer)? route('volunteers.store') : route('volunteers.update',$volunteer)}}"
                    method="Post" enctype="multipart/form-data">
                    @csrf
                    @if (!empty($volunteer))
                    @method('PUT')
                    @endif

                    <!--profile-->
                    <div class="row">
                        <div class="col-md-2 col-form-label  ">
                            {{-- style="text-align:start"> --}}
                            <label for="profile">{{ __('Profile_pic') }}:</label>
                        </div>
                        @if (!empty($volunteer))
                        <div class="col-md-2 col-form-label " style="text-align:start">
                            <img src="{{ asset(config('path.vprofile').$volunteer->profile) }}"
                                class="img-fluid img-thumbnail">
                        </div>
                        @endif
                        <div class="@if (!empty($volunteer)) col-8 @else col-md-10 @endif">
                            <input class="form-control" type="file" name="profile" @if (empty($volunteer)) required
                                @endif>
                        </div>
                    </div>

                    <!--name-->
                    <div class="row">
                        <div class="col-md-2 col-form-label  ">
                            <label for="name_ar">{{ __('Arabic Name') }}:</label>
                        </div>
                        <div class="col-md-4"><input class="form-control" type="text" name="name_ar"
                                value=@if(!empty($volunteer))"{{$volunteer->name_ar}}"@else "{{old('name_ar')}}" @endif>
                        </div>
                        <div class="col-md-2 col-form-label  ">
                            <label for="name_en">{{ __('English Name') }}:</label>
                        </div>
                        <div class="col-md-4"><input class="form-control" type="text" name="name_en"
                                value=@if(!empty($volunteer))"{{$volunteer->name_en}}" @else "{{old('name_en')}}"
                                @endif>
                        </div>
                    </div>

                    <!--Birthday-->
                    <div class="row">
                        <div class="col-md-2 col-form-label  ">
                            <label for="birth_date">{{ __('Birthday') }}:</label>
                        </div>
                        <div class="col-md-4"><input class="form-control" type="date" name="birth_date"
                                value=@if(!empty($volunteer))"{{$volunteer->birth_date}}"@else "{{old('birth_date')}}"
                                @endif>
                        </div>
                        <!--email-->
                        <div class="col-md-2 col-form-label  ">
                            <label for="email">{{ __('Email') }}:</label>
                        </div>
                        <div class="col-md-4">
                            <input class="form-control" type="email"
                                value=@if(!empty($volunteer))"{{$volunteer->user->email}}" @else "{{old('email')}}"
                                @endif disabled>
                        </div>
                    </div>
                    <hr>
                    <!--education-->
                    <div class="row">
                        <div class="col-md-2 col-form-label  ">
                            <label for="education_ar">{{ __('Arabic Education') }}:</label>
                        </div>
                        <div class="col-md-4">
                            <textarea class="form-control"
                                name="education_ar">@if(!empty($volunteer)){{$volunteer->education_ar}}@else {{old('education_ar')}}@endif</textarea>
                        </div>
                        <div class="col-md-2 col-form-label  ">
                            <label for="education_en">{{ __('English Education') }}:</label>
                        </div>
                        <div class="col-md-4">
                            <textarea class="form-control"
                                name="education_en">@if(!empty($volunteer)){{$volunteer->education_en}}@else{{old('education_en')}} @endif</textarea>
                        </div>
                    </div>
                    <br>
                    <!--Skills-->
                    <div class="row">
                        <div class="col-md-2 col-form-label  ">
                            <label for="skills_ar">{{ __('Arabic Skills') }}:</label>
                        </div>
                        <div class="col-md-4">
                            <textarea class="form-control"
                                name="skills_ar">@if(!empty($volunteer)){{$volunteer->skills_ar}}@else{{old('skills_ar')}} @endif</textarea>
                        </div>
                        <div class="col-md-2 col-form-label  ">
                            <label for="skills_en">{{ __('English Skills') }}:</label>
                        </div>
                        <div class="col-md-4">
                            <textarea class="form-control"
                                name="skills_en">@if(!empty($volunteer)){{$volunteer->skills_en}}@else{{old('skills_en')}}@endif</textarea>
                        </div>
                    </div>
                    <br>
                    <!--Experiences-->
                    <div class="row">
                        <div class="col-md-2 col-form-label  ">
                            <label for="experiences_ar">{{ __('Arabic Experiences') }}:</label>
                        </div>
                        <div class="col-md-4">
                            <textarea class="form-control"
                                name="experiences_ar">@if(!empty($volunteer)){{$volunteer->experiences_ar}}@else{{old('experiences_ar')}}@endif</textarea>
                        </div>
                        <div class="col-md-2 col-form-label  ">
                            <label for="experiences_en">{{ __('English Experiences') }}:</label>
                        </div>
                        <div class="col-md-4">
                            <textarea class="form-control"
                                name="experiences_en">@if(!empty($volunteer)){{$volunteer->experiences_en}}@else{{old('experiences_en')}}@endif</textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-6 text-md-center">
                            <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                        </div>
                        <div class="col-6 text-md-center">
                            @can('admin')
                            <a href="{{ route('volunteers.index') }}" type="button"
                                class="btn btn-secondary">{{ __('Cancel') }}</a>
                            @else
                            <a href="{{ route('base') }}" type="button"
                                class="btn btn-secondary">{{ __('Cancel') }}</a>
                            @endcan

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
