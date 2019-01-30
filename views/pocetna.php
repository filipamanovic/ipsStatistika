<?php
require_once "modules/konekcija.php";
$timestamp = time() - 21600;
$dan = date('Y-m-d', $timestamp);
$upit = "SELECT id FROM datum WHERE datum = :datum";
$prepareIdDan = $konekcija->prepare($upit);
$prepareIdDan->bindParam(':datum', $dan);
$prepareIdDan->execute();
$IdDan = $prepareIdDan->fetch();
$IdDan = $IdDan->id;

$sat = date('H', $timestamp);
$period;
if ($sat < 6):
    $period = 1;
elseif ($sat < 12):
    $period =  2;
elseif ($sat < 18):
    $period = 3;
else:
    $period = 4;
endif;

$upit = "select * from podacitest where period_id = $period and datum_id = $IdDan";
$rezultat = $konekcija->query($upit)->fetchAll();
?>

<div class="container-fluid" style="margin-top: 20px;">
    <div class="row">
        <div class="col-12 offset-4">
            <a href="<?=$_SERVER['PHP_SELF'].'?page=main'?>" class="btn btn-outline-primary
            <?php
            if ($rezultat):
                echo 'disabled';
            endif;
            ?>
            ">Unos</a>
            <a href="<?=$_SERVER['PHP_SELF'].'?page=pregled'?>" class="btn btn-outline-info">Prikaz</a>
        </div>
    </div>
    <div class="row">
        <div class="col-8 offset-4">

        </div>
    </div>
</div>

