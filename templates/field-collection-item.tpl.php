<?php

/**
 * @file
 * Default theme implementation for field collection items.
 *
 * Available variables:
 * - $content: An array of comment items. Use render($content) to print them all, or
 *   print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $title: The (sanitized) field collection item label.
 * - $url: Direct url of the current entity if specified.
 * - $page: Flag for the full page state.
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. By default the following classes are available, where
 *   the parts enclosed by {} are replaced by the appropriate values:
 *   - entity-field-collection-item
 *   - field-collection-item-{field_name}
 *
 * Other variables:
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 *
 * @see template_preprocess()
 * @see template_preprocess_entity()
 * @see template_process()
 */
?>
    <?php

     if (isset($content['field_slider_full_img']['#title'])) { // full width 
      
      // open div wrap
      print '<div class="slide-wrap-full" style="background-image:url(\'/files/slider-images/' . $content['field_slider_full_img'][0]['#item']['filename'] . '\')">' ;

        // internal centering div
        print '<div class="centered-content">';

        // link
        print '<a href="' . $content['field_slider_full_link'][0]['#markup']. '"><br />';
      
        // h1 
        print '<p class="heading-1">' . $content['field_slider_full_h1'][0]['#markup'] . '</p>' ;
        
        //h2
        print '<p class="heading-2">' . $content['field_slider_full_h2'][0]['#markup'] . '</p>' ;
        
        //h3
        if (isset($content['field_slider_full_h3'][0]['#markup'])) {
          print '<p class="heading-3">' . $content['field_slider_full_h3'][0]['#markup'] . '</p>' ;
        }
        else{};

        //close link      
        print '</a>';

        //close centering div
        print '</div>';

      //close div
      print '</div>';
    }
    elseif (isset($content['field_slider_img']['#title'])) { // content width theme 
    
      // open div wrap
      print '<div class="slide-wrap" style="background-image:url(\'/files/slider-images/' . $content['field_slider_img'][0]['#item']['filename'] . '\')">' ;


        // link
        print '<a href="' . $content['field_slider_link'][0]['#markup']. '">';
        // h1 
        print '<p class="heading-1">' . $content['field_slider_h1'][0]['#markup'] . '</p>' ;
      
        //h2
        if (isset($content['field_slider_h2'][0]['#markup'])) {
          print '<p class="heading-2">' . $content['field_slider_h2'][0]['#markup'] . '</p>' ;
        }
        else{};
      
        //close link
        print '</a>';

      //close div
      print '</div>';
    }
    
    else {
     ?>
     <div class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  <div class="content"<?php print $content_attributes; ?>>
    <?php
      print render($content);
    ?>
  </div>
</div>
     <?php 
    }
    
    
    ?>
