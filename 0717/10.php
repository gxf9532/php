<?php

// 关键字 final  // adj.	最终的; 最后的; (指结果) 最终的; 决定性的; 不可改变的;
/** 
 * 
 * final---用于类、方法前。

final类---不可被继承。

final方法---不可被覆盖。

如果我们不希望一个类被继承，我们使用final来修饰这个类。这个类将无法被继承。
 * 
*/
final class A 
{
    public function say()
    {
        echo "这里是A类的say方法";
    }    
}

// 使用子类B尝试去继承finalA  会报错  因为final修饰的类不能被继承
// class B extends A
// {
    
// }

class C 
{
    // final 还可以用来修饰方法 使用final修饰的方法可以调用 但是不能被重载
    final function say()
    {
        echo "say方法";
    }
}
// $c = new C();
// $c->say();

class D extends C
{
    // 不能重载父类中的final方法!
    public function say()
    {

        echo "子类的say"; //  Cannot override final method 
    }
}

$d = new D();
$d->say(); //  子类可以调用 



