<?php

include 'pdo.php';

if (!empty($_POST) && isset($_POST['submit'])) {
    //Capture the POST Data
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $role = $_POST['role'];
    $story = $_POST['story'];
    $learn = $_POST['learn'];
    $benefit = $_POST['benefit'];

    try {
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
            echo "You have already registered!";
        } else {
            try {
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
                    echo "Your registration was successful";
                }
            } catch (PDOException $e) {
                echo 'Error: ' .$e->getMessage();
            }
        }
    } catch (PDOExecution $e) {
        echo 'Error: ' .$e->getMessage();
    }
} else {
    echo 'Oga fill this form';
}
