<?php

namespace BinalyOperation2\Operator;

use BinalyOperation2\IBinaryOperator;

require_once "IBinaryOperator.php";

/**
 * 除算です。
 */
class Division implements IBinaryOperator
{
    private $expression;
    private $result;
    private $error_message;

    public function getChoiceString()
    {
        return "除算";
    }

    public function calculate($value1, $value2)
    {
        if ($value2 == 0) {
            // 0除算
            $this->error_message = "0で割ることはできません。" . PHP_EOL;
            return;
        }
        $this->expression = $value1 . " ÷ " . $value2;
        $this->result = floor($value1 / $value2) . "(余り " . $value1 % $value2 . ")";
        $this->error_message = NULL;
    }

    public function isError()
    {
        return (!is_null($this->error_message));
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
