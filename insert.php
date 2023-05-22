<?php
include_once('database.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        body {
            text-align: center;
        }
        input {
            padding: 1rem;
            width: 300px;
        }
    </style>
</head>
<body>
    <h1>Data toevoegen</h1>
    <form action="" method="post">
        <label for="productNaam" style="font-size: 25px;">Product naam</label><br>
        <input type="text" name="productNaam"><br><br>
        <label for="prijsPerStuk" style="font-size: 25px;">Prijs per stuk</label><br>
        <input type="text" name="prijsPerStuk"><br><br>
        <label for="omschrijving" style="font-size: 25px;">Omschrijving</label><br>
        <input type="text" name="omschrijving"><br><br>
        <input type="submit" name="submit" value="Toevoegen">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $productNaam = $_POST['productNaam'];
        $prijsPerStuk = $_POST['prijsPerStuk'];
        $omschrijving = $_POST['omschrijving'];


        $sqlInsert = 'INSERT INTO producten(product_naam, prijs_per_stuk, omschrijving) VALUES (:productNaam, :prijsPerStuk, :omschrijving)';
        $stmt = $conn->prepare($sqlInsert);

        $params = array(
            'productNaam' => $productNaam,
            'prijsPerStuk' => $prijsPerStuk,
            'omschrijving' => $omschrijving
        );
        $stmt->execute($params);

        if ($stmt) {
            echo "<h1 style='text-align:center;font-size:25px'> $productNaam succesvol toegevoegd in de database</h1>";
        } else {
            echo "<h1 style='text-align:center;font-size:25px'>Error</h1>";
        }
    }

    ?>
</body>
</html>