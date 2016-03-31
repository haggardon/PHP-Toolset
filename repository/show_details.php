<?php

function show_details($proj){
	$debug = true;
	$db_php = new db_handler();
	$db_php->dsn = "mysql:dbname=php_metrics;host=localhost";
	$db_php->username = 'root';
	$db_php->password = 'Stel0103!';
	$records = $db_php->rawSelect('SELECT * FROM projects WHERE project_name="'.$proj.'"');
	$files = $db_php->rawSelect('SELECT * FROM files WHERE project_name="'.$proj.'"');
	$packages = $db_php->rawSelect('SELECT * FROM packages WHERE project_name="'.$proj.'"');
	$classes = $db_php->rawSelect('SELECT * FROM classes WHERE project_name="'.$proj.'"');
	$methods = $db_php->rawSelect('SELECT * FROM methods WHERE project_name="'.$proj.'"');
	
    /*** fetch only associative array of values ***/
    $rows = $records->fetchAll(PDO::FETCH_ASSOC);
    /*** display the records -- PROJECT***/
	echo '<div class="row black">';
	echo '<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><h3 class="title">METRICS of PROJECT</h3></div>';
	echo '</div>';
	echo '<hr/>';
	show_metrics_php($rows);


	    /*** fetch only associative array of values ***/
    $f_rows = $files->fetchAll(PDO::FETCH_ASSOC);

    /*** display the records -- FILES***/
	echo '<div class="row black">';
	echo '<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><h3 class="title">METRICS of FILES</h3></div>';
	echo '</div>';
	echo '<hr/>';
    /*foreach($f_rows as $f_row)
    {
		echo '<div class="row black">';
        foreach($f_row as $a=>$b)
        {
			echo '<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">'.$a.'</div>';
			echo '<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">'.$b.'</div>';
		}
		echo '</div>';
		echo '<hr/>';
    }*/
	show_metrics_php($f_rows);
	
	    /*** fetch only associative array of values ***/
    $p_rows = $packages->fetchAll(PDO::FETCH_ASSOC);
	    /*** display the records -- PACKAGES***/
	echo '<div class="row black">';
	echo '<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><h3 class="title">METRICS of PACKAGES</h3></div>';
	echo '</div>';
	echo '<hr/>';
    /*foreach($p_rows as $p_row)
    {
		echo '<div class="row black">';
        foreach($p_row as $c=>$d)
        {
			echo '<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">'.$c.'</div>';
			echo '<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">'.$d.'</div>';
		}
		echo '</div>';
		echo '<hr/>';
    }*/
	show_metrics_php($p_rows);
	
	/*** fetch only associative array of values ***/
    $c_rows = $classes->fetchAll(PDO::FETCH_ASSOC);
	    /*** display the records -- CLASSES***/
	echo '<div class="row black">';
	echo '<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><h3 class="title">METRICS of CLASSES</h3></div>';
	echo '</div>';
	echo '<hr/>';
    /*foreach($c_rows as $c_row)
    {
		echo '<div class="row black">';
        foreach($c_row as $e=>$f)
        {
			echo '<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">'.$e.'</div>';
			echo '<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">'.$f.'</div>';
		}
		echo '</div>';
		echo '<hr/>';
    }*/
	show_metrics_php($c_rows);
	
	/*** fetch only associative array of values ***/
    $m_rows = $methods->fetchAll(PDO::FETCH_ASSOC);
		    /*** display the records -- METHODS***/
	echo '<div class="row black">';
	echo '<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><h3 class="title">METRICS of METHODS</h3></div>';
	echo '</div>';
	echo '<hr/>';
    /*foreach($m_rows as $m_row)
    {
		echo '<div class="row black">';
        foreach($m_row as $g=>$h)
        {
			echo '<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">'.$g.'</div>';
			echo '<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">'.$h.'</div>';
		}
		echo '</div>';
		echo '<hr/>';
    }*/
	show_metrics_php($m_rows);

}
 
function show_metrics_php($input){
 foreach($input as $row)
    {
		echo '<div class="row black">';
		echo '<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">';
		echo '<table border="1">';
		echo '<tr>';
        foreach($row as $fieldname=>$value)
        {
			echo '<td style="width: 1%; color: green; font-weight: bold;">'.$fieldname.'</td>';
			//echo '<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">'.$value.'</div>';
		}
		echo '</tr>';
		echo '<tr>';
		foreach($row as $fieldname=>$value)
        {
			echo '<td style="width: 1%;">'.$value.'</td>';
		}
		echo '</tr>';
		echo '<tr>';

		echo '</tr>';
		echo '</table>';
		echo '</div>';
		echo '</div>';
		echo '<hr/>';
    }
}
?>