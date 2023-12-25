<?php

include 'include/connection.php';
include 'header_data.php';

?>



				<div class="span9">
					<div class="content">



						<div class="module">
							<div class="module-head">
								<h3>Enso Post</h3>
							</div>
							<div class="module-body">

								<!-- News Feed post start  -->

								<div class="stream-composer media">
									<div class="media-body">

										<form method="post" action="news_feed.php" enctype="multipart/form-data">
										<div class="row-fluid">
                                            <input type="hidden" name="username" value="<?php echo $username; ?>">
											<textarea class="span12" rows="50" id="editor" name="post" required></textarea>
										</div>
										<div class="clearfix">

											
											<br>

											<input type="submit" name="submit" class="btn btn-primary pull-right" value="Upload Post">
											
										
											
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