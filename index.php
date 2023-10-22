<!--
 * FILENAME: index.html
 * DESCRIPTION: page d'acceuil du générateur de contrat de partenariat commercial
 * AUTHOR: Anton M.
 * CREATED DATE: 20/10/2023
-->

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue !</title>
    <meta author="Anton M.">
    <!-- Bootstrap CSS stylesheets -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Personnal CSS -->
    <!--<link rel="stylesheet" href="style.css">-->

</head>

<body>

    <?php 
        require_once("static/navbar.php");
    ?>
    
    <div class="container my-5">
  <div class="p-5 text-center bg-body-tertiary rounded-3">
    <h1 class="text-body-emphasis">Basic jumbotron</h1>
    <p class="lead">
      This is a simple Bootstrap jumbotron that sits within a <code>.container</code>, recreated with built-in utility classes.
    </p>
  </div>
</div>
<br/>
    <?php
        require_once("static/footer.php");
    ?>

</body>
<!-- Bootstrap JS scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

</html>