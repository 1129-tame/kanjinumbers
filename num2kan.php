<?php

$kansuji = '';

$num = $_GET['num'];
$str_num = strlen($num);
$whilenum = 0;

if (!preg_match('/\A[1-9]\d*/u',"$num")) {
    echo "HTTP:204";
    exit;
}
if ($str_num > 16) {
    echo "HTTP:204";
    exit;
}
if ($num == 0) {
    echo "零";
    exit;
}


while ($str_num) {
$whilenum++;
    switch ($whilenum) {
        case 2:
            $kansuji = '拾' . $kansuji;
            break;
        case 3:
            $kansuji = '百' . $kansuji;
            break;
        case 4:
            $kansuji = '千' . $kansuji;
            break;
        case 5:
            $kansuji = '万' . $kansuji;
            break;
        case 6:
            $kansuji = '拾' . $kansuji;
            break;
        case 7:
            $kansuji = '百' . $kansuji;
            break;
        case 8:
            $kansuji = '千' . $kansuji;
            break;
        case 9:
            $kansuji = '億' . $kansuji;
            break;    
        case 10:
            $kansuji = '拾' . $kansuji;
            break;      
        case 11:
            $kansuji = '百' . $kansuji;
            break;
        case 12:
            $kansuji = '千' . $kansuji;
            break;
        case 13:
            $kansuji = '兆' . $kansuji;
            break;    
        case 14:
            $kansuji = '拾' . $kansuji;
            break;   
        case 15:
            $kansuji = '百' . $kansuji;
            break;
        case 16:
            $kansuji = '千' . $kansuji;
            break;                  
    }


    $substr = (int)mb_substr($num, $str_num - 1, 1);

            // 数
            switch ($substr) {
                case 0:
                    if (!preg_match('/\A(兆|億|万)/', $kansuji)) {
                        $kansuji = mb_substr($kansuji, 1);
                    }
                    break;
                case 1:
                    $kansuji = '壱' . $kansuji;
                    break;
                case 2:
                    $kansuji = '弐' . $kansuji;
                    break;
                case 3:
                    $kansuji = '参' . $kansuji;
                    break;
                case 4:
                    $kansuji = '四' . $kansuji;
                    break;
                case 5:
                    $kansuji = '五' . $kansuji;
                    break;
                case 6:
                    $kansuji = '六' . $kansuji;
                    break;
                case 7:
                    $kansuji = '七' . $kansuji;
                    break;
                case 8:
                    $kansuji = '八' . $kansuji;
                    break;
                case 9:
                    $kansuji = '九' . $kansuji;
                    break;
                }
                $str_num--;
                // 弐億万->弐億
                if (preg_match('/.*0{4}....\z/', $num)) {
                    $kansuji = str_replace('万', '', $kansuji);
                }
                // 参兆億弐万->参兆弐万
                if (preg_match('/0{4}........\z/', $num)) {
                    $kansuji = str_replace('億', '', $kansuji);
                }
                
}
echo "$kansuji";
