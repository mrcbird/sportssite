<?php
    $fp = fopen('/home/benoist/sportophile.com/userimage/text.file', 'w') ;
    fwrite($fp, "Hello\n");
    if($_POST) {
      	fwrite($fp, "Post\n");
    } else { 
      	fwrite($fp, "No Post\n");
	ob_start();
	var_dump($_POST);
	$result = ob_get_clean();
	fwrite($fp, $result);
    }
    fclose($fp);

  
    $idnum = $_SESSION("user");
  
if($_POST)
{
    //echo '<pre>'; print_r($_POST); echo '</pre>';

    //$blob = $_POST['bloburl'];
    //$type = $_POST['blobtype'];
    $data = $_POST['image'];

    $contents_split = explode(',', $data);
    $encoded = $contents_split[count($contents_split)-1];
    $decoded = "";
    for ($i=0; $i < ceil(strlen($encoded)/256); $i++) {
        $decoded = $decoded . base64_decode(substr($encoded,$i*256,256)); 
    }

    $fp = fopen('/home/benoist/sportophile.com/userimage/' + $idnum + '.gif', 'w') ;
    fwrite($fp, $decoded);
    fclose($fp);
} else if($_GET) {
    //$type = $_POST['blobtype'];
    $data = $_GET['image'];

    $contents_split = explode(',', $data);
    $encoded = $contents_split[count($contents_split)-1];
    $decoded = "";
    for ($i=0; $i < ceil(strlen($encoded)/256); $i++) {
        $decoded = $decoded . base64_decode(substr($encoded,$i*256,256)); 
    }

    $fp = fopen('/home/benoist/sportophile.com/userimage/' . $idnum . '.gif', 'w') ;
    fwrite($fp, $decoded);
    fclose($fp);

}


?>
