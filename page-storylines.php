<?php 	//	Template Name: Storylines

/* GRAB FIELDS
=================================================*/
$ID = get_the_ID();$title = get_the_title($ID);$featured_img = get_the_post_thumbnail();
$data = get_field('sl_elem', $ID);

/* GRAB YEARS
=================================================*/
for ($i=0 ; $i < sizeof($data) ; $i++){
	$years[$i] = $data[$i]['year'];
}
$years = array_unique($years);$year_len = sizeof($years) -1;


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

			// THE YEARS //
			for ($i = $year_len ; $i > -1 ; $i--){
				print '<div class="sl-year">'.$years[$i].'</div>';
				print '<div class="sl-year-contain">';

					// THE ELEMENTS //
					for ($j=0 ; $j < sizeof($data); $j++){
						if ($data[$j]['year'] == $years[$i]){
							print '<div class="sl-date"><h4>'.$data[$j]['m_a_d'].'</h4></div>';
							print '<aside class="sl-entry sl-content">';
								print '<div class="meta">';

									// META GRAPHIC //
									switch($data[$j]['type']){
										case 'ed_report':
											$type = 'http://edsource.org/wp-content/uploads/2015/11/storylines-icons-01.png';
											break;
										case 'ed_art':
											$type = 'http://edsource.org/wp-content/uploads/2015/11/storylines-icons-02.png';
											break;
										case 'ed_proj':
											$type = 'http://edsource.org/wp-content/uploads/2015/11/storylines-icons-03.png';
											break;
										case 'milestone':
											$type = 'http://edsource.org/wp-content/uploads/2015/11/storylines-icons-04.png';
											break;
										case 'update':
											$type = 'http://edsource.org/wp-content/uploads/2015/11/storylines-icons-05.png';
											break;
									}
									print '<div><img src="'.$type.'"></div>';

								print '</div>';
								print '<div class="content">';
									print '<h3>'.$data[$j]['title'].'</h3>';
									
									//CHECK LEAD IMG
									if ($data[$j]['lead_art_chk'] == True){
										print '<div class="sl-lead-img"><img src="'.$data[$j]['lead_art'].'"></div>';
									}
																		
									print $data[$j]['content'];

								print '</div>';
							print '</aside>';	
						}
					}

				print '<div>';
			}

		print '</div>';
	print  '</section>';
print  '</div>';

?>