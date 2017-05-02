<?php
class SmartCat
{
    function cal($oper, $n1, $n2)
    {
        $res=0;
        switch ($oper) {
            case '+':
                $res=$n1+$n2;
                break;
            case '-':
                $res=$n1-$n2;
                break;
            case '*':
                $res=$n1*$n2;
                break;
            case '/':
                $res=$n1/$n2;
                break;
            default:
                # code...
                break;
        }
        return $res;
    }
    function area($n1, $n2 = 0)
    {
        $res = 0;
        if ($n2==0) {
            $res=3.14*$n1*$n1;
        } else {
            $res = $n1*$n2;
        }
        return $res;
    }
}
