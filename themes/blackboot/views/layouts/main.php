<?php
	Yii::app()->clientscript
		// use it when you need it!
		/*
		->registerCssFile( Yii::app()->theme->baseUrl . '/css/bootstrap.css' )
		->registerCssFile( Yii::app()->theme->baseUrl . '/css/bootstrap-responsive.css' )
		->registerCoreScript( 'jquery' )
		->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-transition.js', CClientScript::POS_END )
		->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-alert.js', CClientScript::POS_END )
		->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-modal.js', CClientScript::POS_END )
		->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-dropdown.js', CClientScript::POS_END )
		->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-scrollspy.js', CClientScript::POS_END )
		->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-tab.js', CClientScript::POS_END )
		->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-tooltip.js', CClientScript::POS_END )
		->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-popover.js', CClientScript::POS_END )
		->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-button.js', CClientScript::POS_END )
		->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-collapse.js', CClientScript::POS_END )
		->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-carousel.js', CClientScript::POS_END )
		->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-typeahead.js', CClientScript::POS_END )
		*/
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo CHtml::encode($this->pageTitle); ?></title>
<meta name="language" content="en" />
<!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<!-- Le styles -->
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap-responsive.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css" />
<!-- Le fav and touch icons -->
</head>

<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="#"><?php echo Yii::app()->name ?></a>
				<div class="nav-collapse">
					<?php $this->widget('zii.widgets.CMenu',array(
						'htmlOptions' => array( 'class' => 'nav' ),
						'activeCssClass'	=> 'active',
						'items'=>array(
							array('label'=>'Home', 'url'=>array('/site/index')),
							array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
							array('label'=>'Contact', 'url'=>array('/site/contact')),
							array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
							array('label'=>'Logout ('.Yii::app()->user->name.')', 'id', 'FullName', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
                                                        
						),
					)); ?>
					
				</div><!--/.nav-collapse -->
                                
                               
			</div>
                    <?php if(Yii::app()->user->isGuest){?>
                    
                         <?php }else if(Yii::app()->user->type==="Admin" ||Yii::app()->user->type==="Regular" ) {?>
                                    <div class="nav-collapse">
					<?php $this->widget('zii.widgets.CMenu',array(
						'htmlOptions' => array( 'class' => 'nav' ),
						'activeCssClass'	=> 'active',
						'items'=>array(
							 array('label'=>'Users', 'url'=>array('/users/Admin'),'visible'=>!Yii::app()->user->isGuest),
							array('label'=>'Companies', 'url'=>array('/clientCompany/index'),'visible'=>!Yii::app()->user->isGuest),
							array('label'=>'Supplier Products', 'url'=>array('/products/index'),'visible'=>!Yii::app()->user->isGuest),
                                                      //  array('label'=>'My Products', 'url'=>array('/lincktProducts/index'),'visible'=>!Yii::app()->user->isGuest),
                                                        array('label'=>'Order', 'url'=>array('/purchaseOrder/index'),'visible'=>!Yii::app()->user->isGuest),
                                                        array('label'=>'Delivery', 'url'=>array('/deliveryTransaction/index'),'visible'=>!Yii::app()->user->isGuest),
                                                         array('label'=>'Sales', 'url'=>array('/salesInvoice/index'),'visible'=>!Yii::app()->user->isGuest),
                                                     array('label'=>'Payment', 'url'=>array('/paymentReceipt/index'),'visible'=>!Yii::app()->user->isGuest),
							array('label'=>'Logs', 'url'=>array('/logs/index'),'visible'=>!Yii::app()->user->isGuest),
						),
					)); ?>
					
				</div><!--/.nav-collapse -->
                                
                                
                                
                         <?php }else if(Yii::app()->user->type==="Supplier") { ?>
                                <div class="nav-collapse">
					<?php $this->widget('zii.widgets.CMenu',array(
						'htmlOptions' => array( 'class' => 'nav' ),
						'activeCssClass'	=> 'active',
						'items'=>array(
							 array('label'=>'My Profile', 'url'=>array('/users/view','id'=>Yii::app()->user->id),'visible'=>!Yii::app()->user->isGuest),
							array('label'=>'My Products', 'url'=>array('/products/index'),'visible'=>!Yii::app()->user->isGuest),
							array('label'=>'My Orders', 'url'=>array('/purchaseOrder/index'),'visible'=>!Yii::app()->user->isGuest),
                                                      
						),
					)); ?>
					
				</div><!--/.nav-collapse -->
                            
                         <?php }else if(Yii::app()->user->type==="Client") { ?>
                               <div class="nav-collapse">
					<?php $this->widget('zii.widgets.CMenu',array(
						'htmlOptions' => array( 'class' => 'nav' ),
						'activeCssClass'	=> 'active',
						'items'=>array(
							 array('label'=>'My Profile', 'url'=>array('/users/view','id'=>Yii::app()->user->id),'visible'=>!Yii::app()->user->isGuest),
							 array('label'=>'Products', 'url'=>array('/products/index'),'visible'=>!Yii::app()->user->isGuest),
                                                       array('label'=>'My Orders', 'url'=>array('/purchaseOrder/create'),'visible'=>!Yii::app()->user->isGuest),
                                                     array('label'=>'Delivery', 'url'=>array('/deliveryTransaction/index'),'visible'=>!Yii::app()->user->isGuest),
                                                        array('label'=>'Payment', 'url'=>array('/paymentReceipt/index'),'visible'=>!Yii::app()->user->isGuest),
                                                        
							
						),
					)); ?>
					
				</div><!--/.nav-collapse -->
                    
                    
                         <?php } ?>
                    
		</div>
	</div>
	
	<div class="cont">
	<div class="container-fluid">
	  <?php if(isset($this->breadcrumbs)):?>
			<?php $this->widget('zii.widgets.CBreadcrumbs', array(
				'links'=>$this->breadcrumbs,
				'homeLink'=>false,
				'tagName'=>'ul',
				'separator'=>'',
				'activeLinkTemplate'=>'<li><a href="{url}">{label}</a> <span class="divider">/</span></li>',
				'inactiveLinkTemplate'=>'<li><span>{label}</span></li>',
				'htmlOptions'=>array ('class'=>'breadcrumb')
			)); ?>
		<!-- breadcrumbs -->
	  <?php endif?>
	
	<?php echo $content ?>
	
	
	</div><!--/.fluid-container-->
	</div>
	
	
	
	<div class="footer">
	  <div class="container">
		<div class="row">
			<div id="footer-copyright" class="col-md-6">
				About us | Contact us | Terms & Conditions
			</div> <!-- /span6 -->
			<div id="footer-terms" class="col-md-6">
				© 2012-13 Black Bootstrap. <a href="http://nachi.me.pn" target="_blank">Nachi</a>.
			</div> <!-- /.span6 -->
		 </div> <!-- /row -->
	  </div> <!-- /container -->
	</div>
</body>
</html>
