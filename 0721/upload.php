<?php

include './Uploads.class.php';


$upload = new UploadsFile('header');
$res = $upload->upload('./uploads', true);

