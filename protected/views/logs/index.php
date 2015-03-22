<?php
/* @var $this LogsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Logs',
);

$this->menu=array(
	
);
?>

<h1>Logs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
