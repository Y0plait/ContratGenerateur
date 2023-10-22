<!--
 * FILENAME: index.html
 * DESCRIPTION: Générateur de contrat de partenariat commercial
 * AUTHOR: Anton M.
 * CREATED DATE: 20/10/2023
-->

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contrat de partenariat commercial</title>
    <meta author="Anton M.">
    <!-- Bootstrap CSS stylesheets -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Personnal CSS -->
    <link rel="stylesheet" href="style.css">

    <script>
        function preview(destImgId) {
            var destImg = document.getElementById(destImgId);
            destImg.src=URL.createObjectURL(event.target.files[0]);
        }


        let nbParties = 2; // initial number of parties

        function remBtnState() {
            // disable remove button if there are only 2 parties
            const removePartiesBtn = document.getElementById("supprParties");
            if (nbParties <= 2) {
                removePartiesBtn.disabled = true;
            } else {
                removePartiesBtn.disabled = false;
            }
        }

        document.addEventListener("DOMContentLoaded", function () {
            remBtnState();
        });

        // function to add a new partie div
        function addPartie() {
            nbParties++; // increment the number of parties

            // Ajout d'un parti dans le heading
            const partiesDiv = document.getElementById("heading");
            const newPartyDiv = document.createElement("div");
            newPartyDiv.classList.add("input-group", "input-group-sm", "mb-3");
            newPartyDiv.innerHTML = `
                <span class="input-group-text" id="inputGroup-sizing-sm">${nbParties}</span>
                <input type="text" class="form-control" aria-label="Sizing example input"
                    aria-describedby="inputGroup-sizing-sm" name="parti${nbParties}">
            `;
            partiesDiv.appendChild(newPartyDiv);

            // Ajout d'un parti dans la contribution
            const contributionDiv = document.getElementById("contribution");
            const newContributionDiv = document.createElement("div");
            newContributionDiv.classList.add("input-group", "input-group-sm", "mb-3");
            newContributionDiv.innerHTML = `
                <span class="input-group-text" id="inputGroup-sizing-sm">${nbParties}</span>
                <textarea class="form-control" rows="5" name="elementContribution${nbParties}" placeholder=""></textarea>
            `;
            contributionDiv.appendChild(newContributionDiv);

            // Ajout d'un parti dans les signatures
            const signaturesDiv = document.getElementById("signatures-parties");
            const newSignatureDiv = document.createElement("div");
            newSignatureDiv.classList.add("input-group", "input-group-sm", "mb-3");
            newSignatureDiv.innerHTML = `
                <label for="signaturePartenaire${nbParties}" class="input-group-text">Nom & signature: </label>
                <input type="text" class="form-control" class="inputSignatureName${nbParties}" placeholder="Nom du partenaire">
                <input class="form-control" type="file" name="signaturePartenaire${nbParties}" accept=".png, .html, .htm" onchange="preview('thumb${nbParties}')">
                <img id="thumb${nbParties}" alt="" width="150px">                       
            `;

            signaturesDiv.appendChild(newSignatureDiv);
            remBtnState()
        }

        // function to remove the last partie div
        function removePartie() {
            if (nbParties > 2) { // only remove if there are more than 2 parties

                const partiesDiv = document.getElementById("heading");
                partiesDiv.removeChild(partiesDiv.lastChild);
                
                const contributionDiv = document.getElementById("contribution");
                contributionDiv.removeChild(contributionDiv.lastChild);

                const signaturesDiv = document.getElementById("signatures-parties");
                signaturesDiv.removeChild(signaturesDiv.lastChild);

                nbParties--; // decrement the number of parties
                remBtnState()
            }
        }
        
        // Bootstrap form validation
        (() => {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
                }, false)
            })
            })()


    </script>

</head>

