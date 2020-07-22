<?php
defined('_JEXEC') or die;
?>


<?php
require_once dirname(dirname(dirname(dirname(__FILE__)))) . DIRECTORY_SEPARATOR . 'functions.php';
?>
<?php if (isset($this->product->customfieldsSorted) && isset($this->product->customfieldsSorted['related_products'])) : ?>
<?php
$productsCount = count($this->product->customfieldsSorted['related_products']);
$i = 0;

$themeParams = JFactory::getApplication()->getTemplate(true)->params;
$itemsInRow = $themeParams->get('itemsInRow', '');
$desktops =  ''; $laptops = ''; $tablets = ''; $phones = '';

$slidersOptions = $themeParams->get('slidersOptions', '');
if ('' !== $slidersOptions) {
    $slidersOptions = json_decode(base64_decode($slidersOptions), true);
    if (isset($slidersOptions['relatedproducts'])) {
        $desktops =  $slidersOptions['relatedproducts']['desktops'];
        $laptops = $slidersOptions['relatedproducts']['laptops'];
        $tablets = $slidersOptions['relatedproducts']['tablets'];
        $phones = $slidersOptions['relatedproducts']['phones'];
    }
}

$_itemsInRow = empty($itemsInRow) ? '2' : intval($itemsInRow);

$_itemClass = 'separated-item-2  grid';

$_widthLg = empty($desktops) ? '' : $desktops;
$_widthMd = empty($laptops) ? '' : $laptops;
$_widthSm = empty($tablets) ? '12' : $tablets;
$_widthXs = empty($phones) ? '' : $phones;

if ($_widthLg) {
    $_itemClass .= ' col-lg-' . (int)($_widthLg / 2);
}
if ($_widthMd) {
    $_itemClass .= ' col-md-' . (int)($_widthMd / 2);
}
if ($_widthSm) {
    $_itemClass .= ' col-sm-' . (int)($_widthSm / 2);
}
if ($_widthXs) {
    $_itemClass .= ' col-xs-' . (int)($_widthXs / 2);
}
?>
    <?php if ($productsCount > 0) : ?>
    
	<div data-slider-id="relatedproducts_slider" class=" bd-productsslider-1">
	    <div class="bd-container-inner">
        <div class=" bd-block bd-own-margins">
                <div class=" bd-blockheader bd-tagstyles bd-bootstrap-btn bd-btn-primary">
                    <h4><?php echo JText::_('COM_VIRTUEMART_RELATED_PRODUCTS'); ?></h4>
                </div>
                <div class=" bd-blockcontent bd-tagstyles bd-bootstrap-btn bd-btn-primary shape-only">
                <div class=" bd-grid-11">
                  <div class="container-fluid">
                    <div class="separated-grid row">
                        <div class="carousel slide<?php if ($productsCount <= $_itemsInRow): ?> single<?php endif; ?> adjust-slides">
                            <div class="carousel-inner">
                    <?php foreach ($this->product->customfieldsSorted['related_products'] as $field):	?>
                        <?php if ($i % $_itemsInRow == 0): ?>
                            <div class="item<?php if ($i == 0): ?> active<?php endif ?>">
                        <?php endif; ?>
                        <?php
                            //create products items collection
                            $productItems = new stdClass();

                            $display = $field->display;
                            if (preg_match('/<img[^>]+\/>/', $field->display, $matches)) {
                                $image = $matches[0];
                                $content = str_replace($image, '', $field->display);
                                if (preg_match('/<a href=\"([^"]+)\"[^>]*>([\s\S]*?)<\/a>/', $content, $results)) {
                                    $link = $results[1];
                                    $title = trim($results[2]);
                                }
                            }

                            //create product price decorator object
                            if (preg_match('/[\'"]+vm-price-desc[\'"]+>([\s\S]+?)<\/span>/', $field->display, $matches) &&
                                preg_match('/[\'"]+PricesalesPrice[\'"]+>([\s\S]+?)<\/span>/', $field->display, $matches2)) {
                                $productPriceDecorator = new stdClass();
                                $productPriceDecorator->show_prices = 1;
                                $productPriceDecorator->label = $matches[1];
                                $productPriceDecorator->prices = $matches2[1];
                                $productItems->productPrice = $productPriceDecorator;
                            }

                            //create product desc decorator object
                            if (preg_match('/[\'"]+product_s_desc[\'"]+>([\s\S]+?)<\/p>/', $field->display, $matches)) {
                                $productDescDecorator = new stdClass();
                                $productDescDecorator->isFull = true;
                                $productDescDecorator->desc = $matches[1];
                                $productItems->productDesc = $productDescDecorator;
                            }

                            //create product title decorator object
                            $productTitleDecorator = new stdClass();
                            $productTitleDecorator->link = $link;
                            $productTitleDecorator->name = $title;
                            $productItems->productTitle = $productTitleDecorator;

                            //create product image decorator object
                            $productImageDecorator = new stdClass();
                            $productImageDecorator->imagesExists = '' !== $image ? true : false;
                            $productImageDecorator->image = $productImageDecorator->imagesExists ? $image : null;
                            $productImageDecorator->link = $link;
                            $productItems->productImage = $productImageDecorator;
                        ?>
                        
                        <div class="<?php echo $_itemClass; ?> vm-product-item">
                            <div class=" bd-griditem-2">
                                <?php if (isset($productItems->productImage)) : ?>
    <?php if ($productItems->productImage->imagesExists) : ?>
    <?php
        $offsetHeight = isset($productItems->productImage->offsetHeight) ? $productItems->productImage->offsetHeight : 0;
        $offsetWidth = isset($productItems->productImage->offsetWidth) ? $productItems->productImage->offsetWidth : 0;
        $height = 'height:' . (VmConfig::get ('img_height') + $offsetHeight) . 'px;';
        $width ='width:' . (VmConfig::get ('img_width') + $offsetWidth) . 'px;';
        if (is_object($productItems->productImage->image))
            $imgHtml = $productItems->productImage->image->displayMediaThumb('class=" bd-imagestyles-152"', false);
        else
            $imgHtml = str_replace('<img', '<img class=" bd-imagestyles-152" ', $productItems->productImage->image);
    ?>
    <a class=" bd-productimage-1" href="<?php echo $productItems->productImage->link; ?>">
        <?php echo $imgHtml; ?>
    </a>
    <?php endif; ?>
