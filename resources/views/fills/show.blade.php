@extends('layouts.app')
@section('content')
    <div class="container ">
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
    </div>
@endsection
