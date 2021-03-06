@extends('layouts.app')

@section('content')
{!! Breadcrumbs::render('search') !!}
<h1>Rezultati pretrage</h1>
   <p>Rezultat(i) za '{{ request()->input('query') }}'</p>
    @include('inc.messages')
    
          @php
           $rowCount = 0;
           @endphp
           <div class="row">
            @forelse($posts as $post)
            @if( $rowCount == 5 )
               <div class="col-md-4 col-sm-6" style="padding-top: 30px;">
                   <div class="postBox" style="background:none;box-shadow:none;padding: 70px 30px;">
                       <img src="/img/Baner-EYCA-UMPCG.png" style="border:none; width:100%">    
                   </div>
               </div>
               </div><div class="row">
               <div class="col-md-4  col-sm-6" style="padding-top: 30px;">
                   <div class="postBox">
                        <a href="/posts/{{$post->id}}">
                        @if($post->category == 'umpcg')
                        <span class="category" ></span>
                        @else
                        <span class="categoryActivities" ></span>
                        @endif
                       <small style="color:#292663">Objavljeno: {{$post->date}}  </small>
                       <div id="imgDiv">
                       <img id="postImg" src="/storage/cover_image/thumbnail/{{$post->cover_image}}">
                       </div>
                       <h3>{{$post->title}}</h3>
                       <div>
                        <small> <img src="/img/Pregledi-ikonica copy.svg" style="margin-right: 7px;" alt="">{{ $post->views }} pregleda</small>
                       </div>
                       </a>
                   </div>
               </div>
               @php
               $rowCount++;
               @endphp
               @else
               <div class="col-md-4  col-sm-6" style="padding-top: 30px;">
                   <div class="postBox">
                   <a href="/posts/{{$post->id}}">
                   @if($post->category == 'umpcg')
                   <span class="category" ></span>
                   @else
                   <span class="categoryActivities" ></span>
                   @endif
                       <small style="color:#292663">Objavljeno: {{$post->date}}  </small>
                       <div id="imgDiv">
                       <img id="postImg" src="/storage/cover_image/thumbnail/{{$post->cover_image}}">
                       </div>
                       <h3>{{$post->title}}</h3>
                       <div>
                        <small> <img src="/img/Pregledi-ikonica copy.svg" style="margin-right: 7px;" alt="" >{{ $post->views }} pregleda</small>
                       </div>
                       </a>
                   </div>
               </div>
            
               @endif
               @php
               $rowCount++;
               @endphp
              
               @if($rowCount % 3 == 0)
                </div><div class="row">
               @endif
               
               @empty
                <p style="padding-left:20px;">Nije pronađen ni jedan članak.</p>
            @endforelse
           </div>
        {{$posts->links()}}

@endsection
@section('breadcrumbs')
<div class="container-fluid" id='myBreadcrums'>
    {!! Breadcrumbs::render('search') !!}
</div>
@endsection