<?php endif; ?>
	
		<div class="bd-productnew-1  bd-productnewicon-1">
    <span>New!</span>
</div>
	
		<?php if (isset($productItems->productSale)) : ?>
<?php if ($productItems->productSale->prices['discountedPriceWithoutTax'] != $productItems->productSale->prices['priceWithoutTax']) : ?>
<div class=" bd-productsaleicon bd-productsale-1">
    <span>Sale!</span>
</div>
<?php endif; ?>
<?php endif; ?>
	
		<?php if (isset($productItems->productOutOfStock)) : ?>
<?php if (($productItems->productOutOfStock->product_in_stock - $productItems->productOutOfStock->product_ordered) < 1) : ?>
<div class="bd-productoutofstockicon  bd-productoutofstock-1">
    <?php echo JText::_('COM_VIRTUEMART_CART_OUTOFSTOCK'); ?>
</div>
<?php endif; ?>
<?php endif; ?>
	
		<?php if (isset($productItems->productTitle)) : ?>
<div class=" bd-producttitle-2">
    <?php
    if ('' !== $productItems->productTitle->link)
        echo JHTML::link($productItems->productTitle->link, $productItems->productTitle->name);
    else 
        echo $productItems->productTitle->name;
    ?>
</div>
<?php endif; ?>
	
		<?php if (isset($productItems->productPrice)) : ?>
<div class=" bd-productprice-1 product-prices">
    <?php
    if ($productItems->productPrice->show_prices == '1') {
        if (is_array($productItems->productPrice->prices) && $productItems->productPrice->prices['salesPrice']<=0
            && VmConfig::get ('askprice', 1) && $productItems->productPrice->imagesExists
            && !$productItems->productPrice->image->file_is_downloadable) {
            $askquestion_url = JRoute::_('index.php?option=com_virtuemart&view=productdetails&task=askquestion&virtuemart_product_id=' .
        $product->virtuemart_product_id . '&virtuemart_category_id=' . $product->virtuemart_category_id . '&tmpl=component', FALSE);
        ?>
        <a class="ask-a-question  btn   btn-primary" href="<?php echo $askquestion_url; ?>" rel="nofollow" >
            <?php echo JText::_ ('COM_VIRTUEMART_PRODUCT_ASKPRICE'); ?>
        </a>
        <?php
        }

        $oldPrice = false;
        $oldPriceObj = array('description' => 'COM_VIRTUEMART_PRODUCT_BASEPRICE', 'html' => '');
        $regularPriceObj = array('description' => 'COM_VIRTUEMART_PRODUCT_SALESPRICE', 'html' => '');

        if (is_array($productItems->productPrice->prices)) {
            $oldPriceObj['html'] = call_user_func_array(array(&$productItems->productPrice->currency, 'createPriceDiv'),
                array(
                    'name' => 'basePrice',
                    'description' => 'COM_VIRTUEMART_PRODUCT_BASEPRICE',
                    $productItems->productPrice->prices,
                    true
                )
            );

            $regularPriceObj['html'] =  call_user_func_array(array(&$productItems->productPrice->currency, 'createPriceDiv'),
                array(
                    'name' => 'salesPrice',
                    'description' => 'COM_VIRTUEMART_PRODUCT_SALESPRICE',
                    $productItems->productPrice->prices,
                    true
                )
            );
        }

        if (is_string($productItems->productPrice->prices)) {
            if (isset($productItems->productPrice->label))
                $regularPriceObj['description'] = $productItems->productPrice->label;
            $regularPriceObj['html'] = $productItems->productPrice->prices;
        }
    ?>
    
    
    <?php if (!empty($regularPriceObj['html'])) : ?>
<div class=" bd-pricetext-1">
    
    <span class=" bd-container-42 bd-tagstyles bd-bootstrap-btn bd-btn-primary salesPrice">
        <?php echo $regularPriceObj['html']; ?>
    </span>
</div>
<?php endif; ?>
    <?php } ?>
