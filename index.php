<?php
if(isset($_GET['action'])) {
	$products = simplexml_load_file('data/database.xml');
	$id = $_GET['id'];
	$index = 0;
	$i = 0;
	foreach($products->product as $product){
		if($product['id']==$id){
			$index = $i;
			break;
		}
		$i++;
	}
	unset($products->product[$index]);
	file_put_contents('data/database.xml', $products->asXML());
}
$products = simplexml_load_file('data/database.xml');?>
<div align="center">
  <a href="add.php" class = "plants_name">Add new product</a>
</div>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&family=Nunito:wght@700&family=Poppins:wght@500&family=Raleway:wght@500&family=Work+Sans:wght@400;500&display=swap" rel="stylesheet">
    <title>Kembang Flower Mantap</title>
</head>

<body class="full">

    <div class="intro">

        <div><img class="mantap_pic" src="images/Mask Group.png"></div>

        <div class="header">
            <nav class="header_items">
                <a href="#" class="header_icons header_icon"><img src="images/search 1.svg"></a>
                <a href="#" class="header_icons header_icon"><img src="images/shopping-cart 1.svg"></a>

                <a href="#" class="header_text_items header_text1 button1">Sign Up</a>
                <a href="#" class="header_text_items header_text2 button2">Sign In</a>
            </nav>

            <div class="mantap_container">

                <h1 class="mantap_title">
                    Kembang Flower Mantap
                </h1>

                <p class="mantap_descr">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                </p>
            </div>
        </div>

    </div>


    <section class="section">
        <div class="container">


            <div class="advantage">
                <div class="advantage_item">
                    <div class="advantage_inside">
                        <div class="advantage_name">
                            <div class="advantage_name_img"><img src="images/fast 1.svg" alt=""></div>
                            <h2 class="advantage_name_text">Fast <br>Delivery</h2>
                        </div>
                        <p class="advantage_descr">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard
                        </p>
                    </div>
                </div>

                <div class="advantage_item">
                    <div class="advantage_inside">
                        <div class="advantage_name">
                            <div class="advantage_name_img"><img src="images/headphones 1.svg" alt=""></div>
                            <h2 class="advantage_name_text">Great Customer <br>Service</h2>
                        </div>
                        <p class="advantage_descr">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard
                        </p>
                    </div>
                </div>

                <div class="advantage_item">
                    <div class="advantage_inside">
                        <div class="advantage_name">
                            <div class="advantage_name_img"><img src="images/plant 1.svg" alt=""></div>
                            <h2 class="advantage_name_text">Original <br>Plants</h2>
                        </div>
                        <p class="advantage_descr">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard
                        </p>
                    </div>
                </div>

                <div class="advantage_item">
                    <div class="advantage_inside">
                        <div class="advantage_name">
                            <div class="advantage_name_img"><img src="images/dollar-symbol 1.svg" alt=""></div>
                            <h2 class="advantage_name_text">Affordable <br>Price</h2>
                        </div>
                        <p class="advantage_descr">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard
                        </p>
                    </div>
                </div>
            </div>


        </div>
    </section>

    <section class="plants">

        <div class="plants_header">
            <h2 class="plants_header_text">Featured Plants</h2>
        </div>

        <div class="plants_wrapper">
            <div class="plants_container">
							<?php
							 require_once "config.php";
							 $sql = "SELECT * FROM products";
							 if($result = mysqli_query($link, $sql)){
								 while($row = mysqli_fetch_array($result)) { ?>
									 <div class="plants_card">
	                   <a href="update.php?id=<?php echo $row['id']; ?>" class="plants_name">
	                     edit
	                   </a>
	                   <a href="delete.php?id=<?php echo $row['id']; ?>" class="plants_name">
	                     delete
	                   </a>
	                     <a href="#" class="plants_card_link">
	                         <div class="plants_img"><img src="<?php echo $row['image']; ?>" alt=""></div>
	                         <div class="plants_info">
	                           <p></p>
	                             <h3 class="plants_name"><?php echo $row['name']; ?></h3>
	                             <p class="plants_price"><?php echo $row['price']; ?> $</p>
	                         </div>
	                     </a>
	                 </div> <?php
								 }
							 }
							 mysqli_free_result($result);
							 mysqli_close($link);
							?>
            </div>
        </div>
    </section>

    <section class="relax">
        <div class="relax_info">
            <div class="relax_info_text">
                <h2 class="relax_info_text_header">
                    Buy more plants, it helps you to be relaxed</h2>
                <p class="relax_info_text_p">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi gravida gravida aliquam. Pellentesque et lobortis nisl. Sed et mauris justo. Nulla eu enim non mauris maximus dignissim. Maecenas vitae eros sapien. Quisque pellentesque tempus dignissim.</p>
            </div>
            <img class="relax_pic_1" src="images/relax/Mask Group2.png"> </img>
        </div>
        <img class="relax_pic_2" src="images/relax/Mask Group.png"> </img>
    </section>


    <section class="visit">
        <div class="visit_bg">
            <div class="visit_info">
                <h2 class="visit_info_header">Get your favourites plant on our shop now</h2>
                <a href="#" class="visit_info_btn">
                    <p class="visit_info_btn_text">Visit Shop</p>
                </a>
            </div>
            <img class="visit_pic" src="images/visit/Mask Group.png">
        </div>
    </section>

    <div class="line"></div>

    <footer class="footer">
        <div class="footer_inside">
            <div class="footer_plantku">
                <h4 class="footer_plantku_h">plantku</h4>
                <h5 class="h5">Plantku House</h5>
                <a href="#" class="footer_plantku_adress">
                    Jl. Laksda Adisucipto No.51, Demangan, Kec. Depok, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55282
                </a>
            </div>
            <div class="Perusahaan">
                <h6 class="h6">Perusahaan</h6>
                <a href="#" class="footer_link">Tentang Kami</a>
                <a href="#" class="footer_link">Hubungi Kami</a>
            </div>
            <div class="Produk">
                <h6 class="h6">Produk</h6>
                <div class="produk_inside">
                    <a href="#" class="footer_link">Tanaman</a>
                    <a href="#" class="footer_link">Tanaman Lain</a>
                </div>
            </div>
            <div class="Email_Kami">
                <h6 class="email_header">Berlangganan Email Kami</h6>
                <div class="email_box">
                    <p class="Masukan Alamat Email">Masukan Alamat Email</p>
                </div>
                <a href="#" class="submit_btn">
                    <p class="submit">Submit</p>
                </a>
            </div>
        </div>
    </footer>
