@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">{{ __('Manage Projects') }}
                        <a id="top-plus" href="{{ route('projects.create') }}"
                            class="btn btn-outline-success  float-left">
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
                                    <th scope="col">{{ __('Title') }}</th>
                                    <th scope="col">{{ __('Created at') }}</th>
                                    <th scope="col">{{ __('Image') }}</th>
                                    <th scope="col">{{ __('State') }}</th>
                                    <th scope="col" width="150">{{ __('Control') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($projects as $project)
                                    <tr>
                                        <th scope="row">{{ $project->id }}</th>
                                        <td>
                                            @if (config('app.locale') == 'ar')
                                                {{ $project->title_ar }}
                                            @else
                                                {{ $project->title_en }}
                                            @endif
                                        </td>
                                        <td>{{ $project->created_at }}</td>
                                        <td style="width:10% ; max-width:15%;"><img
                                                src="{{ asset(config('path.pro_img') . $project->image) }}"
                                                class=" img-fluid img-thumbnail">
                                        </td>
                                        <td>{{ __($project->state) }}
                                            <br>
                                            {{ round($project->completePercent()) }}%
                                            @if ($project->state != 'closed')

                                                <form action="{{ route('projects.close', $project->id) }}" method="POST">
                                                    @csrf
                                                    @method('put')

                                                    <button Type="submit" class="btn btn-outline-danger">
                                                        {{ __('Completed') }}
                                                    </button>
                                                </form>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group-justified">
                                                <div class="btn-group">
                                                    <a class="btn btn-outline-primary my-1"
                                                        href="{{ route('projReqs.index', $project) }}">
                                                        {{ __('Manage Requirments') }}
                                                    </a>
                                                </div>
                                                <div class="btn-group">
                                                    <a class="btn btn-outline-warning rounded-circle"
                                                        href="{{ route('projects.edit', $project->id) }}">
                                                        <i class="zmdi zmdi-edit"></i>
                                                    </a>
                                                </div>
                                                <div class="btn-group">
                                                    <a class="btn btn-outline-primary rounded-circle"
                                                        href="{{ route('projects.show', $project) }}">
                                                        <i class="zmdi zmdi-eye"></i>
                                                    </a>
                                                </div>
                                                <div class="btn-group">
                                                    <form action="{{ route('projects.destroy', $project->id) }}"
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
