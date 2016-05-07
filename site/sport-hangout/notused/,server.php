<?php

chdir("../..");

require_once("./includes/bootstrap.inc");
drupal_bootstrap(DRUPAL_BOOTSTRAP_SESSION);

global $xmluser;
if(isset($_GET['cmd'])){
$cmd = ($_GET['cmd']);
} else {
$cmd = "";
}

header("Expires: Sun, 19 Nov 1978 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

$results = array();

$results['user'] = $user->name;
$results['more'] = 'foxy foxy';
$results['data'] = 'foxy foxy';
// echo $_GET['callback'] . '('.json_encode($results).')';
$callback = "nbhang.jsonp";

$data = json_decode(file_get_contents("/var/home/ben/ninpod/app/stat/status.json"));
$results['servers'] = $data;

echo  $callback . '('.json_encode($results).')';



