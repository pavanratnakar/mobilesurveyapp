<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/config.class.php');
include_once(Config::$site_path.'controller/controller.php');
$pageController=new PageController();
$pageController->submitQuestionnaire();
echo $pageController->getHeader();
?>
<div data-role="page">
    <div data-role="header">
        <h1>Mobile Diary</h1>
    </div>
    <div data-role="content">
    <h2>Would you like to enter another product?</h2>
    	<a data-mini="true" data-inline="true" href="survey.php" data-role="button" data-icon="home">Yes</a>
    </div>
    <?php echo $pageController->getSubFooter(); ?>
</div>
<?php
echo $pageController->getFooter();
?>