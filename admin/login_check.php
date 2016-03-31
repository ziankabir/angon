<?php

$error = "";

if (isset($_POST['btnLogin'])) {
    extract($_POST);

    $email_address = mysqli_real_escape_string($con, $email_address);
    $password = mysqli_real_escape_string($con, $password);
    $password = securedPass($password);

    if (empty($email_address)) {
        $error = "Enter email address";
    } elseif (empty($password)) {
        $error = "Enter password";
    } else {
        $sql = "SELECT * FROM admin WHERE admin_email='$email_address'";
        $result = mysqli_query($con, $sql);

        if ($result) {
            $count = mysqli_num_rows($result);
            if ($count > 0) {
                $result_row = mysqli_fetch_object($result);
                if ($result_row->admin_password == $password) {
                    setSession("admin_id", $result_row->admin_id);
                    setSession("admin_email", $email_address);
                    setSession("admin_password", $result_row->admin_password);
                    setSession("admin_name", $result_row->admin_full_name);
                    $success = "Logged in successfully";
                    $link = baseUrl()."admin/view/dashboard.php?success=" . base64_encode($success);
                    redirect($link);
                } else {
                    $error = 'Incorrect password';
                }
            } else {
                $error = 'Incorrect username';
            }
        } else {
            if (DEBUG) {
                $error = "result error: " . mysqli_error($con);
            } else {
                $error = "result query failed";
            }
        }
    }
}
?>