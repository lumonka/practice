<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Practice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php"><i class="fas fa-mobile-alt"></i>&nbsp;&nbsp;Mobile Store</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Главная</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="category.php">Категории</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="checkout.php">Заказ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="cart.php"><i class="fas fa-shopping-cart"></i><span id="cart-item" class="badge badge-danger"></span></a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div style="display: <?php if (isset($_SESSION['showAlert'])) {
                echo $_SESSION['showAlert'];
            } else {
                echo 'none';
            } unset($_SESSION['showAlert']) ?>" class="alert alert-success alert-dismissible mt-3"><button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong><?php if (isset($_SESSION['message'])) {
                    echo $_SESSION['message'];
                    } unset($_SESSION['showAlert']);?></strong>
            </div>
            <div class="table-responsive mt-2">
                <table class="table table-bordered table-striped text-center">
                    <thead>
                    <tr>
                        <td colspan="7">
                            <h4 class="text-center text-info m-0">Корзина</h4>
                        </td>
                    </tr>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>
                            <a href="action.php?clear=all" class="badge-danger badge p-1" onclick="return confirm('Очистить корзину?');"><i class="fas fa-trash"></i>&nbsp;&nbsp;Очистить корзину</a>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?
                    require 'config.php';
                    $stmt = $conn -> prepare('SELECT * FROM cart');
                    $stmt -> execute();
                    $result = $stmt -> get_result();
                    $grand_total = 0;
                    while ($row = $result -> fetch_assoc()):
                    ?>
                    <tr>
                        <td><?=$row['id']?></td>
                        <input type="hidden" class="pid" value="<?=$row['id']?>">
                        <td><img src="<?=$row['product_image'] ?>" width="50"></td>
                        <td><?=$row['product_name'] ?></td>
                        <td>
                            <i class="fas fa-rupee-sign"></i>&nbsp;&nbsp;<?=number_format($row['product_price'], 2) ?>
                        </td>
                        <input type="hidden" class="pprice" value="<?=$row['product_price'] ?>">
                        <td>
                            <input type="number" min="0" max="10" class="form-control itemQty" value="<?=$row['qty'] ?>" style="width: 75px">
                        </td>
                        <td><i class="fas fa-rupee-sign"></i>&nbsp;&nbsp;<?=number_format($row['total_price'], 2) ?></td>
                        <td>
                            <a href="action.php?remove=<?=$row['id'] ?>" class="text-danger lead" onclick="return confirm('Удалить из корзины?');"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    <?php $grand_total += $row['total_price']; ?>
                    <?endwhile;?>
                    <tr>
                        <td colspan="3">
                            <a href="index.php" class="btn btn-success"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Продолжить покупки</a>
                        </td>
                        <td colspan="2"><b>Общая сумма</b></td>
                        <td><b><i class="fas fa-rupee-sign"></i>&nbsp;&nbsp;<?=number_format($grand_total, 2); ?></b></td>
                        <td>
                            <a href="checkout.php" class="btn btn-info <?=($grand_total) > 1 ? '' : 'disabled'; ?>"><i class="far fa-credit-card"></i>&nbsp;&nbsp;Заказать</a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="js/script.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>