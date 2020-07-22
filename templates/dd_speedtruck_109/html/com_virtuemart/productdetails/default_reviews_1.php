<?php
defined('_JEXEC') or die;
?>

<?php
    $maxrating = VmConfig::get ('vm_maximum_rating_scale', 5);
    $ratingsShow = VmConfig::get ('vm_num_ratings_show', 3); // TODO add  vm_num_ratings_show in vmConfig
    $stars = array();
    $showall = JRequest::getBool ('showall', FALSE);
    $ratingWidth = $maxrating * 24;
    for ($num = 0; $num <= $maxrating; $num++) {
        $stars[] = '
                <span title="' . (JText::_ ("COM_VIRTUEMART_RATING_TITLE") . $num . '/' . $maxrating) . '" class="vmicon ratingbox" style="display:inline-block;width:' . 24 * $maxrating . 'px;">
                    <span class="stars-orange" style="width:' . (24 * $num) . 'px">
                    </span>
                </span>';
    } ?>
<div class=" bd-productreviews-1">
    <?php if ($this->showReview):	?>
        <div class=" bd-container-99 bd-tagstyles bd-bootstrap-btn bd-btn-primary">
    <h4><?php echo JText::_ ('COM_VIRTUEMART_REVIEWS') ?></h4>
</div>
        <div class="list-reviews">
            <?php
            $i = 0;
            $review_editable = TRUE;
            $reviews_published = 0;
            if ($this->rating_reviews) {
                foreach ($this->rating_reviews as $review) {
                    if ($i % 2 == 0) {
                        $color = 'normal';
                    } else {
                        $color = 'highlight';
                    }
                    /* Check if user already commented */
                    if ($review->created_by == $this->user->id && !$review->review_editable) {
                        $review_editable = FALSE;
                    }
                    ?>

                    <?php // Loop through all reviews
                    if (!empty($this->rating_reviews) && $review->published) {
                        $reviews_published++;
                        ?>
                        <div class=" bd-productreview-1">
    <div class=" bd-layoutcontainer-17 bd-columns bd-no-margins">
    <div class="bd-container-inner">
        <div class="container-fluid">
            <div class="row ">
                <div class=" bd-columnwrapper-23 
 col-md-1">
    <div class="bd-layoutcolumn-23 bd-column" ><div class="bd-vertical-align-wrapper"><div class=" bd-reviewavatar-1">
    <img class=" bd-imagestyles" src="" style="height: 50px; width: 50px">
</div></div></div>
</div>
	
		<div class=" bd-columnwrapper-27 
 col-md-11">
    <div class="bd-layoutcolumn-27 bd-column" ><div class="bd-vertical-align-wrapper"><div class=" bd-reviewmetadata-1">
    <?php echo JHTML::date ($review->created_on, JText::_ ('DATE_FORMAT_LC')); ?>
</div>
	
		<div class=' bd-rating'>
    <?php for ($i = 1; $i <= $maxrating; $i++) : ?>
    <?php $active = ($i <= $review->review_rating ? ' active' : ''); ?>
    <span class='  bd-icon bd-icon-3 <?php echo $active ?>'></span>
    <?php endfor; ?>
</div>
	
		<div class=" bd-reviewtext-1">
    <?php echo $review->comment ?>
</div></div></div>
</div>
            </div>
        </div>
    </div>
</div>
</div>
                        <?php
                    }
                    $i++;
                    if ($i == $ratingsShow && !$showall) {
                        /* Show all reviews ? */
                        if ($reviews_published >= $ratingsShow) {
                            $attribute = array('class'=> 'details', 'title'=> JText::_ ('COM_VIRTUEMART_MORE_REVIEWS'));
                            echo JHTML::link ($this->more_reviews, JText::_ ('COM_VIRTUEMART_MORE_REVIEWS'), $attribute);
                        }
                        break;
                    }
                }

            } else {
                // "There are no reviews for this product"
                ?>
                <span class="step"><?php echo JText::_ ('COM_VIRTUEMART_NO_REVIEWS') ?></span>
                <?php
            }  ?>
            <div class="clear"></div>
        </div>
    <?php endif; ?>
    <div class=" bd-reviewform-1">
    <?php if ($this->showReview && $this->allowReview): ?>
    <form method="post" action="<?php echo JRoute::_ ('index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id=' . $this->product->virtuemart_product_id . '&virtuemart_category_id=' . $this->product->virtuemart_category_id); ?>" name="reviewForm" id="reviewform">
            <?php // Show Review Length While Your Are Writing
            $reviewJavascript = "
            function check_reviewform() {
                var form = document.getElementById('reviewform');

                var ausgewaehlt = false;

                if (form.comment.value.length < " . VmConfig::get ('reviews_minimum_comment_length', 100) . ") {
                    alert('" . addslashes (JText::sprintf ('COM_VIRTUEMART_REVIEW_ERR_COMMENT1_JS', VmConfig::get ('reviews_minimum_comment_length', 100))) . "');
                    return false;
                }
                else if (form.comment.value.length > " . VmConfig::get ('reviews_maximum_comment_length', 2000) . ") {
                    alert('" . addslashes (JText::sprintf ('COM_VIRTUEMART_REVIEW_ERR_COMMENT2_JS', VmConfig::get ('reviews_maximum_comment_length', 2000))) . "');
                    return false;
                }
            else {
                return true;
            }
            }

            function refresh_counter() {
                var form = document.getElementById('reviewform');
                form.counter.value= form.comment.value.length;
            }

            jQuery(function($) {
                var steps = " . $maxrating . ";
                var parentPos= $('.write-reviews .ratingbox').position();
                var boxWidth = $('.write-reviews .ratingbox').width();// nbr of total pixels
                var starSize = (boxWidth/steps);

            /*$('.write-reviews .ratingbox').mousemove( function(e){
                var span = $(this).children(),
                ratingboxPos = $('.write-reviews .ratingbox').offset();
                var dif = e.pageX-ratingboxPos.left; // nbr of pixels
                difRatio = Math.floor(dif/boxWidth* steps )+1; //step
                span.width(difRatio*starSize);
                $('#vote').val(difRatio);
                //console.log('note = ', difRatio);
            });*/
                /*$('.stars').click(function(e) {
                    var value = $(this).val();
                    $('#vote').val(value);
                });*/
            });";
            $document = JFactory::getDocument ();
            $document->addScriptDeclaration ($reviewJavascript);

            if ($this->showRating) {
            if ($this->allowRating && $review_editable) {
            ?>
            <div class=" bd-container-100 bd-tagstyles bd-bootstrap-btn bd-btn-primary">
                <h4>
                    <?php echo JText::_ ('COM_VIRTUEMART_WRITE_REVIEW')  ?>
                    <span>
                        <?php echo JText::_ ('COM_VIRTUEMART_WRITE_FIRST_REVIEW') ?>
                    </span>
                </h4>
            </div>
            <?php

                }
            }
            if ($review_editable) {
                ?>
            <span class="step"><?php echo JText::sprintf ('COM_VIRTUEMART_REVIEW_COMMENT', VmConfig::get ('reviews_minimum_comment_length', 100), VmConfig::get ('reviews_maximum_comment_length', 2000)); ?></span>
            <br/>
            <textarea class=" bd-bootstrapinput form-control" title="<?php echo JText::_ ('COM_VIRTUEMART_WRITE_REVIEW') ?>"  id="comment" onblur="refresh_counter();" onfocus="refresh_counter();" onkeyup="refresh_counter();" name="comment" rows="5" cols="60"><?php if (!empty($this->review->comment)) {
                echo $this->review->comment;
                } ?></textarea>
            <br/>
            <?php if ($this->showRating && $this->allowRating) : ?>
            <div class="review-rating">
                <span class="step"><?php echo JText::_ ('COM_VIRTUEMART_RATING_FIRST_RATE') ?></span>
                <br/>
                <div class=' bd-rating'>
    <?php for ($i = 1; $i <= $maxrating; $i++) : ?>
    <span class="  bd-icon bd-icon-3 active"></span>
    <?php endfor; ?>
</div>
                <input type="hidden" id="vote" value="<?php echo $maxrating ?>" name="vote">
            </div>
            <?php endif; ?>
            <div class="review-count">
                <span><?php echo JText::_ ('COM_VIRTUEMART_REVIEW_COUNT') ?>
                    <input type="text" value="0" size="4" class=" bd-bootstrapinput form-control" name="counter" maxlength="4" readonly="readonly"/>
                </span>
            </div>
            <br style="clear:both"/><br/>
            <div class="review-button">
                <input class=" btn   btn-primary" type="submit" onclick="return( check_reviewform());" name="submit_review" title="<?php echo JText::_ ('COM_VIRTUEMART_REVIEW_SUBMIT')  ?>" value="<?php echo JText::_ ('COM_VIRTUEMART_REVIEW_SUBMIT')  ?>"/>
            </div>
            <?php
            } else {
                echo '<strong>' . JText::_ ('COM_VIRTUEMART_DEAR') . $this->user->name . ',</strong><br />';
            echo JText::_ ('COM_VIRTUEMART_REVIEW_ALREADYDONE');
            }
            ?>
        <input type="hidden" name="virtuemart_product_id" value="<?php echo $this->product->virtuemart_product_id; ?>"/>
        <input type="hidden" name="option" value="com_virtuemart"/>
        <input type="hidden" name="virtuemart_category_id" value="<?php echo JRequest::getInt ('virtuemart_category_id'); ?>"/>
        <input type="hidden" name="virtuemart_rating_review_id" value="0"/>
        <input type="hidden" name="task" value="review"/>
    </form>
    <?php endif; ?>
</div>
</div>
