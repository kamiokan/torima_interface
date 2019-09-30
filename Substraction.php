<?php

namespace BinalyOperation2\Operator;

use BinalyOperation2\IBinaryOperator;

require_once "IBinaryOperator.php";

/**
 * 減算です。
 */
class Substraction implements IBinaryOperator
{
    private $expression;
    private $result;

    public function getChoiceString()
    {
        return "減算";
    }

    public function calculate($value1, $value2)
    {
        $this->expression = $value1 . " - " . $value2;
        $this->result = $value1 - $value2;
    }

    public function isError()
    {
        // エラーが発生することは無いので、常にfalse
        return false;
    }

    public function getErrorMessage()
    {
        // エラーが発生することは無いので、常にnull
        return NULL;
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
