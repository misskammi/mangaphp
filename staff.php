<link rel="stylesheet" href="style.css">
<img class="baner" src="fotki/baner.png" alt="">

<div class="wszystko">
<div class="pudlo">
<form action="staff.php" method="POST">
  <label for="login3">Login:</label><br>
  <input type="text" name="login3" id="login3"><br>
  <label for="haslo3">Haslo:</label><br>
  <input type="text" name="haslo3" id="haslo3"><br>
  <input type="submit" value="Zaloguj się">
</form>

<?php
         $db = new mysqli("localhost", "root", "", "manga");
         $q = $db->prepare("SELECT * FROM pracownicy WHERE `login` = ? AND haslo = ?");
         $q->bind_param("ss", $_REQUEST['login3'], $_REQUEST['haslo3']);
         $q->execute();
         $result = $q->get_result();
         if($result->num_rows == 1) {
             $staffresult = $result->fetch_assoc();
             $staffid = $staffresult['id'];
             echo '<form action = "staffmode.php" method="post">
             <input type="submit" value="Przejdź do sklepu">
             </form>';

         } else {
             echo "";
         }
?>
</div></div>