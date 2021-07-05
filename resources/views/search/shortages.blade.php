@extends('search.show')
@section('search_class', __('Shortages'))
@section('search_form_action', route('search.getShortages'))
@section('search_middile')

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
                                    <span>
                                        @if (config('app.locale') == 'ar')
                                            <p class="m-0">{{ $shortage->item->name_ar }}</p>
                                            <p class="text-muted m-0">{{ $shortage->item->name_en }}</p>
                                        @else
                                            <p class="m-0">{{ $shortage->item->name_en }}</p>
                                            <p class="text-muted m-0">{{ $shortage->item->name_ar }}</p>
                                        @endif
                                    </span>
                                </div>
                            </td>
                            <td>
                                <div class="widget-26-job-title">
                                    <a href="{{ route('charities.show', $shortage->charity) }}">
                                        <span>
                                            @if (config('app.locale') == 'ar')
                                                <p class="m-0">{{ $shortage->charity->name_ar }}</p>
                                                <p class="text-muted m-0">{{ $shortage->charity->name_en }}</p>
                                            @else
                                                <p class="m-0">{{ $shortage->charity->name_en }}</p>
                                                <p class="text-muted m-0">{{ $shortage->charity->name_ar }}</p>
                                            @endif
                                        </span>
                                    </a>
                                </div>
                            </td>
                            <td>
                                <div class="widget-26-job-info">
                                    <p class="type m-0">{{ $shortage->quantity }}</p>
                                </div>
                            </td>
                            <td>
                                <div class="widget-26-job-info">
                                    <button class="btn btn-light btn-icon-text btn-edit-profile">
                                        <a href="#">
                                            {{ __('Fill') }}
                                        </a>
                                    </button>
                                    <button class="btn btn-light btn-icon-text btn-edit-profile">
                                        <a href="#">
                                            {{ __('Message') }}
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
    {{ $shortages->links() }}
@endsection
