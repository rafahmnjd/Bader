@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">{{ __('Item Information') }}</h5>
                </div>
                <div class="card-body">
                    <form action="{{ empty($shortage) ? route('shortages.store') : route('shortages.update', $shortage) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @if (!empty($shortage))
                            @method('PUT')
                        @endif
                        <!--name-->
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="item_id">{{ __('Item') }}</label>
                                    <select id="" class="form-control" name="item_id" required>
                                        @if (!empty($shortage))
                                            <option value="{{ $shortage->item_id }}" selected>
                                                {{ $shortage->item->name_ar }}-{{ $shortage->item->name_en }}</option>
                                        @endif
                                        @foreach ($items as $item)
                                            <option value="{{ $item->id }}">{{ $item->name_ar }}-{{ $item->name_en }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="quantity">{{ __('Quantity') }}</label>
                                <input class="form-control my-1" type="number" required name="quantity" @if (!empty($shortage)) value="{{ $shortage->quantity }}" @else
                                        value="{{ old('quantity') }}" @endif>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="type">{{ __('Type') }}</label>
                                    <select id="type" class="custom-select" name="type" required>
                                        <option value="min" @if(!empty($shortage)&&$shortage->type=='min')selected @endif>{{ __('min') }}</option>
                                        <option value="plus" @if(!empty($shortage)&&$shortage->type=='min')selected @endif>{{ __('plus') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="state">{{ __('State') }}</label>
                                    <select id="state" class="custom-select" name="state" required>
                                        @if (!empty($shortage))
                                            <option value="{{ $shortage->state }}" selected>{{ __($shortage->state) }}
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
