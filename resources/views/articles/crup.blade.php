@extends('layouts.app')


@section('content')
<div class="row justify-content-center">
    <div class="col-md">
        <div class="card">
            <div class="card-header"></div>
            <div class="card-body">
                <form action="{{empty($charity)? route('charities.store') : route('charities.update',$charity)}}"
                    method="Post" enctype="multipart/form-data">
                    @csrf
                    @if (!empty($charity))
                    @method('PUT')
                    @endif
                    <div class="row">
                        <div class="col-md-2 col-form-label text-md-left">
                            <label for="name_ar">{{ __('Arabic Name') }}:</label>
                        </div>
                        <div class="col-4"><input class="form-control" type="text" name="name_ar"
                                value=@if(!empty($charity))"{{$charity->name_ar}}"@else "{{old('name_ar')}}" @endif>
                        </div>
                        <div class="col-md-2 col-form-label text-md-left">
                            <label for="name_en">{{ __('English Name') }}:</label>
                        </div>
                        <div class="col-4"><input class="form-control" type="text" name="name_en"
                                value=@if(!empty($charity))"{{$charity->name_en}}" @else "{{old('name_en')}}" @endif>
                        </div>
                    </div>
                    <!--cover-->
                    <div class="row">
                        <div class=" @if (!empty($charity)) col-md-2 @else col-md-4 @endif col-form-label ">
                            <label for="title">{{ __('Title') }}:</label>
                        </div>
                        @if (!empty($charity))
                        <div class="col-md-2 col-form-label">
                            <img src="{{ asset(config('path.covers').$charity->cover) }}"
                                class="img-fluid img-thumbnail">
                        </div>
                        @endif
                        <div class="col-8">
                            <input class="form-control" type="file" name="cover" @if (empty($charity)) required @endif>
                        </div>
                    </div>

                    <!--logo-->
                    <div class="row">
                        <div class=" @if (!empty($charity)) col-md-2 @else col-md-4 @endif col-form-label "
                            style="text-align:start">
                            <label for="logo">{{ __('Logo') }}:</label>
                        </div>
                        @if (!empty($charity))
                        <div class="col-md-2 col-form-label " style="text-align:start">
                            <img src="{{ asset(config('path.ch_logo').$charity->logo) }}"
                                class="img-fluid img-thumbnail">
                        </div>
                        @endif
                        <div class="col-8">
                            <input class="form-control" type="file" name="logo" @if (empty($charity)) required
                                @endif>
                        </div>
                    </div>

                    <!--name-->
                    <div class="row">
                        <div class="col-md-2 col-form-label text-md-left">
                            <label for="name_ar">{{ __('Arabic Name') }}:</label>
                        </div>
                        <div class="col-4"><input class="form-control" type="text" name="name_ar"
                                value=@if(!empty($charity))"{{$charity->name_ar}}"@else "{{old('name_ar')}}" @endif>
                        </div>
                        <div class="col-md-2 col-form-label text-md-left">
                            <label for="name_en">{{ __('English Name') }}:</label>
                        </div>
                        <div class="col-4"><input class="form-control" type="text" name="name_en"
                                value=@if(!empty($charity))"{{$charity->name_en}}" @else "{{old('name_en')}}" @endif>
                        </div>
                    </div>


                    <!--license   ماخلصت-->
                    <!-- <div class="row">
                        {{-- <div class=" @if (!empty($charity)) col-md-2 @else col-md-4 @endif col-form-label " --}}
                            style="text-align:start">
                            {{-- <label for="license">{{ __('license') }}:</label> --}}
                        </div>
                        {{-- @if (!empty($charity)) --}}
                        <div class="col-md-2 col-form-label " style="text-align:start">
                            {{-- <img src="{{ asset('storage/charities/logo/' . $charity->license) }}" --}}
                                class="img-fluid img-thumbnail">
                        </div>
                        {{-- @endif --}}
                        <div class="col-8">
                            {{-- <input class="form-control" type="file" name="license" @if (empty($charity)) required --}}
                                {{-- @endif> --}}
                        </div>
                    </div> -->



                    <!--email-->
                    <div class="row">
                        <div class="col-md-2 col-form-label text-md-left">
                            <label for="email">{{ __('Email') }}:</label>
                        </div>
                        <div class="col-4"><input class="form-control" type="text" name="email"
                                value=@if(!empty($charity))"{{$charity->email}}" @else "{{old('email')}}" @endif>
                        </div>
                    </div>


                    <!--phone-->
                    <div class="row">
                        <div class="col-md-2 col-form-label text-md-left">
                            <label for="phone">{{ __('Phone') }}:</label>
                        </div>
                        <div class="col-4"><input class="form-control" type="text" name="phone"
                                value=@if(!empty($charity))"{{$charity->phone}}"@else "{{old('phone')}}" @endif>
                        </div>
                    </div>

                    <!--mobile-->
                    <div class="row">
                        <div class="col-md-2 col-form-label text-md-left">
                            <label for="mobile">{{ __('Mobile') }}:</label>
                        </div>
                        <div class="col-4"><input class="form-control" type="text" name="mobile"
                                value=@if(!empty($charity)) "{{$charity->mobile}}" @else "{{old('mobile')}}" @endif>
                        </div>
                    </div>


                    <!--whatsapp-->
                    <div class="row">
                        <div class="col-md-2 col-form-label text-md-left">
                            <label for="whatsapp">{{ __('Whatsapp') }}:</label>
                        </div>
                        <div class="col-4"><input class="form-control" type="text" name="whatsapp"
                                value=@if(!empty($charity)) "{{$charity->whatsapp}}" @else "{{old('whatsapp')}}" @endif>
                        </div>
                    </div>


                    <!--facebook-->
                    <div class="row">
                        <div class="col-md-2 col-form-label text-md-left">
                            <label for="facebook">{{ __('Facebook') }}:</label>
                        </div>
                        <div class="col-4"><input class="form-control" type="text" name="facebook"
                                value=@if(!empty($charity))"{{$charity->facebook}}" @else "{{old('facebook')}}" @endif>
                        </div>
                    </div>


                    <!-- address-->
                    <div class="row">
                        <div class="col-md-2 col-form-label text-md-left">
                            <label for="address_ar">{{ __('Address_AR') }}:</label>
                        </div>
                        <div class="col-4"><input class="form-control" type="text" name="address_ar"
                                value=@if(!empty($charity))"{{$charity->address_ar}}" @else "{{old('address_ar')}}"
                                @endif>
                        </div>
                        <div class="col-md-2 col-form-label text-md-left">
                            <label for="address_en">{{ __('Address_EN') }}:</label>
                        </div>
                        <div class="col-4"><input class="form-control" type="text" name="address_en"
                                value=@if(!empty($charity) )"{{$charity->address_en}}" @else "{{old('address_en')}}"
                                @endif>
                        </div>
                    </div>


                    <!--info-->
                    <div class="row">
                        <div class="col-md-2 col-form-label text-md-left">
                            <label for="info_ar">{{ __('Info_AR') }}:</label>
                        </div>
                        <div class="col-4"><input class="form-control" type="text" name="info_ar"
                                value=@if(!empty($charity)) "{{$charity->info_ar}}" @else "{{old('info_ar')}}" @endif>
                        </div>
                        <div class="col-md-2 col-form-label text-md-left">
                            <label for="info_en">{{ __('Info_EN') }}:</label>
                        </div>
                        <div class="col-4"><input class="form-control" type="text" name="info_en"
                                value=@if(!empty($charity)) "{{$charity->info_en}}" @else "{{old('info_en')}}" @endif>
                        </div>

                    </div>


                    <div class="row">
                        <div class="col-6 text-md-center">
                            <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                        </div>
                        <div class="col-6 text-md-center">
                            {{-- <a @can('admin') href="{{ route('charities.index') }}"@else href="{{ route('base') }}" @endcan type="button"
                                class="btn btn-secondary">{{ __('Cancel') }}</a> --}}
                                <a href="#" class="btn btn-secondary" onclick="location.href = document.referrer; return false;">{{ __('Cancel') }}</a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
