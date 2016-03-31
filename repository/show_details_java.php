<?php

function show_details_java($javaproj){
		$json = file_get_contents('http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['SCRIPT_NAME']) . '/../java-analyzer/reports/'.$javaproj);
		$data = json_decode($json,true);
		$data_metrics = $data['metrics'];
		$data_dependencies = $data['dependencies'];
		echo '<div class="row black"><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><h2>Dependencies</h2></div></div>';
		show_data_metrics($data_dependencies);
		echo '<div class="row black"><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><h2>Metrics</h2></div></div>';
		show_data_metrics($data_metrics);
}

function show_data_metrics($dataToShow){
		echo '<div class="row black">';
		foreach ($dataToShow as $key => $val) {
			echo '<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><h2>'.$key.'</h2></div><br>';
			echo '<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">';
			echo '<table>';
			foreach($val as $new => $item){
				echo '<tr>';
				foreach($item as $c => $d){
						echo '<td width="10%" style="color: green;"><b>'.$c.'</b></td>';
					}
					echo '</tr>';
					break;
				//}
			}
			foreach($val as $new => $item){	$i = 1;
				echo '<tr>';
				foreach($item as $c => $d){
						echo '<td width="10%">'.$d.'</td>';
					}
					echo '</tr>';
			}
			echo '</table>';
			echo '</div>';
		}
		echo '</div>';
}
?>