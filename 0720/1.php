<?php
// 单例模式(单态模式)
class A 
{
    public $rand;
    // protected function __construct()
    // {
    //     $this->rand = mt_rand(10000, 50000);
    // }
    
    public function getObj()
    {
        var_dump(new A());
    }
}
// $a = new A();  
// $b = new A();  

// var_dump($a);
// var_dump($b);

$a = new A();
$a->getObj();




