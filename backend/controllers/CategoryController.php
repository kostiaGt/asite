<?php

namespace backend\controllers;
use kartik\tree\controllers\NodeController;
class CategoryController extends NodeController
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
