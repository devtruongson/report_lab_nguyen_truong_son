<?php
include './Controllers/ShoppingCart.php';

$ShoppingCart = new ShoppingCart();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ Hàng Của Bạn</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container py-5">
        <h1 class="mb-4 text-center">Product List</h1>
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Product ID</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $products = $ShoppingCart->contentCart();
                foreach ($products as $product) {

                ?>
                    <tr>
                        <td><?php echo $product["product_id"] ?></td>
                        <td><?php echo $product["product_name"] ?></td>
                        <td><?php echo number_format($product["product_price"], 0, '', ','); ?> VNĐ</td>
                        <td>
                            <form class="d-inline-flex gap-1" action="cart.php" method="POST">
                                <input type="hidden" name="type" value="update">
                                <input type="hidden" name="product_id" value="<?php echo $product["product_id"] ?>">
                                <input type="number" name="quantity" value="<?php echo $product["quantity"] ?>" min="1" class="form-control d-inline w-50">
                                <button type="submit" class="btn btn-primary">Cập Nhật</button>
                            </form>
                            <form class="d-inline-flex gap-1" action="cart.php" method="POST">
                                <input type="hidden" name="type" value="delete">
                                <input type="hidden" name="product_id" value="<?php echo $product["product_id"] ?>">
                                <button type="submit" class="btn btn-warning">Xóa</button>
                            </form>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <p class="text-end">
            Số lượng giỏ hàng <?php echo $ShoppingCart->totalCart(); ?>
        </p>
        <div class="mt-3" style="display: flex; justify-content: center;">
            <a href="index.php" class="btn btn-danger">Danh Sách Sản Phẩm</a>
        </div>
    </div>
</body>

</html>

<?php
if (!empty($_POST)) {
    $type = $_POST["type"];
    $product_id = $_POST["product_id"];
    $pro_name = $_POST["pro_name"];
    $pro_price = $_POST["pro_price"];
    $quantity = $_POST["quantity"];

    switch ($type) {
        case "insert": {
                $ShoppingCart->insertCart($product_id, $pro_name, $pro_price, $quantity);
                ReloadPageMethodGet("Thêm Sản Phẩm Thành Công!");
                break;
            }
        case "update": {
                $ShoppingCart->updateCart($product_id, $quantity);
                ReloadPageMethodGet("Sửa Sản Phẩm Thành Công!");
                break;
            }
        case "delete": {
                $ShoppingCart->deleteCart($product_id);
                ReloadPageMethodGet("Xóa Sản Phẩm Thành Công!");
                break;
            }
    }
}

function ReloadPageMethodGet($msg)
{
?>
    <script>
        alert('<?php echo $msg; ?>');
        window.location.href = window.location.href;
    </script>
<?php
}
?>