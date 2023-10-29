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
            <div class="card card-custom card-classic">
              <div class="card-custom-heading" id="accordionHeading1" role="tab">
                <h5 class="card-custom-title"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#accordionCollapse1" aria-controls="accordionCollapse1" aria-expanded="false" style="content: f106">
                Семейное право
                </a>
                </h5>
              </div>
              <div class="card-custom-collapse collapse show" id="accordionCollapse1" role="tabpanel" aria-labelledby="accordionHeading1" style=""><!-- AddClass 'show'-->
                <div class="card-custom-body">
                  <p>Юристы SPB Estonia имеют многолетний опыт и колоссальное количество удачно разрешенных семейных споров, связанных со взысканием алиментов, расторжением брака, разделом совместного имущества и комплексными вопросами связанными с попечением за детьми.
                  Наше бюро предлагает помощь в решении следующих задач:
                  </p>
                  <ul class="text-justify ml-5 ul-service">
                      <li><p>Консультирование по вопросам семейного права</p></li>
                      <li><p>Составление проектов и анализ действующих брачных договоров</p></li>
                      <li><p>Представительство интересов клиентов по делам, связанным с взысканием содержания (алименты)</p></li>
                      <li><p>Представительство интересов клиентов по делам, связанным с расторжением брака и разделом совместного брачного имущества</p></li>
                      <li><p>Представительство интересов клиентов по делам, связанным с установлением порядка общения с ребенком и/или прекращением совместного попечения над несовершеннолетними</p></li>
                      <li><p>Представительство интересов клиентов по делам, связанным с наследственным имуществом</p></li>
                      <li><p>Представительство интересов клиентов по делам, связанным с установлением опеки</p></li>
                      <li><p>Представительство интересов клиентов по делам, связанным с установлением происхождения и оспариванием записи в актах гражданского состояния (ЗАГС)</p></li>
                      <li><p>Оформление судебных документов необходимых для заключения брака с иностранцем (разрешение суда на заключение брака).</p></li>
                  </ul>









                </div>
              </div>
            </div>
            <!-- Bootstrap card-->
            <div class="card card-custom card-classic">
              <div class="card-custom-heading" id="accordionHeading2" role="tab">
                <h5 class="card-custom-title"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#accordionCollapse2" aria-controls="accordionCollapse2" aria-expanded="false">Коммерческое право</a>
                </h5>
              </div>
              <div class="card-custom-collapse collapse show" id="accordionCollapse2" role="tabpanel" aria-labelledby="accordionHeading2" style="">
                <div class="card-custom-body">
                  <p>Отрасль частного права, регулирующая деятельность в сфере торгового оборота, в том числе учреждение коммерческих предприятий и управление ими, порядок проведения собраний, продажу акций и паев, объединение и разделение,  а также прочие действия в коммерческом регистре.
Наше бюро может помочь Вам в решении следующих задач:</p>
               <ul class="text-justify ml-5 ul-service">
                   <li><p>Консультирование и комплексное решение вопросов, связанных с коммерческим правом, коммерческим регистром</p></li>
                   <li><p>Учреждение коммерческих и некоммерческих организаций, филиалов</p></li>
                   <li><p>Изменение структуры существующей компании</p></li>
                   <li><p>Разрешение споров между собственниками</p></li>
                   <li><p>Изменение состава правления</p></li>
                   <li><p>Представительство интересов клиентов во внесудебном и судебном производстве</p></li>
                   <li><p>Предоставление услуги контактного лица и адреса регистрации для предприятия руководители которого не являются резидентами Эстонии.</p></li>
               </ul>
                </div>
              </div>
            </div>
            <!-- Bootstrap card-->
            <div class="card card-custom card-classic">
              <div class="card-custom-heading" id="accordionHeading3" role="tab">
                <h5 class="card-custom-title"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#accordionCollapse3" aria-controls="accordionCollapse3" aria-expanded="false">Трудовое право</a>
                </h5>
              </div>
              <div class="card-custom-collapse collapse show" id="accordionCollapse3" role="tabpanel" aria-labelledby="accordionHeading3">
                <div class="card-custom-body">
                  <p>Для успешного развития бизнеса вопросы трудовой занятости должны приносить как можно меньше проблем. Вы можете положиться на нашу команду экспертов по трудовому праву как в нестандартных ситуациях, так и в повседневных трудовых вопросах
