<?php
// エラーを強制表示する
error_reporting(E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED & ~E_NOTICE);
ini_set('display_errors', "On");

//コマンドラインからの標準入力の挙動チェック
echo "何かしら入力してください：" . PHP_EOL;

// 1行の入力
echo "I'm waiting your input..." . PHP_EOL;
echo fgets(STDIN) . PHP_EOL;

// 複数行の入力
echo "I'm waiting your multiple input..." . PHP_EOL;
echo "When you want to finish, input Enter only." . PHP_EOL;
$stdins = [];
while (true) {
    $stdin = trim(fgets(STDIN));
    if ($stdin === '') {
        var_export($stdins);
        return;
    }
    $stdins[] = $stdin;
}

echo "finish!" . PHP_EOL;
