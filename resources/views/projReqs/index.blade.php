@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">{{__('Manage Jobs')}}
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
                                <th scope="col">{{ __('project') }}</th>
                                <th scope="col">{{ __('name_ar') }}</th>
                                <th scope="col">{{ __('details_ar') }}</th>
                                <th scope="col">{{ __('name_en') }}</th>
                                <th scope="col">{{ __('details_en') }}</th>
                                <th scope="col">{{ __('quantity') }}</th>
                                <th scope="col">{{ __('state') }}</th>
                                <th scope="col" width="150">{{ __('Control') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projReqs as $projReq)
                            <tr>
                                <th scope="row">{{ $projReq->id }}</th>
                                <td>{{ $projReq->project->title_ar}}</td>
                                <td>{{ $projReq->name_ar }}</td>
                                <td>{{ $projReq->details_ar}}</td>
                                <td>{{ $projReq->details_en}}</td>
                                <td>{{ $projReq->quantity }}</td>
                                <td>{{ $projReq->state }}</td>
                                <td>
                                    <div class="btn-group-justified">

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