@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">{{ __('New Fill') }} </h5>
            </div>
            <div class="card-body">
                <form action="{{ empty($fill)? route('projReqs.fills.store',$projReq) : route('projReqs.fills.update', $fill) }}"
                    method="Post" enctype="multipart/form-data">
                    @csrf
                    @if(!empty($fill))
                    @method('PUT')
                    @endif
                    <!--name-->
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">

                                <label for="quantity">{{ __('Quantity') }}:</label>

                                <input class="form-control" type="number" name="quantity"  required @if(!empty($fill))
                                   max="{{$fill->projReq->rest()}}" value="{{ $fill->quantity }}" @else max="{{$projReq->rest()}}" value="{{ old('quantity') }}" @endif>
                            </div>
                        </div>
                        @if(!empty($fill))
                        @can('charity')
                        @can('ch_access',$fill->projReq->project->charity)
                        <div class="col-6">
                            <div class="form-group">
                                <label for="state">{{__("State")}}</label>
                                <select id="state" class="custom-select" name="state" required>
                                    @if(!empty($projReq))
                                    <option value="{{$projReq->state}}" selected>{{__($projReq->state)}}</option>
                                    @endif
                                    <option value="waiting">{{__("Waiting")}}</option>
                                    {{-- <option value="undeployed">{{__("undeployed")}}</option> --}}
                                    <option value="completed">{{__("Completed")}}</option>
                                </select>
                            </div>
                        </div>
                        @endcan
                        @endcan
                        @endif
                    </div>
                    <br>
                    <div class="form-group float-right">
                        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                        <a @if(!empty($fill)) href="{{ route('projReqs.fills.index',$fill->shortage_id) }}" @else
                            href="{{ route('projReqs.fills.index',$projReq) }}" @endif type="button"
                            class="btn btn-secondary ">{{ __('Cancel') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
