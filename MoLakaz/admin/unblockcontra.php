<?php
require_once "../db/pdo.php";
require_once '../functions/util.php';
session_start();
//Check if the sid token is in the url
if (isset( $_GET["sid"] )) {
    try {
    //add the delete statement with a where clause
    $sql = " update contractor set status = 1 where contractor_id=:typeid";
    $stmt = $pdo->prepare($sql);
    //retrieve the sid from the url
    $stmt->execute(array(':typeid' => $_GET["sid"] ));
    $_SESSION['successmsg'] = 'Contractor Unblock';
    header('Location: viewblockcontractor.php');
    return;
    } catch (Exception $e) {
        
        $_SESSION['errormsg']=$e->getMessage();
    // $_SESSION['errormsg'] = 'Cannot delete this record!';
    header('Location: viewblockcontractor.php');
    return;
    }
    }


    ?>