<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zadanie_27_05_2024</title>
    <link rel="stylesheet" href="style.css">

    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@7.0.0/css/flag-icons.min.css"
    />

</head>
<body>
    <?php
        $conn = mysqli_connect("localhost","root","","egzamin");
        $q = "SELECT `id_gracza`, `kraj`, `data_dolaczenia` FROM `gracze` WHERE 1 ORDER BY `kraj`";
        $r = mysqli_query($conn,$q);

        echo "<table id='tabelka1'>";
        echo "<tr><th>ID</th><th>Kraj</th><th>Flag</th><th>Data dołączenia</th></tr>";
        while ($row = mysqli_fetch_row($r)) {
            $flaga = "<span class='fi fi-xx'></span>";
            //----------------------------------------------------------------------------
            if($row[1]=="Polska"){$flaga="<span class='fi fi-pl'></span>";}
            if($row[1]=="Chiny"){$flaga="<span class='fi fi-cn'></span>";}
            if($row[1]=="Niemcy"){$flaga="<span class='fi fi-de'></span>";}
            if($row[1]=="Stany Zjednoczone"){$flaga="<span class='fi fi-us'></span>";}
            if($row[1]=="Rosja"){$flaga="<span class='fi fi-ru'></span>";}
            if($row[1]=="Francja"){$flaga="<span class='fi fi-fr'></span>";}
            if($row[1]=="Bialorus"){$flaga="<span class='fi fi-by'></span>";}
            if($row[1]=="Zjednoczone Emiraty Arabskie"){$flaga="<span class='fi fi-ae'></span>";}
            if($row[1]=="Wlochy"){$flaga="<span class='fi fi-it'></span>";}
            if($row[1]=="Wielka Brytania"){$flaga="<span class='fi fi-gb'></span>";}
            if($row[1]=="Hiszpania"){$flaga="<span class='fi fi-es'></span>";}
            if($row[1]=="Wietnam"){$flaga="<span class='fi fi-vn'></span>";}
            if($row[1]=="Turcja"){$flaga="<span class='fi fi-tr'></span>";}
            if($row[1]=="Szwecja"){$flaga="<span class='fi fi-se'></span>";}
            if($row[1]=="Szwajcaria"){$flaga="<span class='fi fi-ch'></span>";}
            if($row[1]=="Syria"){$flaga="<span class='fi fi-sy'></span>";}
            if($row[1]=="Algieria"){$flaga="<span class='fi fi-dz'></span>";}
            if($row[1]=="Argentyna"){$flaga="<span class='fi fi-ar'></span>";}
            if($row[1]=="Australia"){$flaga="<span class='fi fi-au'></span>";}
            if($row[1]=="Austria"){$flaga="<span class='fi fi-at'></span>";}
            if($row[1]=="Bangladesz"){$flaga="<span class='fi fi-bd'></span>";}
            if($row[1]=="Belgia"){$flaga="<span class='fi fi-be'></span>";}
            if($row[1]=="Korea Poludniowa"){$flaga="<span class='fi fi-kr'></span>";}
            if($row[1]=="Indie"){$flaga="<span class='fi fi-in'></span>";}
            //----------------------------------------------------------------------------
            echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$flaga."</td><td>".$row[2]."</td></tr>";
        }
        echo "</table>";
        mysqli_close($conn);
    ?>
</body>
</html>