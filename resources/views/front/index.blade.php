
@extends('layouts.front')

@section('content')
<div class="container pt-3">
    <div class="row text-center mb-3">
        <img src="{{asset('assets/front/img/tt.jpg')}}" width="60%" height="90" alt="" class=" m-auto">
    </div>
    <div class="row mb-3">
        <div class="col-md-8 pb-4">
            <div class="main-news">
                <a href="{{ route('content', $article->id) }}">
                    <div class="img-main-news">
                        <img src="{{ $article->images->first()->image_url }}" alt="" class="w-100" height="430">
                    </div>
                    <div class="main-news-body">
                        <h2 class="pr-3">{{ $article->title }}</h2>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card" style="width: 100%">
                <ul class="list-group list-group-flush p-0" style="position: relative;">
                    <div class="list-Latest-news-title mr-2 mb-3"> أخر الاخبار</div>


                @isset($articles)
                    @foreach($articles as $last_art)
                    <a href="{{ route('content', $last_art->id) }}">
                        <li class="list-group-item d-flex flex-row">
                            <img src="{{ $last_art->images->first()->image_url }}" alt="" width="85" height="70">
                            {!! $last_art->title !!}
                        </li>
                    </a>
                    @endforeach
                @endisset

                </ul>
            </div>
        </div>
    </div>

@endsection
