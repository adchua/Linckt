<?php
/* @var $this ProductsController */
/* @var $model Products */

$this->breadcrumbs=array(
	'Products'=>array('index'),
	$model->pcode,
);
if(Yii::app()->user->type==="Admin" || Yii::app()->user->type==="Regular"){
   
$this->menu=array(
	array('label'=>'List Products', 'url'=>array('index')),
	array('label'=>'Update Products', 'url'=>array('update', 'id'=>$model->pcode)),
	array('label'=>'Delete Products', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->pcode),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Products', 'url'=>array('admin')),
    array('label'=>'Create Linckt Products', 'url'=>array('lincktProducts/create')),

    
);
}else{
    $this->menu=array(  
        array('label'=>'List Products', 'url'=>array('index')),
	array('label'=>'Update Products', 'url'=>array('update', 'id'=>$model->pcode)),
	array('label'=>'Delete Products', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->pcode),'confirm'=>'Are you sure you want to delete this item?')),
        array('label'=>'Create Unit', 'url'=>array('productunit/create')),
        );
}

?>

<h1>View Products #<?php echo $model->pcode; ?></h1>


<?php $en= Users::model()->findAll('id = :a', array(':a'=>$model->supplier_id));?>
<?php if (count($en) !== 0){?>
<br>

<h4>Product Information </h4>
<?php foreach ($en as $row) { ?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'pcode',
		'pname',
		'pcategory',
		'pdescription',
		//'supplier_id',
            array('label'=>'Supplier', 'value'=>$row->FullName),
             array(
		                'name'=>'Product Picture',
		                'type'=>'raw',
		                'value'=>html_entity_decode(CHtml::image(Yii::app()->controller->createUrl('products/loadImage', array('id'=>$model->pcode))
                                ,'alt'
                                ,array('width'=>500)
                                )),
		                ),
	),
));}} ?>


<?php if(Yii::app()->user->type==="Client" ){ ?>

    <?php $en= LincktProducts::model()->findAll('products_pcode = :a', array(':a'=>$model->pcode));?>
<?php if (count($en) !== 0){?>
<br>

<h4>Product Price </h4>
<?php foreach ($en as $row) { 
     
    
    $this->widget('zii.widgets.CDetailView', array(
	'data'=>$row,
	'attributes'=>array(
		array('label'=>'Productunit', 'value'=>$row->productunit->productunit),
                'linckt_unitprice',
		
	),
));
    
    
}} ?>
<?php } else if(Yii::app()->user->type==="Admin" || Yii::app()->user->type==="Regular" ){ ?>

<?php $en= Productunit::model()->findAll('pcode = :a', array(':a'=>$model->pcode));?>
<?php if (count($en) !== 0){?>
<br>

<h4>Supplier Price </h4>
<?php foreach ($en as $row) { 
     echo CHtml::link('<img src="' . Yii::app()->request->baseUrl . '/images/update.png" align="right"/>', 
array('productunit/update', 'id'=>$row->id)); 

 echo CHtml::link('<img src="' . Yii::app()->request->baseUrl . '/images/delete.png" align="right"/>',
	'#', array('submit'=>array('productunit/delete','id'=>$row->id),'confirm' => 'Are you sure you want to delete?'));

    
    
    $this->widget('zii.widgets.CDetailView', array(
	'data'=>$row,
	'attributes'=>array(
		'productunit',
		'productunitprice',
		
	),
));
    
    
}}


 $en= LincktProducts::model()->findAll('products_pcode = :a', array(':a'=>$model->pcode));?>
<?php if (count($en) !== 0){?>
<br>

<h3>Linckt Price</h3>
<?php foreach ($en as $row) { 
     echo CHtml::link('<img src="' . Yii::app()->request->baseUrl . '/images/update.png" align="right"/>', 
array('lincktProducts/update', 'id'=>$row->id)); 

 echo CHtml::link('<img src="' . Yii::app()->request->baseUrl . '/images/delete.png" align="right"/>',
	'#', array('submit'=>array('lincktProducts/delete','id'=>$row->id),'confirm' => 'Are you sure you want to delete?'));

    
    $this->widget('zii.widgets.CDetailView', array(
	'data'=>$row,
	'attributes'=>array(
		array('label'=>'Productunit', 'value'=>$row->productunit->productunit),
                'linckt_unitprice',
		
	),
));
    
    
}}



} else if(Yii::app()->user->type==="Supplier" ){ ?>

<?php $en= Productunit::model()->findAll('pcode = :a', array(':a'=>$model->pcode));?>
<?php if (count($en) !== 0){?>
<br>

<h4>Supplier Price </h4>
<?php foreach ($en as $row) { 
     echo CHtml::link('<img src="' . Yii::app()->request->baseUrl . '/images/update.png" align="right"/>', 
array('productunit/update', 'id'=>$row->id)); 

 echo CHtml::link('<img src="' . Yii::app()->request->baseUrl . '/images/delete.png" align="right"/>',
	'#', array('submit'=>array('productunit/delete','id'=>$row->id),'confirm' => 'Are you sure you want to delete?'));

    
    
    $this->widget('zii.widgets.CDetailView', array(
	'data'=>$row,
	'attributes'=>array(
		'productunit',
		'productunitprice',
		
	),
));
}}
}?>
<br>


