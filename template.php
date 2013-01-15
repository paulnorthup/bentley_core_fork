<?php
/**
 * @file
 * Contains the theme's functions to manipulate Drupal's default markup.
 *
 * A QUICK OVERVIEW OF DRUPAL THEMING
 *
 *   The default HTML for all of Drupal's markup is specified by its modules.
 *   For example, the comment.module provides the default HTML markup and CSS
 *   styling that is wrapped around each comment. Fortunately, each piece of
 *   markup can optionally be overridden by the theme.
 *
 *   Drupal deals with each chunk of content using a "theme hook". The raw
 *   content is placed in PHP variables and passed through the theme hook, which
 *   can either be a template file (which you should already be familiary with)
 *   or a theme function. For example, the "comment" theme hook is implemented
 *   with a comment.tpl.php template file, but the "breadcrumb" theme hooks is
 *   implemented with a theme_breadcrumb() theme function. Regardless if the
 *   theme hook uses a template file or theme function, the template or function
 *   does the same kind of work; it takes the PHP variables passed to it and
 *   wraps the raw content with the desired HTML markup.
 *
 *   Most theme hooks are implemented with template files. Theme hooks that use
 *   theme functions do so for performance reasons - theme_field() is faster
 *   than a field.tpl.php - or for legacy reasons - theme_breadcrumb() has "been
 *   that way forever."
 *
 *   The variables used by theme functions or template files come from a handful
 *   of sources:
 *   - the contents of other theme hooks that have already been rendered into
 *     HTML. For example, the HTML from theme_breadcrumb() is put into the
 *     $breadcrumb variable of the page.tpl.php template file.
 *   - raw data provided directly by a module (often pulled from a database)
 *   - a "render element" provided directly by a module. A render element is a
 *     nested PHP array which contains both content and meta data with hints on
 *     how the content should be rendered. If a variable in a template file is a
 *     render element, it needs to be rendered with the render() function and
 *     then printed using:
 *       <?php print render($variable); ?>
 *
 * ABOUT THE TEMPLATE.PHP FILE
 *
 *   The template.php file is one of the most useful files when creating or
 *   modifying Drupal themes. With this file you can do three things:
 *   - Modify any theme hooks variables or add your own variables, using
 *     preprocess or process functions.
 *   - Override any theme function. That is, replace a module's default theme
 *     function with one you write.
 *   - Call hook_*_alter() functions which allow you to alter various parts of
 *     Drupal's internals, including the render elements in forms. The most
 *     useful of which include hook_form_alter(), hook_form_FORM_ID_alter(),
 *     and hook_page_alter(). See api.drupal.org for more information about
 *     _alter functions.
 *
 * OVERRIDING THEME FUNCTIONS
 *
 *   If a theme hook uses a theme function, Drupal will use the default theme
 *   function unless your theme overrides it. To override a theme function, you
 *   have to first find the theme function that generates the output. (The
 *   api.drupal.org website is a good place to find which file contains which
 *   function.) Then you can copy the original function in its entirety and
 *   paste it in this template.php file, changing the prefix from theme_ to
 *   STARTERKIT_. For example:
 *
 *     original, found in modules/field/field.module: theme_field()
 *     theme override, found in template.php: STARTERKIT_field()
 *
 *   where STARTERKIT is the name of your sub-theme. For example, the
 *   zen_classic theme would define a zen_classic_field() function.
 *
 *   Note that base themes can also override theme functions. And those
 *   overrides will be used by sub-themes unless the sub-theme chooses to
 *   override again.
 *
 *   Zen core only overrides one theme function. If you wish to override it, you
 *   should first look at how Zen core implements this function:
 *     theme_breadcrumbs()      in zen/template.php
 *
 *   For more information, please visit the Theme Developer's Guide on
 *   Drupal.org: http://drupal.org/node/173880
 *
 * CREATE OR MODIFY VARIABLES FOR YOUR THEME
 *
 *   Each tpl.php template file has several variables which hold various pieces
 *   of content. You can modify those variables (or add new ones) before they
 *   are used in the template files by using preprocess functions.
 *
 *   This makes THEME_preprocess_HOOK() functions the most powerful functions
 *   available to themers.
 *
 *   It works by having one preprocess function for each template file or its
 *   derivatives (called theme hook suggestions). For example:
 *     THEME_preprocess_page    alters the variables for page.tpl.php
 *     THEME_preprocess_node    alters the variables for node.tpl.php or
 *                              for node--forum.tpl.php
 *     THEME_preprocess_comment alters the variables for comment.tpl.php
 *     THEME_preprocess_block   alters the variables for block.tpl.php
 *
 *   For more information on preprocess functions and theme hook suggestions,
 *   please visit the Theme Developer's Guide on Drupal.org:
 *   http://drupal.org/node/223440 and http://drupal.org/node/1089656
 */


