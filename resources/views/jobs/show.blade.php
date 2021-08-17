@extends('layouts.app')
@section('style')
    <!-- include my style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/job.css') }}">
@endsection
@section('content')
    <article class="post vt-post">
        <div class="row">
            <div class="col-xs-12 col-sm-5 col-md-5 col-lg-4">
                <div class="post-type post-img">
                    <a href="#"><img src="{{ asset(config('path.ch_logo') . $job->charity->logo) }}"
                            class="img-responsive" alt="image post"></a>
                </div>
                <div class="author-info author-info-2">
                    <ul class="list-inline">
                        <li>
                            <div class="info">
                                <p>Posted on:</p>
                            </div>
                        </li>
                        <li>
                            <div class="info">
                                <p>{{ $job->created_at }}</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-8">
                <div class="caption">
                    <h3 class="md-heading"><a href="#">The Heading Text Size Should Match</a></h3>
                    <p> Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec
                        ullamcorper nulla non metus auctor fringilla. </p>
                    <a class="btn btn-default" href="#" role="button">Read More</a>
                </div>
            </div>
        </div>
    </article>
    <div class="col-md-8 ">
        <div class="media g-mb-30 media-comment">
            <img class="d-flex g-width-50 g-height-50 rounded-circle g-mt-3 g-mr-15"
                src="{{ asset(config('path.ch_logo') . $job->charity->logo) }}" alt="Image Description">
            <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">
                <h3>
                    @if (config('app.locale') == 'ar')
                        {{ $job->job_title_ar }}
                    @else
                        {{ $job->job_title_en }}
                    @endif
                </h3>

                <p>
                    @if (config('app.locale') == 'ar')
                        {{ $job->job_details_ar }}
                    @else
                        {{ $job->job_details_en }}
                    @endif
                </p>
            </div>
        </div>
    </div>
@endsection
