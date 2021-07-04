@extends('search.show')
@section('search_class',__("Shortages"))
@section('search_form_action',route('search.getShortages'))
@section('middile')

    <div class="result-body">
        <div class="table-responsive">
            <table class="table widget-26">
                @foreach ($shortages as $shortage)
                    <tbody>
                        <tr>
                            <td>
                                <div class="widget-26-job-emp-img">
                                    <img src="{{ asset(config('path.ch_logo') . $shortage->charity->logo) }}" alt="" />
                                </div>
                            </td>
                            <td>
                                <div class="widget-26-job-title">
                                    <a href="{{ route('charities.show', $shortage->charity) }}">
                                        <span>
                                            @if (config('app.locale') == 'ar')
                                                {{ $shortage->item->name_ar }}
                                                <p class="m-0"><a href="{{ route('charities.shortage', $shortage->charity) }}"
                                                        class="employer-name">{{$shortage->item->name_en }}</a></p>
                                            @else
                                                {{ $shortage->item->name_en }}
                                                <p class="m-0"><a href="{{ route('charities.shortage', $shortage->charity) }}"
                                                        class="employer-name">{{ $shortage->item->name_ar }}</a></p>
                                            @endif
                                        </span>
                                    </a>
                                </div>
                            </td>
                             <td>
                                <div class="widget-26-job-title">
                                        <a href="{{ route('charities.show', $shortage->charity) }}">
                                            <span>
                                                @if (config('app.locale') == 'ar')
                                                    {{ $shortage->charity->name_ar }}
                                                    <p class="m-0"><a href="{{ route('charities.show', $shortage->charity) }}"
                                                            class="employer-name">{{ $shortage->charity->name_en }}</a></p>
                                                @else
                                                    {{ $shortage->charity->name_en }}
                                                    <p class="m-0"><a href="{{ route('charities.show', $shortage->charity) }}"
                                                            class="employer-name">{{ $shortage->charity->name_ar }}</a></p>
                                                @endif
                                            </span>
                                        </a>
                                </div>
                            </td>
                            <td>
                                <div class="widget-26-job-info">
                                        <p class="type m-0">{{ $shortage->quantity}}</p>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>
@endsection
