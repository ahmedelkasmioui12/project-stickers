<!DOCTYPE html>
<html>
<head>
    <title>Formulaire de connexion</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        
        .container {
            max-width: 400px;
            margin: 0 auto;
            margin-top: 100px;
        }
    </style>
</head><body style="background-color:burlywood ">

    <div class="container">
        <h2>ACHETER</h2>
        <form action="login.php" method="post">
            <div class="form-group">
                <label for="nom">Nom:</label>
                <input type="text" class="form-control" id="nom" name="nom" required>
            </div>
            <div class="form-group">
                <label for="NUM">NUM:</label>
                <input type="text" class="form-control" id="NUM" name="NUM" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="adress">Address:</label>
                <input type="text" class="form-control" id="adress" name="adress" required>
            </div>
            <div class="form-group">
                <label for="choice">Your choice:</label>
                <select class="form-control" name="choice" id="choice">
                    <option value="product1">Product 1</option>
                    <option value="product2">Product 2</option>
                    <option value="product3">Product 3</option>
                </select>
            </div>
            <button style="text-align: center; margin-left: 36%;" type="submit" name="submit" class="btn btn-primary">ENVOYER COMMANDE</button>
        </form>
    </div>

    <?php
    require("connecting.php"); 

    if (isset($_POST["submit"])) {
        $nom = $_POST["nom"];
        $num = $_POST["NUM"];
        $email = $_POST["email"];
        $adress = $_POST["adress"];
        $choice = $_POST["choice"];

        

        $sql = "INSERT INTO acheter (nom, num, email, adress, choix) VALUES ('$nom', '$num', '$email', '$adress', '$choice')";
        $projet->exec($sql);

     
        if ($projet->lastInsertId()) {
            echo "Data inserted successfully!";
        }
    }
    ?>

</body>
</html>
