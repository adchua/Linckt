<?php
/* @var $this ClientCompanyController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Client Companies',
);

$this->menu=array(
	array('label'=>'Create ClientCompany', 'url'=>array('create')),
      array('label'=>'Generate Report', 'url'=>array('pdfcom', 'id'=>"7" )),
      
	
);
?>

<h1>Client Companies</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
