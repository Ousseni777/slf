<?php

include './connectToDB.php';
$num_doss = '790551';
$seller_id = $_SESSION['seller_id'];
$query_credit = "SELECT * FROM `majestic` WHERE NUMDOSS = '{$num_doss}'";
$result_credit = $conn->query($query_credit);
// $_SESSION['page'] = "detail-doss?id=".$num_doss;

if ($result_credit->num_rows > 0) {
    $dossier = $result_credit->fetch_assoc();
}

?>
<style>
    #section-detail,
    #section-undefuned {
        display: none;
    }

    #num-dossier {
        display: none;
    }
</style>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Saisir le numéro de dossier que vous souhaitez suivre</h1>
        <nav>
            <ol class="breadcrumb">                
                <li class="breadcrumb-item">Detail dossier</li>
                <li class="breadcrumb-item">Rechercher un dossier quelconque par son numéro</li>
            </ol>
        </nav>
        <div class="col-lg-12 mt-5">
            <div class="row">
                <!-- <label for="inputText" class="col-sm-3 col-form-label">Rechercher</label> -->
                <div class="col-lg-3">
                    <input type="text" id="searchInput" placeholder="Rechercher N° Dossier ici..." class="form-control">

                </div>
                <div class="col-lg-4">

                </div>
                <div class="col-lg-4" id="num-dossier">
                    <h1>Dossier N°:                        
                        <span id="NUMDOSS"></span>
                    </h1>
                </div>
            </div>
        </div>
    </div>
    <table class="table table-striped"  id="section-detail">
        <tr style="display: none;"><td  ></td></tr>
        <tr><td>
    <section class="section">
        <div class="row mt-5">
            <div class="col-lg-7">
                <table class="table table-striped">
                    <legend>Crédit demandé</legend>

                    <tbody>
                        <tr>
                            <th>Date demande crédit :</th>
                            <td id="DATECREATION">

                            </td>
                        </tr>
                        <tr>
                            <th scope="col">Marque auto :</th>
                            <td id="MARQUE">

                            </td>
                        </tr>
                        <tr>

                            <th scope="col">Type produit : </th>
                            <td id="PRODUIT">

                            </td>
                        </tr>
                        <tr>

                            <th>Barême attribué : </th>
                            <td id="BAREME">

                            </td>
                        </tr>
                        <tr>

                            <th scope="col">Montant demandé (DH) :</th>
                            <td id="MNT_DEMANDE">

                            </td>
                        </tr>
                        <tr>

                            <th scope="col">Durée du crédit (mois) :</th>
                            <td id="DUREE">

                            </td>
                        </tr>
                        <tr>

                            <th scope="col">Mensualité (DH) :</th>
                            <td id="MENSUALITE">

                            </td>
                        </tr>
                        <tr>

                            <th scope="col">Frais de dossier (DH) :</th>
                            <td id="FRAISDOSS">

                            </td>
                        </tr>
                        <tr>

                            <th scope="col">TAUX (%) : </th>
                            <td id="TAUXINT">

                            </td>
                        </tr>

                    </tbody>

                </table>
                <div class="col-lg-6">
                    <a href="sim-fx?tag=fx&numdoss=<?php echo $dossier['NUMDOSS'] ?>" class="btn btn-outline-danger">
                        Modifier le crédit
                    </a>
                </div>


                <!-- <div class="col-lg-6">
                    <a href="sim-fx?tag=fx&numdoss=<?php echo $dossier['NUMDOSS'] ?>" class="btn btn-outline-danger">
                        Modifier les infos du client
                    </a>
                </div> -->
            </div>
            <div class="col-lg-4">
                <table class="table table-striped">
                    <legend>Etat de demande</legend>
                    <tbody>
                        <tr>
                            <td>
                                #ETAT PRODUCTION
                            </td>
                            <td id="ETATPRODLIB">

                            </td>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-striped">

                    <tbody>
                        <tr>
                            <td>#ETAT ENGAGEMENT</td>
                            <td id="ETATENGLIB">

                            </td>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <td>#ETAT INSTRUCTION</td>
                            <td id="ETATINSTLIB">

                            </td>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-striped">
                    <legend class="mt-5">Autheur du crédit</legend>
                    <tbody>
                        <tr>

                            <th scope="col">ID CLIENT :</th>
                            <td id="IDCLIENT">

                            </td>
                        </tr>
                        <tr>

                            <th>Nom de l'autheur :</th>
                            <td id="NOM">

                            </td>
                        </tr>
                        <tr>

                            <th scope="col">Nom suite :</th>
                            <td id="NOMSUITE">

                            </td>
                        </tr>

                    </tbody>
                </table>

            </div>

        </div>
    </section>
    </td></tr>
    </table>
    <section style="margin-top: 15%;" class="flex-column align-items-center justify-content-center"
        id="section-undefuned">
        <div class="">
            <h5 class="card-title text-center pb-0">DOSSIER INTROUVABLE</h5>
            <p class="text-center small">Merci de saisir un numéro de dossier</p>

        </div>
    </section>




