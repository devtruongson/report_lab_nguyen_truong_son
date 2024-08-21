<?php
include "./sessionUser.php";

if (!empty($_POST)) {
    $user_id = $_POST['user_id'];
    $username  = $_POST['username'];
    $email  = $_POST['email'];
    $address  = $_POST['address'];
    $phone  = $_POST['phone'];
    $gender = $_POST['gender'];
    $type = $_POST['type'];

    if ($type !== "delete" && (empty($user_id) || empty($username) || empty($email) || empty($address) || empty($phone) || empty($gender) || !isVietnamesePhoneNumber($phone))) {
?>
        <script>
            const check = confirm("Missing required parameters");
            if (check) {
                window.location.href = "index.php";
            } else {
                window.location.href = "index.php";
            }
        </script>
        <?php
    } else {
        switch ($type) {
            case "insert": {
                    handleInsertUser(
                        $user_id,
                        $username,
                        $email,
                        $address,
                        $phone,
                        $gender
                    );
                    break;
                }
            case "update": {

                    echo handleUpdateUser(
                        $user_id,
                        $username,
                        $email,
                        $address,
                        $phone,
                        $gender
                    );
                    break;
                };
            case "delete": {
                    handleDeleteUser($user_id);
                    break;
                }
        }
    }
}

function isVietnamesePhoneNumber($number)
{
    // Sử dụng biểu thức chính quy để kiểm tra số điện thoại
    $pattern = "/^(03|05|07|08|09|01[2|6|8|9])[0-9]{8}$/";
    return preg_match($pattern, $number) === 1;
}

function handleInsertUser(
    $user_id,
    $username,
    $email,
    $address,
    $phone,
    $gender
) {
    $users = $_SESSION["users"];
    $isValid = true;

    foreach ($users as $user) {
        if ($user_id === $user["user_id"] || $email === $user["email"]) {
            $isValid = false;
        ?>
            <script>
                const checkUser = confirm("Email va userID Co The bi trung");
                if (checkUser) {
                    window.location.href = "index.php";
                } else {
                    window.location.href = "index.php";
                }
            </script>
        <?php
            break;
        }
    }

    if ($isValid) {
        $user = [
            "user_id" => $user_id,
            "username" => $username,
            "email" => $email,
            "address" => $address,
            "phone" => $phone,
            "gender" => $gender,
        ];

        $_SESSION['users'][] = $user;
        ?>
        <script>
            alert("Ban da them user thanh cong!");
            window.location.href = "index.php";
        </script>
<?php
    }
}

function handleDeleteUser($user_id)
{
    $users = $_SESSION["users"];

    foreach ($users as $index => $user) {
        if ($user_id === $user["user_id"]) {
            unset($users[$index]);
            $_SESSION["users"] = array_values($users);
            break;
        }
    }

    if (count($users) > 0) {
        echo "User da xoa thanh cong!";
    } else {
        echo "Danh sach user rong!";
    }

    header("Location: index.php");
}


function handleUpdateUser(
    $user_id,
    $username,
    $email,
    $address,
    $phone,
    $gender
) {
    $users = $_SESSION["users"];
    $isValid = false;
    $indexExit = -1;

    foreach ($_SESSION["users"] as $key => $user) {
        if ($user["user_id"] === $user_id) {
            $isValid = true;
            $indexExit = $key;
            break;
        }
    }

    if ($isValid && $indexExit !== -1) {
        $updatedUser = [
            "user_id" => $user_id,
            "username" => $username,
            "email" => $email,
            "address" => $address,
            "phone" => $phone,
            "gender" => $gender,
        ];

        $_SESSION['users'][$indexExit] = $updatedUser;
        return json_encode([
            "status" => "200",
            "message" => "User da cap nhat thanh cong!"
        ]);
    } else {
        return json_encode([
            "status" => "400",
            "message" => "Co loi xay ra!"
        ]);
    }
}
