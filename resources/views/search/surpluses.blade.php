@extends('search.show')
@section('search_class',__("Surpluses"))
@section('search_form_action',route('search.getSurpluses'))
@section('search_middile')
     <div class="result-body">
        <div class="table-responsive">
            <table class="table widget-26">
                @foreach ($surpluses as $surplus)
                    <tbody>
                        <tr>
                            <td>
                                <div class="widget-26-job-emp-img">
                                    <img src="{{ asset(config('path.ch_logo') . $surplus->charity->logo) }}" alt="" />
                                </div>
                            </td>
                            <td>
                                <div class="widget-26-job-title">
                                    <a href="{{ route('charities.show', $surplus->charity) }}">
                                        <span>
                                            @if (config('app.locale') == 'ar')
                                                {{ $surplus->item->name_ar }}
                                                <p class="m-0"><a href="{{ route('charities.surplus', $surplus->charity) }}"
                                                        class="employer-name">{{$surplus->item->name_en }}</a></p>
                                            @else
                                                {{ $surplus->item->name_en }}
                                                <p class="m-0"><a href="{{ route('charities.surplus', $surplus->charity) }}"
                                                        class="employer-name">{{ $surplus->item->name_ar }}</a></p>
                                            @endif
                                        </span>
                                    </a>
                                </div>
                            </td>
                             <td>
                                <div class="widget-26-job-title">
                                        <a href="{{ route('charities.show', $surplus->charity) }}">
                                            <span>
                                                @if (config('app.locale') == 'ar')
                                                    {{ $surplus->charity->name_ar }}
                                                    <p class="m-0"><a href="{{ route('charities.show', $surplus->charity) }}"
                                                            class="employer-name">{{ $surplus->charity->name_en }}</a></p>
                                                @else
                                                    {{ $surplus->charity->name_en }}
                                                    <p class="m-0"><a href="{{ route('charities.show', $surplus->charity) }}"
                                                            class="employer-name">{{ $surplus->charity->name_ar }}</a></p>
                                                @endif
                                            </span>
                                        </a>
                                </div>
                            </td>
                            <td>
                                <div class="widget-26-job-info">
                                        <p class="type m-0">{{ $surplus->quantity}}</p>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>


@endsection
