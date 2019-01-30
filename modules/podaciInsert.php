<?php
/**
 * Created by PhpStorm.
 * User: fica
 * Date: 1/26/2019
 * Time: 8:52 AM
 */

$status = 404;
$data = null;
header("Content-type: application/json");
if(isset($_POST['success'])):
    require_once "konekcija.php";
    $timestamp = time() - 21600;
    $dan = date('Y-m-d', $timestamp);
    $upit = "SELECT id FROM datum WHERE datum = :datum";
    $prepareIdDan = $konekcija->prepare($upit);
    $prepareIdDan->bindParam(':datum', $dan);
    $prepareIdDan->execute();
    $IdDan = $prepareIdDan->fetch();
    $IdDan = $IdDan->id;
    $podaci = $_POST['podaci'];
    foreach ($podaci as $item):
        $upit = "INSERT INTO `podacitest`(`id`, `banka_id`, `datum_id`, `period_id`, `pacs.008.001`, `camt.009.001`, `camt.060.001`, `camt.033`, `camt.998`)
                  VALUES ('', :banka_id, :datum_id, :period_id, :pacsOsam, :camtDevet, :camtSestdeset, :camtTritri, :camtDevetdevetosam)";
        $prepare = $konekcija->prepare($upit);
        $prepare->bindParam(':banka_id', $item['Id']);
        $prepare->bindParam(':datum_id', $IdDan);
        $prepare->bindParam(':period_id', $item['period']);
        $prepare->bindParam(':pacsOsam', $item['pacs.008.001']);
        $prepare->bindParam(':camtDevet', $item['camt.009']);
        $prepare->bindParam(':camtSestdeset', $item['camt.060']);
        $prepare->bindParam(':camtTritri', $item['camt.033']);
        $prepare->bindParam(':camtDevetdevetosam', $item['camt.998']);
        $rezultat = $prepare->execute();
        if ($rezultat):
            $status = 200;
            $data = "Uspesno uneto u bazu!";
        endif;
    endforeach;
endif;
http_response_code(200);
echo json_encode("Neki Alert pliz!");
?>
