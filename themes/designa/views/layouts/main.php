<!DOCTYPE html>

<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->

<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<head>
	<meta charset="UTF-8">
	
	<!-- Remove this line if you use the .htaccess -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<meta name="viewport" content="width=device-width">
	
	<meta name="description" content="Designa Studio, a HTML5 / CSS3 template.">
	<meta name="author" content="Sylvain Lafitte, Web Designer, sylvainlafitte.com">
	
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	
	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
	<link rel="shortcut icon" type="image/png" href="favicon.png">
	
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css">
	
	<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>

<body>
<!-- Prompt IE 7 users to install Chrome Frame -->
<!--[if lt IE 8]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->

<div class="container">

	<header id="navtop">
		<a href="<?php echo Yii::app()->baseUrl; ?>" class="logo fleft">
			<img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/logo.png" alt="Designa Studio">
		</a>
		
		<nav class="fright">
				<?php $this->widget('zii.widgets.CMenu',array(
					'items'=>array
                                            (                                            
						array('label'=>Yii::app()->name, 'url'=>array('/site/index')),
						array('label'=>'Sobre nosotros', 'url'=>array('/site/page', 'view'=>'about')),
                                                array('label'=>'Contactenos', 'url'=>array('/site/contact')),
                                                array('label'=>'Mis datos','url'=>array('/datos_personales/view','id'=>  Util::getid(Yii::app()->user->name)),'visible'=>!Yii::app()->user->isGuest),
                                                
				
                                            )
                                    ))  ; ?>
		</nav>
                
	</header>


<div class="home-page main">
	<section class="grid-wrap" >
		<header class="grid one-quarter">
			<hr>
<!--                        <a href="
                            //<?php
//                        if(!Yii::app()->user->isGuest)
//                            echo Yii::app()->getBaseUrl(true).'/index.php?r=site/logout'; 
//                        else
//                            echo Yii::app()->getBaseUrl(true).'/index.php?r=site/login'; 
//                        ?>
                           " class="fright"
                        
                        
                        //<?php
//                        if(!Yii::app()->user->isGuest) {
//                            ?>
                            onmouseover="this.style.color='orange';" onmouseout="this.style.color='';"
                        ////<?php 
//                        
//                        }                            
//                        ?>
                        >
                            //<?php
//                            if(!Yii::app()->user->isGuest)
//                                echo "Logout : ".Yii::app()->user->name; 
//                            else
//                                echo "Login"; 
//                            ?>
                        </a>-->
			<?php 
