@extends('layouts.app')

@section('select_css')
<link href="{{ asset('css/select.css') }}" rel="stylesheet">
@endsection

@section('content')
<section>
<form action="/members/update/{{$member->id}}" method="post"  enctype="multipart/form-data">
    {{ csrf_field() }}
        <div class="contactForm">
            <div>
                <input type="text" name="firstname" placeholder="Ime *" value="{{ $member->firstname }} "  required>
                <input type="text" name="lastname" placeholder="Prezime *" value="{{ $member->lastname }}" required>
                <input type="text" name="jmbg" placeholder="JMBG *" value="{{ $member->jmbg }}" required>
                <input type="text" name="place" placeholder="Mjesto Prebivalista *" value="{{ $member->place }}" required>
                <input type="text" name="phone" placeholder="Telefon *" value="{{ $member->phone }}" required>
                <input type="email" name="email" placeholder="E-mail *" value="{{ $member->email }}" required>         
                <input type="text" name="genter" placeholder="Pol *" value="{{ $member->genter }}" required>                       

               <!--  <input id="fileInput" name="image" type="file" style="display:none;"  value="{{ old('image') }}"> -->
                <div id='test' style="padding:0;">
                <input type="file" id="file-upload" name="image"/>
                </div>
                <label  for="file-upload" id="image1"><img src="/img/Upload.svg" alt=""><span> Uploaduj svoj logo </span> <br> <p id="file-upload-filename"></p> </label>
        
            </div>
            <div>
                <input type="text" name="company" placeholder="Naziv firme *"  value="{{$member->company }}">
                <input type="text" name="pib" placeholder="PIB *"  value="{{ $member->pib }}">
                <input type="text" name="date" placeholder="Datum osnivanja *"  value="{{ $member->date }}">
                <input type="text" name="address" placeholder="Adresa firme *"  value="{{$member->address }}">
                <input type="text" name="web" placeholder="Web adresa"  value="{{ $member->web }}">
                <input type="text" name="work" placeholder="Osnovna djelatnost *"  value="{{ $member->work }}">
               <select name="organization" id="" class="myselect2" >
                    <option value="doo">DOO</option>
                    <option value="ad">AD</option>
                    <option value="preduzetnik">Preduzetnik</option>
                    <option value="nvo">NVO</option>
                </select>
            </div>
        </div>
        <textarea name="description" id="" placeholder="Kratak opis vaše kompanije *">{{ $member->description }}</textarea>
        <div class="textareaLimit">
            <span>220-250 karaktera</span> <span>Unijeto <span id="characters">0 </span>  karatkera</span>
        </div>
        <div class="socialMediaInput">
            <input type="text" name="facebook" placeholder="Facebook stranica" id="facebook"  value="{{ $member->facebook }}">
            <input type="text" name="instagram" placeholder="Instagram profile" id="instagram"  value="{{ $member->instagram }}">
        </div>
        <div id="submitBtn">
             <button type="submit">Izmijeni</button>
        </div>
    </form>
</section>
@endsection

@section('select_js')
    <script src="{{ asset('js/select.js') }}"></script>
@endsection