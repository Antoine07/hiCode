<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<!-- Affiche le Titre en tant que lien vers le Permalien de l'Article. -->
<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

<!-- Affiche la Date. -->
<small><?php the_time('F jS, Y'); ?></small>

<!-- Affiche le corps (Content) de l'Article dans un bloc div. -->
<div class="entry">
  <?php the_excerpt(); ?>
</div>

<!-- Affiche une liste des Catégories des Articles séparées par des virgules. -->
<p class="postmetadata">Posted in <?php the_category(', '); ?></p>
<p class="postmetadata">Posted in <?php the_author_posts_link(); ?></p>
</div> <!-- Fin du premier bloc div -->

<!-- Fin de La Boucle (mais notez le "else:" - voir la suite). -->
<?php endwhile;
else : ?>

<!-- Le premier "if" testait l'existence d'Articles à afficher. Cette -->
<!-- partie "else" indique que faire si ce n'est pas le cas. -->
<p>Sorry, no posts matched your criteria.</p>

<!-- Fin REELLE de La Boucle. -->
<?php endif; ?>