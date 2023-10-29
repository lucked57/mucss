
<?php
 $i = 0;
 $arr_training = [];
 use app\models\Training;
 use yii\helpers\Url;
?>

  <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('/web/assets/img/pageimg.jpg');">
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
 
        <h2>Повышение квалификации</h2>
        <ol>
          <li><a href="/">Главная</a></li>
          <li>Повышение квалификации</li>
        </ol>

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Servie Cards Section ======= -->
    <section id="services-cards" class="services-cards">
      <div class="container" data-aos="fade-up">

        <div class="row gy-4">

          <div class="col-12" data-aos="zoom-in" data-aos-delay="100">
            <h3>Повышение квалификации</h3>
            <p>Список специальностей для повышения квалификации</p>
            <ul class="list-unstyled">
              
            <?php foreach($training as $post): ?>

              <?php 
              if (in_array(trim($post['Typetraining']), $arr_training)) {
                
            //var_dump($arr_training);
            }
            else{
              
              ?>
              
              <li data-bs-toggle="collapse" href="#collapseExample<?=$i?>" role="button" aria-expanded="false" aria-controls="collapseExample<?=$i?>">
                <i class="bi bi-check2"></i> <span><?=trim($post['Typetraining'])?></span>
              </li>
              <div class="collapse" id="collapseExample<?=$i?>">
              <div class="card card-body" style="border: none;"> <!-- style="border: 1px solid #feb900"-->
                <?php
         $current_type = Training::find()->asArray()->where(['Typetraining' => $post['Typetraining']])->all();
         $arr_training_current = [];
                ?>
                <?php foreach($current_type as $post_current): ?>

                  <?php 
              if (in_array(trim($post_current['Typetraining_in']), $arr_training_current)) {
                
  
            }
            else{
              ?>

                  <ul class="list-unstyled">
                    <li><i class="bi bi-check2"></i> <span>
                      <a href="<?=Url::to(['site/fulltraining', 'post_id' => $post_current['id']]);?>" class="btn btn-warning">

                    <?=$post_current['Typetraining_in']?>

                    </a>
                  </span></li>
               
             </ul>
             <?php 
             $arr_training_current[] = trim($post_current['Typetraining_in']);
            }
            ?>
               <?php endforeach; ?>
              </div>
            </div>
            <?php 

            
              $arr_training[] = trim($post['Typetraining']);
            }



            $i++?>
              <?php endforeach; ?>
            </ul>
          </div><!-- End feature item-->
<p>
 

        </div>

      </div>
    </section><!-- End Servie Cards Section -->




