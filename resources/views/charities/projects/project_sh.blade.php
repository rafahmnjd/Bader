@extends('charities.layout')
@section('create_href', route('projects.create'))
@section('create_word', __('Add a new project'))
@section('middile')

    <div class="row">
        @foreach ($projects as $project)
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
                                <span class="tx-11 text-muted">{{ $project->created_at }}</span>
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
                                    <a class="dropdown-item d-flex align-items-center" href="{{ route('projReqs.index',$project) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="feather feather-copy icon-sm mr-2">
                                            <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                            <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                        </svg> <span class="">{{__('Show post')}}</span></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- card-body -->
                    <!-- text with image -->
                    <div class="card-body">
                        <h3 class="mb-3 tx-14">
                            @if (config('app.locale') == 'ar')
                                {{ $project->title_ar }}
                            @else
                                {{ $project->title_en }}
                            @endif
                        </h3>
                        <p>
                            @if (config('app.locale') == 'ar')
                                {{ $project->text_ar }}
                            @else
                                {{ $project->text_en }}
                            @endif</p>
                        <p>
                            {{-- @foreach ($projectReq->project->charity as $projectReqs) --}}
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                            <label class="custom-control-label" for="customCheck1">Check this custom checkbox</label>
                        </div>
                        {{-- @endforeach --}}
                        </p>
                        <img class="card-img-bottom" src="{{ asset(config('path.pro_img') . $project->image) }}" alt=""
                            style="max-block-size: 25rem">
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
