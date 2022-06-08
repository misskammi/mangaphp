<link rel="stylesheet" href="styleshop.css">
<img class="baner" src="fotki/baner.png" alt="">
<a href="newclient.php">strona logowania</a>

<h1> Wybierz jaką ilość chcesz kupić, kliknij "submit", podaj swój adres i kliknij "Kup" by kupić!</h1>
<form class="flex" action="shop.php" method="POST">
    <div>
    <img src="fotki/manga1.jpg" alt="cit" height="300px">
    <p>cena 20,99zł</p>
    <input type="text" name="count" id="count" value="0">
    </div><div>
    <img src="fotki/manga2.jpg" alt="cit2" height="300px">
    <p>cena 20,99zł</p>
    <input type="text" name="count2" id="count2" value="0">
    </div><div>
    <img src="fotki/manga3.jpg" alt="cit3" height="300px">
    <p>cena 20,99zł</p>
    <input type="text" name="count3" id="count3" value="0">
    </div><div>
    <img src="fotki/manga4.jpg" alt="cit4" height="300px">
    <p>cena 20,99zł</p>
    <input type="text" name="count4" id="count4" value="0">
    </div><div>
    <img src="fotki/manga5.jpg" alt="cit5" height="300px">
    <p>cena 20,99zł</p>
    <input type="text" name="count5" id="count5" value="0">
    </div><div>
    <img src="fotki/manga6.jpg" alt="cit6" height="300px">
    <p>cena 20,99zł</p>
    <input type="text" name="count6" id="count6" value="0">
    </div>
    <div class="a">
    <input type="submit" value="Submit"></div>
</form>
<?php 
        session_start();
        $db = new mysqli("localhost", "root", "", "manga");
        //tutaj jakaś tabelka - poustawiać te county i tak dalej używając print_r

        if(isset($count)) {$_REQUEST['count'];}
        if(isset($count2)) {$_REQUEST['count2'];}
        if(isset($count3)) {$_REQUEST['count3'];}
        if(isset($count4)) {$_REQUEST['count4'];}
        if(isset($count5)) {$_REQUEST['count5'];}
        if(isset($count6)) {$_REQUEST['count6'];}

        $cena1 = 20;
        $cena2 = 20;
        $cena3 = 20;
        $cena4 = 20;
        $cena5 = 20;
        $cena6 = 20;
        $total = ($cena1 * $count) + ($cena2 * $count2) + ($cena3 * $count3)+ ($cena4 * $count4) + ($cena5 * $count5) + ($cena6 * $count6);
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
    $q = $db->prepare("INSERT INTO zamowienia VALUES(NULL,?,?,?,?,?,?,?,?)");
    $q->bind_param("iiiiiiis", $count, $count2, $count3, $count4, $count5, $count6, $total, $_REQUEST['adres']);
    $q->execute();
    ?>
</form>