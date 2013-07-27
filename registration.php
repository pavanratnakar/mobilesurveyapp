<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/config.class.php');
include_once(Config::$site_path.'controller/controller.php');
$pageController=new PageController();
$form = $pageController->getForm();
echo $pageController->getHeader('register');
$mode = array(
        array(
            'id'=>'Cellphone',
            'name'=>'Cellphone'
        ),
        array(
            'id'=>'Tablet',
            'name'=>'Tablet'
        )
    );
$members = array(
        array(
            'id'=>'1',
            'name'=>'1'
        ),
        array(
            'id'=>'2',
            'name'=>'2'
        ),
        array(
            'id'=>'3',
            'name'=>'3'
        ),
        array(
            'id'=>'4',
            'name'=>'4'
        ),
        array(
            'id'=>'5+',
            'name'=>'5+'
        )
    );
$income = array(
        array(
            'id'=>'<10000',
            'name'=>'<10000'
        ),
        array(
            'id'=>'10000-20000',
            'name'=>'10000-20000'
        ),
        array(
            'id'=>'20000-30000',
            'name'=>'20000-30000'
        ),
        array(
            'id'=>'30000-40000',
            'name'=>'30000-40000'
        ),
        array(
            'id'=>'40000-50000',
            'name'=>'40000-50000'
        ),
        array(
            'id'=>'50000-75000',
            'name'=>'50000-75000'
        ),
        array(
            'id'=>'75000-100000',
            'name'=>'75000-100000'
        ),
        
        array(
            'id'=>'100000+',
            'name'=>'100000+'
        ),
        array(
            'id'=>'Dont know, cant say',
            'name'=>'Dont know, cant say'
        )

    );
$savings = array(
        array(
            'id'=>'<5%',
            'name'=>'<5%'
        ),
        array(
            'id'=>'5%-10%',
            'name'=>'5%-10%'
        ),
        array(
            'id'=>'10%-15%',
            'name'=>'10%-15%'
        ),
        array(
            'id'=>'15%-20%',
            'name'=>'15%-20%'
        ),
        array(
            'id'=>'20%-25%',
            'name'=>'20%-25%'
        ),
        array(
            'id'=>'>25%',
            'name'=>'>25%'
        ),
        
        array(
            'id'=>'Dont know, cant say',
            'name'=>'Dont know, cant say'
        )
    );
$groceries = array(
        array(
            'id'=>'1000-5000',
            'name'=>'1000-5000'
        ),
        array(
            'id'=>'5000-10000',
            'name'=>'5000-10000'
        ),
        array(
            'id'=>'10000-15000',
            'name'=>'10000-15000'
        ),
        array(
            'id'=>'15000-20000',
            'name'=>'15000-20000'
        ),
        array(
            'id'=>'20000-25000',
            'name'=>'20000-25000'
        ),
        array(
            'id'=>'25000+',
            'name'=>'25000+'
        )
    );
$buyfrom = array(
        array(
            'id'=>'Grocery store',
            'name'=>'Grocery store'
        ),
        array(
            'id'=>'Kirana',
            'name'=>'Kirana'
        ),
        array(
            'id'=>'Supermarket',
            'name'=>'Supermarket'
        ),
        array(
            'id'=>'Hypermarket',
            'name'=>'Hypermarket'
        ),
        array(
            'id'=>'Openmarket',
            'name'=>'Openmarket'
        ),
        array(
            'id'=>'Street vendors',
            'name'=>'Street vendors'
        )
    );
?>
<div data-role="page" id="register">
    <?php echo $pageController->getSubHeader(); ?>
    <div data-role="content">
        <form action="login.php" id="register-form" method="post">
            <label for="userName">Name</label>
            <input type="text" name="userName" id="userName" value="" class="required">
            <label for="userEmail">Email</label>
            <input type="email" data-clear-btn="false" name="userEmail" id="userEmail" value="" class="required email">
            <label for="userPhone">Phone</label>
            <input type="tel" data-clear-btn="false" name="userPhone" id="userPhone" value="" class="required phone">
            <?php echo $form->createRadio('mode',$mode,'Mode of login');?>
            <?php echo $form->createRadio('members',$members,'Number of members in family');?>
            <?php echo $form->createRadio('income',$income,'Monthly house hold income (Income from all memebers of the family currently residing, which includes salaries, rents, interests, pensions and tax benifits)');?>
            <?php echo $form->createRadio('savings',$savings,'Monthly savings');?>
            <?php echo $form->createRadio('groceries',$groceries,'Expenditure on groceries, essentials etc');?>
            <?php echo $form->createCheckBox('buyfrom',$buyfrom,'Where do you buy your food items from?');?>
            <input data-mini="true" data-inline="true" type="submit" value="Register"/>
            <input data-mini="true" data-inline="true" type="reset" value="Reset"/>
        </form>
    </div><!-- /content -->
    <?php echo $pageController->getSubFooter(); ?>
</div>
<?php
echo $pageController->getFooter();
?>