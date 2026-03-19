<?php

include_once('../include/database.php');

if(!empty($_POST['menu_id']))
  {
	
	$get_job_category=mysqli_query($con,"select * from job_category where menu_id='".$_POST['menu_id']."' ");
			
?>
	
	<option value="">Select Sub Category</option>
<?php 
	foreach($get_job_category as $job_category_row) {
?>		<option value="<?php echo $job_category_row['id']; ?>"> <?php echo $job_category_row['job_name']; ?> </option>

	<?php 
	}
}

?>