/**
 * Theme function for Self Identify/Quick Links Nav tpl include (templates/self_identify.tpl.php)
*/
 function bentley_core_theme($existing, $type, $theme, $path) {
  return array(
    'self_identify' => array(
      'template' => 'templates/self_identify',
    ),
  );
}

/**
 * Override or insert variables into the maintenance page template.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("maintenance_page" in this case.)
 */
/* -- Delete this line if you want to use this function
function STARTERKIT_preprocess_maintenance_page(&$variables, $hook) {
  // When a variable is manipulated or added in preprocess_html or
  // preprocess_page, that same work is probably needed for the maintenance page
  // as well, so we can just re-use those functions to do that work here.
  STARTERKIT_preprocess_html($variables, $hook);
  STARTERKIT_preprocess_page($variables, $hook);
}
// */

/**
 * Override or insert variables into the html templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("html" in this case.)
 */

function bentley_core_preprocess_html(&$variables, $hook) {
  if (!empty($variables['page']['sub_sidebar_first']) && !empty($variables['page']['sub_sidebar_second'])) {
    $variables['classes_array'][] = 'two-sub-sidebars';
  }
  elseif (!empty($variables['page']['sub_sidebar_first'])) {
    $variables['classes_array'][] = 'one-sub-sidebar sub-sidebar-first';
  }
  elseif (!empty($variables['page']['sub_sidebar_second'])) {
    $variables['classes_array'][] = 'one-sub-sidebar sub-sidebar-second';
  }
  else {
    $variables['classes_array'][] = 'no-sub-sidebars';
  }

  // The body tag's classes are controlled by the $classes_array variable. To
  // remove a class from $classes_array, use array_diff().
  //$variables['classes_array'] = array_diff($variables['classes_array'], array('class-to-remove'));
}
// */

function bentley_core_preprocess_page(&$variables, $hook) {
//  dsm($variables['page']['sidebar_second']['views_uga_deadlines-block_2']);

if (isset($variables['page']['content']['system_main']['nodes']['232581'])) {
	$variables['page']['sub_content'] = '';
	$variables['page']['sub_sidebar_second'] = '';
	
}

$doubledate1 = $variables['page']['sidebar_second']['views_uga_deadlines-block_1']['#markup'];
$variables['page']['sidebar_second']['views_uga_deadlines-block_1']['#markup'] = str_replace('<div class="m"></div><div class="d"></div>', '', $doubledate1);

$doubledate2 = $variables['page']['sidebar_second']['views_uga_deadlines-block_2']['#markup'];
$variables['page']['sidebar_second']['views_uga_deadlines-block_2']['#markup'] = str_replace('<div class="m"></div><div class="d"></div>', '', $doubledate2);

$doubledate3 = $variables['page']['sidebar_second']['views_uga_deadlines-block_3']['#markup'];
$variables['page']['sidebar_second']['views_uga_deadlines-block_3']['#markup'] = str_replace('<div class="m"></div><div class="d"></div>', '', $doubledate3);

}

