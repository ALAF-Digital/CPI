<?php

/**
 * The template for displaying single events
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package YourTheme
 */

get_header();
function get_top()
{
    $datePicker = get_field('date');
    $location = get_field('location');
?>
    <div class="ccm_event_venue_dv col-lg-8">
        <h2><?php echo the_title(); ?></h2>
        <ul>
            <li>
                <div class="ccm_event_venue_img_dv">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/event_datentime_icon.png" alt="" />
                </div>
                <div class="ccm_event_venue_txt_dv">
                    <strong>Date & Time:</strong>
                    <span><?php echo $datePicker; ?></span>
                </div>
            </li>
            <li>
                <div class="ccm_event_venue_img_dv">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/event_location_icon.png" alt="" />
                </div>
                <div class="ccm_event_venue_txt_dv">
                    <strong>Location:</strong>
                    <span><?php echo $location; ?></span>
                </div>
            </li>
        </ul>
    </div>
<?php }

function get_side()
{
?>
    <div class="ccm_event_details_content_right_dv col-lg-4">
        <div class="main_heading">
            <h3>SPONSORS AND PARTNERS</h3>
        </div>
        <ul>
            <?php $sponsored = get_field('sponsored', 38611); ?>
            <?php if ($sponsored) : ?>
                <?php foreach ($sponsored as $sponsor) : ?>
                    <?php
                    $heading = $sponsor['sponsor_title'];
                    $icons = $sponsor['sponsored_image'];
                    ?>
                    <li>
                        <div class="header">
                            <h4><?php echo $heading; ?></h4>
                        </div>
                        <div class="logo">
                            <img src="<?php echo $icons['url']; ?>" alt="" />
                        </div>
                    </li>
                <?php endforeach; ?>
            <?php endif; ?>
        </ul>
    </div>
<?php }

while (have_posts()) :
    the_post();

    // You can customize the layout and content of your single event here.
