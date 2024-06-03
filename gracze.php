<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@7.0.0/css/flag-icons.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <a href="plansza.php">Plansza.php</a>
    <?php
    $c = mysqli_connect("localhost", "root", "", "egzamin");
    $q = mysqli_query($c, 'SELECT jednostki.id_gracza, gracze.kraj, SUM(klasy.sila) + SUM(klasy.strzal) AS "suma"
    FROM jednostki, klasy, gracze 
    WHERE jednostki.nazwa=klasy.nazwa AND gracze.id_gracza = jednostki.id_gracza
    GROUP BY jednostki.id_gracza
    ORDER BY suma DESC;' );
    echo '<table id="tabelka1"> <tr><th> ID </th><th> Kraj </th><th> Flaga </th> <th> Siła bojowa </th></tr>';
    $flaga = "<span class='fi fi-xx'></span>";
    while ($row = mysqli_fetch_row($q)){
        switch($row[1]){
            case "Polska":
                $flaga = "<span class='fi fi-pl'></span>";
                break;
            case "Chiny":
                $flaga = "<span class='fi fi-cn'></span>";
                break;
            case "Niemcy":
                $flaga = "<span class='fi fi-de'></span>";
                break;
            case "Stany Zjednoczone":
                $flaga = "<span class='fi fi-us'></span>";
                break;
            case "Rosja":
                $flaga = "<span class='fi fi-ru'></span>";
                break;
            case "Francja":
                $flaga = "<span class='fi fi-fr'></span>";
                break;
            case "Bialorus":
                $flaga = "<span class='fi fi-by'></span>";
                break;
            case "Zjednoczone Emiraty Arabskie":
                $flaga = "<span class='fi fi-ae'></span>";
                break;
            case "Wlochy":
                $flaga = "<span class='fi fi-it'></span>";
                break;
            case "Wielka Brytania":
                $flaga = "<span class='fi fi-gb'></span>";
                break;
            case "Hiszpania":
                $flaga = "<span class='fi fi-es'></span>";
                break;
            case "Wietnam":
                $flaga = "<span class='fi fi-vn'></span>";
                break;
            case "Turcja":
                $flaga = "<span class='fi fi-tr'></span>";
                break;
            case "Szwecja":
                $flaga = "<span class='fi fi-se'></span>";
                break;
            case "Szwajcaria":
                $flaga = "<span class='fi fi-ch'></span>";
                break;
            case "Syria":
                $flaga = "<span class='fi fi-sy'></span>";
                break;
            case "Algieria":
                $flaga = "<span class='fi fi-dz'></span>";
                break;
            case "Argentyna":
                $flaga = "<span class='fi fi-ar'></span>";
                break;
            case "Australia":
                $flaga = "<span class='fi fi-au'></span>";
                break;
            case "Austria":
                $flaga = "<span class='fi fi-at'></span>";
                break;
            case "Bangladesz":
                $flaga = "<span class='fi fi-bd'></span>";
                break;
            case "Belgia":
                $flaga = "<span class='fi fi-be'></span>";
                break;
            case "Korea Poludniowa":
                $flaga = "<span class='fi fi-kr'></span>";
                break;
            case "Indie":
                $flaga = "<span class='fi fi-in'></span>";
                break;
            case "Japonia":
                $flaga = "<span class='fi fi-jp'></span>";
                break;
            case "Meksyk":
                $flaga = "<span class='fi fi-mx'></span>";
                break;
            case "Holandia":
                $flaga = "<span class='fi fi-nl'></span>";
                break;
            case "Nowa Zelandia":
                $flaga = "<span class='fi fi-nz'></span>";
                break;
            case "Kanada":
                $flaga = "<span class='fi fi-ca'></span>";
                break;
            case "Izrael":
                $flaga = "<span class='fi fi-il'></span>";
                break;
            case "Pakistan":
                $flaga = "<span class='fi fi-pk'></span>";
                break;
            case "Maroko":
                $flaga = "<span class='fi fi-ma'></span>";
                break;
            case "Etiopia":
                $flaga = "<span class='fi fi-et'></span>";
                break;
            case "Filipiny":
                $flaga = "<span class='fi fi-ph'></span>";
                break;
            case "Nigeria":
                $flaga = "<span class='fi fi-ng'></span>";
                break;
            case "Nepal":
                $flaga = "<span class='fi fi-np'></span>";
                break;
            case "Egipt":
                $flaga = "<span class='fi fi-eg'></span>";
                break;
            case "Kostaryka":
                $flaga = "<span class='fi fi-cr'></span>";
                break;
        }
        echo '<tr><td>'.$row[0].'</td><td>'.$row[1].'</td><td>'.$flaga.'</td><td>'.$row[2].'</td></tr>';
    }
    echo '</table>';
    ?>
</body>
</html>