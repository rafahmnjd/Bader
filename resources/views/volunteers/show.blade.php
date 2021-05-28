@extends('layouts.app')
@section('style')
<!-- include my style -->
<link rel="stylesheet" type="text/css" href="{{asset('css/show.css')}}">
@endsection
@section('content')
<section class="section about-section gray-bg" id="about">
            <div class="container">
                <div class="row align-items-center flex-row-reverse">
                    <div class="col-lg-6">
                        <div class="about-text go-to">
                            <h3 class="dark-color">
                                <td>
                                    @if (config('app.locale') == 'ar')
                                        {{ $volunteer->name_ar }}
                                    @else
                                        {{ $volunteer->name_en }}
                                    @endif
                                </td> 
                            </h3>
                            <h6 class="theme-color lead">
                                @if (config('app.locale') == 'ar')
                                    {{ $volunteer->education_ar }}
                                @else
                                    {{ $volunteer->education_en }}
                                @endif
                            </h6>
                            <div class="row about-list">
                                <div class="col-md-6">
                                    <div class="media">
                                        <label>{{ __('Birthday') }}</label>
                                        <p>{{ $volunteer->birth_date }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="media">
                                        <label>{{ __('Email') }}</label>
                                        <p>{{ $volunteer->email }} </p>
                                    </div>
                                </div>
                            </div>
                            <p><mark>{{ __('Skills') }}:</mark>
                                <td>
                                    @if (config('app.locale') == 'ar')
                                        <h2>{{ $volunteer->skills_ar }}</h2>
                                    @else
                                        <h2>{{ $volunteer->skills_en }}</h2>
                                    @endif
                                </td>
                            </p>
                            <p><mark>{{ __('Experiences') }}:</mark>
                                <td>
                                    @if (config('app.locale') == 'ar')
                                        <h2>{{ $volunteer->experiences_ar }}</h2>
                                    @else
                                        <h2>{{ $volunteer->experiences_en }}</h2>
                                    @endif
                                </td>
                            </p>
                        </div>
                    </div>
                    <!-- صورة المتطوع -->
                    <div class="col-lg-6">
                        <div class="about-avatar">
                            @if (!empty($volunteer) )
                                @if (config('app.locale') == 'ar')
                                    <img src="{{ asset(config('path.vprofile').$volunteer->profile_ar) }}" title="" max_width="50%" height="300">
                                @else
                                    <img src="{{ asset(config('path.vprofile').$volunteer->profile_en) }}" title="" max_width="50%" height="300">
                                @endif
                            @else
                                @if (config('app.locale') == 'ar')
                                    <img src="{{ asset(config('path.default').$volunteer->profile_ar) }}" title="" max_width="50%" height="300">
                                @else
                                    <img src="{{ asset(config('path.default').$volunteer->profile_en) }}" title="" max_width="50%" height="300">
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row gutters">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        @if (config('app.locale') == 'ar')
						<div class="text-left">
                        @else
                        <div class="text-right">
                        @endif
							<button type="button" id="submit" name="submit" class="btn btn-outline-secondary">{{ __('Upload CV') }}</button>
							<button type="button" id="submit" name="submit" class="btn btn-outline-primary">{{ __('Create CV') }}</button>
						</div>
					</div>
				</div>
        </div>      
</section>
@endsection