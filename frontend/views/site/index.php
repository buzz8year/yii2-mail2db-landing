<?php echo $this->context->renderPartial('_form_consult') ?>

<?php echo $this->context->renderPartial('_form_partner') ?>

<?php echo $this->context->renderPartial('_form_text') ?>

<nav id="menu">
    <div id="menuContent">      
        <div style="height:10px;"></div>
        <button class="btn btn-primary4 btn-menu-close menuToggle"><i class="fa fa-times"></i></button>
        <div style="clear:both;"></div> 
        <div style="height:20px;"></div>

        <ul class="box-menu1">
            <li><a href="#advantages"><?= Yii::t('app', 'Преимущества') ?></a></li>
            <li><a href="#hardware"><?= Yii::t('app', 'Оборудование') ?></a></li>
            <li><a href="#guarantee"><?= Yii::t('app', 'Гарантии') ?></a></li>
            <li><a href="#services"><?= Yii::t('app', 'Услуги') ?></a></li>
            <li><a href="#cases"><?= Yii::t('app', 'Кейсы') ?></a></li>
            <li><a href="#сontacts"><?= Yii::t('app', 'Контакты') ?></a></li>
        </ul>  
        
        <a class="btn-lang1 navbar-lang <?= Yii::$app->language != 'en-US' ?: 'hidden' ?>" data-lang="en-US">EN</a> 
        <a class="btn-lang1 navbar-lang <?= Yii::$app->language != 'ru-RU' ?: 'hidden' ?>" data-lang="ru-RU">RU</a> 
        <div style="height:30px;"></div>
    </div>      
</nav>

<div class="block1" id="block1">    
    <div class="container-fluid container-fluid1">
    
        <div class="block1-h50"></div>
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-7 col-xs-9">
                <a class="logo" href="/"><img src="images/logo.png"></a>
            </div>

            <div class="col-lg-9 col-md-8 hidden-sm hidden-xs">

                <div class="menu">
                    <ul>
                        <li><a href="#advantages"><?= Yii::t('app', 'Преимущества') ?></a></li> 
                        <li><a href="#hardware"><?= Yii::t('app', 'Оборудование') ?></a></li>   
                        <li><a href="#guarantee"><?= Yii::t('app', 'Гарантии') ?></a></li>   
                        <li><a href="#services"><?= Yii::t('app', 'Услуги') ?></a></li> 
                        <li><a href="#cases"><?= Yii::t('app', 'Кейсы') ?></a></li>  
                        <li><a href="#сontacts"><?= Yii::t('app', 'Контакты') ?></a></li>   
                    </ul>
                </div>
                
                <a class="btn-lang navbar-lang <?= Yii::$app->language != 'en-US' ?: 'hidden' ?>" data-lang="en-US">EN</a> 
                <a class="btn-lang navbar-lang <?= Yii::$app->language != 'ru-RU' ?: 'hidden' ?>" data-lang="ru-RU">RU</a>     
            </div>
            
            <div class="hidden-lg hidden-md col-sm-3 hidden-xs">
                <a class="btn-lang navbar-lang <?= Yii::$app->language != 'en-US' ?: 'hidden' ?>" data-lang="en-US">EN</a> 
                <a class="btn-lang navbar-lang <?= Yii::$app->language != 'ru-RU' ?: 'hidden' ?>" data-lang="ru-RU">RU</a>             
            </div>
            
            <div class="hidden-lg hidden-md col-sm-2 col-xs-3">
                
                <div class="menu-mobile menuToggle"><i class="fa fa-bars"></i></div>    
                                
            </div>
            
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-10 col-sm-12 col-xs-12">
            
                <div class="block1-label1">Your Company Name</div>
                <div class="block1-label2">Some text to wrap head around what your business is and why you effective.</div>
                <div class="block1-btn">
                    <!-- <button class="btn1 btn btn-primary1 btn-right popupbutton1" href="#popupform_text1">Подробнее</button> -->
                    <button class="btn2 btn btn-primary2 popupbutton1" href="#popupform1"><?= Yii::t('app', 'Получить консультацию') ?></button>
                </div>
                
            </div>
        </div>
    </div>
</div>

<div class="block2" id="block2">    
    <div class="container-fluid container-fluid1">
        <div class="block2-h80"></div>
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                
                <div class="block2-label1"><?= Yii::t('app', 'О проекте') ?></div>
                <div class="block2-label2">Some text to wrap head around what your business is and why you effective.</div>
                
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                <div class="block2-btn">    
                    <button class="btn3 btn btn-primary3 popupbutton1" href="#popupform1"><?= Yii::t('app', 'Получить консультацию') ?></button>
                </div>  
            </div>
        </div>
        <div class="block2-h80"></div>
    </div>
</div>


<div class="container-fluid container-fluid1" id="advantages">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">   
            <div class="block4-label1"><?= Yii::t('app', 'Наши преимущества') ?></div>
        </div>
    </div>
