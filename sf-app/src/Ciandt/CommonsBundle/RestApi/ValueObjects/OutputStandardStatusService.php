<?php

namespace Ciandt\CommonsBundle\RestApi\ValueObjects;

class OutputStandardStatusService {

  private $success;
  private $errors = array();
  private $warnings = array();

  public function __construct($success = TRUE) {
    $this->success = $success;
  }

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

  final public function getSuccess() {
    return $this->success;
  }

  final public function getErrors() {
    return $this->errors;
  }

  final public function getWarnings() {
    return $this->warnings;
  }

}
