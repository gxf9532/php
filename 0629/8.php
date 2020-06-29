<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title></title>
    <link href="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .main {
            width: 60%;
            margin: 100px auto;
        }
        tr th {
            background: #CBA;
            font-size: 26px;
        }
        tr th,tr td {
            text-align: center;
        }
    </style>
</head>

<body>
    <center>


        <?php
        
        // 使用php获取当前的时间 
        $year = $_GET['y'] ? $_GET['y'] : date("Y");  // 当前年份 
        $month = $_GET['m'] ? $_GET['m'] : date("m"); // 当前月份
        // 当前月有多少天 
        $day = date('t', mktime(0, 0, 0, $month, 1, $year));

        // 当前月的1日是周几  
        $w = date('w', mktime(0, 0, 0, $month, 1, $year));

        // 当前月的第几号
        $d = date("d", time());

        $prevYear = $nextYear = $year;
        $prevMonth = $month - 1; // 上一个月
        $nextMonth = $month + 1; // 下一个月

        if ($prevMonth == 0) {
            $prevMonth = 12;
            $prevYear--;
        }

        if ($nextMonth == 13) {
            $nextMonth = 1;
            $nextYear++;
        } 

        ?>

        <div class="main">
            <h2><a class="btn btn-default" href="8.php?y=<?php echo $prevYear.'&m='.$prevMonth; ?>" role="button"><</a><?php echo $year . '年' . $month . '月';   ?><a class="btn btn-default" href="8.php?y=<?php echo $nextYear.'&m='.$nextMonth; ?>" role="button">></a></h2>
         
            <table border="1" class="table table-striped table-hover">
                <tr>
                    <th>星期日</th>
                    <th>星期一</th>
                    <th>星期二</th>
                    <th>星期三</th>
                    <th>星期四</th>
                    <th>星期五</th>
                    <th>星期六</th>
                </tr>
                <?php

                $days = 1;
                while ($days <= $day) {
                    echo "<tr align='center'>";
                    for ($i = 0; $i < 7; $i++) {
                        if (($days == 1 && $i < $w) || $days > $day) {
                            echo "<td>&nbsp;</td>";
                        } else {
                            if ($days == $d) {
                                echo "<td style='color: #F00;font-weight: 800;background:#CCC;'>{$days}</td>";
                            } else {
                                 echo "<td>{$days}</td>";
                            }
                           
                            $days++;
                        }
                    }
                    echo "</tr>";
                }

                ?>
            </table>
        </div>

    </center>
</body>

</html>