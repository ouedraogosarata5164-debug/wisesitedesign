<?php get_header(); ?>

<div id="primary" >
    <main id="main" class="site-main">
        <?php
        if (have_posts()) :
            while (have_posts()) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div>
                </article>
            <?php endwhile;
        else :
            echo '<p>No content found</p>';
        endif;
        ?>
    </main>
</div>
       
   
<?php get_footer(); ?>
