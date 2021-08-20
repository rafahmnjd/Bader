@extends('search.show')
@section('search_class', __('Jobs'))
@section('search_form_action', route('search.getJobs'))
@section('search_middile')

    <div class="result-body">
        <div class="table-responsive">
            <table class="table widget-26">
                <thead>
                    <tr>
                        <th scope="col">{{ __('id') }}</th>
                        <th scope="col">{{ __('Charity Logo') }}</th>
                        <th scope="col">{{ __('Jobs') }}</th>
                        <th scope="col">{{ __('Charity') }}</th>
                        <th scope="col">{{ __('Details') }}</th>
                        <th scope="col" width="150">{{ __('Control') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jobs as $job)
                        <tr>
                            <th scope="row">{{ $job->id }}</th>
                            <td>
                                <div class="widget-26-job-emp-img">
                                    <img src="{{ asset(config('path.ch_logo') . $job->charity->logo) }}" alt="" />
                                </div>
                            </td>
                            <td>
                                <div class="widget-26-job-info">
                                    @if (config('app.locale') == 'ar')
                                        {{ $job->job_title_ar }}
                                    @else
                                        {{ $job->job_title_en }}
                                    @endif
                                </div>
                            </td>
                            <td>
                                <div class="widget-26-job-info">
                                    <a href="{{ route('charities.show', $job->charity) }}">
                                        @if (config('app.locale') == 'ar')
                                            <p class="m-0">{{ $job->charity->name_ar }}</p>
                                        @else
                                            <p class="m-0">{{ $job->charity->name_en }}</p>
                                        @endif
                                    </a>
                                </div>
                            </td>
                            <td>
                                <div class="widget-26-job-info">
                                    @if (config('app.locale') == 'ar')
                                        <p class="type m-0">{{ $job->job_details_ar }}</p>
                                    @else
                                        <p class="type m-0">{{ $job->job_details_en }}</p>
                                    @endif
                                </div>
                            </td>
                            <td>
                                <div class="widget-26-job-info">
                                    <button class="btn btn-light btn-icon-text btn-edit-profile">
                                        <a href="{{route('jobs.show',$job)}}">
                                            {{ __('Apply') }}
                                        </a>
                                    </button>
                                </div>
                            </td>
                        </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
@endsection
@section('search_pagination')
    {{ $jobs->links() }}
@endsection
