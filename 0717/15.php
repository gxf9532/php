<?php

class A 
{

}

$a = new A();

class B 
{
    
}
$b = new B();

class C extends A 
{
    
}
$c = new C();

if ($c instanceof B) {
    echo "是";
}
if ($c instanceof A) {
    echo "是";
}


