/**
 * @file
 * A JavaScript file for the theme.
 *
 * In order for this JavaScript to be loaded on pages, see the instructions in
 * the README.txt next to this file.
 */

// JavaScript should be made compatible with libraries other than jQuery by
// wrapping it with an "anonymous closure". See:
// - http://drupal.org/node/1446420
// - http://www.adequatelygood.com/2010/3/JavaScript-Module-Pattern-In-Depth
(function ($, Drupal, window, document, undefined) {


// Place your code here.

$(document).ready(function() {
  // Self Identify (SID) Section /////////////////////////////////////////////
    
    //Set SID Variables
    var sidw = $('.quick-links.wrapper');
    var identSelect;
    var identGroup;
    var identDefault = $(".quick-links.wrapper .default");
      
    //Show loaded divs
    $('.quick-links-left, .quick-links-right').show();

    //Check to see if we have localStorage
    identSelect = "default";

    try {
      if ('localStorage' in window && window.localStorage !== null) {
        if(localStorage.bIdentify !== null && localStorage.bIdentify !== "") {
          identSelect = localStorage.bIdentify;
        }
      }
    } catch (e) {
      
    }
    
    //Apply identSelect to SID Menu/Desc Group
    identGroup = $('.quick-links.wrapper .' + identSelect);
    
    //Show divs based on localStorage
    identGroup.show();
    
    //Make Button open and close drawer
    $('a#info-link').click(function(event) {
      "use strict";
      event.preventDefault();
      if (sidw.css("display") === "none") {
        infoDown();
      } else {
        infoUp();
      }
    });
    
    //SID Helper Functions
      // Slide self-id drawer up
      function infoUp() {
        "use strict";
        sidw.slideUp("slow");
      }
      // Slide self-id drawer down
      function infoDown() {
        "use strict";
        sidw.slideDown("slow");
      }
      function storeBID() {
        "use strict";
        localStorage.bIdentify = identSelect;
      }
      function emptyBID() {
        "use strict";
        localStorage.bIdentify = "";
      }
      //Close Drawer with Close Button
      $('.quick-links.wrapper a.self-identify-close').click(function(event) {
        "use strict";
        event.preventDefault();
        infoUp();
      });
      //Reset SID
      $(".self-identify-reset").click(function(event){
        "use strict";
        event.preventDefault();
        $(".quick-links.wrapper .sid-menu, .quick-links.wrapper .sid-desc").slideUp();
        $(identDefault).slideDown();
        emptyBID();
      });
      //Make all nav items in default nav swap SID navs
      $('.quick-links.wrapper .default ul.menu a').each(function() {
        "use strict";
        $(this).click(function(event) {
          event.preventDefault();
          identSelect = $(this).attr('name');
          identGroup = $('.quick-links.wrapper .' + identSelect);
          identGroup.slideDown();
          $(identDefault).slideUp();
          storeBID();
        });
      });      
      
    // End Self Identify (SID) Section

    // Start Primary Navigation Menu Functionality
          
    // FUNCTIONS
    function equalNavHeight() {
      var maxHeight = -1;
      $('#navigation ul.menu:first li.expanded').each(function() {
        maxHeight = maxHeight > $(this).height() ? maxHeight : $(this).height();
      });
      linkHeight = maxHeight - 20; // reduce size to account for padding
      if ($(window).width() <= 500) { // If small screen:
        $('#navigation ul.menu:first > li > a').css({'padding':'0.5em 0 0.5em 10px','height':linkHeight}); // Horizontal nav item display
      } else { // If large screen:
        $('#navigation ul.menu:first > li > a').css({'height':linkHeight}); // give links specific height to ensure menus start at the bottom of the nav bar
        $('#navigation').css({'height':maxHeight});
      }
    }

    // RUN IT
    $(window).load(equalNavHeight); // set links to equal height in nav

    // SUB NAV HIDE/SHOW
    if ($(window).width() > 500) {
      $('#navigation ul.menu:first li.expanded').each(function() {
          $(this).hover(
            function() {
              $(this).children('.menu').fadeIn(100);
            },
            function() {
              $(this).children('.menu').hide();
            }
          );
        });
      }

    // MOBILE NAV/MENU HIDE/SHOW
    if ($(window).width() <= 500) { // if mobile nav
      $('#header .mobile-menu a.mobile-menu-toggle').click(function(event) {
        event.preventDefault;
        $('.wrapper.navigation').toggleClass('show'); // see menu.scss
      });
    }
    // End Primary Navigation Menu Functionality

    // Use the Best Ampersand
    $('h1').bestAmpersand();

    // Add print buttons
    $("ul.share li.print a").attr("href", "javascript:window.print()");

    // Add blockquote to body
    $(".node-ideas-article.view-mode-full .field-name-body p").eq(1).before($(".node-ideas-article blockquote"));

    // Fire up the sliders
    try {
      if ( $('#banner .flexslider .slide-wrap-full').length !==0) { //check if full width slider
        $('.wrapper.banner').addClass('region-full-width');
      }
    }
    catch (e) {

    }

    //init flexlslider
    $('#banner .flexslider .field-type-field-collection').flexslider({
      animation: "slide",
      selector: ".field-items > .field-item",
      slideshowSpeed: 8000,
      animationSpeed: 600,
      controlNav: false,
      nextText: ">",
      prevText: "<",
      initDelay: 500, 
      start: function(slider){
        $('body').removeClass('loading');
        $('#banner .view-core-slider').delay(500).css('height', 'auto');
      }
    });

    // social block twitter actions
    if ($(window).width() >= 720) {
      $('ul.tweets li.tweet .twitter-action').hide();
      $('ul.tweets li.tweet').each(function() {
        $(this).hover(
          function() {
            $(this).children('.twitter-action').slideDown("fast");
          },
          function() {
            $(this).children('.twitter-action').slideUp("fast");
          }
        );
      });
    }
    else {}
    

  });

})(jQuery, Drupal, this, this.document);
