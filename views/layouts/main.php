<?php

use app\assets\AppAsset;

use yii\helpers\Html;
use app\models\Login;
use app\components\Uservaludate;

$login_model = new Login();

$isAdmin = false;

$cookies = Yii::$app->request->cookies;



if(empty(Yii::$app->params['lang'])){
    $lang = Uservaludate::CookieLang();
}
else{
    $lang = Yii::$app->params['lang'];
}

if($lang == 'ru'){
    $main = 'Главная';
    $service = 'Услуги';
    $contact = 'Контакты';
    $patern = 'Парнеры';
    $team = 'Команда';
}
elseif($lang == 'ee'){
    $main = 'Peamine';
    $service = 'Teenused';
    $contact = 'Kontakt';
    $patern = 'Partneritega';
    $team = 'Meeskond';
}
else{
    $main = 'Main';
    $service = 'Service';
    $contact = 'Contact';
    $patern = 'Patern';
    $team = 'Team';
}


if($lang == 'ru'){
    $add = '/ru';
    $third = 'en';
    $second = 'ee';
}
elseif($lang == 'en'){
    $add = '/en';
    $third = 'ru';
    $second = 'ee';
}
else{
    $add = '';
    $third = 'ru';
    $second = 'en';
}

$url_rel      = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];



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
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= Html::encode($this->title) ?></title>
    <?= Html::csrfMetaTags() ?>
    <?php $this->head() ?>
   <link rel="shortcut icon" href="../web/favicon.ico" type="image/x-icon">
   <!-- Favicons 
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">-->

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Roboto:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Work+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
   <?php if($url_rel == 'https://www.spbestonia.ee/' || $url_rel == 'https://www.spbestonia.ee/site/index' || $url_rel == 'https://www.spbestonia.ee/ee' || $url_rel == 'https://www.spbestonia.ee/en' || $url_rel == 'https://spbestonia.ee/'): ?>
       <link rel="canonical" href="https://www.spbestonia.ee/">
   <?php endif;?>
</head>
<body>
   <?php $this->beginBody() ?>

  

        <div class="modal-menu"></div>
        
        
         <main role="main" id="main">
               <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="/" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1>МУЦ СС<span></span></h1>
      </a>

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="/">Главная</a></li> <!--use class="active"-->
          <li><a href="/workingspectrue">Рабочие специальности</a></li>
          <li><a href="/professionalretraining">Профессиональная переподготовка </a></li>
          <li><a href="/training">Повышение квалификации </a></li>
          <li><a href="/contact">Контакты</a></li>
          <!--<li class="dropdown"><a href="#"><span>Dropdown</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="#">Dropdown 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                <ul>
                  <li><a href="#">Deep Dropdown 1</a></li>
                  <li><a href="#">Deep Dropdown 2</a></li>
                  <li><a href="#">Deep Dropdown 3</a></li>
                  <li><a href="#">Deep Dropdown 4</a></li>
                  <li><a href="#">Deep Dropdown 5</a></li>
                </ul>
              </li>
              <li><a href="#">Dropdown 2</a></li>
              <li><a href="#">Dropdown 3</a></li>
              <li><a href="#">Dropdown 4</a></li>
            </ul>
          </li>-->
        </ul>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
                  <?= $content ?>
              
                    <?php
                     $now = new DateTime();
                    $current_year = substr($now->format('Y-m-d H:i:s'), 0, 4);
                    ?>
    
      
      <!-- modal -->
      
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Внимание <i class="fas fa-exclamation-circle"></i></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Данный сайт находится в бете
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Продолжить</button>
      </div>
    </div>
  </div>
