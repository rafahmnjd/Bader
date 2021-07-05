@extends('charities.layout')
@section('create_href', route("shortages.create"))
@section('create_word', __('Add a new shortage'))
@section('middile')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card rounded">
                <!-- card-body -->
                <!-- text with image -->
                <div class="card-body">
                    @foreach ($shortages as $shortage)
                        <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
                            <div class="col">
                                <h3 class="mb-3 tx-14">
                                    @if (config('app.locale') == 'ar')
                                        {{ $shortage->item->name_ar }}
                                    @else
                                        {{ $shortage->item->name_en }}
                                    @endif
                                </h3>
                            </div>
                            <div class="col">
                                <h4>{{ $shortage->quantity }}</h4>
                            </div>
                            <div class="col">
                                <div class="progress">
                                    <div class="progress-bar" style="width:90%">90%</div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-flex justify-content-right">
                                    <button class="btn btn-light btn-icon-text btn-edit-profile">
                                        <a href="{{route('fills.create',$shortage)}}">
                                            {{ __('Fill') }}
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
