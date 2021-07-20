<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>|| DPST MISSIONS ||</title>
    <link rel="stylesheet" href="./assets/style.css">
    <?php include('./component/link.php')?>
</head>
<body style="background-image:url('./img/background1.jpg');
	background-size:cover;">

    <div class="col-xl-12">
        <div class="container ">
        <div class="container-fluid p-5" style="background:white;border-radius:10px;max-width:500px;margin-top:100px">
        <p align="center">
        <img src="./img/default.png" style="max-width:40%" class="img-fluid" alt="">
        </p>
        <h1 align="center" style="font-weight:700;color:#42495b">พสวท.สมทบ</h1>
        <hr>
            <form action="./process/login.php" method="post">
            <label for="exampleFormControlInput1" class="form-label">เลขประจำตัวนักเรียน</label>
            <input class="form-control form-control-lg" name="username" type="text" placeholder="XXXXX" >
            <input style="font-family:'Kanit'" class="form-control form-control-lg btn btn-primary mt-3" name="submit" type="submit" value="ลงชื่อเข้าใช้" >

        </form>
        </div>
        <p style="font-weight:normal;color:white" class="mt-3" align="center">
        © 2021 All Rights Reserved - DPST SOMTOB 09<br>
238 ถนนพระปกเกล้า ตำบลศรีภูมิ อำเภอเมือง จังหวัดเชียงใหม่ 50200
        </p>
    </div>
    </div>
    <?php include('./component/linkjs.php') ?>
</body>
</html>
