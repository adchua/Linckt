<?php
/* @var $this ProductsController */
/* @var $model Products */

$this->breadcrumbs=array(
	'Products'=>array('index'),
	$model->pcode=>array('view','id'=>$model->pcode),
	'Update',
);
if(Yii::app()->user->type==="Admin" || Yii::app()->user->type==="Regular"  ){
$this->menu=array(
	array('label'=>'List Products', 'url'=>array('index')),
	array('label'=>'Create Products', 'url'=>array('create')),
	array('label'=>'View Products', 'url'=>array('view', 'id'=>$model->pcode)),
	
);
}else{
    $this->menu=array(
	array('label'=>'List Products', 'url'=>array('index')),
	array('label'=>'Create Products', 'url'=>array('create')),
	array('label'=>'View Products', 'url'=>array('view', 'id'=>$model->pcode)),
        );
}
?>

<h1>Update Products <?php echo $model->pcode; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>