//  UGA change button text on meet me region page form   
function bentley_core_form_alter (&$variables) { 

    if ( $variables['submit']['#id'] == 'edit-submit-uga-meet-me-region') {
    $variables['submit']['#value'] = 'Find an Event';
    }
}

/**
 * Override or insert variables into the node templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("node" in this case.)
 */
/* -- Delete this line if you want to use this function
function STARTERKIT_preprocess_node(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');

  // Optionally, run node-type-specific preprocess functions, like
  // STARTERKIT_preprocess_node_page() or STARTERKIT_preprocess_node_story().
  $function = __FUNCTION__ . '_' . $variables['node']->type;
  if (function_exists($function)) {
    $function($variables, $hook);
  }
}
// */

/**
 * Override or insert variables into the comment templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("comment" in this case.)
 */
/* -- Delete this line if you want to use this function
function STARTERKIT_preprocess_comment(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');
}
// */

/**
 * Override or insert variables into the region templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("region" in this case.)
 */
/* -- Delete this line if you want to use this function
function STARTERKIT_preprocess_region(&$variables, $hook) {
  // Don't use Zen's region--sidebar.tpl.php template for sidebars.
  //if (strpos($variables['region'], 'sidebar_') === 0) {
  //  $variables['theme_hook_suggestions'] = array_diff($variables['theme_hook_suggestions'], array('region__sidebar'));
  //}
}
// */

/**
 * Override or insert variables into the block templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("block" in this case.)
 */
/* -- Delete this line if you want to use this function
function STARTERKIT_preprocess_block(&$variables, $hook) {
  // Add a count to all the blocks in the region.
  // $variables['classes_array'][] = 'count-' . $variables['block_id'];

  // By default, Zen will use the block--no-wrapper.tpl.php for the main
  // content. This optional bit of code undoes that:
  //if ($variables['block_html_id'] == 'block-system-main') {
  //  $variables['theme_hook_suggestions'] = array_diff($variables['theme_hook_suggestions'], array('block__no_wrapper'));
  //}
}
// */

