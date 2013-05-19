<?php
class PageController{
    protected $utils;
    protected $category;
    protected $categoryMeta;
    protected $product;
    protected $productFlavour;
    protected $form;
    public function __construct(){
        include_once($_SERVER['DOCUMENT_ROOT'].'/config.class.php');
        include_once(Config::$site_path.'/class/utils.class.php');
        $this->utils=new Utils();
    }
    public function getCategory(){
        include_once(Config::$site_path.'class/category.class.php');
        $this->category = new Category();
        return $this->category;
    }
    public function getCategoryMeta(){
        include_once(Config::$site_path.'class/category_meta.class.php');
        $this->categoryMeta = new CategoryMeta();
        return $this->categoryMeta;
    }
    public function getProduct(){
        include_once(Config::$site_path.'class/product.class.php');
        $this->product = new Product();
        return $this->product;
    }
    public function getProductFlavour(){
        include_once(Config::$site_path.'class/product_flavour.class.php');
        $this->productFlavour = new ProductFlavour();
        return $this->productFlavour;
    }
    public function getForm(){
        include_once(Config::$site_path.'class/form.class.php');
        $this->form = new Form();
        return $this->form;
    }
    public function getUtils(){
        return $this->utils;
    }
    public function getHeader(){
        return '
            <!DOCTYPE html>
            <html>
                <head>
                    <title>Mobile Diary</title>
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.1/jquery.mobile-1.3.1.min.css" />
                    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
                    <script src="http://code.jquery.com/mobile/1.3.1/jquery.mobile-1.3.1.min.js"></script>
                    <script src="js/script.js"></script>
                </head>
            <body>
        ';
    }
    public function getSubHeader(){
        return '
            <div data-role="header">
                <h1>Mobile Diary</h1>
             </div><!-- /header -->
        ';
    }
    public function getSubFooter(){
        return '
            <div data-role="footer">
                <h4>Thank you for using the application</h4>
            </div><!-- /footer -->
        ';
    }
    public function getFooter(){
        return '
            </body>
            </html>
        ';
    }
}
?>