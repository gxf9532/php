<?php

interface RULES
{
    public function hufCup();
    public function fullCup();
    public function doubleCup();
}

class Drink
{
    public function drinkBear(RULES $rules)
    {
        $rules->hufCup();
        $rules->fullCup();
        $rules->doubleCup();
    }
}

class Chenyou implements RULES
{
    public function hufCup()
    {
        echo "陈友喝半杯";
    }
    public function fullCup()
    {
        echo "陈友喝一杯";
    }

    public function doubleCup()
    {
        echo "陈友喝两杯";
    }
}

class Ashan implements RULES
{
    public function hufCup()
    {
        echo "阿山喝半杯";
    }
    public function fullCup()
    {
        echo "阿山喝一杯";
    }

    public function doubleCup()
    {
        echo "阿山喝两杯";
    }
}

class Chenxiao implements RULES
{
    public function hufCup()
    {
        echo "陈啸喝半杯";
    }
    public function fullCup()
    {
        echo "陈啸喝一杯";
    }

    public function doubleCup()
    {
        echo "陈啸喝两杯";
    }
}

$drink = new Drink();
$chenyou = new Chenyou();
$ashan = new Ashan();
$chenxiao = new Chenxiao();

$drink->drinkBear($chenxiao);