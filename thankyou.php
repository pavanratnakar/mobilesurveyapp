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
        <a href="index.php" data-icon="home" class="ui-btn-right">Submit Again</a>
    </div>
    <div data-role="content">
    <h2>Thank you for filling the survery.</h2>
    <a data-mini="true" data-inline="true" href="index.php" data-role="button" data-icon="home">Go back to Home</a>
    </div>
    <?php echo $pageController->getSubFooter(); ?>
</div>
<?php
echo $pageController->getFooter();
?>