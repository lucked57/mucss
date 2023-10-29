<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;


?>
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('/web/assets/img/pageimg.jpg');">
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

        <h2><?= Html::encode($this->title) ?></h2>
        <ol>
          <li><a href="/">Home</a></li>
          <li><?= nl2br(Html::encode($message)) ?></li>
        </ol>

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <h1>Запрашиваемая страница не найдена</h1>
        

        

      </div>
    </section><!-- End Contact Section -->
