<?php
	if(isset($_POST['dependencies'])) {
		$json = $_POST['dependencies'];
		echo '<div class="row black">';
		echo '<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"><i class="fa fa-check-square-o"></i> Successfully uploaded .jar file</div>';
		echo '<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"><i class="fa fa-check-square-o"></i> Successfully extracted metrics</div>';
		$data = json_encode($json);
		$name = basename($_REQUEST['jsname'],'.jar');
		file_put_contents('reports/'.$name.'.json',$data);
		echo '<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"><i class="fa fa-check-square-o"></i> Successfully saved to '.$name.'.json</div>';
		echo '</div>';
	} else {
    echo "Error getting dependencies JSON!";
  }
?>