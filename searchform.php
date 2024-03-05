<?php

/**
 * Formulaire de recherche personnalisée
 * 
 */
?>
<form class="rechercher" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
  <label>
    <input type="search" class="search-field" autocomplete="off" placeholder="Rechercher..." value="<?php echo get_search_query(); ?>" name="s" />
    <button type="submit" class="search-submit"></button>
  </label>
</form>