</div>
<?php endif; ?>
	
		<?php if (isset($productItems->productBuy)) : ?>
<form method="post" class="product" action="<?php echo JRoute::_ ('index.php'); ?>">
    <?php
        // todo output customfields
        $buttonDataAttrs = '';
        $classNames = ' bd-productbuy-1 btn   btn-primary';
    ?>
    <?php if (!VmConfig::get('use_as_catalog', 0)) : ?>
        <?php
            $quantity = 1;
            if (isset($productItems->productBuy->step_order_level) && (int)$productItems->productBuy->step_order_level > 0) {
                $quantity = $productItems->productBuy->step_order_level;
            } else if (!empty($productItems->productBuy->min_order_level)){
                $quantity = $productItems->productBuy->min_order_level;
            }
        ?>
        <?php $stockhandle = VmConfig::get ('stockhandle', 'none'); ?>
        <?php if (($stockhandle == 'disableit' or $stockhandle == 'disableadd') and ($productItems->productBuy->product_in_stock - $productItems->productBuy->product_ordered) < 1) : ?>
            <?php
                echo JHTML::link (JRoute::_ ('index.php?option=com_virtuemart&view=productdetails&layout=notify&virtuemart_product_id=' . $productItems->productBuy->virtuemart_product_id), vmText::_ ('COM_VIRTUEMART_CART_NOTIFY'), 'class="' . $classNames . ' notify" ' . $buttonDataAttrs);
            ?>
        <?php else : ?>
            <?php
                $tmpPrice = (float)$productItems->productBuy->prices['costPrice'];
                if (!(VmConfig::get('askprice', true) and empty($tmpPrice))) {
                    if (isset($productItems->productBuy->orderable) && $productItems->productBuy->orderable) {
                        $vmLang = VmConfig::get ('vmlang_js', 1) ? '&lang=' . substr (VmConfig::$vmlang, 0, 2) : '';
                        $attributes = 'data-vmsiteurl="' . JURI::root( ) . '" ' .
                            'data-vmlang="' . $vmLang . '" ' .
                            'data-vmsuccessmsg="' . JText::_('COM_VIRTUEMART_CART_ADDED') . '" ' .
                            'title="' . $productItems->productBuy->product_name . '" ' .
                            'class="' . $classNames . ' add_to_cart_button" ' .
                            $buttonDataAttrs;
                        echo JHTML::link ('#', JText::_ ('COM_VIRTUEMART_CART_ADD_TO'), $attributes);
                    } else {
                        $button = JHTML::link ($productItems->productBuy->link, JText::_ ('COM_VIRTUEMART_CART_ADD_TO'),
                            'title="' . $productItems->productBuy->product_name . '" ' . 'class="' . $classNames . '" ' . $buttonDataAttrs);
                        if (isset($productItems->productBuy->isOne))
                            $button = JText::_('COM_VIRTUEMART_ADDTOCART_CHOOSE_VARIANT');
                        echo $button;
                    }
                }
            ?>
        <?php endif; ?>
    <?php endif; ?>
    <input type="hidden" name="quantity[]" value="<?php echo $quantity; ?>"/>
    <noscript><input type="hidden" name="task" value="add"/></noscript>
    <input type="hidden" name="option" value="com_virtuemart"/>
    <input type="hidden" name="view" value="cart"/>
    <input type="hidden" name="virtuemart_product_id[]" value="<?php echo $productItems->productBuy->virtuemart_product_id ?>"/>
    <input type="hidden" class="pname" value="<?php echo htmlentities($productItems->productBuy->product_name) ?>"/>
</form>
<?php endif; ?>
                            </div>
                        </div>
                        <?php if (($i + 1) % $_itemsInRow == 0 || $i == $productsCount - 1): ?>
                            </div>
                        <?php endif ?>
                        <?php $i++ ?>
                    <?php endforeach; ?>
                    </div>
                    <?php if ($productsCount > $_itemsInRow): ?>
                            
                                <div class="bd-left-button">
    <a class=" bd-carousel-26" href="#">
        <span class="bd-icon"></span>
    </a>
</div>

<div class="bd-right-button">
    <a class=" bd-carousel-26" href="#">
        <span class="bd-icon"></span>
    </a>
</div>
                    <?php endif ?>
                        </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
        </div>
	</div>
	
	<?php endif; ?>
<?php endif; ?>
