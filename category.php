<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
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
                    <a class="nav-link active" aria-current="page" href="category.php">Категории</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="checkout.php">Заказ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i><span id="cart-item" class="badge badge-danger"></span></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Navbar end -->

<!-- Displaying Products Start -->
<div class="container">
    <div class="sort mt-2">
        <form method="post">
            <input type="submit" class="btn btn-outline-success" value="Все" name="all">
            <input type="submit" class="btn btn-outline-success" value="Телефоны" name="telephones">
            <input type="submit" class="btn btn-outline-success" value="Планшеты" name="pads">
        </form>
    </div>
    <div class="row mt-2 pb-3">
        <?php
        require "config.php";
        if (isset($_POST['all'])) {
            $sql = "SELECT * FROM product";
            $result = $conn -> query($sql);

            if ($result -> num_rows > 0) {
                while ($row=mysqli_fetch_assoc($result)){
                    echo'
        <div class="col-sm-6 col-md-4 col-lg-3 mb-2">
            <div class="card-deck">
                <div class="card p-2 border-secondary mb-2">
                    <img src="'.$row["product_image"].'" alt="" class="card-img-top" height="250">
                    <div class="card-body p-1">
                        <h4 class="card-title text-center text-info">'.$row["product_name"].'</h4>
                        <h5 class="card-text text-center text-danger"><i class="fas fa-rupee-sign"></i>&nbsp;&nbsp;'.number_format($row["product_price"], 2).'</h5>
                    </div>
                    <div class="card-footer p-1">
                        <form action="" class="form-submit">
                            <div class="row p-2">
                                <div class="col-md-6 py-1 pl-4">
                                    <b>Количество: </b>
                                </div>
                                <div class="col-md-6">
                                    <input type="number" min="0" max="10" class="form-control pqty" value="'.$row["product_qty"].'">
                                </div>
                            </div>
                            <input type="hidden" class="pid" value="'.$row["id"].'">
                            <input type="hidden" class="pname" value="'.$row["product_name"].'">
                            <input type="hidden" class="pprice" value="'.$row["product_price"].'">
                            <input type="hidden" class="pimage" value="'.$row["product_image"].'">
                            <input type="hidden" class="pcode" value="'.$row["product_code"].'">
                            <button class="btn btn-info btn-block addItemBtn"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Добавить в корзину</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>';
                }
            }
        }

        if (isset($_POST['telephones'])) {
            $sql = "SELECT * FROM product where product_category = 'telephones'";
            $result = $conn -> query($sql);

            if ($result -> num_rows > 0) {
                while ($row=mysqli_fetch_assoc($result)){
                    echo'
        <div class="col-sm-6 col-md-4 col-lg-3 mb-2">
            <div class="card-deck">
                <div class="card p-2 border-secondary mb-2">
                    <img src="'.$row["product_image"].'" alt="" class="card-img-top" height="250">
                    <div class="card-body p-1">
                        <h4 class="card-title text-center text-info">'.$row["product_name"].'</h4>
                        <h5 class="card-text text-center text-danger"><i class="fas fa-rupee-sign"></i>&nbsp;&nbsp;'.number_format($row["product_price"], 2).'</h5>
                    </div>
                    <div class="card-footer p-1">
                        <form action="" class="form-submit">
                            <div class="row p-2">
                                <div class="col-md-6 py-1 pl-4">
                                    <b>Количество: </b>
                                </div>
                                <div class="col-md-6">
                                    <input type="number" min="0" max="10" class="form-control pqty" value="'.$row["product_qty"].'">
                                </div>
                            </div>
                            <input type="hidden" class="pid" value="'.$row["id"].'">
                            <input type="hidden" class="pname" value="'.$row["product_name"].'">
                            <input type="hidden" class="pprice" value="'.$row["product_price"].'">
                            <input type="hidden" class="pimage" value="'.$row["product_image"].'">
                            <input type="hidden" class="pcode" value="'.$row["product_code"].'">
                            <button class="btn btn-info btn-block addItemBtn"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Добавить в корзину</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>';
                }
            }
        }

        if (isset($_POST['pads'])) {
            $sql = "SELECT * FROM product where product_category = 'pads'";
            $result = $conn -> query($sql);

            if ($result -> num_rows > 0) {
                while ($row=mysqli_fetch_assoc($result)){
                    echo'
        <div class="col-sm-6 col-md-4 col-lg-3 mb-2">
            <div class="card-deck">
                <div class="card p-2 border-secondary mb-2">
                    <img src="'.$row["product_image"].'" alt="" class="card-img-top" height="250">
                    <div class="card-body p-1">
                        <h4 class="card-title text-center text-info">'.$row["product_name"].'</h4>
                        <h5 class="card-text text-center text-danger"><i class="fas fa-rupee-sign"></i>&nbsp;&nbsp;'.number_format($row["product_price"], 2).'</h5>
                    </div>
                    <div class="card-footer p-1">
                        <form action="" class="form-submit">
                            <div class="row p-2">
                                <div class="col-md-6 py-1 pl-4">
                                    <b>Количество: </b>
                                </div>
                                <div class="col-md-6">
                                    <input type="number" min="0" max="10" class="form-control pqty" value="'.$row["product_qty"].'">
                                </div>
                            </div>
                            <input type="hidden" class="pid" value="'.$row["id"].'">
                            <input type="hidden" class="pname" value="'.$row["product_name"].'">
                            <input type="hidden" class="pprice" value="'.$row["product_price"].'">
                            <input type="hidden" class="pimage" value="'.$row["product_image"].'">
                            <input type="hidden" class="pcode" value="'.$row["product_code"].'">
                            <button class="btn btn-info btn-block addItemBtn"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Добавить в корзину</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>';
                }
            }
        }
        ?>
    </div>
</div>
<!-- Displaying Products End-->
<script src="./js/code.jquery.com_jquery-3.7.1.min.js"></script>
<script src="js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>