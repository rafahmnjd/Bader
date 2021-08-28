@extends('charities.layout',['charity'=> $thiProj->charity])
@section('side_bottm')
<div class="card mb-2 shadow">
    <div class="card-body ">
        <h5 class="card-title">
            {{ __('Newest Projects') }}
        </h5>
        <hr class="mb-0">
        <div class="list-group list-group-flush ">
            @foreach ($projects as $project)
            <a class="list-group-item list-group-item-action px-0" href="{{ route('projects.show', $project) }}">
                <h6 class="font-weight-bold">
                    @if (app()->getLocale() == 'ar')
                    {{ $project->title_ar }} @else {{ $project->title_en }}@endif
                </h6>
                <p class="card-text text-truncate">
                    @if (app()->getLocale() == 'ar')
                    {{ $project->text_ar }}
                    @else {{ $project->text_en }}
                    @endif
                </p>
            </a>
            @endforeach
        </div>
        @if (app()->getLocale() == 'ar')
        <a class="@if (app()->getLocale() == 'ar') float-left
                                        @else
                                            float-right @endif"
            href="{{ route('search.projects') }}">{{ __('View more') }} <i class="fa fa-arrow-circle-left"></i></a>
        @else
        <a class="float-right" href="{{ route('search.projects') }}">{{ __('View more') }} <i
                class="fa fa-arrow-circle-right"></i></a>
        @endif
    </div>
</div>
@endsection
@section('middile')
<div class="card shadow">
    <!-- card-header -->
    <div class="card-header">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <div class="ml-2">
                    <span>
                        <h5 class="card-title">
                            @if (config('app.locale') == 'ar')
                            {{ $thiProj->title_ar }}
                            @else
                            {{ $thiProj->title_en }}
                            @endif
                        </h5>
                    </span>
                </div>
            </div>
            <ul class="d-sm-flex my-0">
                {{ __('Date of publication') }}: {{ $thiProj->created_at }}
            </ul>
        </div>
    </div>
    <!-- card-body -->
    <!-- text with image -->
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <div class="ml-2">
                            <span>
                                <h6 class="mb-3 tx-14">
                                    {{ __('Belonging to') }} :
                                    <a href="{{ route('charities.show', $thiProj->charity) }}">
                                        @if (config('app.locale') == 'ar')
                                        {{ $thiProj->charity->name_ar }}
                                        @else
                                        {{ $thiProj->charity->name_en }}
                                        @endif
                                    </a>
                                </h6>
                            </span>
                        </div>
                    </div>
                    <ul class="d-sm-flex my-0">
                        <div class="card-body">
                            <h5>{{ __('State') }} : {{ __($thiProj->state) }}</h5>
                        </div>

                    </ul>
                </div>
            </div>
            <div class="col-md-6 border" style="max-height: 16rem; overflow-y: scroll;">
                <div data-spy="scroll" data-target="#navbar-example2" data-offset="0">
                    <p>
                        @if (config('app.locale') == 'ar')
                        {{ $thiProj->text_ar }}
                        @else
                        {{ $thiProj->text_en }}
                        @endif
                    </p>
                </div>
            </div>
            <div class="col-md-6"> <img class="card-img-bottom"
                    src="{{ asset(config('path.pro_img') . $thiProj->image) }}" alt="" style="max-block-size: 16rem">
            </div>
        </div>
    </div>
</div>
<br>
<div class="card">
    <div class="card-body">
        <h5 class="card-title">{{__('Project Requirments')}}</h5>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>{{__("Details")}}</th>
                        <th>{{__("Quantity")}}</th>
                        <th>{{__("rest")}}</th>
                        <th colspan="2" style="min-width: 8rem">{{__('percentage')}}</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($thiProj->requirments as $shortage)
                    <tr>
                        <td > @if (config('app.locale') == 'ar')
                            {{-- {{ $shortage->item->name_ar }} --}}
                            {{ $shortage->details_ar }}
                            @else
                            {{ $shortage->details_en }}
                            @endif
                        </td>
                        <td> {{ number_format($shortage->quantity) }}</td>
                        <td> {{ number_format($shortage->rest()) }}</td>
                        <td colspan="2"><small>{{ round($shortage->completePercent()) }}%</small>
                            <div class="progress">
                                <div class="progress-bar" style="width:{{ round($shortage->completePercent()) }}%">
                                </div>
                            </div>
                        </td>
                        <td>
                            {{-- <div class="d-flex justify-content-right"> --}}
                            <button class="btn btn-light btn-icon-text btn-edit-profile">
                                <a href="{{ route('fills.create', $shortage) }}">
                                    {{ __('Fill') }}
                                </a>
                            </button>
                            {{-- </div> --}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
