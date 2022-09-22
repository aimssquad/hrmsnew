<?php 
include "header_data.php";
?>

<div class="span9">
	<div class="content">
		<div class="module-body">
			<form action="holidayinsert.php" method="POST" class="form-horizontal row-fluid" id="form1" enctype="multipart/form-data">
				<div class="control-group">
					<label class="control-label" for="basicinput">Holiday Type</label>
					<div class="controls">
						<select tabindex="1" data-placeholder="Select here.." class="span8" name="type">
							<option value="">Select here..</option>
							<option value="General Holiday">General Holiday</option>
							<option value="Restricted Holiday">Restricted Holiday</option>
						</select>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="basicinput">Holiday Description</label>
					<div class="controls">
						<input data-title="A tooltip for the input" type="text" placeholder="Type Description Here....." data-original-title="" name="description" class="span8">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="basicinput">Date</label>
					<div class="controls">
						<input data-title="A tooltip for the input"  type="date" name="date" placeholder="" data-original-title="" class="span6 ">
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						<button type="submit" class="btn" name="submit">Save</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<?php
 include 'footer.php';
?>










</body>