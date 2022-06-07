<?php
  $db = new mysqli("localhost", "root", "", "manga");
  $q = $db->prepare("SELECT * FROM klient WHERE id = ?");
  $q->bind_param("i", $clientID);

?>