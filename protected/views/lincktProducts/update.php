<?php
/* @var $this LincktProductsController */
/* @var $model LincktProducts */

$this->breadcrumbs=array(
	'Linckt Products'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List LincktProducts', 'url'=>array('index')),
	array('label'=>'Create LincktProducts', 'url'=>array('create')),
	array('label'=>'View LincktProducts', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage LincktProducts', 'url'=>array('admin')),
);
?>

<h1>Update LincktProducts <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>