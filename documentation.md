#Theme Documentation
- *Theme Name:* Bentley_Core
- *Author:* Paul Northup
- *Created:* 2012
- *Version:* 1.0
***

##Table of Contents
####1. [Available Regions]
####2. [Template Files]
####3. [SASS/CSS]
####4. [JavaScript]
####5. [Core Features]
####6. [Subthemes]
***

## <a id="available-regions"></a> Available Regions

###Sections house regions!
The page is broken up into sections. The sections have a full width wrapper and house one or more regions in a self-centering div. The sections are:

* [Header]
* [Navigation]
* [Banner]
* [Main]
* [Page Break]
* [Secondary]
* [Slab]
* [Foundation]
* [Footer]

Below are the regions available for block placement listed in order of section.


## <a id="section-header"></a> Header Section:
The 'Header' regions are found withing `<div id="header>` in [pages.tpl.php].

### Header Logo *`$page['logo'])`*
The Header Logo region houses a standard block with the logo image and logotype, as link to the homepage.

Header Logo block code: 

	<h1 class="logo">
    	<a href="/">
    	  	<span class="first-word">Bentley</span> University
    	</a>
	</h1>
  
***

###Header Quick Links `$page['links']` *To Be Deprecated

***

###Header Search *`$page['logo']`*
The Header Search region holds the current search form [^note-search]

***

###Header Site Subhead *`$page['subhead']`*
The Header Site Subhead region holds the site-specific subheading. The subheading is a regular block with the subheading class 

Example: [Undergraduate Admission][]

Header Site Subhead block code:

	<h1 class="subhead">
		<a href="/undergraduate">Undergraduate Admission</a>
	</h1>

***

###Header Secondary Links *`$page['sub_links']`*
The Header Secondary Links region houses the secondary links displayed to the right of the site sub-heading. Use only menu-blocks in this region, with a maximum of three links (four if the site sub-heading is short).

Example: [Impact]

***

## <a id="section-navigation"></a> Navigation Section:
The 'Navigation' regions are found withing `<div id="navigation>` in [pages.tpl.php].

###Navigation Bar *`$page['navigation']`*
The Navigation Bar region is styled to responsively display a menu block horizontally beneath the header.

Example: [Graduate Admission]

*To be displayed as a dropdown, the menu block first-level children must be set to 'expanded'.*

