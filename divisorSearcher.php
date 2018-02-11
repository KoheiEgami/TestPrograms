<?php 
    //汎用ロジック
    class GeneralLogic{
        //約数を見つけるプログラム
        public static function CalcDivisors($iNum){
            $rcDivisorArray = array(); //返値
            $i = 1;
            $iDivisor = $i + 1; //＄iより大きければ良い
            while($i < $iDivisor){
                $iDivisor = $iNum / $i; //約数候補
                $isInt = is_int($iDivisor);
                if($isInt){
                    array_push($rcDivisorArray, $i, $iDivisor);
                }
                $i++;
            }
            sort($rcDivisorArray);
            return $rcDivisorArray;
        }

        //約数を見つけるプログラム
        public static function CheckValue($iNum){
            if (!is_numeric($iNum)){
                return 1;   //文字型
            }
            if ($iNum == 0){
                return 2;   //0に約数が無い
            }
        }
    }
    
    //ビジネスロジック
    class BusinessLogic{
        //約数を見つけるプログラム
        public static function DispDivisors($iNum){
            $rcValue = GeneralLogic::CheckValue($iNum);
            if ($rcValue == 1){
                echo nl2br("文字が入力されています。\n");
            }elseif($rcValue == 2){
                echo nl2br("「0」に約数はありません。\n");
            }else{
                echo nl2br("約数は以下の通りです。\n");
                $iDivisors = GeneralLogic::CalcDivisors($iNum);
                $iLoop = count($iDivisors);
                for($i = 0; $i < $iLoop; $i++){
                    echo $iDivisors[$i];
                    if ($i != $iLoop-1){
                        echo ", "; 
                    }
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>約数計算</title>
</head>
<body>
    <form action = "divisorSearcher.php" method = "get">
        約数を求めます。</br>
        テキストボックスに数値を入力して下さい。</br>
        数値：<input type="text" name="evaluateNum" size="30" maxlength="10"></br>
        <input type="submit" value="計算">
    </form>
    <?php
        //約数の表示
        if(isset($_GET["evaluateNum"])){
            BusinessLogic::DispDivisors($_GET["evaluateNum"]);
        }
    ?>
</body>
</html>

