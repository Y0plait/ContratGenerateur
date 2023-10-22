<?php 
   /*
    * FILENAME: navbar.php
    * DESCRIPTION: navbar du générateur de contrat de partenariat commercial et script pour le toggle du thème
    * AUTHOR: Anton M.
    * CREATED DATE: 20/10/2023
    */ 
?>

<script>

    function toggleTheme() {
        if (getCookie("theme") == "light") {
            setCookie("theme", "dark", 365);
            replaceLightWithDark();
        } else if (getCookie("theme") == "dark") {
            setCookie("theme", "light", 365);
            replaceDarkWithLight();
        } else {
            if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
                setCookie("theme", "light", 365);
                replaceLightWithDark();
            } else {
                setCookie("theme", "dark", 365);
                replaceDarkWithLight();
            }
        }
    }

    function replaceLightWithDark() {
        /*
        Default colors:
        --navbar-color: #28a8f1;
        --navbar-text-color: #ffffff;
        --document-text-color: #000000;
        --document-background-color: #ffffff;
        */
        document.documentElement.style.setProperty("--navbar-color", "green");
        document.documentElement.style.setProperty("--navbar-text-color", "green");
        document.documentElement.style.setProperty("--document-text-color", "#DEE2E6");
        document.documentElement.style.setProperty("--document-background-color", "#212529");


    }

    function replaceDarkWithLight() {
        document.documentElement.style.setProperty("--navbar-color", "#28a8f1");
        document.documentElement.style.setProperty("--navbar-text-color", "#ffffff");
        document.documentElement.style.setProperty("--document-text-color", "#000000");
        document.documentElement.style.setProperty("--document-background-color", "#ffffff");

    }

    // Function to set a cookie
    function setCookie(name, value, daysToExpire) {
        const date = new Date();
        date.setTime(date.getTime() + (daysToExpire * 24 * 60 * 60 * 1000));
        const expires = "expires=" + date.toUTCString();
        document.cookie = name + "=" + value + "; " + expires;
    }

    // Function to get a cookie by name
    function getCookie(name) {
        const cookies = document.cookie.split('; ');
        for (let i = 0; i < cookies.length; i++) {
            const cookie = cookies[i].split('=');
            if (cookie[0] === name) {
                return cookie[1];
            }
        }
        return null;
    }

    // Check the "theme" cookie and set the theme accordingly on page load
    document.addEventListener("DOMContentLoaded", function () {
        const savedTheme = getCookie("theme");
        if (savedTheme) {
            document.body.classList.remove("light", "dark");
            document.body.classList.add(savedTheme);
        }
    });



</script>

<!-- Bootstrap Navbar -->

<div class="container">
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-info">
        <div class="container-fluid">
            <a class="navbar-brand" href="/html/CONTRAT_V2/">
                <img src="/html/CONTRAT_V2/static/contract-document-svgrepo-com.svg" alt="" width="40" height="34"
                    class="d-inline-block align-text-top">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($_SERVER['PHP_SELF'] == "/html/CONTRAT_V2/index.php") ? 'active" href="#">' : '" href="/html/CONTRAT_V2/">'; ?> Acceuil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($_SERVER['PHP_SELF'] == "/html/CONTRAT_V2/generateur.php") ? 'active" href="#">' : '" href="/html/CONTRAT_V2/generateur.php">' ?>Générateur</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($_SERVER['PHP_SELF'] == "/html/CONTRAT_V2/preferences.php") ? 'active" href="#">' : '" href="/html/CONTRAT_V2/">' ?>Préférences</a>
                    </li>
                    <li class="nav-item dropdown">

                        <button class="nav-link btn" onclick="toggleTheme()">
                            <img src="https://developer.mozilla.org/static/media/theme-os-default.b14255eadab403fa2e8a.svg"
                                alt="" width="20" height="20">&nbsp; Theme
                        </button>
                    </li>
                </ul>
                
                
            </div>
        </div>
    </nav>
</div>

<div class="b-example-divider"></div>
