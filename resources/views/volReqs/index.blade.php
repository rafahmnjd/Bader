@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    @if(!empty($job)) {{$job->naame_ar}}
                    @else {{__('My Jobs Requests')}}
                    @endif
                </h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">{{ __('Volnteer Name') }}</th>
                                <th scope="col">{{ __('Job Title') }}</th>
                                <th scope="col">{{ __('CV') }}</th>
                                <th scope="col">{{ __('State') }}</th>
                                <th scope="col" width="150">{{ __('Control') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jobReqs as $jreq)
                            <tr>
                                <td> @if(config('app.locale')=='ar'){{$jreq->volunteer->name_ar}}@else{{$jreq->volunteer->name_en}} @endif</td>
                                <td> @if(config('app.locale')=='ar'){{$jreq->job->job_title_ar}}@else{{$jreq->job->job_title_en}} @endif</td>
                                <td>
                                    <a href="{{asset(config('path.cvs').'/'.$jreq->cv)}}"
                                        target="__blank()">{{__('show CV')}}</a>
                                </td>
                                <td>{{__($jreq->state)}}</td>
                                <td>
                                    @can('ch_access',$jreq->job->charity)
                                    <form action="{{route('jobReqs.update',$jreq)}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="state" value="accepted">
                                        <button type="submit" class="btn btn-success m-1 @if($jreq->state !="waiting") disabled @endif" >{{__('accepted')}}</button>
                                    </form>
                                    <form action="{{route('jobReqs.update',$jreq)}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="state" value="refused">
                                        <button type="submit" class="btn btn-warning m-1 @if($jreq->state !="waiting") disabled @endif">{{__('refused')}}</button>
                                    </form>
                                    @elsecan('vol_access',$jreq->volunteer)
                                    <form action="{{ route('jobReqs.destroy', $jreq) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button Type="submit" class="btn rounded-circle btn-outline-danger">
                                            <i class="zmdi zmdi-delete m-1"></i>
                                        </button>
                                    </form>
                                    @endcan
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
