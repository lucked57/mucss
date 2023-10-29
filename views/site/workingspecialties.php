
<?php
 $i = 0;
?>

  <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('/web/assets/img/pageimg.jpg');">
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
 
        <h2>Профессиональная переподготовка</h2>
        <ol>
          <li><a href="/">Главная</a></li>
          <li>Профессиональная переподготовка</li>
        </ol>

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Servie Cards Section ======= -->
    <section id="services-cards" class="services-cards">
      <div class="container" data-aos="fade-up">

        <div class="row gy-4">

          <div class="col-12" data-aos="zoom-in" data-aos-delay="100">
            <h3>Профессиональная переподготовка</h3>
            <p>Список специальностей для профессиональной переподготовки</p>
            <ul class="list-unstyled">
              
            <?php foreach($workingspecialties as $post): ?>
              
              <li data-bs-toggle="collapse" href="#collapseExample<?=$i?>" role="button" aria-expanded="false" aria-controls="collapseExample<?=$i?>">
                <i class="bi bi-check2"></i> <span><?=$post['Name']?></span>
              </li>
              <!--<div class="collapse" id="collapseExample<?=$i?>">
              <div class="card card-body" style="border: none;">
               Текст еще не готов <?=$post['Type']?>
              </div>
            </div>-->
            <?php $i++?>
              <?php endforeach; ?>
            </ul>
          </div><!-- End feature item-->
<p>
 

        </div>

      </div>
    </section><!-- End Servie Cards Section -->




