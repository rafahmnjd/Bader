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
                                <th scope="col">{{ __('Name') }}</th>
                                <th scope="col">{{ __('Profile_pic') }}</th>
                                <th scope="col">{{ __('Birthday') }}</th>
                                <th scope="col">{{ __('Email') }}</th>
                                <th scope="col">{{ __('Education') }}</th>
                                <th scope="col">{{ __('Skills') }}</th>
                                <th scope="col">{{ __('Experiences') }}</th>
                                <th scope="col" width="150">{{ __('Control') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($volunteers as $volunteer)
                            <tr>
                                <th scope="row">
                                    {{ $volunteer->id }}
                                </th>

                                <td>
                                    @if (config('app.locale') == 'ar')
                                    {{ $volunteer->name_ar }}
                                    @else
                                    {{ $volunteer->name_en }}
                                    @endif
                                </td>

                                <td style="width:10% ; max-width:15%;">

                                    <img src="{{ asset(config('path.vprofile').$volunteer->profile) }}"
                                        class=" img-fluid img-thumbnail">
                                </td>


                                <td>{{ $volunteer->birth_date }}</td>
                                <td>{{ $volunteer->email }}</td>

                                <td>
                                    @if (config('app.locale') == 'ar')
                                    {{ $volunteer->education_ar }}
                                    @else
                                    {{ $volunteer->education_en }}
                                    @endif
                                </td>

                                <td>
                                    @if (config('app.locale') == 'ar')
                                    {{ $volunteer->skills_ar }}
                                    @else
                                    {{ $volunteer->skills_en }}
                                    @endif
                                </td>

                                <td>
                                    @if (config('app.locale') == 'ar')
                                    {{ $volunteer->experiences_ar }}
                                    @else
                                    {{ $volunteer->experiences_en }}
                                    @endif
                                </td>


                                <td>
                                    <div class="btn-group-justified">
                                        <div class="btn-group">
                                            <a class="btn btn-outline-primary rounded-circle"
                                                href="{{ route('volunteers.show', $volunteer->id) }}">
                                                <i class="zmdi zmdi-eye"></i>
                                            </a>
                                        </div>
                                        <div class="btn-group">
                                            <a class="btn btn-outline-warning rounded-circle"
                                                href="{{ route('volunteers.edit', $volunteer->id) }}">
                                                <i class="zmdi zmdi-edit"></i>
                                            </a>
                                        </div>
                                        <div class="btn-group">
                                            <form action="{{ route('volunteers.destroy', $volunteer->id) }}"
                                                method="POST">
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
