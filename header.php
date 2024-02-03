<?php

include './connectToDB.php';
$SELLER_ID = $_SESSION['SELLER_ID'];

$select_query = "SELECT * FROM `slf_user_salafin` WHERE SELLER_ID='$SELLER_ID' ";
$result_select = $conn->query($select_query);

if ($result_select->num_rows > 0){
    $SELLER=$result_select->fetch_assoc();

    $firstChart = substr($SELLER['NOM'], 0, 1);
}

?>

<header id="header" class="header fixed-top d-flex align-items-center">


    <div class="col-lg-2 d-flex align-items-center justify-content-between">
        <a href="index.html" class="logo d-flex align-items-center">
            <!-- <img src="assets/img/logo.png" alt=""> -->
            <span class="d-none d-lg-block" style="color: #f82249 ;">SALAFIN</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn" style="color: #f82249 ;"></i>
    </div><!-- End Logo -->
    <div class="col-lg-2">

    </div>
    <!-- <div class="col-lg-6 section-title mt-5">
        <h2>Bonjour OUSSENI</h2>
    </div> -->

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">
            <li class="nav-item dropdown pe-3">

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <span class="d-none d-md-block dropdown-toggle ps-2" style="color: #f82249 ;"><?php echo $firstChart. '. '. $SELLER['PRENOM'] ?></span>
                </a><!-- End Profile Iamge Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6><?php echo $SELLER['NOM']  . ' '. $SELLER['PRENOM'] ?></h6>
                        <span><?php echo $SELLER['ENTITE'] ?></span>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <i class="bi bi-gear"></i>
                            <span>Mes infos personnelles</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>


                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="./logout">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Je me déconnecte</span>
                        </a>
                    </li>

                </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->

        </ul>
    </nav><!-- End Icons Navigation -->


</header><!-- End Header -->