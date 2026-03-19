<?php

//view jobs ajax
include_once('../include/database.php');

if(isset($_POST['readrecord'])) 
	{
?>
 <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Job Id</th>
                  <th>notification prev</th>
				  <th>Qualification</th>
				  <th>Eligible</th>
				  <th>Link1</th>
				  <th>Link2</th>
				  <th>Image</th>
				 
				   <th>Last Date</th>
				  <th>Date</th>
                  <th>Time</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
               <?php 
			   $i=1;
			   
			if(empty($job_category_id)  )
			{
			$jobs_query=mysqli_query($con,"select * from jobs order by id ASC");
			}
		else	{		
			$jobs_query=mysqli_query($con,"select * from jobs where job_cat_id ='".$job_category_id."' order by id ASC");	
		}			
			while($row=mysqli_fetch_array($jobs_query))
			{

			   ?>
			   <tr>
                  <td><?php echo $i; ?></td>
				  <td><?php echo $row['id']; ?></td>
				  <td><?php echo $row['notification_prev']; ?></td>
				  <td><?php echo $row['qualification']; ?></td>
				  <td><?php echo $row['eligible']; ?></td>
				  <td><?php echo $row['link1']; ?></td>
				  <td><?php echo $row['link2']; ?></td>
				  
				  <td>
				 <?php 
				 if(empty($row['image']))
				 { ?>
				<img src="../gallery/images/jobs_images/non-image.jpg" height="50">
				<?php  }  else  {  ?>
				 <img src="../gallery/images/jobs_images/<?php echo $row['image']; ?>" height="50"> 
				 <?php } ?>
				  </td>
				  
				  <td><?php echo $row['last_date']; ?></td> 
				  <td><?php echo $row['date']; ?> </td>
				  <td><?php echo $row['time']; ?> </td>
				  <td>
				  <a href="edit_jobs.php?id=<?php echo $row['id']; ?>" class="btn"><i class="fa fa-edit fa-2x" aria-hidden="true"></i></a> | 
				  <a href="?id=<?php echo $row['id']; ?>" class="btn"><i class="fa fa-trash fa-2x" aria-hidden="true"></i></a>
				  </td>
                </tr>
			<?php $i++; }  ?>
                
                </tbody>
            
              </table>

<?php  }  ?>

