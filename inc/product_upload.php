<link rel="stylesheet" href="../ONLINE_MARKETPLACE/res/css/product_upload.css">

<div class="centered-box">
  <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1 bonner">
    <h1 id="meinTitel">Product Upload</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div>
            <span>Uploading files</span><br>
            <span class="glyphicon glyphicon-menu-down"></span>
            <span>Click to select the file</span><br>
            <span class="glyphicon glyphicon-menu-down"></span>
            <input id="lefile" type="file" style="display:none"><br>
            <input type="file" name="file" class="fileinput">
            <h5>! Picture Only !</h5>
        </div>
        <div>
            <span>Product Name</span><span class="red">*</span><br>
            <input type="text" name="name">
        </div>
        <div>
            <span>Product Description</span><span class="red">*</span><br>
            <textarea id="text" name="description" rows="5" cols="22"></textarea>
        </div>
        <div>
            <span>Product Price</span><span class="red">*</span><br>
            <input type="text" name="price">
        </div>
        <div>
            <span>Product Category</span><span class="red">*</span><br>
            <label>
                <input type="radio" name="category" value="Electronics"> Electronics
            </label>
            <label>
                <input type="radio" name="category" value="Clothing"> Clothing
            </label>
            <label>
                <input type="radio" name="category" value="Books"> Books
            </label>
            <!-- Add more radio buttons for additional categories if needed -->
        </div>
        <div>
            <button type="submit" class="btn btn-primary butten">Upload</button>
        </div>
    </form>
  </div>
</div>

<?php
include_once 'config/dbaccess.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_name = $_POST['name'];
    $product_description = $_POST['description'];
    $product_price = $_POST['price'];
    $product_category = $_POST['category'];

    // Validate and sanitize the form data
    // ...

    // Check if a file is uploaded
    if (isset($_FILES['file'])) {
        $file = $_FILES['file'];

        // Get file details
        $file_name = $file['name'];
        $file_tmp = $file['tmp_name'];
        $file_size = $file['size'];
        $file_error = $file['error'];

        // Check for file upload errors
        if ($file_error == 0) {
            // Set the file destination
            $file_destination = "res/img/" . $file_name;

            // Move the file to the destination
            if (move_uploaded_file($file_tmp, $file_destination)) {
                // Insert the product details into the database
                $sql = "INSERT INTO `product` (`product_name`, `product_description`, `product_image`, `product_price`, `category_id`) VALUES (?, ?, ?, ?, ?)";
                $stmt = mysqli_prepare($conn, $sql);
                mysqli_stmt_bind_param($stmt, "sssss", $product_name, $product_description, $file_name, $product_price, $product_category);
                mysqli_stmt_execute($stmt);

                echo "<script>alert('File uploaded successfully!');location.href='../index.php';</script>";
            } else {
                echo 'Error moving file to destination';
            }
        } else {
            echo "<script>alert('Error uploading file!');history.back();</script>";
        }
    } else {
        $sql = "INSERT INTO `product` (`product_name`, `product_description`, `product_image`, `product_price`, `category_id`) VALUES (?, ?, '1', ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ssss", $product_name, $product_description, $product_price, $product_category);
        mysqli_stmt_execute($stmt);

        echo "<script>alert('File uploaded successfully!');location.href='../index.php';</script>";
    }

    mysqli_close($conn);
}
?>
