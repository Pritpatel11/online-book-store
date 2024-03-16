<?php
include 'conn.php';

if (isset($_GET['email']) && isset($_GET['v_code'])) {
    $quare = $conn->prepare("SELECT * FROM `users` WHERE `email`=? AND `verification_code`=?");
    $quare->bind_param("ss", $_GET['email'], $_GET['v_code']);
    $quare->execute();
    $result = $quare->get_result();

    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $result_fetch = mysqli_fetch_assoc($result);

            if ($result_fetch['is_verified'] == 0) {
                $update = "UPDATE `users` SET `is_verified`='1' where `email`='{$result_fetch['email']}'";

                if (mysqli_query($conn, $update)) {
                    header("Location: index.php");
                    exit;
                } else {
                    echo mysqli_error($conn);
                }
            }
             else {
                echo "
                    <script>
                    alert('usse exirt');
                    window.location.href='index.php';
                    </script>";
            }
        }
         else {
            echo "
            <script>
            alert('server down!!!');
            window.location.href='index.php';
            </script>";
        }
    }
}