<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/config.class.php');
include_once(Config::$site_path.'controller/controller.php');
$pageController=new PageController();
$category = $pageController->getCategory();
$category_meta = $pageController->getCategoryMeta();
$categoryMetaDetails = $category_meta->getCategoryMetas();
$form = $pageController->getForm();
echo $pageController->getHeader('init');
?>
<div data-role="page" id="splash">
    <div data-role="content">
        <div class="splash">
             <img src="img/logo.png" alt="TNS"/>
        </div>
    </div><!-- /content -->
</div>
<?php
echo $pageController->getFooter();
?>