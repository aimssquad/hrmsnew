<?php

include 'include/connection.php';
include 'header_data.php';

$server_path="http://wfm.ensomerge.com/hr/post/";



?>


				<div class="span9">
					<div class="content">
						<div class="module">
							<div class="module-head">
								<h3>Enso Post</h3>


							</div>
							<div class="module-body">

								<!-- News Feed post start  -->

					

								<!-- News Feed post end  -->

                           <?php 

                                  $sql_post=mysqli_query($conn,"SELECT * FROM `news_feed` ORDER BY `id` DESC");

                                  while ($row=mysqli_fetch_assoc($sql_post)) {
                                  	// code...
                                  

                           ?>




								<div class="stream-list">
									
									<div class="media stream">
										<a href="#" class="media-avatar medium pull-left">
											<img src="images/user.png">
										</a>
										<div class="media-body">
											<div class="stream-headline">
												<h5 class="stream-author">
													<?php  echo $row['username'] ?>
													<small><?php echo $row['created_at'] ?></small>
												</h5>
												<div class="stream-text">
													<?php 

					  // echo $row['post'];
					  echo '<p><b>'.$row['subject'].'</b></p>';

                                                        $type='submit';
                                                        $id=$row['id'];

                                                       $url = "#?type=" . $type . "&id=" . $id . "&emp_id=".$emp_id;
                                                       $url_comment = "#?id=" . $id ."&emp_id=".$emp_id;

													?>
                                                </div>
                                         <?php
                
                                                $image_name=$row['image'];

                                                $image=$server_path.$image_name ;

                                                $type=$row['type'];

                                                //echo $type;

                                                if ($type==1) { ?>
                                                
                                                 <div class="stream-attachment photo">
													<div class="responsive-photo" >
													<img src="<?php echo $image; ?>" />
													</div>
												</div>
                                                	<?php 
                                                	
                                                }elseif($type==2){
                                               	?>
                                               	<div class="stream-attachment photo">
													<div class="responsive-photo" >

                                               	<video controls>
                                               	<source src="<?php echo $image; ?>" type="video/mp4">
                                               </video>
                                               </div>
												</div>
                                               	<?php
                                               }


                                                else{

                                                }

                                            		echo "<br>";

																		echo $row['post'];
                                          ?>





												
											</div><!--/.stream-headline-->

										

											<div class="stream-options">

                                        <?php 

                                              $chk_if=mysqli_query($conn,"SELECT * FROM `likes` where emp_id='$emp_id' and post_id='$id'");

                                              $num_row=mysqli_num_rows($chk_if);

                                              if ($num_row > 0) { ?>

                                          	<a href='#' class="btn btn-small btn-primary">

													<i class="icon-thumbs-up shaded" style="color:white"></i>
                                                <?php 

                                                       $like=mysqli_query($conn,"SELECT * FROM `likes` WHERE `post_id`=$id");
                                                       $like_count=mysqli_num_rows($like);

                                                 ?>
													Like(<?php echo $like_count?>)
												</a>
                                              	
                                             <?php }else{ ?>

                                             		<a href='<?php echo $url; ?>' class="btn btn-small">

													<i class="icon-thumbs-up shaded" ></i>
                                                <?php 

                                                       $like=mysqli_query($conn,"SELECT * FROM `likes` WHERE `post_id`=$id");
                                                       $like_count=mysqli_num_rows($like);

                                                 ?>
													Like(<?php echo $like_count?>)
												</a>


                                            <?php }

                                  

                                        // comments query 


                                      $comment_query=mysqli_query($conn,"SELECT comments.*,emp.emp FROM `comments`,emp WHERE comments.emp_id=emp.emp_id and comments.post_id=$id");

                                      $comment_count=mysqli_num_rows($comment_query);



                                        ?>
												


											

												<a href="<?php echo $url_comment ;?>" class="btn btn-small" id="theButton" >
													<i class="icon-retweet shaded"></i>
													Comments(<?php echo $comment_count; ?>)
												
                                                   </a>

                                               

											</div>




			


                                         	<div class="stream-respond">

                                         		<?php

                                                   while($row_comment=mysqli_fetch_assoc($comment_query)){?>

                                                   		<div class="media stream">
													<a href="#" class="media-avatar small pull-left">
														<img src="images/user.png">
													</a>
													<div class="media-body">
														<div class="stream-headline">
															<h5 class="stream-author">
																<?php echo $row_comment['emp'] ?>
																<small><?php echo $row_comment['created_at'] ?></small>
															</h5>
															<div class="stream-text">
																<?php echo $row_comment['comment'] ?>
															</div>
														</div><!--/.stream-headline-->
													</div>
												</div><!--/.media .stream-->


                                                   	<?php 
                                                   }
                                         		 ?>


											


											
											</div><!--/.stream-respond-->


											


											



										</div>
									</div><!--/.media .stream-->
								
						</div><!--/.module-->

                     <?php 

                        }
                     ?>
                     			</div><!--/.content-->
				</div><!--/.span9-->
	<?php
 include 'footer.php';
?>
