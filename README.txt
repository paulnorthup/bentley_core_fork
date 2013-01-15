Bentley Core README

//
// Type Styles
//

# Helper classes to emulate headings!
FOR HEADINGS 1-5

To change the style of a tag to a heading style, add the class:
  class="heading-x"
where 'x' is the number of the heading (h1, h2, etc)

To change the size of a tag to a heading size, add the class:
  class="size-x"
where 'x' is the number of the heading (h1, h2, etc)


//
// Blocks
//

/*------------------------------------------------------------------------------------
 * HEADER
 * block titles must be '<none>'
 ------------------------------------------------------------------------------------*/

# Header Logo
  <h1 class="logo"><span class="first-word">Bentley</span> University</h1>

# Header Quick Links Button
  <a id="info-link">Button Text</a>

# Header Search

# Header Site Subhead
  <h1 class="subhead">"Site Specific SubHeading"</h1>
  Add block to 'Header Logo' region.

# Header Secondary Links
  Add a standard menu block created from a menu with !!MAXIMUM 4 LINKS!!!.
  Name the menu '[site-name] Secondary Links'.
  Add to 'Header Secondary Links' Region.


/*------------------------------------------------------------------------------------
 * NAVIGATION
 * block titles must be '<none>'
------------------------------------------------------------------------------------*/

# Navigation Bar
  
  Add a 'Nice Menu' block with maximum 8 links.
  Format the Nice Menu block as a horizontal menu ('down').
  Add a class to the Nice Menu block with the site name (ex: ideas, undergraduate, etc)
  Add block to 'Navigation bar' region. 
  
  ** Note: **
  You must add a code block for the Nice Menu in themes/bentley_core/sass/bentley-nice-menus.scss
  using the class given to the menu block!


/*------------------------------------------------------------------------------------
 * CONTENT BLOCKS
 
------------------------------------------------------------------------------------*/  

# Recent comments

  .recent-comments-block 
  Can be used in views to put space between rows. It has a rhythym of 1 and is currently used in recent comments block in bentley.edu/impact. 


/*------------------------------------------------------------------------------------
 * FOUNDATION
 * block titles must be '<none>'
------------------------------------------------------------------------------------*/

For the social blocks:
<p>
  <a href="http://twitter.com">
    <span class="heading">Follow us on Twitter</span>
    <br>
    <span>Real-time updates to keep you in-the-know.</span>
  </a>
</p>

In 'block configuration', add classs "social-[name-of-network]"
  available:
    social-facebook
    social-twitter
    social-youtube
    social-linkedin
    social-subscribe
    social-mail

//
// Views
//

class "group-page-teasers" - Views class for groups basic page teaser views

