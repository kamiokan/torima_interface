<?php
//コマンドライン引数を取得するテスト、またコマンドライン引数が空の場合の挙動チェック
var_dump($argv);

echo $argv[0] . PHP_EOL;

if (!empty($argv[1])) {
    echo $argv[1] . PHP_EOL;
}

if (!empty($argv[2])) {
    echo $argv[2] . PHP_EOL;
}
