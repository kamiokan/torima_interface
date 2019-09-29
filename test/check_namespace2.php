<?php
// Macでバックスラッシュは Option + ¥
// 名前空間の定義なしの場合

// useを使うケース
use Project\Module\Greeting;
use function Project\Module\hello;
use const Project\Module\ID;

require_once 'Sample.php';

$greet = new Greeting();
$greet->morning();
$greet->noon();
$greet->night();

hello();

echo ID .PHP_EOL;
