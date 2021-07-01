@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">{{__('Manage Jobs')}}
                <a id="top-plus" href="{{route('jobs.create')}}" class="btn btn-outline-success btn-sm float-left">
                    <i class="zmdi zmdi-plus"></i>
                </a></h5>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">{{ __('id') }}</th>
                                <th scope="col">{{ __('job_title_ar') }}</th>
                                <th scope="col">{{ __('job_title_en') }}</th>
                                <th scope="col">{{ __('job_details_ar') }}</th>
                                <th scope="col">{{ __('job_details_en') }}</th>
                                <th scope="col">{{ __('created_at') }}</th>
                                <th scope="col">{{ __('location_ar') }}</th>
                                <th scope="col">{{ __('location_en') }}</th>
                                <th scope="col">{{ __('tag') }}</th>
                                <th scope="col">{{ __('state') }}</th>

                                <th scope="col" width="150">{{ __('Control') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jobs as $job)
                            <tr>
                                <th scope="row">{{ $job->id }}</th>
                                <td>{{ $job->job_title_ar }}</td>
                                <td>{{ $job->job_title_en }}</td>
                                <td>{{ $job->job_details_ar}}</td>
                                <td>{{ $job->job_details_en}}</td>
                                <td>{{ $job->created_at }}</td>
                                <td>{{ $job->location_ar }}</td><td>{{ $job->location_en}}</td>
                                <td>{{ $job->tag }}</td>
                                <td>{{ $job->state }}</td>


                                <td>
                                    <div class="btn-group-justified">
                                        {{-- <div class="btn-group">
                                            <a class="btn btn-outline-primary rounded-circle"
                                                href="{{ route('jobs.show', $job->id) }}">
                                                <i class="zmdi zmdi-eye"></i>
                                            </a>
                                        </div> --}}
                                        <div class="btn-group">
                                            <a class="btn btn-outline-warning rounded-circle"
                                                href="{{ route('jobs.edit', $job->id) }}">
                                                <i class="zmdi zmdi-edit"></i>
                                            </a>
                                        </div>
                                        <div class="btn-group">
                                            <form action="{{ route('jobs.destroy', $job->id) }}" method="POST">
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
