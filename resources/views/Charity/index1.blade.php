@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="table table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">{{ __('id') }}</th>
                                <th scope="col">{{ __('name_ar') }}</th>
                                <th scope="col">{{ __('name_en') }}</th>
                                <th scope="col">{{ __('license') }}</th>
                                <th scope="col">{{ __('city') }}</th>
                                <th scope="col">{{ __('logo_ar') }}</th>
                                <th scope="col">{{ __('logo_en') }}</th>
                                <th scope="col">{{ __('cover') }}</th>
                                <th scope="col" width="150">{{ __('Control') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($charities as $charity)
                            <tr>
                                <th scope="row">{{ $charity->id }}</th>
                                <td>{{ $charity->name_ar }}</td>
                                <td>{{ $charity->name_en }}</td>
                                <td>{{ $charity->license }}</td>
                                <td>{{ $charity->city }}</td>
                                <td style="width:10% ; max-width:15%;"><img
                                        src="{{ asset(config('path.ch_logo').$charity->logo_ar) }}"
                                        class=" img-fluid img-thumbnail">
                                </td>
                                <td style="width:10% ; max-width:15%;"><img
                                        src="{{ asset(config('path.ch_logo').$charity->logo_en) }}"
                                        class=" img-fluid img-thumbnail">
                                </td>
                                <td style="width:20% ; max-width:24%;"><img
                                        src="{{ asset(config('path.covers').$charity->cover)}}"
                                        class=" img-fluid img-thumbnail">
                                </td>
                                <td>
                                    <div class="btn-group-justified">
                                        <div class="btn-group">
                                            <a class="btn btn-outline-primary rounded-circle"
                                                href="{{ route('charities.show', $charity->id) }}">
                                                <i class="zmdi zmdi-eye"></i>
                                            </a>
                                        </div>
                                        <div class="btn-group">
                                            <a class="btn btn-outline-warning rounded-circle"
                                                href="{{ route('charities.edit', $charity->id) }}">
                                                <i class="zmdi zmdi-edit"></i>
                                            </a>
                                        </div>
                                        <div class="btn-group">
                                            <form action="{{ route('charities.destroy', $charity->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button Type="submit" class="btn rounded-circle btn-outline-danger">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                                </th>
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