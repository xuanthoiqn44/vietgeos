<?php
    function sidebar_area_1() {
        $isPreview = $GLOBALS['theme_settings']['is_preview'];
        $GLOBALS['isModuleContentExists'] = false;
        ob_start();
?>
        <section class=" bd-section-21 bd-tagstyles bd-bootstrap-btn bd-btn-primary" id="section5" data-section-title="modules">
    <div class="bd-container-inner bd-margins clearfix">
        <div class=" bd-layoutcontainer-28 bd-columns bd-no-margins">
    <div class="bd-container-inner">
        <div class="container-fluid">
            <div class="row ">
                <div class=" bd-columnwrapper-74 
 col-sm-3">
    <div class="bd-layoutcolumn-74 bd-column" ><div class="bd-vertical-align-wrapper"><?php
    renderTemplateFromIncludes('joomlaposition_5');
?></div></div>
</div>
	
		<div class=" bd-columnwrapper-76 
 col-sm-3">
    <div class="bd-layoutcolumn-76 bd-column" ><div class="bd-vertical-align-wrapper"><?php
    renderTemplateFromIncludes('joomlaposition_14');
?></div></div>
</div>
	
		<div class=" bd-columnwrapper-80 
 col-sm-3">
    <div class="bd-layoutcolumn-80 bd-column" ><div class="bd-vertical-align-wrapper"><?php
    renderTemplateFromIncludes('joomlaposition_17');
?></div></div>
</div>
	
		<div class=" bd-columnwrapper-84 
 col-sm-3">
    <div class="bd-layoutcolumn-84 bd-column" ><div class="bd-vertical-align-wrapper"><?php
    renderTemplateFromIncludes('joomlaposition_19');
?></div></div>
</div>
            </div>
        </div>
    </div>
</div>
	
		<div class=" bd-layoutcontainer-31 bd-columns bd-no-margins">
    <div class="bd-container-inner">
        <div class="container-fluid">
            <div class="row ">
                <div class=" bd-columnwrapper-86 
 col-sm-6">
    <div class="bd-layoutcolumn-86 bd-column" ><div class="bd-vertical-align-wrapper"><?php
    renderTemplateFromIncludes('joomlaposition_21');
?></div></div>
</div>
	
		<div class=" bd-columnwrapper-88 
 col-sm-6">
    <div class="bd-layoutcolumn-88 bd-column" ><div class="bd-vertical-align-wrapper"><?php
    renderTemplateFromIncludes('joomlaposition_23');
?></div></div>
</div>
            </div>
        </div>
    </div>
</div>
	
		<div class=" bd-layoutcontainer-34 bd-columns bd-no-margins">
    <div class="bd-container-inner">
        <div class="container-fluid">
            <div class="row ">
                <div class=" bd-columnwrapper-90 
 col-sm-12">
    <div class="bd-layoutcolumn-90 bd-column" ><div class="bd-vertical-align-wrapper"><?php
    renderTemplateFromIncludes('joomlaposition_25');
?></div></div>
</div>
            </div>
        </div>
    </div>
</div>
    </div>
</section>
        <?php
            $content = trim(ob_get_clean());
            $modContentExists = $GLOBALS['isModuleContentExists'];
            $showContent = strlen(trim(preg_replace('/<!-- empty::begin -->[\s\S]*?<!-- empty::end -->/', '', $content)));
        ?>
        <?php if ($isPreview || ($content )): ?>
            <aside class="bd-sidebararea-1-column  bd-flex-vertical bd-flex-fixed <?php echo ($isPreview && (!$modContentExists && !$showContent)) ? ' hidden bd-hidden-sidebar' : ''; ?>">
                <div class="bd-sidebararea-1 bd-flex-wide  bd-margins">
                    
                    <?php echo $content; ?>
                    
                </div>
            </aside>
        <?php endif; ?>
<?php
    }
?>