<?php
// Macでバックスラッシュは Option + ¥
// 全く別の名前空間を定義している場合
namespace MyProject\SpecialUtility;

// useを使わないケース
//use Project\Module\Greeting;
//use function Project\Module\hello;
//use const Project\Module\ID;

require_once 'Sample.php';

$greet = new \Project\Module\Greeting();
$greet->morning();
$greet->noon();
$greet->night();

\Project\Module\hello();

echo \Project\Module\ID .PHP_EOL;
