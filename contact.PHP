<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="nom">
        <input type="text" name="pass">
        <input type="submit" name="valider">
    </form>


<?php
     $connectionDatabase = new PDO('sqlite:database.sql',null, null, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    ]);
   
    if (isset ($_POST['valider'])) {
        $insertion =  $connectionDatabase->prepare('INSERT INTO usersTable (nom, passwork) VALUES(:nom, :passwork)');
    
         $insertion->execute([
        'nom' => $_POST['nom'],
        'passwork' => $_POST['pass']
    ]);
    }
 
    $affiche =  $connectionDatabase->query('SELECT *FROM usersTable');

    foreach($affiche as $personne){
        print_r($personne->nom);
        print_r($personne->passwork);
    }

    $aff =  $connectionDatabase->query('SELECT usersTable.nom, usersTable.id
    FROM usersTable  ORDER BY usersTable.id DESC ');
    
    
    foreach ($aff as  $AA) {
        
        print($AA->nom);

    }





?> 
    
</body>
</html>