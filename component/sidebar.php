<div class="sidebar" style="background: rgba( 0, 0, 0, 0.30 );
box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
backdrop-filter: blur( 10.0px );
-webkit-backdrop-filter: blur( 10.0px );

border-right: 1px solid rgba( 255, 255, 255, 0.18 );

" >
    <div class="sidebar__top">
        <a class="sidebar__logo" href="user_page.php">
            <img class="sidebar__pic" src="img/logo1.svg" alt="" />
        </a>
        <button class="sidebar__burger"></button>
        <button class="sidebar__close" style="background:none;font-size:x-large;color:#aeb0c2">
            <i  class="fal fa-times"></i>
        </button>
    </div>
    <div class="sidebar__wrapper">
        <div class="sidebar__inner">
            <div class="sidebar__group">
                <div class="sidebar__caption caption-sm">เมนู<span>ต่างๆ</span></div>
                <div class="sidebar__menu">
                    <!--a class="sidebar__item 
                        <?php
                            if($_SERVER['PHP_SELF'] == "/user_page.php" ){
                                echo "active";
                            }else{
                                echo "";
                            }
                        ?>
                        " href="user_page.php">
                        <div style="font-size:22px;padding:0px 18px 0px 14px">
                            <i class="fal fa-home-alt"></i>
                        </div>
                        <div class="sidebar__text">หน้าแรก</div>
                    </!--a-->
                    <a class="sidebar__item 
                        <?php
                            if($_SERVER['PHP_SELF'] == "/ranking.php" ){
                                echo "active";
                            }else{
                                echo "";
                            }
                        ?>
                        " href="ranking.php">
                        <div style="font-size:22px;padding:0px 16px 0px 15px">
                            <i class="fal fa-trophy"></i>
                        </div>
                        <div class="sidebar__text">จัดอันดับ</div>
                    </a>
                    <a class="sidebar__item 
                        <?php
                            if($_SERVER['PHP_SELF'] == "/detail.php" ){
                                echo "active";
                            }else{
                                echo "";
                            }
                        ?>
                        " href="detail.php?id=<?php echo $_SESSION['student_id']?>">
                        <div style="font-size:22px;padding:0px 18px 0px 17px">
                            <i class="fal fa-heart"></i>
                        </div>
                        <div class="sidebar__text">
                            รายละเอียดหัวใจ
                        </div>
                    </a>
                    <a class="sidebar__item 
                        <?php
                            if($_SERVER['PHP_SELF'] == "/student4.php" ){
                                echo "active";
                            }else{
                                echo "";
                            }
                        ?>
                        " href="student4.php">
                        <div style="font-size:22px;padding:0px 20px 0px 18px">
                            <i class="fal fa-user"></i>
                        </div>
                        <div class="sidebar__text">รายชื่อนักเรียน ม.4</div>
                    </a>
                    <a class="sidebar__item 
                        <?php
                            if($_SERVER['PHP_SELF'] == "/student5.php" ){
                                echo "active";
                            }else{
                                echo "";
                            }
                        ?>
                        " href="student5.php">
                        <div style="font-size:22px;padding:0px 20px 0px 18px">
                            <i class="fal fa-user"></i>
                        </div>
                        <div class="sidebar__text">รายชื่อนักเรียน ม.5</div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="sidebar__bottom">
        <a class="sidebar__item signout" href="./process/logout.php">
            <div style="font-size:22px;padding:0px 15px 0px 3px">
                <i class="fal fa-sign-out-alt"></i>
            </div>
            <div class="sidebar__text ">ออกจากระบบ</div>
        </a>
    </div>
</div>
