<?php   
    $zip = new ZipArchive();
    $filename = uniqid();
    $dir = $_POST['nameInput'] . "/*";
    if ($zip->open($filename, ZipArchive::CREATE)!==TRUE) {
        exit("cannot open <$filename>\n");
    }
    foreach(glob($dir) as $file){  
        $zip->addFile($file); 
    }
    $zip->close();
    echo '<a href="' .$filename .'">Download again</a>';
 ?>