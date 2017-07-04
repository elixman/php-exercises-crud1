<!DOCTYPE html>
<html lang="fr">
  <head>
      <meta charset="utf-8">
      <link rel="stylesheet" href="style.css" />
      <title>php-exercises-crud1</title>
  </head>
    <?php
      try{
          $pdo = new PDO('mysql:host=localhost;dbname=colyseum','sylvain','jedi');
          $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
          $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
      }
      catch(PDOException $e){
          echo "The connection couldn't be established";
      }

      $show = $pdo->query('SELECT * FROM showTypes');
      $allshows = $show->fetchAll();
      // var_dump($allcustomers);
      foreach ($allshows as $value) {
          echo "<div class='createsection'>
                  <p>Show : ".$value->type."</p>
                </div>";
      }
    ?>
</body>
</html>