</div>
    
    
    <?php if($isAdmin == true): ?>
    
    <div class="modal fade" id="update-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="update-modal">Изменить</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label for="TextareaRU">RU</label>
            <textarea class="form-control" id="TextareaRU" rows="10"></textarea>
          </div>
          <div class="form-group">
            <label for="TextareaEN">EN</label>
            <textarea class="form-control" id="TextareaEN" rows="10"></textarea>
          </div>
          <div class="form-group">
            <label for="TextareaEE">EE</label>
            <textarea class="form-control" id="TextareaEE" rows="10"></textarea>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="update-button">Обновить</button>
      </div>
    </div>
  </div>
</div>
    <?php endif; ?> 
     
      <!-- modal -->
      
       </main>
    <?php $this->endBody() ?>
   
<!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="footer-content position-relative">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="footer-info">
              <h3>МУЦ "Современные стандарты"</h3>
              <p>
                115093, г. Москва. Партийный переулок,  <br>
                д.1, корп.57, стр.3<br><br>
                <strong>Телефон:</strong> +7 (495) 698-60-05<br>
                <!--<strong>Email:</strong> info@example.com<br>-->
              </p>
              <!--<div class="social-links d-flex mt-3">
                <a href="#" class="d-flex align-items-center justify-content-center"><i class="bi bi-twitter"></i></a>
                <a href="#" class="d-flex align-items-center justify-content-center"><i class="bi bi-facebook"></i></a>
                <a href="#" class="d-flex align-items-center justify-content-center"><i class="bi bi-instagram"></i></a>
                <a href="#" class="d-flex align-items-center justify-content-center"><i class="bi bi-linkedin"></i></a>
              </div>-->
            </div>
          </div><!-- End footer info column-->

          <div class="col-lg-2 col-md-3 footer-links">
            
          </div>

          <div class="col-lg-2 col-md-3 footer-links">
            
          </div>

          <div class="col-lg-1 col-md-2 footer-links">
            
          </div>

          <div class="col-lg-3 col-md-4 footer-links">
            <h4 class="text-align-d-right">Навигация</h4>
            <ul class="text-align-d-right">
              <li><a href="/">Главная</a></li>
              <li><a href="/workingspectrue">Рабочие специальности</a></li>
              <li><a href="/professionalretraining">Профессиональная переподготовка</a></li>
              <li><a href="/training">Повышение квалификации</a></li>
              <li><a href="/contact">Контакты</a></li>
            </ul>
          </div><!-- End footer links column-->

         <!-- <div class="col-lg-2 col-md-3 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><a href="#">Web Design</a></li>
              <li><a href="#">Web Development</a></li>
              <li><a href="#">Product Management</a></li>
              <li><a href="#">Marketing</a></li>
              <li><a href="#">Graphic Design</a></li>
            </ul>
          </div> End footer links column-->

          <!--<div class="col-lg-2 col-md-3 footer-links">
            <h4>Hic solutasetp</h4>
            <ul>
              <li><a href="#">Molestiae accusamus iure</a></li>
              <li><a href="#">Excepturi dignissimos</a></li>
              <li><a href="#">Suscipit distinctio</a></li>
              <li><a href="#">Dilecta</a></li>
              <li><a href="#">Sit quas consectetur</a></li>
            </ul>
          </div> End footer links column-->

          <!--<div class="col-lg-2 col-md-3 footer-links">
            <h4>Nobis illum</h4>
            <ul>
              <li><a href="#">Ipsam</a></li>
              <li><a href="#">Laudantium dolorum</a></li>
              <li><a href="#">Dinera</a></li>
              <li><a href="#">Trodelas</a></li>
              <li><a href="#">Flexo</a></li>
            </ul>
          </div> End footer links column-->

        </div>
      </div>
    </div>

    <div class="footer-legal text-center position-relative">
      <div class="container">
        <div class="copyright">
          &copy; Copyright <strong><span>МУЦ "Современные стандарты"</span></strong>. Все права защищены 2022 - <?=$current_year?>
        </div>
        <!--<div class="credits">
       
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>-->
      </div>
    </div>

  </footer>
  <!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>


</body>

</html>
<?php $this->endPage() ?>
