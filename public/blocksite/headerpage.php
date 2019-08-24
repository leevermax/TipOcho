<?php
	session_start();
	if(!isset($_SESSION["idUser"])){
		$_SESSION["idUser"] = "";
	}
    if(!isset($_SESSION["tongTien"])){
		$_SESSION["tongTien"] = 0;
	}
	if(!isset($_SESSION["uuDai"])){
		$_SESSION["uuDai"] = 0;
	}
	if(!isset($_SESSION["spDaXem"])){
		$_SESSION["spDaXem"] = array();
	}
	if(!isset($_SESSION["spGioHang"])){
		$_SESSION["spGioHang"] = array();    
	}
	if (!isset($_SESSION["completePay"])) {
		$_SESSION["completePay"] = 0;
	}

	if (!isset($_SESSION["donHangInfo"])) {
		$_SESSION["donHangInfo"] = array();
	}
	if (!isset($_SESSION["uuDaiList"])) {
		$_SESSION["uuDaiList"] = array();
	}

	define ("funNavbar", "../server/class/class_menunavbar.php");
	define ("funSanPham", "../server/class/class_sanpham.php");

    require funSanPham;
    require funNavbar;

    $menuC1 = new NavbarDropMenu;
	$menuC2 = New SanPham;


	// XOA SẢN PHẨM TRONG GIỎ
	if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['ntnXoaGH']))
    {

        if(isset($_POST["spGhXoa"])){
            $idSpXoa = $_POST["spGhXoa"];
        }
        xoaSP($idSpXoa);


    }
    function xoaSP($idSpXoa)
    {  
        if(count($_SESSION["spGioHang"]) > 0){
            for ($i = 0; $i < count($_SESSION["spGioHang"]); $i++) {
                if($_SESSION["spGioHang"][$i]['sp'] == $idSpXoa){

                    unset($_SESSION["spGioHang"][$i]);
                    $_SESSION["spGioHang"] =  array_values($_SESSION["spGioHang"]);
                    break;
                }
                
            }
        }
    }

    // THEM SAN PHÂM ZÔ GIỎ HÀNG
    echo '<script> window.history.replaceState( null, null, window.location.href ); </script>';
    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btnDatHang']))
    {

        if(isset($_POST["sanPhamGH"])){
            $sanPhamGH = $_POST["sanPhamGH"];
        }
        if(isset($_POST["soLuongGH"])){
            $soLuongGH = $_POST["soLuongGH"];
        }
            themSP($sanPhamGH,$soLuongGH);
            unset($_POST['btnDatHang']);

            

    }

    function themSP($sp,$sl)
    {  
        if(!empty($_SESSION["spGioHang"])){
            for ($i = 0; $i < count($_SESSION["spGioHang"]); $i++) {
                if($_SESSION["spGioHang"][$i]['sp'] == $sp){

                    $_SESSION["spGioHang"][$i]['sl'] += $sl;
                    break;
                }
                if($i == (count($_SESSION["spGioHang"]) - 1)){
                    $spMoiThem = array();
                    $spMoiThem['sp'] = $sp;
                    $spMoiThem['sl'] = $sl;
                    $_SESSION["spGioHang"][] = $spMoiThem; 
                    break;
                }
            }
        } else {
            $spMoiThem = array();
            $spMoiThem['sp'] = $sp;
            $spMoiThem['sl'] = $sl;
            $_SESSION["spGioHang"][] = $spMoiThem; 
        }
    }


    // TÍNH TỔNG TIỀN MUA HÀNG
    $tongMoney = 0;
    if(!empty($_SESSION["spGioHang"])){

        for ($i = 0; $i < count($_SESSION["spGioHang"]); $i++) {
            $spTinhTong = new SanPham;
            $getSpTong = $spTinhTong->chiTietSP($_SESSION["spGioHang"][$i]['sp']);
            $tongMoney += $getSpTong['gia']*$_SESSION["spGioHang"][$i]['sl'];

            
        }
        
    }
    $tongMoneyUuDai = $tongMoney - $_SESSION["uuDai"];

?>

<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

