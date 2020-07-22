 <?php
        $base = $document->getBase();
        if (!empty($base)) {
            echo '<base href="' . $base . '" />';
            $document->setBase('');
			$app = JFactory::getApplication();
            $tplparams	= $app->getTemplate(true)->params;
            
			 /*social icon */
                $facebook_off = htmlspecialchars($tplparams->get('facebook_off'));
                $twitter_off = htmlspecialchars($tplparams->get('twitter_off'));
                $google_off = htmlspecialchars($tplparams->get('google_off'));
                $pinterest_off = htmlspecialchars($tplparams->get('pinterest_off'));
                $linkedin_off = htmlspecialchars($tplparams->get('linkedin_off'));
			/*slideshow*/   
                $slide1_on_off = htmlspecialchars($tplparams->get('slide1_on_off'));
                $slide2_on_off = htmlspecialchars($tplparams->get('slide2_on_off'));
                $slide3_on_off = htmlspecialchars($tplparams->get('slide3_on_off'));
                $slide4_on_off = htmlspecialchars($tplparams->get('slide4_on_off'));
                $slide5_on_off = htmlspecialchars($tplparams->get('slide5_on_off'));
			    
			/*other */
				$slideshow_close_section = htmlspecialchars($tplparams->get('slideshow_close_section'));
				$news_close = htmlspecialchars($tplparams->get('news_close'));
			    $testimonials_close= htmlspecialchars($tplparams->get('testimonials_close'));
				$tabs_close_section= htmlspecialchars($tplparams->get('tabs_close_section'));
			    $search_off = htmlspecialchars($tplparams->get('search_off'));
			    $adress1_off = htmlspecialchars($tplparams->get('adress1_off'));
			    $adress2_off = htmlspecialchars($tplparams->get('adress2_off'));
			    $close_button = htmlspecialchars($tplparams->get('close_button'));
			    $video_close = htmlspecialchars($tplparams->get('video_close'));
			    $info_close_section = htmlspecialchars($tplparams->get('info_close_section'));
			    $imbc = htmlspecialchars($tplparams->get('imbc'));
				$portfolio_close_section = htmlspecialchars($tplparams->get('portfolio_close_section'));
				$info2_close_section = htmlspecialchars($tplparams->get('info2_close_section'));
			    $team_close_section = htmlspecialchars($tplparams->get('team_close_section'));
				$maps_close_section = htmlspecialchars($tplparams->get('maps_close_section'));
				$design_close_section = htmlspecialchars($tplparams->get('design_close_section'));
			    $footer_close_section = htmlspecialchars($tplparams->get('footer_close_section'));
		    /*testi */
				$t5c = htmlspecialchars($tplparams->get('t5c'));
				$t6c = htmlspecialchars($tplparams->get('t6c'));
				$t7c = htmlspecialchars($tplparams->get('t7c'));
				$t12c = htmlspecialchars($tplparams->get('t12c'));
				$t13c = htmlspecialchars($tplparams->get('t13c'));
				$t14c = htmlspecialchars($tplparams->get('t14c'));
				$t19c = htmlspecialchars($tplparams->get('t19c'));
				$t20c = htmlspecialchars($tplparams->get('t20c'));
				$t21c = htmlspecialchars($tplparams->get('t21c'));
				$t26c = htmlspecialchars($tplparams->get('t26c'));
				$t27c = htmlspecialchars($tplparams->get('t27c'));
				$t28c = htmlspecialchars($tplparams->get('t28c'));
				$t32c = htmlspecialchars($tplparams->get('t32c'));
				$t33c = htmlspecialchars($tplparams->get('t33c'));
				$t34c = htmlspecialchars($tplparams->get('t34c'));
				$t39c = htmlspecialchars($tplparams->get('t39c'));
				$t40c = htmlspecialchars($tplparams->get('t40c'));
				$t41c = htmlspecialchars($tplparams->get('t41c'));
				$ct1 = htmlspecialchars($tplparams->get('ct1'));
				$ct2 = htmlspecialchars($tplparams->get('ct2'));
				$ct3 = htmlspecialchars($tplparams->get('ct3'));
				$ct4 = htmlspecialchars($tplparams->get('ct4'));
				$ct5 = htmlspecialchars($tplparams->get('ct5'));
				$ct6 = htmlspecialchars($tplparams->get('ct6'));
				$tem4c = htmlspecialchars($tplparams->get('tem4c'));
				$tem5c = htmlspecialchars($tplparams->get('tem5c'));
				$tem6c = htmlspecialchars($tplparams->get('tem6c'));
				$tem7c = htmlspecialchars($tplparams->get('tem7c'));

				$tem11c = htmlspecialchars($tplparams->get('tem11c'));
				$tem12c = htmlspecialchars($tplparams->get('tem12c'));
				$tem13c = htmlspecialchars($tplparams->get('tem13c'));
				$tem14c = htmlspecialchars($tplparams->get('tem14c'));

				$tem18c = htmlspecialchars($tplparams->get('tem18c'));
				$tem19c = htmlspecialchars($tplparams->get('tem19c'));
				$tem20c = htmlspecialchars($tplparams->get('tem20c'));
				$tem21c = htmlspecialchars($tplparams->get('tem21c'));
				$mec = htmlspecialchars($tplparams->get('mec'));
			
			
			    
		}
			   
    ?>
    <link href="<?php echo JURI::base()?>/<?php echo $document->params->get('fav'); ?>" rel="icon" type="image/x-icon" />