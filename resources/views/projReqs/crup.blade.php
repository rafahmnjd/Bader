@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">{{ __('New Requirment For') }} "{{$project->name_ar}}" {{__('Project')}}</h5>
            </div>
            <div class="card-body">
                <form
                    action="{{ empty($projReq)? route('projReqs.store',$project) : route('projReqs.update', $projReq) }}"
                    method="Post" enctype="multipart/form-data">
                    @csrf
                    @if(!empty($projReq))
                    @method('PUT')
                    @endif
                    <!--name-->
                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <div class="col-md-4 col-form-label">
                                    <label for="name_ar">{{ __('Title AR') }}:</label>
                                </div>
                                <div class="col-8">
                                    <input class="form-control" type="text" name="name_ar" required
                                        @if(!empty($projReq)) value="{{ $projReq->name_ar }}" @else
                                        value="{{ old('name_ar') }}" @endif>
                                </div>
                                <div class="col-md-4 col-form-label">
                                    <label for="details_ar">{{ __('Text AR') }}:</label>
                                </div>
                                <div class="col-8">
                                    <textarea class="form-control my-1" type="text" required
                                        name="details_ar">@if(!empty($projReq)){{ $projReq->details_ar }} @else{{ old('details_ar') }} @endif</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <div class="col-md-4 col-form-label">
                                    <label for="name_en">{{ __('Title EN') }}:</label>
                                </div>
                                <div class="col-8"><input class="form-control" type="text" name="name_en"
                                        @if(!empty($projReq)) value="{{ $projReq->name_en }}" @else
                                        value="{{ old('name_en') }}" @endif required>
                                </div>

                                <div class="col-md-4 col-form-label">
                                    <label for="details_en">{{ __('Text EN') }}:</label>
                                </div>
                                <div class="col-8">
                                    <textarea class="form-control my-1" type="text" required
                                        name="details_en">@if(!empty($projReq)){{ $projReq->details_en }} @else{{ old('details_en') }} @endif</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 col-form-label">
                            <label for="state">{{__("state")}}</label>
                        </div>
                        <div class="col-md-4">
                            <select id="state" class="custom-select" name="state" required>
                                <option value="waiting" @if(!empty($projReq)&&$projReq->state=="waiting")selected
                                    @endif>{{__("Waiting")}}</option>
                                <option value="closed" @if(!empty($projReq)&&$projReq->state=="closed")selected
                                    @endif>{{__("Closed")}}</option>
                            </select>
                        </div>
                        <div class="col-md-2 col-form-label">
                            <label for="quantity">{{ __('Cost') }}:</label>
                        </div>
                        <div class="col-md-4 input-group">
                            <input class="form-control" type="number" name="quantity"  required @if(!empty($projReq))
                                value="{{$projReq->quantity}}" @endif>
                                <span class="btn " >{{__('SP')}}</span>
                        </div>
                    </div>

                    <div class="form-group float-left">
                        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                      <a href="#" class="btn btn-secondary" onclick="location.href = document.referrer; return false;">{{ __('Cancel') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
