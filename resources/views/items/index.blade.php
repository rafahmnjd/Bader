@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">
                        {{ __('Manage Items') }}</h5>
                </div>
                <div class="card-body text-nowrap overflow-auto font-weight-bolder">
                    <div class="row mx-1 py-2 border-bottom border-top">
                        <div class="col-1 p-1 ">{{ __('id') }}</div>
                        <div class="col   p-1 ">{{ __('Category_ar') }}</div>
                        <div class="col   p-1 ">{{ __('Name in Arabic') }} </div>
                        <div class="col   p-1 ">{{ __('Unite in Arabic') }} </div>
                        <div class="col   p-1 ">{{ __('Category_en') }}</div>
                        <div class="col   p-1 ">{{ __('Name in English') }} </div>
                        <div class="col   p-1 ">{{ __('Unite in English') }}</div>
                        <div class="col-2 p-1 ">{{ __('Control') }} </div>
                    </div>
                    <hr class="m-0 p-0 ">
                    @foreach ($items as $item)
                        <div>
                            <form method="POST" action="{{ route('items.update', $item) }}">
                                @csrf
                                @method('PUT')
                                <div class="row mx-2 py-2  border-top">
                                    <div class="col-1 p-1">{{ $item->id }}</div>
                                    <div class="col p-1">
                                        <select class=" form-control" type="text" name='cat_ar'
                                            value="{{ $item->caat_ar }}" required>
                                            @foreach ($cat_ar as $catr)
                                                <option @if ($catr->cat_ar == $item->cat_ar) selected @endif>{{ $catr->cat_ar }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col p-1">
                                        <input class=" form-control" type="text" name='name_ar'
                                            value="{{ $item->name_ar }}" required>
                                    </div>
                                    <div class="col p-1">
                                        <input class=" form-control" type="text" name='unite_ar'
                                            value="{{ $item->unite_ar }}" required>
                                    </div>
                                    <div class="col p-1">
                                        <input class=" form-control" type="text" name='name_en'
                                            value="{{ $item->name_en }}" required>
                                    </div>
                                    <div class="col p-1">
                                        <input class="form-control" type="text" name='unite_en'
                                            value="{{ $item->unite_en }}" required>
                                    </div>
                                    <div class="col-2 p-1">
                                        <button type="submit" class="btn btn-outline-warning">
                                            <i class="zmdi zmdi-edit"></i>
                                        </button>
                                        <a href="#" class="delete btn btn-outline-danger">
                                            <i class="zmdi zmdi-delete"></i>
                                        </a>
                                    </div>
                                </div>
                            </form>
                            <form class="form-delet" method="POST" action="{{ route('items.destroy', $item) }}">
                                @csrf
                                @method('DELETE')
                            </form>
                        </div>
                    @endforeach
                    <form method="POST" action="{{ route('items.store') }}">
                        @csrf
                        <div class="row mx-2 py-2">
                            <div class="col-1 p-1">#</div>
                            <div class="col p-1">
                                <input class=" form-control" type="text" name='name_ar' required>
                            </div>
                            <div class="col p-1">
                                <input class=" form-control" type="text" name='unite_ar' required>
                            </div>
                            <div class="col p-1">
                                <input class=" form-control" type="text" name='name_en' required>
                            </div>
                            <div class="col p-1">
                                <input class="form-control" type="text" name='unite_en' required>
                            </div>
                            <div class="col-2 p-1">
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
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $(".delete").click(function() {
                console.log($(this).parent().parent().parent().siblings('.form-delet'));
                $(this).parent().parent().parent().siblings('.form-delet').submit();
            });
        });

    </script>
@endsection
