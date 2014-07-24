<?php

require_once 'src/class-pffy-cedictreader.php';
$str = "一毛不拔 一毛不拔 [yi1 mao2 bu4 ba2] /stingy (idiom)/";
echo new CedictReader($str);

