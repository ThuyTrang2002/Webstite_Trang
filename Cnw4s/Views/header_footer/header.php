<style>
    .logo img {
        max-width: 100%; /* Đảm bảo hình ảnh không vượt quá chiều rộng của div cha */
        height: auto; /* Giữ cho tỷ lệ khung hình khi thu nhỏ */
        width: auto\9; /* Fix cho IE8 */
        max-height: 70px; /* Đặt chiều cao tối đa của hình ảnh */
    }
    .header {
    max-width: 1200px; /* Thay đổi giá trị này thành độ rộng mong muốn */
    margin: 0 auto; /* Canh giữa header trong trang */
}

/* Đặt độ rộng của logo trong header (nếu cần) */
.header .logo img {
    max-width: 100%;
    height: auto;
    width: auto\9;
    max-height: 70px;
}
</style>

<!--Search Form Drawer-->
<div class="search">
    <div class="search__form">
        <form class="search-bar__form" action="?act=shop" method="post">
            <button class="go-btn search__button" type="submit"><i class="icon anm anm-search-l"></i></button>
            <input class="search__input" type="text" name="keyword" value="" placeholder="Search entire store..." aria-label="Search" autocomplete="on">
        </form>
        <button type="button" class="search-trigger close-btn"><i class="anm anm-times-l"></i></button>
    </div>
