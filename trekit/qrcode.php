 <?php
    
    include "qrcode/qrlib.php";    
    //processing form input
    //remember to sanitize user input in real-life solution !!!
    $errorCorrectionLevel = 'L';
    $matrixPointSize = 4;

    if (isset($qrdata)) { 
        QRcode::png($qrdata, $filenameQR, $errorCorrectionLevel, $matrixPointSize, 2);    
    }    
    //display generated file
    //echo '<img src="'.$PNG_WEB_DIR.basename($filenameQR).'" /><hr/>';  
    ?>