<?php 
define('TITLE', 'Login');
include('templates/headerlogin.html');

 // This script takes a file upload and stores it on the server
 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (isset($_FILES['upload'])) {// Check for an uploaded file:
		// Validate the type. Should be JPEG or PNG.
		$allowed = array ('image/pjpeg', 'image/jpeg', 'image/JPG', 'image/X-PNG', 
							'image/PNG', 'image/png', 'image/x-png');
		if (in_array($_FILES['upload']['type'], $allowed)) {
			if (move_uploaded_file ($_FILES['upload']['tmp_name'], "storeupload/{$_FILES['upload']['name']}")) {
				echo '<p><em>The file has been uploaded!</em></p>';
			} // End of move... IF.			
		} else { // Invalid type.
			echo '<p class="error">Please upload a JPEG or PNG image.</p>';
		}
	} // End of isset($_FILES['upload']) IF.
	if ($_FILES['upload']['error'] > 0) {	// Check for an error:
		echo '<p class="error">The file could not be uploaded because: <strong>';		
		switch ($_FILES['upload']['error']) {
			case 1:	print 'The file exceeds the upload_max_filesize setting in php.ini.';	break;
			case 2:	print 'The file exceeds the MAX_FILE_SIZE setting in the HTML form.';	break;
			case 3:	print 'The file was only partially uploaded.';	break;
			case 4:	print 'No file was uploaded.';	break;
			case 6:	print 'No temporary folder was available.';	break;
			case 7:	print 'Unable to write to the disk.';	break;
			case 8:	print 'File upload stopped.';	break;
			default:print 'A system error occurred.';	break;
		} // End of switch.
		print '</strong></p>';
	} // End of error IF.
	if (file_exists ($_FILES['upload']['tmp_name']) && is_file($_FILES['upload']['tmp_name']) ) {
		unlink ($_FILES['upload']['tmp_name']);	// Delete the file if it still exists:
	}			
} // End of the submitted conditional.

print '
<a href="../Homework2UploadFile/homepage.php"><button style="margin: 40px 40px 40px 0;">Back</button></a>
<form enctype="multipart/form-data" action="uploadimages.php" method="post">
 <input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
 <fieldset><legend>Select a JPEG or PNG image of 512KB or smaller to be uploaded:</legend>
	 <p><b>File:</b> <input type="file" name="upload" /></p>
 </fieldset>
 <div><input type="submit" name="submit" value="Submit" /></div>
</form>';

include('templates/footer1.html'); // Need the footer.
?>