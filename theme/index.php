<?php get_header(); ?>
<main class="row eb-content">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <article class="eb-entry">
    <header>
      <h1><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
      <p>Posted on <?php the_time('F jS, Y') ?></p>
    </header>
    <section class="eb-entry-content">
      <?php if ( has_post_thumbnail() && ! is_single()) :?>
        <a href="<?php the_permalink(); ?>" rel="bookmark">
          <?php the_post_thumbnail('mythumbnails', array( 'class' => 'eb-thumbnail')); ?>
        </a>
      <?php endif; ?>
      <p><?php the_content(__('Continue Reading...')); ?></p>
    </section>
    <footer></footer>
  </article>
  <?php endwhile; else: ?>
  <p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>
</main>

<?php get_footer(); ?>
