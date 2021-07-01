@extends('charities.layout')
@section('create_href',"#")
@section('create_word',__('Write a new article'))
@section('middile')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card rounded">

                <!-- card-header -->
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <div class="ml-2">
                                <img class="img-xs rounded-circle"
                                    src="{{ asset(config('path.ch_logo') . $charity->logo) }}" alt="">
                                <span>
                                    @if (config('app.locale') == 'ar')
                                        {{ $charity->name_ar }}
                                    @else
                                        {{ $charity->name_en }}
                                    @endif
                                </span>
                            </div>
                        </div>

                        <!-- choice -->
                        <div class="dropdown">
                            {{-- <span class="tx-11 text-muted">{{ $artical->created_at }}</span> --}}
                            <button class="btn p-0" type="button" id="dropdownMenuButton2" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-more-horizontal icon-lg pb-3px">
                                    <circle cx="12" cy="12" r="1"></circle>
                                    <circle cx="19" cy="12" r="1"></circle>
                                    <circle cx="5" cy="12" r="1"></circle>
                                </svg>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-copy icon-sm mr-2">
                                        <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                        <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                    </svg> <span class="">Copy link</span></a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- card-body -->
                <!-- text with image -->
                <div class="card-body ">
                    <p class="mb-3 tx-14">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus minima
                        delectus nemo unde quae recusandae assumenda.</p>
                    <img class="card-img-bottom" src="{{ asset(config('path.ch_logo') . $charity->logo) }}" alt="" style="max-block-size: 25rem">
                </div>

                {{-- <div class="card-footer">
                    <div class="d-flex post-actions">
                        <a href="javascript:;" class="d-flex align-items-center text-muted mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-heart icon-md">
                                <path
                                    d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                                </path>
                            </svg>
                            <span class="d-none d-md-block ml-2">{{ __('Like') }}</span>
                        </a>
                        <a href="javascript:;" class="d-flex align-items-center text-muted mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-message-square icon-md">
                                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                            </svg>
                            <span class="d-none d-md-block ml-2">{{ __('Comment') }}</span>
                        </a>
                        <a href="javascript:;" class="d-flex align-items-center text-muted">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-share icon-md">
                                <path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"></path>
                                <polyline points="16 6 12 2 8 6"></polyline>
                                <line x1="12" y1="2" x2="12" y2="15"></line>
                            </svg>
                            <span class="d-none d-md-block ml-2">{{ __('Share') }}</span>
                        </a>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
@endsection
