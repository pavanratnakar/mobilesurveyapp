<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/config.class.php');
include_once(Config::$site_path.'controller/controller.php');
$pageController=new PageController();
$pageController->onlyLoggedInUserCanAccess();
$product = $pageController->getProduct();
$productFlavour = $pageController->getProductFlavour();
$form = $pageController->getForm();
echo $pageController->getHeader('listSelect');
$categoryId = $pageController->getUtils()->checkValues($_GET['categoryId']);
$categoryMetaId = $pageController->getUtils()->checkValues($_GET['categoryMetaId']);
?>
<div data-role="page">
    <?php echo $pageController->getSubHeader('logout'); ?>
        <div data-role="content">
            <div data-role="collapsible-set" data-theme="b" data-content-theme="d">
                <?php
                foreach($product->getProducts($categoryId,$categoryMetaId) as $key=>$value) {
                    $productFlavours = '';
                    $productFlavours = $productFlavour->getProductFlavours($value['id']);
                    $collapsible = (sizeof($productFlavours) > 0) ? true : false;
                    if ($collapsible) {
                        echo '<div data-role="collapsible">';
                    } else {
                        echo '<div data-role="collapsible">';
                    }
                    echo '<h2>'.$value['name'].'</h2>';
                    if ($collapsible) {
                        echo '<ul data-role="listview" data-split-icon="gear" data-split-theme="d" data-inset="true">';
                        foreach($productFlavours as $key1=>$value1) {
                            echo '
                            <li>
                                <a href="questioner.php?categoryId='.$categoryId.'&productId='.$value['id'].'&flavourId='.$value1['id'].'">
                                    <img src="img/'.str_replace(' ','_',strtolower($value['name'])).'/'.str_replace(' ','_',strtolower($value1['name'])).'/hero.jpg"/>
                                    <h3>'.$value1['name'].'</h3>
                                </a>
                            </li>';
                        }
                        echo '
                            <li class="list-select">
                                <label for="other">If any other please enter here</label>
                                <div class="ui-grid-a">
                                    <div class="ui-block-a">
                                        <input type="text" name="other" id="other" placeholder="Other">
                                    </div>
                                    <div class="ui-block-b">
                                        <button data-url="questioner.php?categoryId='.$categoryId.'&productId='.$value['id'].'" data-role="button" data-icon="arrow-r" data-iconpos="notext" data-theme="c" data-inline="true">Arrow Right</button>
                                    </div>
                                </div>
                            </li>
                        ';
                        echo '</ul>';
                    }
                    echo '</div>';
                }
                ?>
            </div>
        </div><!-- /content -->
    <?php echo $pageController->getSubFooter(); ?>
</div>
<?php
echo $pageController->getFooter();
?>