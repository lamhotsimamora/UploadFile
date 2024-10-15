<?php 

require_once 'vendor/autoload.php';

/*
* Default $_FILES['file']
* Default directory ('assets/files')
* Default size (500000 Byte)
*/
$file = new \Lamhotsimamora\Uploadfile();


echo $file->upload();

