<?php
include("../Database/database.php");

try {


    // Fetch filtered products
    $stmt = $conn->prepare("SELECT * FROM products WHERE item_tag = 'package'");
    $stmt->execute();
    $result_filter = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/shop.css?v=2">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>
<body>
   
    <!-- ... Your existing HTML code ... -->

    <section>
        <div class="filter-side">
            <p>Filter Products</p>
            <!-- Update your filter links with PHP -->
            <a href="../Filter/Chair.php" class="filter-page"><div><i class="fa-solid fa-square-check"></i> Chair</div></a>
            <a href="../Filter/Room.php" class="filter-page"><div><i class="fa-solid fa-square-check"></i> Room</div></a>
            <a href="../Filter/Package.php" class="filter-page"><div><i class="fa-solid fa-square-check"></i> Package</div></a>
            <a href="../Filter/Table.php" class="filter-page"><div><i class="fa-solid fa-square-check"></i> Table</div></a>
        </div>
        <div class="products-side">
            <?php
            if ($result_filter) {
                foreach ($result_filter as $rows) {
            ?>
                    <a href="../Views/Product.php?id=<?php echo $rows["id"] ?>">
                        <div class="product">
                            <img src="<?php echo $rows["image"] ?>" alt="" class="img" width="280px" height="400px">
                            <div class="item_name" style="font-size: 20px; position: relative; top: 10px; color: black">
                                <?php echo $rows["item_name"] ?>
                            </div>
                            <div class="item_price" style="font-weight: bold; position: relative; top: 15px; color: black">
                                <?php echo "$" . " " .  $rows["item_price"] ?>
                            </div>
                        </div>
                    </a>
            <?php
                }
            }
            ?>
        </div>
    </section>

    <!-- ... Your existing HTML code ... -->

</body>
</html>
