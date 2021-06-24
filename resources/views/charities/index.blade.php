@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">{{ __('id') }}</th>
                                <th scope="col">{{ __('Arabic Name') }}</th>
                                <th scope="col">{{ __('English Name') }}</th>
                                <th scope="col">{{ __('Logo') }}</th>
                                <th scope="col">{{ __('Cover') }}</th>
                                <th scope="col">{{ __('License') }}</th>
                                <th scope="col">{{ __('Email') }}</th>
                                <th scope="col">{{ __('City') }}</th>

                                <th scope="col" width="150">{{ __('Control') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($charities as $charity)
                            <tr>
                                <th scope="row">
                                    {{ $charity->id }}</th>

                                <td>{{ $charity->name_ar }}</td>
                                <td>{{ $charity->name_en }}</td>
                                <td style="width:10% ; max-width:15%;"><img
                                        src="{{ asset(config('path.ch_logo').$charity->logo) }}"
                                        class=" img-fluid img-thumbnail">
                                </td>
                                <td style="width:20% ; max-width:24%;"><img
                                        src="{{ asset(config('path.covers').$charity->cover)}}"
                                        class=" img-fluid img-thumbnail">
                                </td>

                                <td>{{ $charity->license }}</td>
                                <td>{{ $charity->email }}</td>
                                <td>{{ $charity->city }}</td>


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