<body>

    <?php
    require_once("static/navbar.php");
    ?>


    <div class="accordion row mx-auto py-5" id="accordionPanelContrat">

        <hr class="mb-4">
        <h1 id="title" class="mt-2 text-center fw-bold">Contrat de partenariat commercial</h1>
        <hr class="mt-4">
        <form action="contrat.php" method="post">

            <!--En-tête & Préambule-->
            <div class="accordion-item">
                <h2 class="subtitle-light accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelArticle-collapseHead" aria-expanded="true"
                        aria-controls="panelArticle-collapseHead">
                        En-tête
                    </button>
                </h2>
                <div id="panelArticle-collapseHead" class="accordion-collapse collapse show">
                    <div class="accordion-body">
                        <div class="heading light" id="heading">
                            <p>Ce contrat est fait ce jour <input type="date" name="dateFait" class="needs-validation">, en <input type="number"
                                    name="nombreCopiesOriginales" placeholder="1" class="needs-validation"> copies originales, entre: <br></p>

                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">1</span>
                                <input type="text" class="form-control" aria-label="Sizing example input"
                                    aria-describedby="inputGroup-sizing-sm" name="parti1">
                            </div>
                            
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">2</span>
                                <input type="text" class="form-control" aria-label="Sizing example input"
                                    aria-describedby="inputGroup-sizing-sm" name="parti2">
                            </div>

                        </div>

                        <button type="button" class="btn btn-outline-success" id="ajoutParties" onclick="addPartie()">Ajouter un partenaire</button>
                        <button type="button" class="btn btn-outline-danger" id="supprParties" onclick="removePartie()">Supprimer un partenaire</button>
                    </div>
                </div>
            </div>

            <!--Articles-->
            <div class="articleBody light">

                <!--1. Nom du partenariat et activité-->
                <div class="accordion-item">
                    <h2 class="subtitle-light accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelArticle-collapseOne" aria-expanded="true"
                            aria-controls="panelArticle-collapseOne">
                            1. Nom du partenariat et activité
                        </button>
                    </h2>

                    <div id="panelArticle-collapseOne" class="accordion-collapse collapse show">
                        <div class="accordion-body">
                            <p>1.1 Nature des activités: Les Partenaires cités ci-dessus donnent leur accord d'être
                                considérés
                                comme des
                                partenaires commerciaux pour les fins suivantes :</p>
                            <textarea class="form-control" name="natureActivites" placeholder="" rows="5"></textarea>

                            <p>1.2 Nom: Les Partenaires cités ci-dessus donnent leur accord, pour que le partenariat
                                commercial
                                soit
                                exercé
                                sous le nom:</p>
                            <textarea class="form-control" name="nameActivites" placeholder="" rows="5"></textarea>

                            <p>1.3 Nom: dresse officielle: Les Partenaires cités ci-dessus donnent leur accord pour que
                                le siège
                                du
                                partenariat commercial soit:</p>
                            <textarea class="form-control" name="adresseActivites" placeholder="" rows="5"></textarea>
                        </div>
                    </div>
                </div>

                <!--2. Termes-->
                <div class="accordion-item">
                    <h2 class="subtitle-light accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelArticle-collapseTwo" aria-expanded="true"
                            aria-controls="panelArticle-collapseTwo">
                            2. Termes
                        </button>
                    </h2>
                    <div id="panelArticle-collapseTwo" class="accordion-collapse collapse show">
                        <div class="accordion-body">
                            <p>2.1 Le partenariat commence le <input type="date" class="needs-validation" name="dateDebut" > et continue jusqu'à
                                la fin de cet accord.</p>
                        </div>
                    </div>
                </div>

                <!--3. Contribution au partenariat-->
                <div class="accordion-item">
                    <h2 class="subtitle-light accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelArticle-collapseThree" aria-expanded="true"
                            aria-controls="panelArticle-collapseThree">
                            3. Contribution au partenariat
                        </button>
                    </h2>
                    <div id="panelArticle-collapseThree" class="accordion-collapse collapse show">
                        <div class="accordion-body" id="contribution">
                            <p>3.1 La contribution de chaque partenaire au capital listée ci-dessous se compose des
                                éléments suivants :</p>

                            <!--Textarea pour multi line user input -->
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">1</span>
                                <textarea class="form-control" rows="5" name="elementContribution1"
                                    placeholder=""></textarea>
                            </div>

                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">2</span>
                                <textarea class="form-control" rows="5" name="elementContribution2"
                                    placeholder=""></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 4. Repartition benef -->
                <div class="accordion-item">
                    <h2 class="subtitle-light accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelArticle-collapseFour" aria-expanded="true"
                            aria-controls="panelArticle-collapseFour">
                            4. Répartition des bénéfices et des pertes
                        </button>
                    </h2>
                    <div id="panelArticle-collapseFour" class="accordion-collapse collapse show">
                        <div class="accordion-body">
                            <p>4.1 Les Partenaires se partageront les profits et les pertes du partenariat commercial de
                                la manière suivante :</p>
                            <div class="input-group input-group-sm mb-3">
                                <textarea class="form-control" rows="5" name="repartitionBenef"
                                    placeholder=""></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <!--5. Partenaires additionnels-->
                <div class="accordion-item">
                    <h2 class="subtitle-light accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelArticle-collapseFive" aria-expanded="true"
                            aria-controls="panelArticle-collapseFive">
                            5. Partenaires additionnels
                        </button>
                    </h2>
                    <div id="panelArticle-collapseFive" class="accordion-collapse collapse show">
                        <div class="accordion-body">
                            <p>5.1 Aucune personne ne peut être ajoutée en tant que partenaire et aucune autre autre
                                activité ne peut être menée par le partenariat sans le consentement écrit de tous les
                                partenaires.</p>
                        </div>
                    </div>
                </div>

                <!--6. Modalités bancaires et termes financiers-->
                <div class="accordion-item">
                    <h2 class="subtitle-light accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelArticle-collapseSix" aria-expanded="true"
                            aria-controls="panelArticle-collapseSix">
                            6. Modalités bancaires et termes financiers
                        </button>
                    </h2>
                    <div id="panelArticle-collapseSix" class="accordion-collapse collapse show">
                        <div class="accordion-body">
                            <p>6.1 Les Partenaires doivent avoir un compte bancaire au nom du partenariat sur lequel les
                                chèques doivent être signés par au moins <input type="number" class="needs-validation" name="minSignature" placeholder="2"> des Partenaires.</p>
                            <p>6.2 Les Partenaires doivent tenir une comptabilité complète du partenariat et la rendre
                                disponible à tous les Partenaires à tout moment.</p>
                        </div>
                    </div>
                </div>

                <!--7. Gestion des activités de partenariat-->
                <div class="accordion-item">
                    <h2 class="subtitle-light accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelArticle-collapseSeven" aria-expanded="true"
                            aria-controls="panelArticle-collapseSeven">
                            7. Gestion des activités de partenariat
                        </button>
                    </h2>
                    <div id="panelArticle-collapseSeven" class="accordion-collapse collapse show">
                        <div class="accordion-body">
                            <p>7.1 Chaque partenaire peut prendre part dans la gestion du partenariat.</p>
                            <p>7.2 Tout désaccord qui intervient dans l'exploitation du partenariat, sera réglé par les
                                partenaires détenant la majorité des parts du partenariat.</p>
                        </div>
                    </div>
                </div>

                <!--8. Départ d'un partenaire commercial-->
                <div class="accordion-item">
                    <h2 class="subtitle-light accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelArticle-collapseEight" aria-expanded="true"
                            aria-controls="panelArticle-collapseEight">
                            8. Départ d'un partenaire commercial
                        </button>
                    </h2>
                    <div id="panelArticle-collapseEight" class="accordion-collapse collapse show">
                        <div class="accordion-body">
                            <p>8.1 Si un partenaire se retire du partenariat commercial pour une raison quelconque, y
                                compris le décès, les autres partenaires peuvent continuer à exploiter le partenariat
                                sous le même nom.</p>
                            <p>8.2 Le partenaire qui se retire est tenu de donner un préavis écrit d'au moins soixante
                                (60) jours de son intention de se retirer et est tenu de vendre ses parts du partenariat
                                commercial.</p>
                            <p>8.3 Aucun partenaire ne doit céder ses actions dans le partenariat commercial à une autre
                                partie sans le consentement écrit des autres partenaires</p>
                            <p>8.4 Le ou les partenaires restants paieront au partenaire qui se retire, ou au
                                représentant légal du partenaire décédé ou handicapé, la valeur de ses parts dans le
                                partenariat, ou (a) la somme de son capital, (b) des emprunts impayés qui lui sont dus,
                                (c) sa quote-part des bénéfices nets cumulés non distribués dans son compte, et (d) son
                                intérêt dans toute plus-value préalablement convenue de la valeur du partenariat par
                                rapport à sa valeur comptable. Aucune valeur de bonne volonté ne doit être incluse dans
                                la détermination de la valeur des parts du partenaire.</p>
                        </div>
                    </div>
                </div>

                <!--9. Clause de non concurrence-->
                <div class="accordion-item">
                    <h2 class="subtitle-light accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelArticle-collapseNine" aria-expanded="true"
                            aria-controls="panelArticle-collapseNine">
                            9. Clause de non concurrence
                        </button>
                    </h2>
                    <div id="panelArticle-collapseNine" class="accordion-collapse collapse show">
                        <div class="accordion-body">
                            <p>9.1 Un partenaire qui se retire du partenariat ne doit pas s'engager directement ou
                                indirectement dans une entreprise qui est ou serait en concurrence avec la nature des
                                activités actuelles ou futures du partenariat pendant <input type="text"
                                    name="minNonConcurrence" class="needs-validation">.</p>
                        </div>
                    </div>
                </div>

                <!--10. Modification de l'accord de partenariat-->
                <div class="accordion-item">
                    <h2 class="subtitle-light accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelArticle-collapseTen" aria-expanded="true"
                            aria-controls="panelArticle-collapseTen">
                            10. Modification de l'accord de partenariat
                        </button>
                    </h2>
                    <div id="panelArticle-collapseTen" class="accordion-collapse collapse show">
                        <div class="accordion-body">
                            <p>10.1 Ce contrat de partenariat commercial ne peut être modifié sans le consentement écrit
                                de tous les partenaires.</p>
                        </div>
                    </div>
                </div>

                <!--11. Divers-->
                <div class="accordion-item">
                    <h2 class="subtitle-light accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelArticle-collapseEleven" aria-expanded="true"
                            aria-controls="panelArticle-collapseEleven">
                            11. Divers
                        </button>
                    </h2>
                    <div id="panelArticle-collapseEleven" class="accordion-collapse collapse show">
                        <div class="accordion-body">
                            <p>11.1 Si une disposition ou une partie d'une disposition de la présente convention de
                                partenariat commercial est non applicable pour une quelconque raison, elle sera
                                dissociée sans affecter la validité du reste de la convention.</p>
                            <p>11.2 Cet accord de partenariat commercial lie les partenaires commerciaux et pourra
                                servir à leurs héritiers, exécuteurs testamentaires, administrateurs, représentants
                                personnels, successeurs et ayants droit respectifs.</p>
                        </div>
                    </div>
                </div>

                <!--12. Juridiction-->
                <div class="accordion-item">
                    <h2 class="subtitle-light accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelArticle-collapseTwelve" aria-expanded="true"
                            aria-controls="panelArticle-collapseTwelve">
                            12. Juridiction
                        </button>
                    </h2>
                    <div id="panelArticle-collapseTwelve" class="accordion-collapse collapse show">
                        <div class="accordion-body">

                            <p>12.1 Le présent contrat de partenariat commercial est régi par les lois de l’État de :
                            </p>
                            <!-- Country names and Country Name -->
                            <input class="form-select" list="datalistOptions" id="pays" name="paysSignature"
                                placeholder="France" default="France">
                            <datalist id="datalistOptions">
                                <option value="Autriche">Autriche</option>
                                <option value="Belgique">Belgique</option>
                                <option value="Bulgarie">Bulgarie</option>
                                <option value="Croatie">Croatie</option>
                                <option value="Chypre">Chypre</option>
                                <option value="République tchèque">République tchèque</option>
                                <option value="Danemark">Danemark</option>
                                <option value="Estonie">Estonie</option>
                                <option value="Finlande">Finlande</option>
                                <option value="France" selected>France</option>
                                <option value="Allemagne">Allemagne</option>
                                <option value="Grèce">Grèce</option>
                                <option value="Hongrie">Hongrie</option>
                                <option value="Islande">Islande</option>
                                <option value="Irlande">Irlande</option>
                                <option value="Italie">Italie</option>
                                <option value="Lettonie">Lettonie</option>
                                <option value="Liechtenstein">Liechtenstein</option>
                                <option value="Lituanie">Lituanie</option>
                                <option value="Luxembourg">Luxembourg</option>
                                <option value="Malte">Malte</option>
                                <option value="Pays-Bas">Pays-Bas</option>
                                <option value="Norvège">Norvège</option>
                                <option value="Pologne">Pologne</option>
                                <option value="Portugal">Portugal</option>
                                <option value="Roumanie">Roumanie</option>
                                <option value="Slovaquie">Slovaquie</option>
                                <option value="Slovénie">Slovénie</option>
                                <option value="Espagne">Espagne</option>
                                <option value="Suède">Suède</option>
                                <option value="Suisse">Suisse</option>
                                <option value="Royaume-Uni">Royaume-Uni</option>
                            </datalist>

                        </div>
                    </div>
                </div>

            </div>

            <!--Signatures-->
            <div class="accordion-item">
                <h2 class="accordion-header" id="signatures-heading">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#signatures-collapse" aria-expanded="false"
                        aria-controls="signatures-collapse">
                        13. Signatures
                    </button>
                </h2>
                <div id="signatures-collapse" class="accordion-collapse" aria-labelledby="signatures-heading"
                    data-bs-parent="#accordion">
                    <div class="accordion-body">
                        
                        <p>Solennellement affirmé à <input class="needs-validation" type="text" name="lieuSignature">.
                        </p>
                        <p>Daté ce jour <input type="date" class="needs-validation" name="dateSignature">.</p>
                        <br>
                        <p>Signé, validé et livré en présence de:</p>

                        <div id="signatures-parties">
                            <div class="input-group input-group-sm mb-3">
                                <label for="signaturePartenaire1" class="input-group-text">Nom & signature: </label>
                                <input type="text" class="form-control inputSignatureName1"
                                    placeholder="Nom du partenaire">
                                <input type="file" class="form-control" name="signaturePartenaire1"
                                    accept=".png, .html, .htm" onchange="preview('thumb1')">
                                <img id="thumb1" alt="" width="150px">
                            </div>
                            <div class="input-group input-group-sm mb-3">
                                <label for="signaturePartenaire2" class="input-group-text">Nom & signature: </label>
                                <input type="text" class="form-control inputSignatureName2"
                                    placeholder="Nom du partenaire">
                                <input type="file" class="form-control" name="signaturePartenaire2"
                                    accept=".png, .html, .htm" onchange="preview('thumb2')">
                                <img id="thumb2" alt="" width="150px">
                            </div>
                        </div>

                        <div class="input-group input-group-sm mb-3">
                            <br />
                            <label for="signatureAvocat" class="input-group-text">Par moi: </label>
                            <input type="text" class="form-control inputSignatureNameAvocat"
                                placeholder="Nom de l'avocat">
                            <input type="file" class="form-control inputSignatureFileAvocat"
                                name="signatureAvocat" title="Signature de l'avocat" accept=".png, .html, .htm" onchange="preview('thumb4')">
                            <img id="thumb4" alt="" width="150px">
                        </div>
                    </div>
                </div>
            </div>

            <br />
            <button type="submit" class="btn btn-primary mb-3">Générer le contrat</button>
        </form>
    </div>

    <?php
        require_once("static/footer.php");
    ?>

    <!-- Bootstrap JS scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

</body>

</html>