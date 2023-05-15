<?php
session_start();
ob_start();
    if(isset($_POST['btn_login'])){
        //thuật toán phất cờ
        $error = array();
        if(empty($_POST['username'])){
            $error['username'] = 'Không được để trống trường tên đăng nhập'; 
        }else{
            $pattern = '/^[A-Za-z0-9_\.]{6,32}$/';
            if(!preg_match($pattern,$_POST['username'],$matches)){
                $error['username'] = 'username yêu cầu ký tự chữ, số,.., từ 6 đến 32 ký tự';
            }else{
                $username = $_POST['username'];
            }
        }
    
        if(empty($_POST['password'])){
            $error['password'] = 'Không được để trống trường mật khẩu';
        }else{
            $pattern = '/^([\w_\.!@#$%^&*()]+){6,31}$/';
            if(!preg_match($pattern,$_POST['password'],$matches)){
                $error['password'] = 'password yêu cầu ký tự chữ, số,.., từ 6 đến 32 ký tự';
            }else{
                $password = $_POST['password'];
            }
        }
    
        if(empty($error)){
            //echo 'Xử lý login';
            $data = array(
                'username' => 'khaosat',
                'password' => 'A@khaosat123'
            );
         if(($username == $data['username']) && $password == $data['password']){
            $_SESSION['is_login'] = true;
            header("location: index.php");
         }else{
            $error['account'] = 'Tài khoản hoặc mật khẩu không đúng !!';
         }   
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Đăng Nhập</title>
</head>
<style>
    #wrapper{
        width: 560px;
        margin: 100px auto;
    }
    @media (max-width: 576px) {
        #wrapper{
            width: 376px;
            margin: 100px auto;
        }
        #wrapper .title{
            font-size: 24px;
            font-weight: bold;
            text-transform: uppercase;
            margin-top: 20px;
        }
    }

        .error{
            color: #f00;
        }
</style>
<body>
    <div id="wrapper">
        <h1  class="title" style="text-align: center;">Đăng Nhập</h1>
        <?php if(!empty($error['account'])) echo "<p class='error'>{$error['account']}</p>" ?>
        <form action="" method="POST">
            <div class="form-group">
                <label for="">Tên Tài Khoản</label>
                <input type="text" class="form-control" name="username" id="">
                <?php if(!empty($error['username'])) echo "<p class='error'>{$error['username']}</p>" ?>
            </div>
            <div class="form-group">
                <label for="">Mật Khẩu</label>
                <input type="password" class="form-control" name="password" id="">
                <?php if(!empty($error['password'])) echo "<p class='error'>{$error['password']}</p>" ?>
            </div>
            <div class="form-group" style="text-align: center;">
                <input type="submit" class="btn btn-primary"  name="btn_login" id="" value="Đăng Nhập">
            </div>
        </form>
    </div>
</body>
</html>