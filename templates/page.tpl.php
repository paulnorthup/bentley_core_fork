<?php
/**
 * @file
 * Zen theme's implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $secondary_menu_heading: The title of the menu used by the secondary links.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['header']: Items for the header region.
 * - $page['navigation']: Items for the navigation region, below the main menu (if any).
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['footer']: Items for the footer region.
 * - $page['bottom']: Items to appear at the bottom of the page below the footer.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see zen_preprocess_page()
 * @see template_process()
 */
?>

<div id="page">
  
  <?php print theme('self_identify'); ?>

  <div class="header wrapper">

    <header id="header" role="banner">

      <div id="tab">

        <?php if ($page['logo']): ?>
          <div class="lockup-container">
            <?php print render($page['logo']); ?>
          </div>
        <?php endif; ?>

        <?php if ($page['links']): ?>
          <div class="links-container">
            <?php print render($page['links']); ?>
          </div>
        <?php endif; ?>

        <?php if ($page['search']): ?>
          <div class="search-container">
            <?php print render($page['search']); ?>
          </div>
        <?php endif; ?>

        <div class="mobile-menu">
          <a href="#" class="mobile-menu-toggle"></a>
        </div>

      </div><!-- /.tab -->

      <div id="subheader">

        <?php if ($page['subhead']): ?>
           <div class="subhead-container">
            <?php print render($page['subhead']); ?>
           </div>
        <?php endif; ?>

        <?php if ($page['sub_links']): ?>
            <div class="sub-links-container">
              <?php print render($page['sub_links']); ?>
            </div>
          <?php endif; ?>

        </div><!-- /#subheader -->

    </header>

  </div><!-- /.wrapper .header-->

  <div class="wrapper navigation">
    <div id="navigation">

      <?php print render($page['navigation']); ?>

    </div><!-- /#navigation -->
  </div><!-- /.wrapper .navigation-->

  <?php if ($page['banner']): ?>
    <div class="wrapper banner">
      <div id="banner-container">
        <div id="banner">

          <?php print render($page['banner']); ?>

        </div><!-- /#banner -->
      </div><!-- /#banner-container -->
    </div><!-- /.wrapper .banner -->
  <?php else: ?>
    <div class="wrapper banner default">
      <div id="banner-container" class="default">
        <div id="banner">
        </div><!-- /#banner -->
      </div><!-- /#banner-container -->
    </div><!-- /.wrapper .banner -->
  <?php endif; ?>

  <div class="wrapper main">
    <div id="main">

      <?php if ($page['featured']): ?>
      <div id="featured">
        <?php print render($page['featured']); ?>
      </div>
      <?php endif; ?>

      <div id="content" class="column" role="main">
        <?php print render($page['highlighted']); ?>
        <?php print $messages; ?>
        <?php print render($page['help']); ?>
        <?php print render($tabs); ?>
        <?php if ($action_links): ?>
          <ul class="action-links"><?php print render($action_links); ?></ul>
        <?php endif; ?>
        <?php print $breadcrumb; ?>
        <a id="main-content"></a>
        <?php print render($title_prefix); ?>
        <?php if ($title): ?>
          <h1 class="title" id="page-title"><?php print $title; ?></h1>
        <?php endif; ?>
        <?php print render($title_suffix); ?>
        <?php print render($page['content']); ?>
        <?php print $feed_icons; ?>
      </div><!-- /#content -->

      <?php
        // Render the sidebars to see if there's anything in them.
        $sidebar_first  = render($page['sidebar_first']);
        $sidebar_second = render($page['sidebar_second']);
      ?>

      <?php if ($sidebar_first || $sidebar_second): ?>
        <aside class="sidebars">
          <?php print $sidebar_first; ?>
          <?php print $sidebar_second; ?>
        </aside><!-- /.sidebars -->
      <?php endif; ?>

    </div><!-- /#main -->
  </div><!-- /.wrapper .main-->

  <?php
  // Render page_break to see if there's anything in there.
    $page_break  = render($page['page_break']);
    if ($page_break):
  ?>
    <div class="wrapper page-break">
      <div id="page-break">

        <div id="page-break-content">
          <?php print $page_break; ?>
        </div><!-- /#page-break-content -->

      </div><!-- /#page-break -->
    </div><!-- /.wrapper .page-break -->
  <?php endif; ?>

  <?php
  // Render sub_content to see if there's anything in there.
    $sub_content  = render($page['sub_content']);
    $sub_sidebar_first  = render($page['sub_sidebar_first']);
    $sub_sidebar_second = render($page['sub_sidebar_second']);
    if ($sub_content):
  ?>
    <div class="wrapper secondary <?php print $sub_classes; ?>">
      <div id="secondary">

        <div id="secondary-content" class="column" role="secondary">
          <?php print $sub_content; ?>
          <?php print $feed_icons; ?>
        </div><!-- /#content -->

        <?php if ($sub_sidebar_first || $sub_sidebar_second): ?>
          <aside class="sidebars">
            <?php print $sub_sidebar_first; ?>
            <?php print $sub_sidebar_second; ?>
          </aside><!-- /.sidebars -->
        <?php endif; ?>

      </div><!-- /#secondary -->
    </div><!-- /.wrapper .secondary-->
  <?php endif; ?>

  <?php
  // Render slab to see if there's anything in there.
    $slab  = render($page['slab']);
    if ($slab):
  ?>
    <div class="wrapper slab">
      <div id="slab">

        <div id="slab-content">
          <?php print $slab; ?>
        </div><!-- /#slab-content -->

      </div><!-- /#slab -->
    </div><!-- /.wrapper .slab -->
  <?php endif; ?>

  <?php
  // Render foundation to see if there's anything in there.
    $foundation  = render($page['foundation']);
    if ($foundation):
  ?>
    <div class="wrapper foundation">
      <div id="foundation">

        <div id="foundation-content">
          <?php print $foundation; ?>
        </div><!-- /#foundation-content -->

      </div><!-- /#foundation -->
    </div><!-- /.wrapper .foundation -->
  <?php endif; ?>

  <div class="wrapper footer">
    
    <?php print render($page['footer']); ?>
  
  </div><!-- /.wrapper .footer-->

  </div><!-- /#page -->

