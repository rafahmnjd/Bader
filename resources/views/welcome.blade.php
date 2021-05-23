@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-3 col-md-4 d-none d-sm-none d-md-block">
        <div class="row">
            <div class="col">

                <div class="list-group p-1">
                    <li class="list-group-item bg-yelow2" aria-current="true" aria-disabled="true">
                        <h5 class='text-gray'>{{__('Newest Charities')}}</h5>
                    </li>
                    @if(app()->getLocale() == 'ar')
                    @foreach ($charities as $ch)
                    <a class="list-group-item list-group-item-action px-2 " href="{{route('charities.show',$ch)}}">
                        <img width="40" height="40" src="{{asset(config('path.ch_logo').$ch->logo_ar)}}"
                            class="img-fluid border border-wight" alt="Card image cap">
                        {{$ch->name_ar}}
                    </a>
                    @endforeach
                    @else
                    @foreach ($charities as $ch)
                    <a class="list-group-item list-group-item-action px-2" href="{{route('charities.show',$ch)}}">
                        <img width="40" height="40" src="{{asset(config('path.ch_logo').$ch->logo_en)}}"
                            class="img-fluid border border-wight" alt="Card image cap">
                        {{$ch->name_en}}
                    </a>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="col"></div>
    <div class="col-lg-3 col-md-3 d-none d-sm-none d-md-non d-lg-block">som thing to test</div>
</div>
@endsection
