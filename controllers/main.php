<?php

use app\assets\AppAsset;

use yii\helpers\Html;
use app\models\Login;
use app\components\Uservaludate;

$login_model = new Login();

//$session = Yii::$app->session;

//$email = $session->get('admin');

$isAdmin = false;

$cookies = Yii::$app->request->cookies;



if (($cookie = $cookies->get('admin')) !== null) {
    $email = $cookie->value;
    $pr_admin = Login::find()->asArray()->where(['username' => $email])->one();
}
if (($cookie = $cookies->get('auth_key')) !== null) {
    $auth_key = $cookie->value;
}




if(!empty($pr_admin)){
    if(strcasecmp($pr_admin['auth_key'], $auth_key) == 0){
    $isAdmin = true;
}
}



AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= Html::encode($this->title) ?></title>
    <?= Html::csrfMetaTags() ?>
    <?php $this->head() ?>
   <link rel="shortcut icon" href="../web/favicon.ico" type="image/x-icon">
</head>
<body>
   <?php $this->beginBody() ?>

    
    
    
    
    
 
        
        
            <nav class="navbar navbar-expand-md fixed-top navbar-dark bg-dark">
          <div id="navbar-brand">
	    <a class="navbar-brand text-white">
        <img src="../web/img/logo/text_PLC.png" style="height:30px;">
	        <!--<span class="fa fa-paw"></span>
	        <span>NameSayt</span>-->
	    </a>
	    </div>
          <button style="border:none;" class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
                  <span class="navbar-toggler-icon text-white"></span>
                   <!--<svg class="ham hamRotate ham4" viewBox="0 0 100 100" width="60">
  <path
        class="line top"
        d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20" />
  <path
        class="line middle"
        d="m 70,50 h -40" />
  <path
        class="line bottom"
        d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20" />
</svg>-->
          </button>
      <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto ml-3 ml-md-0 mt-5 mt-md-0">
	                <li class="nav-item">
	                   <?= Html::a('Главная','/', ['class' => 'nav-link']) ?>
	                </li>
	                <li class="nav-item">
	                   <?= Html::a('Услуги','#', ['class' => 'nav-link']) ?>
	                </li>
	                <li class="nav-item">
	                   <?= Html::a('Галерея','#', ['class' => 'nav-link']) ?>
	                </li>
	                <li class="nav-item">
	                   <?= Html::a('Календарь','/site/calender', ['class' => 'nav-link']) ?>
	                </li>
	                <li class="nav-item">
	                    <?= Html::a('Контакты',['#'], ['class' => 'nav-link']) ?>
	                </li>
	            </ul>
	            <?php if($isAdmin == true): ?>
         <a href="/site/logexit" class="nav-link">
    <button class="btn btn-outline-warning form-inline pull-xs-righ" type="submit" style="border-radius: 50em;">Выйти<i class="fa fa-sign-out ml-2" aria-hidden="true"></i></button>
    </a>
     <?php endif; ?>
      </div>
    </nav>
        <div class="modal-menu"></div>
        
        
         <main>
             
                  <?= $content ?>
              
       </main>
    <?php $this->endBody() ?>
    <footer>
        
    </footer>
</body>
</html>
<?php $this->endPage() ?>
