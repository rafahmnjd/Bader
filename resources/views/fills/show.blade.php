@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-lg-12 col-md-8 order-6 order-lg-12 order-md-6 order-sm-6 mb-1">
            <div class="card mb-2 shadow ">
                <div class="card-body ">
                    {{-- <h5 class="card-title">{{ __('Fill') }}</h5> --}}
                    <div class="row">
                        <div class="col">{{ __('id') }} : {{ $fill->id }}</div>
                        <div class="col">{{ __('Item') }} : {{ $fill->shortage->item->name_ar }}</div>
                        {{-- <div class="col">{{ __('Name') }} : {{ $fill->user->charity->name_ar }}</div> --}}
                        {{-- </div>
                <div class="row"> --}}
                        <div class="col">{{ __('Type') }} : {{ __($fill->shortage->type) }}</div>
                        <div class="col">{{ __('Quantity') }} : {{ $fill->quantity }}</div>
                        <div class="col">{{ __('State') }} : {{ __($fill->state) }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-9 col-md-8 right-wrapper">
            <div class="card mb-2 shadow ">
                <div class="card-body ">
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
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 left-wrapper">
            <div class="card mb-2 shadow ">
                <div class="card-body ">
                    <div class="list-group list-group-flush">
                        @foreach ($messages as $msg)
                            <a class="list-group-item list-group-item-action"
                                href="{{ route('messages.index', $fill->id) }}">
                                <h6 class="font-weight-bold">
                                    {{ $msg->user_id }} :
                                </h6>
                                <p class="card-text text-truncate">
                                    {{ $msg->text }}
                                    <ul>
                                        {{ $msg->created_at }}
                                    </ul>
                                </p>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
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
