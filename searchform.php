<form action="<?php bloginfo('siteurl'); ?>" id="searchform" method="get">
     <fieldset>
         <label for="s" class="screen-reader-text">Search for:</label>
         <input type="search" id="s" name="s" placeholder="Enter keywords" required />
         <input type="image" id="searchsubmit" alt="Search" src="<?php bloginfo( 'template_url' ); ?>/images/searchicon.png" />
     </fieldset>
</form>