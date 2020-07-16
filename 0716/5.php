<?php

class fileUploadHandle
{
    public $dirName = '';

    // 构造函数
    public function __construct($dirName)
    {
        // 初始化类的属性
        $this->dirName = rtrim($dirName,'/').'/';

        // 在类的方法中去调用类中的其他方法
        $this->makeUploadDir(); 
    }

    // 创建上传文件夹
    public function makeUploadDir()
    {
        
        // 判断文件夹是否存在
        if (!file_exists($this->dirName)) {
            @mkdir($this->dirName, 0755);  
        }
    }

    public function __destruct()
    {
        echo "我吐了";
        echo "阿山送陈友回宿舍";
        echo "陈友说我还能喝";
    
    }
}

// 实例化这个类 
$dirName = './upload/';  
$file = new fileUploadHandle($dirName);




