<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\HomePage;
use app\models\Login;
use app\components\Uservaludate;




class SiteController extends AppController
{
    
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        
        $Home = HomePage::find()->asArray()->all();
        
        $this->view->title = "Главная страница";
         
         $this->view->registerMetaTag(['name' => 'keywords', 'content' => 'ключевики...']);
         $this->view->registerMetaTag(['name' => 'description', 'content' => 'описание страницы...']);
        
        return $this->render('index', compact('Home'));
    }

    /**
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }


    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
    public function actionCalender(){
        return $this->render('calender');
    }
    
    public function actionLogexit(){

        
                        $cookies = Yii::$app->response->cookies;
                    
                        unset($cookies['admin']);
                        unset($cookies['auth_key']);
                        return $this->redirect('/');
    }
    
    
    
    public function actionLogin(){
        
        $login_model = new Login();
        
        $errors;
        
        
        
        
        
        if($login_model->load(Yii::$app->request->post())){
            
            
            $email = Uservaludate::validateInput($login_model->username);
            
            $pass = Uservaludate::validateInput($login_model->password);
            
            $pr_username = Login::find()->asArray()->where(['username' => $email])->one();
            
            if(empty($pr_username)){
                $errors = "Пользователь ".$email ." не найден";
            }
            else{
                if(!password_verify($pass, $pr_username['password'])){
                    $errors = 'Неправильный пароль';
                }
            }
            
            
            if(empty($errors)){
                
            
            
            
                if( $login_model->validate() ){  //save()
                        Yii::$app->session->setFlash('success', 'Данные приняты');
                        //$session = Yii::$app->session;
                        //$session->set('admin', $pr_username['username']);
                        $cookies = Yii::$app->response->cookies;
                    
                        $cookies->add( new \yii\web\Cookie([
                            'name' => 'admin',
                            'value' => $pr_username['username']
                        ]));
                         $cookies->add( new \yii\web\Cookie([
                            'name' => 'auth_key',
                            'value' => $pr_username['auth_key']
                        ]));
                    
                        //unset($cookies['admin']);
                    
                    
                    
                        //SetCookie("admin", $pr_username['username']);
                        //SetCookie("code", $pr_username['auth_key']);
                        //return $this->refresh();
                        return $this->redirect('/');
                    }
                    else
                    {
                        
                        foreach ($login_model->getErrors() as $key => $value) {
                        $error_arr =  $key.': '.$value[0];
                      }
                        Yii::$app->session->setFlash('error', $error_arr);
                    }
            }
            else{
                Yii::$app->session->setFlash('error', $errors);
            }
            
            
            
        }
        
        return $this->render('login', compact('login_model'));
    }
    
    
    
    
}
