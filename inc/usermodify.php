<!-- 用户信息修改页 Seite zum Ändern von Benutzerinformationen -->

<link rel="stylesheet" href="../Online_Marketplace/res/css/usermodify.css">

<?php
include_once "../Online_Marketplace/config/dbaccess.php";
$username = $_GET['email'] ?? '';
if ($username)  
//存在username则是管理员修改用户信息，使用get从用户管理页面获取需要修改信息用户的username
//Das Vorhandensein des Benutzernamens bedeutet, dass der Administrator die Benutzerinformationen ändert,Verwenden Sie get, um den Benutzernamen des Benutzers zu erhalten, der die Informationen auf der Benutzerverwaltungsseite ändern muss.
{
    $sql = "SELECT * from `users` where binary `email` = '$username'";
}
else
{
    $sql = "SELECT * from `users` where binary `email` = '".$_SESSION['username']."'";
}
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result))
{
    $info = mysqli_fetch_array($result);
    //储存从数据库获取的用户资料
    //Speicherung von Benutzerinformationen in der Datenbank
}
else
{
    echo "<script>alert('User information not found ! ! !'); history.back(); </script>";
}
?>

<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1 bonner">
    <h1>Personal information</h1>
    <form action="inc/post_modify.php" method="post" onsubmit="return check()">
        <div>
            <span>E-mail address</span><br>
            <span>----- <?php echo $info['email'];?> -----</span>
            <input type="hidden" id="email" name="email" value="<?php echo $info['email']; ?>">
            <!-- 设置隐藏的username，方便数据传递到后端时对用户信息的修改，作为查询条件 -->
            <!-- Versteckten Benutzernamen einstellen, um die Änderung von Benutzerinformationen als Abfragebedingung zu erleichtern, wenn Daten an das Backend übergeben werden -->
        </div>
        
        <div>
            <span>First Name</span><br>
            <input type="text" id="first_name" name="first_name" value="<?php echo $info['first_name']; ?>">
        </div>
        <div>
            <span>Last Name</span><br>
            <input type="text" id="last_name" name="last_name" value="<?php echo $info['last_name']; ?>">
        </div>

        <?php
            if ($_SESSION['isAdmin'] != 1) {
                //如果当前用户不是管理员，则需要输入旧密码，正确时才可以修改密码，如果是管理员修改用户密码则不需要显示此处文本框
                // Wenn der aktuelle Benutzer kein Administrator ist, müssen Sie das alte Kennwort eingeben und dürfen es nur ändern, wenn es korrekt ist. Das Textfeld muss nicht angezeigt werden, wenn das Passwort des Benutzers vom Administrator geändert wird.
            ?>
            <div>
                <span>Old Password</span><br>
                <input type="Password" id="OPassword" name="OPassword"><br>
                <span class="text">If you want to change your password<br>please fill in the old password first</span><br>
            </div>
            <?php
            }
        ?>

        <div>
            <span>New Password</span><br>
            <input type="Password" id="NPassword" name="NPassword"><br>
            <span class="text">If you do not change the password<br>you do not need to fill in the password</span><br>
        </div>
        <div>
            <span>Confirm Password</span><br>
            <input type="Password" id="CPassword" name="CPassword">
        </div>
        <div>
            <button type="submit" class="btn btn-primary butten" formaction="inc/post_modify.php">Revise</button>
        </div>
    </form>
</div>

<script>
    //检查表单输入数据的正确性，验证输入是否符合要求，所有数据确认无误后才会从前端传递到后端
    //Prüfung der Korrektheit der Formulareingabedaten, Überprüfung, ob die Eingabe den Anforderungen entspricht und ob alle Daten als korrekt bestätigt wurden, bevor sie vom Frontend an das Backend weitergeleitet werden
        function check() {
            let first_name = document.getElementsByName('first_name')[0].value.trim();
            let last_name = document.getElementsByName('last_name')[0].value.trim();
            let Email = document.getElementsByName('email')[0].value.trim();
            let OPassword = document.getElementsByName('OPassword')[0].value.trim();
            let NPassword = document.getElementsByName('NPassword')[0].value.trim();
            let CPassword = document.getElementsByName('CPassword')[0].value.trim();
            //验证输入数据，同时去除用户错误输入的空格
            // Validierung der Eingabedaten und Entfernen von Leerzeichen, die vom Benutzer falsch eingegeben wurden
            let FirstNameReg = /^[a-zA-Z0-9]{3,10}$/;
            if (!FirstNameReg.test(FirstName)) {
                alert('First Name is required and can only use upper and lower case letters and is 3 to 10 characters long !');
                return false;
            }
            let LastNameReg = /^[a-zA-Z0-9]{3,10}$/;
            if (!LastNameReg.test(LastName)) {
                alert('Last Name is required and can only use upper and lower case letters and is 3 to 10 characters long !');
                return false;
            }
            let EmailaddressReg = /^[a-zA-Z0-9_\-]+@([a-z A-Z 0-9]+\.)+(com|cn|net|org)$/;
            if (Emailaddress.length > 0) {
                //因为邮箱不是必填，所以先检查邮箱是否有输入
                // Stellen Sie sicher, dass die E-Mail-Adresse zuerst eingegeben wird, da sie nicht erforderlich ist.
                if (!EmailaddressReg.test(Emailaddress)) {
                    alert('Incorrect mailbox format ! ! !');
                    return false;
                }
            }
            let PasswordReg = /^[a-zA-Z0-9_*]{6,10}$/;
            if (OPassword.length > 0)
            {
                if (!PasswordReg.test(NPassword)) {
                    alert('Password is required and can only be composed of upper and lower case letters and numbers and _ *, 6 to 10 characters long !');
                    return false;
                }
                else {
                    if (NPassword != CPassword)
                    {
                        alert('Password and confirmation password must be the same ! ! !');
                        return false;
                    }
                }
            }
            return ture;
        }
    </script>