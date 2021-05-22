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
                                {{-- <th scope="col">{{ __('user_id') }}</th> --}}
                                <th scope="col">{{ __('Arabic Name') }}</th>
                                <th scope="col">{{ __('English Name') }}</th>
                                <th scope="col">{{ __('License') }}</th>
                                <th scope="col">{{ __('Email') }}</th>
                                <th scope="col">{{ __('Phone') }}</th>
                                <th scope="col">{{ __('Mobile') }}</th>
                                <th scope="col">{{ __('Whatsapp') }}</th>
                                <th scope="col">{{ __('Facebook') }}</th>
                                <th scope="col">{{ __('Info_AR') }}</th>
                                <th scope="col">{{ __('Info_EN') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($charities as $charity)
                            <tr>
                                <th scope="row">
                                    {{ $charity->id }}</th>
                                {{-- <td>{{ $charity->user_id }}</td> --}}

                                <td>{{ $charity->name_ar }}</td>
                                <td>{{ $charity->name_en }}</td>
                                
                                
                                <td>
                                    @if (!empty($charity->license))
                                    @if (config('app.locale') == 'ar')
                                    {{ $charity->license->name_ar }}
                                    @else
                                    {{ $charity->license->name_en }}
                                    @endif
                                    @endif
                                </td>
                                <td>
                                    @if (!empty($charity->email))
                                    @if (config('app.locale') == 'ar')
                                    {{ $charity->email->name_ar }}
                                    @else
                                    {{ $charity->email->name_en }}
                                    @endif
                                    @endif
                                </td>
                                 

                                <td>{{ $charity->phone }}</td>
                                <td>{{ $charity->mobile }}</td>
                                <td>{{ $charity->whatsapp }}</td>
                                <td>{{ $charity->facebook }}</td>
                                <td>{{ $charity->info_ar }}</td>                                
                                <td>{{ $charity->info_en }}</td>

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
