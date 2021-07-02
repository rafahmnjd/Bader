@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">{{__("Item Information")}}</h5>
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
                                <label for="quantity">{{__("Quantity")}}</label>
                                <input class="form-control my-1" type="number" required name="quantity"
                                    @if(!empty($shortage))value="{{$shortage->quantity}}" @else
                                    value="{{old('quantity')}}" @endif>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="type">{{__("Type")}}</label>
                                <select id="type" class="custom-select" name="type" required>
                                    <option value="{{$shortage->type}}" selected>{{__($shortage->type)}}</option>
                                    <option value="min">{{__("min")}}</option>
                                    <option value="plus">{{__("plus")}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="state">{{__("State")}}</label>
                                <select id="state" class="custom-select" name="state" required>
                                    <option value="{{$shortage->state}}" selected>{{__($shortage->state)}}</option>
                                    <option value="waiting">{{__("Waiting")}}</option>
                                    {{-- <option value="undeployed">{{__("undeployed")}}</option> --}}
                                    <option value="closed">{{__("Closed")}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="item_id">{{__("Item")}}</label>
                                <select id="" class="form-control" name="item_id" required>
                                    <option value="{{$shortage->item}}" selected>{{__($shortage->item->name_ar)}}</option>
                                    @foreach ($items as $item)
                                    <option value="{{$item->id}}">{{$item->name_ar}}-{{$item->name_en}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col d-flex align-items-end d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">{{__("Save")}}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

