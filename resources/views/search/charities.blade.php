@extends('search.show')
@section('middile')

    <div class="result-body">
        <div class="table-responsive">
            <table class="table widget-26">
                @foreach ($charities as $charity)
                    <tbody>
                        <tr>
                            <td>
                                <div class="widget-26-job-emp-img">
                                    <img src="{{ asset(config('path.ch_logo') . $charity->logo) }}" alt="" />
                                </div>
                            </td>
                            <td>
                                <div class="widget-26-job-title">
                                    <a href="{{ route('charities.show', $charity) }}">
                                        <span>
                                            @if (config('app.locale') == 'ar')
                                                {{ $charity->name_ar }}
                                                <p class="m-0"><a href="{{ route('charities.show', $charity) }}"
                                                        class="employer-name">{{ $charity->name_en }}</a></p>
                                            @else
                                                {{ $charity->name_en }}
                                                <p class="m-0"><a href="{{ route('charities.show', $charity) }}"
                                                        class="employer-name">{{ $charity->name_ar }}</a></p>
                                            @endif
                                        </span>
                                    </a>
                                </div>
                            </td>
                            <td>
                                <div class="widget-26-job-info">
                                    @if (config('app.locale') == 'ar')
                                        <p class="type m-0">{{ $charity->address_ar }}</p>
                                        <p class="text-muted m-0">{{ $charity->address_en }}</p>
                                    @else
                                        <p class="type m-0">{{ $charity->address_en }}</p>
                                        <p class="text-muted m-0">{{ $charity->address_ar }}</p>
                                    @endif
                                </div>
                            </td>
                            <td>
                                <div class="widget-26-job-salary"></div>
                            </td>
                            <td>
                                <div class="widget-26-job-info">
                                    @if (config('app.locale') == 'ar')
                                        <p class="type m-0">{{ $charity->info_ar }}</p>
                                        <p class="text-muted m-0">{{ $charity->info_en }}</p>
                                    @else
                                        <p class="type m-0">{{ $charity->info_en }}</p>
                                        <p class="text-muted m-0">{{ $charity->info_ar }}</p>
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
