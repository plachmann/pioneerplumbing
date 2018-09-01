<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Plumberpro
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('posts-list__item card'); ?>>
    <div class="post-list__item-content">

        <div class="post-featured-content ">
            <?php plumberpro_post_thumbnail(true); ?>
            <?php plumberpro_sticky_label(); ?>
        </div><!-- .post-featured-content -->

        <header class="entry-header">
            <?php
            if (is_single()) {
                the_title('<h3 class="entry-title">', '</h3>');
            } else {
                the_title('<h3 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h3>');
            }
            ?>
        </header><!-- .entry-header -->

        <?php if ('post' === get_post_type()) : ?>

            <div class="entry-meta">
                <?php

                plumberpro_meta_author(
                    'loop',
                    array(
                        'before' => esc_html__('by', 'plumberpro') . ' ',
                    )
                );

                plumberpro_meta_date('loop', array(
                    'before' => '',
                ));

                plumberpro_meta_categories('loop');

                ?>
            </div><!-- .entry-meta -->

        <?php endif; ?>


        <div class="entry-content">

            <?php do_action('cherry_post_format_audio'); ?>

            <?php

            $embed_args = array(
                'fields' => array('soundcloud'),
                'height' => 310,
                'width' => 310,
            );

            $embed_content = apply_filters('cherry_get_embed_post_formats', false, $embed_args);

            if (false === $embed_content) {
                plumberpro_blog_content();
            } else {
                printf('<div class="embed-wrapper">%s</div>', $embed_content);
            }

            plumberpro_meta_tags('loop', array(
	            'before' => __('Tags: ', 'plumberpro'),
                'separator' => ' ',
            ));
            ?>
        </div><!-- .entry-content -->

    </div>
    <footer class="entry-footer">
        <?php plumberpro_read_more();

        plumberpro_meta_comments('loop', array(
            'before' => '<i class="fa fa-comment"></i>',
            'after' => esc_html__('comments ', 'plumberpro'),
            'zero' => '0',
            'one' => '1',
            'plural' => '%',
        ));

        ?>
        <?php plumberpro_share_buttons('loop'); ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-## -->