</div>

<div class="block4">

    <span class="orbit"></span>

    <div class="block4-txt block4-txt1"><?= Yii::t('app', 'Опыт успешной деятельности в IT сфере с 2017 года и долгосрочные налаженные контакты с партнерами') ?></div>
    <div class="block4-txt block4-txt2"><?= Yii::t('app', 'Мы круглосуточно осуществляем мониторинг всех текущих процессов') ?></div>
    <div class="block4-txt block4-txt3"><?= Yii::t('app', 'Прямые поставки оборудования без  посредников по оптовым ценам') ?></div>
    <div class="block4-txt block4-txt4"><?= Yii::t('app', 'Высококлассная IT команда – гарантия надежности рабочих процессов') ?></div>
    <div class="block4-txt block4-txt5"><?= Yii::t('app', 'Собственные разработки и IT-решения') ?></div>
    <div class="block4-txt block4-txt6"><?= Yii::t('app', 'Партнеры со всего мира') ?></div>
    <div class="block4-txt block4-txt7"><?= Yii::t('app', 'Оптимальная локация дата-центра в регионах с холодным  климатом, чтобы обеспечить идеальную температуру помещений для хостинга и минимизировать расходы на электроэнергию за счет естественного охлаждения оборудования') ?></div>
</div>

<div class="block5" id="cases">
    <div class="container-fluid container-fluid1">
        
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">           
                <div class="block5-label1">Some text to wrap head around what your business is and why you effective.</div>         
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">           
                <div class="block5-label2">Some text to wrap head around what your business is and why you effective.</div>           
            </div>
        </div>
        <div style="height:90px;"></div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">         
                <a href="https://www.youtube.com/watch?v=bAyrObl7TYE" class="btn-video popupbutton1">
                    <div class="btn-video-play"><img src="images/play.png"></div>
                </a>            
            </div>      
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">         
                <div class="block5-label3">Some text to wrap head around what your business is and why you effective.</div>          
            </div>
        </div>  
    </div>
</div>

<div class="block6" id="hardware">
    <div class="container-fluid container-fluid1">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"> 
                <div class="block6-label1">Some text to wrap head around what your business is and why you effective.</div> 
                <div class="block6-label2">Some text to wrap head around what your business is and why you effective.</div> 
                <div class="block6-label3">Some text to wrap head around what your business is and why you effective.</div>    
                <div class="block6-label4">Some text to wrap head around what your business is and why you effective.</div>
                <div class="block6-btn" style="margin-bottom: 60px">
                    <button class="btn4 btn btn-primary2 popupbutton1" href="#popupform1"><?= Yii::t('app', 'Получить консультацию') ?></button>
                </div>              
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: 110px"> 
                
                <div class="owl-carousel owl-carousel2">    

                    <div class="box-tovar">
                        <div class="box-tovar-wr">

                            <div class="box-tovar-img" style="height: 450px; margin-top: 90px">
                                <img src="images/server.svg">
                            </div>

                            <!-- <div class="box-tovar-label1 hidden">Product A</div>
                            <div class="box-tovar-label2 hidden">Some text to wrap head around what your business is and why you effective.</div> -->
                        
                        </div>
                    </div>

                </div>
                
            </div>
        </div>
    </div>
    <div style="height:40px;"></div>
</div>

<div class="block7" id="services">
    <div class="container-fluid container-fluid1">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="logo1"><img src="images/logo1.png"></div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="block7-label1">Your Company Name</div>
            <div class="block7-label2">Some text to wrap head around what your business is and why you effective.</div>
            <div style="clear:both;"></div>
        </div>      
    </div>
    </div>
</div>

<div class="block8">
    <div class="container-fluid container-fluid1">
    <div class="row">
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
            <div class="block8-label1">Service A</div>
            <div class="block8-label2">Some text to wrap head around what your business is and why you effective.</div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
            
            <div class="box-part1">
                <div class="box-circle1 box-circle">
                    <div class="box-circle1-wr">
                        <div class="box-circle1-label1">Some text to wrap head around what your business is and why you effective.</div>                   
                    </div>
                </div>
                <div style="clear:both;"></div>             
            </div>
            
            <div class="box-part2">
                <div class="box-circle2 box-circle">
                    <div class="box-circle2-wr">
                        <div class="box-circle2-label1">Some text to wrap head around what your business is and why you effective.</div>                  
                    </div>
                </div>
                <div style="clear:both;"></div>                 
            </div>
            
            <div style="clear:both;"></div>
            
            <div class="box-centr">
                <div class="box-centr1">
                    <!-- <img src="images/circle.png"> -->
                    <img src="images/pie2.svg" style="width: 370px">
                </div>
            </div>
            
            <div style="clear:both;"></div>
            
            <div class="box-part1">
                <div class="box-circle3 box-circle">
                    <div class="box-circle3-wr">
                        <div class="box-circle3-label1">Service B</div>                   
                    </div>
                </div>
                <div style="clear:both;"></div>             
            </div>
            
            <div class="box-part2">
                <div class="box-circle4 box-circle">
                    <div class="box-circle4-wr">
                        <div class="box-circle4-label1">Service C</div>                   
                    </div>
                </div>
                <div style="clear:both;"></div>                 
            </div>
            
            <div style="clear:both;"></div>         
            
            
        </div>      
    </div>
    </div>
