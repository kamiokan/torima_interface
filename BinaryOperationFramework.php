<?php
// https://w.atwiki.jp/fujiyan/pages/28.html
// とりあえずインターフェイス入門のJavaソースをPHPで書き直してみた
// フレームワーク版

namespace BinaryOperation4;

/**
 * 二項演算フレームワークです。
 */
class BinaryOperationFramework
{
    // 入力値の最小
    const MIN_VALUE = -99999;
    // 入力値の最大
    const MAX_VALUE = 99999;

    // 選択肢
    const FINISH = 0;

    // 演算子のリスト
    private $operation_list = [];

    /**
     * ユーザ入力を返します。
     *
     * @param string $prompt プロンプトに表示する文字列
     * @return integer $str ユーザ入力文字列
     */
    private function input($prompt)
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
    private function ask_value($seq)
    {
        $value = 0;
        $invalid = true;

        // 整数値が入力されるまで繰り返し
        while ($invalid) {
            echo $seq . "番目の数値を入力してください(" . self::MIN_VALUE . "～" . self::MAX_VALUE . "の整数)。" . PHP_EOL;

            $value = trim(fgets(STDIN));

            // 整数値として有効でない文字列
            if (!is_numeric($value)) {
                echo "入力された値は整数値ではありません。" . PHP_EOL;
                continue;
            }

            $invalid = ($value < self::MIN_VALUE) || ($value > self::MAX_VALUE);
            if ($invalid) {
                // 無効な入力
                echo "入力された数値が範囲を超えています。" . PHP_EOL;
            }
        }

        return $value;
    }

    /**
     * 演算子を追加します。
     *
     * @param object $operator 演算子
     */
    public function addOperator($operator)
    {
        $this->operation_list[] = $operator;
    }

    /**
     * 操作を問い合わせます。
     *
     * @param array $operation_list 演算子のリスト
     * @return integer $operation 操作の選択肢
     */
    private function ask_operation($operation_list)
    {
        $i = 0;
        $prompt = "操作を番号で選択してください。(";
        $prompt .= $i . ":終了 ";
        while ($i < count($operation_list)) {
            $prompt .= " ";
            $prompt .= ($i + 1) . ":" . $operation_list[$i]->getChoiceString();
            $i++;
        }
        $prompt .= ")";

        $operation = 0;
        $invalid = true;

        // 有効な選択肢が入力されるまで繰り返し
        while ($invalid) {
            $operation = $this->input($prompt);

            // 整数値として有効でない文字列
            if (!is_numeric($operation)) {
                echo "入力された値は整数値ではありません。" . PHP_EOL;
                continue;
            }

            $invalid = ($operation < 0) || ($operation > count($operation_list));
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
     * @param array $operation_list 演算子のリスト
     */
    private function execute($operation, $value1, $value2, $operation_list)
    {
        $op = $operation_list[$operation - 1];
        $op->calculate($value1, $value2);

        if ($op->isError()) {
            echo $op->getErrorMessage();
            return;
        }

        echo $op->getExpression() . " の答えは " . $op->getResult() . " です。" . PHP_EOL . PHP_EOL;
    }

    /**
     * 計算を実施します。
     */
    public function perform()
    {
        $operation = $this->ask_operation($this->operation_list);
        while ($operation != self::FINISH) {
            $val1 = $this->ask_value(1);
            $val2 = $this->ask_value(2);

            $this->execute($operation, $val1, $val2, $this->operation_list);

            $operation = $this->ask_operation($this->operation_list);
        }
        echo "終了します。" . PHP_EOL;
    }
}
