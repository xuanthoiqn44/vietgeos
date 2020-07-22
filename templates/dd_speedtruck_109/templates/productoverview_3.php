<!DOCTYPE html>
<html lang="<?php echo $document->language; ?>" dir="ltr">
<head>
  <?php include("$themeDir/site/base.php"); ?>
   <?php include("$themeDir/site/style.php"); ?>
</head>
<body class=" bootstrap bd-body-3  bd-pagebackground bd-margins">
    <div data-affix
     data-offset=""
     data-fix-at-screen="top"
     data-clip-at-control="top"
     
 data-enable-lg
     
 data-enable-md
     
 data-enable-sm
     
     class=" bd-affix-1 bd-no-margins bd-margins "><?php include("$themeDir/site/header.php"); ?></div>
     <section class=" bd-section-18 bd-page-width bd-tagstyles bd-bootstrap-btn bd-btn-primary " id="slideshow-m" data-section-title="slideshow_m">
    <div class="bd-container-inner bd-margins clearfix">
        <?php
    renderTemplateFromIncludes('joomlaposition_15');
?>
    </div>
</section>
		
	
<?php if ($slideshow_close_section == 2) { ?><?php include("$themeDir/site/slideshow.php"); ?><?php } ?>


	
		
	  	
	  	
	
		
	
		
	

	
		<div class="bd-contentlayout-1 bd-sheetstyles  bd-no-margins bd-margins" >
    <div class="bd-container-inner">

        <div class="bd-flex-vertical bd-stretch-inner bd-no-margins">
            
            <div class="bd-flex-horizontal bd-flex-wide bd-no-margins">
                
                <div class="bd-flex-vertical bd-flex-wide bd-no-margins">
                    

                    <div class=" bd-layoutitemsbox-1 bd-flex-wide bd-margins">
    <div class=" bd-content-10">
    <?php
            $document = JFactory::getDocument();
            echo $document->view->renderSystemMessages();
    $document->view->componentWrapper('common');
    echo '<jdoc:include type="component" />';
    ?>
</div>
</div>

                    
                </div>
                
            </div>
            
        </div>

    </div>
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