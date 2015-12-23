<?php 	//	Template Name: Storylines

	
/* GRAB FIELDS
=================================================*/
$ID = get_the_ID();$title = get_the_title($ID);$featured_img = get_the_post_thumbnail();$perma = get_the_permalink($ID);$auth = get_the_author($ID);
$data = get_field('sl_elem', $ID);$img_cap = get_field('img_cap', $id);

/* GRAB YEARS
=================================================*/
for ($i=0 ; $i < sizeof($data) ; $i++){$y[$i] = $data[$i]['year'];}
$y = array_unique($y);$j = 0;
for ($i=0 ; $i < sizeof($data) ; $i++){if(!empty($y[$i])){$years[$j] = $y[$i];$j += 1;}}
$year_len = sizeof($years) -1;


/* META TAGS
=================================================*/
print slick_head($title);

print '<link rel="stylesheet" type="text/css" href="http://edsource.org/wp-content/themes/nakatomi/styles/storylines.css">';
print '<script type=\'text/javascript\' src=\'http://edsource.org/wp-content/themes/nakatomi/scripts/storylines.js\'></script>';

/* HEADER TAGS
=================================================*/
print slick_header('Storylines', $ID);
	
/* CONTENT TAGS
=================================================*/
	print '<section id="slick-body">';

		// check for featured img and add //
		if ($featured_img){print '<div class="sl-full-img">'.$featured_img.'</div>';print '<div class="sl-full-cap"><p>'.$img_cap.'</p></div>';}

		// INTRO AREA //
		print '<div id="slick-intro">';
			print '<h2>'.$title.'</h2>';
			//print '<div class="slick-author"><p></p></div>';
			if(have_posts()) { while(have_posts()) { the_post();print slick_byline($post->ID, get_the_modified_date('F j, Y'));the_content();}}
		print '</div>';

		print '<div id="sl-contain">';
			
			// LANDING PAGE OR STORYLINE? //
			if ($ID == 89893){

				// GRAB CHILDREN
				$query = new WP_Query();
				$args = $query->query(array('post_type' => 'page', 'post_status'=>'published', 'order'=>'DESC'));
				$children = get_page_children(89893, $args);

				//var_dump($children);

				// POPULATE CHILDREN //
				for ($i=0 ; $i < sizeof($children) ; $i++){

					// GET MODIFIED DATE //
					$format = '%B %e, %Y';
					$date = $children[$i]->post_modified;$date = explode(" ", $date);$date = strtotime($date[0]);$date = strftime($format, $date);

					$img = get_the_post_thumbnail($children[$i]->ID);


					print '<aside class="sl-storyline">';
						print '<div>'.$img.'</div>';
						print '<div>';
							print '<a href="'.$children[$i]->guid.'"><h2>'.$children[$i]->post_title.'</h2></a>';
							print '<p>Updated '.$date.'</p>';
							print '<p>'.$children[$i]->post_excerpt.'</p>';
						print '</div>';
					print '</aside>';
				}
			}
			else {
				// STORYLINES AREA //

					// THE YEARS //
					//for ($i = $year_len ; $i > -1 ; $i--){
					for ($i=0 ; $i < $year_len + 1 ; $i++){
						print '<div class="sl-year">'.$years[$i].'</div>';
						print '<div class="sl-year-contain">';

							// THE ELEMENTS //	
							//for ($j= (sizeof($data) -1) ; $j > -1 ; $j--){
							for ($j=0 ; $j < sizeof($data); $j++){
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
										case 'commentary':
											$type = '';
											$text = 'Commentary';
											break;
									}

									// HANDLE THE DATE //
									if ($data[$j]['type'] === 'milestone'){
										print '<div class="sl-milestone">';
											print '<h3>'.$data[$j]['m_a_d'].', '.$data[$j]['year'].'</h3>';
											print '<h2>'.$data[$j]['title'].'</h2>';
										print '</div>';
									}
									else {print '<div class="sl-date"><h4>'.$text.'</h4><h4>'.$data[$j]['m_a_d'].', '.$data[$j]['year'].'</h4></div>';}
								
									// BUILD THE ELEMENT //
									print '<aside class="sl-entry sl-content" type="'.$data[$j]['type'].'">';
										print '<div class="meta">';
											if ($data[$j]['type'] != 'milestone'){
												print '<div>';
													if ($data[$j]['url']){print '<a href="'.$data[$j]['url'].'">';}
													print '<img src="'.$type.'">';
													if ($data[$j]['url']){print '</a>';}
												print '</div>';
											}
										print '</div>';
										print '<div class="content">';
											if ($data[$j]['type'] != 'milestone'){print '<a href="'.$data[$j]['url'].'"><h3>'.$data[$j]['title'].'</a></h3>';}

											// CHECK TOP EMBED //
											if ($data[$j]['bce']){print $data[$j]['bce'];}

											// CHECK LEAD IMG //
											if ($data[$j]['lead_art_chk'] == True){print '<div class="sl-lead-img"><a target="_blank" href="'.$data[$j]['url'].'"><img src="'.$data[$j]['lead_art'].'"></a></div>';}
											
											// CHECK CONTENT //	
											print $data[$j]['content'];

											// CHECK BOTTOM EMBED //
											if ($data[$j]['ace']){print $data[$j]['ace'];}

											// CHECK LINK //
											if ($data[$j]['url']){print '<div class="sl-link"><h4><a target="_blank" href="'.$data[$j]['url'].'">Read More</a></h4></div>';}

										print '</div>';
									print '</aside>';							
								}
							}	
						print '<div>';
					}

				print '</div>';
			}

		print '</div>';


		
	print  '</section>';
	print slick_footer();
print  '</div>';

?>