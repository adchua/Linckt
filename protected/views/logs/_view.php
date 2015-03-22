<?php
/* @var $this LogsController */
/* @var $data Logs */
?>


<div class="posttext">

<?php
$this->beginWidget('CMarkdown', array('purifyOutput'=>true));
       echo $data->description ." by " .CHtml::link(CHtml::encode($data->emp->FullName), array('users/view', 'id'=>$data->emp_id)) ." at " .$data->dateTime; 
       $this->endWidget();?>
</div>