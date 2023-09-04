    <?php 
    include_once 'includes/header.php';
    include_once 'serverside/functions.php';

    $products=""; 

    $func=new Functions();
    $categories =$func->getAllCategories();

    $where = "1=1 ";

    if(isset($_GET['main_category']) || isset($_GET['select_price']) || isset($_GET['product_name'])
        || isset($_GET['sub_category'])){

      if(isset($_GET['main_category'])&&($_GET['main_category']!="")){
        $main_category = $_GET['main_category'];
        $where .= " and main_category = '$main_category'";  
    }

    if(isset($_GET['sub_category'])&&($_GET['sub_category']!="")){
        $sub_category = $_GET['sub_category'];
        $where .= " and sub_category = '$sub_category'";  
    }

    if(isset($_GET['product_name'])&&($_GET['product_name']!="")){
        $product_name = $_GET['product_name'];
        $where .= "and  title  like '%$product_name%' ";
    }

    if(isset($_GET['select_price'])&&($_GET['select_price']!="")){
        $select_price = $_GET['select_price'];
        if($select_price=="low"){
         $where .= "  order by price ASC";

     }else{
         $where .= "  order by price DESC";

     }

 }

 $products=$func->getProducts($where);

}else{

    $products=$func->getAllProducts();

}


?>
<script type="text/javascript">
    <?php if ($_GET['section']) { ?>
        location.hash = <?php echo "'".$_GET['section']."';";
    } ?>
</script>
        <!-- =========================
            Slider Section
            ============================== -->
            <section id="main-slider-section" class="shop-slider-section">
               <div id="shop-slider" class="owl-carousel owl-theme product-review">
                 <div class="item bc-slider-bg">

                    <div class="container">
                       <div class="row">
                          <div class="slider-text col-12">
                             <h1 class="slider-title">Deals for the <span class="strong">Amazing Gamer</span></h1>
                             <p class="slider-content">Comparison Your Product with Best Review from Multi-Vendor Store <br>
                             Hurry to go affiliate on this day successfully with.</p>
                             <!-- <a href="shop-left-sidebar.html" class="btn btn-primary wd-shop-btn slider-btn">
                                Go to store <i class="fa fa-arrow-right" aria-hidden="true"></i>
                            </a> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="item bc-slider-bg-2">

                <div class="container">
                   <div class="row">
                      <div class="slider-text col-12">
                         <h1 class="slider-title">Make your day <span class="strong">Elipkart</span></h1>
                         <p class="slider-content">Comparison Your Product with Best Review from Multi-Vendor Store <br>
                         Hurry to go affiliate on this day successfully with.</p>
                         <!-- <a href="shop-left-sidebar.html" class="btn btn-primary wd-shop-btn slider-btn">
                            Go to store <i class="fa fa-arrow-right" aria-hidden="true"></i>
                        </a> -->
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

        <!-- =========================
            Product Section
            ============================== -->
            <div class="product-view-modal modal fade bd-example-modal-lg-product-1" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                 <div class="modal-content">
    		    <!-- ====================================
    		        Product Details Gallery Section
                  ========================================= -->
                  <div class="row">
                    <div class="product-gallery col-12 col-md-12 col-lg-6">
    				    <!-- ====================================
    				        Single Product Gallery Section
                            ========================================= -->
                            <div class="row">
                              <div class="col-md-12 product-slier-details">
                                 <div id="product-view-model" class="product-view owl-carousel owl-theme">
                                     <!-- <div class="item">
                                        <img src="img/product-img/1661946925-mobile.jpeg" class="img-fluid" alt="Product Img">
                                     </div>  
                                     <div class="item">
                                        <img src="img/product-img/1661946925-mobile.jpeg" class="img-fluid" alt="Product Img">
                                    </div>   -->

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-12 col-md-12 col-lg-6">
                       <div class="product-details-gallery">
                          <div class="list-group">
                             <h4 id="title" class="list-group-item-heading product-title">
                                <!-- Vigo SP111-31N-P2GH Spin 1 -->
                            </h4>
                            <div class="media">
                                <div class="media-left media-middle">
                                   <div id="rating" class="rating">
                                   </div>
                               </div>

                           </div>
                       </div>
                       <div class="list-group content-list">
                         <p><i class="fa fa-dot-circle-o" aria-hidden="true"></i> 100% Original product</p>
                         <p><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Manufacturer Warranty</p>
                     </div>
                 </div>
                 <div class="product-store row">
                    <div class="col-12 product-store-box">
                        <div class="row">
                            <h2>Description</h2>
                            <p id="description">
                                asd adasjd asd asd asda sdas dasd asd asd asdas dasd asd
                            </p>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="compare-btn">
                            <a class="btn btn-primary btn-sm" id="url" target="_blanks" href=""><i class="fa fa-exchange" aria-hidden="true"></i> Buy Now</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>



    </div>
