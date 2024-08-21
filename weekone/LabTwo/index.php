<?php
include "./Model/Product.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab Two</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</head>

<body>
    <?php include 'header.php' ?>
    <div class="container mt-5">
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
                $db = new Product();
                $products =  $db->query("select * from products")->fetchAll(PDO::FETCH_ASSOC);
                foreach ($products as $product) {
                ?>
                    <tr>
                        <td><?php echo $product["product_id"] ?></td>
                        <td><?php echo $product["pro_name"] ?></td>
                        <td><?php echo number_format($product["pro_price"], 0, '', ','); ?> VNĐ</td>
                        <td>
                            <form action="cart.php" method="POST">
                                <input type="hidden" name="type" value="insert">
                                <input type="hidden" name="product_id" value="<?php echo $product["product_id"] ?>">
                                <input type="hidden" name="pro_name" value="<?php echo $product["pro_name"] ?>">
                                <input type="hidden" name="pro_price" value="<?php echo $product["pro_price"] ?>">
                                <input type="number" name="quantity" value="1" min="1" class="form-control d-inline w-50">
                                <button type="submit" class="btn btn-primary">Add to Cart</button>
                            </form>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <div class="mt-3" style="display: flex; justify-content: center;">
            <a href="cart.php" class="btn btn-danger">View Cart</a>
        </div>
    </div>
</body>

</html>