<?php
include('include/config.php');

if (!empty($_POST)) {
    $id = $_POST['id'];
    $type = $_POST["type"] ? $_POST["type"] : "all";

    switch ($type) {
        case "all":
            $sql = mysqli_query($con, "delete from tblpatient");
            break;
        case "one": {
                $sql = mysqli_query($con, "delete from tblpatient where ID = $id");
                break;
            };
    };
?>
    <script>
        alert("Đã Xóa Thành Công!");
        window.location.href = "manage-patient.php";
    </script>
<?php
}