</div>
</div>

<section id="product-amazon" class="product-shop-page product-shop-full-grid">
   <div class="container">
      <div class="row">
             <!-- <div class="col-12">
                <div class="row">
                   <div class="col-4 col-md-2 client-img">
                      <img class="figure-img img-fluid" src="img/client/client-img-1.jpg" alt="">
                  </div>
                  <div class="col-4 col-md-2 client-img">
                      <img class="figure-img img-fluid" src="img/client/client-img-2.jpg" alt="">
                  </div>
                  <div class="col-4 col-md-2 client-img">
                      <img class="figure-img img-fluid" src="img/client/client-img-3.jpg" alt="">
                  </div>
                  <div class="col-4 col-md-2 client-img">
                      <img class="figure-img img-fluid" src="img/client/client-img-4.jpg" alt="">
                  </div>
                  <div class="col-4 col-md-2 client-img">
                      <img class="figure-img img-fluid" src="img/client/client-img-5.jpg" alt="">
                  </div>
                  <div class="col-4 col-md-2 client-img">
                      <img class="figure-img img-fluid" src="img/client/client-img-6.jpg" alt="">
                  </div>
              </div>
          </div> -->
          <div class="col-12 p0 ">
            <div class="page-location">
               <ul>
                  <li><a href="#">
                     Home <span class="divider">/</span>
                 </a></li>
                 <li><a class="page-location-active" href="#">
                     Shop
                     <span class="divider">/</span>
                 </a></li>
             </ul>
         </div>
     </div>
     <div class="order-sm-2 order-md-1  col-12 col-md-4 col-lg-3 ">
    				    <!-- =========================
    				        Search Option
                            ============================== -->
                            <div class="sidebar-search">
                              <div class=" input-group wd-btn-group col-12 p0">
                                 <!-- <form class="form-inline " action="index" method="get"> -->
                                     <input type="text" id="product_name1" name="product_name" class="form-control" placeholder="Search ..." aria-label="Search for...">
                                     <span class="input-group-btn">
                                        <button type="submit" id="search_btn1" class="btn btn-secondary btn-sm wd-btn-search">
                                           <i class="fa fa-search" aria-hidden="true"></i>
                                       </button>
                                   </span>
                                   <!-- </form> -->
                               </div>
                           </div>

    				    <!-- =========================
    				        Category Option
                            ============================== -->
                            <div class="side-bar category category-md">
                              <h5 class="title">Category</h5>
                              <ul class="dropdown-list-menu">
                                <li>
                                    <a href="index"><i class="fa fa-angle-double-right" aria-hidden="true"></i>All</a>
                                </li>
                                <?php
                                foreach($categories as $category){
                                    $subcategory=$func->getSubCategories($category['id']);
                                    ?>
                                    <li class="sidebar-dropdown" id="<?=$category['id']?>">
                                        <a href="index?main_category=<?=$category['id']?>&section=product-amazon"><i class="fa fa-angle-double-right" aria-hidden="true"></i> 
                                            <?=$category['name']?>
                                        </a>
                                        <?php
                                        if(!empty($subcategory)){
                                            ?>
                                            <ul class="dropdown-sub-menu "id = "<?="sub".$category['id']?>">
                                             <?php
                                             foreach($subcategory as $sub){
                                                ?>
                                                <li><a href="index?sub_category=<?=$sub['id']?>&section=product-amazon"><i class="fa fa-angle-right" aria-hidden="true"></i> <?=$sub['name']?></a></li>
                                                <?php
                                            }
                                            ?>
                                        </ul>  
                                        <?php
                                    }

                                    ?>
                                </li>
                                 <!-- <li>
                                    <a href="index?category_id=<=$category['id']?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i><=$category['name']?></a>
                                    </li> -->
                                    <?php
                                }
                                ?>

                            </ul>
                        </div>


                    </div>
                    <div class=" order-sm-1 order-md-2   col-12 col-md-8 col-lg-9 product-grid">
                       <div class="row">
                          <div class="col-12">
                             <div class="filter row">
                                <div class="col-8 col-md-3">
                                   <h6 class="result">Showing <?=count($products)?> results</h6>
                               </div>
                               <div class="col-6 col-md-6 filter-btn-area text-center">
                                  <div class="btn-group" role="group">
                                     <div class="d-flex">
                                        <p>Sort by Price:</p>
                                        <select class="btn btn-secondary btn-sm mx-3 " id="select_price">
                                          <option value="">Default</option>
                                          <option value="low">Low</option>
                                          <option value="high">High</option>
                                      </select>
                                        <!-- <button id="btnGroupDropwdshowingres" type="button" class="btn btn-secondary dropdown-toggle filter-btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Default
                                        </button> -->
                                        <!-- <div class="dropdown-menu" aria-labelledby="btnGroupDropwdshowingres">
                                            <a class="dropdown-item" href="">Low</a>
                                            <a class="dropdown-item" href="#">High</a>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 col-md-3 sorting text-right">
                               <ul class="nav nav-tabs shop-btn" id="myTab" role="tablist">
                                <li class="nav-item ">
                                    <a class="nav-link " id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="fa fa-bars" aria-hidden="true"></i></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><i class="fa fa-th" aria-hidden="true"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="tab-content col-12">
                    <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row">
                            <?php
                            foreach($products as $product){
                                $image_path=$func->getProductImages($product['id']);
                                $img=explode('/', $image_path[0]['image_path']);
                                $ima_path=$img[1]."/".$img[2];

                                ?>
                                <div class="col-12 col-md-6 col-lg-4 reviews-load-more">
                                    <figure class="figure product-box row">
                                        <div class="col-12 col-md-12 col-lg-12 col-xl-12 p0">
                                            <div class="product-box-img">
                                                <a href="#">
                                                    <img src="<?=$ima_path?>" class="figure-img img-fluid" alt="Product Img">
                                                </a>
                                            </div>
                                            <div class="quick-view-btn">
                                                <div class="compare-btn">
                                                    <button type="button" class="viwe_btn btn btn-primary btn-sm" data-toggle="modal" data-product_id="<?=$product['id']?>"
                                                       data-target=".bd-example-modal-lg-product-1"><i class="fa fa-eye" aria-hidden="true"></i> Quick view</button>
                                                   </div>
                                               </div>
                                               <?php
                                               if($product['condition']=='New'){
                                                ?>
                                                <span class="badge badge-secondary wd-badge text-uppercase">New</span>
                                                <?php
                                            }
                                            ?>
                                            <div class="wishlist">

                                            </div>
                                        </div>
                                        <div class="col-12 col-md-12 col-lg-12 col-xl-12 p0">
                                            <div class="figure-caption text-center">
                                                <div class="price-start">
                                                    <p>Price start from   <strong class="active-color">
                                                        <u>$<?=$product['price']?></u> <!-- - <u>$75.00</u> --></strong></p>
                                                    </div>
                                                    <div class="content-excerpt">
                                                        <p><?=$product['title']?></p>
                                                    </div>
                                                    <div class="rating">
                                                        <?php
                                                        for($i=0;$i<$product['rating'];$i++){
                                                            ?>

                                                            <a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
                                                            <?php
                                                        }

                                                        ?>

                                                    </div>
                                                    <div class="compare-btn">
                                                        <a class="btn btn-primary btn-sm" target="_blanks" href="<?=$product['link']?>"><i class="fa fa-exchange" aria-hidden="true"></i> Buy Now</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </figure>
                                    </div>
                                    <?php
                                }
                                ?>

                            </div>
                        </div>
                        <div class="tab-pane fade " id="home" role="tabpanel" aria-labelledby="home-tab">
                           <div class="row">

                             <?php
                             foreach($products as $product){
                                $image_path=$func->getProductImages($product['id']);
                                $img=explode('/', $image_path[0]['image_path']);
                                $ima_path=$img[1]."/".$img[2];

                                ?>


                                <div class="col-12 col-md-6 col-lg-12 reviews-load-more-full_grid">
                                    <figure class="figure product-box row">
                                        <div class="col-12 col-md-12 col-lg-5 col-xl-4 p0">
                                            <div class="product-box-img">
                                                <a href="#">
                                                    <img src="<?=$ima_path?>" class="figure-img img-fluid" alt="Product Img">
                                                </a>
                                            </div>
                                            <div class="quick-view-btn">
                                                <div class="compare-btn">
                                                    <button type="button" class="viwe_btn btn btn-primary btn-sm" data-toggle="modal" data-product_id="<?=$product['id']?>"
                                                       data-target=".bd-example-modal-lg-product-1"><i class="fa fa-eye" aria-hidden="true"></i> Quick view</button>
                                                   </div>
                                               </div>
                                               <?php
                                               if($product['condition']=='New'){
                                                ?>
                                                <span class="badge badge-secondary wd-badge text-uppercase">New</span>
                                                <?php
                                            }
                                            ?>
                                            <div class="wishlist">

                                            </div>
                                        </div>
                                        <div class="col-12 col-md-12 col-lg-7 col-xl-8 p0">
                                            <div class="figure-caption text-left">
                                                <div class="row">
                                                    <div class="col-12 col-md-12 col-lg-6 col-xl-4 pr-0">
                                                        <div class="price-start">
                                                            <strong class="active-color"><u>$<?=$product['price']?></u> </strong>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-12 col-lg-6">
                                                        <div class="rating">
                                                            <?php
                                                            for($i=0;$i<$product['rating'];$i++){
                                                                ?>

                                                                <a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
                                                                <?php
                                                            }

                                                            ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="content-excerpt">
                                                            <h6 class="product-title"><?=$product['title']?></h6>
                                                            <p class="product-content"><?=$product['description']?></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="compare-btn">
                                                            <a class="btn btn-primary btn-sm" target="_blanks" href="<?=$product['link']?>"><i class="fa fa-exchange" aria-hidden="true"></i> Buy Now</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </figure>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
</section>





<?php include_once 'includes/footer.php';?>

<script type="text/javascript">

    $(".viwe_btn").click(function (event) {
            // alert($(this).data('product_id'));
            event.preventDefault();
            var ajax_data = new FormData();
            ajax_data.append("func", '10');
            ajax_data.append('product_id',$(this).data('product_id'));
            $.ajax({
                url: "serverside/post.php",
                type: "POST",
                processData: false,
                contentType: false,
                data:ajax_data,
                success: function (data) { 
                    var mydata = JSON.parse(data);
                    console.log(mydata);
                    $("#rating").html('');
                    $('#description').html('');
                    $('#title').html('');

                    $("#description").html(mydata[0]['description']);
                    $("#title").html(mydata[0]['title']);
                    $('#url').attr('href',mydata[0]['link'] );
                    
                    for (var i = 0; i <mydata[0]['rating']; i++) {
                        $("#rating").append(`
                            <a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
                            `);
                    }


                    //get product images
                    var ajax_data = new FormData();
                    ajax_data.append("func", '11');
                    ajax_data.append('product_id',mydata[0]['id']);
                    $.ajax({
                        url: "serverside/post.php",
                        type: "POST",
                        processData: false,
                        contentType: false,
                        data:ajax_data,
                        success: function (data) { 
                        // alert(data);
                        var images = JSON.parse(data);
                        // console.log(images);
                        $("#product-view-model").html('');
                        for (var i = 0; i<images.length ; i++) {

                            let img= images[i]['image_path'].split("/"); 
                            let ima_path=img[1]+"/"+img[2];

                                // $('.img').attr('src', ima_path);

                                $("#product-view-model").html(`
                                    <div class="item">
                                    <img src="${ima_path}"class="img-fluid" alt="Product Img">
                                    </div>  
                                    `);
                            }//for
                            $('#product-view-model').owlCarousel({
                                loop: true,
                                nav: false,
                                dots: true,
                                items: 1
                            })
                        }//inner success
                    });//Inner ajax
                    

                }//succes
        });//ajax

        });

    </script>



    <script type="text/javascript">

     $('#select_price').change(function(event){
        event.preventDefault(); 
        price= $( "#select_price option:selected" ).val();
        const urlParams = new URLSearchParams(window.location.search);
        const category_id = urlParams.get('category_id');
        if(category_id != null){
            window.location.href="index?category_id="+category_id+"&select_price="+price+"&section=product-amazon";
        }else{
         window.location.href="index?select_price="+price+"&section=product-amazon";
     }


 });
     $('#search_btn1').click(function(event){
      event.preventDefault();   
      window.location.href="index?product_name="+$("#product_name1").val()+"&section=product-amazon";

  });
</script>