*To be displayed with the correct menu item width, the Organic Groups Site must have an entry in [bentley_core/sass/navigation.scss](#navigation.scss)*

***

## <a id="section-banner"></a> Banner Section:
The 'Banner' regions are found withing `<div id="banner>` in [pages.tpl.php].

###Banner *`$page['banner']`*
The banner region is the hero space beneath the navigation to display background images, content width sliders, full-width sliders, etc

* see sass for defaults
* link to features available
* how to add bg images (js, block)


## <a id="section-main"></a> Main Section:
The 'Main' regions are found within `<div id="main>` in [pages.tpl.php].

###Featured CTA *`$page['featured']`*
The featured cta region houses the main call to action for the site in a blue box beneath the banner. It can recieve a block with content in the form:

	<p>
		<a class="cta" href="#">Button Text</a>
    
		<a class="cta2" href="#">Button Text</a>
    
		Concise paragraph text to augment your call to action here.
	</p>

`<a class="cta"> href="#">Button Text</a>`

will display as a large call to action button. 

* REFERENCE SASS FILE TO SHOW STYLES

`<a class="cta2" href="#">Button Text</a>`

will display as a smaller, secondary call to action beneath the large button.

* REFERENCE SASS FILE TO SHOW STYLES

The paragraph text following the links will be formatted in large-type Caecillia.

Example: [Graduate Admission]

***

###Highlighted *`$page['highlighted']`*
Drupal default Region

***

###Help *`$page['help']`*
Drupal default region

***

### <a id="featured"></a> Featured *`$page['featured']`*
The featured region sits above the main content, right, and left sidebars, and contains call-to-actions for the page.

See [Undergraduate Admission] as an example.
***

### <a id="main-content"></a> Main Content *`$page['content']`*
The main content region is the primary content well for node/views display.

When viewed on a mobile device, this is the first region displayed in the [Main] section.

####Nodes
######Pre-Styled Classes
* ADD STYLES HERE

####Views
######Pre-Styled Classes
* ADD STYLES HERE

***

###Left Sidebar <a id="left-sidebar"></a> *`$page['sidebar_first']`*
The left sidebar region will display to the left of the main content. It is most often used for left navigation.

Adding a menu block to the left sidebar results in a pre-styled left-nav list.

Additional blocks may be added in the left sidebar as needed.

When viewed on a mobile device, this is the second region displayed in the [Main] section.

***Note:*** *If a menu-block is added to the left sidebar, ensure it is at the top.*3

######Pre-Styled Classes
* ADD STYLES HERE
* navigation

***

###Right Sidebar <a id="right-sidebar"></a> *`$page['sidebar_second']`*
The right sidebar region will display to the right of the main content. It is most often used for helpful links and student profiles.

Adding a menu block to the left sidebar results in a pre-styled left-nav list.

Additional blocks may be added in the left sidebar as needed.

When viewed on a mobile device, this is the third region displayed in the [Main] section.

***Note:*** *If a menu-block is added to the left sidebar, ensure it is at the top.*

######Pre-Styled Classes
* ADD STYLES HERE
* links
* student profiles
***

## <a id="section-page-break"></a> Page Break Section:
The 'Page Break' regions are found withing `<div id="page-break>` in [pages.tpl.php].

###Page Break *`$page['page_break']`*
The page break region is a full-width region beneath the left sidebar, main content, and right sidebar. It divides the page in two. It is used for call-out content between primary and secondary content, most often on the homepage of an Organic Groups site.

Example: Photo gallery on [Undergraduate Admission]

***

## <a id="section-secondary"></a> Secondary Section:
The 'Secondary' regions are found withing `<div id="secondary>` in [pages.tpl.php].

###Secondary Content *`$page['sub_content']`*
The secondary content region has the same properties as the Main Content region in the [Main] section, but sits below the [Page Break]. Nodes and views will display the same in this region as the main content region, but will not populate this area by default.

When viewed on a mobile device, this is the first region displayed in the [Secondary] section.

Example: Below the photo gallery on [Undergraduate Admission]
***

###Secondary Left Sidebar *`$page['sub_sidebar_first']`*
The Secondary Left Sidebar region displays to the left of Secondary Main Content, and will only show if populated by a block.

When viewed on a mobile device, this is the second full-width region displayed in the [Secondary] section

***

###Secondary Right Sidebar *`$page['sub_sidebar_second']`*
The Secondary Right Sidebar region displays to the right of Secondary Main Content and will only show if populated by a block.

When viewed on a mobile device, this is the third full-width region displayed in the [Secondary] section
***



## <a id="section-slab"></a> Slab Section:
The 'Slab' regions are found withing `<div id="slab>` in [pages.tpl.php].

### Slab *`$page['slab']`*
The Slab region is a light-blue area displayed below the Secondary content for self-contained content, used on site homepages.

Example: Rankings information on [Undergraduate Admission].
***


## <a id="section-foundation"></a> Foundation Section:
The 'Foundation' regions are found withing `<div id="foundation>` in [pages.tpl.php]. Four blocks fit across this section.

### Foundation *`$page['foundation']`*
The Foundation region is a blue, full-width region below the [Main] section. This area is reserved for Social Media blocks.

#####Social Media Blocks
Social Media Blocks are standard blocks with the following markup as their content:

	<p>
		<a href="Social Website URL">
			<span class="heading">Your Heading Here</span>
			<br>
			<spanYour Subheading Here</span>
		</a>
	</p>

`<a href="Social Website URL">`

must contain a url like:

`https://www.facebook.com/bentleyuniversity.mccallum`

for the social network you're linking to.

#####*Important*:
The block class must match the social channel you're linking to as well. Edit the block and add one of the following classes to the `css class` field in the block edit form:

* `social-facebook`
* `social-twitter`
* `social-youtube`
* `social-mail`
* `social-linkedin`
* `social-subscribe`

These styles are preset in [blocks.scss]
  
***Note:*** *For proper display, ensure the block title is set to `<none>`*

***

## <a id="section-footer"></a> Footer Section:
The 'Footer' regions are found withing `<div id="footer>` in [pages.tpl.php].

###Footer *`$page['footer']`*
The footer region houses Bentley's default footer/branding. The footer block is a standard block with the following markup as content:

	<h1 class="logo">
    	<span class="first-word">Bentley</span> University
	</h1>

	<p>
		175 Forest Street<br>
		Waltham, Massachusetts 02452<br>
		+1.781.891.2000
	</p>

	<ul class="footer-menu">
		<li class="first leaf">
			<a href="/copyright">Copyright</a>
		</li>
		<li class="leaf">
			<a href="http://www.bentley.edu/offices/policies">Policies</a>
		</li>
		<li class="leaf">
			<a href="/privacy">Privacy</a>
		</li>
		<li class="last leaf">
			<a href="http://www.bentley.edu/sitemap">Site Map</a>
		</li>
	</ul>

***

## <a id="template"></a> Template Files
The template files that drive `bentley_core` are found in `bentley_core/templates/`.
I won't go through all of these files, but here are a few important ones:
### html.tpl.php
This file defines the beginning of every page. It holds the doctype, conditional code for IE, and some mobile specific code.

### <a id="pages.tpl.php"></a> pages.tpl.php
This file is the heart and soul of the responsive layout. It frames the site into it's full-width sections (explained in [Available Regions]) and renders the regions if they are populated.

The code is heavily commented, and should be fairly self-explanitory. Most of the styles for the elements in this file are defined in [pages.scss].

###@SLOZIER
* template.php
* slider templates (files) and reference the feature below and the CSS/SASS above
* 
	


***

## <a id="sasscss"></a> SASS/CSS
The styles for `bentley_core` are driven by a combination of sass files and partials. Partials begin with an underscore `_` and do not compile into a CSS stylesheet. They are included in other sass files to be compiled into the resulting stylesheet.

For example:

blocks.scss (`bentley_core/sass/blocks.scss`) compiles to blocks.css (`bentley_core/css/blocks.css`) after bringing in the base partial (`bentley_core/sass/_base.scss`) using the code:

  `@import "base";`
  
***Note:*** *When calling in a partial using `@import`, you do not need to include the underscore or file extension.*

The combination of one or more partials, along with the SASS written in the scss files, compiles to the stylesheets that drive `bentley_core`. Following is a quick overview of what each sheet is for.

***Note:*** *These stylesheets are heavily commented so for a more detailed review of what is in each sheet, please browse through them!*

###Sass Quick Intro
* compass watch!
* rvm

###SASS Extensions Overview
####Zen Grids
Zen grids is a grid system built around defining a grid container, a number of columns, and specifying grid item column span and placement.

Documentation for Zen Grids can be found [here](http://zengrids.com/help/).

####Compass
Compass is a collection of styles and helpers built around mixins for typography, css, backgrounds, sprites, etc.

Read through the docs [here](http://compass-style.org/).


###Media Queries
Media Queries area a strange beast. Here's what we're working with so far:

There are three sizes that we're using for default queries.

1. blah
2. blah
3. blah

* px ya diiiig


#### <a id="_base.scss"></a> _base.scss  *`bentley_core/sass/_base.scss`*
The base sheet sets global SASS variables and includes all required extensions.

#### <a id="_custom.scss"></a> _custom.scss  *`bentley_core/sass/_custom.scss`*
The _custom partial houses all custom SASS mixins and is imported by [base.scss].

For mixin documentation, see [here](http://sass-lang.com/docs/yardoc/file.SASS_REFERENCE.html#mixins).

#### <a id="_featured.scss"></a> _featured.scss  *`bentley_core/sass/_featured.scss`*
The _featured partial houses styles for the [Featured] region. It is imported by [pages.scss]

#### <a id="_footer.scss"></a> _footer.scss  *`bentley_core/sass/_footer.scss`*
The _footer partial houses styles for the Bentley default footer block. It is imported by [pages.scss]

#### <a id="_formalize.scss"></a> _formalize.scss  *`bentley_core/sass/_formalize.scss`*
***This sheet is very important. Feel free to edit, but do so with care**

The _formalize partial is the formalize framework rewritten as a partial, included in [forms.scss]. It houses styles to ensure cross-browser consistency of form elements.

#### <a id="_header.scss"></a> _header.scss  *`bentley_core/sass/_header.scss`*
The _header partial houses styles for the Bentley default header. It is imported by [pages.scss].

#### <a id="_slider.scss"></a> _slider.scss  *`bentley_core/sass/_slider.scss`*
The _slider partial houses styles for the default sliders (both content-width and full-width). It is imported by [pages.scss].

#### <a id="blocks.scss"></a> blocks.scss  *`bentley_core/sass/blocks.scss`*
The blocks sheet houses styles for blocks. The twitter block styles are here, among many others.

#### <a id="comments.scss"></a> comments.scss  *`bentley_core/sass/comments.scss`*
The comments sheet houses styles for Drupal's comments.

#### <a id="fields.scss"></a> fields.scss  *`bentley_core/sass/fields.scss`*
The Fields sheet houses styles for Drupal's form fields.

#### <a id="forms.scss"></a> forms.scss  *`bentley_core/sass/forms.scss`*
The Forms sheet houses styles for Bentley's forms. [_formalize.scss] is imported at the top, and any other alterations of forms are added below.

#### <a id="lte-ie8.scss"></a> lte-ie8.scss  *`bentley_core/sass/lte-ie8.scss`*
***This sheet is very important. Feel free to edit, but do so with care**

The lte-ie8 sheet houses styles for IE8 and below. Because these versions of IE cannot parse media queries, the full-width versions of any media-queried alteration must be re-stated here. It is only included in these browsers.

**For example, if styling an element for full-width, and altering for smaller widths:**

	#test {
		color: black;
		@media all and (max-width: 500px) {
			color: blue;
		}
	}

Nothing needs to be done.

**If styling an element for mobile and making large screen-size adjustments:**

	#test {
		border: 1px solid #f00;
		@media all and (min-width: 900px) {
			border: 5px dashed #bca;
		}
	}

The styles within the media for full-width displays must be re-stated in lte-ie8.scss. Otherwise the full width version of IE will look like Mobile.

#### <a id="navigation.scss"></a> navigation.scss  *`bentley_core/sass/navigation.scss`*
The navigation sheet houses all the styles for Bentley's primary horizontal nav. See Horizontal Navigation under [Core Features] for more information.

#### <a id="nodes.scss"></a> nodes.scss  *`bentley_core/sass/nodes.scss`*
The nodes sheet houses default Node presentation.

#### <a id="normalize.scss"></a> normalize.scss  *`bentley_core/sass/normalize.scss`*
***This sheet is very important. Feel free to edit, but do so with care**

The normalize sheet houses global styles to normalize presentation of elements across browsers. Please look through this sheet and follow the comments to understand more fully what this sheet can do.

#### <a id="pages.scss"></a> pages.scss  *`bentley_core/sass/pages.scss`*
***This sheet is very important. Feel free to edit, but do so with care**
The pages sheet is the meat and potatoes of page presentation in this framework. It handles most of the global page styles, type setting, etc. This is a very global sheet and is scoped very loosely to ensure it touches all aspects of the framework and its subthemes.

#### <a id="print.scss"></a> print.scss  *`bentley_core/sass/print.scss`*
The print sheet houses print styles. This has not been fully fleshed out and needs more work to be globally effective.

#### <a id="tabs.scss"></a> tabs.scss  *`bentley_core/sass/tabs.scss`*
The tabs sheet houses Drupal's tab implementation.

#### <a id="views-styles.scss"></a> views-styles.scss  *`bentley_core/sass/views-styles.scss`*
The views sheet houses basic styles for Drupal's views output. Style individual views in their respective subthemes.

#### <a id="wireframes.scss"></a> wireframes.scss  *`bentley_core/sass/wireframes.scss`*
Diagnostic tool. Ignore.


***

## <a id="javascript"></a> JavaScript
There is a fair amount of javascripts to make this framework run. Here is an overview.

###Javascript Frameworks and Plugins:
#####CSS3 Media Queries *`css3-mediaqueries.min.js`*
This is a minified js file that handles media query support for browsers that can't natively handle them. This doesn't need to be touched.

Documentation can be found [here](http://code.google.com/p/css3-mediaqueries-js/).

#####Using The Best Ampersand *`jquery.best-ampersand.min.js`*
This is a jQuery plugin to use the best ampersand. It scans the page for ampersands and puts a class on them `<span class="ampersand">`. The ampersands are styled in [pages.scss].

Documentation can be found [here](https://github.com/gmurphey/jquery.best-ampersand).

#####Flexslider Rotators *`jquery.flexlslider-min.js`*
This is the Flexslider jquery plugin. This file doesn't need to be touched, but is included to drive the sliders defined in [script.js].

Documentation can be found [here](http://www.woothemes.com/flexslider/).

#####Formalize! *`jquery.formalize.min.js`*
This is a jquery plugin to standardize the display of form elements throughout the framework across all browsers. Working in tandem with [forms.scss], this manages all form elements.

Documentation can be found [here](http://formalize.me/).

###Actionable Javascript:
##### <a id="script.js"></a> Theme Javascript *`script.js`*
This is the meat and potatoes of the framework javascript. Framework-wide features that use javascript are defined here, and this file is loaded into each subtheme. It's heavily commented as well, providing an explanation of how it works. See [Core Features] for more information on the features using this file.
***

## <a id="core-features"></a>Core Features Available In All Subthemes
#####Self Identify Links **To Be Deprecated*

#####Horizontal Navigation
The main horizontal navigation, including dropdowns, is supported in all subthemes of `bentley_core`.

The steps to ensure the horizontal navigation renders correctly are as follows.

1. Develop the menu as a standard Drupal menu, including all menu items, both top level and children.
2. Ensure that all top-level menu items in the site menu have the `show as expanded` option checked. This will print the menu item children beneath the top level menu item.
3. Create a new `Menu Block` from the Blocks admin page, set the block title to `<none>`.
4. Place the menu block you've created in the [navigation] region of the sub-theme this menu should display on.
5. One line of code needs to be added to [navigation.scss] using the `menu-for` mixin (defined in [_custom.scss]).


#####Full-width Slider


#####Content-width Slider


#####Default Twitter block

#####External node data block
* found on ideas/impact (print share etc)


#####Banner Region Background Images
***

## <a id="subthemes"></a> Subthemes

###Creating a Sub-Theme
what to do to create a subtheme

* make a blank subtheme template to copy/paste/fill out for new subts

###Current Subthemes
####Ideas Theme

####Impact Theme

####Undergraduate/Graduate Theme

####Administration Theme


<!-- Footnotes -->
[^note-search]: Current search block is Google CSE.

<!--LINKS -->

<!-- examples -->
[Impact]: http://www.bentley.edu/impact
[Ideas]: http://www.bentley.edu/ideas
[Undergraduate Admission]: http://www.bentley.edu/undergraduate
[Graduate Admission]: http://www.bentley.edu/graduate

<!-- ToC -->
[Available Regions]: #available-regions
[Template Files]: #template
[Sass/CSS]: #sasscss
[Javascript]: #javascript
[Core Features]: #core-features"
[Subthemes]: #subthemes

<!-- Regions -->
[Header]: #section-header
[Navigation]: #section-navigation
[Banner]: #section-banner
[Featured]: #featured
[Main]: #section-main
[Page Break]: #section-page-break
[Secondary]: #section-secondary
[Slab]: #section-slab
[Foundation]: #section-foundation
[Footer]: #section-footer

<!-- template files -->
[pages.tpl.php]: #pages.tpl.php

<!-- stylesheets -->
[blocks.scss]: #blocks.scss
[pages.scss]: #pages.scss
[navigation.scss]: #navigation.scss
[forms.scss]: #forms.scss
[_custom.scss]: #_custom.scss
[_formalize.scss]: #_formalize.scss

<!-- javascripts -->
[script.js]: #script.js