//                        $this->widget('zii.widgets.CBreadcrumbs', array(
//				'links'=>$this->breadcrumbs,
//			)); 
                        ?><!-- breadcrumbs -->
		</header>
		
            
            
            

      
    <div class="my-grid-wrap">
        
	<footer class="my-grid-wrap">
		<ul class="grid col-one-half social">
                        <?php $this->widget('zii.widgets.CMenu',array(
				'items'=>array(
                                    
                                array('label'=>'Reportes','url'=>array('/reporte/index'),'visible'=>(!Yii::app()->user->isGuest)),            
                                
                                array('label'=>'Camiones','url'=>array('/camion/admin'),'visible'=>(Util::isAdmin(Yii::app()->user->name))+Util::isOperador(Yii::app()->user->name)+Util::isChofer(Yii::app()->user->name)),
                                array('label'=>'Choferes','url'=>array('/chofer/admin'),'visible'=>(Util::isAdmin(Yii::app()->user->name))+Util::isOperador(Yii::app()->user->name)),
                                array('label'=>'Empresas','url'=>array('/empresa/admin'),'visible'=>(Util::isAdmin(Yii::app()->user->name))+Util::isOperador(Yii::app()->user->name)),
                                
                                array('label'=>'Operadores','url'=>array('/operador/admin'),'visible'=>Util::isAdmin(Yii::app()->user->name)),
                                array('label'=>'Encargos','url'=>array('/encargo/admin'),'visible'=>(Util::isAdmin(Yii::app()->user->name))+Util::isOperador(Yii::app()->user->name)+Util::isChofer(Yii::app()->user->name)),
                                array('label'=>'Paquetes','url'=>array('/paquete/admin'),'visible'=>(Util::isAdmin(Yii::app()->user->name))+Util::isOperador(Yii::app()->user->name)+Util::isChofer(Yii::app()->user->name)),
                                ),
			)); ?>        
		</ul>
			
            <?php
            if(Yii::app()->user->isGuest)
            {
                ?>
		<nav class="grid col-full ">
                    <?php $this->widget('zii.widgets.CMenu',array(
                            'items'=>array(
                                array('label'=>'Productos','url'=>array('/producto/admin'),'visible'=>(Util::isAdmin(Yii::app()->user->name))+Util::isOperador(Yii::app()->user->name)+Util::isEmpresa(Yii::app()->user->name)),
                                array('label'=>'Presupuestos','url'=>array('/presupuesto/admin'),'visible'=>(Util::isAdmin(Yii::app()->user->name))+Util::isOperador(Yii::app()->user->name)+Util::isEmpresa(Yii::app()->user->name)),
                                array('label'=>'Envios','url'=>array('/envio/admin'),'visible'=>(Util::isAdmin(Yii::app()->user->name))+Util::isOperador(Yii::app()->user->name)+Util::isEmpresa(Yii::app()->user->name)),                           

                                array('label'=>'Rutas','url'=>array('/ruta/admin'),'visible'=>(!Yii::app()->user->isGuest)),
                                array('label'=>'Sedes','url'=>array('/sede/admin'),'visible'=>(!Yii::app()->user->isGuest)),
                                array('label'=>'Pagos','url'=>array('/pago/admin'),'visible'=>(Util::isAdmin(Yii::app()->user->name))+Util::isOperador(Yii::app()->user->name)+Util::isEmpresa(Yii::app()->user->name)),

                                array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                                array('label'=>'Logout : '.Yii::app()->user->name, 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
                            ),
                        )); 
                    ?>
		</nav>
            <?php }else{ ?>
            <nav class="grid col-one-half ">
                    <?php $this->widget('zii.widgets.CMenu',array(
                            'items'=>array(
                                array('label'=>'Productos','url'=>array('/producto/admin'),'visible'=>(Util::isAdmin(Yii::app()->user->name))+Util::isOperador(Yii::app()->user->name)+Util::isEmpresa(Yii::app()->user->name)),
                                array('label'=>'Presupuestos','url'=>array('/presupuesto/admin'),'visible'=>(Util::isAdmin(Yii::app()->user->name))+Util::isOperador(Yii::app()->user->name)+Util::isEmpresa(Yii::app()->user->name)),
                                array('label'=>'Envios','url'=>array('/envio/admin'),'visible'=>(Util::isAdmin(Yii::app()->user->name))+Util::isOperador(Yii::app()->user->name)+Util::isEmpresa(Yii::app()->user->name)),                           

                                array('label'=>'Rutas','url'=>array('/ruta/admin'),'visible'=>(!Yii::app()->user->isGuest)),
                                array('label'=>'Sedes','url'=>array('/sede/admin'),'visible'=>(!Yii::app()->user->isGuest)),
                                array('label'=>'Pagos','url'=>array('/pago/admin'),'visible'=>(Util::isAdmin(Yii::app()->user->name))+Util::isOperador(Yii::app()->user->name)+Util::isEmpresa(Yii::app()->user->name)),

                                array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                                array('label'=>'Logout : '.Yii::app()->user->name, 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
                            ),
                        )); 
                    ?>
		</nav>
            <?php } ?>
            
	</footer>
        
    </div>
          
            
            
            
            
            
            
            
            
            <!--<div style='margin-top: 4.5em;'>-->
            
		<div class="grid col-one-half mq2-col-full">
			<?php echo $content; ?>
		</div>
	
		 <div class="slider grid col-one-half mq2-col-full">
		   <div class="flexslider">
		     <div class="slides">
		       <div class="slide">
                            <figure>
                            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/img.jpg" alt="">
                            <figcaption>
                                    <div>
                                    <h5>Siempre para usted</h5>
                                    <p>A su servicio 24 horas, 7 días.</p>
                                    </div>
                            </figcaption>
                            </figure>
                        </div>
		           
                        <div class="slide">
                            <figure>
                                <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/img2.jpg" alt="">
                                <figcaption>
                                    <div>
                                    <h5>Un equipo competente</h5>
                                    <p>Garantiza el complimiento de su encomienda.</p>
                                    </div>
                                </figcaption>
                                </figure>
                        </div>
                        <div class="slide">
                            <figure>
                            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/img3.jpg" alt="">
                            <figcaption>
                                    <div>
                                    <h5>Transportes de todo tipo</h5>
                                    <p>Para todo tipo de producto.</p>
                                    </div>
                            </figcaption>
                            </figure>
                        </div>
		           
                        <div class="slide">
                            <figure>
                                <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/img4.jpg" alt="">
                                <figcaption>
                                    <div>
                                    <h5>Sello de calidad azul</h5>
                                    <p>Identifique los camiones de RUDO por su característico color azul.</p>
                                    </div>
                                </figcaption>
                                </figure>
                        </div>
                        <div class="slide">
                            <figure>
                            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/img5.jpg" alt="">
                            <figcaption>
                                    <div>
                                    <h5>¡A caulquier parte!</h5>
                                    <p>Los camiones de RUDO llegan a donde usted lo desea. Sin importar cuan rudo sea el camino.</p>
                                    </div>
                            </figcaption>
                            </figure>
                        </div>
		           
                        <div class="slide">
                            <figure>
                                <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/img6.jpg" alt="">
                                <figcaption>
                                    <div>
                                    <h5>Seguro y a tiempo</h5>
                                    <p>Nuestra flota de avanzada utiliza la más moderna tecnología para llegar con puntualidad a destino y garantizar que su encomienda llegara intacta.</p>
                                    </div>
                                </figcaption>
                                </figure>
                        </div>
                         
                         <div class="slide">
                            <figure>
                            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/img7.jpg" alt="">
                            <figcaption>
                                    <div>
                                    <h5>Tecnología en servicio</h5>
                                    <p>La web nos pone en contacto con usted. Nuestros camiones de última tecnología cuidan su mercancía y la transportan con la más alta eficiencia. Verificamos lo transportado y ofrecemos un servicio de pagos automatizados.<br>Nuestra intención es eliminar las molestias y salvar su tiempo.
                                        </p>
                                    </div>
                            </figcaption>
                            </figure>
                        </div>
		           
                        <div class="slide">
                            <figure>
                                <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/img8.jpg" alt="">
                                <figcaption>
                                    <div>
                                    <h5>Decídase a mejorar</h5>
                                    <p>Contrate con RUDO system y disfrute de un servicio distinguido</p>
                                    </div>
                                </figcaption>
                                </figure>
                        </div>
                         
		        </div>
		   </div>
		 </div>
            <!--</div>-->	
		 </section>
	
<!--	<section class="services grid-wrap">
		<header class="grid col-full">
			<hr>
			<p class="fleft">Services</p>
			<a href="#" class="arrow fright">see more services</a>
		</header>
		
		<article class="grid col-one-third mq3-col-full">
			<aside>01</aside>
			<h5>Web design</h5>
			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi commodo, ipsum sed pharetra gravida, orci magna rhoncus neque, id pulvinar odio lorem non turpis. Nullam sit amet enim.</p>
		</article>
		
		<article class="grid col-one-third mq3-col-full">
			<aside>02</aside>
			<h5>Web development</h5>
			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi commodo, ipsum sed pharetra gravida, orci magna rhoncus neque, id pulvinar odio lorem non turpis. Nullam sit amet enim.</p>
		</article>
		
		<article class="grid col-one-third mq3-col-full">
			<aside>03</aside>
			<h5>Graphic design</h5>
			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi commodo, ipsum sed pharetra gravida, orci magna rhoncus neque, id pulvinar odio lorem non turpis. Nullam sit amet enim.</p>
		</article>
	</section>-->

<section class="works grid-wrap">
	<header class="grid col-full">
			<hr>
			<p class="fleft">Conozca</p>
			<a href="#" class="arrow fright">y mas...</a>
		</header>
                        <figure class="grid col-one-quarter mq2-col-one-half">
                            <a href="<?php echo Yii::app()->getBaseUrl(true).'/index.php?r=ruta/admin'; ?>">
				<img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/img9.jpg" alt="">
				<span class="zoom"></span>
				</a>
				<figcaption>
					<a href="<?php echo Yii::app()->getBaseUrl(true).'/index.php?r=ruta/admin'; ?>" class="arrow">Nuestras Rutas</a>
					<p>!Vamos a donde sea!</p>
				</figcaption>
			</figure>
    
			<figure class="grid col-one-quarter mq2-col-one-half">
				<a href="<?php echo Yii::app()->getBaseUrl(true).'/index.php?r=sede/admin'; ?>">
				<img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/img10.jpg" alt="">
				<span class="zoom"></span>
				</a>
				<figcaption>
					<a href="<?php echo Yii::app()->getBaseUrl(true).'/index.php?r=sede/admin'; ?>" class="arrow">Sedes principales</a>
					<p>¿Tenemos una sede cercana de usted?</p>
				</figcaption>
			</figure>

			
		
			<figure class="grid col-one-quarter mq2-col-one-half">
				<a href="<?php echo Yii::app()->getBaseUrl(true).'/index.php?r=producto/admin'; ?>">
				<img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/img11.jpg" alt="">
				<span class="zoom"></span>
				</a>
				<figcaption>
					<a href="<?php echo Yii::app()->getBaseUrl(true).'/index.php?r=producto/admin'; ?>" class="arrow">Productos</a>
					<p>Transportamos productos de todo tipo</p>
				</figcaption>
			</figure>
		
			<figure class="grid col-one-quarter mq2-col-one-half">
				<a href="#">
				<img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/img12.jpg" alt="">
				<span class="zoom"></span>
				</a>
				<figcaption>
					<a href="#" class="arrow">Equipo de atencion al cliente</a>
					<p>Esta para servirle</p>
				</figcaption>
			</figure>
	</section>
	</div> <!--main-->

<div class="divide-top">
	<footer class="grid-wrap">
		<ul class="grid col-one-third social">
			<li><a href="#">RSS</a></li>
			<li><a href="#">Facebook</a></li>
			<li><a href="#">Twitter</a></li>
			<li><a href="#">Google+</a></li>
			<li><a href="#">Flickr</a></li>
		</ul>
	
		<div class="up grid col-one-third ">
			<a href="#navtop" title="Go back up">&uarr;</a>
		</div>
		
		<nav class="grid col-one-third ">
				<?php $this->widget('zii.widgets.CMenu',array(
					'items'=>array(
                                            
                                            
						array('label'=>Yii::app()->name, 'url'=>array('/site/index')),
						array('label'=>'Sobre nosotros', 'url'=>array('/site/page', 'view'=>'about')),
                                                array('label'=>'Contactenos', 'url'=>array('/site/contact')),
						array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
						array('label'=>'Logout', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
					
                                            
                                            ),
				)); ?>
		</nav>
	</footer>
</div>

</div>

<!-- Javascript - jQuery -->
<script src="http://code.jquery.com/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery-1.7.2.min.js"><\/script>')</script>

<!--[if (gte IE 6)&(lte IE 8)]>
<script src="js/selectivizr.js"></script>
<![endif]-->

<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.flexslider-min.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/scripts.js"></script>

<!-- Asynchronous Google Analytics snippet. Change UA-XXXXX-X to be your site's ID. -->
<script>
  var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
  (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
  g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
  s.parentNode.insertBefore(g,s)}(document,'script'));
</script>
</body>
</html>