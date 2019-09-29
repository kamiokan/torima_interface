<?php
// https://w.atwiki.jp/fujiyan/pages/28.html
// とりあえずインターフェイス入門のJavaソースをPHPで書き直してみた
// オブジェクト指向的技法を用いないプログラム

namespace binary_operation1;

// 入力値の最小
const MIN_VALUE = -99999;
// 入力値の最大
const MAX_VALUE = 99999;

// 選択肢
const FINISH = 0;
const ADDITION = 1;
const SUBTRACTION = 2;
const MULTIPLICATION = 3;
const DIVISION = 4;

/**
 * ユーザ入力を返します。
 *
 * @param string $prompt プロンプトに表示する文字列
 * @return integer $str ユーザ入力文字列
 */
function input($prompt)
{
    echo $prompt . PHP_EOL;
    $str = trim(fgets(STDIN));
    if ($str === '') {
        echo "中断されました。" . PHP_EOL;
        exit();
    }

    return $str;
}

/**
 * 整数値を問い合わせます。
 *
 * @param integer $seq 何番目の数字か？数値を入れる
 * @return integer $value 整数値
 */
function ask_value($seq)
{
    $value = 0;
    $invalid = true;

    // 整数値が入力されるまで繰り返し
    while ($invalid) {
        echo $seq . "番目の数値を入力してください(" . MIN_VALUE . "～" . MAX_VALUE . "の整数)。" . PHP_EOL;

        $value = trim(fgets(STDIN));

        // 整数値として有効でない文字列
        if (!is_numeric($value)) {
            echo "入力された値は整数値ではありません。" . PHP_EOL;
            continue;
        }

        $invalid = ($value < MIN_VALUE) || ($value > MAX_VALUE);
        if ($invalid) {
            // 無効な入力
            echo "入力された数値が範囲を超えています。" . PHP_EOL;
        }
    }

    return $value;
}

/**
 * 操作を問い合わせます。
 *
 * @return integer $operation 操作の選択肢
 */
function ask_operation()
{
    $prompt = "操作を番号で選択してください。("
        . FINISH . ":終了 "
        . ADDITION . ":加算 "
        . SUBTRACTION . ":減算 "
        . MULTIPLICATION . ":乗算 "
        . DIVISION . ":除算"
        . ")";

    $operation = 0;
    $invalid = true;

    // 有効な選択肢が入力されるまで繰り返し
    while ($invalid) {
        $operation = input($prompt);

        // 整数値として有効でない文字列
        if (!is_numeric($operation)) {
            echo "入力された値は整数値ではありません。" . PHP_EOL;
            continue;
        }

        $invalid = ($operation < 0) || ($operation > DIVISION);
        if ($invalid) {
            // 無効な入力
            echo "正しい番号を選択してください。" . PHP_EOL;
        }
    }

    return $operation;
}

/**
 * 演算を行います。
 *
 * @param integer $operation 操作の選択肢
 * @param integer $value1 値1
 * @param integer $value2 値2
 */
function execute($operation, $value1, $value2)
{
    $expression = null;
    $result = null;

    switch ($operation) {
        case ADDITION:
            // 加算
            $expression = $value1 . " ＋ " . $value2;
            $result = $value1 + $value2;
            break;

        case SUBTRACTION:
            // 減算
            $expression = $value1 . " - " . $value2;
            $result = $value1 - $value2;
            break;

        case MULTIPLICATION:
            // 乗算
            $expression = $value1 . " × " . $value2;
            $result = $value1 * $value2;
            break;

        case DIVISION:
            // 除算
            if ($value2 == 0) {
                // 0除算
                echo "0で割ることはできません。" . PHP_EOL;
                return;
            }
            $expression = $value1 . " ÷ " . $value2;
            $result = floor($value1 / $value2) . "(余り " . $value1 % $value2 . ")";
            break;
    }

    echo $expression . " の答えは " . $result . " です。" . PHP_EOL . PHP_EOL;
}

/**
 * メイン処理です。
 */
$operation = ask_operation();
while ($operation != FINISH) {
    $val1 = ask_value(1);
    $val2 = ask_value(2);

    execute($operation, $val1, $val2);

    $operation = ask_operation();
}
echo "終了します。" . PHP_EOL;