Наше бюро может помочь в решении следующих задач:
 </p>
 <ul class="text-justify ml-5 ul-service">
     <li><p>Консультирование по вопросам трудового права</p></li>
     <li><p>Составление трудовых договоров и контрактов с руководителями различного уровня сложности, а также прочих документов, регламентирующих трудовые отношения: внутренний трудовой распорядок, служебные инструкции, договора о материальной ответственности, соглашения о запрете на конкуренцию и обязательства о неразглашении; защита персональных данных сотрудников</p></li>
     <li><p>Анализ заключенных трудовых договоров и отстаивание интересов Клиента с учетом всех предоставленных документов путем использования способов правовой защиты, установленных трудовым законодательством Эстонии</p></li>
     <li><p>Представительство интересов работника или работодателя при разрешении конфликтных ситуаций, исходящих из трудовых отношений на переговорах, в трудовой инспекции или в суде</p></li>
     <li><p>Оспаривание решения трудовой комиссии</p></li>
     <li><p>Вопросы дискриминации и корпоративного сообщения о неправомерных действиях</p></li>
     <li><p>Реорганизация и перевод сотрудников</p></li>
     <li><p>Коллективные и индивидуальные увольнения.</p></li>
 </ul>
                </div>
              </div>
            </div>
            <!-- Bootstrap card-->
            <div class="card card-custom card-classic">
              <div class="card-custom-heading" id="accordionHeading4" role="tab">
                <h5 class="card-custom-title"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#accordionCollapse4" aria-controls="accordionCollapse4" aria-expanded="false">Миграционное право</a>
                </h5>
              </div>
              <div class="card-custom-collapse collapse show" id="accordionCollapse4" role="tabpanel" aria-labelledby="accordionHeading4">
                <div class="card-custom-body">
                  <p>Юристы нашего бюро имею многолетний опыт работы в отрасли миграционного законодательства. Наше бюро может помочь Вам в решении следующих задач:  </p>
                  
                 <ul class="text-justify ml-5 ul-service">
                     <li><p>Легализация пребывания в Эстонии</p></li>
                     <li><p>Ходатайство о предоставлении вида на жительство и его продление</p></li>
                     <li><p>Регистрация краткосрочной работы в Эстонии</p></li>
                     <li><p>Вопросы гражданства Эстонии</p></li>
                     <li><p>Представительство интересов клиентов во внесудебном и судебном производстве.</p></li>
                 </ul>
