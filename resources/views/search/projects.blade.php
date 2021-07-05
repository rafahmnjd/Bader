@extends('search.show')
@section('search_class',__("Project"))
@section('search_form_action',route('search.getProjects'))
@section('search_middile')
    <div class="result-body">
        <div class="table-responsive">
            <table class="table widget-26">
                @foreach ($projects as $project)
                    <tbody>
                        <tr>
                            <td>
                                <div class="widget-26-job-emp-img">
                                    <img src="{{ asset(config('path.pro_img') . $project->image) }}" alt="" />
                                </div>
                            </td>
                            <td>
                                <div class="widget-26-job-title">
                                        <span>
                                            @if (config('app.locale') == 'ar')
                                                <p class="m-0">{{ $project->title_ar }}</p>
                                                <p class="text-muted m-0">{{ $project->title_en }}</p>
                                            @else
                                                <p class="m-0">{{ $project->title_en }}</p>
                                                <p class="text-muted m-0">{{ $project->title_ar }}</p>
                                            @endif
                                        </span>
                                </div>
                            </td>
                             <td>
                                <div class="widget-26-job-title">
                                        <a href="{{ route('charities.show', $project->charity) }}">
                                            <span>
                                                @if (config('app.locale') == 'ar')
                                                    <p class="m-0">{{ $project->charity->name_ar }}</p>
                                                    <p class="text-muted m-0">{{ $project->charity->name_en }}</p>
                                                @else
                                                    <p class="m-0">{{ $project->charity->name_en }}</p>
                                                    <p class="text-muted m-0">{{ $project->charity->name_ar }}</p>
                                                @endif
                                            </span>
                                        </a>
                                </div>
                            </td>
                            <td>
                                <div class="widget-26-job-info">
                                    @if (config('app.locale') == 'ar')
                                        <p class="type m-0">{{ $project->text_ar }}</p>
                                        <p class="text-muted m-0">{{ $project->text_en }}</p>
                                    @else
                                        <p class="type m-0">{{ $project->text_en }}</p>
                                        <p class="text-muted m-0">{{ $project->text_ar }}</p>
                                    @endif
                                </div>
                            </td>
                            <td>
                                <div class="widget-26-job-info">
                                    <button class="btn btn-light btn-icon-text btn-edit-profile">
                                        <a href="{{ route('charities.projects', $project) }}">
                                            {{ __('Show') }}
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
{{$projects->links()}}
@endsection
