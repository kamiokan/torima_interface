<?php
// https://w.atwiki.jp/fujiyan/pages/28.html
// とりあえずインターフェイス入門のJavaソースをPHPで書き直してみた
// フレームワーク版

namespace BinaryOperation4;

require_once "use_abstract_class/Addition.php";
require_once "use_abstract_class/Substraction.php";
require_once "use_abstract_class/Multiplication.php";
require_once "use_abstract_class/Division.php";
require_once "use_abstract_class/Power.php";
require_once "BinaryOperationFramework.php";

use \BinaryOperation3\Operator\Addition;
use \BinaryOperation3\Operator\Substraction;
use \BinaryOperation3\Operator\Multiplication;
use \BinaryOperation3\Operator\Division;
use \BinaryOperation3\Operator\Power;

/**
 * メイン処理です。
 */
$framework = new BinaryOperationFramework();
$framework->addOperator(new Addition());
$framework->addOperator(new Substraction());
$framework->addOperator(new Multiplication());
$framework->addOperator(new Division());
$framework->addOperator(new Power());
$framework->perform();
