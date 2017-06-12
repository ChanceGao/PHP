<?php
class A
{
    public function test0()
    {
        echo "No argument";
    }
    public function test1($n)
    {
        echo "One argument";
    }
    public function test2($n1, $n2)
    {
        echo "Two arguments";
    }
    public function __call($name, $arguments)
    {
        if ($name=="magicTest") {
            if (count($arguments)==1) {
                # code...
                $this->test1($arguments[0]);
            } elseif (count($arguments)==2) {
                $this->test2($arguments[0], $arguments[1]);
            } elseif (count($arguments)==0) {
                $this->test0();
            }
        }
    }
}

$a = new A();
$a->magicTest();
echo "<br>";
$a->magicTest(0);
echo "<br>";
$a->magicTest(1995, 5);
