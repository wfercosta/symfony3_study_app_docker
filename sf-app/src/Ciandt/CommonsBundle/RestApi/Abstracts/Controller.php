<?php
namespace Ciandt\CommonsBundle\RestApi\Abstracts;

use Symfony\Bundle\FrameworkBundle\Controller\Controller as SymfonyController;
use FOS\RestBundle\View\View;
use Ciandt\CommonsBundle\RestApi\ValueObjects\OutputStandardService;

abstract class Controller extends SymfonyController {

  public abstract function getManager();

  final public function handle($output, $status = 200) {
    $view = View::create();
    $handler = $this->get('fos_rest.view_handler');
    $view->setStatusCode($status);
    $view->setData($output);
    return $handler->handle($view);
  }

  final public function getSerializer() {
    return $this->get('jms_serializer');
  }

  final public function validate($in) {
    $validator = $this->get('validator');
    $errors = $validator->validate($in);
    if (count($errors) > 0) {
      $output = new OutputStandardService(null, false);
      foreach ($errors as $key => $error) {
        $output->addError($error->getCode(), $error->getMessage());
      }
      return $output;
    }
    return null;
  }

}
