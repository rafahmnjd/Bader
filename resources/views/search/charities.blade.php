@extends('search.show')
@section('search_class',__("Charities"))
@section('search_form_action',route('search.getCharities'))
@section('middile')

    <div class="result-body">
        <div class="table-responsive">
            @foreach ($charities as $charity)
                <table class="table widget-26">
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
                                    <p class="type m-0">Full-Time</p>
                                    <p class="text-muted m-0">in <span class="location">London,
                                            UK</span></p>
                                </div>
                            </td>
                            <td>
                                <div class="widget-26-job-salary">$ 50/hr</div>
                            </td>
                            <td>
                                <div class="widget-26-job-category bg-soft-base">
                                    <i class="indicator bg-base"></i>
                                    <span>Software Development</span>
                                </div>
                            </td>
                            <td>
                                <div class="widget-26-job-starred">
                                    <a href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="feather feather-star">
                                            <polygon
                                                points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                            </polygon>
                                        </svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            @endforeach
        </div>
    </div>
@endsection
