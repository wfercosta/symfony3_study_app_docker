<?php
namespace Company\Comum\ControllerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

abstract class ControllerAbstract extends Controller {
  public abstract function getManager();
  public abstract function getAssembler();
}
