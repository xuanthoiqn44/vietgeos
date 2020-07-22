<header class=" bd-headerarea-1  bd-margins">
        <section class=" bd-section-3 bd-tagstyles bd-bootstrap-btn bd-btn-primary " id="header-1" data-section-title="header">
    <div class="bd-container-inner bd-margins clearfix">
        <div class=" bd-layoutbox-2 bd-no-margins clearfix">
    <div class="bd-container-inner">
        <div class=" bd-layoutbox-4 bd-no-margins clearfix">
    <div class="bd-container-inner">
        <?php
$app = JFactory::getApplication();
$themeParams = $app->getTemplate(true)->params;
$sitename = $app->getCfg('sitename');
$logoSrc = '';
ob_start();
?>
src="<?php echo JURI::base() . 'templates/' . JFactory::getApplication()->getTemplate(); ?>/images/designer/logo.png"
<?php

$logoSrc = ob_get_clean();
$logoLink = '';

if ($themeParams->get('logoFile'))
    $logoSrc = 'src="' . JURI::root() . $themeParams->get('logoFile') . '"';

if ($themeParams->get('logoLink'))
    $logoLink = $themeParams->get('logoLink');

if (!$logoLink)
    $logoLink = JUri::base(true);

?>
<a class=" bd-logo-2 animated bd-animation-15 bd-no-margins"  href="<?php echo $logoLink; ?>">
<img class=" bd-imagestyles-144" <?php echo $logoSrc; ?> alt="<?php echo $sitename; ?>">
</a>
    </div>
</div>
	
		<div class=" bd-layoutbox-6 bd-no-margins bd-no-margins clearfix">
    <div class="bd-container-inner">
        <div class=" bd-socialicons-2">
    
        <?php if (isset($facebook_off)) if ($facebook_off == 1) { ?><a target="_blank" class=" bd-socialicon-11 bd-socialicon" href="<?php echo $document->params->get('facebook'); ?>">
    <span class="bd-icon"></span><span></span>
</a><?php } ?>
    
        <?php if (isset($twitter_off)) if ($twitter_off == 1) { ?><a target="_blank" class=" bd-socialicon-12 bd-socialicon" href="<?php echo $document->params->get('twitter'); ?>">
    <span class="bd-icon"></span><span></span>
</a><?php } ?>
    
        <?php if (isset($google_off)) if ($google_off == 1) { ?><a target="_blank" class=" bd-socialicon-13 bd-socialicon" href="<?php echo $document->params->get('google'); ?>">
    <span class="bd-icon"></span><span></span>
</a><?php } ?>
    
        <?php if (isset($pinterest_off)) if ($pinterest_off == 1) { ?><a target="_blank" class=" bd-socialicon-14 bd-socialicon" href="<?php echo $document->params->get('pinterest'); ?>">
    <span class="bd-icon"></span><span></span>
</a><?php } ?>
    
        <?php if (isset($linkedin_off)) if ($linkedin_off == 1) { ?><a target="_blank" class=" bd-socialicon-15 bd-socialicon" href="<?php echo $document->params->get('linkedin'); ?>">
    <span class="bd-icon"></span><span></span>
</a><?php } ?>
    
    
    
    
    
</div>
	
		<?php if (isset($search_off)) if ($search_off == 1) { ?><form id="search-4" role="form" class=" bd-search-4 bd-no-margins form-inline" name="search" <?php echo funcBuildRoute(JFactory::getDocument()->baseurl . '/index.php', 'action'); ?> method="post">
    <div class="bd-container-inner">
        <input type="hidden" name="task" value="search">
        <input type="hidden" name="option" value="com_search">
        <div class="bd-search-wrapper">
            
                <input type="text" name="searchword" class=" bd-bootstrapinput-22 form-control input-sm" placeholder="Search">
                <a href="#" class="bd-icon-87 bd-icon " link-disable="true"></a>
        </div>
        <script>
            (function (jQuery, $) {
                jQuery('.bd-search-4 .bd-icon-87').on('click', function (e) {
                    e.preventDefault();
                    jQuery('#search-4').submit();
                });
            })(window._$, window._$);
        </script>
    </div>
</form><?php } ?>
    </div>
</div>
	
		<?php if (isset($adress1_off)) if ($adress1_off == 1) { ?><div class=" bd-layoutbox-29 bd-no-margins clearfix">
    <div class="bd-container-inner">
        <img class="bd-imagelink-5 bd-own-margins bd-imagestyles   "  src="<?php echo JURI::base() . 'templates/' . JFactory::getApplication()->getTemplate(); ?>/images/designer/45e7aefe43a007a421aba4dfcafad4b6_callcontact.png">
	
		<p class=" bd-textblock-30 bd-content-element">

<?php echo $document->params->get('bh1'); ?>&nbsp;&nbsp;<br><?php echo $document->params->get('bh2'); ?>

</p>
    </div>
</div><?php } ?>
	
		<?php if (isset($adress2_off)) if ($adress2_off == 1) { ?><div class=" bd-layoutbox-13 bd-no-margins clearfix">
    <div class="bd-container-inner">
        <img class="bd-imagelink-16 bd-own-margins bd-imagestyles   "  src="<?php echo JURI::base() . 'templates/' . JFactory::getApplication()->getTemplate(); ?>/images/designer/7c39c04bb50cfdfcb9e318a0437a4126_facebookplaceholderforlocateplacesonmaps.png">
	
		<p class=" bd-textblock-12 bd-content-element">
 
<?php echo $document->params->get('bh3'); ?><br><?php echo $document->params->get('bh4'); ?>

</p>
    </div>
</div><?php } ?>
    </div>
</div>
    </div>
</section>
	
		<section class=" bd-section-15 bd-page-width bd-tagstyles bd-bootstrap-btn bd-btn-primary " id="section15" data-section-title="Section">
    <div class="bd-container-inner bd-margins clearfix">
        <?php
    renderTemplateFromIncludes('hmenu_4', array());
?>
    </div>
</section>
</header>