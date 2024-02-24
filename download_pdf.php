<?php
require_once __DIR__ . '/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf([
    'format' => 'A4',
    'margin_left' => 2, // Left margin in millimeters
    'margin_right' => 2, // Right margin in millimeters
    'margin_top' => 4, // Top margin in millimeters
    'margin_bottom' => 4 // Bottom margin in millimeters
]);
session_start();

if (isset($_SESSION['userId'])) {
    include_once('database.php'); // Include database connection file
    $userId = $_SESSION['userId'] ?? 9;
    $targetDirectory = "uploads/";
    $tableName = 'user_details';
    $html = '';
    $response = [];

    // Prepare and execute the SQL query to fetch data
    $sql = "SELECT * FROM $tableName WHERE id = $userId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $userData = $result->fetch_assoc();

        $name = $userData['name'];
        $fatherName = $userData['fatherName'];
        $gender = $userData['gender'];
        $email = $userData['email'];
        $mobile = $userData['mobile'];
        $alternatePhone =  $userData['alternatePhone'];
        $dob = $userData['dob'];
        $skills = $userData['skills'];
        $experience = $userData['experience'];
        $address_1 = $userData['address_1'];
        $city = $userData['city'];
        $district = $userData['district'];
        $state = $userData['state'];
        $pincode = $userData['pincode'];
        $panNumber = $userData['panNumber'];
        $aadharNumber = $userData['aadharNumber'];
        $userImage = $userData['userImage'];
        $aadharcardImage = $userData['aadharcardImage'];
        $pancardImage = $userData['pancardImage'];
        $qualifications = json_decode($userData['qualifications']);
        // now destructure the qualifications data with the key name is 'degree name';
        $educationalDetails = [];
        foreach ($qualifications as $key => $data) {
            $educationalDetails[$data->degree] = $data;
        }
        // echo "<pre>";
        // print_r($objects);
        // echo $objects['Postgraduate']->degree ?? null;
    } else {
        // Handle the case where no rows were returned
        // Example: $response['error'] = "No data found";
    }
    // Close the database connection

    $html = '
<style>
   body{
    color: #2F3C7E;
   }
