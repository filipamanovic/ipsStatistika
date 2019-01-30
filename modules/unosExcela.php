<?php

session_start();
if(isset($_POST['btnExcel'])):
    $excel = $_FILES['excel'];
//    var_dump($excel);
    $tmpName = $excel['tmp_name'];
    $novaPutanja = '../uploads/excel.xlsx';
    if(move_uploaded_file($tmpName, $novaPutanja)):
        $_SESSION['uspesanUpload'] = true;
        header('Location: ../index.php?page=main');
    else:
        $_SESSION['greskaUpload'] = true;
        header('Location: ../index.php?page=main');
    endif;
endif;




