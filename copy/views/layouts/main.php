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



/*if (($cookie = $cookies->get('lang')) == null) {
   $lang = 'ru';
}
else{
    $lang = $cookie->value;
}*/

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


if($lang == 'ee'){
    $add = '/ee';
    $second = 'ru';
    $third = 'en';
}
elseif($lang == 'en'){
    $add = '/en';
    $second = 'ru';
    $third = 'ee';
}
else{
    $add = '';
    $second = 'en';
    $third = 'ee';
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
<html lang="<?= $lang ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= Html::encode($this->title) ?></title>
    <?= Html::csrfMetaTags() ?>
    <?php $this->head() ?>
   <link rel="shortcut icon" href="../web/favicon.ico" type="image/x-icon">
   <meta name="google-site-verification" content="ffAI3PNLelOrfOyFO2K25CT7wL8FBGxRU_0wnNC5kZo" />
   <?php if($url_rel == 'https://www.spbestonia.ee/' || $url_rel == 'https://www.spbestonia.ee/site/index' || $url_rel == 'https://www.spbestonia.ee/ee' || $url_rel == 'https://www.spbestonia.ee/en' || $url_rel == 'https://spbestonia.ee/'): ?>
       <link rel="canonical" href="https://www.spbestonia.ee/">
   <?php endif;?>
</head>
<body>
   <?php $this->beginBody() ?>

    <nav class="navbar navbar-expand-md fixed-top navbar-dark bg-accent-2">
     <!--<div class="mobile-collapse">-->
          <a class="navbar-brand" href="#"><img src="/web/img/logo/SPB_crime.png" alt="" style="width:25px;"></a>
          <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
            <span class="navbar-toggler-icon"></span>
          </button>
    <!--</div>-->
      <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
                       <?php if($lang == 'ru'): ?>
	                       <?= Html::a($main,'/', ['class' => 'nav-link']) ?>
	                   <?php else: ?>
	                       <?= Html::a($main, $add, ['class' => 'nav-link']) ?>
	                   <?php endif;?>
	                </li>
          <li class="nav-item active">
            <?= Html::a($service,'/site/service'.$add, ['class' => 'nav-link']) ?>
          </li>
          <li class="nav-item active">
            <?= Html::a($patern,'/site/partners'.$add, ['class' => 'nav-link']) ?>
          </li>
          <li class="nav-item active">
            <?= Html::a($team,'/site/team'.$add, ['class' => 'nav-link']) ?>
          </li>
          <li class="nav-item active">
            <?= Html::a($contact,'/site/contact'.$add, ['class' => 'nav-link']) ?>
          </li>
         <!-- <li class="nav-item active">
        <div class="box">
          <select onchange="location = this.value;">
            <option selected><?=$lang?></option>
            <?php if($second == 'ru'): ?>
                <option value="/"><?=$second?></option>
            <?php else: ?>
                <option value="/<?=$second?>"><?=$second?></option>
            <?php endif;?>
            
            <option value="/<?=$third?>"><?=$third?></option>
          </select>
        </div>
          </li>-->
          <!--<li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Settings</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>-->
        </ul>
        <li class="nav-link dropdown mr-md-5 pr-md-5">
            <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?=$lang?> <i class="fas fa-flag"></i></a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <?php if($second == 'ru'): ?>
                <a class="dropdown-item" href="/" ><?=$second?></a>
            <?php else: ?>
                <a class="dropdown-item" href="/<?=$second?>" ><?=$second?></a>
            <?php endif;?>

            <a class="dropdown-item" href="/<?=$third?>" ><?=$third?></a>
            </div>
          </li>
        <?php if($isAdmin == true): ?>
         <a href="/site/logexit" class="nav-link">
    <button class="btn btn-outline-warning form-inline pull-xs-righ" type="submit" style="border-radius: 50em;">Выйти<i class="fa fa-sign-out ml-2" aria-hidden="true"></i></button>
    </a>
     <?php endif; ?>
      </div>
    </nav>

        <div class="modal-menu"></div>
        
        
         <main role="main">
             
                  <?= $content ?>
              <section class="pre-footer-corporate bg-accent-2">
        <div class="container">
          <div class="row justify-content-sm-center justify-content-lg-start row-30 row-md-60">
            <div class="col-sm-10 col-md-6 col-lg-10 col-xl-3">
              <h6>О нас</h6>
              <p>Юридическая компания SPB ESTONIA Õigusbüroo  была создана в 2016 году и за время своей деятельности приобрела репутацию квалифицированной консалтинговой компании среди эстонских и зарубежных клиентов, партнеров, коллег. </p>
            </div>
            <div class="col-sm-10 col-md-6 col-lg-3 col-xl-3">
              <h6>Наши услуги</h6>
              <ul class="list-xxs list-primary">
                <li><a href="#">Гражданское право</a></li>
                <li><a href="#">Уголовное право</a></li>
                <li><a href="#">Административное право</a></li>
                <li><a href="#">Трудовые споры</a></li>
                <li><a href="#">Юридическим лицам</a></li>
              </ul>
            </div>
            <div class="col-sm-10 col-md-6 col-lg-5 col-xl-3">
              <h6>Наши патнеры</h6>
              <ul class="list-xs">
                <li>
                  <!-- Comment minimal-->
                  <article class="comment-minimal">
          
                    <p class="comment-minimal__link"><a href="http://www.owescon.ru/">ООО Юридическая компания "Ост-Вест Консалтинг"</a></p>
                    <p class="comment-minimal__link"><a href="https://erial.ee/private">Hoiu-laenuühistu ERIAL</a></p>
                    <p class="comment-minimal__link"><a href="https://cindx.io">Cindx</a></p>
                  </article>
                </li>
               <!-- <li>
         
                  <article class="comment-minimal">
 
                    <p class="comment-minimal__link"><a href="standard-post.html">МК-Эстония</a></p>
                  </article>
                </li>-->

              </ul>
            </div>
            <div class="col-sm-10 col-md-6 col-lg-4 col-xl-3">
              <h6>Контакты</h6>
              <ul class="list-xs">
                <li>
                  <dl class="list-terms-minimal">
                    <dt>Адрес</dt>
                    <dd>Erika 14, Tallinn 10416</dd>
                  </dl>
                </li>
                <li>
                  <dl class="list-terms-minimal">
                    <dt>Телефон</dt>
                    <dd>
                      <ul class="list-semicolon">
                        <li><a href="callto:#">+372 581 888 92</a></li>
                      </ul>
                    </dd>
                  </dl>
                </li>
                <li>
                  <dl class="list-terms-minimal">
                    <dt>E-mail</dt>
                    <dd>
                        <a href="mailto:info@spbestonia.ee">
                            info@spbestonia.ee
                        </a>
                    </dd>
                  </dl>
                </li>
                <li>
                  <dl class="list-terms-minimal">
                    <dt>Мы открыты</dt>
                    <dd>Пон-пят: 10-18</dd>
                  </dl>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </section>
                    <?php
                     $now = new DateTime();
                    $current_year = substr($now->format('Y-m-d H:i:s'), 0, 4);
                    ?>
      <footer class="footer-corporate bg-secondary-1">
        <div class="container">
          <div class="footer-corporate__inner"><a class="brand" href="/"><img src="/web/img/logo/SPB_crime.png" alt="" style="width:40px;"></a>
            <p class="rights"><span><?=$current_year?></span><span>&copy;&nbsp;</span><span class="copyright-year"></span><span>.&nbsp;All rights reserved.</span></p>
            <ul class="list-inline-xxs">
              <li><a class="icon icon-xxs icon-primary" href="#"><i class="fab fa-facebook-f"> </i></a></li>
              <li><a class="icon icon-xxs icon-primary" href="#"><i class="fab fa-whatsapp"> </i></a></li>
              <li><a class="icon icon-xxs icon-primary" href="#"><i class="fab fa-instagram"> </i></a></li>
            </ul>
          </div>
        </div>
      </footer>
      
      
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
   

  
</body>
</html>
<?php $this->endPage() ?>
