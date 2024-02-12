﻿<?php
// 以下はランダムな数字を格納した配列を表示するプログラムです。
// 配列内の隣合う数字を比較して左側から小さい順に表示されるよう配列の中身を並び替えてください。
// 並び替えはfor文を使用すること
// (sort関数などを使用すれば実装は可能ですが、for文を使って一つ一つの値を比較・操作して並べ替えを実装してみてください。)

$arr = [99, 3, 12, 45, 60, 100, 31, 7, 28];

// 例）
// 4, 3, 1, 2
// ↓
// 3, 4, 1, 2
// ↓
// 3, 1, 4, 2
// ↓
// 3, 1, 2, 4
// ↓
// 1, 3, 2, 4
// ↓
// 1, 2, 3, 4　←これが画面に表示される

$arr = [99, 3, 12, 45, 60, 100, 31, 7, 28];

// ここで並び替え処理

$max = count($arr); //配列の要素数の取得

for($i=0;$i<$max;$i++)              //バブルソートの基本形
{
 for($j=0;$j<$max-1;$j++)           //一番最後まで比較しようとすると右隣がなくなるので$max-1
    {
        if($arr[$j] > $arr[$j+1])
        {
            $put_num = $arr[$j+1];      //$put_numに入れ替える先のものを仮保存しておく

            $arr[$j+1] = $arr[$j];      //右と入れ替え
            
            $arr[$j] = $put_num;;       //保存したものを入れ替え先に代入
        }

    }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>数字並び替えプログラム</title>
</head>
<body>
    <!-- ここに並び替え後を表示 -->
<?php
foreach($arr as $key => $num)   //入れ替えた配列の要素をすべて取得
{
    
    if($key != $max-1)
    {
        echo $num . ",";
    }
    else
    {
        echo $num;          //一番最後だけ","がいらないので条件分岐
    }
    
}
?>

</body>
</html>
