<?php
$targetDirectory = "uploads/";
$tableName = 'user_details';
$response = [];

if (isset($_POST['userDetails'], $_POST['qualificationDetails'])) {
    // first include database information and make connection
    include_once('database.php');

    $userForm_details = json_decode($_POST['userDetails'], true);
    $userQualification = json_decode($_POST['qualificationDetails'], true);

    // Check for JSON decoding errors
    if ($userForm_details === null || $userQualification === null) {
        $response['success'] = FALSE;
        $response['error'] = "Error: Invalid JSON data";
        exit;
    } else {
        $name =  $userForm_details['fullName'];
        $fatherName =  $userForm_details['fatherName'];
        $gender =  $userForm_details['gender'];
        $email =  $userForm_details['email'];
        $mobile =  $userForm_details['phone'];
        $alternatePhone =  $userForm_details['alternatePhone'];
        $dob =  $userForm_details['dob'];
        $skills =  $userForm_details['skills'];
        $address_1 =  $userForm_details['addressOne'];
        $city =  $userForm_details['city'];
        $district =  $userForm_details['district'];
        $state =  $userForm_details['state'];
        $pincode =  $userForm_details['pinCode'];
        $panNumber =  $userForm_details['panNumber'];
        $aadharNumber =  $userForm_details['aadharNumber'];
        $experience =  $userForm_details['experience'];
        $aadharcardImage =  '';
        $pancardImage =  '';
        $userImage =  '';

        // Loop through each uploaded file
        $index = 0;
        foreach ($_FILES as $key => $file) {
            // Access file name and other properties
            $fileName = $file["name"];
            $fileTmpName = $file["tmp_name"];
            $fileSize = $file["size"];
            $fileError = $file["error"];
            $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

            // Generate a unique filename
            $uniqueFileName = uniqid('', true) . '.' . $fileType;

            // Move uploaded file to target directory with the unique filename
            $targetFile = $targetDirectory . $uniqueFileName;
            $upload_success = move_uploaded_file($fileTmpName, $targetFile);

            if ($upload_success) {
                $response['success'] = TRUE;
                $response['msg'] = $key . ' : successfully uploaded';
            } else {
                $response['success'] = FALSE;
                $response['msg'] = $key . ' : failed to upload';
            }

            if (isset($userQualification[$index]) && $userQualification[$index]['document'] == $fileName) {
                $userQualification[$index]['document'] = $uniqueFileName;
            }
            if ($key == 'userimage') {
                $userImage = $uniqueFileName;
            }
            if ($key == 'aadharcard') {
                $aadharcardImage = $uniqueFileName;
            }
            if ($key == 'pancard') {
                $pancardImage = $uniqueFileName;
            }

            $index++;
        }
        $index = 0;

        $sql = "INSERT INTO $tableName (`name`, `fatherName`, `gender`, `email`, `mobile`, `dob`, `skills`, `address_1`, `city`, `district`, `state`, `pincode`, `panNumber`, `aadharNumber`, `aadharcardImage`, `pancardImage`, `userImage`, `experience`, `alternatePhone`, `qualifications`) VALUES ('$name', '$fatherName', '$gender', '$email', '$mobile', '$dob', '$skills', '$address_1', '$city', '$district', '$state', '$pincode', '$panNumber', '$aadharNumber', '$aadharcardImage', '$pancardImage', '$userImage', '$experience', '$alternatePhone', '" . json_encode($userQualification) . "')";

        if ($conn->query($sql) === TRUE) {
            $response['uploadDataId'] = $conn->insert_id;
            $response['success'] = TRUE;
            $response['msg'] = "New record created successfully";
            session_start();
            $_SESSION['userId']  = $conn->insert_id;
        } else {
            $response['success'] = FALSE;
            $response['msg'] = "New record not created successfully";
            $response['error'] = $conn->error;
        }
    }
} else {
    $response['success'] = FALSE;
    $response['error'] = "Required POST data is missing";
}

print_r(json_encode($response));



