@extends('layouts.front')


@section('content')



        <div class="row mt-1" style="background: rgba(238, 238, 238, 0.74);">

            <div class="col-md-8 pt-3">
                <div class="row">
                    <div class="col-md-12 mb-5">
                        <h4 class="text-success my-4 font-weight-bold">{{ $depart_articles->first()->title }}</h4>
                        <img src="{{$depart_articles->first()->images->first()->image_url}}" class="img-fluid" alt="">
                        <p class="mt-5">  {!! $depart_articles->first()->content !!} </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card" style="width: 100%">
                    <ul class="list-group list-group-flush p-0" style="position: relative;">
                        <div class="list-Latest-news-title mr-2 mb-3"> أخر الاخبار</div>




                               @foreach($depart_articles as $article)
                                <a href="{{ route('content', $article->id) }}">
                                    <li class="list-group-item d-flex flex-row">
                                        <img src="{{ $article->images->first()->image_url }}" alt="" width="85" height="70">
                                        {!! $article->title !!}
                                    </li>
                                </a>
                                   @endforeach


                    </ul>
                </div>
            </div>
        </div>



@endsection
