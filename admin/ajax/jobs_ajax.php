<?php

include_once('../include/database.php');

if(!empty($_POST['job_cat_id']))
  {
	
	$get_job_subcategory=mysqli_query($con,"select * from job_sub_category where job_cat_id='".$_POST['job_cat_id']."' ");
			
?>
	
	<option value="">Select Jobs</option>
<?php 
	foreach($get_job_subcategory as $job_subcategory_row) {
?>		<option value="<?php echo $job_subcategory_row['id']; ?>"> <?php echo $job_subcategory_row['job_name']; ?> </option>

	<?php 
	}
}

?>





