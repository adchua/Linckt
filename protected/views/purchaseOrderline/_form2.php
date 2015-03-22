<?php
ob_start();
include("/includes/includeDB.php");

?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'purchase-orderline-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>
    <br>
    <br>
    <br>
	<?php echo $form->errorSummary($model); ?>

	
    <form method='get'action="process_form.php">
        <?php  $sql = "SELECT * FROM products"; 
         $select = mysql_query($sql, $con);
         if($select){
        ?>
      
        <p style="float: left">Products:</p> <select name='pcode' id='pcode'><option>---</option>
		
    </form>
    
	<?php
	
		while($row = mysql_fetch_assoc($select)){ //fetch_assoc
			extract($row);
			echo "<option  value='$pcode'>" . $pcode . " " . $pname . "</option>";
			 
		}
	
	}?>	
    </select>
        <br>
        <br>
        <p style="float: left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Unit:</p>
	<select name='unit'>
	<option>---</option>
	<option value='cans'>Can</option>
        <option value='pails'>Pail</option>
	<option value='drums'>Drum</option></select>
        <br>
        <br>
        <p style="float: left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Qty:</p> 
        <input type=number name='qty'/>
        <br><br>
	<input type=submit name='order' value='Add Order'/>
	</form>
</div>
	

<?php $this->endWidget(); ?>

