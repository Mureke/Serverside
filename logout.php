<?php
    session_start();
    $_SESSION['name'] = $name;
    $_SESSION['id'] = $id;

    /** Ends current session and redirects back to front page **/

    session_destroy();
    header('Location: index.php');
?>