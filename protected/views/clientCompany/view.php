<?php
/* @var $this ClientCompanyController */
/* @var $model ClientCompany */

$this->breadcrumbs=array(
	'Client Companies'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ClientCompany', 'url'=>array('index')),
	array('label'=>'Create ClientCompany', 'url'=>array('create')),
	array('label'=>'Update ClientCompany', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ClientCompany', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	
);
?>

<h1> <?php echo $model->companyname ; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'companyname',
		'companyaddress',
		'companytype',
           
	),
)); ?>

<br>



<?php $en= Users::model()->findAll('company_id = :a', array(':a'=>$model->id));?>
<?php if (count($en) !== 0){?>
<br>

<h4>Users </h4>
<?php foreach ($en as $row) { ?>
<?php echo CHtml::link('<img src="' . Yii::app()->request->baseUrl . '/images/update.png" align="right"/>', 
array('clientCompany/update', 'id'=>$row->id)); ?>

<?php echo CHtml::link('<img src="' . Yii::app()->request->baseUrl . '/images/delete.png" align="right"/>',
	'#', array('submit'=>array('clientCompany/delete','id'=>$row->id),'confirm' => 'Are you sure you want to delete?'));?>  


<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$row,
	'attributes'=>array(
		
		array('label'=>'Name', 'value'=>$row->FullName),
             
	),
));}}?>
