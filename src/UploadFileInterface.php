<?php 

namespace Lamhotsimamora\Upload;

interface UploadFileInterface
{
    public function getFileName();
    public function getFileTmp();
    public function getFileSize();
    public function setFileUpload($value);
    public function setTargetDirectory($value);
    public function setMaxSize($value);
}