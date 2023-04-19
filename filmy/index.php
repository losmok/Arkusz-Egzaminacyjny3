<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Video On Demand</title>
</head>
<body>
    <div class="baner-lewy"><h1>Internetowa wypożyczalnia filmów</h1></div>
    <div class="baner-prawy">
        <table>
            <tr><td>Kryminał</td><td>Horror</td><td>Przygodowy</td></tr>
            <tr><td>20</td><td>30</td><td>20</td></tr>
        </table>
    </div>
    <div class="list-polecamy">
        <h3>Polecamy</h3>
        <?php
            $con = new mysqli("127.0.0.1","root","","dane3");
            $res = ("SELECT id, nazwa, opis, zdjecie FROM produkty WHERE id IN (18, 22, 23, 25);");
            $cos = mysqli_query($con, $res);
            while($wiersz=mysqli_fetch_array($cos)){
                echo  "<div class='film'>
                <h4>$wiersz[0]. $wiersz[1]</h4>
                <div class='photo' style='background-image: url($wiersz[3])'></div>
                <p>$wiersz[2]</p>
                </div>";
            }
        ?>
    </div>
    <div class="list-fantastyczne">
        <h3>Filmy fantastyczne</h3>
        <?php
            $res = ("SELECT id, nazwa, opis, zdjecie FROM produkty WHERE Rodzaje_id = 12;");
            $cos = mysqli_query($con, $res);
            while($wiersz=mysqli_fetch_array($cos)){
                echo  "<div class='film'>
                <h4>$wiersz[0]. $wiersz[1]</h4>
                <div class='photo' style='background-image: url($wiersz[3])'></div>
                <p>$wiersz[2]</p>
                </div>";
            }
        ?>
    </div>
    <div class="stopka">
        <div class="submit">
            <p>Usuń film nr:</p>
            <form method="POST">
                <input type="number" name="id">
                <input type="submit" value="Usuń film">
        </div>
            <p>Stronę wykonał: Paweł Lewandowski</p>
        </form>
        <?php
            // $_POST["id"];
            if(isset($_POST["id"])){
                $res1 = ("DELETE FROM produkty WHERE id = ".$_POST["id"]);
                $cos1 = mysqli_query($con, $res1);
            }
        ?>
    </div>
</body>
</html>