<link rel="stylesheet" href="style.css">
<img class="baner" src="fotki/baner.png" alt="">
<div class="wszystko">

<div class="pudlo">
<h1>Login</h1>
<form action="newclient.php" method="post">
 <label for="email">Email:</label><br>
 <input type="text" name="email" id="email"><br>
 <label for="login">Login:</label><br>
 <input type="text" name="login" id="login"><br>
 <label for="password">Haslo:</label><br>
 <input type="text" name="password" id="password"><br>

 <input type="submit" value="Zaloguj się">
</form>

<?php
         $db = new mysqli("localhost", "root", "", "manga");
         $q = $db->prepare("SELECT * FROM klient WHERE email = ?  AND `login` = ? AND haslo = ?");
$q->bind_param("sss", $_REQUEST['email'], $_REQUEST['login'], $_REQUEST['password']);
         $q->execute();
         $result = $q->get_result();
         if($result->num_rows >= 1) {
             $klientresult = $result->fetch_assoc();
             $klientid = $klientresult['id'];
             echo "Logowanie powiodło się!";
             echo '<form action = "shop.php" method="POST">
             <input type="submit" value="Przejdź do sklepu!">
             </form>';
         } else {
             echo "";
         }
?>
</div>




<div class="pudlo">
<h1>Rejestracja</h1>
<form action="newclient.php" method="POST">
    <label for="email2">Email</label><br>
    <input type="text" name="email2" id="email2"><br>
    <label for="login2">Login:</label><br>
    <input type="text" name="login2" id="login2"><br>
    <label for="password2">Haslo:</label><br>
    <input type="text" name="password2" id="password2"><br>
    <label for="name2">Imie:</label><br>
    <input type="text" name="name2" id="name2"><br>
    <label for="surname2">Nazwisko:</label><br>
    <input type="text" name="surname2" id="surname2"><br>
    <input type="submit" value="Zarejestruj się"><br>
    </label>
</form>

<?php

    if(!empty($_REQUEST['login2'])&& !empty($_POST['password2'])&& !empty($_REQUEST['email2'])&& !empty($_REQUEST['name2'])&& !empty($_REQUEST['surname2']) !== "") {
        $q = $db->prepare("INSERT INTO klient VALUES (NULL, ?, ?, ?, ?, ?)");
        $q->bind_param("sssss", $_REQUEST['email2'], $_REQUEST['login2'], $_REQUEST['password2'], $_REQUEST['name2'], $_REQUEST['surname2']);
        $q->execute();
        echo "Rejestracja powiodła się! Teraz możesz zalogować się";
    } else {
        echo '';
    }

?>
</div>
</div>
<div class="prac">
    <p align="center"> Logowanie na zaplecze <a href="staff.php">o tu!</a></p>
</div>
