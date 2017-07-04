<?php
  try{
      $pdo = new PDO('mysql:host=localhost;dbname=colyseum','sylvain','jedi');
      $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
      $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
  }
  catch(PDOException $e){
      echo "The connection couldn't be established";
  }

  $credantials = $pdo->query("SELECT * FROM clients JOIN cards ON clients.cardNumber = cards.cardNumber JOIN cardtypes ON cardTypes.id = cards.cardTypesId");

  while ($value = $credantials->fetch()){
  // var_dump($credantials);


    $loyaltycard="";

    if($value->cardTypesId==1) {
      $loyaltycard= ("Yes | Card number : ".($value->cardNumber));
    }
    else {
      $loyaltycard= "No";
    }
    echo "<div>
            <p>Name : ".$value->firstName."</p>
            <p> Surname : ".$value->lastName."</p>
            <p> Birthday : ".$value->birthDate."</p>
            <p> Loyaly card : ".$loyaltycard."</p>
            </br></br>
          </div>";
  };
?>
<?php
$fid = $bdd->query("SELECT * FROM clients JOIN cards ON clients.cardNumber = cards.cardNumber JOIN cardtypes ON cardTypes.id = cards.cardTypesId");
// var_dump($fid);

while ($value = $fid->fetch()){

  $fidelite="";

  if ($value->cardTypesId==1) {
    $fidelite= ("oui, numero de carte : ".($value->cardNumber));
  }
  else {
    $fidelite= "no";
  }
  echo '<p>numero de carte :' .$fidelite.'</p>';
};
?>
