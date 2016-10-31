<?php get_header(); ?>
<main class="row eb-content">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <article class="eb-entry eb-entry-<?php echo (is_single()? 'single': is_page()? 'page' : 'list') ?>">
    <header>
      <h1>
        <?php if (is_single()) :?>
          <?php the_title(); ?>
        <?php else: ?>
          <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
        <?php endif; ?>
      </h1>
      <p>Posted on <?php the_time('F jS, Y') ?></p>
    </header>
    <section class="eb-entry-content">
      <?php if ( has_post_thumbnail() && ! is_single()) :?>
        <a href="<?php the_permalink(); ?>" rel="bookmark">
          <?php the_post_thumbnail('eb-thumb', array( 'class' => 'eb-thumbnail')); ?>
        </a>
      <?php endif; ?>
      <p><?php the_content(''); ?></p>
    </section>
    <footer class="eb-entry-meta">
      <?php if (is_single()) :?>
      <p><?php
        $categories_list = get_the_category_list( __( ', ', 'edingburgh' ) );
        $tag_list = get_the_tag_list( '', __( ', ', 'edingburgh' ) );
        if ( '' != $tag_list ) {
          $utility_text = __( 'This entry was posted in %1$s and tagged %2$s.', 'edingburgh' );
        } elseif ( '' != $categories_list ) {
          $utility_text = __( 'This entry was posted in %1$s.', 'edingburgh' );
        } else {
          $utility_text = __( 'This entry was posted.', 'edingburgh' );
        }
        printf(
          $utility_text,
          $categories_list,
          $tag_list,
          esc_url( get_permalink() ),
          the_title_attribute( 'echo=0' ),
          get_the_author(),
          esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) )
        );
        ?>
      </p>
    <?php endif; ?>
    </footer>
  </article>
  <?php endwhile; else: ?>
  <p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>
</main>

<?php get_footer(); ?>
