<!-- header -->
<header id="header">
    <!-- top header -->
    <div class="top-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6"><span><i class="fa fa-phone"></i> (04) 6674 2332</span>
                    <span><i class="fa fa-envelope-o"></i> <a href="mailto:support@mail.com">support@mail.com</a></span>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 customer">
                    <?php if(isset($_SESSION["customer_email"])): ?>
                        <a href="index.php?controller=account&action=orders">Xin chào <?php echo $_SESSION["customer_email"]; ?></a>&nbsp;&nbsp;
                    <a href="index.php?controller=account&action=logout">Đăng xuất</a>
                    <?php else: ?>
                        <a href="index.php?controller=account&action=login">Đăng nhập</a>&nbsp; &nbsp;
                        <a href="index.php?controller=account&action=register">Đăng ký</a>
                    <?php endif;?>
                </div>
                </div>
        </div>
    </div>
    <!-- end top header -->
    <!-- middle header -->
    <div class="mid-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3 logo "><a href="index.html"> <img
                                src="assets/frontend/100/047/633/themes/517833/assets/logo221b.png?1481775169361"
                                alt="DKT Store" title="DKT Store" class="img-responsive"> </a></div>
                <div class="col-xs-12 col-sm-12 col-md-6 header-search">
                    <!--<form method="post" id="frm" action="">-->
                    <div style="margin-top:25px;" class="search">
                        <input type="text" style="position: relative;" value="" id="key" placeholder="Nhập từ khóa tìm kiếm..." class="input-control">
                        <button style="margin-top:5px;" type="submit"><i class="fa fa-search" onclick="return search();"></i></button>
                    </div>
                    <div class="smart-search">
                        <ul>
                            <li><img src="http://localhost/php54/session17/php54_project/assets/upload/products/1615813174_132195017985165066_1.jpg"><a href="#">18-Macbook Pro 16 Touch Bar 2.6GHz Core</a></li>
                            <li><img src="http://localhost/php54/session17/php54_project/assets/upload/products/1615813174_132195017985165066_1.jpg"><a href="#">18-Macbook Pro 16 Touch Bar 2.6GHz Core</a></li>
                            <li><img src="http://localhost/php54/session17/php54_project/assets/upload/products/1615813174_132195017985165066_1.jpg"><a href="#">18-Macbook Pro 16 Touch Bar 2.6GHz Core</a></li>
                        </ul>
                    </div>
                    <style>
                        .smart-search{
                            position: absolute;
                            width: 100%;
                            background: white;
                            z-index: 1;
                            display: none;
                            height: 350px;
                            overflow: scroll;
                        }
                        .smart-search ul{
                            padding: 0px;
                            margin: 0px;
                            list-style: none;
                        }
                        .smart-search ul li{
                            border-bottom: 1px solid #dddddd;
                        }
                        .smart-search img{
                            width: 70px;
                            margin-right: 5px;
                        }
                    </style>
                    <script type="text/javascript">
                        $(document).ready(function(){
                            $(".search").keyup(function(){
                                var strKey = $("#key").val();
                            //    ham trim() cat khoang trang trai phai cua chuoi
                                if (strKey.trim() == "")
                                    $(".smart-search").attr("style","display:none;");
                                else
                                    $(".smart-search").attr("style","display:block;");
                            //-- su dung ajax de lay du lieu
                                $.get( "index.php?controller=search&action=ajaxSearch&key="+strKey, function( data ) {
                                //    clear data cua the ul
                                    $(".smart-search ul").empty();
                                //    them du lieu
                                    $(".smart-search ul").append(data);
                                });
                            //--
                            });
                        });
                    </script>
                    <!--</form>-->
                </div>
                <?php
                    $numberProduct = 0;
                    if(isset($_SESSION["cart"])){
                        foreach ($_SESSION["cart"] as $value){
                            $numberProduct++;
                        }
                    }
                ?>
                <div class="col-xs-12 col-sm-12 col-md-3 mini-cart">
                    <div class="wrapper-mini-cart"><span class="icon"><i class="fa fa-shopping-cart"></i></span> <a
                                href="cart"> <span class="mini-cart-count"> <?php echo $numberProduct; ?></span> sản phẩm <i
                                    class="fa fa-caret-down"></i></a>
                        <div class="content-mini-cart">
                            <div class="has-items">
                                <ul class="list-unstyled">
                                    <?php if (isset($_SESSION["cart"])): ?>
                                        <?php foreach ($_SESSION["cart"] as $product): ?>
                                            <li class="clearfix" id="item-1853038">
                                                <div class="image"><a href="index.php?controller=product&action=detail&id=<?php echo $product["id"]; ?>"> <img
                                                                alt="<?php echo $product["name"]; ?>"
                                                                src="assets/upload/products/<?php echo $product["photo"]; ?>"
                                                                title="<?php echo $product["name"]; ?>"
                                                                class="img-responsive"> </a></div>
                                                <div class="info">
                                                    <h3><a href="#"><?php echo $product["name"]; ?></a>
                                                    </h3>
                                                    <p><?php echo $product["number"]; ?> x <?php echo number_format($product["price"]); ?>đ</p>
                                                </div>
                                                <div><a href="index.php?controller=cart&action=delete&id=<?php echo $product["id"];?>"> <i class="fa fa-times"></i></a></div>
                                            </li>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </ul>
                                <a href="/Cart/Checkout" class="button">Thanh toán</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end middle header -->
        <!-- bottom header -->
        <div class="bottom-header">
            <div class="container">
                <div class="clearfix">
                    <?php
                    //                        load MVC bang tay
                    include "controllers/ControllerCategories.php";
                    $obj = new ControllerCategories();
                    $obj->index();
                    ?>
                    <a href="javascript:void(0);" class="toggle-main-menu hidden-md hidden-lg"> <i
                                class="fa fa-bars"></i> </a>
                    <ul class="list-unstyled mobile-main-menu hidden-md hidden-lg" style="display:none">
                        <li class="active"><a href="index.php">Trang chủ</a></li>
                        <li><a href="#">Giới thiệu</a></li>
                        <li><a href="index.php?controller=tintuc">Tin tức</a></li>
                        <li><a href="index.php?controller=lienhe">Liên hệ</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- end bottom header -->
</header>
<!-- end header -->