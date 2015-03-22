<?php
/* @var $this LincktProductsController */
/* @var $model LincktProducts */


if(Yii::app()->user->type==="Admin" ||Yii::app()->user->type==="Regular"){
$this->menu=array(
	array('label'=>'List Linckt Products', 'url'=>array('index')),
	array('label'=>'Create Linckt Products', 'url'=>array('create')),
	array('label'=>'Update Linckt Products', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Linckt Products', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
}else{
    $this->menu=array(
    array('label'=>'List Linckt Products', 'url'=>array('index')),  
        );  
}
?>

<h1>View Linckt Products #<?php echo $model->products_pcode; ?></h1>


<?php $en=  Products::model()->findAll('pcode = :a', array(':a'=>$model->products_pcode));?>
<?php if (count($en) !== 0){?>
<br>

<h4>Product Information </h4>
<?php foreach ($en as $row) { ?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$row,
	'attributes'=>array(
		
		'pname',
		'pcategory',
		'pdescription',
              array(
		                'name'=>'Product Picture',
		                'type'=>'raw',
		                'value'=>html_entity_decode(CHtml::image(Yii::app()->controller->createUrl('Products/loadImage', array('id'=>$model->productsPcode->pcode))
                                ,'alt'
                                ,array('width'=>500)
                                )),
		                ),
	
	),
));}}?>





<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		
		
		'products_pcode',
		array('label'=>'Productunit', 'value'=>$model->productunit->productunit),
                'linckt_unitprice',
	),
)); ?>
