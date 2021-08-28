@extends('search.show')
@section('search_class', __('Shortages'))
@section('search_form_action', route('search.getShortages'))
@section('search_middile')

    <div class="result-body">
        <div class="table-responsive">
            <table class="table widget-26">
                <thead>
                    <tr>
                        <th scope="col">{{ __('id') }}</th>
                        <th scope="col">{{ __('Charity Logo') }}</th>
                        <th scope="col">{{ __('Item') }}</th>
                        <th scope="col">{{ __('Charity') }}</th>
                        <th scope="col">{{ __('Quantity') }}</th>
                        <th scope="col" width="150">{{ __('Control') }}</th>
                    </tr>
                </thead>
                @foreach ($shortages as $shortage)
                    <tr>
                        <th scope="row">{{ $shortage->id }}</th>
                        <td>
                            <div class="widget-26-job-emp-img">
                                <img src="{{ asset(config('path.ch_logo') . $shortage->charity->logo) }}" alt="" />
                            </div>
                        </td>
                        <td>
                            <div class="widget-26-job-info">
                                @if (config('app.locale') == 'ar')
                                    <p class="m-0">{{ $shortage->item->name_ar }}</p>
                                @else
                                    <p class="m-0">{{ $shortage->item->name_en }}</p>
                                @endif
                            </div>
                        </td>
                        <td>
                            <div class="widget-26-job-info">
                                <a href="{{ route('charities.show', $shortage->charity) }}">
                                    @if (config('app.locale') == 'ar')
                                        <p class="m-0">{{ $shortage->charity->name_ar }}</p>
                                    @else
                                        <p class="m-0">{{ $shortage->charity->name_en }}</p>
                                    @endif
                                </a>
                            </div>
                        </td>
                        <td>
                            <div class="widget-26-job-info">
                                <p class="type m-0">{{ number_format($shortage->quantity) }}</p>
                            </div>
                        </td>
                        <td>
                            <div class="widget-26-job-info">
                                <button class="btn btn-light btn-icon-text btn-edit-profile">
                                    <a href="{{ route('fills.create', $shortage) }}">
                                        {{ __('Fill') }}
                                    </a>
                                </button>
                                {{-- <button class="btn btn-light btn-icon-text btn-edit-profile">
                                        <a href="#">
                                            {{ __('Message') }}
                                        </a>
                                    </button> --}}
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
