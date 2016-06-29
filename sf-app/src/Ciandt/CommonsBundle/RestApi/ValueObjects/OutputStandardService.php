<?php

namespace Ciandt\CommonsBundle\RestApi\ValueObjects;

use Ciandt\CommonsBundle\RestApi\ValueObjects\OutputStandardStatusService;

class OutputStandardService {

  private $status;
  private $object;

  public function __construct($object, $success = TRUE) {
    $this->object = $object;
    $this->status = new OutputStandardStatusService($success);
  }

  final public function addError($code, $message, $detail = null) {
    $this->status->addError($code, $message, $detail);
  }

  final public function addWarning($code, $message) {
    $this->status->addWarning($code, $message);
  }

  final public function getObject() {
    return $this->object;
  }

  final public function getStatus() {
    return $this->status;
  }

}
