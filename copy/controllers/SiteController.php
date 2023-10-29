<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\Content_index;
//use app\models\LoginForm;
//use app\models\ContactForm;
//use app\models\HomePage;
use app\models\Login;
use app\components\Uservaludate;
//use app\models\Uploadpost;
use yii\web\UploadedFile;
//use app\models\SelectPost;
//use app\models\Gallery;
//use app\models\Gallery_paw;
use yii\helpers\Url;
use app\models\Service;
use app\models\Partners;
use app\models\Team;


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
          if(  Uservaludate::validateCookie() ){
            $admin = true;
        }
        else{
            $admin = false;
        }
        
        $Home = Content_index::find()->asArray()->one();
        
        if( Yii::$app->request->isAjax ){
                    if($admin){
                        $meta = Uservaludate::validateInput($_GET['meta']);
                        $val = Uservaludate::validateInput($_GET['val']);
                        if($meta == 'select'){
                            return $Home[$val.'ru'].'<>'.$Home[$val.'en'].'<>'.$Home[$val.'ee'];
                        }
                        if($meta == 'update'){
                            $ru = $_GET['ru'];
                            $en = $_GET['en'];
                            $ee = $_GET['ee'];
                            if(!empty($ru) && !empty($en) && !empty($ee)){
                              Yii::$app->db->createCommand()->update('content_index', [$val.'ru' => $ru, $val.'en' => $en, $val.'ee' => $ee], 'id = '.$Home['id'])->execute();  
                            }
                            return $ru;
                        }  
                    }
                    
                    
                
            }
        
        $this->view->title = "Юридическое бюро Таллин, Эстония - SPB ESTONIA ÕIGUSBÜROO";
         
         $this->view->registerMetaTag(['name' => 'keywords', 'content' => 'SPB ESTONIA ÕIGUSBÜROO, Юридическое бюро']);
         $this->view->registerMetaTag(['name' => 'description', 'content' => 'Юридическое бюро - SPB ESTONIA ÕIGUSBÜROO в г.Таллин, Эстония, оказывает различные юридические услуги и правовую помощь.']);

       /* if( Yii::$app->request->isAjax ){
                $lang = Uservaludate::validateInput($_POST['lang']);
                if($lang == 'ru' || $lang == 'ee'){
                    $cookies = Yii::$app->response->cookies;
                    $cookies->add( new \yii\web\Cookie([
                            'name' => 'lang',
                            'value' => $lang,
                            'expire' => time() + 86400 * 365,
                        ]));
                    return 'location';
                }
                else{
                    return $lang;
                }
                
            }*/
        $lang = Uservaludate::routing_lang();
        
        return $this->render('index', compact('Home','lang','admin'));
    }
    
    public function actionContact()
    {
        
        $this->view->title = "Юридическое бюро ESTONIA ÕIGUSBÜROO - Контакты";
         
         $this->view->registerMetaTag(['name' => 'keywords', 'content' => 'ключевики...']);
         $this->view->registerMetaTag(['name' => 'description', 'content' => 'описание страницы...']);

        
        return $this->render('contact');
    }

    public function actionPartners()
    {
        $lang = Uservaludate::routing_lang();
        $this->view->title = "Юридическое бюро ESTONIA ÕIGUSBÜROO - Парнеры";
         
         $this->view->registerMetaTag(['name' => 'keywords', 'content' => 'ключевики...']);
         $this->view->registerMetaTag(['name' => 'description', 'content' => 'описание страницы...']);

        
        $partners = Partners::find()->orderBy(['id' => SORT_ASC])->asArray()->limit(50)->all();

        
        return $this->render('partners', compact('lang','partners'));
    }
    
    public function actionService()
    {
        $lang = Uservaludate::routing_lang();
         
         $this->view->registerMetaTag(['name' => 'keywords', 'content' => 'ключевики...']);
         $this->view->registerMetaTag(['name' => 'description', 'content' => 'описание страницы...']);
        switch ($lang) {
            case 'ru':
                $title = 'Услуги Юридического бюро SPB ESTONIA ÕIGUSBÜROO';
                $title_s = 'Наши услуги';
                break;
            case 'en':
                $title = 'Services of the Law Office SPB ESTONIA ÕIGUSBÜROO';
                $title_s = 'Our services';
                break;
            case 'ee':
                $title = 'Peterburi advokaadibüroo SPB ESTONIA ÕIGUSBÜROO';
                $title_s = 'Meie teenused';
                break;
        }
        
        $this->view->title = $title;
        
        $service = Service::find()->orderBy(['id' => SORT_ASC])->asArray()->limit(50)->all();

        
        return $this->render('service', compact('lang','title','title_s','service'));
    }
    public function actionTeam()
    {
        $lang = Uservaludate::routing_lang();
        $this->view->title = "Юридическое бюро ESTONIA ÕIGUSBÜROO - Команда";
         
         $this->view->registerMetaTag(['name' => 'keywords', 'content' => 'ключевики...']);
         $this->view->registerMetaTag(['name' => 'description', 'content' => 'описание страницы...']);

        
        $team = Team::find()->orderBy(['id' => SORT_ASC])->asArray()->limit(50)->all();

        
        return $this->render('team', compact('lang','team'));
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
                if($pr_username['errors'] >= 5){
                    $errors = "Повторный пароль выслан на почту";
                    
                    if(empty($pr_username['code_email'])){
                       $kod_sesi = Uservaludate::generate_code(5);
                     $to  = "<".$email.">" ;

                        $subject = "Код подтверждения"; 

                        $message = '
                            <html>
                            <head>
                              <title>Ваш код:</title>
                            </head>
                            <body>
                              <p>Код: '.$kod_sesi.';</p> 
                            </body>
                            </html>
                            ';

                        $headers = 'From: spbestonia@example.com' . "\r\n" .
                        'Content-type: text/html; charset=UTF-8' . "\r\n" .
                        'Reply-To: spbestonia@example.com' . "\r\n" .
                        'X-Mailer: PHP/' . phpversion();

                        mail($to, $subject, $message, $headers);
                    
                        $kod_sesi = password_hash($kod_sesi, PASSWORD_DEFAULT);
                    
                        $update = Login::findone($pr_username['id']);
                        $update->code_email = $kod_sesi;
                        $update->save(); 
                    }
                    
                    
                    
                }
                else{
                  if(!password_verify($pass, $pr_username['password'])){
                      $up_err = $pr_username['errors'] + 1;
                      $errors = 'Неправильный пароль';
                      $update = Login::findone($pr_username['id']);
                      $update->errors = $up_err;
                      $update->save();
                      
                }  
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
                            'value' => $pr_username['username'],
                            'expire' => time() + 86400 * 365,
                        ]));
                         $cookies->add( new \yii\web\Cookie([
                            'name' => 'auth_key',
                            'value' => $pr_username['auth_key'],
                            'expire' => time() + 86400 * 365,
                        ]));
                    
                        $update = Login::findone($pr_username['id']);
                        $update->errors = 0;
                        $update->code_email = '';
                        $update->save();
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
            elseif($errors == "Повторный пароль выслан на почту" && !empty($pr_username['code_email'])){
               $pr_username = Login::find()->asArray()->where(['username' => $email])->one();
                if(password_verify($pass, $pr_username['code_email'])){
                    Yii::$app->session->setFlash('success', 'Данные приняты');
                        $cookies = Yii::$app->response->cookies;
                    
                        $cookies->add( new \yii\web\Cookie([
                            'name' => 'admin',
                            'value' => $pr_username['username'],
                            'expire' => time() + 86400 * 365,
                        ]));
                         $cookies->add( new \yii\web\Cookie([
                            'name' => 'auth_key',
                            'value' => $pr_username['auth_key'],
                            'expire' => time() + 86400 * 365,
                        ]));
                    
                        $update = Login::findone($pr_username['id']);
                        $update->errors = 0;
                        $update->code_email = '';
                        $update->save();
                        return $this->redirect('/');
                }
                else{
                    Yii::$app->session->setFlash('error', "Код не совпадает с высланным на почту");
                }
            }
            else{
                 Yii::$app->session->setFlash('error', $errors);
            }
            
            
            
        }
        
        return $this->render('login', compact('login_model'));
    }
    
    
    public function actionLogexit(){

        
                        $cookies = Yii::$app->response->cookies;
                    
                        unset($cookies['admin']);
                        unset($cookies['auth_key']);
                        return $this->redirect('/');
    }
    
}
