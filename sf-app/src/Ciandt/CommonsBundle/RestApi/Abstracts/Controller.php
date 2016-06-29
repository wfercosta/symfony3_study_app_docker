<?php
namespace Ciandt\CommonsBundle\RestApi\Abstracts;

use Symfony\Bundle\FrameworkBundle\Controller\Controller as SymfonyController;
use FOS\RestBundle\View\View;

abstract class Controller extends SymfonyController {

  public abstract function getManager();

  final public function handle($output, $status = 200) {
    $view = View::create();
    $handler = $this->get('fos_rest.view_handler');
    $view->setStatusCode($status);
    $view->setData($output);
    return $handler->handle($view);
  }

}
