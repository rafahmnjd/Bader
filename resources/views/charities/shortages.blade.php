@extends('charities.layout')
@section('create_href', route('shortages.create','min'))
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
                                @if (config('app.locale') == 'ar')
                                    {{ $shortage->item->name_ar }}
                                @else
                                    {{ $shortage->item->name_en }}
                                @endif
                            </div>
                            <div class="col">
                                {{ number_format($shortage->quantity) }}
                            </div>
                            <div class="col">
                                <div class="progress">
                                    <div class="progress-bar" style="width:{{ round($shortage->completePercent()) }}%">
                                        {{ round($shortage->completePercent()) }}%</div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-flex justify-content-right">
                                    <button class="btn btn-light btn-icon-text btn-edit-profile">
                                        <a href="{{ route('fills.create', $shortage) }}">
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
