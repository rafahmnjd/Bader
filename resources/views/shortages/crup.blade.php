@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">{{__("shortage Info")}}</h5>
            </div>
            <div class="card-body">
                <form action="{{empty($shortage)? route('shortages.store') : route('shortages.update',$shortage)}}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @if (!empty($shortage))
                    @method('PUT')
                    @endif
                    <!--name-->
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="quantity">{{__("quantity")}}</label>
                                <input class="form-control my-1" type="number" required name="quantity"
                                    @if(!empty($shortage))value="{{$shortage->quantity}}" @else
                                    value="{{old('quantity')}}" @endif>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="type">{{__("type")}}</label>
                                <select id="type" class="custom-select" name="type" required>
                                    <option value="min">{{__("min")}}</option>
                                    <option value="plus">{{__("plus")}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="state">{{__("state")}}</label>
                                <select id="state" class="custom-select" name="state" required>
                                    <option value="waiting">{{__("waiting")}}</option>
                                    {{-- <option value="undeployed">{{__("undeployed")}}</option> --}}
                                    <option value="closed">{{__("closed")}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="item_id">{{__("item_id")}}</label>
                                <select id="" class="form-control" name="item_id" required>
                                    @foreach ($items as $item)
                                    <option value="{{$item->id}}">{{$item->name_ar}}-{{$item->name_en}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col d-flex align-items-end d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">{{__("save")}}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

