<?php
include "./sessionUser.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab One</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <h4 class="text-center my-3">Quan Li Nguoi Dung</h4>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>UserId</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Gender</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $users = $_SESSION["users"];

                foreach ($users as $user) {
                ?>
                    <tr class="tr_render">
                        <td data-name="user_id"><?php echo $user['user_id']; ?></td>
                        <td contenteditable="true" data-name="username"><?php echo $user['username']; ?></td>
                        <td data-name="email"><?php echo $user['email']; ?></td>
                        <td contenteditable="true" data-name="phone"><?php echo $user['phone']; ?></td>
                        <td contenteditable="true" data-name="address"><?php echo $user['address']; ?></td>
                        <td contenteditable="true" data-name="gender"><?php echo $user['gender']; ?></td>
                        <td>
                            <form method="POST" style="display:inline;" action="handle.php">
                                <input type="hidden" name="user_id" value="<?php echo $user['user_id']; ?>">
                                <input type="hidden" name="type" value="delete">
                                <button type="submit" name="delete" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                            <form method="POST" style="display:inline;" action="handle.php">
                                <input type="hidden" name="user_id" value="<?php echo $user['user_id']; ?>">
                                <button type="button" name="delete" class="btn btn-update btn-primary btn-sm">Update</button>
                            </form>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <div class="mt-5">
            <h3 class="text-center">Thong Tin User</h3>
            <form method="POST" action="handle.php">
                <div class="row">
                    <div class="form-group col-6 mt-2">
                        <label for="user_id">User ID</label>
                        <input type="text" class="form-control" id="user_id" name="user_id" placeholder="Nhập User ID" required>
                    </div>
                    <div class="form-group col-6 mt-2">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Nhập Username" required>
                    </div>
                    <div class="form-group col-6 mt-2">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Nhập Email" required>
                    </div>
                    <div class="form-group col-6 mt-2">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Nhập Số điện thoại" required>
                    </div>
                    <div class="form-group col-6 mt-2">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Nhập Địa chỉ" required>
                    </div>
                    <div class="form-group col-6 mt-2">
                        <label>Gender</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="male" name="gender" value="male" required>
                            <label class="form-check-label" for="male">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="female" name="gender" value="female" required>
                            <label class="form-check-label" for="female">Female</label>
                        </div>
                    </div>
                </div>
                <input type="text" name="type" value="insert" hidden>
                <button type="submit" class="btn btn-primary mt-2">Insert</button>
            </form>
        </div>
    </div>
    <script>
        const trRender = document.querySelectorAll(".tr_render");

        trRender.forEach(element => {
            element.addEventListener("click", async function(e) {
                if (e.target.closest(".btn-update")) {
                    const trData = element.querySelectorAll("td[data-name]");
                    const dataObject = {
                        type: "update"
                    };
                    trData.forEach(td => {
                        dataObject[td.dataset.name] = td.textContent;
                    })

                    const formData = new URLSearchParams(dataObject);
                    try {

                        const Res = await fetch('handle.php', {
                            method: 'POST',
                            headers: {
                                'Accept': 'application/json',
                                'Content-Type': 'application/x-www-form-urlencoded'
                            },
                            body: formData.toString()
                        });

                        const response = await Res.json();
                        alert(response.message);
                    } catch (Error) {
                        console.log(Error);
                    }
                }
            })
        })
    </script>
</body>

</html>