<?php
$upload_dir = "../fotos/";
$img = $_POST['hidden_data'];
$ci = $_POST['ci'];
$img = str_replace('data:image/png;base64,', '', $img);
$img = str_replace(' ', '+', $img);
$data = base64_decode($img);
$file = $upload_dir . $ci . ".png";
$success = file_put_contents($file, $data);
print $success ? $file : 'Unable to save the file.';
?>