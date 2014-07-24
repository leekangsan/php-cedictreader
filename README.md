php-cedictreader
================

PHP implementation of CedictReader object, which parses a single line of a CEDICT-compatible Chinese-English dictionary source file


### DEMO

```php
require_once 'src/class-pffy-cedictreader.php';

$str = "一毛不拔 一毛不拔 [yi1 mao2 bu4 ba2] /stingy (idiom)/";
echo new CedictReader($str);

```

### DEMO OUTPUT

```
t:一毛不拔 s:一毛不拔 p:yi1 mao2 bu4 ba2 d:stingy (idiom) pmash:yi1mao2bu4ba2 pbash:yimaobuba psmash:ymbb phash:abimouy dmash:stingyidiom
```
