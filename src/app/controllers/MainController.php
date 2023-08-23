<?php

namespace app\controllers;

use framework\Controller;

class MainController extends Controller
{
    public function indexAction()
    {
        $this->setMeta('Бла-бла-бла', 'Description', 'keywords...');
        $this->set(["names" => 'ok']);
    }
}

