@extends('search.show')
@section('search_class', __('Project'))
@section('search_form_action', route('search.getProjects'))
@section('search_middile')
    <div class="result-body">
        <div class="table-responsive">
            <table class="table widget-26">
                <thead>
                    <tr>
                        <th scope="col">{{ __('id') }}</th>
                        <th scope="col">{{ __('Image') }}</th>
                        <th scope="col">{{ __('Title') }}</th>
                        <th scope="col">{{ __('Charity') }}</th>
                        <th scope="col">{{ __('Text') }}</th>
                        <th scope="col" width="150">{{ __('Control') }}</th>
                    </tr>
                </thead>
                @foreach ($projects as $project)
                    <tr>
                        <th scope="row">{{ $project->id }}</th>
                        <td>
                            <div class="widget-26-job-emp-img">
                                <img src="{{ asset(config('path.pro_img') . $project->image) }}" alt="" />
                            </div>
                        </td>
                        <td>
                            <div class="widget-26-job-info">
                                @if (config('app.locale') == 'ar')
                                    <p class="m-0">{{ $project->title_ar }}</p>
                                @else
                                    <p class="m-0">{{ $project->title_en }}</p>
                                @endif
                            </div>
                        </td>
                        <td>
                            <div class="widget-26-job-info">
                                <a href="{{ route('charities.show', $project->charity) }}">
                                    @if (config('app.locale') == 'ar')
                                        <p class="m-0">{{ $project->charity->name_ar }}</p>
                                    @else
                                        <p class="m-0">{{ $project->charity->name_en }}</p>
                                    @endif
                                </a>
                            </div>
                        </td>
                        <td>
                            <div class="widget-26-job-info">
                                @if (config('app.locale') == 'ar')
                                    <p class="type m-0">{{ $project->text_ar }}</p>
                                @else
                                    <p class="type m-0">{{ $project->text_en }}</p>
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
    {{ $projects->links() }}
@endsection