</style>
<div style="width: 90%; margin: auto;">
    <div style="width: 100%">
        <div style="width: 30%; float: left; text-align: left;">
            <div>
                <img src="uploads/' . $userImage . '" width="150px"/>
            </div>
        </div>
        <div style="width: 70%; float: left; text-align: left; padding-top: 1.5rem;">
           <div style="font-size: 36px; font-weight: bold; color: green; text-transform: uppercase; letter-spacing: 2px;">' . $name . '</div>
           <div style="font-size: 16px; font-weight: bold; color: blue; text-transform: capitalize; margin-top: 10px;">Business Analytics</div>
           <div style="padding-bottom: 2px; border-bottom: 2px solid gray;"></div>
        </div>
    </div>

    <div style="margin-top: 20px;">
        <div class="sub_heading" style="font-size: 16px; font-weight: bold; margin-bottom: 10px; color: #1E2761;">
            Contact Details :
            <div style="border-bottom: 1px solid green; padding-top: 3px;"></div>
        </div>
        <div class="phone_numbers" style="margin-top: 5px">
            <span> <span style="font-weight: bold; color: #1E2761;">Phone no. :</span> +91 ' . $mobile . '</span>
            <span> , </span>
            <span style="">+91 ' . $alternatePhone . '</span>
        </div>
        <div class="email" style="margin-top: 5px">
            <span> <span style="font-weight: bold; color: #1E2761;">Email id :</span> ' . $email . '</span>
        </div>
        <div class="address" style="margin-top: 5px">
            <span> <span style="font-weight: bold; color: #1E2761;">Address :</span> ' . $address_1 . '</span>
        </div>
    </div>

    <div class="about_me" style="margin-top: 20px;">
        <div class="sub_heading" style="font-size: 16px; font-weight: bold; margin-bottom: 10px; color: #1E2761;">
            About me : 
            <div style="border-bottom: 1px solid green; padding-top: 3px;"></div>
        </div>
        <div style="margin-top: 5px;">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
        </div>
    </div>

    <div class="about_me" style="margin-top: 20px; color: #1E2761;">
        <div class="sub_heading" style="font-size: 16px; font-weight: bold; margin-bottom: 10px;">
            Education : 
            <div style="border-bottom: 1px solid green; padding-top: 3px;"></div>
        </div>
        <div class="education">';
    if (isset($educationalDetails['highschool'])) {
        if ($educationalDetails['highschool']->gradeOrPercentage == 'Grade') {
            $result =  'Grade - ' . $educationalDetails['highschool']->result;
        } else {
            $result = $educationalDetails['highschool']->result . '%';
        }

        $html .= '
            <div class="highschool" style="margin-top: 5px">
                <span style="font-weight: bold; color: #1E2761;">High School : </span>
                <span style="">' . $educationalDetails['highschool']->collegeName . ', </span>
                <span style="">(' . $educationalDetails['highschool']->passingYear . '), </span>
                <span style="">' . $result . '</span>
            </div>';
    }
    if (isset($educationalDetails['Intermediate'])) {
        if ($educationalDetails['Intermediate']->gradeOrPercentage == 'Grade') {
            $result =  'Grade - ' . $educationalDetails['Intermediate']->result;
        } else {
            $result = $educationalDetails['Intermediate']->result . '%';
        }
        $html .= '
            <div class="inter" style="margin-top: 5px">
                <span style="font-weight: bold; color: #1E2761;">Intermediate : </span>
                <span style="">' . $educationalDetails['Intermediate']->collegeName . ', </span>
                <span style="">(' . $educationalDetails['Intermediate']->passingYear . '), </span>
                <span style="">' . $result . '</span>
            </div>';
    }
    if (isset($educationalDetails['Graduate'])) {
        if ($educationalDetails['Graduate']->gradeOrPercentage == 'Grade') {
            $result =  'Grade - ' . $educationalDetails['Graduate']->result;
        } else {
            $result = $educationalDetails['Graduate']->result . '%';
        }
        $html .= '
            <div class="graduate" style="margin-top: 5px">
                <span style="font-weight: bold; color: #1E2761;">Graduate : </span>
                <span style="">' . $educationalDetails['Graduate']->collegeName . ', </span>
                <span style="">(' . $educationalDetails['Graduate']->passingYear . '), </span>
                <span style="">' . $result . '</span>
            </div>';
    }
    if (isset($educationalDetails['Postgraduate'])) {
        if ($educationalDetails['Postgraduate']->gradeOrPercentage == 'Grade') {
            $result =  'Grade - ' . $educationalDetails['Postgraduate']->result;
        } else {
            $result = $educationalDetails['Postgraduate']->result . '%';
        }
        $html .= '
            <div class="pgraduate" style="margin-top: 5px">
                <span style="font-weight: bold; margin-top: 5px; color: #1E2761;">Post Graduate : </span>
                <span style="">' . $educationalDetails['Postgraduate']->collegeName . ', </span>
                <span style="">(' . $educationalDetails['Postgraduate']->passingYear . '), </span>
                <span style="">' . $result . '</span>
            </div>';
    }

    $html .= '
        </div>
    </div>

    <div class="" style="margin-top: 20px;">
        <div class="sub_heading" style="font-size: 16px; font-weight: bold; margin-bottom: 10px; color: #1E2761;">
            Skills : 
            <div style="border-bottom: 1px solid green; padding-top: 3px;"></div>
        </div>
        <div class="skills_details">
            <span>' . $skills . '</span>
        </div>
    </div>

    <div class="" style="margin-top: 20px;">
        <div class="sub_heading" style="font-size: 16px; font-weight: bold; margin-bottom: 10px; color: #1E2761;">
            Work Experience : 
            <div style="border-bottom: 1px solid green; padding-top: 3px;"></div>
        </div>
        <div class="experience_details">
            I have ' . $experience . ' year experience in the ' . $skills . '
        </div>
    </div>

    <div class="" style="margin-top: 20px;">
        <div class="sub_heading" style="font-size: 16px; font-weight: bold; margin-bottom: 10px;  color: #1E2761;">
            Language : 
            <div style="border-bottom: 1px solid green; padding-top: 3px;"></div>
        </div>
        <div class="language_details">
            <span>English</span>,
            <span>Hindi</span>
        </div>
    </div>

    <div class="" style="margin-top: 20px;">
        <div class="sub_heading" style="font-size: 16px; font-weight: bold; margin-bottom: 10px;  color: #1E2761;">
            Personal Details : 
            <div style="border-bottom: 1px solid green; padding-top: 3px;"></div>
        </div>
        <div class="p_details">
            <div class="dob">
                <span style="font-weight: bold;  color: #1E2761;">Date of Birth : </span>
                <span style="padding-left: 10px;">' . $dob . '</span>
            </div>
            <div class="gender">
                <span style="font-weight: bold; color: #1E2761;">Gender : </span>
                <span style="">' . $gender . '</span>
            </div>
            <div class="fathername">
                <span style="font-weight: bold; color: #1E2761;">Father Name : </span>
                <span style="">' . $fatherName . '</span>
            </div>
        </div>
    </div>
