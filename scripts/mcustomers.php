<?php
  try{
      $pdo = new PDO('mysql:host=localhost;dbname=colyseum','sylvain','jedi');
      $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
      $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
  }
  catch(PDOException $e){
      echo "The connection couldn't be established";
  }

  $customer = $pdo->query("SELECT * FROM clients WHERE lastName LIKE 'M%'");
  $allcustomers = $customer->fetchAll();
  // var_dump($allcustomers);
  foreach ($allcustomers as $value) {
      echo "<div class='createsection'>
              <p>Name : ".$value->firstName." | Surname : ".$value->lastName."</p>
            </div>";
  }
?>
