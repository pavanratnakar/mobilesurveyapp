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
        session_start();
        include_once($_SERVER['DOCUMENT_ROOT'].'/config.class.php');
        include_once(Config::$site_path.'/class/utils.class.php');
        $this->utils=new Utils();
        if ($ref) {
            $this->$ref();
        }
    }
    public function checkIfUserIsLoggedIn(){
        if (isset($_SESSION['uid'])) {
            return $_SESSION['uid'];
        }
        return 0;
    }
    public function logoutUser(){
        session_destroy();
        header("location:login.php");
    }
    public function onlyLoggedInUserCanAccess(){
        if (!isset($_SESSION['uid'])) {
            header("location:login.php");
            exit;
        }
        if (isset($_REQUEST['logout'])) {
            $this->logoutUser();
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
    public function getUser(){
        include_once(Config::$site_path.'class/user.class.php');
        $this->user = new User();
        return $this->user;
    }
    public function submitQuestionnaire(){
        $this->getQuestionnaire();
        $date = new DateTime();
        $data = array(
            'question1'=>$this->utils->checkValues($_GET['question1']),
            'question2'=>$this->utils->checkValues($_GET['question2']),
            'question3'=>$this->utils->checkValues($_GET['question3']),
            'question4'=>$this->utils->checkValues($_GET['question4']),
            'question5'=>$this->utils->checkValues($_GET['question5']),
            'question6'=>$this->utils->checkValues($_GET['question6']),
            'question7'=>$this->utils->checkValues($_GET['question7'])
        );
        if ($_GET['flavourName']) {
            $data['flavourName'] = $this->utils->checkValues($_GET['flavourName']);
        }
        $this->questionnaire->addDetails(
            $this->utils->checkValues($_SESSION['uid']),
            $this->utils->checkValues($_GET['productId']),
            $this->utils->checkValues($_GET['flavourId']),
            json_encode($data),
            $this->utils->checkValues($this->utils->ip_address_to_number($_SERVER["REMOTE_ADDR"])),
            $this->utils->checkValues($_SERVER['HTTP_USER_AGENT']),
            $this->utils->checkValues($date->getTimestamp())
        );
    }
    public function submitRegistration(){
        if (!$_POST['userName']) {
            return;
        }
        $this->getUser();
        $date = new DateTime();
        return $this->user->addDetails(
            $this->utils->checkValues($_POST['userName']),
            $this->utils->checkValues($_POST['userEmail']),
            $this->utils->checkValues($_POST['userPhone']),
            json_encode(array(
                'mode'=>$this->utils->checkValues($_POST['mode']),
                'members'=>$this->utils->checkValues($_POST['members']),
                'income'=>$this->utils->checkValues($_POST['income']),
                'savings'=>$this->utils->checkValues($_POST['savings']),
                'groceries'=>$this->utils->checkValues($_POST['groceries']),
                'buyfrom'=>$this->utils->checkValues($_POST['buyfrom'])
            )),
            $this->utils->checkValues($this->utils->ip_address_to_number($_SERVER["REMOTE_ADDR"])),
            $this->utils->checkValues($_SERVER['HTTP_USER_AGENT']),
            $this->utils->checkValues($date->getTimestamp())
        );
    }
    public function submitLogin(){
        if (!$_POST['userEmail']) {
            return;
        }
        $this->getUser();
        $userid = $this->user->getUserId(
            $this->utils->checkValues($_POST['userEmail']),
            $this->utils->checkValues($_POST['userPhone'])
        );
        if ($userid) {
            $_SESSION['uid'] = $userid;
            return 1;
        } else {
            return -1;
        }
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
                    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
                    <script src="http://code.jquery.com/mobile/1.3.1/jquery.mobile-1.3.1.min.js"></script>';
        if ($type==='login' || $type==='register') {
            $return.= '<script src="js/jquery.validate.min.js"></script>';
        }
        if ($type) {
            $return.= '<script src="js/'.$type.'.js"></script>';
        }
        $return.= '</head><body>';
        return $return;
    }
    public function getSubHeader($type=null){
        $return = '<div data-role="header" data-add-back-btn="true"><h1>Mobile Diary</h1>';
        if ($type == 'register') {
            $return .= '<a href="registration.php" data-icon="gear" data-theme="b" class="ui-btn-right">Regiter</a>';
        }
        if ($type == 'logout') {
            $return .= '<a href="'.$this->getURL().'?logout" data-icon="gear" data-theme="b" class="ui-btn-right">Logout</a>';
        }
        $return .= '</div>';
        return $return;
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
    public function getURL(){
        $s = empty($_SERVER["HTTPS"]) ? '' : ($_SERVER["HTTPS"] == "on") ? "s" : "";
        $protocol = substr(strtolower($_SERVER["SERVER_PROTOCOL"]), 0, strpos(strtolower($_SERVER["SERVER_PROTOCOL"]), "/")) . $s;
        $port = ($_SERVER["SERVER_PORT"] == "80") ? "" : (":".$_SERVER["SERVER_PORT"]);
        $uri = $protocol . "://" . $_SERVER['SERVER_NAME'] . $port . $_SERVER['REQUEST_URI'];
        $segments = explode('?', $uri, 2);
        $url = $segments[0];
        return $url;
    }
}
?>