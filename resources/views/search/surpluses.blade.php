@extends('search.show')
@section('search_class', __('Surpluses'))
@section('search_form_action', route('search.getSurpluses'))
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
                @foreach ($surpluses as $surplus)
                    <tr>
                        <th scope="row">{{ $surplus->id }}</th>
                        <td>
                            <div class="widget-26-job-emp-img">
                                <img src="{{ asset(config('path.ch_logo') . $surplus->charity->logo) }}" alt="" />
                            </div>
                        </td>
                        <td>
                            <div class="widget-26-job-info">
                                <span>
                                    @if (config('app.locale') == 'ar')
                                        <p class="m-0">{{ $surplus->item->name_ar }}</p>
                                    @else
                                        <p class="m-0">{{ $surplus->item->name_en }}</p>
                                    @endif
                                </span>
                            </div>
                        </td>
                        <td>
                            <div class="widget-26-job-info">
                                <a href="{{ route('charities.show', $surplus->charity) }}">
                                    <span>
                                        @if (config('app.locale') == 'ar')
                                            <p class="m-0">{{ $surplus->charity->name_ar }}</p>
                                        @else
                                            <p class="m-0">{{ $surplus->charity->name_en }}</p>
                                        @endif
                                    </span>
                                </a>
                            </div>
                        </td>
                        <td>
                            <div class="widget-26-job-info">
                                <p class="type m-0">{{ $surplus->quantity }}</p>
                            </div>
                        </td>
                        <td>
                            <div class="widget-26-job-info">
                                <button class="btn btn-light btn-icon-text btn-edit-profile">
                                    <a href="{{ route('fills.create', $surplus) }}">
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
    {{ $surpluses->links() }}
@endsection
