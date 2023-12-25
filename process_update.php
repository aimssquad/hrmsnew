<?php

include 'include/connection.php';
include 'include/function.php';
include 'header_data.php';
$id = $_GET['id'];
$row = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `process_update` WHERE `id`=$id"));



if (isset($_POST['submit'])) {
	
    $username=get_safe_value($conn,$_POST['username']);
    $process=get_safe_value($conn,$_POST['name']);
    $description=get_safe_value($conn,$_POST['description']);

    $post_query="UPDATE `process_update` SET `name` = '$process', `description` = '$description', `created_by` = '$username', `updated_at` = current_timestamp() WHERE `process_update`.`id` = $id";

    if (mysqli_query($conn,$post_query)) {
                    echo '<script>';
                    echo 'alert("Process Updated Sucessfully");';
                    echo 'window.location.href = "process.php";';
                    echo '</script>';
        }else{
                    echo '<script>';
                    echo 'alert("Something went wrong !");';
                    echo 'History.back();';
                    echo '</script>';
        }
    
    
    }
    
    

?>



				<div class="span9">
					<div class="content">



						<div class="module">
							<div class="module-head">
								<h3>Process Update</h3>
							</div>
							<div class="module-body">

								<!-- News Feed post start  -->

								<div class="stream-composer media">
									<div class="media-body">

										<form method="post" enctype="multipart/form-data">
                                        <div class="row-fluid">
                                            <label for="">Process</label>
                                            <input type="hidden" name="username" value="<?php echo $username; ?>">
                                            <input type="text" name="name"  class="form-control span6" value="<?php echo $row['name']; ?>" required>
										</div>
										<div class="row-fluid">
                                            <label for="">Process Description</label>
											<textarea class="span12" rows="50" id="editor" name="description" required><?php echo $row['description']; ?></textarea>
										</div>
										<div class="clearfix">

											
											<br>

											<input type="submit" name="submit" class="btn btn-primary pull-right" value="Update Process">
											
										
											
										</div>
										</form>
									</div>
								</div>


							</div><!--/.module-body-->
						</div><!--/.module-->
						
					</div><!--/.content-->
				</div><!--/.span9-->
	<?php
 include 'footer.php';
?>

<script>
    var editor = CKEDITOR.replace('editor');
    //var editor = CKEDITOR.replace( 'ckfinder' );
    CKFinder.setupCKEditor( editor );

</script>