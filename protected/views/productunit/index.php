<?php
/* @var $this ProductunitController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Productunits',
);

$this->menu=array(
	array('label'=>'Create Productunit', 'url'=>array('create')),
	array('label'=>'Manage Productunit', 'url'=>array('admin')),
);
?>

<h1>Productunits</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
