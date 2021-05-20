@extends('layouts.app')
@section('content')
<div class="row mb-2">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">@lang('about_title')</h5>
                <p class="card-text">@lang('about_content')</p>
            </div>
        </div>
    </div>
</div>
<div class="row mb-2">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">@lang('goals_title')1</h5>
                <p class="card-text"></p>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">@lang('goals_title')2</h5>
                <p class="card-text"></p>
            </div>
        </div>
    </div>
</div>
@endsection
