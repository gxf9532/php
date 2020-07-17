<?php

class A
{
    public function say()
    {
        echo "A类的say方法";
    }
}
// B继承A
class B extends A
{
    public function eat()
    {
        echo "B类的eat方法";
    }
}

// C继承B
class C extends B
{
}

$c = new C();
$c->say();
$c->eat();

