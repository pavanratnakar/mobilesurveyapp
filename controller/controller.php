<?php
class PageController{
    protected $utils;
    protected $category;
    protected $categoryMeta;
    protected $product;
    protected $productFlavour;
    protected $questionnaire;
    protected $form;
    public function __construct($ref=null){
        include_once($_SERVER['DOCUMENT_ROOT'].'/config.class.php');
        include_once(Config::$site_path.'/class/utils.class.php');
        $this->utils=new Utils();
        if ($ref) {
            $this->$ref();
        }
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
    public function getQuestionnaire(){
        include_once(Config::$site_path.'class/questionnaire.class.php');
        $this->questionnaire = new Questionnaire();
        return $this->questionnaire;
    }
    public function submitQuestionnaire(){
        $this->getQuestionnaire();
        $date = new DateTime();
        $this->questionnaire->addDetails(
            $this->utils->checkValues($_GET['userId']),
            $this->utils->checkValues($_GET['productId']),
            $this->utils->checkValues($_GET['flavourId']),
            json_encode(array(
                'question1'=>$this->utils->checkValues($_GET['question1']),
                'question2'=>$this->utils->checkValues($_GET['question2']),
                'question3'=>$this->utils->checkValues($_GET['question3']),
                'question4'=>$this->utils->checkValues($_GET['question4']),
                'question5'=>$this->utils->checkValues($_GET['question5']),
                'question6'=>$this->utils->checkValues($_GET['question6']),
                'question7'=>$this->utils->checkValues($_GET['question7'])
            )),
            $this->utils->checkValues($this->utils->ip_address_to_number($_SERVER["REMOTE_ADDR"])),
            $this->utils->checkValues($_SERVER['HTTP_USER_AGENT']),
            $this->utils->checkValues($date->getTimestamp())
        );
    }
    public function getForm(){
        include_once(Config::$site_path.'class/form.class.php');
        $this->form = new Form();
        return $this->form;
    }
    public function getUtils(){
        return $this->utils;
    }
    public function getHeader($type=null){
        $return = '
            <!DOCTYPE html>
            <html>
                <head>
                    <title>Mobile Diary</title>
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.1/jquery.mobile-1.3.1.min.css" />
                    <link rel="stylesheet" href="css/mobile_diary.min.css" />
                    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>';
        if ($type) {
            $return.=   '<script src="js/'.$type.'.js"></script>';
        }
        $return.=   '<script src="http://code.jquery.com/mobile/1.3.1/jquery.mobile-1.3.1.min.js"></script>
                </head>
            <body>
        ';
        return $return;
    }
    public function getSubHeader(){
        return '
            <div data-role="header" data-add-back-btn="true">
                <h1>Mobile Diary</h1>
             </div><!-- /header -->
        ';
    }
    public function getSubFooter(){
        return '
            <div data-role="footer">
                <h4>TNS</h4>
            </div><!-- /footer -->
        ';
    }
    public function getFooter(){
        return "
            <script type='text/javascript'>
              var _gaq = _gaq || [];
              _gaq.push(['_setAccount', 'UA-22528464-1']);
              _gaq.push(['_setDomainName', 'pavanratnakar.com']);
              _gaq.push(['_trackPageview']);

              (function() {
                var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
              })();
            </script>
            </body>
            </html>
        ";
    }
}
?>