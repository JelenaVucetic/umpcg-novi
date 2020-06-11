@extends('layouts.app')
@section('content')
<div class="container">
    <form method="post" action="{{action('MembersController@update', $id)}}">
    {{ csrf_field() }}
        <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
            <lable>Odobrenje</lable>
            <select name="approve">
                <option value="0" @if($member->status==0)selected @endif>Na cekanju</option>
                <option value="1" @if($member->status==1)selected @endif>Odobri</option>
                <option value="2" @if($member->status==2)selected @endif>Odbij</option>
                <option value="3" @if($member->status==3)selected @endif>Odlozi</option> 
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
        <button type="submit" class="btn btn-success" style="margin-top:40px">Update</button>
        </div>
    </div>
    </form>
</div>
@endsection