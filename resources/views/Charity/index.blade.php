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
                                {{-- <th scope="col">{{ __('suite_id') }}</th> --}}
                                <th scope="col">{{ __('Category') }}</th>
                                <th scope="col">{{ __('Subegory') }}</th>
                                <th scope="col">{{ __('name_ar') }}</th>
                                <th scope="col">{{ __('name_en') }}</th>
                                <th scope="col">{{ __('active') }}</th>
                                <th scope="col">{{ __('descp_ar') }}</th>
                                <th scope="col">{{ __('descp_en') }}</th>
                                <th scope="col">{{ __('hits') }}</th>
                                <th scope="col">{{ __('imgfile') }}</th>
                                <th scope="col">{{ __('Control') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($charities as $charity)
                            <tr>
                                <th scope="row">
                                    {{ $charity->id }}</th>
                                {{-- <td>{{ $charity->suite_id }}</td> --}}
                                <td>
                                    @if (!empty($charity->category))
                                    @if (config('app.locale') == 'ar')
                                    {{ $charity->category->name_ar }}
                                    @else
                                    {{ $charity->category->name_en }}
                                    @endif
                                    @endif
                                </td>
                                <td>
                                    @if (!empty($charity->subcategory))
                                    @if (config('app.locale') == 'ar')
                                    {{ $charity->subcategory->name_ar }}
                                    @else
                                    {{ $charity->subcategory->name_en }}
                                    @endif
                                    @endif
                                </td>



                                <td>{{ $charity->name_ar }}</td>
                                <td>{{ $charity->name_en }}</td>

                                <td>{{ $charity->active }}</td>
                                <td>{{ $charity->descp_ar }}</td>
                                <td>{{ $charity->descp_en }}</td>
                                <td>{{ $charity->hits }}</td>
                                <td style="width:20% ; max-width:24%;"><img
                                        src="{{ asset('storage/charities/' . $charity->imgfile) }}"
                                        class=" img-fluid img-thumbnail">
                                </td>
                                <td>
                                    <div class="btn-group-justified">
                                        <div class="btn-group">
                                            <a class="btn btn-outline-warning rounded-circle"
                                                href="{{ route('charities.edit', $charity->id) }}">
                                                <i class="zmdi zmdi-settings"></i>
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