</div>

';


    // if HTML is generated than update tabel for html data
    $updateSql = "UPDATE $tableName SET `pdfData` = '$html' WHERE id = '$conn->insert_id'";
    $updateRecord = $conn->query($updateSql);

    // $mpdf->SetMargins(10,10,10,10);
    $mpdf->WriteHTML($html);
    $imagePath = 'uploads/' . $userImage;
    if (!empty($userImage)) {
        $mpdf->AddPage();
    }

    if (!empty($userImage)) {
        $userImageHtml = '<div style="text-align: center;"><img src="uploads/' . $userImage . '"></div>';
        $mpdf->WriteHTML($userImageHtml);
    }
    if (!empty($aadharcardImage)) {
        $aadharCardHtml = '<div style="text-align: center;"><img src="uploads/' . $aadharcardImage . '" style="margin-top: 10px;"></div>';
        $mpdf->WriteHTML($aadharCardHtml);
    }
    if (!empty($pancardImage)) {
        $pancardHtml = '<div style="text-align: center;"><img src="uploads/' . $pancardImage . '" style="margin-top: 10px;></div>';
        $mpdf->WriteHTML($pancardHtml);
    }

    if (isset($educationalDetails['highschool'])) {
        $highSchoolHtml = '<div style="text-align: center;"><img src="uploads/' . $educationalDetails['highschool']->document . '" style="margin-top: 10px;"></div>';
        $mpdf->WriteHTML($highSchoolHtml);
    }
    if (isset($educationalDetails['Intermediate'])) {
        $intermediateHtml = '<div style="text-align: center;"><img src="uploads/' . $educationalDetails['Intermediate']->document . '" style="margin-top: 10px;"></div>';
        $mpdf->WriteHTML($intermediateHtml);
    }
    if (isset($educationalDetails['Graduate'])) {
        $graduateHtml = '<div style="text-align: center;"><img src="uploads/' . $educationalDetails['Graduate']->document . '" style="margin-top: 10px;"></div>';
        $mpdf->WriteHTML($graduateHtml);
    }
    if (isset($educationalDetails['Postgraduate'])) {
        $pgHtml = '<div style="text-align: center;"><img src="uploads/' . $educationalDetails['Postgraduate']->document . '" style="margin-top: 10px;"></div>';
        $mpdf->WriteHTML($pgHtml);
    }

    // unset $userid
    unset($_SESSION['userId']);
    $conn->close();
    $mpdf->Output();
    // $mpdf->Output('output.pdf', 'I'); // shown in browser as a pdf
    // $mpdf->Output('output.pdf', 'S'); // shown in browser as a string
} else {
    header("Location: index.php");
}
