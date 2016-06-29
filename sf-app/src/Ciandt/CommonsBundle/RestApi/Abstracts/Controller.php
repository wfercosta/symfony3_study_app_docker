<?php
namespace Ciandt\CommonsBundle\RestApi\Abstracts;

use Symfony\Bundle\FrameworkBundle\Controller\Controller as SymfonyController;

abstract class Controller extends SymfonyController {

  public abstract function getManager();

}
