<?php
print_r($_SESSION);
include_once($_SERVER['DOCUMENT_ROOT'].'/config.class.php');
include_once(Config::$site_path.'controller/controller.php');
$pageController=new PageController();
$loginSuccess = $pageController->submitLogin();
if (isset($_SESSION['uid'])) {
    header("location:survey.php");
}
$form = $pageController->getForm();
$registrationSuccess = $pageController->submitRegistration();
echo $pageController->getHeader('login');
?>
<div data-role="page" id="login">
    <?php echo $pageController->getSubHeader('register'); ?>
    <div data-role="content">
        <?php
        if ($registrationSuccess == 1) { // sucess
           echo '<h2 class="success">Registration successful. Please login to fill the survey.</h2>'; 
        } else if($registrationSuccess == -1){ // failure
            echo '<h2 class="failure">Registration failure. Please try again.</h2>';
        } else if($loginSuccess == -1) {
            echo '<h2 class="failure">Incorrect email / phone number combination. Please try again</h2>';
        }
        ?>
        <form action="login.php" id="login-form" method="post">
            <label for="userEmail">Email</label>
            <input type="email" data-clear-btn="false" name="userEmail" id="userEmail" value="" class="required email">
            <label for="userPhone">Phone</label>
            <input type="tel" data-clear-btn="false" name="userPhone" id="userPhone" value="" class="required phone">
            <input data-mini="true" data-inline="true" type="submit" value="Login"/>
        </form>
    </div><!-- /content -->
    <?php echo $pageController->getSubFooter(); ?>
</div>
<?php
echo $pageController->getFooter();
?>