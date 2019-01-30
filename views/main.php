<?php
    session_start();
    if(isset($_SESSION['greskaUpload'])):
        echo "Nije izabran file!";
        unset($_SESSION['greskaUpload']);
    endif;
    if(isset($_SESSION['uspesanUpload'])):
        echo "Uspesan upload!";
    endif;
?>
<div class="container-fluid" style="margin-top: 20px;">
    <div class="row">
        <div class="col-5">
            <form action="modules/unosExcela.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-4">
                        Select File to upload:
                    </div>
                    <div class="col-5">
                        <input type="file" name="excel">
                    </div>
                    <div class="col-3">
                        <input type="submit" value="Upload excel" name="btnExcel" id="btnExcel" class="btn btn-outline-primary">
                    </div>
                </div>
            </form>
        </div>
        <div class="col-5">
            <button id="btnInsertPodaci" class="btn btn-outline-warning"
                <?php
                    if(!isset($_SESSION['uspesanUpload'])):
                        echo "disabled";
                    else:
                        unset($_SESSION['uspesanUpload']);
                    endif;
                ?>>
                Popuni bazu
            </button>
        </div>
        <div class="col-2">
            <a href="<?=$_SERVER['PHP_SELF']?>" class="btn btn-outline-success">Pocetna</a>
        </div>
    </div>
    <div class="row">
        <div class="col-7 offset-3">

        </div>
    </div>
</div>




