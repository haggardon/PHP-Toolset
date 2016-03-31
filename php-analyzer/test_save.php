<?php
include 'db_handler.php';

$debug = true;
$db_handler = new db_handler();
$db_handler->dsn = "mysql:dbname=php_metrics;host=localhost";
$db_handler->username = 'root';
$db_handler->password = 'Stel0103!';

$xfile = '/var/www/html/php-analyzer/pdepend/reports/pChart.1.27d.xml';
$rpname = basename($in, ".xml");

$xml = simplexml_load_file($xfile);


$project = $xml;
$packages = $xml->package;
$nofPackages = sizeof($packages);
$packageFiles = 0;
echo "PROJECT <br/>";
echo "Metrics: <br/>";
echo "<br/>PACKAGES ".$nofPackages."<br/>";
for ($i = 0; $i < $nofPackages; $i++) {
    echo "<br><br>";
    echo ($i+1).".".$packages[$i]->attributes()->name;
    $classes = $packages[$i]->class;
    //atributes of class
    $nrClasses = sizeof($classes);
    $package_files = $packages[$i]->class->file;
    $nrFiles = sizeof($package_files);


    

    echo "<br/>Size of Classes: " . $nrClasses . "<br/>";
    echo "<br/>--CLASSES--<br/>";
    
    for ($j = 0; $j < sizeof($classes); $j++) {
        $methods = $classes[$j]->method;
        $nrMethods = sizeof($methods);
        echo "<br/>Size of methods: " . $nrMethods . "<br/>";
        echo "<br/>--METHODS--<br/>";
        
        for ($k = 0; $k < sizeof($methods); $k++) {
            $methodsValues = array(
                array('project_name' => $rpname, 'name' => $methods[$k]->attributes()->name, 'ccn' => $methods[$k]->attributes()->ccn, 'ccn2' => $methods[$k]->attributes()->ccn2, 'cloc' => $methods[$k]->attributes()->cloc, 'eloc' => $methods[$k]->attributes()->eloc, 'lloc' => $methods[$k]->attributes()->lloc, 'loc' => $methods[$k]->attributes()->loc,
                    'ncloc' => $methods[$k]->attributes()->ncloc, 'npath' => $methods[$k]->attributes()->npath)
            );
            $db_handler->dbInsert('methods', $methodsValues);
            // Have to insert class_id
        }        
        $package_files = $classes[$j]->file;
        $nrFiles=+sizeof($package_files);
        
        echo "<br> Class number of files: ".$nrFiles.".<br><br>";
        $packageFiles += $nrFiles;
        $classesValues = array(
            array('project_name' => $rpname, 'name' => $classes[$j]->attributes()->name, 'ca' => $classes[$j]->attributes()->ca, 'cbo' => $classes[$j]->attributes()->cbo, 'ce' => $classes[$j]->attributes()->ce, 'cis' => $classes[$j]->attributes()->cis, 'cloc' => $classes[$j]->attributes()->cloc,
                'cr' => $classes[$j]->attributes()->cr, 'csz' => $classes[$j]->attributes()->csz, 'dit' => $classes[$j]->attributes()->dit, 'eloc' => $classes[$j]->attributes()->eloc, 'impl' => $classes[$j]->attributes()->impl, 'lloc' => $classes[$j]->attributes()->lloc,
                'loc' => $classes[$j]->attributes()->loc, 'ncloc' => $classes[$j]->attributes()->ncloc, 'noam' => $classes[$j]->attributes()->noam, 'nocc' => $classes[$j]->attributes()->nocc, 'nom' => $classes[$j]->attributes()->nom, 'noom' => $classes[$j]->attributes()->noom,
                'npm' => $classes[$j]->attributes()->npm, 'rcr' => $classes[$j]->attributes()->rcr, 'vars' => $classes[$j]->attributes()->vars, 'varsi' => $classes[$j]->attributes()->varsi, 'varsnp' => $classes[$j]->attributes()->varsnp, 'wmc' => $classes[$j]->attributes()->wmc,
                'wmci' => $classes[$j]->attributes()->wmci, 'wmcnp' => $classes[$j]->attributes()->wmcnp, 'nr_of_methods' => $nrMethods)
        );
        $db_handler->dbInsert('classes', $classesValues);
        // Have to insert file_id
        if($j== (sizeof($classes)-1))
        echo "Global number of Files".$packageFiles;
    }
    
    $packagesValues = array(
        array('project_name' => $rpname, 'package_name' => $packages[$i]->attributes()->name,
            'cr' => $packages[$i]->attributes()->cr, 'noc' => $packages[$i]->attributes()->noc, 'nof' => $packages[$i]->attributes()->nof, 'noi' => $packages[$i]->attributes()->noi,
            'nom' => $packages[$i]->attributes()->nom, 'rcr' => $packages[$i]->attributes()->rcr, 'nr_of_files' => $packageFiles, 'nr_of_classes' => $nrClasses)
    );
    $db_handler->dbInsert('packages', $packagesValues);
    $packageFiles = 0;
    // Have to insert project_id
    
    
}

$files = $xml->files->file;
$nofFiles = sizeof($files);

echo "<br/><br/>FILES <br/>";
for ($i = 0; $i < $nofFiles; $i++) {
    echo($i + 1) . ". " . "----Full path: " . ". " . $files[$i]->attributes()->name . "<br/>";
    $name = $files[$i]->attributes()->name;
    $shortName = explode("/", $name);
    echo "--------Short path: " . end($shortName) . "<br/>";
    echo "Metrics:" . "<br/>";
    $file_name = end($shortName);
    $filesValues = array(
        array('project_name' => $rpname, 'file_name' => $file_name, 'full_path' => $files[$i]->attributes()->name, 'cloc' => $files[$i]->attributes()->cloc,
            'eloc' => $files[$i]->attributes()->eloc, 'lloc' => $files[$i]->attributes()->lloc, 'loc' => $files[$i]->attributes()->loc,
            'ncloc' => $files[$i]->attributes()->ncloc)
    );
    $db_handler->dbInsert('files', $filesValues);
    //Have to insert package_id
}

$projectValues = array(
    array(  'project_name' => $rpname,
			'ahh' => $project->attributes()->ahh, 
            'andc' => $project->attributes()->andc, 
            'calls' => $project->attributes()->calls,
            'ccn' => $project->attributes()->ccn, 
            'ccn2' => $project->attributes()->ccn2, 
            'cloc' => $project->attributes()->cloc, 
            'clsa' => $project->attributes()->clsa,
            'clsc' => $project->attributes()->clsc, 
             'eloc' => $project->attributes()->eloc,
            'fanout' => $project->attributes()->fanout, 
            'leafs' => $project->attributes()->leafs,
           'lloc' => $project->attributes()->lloc, 
            'loc' => $project->attributes()->loc, 
            'maxDIT' => $project->attributes()->maxDIT,
            'ncloc' => $project->attributes()->ncloc,
            'noc' => $project->attributes()->noc, 
            'nof' => $project->attributes()->nof,
            'noi' => $project->attributes()->noi, 
            'nom' => $project->attributes()->nom,
             'nop' => $project->attributes()->nop,
            'roots' => $project->attributes()->roots,
            'nr_of_files' => $nofFiles,
            'nr_of_packages' => $nofPackages)
);

$db_handler->dbInsert('projects', $projectValues);
print_r($xml);
?>
