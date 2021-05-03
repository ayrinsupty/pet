<?php include 'header.php'; 
//Session::checkSession_auth();
?>
    
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Shop</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
  $per_page = 16;
if (isset($_GET["page"])) {
$page = $_GET["page"];
}else {
$page =1;
}
$start_form = ($page-1) * $per_page;
     ?>
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <?php
                if (isset($_GET['shopid'])) {

               
                    $petslist = $select->productviewbysubcatpagi($start_form,$per_page,$_GET['shopid']);
                            if ($petslist) {
                                while ($row = $petslist->fetch_assoc()) {
                ?>
                <div class="col-md-1"></div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-shop-product">
                        <div class="product-upper">
                            <a href="single-product.php?productid=<?php echo $row['pro_id'];?>&catid=<?php echo $row['cat_id'];?>">
                            <img style="height:250px; width:210px;" src="<?php echo $row['image'];?>" alt="">
                                
                            </a>
                        </div>
                        <h2><a href="single-product.php?productid=<?php echo $row['pro_id'];?>&catid=<?php echo $row['cat_id'];?>"><?php echo $row['title'];?></a></h2>
                        <div class="product-carousel-price">
                            <ins><?php echo $row['price'];?> Taka</ins>  
                        </div> 
                         <div class="product-wid-rating">
                                <?php  
                                if ($row['rat_hit']!=0 || $row['rat_avg']!=0) {
                                $a = ceil($row['rat_hit']/$row['rat_avg']); ?>
                                <?php 
                                    if ($a==0) {
                                        echo "No ratting";
                                    }elseif($a==1){
                                        echo "<i class='fa fa-star'></i>";  
                                    }elseif($a==2){
                                        echo "<i class='fa fa-star'></i>
                                        <i class='fa fa-star'></i>";  
                                    }elseif($a==3){
                                        echo "<i class='fa fa-star'></i>
                                        <i class='fa fa-star'></i>
                                        <i class='fa fa-star'></i>";  
                                    }elseif($a==4){
                                        echo "<i class='fa fa-star'></i>
                                        <i class='fa fa-star'></i>
                                        <i class='fa fa-star'></i>
                                        <i class='fa fa-star'></i>";  
                                    }elseif($a==5){
                                        echo "<i class='fa fa-star'></i>
                                        <i class='fa fa-star'></i>
                                        <i class='fa fa-star'></i>
                                        <i class='fa fa-star'></i>
                                        <i class='fa fa-star'></i>";  
                                    }
                                    else{

                                    }
                                }
                                ?>
                             
                            </div> 
                        
                        <div class="product-option-shop">
                          
                             <?php 
                                    if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['addtocart'])) {
                                        $addcart = $insert->addcart($_POST);
                                    }
                                    ?>
                                    <form action="" method="post" class="cart">
                                        <div class="quantity">
                                            <input type="hidden" value="<?php echo $row['title'];?>" name="title">
                                            <input type="hidden" value="<?php echo $row['image'];?>" name="image">
                                            <input type="hidden" value="<?php echo $row['price'];?>" name="price">
                                            <input type="hidden" value="<?php echo $proid = $row['pro_id'];?>" name="pro_id">
                                            <input type="hidden" value="<?php echo $customer_id;?>" name="customer_id">
                                            <input type="hidden" size="4" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" step="1">
                                        </div>
                                        <button class="add_to_cart_button" name="addtocart" type="submit">Add to cart</button>
                                    </form>
                        </div>                       
                    </div>
                </div>
            <?php } } }else{ ?>

                <?php 
                $petslist = $select->selectproductpagi($start_form,$per_page);
                            if ($petslist) {
                                while ($row = $petslist->fetch_assoc()) {
                 ?>
                 <div class="col-md-1">
                    
                 </div>

            <div class="col-md-3">
                    <div class="single-shop-product">
                        <div class="product-upper">
                               <a href="single-product.php?productid=<?php echo $row['pro_id'];?>&catid=<?php echo $row['cat_id'];?>">
                            <img style="height:250px; width:210px;" src="<?php echo $row['image'];?>" alt="">
                                
                            </a>
                        </div>
                        <h2><a href="single-product.php?productid=<?php echo $row['pro_id'];?>&catid=<?php echo $row['cat_id'];?>"><?php echo $row['title'];?></a></h2>
                        <div class="product-carousel-price">
                            <ins><?php echo $row['price'];?> Taka</ins>  
                        </div> 
                         <div class="product-wid-rating">
                                <?php  
                                if ($row['rat_hit']!=0 || $row['rat_avg']!=0) {
                                $a = ceil($row['rat_hit']/$row['rat_avg']); ?>
                                <?php 
                                    if ($a==0) {
                                        echo "No ratting";
                                    }elseif($a==1){
                                        echo "<i class='fa fa-star'></i>";  
                                    }elseif($a==2){
                                        echo "<i class='fa fa-star'></i>
                                        <i class='fa fa-star'></i>";  
                                    }elseif($a==3){
                                        echo "<i class='fa fa-star'></i>
                                        <i class='fa fa-star'></i>
                                        <i class='fa fa-star'></i>";  
                                    }elseif($a==4){
                                        echo "<i class='fa fa-star'></i>
                                        <i class='fa fa-star'></i>
                                        <i class='fa fa-star'></i>
                                        <i class='fa fa-star'></i>";  
                                    }elseif($a==5){
                                        echo "<i class='fa fa-star'></i>
                                        <i class='fa fa-star'></i>
                                        <i class='fa fa-star'></i>
                                        <i class='fa fa-star'></i>
                                        <i class='fa fa-star'></i>";  
                                    }
                                    else{

                                    }
                                }
                                ?>
                             
                            </div> 
                        
                        <div class="product-option-shop">
                            <?php 
                                    if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['addtocart'])) {
                                        $addcart = $insert->addcart($_POST);
                                    }
                                    ?>
                                    <form action="" method="post" class="cart">
                                        <div class="quantity">
                                            <input type="hidden" value="<?php echo $row['title'];?>" name="title">
                                            <input type="hidden" value="<?php echo $row['image'];?>" name="image">
                                            <input type="hidden" value="<?php echo $row['price'];?>" name="price">
                                            <input type="hidden" value="<?php echo $proid = $row['pro_id'];?>" name="pro_id">
                                            <input type="hidden" value="<?php echo $customer_id;?>" name="customer_id">
                                            <input type="hidden" size="4" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" step="1">
                                        </div>
                                        <button class="add_to_cart_button" name="addtocart" type="submit">Add to cart</button>
                                    </form>
                        </div>                       
                    </div>
                </div>



            <?php } } } ?>

                
            </div>




            <?php 
            if (isset($_GET['shopid'])) {
                
        

$getCourse = $select->productviewbysubcat($_GET['shopid']);
$total_rows = mysqli_num_rows($getCourse);
$total_page = ceil($total_rows/$per_page);
             ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="product-pagination text-center">
                        <nav>
                          <ul class="pagination">
                            
                              <?php echo "<li><a href='shop.php?shopid=".$_GET['shopid']."&page=1'>".'&laquo;'."Previous</a></li>"; 
            for ($i=1; $i <= $total_page; $i++) { 
                echo "<li><a href='shop.php?shopid=".$_GET['shopid']."&page=".$i."'>".$i."</a>";
            }; ?>
         
       <?php echo "<li><a href='shop.php?shopid=".$_GET['shopid']."&page=1'>".'&raquo;'."Next</a></li>"; ?>
                          
                          </ul>
                        </nav>                        
                    </div>
                </div>
            </div>

<?php 

}else{
   $getCourse = $select->selectproduct();
$total_rows = mysqli_num_rows($getCourse);
$total_page = ceil($total_rows/$per_page);
             ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="product-pagination text-center">
                        <nav>
                          <ul class="pagination">
                            
                              <?php echo "<li><a href='shop.php?page=1'>".'&laquo;'."Previous</a></li>"; 
            for ($i=1; $i <= $total_page; $i++) { 
                echo "<li><a href='shop.php?page=".$i."'>".$i."</a>";
            }; ?>
         
       <?php echo "<li><a href='shop.php?page=1'>".'&raquo;'."Next</a></li>"; ?>
                          
                          </ul>
                        </nav>                        
                    </div>
                </div>
            </div>
<?php } ?>
        </div>
    </div>

  <?php include 'footer.php'; ?>