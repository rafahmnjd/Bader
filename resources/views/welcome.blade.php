@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-3 col-md-4 d-none d-sm-none d-md-block">
        <div class="row">
            <div class="col">
                <div class="list-group p-1">
                    <a class="list-group-item list-group-item-action active list-group-item-light " aria-current="true">
                        <h5 class='text-gray'>{{__('Newest Charities')}}</h5>
                    </a>
                    @foreach ($charities as $ch)
                    <a class="list-group-item list-group-item-action px-2" href="{{route('charities.show',$ch)}}">
                        <img width="40" height="40" @if(app()->getLocale() ==
                        'ar')src="{{asset(config('path.ch_logo').$ch->logo_ar)}}" @else
                        src="{{asset(config('path.ch_logo').$ch->logo_en)}}"@endif
                        class="img-fluid border border-wight" alt="Card image cap">
                        @if(app()->getLocale() == 'ar'){{$ch->name_ar}} @else {{$ch->name_en}}@endif
                    </a>
                    @endforeach
                    {{-- <hr> --}}
                    <a class="list-group-item list-group-item-action active list-group-item-light " aria-current="true">
                        <h5 class='text-gray'>{{__('Newest Charities')}}</h5>
                    </a>
                    @foreach ($charities as $ch)
                    <a class="list-group-item list-group-item-action px-2" href="{{route('charities.show',$ch)}}">
                        <img width="40" height="40" @if(app()->getLocale() == 'ar')src="{{asset(config('path.ch_logo').$ch->logo_ar)}}"
                        @else src="{{asset(config('path.ch_logo').$ch->logo_en)}}"@endif
                        class="img-fluid border border-wight" alt="Card image cap">
                        @if(app()->getLocale() == 'ar'){{$ch->name_ar}} @else {{$ch->name_en}}@endif
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="col"></div>
    <div class="col-lg-3 col-md-3 d-none d-sm-none d-md-non d-lg-block">som thing to test</div>
</div>
@endsection