/**
* Override theme_breadcrumb().
*/
function bentley_core_breadcrumb($breadcrumb) {

   // get the title
   $title = check_plain(menu_get_active_title());

  // get the path
   $uri = $_SERVER["REQUEST_URI"];
   // explode the path so we can use it in breadcrumb
   $url = explode("/", $uri);
   
// Output depending on how many breadcrumbs
// there are several unique breadcrumbs for UGA,  GRAD
	// first part
   $urlfirst = $url[1];
   // second part
   $urlsecond = $url[2];
   $urlsecondtitle = ucwords(str_replace("-", " ", $url[2]));
  
 	// third part
   $urlthird = $url[3];
		// Special case for Graduate MS & MBA  
	    if ($urlthird == "ms-programs") {
		  $urlthirdtitle = '<a href="/graduate/academics/ms-programs">MS Programs</a>'; }
		elseif ($urlthird == "mba-programs") {
		  $urlthirdtitle = '<a href="/graduate/academics/mba-programs">MBA Programs</a>';  }			
	    else {
		  $urlthirdtitle = ucwords(str_replace("-", " ", $url[3]));  }

   // fourth part
   $urlfourth = $url[4];
		if ($urlfourth == 'elmba') {
			$urlfourthtitle = 'Emerging Leaders MBA';
		   }
		elseif ($urlfourth == 'bmba') {
			$urlfourthtitle = 'Bentley MBA';
		   }
		elseif ($urlfourth == 'hfid') {
			$urlfourthtitle = 'Human Factors';
			}
		elseif ($urlfourth == 'pmba') {
			$urlfourthtitle = 'Professional MBA';
			}
		else {
			$urlfourthtitle = ucwords(str_replace("-", " ", $url[4]));
			}
   
   // fifth part
   $urlfifth = $url[5];
   
   // zen breadcrumb seperator
   $separator = theme_get_setting('zen_breadcrumb_separator');

// show the first part as breadcrumb and then the title

// for weird GRAD academics pages that menu block overrides title


	if($title == 'Overview' AND $urlfirst == 'graduate' ) {
	$urlfirst = '<li><a href="/'.  $urlfirst . '">' .  ucwords($urlfirst) . '</a></li>' 
       . $separator . '<li><a href="/' . $urlfirst . '/'.   $urlsecond . '">' .  $urlsecondtitle . '</a></li>';
	$title =  ' ' . $separator . ' <li>' . $urlthirdtitle . $separator . $urlfourthtitle . '</li>';
	}

// for weird UGA academics pages that menu block overrides title

	elseif($title == 'Overview') {
		$urlfirst = '<li><a href="/'.  $urlfirst . '">' .  ucwords($urlfirst) . '</a></li>' 
           . $separator . '<li><a href="/' . $urlfirst . '/'.   $urlsecond . '">' .  $urlsecondtitle . '</a></li>';
   		$title =  ' ' . $separator . ' <li>' . $urlthirdtitle . '</li>';
    }

// six breadcrumbs

	elseif (isset($urlfifth)) {

	   $urlfirst = '<li><a href="/'.  $urlfirst . '">' .  ucwords($urlfirst) . '</a></li>' 
	           . $separator . '<li><a href="/' . $urlfirst . '/'.   $urlsecond . '">' .  $urlsecondtitle . '</a></li>'
	           . $separator . '<li><a href="/'. $urlfirst . "/" .  $urlsecond . '/' . $urlthird . '">' .  $urlthirdtitle 
	          . $separator . '<li><a href="/'. $urlfirst . "/" .  $urlsecond . '/' . $urlthird . '/' . $urlfourth . '">' .  $urlfourthtitle .
	           '</a></li>';
	   $title =  ' ' . $separator . ' <li>' . $title . '</li>';
	   }
	
// five breadcrumbs

	elseif (isset($urlfourth)) {
 		$urlfirst = '<li><a href="/'.  $urlfirst . '">' .  ucwords($urlfirst) . '</a></li>' 
           . $separator . '<li><a href="/' . $urlfirst . '/'.   $urlsecond . '">' .  $urlsecondtitle . '</a></li>'
           . $separator . '<li><a href="/'. $urlfirst . "/" .  $urlsecond . '/' . $urlthird . '">' .  $urlthirdtitle . 
           '</a></li>';
   		$title =  ' ' . $separator . ' <li>' . $title . '</li>';
    }
// 4 breadcumbs
	
   elseif (isset($urlthird)) {
		$urlfirst = '<li><a href="/'.  $urlfirst . '">' .  ucwords($urlfirst) . '</a></li>' 
           . $separator . '<li><a href="/' . $urlfirst . '/'.  $urlsecond . '">' .  $urlsecondtitle . '</a></li>';
   		$title =  ' ' . $separator . ' <li>' . $title . '</li>';
    }
// 3 breadcrumbs
   
	elseif (isset($urlsecond)) {
		$urlfirst = '<li><a href="/'.  $urlfirst . '">' .  ucwords($urlfirst) . '</a></li>';
   		$title =  ' ' . $separator . ' <li>' . $title . '</li>';
    }

 // only show the title if there is a another level
 	else
   		$title = '';
   		$urlfirst = '<li>' . ucwords($urlfirst) . '</li>' ;


// exceptions keep this here in case someone needs a custom breadcrumb
// you can add a case into the array

 $uri = substr($uri,1);

$arr = array("undergraduate/admitted-students", "graduate/2");

	if (!isset($urlsecond) OR in_array($uri, $arr))  {
			return "";
	}

// Breadcrumbs for Every Page
	else
	  return '<nav class="breadcrumb" role="navigation"><h2 class="element-invisible"> You are here</h2><ol>'.
       '<li><a href="/">Home</a></li>' . $separator . $urlfirst .  $title . '</nav>';
	}


