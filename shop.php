<link rel="stylesheet" href="styleshop.css">
<img class="baner" src="fotki/baner.png" alt="">
<a href="newclient.php">strona logowania</a>

<h1> Wybierz jaką ilość chcesz kupić, kliknij "submit", podaj swój adres i kliknij "Kup" by kupić!</h1>
<form class="flex" action="shop.php" method="POST">
    <div>
    <img src="fotki/manga1.jpg" alt="cit" height="300px">
    <p>cena 20,99zł</p>
    <input type="text" name="count" id="count" value="">
    </div><div>
    <img src="fotki/manga2.jpg" alt="cit2" height="300px">
    <p>cena 20,99zł</p>
    <input type="text" name="count2" id="count2" value="">
    </div><div>
    <img src="fotki/manga3.jpg" alt="cit3" height="300px">
    <p>cena 20,99zł</p>
    <input type="text" name="count3" id="count3" value="">
    </div><div>
    <img src="fotki/manga4.jpg" alt="cit4" height="300px">
    <p>cena 20,99zł</p>
    <input type="text" name="count4" id="count4" value="">
    </div><div>
    <img src="fotki/manga5.jpg" alt="cit5" height="300px">
    <p>cena 20,99zł</p>
    <input type="text" name="count5" id="count5" value="">
    </div><div>
    <img src="fotki/manga6.jpg" alt="cit6" height="300px">
    <p>cena 20,99zł</p>
    <input type="text" name="count6" id="count6" value="">
    </div>
    <div class="a">
    <input type="submit" value="Submit"></div>
</form>
<?php 
        session_start();
        $db = new mysqli("localhost", "root", "", "manga");
        //tutaj jakaś tabelka - poustawiać te county i tak dalej używając print_r
        $cena1 = $db->query("SELECT cena1 FROM produkty");
        $cena2 = $db->query("SELECT cena2 FROM produkty");
        $cena3 = $db->query("SELECT cena3 FROM produkty");
        $cena4 = $db->query("SELECT cena4 FROM produkty");
        $cena5 = $db->query("SELECT cena5 FROM produkty");
        $cena6 = $db->query("SELECT cena6 FROM produkty");
        $total = $cena1 * $cena2 * $cena3 * $cena4 * $cena5 * $cena6;
        $_SESSION['count'] = $_REQUEST['count'];
        $_SESSION['count2'] = $_REQUEST['count2'];
        $_SESSION['count3'] = $_REQUEST['count3'];
        $_SESSION['count4'] = $_REQUEST['count4'];
        $_SESSION['count5'] = $_REQUEST['count5'];
        $_SESSION['count6'] = $_REQUEST['count6'];
        $_SESSION['total'] = $total
?>
<form action="shop.php" method="post">
    <?php print_r($_REQUEST['count']); ?>
    <?php print_r($_REQUEST['count2']);?>
    <?php print_r($_REQUEST['count3']);?>
    <?php print_r($_REQUEST['count4']);?>
    <?php print_r($_REQUEST['count5']);?>
    <?php print_r($_REQUEST['count6']);?>
    <?php echo $total;?>
    <input type="text" name="adres" id="adres" value="adres">
    <input type="submit" value="Kup">
    <?php
    $q = $db->prepare("INSERT INTO zamowienia VALUES(NULL,?,?,?,?,?,?,?,?");
    $q->bind_param("iiiiiiis", $_SESSION['count'], $_SESSION['count2'], $_SESSION['count3'], $_SESSION['count4'], $_SESSION['count5'], $_SESSION['count6'], $_SESSION['total'], $_REQUEST['adres']);
    $q->execute();
    var_dump($_SESSION['count'])
    ?>
</form>