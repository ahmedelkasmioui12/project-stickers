<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <title>Document</title>
    <style>
       .container {
            max-width: 400px;
            margin: 0 auto;
            margin-top: 100px;
        }
    </style>
</head>
<body>  
  <div class="container">
<fieldset>
    <legend>Cree un etude</legend>
    <form action="" method="post">
    <div class="form-group">
        <input type="text" name="nom"  class="form-control" placeholder="nom" id="nom"><br>
        <input type="text" name="email"  class="form-control" placeholder="email" id="email"><br>
        <input type="text" name="num" class="form-control" placeholder="num" id="num"><br>
        <input type="text" name="Domaine" class="form-control" placeholder="Domaine" id="Domaine"><br>
<select name="Other_domain" id="Other_domain" class="form-control"  >
  <option value="Mini" class="form-control">Mini</option>
  <option value="Moyen" class="form-control">Moyen</option>
  <option value="Grand" class="form-control">Grand</option>
</select><br>  <input class="form-control" type="text" name="Quantité" placeholder="Quantité" id="Quantité"><br>
        <input type="text" class="form-control" name="adress" placeholder="adress" id="adress"><br>
        <input onclick="mess()" type="submit" class="form-control" value="Envoyer la commande" name="submit">
    </form>
</fieldset>

<script> 
function mess(){

alert("Merci de commander ! attendez nous contacte pour confermer ")

}
</script>

</body>
</html>

<?php
if (isset($_POST['submit'])) {
    $servername = "localhost";
    $username = "root";
    $password = "ahmed1231";
    $dbname = "login";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $num = $_POST['num'];
        $domaine = $_POST['Domaine'];
        $otherDomain = $_POST['Other_domain'];
        $quantite = $_POST['Quantité'];
        $adress = $_POST['adress'];

        $stmt = $conn->prepare("INSERT INTO commande1 (Nom, email, num, Domaine, Other_domain, Quantité, adress)
            VALUES (:nom, :email, :num, :domaine, :otherDomain, :quantite, :adress)");

        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':num', $num);
        $stmt->bindParam(':domaine', $domaine);
        $stmt->bindParam(':otherDomain', $otherDomain);
        $stmt->bindParam(':quantite', $quantite);
        $stmt->bindParam(':adress', $adress);

        $stmt->execute();

        echo "Data inserted successfully!";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $conn = null;
}
?>
