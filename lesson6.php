<?php
// 以下配列の中身をfor文を使用して表示してください。
// 表が縦横に伸びてもある程度対応できるように柔軟な作りを目指してください。
// 表示はHTMLの<table>タグを使用すること

/**
 * 表示イメージ
 *  _________________________
 *  |_____|_c1|_c2|_c3|横合計|
 *  |___r1|_10|__5|_20|___35|
 *  |___r2|__7|__8|_12|___27|
 *  |___r3|_25|__9|130|__164|
 *  |縦合計|_42|_22|162|__226|
 *  ‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾
 */

$arr = [
    'r1' => ['c1' => 10, 'c2' => 5, 'c3' => 20],
    'r2' => ['c1' => 7, 'c2' => 8, 'c3' => 12],
    'r3' => ['c1' => 25, 'c2' => 9, 'c3' => 130]
];
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>テーブル表示</title>
<style>
table {
    border:1px solid #000;
    border-collapse: collapse;
}
th, td {
    border:1px solid #000;
}
</style>
</head>
<body>
    <!-- ここにテーブル表示 -->

<?php

$arr_keys = array_keys($arr);               //配列の中の要素名r1～を取得 $arr_keys=[r1,r2,r3]

$keys = array_keys($arr[$arr_keys[0]]);     //配列の中のr1(最初の要素)の配列のc1～を取得 $keys=[c1,c2,c3]

echo "<table>";                             //tableタグの開始
echo "<tr><th></th>";                       //行の始まり

foreach ($keys as $th)                      //見出しのc1~の取り出し
{
    echo "<th>" . $th . "</th>";
}

echo "<th>横合計</th></tr>";                //見出し行の終わり

foreach ($arr as $td_first => $arr_c)       //横軸の要素でｒ1～値を取得し、合計値を設定してsumに入れる
{
    $sum = 0;                               //横合計の算出のための変数の1行ごとの初期化
    echo "<tr><td>" . $td_first . "</td>";  //縦1行目見出しの取得
    
    foreach ($arr_c as $key_c => $td_item)  //r1ごとの要素の取得
    {
        echo "<td>" . $td_item . "</td>";   
        $sum += $td_item;                   //横合計の加算
    }   
    
    echo "<td>" . $sum . "</td></tr>";      //1行ごとのループ終わり
    
}
    echo "<tr><td>縦合計</td>";             //最終項目
    
    $sum_all =0;                           //最終合計の取得のための初期化
    
foreach ($keys as $c_item)                          //$keys=[c1,c2,c3]内の値をすべて取得
{
    $sum_h = 0;                                     //縦合計値の初期化
    
    $sum_h = array_sum(array_column($arr,$c_item)); //関数array_columnを使って$arrの中の$c_item[例：c1]のキーの値を取り出してarray_sumで合計する
    
    echo "<td>" . $sum_h . "</td>";                 
    $sum_all += $sum_h;                             //縦合計1マスごとのループの終わり
}

    echo "<td>" . $sum_all . "</td></tr>";          //右下合計値の出力
    echo "</table>";

?>

</body>
</html>