<?php 

namespace Lamhotsimamora\Upload;

class UploadFile implements UploadFileInterface
{
    private $fileUpload = 'file';
    private $fileName;
    private $fileTmp;
    private $fileSize;

    private $targetDirectory='assets/files/';

    private $maxSize =500000;

    private $result = false;
    private $message = null;

    public function __construct(){

    }

    private function init(){
        if (!isset($_FILES[$this->fileUpload])){
            $this->result = false;
            return json_encode(array('result' => $this->result, 'message' => '$_FILES['.$this->fileUpload.'] is not exist'));
        }

        $this->fileName = $_FILES[$this->fileUpload]['name'];
        $this->fileTmp = $_FILES[$this->fileUpload]['tmp_name'];
        $this->fileSize = $_FILES[$this->fileUpload]['size'];
       
        if ($this->fileSize >= $this->maxSize){
            $this->result = false;
            return json_encode(array('result' => $this->result, 'message' => 'file size is too large maximum is '.$this->maxSize.' Byte'));
        }
    }

    public function setMaxSize($value){
        $this->maxSize = $value;
    }

    public function setTargetDirectory($value){
        $this->targetDirectory = $value;
    }

    public function setFileUpload($value){
        $this->fileUpload = $value;
    }

    public function getFileName()
    {
        return $this->fileName;
    }
    public function getFileTmp()
    {
        return $this->fileTmp;
    }
    public function getFileSize()
    {
        return $this->fileSize;
    }

    public function upload(){
        $this->init();
        $target_file = $this->targetDirectory.basename($_FILES[$this->fileUpload]["name"]);
        if (file_exists($target_file))
        {
            $this->result = false;
            return json_encode(array('result' => $this->result, 'message' => 'File already exists'));
        }
        move_uploaded_file($_FILES[$this->fileUpload]["tmp_name"], $target_file);
        $this->result = true;
        return json_encode(array(
            'result' => $this->result, 
            'message' => 'File uploaded successfully',
            'filename' => basename($_FILES[$this->fileUpload]["name"]),
            'size'  => $_FILES[$this->fileUpload]["size"]
        ));
    }
}
