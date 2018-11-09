@extends('layouts.app')

@section('content')
    <div class="container">
        <button type="button" class="btn btn-primary">Primary</button>
        <button type="button" class="btn btn-secondary">Secondary</button>
        <button type="button" class="btn btn-success">Success</button>
        <button type="button" class="btn btn-info">Info</button>
        <button type="button" class="btn btn-warning">Warning</button>
        <button type="button" class="btn btn-danger">Danger</button>
        <button type="button" class="btn btn-link">Link</button>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h2>Questions</h2>
                            <div class="ml-auto">
                                <a href="{{route('questions.create')}}" class="btn btn-outline-primary">Ask Question</a>
                            </div>
                        </div>
                        
                    </div>

                    <div class="card-body">
                        @include('layouts._messages')
                        @foreach( $questions as $question)
                            <div class="media">
                                <div class="d-flex flex-column counters">
                                    <div class="vote">
                                        <strong>{{ $question->votes }}</strong> {{str_plural('vote', $question->votes)}}
                                    </div>
                                    <div class="status {{$question->status}} ">
                                        <strong>{{ $question->answers }}</strong> {{str_plural('answer', $question->answers)}}
                                    </div>
                                    <div class="view">
                                        {{ $question->views . str_plural('view', $question->views)}}
                                    </div>
                                </div>
                                <div class="media-body">
                                    <div class="d-flex align-items-center">
                                        <h3 class="mt-0">
                                            <a href="{{$question->url}}">
                                              {{$question->title}}
                                            </a>
                                        </h3>
                                        <div class="ml-auto">
                                            @can('update', $question)
                                                <a href="{{route('questions.edit', $question->id)}}" class="btn btn-sm btn-outline-info">Edit</a>
                                            @endcan
                                                @can('delete', $question)
                                                <form class="form-delete" method="post" action="{{route('questions.destroy', $question->id)}}">
                                                    {{--{{method_field("DELETE")}}--}}
                                                    {{--{{csrf_token()}}--}}
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                                </form>
                                                @endcan
                                        </div>
                                    </div>
                                    
                                    <p class="lead">
                                        Asked by
                                        <a href="{{$question->user->url}}">{{$question->user->name}}</a>
                                        <small class="text-muted">{{$question->created_date}}</small>
                                    </p>
                                    {{str_limit($question->body, 250)}}
                                </div>
                            </div>
                            <hr>
                        @endforeach
                        <div style="justify-content: center">
                            {{$questions->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
