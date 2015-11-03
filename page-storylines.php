<?php 	//	Template Name: Storylines

/* GRAB FIELDS
=================================================*/
$ID = get_the_ID();$title = get_the_title($ID);$featured_img = get_the_post_thumbnail();


/* META TAGS
=================================================*/
print '<meta charset="utf-8"><title> '.$title.' | EdSource</title></meta>';
print '<meta name="description" content="A non-profit journalism website reporting on key education issues in California and beyond."></meta>';
print '<meta name="tags" content="education news, california education, non-profit news, common core, local control funding formula, k-12 education"></meta> ';
print '<meta name="HandheldFriendly" content="true" />';
print '<meta name="MobileOptimized" content="320" />';
print '<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no" />';

print '<link rel="shortcut icon" href="http://edsource.org/wp-content/themes/nakatomi/styles/graphics/favicon.png">';
print '<link href=\'http://fonts.googleapis.com/css?family=Montserrat:400,700\' rel=\'stylesheet\' type=\'text/css\'>';
print '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">';
print '<link href=\'http://fonts.googleapis.com/css?family=Crimson+Text:400,400italic,700\' rel=\'stylesheet\' type=\'text/css\'>';
print '<link rel=\'stylesheet\' id=\'default_css-css\'  href=\'http://edsource.org/wp-content/themes/nakatomi/style.css\' type=\'text/css\' media=\'all\' />';
print '<link rel="stylesheet" type="text/css" href="http://edsource.org/wp-content/themes/nakatomi/styles/storylines.css">';

print '<script type=\'text/javascript\' src=\'http://edsource.org/wp-includes/js/jquery/jquery.js\'></script>';
print '<script type=\'text/javascript\' src=\'http://edsource.org/wp-content/themes/nakatomi/scripts/storylines.js\'></script>';

/* HEADER TAGS
=================================================*/
print '<div id="sl-contain" role="article">';
	print '<section id="sl-header">';
		print '<div class="sl-site"><h2><a href="http://edsource.org">EdSource</a></h2></div>';
		print '<div><h2><a href="http://edsource.org/storylines">Storylines</a></h2></div>';
		print '<div>';print '</div>';
	print '</section>';

/* CONTENT TAGS
=================================================*/
	print '<section id="sl-body">';

		// check for featured img and add //
		if ($featured_img){print '<div class="sl-full-img">'.$featured_img.'</div>';}

		// INTRO AREA //
		print '<div id="sl-intro" class="sl-content">';
			print '<h2>'.$title.'</h2>';
			if(have_posts()) { while(have_posts()) { the_post();the_content();}}
		print '</div>';

		// STORYLINES AREA //
		print '<div id="sl-contain">';
			print '<div class="sl-year">2016</div>';
			print '<div class="sl-year-contain">';

				print '<div class="sl-date"><h4>April 24</h4></div>';
				print '<aside class="sl-entry sl-content">';
					print '<div class="meta">';
						print '<div><img src="http://edsource.org/wp-content/uploads/2015/09/harr-circ.png"></div>';
					print '</div>';
					print '<div class="content">';
						print '<h3>New vaccine will make old vaccines outdated, experts say.</h3>';
						print '<p>In sodales facilisis cursus. Suspendisse at bibendum nunc. Nulla semper, dui sed rhoncus semper, ligula urna porttitor ligula, et dictum nisi libero dapibus arcu. Donec tempor elementum purus, facilisis interdum elit vehicula eu. Nullam consectetur sit amet quam a venenatis. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum sodales scelerisque odio eget malesuada. Mauris arcu enim, maximus at eleifend ac, hendrerit ac leo. Sed gravida eget enim at mollis. Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec consectetur consequat nulla at gravida. Etiam consectetur sem consequat dolor tempus, at dignissim nisl blandit. Nullam viverra, nunc nec convallis porttitor, lacus augue rhoncus dui, eget interdum nulla quam id mi. Vivamus vulputate tincidunt pulvinar.</p>';
					print '</div>';
				print '</aside>';

				print '<div class="sl-date"><h4>April 24</h4></div>';
				print '<aside class="sl-entry sl-content">';
					print '<div class="meta">';
						print '<div><img src="http://edsource.org/wp-content/uploads/2015/09/harr-circ.png"></div>';
					print '</div>';
					print '<div class="content">';
						print '<h3>New vaccine will make old vaccines outdated, experts say.</h3>';
						print '<div class="sl-lead-img"><img src="http://edsource.org/wp-content/uploads/2015/08/Santa-Ana-Classroom-1.jpg"></div>';
						print '<p>In sodales facilisis cursus. Suspendisse at bibendum nunc. Nulla semper, dui sed rhoncus semper, ligula urna porttitor ligula, et dictum nisi libero dapibus arcu. Donec tempor elementum purus, facilisis interdum elit vehicula eu. Nullam consectetur sit amet quam a venenatis. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum sodales scelerisque odio eget malesuada. Mauris arcu enim, maximus at eleifend ac, hendrerit ac leo. Sed gravida eget enim at mollis. Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec consectetur consequat nulla at gravida. Etiam consectetur sem consequat dolor tempus, at dignissim nisl blandit. Nullam viverra, nunc nec convallis porttitor, lacus augue rhoncus dui, eget interdum nulla quam id mi. Vivamus vulputate tincidunt pulvinar.</p>';
					print '</div>';
				print '</aside>';	
		print '<div>';
		print '</div>';
	print  '</section>';
print  '</div>';

?>