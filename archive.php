<?php
include 'parser_crud.php';

  if(isset($_POST['dataToSend'])) {
    $sfname = 'server/php/files/'.$_POST['dataToSend'];
    $zip = new ZipArchive;
    $file = basename($sfname, ".zip");
    $base_path = 'server/php/files/source/';
    $path = $base_path.$file;
    $res = $zip->open($sfname);
    if ($res === TRUE) {
         $zip->extractTo($path);
         $zip->close();
         echo $path;
		 exec('php pdepend/pdepend.phar --summary-xml=/var/www/html/php-analyzer/pdepend/reports/'.$file.'.xml '.$path.' 2>&1', $output);
		 $input = '/var/www/html/php-analyzer/pdepend/reports/'.$file.'.xml';
		 save($input);
		 print_r($output);
     } else {
         echo 'failed';
     }
}
?>