<p>Юристы нашего бюро не могут повлиять на решение Департамента полиции и пограничной охраны по поданному Вами ходатайству. Но мы можем гарантировать высокое качество работы и подготовленных документов, индивидуальный подход к поиску решения, что позволяет добиться позитивного результата на пути достижения поставленной цели.</p>

                </div>
              </div>
            </div>
            <!-- Bootstrap card-->
            <div class="card card-custom card-classic">
              <div class="card-custom-heading" id="accordionHeading5" role="tab">
                <h5 class="card-custom-title"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#accordionCollapse5" aria-controls="accordionCollapse5" aria-expanded="false">Административное право</a>
                </h5>
              </div>
              <div class="card-custom-collapse collapse show" id="accordionCollapse5" role="tabpanel" aria-labelledby="accordionHeading5">
                <div class="card-custom-body">
                  <p>Отрасль права, представляющая собой совокупность правовых норм, предназначенных регулировать общественные отношения с органами исполнительной власти, а также отношения внутриорганизационного характера на предприятиях, в учреждениях, организациях. Наше бюро может помочь Вам в решении следующих задач:</p>
                  <ul class="text-justify ml-5 ul-service">
                     <li><p>Консультирование в области административно-процессуальных отношений;</p></li>
                     <li><p>Возмещение ущерба причиненного в результате ДТП;</p></li>
                     <li><p>Представление интересов в правоотношениях или спорах с органами государственной и муниципальной власти;</p></li>
                     <li><p>Обжалование решения: проверка срока подачи жалобы, анализ документов и законодательства, определение обоснованности жалобы и ее составление;</p></li>
                     <li><p>Взыскания материального и морального ущерба.</p></li>
                 </ul>
                </div>
              </div>
            </div>
            <!-- Bootstrap card-->
            <div class="card card-custom card-classic">
              <div class="card-custom-heading" id="accordionHeading6" role="tab">
                <h5 class="card-custom-title"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#accordionCollapse6" aria-controls="accordionCollapse6" aria-expanded="false">Договорное право</a>
                </h5>
              </div>
              <div class="card-custom-collapse collapse show" id="accordionCollapse6" role="tabpanel" aria-labelledby="accordionHeading6">
                <div class="card-custom-body">
                  <p>Эта отрасль юриспруденции сопровождает при заключении сделок, трудоустройстве, взаимодействии с банками, аренде жилья и пр. Любой бизнес, основанный на профессионализме, прибыльности и грамотности, подразумевает серьёзное отношение к подписанию разного рода договоров и его просто невозможно себе представить без использования договорного права. От качества составленный документов зависит уровень рисков и перспективность положительного разрешения возможных споров. <br>
                  Наши специалисты готовы помочь в создании и анализе договоров любого уровня сложности и также пакета документов, позволяющих регулировать взаимоотношений, как внутри компании, так и внешние коммерческие отношения. <br>
                 Наше бюро предлагает помощь в решении следующих задач:
               </p>
               <ul class="text-justify ml-5 ul-service">
     <li><p>Консультирование по вопросам договорного права</p></li>
     <li><p>Составление проектов договоров различного уровня сложности</p></li>
     <li><p>Анализ договоров</p></li>
     <li><p>Анализ вопросов международного права и международной подсудности</p></li>
     <li><p>Составление претензий и исковых заявлений по требованиям, вытекающим из договорных отношений</p></li>
     <li><p>Представление интересов Клиента в досудебном и судебном производстве.</p></li>
 </ul>
                </div>
              </div>
            </div>
            
            <div class="card card-custom card-classic">
              <div class="card-custom-heading" id="accordionHeading7" role="tab">
                <h5 class="card-custom-title"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#accordionCollapse7" aria-controls="accordionCollapse7" aria-expanded="false">Строительное право</a>
                </h5>
              </div>
              <div class="card-custom-collapse collapse show" id="accordionCollapse7" role="tabpanel" aria-labelledby="accordionHeading7">
                <div class="card-custom-body">
                  <p>По отраслям права ставим: семейное право, коммерческое право, трудовое право, миграционной право, административное право, договор право, договорной право, строительное право, квартирные товарищества, примирительное производство, дела о поступках, переводы, легализация и апостиль документов, AML, KYC, DPO, Crypto</p>
                </div>
              </div>
            </div>
            
          
          
            <div class="card card-custom card-classic">
              <div class="card-custom-heading" id="accordionHeading9" role="tab">
                <h5 class="card-custom-title"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#accordionCollapse9" aria-controls="accordionCollapse9" aria-expanded="false"> Примирительное производство</a>
                </h5>
              </div>
              <div class="card-custom-collapse collapse show" id="accordionCollapse9" role="tabpanel" aria-labelledby="accordionHeading9">
                <div class="card-custom-body">
                  <p>Примирительное производство – это один из видов альтернативного урегулирования споров, добровольный процесс в ходе которого независимое лицо (примиритель) обеспечивает общение между сторонами с целью помочь найти решение спорных вопросов. Оно предлагает сторонам, имеющим разногласия, хорошую возможность достижения соглашения во внесудебном порядке. Роль посредника (примирителя) сводится к ведению процедуры, предотвращая возможные споры, а также оформлению промежуточных документов и протоколов, необходимых для подготовки соглашения о примирении. <br>
