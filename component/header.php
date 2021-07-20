<?php

    $sql = "SELECT
    pv.nick_name
    FROM
    nickname AS pv
    ORDER BY
    CONVERT( pv.nick_name USING tis620 ) ASC";
    $result = mysqli_query($conn, $sql);
    $php_list = '';
    foreach ($result as $key => $val){
        $php_list .= "'".$val['nick_name']."', ";
    }
    /********************************** เก็บค่ารายชื่อจังหวัดทั้งหมดไว้ในตัวแปร ************************************************/
    $php_list = substr($php_list,0, strlen($php_list) - 2);
?>
<div class="header" style="background: rgba( 0, 0, 0, 0.30 );
                            box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
                            backdrop-filter: blur( 10.0px );
                            -webkit-backdrop-filter: blur( 10.0px );
                            border-bottom: 1px solid rgba( 255, 255, 255, 0.18 );
">
    <button class="header__burger"></button>
    <form action="./process/search.php" method="post" class="header__search" style="text-align:center;font-size:larger">
        <input style="font-family:'Kanit';font-weight:500;font-size:large;color:#aeb0c2" id="auto1" name="name"
            class="header__input" type="text" placeholder="ค้นหารายชื่อ" />
        <button type="submit" name="search" class="header__btn-search" style="background:none;z-index:1000">
            <i class="fas fa-search"></i>
        </button>
    </form>

    <div class="header__control">
        <a class="header__item header__item_search" href="#">
            <i class="fas fa-search" style="font-size:large;color:#aeb0c2"></i>
        </a>
    </div>

    <div class="header__item header__item_profile">
        <a class="header__head" href="#">
            <img class="header__pic" 
                src="./img/<?php
                    if($_SESSION['level'] == 4){
                        echo "mm4/square/". $_SESSION['number']. ".jpg";
                    }else if($_SESSION['level'] == 5){
                        echo "m5/square/". $_SESSION['number']. ".jpg";
                    }
                ?>"
            />
        </a>
        <div class="header__body">
            <a class="header__link" href="./detail.php?id=<?php echo $_SESSION['student_id'] ?>">
                <div class="header__img">
                    <i class="fal fa-user"></i>
                </div>
                โปรไฟล์
            </a>
            <a class="header__link signout" href="./process/logout.php">
                <div class="header__img">
                    <i class="fal fa-sign-out-alt"></i>
                </div>
                ออกจากระบบ
            </a>
        </div>
    </div>
</div>

<button class="btn " onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-chevron-up"></i></button>

<script>
//Get the button
var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {
    scrollFunction()
};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        mybutton.style.display = "block";
    } else {
        mybutton.style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
</script>

<script>
var province = [<?php echo $php_list?>];

$('#auto1').autocomplete({
    source: [province],
    limit: 10
});
</script>