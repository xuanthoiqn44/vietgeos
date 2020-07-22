<?php
defined('_JEXEC') or die;
?>
<?php /*BEGIN_EDITOR_OPEN*/
$app = JFactory::getApplication('site');
$templateName = $app->getTemplate();

$ret = false;
$templateDir = JPATH_THEMES . '/' . $templateName;
$editorClass = $templateDir . '/app/' . 'Editor.php';

if (!$app->isAdmin() && file_exists($editorClass)) {
    require_once $templateDir . '/app/' . 'Editor.php';
    $ret = DesignerEditor::override($templateName, __FILE__);
}

if ($ret) {
    $editorDir = $templateName . '/editor';
    require($ret);
    return;
} else {
/*BEGIN_EDITOR_CLOSE*/ ?>
<div class=" bd-cartcontainer-1">
    <?php $currentRawProduct = reset($data->rawProducts); ?>
<div class=" bd-grid-12">
    <div class="container-fluid">
        <div class="separated-grid row">
        <?php foreach ($data->products as $product): ?>
            <?php
                preg_match('/href="(.*?)"/i', $product['product_name'], $hrefParts);
                $product['href'] = $hrefParts[1];
                //create product title decorator object
                $productTitleDecorator = new stdClass();
                $productTitleDecorator->link = $product['href'];
                $productTitleDecorator->name = $product['product_name'];
                //cretae products items collection
                $productItems = new stdClass();
                $productItems->productTitle = $productTitleDecorator;
                $productImageDecorator = new stdClass();
                $productImageDecorator->imagesExists = true;
                if ($currentRawProduct && $currentRawProduct->virtuemart_media_id && $currentRawProduct->virtuemart_media_id[0]) {
                    if (!class_exists ('TableMedias'))
                        require(JPATH_VM_ADMINISTRATOR . DS . 'tables' . DS . 'medias.php');
                    $db = JFactory::getDBO ();
                    $result = new TableMedias($db);
                    $result->load((int)$currentRawProduct->virtuemart_media_id[0]);
                    if (!class_exists ('VmMediaHandler'))
                        require(JPATH_VM_ADMINISTRATOR . DS . 'helpers' . DS . 'mediahandler.php');
                    $media = VmMediaHandler::createMedia ($result, 'product');
                    $productImageDecorator->image = $media;
                } else {
                    $themeUrl = VmConfig::get('vm_themeurl',0);
                    if(empty($themeUrl)) {
                        $themeUrl = JURI::root().'components/com_virtuemart/';
                    }
                    $src = $themeUrl.'assets/images/vmgeneral/' . VmConfig::get('no_image_set');
                    $alt = JText::_('COM_VIRTUEMART_NO_IMAGE_SET');
                    $productImageDecorator->image = '<img src="' . $src . '" alt="' . $alt . '" />';
                }
                $productImageDecorator->link = $product['href'];
                $productImageDecorator->offsetHeight = 0;
                $productImageDecorator->offsetWidth = 0;
                $productItems->productImage = $productImageDecorator;
            ?>
            <div class="separated-item-3 col-md-12 list">
    <div class=" bd-griditem-3"><?php if (isset($productItems->productImage)) : ?>
    <?php if ($productItems->productImage->imagesExists) : ?>
    <?php
        $offsetHeight = isset($productItems->productImage->offsetHeight) ? $productItems->productImage->offsetHeight : 0;
        $offsetWidth = isset($productItems->productImage->offsetWidth) ? $productItems->productImage->offsetWidth : 0;
        $height = 'height:' . (VmConfig::get ('img_height') + $offsetHeight) . 'px;';
        $width ='width:' . (VmConfig::get ('img_width') + $offsetWidth) . 'px;';
        if (is_object($productItems->productImage->image))
            $imgHtml = $productItems->productImage->image->displayMediaThumb('class=" bd-imagestyles"', false);
        else
            $imgHtml = str_replace('<img', '<img class=" bd-imagestyles" ', $productItems->productImage->image);
    ?>
    <a class=" bd-productimage-3" href="<?php echo $productItems->productImage->link; ?>">
        <?php echo $imgHtml; ?>
    </a>
    <?php endif; ?>
<?php endif; ?>
	
		<?php if (isset($productItems->productTitle)) : ?>
<div class=" bd-producttitle-6">
    <?php
    if ('' !== $productItems->productTitle->link)
        echo JHTML::link($productItems->productTitle->link, $productItems->productTitle->name);
    else 
        echo $productItems->productTitle->name;
    ?>
</div>
<?php endif; ?>
	
		<div class=" bd-cartprice-1">
    <?php echo $product['quantity'] ?> x <div class=" bd-pricetext-5">
<?php
    if (!class_exists('CustomCurrency')) {
        class CustomCurrency {
            private $_style;
            public function __construct()
            {
                $vendorM = VmModel::getModel('currency');
                $this->_style = $vendorM->getData(0);
            }
            public function getDecimalSymbol()
            {
                if(!empty($this->_style))
                    return $this->_style->currency_decimal_symbol;
                return '';
            }
            public function getThousandsSeperator()
            {
                if(!empty($this->_style))
                    return $this->_style->currency_thousands;
                return '';
            }
            public function getDecimals()
            {
                if(!empty($this->_style))
                    return $this->_style->currency_decimal_place;
                return 0;
            }

        }
    }

    $currencyDisplay = new CustomCurrency();
    $decimalSymbol = $currencyDisplay->getDecimalSymbol();
    $decimals = $currencyDisplay->getDecimals();
    $thousandsSeparator = $currencyDisplay->getThousandsSeperator();
    if (preg_match('/[\.\d' . $decimalSymbol . $thousandsSeparator . ']+/', trim($product['subtotal_with_tax']), $matches)) {
        $str = str_replace($thousandsSeparator, '', $matches[0]);
        $str = str_replace($decimalSymbol, '.', $str) / $product['quantity'];
        $str = str_replace('.', $decimalSymbol, $str);
        $parts = explode($decimalSymbol, $str);

        $strrev = strrev($parts[0]);
        $count = strlen($strrev);
        $price = '';
        $i = 0;
        while($i < $count) {
            $price = (($i + 1) % 3 == 0 ? $thousandsSeparator : '') . $strrev[$i] . $price;
            $i++;
        }
        if (count($parts) > 1) {
            $dec = round(0 . '.' . $parts[1], $decimals);
            if (strlen($parts[1]) < $decimals)
                $dec .= str_repeat('0', $decimals - strlen($parts[1]));
            $price .= $decimalSymbol . substr($dec, 2);
        }

        $leftCurrency = ''; $rightCurrency = '';
        $tmp = trim(str_replace($matches[0], '{s}', $product['subtotal_with_tax']));
        if ('' !== $tmp) {
            $parts = explode('{s}', $tmp);
            if ('' !== trim($parts[0]))
                $leftCurrency = $parts[0];
            else
                $rightCurrency = $parts[1];
        }
        if(!class_exists('calculationHelper'))
            require(JPATH_VM_ADMINISTRATOR.DS.'helpers'.DS.'calculationh.php');
        $calculator = calculationHelper::getInstance ();
        $calculator->_roundindig = 0;
        echo  $leftCurrency . $price . $rightCurrency;
    } else {
        echo $product['subtotal_with_tax'];
    }
?>
</div>
</div>
	
		<a class=" bd-itemeditlink-1" href="<?php echo $product['href']; ?>">
    <span class="
 bd-icon-60 bd-icon "></span>
</a></div>
</div>
        <?php $currentRawProduct = next($data->rawProducts); ?>
        <?php endforeach; ?>
        </div>
    </div>
</div>
	
		<div class=" bd-pricetext-7">
    <span class=" bd-label-7">
	<?php echo $totalLabel; ?>
</span>
    <span class=" bd-container-77 bd-tagstyles bd-bootstrap-btn bd-btn-primary">
        <?php echo $totalPrice; ?>
    </span>
</div>
	
		<a href="<?php echo $cartHref; ?>" class=" btn   btn-primary">
    <?php echo $cartText; ?>
</a>
	
		<a href="<?php echo JRoute::_ ('index.php?option=com_virtuemart&view=cart&task=checkout_task'); ?>" class=" btn   btn-primary">
    <?php echo vmText::_('COM_VIRTUEMART_CHECKOUT_TITLE'); ?>
</a>
</div>
<?php /*END_EDITOR_OPEN*/ } /*END_EDITOR_CLOSE*/ ?>