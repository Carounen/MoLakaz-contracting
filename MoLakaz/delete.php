<?php
require_once "./db/pdo.php";
require_once './functions/util.php';
session_start();
//Check if the sid token is in the url
if (isset( $_GET["sid"] )) {
    try {
    //add the delete statement with a where clause
    $sql = " delete from portfolio where portfolio_id=:typeid";
    $stmt = $pdo->prepare($sql);
    //retrieve the sid from the url
    $stmt->execute(array(':typeid' => $_GET["sid"] ));
    $_SESSION['successmsg'] = 'Record deleted';
    header('Location: viewdeleteport.php');
    return;
    } catch (Exception $e) {
        
        $_SESSION['errormsg']=$e->getMessage();
    // $_SESSION['errormsg'] = 'Cannot delete this record!';
    header('Location: viewdeleteport.php');
    return;
    }
    }
    ?>