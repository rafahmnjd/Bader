@extends('layouts.app')
@section('content')
<div class="row mb-2">
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-body">
                <h5 class="card-title">{{ __('About the website') }}</h5>
                <p class="card-text">{{ __('about_content1') }}</p>
            </div>
        </div>
    </div>
</div>
<div class="row mb-2">
    <div class="col">
        <div class="card shadow">
            <div class="card-body">
                <h5 class="card-title">@lang('goals_title')1</h5>
                <p class="card-text">{{ __('about_content2') }}</p>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card shadow">
            <div class="card-body">
                <p class="card-text">{{ __('about_content2') }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
