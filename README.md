# Install
composer require lamhotsimamora/upload

# How to use
```
/*
* Default $_FILES['file']
* Default directory ('assets/files')
* Default size (500000 Byte)
*/
$file = new \Lamhotsimamora\UploadFile();


echo $file->upload();


```
