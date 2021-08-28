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
                            <ul class="list-inline d-sm-flex my-0">
                                <li class="list-inline-item ml-auto">
                                    <button class="btn btn-light btn-icon-text btn-edit-profile">
                                        <a href="{{ route('projects.show', $project) }}">
                                            {{ __('Show Requirments') }}
                                        </a>
                                    </button>
                                </li>
                            </ul>
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
                            @endif
                        </p>

                        <img class="card-img-bottom" src="{{ asset(config('path.pro_img') . $project->image) }}" alt=""
                            style="max-block-size: 25rem">
                    </div>
                </div>
            </div>

        @endforeach
    </div>
@endsection
