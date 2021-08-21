@extends('layouts.app')
@section('style')

<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('css/bootstrap-select.min.css')}}">

@endsection
@section('content')
<div class="row justify-content-center">
    <div class="col-md">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">{{ __('Requierment Information') }}</h5>
            </div>
            <div class="card-body">
                <form action="{{ empty($projReq) ? route('projReqs.store',$project) : route('projReqs.update', $projReq) }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @if (!empty($projReq))
                    @method('PUT')
                    @endif
                    <!--name-->
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="item_id">{{ __('Item') }}</label>
                                <select id="items-select" class="selectpicker form-control" data-live-search="true" name="item_id" required>
                                    @if (!empty($projReq))
                                    <option data-tokens="{{ $projReq->item_id }}" value="{{ $projReq->item_id }}" selected>
                                        {{ $projReq->item->name_ar }}-{{ $projReq->item->name_en }}</option>
                                    @endif
                                    @foreach ($items as $item)
                                    <option data-tokens="{{ $item->id }}" value="{{ $item->id }}">{{ $item->name_ar }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="quantity">{{ __('Quantity') }}</label>
                                <input class="form-control my-1" type="number" required name="quantity"
                                @if(!empty($projReq)) value="{{ $projReq->quantity }}" @else
                                    value="{{ old('quantity') }}" @endif>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="type">{{ __('Type') }}</label>
                                <select id="type" class="form-control selectpicker" name="type" required readonly>
                                    <option value="proj" selected>{{__('Project Requirments')}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="state">{{ __('State') }}</label>
                                <select id="state" class="form-control selectpicker" name="state" required>
                                    @if (!empty($projReq))
                                    <option value="{{ $projReq->state }}" selected>{{ __($projReq->state) }}
                                    </option>
                                    @endif
                                    <option value="waiting">{{ __('Waiting') }}</option>
                                    {{-- <option value="undeployed">{{__("undeployed")}}</option> --}}
                                    <option value="closed">{{ __('Closed') }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="details_ar">{{ __('Ar Details') }}:</label>

                                <textarea class="form-control my-1" type="text"
                                    name="details_ar">@if (!empty($projReq)){{ $projReq->details_ar }} @else{{ old('details_ar') }} @endif</textarea>
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="form-group">
                                <label for="details_en">{{ __('EN Details') }}:</label>
                                <textarea class="form-control my-1" type="text"
                                    name="details_en">@if (!empty($projReq)){{ $projReq->details_en }} @else{{ old('details_en') }} @endif</textarea>
                            </div>
                        </div>

                        <div class="col d-flex align-items-end d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.js')}}"></script>
<script src="{{asset('js/bootstrap-select.min.js')}}"></script>
@endsection
