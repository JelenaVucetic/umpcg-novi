@extends('layouts.app')

@section('boostrap-script')
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
@endsection

@section('content')
    @include('inc.admin_nav')
<!--   Modal form -->
<div id="delete" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content" id="test">
        <h5>Da li ste sigurni da želite da obrišete objavu?</h5>
        <div>
        <form action="{{route('posts.destroy', 'test')}}" method="POST">    
                {{Form::hidden('_method', 'DELETE')}}
                {{ csrf_field() }}
                <input type="hidden" id="p_id" name="post_id" value=" ">
                {{Form::submit('Obriši', ['class' => 'deleteBtn'])}}
            </form>
            <button type="button" data-dismiss="modal" aria-label="Close" >Zatvori</button>
        </div>
        
    </div>
  </div>
</div>

<div class="post-table"> 
    <a href="/posts/create" class="btn addPostBtn"><i style="color:white" class="fa fa-plus addPostIco"></i> <span class="addPost">Nova objava</span> </a>
    @if(count($posts) > 0)
        <table class="table table-striped">
            <tr>
                <th>Datum</th>
                <th>Naslov</th>
                <th>Akcija</th>
                <th></th>
            </tr>
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->date}}</td>
                    <td><a href="/posts/{{$post->id}}">{{$post->title}}</a></td>
                    <td><a class="editBtn" href="/posts/{{$post->id}}/edit" class="btn btn-default">Izmijeni</a></td>
                    <td>
                        <button type="button" class="deleteBtn"  data-post="{{$post->id}}" data-toggle="modal" data-target="#delete">Obriši</button>
                   </td>
                </tr>
            @endforeach
        </table>
    @else
        <p>You have no posts</p>
    @endif
</div>

@endsection