Наше бюро предлагает помощь в решении следующих задач:</p>
                <ul class="text-justify ml-5 ul-service">
     <li><p>Консультирование по вопросам примирительного производства</p></li>
     <li><p>Ведение процедуры примирительного производства, предотвращение возможных споры</p></li>
     <li><p>Организация и ведение переговоров</p></li>
     <li><p>Оформлению промежуточных документов и протоколов, необходимых для подготовки соглашения о примирении</p></li>
     <li><p>Оформление соглашения о примирении</p></li>
     <li><p>Признание соглашения исполнительным документом.</p></li>
 </ul>
                </div>
              </div>
            </div>
            
            <div class="card card-custom card-classic">
              <div class="card-custom-heading" id="accordionHeading10" role="tab">
                <h5 class="card-custom-title"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#accordionCollapse10" aria-controls="accordionCollapse10" aria-expanded="false">Дела о проступках</a>
                </h5>
              </div>
              <div class="card-custom-collapse collapse show" id="accordionCollapse10" role="tabpanel" aria-labelledby="accordionHeading10">
                <div class="card-custom-body">
                  <p>Это виновные деяния, описанные в Деликто-процессуальном кодексе ЭР. Типичными проступками являются различные нарушения порядка (напр., нарушение правил дорожного движения, создание пожарной опасности на природе, нарушение общественного порядка), нарушения, связанные с налогами и таможней (напр., сокрытие обязанности по уплате налогов, выплата зарплаты в конверте, незаконная доставка сигарет и торговля ими), нарушения, связанные с окружающей средой (напр., незаконное складирование отходов, загрязнение окружающей среды и т.д.).
                    Наше бюро предлагает помощь в решении следующих задач:
                    </p>
                      <ul class="text-justify ml-5 ul-service">
                         <li><p>Консультации по вопросам, связанным с производством по делам о проступках;</p></li>
                         <li><p>Составление жалоб и оспаривание решений о наказаниях, вынесенных административными органами во внесудебном порядке;</p></li>
                         <li><p>Защита интересов клиента во время делопроизводства о проступке на стадии внесудебного производства и в судах первой инстанции.</p></li>
                     </ul>
                </div>
              </div>
            </div>
            
          
            
            <div class="card card-custom card-classic">
              <div class="card-custom-heading" id="accordionHeading12" role="tab">
                <h5 class="card-custom-title"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#accordionCollapse12" aria-controls="accordionCollapse12" aria-expanded="false">Легализация и апостиль документов</a>
                </h5>
              </div>
              <div class="card-custom-collapse collapse show" id="accordionCollapse12" role="tabpanel" aria-labelledby="accordionHeading12">
                <div class="card-custom-body">
                  <p>По отраслям права ставим: семейное право, коммерческое право, трудовое право, миграционной право, административное право, договор право, договорной право, строительное право, квартирные товарищества, примирительное производство, дела о поступках, переводы, легализация и апостиль документов, AML, KYC, DPO, Crypto</p>
                </div>
              </div>
            </div>
            
            <div class="card card-custom card-classic">
              <div class="card-custom-heading" id="accordionHeading15" role="tab">
                <h5 class="card-custom-title"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#accordionCollapse15" aria-controls="accordionCollapse15" aria-expanded="false">AML, KYC, DPO, Crypto</a>
                </h5>
              </div>
              <div class="card-custom-collapse collapse show" id="accordionCollapse15" role="tabpanel" aria-labelledby="accordionHeading15">
                <div class="card-custom-body">
                  <p>По отраслям права ставим: семейное право, коммерческое право, трудовое право, миграционной право, административное право, договор право, договорной право, строительное право, квартирные товарищества, примирительное производство, дела о поступках, переводы, легализация и апостиль документов, AML, KYC, DPO, Crypto</p>
                </div>
              </div>
            </div>
            
            
          </div>
        </div>
      </section>


