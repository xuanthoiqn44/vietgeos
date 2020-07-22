<?php
defined('_JEXEC') or die;
?>

<?php
require_once dirname(dirname(dirname(dirname(__FILE__)))) . DIRECTORY_SEPARATOR . 'functions.php';
?>
<br />
<div class=" bd-shoppingcartgrandtotal-1 cart-totals grand-totals">
    <table class=" bd-table">
        <thead>
            <tr>
                <th colspan="2"></th>
            </tr>
        </thead>
        <tbody>
            <?php if (VmConfig::get ('show_tax')) : ?>
            <tr>
                <td><?php  echo "<span  class='priceColor2'>" . JText::_ ('COM_VIRTUEMART_CART_SUBTOTAL_TAX_AMOUNT') ?></td>
                <td>
                    <?php
                        $text = $this->currencyDisplay->createPriceDiv ('billTaxAmount', '', $this->cart->pricesUnformatted['billTaxAmount'], FALSE);
                        echo "<span  class='priceColor2'>" . (!empty($text) ? $text : '-') . "</span>"
                    ?>
                </td>
            </tr>
            <?php endif; ?>
            <tr>
                <td><?php echo "<span  class='priceColor2'>" . JText::_ ('COM_VIRTUEMART_CART_SUBTOTAL_DISCOUNT_AMOUNT') ?></td>
                <td>
                    <?php
                        $text = $this->currencyDisplay->createPriceDiv ('billDiscountAmount', '', $this->cart->pricesUnformatted['billDiscountAmount'], FALSE);
                        echo "<span  class='priceColor2'>" . (!empty($text) ? $text : '-') . "</span>"
                    ?>
                </td>
            </tr>
        </tbody>
        <tfoot>
            <tr class=" bd-container-156 bd-tagstyles bd-bootstrap-btn bd-btn-primary">
                <td>
                    <strong><?php echo JText::_ ('COM_VIRTUEMART_CART_TOTAL') ?>:</strong>
                </td>
                <td>
                    <strong><span><?php echo $this->currencyDisplay->createPriceDiv ('billTotal', '', $this->cart->pricesUnformatted['billTotal'], FALSE); ?></span></strong>
                </td>
            </tr>
        </tfoot>
    </table>
</div>
