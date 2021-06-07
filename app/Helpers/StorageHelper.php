<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class StorageHelper {

    private $fieldName;
    private $file;
    private $model;
    private $filename;

    public function __construct($fieldName, $file, $model)
    {
        $this->fieldName = $fieldName;
        $this->file = $file;
        $this->model = $model;
    }


    private function checkFile(){
        $fieldName = $this->fieldName;
        if($this->file){
            $this->filename = md5(uniqid()).'.'.$this->file->getClientOriginalExtension();
        }
        elseif ($this->model && $this->model->$fieldName){
            $this->filename = $this->model->$fieldName;
        }
        else{
            $this->filename = null;
        }
    }


    public function saveImage(){
        $this->checkFile();
        if($this->file){
            Storage::putFileAs('/public', $this->file, $this->filename);
            $this->destroyImage();
        }

        return $this->filename;
    }

    public function destroyImage(){
        $fieldName = $this->fieldName;
        if($this->model && $this->model->$fieldName && Storage::exists('/public/'.$this->model->$fieldName)){
            Storage::delete('/public/'.$this->model->$fieldName);
        }
    }


}