?>


    <?php $banner = get_field('top_banner_event', 38611);
    $image_url = $banner['url'];

    ?>
    <div class="ccm_event_banner_dv">
        <img src="<?php echo $image_url; ?>" alt="" />
    </div>

    <div class="ccm_event_details_dv">
        <div class="ccm_container container">
            <div class="row g-5">
                <div class="ccm_event_left_tab_dv col-lg-2">
                    <ul class="nav-menu">
                        <li data-target="overview" class="nav-item"><a class="nav-link-event" href="#">Overview</a></li>
                        <li data-target="key-topics" class="nav-item"><a class="nav-link-event" href="#">Key Topics</a></li>
                        <li data-target="delegates" class="nav-item"><a class="nav-link-event" href="#">Delegates</a></li>
                        <li data-target="speakers" class="nav-item"><a class="nav-link-event" href="#">Speakers</a></li>
                        <li data-target="photo" class="nav-item"><a class="nav-link-event" href="#">Photo Gallery</a></li>
                        <li data-target="sponsors" class="nav-item"><a class="nav-link-event" href="#">Sponsors & Partners</a></li>
                        <!-- Add more items as needed -->
                    </ul>
                </div>


                <?php


                ?>
                <div class="col-lg-10">
                    <div id="content-container">

                        <div class="ccm_event_details_header_dv">
                            <div class="row">
                                <?php echo get_top(); ?>
                                <div class="ccm_event_btns_dv col-lg-4">
                                    <?php if (have_rows('download_links')) : ?>
                                        <?php while (have_rows('download_links')) : the_row(); ?>
                                            <?php $link_img = get_sub_field('link_img'); ?>
                                            <?php $link_cta = get_sub_field('link_cta'); ?>
                                            <?php if ($link_img) : ?>
                                                <?php

                                                ?>
                                                <a href="<?php echo esc_url($link_cta['url']); ?>">
                                                    <img src="<?php echo esc_url($link_img['url']); ?>" alt="" />
                                                    <span><?php echo $link_cta['title']; ?></span>
                                                </a>
                                            <?php endif; ?>
                                        <?php endwhile; ?>
                                    <?php endif; ?>

                                </div>
                            </div>
                        </div>
                        <div id="overview" class="content-section">
                            <div class="ccm_event_details_tab_heading_dv">
                                <h2 class="ccm_event_details_heading">Overview</h2>
                            </div>

                            <div class="ccm_event_details_content_dv">
                                <div class="row g-3">
                                    <div class="ccm_event_details_content_left_dv col-lg-8">
                                        <div class="ccm_event_details_overview_dv">
                                            <?php echo the_content(); ?>
                                        </div>
                                    </div>

                                    <?php echo get_side(); ?>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div id="key-topics" class="content-section" style="display: none;">
                        <div class="ccm_event_details_tab_heading_dv">
                            <h2 class="ccm_event_details_heading">Key Topics</h2>
                        </div>

                        <div class="ccm_event_details_content_dv">
                            <div class="row g-3">
                                <div class="ccm_event_details_content_left_dv col-lg-8">
                                    <?php if (have_rows('day_break')) : ?>
                                        <?php while (have_rows('day_break')) : the_row(); ?>
                                            <?php $heading_v1 = get_sub_field('heading_v1'); ?>
                                            <?php $description_v1 = get_sub_field('description_v1'); ?>
                                            <div class="ccm_event_details_key_topics_dv">
                                                <h2 class="ccm_event_details_heading">
                                                    <?php echo $heading_v1; ?>
                                                </h2>
                                                <p>
                                                    <?php echo $description_v1; ?>
                                                </p>
                                            </div>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </div>



                                <?php echo get_side(); ?>
                            </div>
                        </div>
                    </div>





                    <div id="delegates" class="content-section" style="display: none;">

                        <div class="ccm_event_details_tab_heading_dv">
                            <h2 class="ccm_event_details_heading">Delegates</h2>
                        </div>

                        <div class="ccm_event_details_content_dv">
                            <div class="row g-3">
                                <div class="ccm_event_details_content_left_dv col-lg-8">
                                    <div class="ccm_event_details_delegates_dv">
                                        <?php if (have_rows('delegates')) : ?>
                                            <?php while (have_rows('delegates')) : the_row(); ?>
                                                <div class="delegate">
                                                    <h2 class="ccm_event_details_heading ccm_blue_txt">
                                                        <?php echo get_sub_field('heading_v2'); ?>
                                                    </h2>
                                                    <p class="description">
                                                        <?php echo get_sub_field('description_v2'); ?>
                                                    </p>

                                                    <h3 class="ccm_event_details_heading">Companies</h3>
                                                    <div class="ccm_event_details_delegates_company_list">
                                                        <ul>
                                                            <?php if (have_rows('companies')) : ?>
                                                                <?php while (have_rows('companies')) : the_row(); ?>
                                                                    <li>
                                                                        <ul>
                                                                            <li><?php echo get_sub_field('company'); ?></li>
                                                                        </ul>
                                                                    </li>
                                                                <?php endwhile; ?>
                                                            <?php endif; ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                            <?php endwhile; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>



                                <?php echo get_side(); ?>
                            </div>
                        </div>
                    </div>




                    <div id="speakers" class="content-section" style="display: none;">


                        <div class="ccm_event_details_tab_heading_dv">
                            <h2 class="ccm_event_details_heading">Speakers</h2>
                        </div>

                        <div class="ccm_event_details_content_dv">
                            <div class="row g-3">
                                <div class="ccm_event_details_content_left_dv col-lg-8">
                                    <?php if (have_rows('speaker')) : ?>
                                        <?php while (have_rows('speaker')) : the_row(); ?>
                                            <?php $speaker_title = get_sub_field('speaker_title'); ?>
                                            <h2 class="ccm_event_details_heading"><?php echo $speaker_title; ?></h2>
                                        <?php endwhile; ?>
                                    <?php endif; ?>

                                    <div class="ccm_speakers_dv">
                                        <ul>
                                            <?php if (have_rows('speaker')) : ?>
                                                <?php while (have_rows('speaker')) : the_row(); ?>
                                                    <?php
                                                    $speaker_title = get_sub_field('speaker_title');
                                                    $speaker_name = get_sub_field('speaker_name');
                                                    $speaker_address = get_sub_field('speaker_address');
                                                    $speaker_designation = get_sub_field('speaker_designation');
                                                    $speaker_icon = get_sub_field('speaker_icon');
                                                    ?>
                                                    <li>
                                                        <div class="ccm_speakers_img_dv">
                                                            <div class="ccm_speakers_img">
                                                                <img src="<?php echo esc_url($speaker_icon['url']) ?>" alt="" style="width: 100%;" />
                                                            </div>
                                                        </div>
                                                        <div class="ccm_speakers_txt_dv">
                                                            <h3><?php echo $speaker_name; ?></h3>
                                                            <p><?php echo $speaker_address; ?></p>
                                                            <h3><?php echo $speaker_designation; ?></h3>
                                                        </div>
                                                    </li>
                                                <?php endwhile; ?>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </div>


                                <?php echo get_side(); ?>
                            </div>
                        </div>
                    </div>




                    <div id="sponsors" class="content-section" style="display: none;">
                        <div class="ccm_event_details_content_dv">
                            <div class="row g-3">

                                <div class="ccm_event_details_content_left_dv col-lg-8">
                                    <h2 class="ccm_event_details_heading">
                                        DAY 1: SPONSORS AND PARTNERS
                                    </h2>
                                    <ul>
                                        <?php $sponsored = get_field('sponsored', 38611); ?>
                                        <?php if ($sponsored) : ?>
                                            <?php foreach ($sponsored as $sponsor) : ?>
                                                <?php
                                                $heading = $sponsor['sponsor_title'];
                                                $icons = $sponsor['sponsored_image'];
                                                ?>
                                                <li>
                                                    <div class="header">
                                                        <h4><?php echo $heading; ?></h4>
                                                    </div>
                                                    <div class="logo">
                                                        <img src="<?php echo $icons['url']; ?>" alt="" />
                                                    </div>
                                                </li>
                                            <?php endforeach; ?>
                                        <?php endif; ?>

                                    </ul>

                                </div>



                                <?php echo get_side(); ?>
                            </div>
                        </div>
                    </div>






                    <div id="photo" class="content-section" style="display: none;">

                        <div class="ccm_event_details_tab_heading_dv">
                            <h2 class="ccm_event_details_heading">Photo Gallery</h2>
                        </div>

                        <div class="ccm_event_details_content_dv">
                            <div class="row">
                                <div class="ccm_event_details_content_left_dv col-lg-8">
                                    <div class="ccm_event_details_photo_gally_dv">
                                        <ul>
                                            <?php if (have_rows('gallery')) : ?>
                                                <?php while (have_rows('gallery')) : the_row(); ?>
                                                    <?php $album = get_sub_field('album'); ?>
                                                    <li>
                                                        <div><img src="<?php echo esc_url($album['url']) ?>" alt="" style="width: 100%;" /></div>
                                                    </li>
                                                <?php endwhile; ?>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </div>


                                <?php echo get_side(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php
endwhile;

get_footer();
