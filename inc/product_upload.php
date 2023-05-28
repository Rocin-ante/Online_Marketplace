<link rel="stylesheet" href="../ONLINE_MARKETPLACE/res/css/product_upload.css">

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
                <textarea id="text" name="description" rows="5"cols="22">
                </textarea>
            </div>
            <div>
                <span>Product Price</span><span class="red">*</span><br>
                <input type="text" name="price">
            </div>
            <div>
                <button type="submit" class="btn btn-primary butten">Upload</button>
            </div>
        </form>
    </div>

<script>
<?php
include_once 'config/dbaccess.php';

$product_name=$_POST['name'];
$product_description=$_POST['description'];
$product_price=$_POST['price'];
// Stellen Sie fest, ob ein Bild hochgeladen wurde   判断是否有图片上传 
if (empty($_FILES['file']['name']))
{  
  $sql="INSERT INTO `product`(`product_name`,`product_description`,`product_image`,`product_price`) VALUES ('$name','$description','1','price')"; //Erstellen Sie eine SQL-Einfügungsanweisung
  echo "<script>alert('File uploaded successfully !');location.href='../index.php';</script>";                    // 构建 SQL 插入语句
}
else
{
  $file=$_POST['file']; 
  $sql="INSERT INTO `product`(`product_name`,`product_description`,`product_image`,`product_price`) VALUES ('$name','$content','".$_FILES["file"]["name"]."','price')";
  //Überprüfen Sie, ob eine Datei zum Hochladen ausgewählt ist
  // 检查是否选择了要上传的文件
if (isset($_FILES['file'])) {
  //Dateidetails abrufen
  // 获取文件详细信息
  $file = $_FILES['file'];
  $file_name = $file['name'];
  $file_tmp = $file['tmp_name'];
  $file_size = $file['size'];
  $file_error = $file['error'];
  //Überprüfen Sie die hochgeladene Datei auf Fehler
  //  检查上传文件是否有错误
  if ($file_error == 0) {
      //Speichern Sie die hochgeladene Bild in der News-Bilddatei   设置文件的目的地
      $file_destination = "../res/img/" . $_FILES["file"]["name"];

      // 移动文件到目的地
      if (move_uploaded_file($file_tmp, $file_destination)) {
        echo "<script>alert('File uploaded successfully !');location.href='../index.php';</script>";
      } else {
        echo 'Error moving file to destination';
      }
  } else {
    echo  "<script>alert('Error uploading file !');history.back(); </script>";
   }
}
}
mysqli_connect($conn,$sql);    //Insert-Anweisung ausführen      执行插入语句
?>
</script>  