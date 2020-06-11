<!DOCTYPE html>
<html>
<head>
    <title>Zahtjev za članstvo</title>
</head>
<body>
    <p>Poštovani, <br> Imate novi zahtjev za člasnstvo.</p>
    <p>Detalji novog člana:</p>
    <ul>
        <li>Ime: {{ $details['firstname'] }}</li>
        <li>Prezime: {{ $details['lastname'] }}</li>
        <li>JMBG: {{ $details['jmbg'] }}</li>
        <li>Mjesto prebivališta: {{ $details['place'] }}</li>
        <li>Telefon: {{ $details['phone'] }}</li>
        <li>Email: {{ $details['email'] }}</li>
        <li>Pol: {{ $details['genter'] }}</li>
        <li>Naziv firme: {{ $details['company'] }}</li>
        <li>Pib: {{ $details['pib'] }}</li>
        <li>Datum osnivanja: {{ $details['date'] }}</li>
        <li>Adresa: {{ $details['address'] }}</li>
        <li>Osnovna djelatnost: {{ $details['work'] }}</li>
        <li>Oblik organizacije: {{ $details['organization'] }}</li>
        <li>Opis: {{ $details['description'] }}</li>
    </ul>
    
</body>
</html>