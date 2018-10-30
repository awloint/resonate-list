<?php

require 'pdo.php';
require 'phpmailer/class.phpmailer.php';
require 'phpmailer/class.smtp.php';

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$role = $_POST['role'];
$story = $_POST['story'];
$learn = $_POST['learn'];
$benefit = $_POST['benefit'];

//Check the Database to see if the person has registered
$usercheck = 'SELECT * FROM resonate WHERE email=?';
//Prepare the Query
$usercheckquery = $conn->prepare($usercheck);
//Execute the Query
$usercheckquery->execute(array("$email"));
//Fetch the result
$usercheckquery->rowCount();

if ($usercheckquery->rowCount() > 0) {
    //redirect to the Thank You Page
    echo '1';
} else {
        // enter the data into the database
        $enteruser = "INSERT into resonate (firstName, lastName, email, phone, role, story, learn, benefit) VALUES (:firstName, :lastName, :email, :phone, :role, :story, :learn, :benefit)";
        // Prepare Query
        $enteruserquery = $conn->prepare($enteruser);
        // Execute Query
        $enteruserquery->execute(
            array(
                    "firstName"         =>  $firstName,
                    "lastName"          =>  $lastName,
                    "email"             =>  $email,
                    "phone"             =>  $phone,
                    "role"              =>  $role,
                    "story"             =>  $story,
                    "learn"             =>  $learn,
                    "benefit"           =>  $benefit

                    )
        );
                     
        // Check to see if the query executed then redirect to Successful page
        if ($enteruserquery->rowcount() > 0) {
            $to = 'benson@stbensonimoh.com';
            $subject = 'New Webinar Registration';
            $result = '<table style="background-color: #d5d5d5;" border="0" width="100%" cellspacing="0">
                <tbody>
                <tr>
                <td>
                <table style="font-family: Helvetica,Arial,sans-serif; background-color: #fff; margin-top: 40px; margin-bottom: 40px;" border="0" width="600" cellspacing="0" cellpadding="0" align="center">
                <tbody>
                <tr>
                <td style="padding-top: 40px; padding-right: 40px; padding-bottom: 15px;" colspan="2">
                <p style="text-align: right;"><a href="http://awlo.org"><img src="http://awlo.org/email/awlo_lg.png" alt="African Women in Leadership Organisation" width="20%" border="0" /></a></p>
                </td>
                </tr>
                <tr>
                <td style="padding-right: 40px; text-align: right;" colspan="2"><span style="font-size: 12pt;">'.date("d/m/Y");'</span></td>
                </tr>
                <tr>
                <td style="color: #000; font-size: 12pt; font-weight: normal; line-height: 15pt; padding: 40px 40px 80px 40px;" colspan="2" valign="top"><strong>NEW WEBINAR REGISTRATION</strong>
                <p><strong>First Name:</strong> ' . $firstName . '<p>
                <p><strong>Last Name:</strong> ' . $lastName . '<p>
                <p><strong>Email:</strong> ' . $email . '<p>
                <p><strong>Phone:</strong> ' . $phone . '<p>
                <p><strong>Role:</strong> ' . $role . '<p>
                <p><strong>Story:</strong> ' . $story . '<p>
                <p><strong>Learn:</strong> ' . $learn . '<p>
                <p><strong>Benefits:</strong> ' . $benefit . '<p>
                </td>
                </tr>
                <tr>
                <td style="border-top: 5px solid #940000; height: 10px; font-size: 7pt;" colspan="2" valign="top"><span>&nbsp;</span></td>
                </tr>
                <tr style="text-align: center;">
                <td id="s1" style="padding-left: 20px;" valign="top"><span style="text-align: center; color: #333; font-size: 12pt;"><strong>Benson Imoh,<span style="font-variant: small-caps;">st</span></strong></span><span style="color: #cccccc; font-size: x-large;">&nbsp;|&nbsp;</span><span style="text-align: left; color: #333; font-size: 11pt; font-weight: normal;">Creative Director/Chief Technology Officer</span></td>
                </tr>
                <tr style="text-align: center; padding-left: 20px; padding-right: 20px; padding-bottom: 0;">
                <td colspan="2" valign="top"><span style="color: #333; font-size: 8pt; font-weight: normal; line-height: 17pt;">African Women in Leadership Organisation<br /><strong>International Headquarters:</strong> 6, Alhaji Bankole Crescent, Ikeja, Lagos - Nigeria<br />tel: +2347066819910 &nbsp;|&nbsp; mobile: +2348066285116 &nbsp;|&nbsp; +2348087719510<br /> <strong>USA:</strong> 60 Thurber Blvd, Smithfield RI 02917, Rhode Island, USA.<br />tel: +14-047-190-611 &nbsp;|&nbsp; +16-784-314-725 &nbsp;|&nbsp; +14-016992-419<br /> <strong>South Africa:</strong> The Firs, Regus Offices, AWLO Division, Craddock Avenue Rosebank, Johannesburg, South Africa<br />tel: +27-611-475-762<br /><strong>email:&nbsp;</strong>info@awlo.org &nbsp;|&nbsp; <strong>www.awlo.org</strong></span>
                <p><a href="http://twitter.com/awloint"><img src="http://tv.awlo.org/emails/social/twitter_circle_color-20.png" alt="" width="20px" height="20px" /></a><a href="http://facebook.com/awloint"><img src="http://tv.awlo.org/emails/social/facebook_circle_color-20.png" alt="" width="20px" height="20px" /></a><a href="https://plus.google.com/103912934440599693779"><img src="http://tv.awlo.org/emails/social/google_circle_color-20.png" alt="" width="20px" height="20px" /></a><a href="http://linkedin.com/company/awloint"><img src="http://tv.awlo.org/emails/social/linkedin_circle_color-20.png" alt="" width="20px" height="20px" /></a><a href="http://instagram.com/awloint"><img src="http://tv.awlo.org/emails/social/instagram_circle_color-20.png" alt="" width="20px" height="20px" /></a><a href="https://www.youtube.com/channel/UCevvBafqeTjY16qd2gbceJw"><img src="http://tv.awlo.org/emails/social/youtube_circle_color-20.png" alt="" width="20px" height="20px" /></a></p>
                </td>
                </tr>
                <tr>
                <td id="s3" style="padding-left: 20px; padding-right: 20px;" colspan="2" valign="bottom">
                <p style="font-family: Helvetica, sans-serif; text-align: center; font-size: 12px; line-height: 21px; color: #333;"><span style="margin-left: 4px;"><span style="opacity: 0.4; color: #333; font-size: 9px;">Disclaimer: This message and any files transmitted with it are confidential and privileged. If you have recieved it in error, please notify the sender by return e-mail and delete this message from your system. If you are not the intended recipient you are hereby notified that any dissemination, copy or disclosure of this e-mail is strictly prohibited.</span></span></p>
                </td>
                </tr>
                <tr>
                <td style="border-bottom: 5px solid #940000; height: 5px; font-size: 7pt;" colspan="2" valign="top">&nbsp;</td>
                </tr>
                </tbody>
                </table>
                </td>
                </tr>
                </tbody>
                </table>';
            // Set content-type
            $headers = 'MIME-Version: 1.0' . '\r\n';
            $headers .= 'Content-type:text/html;charset=UTF-8'. '\r\n';
            $headers .= 'From: African Women in Leadership Organisation <info@awlo.org>' .'\r\n';
            mail($to,$subject,$result,$headers);

            // send a response to Ajax
            echo '2';
        }
        
    }