</div>

<div class="block9" id="guarantee">
    <div class="container-fluid container-fluid1">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="block9-label1">Guarantee</div>
            <div class="block9-label2">Something and some othe stuff</div>
        </div>
    </div>
    <div class="row">

        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">      
            <div class="box-plus">
                <div class="box-plus-img1 box-plus-img"></div>
                <div class="box-plus-label">Advantage B</div>
            </div>      
        </div>
            
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">  
            <div class="box-plus">
                <div class="box-plus-img2 box-plus-img"></div>
                <div class="box-plus-label">Advantage H</div>
            </div>      
        </div>      
        
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">  
            <div class="box-plus">
                <div class="box-plus-img3 box-plus-img"></div>
                <div class="box-plus-label">Advantage Q</div>
            </div>      
        </div>
        
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">      
            <div class="box-plus">
                <div class="box-plus-img4 box-plus-img"></div>
                <div class="box-plus-label">Advantage P</div>
            </div>      
        </div>
            
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">  
            <div class="box-plus">
                <div class="box-plus-img5 box-plus-img"></div>
                <div class="box-plus-label">Advantage W</div>
            </div>      
        </div>      
        
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">  
            <div class="box-plus">
                <div class="box-plus-img6 box-plus-img"></div>
                <div class="box-plus-label">Advantage Y</div>
            </div>      
        </div>
    
    </div>
    </div>
</div>


<div class="block12" id="block12">
    <div class="container-fluid container-fluid1">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            
            <div class="box-forma">
                <div class="box-forma-wr">
                    <div class="row">
                        
                        <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12">
                        
                            <div class="box-forma-label1">Have a question?</div>    
                            <div class="box-forma-label2">Please, leave us your message and contacts, so we could get back to you.</div>   
                                
                            <div class="box-forma1">
                                <div class="box-start1 start1">    
                                    <div class="inp1 "><input type="text" class="inppole required" value=""  name="consult-name" placeholder="Name"/></div>
                                    <div class="inp1 "><input type="text" class="inppole required" value=""  name="consult-phone" placeholder="Email"/></div>
                                    <div class="inp2 "><textarea name="consult-body" class="inppole required" placeholder="Your message..."></textarea></div>
                                    <div class="inp3"><?= Yii::t('app', 'Нажимая кнопку «Отправить», я даю свое согласие на обработку моих персональных данных, в соответствии с Федеральным законом от 27.07.2006 года №152-ФЗ «О персональных данных», на условиях и для целей, определенных в Согласии на обработку персональных данных *') ?></div>
                                    
                                    <button class="btn btn-primary5 post-consult">Send</button>
                                    
                                </div>
                                <div class="box-end1 end1">
                                    <div>Thank you! We got your message.</div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-1 hidden-md hidden-sm hidden-xs"></div>
                        
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            
                            <a class="box-map" href="#">                            
                                <div class="box-map-bg"></div>
                                <img class="box-map-img" src="images/map.png" />
                                <img class="box-plus-img box-map-link" src="images/link.png" />                         
                            </a>
                            
                        </div>
                        
                    </div>
                </div>
            </div>
            
        </div>
    </div>  
    </div>  
</div>  

<div class="block13" id="сontacts">
    <div class="container-fluid container-fluid2">
        <div class="row">

      
            
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            
                <div class="box-contacts">
                    <img class="box-plus-img" src="images/c2.png">
                    <div class="box-contacts1">
                        <div class="box-contacts-label1">Email:</div>
                        <div class="box-contacts-label2" style="font-size: 23px">yourcompany@gmail.com</div>                    
                    </div>
                    <div style="clear:both;"></div>
                </div>
                
            </div>


 

            
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            
                <div class="box-contacts box-contacts-end">
                    <img class="box-plus-img" src="images/c3.png">
                    <div class="box-contacts1">
                        <div class="box-contacts-label1">Phone:</div>
                        <div class="box-contacts-label2" style="font-size: 23px">+999 555 555 555</div>                  
                    </div>
                    <div style="clear:both;"></div>
                </div>
                
            </div>        


            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            
                <div class="box-contacts">
                    <img class="box-plus-img" src="images/c1.png">
                    <div class="box-contacts1">
                        <div class="box-contacts-label1">Legal Address:</div>
                        <div class="box-contacts-label2" style="font-size: 23px">Build. A2, Smith Avenue, New York, USA</div>                   
                    </div>
                    <div style="clear:both;"></div>
                </div>
                
            </div>     
            
        </div>
    </div>
</div>

