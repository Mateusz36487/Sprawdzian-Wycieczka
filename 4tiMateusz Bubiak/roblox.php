<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praktyki uczniów</title>
</head>
<body>
    <?php
    $polaczenie=mysqli_connect('localhost','root','','praktyki');

        if($polaczenie){
            $bazapolaczenie="Poprawnie polaczono z baza";
            $select="SELECT * FROM osoba";
            $pytanie=mysqli_query($polaczenie,$select);
                while($wiersz=mysqli_fetch_array($pytanie)){
                     $idOsoba[]=$wiersz['id'];
                     $imieOsoba[]=$wiersz['imie'];
                     $nazwiskoOsoba[]=$wiersz['nazwisko'];
            
        }
        $KomOs="<br><br> Pobrano z bazy danych";
        
        $selectZaklad="SELECT * FROM zakład_pracy";
        $pytanieZaklad=mysqli_query($polaczenie,$selectZaklad);
        while($wierszZaklad=mysqli_fetch_array($pytanieZaklad)){
                $idZakladu=$wierszZaklad['id'];
                $nazwaZakladu[]=$wierszZaklad['nazwa'];
                $miejscowoscZakladu[]=$wierszZaklad['miejscowosc'];
                $ulicaZakladu[]=$wierszZaklad['ulica'];
                $numerZakladu[]=$wierszZaklad['numer'];
                $telefonZakladu[]=$wierszZaklad['telefon'];
        }
        $KomZak="<br>zostało pobrane z tabeli zakladu pracy";
        
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $idOsoba=$_POST['osoba'];
            $idZakladu=$_POST['zaklad'];
            $dataRoz=$_POST['dataRROZPOCZECIA'];
            $dataZak=$_POST['dataZAKONCZENIA'];
            $insertPrakt="INSERT INTO praktyka VALUES(null,'$idZakladu','$idOsoba','$dataRoz','$dataZak')";
            if(mysqli_query($polaczenie,$insertPrakt)){
                $bazapolaczenie=$bazapolaczenie."<br>Zostało dodano do bazy";
            }else{
                $bazapolaczenie=$bazapolaczenie."<br>Nie zostało dodano do bazy";
            }
        }
    }else{
        $bazapolaczenie="niepoprawno podłączono do bazy";
    }
        mysqli_close($polaczenie);
    ?>
    <header>
        <div>Praktyki technikum</div><br>
    </header>
    <map>
        <button name="lisZakladu"onclick="listaZaklad()">ZAKŁAD PRACY</button>
    </map>
    <main>
        <output name="dane"></output>
        <section>
            Wprowadź dane
            <form Method="POST" action="#">
                <label for="osoba">Proszę podać osobe</label>
                <select name="osoba" id="osoba">
                    <?php
                    for($x=0;$x<count($imieOsoba);$x++){
                        echo "<option value=$idOsoba[$x]>$imieOsoba[$x] $nazwiskoOsoba[$x]</option>";
                    }
                    ?>
                </select>
                <br>
                <label for="zaklad">proszę podać zakłąd</label>
                <select name="zaklad" id="zaklad">
                    <?php
                    for($x=0;$x<count($nazwaZakladu);$x++){
                        echo "<option value=$idZakladu[$x]>$nazwaZakladu[$x]</option>";
                    }
                    ?>
                </select>
                <br>
                <label for="dataROZPOCZECIA">Podaj datę roz</label>
                <input type="date" name="dataRROZPOCZECIA" id="dataRROZPOCZECIA">
                <br>
                <label for="dataZAKONCZENIA">Podaj datę Zakoń</label>
                <input type="date" name="dataZAKONCZENIA" id="dataZAKONCZENIA">
                <br>
                <label for="ocena">Podaj oce</label>
                <input type="number" min="1" max="6">
            </form>
        </section>
        <section name="komunikat">
                <?php
                echo $bazapolaczenie;
                echo $KomOs;
                echo $KomZak;
                ?>
        </section>
        <section name="zakłady">
            <h2>Zakłady</h2>
        </section>
    </main>
    
        <footer>
            <br>
                Mateusz Bubiak
    
            </footer>
</body>
</html>