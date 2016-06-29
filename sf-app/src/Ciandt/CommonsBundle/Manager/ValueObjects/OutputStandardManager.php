<?php

namespace Ciandt\CommonsBundle\Manager\ValueObjects;

use Ciandt\CommonsBundle\Manager\ValueObjects\OutputStandardStatusManager;

class OutputStandardManager {

  private $errors = array();
  private $warnings = array();
  private $object;

  final public function addError($code, $message, $detail = null) {
    $this->errors = array(
      'code' => $code,
      'message' => $message,
      'detail' => $detail,
    );
  }

  final public function addWarning($code, $message) {
    $this->warnings = array(
      'code' => $code,
      'message' => $message,
    );
  }

  final public function getErrors() {
    return $this->errors;
  }

  final public function getWarnings() {
    return $this->warnings;
  }

  final public function getObject() {
    return $this->object;
  }

  final public function setObject($object) {
    $this->object = $object;
  }


}
