<?php

namespace BinalyOperation2;

/**
 * 二項演算のインターフェイス
 */
interface IBinaryOperator
{
    /**
     * 選択時の表示に用いる文字列を返します。
     *
     * @return string 文字列
     */
    public function getChoiceString();

    /**
     * 計算を実行します。
     *
     * @param integer $value1
     * @param integer $value2
     */
    public function calculate($value1, $value2);

    /**
     * 計算エラーが発生したかどうかを判定します。
     *
     * @return boolean 計算エラーが発生しているならばtrue
     */
    public function isError();

    /**
     * 計算エラーが発生している場合の、エラーメッセージを返します。
     *
     * @return string メッセージ
     */
    public function getErrorMessage();

    /**
     * 実行した計算式の文字列を返します。
     *
     * @return string 計算式
     */
    public function getExpression();

    /**
     * 実行した計算の答えを表す文字列を返します。
     *
     * @return string 計算の答え
     */
    public function getResult();
}
