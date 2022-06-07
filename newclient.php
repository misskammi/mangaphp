<?php
    $db = new mysqli("localhost", "root", "", "manga");
   
      $q = $db->prepare("SELECT * FROM klient");
    if($q && $q->execute()) {
        $result = $q->get_result();
        $clientlist = array();
        while($client = $result->fetch_assoc()) {
            $clientemail = $client['email'];
            $clientid = $client['id'];
            $clientlogin = $client['login'];
            $clientpass = $client['haslo'];
            $clientname = $client['imie'];
            $clientsur = $client['nazwisko'];
        }
    } 
   /* $q -> $db->prepare("SELECT * FROM klient WHERE id = ?");
    $q->bind_param("i", $clientid);
*/
        




?>
<h1>Login</h1>
<form action="shop.php" method="post">
 <label for="email">Email:</label><br>
 <input type="text" name="email" id="email"><br>
 <label for="login">Login:</label><br>
 <input type="text" name="login" id="login"><br>
 <label for="password">Haslo:</label><br>
 <input type="text" name="password" id="password"><br>
 <input type="hidden" name="clientID"
                value="<?php echo $clientID ?>">
 <input type="submit" value="Zaloguj się">
</form>

<?php
        $q = $db->prepare("SELECT * FROM klient WHERE id = ?");
        $q->bind_param("i", $clientid);
        if($q && $q->execute()) {
        $login = $q->get_result()->fetch_assoc();
        }
?>





<h1>Rejestracja</h1>
<form action="newclient.php" method="POST">
    <label for="email">Email</label><br>
    <input type="text" name="email" id="email"><br>
    <label for="login2">Login:</label><br>
    <input type="text" name="login" id="login"><br>
    <label for="password2">Haslo:</label><br>
    <input type="text" name="password" id="password"><br>
    <label for="name">Imie:</label><br>
    <input type="text" name="name" id="name"><br>
    <label for="surname">Nazwisko:</label><br>
    <input type="text" name="surname" id="surname"><br>
    <input type="submit" value="Zarejestruj się"><br>
    </label>
</form>
<?php
    if(isset($_POST['login']) && isset($_POST['password'])) {
        $q = $db->prepare("INSERT INTO klient VALUES (NULL, ?, ?, ?, ?, ?)");
        $q->bind_param("sssss", $clientemail, $clientlogin, $clientpass, $clientname, $clientsur);
        $q->execute();
        echo "lorem";
    } else {
        echo "die"; 
    }
    
?>
