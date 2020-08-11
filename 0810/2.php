<?php

include './Memcache.php';

$mem = new Memcached();
// $mem->madd('age', 20);

$mem->mdelete('age');