<?php

// view private job ajax
include_once("../include/database.php");

if(isset($_POST['readrecord'])) 
{
?>   
   
   <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Heading</th>
				  <th>Job Link</th>
				  <th>Comp Name</th>
                  <th>Designation</th>
				  <th>Education</th>
				  <th>Location</th>
				  <th>Last Date</th>				  
				  <th>Action</th>
                </tr>
                </thead>
                <tbody>
               <?php 
			   $i=1;
			$query=mysqli_query($con,"select * from private_job order by id ASC");			   
			while($row=mysqli_fetch_array($query))
			{
			   ?>
			   <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $row['heading']; ?> </td>
				  <td><?php echo $row['job_link']; ?> </td>
				  <td><?php echo $row['comp_name']; ?></td>
				  <td><?php echo $row['designation']; ?></td>
				  <td><?php echo $row['education']; ?></td>
				  <td><?php echo $row['location']; ?></td>
				  <td><?php echo $row['last_date']; ?> </td>
				  <td>
				  <a href="edit_private_job.php?id=<?php echo $row['id']; ?>" class="btn"><i class="fa fa-edit fa-2x" aria-hidden="true"></i></a> | 
				  <a href="?id=<?php echo $row['id']; ?>" class="btn"><i class="fa fa-trash fa-2x" aria-hidden="true"></i></a>
				  </td>
                </tr>
			<?php $i++; }  ?>
                
                </tbody>
            
              </table>
<?php  }  ?>			  
			  