<?php

include 'include/connection.php';
include 'include/function.php';
include 'header_data.php';

if (isset($_POST['submit'])) {
	
    $username=get_safe_value($conn,$_POST['username']);
    $process=get_safe_value($conn,$_POST['name']);
    $description=get_safe_value($conn,$_POST['description']);
                    
    $post_query="INSERT INTO `process_update` (`id`, `name`, `description`, `created_by`, `status`, `created_at`, `updated_at`)
     VALUES (NULL, '$process', '$description', '$username', '0', current_timestamp(), current_timestamp())";
    if (mysqli_query($conn,$post_query)) {
                    echo '<script>';
                    echo 'alert("Process Cretaed Sucessfully");';
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
                                            <input type="text" name="name"  class="form-control span6" required>
										</div>
										<div class="row-fluid">
                                            <label for="">Process Description</label>
											<textarea class="span12" rows="50" id="editor" name="description" required></textarea>
										</div>
										<div class="clearfix">

											
											<br>

											<input type="submit" name="submit" class="btn btn-primary pull-right" value="Upload Process">
											
										
											
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