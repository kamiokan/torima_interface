<?php

namespace BinaryOperation3;

require_once "IBinaryOperator2.php";

/**
 * 演算子の標準的な実装です。
 */
abstract class StandardOperator implements IBinaryOperator2
{
    protected $expression;
    protected $result;
    protected $error_message = NULL;

    public function isError()
    {
        return ($this->error_message != NULL);
    }

    public function getErrorMessage()
    {
        return $this->error_message;
    }

    public function getExpression()
    {
        return $this->expression;
    }

    public function getResult()
    {
        return $this->result;
    }
}
