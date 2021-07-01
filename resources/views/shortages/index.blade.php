@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">{{__('Manage shortages')}}
                    <a id="top-plus" href="{{route('shortages.create')}}" class="btn btn-outline-success  float-left">
                        <i class="zmdi zmdi-plus"></i>
                    </a>
                </h5>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">{{ __('id') }}</th>
                                <th scope="col">{{ __('charity_id') }}</th>
                                <th scope="col">{{ __('quantity') }}</th>
                                <th scope="col">{{ __('type') }}</th>
                                <th scope="col">{{ __('item_id') }}</th>
                                <th scope="col">{{ __('created_at') }}</th>
                                <th scope="col">{{ __('state') }}</th>

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
                                <td>{{ $shortage->item_id}}</td>
                                <td>{{ $shortage->created_at }}</td>
                                <td>{{ $shortage->state }}</td>


                                <td>
                                    <div class="btn-group-justified">
                                        {{-- <div class="btn-group">
                                            <a class="btn btn-outline-primary rounded-circle"
                                                href="{{ route('shortages.show', $shortage->id) }}">
                                        <i class="zmdi zmdi-eye"></i>
                                        </a>
                                    </div> --}}
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
