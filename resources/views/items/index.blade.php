@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                {{__('Manage Items')}}
            </div>
            <div class="card-body">
                <div class="row mx-2">
                    <div class="col-1"><h6>{{__("id")}}</h6></div>
                    <div class="col border-right border-left"><h6>{{__("Name in Arabic")}}  </h6></div>
                    <div class="col border-right border-left"><h6>{{__("Unite in Arabic")}} </h6></div>
                    <div class="col border-right border-left"><h6>{{__("Name in English")}} </h6></div>
                    <div class="col border-right border-left"><h6>{{__("Unite in English")}}</h6></div>
                    <div class="col-2"><h6>{{ __('Control') }}</h6></div>
                </div>
                <hr>
                @foreach ($items as $item)
                <div>
                    <form method="POST" action="{{route('items.update',$item)}}">
                        @csrf
                        @method('PUT')
                        <div class="row mx-2">
                            <div class="col-1">{{$item->id}}</div>
                            <div class="col border-right border-left">
                                <input class=" form-control" type="text" name='name_ar' value="{{$item->name_ar}}" required>
                            </div>
                            <div class="col border-right border-left">
                                <input class=" form-control" type="text" name='unite_ar' value="{{$item->unite_ar}}">
                            </div>
                            <div class="col border-right border-left">
                                <input class=" form-control" type="text" name='name_en' value="{{$item->name_en}}" required>
                            </div>
                            <div class="col border-right border-left">
                                <input class="form-control" type="text" name='unite_en' value="{{$item->unite_en}}">
                            </div>
                            <div class="col-2">
                                <button type="submit" class="btn btn-outline-warning">
                                    <i class="zmdi zmdi-edit"></i>
                                </button>
                                <a href="#" class="delete btn btn-outline-danger">
                                    <i class="zmdi zmdi-delete"></i>
                                </a>
                            </div>
                        </div>
                        <hr>
                    </form>
                    <form class="form-delet" method="POST" action="{{route('items.destroy',$item)}}">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
                @endforeach
                <form method="POST" action="{{route('items.store')}}">
                    @csrf
                    <div class="row mx-2">
                        <div class="col-1">#</div>
                        <div class="col border-right border-left">
                            <input class=" form-control" type="text" name='name_ar' required>
                        </div>
                        <div class="col border-right border-left">
                            <input class=" form-control" type="text" name='unite_ar'>
                        </div>
                        <div class="col border-right border-left">
                            <input class=" form-control" type="text" name='name_en' required>
                        </div>
                        <div class="col border-right border-left">
                            <input class="form-control" type="text" name='unite_en'>
                        </div>
                        <div class="col-2">
                            <button type="submit" class="btn btn-outline-success">
                                <i class="zmdi zmdi-plus"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
<script>
    $(document).ready(function () {
        $(".delete").click(function(){
            console.log($(this).parent().parent().parent().siblings('.form-delet'));
            $(this).parent().parent().parent().siblings('.form-delet').submit();
        });
    });
</script>
@endsection
