<?php

/**
 *  文件上传类
 *  
 */

class UploadsFile
{
    // 属性
    protected $upfile; // 上传文件信息
    protected $error; // 错误信息
    protected $saveName; // 保存的文件名
    protected $path; // 路径
    protected $typeList = array('image/jpeg');  // 允许上传的文件类型
    protected $fileSize = 10240000000;
    protected $realName; // 是否使用原名

    // 方法

    public function __construct($name)
    {
        // 获取上传文件信息并初始化 
        $this->upfile = $_FILES[$name];
        // var_dump($this->upfile);
    }

    // 暴露给用户使用
    public function upload($path,$realName = false)
    {
        
        $this->path = rtrim($path, '/') . '/';
        $this->realName = $realName;
        echo $this->checkError();

        // 判断方法是否成功
        if ($this->checkError() && $this->checkType() && $this->checkSize() && $this->hasUploadDir($this->path) && $this->filenameHandle() && $this->moveUpFile()) {
            $res = array('mes' => "上传文件成功", 'path' => $this->path . $this->saveName);
            return $res;
        } else {
            return $this->error;
        }
    }

    // 检查是否存在上传文件夹
    protected function hasUploadDir($dirName)
    {       
        if (!file_exists($dirName)) {
            @mkdir($dirName, 0755);
        }
        return true;
    }

    public function download() 
    {

    }

    // 检查错误号 
    protected function checkError()
    {
        if ($this->upfile['error'] > 0) {
            switch ($this->upfile['error']) {
                case 1:
                    $info = '上传的文件超过了 php.ini 中 upload_max_filesize选项限制的值';
                    break;
                case 2:
                    $info = '上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值';
                    break;
                case 3:
                    $info = '文件只有部分被上传';
                    break;
                case 4:
                    $info = '没有文件被上传';
                    break;
                case 6:
                    $info = '找不到临时文件夹';
                    break;
                case 7:
                    $info = '文件写入失败';
                    break;
                default:
                    $info = '未知错误';
                    break;
            }
            // 将错误信息保存
            $this->error = $info;
            return false;
        }
        return true;
    }

    // 检查类型
    protected function checkType()
    {
        if (count($this->typeList)) {
   
            if (!in_array($this->upfile['type'], $this->typeList)) {
                $this->error = '上传文件类型不符合要求';
                return false;
            }
        }
        return true;
    }

    // 上传文件大小
    protected function checkSize()
    {
        if ($this->upfile['size'] > $this->fileSize) {
            $this->error = '上传文件过大!';
            return false;
        }
        return true;
    }

    // 给上传文件起名
    protected function filenameHandle()
    {
        // 获取上传文件的后缀名
        $ext = pathinfo($this->upfile['name'], PATHINFO_EXTENSION);

        // 保存名字
        if ($this->realName) {
            // 原名
            $this->saveName = $this->upfile['name'];
        } else {
            // 随机文件名
            $this->saveName = date("Ymd") . uniqid() . mt_rand(0, 9999) . '.' . $ext;
        }
        return true;
    }

    // 移动上传文件
    protected function moveUpFile()
    {
        if (is_uploaded_file($this->upfile['tmp_name'])) {
            echo $this->upfile['tmp_name'];
            echo $this->path . $this->saveName;
            if (move_uploaded_file($this->upfile['tmp_name'], $this->path . $this->saveName)) {
                return true;
            } else {
                $this->error = '上传文件失败';
                return false;
            }
        } else {
            $this->error = '上传错误';
            return false;
        }
    }
}
