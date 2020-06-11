@extends('layouts.app')

@section('meta')
<meta property="og:image:width" content="470px" />
<meta property="og:image:height" content="246px" />
<meta property="og:image" content="https://umpcg.me/storage/cover_image/thumbnail/{{$post->cover_image}}" />
<meta property="og:title" content="{{$post->title}}">
<meta property="og:url" content="https://umpcg.me/posts/{{$post->id}}" />
@endsection

@section('content')
{!! Breadcrumbs::render('post', $post) !!}
<section class="singlePostSection">
    <div style='width:100%; word-wrap: break-word;'>
        <img class="singlePost" src="/storage/cover_image/thumbnail/{{$post->cover_image}}">
        <small style="color:#292663">Objavljeno: {{$post->date}}   </small>
        <h1 style="color:#292663; margin: 10px 0;font-size: 28px;">{{$post->title}}</h1>
        <div style="display:flex;align-items: center; margin: 25px 0;">
            <small style="white-space:nowrap;"> <img src="/img/Pregledi-ikonica copy.svg" alt=""  style="margin-right: 7px;"> {{ $post->views }} pregleda</small>
            <div class="shareBtn">
                <img src="/img/Icons_with_numbers.svg" alt=""><span>Podijeli</span>
                <ul style="list-style:none;">
                    <li><a href="https://www.facebook.com/sharer/sharer.php?u=https://umpcg.me/posts/{{$post->id}}" target="_blank"> <img src="/img/facebook.svg" alt="" style="width:20px;"> </a></li>
                    <li><a href=""> <img src="/img/instagram.svg" alt="" style="width:20px;"> </a></li>
                    <li><a href=""> <img src="/img/twitter.svg" alt="" style="width:20px;"> </a></li>
                </ul>
            </div>
        </div>
        
          <p> {!!$post->body!!}</p>
    </div>


    @if(!Auth::guest())
        @if(Auth::user()->id == $post->user_id)
            <a href="/posts/{{$post->id}}/edit" class="btn btn-default">Izmjeni</a>

            {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Obriši', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
        @endif
    @endif
</section>
@endsection


@section('carousel')
<div class="container-fluid" id="myCarousel" >
<div class="jcarousel-wrapper" id="myCarouselWrapper">
        <div class="jcarousel">
            <ul>
            @foreach($posts as $post)
                <li>
                <div class="postBox carouselPost">
                    <a href="/posts/{{$post->id}}">
                        <span class="category" ></span>
                        <small style="color:#292663">Objavljeno: {{$post->date}}  </small>
                        <div id="imgDiv">
                            <img id="postImg" src="/storage/cover_image/thumbnail/{{$post->cover_image}}"  style="max-height:130px;min-height:130px;">
                        </div>
                        <h3 style="font-size: 22px;">{{$post->title}}</h3>
                        <div>
                            <small  style="display: flex;"> <img src="/img/Pregledi-ikonica copy.svg" alt="" style="margin-right:7px">{{ $post->views }} pregleda</small>     
                       </div>
                    </a>
                </div>
                </li>
                @endforeach 
            </ul>
        </div>
        <a href="#" class="jcarousel-control-prev"><img src="/img/Drop down strelica (1).svg" alt=""></a>
        <a href="#" class="jcarousel-control-next"><img src="/img/Ikonica - strelica udesno.svg" alt="" style="width: 25px;"></a>
    </div>
</div>
@endsection

@section('breadcrumbs')
<div class="container-fluid" id='myBreadcrums'>
<!-- {!! Breadcrumbs::render('post', $post) !!} -->
</div>
@endsection