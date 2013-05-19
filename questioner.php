<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/config.class.php');
include_once(Config::$site_path.'controller/controller.php');
$pageController=new PageController();
$form = $pageController->getForm();
echo $pageController->getHeader();
$categoryId = $pageController->getUtils()->checkValues($_GET['categoryId']);
$productId = $pageController->getUtils()->checkValues($_GET['productId']);
$flavourId = $pageController->getUtils()->checkValues($_GET['flavourId']);
if ($categoryId == 1) {
    $answers1 = array(
        array(
            'id'=>'Rs 5',
            'name'=>'Rs 5'
        ),
        array(
            'id'=>'Rs 10',
            'name'=>'Rs 10'
        ),
        array(
            'id'=>'Rs 20',
            'name'=>'Rs 20'
        ),
        array(
            'id'=>'Rs 30',
            'name'=>'Rs 30'
        ),
        array(
            'id'=>'Rs 60',
            'name'=>'Rs 60'
        )
    );
} else if($categoryId == 2) {
    $answers1 = array(
        array(
            'id'=>'Rs 10',
            'name'=>'Rs 10'
        ),
        array(
            'id'=>'Rs 12',
            'name'=>'Rs 12'
        ),
        array(
            'id'=>'Rs 15',
            'name'=>'Rs 15'
        ),
        array(
            'id'=>'Rs 20',
            'name'=>'Rs 20'
        ),
        array(
            'id'=>'Rs 50',
            'name'=>'Rs 50'
        ),
        array(
            'id'=>'Rs 60',
            'name'=>'Rs 60'
        ),
        array(
            'id'=>'Rs 75',
            'name'=>'Rs 75'
        ),
        array(
            'id'=>'Rs 90',
            'name'=>'Rs 90'
        ),
        array(
            'id'=>'Rs 100',
            'name'=>'Rs 100'
        ),
        array(
            'id'=>'Rs 100 and more',
            'name'=>'Rs 100 and more'
        )
    );
} else {
    $answers1 = array(
        array(
            'id'=>'50 p',
            'name'=>'50 p'
        ),
        array(
            'id'=>'Re 1',
            'name'=>'Re 1'
        ),
        array(
            'id'=>'Rs 2',
            'name'=>'Rs 2'
        ),
        array(
            'id'=>'Rs 5',
            'name'=>'Rs 5'
        ),
        array(
            'id'=>'Rs 10',
            'name'=>'Rs 10'
        )
    );
}

$answers3 = array(
    array(
        'id'=>'Myself only',
        'name'=>'Myself only'
    ),
    array(
        'id'=>'Myself along with family',
        'name'=>'Myself along with family'
    ),
    array(
        'id'=>'Myself along with friends',
        'name'=>'Myself along with friends '
    ),
    array(
        'id'=>'Myself along with colleagues',
        'name'=>'Myself along with colleagues '
    ),
    array(
        'id'=>'For someone else\'s consumption',
        'name'=>'For someone else\'s consumption '
    )
);
$answers4 = array(
    array(
        'id'=>'In home',
        'name'=>'In home'
    ),
    array(
        'id'=>'Out of home',
        'name'=>'Out of home'
    )
);
$answers5 = array(
    array(
        'id'=>'School',
        'name'=>'School'
    ),
    array(
        'id'=>'College',
        'name'=>'College'
    ),
    array(
        'id'=>'While travelling',
        'name'=>'While travelling'
    ),
    array(
        'id'=>'Malls',
        'name'=>'Malls'
    ),
    array(
        'id'=>'Hotels/Restaurants/Eateries',
        'name'=>'Hotels/Restaurants/Eateries'
    )
);
$answers6 = array(
    array(
        'id'=>'For timepass when I feel bored ',
        'name'=>'For timepass when I feel bored '
    ),
    array(
        'id'=>'To enjoy my leisure time - e.g. watching TV, listening to music, reading books, etc.',
        'name'=>'To enjoy my leisure time - e.g. watching TV, listening to music, reading books, etc.'
    ),
    array(
        'id'=>'To take break from work / studies',
        'name'=>'To take break from work / studies'
    ),
    array(
        'id'=>'To relax at home with my family',
        'name'=>'To relax at home with my family'
    ),
    array(
        'id'=>'To uplift my mood and help overcome dull moments in life',
        'name'=>'To uplift my mood and help overcome dull moments in life'
    ),
    array(
        'id'=>'To feel refreshed',
        'name'=>'To feel refreshed'
    ),
    array(
        'id'=>'To make the celebrations like birthday / party more enjoyable',
        'name'=>'To make the celebrations like birthday / party more enjoyable'
    ),
    array(
        'id'=>'To enliven a light moment / chatting with my friends',
        'name'=>'To enliven a light moment / chatting with my friends'
    ),
    array(
        'id'=>'To satisfy my hunger',
        'name'=>'To satisfy my hunger'
    ),
    array(
        'id'=>'As an accompaniment with my meal',
        'name'=>'As an accompaniment with my meal'
    ),
    array(
        'id'=>'To enjoy togetherness with close ones',
        'name'=>'To enjoy togetherness with close ones'
    ),
    array(
        'id'=>'To fill my stomach while on the go',
        'name'=>'To fill my stomach while on the go'
    ),
    array(
        'id'=>'Others',
        'name'=>'Others'
    )
);
$answers7 = array(
    array(
        'id'=>'Sandwiches',
        'name'=>'Sandwiches'
    ),
    array(
        'id'=>'Chat items',
        'name'=>'Chat items'
    ),
    array(
        'id'=>'North Indian food',
        'name'=>'North Indian food'
    ),
    array(
        'id'=>'South Indian food',
        'name'=>'South Indian food'
    )
);
?>
<div data-role="page">
    <?php echo $pageController->getSubHeader(); ?>
        <div data-role="content">
            <form class="survey-form-questioner">
                <div class="ui-grid-solo">
                    <?php echo $form->createRadio('question1',$answers1,'SKU consumed');?>
                    <label for="question2">Quantity consumed</label>
                    <input type="range" name="question2" id="question2'," value="1" min="1" max="25" step="1" data-highlight="true">
                    <?php
                        echo $form->createRadio('question3',$answers3,'For whose consumption did you buy this pack?');
                        echo $form->createRadio('question4',$answers4,'Where did you consume?');
                        echo $form->createRadio('question5',$answers5,'If selected Out of home, where?');
                        echo $form->createRadio('question6',$answers6,'What was the reason you bought?');
                        echo $form->createRadio('question7',$answers7,'What else did you eat along with this?');
                    ?>
                </div>
                <input type="hidden" value="<?php echo $productId;?>" name="productId"/>
                <input type="hidden" value="<?php echo $flavourId;?>" name="flavourId"/>
                <input data-mini="true" data-inline="true" type="submit" value="Submit"/>
                <input data-mini="true" data-inline="true" type="reset" value="Reset"/>
            </form>
        </div><!-- /content -->
    <?php echo $pageController->getSubFooter(); ?>
</div>
<?php
echo $pageController->getFooter();
?>