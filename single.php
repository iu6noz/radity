<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage radity
 * @since radity
 */

get_header();


while (have_posts()): the_post(); ?>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1><?php the_title(); ?></h1>
			</div>
		</div>
	
		<div class="row">
			<div class="col-12">
			  <?php if (has_post_thumbnail()): ?>
				<div class="post-thumbnail">
				  <?php the_post_thumbnail(); ?>
				</div>
			  <?php endif; ?>
			</div>
		</div>	
		
		<div class="row">
			<div class="col-6">
				<p class="post-meta">Author : <?php the_author(); ?></p>
			</div>
			<div class="col-6">
				<p class="post-meta f-right">Date : <?php the_date(); ?></p>
			</div>
		</div>
		
		<div class="row">
			<div class="col-12">
			  <div class="post-content">
				<?php the_content(); ?>
			  </div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-12">
  
  <?php
  // Get the related posts from the ACF repeater field
  $related_posts = get_field('related_posts');

  if ($related_posts) :
  ?>
    <div class="related-posts">
      <h3>Related Posts:</h3>
      <ul>
        <?php
        foreach ($related_posts as $related_post) {
          $post = $related_post['select_related_post']; 
          setup_postdata($post);
          ?>
          <li>
            <?php if (has_post_thumbnail()): ?>
              <div class="related-post-thumbnail">
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
              </div>
            <?php endif; ?>
			<ul class="related-post-list">
				<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
				<li><p class="related-post-category"><?php echo get_the_category_list(', '); ?></p></li>
			</ul>

          </li>
          <?php
        }
        wp_reset_postdata();
        ?>
      </ul>
    </div>
  <?php
  else :
    // Get the current post's tags
    $tags = wp_get_post_tags(get_the_ID());

    if ($tags) {
      $tag_ids = array();
      foreach ($tags as $tag) {
        $tag_ids[] = $tag->term_id;
      }

      // Query posts with the same tags
      $args = array(
        'post__not_in' => array(get_the_ID()),
        'tag__in' => $tag_ids,
        'posts_per_page' => -1
      );

      $related_query = new WP_Query($args);

      if ($related_query->have_posts()) :
        ?>
        <div class="related-posts">
          <h3>Related Posts:</h3>
          <ul>
            <?php
            while ($related_query->have_posts()) {
              $related_query->the_post();
              ?>
              <li>
                <?php if (has_post_thumbnail()): ?>
                  <div class="related-post-thumbnail">
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                  </div>
                <?php endif; ?>
			<ul class="related-post-list">
				<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
				<li><p class="related-post-category"><?php echo get_the_category_list(', '); ?></p></li>
			</ul>
              </li>
              <?php
            }
            ?>
          </ul>
        </div>
      <?php
      else :
        wp_reset_postdata();
        // If no posts with the same tags, display posts from the same category
        $categories = get_the_category();
        if ($categories) {
          $category_ids = array();
          foreach ($categories as $category) {
            $category_ids[] = $category->term_id;
          }

          $args = array(
            'post__not_in' => array(get_the_ID()),
            'category__in' => $category_ids,
            'posts_per_page' => 2
          );

          $related_query = new WP_Query($args);

          if ($related_query->have_posts()) :
            ?>
            <div class="related-posts">
              <h3>Related Posts:</h3>
              <ul>
                <?php
                while ($related_query->have_posts()) {
                  $related_query->the_post();
                  ?>
                  <li>
                    <?php if (has_post_thumbnail()): ?>
                      <div class="related-post-thumbnail">
                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                      </div>
                    <?php endif; ?>
					<ul class="related-post-list">
						<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
						<li><p class="related-post-category"><?php echo get_the_category_list(', '); ?></p></li>
					</ul>
                  </li>
                  <?php
                }
                ?>
              </ul>
            </div>
      <?php
          endif;
        }
        wp_reset_postdata();
      endif;
    }
  endif;
  ?>
			</div>
		</div>
		
	</div>


<?php wp_footer(); ?>


<?php endwhile; ?>