@extends('layouts.app')

@section('content')

    @if(count($posts) > 0)
           @php
           $rowCount = 0;
           @endphp
           <div class="row">
            @foreach($posts as $post)
            @if( $rowCount == 5 )
               <div class="col-md-4" style="padding-top: 30px;">
                   <div class="postBox" style="background:none;box-shadow:none;padding: 70px 30px;">
                       <img src="/img/Baner-EYCA-UMPCG.png" style="border:none; width:100%">    
                   </div>
               </div>
               @else
               <div class="col-md-4" style="padding-top: 30px;">
                   <div class="postBox">
                       <small style="color:#292663">Objavljeno: {{ \Carbon\Carbon::parse($post->created_at)->format('d.m.Y')}}  </small>
                       <img id="postImg" src="/storage/cover_images/{{$post->cover_image}}">
                       <h3>{{$post->title}}</h3>
                       <div class="half-a-border-on-top">
                           <small> <img src="/img/Pregledi-ikonica copy.svg" alt=""> 2k pregleda</small>
                       </div>
                   </div>
               </div>
               @endif
               @php
               $rowCount++;
               @endphp        
               @if($rowCount % 3 == 0)
                </div><div class="row">
               @endif
               
            @endforeach
           </div>
        {{$posts->links()}}
    @else
        <p>No posts found</p>
    @endif

@endsection