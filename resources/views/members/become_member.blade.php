@extends('layouts.app')
@section('select_css')
<link href="{{ asset('css/select.css') }}" rel="stylesheet">
@endsection

@section('content')
{!! Breadcrumbs::render('become_member') !!}
<section id="becomMemberSection">
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne" class="panelHeading">
        <h4 class="panel-title">
            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <i class="fa fa-chevron-down" style="color:white;float: right;"></i>
                Uslovi?
            </a>
        </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
        <div class="panel-body">
    - Član Unije mladih preduzetnika Crne Gore može da postane svako lice koje u svom vlasništvu ili u dijelu vlasništva posjeduje kompaniju/organizaciju, koje je mlađe od 35. godina i koje ima državljanstvo Crne Gore.
        </div>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo" class="panelHeading">
        <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            <i class="fa fa-chevron-down" style="color:white;float: right;"></i>
                Obaveze?           
            </a>
        </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
        <div class="panel-body">
        - Svaki član Unije je i član Skupštine Unije mladih preduzetnika Crne Gore, sa punim pravom glasa. <br> 
        - Svaki član treba da aktivno, u skladu sa svojim interesovanjima i djelovanjem, učestvuje u kreiranju djelovanja Unije. <br>
        - Članovi Unije mladih preduzetnika po Statutu organizacije imaju obavezu plaćanja godišnje članarine u iznosu od 60,00 eura (mjesečna    članarina 5,00 eura). <br>
        - Poželjan je aktivni status članova UMPCG, koji podrazumijeva prisustvo edukativnim i networking događajima u organizaciji Unije.   
        </div>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingThree" class="panelHeading">
        <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            <i class="fa fa-chevron-down" style="color:white;float: right;"></i>
                Benefiti?
            </a>
        </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
        <div class="panel-body">
        - Umrežavanje mladih preduzetnika u Crnoj Gori, regionu i inostranstvu. <br>
        - Promocija kompanija/organizacija mladih preduzetnika. <br>
        - Podrška u pronalaženju podrške/ partnera/ investitora. <br>
        - Pristupačne usluge kod drugih članova organizacije. <br>
        - Informisanost o aktuelnim biznis podrškama. Konsultantske usluge.
        </div>
    </div>
</div>

</div><!-- panel-group -->

</section>

<section>
    <form action="/addMember" method="post"  enctype="multipart/form-data">
    {{ csrf_field() }}
        <div class="contactForm">
            <div>
                <input type="text" name="firstname" placeholder="Ime *" value="{{ old('firstname') }}"  required oninvalid="this.setCustomValidity('Obavezno polje')"  oninput="setCustomValidity('')">
                <input type="text" name="lastname" placeholder="Prezime *" value="{{ old('lastname') }}" required oninvalid="this.setCustomValidity('Obavezno polje')"  oninput="setCustomValidity('')">
                <input type="text" name="jmbg" placeholder="JMBG *" value="{{ old('jmbg') }}" required oninvalid="this.setCustomValidity('Obavezno polje')"  oninput="setCustomValidity('')">
                <input type="text" name="place" placeholder="Mjesto Prebivalista *" value="{{ old('place') }}" required oninvalid="this.setCustomValidity('Obavezno polje')"  oninput="setCustomValidity('')">
                <input type="text" name="phone" placeholder="Telefon *" value="{{ old('phone') }}" required oninvalid="this.setCustomValidity('Obavezno polje')"  oninput="setCustomValidity('')">
                <input type="email" name="email" placeholder="E-mail *" value="{{ old('email') }}" required oninvalid="this.setCustomValidity('Obavezno polje')"  oninput="setCustomValidity('')">             
                <select name="genter" id="" class="myselect2" >
                    <option value="Muški">Muški</option>
                    <option value="Ženski">Ženski</option>
                    <option value="Ostalo">Ostalo</option>
                </select>
                <div id='test' style="padding:0;">
                <input type="file" id="file-upload" name="image"/>
                </div>
                <label  for="file-upload" id="image1"><img src="/img/Upload.svg" alt=""><span> Uploaduj svoj logo </span> <br> <p id="file-upload-filename"></p> </label>
        
            </div>
            <div>
                <input type="text" name="company" placeholder="Naziv firme *"  value="{{ old('company') }}" required oninvalid="this.setCustomValidity('Obavezno polje')"  oninput="setCustomValidity('')">
                <input type="text" name="pib" placeholder="PIB *"  value="{{ old('pib') }}" required oninvalid="this.setCustomValidity('Obavezno polje')"  oninput="setCustomValidity('')">
                <input type="text" name="date" placeholder="Datum osnivanja *"  value="{{ old('date') }}" required oninvalid="this.setCustomValidity('Obavezno polje')"  oninput="setCustomValidity('')">
                <input type="text" name="address" placeholder="Adresa firme *"  value="{{ old('address') }}" required oninvalid="this.setCustomValidity('Obavezno polje')"  oninput="setCustomValidity('')">
                <input type="text" name="web" placeholder="Web adresa"  value="{{ old('web') }}">
                <input type="text" name="work" placeholder="Osnovna djelatnost *"  value="{{ old('work') }}" required oninvalid="this.setCustomValidity('Obavezno polje')"  oninput="setCustomValidity('')" > 
                <select name="organization" id="" class="myselect2" >
                    <option value="doo">DOO</option>
                    <option value="ad">AD</option>
                    <option value="preduzetnik">Preduzetnik</option>
                    <option value="nvo">NVO</option>
                </select>
            </div>
        </div>
        <textarea name="description" id="" placeholder="Kratak opis vaše kompanije *" required oninvalid="this.setCustomValidity('Obavezno polje')"  oninput="setCustomValidity('')">{{ old('description') }}</textarea>
        <div class="textareaLimit">
            <span>220-250 karaktera</span> <span>Unijeto <span id="characters">0 </span>  karatkera</span>
        </div>
        <div class="socialMediaInput">
            <input type="text" name="facebook" placeholder="Facebook stranica" id="facebook"  value="{{ old('facebook') }}">
            <input type="text" name="instagram" placeholder="Instagram profile" id="instagram"  value="{{ old('instagram') }}">
        </div>
        <div id="submitBtn">
             <button type="submit">POŠALJI ZAHTJEV</button>
        </div>
    </form>
</section>



@endsection

@section('carousel')
<div style="margin-bottom: -30px;  background:#F6F6F6 ;" class="container-fluid" id="myCarousel">
<div class="jcarousel-wrapper" id="myCarouselWrapper">
        <div class="jcarousel">
            <ul>
            @foreach($posts as $post)
                <li>
                <div class="postBox carouselPost">
                    <a href="/posts/{{$post->id}}">
                        <span class="category" ></span>
                        <small style="color:#292663">Objavljeno:{{$post->date}}   </small>
                        <div id="imgDiv">
                            <img id="postImg" src="/storage/cover_image/thumbnail/{{$post->cover_image}}"  style="max-height:130px;min-height:130px;">
                        </div>
                        <h3 style="font-size: 22px;">{{$post->title}}</h3>
                        <div>
                            <small style="display: flex;"> <img src="/img/Pregledi-ikonica copy.svg" alt="" style="margin-right:7px">{{ $post->views }} pregleda</small>
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
    {!! Breadcrumbs::render('become_member') !!}
</div>
@endsection

@section('select_js')
    <script src="{{ asset('js/select.js') }}"></script>
@endsection