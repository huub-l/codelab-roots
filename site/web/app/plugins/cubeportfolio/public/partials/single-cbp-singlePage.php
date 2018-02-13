<?php
/*
Template Name: Cube Portfolio default template
*/
// File Security Check
if (!defined('ABSPATH')) { exit; }

//remove_filter('the_content', 'wpautop');

get_header();
?>
<div class="cbp-popup-singlePage cbpw-page-popup">
    <?php while (have_posts()): the_post();
        $metadata = get_metadata('post', get_the_ID()); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="cbp-l-project-title"><?php the_title(); ?></div>
            <div class="cbp-l-project-subtitle"><?php echo $metadata['cbp_project_subtitle'][0]; ?></div>

            <?php
            $images = json_decode($metadata['cbp_project_images'][0]);

            if (count($images)):
                $is_slider = ($metadata['cbp_project_images_slider'][0] == 'on')? 'class="cbp-slider"' : '';
                require_once CUBEPORTFOLIO_PATH . 'php/CubePortfolioProcessSliderItem.php';
                ?>
                <div <?php echo $is_slider; ?>>
                    <div class="cbp-slider-wrap">
                        <?php foreach ($images as $value): ?>
                        <?php $obj = new CubePortfolioProcessSliderItem($value); ?>
                        <div class="cbp-slider-item">
                            <?php if ($value->type === 'image'): ?>
                                <?php if ($metadata['cbp_project_images_lightbox'][0] == 'on'): ?>
                                <a href="<?php echo wp_get_attachment_url($value->id) ?>" class="cbp-lightbox" data-cbp-lightbox="<?php echo 'gallery_' . get_the_ID(); ?>" data-title="<?php echo get_post($value->id)->post_title; ?>">
                                    <?php echo $obj->getHTML(); ?>
                                </a>
                                <?php else: ?>
                                    <?php echo $obj->getHTML(); ?>
                                <?php endif; ?>

                                <?php else: ?>
                                    <?php echo $obj->getHTML(); ?>
                            <?php endif; ?>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>

            <div class="cbp-l-project-container">
                <?php
                    $categories = get_the_terms(get_the_ID(), CubePortfolioMain::$settings['postType'] . '_category');
                    $hasDetailes = false;
                    if ($metadata['cbp_project_details_client'][0] || $metadata['cbp_project_details_date'][0] || $categories != false) {
                        $hasDetailes = true;
                    }

                    $hasContent = (get_the_content() != '')? true : false;
                ?>

                <?php if ($hasContent): ?>
                <div class="cbp-l-project-desc" <?php echo (!$hasDetailes)? 'style="width:100%;"' : '' ?>>
                    <div class="cbp-l-project-desc-title"><span><?php _e('Project Description', CUBEPORTFOLIO_TEXTDOMAIN); ?></span></div>
                    <div class="cbp-l-project-desc-text"><?php the_content(); ?></div>

                    <?php
                        $fb = ($metadata['cbp_project_social_fb'][0] == 'on')? true : false;
                        $twitter = ($metadata['cbp_project_social_twitter'][0] == 'on')? true : false;
                        $googleplus = ($metadata['cbp_project_social_google'][0] == 'on')? true : false;
                        $pinterest = (isset($metadata['cbp_project_social_pinterest']) && $metadata['cbp_project_social_pinterest'][0] == 'on')? true : false;
                    ?>

                    <?php if ($fb || $twitter || $googleplus || $pinterest): ?>
                        <div class="cbp-l-project-social">
                            <?php if ($fb): ?>
                                <a href="#" class="cbp-social-fb" title="<?php _e('Share on Facebook', CUBEPORTFOLIO_TEXTDOMAIN); ?>" rel="nofollow">
                                    <svg width="30" height="30" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 486.392 486.392">
                                        <path d="M243.196 0C108.89 0 0 108.89 0 243.196s108.89 243.196 243.196 243.196 243.196-108.89 243.196-243.196C486.392 108.86 377.502 0 243.196 0zm62.866 243.165l-39.854.03-.03 145.917h-54.69V243.196H175.01v-50.28l36.48-.03-.062-29.61c0-41.04 11.126-65.997 59.43-65.997h40.25v50.31h-25.17c-18.818 0-19.73 7.02-19.73 20.122l-.06 25.17h45.233l-5.316 50.28z"></path>
                                    </svg>
                                </a>
                            <?php endif; ?>

                            <?php if ($twitter): ?>
                                <a href="#" class="cbp-social-twitter" title="<?php _e('Share on Twitter', CUBEPORTFOLIO_TEXTDOMAIN); ?>" rel="nofollow">
                                    <svg width="30" height="30" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 486.392 486.392">
                                        <path d="M243.196 0C108.891 0 0 108.891 0 243.196s108.891 243.196 243.196 243.196 243.196-108.891 243.196-243.196C486.392 108.861 377.501 0 243.196 0zm120.99 188.598l.182 7.752c0 79.16-60.221 170.359-170.359 170.359-33.804 0-65.268-9.91-91.776-26.904 4.682.547 9.454.851 14.288.851 28.059 0 53.868-9.576 74.357-25.627-26.204-.486-48.305-17.814-55.935-41.586 3.678.699 7.387 1.034 11.278 1.034 5.472 0 10.761-.699 15.777-2.067-27.39-5.533-48.031-29.7-48.031-58.701v-.76c8.086 4.499 17.297 7.174 27.116 7.509-16.051-10.731-26.63-29.062-26.63-49.825 0-10.974 2.949-21.249 8.086-30.095 29.518 36.236 73.658 60.069 123.422 62.562-1.034-4.378-1.55-8.968-1.55-13.649 0-33.044 26.812-59.857 59.887-59.857 17.206 0 32.771 7.265 43.714 18.908 13.619-2.706 26.448-7.691 38.03-14.531-4.469 13.984-13.953 25.718-26.326 33.135 12.069-1.429 23.651-4.682 34.382-9.424-8.025 11.977-18.209 22.526-29.912 30.916z"></path>
                                    </svg>
                                </a>
                            <?php endif; ?>

                            <?php if ($googleplus): ?>
                                <a href="#" class="cbp-social-googleplus" title="<?php _e('Share on Google+', CUBEPORTFOLIO_TEXTDOMAIN); ?>" rel="nofollow">
                                    <svg width="30" height="30" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 96 96">
                                      <path d="M43.484 34.425c-1.209-4.248-3.158-5.505-6.191-5.505-.328 0-.656.045-.973.135-1.312.369-2.355 1.467-2.938 3.094-.592 1.653-.633 3.373-.117 5.34.922 3.501 3.412 6.043 5.924 6.043.33 0 .656-.045.971-.134 2.744-.773 4.463-4.964 3.324-8.973zM48 0C21.49 0 0 21.49 0 48c0 26.511 21.49 48 48 48 26.512 0 48-21.489 48-48C96 21.49 74.512 0 48 0zm-2.766 68.609c-3.014 1.465-6.262 1.623-7.518 1.623-.238 0-.377-.006-.398-.006 0 0-.09.002-.244.002-1.957 0-11.713-.45-11.713-9.336 0-8.731 10.623-9.412 13.879-9.412l.086.001c-1.881-2.509-1.49-5.044-1.49-5.044-.166.012-.406.023-.703.023-1.227 0-3.59-.196-5.623-1.508-2.486-1.6-3.746-4.324-3.746-8.098 0-10.652 11.633-11.084 11.748-11.086h11.619v.252c0 1.301-2.332 1.548-3.926 1.766-.537.074-1.621.188-1.928.346 2.941 1.568 3.418 4.039 3.418 7.721 0 4.188-1.641 6.404-3.381 7.961-1.074.962-1.924 1.722-1.924 2.732 0 .992 1.164 2.014 2.51 3.195 2.207 1.939 5.23 4.593 5.23 9.052.001 4.615-1.984 7.917-5.896 9.816zm25.405-20.654h-7.578v7.579H58.26v-7.579h-7.578v-4.8h7.578v-7.579h4.801v7.579h7.578v4.8zm-31.526 5.803c-.26 0-.521.01-.783.026-2.223.164-4.268.995-5.756 2.344-1.469 1.331-2.219 3.003-2.111 4.708.223 3.549 4.039 5.635 8.674 5.297 4.564-.332 7.604-2.954 7.381-6.508-.211-3.346-3.116-5.867-7.405-5.867z"/>
                                    </svg>
                                </a>
                            <?php endif; ?>

                            <?php if ($pinterest): ?>
                                <a href="#" class="cbp-social-pinterest" title="<?php _e('Share on Pinterest', CUBEPORTFOLIO_TEXTDOMAIN); ?>" rel="nofollow">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 32 32">
                                      <path d="M16 0C7.164 0 0 7.164 0 16c0 8.838 7.164 16 16 16s16-7.162 16-16c0-8.836-7.164-16-16-16zm1.652 19.562c-.992 0-1.926-.535-2.247-1.146 0 0-.534 2.117-.646 2.524-.398 1.444-1.569 2.892-1.659 3.009-.063.082-.204.057-.219-.054-.025-.186-.324-2.006.027-3.491.177-.746 1.183-5.009 1.183-5.009s-.294-.586-.294-1.453c0-1.362.79-2.379 1.773-2.379.836 0 1.24.627 1.24 1.379 0 .841-.535 2.099-.812 3.263-.23.976.488 1.771 1.45 1.771 1.739 0 2.913-2.236 2.913-4.888 0-2.014-1.355-3.521-3.823-3.521-2.787 0-4.524 2.08-4.524 4.402 0 .801.236 1.365.606 1.801.17.201.193.284.132.514-.045.168-.145.576-.188.736-.061.233-.25.315-.46.229-1.284-.522-1.882-1.93-1.882-3.512 0-2.609 2.201-5.74 6.568-5.74 3.509 0 5.817 2.539 5.817 5.266.004 3.606-2 6.299-4.955 6.299z"/>
                                    </svg>
                                </a>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <?php endif; ?>

                <?php if ($hasDetailes): ?>
                <div class="cbp-l-project-details" <?php echo (!$hasContent)? 'style="width:100%;padding-left:0;"' : '' ?>>
                    <div class="cbp-l-project-details-title"><span><?php _e('Project Details', CUBEPORTFOLIO_TEXTDOMAIN); ?></span></div>

                    <div class="cbp-l-project-details-list">
                        <?php if ($metadata['cbp_project_details_client'][0]): ?>
                        <div><strong><?php _e('Client', CUBEPORTFOLIO_TEXTDOMAIN); ?></strong><?php echo $metadata['cbp_project_details_client'][0];?></div>
                        <?php endif; ?>

                        <?php if ($metadata['cbp_project_details_date'][0]): ?>
                        <div><strong><?php _e('Date', CUBEPORTFOLIO_TEXTDOMAIN); ?></strong><?php echo $metadata['cbp_project_details_date'][0];?></div>
                        <?php endif; ?>

                        <?php if ($categories != false): ?>
                        <div><strong><?php _e('Categories', CUBEPORTFOLIO_TEXTDOMAIN); ?></strong><?php the_terms(get_the_ID(), CubePortfolioMain::$settings['postType'] . '_category'); ?></div>
                        <?php endif; ?>

                    </div>
                </div>
                <?php endif; ?>

                <?php if ($metadata['cbp_project_link'][0]): ?>
                <a href="<?php echo $metadata['cbp_project_link'][0];?>" target="<?php echo $metadata['cbp_project_link_target'][0];?>" class="cbp-l-project-details-visit" <?php echo ($metadata['cbp_project_link_nofollow'][0] == 'on' ? 'rel="nofollow"' : ''); ?>><?php _e('VIEW PROJECT', CUBEPORTFOLIO_TEXTDOMAIN); ?></a>
                <?php endif; ?>
            </div>

            <br>
            <br>
            <br>
        </article>
    <?php endwhile; // end of the loop. ?>

</div>
<?php wp_reset_query(); ?>
<?php get_footer(); ?>