<header class="header container-fluid">
	<div class="container">
		<div class="row row-header">
			<div class="col-12 col-md-5 col-sm-12 left-header">
				<div class="hleft-img hleft-giaohang">
					<span class="hleft-icon"><img src="images/icon/ship.png" alt="giao hàng toàn quốc"></span>
					<span class="hleft-text"> <p>Giao hàng trên<br/>toàn quốc</p></span>
				</div>
				<div class="hleft-img hleft-camket">
					<span class="hleft-icon2"><img src="images/icon/chatluong.png" alt="cam kết chất lượng"></span>
					<span class="hleft-text"><p>Cam kết an toàn<br/>chất lượng</p></span>

				</div>
				<div class="hleft-img hleft-lienhe">
					<span class="hleft-icon2"><img src="images/icon/call.png" alt="liên hệ đặt hàng"></span>
					<span class="hleft-text"><p>Liên hệ đặt hàng<br/><strong>0789 487 559</strong></p></span>
				</div>


			</div>
			<div class="col-12 col-md-2 mid-header">
				<a href="../Home.html"> <img class="img-logo text-center" src="images/logo.png" alt="Bánh Mì Ba Tròn"></a>
			</div>
			<div class="col-12 col-md-5 col-sm-12 right-header">
				<div class="row row-right">
					<div class="col-10 col-md-10  col-search">
						<input class="form-control" type="search" placeholder="Tìm kiếm sản phẩm..." aria-label="Search">
						<a href="#" class="button"> <img src="images/icon/timkiem.png" alt="tìm kiếm"></a>
					</div>
					<div class="col-2 col-md-2 col-cart">
						<div class="dropdown">
							<button class="text-sm-right fas fa-shopping-cart " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

							</button>
							<div class="dropdown-menu dropdown-menu-right drop-cart" aria-labelledby="dropdownMenuButton" style="height: 240px;">
								<div class="row row-pt1">
									<p>Có <span class="number-of-prd"><?php echo count($_SESSION["spGioHang"]) ; ?></span> sản phẩm trong <span class="gio-hang">GIỎ HÀNG</span> </p>
								</div>
								<div class="row row-pt2">

							<?php  
							if(!empty($_SESSION["spGioHang"]) ){
								for ($i = 0; $i < count($_SESSION["spGioHang"]) ; $i++) {
	                            $spInBask = new SanPham;
	                            $idSpInBask = $_SESSION["spGioHang"][$i]['sp'];
	                            $getSpInBask = $spInBask->chiTietSP($idSpInBask);   


							?>



									<div class="row row-line-product-cart" >
										<div class="col-7 col-md-3 col-img-prd">
											<img src="<?php echo $getSpInBask['imgsp1']; ?> " alt="sản phẩm">
										</div>
										<div class="col-7 col-md-7 col-detail">
											<p class="detail-prd-name"><?php echo $getSpInBask['tensp']; ?></p>
											<p class="detail-prd-number"><span class="detail-prd-number-number"><?php echo $_SESSION["spGioHang"][$i]['sl']; ?></span> x <span class="detail-prd-number-price"><?php echo $getSpInBask['gia']; ?>đ</span></p>
										</div>
										<form method="POST">
										<div class="col-2 col-md-2 col-delete">
											<input type="hidden" name="spGhXoa" id="spGhXoa" value="<?php echo $idSpInBask; ?>" >
											<button class="fas fa-trash-alt" type="submit" name="ntnXoaGH" id="ntnXoaGH"></button>
										</div>
										</form>
									</div>
							<?php } } ?>		

									<div class="row row-tam-tinh " style="height: 30px; ">
										<p class="text-center">Tạm tính: <span><?php echo $tongMoneyUuDai;?>đ</span></p>
									</div>

								</div>

								<div class="row row-pt3 ">
									<div class="confirm-pay">
										<a href="../Xem-Gio-Hang.html"><button class="confirm" type="submit">TIẾN HÀNH THANH TOÁN</button></a>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
<nav class="navbar navbar-expand-lg navbar-light bg-light nav-menu text-center">
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse center-menu" id="navbarSupportedContent">
		<ul class=" navbar-nav mx-auto ">
			<li class="nav-item active">
				<a class="nav-link" href="../Home.html">TRANG CHỦ </a>
			</li>


			<li class="nav-item dropdown active">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					ĐẶC SẢN BÌNH ĐỊNH
				</a>
				<div class="dropdown-menu  drpdwn" aria-labelledby="navbarDropdown">
					<ul>
						
						<?php
							

    						$listMenuC1 = $menuC1->getListNavC1();
							for ($i = 0; $i < count($listMenuC1) ; $i++) {
								
							
						?>

						<li> <a class="dropdown-item " href="../<?php echo $listMenuC1[$i]['id'];?>_<?php echo $listMenuC1[$i]['tenkhongdau'];?>.html" ><?php echo $listMenuC1[$i]['tenloai'];?></a>
							<ul>
								<?php

									$idLoaiSP = $listMenuC1[$i]['id'];
									
									$listSP = $menuC2->dsSanPhamTheoLoai($idLoaiSP);
									for ($j = 0; $j < count($listSP) ; $j++) {
										
									
								?>
								<li><a class="" href="../<?php echo $listSP[$j]['titlekhongdau'];?>-<?php echo $listSP[$j]['id'];?>.html"><?php echo $listSP[$j]['tensp'];?></a></li>
								
								<?php
									}
								?>
							</ul>
						</li>
						<?php } ?>

					</ul>
				</div>
			</li>

			<li class="nav-item">
				<a class="nav-link" href="../Am-Thuc-Binh-Dinh.html">ẨM THỰC BÌNH ĐỊNH</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="../Du-Lich-Binh-Dinh.html">DU LỊCH BÌNH ĐỊNH</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="../Bai-Viet-Ve-Shop.html">VỀ SHOP</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="../Lien-He.html">LIÊN HỆ</a>
			</li>


		</ul>

	</div>
</nav>