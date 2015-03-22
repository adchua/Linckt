<?php
/* @var $this ClientCompanyController */
/* @var $model ClientCompany */

$this->breadcrumbs=array(
	'Client Companies'=>array('index'),
	'Create',
);


$this->menu=array(
        array('label'=>'Skip', 'url'=>array('users/create')),
);
?>

<h1>Create Client Company</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>