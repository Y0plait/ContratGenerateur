<!--
MIT License

Copyright (c) 2023 Y0plait

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
-->

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
    <!-- Personnal CSS | For the footer-->
    <link rel="stylesheet" href="style.css">

</head>

<body>

    <?php 
        require_once("static/navbar.php");
    ?>
    <article>
        <div class="container my-5">
            <div class="p-5 bg-body-tertiary rounded-3">
                <h1 class="text-body-emphasis">Bienvenido, welcome, wilkommen, bienvenue ... (ai pus d'inspi)</h1>
                <p class="lead">
                    Site web qui est censé pouvoir générer des contrats de partenariat commercial... Je dis censé attention. C'est en cours de développement. <br/>
                    Pour accéder au générateur rien de plus simple : clique dans la navbar la haut ou <code><a href="./generateur.php">clique ici</a></code>. <br/>
                    Tout l'UI a été faite avec <a href="https://getbootstrap.com/">Bootstrap 5.0.2</a>. <br/>
                    Le site est hebergé chez moi 🤪🤪. (Essaye pas de ping le nom de domaine tu tomberas sur un serveur CloudFlare).<br />
                    ⚠️⚠️⚠️ C'est pas de la prod ... (je tiens juste à préciser) ⚠️⚠️⚠️
                    <br/>
                    <video autoplay loop muted width="500" height="300" src="https://media1.giphy.com/media/2rqEdFfkMzXmo/giphy.mp4?cid=790b76118e85130b6027e42ff5aca28cf62871c4e09f8306&rid=giphy.mp4&ct=g"></video>
                    
                </p>
            </div>
        </div>
    </article>
    <?php
        require_once("static/footer.php");
    ?>

    <!-- Bootstrap JS scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

</body>


</html>
