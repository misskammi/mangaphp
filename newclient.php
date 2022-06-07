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
        if(isset($_REQUEST['login']) && isset($_REQUEST['password'])) {
            $ss;
        }
    
?>





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
    if(isset($_REQUEST['login2'])&&isset($_REQUEST['password2'])) {
        $q = $db->prepare("INSERT INTO klient VALUES (NULL, ?, ?, ?, ?, ?)");
        $q->bind_param("sssss", $_REQUEST['email2'], $_REQUEST['login2'], $_REQUEST['password2'], $_REQUEST['name2'], $_REQUEST['surname2']);
        $q->execute();
        echo "congrats";
    } else {
        echo 'or die';
    }
    
?>
