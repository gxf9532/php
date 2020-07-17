<?php

// 那么用protected和private修饰的方法能够被重载么?

class A
{
    protected function say()
    {
        echo "say";
    }

    private function eat()
    {
        echo "eat";
    }
}

class B extends A
{
    public function say()
    {
        echo "这里是子类的say方法";
        $this->eat();
    }

    private function eat()
    {
        echo "子类的eat私有方法";
    }

    

}

$b = new B();
$b->say();

