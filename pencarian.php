<!--A Design by W3layouts 
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
session_start();
require_once 'config/koneksi.php';
require_once 'config/functions.php';

$keyword = trim(mysqli_real_escape_string($conn, $_GET['keyword']));
$semuaData = [];
if (!empty($keyword)) {
    $query = "SELECT * FROM tb_barang WHERE nama LIKE '%$keyword%'";
    $ambil = mysqli_query($conn, $query) or die(mysqli_error($conn));
    while ($pecah = mysqli_fetch_assoc($ambil)) {
        $semuaData[] = $pecah;
    }
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Pencarian | TokoLineEFD</title>
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<!--theme-style-->
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="paneladmin/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
	<!--//theme-style-->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!--fonts-->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
	<!--//fonts-->
	<script src="js/jquery.min.js"></script>


	<!--script-->
</head>

<body>
	<!--header-->
	<div class="header">
		<div class="top-header">
			<div class="container">
				<div class="top-header-left">
					<ul class="support">
						<li><a href="#"><label> </label></a></li>
						<li><a href="#">24x7 Chat<span class="live"> Bantuan</span></a></li>
					</ul>
					<ul class="support">
						<li class="van"><a href="#"><label> </label></a></li>
						<li><a href="#">Gratis Ongkir <span class="live">Pesanan diatas Rp.500.000 | Repost by <a href='#' title='EFD' target='_blank'>EFD</a></span></a></li>
					</ul>
					<div class="clearfix"> </div>
				</div>
				<div class="top-header-right">
					<div class="down-top">
						<!-- <select class="in-drop">
							<option value="English" class="in-of">English</option>
							<option value="Japanese" class="in-of">Japanese</option>
							<option value="French" class="in-of">French</option>
							<option value="German" class="in-of">German</option>
						</select> -->
					</div>
					<div class="down-top top-down">
						<!-- <select class="in-drop">

							<option value="Dollar" class="in-of">Dollar</option>
							<option value="Yen" class="in-of">Yen</option>
							<option value="Euro" class="in-of">Euro</option>
						</select> -->
					</div>
					<!---->
					<div class="clearfix"> </div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="bottom-header">
			<div class="container">
				<div class="header-bottom-left">
					<div class="logo">
						<a href="<?= base_url(); ?>"><img src="images/logo.png" alt=" " /></a>
					</div>
					<!-- <div class="search">
						<input type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}">
						<input type="submit" value="SEARCH">

					</div> -->
					<div class="search">
						<form action="pencarian.php" method="get">
							<input type="text" name="keyword">
							<button type="submit" class="btn btn-primary">Cari</button>
						</form>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="header-bottom-right">
					<!-- <div class="account"><a href="login.html"><span> </span>YOUR ACCOUNT</a></div> -->
					<?php if (isset($_SESSION['username'])) : ?>
						<ul class="login">
							<li><a href="<?= base_url('paneladmin/index.php'); ?>"><span> </span>USER</a></li> |
							<li><a href="<?= base_url('paneladmin/logout.php'); ?>"><i class="fa fa-sign-out"></i> LOGOUT</a></li>
						</ul>
					<?php else : ?>
						<ul class="login">
							<li><a href="<?= base_url('paneladmin/index.php'); ?>"><span> </span>MASUK</a></li> |
							<li><a href="<?= base_url('paneladmin/index.php'); ?>">DAFTAR</a></li>
						</ul>
					<?php endif; ?>
					<!-- <div class="cart"><a href="#"><span> </span>KERANJANG</a></div> -->
					<div class="cart"><a href="<?= base_url('paneladmin/index.php'); ?>"><span> </span></a></div>
					<div class="clearfix"> </div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!---->
	<!-- start content -->
	<div class="container">

		<div class="women-product">
			<div class=" w_content">
				<div class="women">
					<?php if (empty($semuaData)) : ?>
						<h4><b><?= $keyword; ?></b> Tidak ditemukan - <span>0 items</span> </h4>
					<?php else : ?>
						<h4><b><?= $keyword; ?></b> Barang Ditemukan - <span><?= count($semuaData); ?> items</span> </h4>
					<?php endif; ?>
					<ul class="w_nav">
						<li>Sort : </li>
						<li><a class="active" href="#">popular</a></li> |
						<li><a href="#">new </a></li> |
						<li><a href="#">discount</a></li> |
						<li><a href="#">price: Low High </a></li>
						<div class="clearfix"> </div>
					</ul>
					<div class="clearfix"> </div>
				</div>
			</div>
			<!-- grids_of_4 -->
			<div class="grid-product">

				<?php foreach ($semuaData as $key => $value) : ?>
					<div class="product-grid">
						<div class="content_box"><a href="single.php?id=<?= $value['kd_barang']; ?>">
								<div class="left-grid-view grid-view-left">
									<img src="paneladmin/modul/produk/img/<?= $value['foto']; ?>" class="img-responsive watch-right" alt="" />
									<div class="mask">
										<div class="info">Quick View</div>
									</div>
							</a>
						</div>
						<h5><a href="single.php?id=<?= $value['kd_barang']; ?>"><?= $value['nama']; ?></a></h5>
						<p>It is a long established fact that a reader</p>
						Rp. <?= number_format($value['hrg_jual'], 2, ",", "."); ?>
					</div>
			</div>
		<?php endforeach; ?>
		<div class="clearfix"> </div>
		</div>
	</div>
	<div class="sub-cate">
		<?php require_once 'menu.php'; ?>
	</div>
	<div class="clearfix"> </div>
	</div>
	<!---->
	<div class="footer">
		<div class="footer-top">
			<div class="container">
				<div class="latter">
					<h6>SURAT-BERITA</h6>
					<div class="sub-left-right">
						<form>
							<input type="text" value="Enter email here" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter email here';}" />
							<input type="submit" value="SUBSCRIBE" />
						</form>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="latter-right">
					<p>FOLLOW US</p>
					<ul class="face-in-to">
						<li><a href="#"><span> </span></a></li>
						<li><a href="#"><span class="facebook-in"> </span></a></li>
						<div class="clearfix"> </div>
					</ul>
					<div class="clearfix"> </div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="footer-bottom">
			<div class="container">
				<div class="footer-bottom-cate">
					<h6>KATEGORI</h6>
					<ul>
						<?php
						$menu = mysqli_query($conn, "SELECT * FROM tb_kategori") or die(mysqli_error($conn));
						while ($row = mysqli_fetch_assoc($menu)) { ?>
							<li><a href="product.php?id=<?= $row['id_kategori']; ?>"><?= $row['nama_kategori']; ?></a></li>
						<?php } ?>
					</ul>
				</div>
				<div class="footer-bottom-cate bottom-grid-cat">
					<h6>FEATURE PROJECTS</h6>
					<ul>
						<li><a href="#">Curabitur sapien</a></li>
						<li><a href="#">Dignissim purus</a></li>
						<li><a href="#">Tempus pretium</a></li>
						<li><a href="#">Dignissim neque</a></li>
						<li><a href="#">Ornared id aliquet</a></li>
						<li><a href="#">Ultrices id du</a></li>
						<li><a href="#">Commodo sit</a></li>
					</ul>
				</div>
				<div class="footer-bottom-cate">
					<h6>BRANDING TERBAIK</h6>
					<ul>
						<li><a href="#">Curabitur sapien</a></li>
						<li><a href="#">Dignissim purus</a></li>
						<li><a href="#">Tempus pretium</a></li>
						<li><a href="#">Dignissim neque</a></li>
						<li><a href="#">Ornared id aliquet</a></li>
						<li><a href="#">Ultrices id du</a></li>
						<li><a href="#">Commodo sit</a></li>
						<li><a href="#">Urna ac tortor sc</a></li>
						<li><a href="#">Ornared id aliquet</a></li>
						<li><a href="#">Urna ac tortor sc</a></li>
						<li><a href="#">Eget nisi laoreet</a></li>
						<li><a href="#">Faciisis ornare</a></li>
					</ul>
				</div>
				<div class="footer-bottom-cate cate-bottom">
					<h6>ALAMAT KAMI</h6>
					<ul>
						<li>Jl.Joyoboyo</li>
							<li>Kediri, Jawa Timur</li>
							<li>No. 491.</li>
							<li class="phone">PH : 082332963807</li>
							<li class="temp">
								<p class="footer-class">Design by <a href="#" target="_blank">EFD</a> </p>
							</li>
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
</body>

</html>