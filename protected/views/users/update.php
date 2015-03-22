<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);
 if(Yii::app()->user->type==="Admin"){
   
$this->menu=array(
	array('label'=>'List Users', 'url'=>array('index')),
	array('label'=>'Create Users', 'url'=>array('create')),
	array('label'=>'View Users', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Users', 'url'=>array('admin')),
);
 }else{
     
 }
?>

<h1>Update Users <?php echo $model->FullName; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model )); ?>