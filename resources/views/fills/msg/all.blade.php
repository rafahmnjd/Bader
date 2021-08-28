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
                <h4 class="card-title">{{__('My Fills') }}</h4>
            </div>
            <div class="card-body p-0 " style="position: relative; height:36rem; overflow-y: scroll; ">
                <div data-spy="scroll" data-target="#list-example" data-offset="0" class="scrollspy-example">
                    <div class="list-group">
                        @if (config('app.locale') == 'ar')
                        @foreach ($fills as $fill)
                        <a class="list-group-item list-group-item-action" href="{{ route('messages.index') }}">
                            <h6 class="font-weight-bold">
                                {{$fill->shortage->item->name_ar}}
                                <small class="text-muted float-left">{{__('date:')}} {{ $fill->created_at }}</small>
                            </h6>
                            <ul class="list-unstyled">
                                <li>{{__('charity:')}}
                                    {{ $fill->shortage->charity->name_ar?? $fill->shortage->project->charity->name_ar}}
                                </li>
                                <li>{{__('quantity:')}} {{ number_format($fill->quantity)}}</li>
                            </ul>
                        </a>
                        @endforeach
                        @else
                        @foreach ($fills as $fill)
                        <a class="list-group-item list-group-item-action" href="{{ route('messages.index') }}">
                            <h5 class="card-title">
                                {{$fill->shortage->item->name_en}}
                                <small><small class="text-muted float-right">{{__('date:')}} {{ $fill->created_at }}</small></small>
                            </h5>
                            <ul class="list-unstyled">
                                <li>{{__('charity:')}}
                                    {{ $fill->shortage->charity->name_en?? $fill->shortage->project->charity->name_en}}
                                </li>
                                <li>{{__('quantity:')}} {{ number_format($fill->quantity)}}</li>
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
        <div class="row">
            <div class="col-lg-12 col-md-8 order-6 order-lg-12 order-md-6 order-sm-6 mb-1">
                <div class="card mb-2 shadow ">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col">{{ __('charity:') }}
                                @if (config('app.locale') == 'ar')
                                {{$fill->shortage->charity->name_ar??$fill->shortage->project->charity->name_ar }}
                                @else
                                {{$fill->shortage->charity->name_en??$fill->shortage->project->charity->name_en }}
                                @endif
                            </div>
                            @if(!empty($fill->shortage->project))
                            <div class="col">{{__('Project')}}:{{$fill->shortage->project->title_ar}}</div>
                            @endif
                            <div class="col">{{ __('Item') }}: {{ $fill->shortage->item->name_ar }}</div>
                            <div class="col-1">{{ __('Type') }}: {{ __($fill->shortage->type) }}</div>
                            <div class="col-1">{{ __('Quantity')}}: {{ number_format($fill->quantity) }}</div>
                            <div class="col-1">{{ __('State') }}: {{ __($fill->state) }}</div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-2 shadow ">
            <div class="card-body ">
                <form action="{{ route('messages.send', $fill->id) }}" method="POST">
                    @csrf
                    @if ($fill->state == 'completed')
                    <div>
                        {{ __('you cant send messages any more,fill is completed') }}
                    </div>
                    @endif
                    <textarea id="editor" class="editor" name="editor"></textarea>
                    <script>
                        ClassicEditor
                        .create( document.querySelector( '#editor' ) )
                        .then( editor => {
                        console.log( editor );
                        } )
                        .catch( error => {
                        console.error( error );
                        } );
                    </script>
                </form>
                {{-- <form action="{{ route('messages.send', $fill->id) }}" method="POST">
                @csrf
                @if ($fill->state == 'completed')
                <div>
                    {{ __('you cant send messages any more,fill is completed') }}
                </div>
                @endif
                <div class="input-group">
                    <input class="form-control" name="text" required>
                    <button class='btn btn-success' type="submit" @if ($fill->state == 'completed') disabled
                        @endif><i class="zmdi zmdi-plus"></i></button>
                </div>
                </form> --}}
            </div>
        </div>
    </div>

</div>
@endsection
@section('script')
<script src="{{asset('js/jquery.min.js')}}"></script>
{{-- <script src="{{asset('js/ckeditor.js')}}"></script> --}}
{{-- <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script> --}}

@endsection

{{-- <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">{{ __('Fills') }}</h5>
<div class="row">
    <div class="col">id = {{ $fill->id }}</div>
    <div class="col">item = {{ $fill->shortage->item->name_ar }}</div>
    <div class="col">type = {{ __($fill->shortage->type) }}</div>
    <div class="col">quantity = {{ $fill->quantity }}</div>
    <div class="col">sate = {{ __($fill->state) }}</div>
</div>
</div>
<div class="card-body" style="background-color: #f0c8ffd5">
    <form action="{{ route('messages.send', $fill->id) }}" method="POST">
        @csrf
        @if ($fill->state == 'completed')
        <div>
            {{ __('you cant send messages any more,fill is completed') }}
        </div>
        @endif
        <div class="input-group">
            <input class="form-control" name="text" required>
            <button class='btn btn-success' type="submit" @if ($fill->state == 'completed') disabled @endif><i
                    class="zmdi zmdi-plus"></i></button>
        </div>
    </form>
    @foreach ($messages as $msg)
    @if ($msg->user_id == Auth::user()->id)
    <div class="d-flex justify-content-start my-1">
        <div class="shadow-sm p-2 bg-success border border-success rounded">{{ $msg->text }}
        </div>
    </div>
    @else

    <div class="d-flex justify-content-end my-1">
        <div class="shadow-sm p-2 @if (!$msg->read) bg-danger
                                    text-white @else bg-white @endif border rounded">
            {{ $msg->text }}</div>
    </div>
    @endif
    @endforeach
</div>
</div>
</div>
</div>
</div> --}}
