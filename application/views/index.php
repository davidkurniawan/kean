
    
    <?php         
        if(isset($_GET["page"])) {
            if($_GET["page"] == "product") {
                include("pages/product.php");
            } else if($_GET["page"] == "article") {
                include("pages/article.php");
            } else if($_GET["page"] == "articles") {
                include("pages/articles.php");
            } else if($_GET["page"] == "reseller") {     
                include("pages/home.php");     
            } else if($_GET["page"] == "cart") {     
                include("pages/cart.php");     
            } else if($_GET["page"] == "profile") {     
                include("pages/profile.php");     
            } else {
                include("pages/home.php");  
            }
        }else{
            include("pages/home.php");       
        }
    
    
    ?>
    
   