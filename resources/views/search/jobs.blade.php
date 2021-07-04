@extends('search.show')
@section('middile')

    <div class="result-body">
        <div class="table-responsive">
            <table class="table widget-26">
                @foreach ($jobs as $job)
                    <tbody>
                        <tr>
                            <td>
                                <div class="widget-26-job-emp-img">
                                    <img src="{{ asset(config('path.ch_logo') . $job->charity->logo) }}" alt="" />
                                </div>
                            </td>
                            <td>
                                <div class="widget-26-job-title">
                                    <a href="{{ route('charities.show', $job->charity) }}">
                                        <span>
                                            @if (config('app.locale') == 'ar')
                                                {{ $job->job_title_ar }}
                                                <p class="m-0"><a href="{{ route('charities.show', $job->charity) }}"
                                                        class="employer-name">{{ $job->job_title_en }}</a></p>
                                            @else
                                                {{ $job->job_title_en }}
                                                <p class="m-0"><a href="{{ route('charities.show', $job->charity) }}"
                                                        class="employer-name">{{ $job->job_title_ar }}</a></p>
                                            @endif
                                        </span>
                                    </a>
                                </div>
                            </td>
                             <td>
                                <div class="widget-26-job-title">
                                        <a href="{{ route('charities.show', $job->charity) }}">
                                            <span>
                                                @if (config('app.locale') == 'ar')
                                                    {{ $job->charity->name_ar }}
                                                    <p class="m-0"><a href="{{ route('charities.show', $job->charity) }}"
                                                            class="employer-name">{{ $job->charity->name_en }}</a></p>
                                                @else
                                                    {{ $job->charity->name_en }}
                                                    <p class="m-0"><a href="{{ route('charities.show', $job->charity) }}"
                                                            class="employer-name">{{ $job->charity->name_ar }}</a></p>
                                                @endif
                                            </span>
                                        </a>
                                </div>
                            </td>
                            <td>
                                <div class="widget-26-job-info">
                                    @if (config('app.locale') == 'ar')
                                        <p class="type m-0">{{ $job->job_details_ar }}</p>
                                        <p class="text-muted m-0">{{ $job->job_details_en }}</p>
                                    @else
                                        <p class="type m-0">{{ $job->job_details_en }}</p>
                                        <p class="text-muted m-0">{{ $job->job_details_ar }}</p>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>
@endsection
