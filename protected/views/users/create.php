<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Create',
);


?>

<h1>Create Contact Person</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>