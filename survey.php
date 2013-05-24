<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/config.class.php');
include_once(Config::$site_path.'controller/controller.php');
$pageController=new PageController();
$category = $pageController->getCategory();
$category_meta = $pageController->getCategoryMeta();
$categoryMetaDetails = $category_meta->getCategoryMetas();
$form = $pageController->getForm();
echo $pageController->getHeader();
?>
<div data-role="page">
    <?php echo $pageController->getSubHeader(); ?>
        <div data-role="content">
            <form action="product.php" method="get" class="survey-form-1">
                <div class="ui-grid-solo">
                <?php
                    echo $form->createRadio('categoryId',$category->getCategories(),'Pick your choice:');
                    $data = array($categoryMetaDetails[0]['id']=>'Yes',$categoryMetaDetails[1]['id']=>'No');
                    echo $form->createSlider('categoryMetaId',$data,'Is it branded?');
                ?>
                </div>
                <input data-mini="true" data-inline="true" type="submit" value="Submit"/>
                <input data-mini="true" data-inline="true" type="reset" value="Reset"/>
            </form>
        </div><!-- /content -->
    <?php echo $pageController->getSubFooter(); ?>
</div>
<?php
echo $pageController->getFooter();
?>