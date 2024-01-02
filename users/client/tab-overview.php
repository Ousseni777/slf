<div class="tab-pane fade profile-overview" id="profile-overview">                                                       

<h5 class="card-title">Référence de demande : <?php echo $credit['credit_id'] ?> </h5>


<div class="row">
    <div class="col-lg-3 col-md-4 label ">Date demande crédit :</div>
    <div class="col-lg-9 col-md-8"><?php echo $credit['up_date'] ?> </div>
</div>

<div class="row">

    <div class="col-lg-3 col-md-4 label">Type de demande :</div>
    <div class="col-lg-9 col-md-8"><?php echo $credit['project'] ?> </div>
</div>

<div class="row">
    <div class="col-lg-3 col-md-4 label">Marque :</div>
    <div class="col-lg-9 col-md-8"><?php echo $tariff['MARQUE'] ?>   </div>
</div>

<div class="row">
    <div class="col-lg-3 col-md-4 label">Type produit :</div>
    <div class="col-lg-9 col-md-8"><?php echo $tariff['PRODUIT'] ?> </div>
</div>

<div class="row">
    <div class="col-lg-3 col-md-4 label">Montant demandé (DH) :</div>
    <div class="col-lg-9 col-md-8"><?php echo $credit['amount'] ?> </div>
</div>

<div class="row">
    <div class="col-lg-3 col-md-4 label">Durée du crédit (mois) :</div>
    <div class="col-lg-9 col-md-8"><?php echo $credit['duration'] ?> </div>
</div>


<div class="row">
    <div class="col-lg-3 col-md-4 label">Mensualité :</div>
    <div class="col-lg-9 col-md-8"><?php echo $credit['monthly'] ?> </div>
</div>

<div class="row">
    <div class="col-lg-3 col-md-4 label">Frais de dossier :</div>
    <div class="col-lg-9 col-md-8"><?php echo $credit['app_fees'] ?> </div>
</div>

</div>