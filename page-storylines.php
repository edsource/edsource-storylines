<?php 	//	Template Name: Storylines

	
/* GRAB FIELDS
=================================================*/
$ID = get_the_ID();$title = get_the_title($ID);$featured_img = get_the_post_thumbnail();$perma = get_the_permalink($ID);
$data = get_field('sl_elem', $ID);$img_cap = get_field('img_cap', $id);

/* GRAB YEARS
=================================================*/
for ($i=0 ; $i < sizeof($data) ; $i++){$y[$i] = $data[$i]['year'];}
$y = array_unique($y);$j = 0;
for ($i=0 ; $i < sizeof($data) ; $i++){if(!empty($y[$i])){$years[$j] = $y[$i];$j += 1;}}
$year_len = sizeof($years) -1;


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
		
        // PROGRESS BAR //
		print '<div class="sl-progress">';
			print '<div><div></div></div>';
		print '</div>';
		print '<div>';
			print '<a onclick="ga(\'send\',\'event\', \'STORYLINES\', \'TWITTER\', \''.$title.'\');" href="https://twitter.com/share?url=http%3A%2F%2Fedsource.org%2F%3Fpage_id='.$ID.'&via=edsource&text=See how the '.$title.' story evolved over time. %23StoryLines"><i class="fa fa-twitter"></i></a>';
			print '<a onclick="ga(\'send\',\'event\', \'STORYLINES\', \'FB\', \''.$title.'\');" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fedsource.org%2F%3Fpage_id='.$ID.'"><i class="fa fa-facebook"></i></a>';
			print '<a onclick="ga(\'send\',\'event\', \'STORYLINES\', \'LINKED\', \''.$title.'\');" href="https://www.linkedin.com/shareArticle?mini=true&url=http%3A%2F%2Fedsource.org%2F%3Fpage_id='.$ID.'&title=Storylines: '.$title.'&summary=Follow the evolution of this story&source=EdSource"><i class="fa fa-linkedin"></i></a>';

		print '</div>';
	print '</section>';

/* CONTENT TAGS
=================================================*/
	print '<section id="sl-body">';

		// check for featured img and add //
		if ($featured_img){print '<div class="sl-full-img">'.$featured_img.'</div>';print '<div class="sl-full-cap"><p>'.$img_cap.'</p></div>';}

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
					for ($j= (sizeof($data) -1) ; $j > -1 ; $j--){
						if ($data[$j]['year'] == $years[$i]){

							// TYPE OF ELEMENT //
							switch($data[$j]['type']){
								case 'ed_report':
									$type = 'http://edsource.org/wp-content/uploads/2015/11/storylines-icons-01.png';
									$text = 'Publication';
									break;
								case 'ed_art':
									$type = 'http://edsource.org/wp-content/uploads/2015/11/storylines-icons-02.png';
									$text = 'Article';
									break;
								case 'ed_proj':
									$type = 'http://edsource.org/wp-content/uploads/2015/11/storylines-icons-03.png';
									$text = 'Multimedia';
									break;
								case 'milestone':
									$type = 'http://edsource.org/wp-content/uploads/2015/11/storylines-icons-04.png';
									$text = 'Milestone';
									break;
								case 'update':
									$type = 'http://edsource.org/wp-content/uploads/2015/11/storylines-icons-05.png';
									$text = 'Update';
									break;
							}

							// HANDLE THE DATE //
							if ($data[$j]['type'] === 'milestone'){
								print '<div class="sl-milestone">';
									print '<h3>'.$data[$j]['m_a_d'].', '.$data[$j]['year'].'</h3>';
									print '<h2>'.$data[$j]['title'].'</h2>';
								print '</div>';
							}
							else {print '<div class="sl-date"><h4>'.$text.'</h4><h4>'.$data[$j]['m_a_d'].'</h4></div>';}
						
							// BUILD THE ELEMENT //
							print '<aside class="sl-entry sl-content" type="'.$data[$j]['type'].'">';
								print '<div class="meta">';if ($data[$j]['type'] != 'milestone'){print '<div><img src="'.$type.'"></div>';}print '</div>';
								print '<div class="content">';
									if ($data[$j]['type'] != 'milestone'){print '<h3>'.$data[$j]['title'].'</h3>';}

									// CHECK TOP EMBED //
									if ($data[$j]['bce']){print $data[$j]['bce'];}

									// CHECK LEAD IMG //
									if ($data[$j]['lead_art_chk'] == True){print '<div class="sl-lead-img"><img src="'.$data[$j]['lead_art'].'"></div>';}
									
									// CHECK CONTENT //	
									print $data[$j]['content'];

									// CHECK BOTTOM EMBED //
									if ($data[$j]['ace']){print $data[$j]['ace'];}

									// CHECK LINK //
									if ($data[$j]['url']){print '<div class="sl-link"><h4><a href="'.$data[$j]['url'].'">Read More</a></h4></div>';}

								print '</div>';
							print '</aside>';							
						}
					}	
				print '<div>';
			}

		print '</div>';
	print  '</section>';
	print '<section id="sl-footer">';
		print '<p>©2015 EdSource. All Rights Reserved</p>'
		?>
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

			ga('create', 'UA-3051201-4', 'edsource.org');
			ga('send', 'pageview');
			
		</script><?php 
	print '</section>';
print  '</div>';

?>