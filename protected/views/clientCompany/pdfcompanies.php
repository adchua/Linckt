<?php
/* @var $this ConfirmationController */
/* @var $model Confirmation */

$this->breadcrumbs=array(
	'Confirmations'=>array('index'),
       // 'Conf Godparents'=>array('index'),
	$model->id,
   
);

$this->menu=array(
	array('label'=>'Generate Report', 'url'=>array('pdf', 'id'=>$model->id)),
 
);
?>


<br>
<?php //$this->widget('zii.widgets.CDetailView', array(
//	'data'=>$model,
//	'attributes'=>array(
//		'id',
//		'companyname',
//		'companyaddress',
//		'companytype',
//           
//	),
//)); ?>



   <?php $criteria=new CDbCriteria (); 
    $criteria->alias = 'Users';
            $criteria->join='INNER JOIN Client_Company ON  Users.company_id = Client_Company.id ';
            $criteria->order = 'Client_Company.companyname ASC';
   ?>
        <?php $en3= Users::model()->findAll($criteria);?>



<br> 


<center> 
    <h1>Companies</h1>
    <table border="1">
        <tr> <th>Company Name</th>
             <th>Company Address</th>
             <th>Company Type</th>
             <th>Users</th>
        </tr>
        <tr>
            <td>
                <?php foreach ($en3 as $com) {  ?>
                <div style="font-size:12px;color:#000000;font-family:Times New Roman; text-align:right;">
				<?php echo $com->company->companyname ; ?> 
			</div> 
                <?php }?>
            </td>
            <td>
                <?php foreach ($en3 as $com) {  ?>
                <div style="font-size:12px;color:#000000;font-family:Times New Roman; text-align:right;">
				<?php echo $com->company->companyaddress ; ?> 
			</div> 
                <?php }?>
            </td>
            <td>
                <?php foreach ($en3 as $com) {  ?>
                <div style="font-size:12px;color:#000000;font-family:Times New Roman; text-align:right;">
				<?php echo $com->company->companytype ; ?>

			</div> 
                <?php }?>
            </td>
            
            <td>
                <?php foreach ($en3 as $com) {  ?>
                <div style="font-size:12px;color:#000000;font-family:Times New Roman; text-align:right;">
				<?php echo $com->FullName ; ?>

			</div> 
                <?php }?>
            </td>
        </tr>
        
        
    </table>
    
    
</center>

<br>