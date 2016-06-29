<?php

namespace Ciandt\RestApi\BlogBundle\Assembler;

use Ciandt\CommonsBundle\RestApi\ValueObjects\OutputStandardService;

class BlogAssemblerOut {

  static final public function toOutputStandardService($managerOutput) {

    $output = new OutputStandardService($managerOutput->getObject());

    foreach ($managerOutput->getErrors() as $error) {
      $output->addError($error['code'], $error['message'], $error['detail']);
    }

    foreach ($managerOutput->getWarnings() as $warn) {
      $output->addWarning($warn['code'], $warn['message']);
    }

    return $output;
  }

}
