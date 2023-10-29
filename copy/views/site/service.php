<section class="section parallax-container bg-accent-2 text-center" data-parallax-img="/web/img/cd-bg/YUrid-uslugi_1.jpg">
        <div class="parallax-content height-paralax">
          <div class="section-md text-center">
            <div class="container" style="margin-top: 250px;">
              <div class="row justify-content-md-center">
                <div class="col-md-7 col-xl-6">
                  <h1 class="heading-decorated"><?=$title?></h1>
                </div>
              </div>
              
            </div>
          </div>
        </div>
      </section>
      
      
      
      <section class="section-md bg-default">
       <div class="text-center">
                    <h3 class="heading-decorated my-5"><?=$title_s?></h3>
                </div>
        <div class="container">
          <!-- Accordion -->
          <div id="accordion" role="tablist">
            <!-- Bootstrap card-->
            <?php foreach($service as $post): ?>
            <div class="card card-custom card-classic">
              <div class="card-custom-heading" id="accordionHeading<?=$post['id']?>" role="tab">
                <h5 class="card-custom-title"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#accordionCollapse<?=$post['id']?>" aria-controls="accordionCollapse<?=$post['id']?>" aria-expanded="false" style="content: f106">
                    <?=$post['title_'.$lang]?>
                </a>
                </h5>
              </div>
              <div class="card-custom-collapse collapse show" id="accordionCollapse<?=$post['id']?>" role="tabpanel" aria-labelledby="accordionHeading<?=$post['id']?>" style=""><!-- AddClass 'show'-->
                <div class="card-custom-body">
                    <?=$post['about_'.$lang]?>
                </div>
              </div>
            </div>
            
            <?php endforeach; ?>
            
            
            
            
          </div>
        </div>
      </section>


