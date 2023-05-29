<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opinie klientów</title>
    <link rel="stylesheet" href="styl4.css">
</head>
<body>
    <header id="banner">
        <h1>
            Hurtownia spożywcza
        </h1>
            
        
    </header>

    <section id="glowna">
        <h2> Opinie naszych klientow</h2>
    </section>
    <?php 
$connect = mysqli_connect('localhost','root','','hurtownia');
if($connect){
    $zapytanie="SELECT zdjecie, imie, opinia FROM klienci INNER JOIN opinie ON klienci.id=opinie.klienci_id WHERE klienci.Typy_id=3";
    $wynik=mysqli_query($connect,$zapytanie);
    while($wiersz=mysqli_fetch_array($wynik)){
        echo "<img src=".$wiersz['zdjecie']."' alt='klient'>";
        echo "<blockquote>".$wiersz['opinia']."</blockquote>";
        echo "<h4>".$wiersz['imie']."</h4><br>";
    }
}else{
    echo "błąd polaczenia z baza"
}

mysqli_close($connect);



?>
    <footer class="stopka1"> 
        <h3>Współpracuj z nami</h3>
        <a href="http://sklep.pl/">Sklep 1</a>
    </footer>
    <footer class="stopka2">
        <h3>Nasi top klienci</h3>
        <ol>
            <li>Script1</li>
            <li>Script2</li>
            <li>Script3</li>
        </ol>
    </footer>
    <footer class="stopka3">
        Skontaktuj sie
        <p>Telefon:237864238467</p>
    </footer>
    <footer class="stopka4">
        <h3>autor:09.123</h3>
    </footer>
</body>
</html>
