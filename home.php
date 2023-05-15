<?php
session_start();
ob_start();
    if(!isset($_SESSION['is_login'])){
        header("location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Khảo Sát Thông Tin 2</title>
</head>
<style>
    #wrapper{
        width: 960px;
        margin: 0px auto;
    }
    @media (max-width: 576px) {
        #wrapper{
            width: 376px;
            margin: 0px auto;
        }
        #wrapper .title{
            font-size: 24px;
            font-weight: bold;
            text-transform: uppercase;
            margin-top: 20px;
        }
    }
</style>
<body>
    <div id="wrapper">
        <h1 class="title" style="text-align: center;">Khảo Sát Thông Tin 2</h1>
        <form action="https://script.google.com/macros/s/AKfycbx4R00NKFhlv9nO69d-mMnFjlX6aG1QooFIj_3gFicDmimTvPI44TRPsa9D7QKvbWZLcA/exec" method="get">
            <div class="form-group">
                <label for="code">Mã Số</label>
                <input type="number" name="mã số" id="code" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="code">Nội Dung Xử lý</label>
                <textarea name="Nội Dung Xử Lý" id="" cols="30" rows="3" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="fullname">Kết Quả</label>
                <textarea name="Kết Quả" id="" cols="30" rows="3" class="form-control" required></textarea>
            </div>
            <input type="hidden" name="Dấu thời gian" id="thoigian" value="">
            <!-- <div class="form-group">
                <label for="address">Địa Chỉ</label>
                <input type="text" name="Địa Chỉ" id="address" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" class="form-control" name="Email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
            </div>

            <div class="form-group">
              <label for="date">Ngày Giờ Nộp</label>
              <input type="datetime-local" class="form-control" name="Ngày Giờ Nộp" id="date" placeholder="" required>
            </div> -->
            <!-- <div class="form-group">
              <label for="date">Ngày Nộp</label>
              <input type="date" class="form-control" name="date"  id="date" placeholder="" required>
            </div> -->
            <a href="index.php">Click để qua form 1.</a>
            <div class="form-group text-center">
                <input class="btn btn-primary dangkybt" id="ss-submit" value="Gửi" name="submit" type="submit">
            </div>
          </form>
    </div>
</body>
<script>
    function thoigiantudong(){
        const t = new Date();
        let h = t.getHours();
        let m = t.getMinutes();
        let s = t.getSeconds();
        let dd = t.getDate();
        let mm = t.getMonth() + 1;
        let yy = t.getFullYear();

        h = format2so(h);
        m = format2so(m);
        s = format2so(s);

        const date = dd + "/" + mm + "/" + yy + "-" + h + ":" + m + ":" + s;
        
        setTimeout(thoigiantudong, 1000);

        let thoigian = document.getElementById('thoigian') ;
        thoigian.setAttribute('value', date);
    }
    thoigiantudong()

    function format2so(x){
        if(x < 10)
            x = "0" + x;
        return x;
    }
</script>
</html>