<?php
if(file_exists('./install/nvshen.mei')){
	//第一次进来
	//echo "人家第一次来嘛";
	header('location:./install/index.php');
}else{
	header('location:./Home/index.php');
}
