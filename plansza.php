<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/b7e8294cb2.js" crossorigin="anonymous"></script>
</head>
<body>
    <a href="gracze.php">Gracze.php</a>
    <form method="POST" action="plansza.php">
        <p>Wybierz ID gracz</p><br>
        <input type="number" name="wybraneID" min="1" max="200">
        <input type="submit" value="Zatwierdź"><br><br>
    </form>
    <?php
        if(isset($_POST['wybraneID']) && $_POST['wybraneID']>=1 && $_POST['wybraneID']<=200 ){
            $wybraneID = $_POST['wybraneID'];
        }else{
            $wybraneID = "0";
        }

        $conn = mysqli_connect("localhost","root","","egzamin");
        $zapytanie_jednostki = "SELECT `id_jednostki`, `id_gracza`, `nazwa`, `lok_x`, `lok_y` FROM `jednostki` WHERE 1";
        $rezultat1=mysqli_query($conn,$zapytanie_jednostki);
        $zapytanie_id_gracz = "SELECT * FROM `jednostki` WHERE `id_gracza`='$wybraneID'";
        $rezultat2=mysqli_query($conn,$zapytanie_id_gracz);

// Tworzenie tabeli na dane
        $rozmieszczenie = array();
        for ($y = 0; $y < 200; $y++) {
            for ($x = 0; $x < 200; $x++) {
                $rozmieszczenie[$y][$x] = "x";
            }
        }

// Napełnianie pustej tabeli danymi
        while($row=mysqli_fetch_row($rezultat1)){
            $rozmieszczenie[$row[4]][$row[3]] = $row[2];
        }

// Rysowanie tabeli z odpowiednimi emotkami
        echo "<div id='srogaRamka'> ";
        echo "<div id='ramka'>";
        for($y=0;$y<200;$y++){
            for($x=0;$x<200;$x++){
                switch($rozmieszczenie[$y][$x]){
                    case "artylerzysta":
                        $tePole = "<i class='fa-solid fa-helmet-safety'></i>";
                        break;
                    case "architekt":
                        $tePole = "<i class='fa-solid fa-helmet-safety'></i>";
                        break;
                    case "balista":
                        $tePole = "<i class='fa-solid fa-weight-hanging'></i>";
                        break;
                    case "ciemny elf":
                        $tePole = "<i class='fa-solid fa-circle'></i>";
                        break;
                    case "drwal":
                        $tePole = "<i class='fa-solid fa-beer-mug-empty'></i>";
                        break;
                    case "elfi czarodziej":
                        $tePole = "<i class='fa-solid fa-wand-sparkles'></i>";
                        break;
                    case "goniec":
                        $tePole = "<i class='fa-solid fa-chess-bishop'></i>";
                        break;
                    case "ifryt":
                        $tePole = "<i class='fa-solid fa-ghost'></i>";
                        break;
                    case "kaplan":
                        $tePole = "<i class='fa-solid fa-cross'></i>";
                        break;
                    case "katapulta":
                        $tePole = "<i class='fa-solid fa-hill-rockslide'></i>";
                        break;
                    case "kawalerzysta":
                        $tePole = "<i class='fa-solid fa-helmet-un'></i>";
                        break;
                    case "konny lucznik":
                        $tePole = "<i class='fa-solid fa-horse'></i>";
                        break;
                    case "kusznik":
                        $tePole = "<i class='fa-solid fa-crosshairs'></i>";
                        break;
                    case "lekki jezdziec":
                        $tePole = "<i class='fa-solid fa-horse-head'></i>";
                        break;
                    case "lesny elf":
                        $tePole = "<i class='fa-solid fa-leaf'></i>";
                        break;
                    case "lucznik":
                        $tePole = "<i class='fa-solid fa-arrow-right-long'></i>";
                        break;
                    case "mag ognia":
                        $tePole = "<i class='fa-solid fa-fire'></i>";
                        break;
                    case "mag powietrza":
                        $tePole = "<i class='fa-solid fa-wind'></i>";
                        break;
                    case "mag wody":
                        $tePole = "<i class='fa-solid fa-water'></i>";
                        break;
                    case "mag ziemi":
                        $tePole = "<i class='fa-solid fa-earth-europe'></i>";
                        break;
                    case "paladyn":
                        $tePole = "<i class='fa-solid fa-shield-halved'></i>";
                        break;
                    case "piechur":
                        $tePole = "<i class='fa-solid fa-shoe-prints'></i>";
                        break;
                    case "pikinier":
                        $tePole = "<i class='fa-solid fa-arrow-trend-up'></i>";
                        break;
                    case "robotnik":
                        $tePole = "<i class='fa-solid fa-screwdriver-wrench'></i>";
                        break;
                    case "smok":
                        $tePole = "<i class='fa-solid fa-dragon'></i>";
                        break;
                    case "topornik":
                        $tePole = "<i class='fa-solid fa-tree'></i>";
                        break;
                    default:
                        $tePole = "x";
                        break;
                }
                // echo "<div>".$tePole."</div>";
                echo "<div id='blok_".$y."_".$x."'>".$tePole."</div>";
            }
        }
        echo "</div>";
        echo "</div>";

// Podświetlenie jednostek wybranego ID
        while($row=mysqli_fetch_row($rezultat2)){
            echo "<script>";
            echo "document.getElementById('blok_".$row[3]."_".$row[4]."').style.backgroundColor='red';";
            echo "</script>";
        }

        mysqli_close($conn);
    ?>
</body>
</html>