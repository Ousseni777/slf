<style>
    li .active {
        border-left: 2px blue solid;
        border-radius: 5px 0 0 5px;
    }
    .bi-arrow-right-short{
        color: red;
    }

</style>

<aside id="sidebar" class="sidebar">

    <div class="col-lg-12">
        <!-- <div class="card">
            <div class="card-body">
                <ul class="sidebar-nav" id="sidebar-nav">
                    <li class="nav-item" >
                        <a class="nav-link collapsed sidebar-link" href="sim-fx?<?php echo $_SESSION['page_sim'] ; ?>" \>
                            <i   class="bi bi-node-plus"></i>
                            <span   >Simulateur crédit </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div> -->
        <div class="card">
            <div class="card-body">

                <ul class="sidebar-nav" id="sidebar-nav">
                    <h5 class="card-title"  ><i class="bi bi-arrow-right-short"></i> Gestion des clients</h5>
                    <li class="nav-item">
                        <a class="nav-link collapsed sidebar-link" id="new-client" href="#" data-bs-toggle="modal"
                            data-bs-target="#modal-infos-client">
                            <i   class="bi bi-plus-circle"></i>
                            <span  >Nouveau client </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed sidebar-link" href="sim-fx?tag=list-cl">
                            <i   class="bi bi-list-ol"></i>
                            <span  >Mes clients</span>
                        </a>
                    </li>
                </ul>

                <ul class="sidebar-nav" id="sidebar-nav">
                    <h5 class="card-title"  ><i class="bi bi-arrow-right-short"></i> Etat des demandes</h5>
                    <li class="nav-item">
                        <a class="nav-link collapsed sidebar-link" href="sim-fx?tag=list-cr">
                            <i   class="bi bi-list-ol"></i>
                            <span  >Mes demandes </span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link collapsed sidebar-link" href="sim-fx?tag=track">
                            <i   class="bi bi-app-indicator"></i>
                            <span  >Suivre une demande </span>
                        </a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link collapsed sidebar-link" href="sim-fx?tag=to-revcf">
                            <i class="bi bi-app-indicator"></i>
                            <span>Demande sous Revcf</span>
                        </a>
                    </li> -->

                </ul>
            </div>
        </div>

        <div class="card">
        <div class="col-lg-12 d-flex flex-column align-items-center justify-content-center" >
                <a href="./espace" class="col-lg-12 d-flex flex-column align-items-center justify-content-center" style="border : 0; color: #f82249 ; " ><i class="bi bi-house-fill" style="font-size: 60px; " ></i></a>
            </div>
        </div>

    </div>


</aside><!-- End Sidebar-->

<script>
    
   
</script>