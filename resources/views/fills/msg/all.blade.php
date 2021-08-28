@extends('layouts.app')
@section('style')
{{-- <script src="{{asset('js/ckeditor.js')}}"></script> --}}
<script src="https://cdn.ckeditor.com/ckeditor5/29.1.0/classic/ckeditor.js"></script>
@endsection
@section('content')

<div class="row">
    <div class="col-lg-3 col-md-4 left-wrapper">
        <div class="card mb-2 shadow ">
            <div class="card-header text-white bg-danger ">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link @if($type==1) active @else text-white @endif"
                            href="{{route('messages.index',1)}}">{{__('Charity Fills')}}</a>
                    </li>
                    @can('charity')
                    <li class="nav-item">
                        <a class="nav-link @if($type==0) active @else text-white @endif"
                            href="{{route('messages.index',0)}}">{{__('My Fills') }}</a>
                    </li>
                    @endcan
                </ul>

            </div>
            <div class="card-body p-0 " style="position: relative; height:36rem; overflow-y: scroll; ">
                <div data-spy="scroll" data-target="#list-example" data-offset="0" class="scrollspy-example">
                    <div class="list-group">
                        @if (config('app.locale') == 'ar')
                        {{-- {{dd($fills)}} --}}
                        @foreach ($fills as $fil)
                        {{-- return view('fills.msg.all', compact('fills', 'fill', 'messages','type')); --}}
                        <a class="list-group-item list-group-item-action"
                            href="{{ route('fill.messages',['fill'=>$fil,'type'=>$type]) }}">
                            <h6 class="font-weight-bold">
                                {{-- {{dd($fil,$fil->shortage)}} --}}
                                {{$fil->shortage->item->name_ar}}
                                <small class="text-muted float-left">{{__('date:')}} {{ $fil->created_at }}</small>
                            </h6>
                            <ul class="list-unstyled">
                                <li>{{__('charity:')}}
                                    {{ $fil->shortage->charity->name_ar?? $fil->shortage->project->charity->name_ar}}
                                </li>
                                <li>{{__('quantity:')}} {{ number_format($fil->quantity)}}</li>
                            </ul>
                        </a>
                        @endforeach
                        @else
                        @foreach ($fills as $fil)
                        <a class="list-group-ite m list-group-item-action"
                            href="{{ route('fill.messages',["fill"=>$fil,"type"=>$type]) }}">
                            <h5 class="card-title">
                                {{$fil->shortage->item->name_en}}
                                <small><small class="text-muted float-right">{{__('date:')}}
                                        {{ $fil->created_at }}</small></small>
                            </h5>
                            <ul class="list-unstyled">
                                <li>{{__('charity:')}}
                                    {{ $fil->shortage->charity->name_en?? $fil->shortage->project->charity->name_en}}
                                </li>
                                <li>{{__('quantity:')}} {{ number_format($fil->quantity)}}</li>
                            </ul>
                        </a>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-9 col-md-8 col-sm-12 right-wrapper">
        @if(!empty($fill))
        <div class="row">
            <div class="col-lg-12 col-md-8 order-6 order-lg-12 order-md-6 order-sm-6 mb-1">
                <div class="card mb-2 shadow ">
                    <div class="card-body ">

                        <div class="row">
                            <div class="col">{{ __('charity:') }} <br>
                                @if (config('app.locale') == 'ar')
                                {{$fill->shortage->charity->name_ar??$fill->shortage->project->charity->name_ar }}
                                @else
                                {{$fill->shortage->charity->name_en??$fill->shortage->project->charity->name_en }}
                                @endif
                            </div>
                            @if(!empty($fill->shortage->project))
                            <div class="col">{{__('Project')}}: <br>{{$fill->shortage->project->title_ar}}</div>
                            @endif
                            <div class="col">{{ __('Item') }}: <br>{{ $fill->shortage->item->name_ar }}</div>
                            <div class="col">{{ __('Type') }}: <br> {{ __($fill->shortage->type) }}</div>
                            <div class="col">{{ __('Quantity')}}: <br>{{ number_format($fill->quantity) }}</div>
                            <div class="col">{{ __('State') }}: <br>{{ __($fill->state) }}</div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        @endif
        <div class="card mb-2 shadow ">
            <div class="card-body ">
                @if(!empty($messages))
                <div class="list-group list-group-flush ">
                    @foreach ($messages as $msg)
                    <a class="list-group-item list-group-item-action " {{-- href="{{ route('messages.show', $msg) }}"
                        --}}>
                        <div class="row align-items-center">
                            <div class="col p-0 text-center">
                                <img src="{{ asset($msg->user->imagepath()) }}" class="img-fluid px-1"
                                    style="max-height: 3rem">
                            </div>
                            <div class="col">{{$msg->created_at}}</div>
                            <div class="col-md-9 col-sm-10 p-0 ">
                                {{ $msg->text }}
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
                @else
                <p class="text-center">{{__('There is no messages to show')}}</p>
                @endif

                @if(!empty($fill))
                <form action="{{ route('messages.send',['fill'=>$fil,'type'=>$type]) }}" method="POST">
                    @csrf
                    @if ($fill->state == 'completed')
                    <div>
                        {{ __('you cant send messages any more,fill is completed') }}
                    </div>
                    @endif
                    <div class="input-group">
                        <textarea class="form-control" name="text" required></textarea>
                        <button class='btn btn-success' type="submit" @if ($fill->state == 'completed') disabled
                            @endif><i class="zmdi zmdi-plus"></i></button>
                    </div>
                </form>
                @else
                <br>
                <p class="text-center">{{__('Please chose a fill')}}</p>
                @endif
            </div>
        </div>
    </div>

</div>
@endsection
