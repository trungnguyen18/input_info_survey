<?php
//kiểm tra người dùng đã ấn đăng nhập chưa
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
        header("location: index.html");
     }else{
        $error['account'] = 'Tài khoản hoặc mật khẩu không đúng !!';
     }   
    }
}
?>