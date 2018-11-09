@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h2>{{$question->title}}</h2>
                            <div class="ml-auto">
                                <a href="{{route('questions.index')}}" class="btn btn-outline-primary">Back to all Questions</a>
                            </div>
                        </div>

                    </div>

                    <div class="card-body">
                       {!! $question->body_html !!}

                        <div class="float-right">
                                                <span class="text-muted">
                                                    Asked {{$question->created_date}}
                                                </span>
                            <div class="media">
                                <a href="{{$question->user->url}}" class="pr-2">
                                    <img width="32" src="{{$question->user->avatar}}" alt="">
                                </a>
                                <div class="medi-body mt-1">
                                    <a href="{{$question->user->url}}">{{$question->user->name}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h2>{{$question->answers_count . " " . str_plural('Answer', $question->answers_count)}}</h2>
                        </div>
                        <hr>
                        @foreach($question->answers as $answer)
                                    <div class="media mb-1">
                                        <div class="media-body">
                                            {!! $answer->body_html !!}
                                            <div class="float-right">
                                                <span class="text-muted">
                                                    Answered {{$answer->created_date}}
                                                </span>
                                                <div class="media">
                                                    <a href="{{$answer->user->url}}" class="pr-2">
                                                        <img width="32" src="{{$answer->user->avatar}}" alt="">
                                                    </a>
                                                    <div class="medi-body mt-1">
                                                        <a href="{{$answer->user->url}}">{{$answer->user->name}}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <hr>
                        @endforeach

                    </div>
                </div>
            </div>

        </div>
@endsection
