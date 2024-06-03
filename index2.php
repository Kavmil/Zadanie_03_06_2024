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
<form method="POST" action="index2.php">
    <p>Wybierz ID gracz</p><br>
    <input type="number" name="wybraneID" min="1" max="200">
    <input type="submit" value="Zatwierdź"><br><br>
</form>
    Ładowanie: <p id="progres">0</p>
    <?php
    $conn = mysqli_connect("localhost","root","","egzamin");
    $q = "SELECT `id_jednostki`, `id_gracza`, `nazwa`, `lok_x`, `lok_y` FROM `jednostki` WHERE 1";
    $r = mysqli_query($conn,$q);
    if(isset($_POST['wybraneID']) && $_POST['wybraneID']>=1 && $_POST['wybraneID']<=200 ){
        $wybraneID = $_POST['wybraneID'];
    }else{
        $wybraneID = "0";
    }
    echo "<div id='srogaRamka'> ";
    echo "<div id='ramka'>";
    for($y=0;$y<200;$y++){
        for($x=0;$x<200;$x++){
            // echo "<div id='blok_".$y."_".$x."'>".$y."</div>";
            echo "<div id='blok_".$y."_".$x."'> </div>";
            // echo "<div class='kwaadrat'>A</div>";
        }
    }
    echo "</div>";
    echo "</div>";
    $q2 = "SELECT * FROM `jednostki` WHERE `id_gracza`='$wybraneID'";
    $q3 = "SELECT `nazwa`, `lok_x`, `lok_y` FROM `jednostki` WHERE 1";
    $r2 = mysqli_query($conn,$q2);
    $r3 = mysqli_query($conn,$q3);
    $progres = 0;

// Podświetlenie jednostek wybranego ID
while($row=mysqli_fetch_row($r2)){
    echo "<script>";
    // echo "document.getElementById('blok_".$row[3]."_".$row[4]."').innerHTML = '".$row[0]."';";
    echo "document.getElementById('blok_".$row[3]."_".$row[4]."').style.backgroundColor='red';";
    echo "</script>";
}

// Wyswietlenie emotek na planszy
    while($row=mysqli_fetch_row($r3)){
        echo "<script>document.getElementById('progres').innerHTML = '".$progres."/10000';</script>";
        echo "<script>";
        $progres += 1;
        switch($row[0]){
            case "architekt":
                echo "document.getElementById('blok_".$row[1]."_".$row[2]."').innerHTML = '".'<i class="fa-solid fa-helmet-safety"></i>'."';";
                break;
            case "artylerzysta":
                echo "document.getElementById('blok_".$row[1]."_".$row[2]."').innerHTML = '".'<i class="fa-solid fa-bomb"></i>'."';";
                break;
            case "balista":
                echo "document.getElementById('blok_".$row[1]."_".$row[2]."').innerHTML = '".'<i class="fa-solid fa-weight-hanging"></i>'."';";
                break;
            case "ciemny elf":
                echo "document.getElementById('blok_".$row[1]."_".$row[2]."').innerHTML = '".'<i class="fa-solid fa-circle"></i>'."';";
                break;
            case "drwal":
                echo "document.getElementById('blok_".$row[1]."_".$row[2]."').innerHTML = '".'<i class="fa-solid fa-beer-mug-empty"></i>'."';";
                break;
            case "elfi czarodziej":
                echo "document.getElementById('blok_".$row[1]."_".$row[2]."').innerHTML = '".'<i class="fa-solid fa-wand-sparkles"></i>'."';";
                break;
            case "goniec":
                echo "document.getElementById('blok_".$row[1]."_".$row[2]."').innerHTML = '".'<i class="fa-solid fa-chess-bishop"></i>'."';";
                break;
            case "ifryt":
                echo "document.getElementById('blok_".$row[1]."_".$row[2]."').innerHTML = '".'<i class="fa-solid fa-ghost"></i>'."';";
                break;
            case "kaplan":
                echo "document.getElementById('blok_".$row[1]."_".$row[2]."').innerHTML = '".'<i class="fa-solid fa-cross"></i>'."';";
                break;
            case "katapulta":
                echo "document.getElementById('blok_".$row[1]."_".$row[2]."').innerHTML = '".'<i class="fa-solid fa-hill-rockslide"></i>'."';";
                break;
            case "kawalerzysta":
                echo "document.getElementById('blok_".$row[1]."_".$row[2]."').innerHTML = '".'<i class="fa-solid fa-helmet-un"></i>'."';";
                break;
            case "konny lucznik":
                echo "document.getElementById('blok_".$row[1]."_".$row[2]."').innerHTML = '".'<i class="fa-solid fa-horse"></i>'."';";
                break;     
            case "kusznik":
                echo "document.getElementById('blok_".$row[1]."_".$row[2]."').innerHTML = '".'<i class="fa-solid fa-crosshairs"></i>'."';";
                break;     
            case "lekki jezdziec":
                echo "document.getElementById('blok_".$row[1]."_".$row[2]."').innerHTML = '".'<i class="fa-solid fa-horse-head"></i>'."';";
                break;     
            case "lesny elf":
                echo "document.getElementById('blok_".$row[1]."_".$row[2]."').innerHTML = '".'<i class="fa-solid fa-leaf"></i>'."';";
                break;     
            case "lucznik":
                echo "document.getElementById('blok_".$row[1]."_".$row[2]."').innerHTML = '".'<i class="fa-solid fa-arrow-right-long"></i>'."';";
                break;     
            case "mag ognia":
                echo "document.getElementById('blok_".$row[1]."_".$row[2]."').innerHTML = '".'<i class="fa-solid fa-fire"></i>'."';";
                break;     
            case "mag powietrza":
                echo "document.getElementById('blok_".$row[1]."_".$row[2]."').innerHTML = '".'<i class="fa-solid fa-wind"></i>'."';";
                break;
            case "mag wody":
                echo "document.getElementById('blok_".$row[1]."_".$row[2]."').innerHTML = '".'<i class="fa-solid fa-water"></i>'."';";
                break;          
            case "mag ziemi":
                echo "document.getElementById('blok_".$row[1]."_".$row[2]."').innerHTML = '".'<i class="fa-solid fa-earth-europe"></i>'."';";
                break;          
            case "paladyn":
                echo "document.getElementById('blok_".$row[1]."_".$row[2]."').innerHTML = '".'<i class="fa-solid fa-shield-halved"></i>'."';";
                break;          
            case "piechur":
                echo "document.getElementById('blok_".$row[1]."_".$row[2]."').innerHTML = '".'<i class="fa-solid fa-shoe-prints"></i>'."';";
                break;          
            case "pikinier":
                echo "document.getElementById('blok_".$row[1]."_".$row[2]."').innerHTML = '".'<i class="fa-solid fa-arrow-trend-up"></i>'."';";
                break;          
            case "robotnik":
                echo "document.getElementById('blok_".$row[1]."_".$row[2]."').innerHTML = '".'<i class="fa-solid fa-screwdriver-wrench"></i>'."';";
                break;          
            case "smok":
                echo "document.getElementById('blok_".$row[1]."_".$row[2]."').innerHTML = '".'<i class="fa-solid fa-dragon"></i>'."';";
                break;
            case "topornik":
                echo "document.getElementById('blok".$row[1]."".$row[2]."').innerHTML = '".'<i class="fa-solid fa-tree"></i>'."';";
                break;          
        }
        echo "</script>";
    }


    mysqli_close($conn);
    ?>
</body>
</html>