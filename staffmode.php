<link rel="stylesheet" href="style.css">
<img class="baner" src="fotki/baner.png" alt="">

<div class=wszystko>
<?php //zaplecze staff 
     $db = new mysqli("localhost", "root", "", "manga");
     $q = $db->prepare("SELECT * FROM zamowienia");
     if($q->execute()) {
          $result = $q->get_result();
          while($row = $result->fetch_assoc()) {
               $id = $row['id'];
               $manga1 = $row['manga1'];
               $manga2 = $row['manga2'];
               $manga3 = $row['manga3'];
               $manga4 = $row['manga4'];
               $manga5 = $row['manga5'];
               $manga6 = $row['manga6'];
               $total = $row['total'];
               $adres = $row['adres'];
               echo "Zamówienia:<br>";
               echo "id: $id, mangi: $manga1 $manga2 $manga3 $manga4 $manga5 $manga6, cena końcowa $total, adres: $adres<br>";
          }
     }

     ?>
     </div>
     
