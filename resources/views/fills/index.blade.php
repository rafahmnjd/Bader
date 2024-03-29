@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                @if(!empty($shortage))
                <h5 class="card-title">{{ __('Manage Fills') }}
                    <a id="top-plus" href="{{ route('fills.create', $shortage) }}"
                        class="btn btn-outline-success  float-left">
                        <i class="zmdi zmdi-plus"></i>
                    </a>
                </h5>
                @else
                <h5 class="card-title">{{ __('Manage My Fills') }}</h5>
                @endif
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">{{ __('id') }}</th>
                                <th scope="col">{{ __('Name') }}</th>
                                <th scope="col">{{ __('Type') }}</th>
                                <th scope="col">{{ __('Quantity') }}</th>
                                <th scope="col">{{ __('State') }}</th>
                                <th scope="col" width="150">{{ __('Control') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($fills as $fill)
                            <tr>
                                <th scope="row">{{ $fill->id }}</th>
                                <td>{{ $fill->shortage->item->name_ar }}</td>
                                <td>{{ __($fill->shortage->type) }}</td>
                                <td>{{ number_format($fill->quantity) }}</td>
                                <td>{{ __($fill->state) }}
                                    @can('ch_access', $fill->shortage->charity ?? $fill->shortage->project->charity)
                                    @if ($fill->state != 'completed')
                                    <form action="{{ route('fills.close', $fill->id) }}" method="POST">
                                        @csrf
                                        @method('put')
                                        <button Type="submit" class="btn btn-outline-danger">
                                            {{ __('Completed') }}
                                        </button>
                                    </form>
                                    @endif
                                    @endcan

                                </td>
                                <td>
                                    <div class="btn-group-justified">
                                        @can('fill_access', $fill)
                                        <div class="btn-group">
                                            <a class="btn btn-outline-warning rounded-circle"
                                                href="{{ route('fills.edit', $fill->id) }}">
                                                <i class="zmdi zmdi-edit"></i>
                                            </a>
                                        </div>
                                        <div class="btn-group">
                                            <form action="{{ route('fills.destroy', $fill->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button Type="submit" class="btn rounded-circle btn-outline-danger">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </button>
                                            </form>
                                        </div>
                                        @endcan
                                        <div class="btn-group">
                                            <a class="btn btn-outline-primary"@if(!empty($shortage))
                                                href="{{ route('fill.messages', ['fill'=>$fill,'type'=>1]) }}"
                                                @else
                                                href="{{ route('fill.messages', ['fill'=>$fill,'type'=>0]) }}"
                                                @endif
                                                >
                                                {{ __('Messages') }}
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
