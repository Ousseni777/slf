<style>
    ::-webkit-scrollbar {
        width: 2px;
    }

    ::-webkit-scrollbar-thumb {
        background-color: purple;
        /* border-radius: 6px; */

    }

    #myTable tbody {
        max-height: 60vh ;
        overflow-y: auto;
        display: block;
    }

    #myTable thead,
    #myTable tbody tr {
        display: table;
        width: 100%;
        table-layout: fixed;
    }

    tr td,
    tr th {
        font-size: 14px;
    }

    tr td:hover,
    tr th:hover {
        background-color: bisque;
        /* color: white; */
        font-weight: bold;
    }

    .chevron {
        /* display: flex; */
        position: relative;
    }

    .chevron-elt {
        width: 20px;
        position: absolute;
        right: 0px;
        top: 0px;
    }

    .chevron:hover {
        cursor: pointer;
        background-color: #f6f9ff;
    }
</style>

<main class="main" id="main">
    <section class="section">
        <div class="row" id="listDemande">
            <div class="pagetitle ">
                <h1>Liste des crédits demandés</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Aperçu demandes</a></li>
                        <li class="breadcrumb-item active">Liste des demandes de vos clients</li>
                    </ol>
                </nav>
            </div><!-- End Page Title -->
            <div class="col-lg-4">
                <div class="row mb-3">
                    <label class="col-sm-6 col-form-label">Nombre de lignes</label>
                    <div class="col-sm-4">
                        <select class="form-select" aria-label="Default select example">
                            <option value="10" selected>10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                            <option value="40">40</option>
                        </select>
                    </div>

                </div>
            </div>
            <div class="col-lg-4"></div>

            <div class="col-lg-4">
                <div class="row">
                    <label for="inputText" class="col-sm-3 col-form-label">Rechercher</label>
                    <div class="col-sm-9">
                        <input type="text" id="searchInput" class="form-control">

                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
                <table class="table table-striped table-border mt-3" id="myTable">
                    <thead class="thead-dark">

                        <tr style="font-weight: bold ;">
                            <th style="width: 150px;" onclick="sortTable(0)" class="chevron" scope="col">#Référence
                                <span class="chevron-elt"><i class="bi bi-caret-up"></i><i
                                        class="bi bi-caret-down-fill"></i></span>
                            </th>
                            <td style="width: 150px;" onclick="sortTable(1)" class="chevron" scope="col">Date
                                création<span class="chevron-elt"><i class="bi bi-caret-up"></i><i
                                        class="bi bi-caret-down-fill"></i></span> </td>
                            <td style="width: 100px;" onclick="sortTable(2)" class="chevron" scope="col">
                                Autheur<span class="chevron-elt"><i class="bi bi-caret-up"></i><i
                                        class="bi bi-caret-down-fill"></i></span> </td>
                            <td style="width: 100px;" onclick="sortTable(3)" class="chevron" scope="col">
                                Marque<span class="chevron-elt"><i class="bi bi-caret-up"></i><i
                                        class="bi bi-caret-down-fill"></i></span> </td>
                            <td style="width: 250px;" onclick="sortTable(4)" class="chevron" scope="col">Barême<span
                                    class="chevron-elt"><i class="bi bi-caret-up"></i><i
                                        class="bi bi-caret-down-fill"></i></span> </td>
                            <td onclick="sortTable(5)" class="chevron" scope="col">Montant<span class="chevron-elt"><i
                                        class="bi bi-caret-up"></i><i class="bi bi-caret-down-fill"></i></span> </td>
                            <td style="text-align: center;" class="chevron" scope="col">Statut
                            </td>
                        </tr>
                    </thead>
                    <tbody id="">


                        <?php
                        $select_credit = "SELECT * FROM `viewsim` WHERE SELLER_ID='$SELLER_ID_UK'";
                        $result_select_credit = $conn->query($select_credit);
                        if ($result_select_credit->num_rows > 0) {
                            $credits = mysqli_fetch_all($result_select_credit, MYSQLI_ASSOC);
                        }
                        if (count($credits) > 0) {

                            foreach ($credits as $credit) {
                                $TARIFF_ID_UK = $credit['TARIFF_ID'];
                                $select_tariff = "SELECT * FROM `slf_tarification` WHERE TARIFF_ID_UK='$TARIFF_ID_UK'";
                                $result_select_tariff = $conn->query($select_tariff);
                                $tariff = $result_select_tariff->fetch_assoc();
                                ?>
                                <tr>
                                    <th style="width: 150px;" scope="row"><a
                                            href="detail-cr?id=<?php echo $credit['CREDIT_ID_UK'] ?>">#
                                            <?php echo $credit['CREDIT_ID_UK'] ?>
                                        </a>
                                    </th>
                                    <td style="width: 150px;">
                                        <?php echo (string) $credit['UP_DATE'] ?>
                                    </td>
                                    <td style="width: 100px;">
                                        <a href="detail-cl?id=<?php echo $credit['CLIENT_ID'] ?>" class="text-primary">
                                            <?php echo $credit['CLIENT_ID'] ?>
                                        </a>
                                    </td>

                                    <td style="width: 100px;">
                                        <?php echo $tariff['MARQUE'] ?>
                                    </td>
                                    <td style="width: 250px;">
                                        <?php echo $tariff['BAREME'] ?>
                                    </td>
                                    <td>
                                        <?php echo number_format($credit['AMOUNT'], 2, ".", " ") ?>
                                    </td>

                                    <td style="text-align: right; font-size: 18px;">

                                        <?php if ($credit['STATE'] == 3) {
                                            echo '<span class="badge bg-success">';
                                        } else if ($credit['STATE'] == 1) {
                                            echo '<span class="badge bg-danger">';
                                        } else {
                                            echo '<span class="badge bg-warning">';
                                        }

                                        ?>
                                        <?php echo $credit['STATE_LIB'] ?>
                                        </span>
                                    </td>
                                </tr>
                            <?php }
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <script type="text/javascript" src="jquery.min.js"></script>
    <script>


        // $(document).ready(function () {

        //     $('tbody tr').hover(

        //         function () {
        //             $(this).find('td').each(function () {
        //                 $(this).replaceWith(function () {
        //                     return $("<th>", { html: $(this).html() });
        //                 });

        //             });


        //         },
        //         function () {

        //             $(this).find('th').each(function () {
        //                 $(this).find('td:first').removeClass('highlighted');
        //                 $(this).replaceWith(function () {
        //                     return $("<td>", { html: $(this).html() });
        //                 });
        //             });
        //         }
        //     );
        // });

        function sortTable(columnIndex) {
            var table, rows, switching, i, x, y, shouldSwitch;
            table = document.getElementById("myTable");
            switching = true;

            rows_th = table.rows[0];
            span = rows_th.getElementsByTagName("span")[columnIndex];
            i_up = span.getElementsByTagName("i")[0];
            i_down = span.getElementsByTagName("i")[1];

            sortDec = false;

            if (i_up.classList.contains("bi-caret-up")) {
                i_up.classList.remove("bi-caret-up");
                i_up.classList.add("bi-caret-up-fill");
                sortDec = false;

                i_down.classList.remove("bi-caret-down-fill");
                i_down.classList.add("bi-caret-down");
            } else {
                sortDec = true;
                i_up.classList.add("bi-caret-up");
                i_up.classList.remove("bi-caret-up-fill");


                i_down.classList.add("bi-caret-down-fill");
                i_down.classList.remove("bi-caret-down");
            }


            // i_up = rows[i].getElementsByTagName("td")[columnIndex]


            while (switching) {
                switching = false;
                rows = table.rows;

                for (i = 1; i < (rows.length - 1); i++) {
                    shouldSwitch = false;
                    x = rows[i].getElementsByTagName("td")[columnIndex];
                    y = rows[i + 1].getElementsByTagName("td")[columnIndex];

                    if (sortDec) {
                        if (isNaN(x.innerHTML)) {

                            if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                                shouldSwitch = true;
                                break;
                            }
                        } else {
                            if (parseInt(x.innerHTML) < parseInt(y.innerHTML)) {
                                shouldSwitch = true;
                                break;
                            }
                        }
                    } else {
                        if (isNaN(x.innerHTML)) {
                            // Si c'est une chaîne, comparez les chaînes en ignorant la casse
                            if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                                shouldSwitch = true;
                                break;
                            }
                        } else {
                            // Si c'est un nombre, comparez les nombres
                            if (parseInt(x.innerHTML) > parseInt(y.innerHTML)) {
                                shouldSwitch = true;
                                break;
                            }
                        }
                    }


                }

                if (shouldSwitch) {

                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                }
            }
        }
    </script>
</main>