</div>
<!--End Search Form Drawer-->
<!--Top Header-->
<div class="top-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-10 col-sm-8 col-md-5 col-lg-4">
                <div class="currency-picker">
                    </ul>
                </div>
              
            </div>
            <div class="col-sm-4 col-md-4 col-lg-4 d-none d-lg-none d-md-block d-lg-block">
            </div>
            <div class="col-2 col-sm-4 col-md-3 col-lg-4 text-right">
                <span class="user-menu d-block d-lg-none"><i class="anm anm-user-al" aria-hidden="true"></i></span>
                <ul class="customer-links list-inline">
                        <?php  if(isset($_SESSION['login'])){ ?>
                          <li><a href="?act=wishlist">❤</a></li>
                        <li><a href="?act=taikhoan&xuli=account">Welcome <?=$_SESSION['login']['Ho']?> <?=$_SESSION['login']['Ten']?></a></li>
                        <li><a href="?act=taikhoan&xuli=dangxuat">Log Out</a></li>
                      <?php
                    }else{ ?>
                          <li><a href="?act=taikhoan">Login</a></li>
                      
                        <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--End Top Header-->
<!--Header-->
<div class="header-wrap animated d-flex">
    <div class="container-fluid">
        <div class="row align-items-center">
            <!--Desktop Logo-->
            <div class="logo col-md-2 col-lg-2 d-none d-lg-block">
                <a href="index.html">
                    <img src="assets/images/logo2.png" alt="Belle Multipurpose Html Template" title="Belle Multipurpose Html Template" />
                </a>
            </div>
            <!--End Desktop Logo-->
            <div class="col-2 col-sm-3 col-md-3 col-lg-8">
                <div class="d-block d-lg-none">
                    <button type="button" class="btn--link site-header__menu js-mobile-nav-toggle mobile-nav--open">
                        <i class="icon anm anm-times-l"></i>
                        <i class="anm anm-bars-r"></i>
                    </button>
                </div>
                <!--Desktop Menu-->
                <nav class="grid__item" id="AccessibleNav"><!-- for mobile -->
                    <ul id="siteNav" class="site-nav medium center hidearrow">
                        <li class="lvl1 parent megamenu"><a href="?act=home">Home <i class="anm anm-angle-down-l"></i></a></li>
                        <li class="lvl1 parent megamenu"><a href="?act=shop">Shop <i class="anm anm-angle-down-l"></i></a></li>
                        <li class="lvl1 parent dropdown"><a href="?act=about">About <i class="anm anm-angle-down-l"></i></a></li>
                        <li class="lvl1 parent dropdown"><a href="?act=compare">Compare <i class="anm anm-angle-down-l"></i></a></li>
                  </ul>
                </nav>
                <!--End Desktop Menu-->
            </div>
          
            <!--Mobile Logo-->
            <?php
            $count = 0 ; $sluong = 0;
            if (isset($_SESSION['sanpham'])) {
                foreach ($_SESSION['sanpham'] as $value) {
                    $count += $value['ThanhTien'];
                    $sluong+=$value['SoLuong'];
                }
            }
             ?>
            <div class="col-4 col-sm-3 col-md-3 col-lg-2">
                <div class="site-cart">
                    <a href="#" class="site-header__cart" title="Cart">
                        <i class="icon anm anm-bag-l"></i>
                        <span id="CartCount" class="site-header__cart-count" data-cart-render="item_count"><?=number_format($sluong)?></span>
                    </a>




                    <!--Minicart Popup-->
                    <div id="header-cart" class="block block-cart">
                        <ul class="mini-products-list">
                          <?php
                                 if (isset($_SESSION['sanpham'])) {
                                           foreach ($_SESSION['sanpham'] as $value) { ?>
                            <li class="item">
                                <a class="product-image" href="?act=detail&id=<?= $value['MaSP'] ?>">
                                    <img src="assets/<?= $value['HinhAnh1'] ?>" alt="" title="" />
                                </a>
                                <div class="product-details">
                                    <a href="?act=cart&xuli=deleteall&id=<?= $value['MaSP'] ?>" class="remove"><i class="anm anm-times-l" aria-hidden="true"></i></a>
                                    <a href="#" class="edit-i remove"><i class="anm anm-edit" aria-hidden="true"></i></a>
                                    <a class="pName" href="?act=detail&id=<?= $value['MaSP'] ?>"><?= $value['TenSP'] ?> </a>
                                    
                                    <div class="wrapQtyBtn">
                                        <div class="qtyField">
                                            <span class="label">Qty:</span>
                                            <a class="qtyBtn minus" href="?act=cart&xuli=delete&id=<?=$value['MaSP']?>"><i class="fa anm anm-minus-r" aria-hidden="true"></i></a>
                                            <input type="text" id="Quantity" name="quantity" value="<?= $value['SoLuong'] ?>" class="product-form__input qty">
                                            <a class="qtyBtn plus" href="?act=cart&xuli=update&id=<?=$value['MaSP']?>"><i class="fa anm anm-plus-r" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="priceRow">
                                        <div class="product-price">
                                            <span class="money"><?= number_format($value['ThanhTien']) ?> VND</span>
                                        </div>
                                     </div>
                                </div>
                            </li>
                          <?php }
                          } ?>


                        </ul>
                        <?php if(isset($_SESSION['sanpham']) && $_SESSION['sanpham']!=null){ ?>
                        <div class="total">
                            <div class="total-in">

                                <span class="label">Cart Subtotal:</span><span class="product-price"><span class="money"> <?=number_format($count,0)?> VND</span></span>
                            </div>
                             <div class="buttonSet text-center">
                                <a href="?act=cart" class="btn btn-secondary btn--small">View Cart</a>
                                <a href="?act=checkout" class="btn btn-secondary btn--small">Checkout</a>
                            </div>
                        </div>
                      <?php }else{ ?>
                        <div class="total">
                          <span><strong>Your cart is empty</strong></span>
                        </div>
                      <?php } ?>
                    </div>

                </div>
                <div class="site-header__search">
                    <button type="button" class="search-trigger"><i class="icon anm anm-search-l"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End Header-->
<!--Mobile Menu-->
<div class="mobile-nav-wrapper" role="navigation">
    <div class="closemobileMenu"><i class="icon anm anm-times-l pull-right"></i> Close Menu</div>
    <ul id="MobileNav" class="mobile-nav">
      <li class="lvl1 parent megamenu"><a href="?act=home">Home <i class="anm anm-angle-down-l"></i></a></li>
      <li class="lvl1 parent megamenu"><a href="?act=shop">Shop <i class="anm anm-angle-down-l"></i></a></li>
        <li class="lvl1 parent dropdown"><a href="?act=about">About <i class="anm anm-angle-down-l"></i></a></li>

    </li>
  </ul>
</div>
<!--End Mobile Menu-->

<!--Body Content-->
<div id="page-content">