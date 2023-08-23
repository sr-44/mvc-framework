<?php

namespace framework;

abstract class Controller
{

    public array $data = [];
    public array $meta = [];
    public false|string $layout = '';
    public string $view = '';
    public object $model;

    public function __construct(public $route = [])
    {

    }

    public function getModel(): void
    {
        $model = 'app\models\\' . $this->route['admin_prefix'] . $this->route['controller'];

        if (class_exists($model)) {
            $this->model = new $model();
        }
    }

    public function getView()
    {
        $this->view = $this->view ?: $this->route['action'];
        //
    }

    public function set($data)
    {
        $this->data = $data;
    }


    public function setMeta($title = '', $description = '', $keywords = ''): void
    {
        $this->meta = [
            'title' => $title, 'description' => $description, 'keywords' => $keywords
        ];
    }
}
