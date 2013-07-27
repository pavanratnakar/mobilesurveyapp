<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/config.class.php');
include_once(Config::$site_path.'controller/controller.php');
$pageController=new PageController();
$userLoggedIn = $pageController->checkIfUserIsLoggedIn() ? true : false;
$form = $pageController->getForm();
echo $pageController->getHeader('init');
?>
<div data-role="page" id="splash" data-redirect="<?php echo $userLoggedIn ? 'survey.php' : 'login.php'?>">
    <div data-role="content">
        <div class="splash">
             <img src="img/logo.png" alt="TNS"/>
        </div>
    </div><!-- /content -->
</div>
<?php
echo $pageController->getFooter();
?>