<!-- 用户管理页面 Seite der Benutzerverwaltung -->

<link rel="stylesheet" href="../ONLINE_MARKETPLACE/res/css/usermanagement.css">

<div class="col-md-12 col-md-offset-0 bonner">
<h1><strong>User Information Management</strong></h1>
<h5>Modify user profile or !!! password !!! Please click to modify</h5>
<h5>[modify] Modify user personal information</h5>
<h5>[state] Modify user activity</h5>
<h5>[set admin][cancal admin] set administrator</h5>
    <table border="1" cellspacing="0" cellpadding="10" style="border-collapse:collapse" align ="center" width="95%">
        <tr>
            <td>ID</td>
            <td>E-mail address</td>
            <td>First Name</td>
            <td>Last Name</td>
            <td>Address</td>
            <td>Admin</td>
            <td>state</td>
            <td>Set Up</td>
        </tr>
        <?php
        //连接数据库，检索所有用户数据
        //Verbindung zur Datenbank herstellen und alle Benutzerdaten abrufen
            include_once "config/dbaccess.php";
            $sql = "SELECT * from `users` order by `user_id` desc";
            $result = mysqli_query($conn, $sql);
            $i = 1;
            while ($info = mysqli_fetch_array($result))
            //从数据库中抓取数据数组，储存在变量中，并循环输出每一个条目
            //Greift auf ein Array von Daten aus der Datenbank zu, speichert es in einer Variablen und führt eine Schleife durch jeden Eintrag, um ihn auszugeben
            {
        ?>
        <tr>
            <td><?php echo $i;?></td>
            <td><?php echo $info['email'];?></td>
            <td><?php echo $info['first_name'];?></td>
            <td><?php echo $info['last_name'];?></td>
            <td><?php echo $info['shipping_address'];?></td>
            <td><?php echo $info['admin']?'Yes':'No';?></td>
            <td><?php echo $info['state']?'Active':'Not';?></td>
            <td>
                <a href="./?site=usermodify&email=<?php echo $info['email'];?>">[modify]</a>  
                <!--传递当前条目用户名到信息修改页面-->
                <!--Übergabe des Benutzernamens des aktuellen Eintrags an die Seite zur Änderung der Informationen-->
            <?php if($info['email'] <> 'admin@admin.com') {?> <a 
                href="javascript:state(<?php echo $info['user_id'];?>, '<?php echo $info['email']; ?>', <?php echo $info['state'];?>);">[state]</a>
                <!-- 判断用户是否是超级管理员，如果是则不能修改此属性。传递当前条目的id，用户名和活跃到脚本，用来查询和更改用户活跃属性 -->
                <!-- Bestimmt, ob der Benutzer ein Superadmin ist; wenn ja, kann dieses Attribut nicht geändert werden. Übergibt die ID, den Benutzernamen und das Active des aktuellen Eintrags an das Skript, das zur Abfrage und Änderung des Active-Attributs des Benutzers verwendet wird -->
                <?php 
            }
            else
            {
                //如果用户是超级管理员，则不能修改活跃度或者设置取消管理员权限
                //Wenn der Benutzer ein Superadministrator ist, ist es nicht möglich, die aktiven Rechte zu ändern oder den Entzug der Administratorrechte einzustellen.
                echo '<span style="color: gray">[state]</span>';
            }
                //判断用户是否是管理员
                //Feststellen, ob der Benutzer ein Administrator ist
                if($info['admin'])
                {
                    if ($info['email'] <> 'admin@admin.com')
                    {
                ?>
                <a href="inc/setadmin.php?action=0&id=<?php echo $info['user_id'];?>">[cancel admin]</a>  
                <!--传递当前条目用户id和action值到修改管理员脚本-->
                <!--Übergeben Sie die Benutzerkennung des aktuellen Eintrags und den Aktionswert an das Skript "Administrator ändern-->
                <?php
                    }
                    else
                    {
                        //如果用户是超级管理员，则不能修改活跃度或者设置取消管理员权限
                        //Wenn der Benutzer ein Superadministrator ist, ist es nicht möglich, die aktiven Rechte zu ändern oder den Entzug der Administratorrechte einzustellen.
                        echo '<span style="color: gray">[cancel admin]</span>';
                    }
                }else{
                if ($info['email'] <> 'admin@admin.com')
                    {
                ?>
                <a href="inc/setadmin.php?action=1&id=<?php echo $info['user_id'];?>">[set admin]</a>
                <?php
                    }
                    else
                    {
                        //如果用户是超级管理员，则不能修改活跃度或者设置取消管理员权限
                        //Wenn der Benutzer ein Superadministrator ist, ist es nicht möglich, die aktiven Rechte zu ändern oder den Entzug der Administratorrechte einzustellen.
                        echo '<span style="color: gray">[set admin]</span>';
                    }
                } 
                ?>
            </td>
        </tr>
        <?php
            $i++;
            }
        ?>
    </table>
<h4>WARNING: PERFORM WITH CAUTION</h4>
</div>
<script>
    //通过js实现转跳到活跃度修改脚本，并传递用户信息到脚本
    //einen Sprung zum Skript zur Aktivitätsänderung über js implementieren und Benutzerinformationen an das Skript übergeben
    function state (id, email, state)
    {
        if (confirm('Are you sure you want to modify the active status of user ' + email + ' ?'))
        {
            location.href='inc/statususer.php?id=' + id + '&email=' + email + '&state=' +state;
        }
    }
</script>