@extends('charities.layout')
@section('create_href', route('shortages.create'))
@section('create_word', __('Add a new surplus'))
@section('middile')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card rounded">
                <!-- card-body -->
                <!-- text with image -->
                <div class="card-body">
                    @foreach ($surpluses as $surplus)
                        <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
                            <div class="col-3">
                                {{-- <h3 class="mb-3 tx-14"> --}}
                                @if (config('app.locale') == 'ar')
                                    {{ $surplus->item->name_ar }}
                                @else
                                    {{ $surplus->item->name_en }}
                                @endif
                                {{-- </h3> --}}
                            </div>
                            <div class="col">
                                {{ $surplus->quantity }}
                            </div>
                            <div class="col">
                                {{-- {{  }} --}}
                            </div>
                            <div class="col-4">{{ $surplus->restPercent() }}
                                <div class="progress">
                                    <div class="progress-bar" style="width:{{ round($surplus->restPercent()) }}%">
                                        {{ round($surplus->restPercent()) }}%</div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-flex justify-content-right">
                                    <button class="btn btn-light btn-icon-text btn-edit-profile">
                                        <a href="{{ route('fills.create', $surplus) }}">
                                            {{ __('Ask') }}
                                        </a>
                                    </button>
                                    {{-- <button class="btn btn-light btn-icon-text btn-edit-profile">
                                        <a href="#">
                                            {{ __('Message') }}
                            </a>
                            </button> --}}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
