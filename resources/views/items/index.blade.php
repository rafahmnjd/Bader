@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-12">
        <div class="card">
            <div class="card-header text-left">
                <button id="add-btn" class="btn btn-outline-primary">
                    <i class="zmdi zmdi-plus"></i>
                </button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>{{__("id")}}</th>
                                <th>{{__("Name in Arabic")}}</th>
                                <th>{{__("Name in English")}}</th>
                                <th>{{__("Unite in Arabic")}}</th>
                                <th>{{__("Unite in English")}}</th>
                                <th colspan="3">{{ __('Control') }}</th>
                            </tr>
                        </thead>
                        <tbody id="added-items">
                            @foreach ($items as $item)
                            <tr>
                                <form action="{{route('items.update',$item->id)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <td>{{$item->id}}</td>
                                    <td><input type="text" name="name_ar" value="{{$item->name_ar}}"></td>
                                    <td><input type="text" name="name_en" value="{{$item->name_en}}"></td>
                                    <td><input type="text" name="unite_ar" value="{{$item->unite_ar}}"></td>
                                    <td><input type="text" name="unite_en" value="{{$item->unite_en}}"></td>
                                    <td>
                                        <div class="btn-group">
                                            <button Type="submit" class="btn btn-outline-primary rounded-circle">
                                                <i class="zmdi zmdi-edit"></i>
                                            </button>
                                        </div>
                                    </td>
                                </form>
                                <td>
                                    <div class="btn-group">
                                        <form action="{{ route('items.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button Type="submit" class="btn rounded-circle btn-outline-danger">
                                                <i class="zmdi zmdi-delete"></i>
                                            </button>
                                        </form>
                                    </div>

                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <form action="{{route('items.create')}}" method="POST">
                                    @csrf
                                    <td>#</td>
                                    <td><input type='text' name='name_ar'></td>
                                    <td><input type='text' name='name_en'></td>
                                    <td><input type='text' name='unite_ar'></td>
                                    <td><input type='text' name='unite_en'></td>
                                    <td>
                                        <div class='btn-group'>
                                           <button Type="submit" class="btn rounded-circle btn-outline-danger">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </button>
                                           </div>
                                        </td>
                                </form>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function () {
        $div=$('#added-items');
        $addBtn=$('#add-btn');
        $addBtn.click(function(){
            $div.append("<tr>\n "+
                "<form action=\"{!! route('items.store') !!}\">\n"+
                    "<td>#</td>\n"+
                    "<td><input type='text' name='name_ar' ></td>\n"+
                    "<td><input type='text' name='name_en' ></td>\n"+
                    "<td><input type='text' name='unite_ar'></td>\n"+
                    "<td><input type='text' name='unite_en'></td>\n"+
                    "<td>\n"+
                        "<div class='btn-group'>\n"+
                            "<button type='submit' class='btn btn-outline-primary rounded-circle'>\n"+
                                "<i class='zmdi zmdi-edit'></i>\n"+
                            "</button>\n"+
                        "</div>\n"+
                    "</td>\n"+
                "</form>\n"+
                "<td>\n"+
                    "<div id='del-btn' class='btn-group'>\n"+
                            "<button  class='btn rounded-circle btn-outline-danger'>\n"+
                                "<i class='zmdi zmdi-delete'></i>\n"+
                            "</button>\n"+
                    "</div>\n"+
                "</td>\n"+
            "</tr>\n"
            );
        })
    });
</script>
@endsection
