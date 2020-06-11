@extends('layouts.app')

@section('fixed-column-script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js"></script>
<script src="/js/dataTables.js"></script>
<script src="/js/dataTables-fixedColumn.js"></script>
@endsection

@section('members')
<div class="container">
@include('inc.admin_nav')
</div>

<div class="searchMembers container-fluid">
  <label>Pretraži</label>
  <input type="text" id="myInputTextField">
</div>
<div class="container">

<div class="wrapper1">
  <div class="div1">
  </div>
</div>

<div class="wrapper2">
  <div class="div2">
    <table id="example" class="membersTable table">
    <thead>
      <tr>
        <th></th>
        <th class="th-lg">Logo</th>
        <th class="th-lg">Ime</th>
        <th class="th-lg">Prezime</th>
        <th class="th-lg">Jmbg</th>
        <th class="th-lg">Prebivalište</th>
        <th class="th-lg">Telefon</th>
        <th class="th-lg">E-mail</th>
        <th class="th-lg">Pol</th>
        <th class="th-lg">Naziv firme</th>
        <th class="th-lg">Pib</th>
        <th class="th-lg">Datum osnivanja</th>
        <th class="th-lg">Adresa firme</th>
        <th class="th-lg">Web adresa</th>
        <th class="th-lg">Osnovna djelatnost</th>
        <th class="th-lg">Oblik organizacije</th>
        <th class="th-lg">Opis</th>
        <th class="th-lg">Facebook stranica</th>
        <th class="th-lg">Instagram stranica</th>
        <th class="th-lg">Status</th>
        <th class="th-lg">Akcija</th>
        <th class="th-lg" scope="col">Izmijeni</th>
        <th class="th-lg">Obriši</th>
      </tr>
    </thead>
    <tbody>
    @php $i=1; @endphp
    @foreach($members as $member)
      <tr id="component{{ $member->id }}">
      <th scope="row" >@php echo $i; @endphp</th>
        <td><img id="" src="/img/{{$member->image}}" style="width:100px;"></td>
        <td class="td-lg"><div>{{$member->firstname}}</div></td>
        <td class="td-lg"><div>{{$member->lastname}}</div></td>
        <td class="td-lg"><div>{{$member->jmbg}}</div></td>
        <td class="td-lg"><div>{{$member->place}}</div></td>
        <td class="td-lg"><div>{{$member->phone}}</div></td>
        <td class="td-lg"><div>{{$member->email}}</div></td>
         <td class="td-lg"><div>{{$member->genter}}</div></td>
        <td class="td-lg"><div>{{strtoupper($member->company )}}</div></td>
        <td class="td-lg"><div>{{$member->pib}}</div></td>
        <td class="td-lg"><div>{{$member->date}}</div></td>
        <td class="td-lg"><div class="cell">{{$member->address}}</div></td>
        <td class="td-lg"><div>{{$member->web}}</div></td>
        <td class="td-lg"><div class="cell">{{$member->work}}</div></td>
        <td class="td-lg"><div>{{$member->organization}}</div></td>
        <td class="td-lg"><div class="cell">{{$member->description}}</div></td>
        <td class="td-lg"><div onClick='copyText(this)' data-toggle="tooltip" title="Copy"  class="cellFb">{{$member->facebook}}</div></td>
        <td class="td-lg "><div onClick='copyText(this)' data-toggle="tooltip" title="Copy"  class="cellInsta">{{$member->instagram}}</div></td>
      <td class="td-lg" id="{{$i}}">
        @if($member->status == 1)
        <span class="label label-success">Odobreno</span>
        @elseif($member->status == 2)
        <span class="label label-danger">Odbijeno</span>
        @else( $member->status == 3)
        <span class="label label-primary">Na cekanju</span>
		@endif
        </td>
        <td class="td-lg">
        <form >
            {{ csrf_field() }}
                <div class="form-group">
                    <select name="approve" data-id="{{$member->id}}" data-row={{$i}} class="choose-status">
                        <option value="3" @if($member->status==3)selected @endif>Na cekanju</option> 
                        <option value="1" @if($member->status==1)selected @endif>Odobri</option>
                        <option value="2" @if($member->status==2)selected @endif>Odbij</option>  
                    </select>
                </div>
                <div class="form-group ">
            
                </div>
            </form>
        </td>
        <td class="td-lg">
        <a href="/members/edit/{{$member->id}}" class="editBtn">Izmjeni</a>
        </td>
        <td>
          
          <button class="deleteBtn delete-member " value="{{$i}}" data-id="{{$member->id}}" >Obriši</button>
      
        </td>
      </tr>
      @php $i++; @endphp
      @endforeach
    </tbody>
  </table>
  </div>
</div>
  
</div>

 @endsection