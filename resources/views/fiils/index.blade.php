@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">{{__('Manage Fills')}}
                    <a id="top-plus" href="{{route('fills.create',$shortage)}}"
                        class="btn btn-outline-success  float-left">
                        <i class="zmdi zmdi-plus"></i>
                    </a></h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">{{ __('id') }}</th>
                                <th scope="col">{{ __('shortage') }}</th>
                                <th scope="col">{{ __('shortage type') }}</th>
                                <th scope="col">{{ __('quantity') }}</th>
                                <th scope="col">{{ __('state') }}</th>
                                <th scope="col" width="150">{{ __('Control') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($fills as $fill)
                            <tr>
                                <th scope="row">{{ $fill->id }}</th>
                                <td>{{ $fill->shortage->item->name_ar}}</td>
                                <td>{{ $fill->shortage->type}}</td>
                                <td>{{ $fill->quantity }}</td>
                                <td>{{ $fill->state }}</td>
                                <td>
                                    <div class="btn-group-justified">

                                        <div class="btn-group">
                                            <a class="btn btn-outline-warning rounded-circle"
                                                href="{{ route('fills.edit', $fill->id) }}">
                                                <i class="zmdi zmdi-edit"></i>
                                            </a>
                                        </div>
                                        <div class="btn-group">
                                            <form action="{{ route('fills.destroy', $fill->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button Type="submit" class="btn rounded-circle btn-outline-danger">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
