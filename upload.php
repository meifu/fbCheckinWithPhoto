<?php // You need to add server side validation and better error handling here
$data = array();
 
if(isset($_GET['files']))
{  
	$error = false;
	$files = array();
 	
	$uploaddir = 'uploads/';
	foreach($_FILES as $file)
	{
		if(move_uploaded_file($file['tmp_name'], $uploaddir .basename($file['name'])))
		{
			$files[] = $uploaddir .$file['name'];
		}
		else
		{
		    $error = true;
		}
	}
	// $data = $file['name'];
	$data = ($error) ? array('error' => 'There was an error uploading your files') : array('files' => $files, 'success' => 'Form was submitted1');
}
else
{
	$data = array('success' => 'Form was submitted2', 'formData' => $_POST);
}
 
echo json_encode($data);
 
?>