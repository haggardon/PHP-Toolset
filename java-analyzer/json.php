<?php
	$json = file_get_contents('reports/annotations-api.json');
	//$data = json_decode($json, true);
	//echo "<pre>";
	//print_r($data);
	//echo "</pre>";
	$data = json_decode($json,true);
		foreach ($data as $key => $val) {
			echo "$key<br>";
			foreach($val as $new => $item){
				echo "&nbsp;&nbsp;$new<br>";
				foreach($item as $c => $d){
					echo "<br>";
					foreach($d as $e => $f){
						echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$e = $f<br>";
						foreach($f as $g => $h){
							echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$g = $h<br>";
						}
					}
				}
			}
		}
?>