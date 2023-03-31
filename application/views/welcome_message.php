<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<body>
	<h1>Dropdown filtering </h1>
	<hr>
	<div class="mb-3">
		<label class="form-label" for="">Select Item</label>
		<select class="form-select form-select mb-3" 
			aria-label=".form-select-lg example" name="item" id="item">
			<option selected="" disabled="" >--Select--</option>
				<?php
					$i=0;				
					foreach($items as $row){

						foreach($filter as $r){
							if($row->item_id == $r->item_id){
								$i++;
							}
						}
						if($i==0){
							echo '<option value="'.$row->item_id.'">'.$row->item_name.'</option>';
						}
						$i=0;
					}



		

				?>
		</select>   
		
		<h2>here</h2>

		<form method="POST" action="<?= base_url() ?>main/test_lib">
			<div class="mb-3">
				<label for="exampleInputEmail1" class="form-label">Name</label>
				<input type="text" class="form-control"
					name="name" id="exampleInputEmail1" aria-describedby="emailHelp">
			</div>
			<div class="mb-3">
				<label for="exampleInputPassword1" class="form-label">Age </label>
				<input type="text" class="form-control" 
					name="age"id="exampleInputPassword1">
			</div>
			<button type="submit" name="submit" class="btn btn-primary">Submit</button>
		</form>


		
		<?php
		
		// $first_array = array(1, 2, 3, 4, 5);
		// $second_array = array(3, 4, 5, 6, 7);
		
		// $value_to_check = 3;
		
		// if (in_array($value_to_check, $first_array) && in_array($value_to_check, $second_array)) {
		//   // Do something if the value is present in both arrays
		//   echo "$value_to_check is present in both arrays";
		// } else {
		//   // Do something else if the value is not present in both arrays
		//   echo "$value_to_check is not present in both arrays";
		// }
		
		?>
	</div>

	<h1>month year date</h1>
	<?php 
	  date_default_timezone_set('Asia/Kolkata'); 
	  $date = date('Y-m-d H:i:s');
	  $dur = 12;
		$weed_date = date('Y-m-d', strtotime($date. ' + '.$dur.' year'));

		echo $weed_date;
	?>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>