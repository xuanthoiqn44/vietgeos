<!DOCTYPE html>
<html lang="<?php echo $document->language; ?>" dir="ltr">
<head>
    <?php include("$themeDir/site/base.php"); ?>
   <?php include("$themeDir/site/style.php"); ?>
    
</head>
<body class=" bootstrap bd-body-6  bd-pagebackground-22 bd-margins">
    <div data-affix
     data-offset=""
     data-fix-at-screen="top"
     data-clip-at-control="top"
     
 data-enable-lg
     
 data-enable-md
     
 data-enable-sm
     
      class=" bd-affix-1 bd-no-margins bd-margins "><?php include("$themeDir/site/header.php"); ?></div>

		
	
<?php if ($slideshow_close_section == 2) { ?><?php include("$themeDir/site/slideshow.php"); ?><?php } ?>


	
	  	
	  	
	
		
	
		
	

	
		<div class="bd-containereffect-4 container-effect container ">
<div class=" bd-stretchtobottom-2 bd-stretch-to-bottom" data-control-selector=".bd-contentlayout-6">
<div class="bd-contentlayout-6   bd-sheetstyles-3  bd-no-margins bd-margins" >
    <div class="bd-container-inner">

        <div class="bd-flex-vertical bd-stretch-inner bd-contentlayout-offset">
            
 <?php renderTemplateFromIncludes('sidebar_area_1'); ?>
            <div class="bd-flex-horizontal bd-flex-wide bd-no-margins">
                
 <?php renderTemplateFromIncludes('sidebar_area_3'); ?>
                <div class="bd-flex-vertical bd-flex-wide bd-no-margins">
                    
 <?php renderTemplateFromIncludes('sidebar_area_5'); ?>

                    <div class=" bd-layoutitemsbox-23 bd-flex-wide bd-no-margins">
    <div class=" bd-content-6">
    <?php
            $document = JFactory::getDocument();
            echo $document->view->renderSystemMessages();
    $document->view->componentWrapper('blog_3');
    echo '<jdoc:include type="component" />';
    ?>
</div>
</div>

                    
 <?php renderTemplateFromIncludes('sidebar_area_6'); ?>
                </div>
                
 <?php renderTemplateFromIncludes('sidebar_area_2'); ?>
            </div>
            
 <?php renderTemplateFromIncludes('sidebar_area_4'); ?>
        </div>

    </div>
</div></div>
</div>
	
	
		<footer class=" bd-footerarea-1 bd-margins">
       
     
	
		<section class=" bd-section-16 bd-page-width bd-tagstyles bd-bootstrap-btn bd-btn-primary " id="blank-4module" data-section-title="blank4module">
    <div class="bd-container-inner bd-margins clearfix">
        <?php
    renderTemplateFromIncludes('joomlaposition_13');
?>
    </div>
</section>
	
		<?php if ($design_close_section == 1 ) { ?><?php include("$themeDir/site/design.php"); ?><?php } ?>
</footer>
	
		
</body>
</html>