<?php
class Controller
{
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function activateModel()
    {
        $this->model->getResponses();
    }
}