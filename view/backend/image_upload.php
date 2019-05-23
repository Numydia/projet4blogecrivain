<?php

// If the submit button has been pressed
if (isset($_POST['submit'])) {
	
	$newFileName = $_POST['filename'];
	if (empty($newFileName)) {
		$newFileName = "gallery";
	} else {
		// We replace to whitespace with "-" in the newFileName variable
		$newFileName = strtolower(str_replace(" ", "-", $newFileName));
	}
	// Same title as in the gallery/php document. <input type="text" name="filetitle" placeholder="Image title...">
	// $imageTitle = $_POST['filetitle'];
	// $imageDesc = $_POST['filedesc'];

	// Name file because it is named file in gallery.php -> <input type="file" name="file">
	$file = $_FILES['file'];


	// When you print_r($file); you get this result. We have to copy each information in order to use error handling later.
	$fileName = $file["name"];
	$fileType = $file["type"];
	$fileTempName = $file["tmp_name"];
	$fileError = $file["error"];
	$fileSize = $file["size"];

	// We want to search for the extension of the file. Don't forget the "." before the extension name.
	$fileExt = explode(".", $fileName);
	// We make the extension to lower cases, because otherwise people can name it JPEG.
	$fileActualExt = strtolower(end($fileExt));

	$allowed = array("jpg", "jpeg", "png");

	// Checking for different error handler
	if (in_array($fileActualExt, $allowed)) {
		// If we DON'T have an error message
		if ($fileError === 0) {
			if ($fileSize < 2000000) {
				// Creating a new filename everytime you upload an image in order to NOT delete a file if the name was already taken.
				$imageFullName = $newFileName . "." . uniqid("", true) . "." . $fileActualExt;
				// We want to upload this file in:
				$fileDestination = "../../public/img/" . $imageFullName;

				// Before we include the file we need to include the informations into the database.
				include_once "dbh.inc.php";

				if (empty($imageTitle) || empty($imageDesc)) {
					header("Location: ../gallery.php?upload=empty");
					exit();
				} else {
					$sql = "SELECT * FROM gallery;";
					// Prepared statement
					$stmt = mysqli_stmt_init($conn);
					// If the statement did NOT get prepared
					if (!mysqli_stmt_prepare($stmt, $sql)) {
						echo "SQL statement failed";
					} else {
						// We execute the statement
						mysqli_stmt_execute($stmt);
						// We get the result of the statement
						$result = mysqli_stmt_get_result($stmt);
						// We get the results
						$rowCount = mysqli_num_rows($result);
						// 
						$setImageOrder = $rowCount + 1;

						$sql = "INSERT INTO gallery (titleGallery, descGallery, imgFullNameGallery, orderGallery) VALUES (?, ?, ?, ?);";
						if (!mysqli_stmt_prepare($stmt, $sql)) {
							echo "SQL statement failed";
						} else {
							mysqli_stmt_bind_param($stmt, "ssss", $imageTitle, $imageDesc, $imageFullName, $setImageOrder); // s = string
							mysqli_stmt_execute($stmt);

							move_uploaded_file($fileTempName, $fileDestination);

							header("Location: ../gallery.php?upload=success");
						}
					}

				}
			} else {
			  echo "File size is too big";
			  exit();				
			}
		} else {
		  echo "You had an error";
		  exit();
		}
	} else {
	  echo "You need to upload a proper file type";
	  exit();
	}


}