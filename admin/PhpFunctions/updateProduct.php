<?php
$productId = $_GET['id'];
include("connection.php");

$select = "SELECT * FROM products WHERE id = $productId";
$query = $connection->query($select);
$prod = $query->fetch_assoc();

if (isset($_POST)) {
    $name = $_POST["name"];
    $price = $_POST["price"];
    $sale = $_POST["sale"];
    $new = $_POST["new"];
    $count = $_POST["count"];
    $brand = $_POST["brand"];
    $category = $_POST["category"];
    $discribtion = $_POST["discribtion"];
    $views = 0;
}

if ($_FILES['image']['error'] == UPLOAD_ERR_OK) {
    $oldImage = $prod['image'];
    $temp = $_FILES['image']['tmp_name'];
    $imgName = $_FILES['image']['name'];

    $extensions = ['jpg', 'png', 'gif', 'jpeg', "webp", "avif"];
    $ext = explode('.', $imgName);
    $ext = end($ext);

    if (in_array($ext, $extensions)) {
        if ($_FILES['image']['size'] < 2000000) {
            $newName = md5(uniqid()) . "." . $ext;
            unlink("../images/$oldImage");
            move_uploaded_file($temp, "../images/$newName");
        } else {
            echo "file size is too big";
            exit();
        }
    } else {
        echo "<h2 class='txt-c'>wrong extension</h2>";
        exit();
    }
} else {
    $newName = $prod['image'];
}

$updateQuery = "UPDATE products SET name=?, price=?, describtion=?, count=?, brand=?, category=?, new=?, sale=?, image=? WHERE id=?";
$stmt = $connection->prepare($updateQuery);

if (!$stmt) {
    die("Error in SQL query: " . $connection->error);
}

$stmt->bind_param("sssisiiisi", $name, $price, $discribtion, $count, $brand, $category, $new, $sale, $newName, $productId);

if ($stmt->execute()) {
    $stmt->close();
    $connection->close();
    header("location:../products.php");
    exit();
} else {
    echo "Update failed: " . $stmt->error;
}
?>