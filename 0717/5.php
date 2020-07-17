<?php

// 继承语法在实际项目中的如何使用?

class UploadFile
{
    public function upload()
    {
        echo "这里实现了文件上传";
    }

}

// 老板说了 还要实现文件下载功能
// 这里面临一个选择 我是否要修改原来的UploadFile这个类的源代码呢?
// 第二个问题: 我要扩展upload这个方法的功能 那么修改原来的upload方法是否合理呢?
// 肯定不合理的  合理的办法就是继承  
// 原来的代码一般来说都是别人写好并且封装好的 尽量不要去修改原来的代码  

class UpDownFile extends UploadFile
{
    public function download()
    {
        echo "这里是文件下载方法";
    }

    // 在子类中将父类的upload方法进行重载
    public function upload()
    {
        echo "这里是子类中重载的方法";
    }
}

$fileHandle = new UpDownFile();
// 文件上传
$fileHandle->download();
// 文件下载
$fileHandle->upload();







