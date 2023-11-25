<?php
/**
 * The site's entry point.
 *
 * Loads the relevant template part,
 * the loop is executed (when needed) by the relevant template part.
 *
 * @package HelloElementor
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

<?php get_header(); ?>

<!-- Contenu principal -->
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <?php
        // Exemple de boucle WordPress pour afficher les articles ou produits
        if (have_posts()) :
            while (have_posts()) : the_post();
                // Affichage des articles ou produits
                the_title();
                the_content();
            endwhile;
        else :
            // Aucun contenu trouvé
            echo 'Aucun contenu trouvé';
        endif;
        ?>
    </main>
</div>

<?php get_footer(); ?>
