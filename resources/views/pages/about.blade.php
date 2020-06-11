@extends('layouts.app')

@section('content')
<section id="aboutSection">
{!! Breadcrumbs::render('about') !!}
    <div class="info">
        <div class='phone'>
            <img src="/img/tel.svg" alt="">
            <p>069 499 884 <br> 067 115 105</p>
        </div>
        <div class="mail">
            <img src="/img/mail.svg" alt="">
            <p>info@umpcg.me <br> unijamladihpreduzetnika@gmail.com</p>
        </div>
        <div class="account">
            <img src="/img/racun.svg" alt="">
            <p>ŽR: <br> 530-25514-04 NLB</p>
        </div>
    </div>
    <h3>MISIJA & VIZIJA</h3>
    <div>
        <p>Unija mladih preduzetnika Crne Gore pruža podršku mladim preduzetnicama i preduzetnicima sa teritorije Crne Gore da svoje biznise unaprijede kroz raznovrsne obuke, programe, aktivnosti i umrežavanje. UMPCG nastoji da promoviše i podstiče preduzetnički duh i saradnju među mladima, na lokalnom, nacionalnom i internacionalnom nivou.</p>
        <br>
        <p>Unija mladih preduzetnika Crne Gore ima za cilj da doprinese stvaranju podsticajnog okruženja za razvoj preduzetništva mladih u Crnoj Gori.</p>
    </div>
    <div style="text-align: center; padding: 47px 0;">
        <img src="/img/UMPCG_logo.svg" alt="umpcg_logo.svg" id="logoImg">
    </div>
    <div>
        <p>Unija je osnovana 2017. godine sa ciljem da okupi na jednom mjestu mlade koji su pokrenuli ili žele da pokrenu sopstveni biznis. Aktivan rad sa fokusom na potrebama članstva odlikuje našu organizaciju. Česte i raznolike aktivnosti, organizovane za i po potrebama članova, opisuju naše djelovanje.</p>
        <br>
        <p> Član Unije može biti svako ko je osnovao/la firmu, ima gazdinstvo, NVO, registrovao/la se kao preduzetnik,ima zanatsku radnju ili start-up , nema preko 35 godina i rođen/a je u Crnoj Gori.</p>
        <br>
        <p> Prijatelj Unije može biti svako ko ne ispunjava kriterijume, a želi da doprinese razvoju organizacije, podstiče saradnju i svojim kvalitetima i resursima pozitivno utiče na ciljeve organizacije.</p>
        <br>
        <p style="color:#F15B5B">Unija mladih preduzetnika Crne Gore je 2019. godine u Londonu, u sjedištu Evropske banke za obnovu i razvoj, proglašena za najbolju inicijativu koja osnažuje mlade od strane Emerging Europe.</p>
    </div>
    <div style="padding: 30px 0;">
        <img src="/img/O_nama.png" alt="onama.png" id="aboutImg">
    </div>
    <div>
        <p>U Uniji mladih preduzetnika Crne Gore fokus je na saradnji, građenju zajednice i razvoju zdravog poslovnog ambijenta. Organizacija sve svoje resurse usmjerava na članstvo, kao i na buduće generacije preduzetnika/ca.</p>
        <br>
        <p>UMPCG ima dobro uspostavljenu saradnju sa svim relevantnim institucijama na lokalnom i nacionalnom nivou. Van granica države, zajedno sa svojim članovima brojne saradnje su otpočete u regionu, Evropi, a i interkontinetalno.</p>
    </div>
    <div class="presidents">
        <div>
            <img src="/img/Ana.png" alt="">
            <p style=" color: #6166AF;">Potpredsjednica Ana Rašović <br> ana@umpcg.me</p>
        </div>
        <div>
            <img src="/img/Uros-slika.png" alt="">
            <p style=" color: #6166AF;">Predsjednik Uroš Bulatović <br> uros@umpcg.me</p>
    </div>
    </div>
</section>

@endsection

@section('breadcrumbs')
<div class="container-fluid" id='myBreadcrums'>
    {!! Breadcrumbs::render('about') !!}
</div>
@endsection