</main><!-- End #main -->
<script type="text/javascript" src="jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
<script>
    const searchInput = document.getElementById('searchInput');

    searchInput.addEventListener('keypress', function (event) {
        if (event.key === "Enter") {
            const filter = searchInput.value.toLowerCase();

            $.ajax({
                url: "users/agency/fetch-doss.php",
                method: "POST",
                data: { NUMDOSS: filter },
                success: function (data) {
                    var result = JSON.parse(data);
                    console.log(result);
                    if (result.state == "success") {
                        $("#NUMDOSS").text(result.NUMDOSS);
                        $("#DATECREATION").text(result.DATECREATION);
                        $("#MARQUE").text(result.MARQUE);
                        $("#PRODUIT").text(result.PRODUIT);
                        $("#BAREME").text(result.BAREME);
                        $("#MNT_DEMANDE").text(result.MNT_DEMANDE);
                        $("#NUMDOSS").text(result.NUMDOSS);
                        $("#DUREE").text(result.DUREE);
                        $("#MENSUALITE").text(result.MENSUALITE);
                        $("#FRAISDOSS").text(result.FRAISDOSS);
                        $("#TAUXINT").text(result.TAUXINT);
                        $("#ETATPRODLIB").text(result.ETATPRODLIB);
                        $("#ETATENGLIB").text(result.ETATENGLIB);
                        $("#ETATINSTLIB").text(result.ETATINSTLIB);
                        $("#IDCLIENT").text(result.IDCLIENT);
                        $("#NOM").text(result.NOM);

                        $("#NOMSUITE").text(result.NOMSUITE);
                        $("#IDVENDEUR").text(result.IDVENDEUR);
                        // $("#RIS").text(result.RIS);
                        $("#section-undefuned").hide();
                        $("#section-detail").show();
                        $("#num-dossier").show();
                    } else {
                        $("#section-undefuned").show();
                        $("#section-detail").hide();
                        $("#num-dossier").hide();
                    }

                }
            });


        }
    });

    
    $('#searchInput').typeahead({
    source: function(query, process) {
        $.ajax({
   url: "users/agency/data_retriever.php",
            method: "POST",
            data: { ID_SCRIPT: 'numdoss' },
            success: function(data) {
                var result = JSON.parse(data);
                var autocompleteData = result;
                process(autocompleteData);
            }
        });
    },
    minLength: 1, // Nombre de caractères minimum pour déclencher l'autocomplétion
    highlight: true, // Met en surbrillance les correspondances dans les résultats
    hint: true // Affiche une suggestion en surbrillance
});


    // searchInput.addEventListener("input", function () {
    //     const filter = searchInput.value.toLowerCase();
    //     if (filter.length < 6) {
    //         $("#section-detail").hide();
    //         $("#num-dossier").hide();
    //     }
    // })

</script>