<?php


function validateOldPass()
{
if (strlen($_POST['txtoldpass']) < 1) {
return 'Old Password is required';
}
}
function validateCPass()
{
if ($_POST['txtnewpass'] != $_POST['txtcpass']) {
return 'Password does not match';
}
}

function validateNPass()
{
if ($_POST['txtnewpass'] < 1) {
return 'Password is required';
}
}


function validateEmptyField($input, $field)
{
// Data validation for empty fields
if (strlen($input) < 1) {
return "$field is required";
}
}
function validatelengthField($input, $field)
{
// Data validation to check numeric entries
if (strlen($input) < 8) {
return "$field must be greater than 8";
}
}

function validateNumericField($input, $field)
{
// Data validation to check numeric entries
if (!is_numeric($input)) {
return "$field is invalid";
}
}

// function validateFileProfilePic(){
//     if ( strlen($_FILES['profile_image']['name']) < 1) {
//     return 'File up is mandatory!';
//     }
//     }

function validateFirstName(){
    if ( strlen($_POST['txtfname']) < 1) {
    return 'First name is required';
    }
    }

function validateDate($input, $field){

$date = '05-24-2023';
    if (validateDate($date)) {
        return "$field date is valid!";
    } else {
        return "$field date format!";
    }


}

function validatephonefield(){
    if ( strlen($_POST['phonenum']) < 1) {
    return 'Phone number is required';
    }
    }



function flashMessages(){
    if ( isset($_SESSION["errormsg"]) ) {
    echo('<p style="color:red">'. $_SESSION["errormsg"] . '</p>');
    //delete the session
    unset($_SESSION["errormsg"]);
    }
    if ( isset($_SESSION['successmsg']) ) {
    echo '<p style="color:green">'. $_SESSION['successmsg'] . '</p>';
    //delete the session
    unset($_SESSION["successmsg"]);
    }
    }
    function validateEventName(){
        if ( strlen($_POST['txtcat']) < 1) {
        return 'field required';
        }
        }


        function validateFileUpPoster(){
        if ( strlen($_FILES['fileposter']['name']) < 1) {
        return 'File upload is mandatory!';
        }
        }


        function validateportfolio(){
            if ( strlen($_POST['txtportfolio']) < 1) {
            return 'Description is required';
            }
            }

            
function validateFileUp(){
    if ( strlen($_FILES['filestandpic']['name']) < 1) {
    return 'File upload is mandatory!';
    }
    }


    function checkUserAuth(){
        if (!isset($_SESSION["cid"]) && !isset($_SESSION["coid"]) && !isset($_SESSION["oid"])) {
            header("Location: index.php");
            }
        }
    


    function validateFileProfilePic(){
        if ( strlen($_FILES['profilepic']['name']) < 1) {
        return 'File upload is mandatory!';
        }
        }

        function validateEmail()
        {
        if (strlen($_POST['txtemail']) < 1) {
        return 'Email is required';
        } else if (strpos($_POST['txtemail'], '@') < 1) {
        return "Invalid Email";
        }
        }



     

        function validatePass()
        {
        if (strlen($_POST['txtpass']) < 1) {
        
        return 'Password is required';
        }
        }

        function validatecEmail()
        {
        if (strlen($_POST['txtcemail']) < 1) {
        return 'Email is required';
        } else if (strpos($_POST['txtcemail'], '@') < 1) {
        return "Invalid Email";
        }
        }



     

 
?>