
      

      
      
       <section class="section-lg bg-default text-center mt-5">
        <div class="container">
          <h3 class="heading-decorated">Наша команда</h3>
          <div class="row row-50">
           
           <?php foreach($team as $post): ?>
           <div class="col-md-6 col-xl-4">
              <!-- Thumb corporate-->
              <div class="thumb thumb-corporate">
                <?=$post['img']?>
                <div class="thumb-corporate__caption">
                  <p class="thumb__title"><a href="#"><?=$post['Name_'.$lang]?></a></p>
                  <p class="thumb__subtitle"><?=$post['type_'.$lang]?></p>
                  <p><?=$post['about_'.$lang]?></p>
                  <ul class="list-inline-sm thumb-corporate__list">
                    <li><a class="icon icon-sm" href="#" style="color:#cca776;"><i class="fab fa-facebook-f"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
           <?php endforeach; ?>
           
           
            <div class="col-md-6 col-xl-4">
              <!-- Thumb corporate-->
              <div class="thumb thumb-corporate">
                <img class="rounded-circle img-main" src="/web/img/team/Sofia-Pevzer.jpg" alt="Generic placeholder image" style="object-position: 50% 30%;">
                <div class="thumb-corporate__caption">
                  <p class="thumb__title"><a href="team-member-profile.html">Софья Певзнер </a></p>
                  <p class="thumb__subtitle">Юрист</p>
                  <p>Закончила в 2016 году Таллиннский Педагогический Университет, магистр права. Профессиональную деятельность начала с 2011 года. Специализация - коммерческое и корпоративное право, договорное право, защита персональных данных, гражданское право, AML, ИТ право. Рабочие языки: русский, эстонский, английский</p>
                  <ul class="list-inline-sm thumb-corporate__list">
                    <li><a class="icon icon-sm" href="#" style="color:#cca776;"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a class="icon icon-sm" href="#" style="color:#cca776;"><i class="fas fa-phone"></i></a></li>
                    <li><a class="icon icon-sm" href="#" style="color:#cca776;"><i class="fab fa-whatsapp"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
           
           
            <div class="col-md-6 col-xl-4">
              <!-- Thumb corporate-->
              <div class="thumb thumb-corporate">
                <img class="rounded-circle img-main" src="/web/img/team/Julie-Anderson.jpg" alt="Generic placeholder image" style="object-position: 50% 10%;">
                <div class="thumb-corporate__caption">
                  <p class="thumb__title"><a href="team-member-profile.html">Юлия Андерсон</a></p>
                  <p class="thumb__subtitle">Юрист</p>
                  <p>Закончила в 2006 году Таллиннский Коммерческий Колледж, факультет права. Прошла стажировку в University of Notre Dame, США, диплом с отличием. В 2018 году закончила Таллиннский Технический Университет по специальности юриспруденция.  Профессиональная деятельность начиная с 2006 года. Специализация: семейное право, коммерческое право, трудовое право, гражданское право, дела по проступкам. Рабочие языки: русский, эстонский, английский</p>
                  <ul class="list-inline-sm thumb-corporate__list">
                    <li><a class="icon icon-sm" href="#" style="color:#cca776;"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a class="icon icon-sm" href="#" style="color:#cca776;"><i class="fas fa-phone"></i></a></li>
                    <li><a class="icon icon-sm" href="#" style="color:#cca776;"><i class="fab fa-whatsapp"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-xl-4">
              <!-- Thumb corporate-->
              <div class="thumb thumb-corporate">
               <img class="rounded-circle img-main" src="/web/img/team/Jelena-Karzetskaja.jpg" alt="Generic placeholder image" style="object-position: 50% 5%;">
                <div class="thumb-corporate__caption">
                  <p class="thumb__title"><a href="team-member-profile.html">Елена Каржецкая</a></p>
                  <p class="thumb__subtitle">Юрист</p>
                  <p>Закончила в 1997 году Международный университет социальных наук “LEX”, факультете права. В 2003 году закончила Московский Государственный Социальный Университет по специальности юриспруденция. Магистр права. В 2009 закончила магистратуру Академия Норд. Профессиональная деятельность начиная с 1997 года. Специализация: международное право, административное право, гражданское право, трудовое право. Прочие навыки: бухгалтерский учет, таможенное декларирование. Рабочие языки: русский, эстонский, английский</p>
                  <ul class="list-inline-sm thumb-corporate__list">
                    <li><a class="icon icon-sm" href="#" style="color:#cca776;"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a class="icon icon-sm" href="#" style="color:#cca776;"><i class="fas fa-phone"></i></a></li>
                    <li><a class="icon icon-sm" href="#" style="color:#cca776;"><i class="fab fa-whatsapp"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
           
          </div>
        </div>
      </section>

