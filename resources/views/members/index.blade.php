@extends('layouts.app')
@section('members')
<div class="container" id="breadSection">
{!! Breadcrumbs::render('members') !!}
</div>

<div class="container" id="membersSection">
  <div style="width:100%;text-align: center;">
        <select name="" id="organization" class="myselect">
            <option value="doo">DOO</option>
            <option value="ad">AD</option>
            <option value="preduzetnik">Preduzetnik</option>
            <option value="nvo">NVO</option>
        </select>
    </div>
    <div class="row random">
        @foreach($members as $member)
            <div class="col-lg-3 col-md-4 col-sm-6  company row_<?php echo strtolower($member->organization)?>" style="margin-top: 30px;"  id="mydiv">
                <div class="inner">
                    <div style="padding: 0 10px;">
                        <h4>{{strtoupper($member->company )}}</h4>
                    </div>
                    <hr width="25%">
                    @if($member->image)
                    <img src="/img/{{ $member->image }}" alt="">
                    @else 
                    <img src="/img/icon-no-image.svg" alt="">
                    @endif
                    <div>
                    <div style="position: absolute; bottom: 0; padding:10px;">
                        <p class="description">{{ $member->description}}</p>
                    </div>
                </div>
                    <div class="overlay">
                        <div class="text">
                            <div id="firstname">
                                <p>{{ $member->firstname}}</p>
                            </div>
                            <div id="work">
                                <p>{{ $member->work}}</p>
                            </div>
                            <div id="member-email">
                                <p>{{ $member->email}}</p>
                            </div>
                            <div id="web"  onClick='copyText(this)' data-toggle="tooltip" title="Copy" >
                                <p>{{ $member->web}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
        @endforeach
    </div>
</div>
@endsection

@section('breadcrumbs')
<div class="container-fluid" id='myBreadcrums'>
    {!! Breadcrumbs::render('members') !!}
</div>
@endsection