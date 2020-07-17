<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="./jquery1.11.3.min.js"></script>
    <title>Document</title>
</head>

<body>
    <div id="main"></div>
    <script>
        $(function() {
            // 典型的链式调用
            $('#main').css({
                color: '#F00'
            }).html('高老师最帅');
        })
    </script>

    <?php

    // php中的链式调用 
    class A
    {
        private $num = 0;

        // 封装加方法
        public function add($num)
        {
            $this->num += $num;
            return $this;
        }

        // 封装减方法
        public function minus($num)
        {
            $this->num -= $num;
            return $this;
        }
    }

    $a = new A();

    // $a->add(1);
    // $a->add(1);
    // $a->minus(1);
    // print_r($a);

    $a->add(1)->add(1)->minus(1)->add(1);
    print_r($a);


    

    ?>
</body>

</html>