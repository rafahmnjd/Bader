@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">{{__('Manage Jobs')}}
                    <a id="top-plus" href="{{route('projects.create')}}"
                        class="btn btn-outline-success btn-sm float-left">
                        <i class="zmdi zmdi-plus"></i>
                    </a></h5>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">{{ __('id') }}</th>
                                <th scope="col">{{ __('title_ar') }}</th>
                                <th scope="col">{{ __('title_en') }}</th>
                                <th scope="col">{{ __('text_ar') }}</th>
                                <th scope="col">{{ __('text_en') }}</th>
                                <th scope="col">{{ __('created_at') }}</th>
                                <th scope="col">{{ __('Image') }}</th>
                                <th scope="col">{{ __('state') }}</th>
                                <th scope="col" width="150">{{ __('Control') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projects as $project)
                            <tr>
                                <th scope="row">{{ $project->id }}</th>
                                <td>{{ $project->title_ar }}</td>
                                <td>{{ $project->title_en }}</td>
                                <td>{{ $project->text_ar}}</td>
                                <td>{{ $project->text_en}}</td>
                                <td>{{ $project->created_at }}</td>
                                <td style="width:10% ; max-width:15%;"><img
                                        src="{{ asset(config('path.pro_img').$project->image) }}"
                                        class=" img-fluid img-thumbnail">
                                </td>
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
