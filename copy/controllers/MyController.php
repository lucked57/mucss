<?php

namespace app\controllers;

//use yii\web\Controller;

class MyController extends AppController
{
    public function actionIndex($id = null){
        $hi = "hello";
        $names = ['Ivanov', 'Petrov', 'Sidorow'];
        
        if(!$id) $id = 'test';
        //return $this->render('index', ['hello' => $hi, 'names' => $names ]);
        return $this->render('index', compact('hi', 'names', 'id'));
    }
    
    public function actionBlogPost(){
        // my/blog-post
        return 'Blog Post';
    }
}
