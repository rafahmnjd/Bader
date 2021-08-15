@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">{{__("Charity Info")}}</h5>
            </div>
            <div class="card-body">
                <form action="{{empty($charity)? route('charities.store') : route('charities.update',$charity)}}"
                    method="Post" enctype="multipart/form-data">
                    @csrf
                    @if (!empty($charity))
                    @method('PUT')
                    @endif

                    <!--cover-->
                    <div class="row">
                        <div class="col-md-2 col-form-label ">
                            <label for="cover">{{ __('Cover') }}:</label>
                        </div>
                        @if (!empty($charity))
                        <div class="col-md-2 col-form-label ">
                            <img src="{{ asset(config('path.covers').$charity->cover) }}"
                                class="img-fluid img-thumbnail">
                        </div>
                        @endif
                        <div class="@if(!empty($charity))col-md-8 @else col-md-10 @endif input-group mt-3">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="cover" @if(empty($charity)) required
                                    @endif>
                                <label class="custom-file-label text-left">No file chosen</label>
                            </div>
                        </div>
                    </div>

                    <!--logo-->
                    <div class="row">
                        <div class="col-md-2 col-form-label ">
                            <label for="logo">{{ __('Logo') }}:</label>
                        </div>
                        @if (!empty($charity))
                        <div class="col-md-2 col-form-label ">
                            <img src="{{ asset(config('path.ch_logo').$charity->logo) }}"
                                class="img-fluid img-thumbnail">
                        </div>
                        @endif
                        <div class="@if(!empty($charity))col-md-8 @else col-md-10 @endif input-group mt-3">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="logo" @if (empty($charity)) required
                                    @endif>
                                <label class="custom-file-label text-left">No file chosen</label>
                            </div>
                        </div>
                    </div>


                    <!--name-->
                    <div class="row mt-2">
                        <div class="col-md-2 col-form-label  ">
                            <label for="name_ar">{{ __('Arabic Name') }}:</label>
                        </div>
                        <div class="col-4"><input class="form-control" type="text" name="name_ar"
                                value=@if(!empty($charity))"{{$charity->name_ar}}"@else "{{old('name_ar')}}" @endif>
                        </div>
                        <div class="col-md-2 col-form-label  ">
                            <label for="name_en">{{ __('English Name') }}:</label>
                        </div>
                        <div class="col-4"><input class="form-control" type="text" name="name_en" dir="ltr"
                                value=@if(!empty($charity))"{{$charity->name_en}}" @else "{{old('name_en')}}" @endif>
                        </div>
                    </div>


                    <!--license   ماخلصت-->
                    <!-- <div class="row">
                        {{-- <div class=" @if (!empty($charity)) col-md-2 @else col-md-4 @endif col-form-label " --}}
                            >
                            {{-- <label for="license">{{ __('license') }}:</label> --}}
                        </div>
                        {{-- @if (!empty($charity)) --}}
                        <div class="col-md-2 col-form-label " >
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
                        <div class="col-md-2 col-form-label  ">
                            <label for="email">{{ __('Email') }}:</label>
                        </div>
                        <div class="col-4"><input class="form-control" type="email" name="email" dir="ltr"
                                value=@if(!empty($charity))"{{$charity->email}}" @else "{{old('email')}}" @endif>
                        </div>
                        {{-- </div> --}}


                        <!--phone-->
                        <div class="col-md-2 col-form-label  ">
                            <label for="phone">{{ __('Phone') }}:</label>
                        </div>
                        <div class="col-4"><input class="form-control" type="text" name="phone" dir="ltr"
                                value=@if(!empty($charity))"{{$charity->phone}}"@else "{{old('phone')}}" @endif>
                        </div>


                        <!--mobile-->

                        <div class="col-md-2 col-form-label  ">
                            <label for="mobile">{{ __('Mobile') }}:</label>
                        </div>
                        <div class="col-4"><input class="form-control" type="text" name="mobile" dir="ltr"
                                value=@if(!empty($charity)) "{{$charity->mobile}}" @else "{{old('mobile')}}" @endif>
                        </div>
                    </div>


                    <!--whatsapp-->
                    <div class="row">
                        <div class="col-md-2 col-form-label  ">
                            <label for="whatsapp">{{ __('Whatsapp') }}:</label>
                        </div>
                        <div class="col-4">
                            <input class="form-control" type="text" name="whatsapp" dir="ltr"
                                value=@if(!empty($charity)) "{{$charity->whatsapp}}" @else "{{old('whatsapp')}}" @endif>
                        </div>
                        <!--facebook-->
                        <div class="col-md-2 col-form-label  ">
                            <label for="facebook">{{ __('Facebook') }}:</label>
                        </div>
                        <div class="col-4">
                            <input class="form-control" type="text" name="facebook" dir="ltr"
                                value=@if(!empty($charity))"{{$charity->facebook}}" @else "{{old('facebook')}}" @endif>
                        </div>
                    </div>


                    <!-- address-->
                    <div class="row">
                        <div class="col-md-2">
                            <label for="gov">{{ __('governorate') }}:</label>
                        </div>
                        <div class="col-md-4">
                            <select id="govSelect" class="custom-select">
                                <option value="" disabled>Choose State</option>
                                @foreach ($govs as $gov)
                                <option value={{$gov->id}} @if(!empty($charity)&&!empty($charity->city->gov) &&
                                    $charity->city->gov->id == $gov->id) selected @endif>{{$gov->name_ar}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="city">{{ __('city') }}:</label>
                        </div>
                        <div class="col-md-4">

                            <select id="citySelect" class="custom-select" name="city_id">
                                <option value="" disabled selected>{{__('Choose City')}}</option>
                                @if(!empty($charity) && !empty($charity->city))
                                <option value="$charity->city_id" selected> {{$charity->city->name_ar}}</option>
                                @endif
                            </select>
                        </div>
                        <div class="col-md-2 col-form-label  ">
                            <label for="address_ar">{{ __('Address_AR') }}:</label>
                        </div>
                        <div class="col-4"><input class="form-control" type="text" name="address_ar"
                                value=@if(!empty($charity))"{{$charity->address_ar}}" @else "{{old('address_ar')}}"
                                @endif>
                        </div>
                        <div class="col-md-2 col-form-label  ">
                            <label for="address_en">{{ __('Address_EN') }}:</label>
                        </div>
                        <div class="col-4"><input class="form-control" type="text" name="address_en" dir="ltr"
                                value=@if(!empty($charity) )"{{$charity->address_en}}" @else "{{old('address_en')}}"
                                @endif>
                        </div>
                    </div>
                    <!--info-->
                    <div class="row">
                        <div class="col-md-2 col-form-label  ">
                            <label for="info_ar">{{ __('Info_AR') }}:</label>
                        </div>
                        <div class="col-4">
                            <textarea class="form-control" type="text"
                                name="info_ar">@if(!empty($charity)){{$charity->info_ar}} @else{{old('info_ar')}}@endif</textarea>
                        </div>
                        <div class="col-md-2 col-form-label  ">
                            <label for="info_en">{{ __('Info_EN') }}:</label>
                        </div>
                        <div class="col-4">
                            <textarea class="form-control" type="text" name="info_en"
                                dir="ltr">@if(!empty($charity)){{$charity->info_en}} @else {{old('info_en')}} @endif</textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-6 text-md-center">
                            <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                        </div>
                        <div class="col-6 text-md-center">
                            <a @can('admin') href="{{ route('charities.index') }}"@else href="{{ route('base') }}" @endcan type="button"
                                class="btn btn-secondary">{{ __('Cancel') }}</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function () {
    var citiesByState = {
        @foreach ($govs as $gov)
            "{!!$gov->id!!}":
            {
                @foreach($gov->cities as $city)
                "{!!$city->id!!}":"{!!$city->name_ar!!}" ,
                // "{!!$city->name_ar!!}",
                @endforeach
            },
        @endforeach
    }

    var citiesSelect=$("#citySelect");
    var govesSelect=$("#govSelect");
        console.log(citiesSelect);
        govesSelect.on('change', function(){
            citiesSelect.empty();
            for(key in citiesByState[this.value]){
                citiesSelect.append("<option value='"+key+"'>"+citiesByState[this.value][key]+"</option>");
            }
        });
});
</script>
@endsection