<?php 
  $uri = $_SERVER["REQUEST_URI"];
  // explode the path so we can use it in breadcrumb
  $url = explode("/", $uri);




if ($url[1] == 'undergraduate') {

	// UGA 
	print '<!-- Google Code for Undergrad  -->
	<script type="text/javascript">
	/* <![CDATA[ */
	var google_conversion_id = 1056830402;
	var google_conversion_language = "en";
	var google_conversion_format = "3";
	var google_conversion_color = "ffffff";
	var google_conversion_label = "NxasCKbCpwMQwuf39wM";
	var google_conversion_value = 0;
	/* ]]> */
	</script>
	<script type="text/javascript" src="https://www.googleadservices.com/pagead/conversion.js">
	</script>
	<noscript>
	<div style="display:inline;">
	<img height="1" width="1" style="border-style:none;" alt="" src="https://www.googleadservices.com/pagead/conversion/1056830402/?value=0&amp;label=NxasCKbCpwMQwuf39wM&amp;guid=ON&amp;script=0"/>
	</div>
	</noscript>';
}

elseif  ($url[3] == 'mba-programs'){
	// Graduate MBA
	print '<!-- Google Code for Graduate MBA -->
	<script type="text/javascript">
	/* <![CDATA[ */
	var google_conversion_id = 1056830402;
	var google_conversion_language = "en";
	var google_conversion_format = "3";
	var google_conversion_color = "ffffff";
	var google_conversion_label = "pTAuCJ7DpwMQwuf39wM";
	var google_conversion_value = 0;
	/* ]]> */
	</script>
	<script type="text/javascript" src="https://www.googleadservices.com/pagead/conversion.js">
	</script>
	<noscript>
	<div style="display:inline;">
	<img height="1" width="1" style="border-style:none;" alt="" src="https://www.googleadservices.com/pagead/conversion/1056830402/?value=0&amp;label=pTAuCJ7DpwMQwuf39wM&amp;guid=ON&amp;script=0"/>
	</div>
	</noscript>';
}

elseif  ($url[3] == 'ms-programs'){
	// Graduate MS
	print '<!-- Google Code for Graduate - MS -->
	<script type="text/javascript">
	/* <![CDATA[ */
	var google_conversion_id = 1056830402;
	var google_conversion_label = "L8OtCIbVtgMQwuf39wM";
	var google_custom_params = window.google_tag_params;
	var google_remarketing_only = true;
	/* ]]> */
	</script>
	<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
	</script>
	<noscript>
	<div style="display:inline;">
	<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/1056830402/?value=0&amp;label=L8OtCIbVtgMQwuf39wM&amp;guid=ON&amp;script=0"/>
	</div>
	</noscript>';
}



else {

// General 	
print 	'<!-- Google Code for General -->
	<script type="text/javascript">
	/* <![CDATA[ */
	var google_conversion_id = 1056830402;
	var google_conversion_language = "en";
	var google_conversion_format = "3";
	var google_conversion_color = "ffffff";
	var google_conversion_label = "4md2CK7BpwMQwuf39wM";
	var google_conversion_value = 0;
	/* ]]> */
	</script>
	<script type="text/javascript" src="https://www.googleadservices.com/pagead/conversion.js">
	</script>
	<noscript>
	<div style="display:inline;">
	<img height="1" width="1" style="border-style:none;" alt="" src="https://www.googleadservices.com/pagead/conversion/1056830402/?value=0&amp;label=4md2CK7BpwMQwuf39wM&amp;guid=ON&amp;script=0"/>
	</div>
	</noscript>
	<!-- Google Code for General Remarketing List -->
	<script type="text/javascript">
	/* <![CDATA[ */
	var google_conversion_id = 1056830402;
	var google_conversion_language = "en";
	var google_conversion_format = "3";
	var google_conversion_color = "ffffff";
	var google_conversion_label = "4md2CK7BpwMQwuf39wM";
	var google_conversion_value = 0;
	/* ]]> */
	</script>
	<script type="text/javascript" src="https://www.googleadservices.com/pagead/conversion.js">
	</script>
	<noscript>
	<div style="display:inline;">
	<img height="1" width="1" style="border-style:none;" alt="" src="https://www.googleadservices.com/pagead/conversion/1056830402/?value=0&amp;label=4md2CK7BpwMQwuf39wM&amp;guid=ON&amp;script=0"/>
	</div>
	</noscript>';
}



?>
