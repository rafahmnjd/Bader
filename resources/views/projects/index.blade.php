@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">{{__('Manage Jobs')}}
                <a id="top-plus" href="{{route('projects.create')}}" class="btn btn-outline-success btn-sm float-left">
                    <i class="zmdi zmdi-plus"></i>
                </a></h5>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">{{ __('id') }}</th>
                                <th scope="col">{{ __('project_title_ar') }}</th>
                                <th scope="col">{{ __('project_title_en') }}</th>
                                <th scope="col">{{ __('project_details_ar') }}</th>
                                <th scope="col">{{ __('project_details_en') }}</th>
                                <th scope="col">{{ __('created_at') }}</th>
                                <th scope="col">{{ __('location_ar') }}</th>
                                <th scope="col">{{ __('location_en') }}</th>
                                <th scope="col">{{ __('tag') }}</th>
                                <th scope="col">{{ __('state') }}</th>

                                <th scope="col" width="150">{{ __('Control') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projects as $project)
                            <tr>
                                <th scope="row">{{ $project->id }}</th>
                                <td>{{ $project->project_title_ar }}</td>
                                <td>{{ $project->project_title_en }}</td>
                                <td>{{ $project->project_details_ar}}</td>
                                <td>{{ $project->project_details_en}}</td>
                                <td>{{ $project->created_at }}</td>
                                <td>{{ $project->location_ar }}</td><td>{{ $project->location_en}}</td>
                                <td>{{ $project->tag }}</td>
                                <td>{{ $project->state }}</td>


                                <td>
                                    <div class="btn-group-justified">
                                        {{-- <div class="btn-group">
                                            <a class="btn btn-outline-primary rounded-circle"
                                                href="{{ route('projects.show', $project->id) }}">
                                                <i class="zmdi zmdi-eye"></i>
                                            </a>
                                        </div> --}}
                                        <div class="btn-group">
                                            <a class="btn btn-outline-warning rounded-circle"
                                                href="{{ route('projects.edit', $project->id) }}">
                                                <i class="zmdi zmdi-edit"></i>
                                            </a>
                                        </div>
                                        <div class="btn-group">
                                            <form action="{{ route('projects.destroy', $project->id) }}" method="POST">
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
