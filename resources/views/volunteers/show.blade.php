@extends('layouts.app')
@section('style')
    <!-- include my style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vol_show.css') }}">
@endsection

@section('content')
    <section class="section about-section gray-bg" id="about">
        <div class="container">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="card user-card">
                        <div class="card-header text-center">
                            {{-- <h5>Profile</h5> --}}
                        </div>
                        <div class="card-block">
                            <div class="user-image">
                                @if (!empty($volunteer->profile))
                                    <img src="{{ asset(config('path.vprofile') . $volunteer->profile) }}"
                                        class="img-radius" alt="User-Profile-Image">

                                @else
                                    <img src="{{ asset(config('path.default') . 'userProfile') }}" class="img-radius"
                                        alt="User-Profile-Image">
                                @endif
                            </div>
                            <h6 class="f-w-600 m-t-25 m-b-10 text-center">
                                @if (config('app.locale') == 'ar')
                                    {{ $volunteer->name_ar }}
                                @else
                                    {{ $volunteer->name_en }}
                                @endif
                            </h6>
                            <p class="text-muted text-center">
                                @if (config('app.locale') == 'ar')
                                    {{ $volunteer->education_ar }}
                                @else
                                    {{ $volunteer->education_en }}
                                @endif
                            </p>
                            <p class="text-muted text-center">
                                {{ $volunteer->user->email }} | {{ $volunteer->birth_date }}
                            </p>
                            <hr>
                            @if (config('app.locale') == 'ar')
                                <div class="text-right">
                                    <h3>{{ __('Skills') }}:</h3>
                                    {{ $volunteer->skills_ar }}
                                </div>
                            @else
                                <div class="text-left">
                                    <h3>{{ __('Skills') }}:</h3>
                                    {{ $volunteer->skills_en }}
                                </div>
                            @endif
                            <hr>
                            @if (config('app.locale') == 'ar')
                                <div class="text-right">
                                    <h3>{{ __('Experiences') }}:</h3>
                                    {{ $volunteer->experiences_ar }}
                                </div>
                            @else
                                <div class="text-left">
                                    <h3>{{ __('Experiences') }}:</h3>
                                    {{ $volunteer->experiences_en }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="widget-26-job-info text-center">
            <button class="btn btn-outline-primary btn-icon-text btn-edit-profile">
                <a href="#">
                    {{ __('Edit') }}
                </a>
            </button>
            <button class="btn btn-outline-primary btn-icon-text btn-edit-profile">
                <a href="#">
                    {{ __('ُExport PDF') }}
                </a>
            </button>
        </div>
    </section>
@endsection
