<?php

function show_php(){
	$debug = true;
	$db_php = new db_handler();
	$db_php->dsn = "mysql:dbname=php_metrics;host=localhost";
	$db_php->username = 'root';
	$db_php->password = 'Stel0103!';
	$records = $db_php->rawSelect('SELECT id,project_name FROM projects');

    /*** fetch only associative array of values ***/
    $rows = $records->fetchAll(PDO::FETCH_ASSOC);

    /*** display the records ***/
	echo '<div class="row black">';
	echo '<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><h3 class="title">ID</h3></div>';
	echo '<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10"><h3 class="title">PROJECT NAME</h3></div>';
	echo '</div>';
	echo '<hr/>';
    foreach($rows as $row)
    {
		echo '<div class="row black">';
		$i=1;
		foreach($row as $fieldname=>$value)
        {
			if($i==1){
				echo '<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">'.$value.'</div>';
			}
			if($i==2){
				echo '<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">'.$value.'<a href="details.php?project='.$value.'" class="btn btn-success alignright" role="button">Show details</a></div>';
			}
			$i=$i+1;
		}
		echo '</div>';
		echo '<hr/>';
    }

}
?>