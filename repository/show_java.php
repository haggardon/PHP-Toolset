<?php
	function show_java(){
		/*** display the records ***/
		$dirlist = getFileList("{$_SERVER['DOCUMENT_ROOT']}/java-analyzer/reports");

		// output file list in HTML TABLE format
		echo '<div class="row black">';
		echo '<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><h3 class="title">ID</h3></div>';
		echo '<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10"><h3 class="title">PROJECT NAME</h3></div>';
		echo '</div>';
		echo '<hr/>';
		  $i=1;
		  foreach($dirlist as $file) {
				echo '<div class="row black">';
				echo '<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">'.$i.'</div>';
				echo '<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">'.basename($file['name'],'.json').'<a href="details_java.php?javaproject='.basename($file['name']).'" class="btn btn-success alignright" role="button">Show details</a></div>';
				echo '</div>';
				echo '<hr/>';
				$i=$i+1;
		  }

}
	  function getFileList($dir)
	  {
		// array to hold return value
		$retval = array();

		// add trailing slash if missing
		if(substr($dir, -1) != "/") $dir .= "/";

		// open pointer to directory and read list of files
		$d = @dir($dir) or die("getFileList: Failed opening directory $dir for reading");
		while(false !== ($entry = $d->read())) {
		  // skip hidden files
		  if($entry[0] == ".") continue;
		  if(is_dir("$dir$entry")) {
			$retval[] = array(
			  "name" => "$dir$entry/",
			  "type" => filetype("$dir$entry"),
			  "size" => 0,
			  "lastmod" => filemtime("$dir$entry")
			);
		  } elseif(is_readable("$dir$entry")) {
			$retval[] = array(
			  "name" => "$dir$entry",
			  "type" => mime_content_type("$dir$entry"),
			  "size" => filesize("$dir$entry"),
			  "lastmod" => filemtime("$dir$entry")
			);
		  }
		}
		$d->close();

		return $retval;
	  }
?> 