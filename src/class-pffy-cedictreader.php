<?php

/**
 *
 * class-pffy-cedictreader.php
 * Parses a single line of a CEDICT-compatible dictionary source file.
 *
 * @version 0.1
 * @license http://unlicense.org/ The Unlicense
 * @link https://github.com/pffy/php-cedictreader
 * @author The Pffy Authors
 *
 * SYSTEM REQUIREMENTS: PHP 5.2.0 or better
 *
 */

require_once 'class-pffy-idioms.php';

class CedictReader {

  const BRACKET_L = "[";
  const BRACKET_R = "]";
  const FWDSLASH = "/";
  const SINGLE_SPACE = " ";

  private $_input = "";

  private $_t = "";
  private $_s = "";
  private $_p = "";
  private $_d = "";

  private $_pmash = "";
  private $_pbash = "";
  private $_psmash = "";
  private $_phash = "";

  private $_dmash = "";

  private $_readerString = "";

  function __construct($str = "") {

    $str = (string)$str;
    if(!$str) {
      return false;
    }

    $this->_input = $str;

    $str = Idioms::nocr($str);

    $pos1 = strpos($str, self::BRACKET_L);
    $pos2 = strpos($str, self::BRACKET_R);
    $pos3 = strpos($str, self::FWDSLASH) + 1;
    $pos4 = strrpos($str, self::FWDSLASH);

    $ts_arr = explode(self::SINGLE_SPACE, substr($str, 0, $pos1));

    $this->_t = $t = (string)$ts_arr[0];
    $this->_s = $s = (string)$ts_arr[1];
    $this->_p = $p = (string)Idioms::pumlaut(substr($str, $pos1 + 1, $pos2 - $pos1 - 1));
    $this->_d = $d = substr($str, $pos3, $pos4 - $pos3);

    $this->_pmash = $pmash = Idioms::pmash($p);
    $this->_pbash = $pbash = Idioms::pbash($p);
    $this->_psmash = $psmash = Idioms::psmash($p);
    $this->_phash = $phash = Idioms::phash($p);

    $this->_dmash = $dmash = Idioms::dmash($d);

    $this->_readerString = "t:$t s:$s p:$p d:$d pmash:$pmash pbash:$pbash";
    $this->_readerString .= " " . "psmash:$psmash phash:$phash dmash:$dmash";
  }

  public function __toString() {
    return $this->_readerString;
  }

  public function t() {
    return $this->_t;
  }

  public function s() {
    return $this->_s;
  }

  public function p() {
    return $this->_p;
  }

  public function d() {
    return $this->_d;
  }

  public function pmash() {
    return $this->_pmash;
  }

  public function pbash() {
    return $this->_pbash;
  }

  public function psmash() {
    return $this->_psmash;
  }

  public function phash() {
    return $this->_phash;
  }

  public function dmash() {
    return $this->_dmash;
  }

}


