<?php
namespace Drupal\hello_user\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\user\UserInterface;

class HelloUserController extends ControllerBase {

    public function GenTable($name) {
        return [
            '#type' => 'markup',
            '#markup' => $this->t('Hola @name! Bienvenido a nuestro blog.', ['@name' => $name]),
        ];
    }
}