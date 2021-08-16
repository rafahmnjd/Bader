@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">{{ __('New Fill') }} </h5>
            </div>
            <div class="card-body">
                <form action="{{ empty($fill)? route('fills.store',$shortage) : route('fills.update', $fill) }}"
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
                                <input class="form-control" type="number" name="quantity" min="0" required
                                    @if(!empty($fill)) value="{{ $fill->quantity }}" max="{{$fill->shortage->rest()}}"
                                    @else value="{{ old('quantity') }}" max="{{$shortage->rest()}}" @endif>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="form-group float-right">
                        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                        <a href="#" class="btn btn-secondary"
                            onclick="location.href = document.referrer; return false;">{{ __('Cancel') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
