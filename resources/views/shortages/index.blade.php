@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        <a id="top-plus" href="{{route('shortages.create')}}" class="btn btn-outline-success btn-sm float-left">
            <i class="zmdi zmdi-plus"></i>
        </a>
    </div>
    <div class="card-body row">
        <div class="col-md-6 ">
            <h5 class="card-title">{{__('Manage Surplus')}}</h5>
            <div class="table-responsive border">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">{{ __('id') }}</th>
                            <th scope="col">{{ __('Charity') }}</th>
                            <th scope="col">{{ __('Quantity') }}</th>
                            <th scope="col">{{ __('Type') }}</th>
                            <th scope="col">{{ __('Item') }}</th>
                            <th scope="col">{{ __('Created at') }}</th>
                            <th scope="col">{{ __('State') }}</th>
                            <th scope="col" width="150">{{ __('Control') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($surpluses as $sur)
                        <tr>
                            <th scope="row">{{ $sur->id }}</th>
                            <td>{{ $sur->charity_id }}</td>
                            <td>{{ $sur->quantity }}</td>
                            <td>{{ $sur->type}}</td>
                            <td>{{ $sur->item->name_ar}} , {{ $sur->item->name_en}}</td>
                            <td>{{ $sur->created_at }}</td>
                            <td>{{ $sur->state }}</td>
                            <td>

                                <div class="btn-group-justified">

                                    <div class="btn-group">
                                        <a class="btn btn-outline-warning rounded-circle"
                                            href="{{ route('shortages.edit', $sur->id) }}">
                                            <i class="zmdi zmdi-edit"></i>
                                        </a>
                                    </div>
                                    <div class="btn-group">
                                        <form action="{{ route('shortages.destroy', $sur->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button Type="submit" class="btn rounded-circle btn-outline-danger">
                                                <i class="zmdi zmdi-delete"></i>
                                            </button>
                                        </form>
                                    </div>
                                    </div>
                                <div class="btn-group-justified py-1">
                                    <div class="btn-group">
                                        <a class="btn btn-outline-primary" href="{{ route('fills.index', $sur->id) }}">
                                            fills
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-6">
            <h5 class="card-title">{{__('Manage Shortage')}}</h5>
            <div class="table-responsive border">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">{{ __('id') }}</th>
                            <th scope="col">{{ __('Charity') }}</th>
                            <th scope="col">{{ __('Quantity') }}</th>
                            <th scope="col">{{ __('Type') }}</th>
                            <th scope="col">{{ __('Item') }}</th>
                            <th scope="col">{{ __('Created at') }}</th>
                            <th scope="col">{{ __('State') }}</th>
                            <th scope="col" width="150">{{ __('Control') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($shortages as $shortage)
                        <tr>
                            <th scope="row">{{ $shortage->id }}</th>
                            <td>{{ $shortage->charity_id }}</td>
                            <td>{{ $shortage->quantity }}</td>
                            <td>{{ $shortage->type}}</td>
                            <td>{{ $shortage->item->name_ar}} , {{ $shortage->item->name_en}}</td>
                            <td>{{ $shortage->created_at }}</td>
                            <td>{{ $shortage->state }}</td>
                            <td>
                                <div class="btn-group-justified">
                                    <div class="btn-group">
                                        <a class="btn btn-outline-warning rounded-circle"
                                            href="{{ route('shortages.edit', $shortage->id) }}">
                                            <i class="zmdi zmdi-edit"></i>
                                        </a>
                                    </div>
                                    <div class="btn-group">
                                        <form action="{{ route('shortages.destroy', $shortage->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button Type="submit" class="btn rounded-circle btn-outline-danger">
                                                <i class="zmdi zmdi-delete"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <div class="btn-group-justified py-1">
                                    <div class="btn-group ">
                                        <a class="btn btn-outline-primary"
                                            href="{{ route('fills.index', $shortage->id) }}">
                                            fills
                                        </a>
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
@endsection
