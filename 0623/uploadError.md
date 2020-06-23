## php错误码
PHP文件上传error的错误类型 - $_FILES['file']['error']
假设文件上传字段的名称img，则：

$_FILES['img']['error']有以下几种类型

1、UPLOAD_ERR_OK

其值为 0，没有错误发生，文件上传成功。
 

2、UPLOAD_ERR_INI_SIZE

其值为 1，上传的文件超过了 php.ini 中 upload_max_filesize选项限制的值。
 

3、UPLOAD_ERR_FORM_SIZE

其值为 2，上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值。
 

4、UPLOAD_ERR_PARTIAL

其值为 3，文件只有部分被上传。
 

5、UPLOAD_ERR_NO_FILE

其值为 4，没有文件被上传。
 

6、UPLOAD_ERR_NO_TMP_DIR

其值为 6，找不到临时文件夹。PHP 4.3.10 和 PHP 5.0.3 引进。
 

7、UPLOAD_ERR_CANT_WRITE

其值为 7，文件写入失败。PHP 5.1.0 引进。