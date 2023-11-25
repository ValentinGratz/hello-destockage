# hello-destockage
Hello-destockage, un thème WordPress reprenant Hello Elementor pour un site de destockage

Essai de création d'un thème compatible avec Elementor pour la création d'un site pour magasin de destockage.

J'ai essayer de faire ce thème avec chatgpt, et en reprenant les bases de Hello Elementor. 

Pour le moment j'ai modifier ces quelques fichiers : 
- style.css : modification du nom du thème, numéro de version et description
:warning: en modifiant le numéro de version il me dit de mettre à jour vers la version plus récente de Hello Elementor

- modification de index.php, function.php et header.php

Voici les bouts de code indiqué par ChatGPT pour m'entrainer :
style.css : 
```
/*
Theme Name: Mon Thème Destockage
Description: Thème pour un magasin de destockage
Author: Ton Nom
Version: 1.0
*/

/* Ajoute tes styles CSS ici */

```

index.php
```
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

```

function.php
```
<?php
// Enregistrement des scripts et styles
function enqueue_theme_scripts() {
    // Exemple d'enregistrement d'un style CSS
    wp_enqueue_style('style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'enqueue_theme_scripts');

```

header.php
```
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <link rel="stylesheet" href="<?php echo esc_url(get_stylesheet_uri()); ?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header>
        <!-- Ton en-tête -->
        <h1>En-tête du site</h1>
    </header>

```
footer.php
```
    <footer>
        <!-- Ton pied de page -->
        <p>Pied de page du site</p>
    </footer>
    <?php wp_footer(); ?>
</body>
</html>
```

RESTE A FAIRE :

latest-arrivals.php
```
<?php
// Exemple de contenu pour les derniers arrivages
$args = array(
    'post_type' => 'product', // Si tu utilises WooCommerce
    'posts_per_page' => 5, // Nombre de produits à afficher
    'orderby' => 'date',
    'order' => 'DESC'
);

$latest_arrivals = new WP_Query($args);

if ($latest_arrivals->have_posts()) :
    while ($latest_arrivals->have_posts()) : $latest_arrivals->the_post();
        // Affichage des produits ou articles
        the_title();
        the_content();
    endwhile;
    wp_reset_postdata();
else :
    echo 'Aucun dernier arrivage trouvé';
endif;
?>

```

promotions.php
```
<?php
// Exemple de contenu pour les promotions
// Ici, tu pourrais avoir des offres spéciales, des réductions, etc.
echo '<h2>Promotions en cours</h2>';
echo '<p>Offres spéciales pour nos clients fidèles !</p>';
?>

```

opening-hours.php
```
<?php
// Exemple de contenu pour les horaires d'ouverture
echo '<h2>Horaires d\'ouverture</h2>';
echo '<p>Lundi - Vendredi : 9h00 - 18h00</p>';
echo '<p>Samedi : 9h00 - 12h00</p>';
?>

```

Assure-toi d'appeler ces fichiers dans ton thème principal (index.php, par exemple) à l'endroit où tu souhaites afficher ces sections spécifiques en utilisant la fonction get_template_part(). Par exemple :
```
// Pour afficher les derniers arrivages
get_template_part('latest-arrivals');

// Pour afficher les promotions
get_template_part('promotions');

// Pour afficher les horaires d'ouverture
get_template_part('opening-hours');

```

J'ai demander à chatgpt re reprendre les codes et d'insérer ce qu'il a indiqué, résultat, quand je l'active, j'ai une erreur critique.

Rester aussi le fait que j'ai ajouter dans function.php des codes pour qu'il ne prenne plus en compte les update de hello elementor ce qui casse le thème que je fais. 

