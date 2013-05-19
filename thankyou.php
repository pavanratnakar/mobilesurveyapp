<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/config.class.php');
include_once(Config::$site_path.'controller/controller.php');
$pageController=new PageController();
$categoryMetaDetails = $category_meta->getCategoryMetas();
echo $pageController->getHeader();
?>
<div data-role="page">
    <p>Thank you for filling the survery.</p>
    <a href="index.php" data-role="button" data-icon="gear" data-theme="b">Go back</a>
</div>
<?php
echo $pageController->getFooter();
?>