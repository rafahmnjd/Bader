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
                            <h3 class="dark-color">Ghoufran BKY</h3>
                            <h6 class="theme-color lead">Education of Ghoufran</h6>
                            <div class="row about-list">
                                <div class="col-md-6">
                                    <div class="media">
                                        <label>Birthday</label>
                                        <p>4th april 1998</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="media">
                                        <label>E-mail</label>
                                        <p>info@domain.com</p>
                                    </div>
                                </div>
                            </div>
                            <p><mark>Skills:</mark> services for customers of all sizes, specializing in creating stylish, modern websites, web services and online stores. </p>
                            <p><mark>Experiences:</mark>My passion is to design digital user experiences through the bold interface and meaningful interactions.</p>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="about-avatar">
                            <img src="{{ asset(config('path.covers').$charity->cover) }}" title="" max_width="50%" height="300">
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





<!-- <div class="container db-social">
    <div class="jumbotron jumbotron-fluid">
    <img class="jumbotron jumbotron-fluid" src="{{ asset(config('path.covers').$charity->cover) }}" >
    </div>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-xl-11">
                <div class="widget head-profile has-shadow">
                    <div class="widget-body pb-0">
                        <div class="row d-flex align-items-center">
                            <div class="col-xl-4 col-md-4 d-flex justify-content-lg-start justify-content-md-start justify-content-center"></div>
                            <div class="col-xl-4 col-md-4 d-flex justify-content-center">
                                <div class="image-default">
                                        <img class="rounded-circle" src="{{ asset(config('path.ch_logo').$charity->logo) }}" alt="...">

                                </div>
                                <div class="infos">
                                <td>
                                {{-- @if (config('app.locale') == 'ar') --}}
                                    {{-- <h2>{{ $charity->name_ar }}</h2> --}}
                                {{-- @else --}}
                                    {{-- <h2>{{ $charity->name_en }}</h2> --}}
                                {{-- @endif --}}
                                </td>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->

