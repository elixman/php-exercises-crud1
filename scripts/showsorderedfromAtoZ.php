<?php
  try{
      $pdo = new PDO('mysql:host=localhost;dbname=colyseum','sylvain','jedi');
      $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
      $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
  }
  catch(PDOException $e){
      echo "The connection couldn't be established";
  }

  $show = $pdo->query('SELECT title,performer,date,startTime FROM shows ORDER BY title');
  $allshows = $show->fetchAll();
  // var_dump($allcustomers);
  foreach ($allshows as $value) {
      echo "<div class='createsection'>
              <p>Show : ".$value->title." | starring : ".$value->performer." | on : ".$value->date." | at : ".$value->startTime."</p>
            </div>";
  }
?>
