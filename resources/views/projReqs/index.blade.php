@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">{{__('Manage Project Requirment')}}
                    <a id="top-plus" href="{{route('projReqs.create',$project)}}"
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
                                <th scope="col">{{ __('Name AR') }}</th>
                                <th scope="col">{{ __('Details AR') }}</th>
                                <th scope="col">{{ __('Name EN') }}</th>
                                <th scope="col">{{ __('Details EN') }}</th>
                                <th scope="col">{{ __('Quantity') }}</th>
                                <th scope="col">{{ __('State') }}</th>
                                <th scope="col" width="150">{{ __('Control') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projReqs as $projReq)
                            <tr>
                                <th scope="row">{{ $projReq->id }}</th>
                                <td>{{ $projReq->name_ar }}</td>
                                <td>{{ $projReq->details_ar}}</td>
                                <td>{{ $projReq->name_en }}</td>
                                <td>{{ $projReq->details_en}}</td>
                                <td>{{ $projReq->quantity }}</td>
                                <td>{{ $projReq->state }}
                                    {{($projReq->completePercent())}}%
                                    @if($projReq->state != "closed")
                                    <form action="{{ route('projReqs.close', $projReq->id) }}" method="POST">
                                        @csrf
                                        @method('put')
                                        <button Type="submit" class="btn btn-outline-danger">
                                            {{__('completed')}}
                                        </button>
                                    </form>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group-justified">
                                        <div class="btn-group">
                                            <a class="btn btn-outline-info"
                                                href="{{ route('projReqs.fills.index', $projReq->id) }}">
                                                {{__("manage fills")}}
                                            </a></div>
                                        <div class="btn-group">
                                            <a class="btn btn-outline-warning rounded-circle"
                                                href="{{ route('projReqs.edit', $projReq->id) }}">
                                                <i class="zmdi zmdi-edit"></i>
                                            </a>
                                        </div>
                                        <div class="btn-group">
                                            <form action="{{ route('projReqs.destroy', $projReq->id) }}" method="POST">
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
