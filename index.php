<?php get_header(); ?>
        <section id="about" class="s_about bg_light">
            <h2><?php 
                $idObj = get_category_by_slug('s_about');
                $id = $idObj->term_id;
                echo get_cat_name($id);?></h2>
            <div class="s_descr_wrap">
                <div class="s_descr"><?php echo category_description($id);?></div>
            </div>
            <div class="section_content">
                <div class="container">
                    <div class="row">
                       
                        <?php if ( have_posts() ) : query_posts('p=6');
                        while (have_posts()) : the_post(); ?>
                        <div class="col-md-4 col-md-push-4 animation_center">
                            <h3>Фото</h3>
                            <div class="person">
                                <?php if ( has_post_thumbnail() ) : ?>
                                <a class="popup" href="<?php
                                                       $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );
                                                       echo $large_image_url[0];
                                                       ?>"><?php the_post_thumbnail(array(220, 220)); ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-4 col-md-pull-4 animation_left">
                            <h3><?php the_title(); ?></h3>
                            <?php the_content(); ?>
                        </div>
                        <? endwhile; endif; wp_reset_query(); ?>
                        
                        
                        
                        <div class="col-md-4 animation_right">
                            <?php if ( have_posts() ) : query_posts('p=9');
                            while (have_posts()) : the_post(); ?>
                            <h3> <?php the_title(); ?></h3>
                            <h4><?php echo get_bloginfo("name");?></h4>
                            <?php the_content(); ?>
                            <? endwhile; endif; wp_reset_query(); ?>
                            <div class="social_wrapp">
                                <ul>
                                    <?php if ( have_posts() ) : query_posts('cat=3');
                                    while (have_posts()) : the_post(); ?>
                                    <li><a href="<?php echo get_post_meta($post->ID,'soc_url', true);?>" target="_blank" title="<?php the_title(); ?>"><i class="fa <?php echo get_post_meta($post->ID,'fonts_awesome', true);?>"></i></a></li>
                                    <? endwhile; endif; wp_reset_query(); ?>
                                </ul>
                            </div>
                        </div>
                        
                        
                        
                    </div>
                </div>
            </div>
        </section>
        <section id="resume" class="s_resume">
            <h2><?php 
                $idObj = get_category_by_slug('s_resume');
                $id = $idObj->term_id;
                echo get_cat_name($id);?></h2>
            <div class="s_descr_wrap">
                <div class="s_descr"><?php echo category_description($id);?></div>
            </div>
            <div class="section_content">
                <div class="container">
                    <div class="row">
                        <div class="resume_container">
                            <div class="col-md-6 col-sm-6 animation_left">
                                <h3><?php 
                                    $idObj = get_category_by_slug('работа');
                                    $id = $idObj->term_id;
                                    echo get_cat_name($id);?></h3>
                                <div class="resume_icon">
                                    <i class="icon-basic-case"></i>
                                </div>
                                
                                <?php if ( have_posts() ) : query_posts("cat=$id");
                                while (have_posts()) : the_post(); ?>
                                <div class="resume_item">
                                    <div class="year">
                                        <?php echo get_post_meta($post->ID,'years', true);?>
                                    </div>
                                    <div class="resume_desription">
                                        <?php echo get_post_meta($post->ID,'resume_place', true);?> <strong>
                                        <?php the_title(); ?>
                                        </strong>
                                    </div>
                                    <?php the_content(); ?>
                                </div>
                                <? endwhile; endif; wp_reset_query(); ?>
                               
                               
                               
                            </div>
                            <div class="col-md-6 col-sm-6 animation_right">
                                <h3><?php 
                                    $idObj = get_category_by_slug('учеба');
                                    $id = $idObj->term_id;
                                    echo get_cat_name($id);?></h3>
                                <div class="resume_icon">
                                    <i class="icon-basic-book-pen"></i>
                                </div>
                                
                                
                                <?php if ( have_posts() ) : query_posts("cat=$id");
                                while (have_posts()) : the_post(); ?>
                                <div class="resume_item">
                                    <div class="year">
                                        <?php echo get_post_meta($post->ID,'years', true);?>
                                    </div>
                                    <div class="resume_desription">
                                        <strong>
                                            <?php the_title(); ?>
                                        </strong>
                                        <?php echo get_post_meta($post->ID,'resume_place', true);?> 
                                    </div>
                                    <?php the_content(); ?>
                                </div>
                                <? endwhile; endif; wp_reset_query(); ?>
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="portfolio" class="s_portfolio bg_dark">
            <h2><?php 
                $idObj = get_category_by_slug('s_portfolio');
                $id = $idObj->term_id;
                echo get_cat_name($id);?></h2>
            <div class="s_descr_wrap">
                <div class="s_descr" <?php echo category_description($id);?></div>
            </div>
            <div class="section_content">
                <div class="container">
                    <div class="row">
                        <div class="filter_div controls">
                            <ul>
                                <li class="filter active" data-filter="all">Все работы</li>
                                <li class="filter" data-filter=".pages">Сайты</li>
                                <li class="filter" data-filter=".identy">Айдентика</li>
                                <li class="filter" data-filter=".logos">Логотипы</li>
                            </ul>
                        </div>
                        <div id="portfolio_grid">
                           
                            <?php if ( have_posts() ) : query_posts("cat=$id");
                            while (have_posts()) : the_post(); ?>
                            <div class="mix col-md-3 col-sm-6 col-xs-12 portfolio_item <?php
                                        $tags = wp_get_post_tags($post->ID);
                                        if ($tags) {
                                            foreach($tags as $tag) {
                                                echo ' ' . $tag->name;
                                            }
                                        }
                                        ?> ">
                               <?php the_post_thumbnail(array(400, 300)); ?>
                                <div class="port_item_cont">
                                    <h3><?php the_title(); ?></h3>
                                    <?php the_excerpt(); ?>
                                    <a href="<?php
                                             $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );
                                             echo $large_image_url[0];
                                             ?>" class="popup_content">Посмотреть</a>
                                </div>
                                <div class="hidden">
                                    <div class="podrt_descr">
                                        <div class="modal-box-content">
                                            <button class="mfp-close" type="button" title="Закрыть (Esc)">×</button>
                                            <h3><?php the_title(); ?></h3>
                                            <?php the_content(); ?>
                                            <?php the_post_thumbnail(array(800, 600)); ?> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <? endwhile; endif; wp_reset_query(); ?>
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="contacts" class="s_contacts bg_light">
            <h2><?php 
                $idObj = get_category_by_slug('контакти');
                $id = $idObj->term_id;
                echo get_cat_name($id);?></h2>
            <div class="s_descr_wrap">
                <div class="s_descr"><?php echo category_description($id);?></div>
            </div>
            <div class="section_content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="contact_box">
                                <i class="icon-basic-geolocalize-05"></i>
                                <h3>Адрес:</h3>
                                <p><?php
                                    $options = get_option("sample_theme_options");
                                    echo $options["addresstext"];
                                    ?></p>
                            </div>
                            <div class="contact_box">
                                <i class="icon-basic-smartphone"></i>
                                <h3>Телефон:</h3>
                                <p><?php
                                    $options = get_option("sample_theme_options");
                                    echo $options["phonetext"];
                                    ?></p>
                            </div>
                            <div class="contact_box">
                                <i class="icon-basic-webpage-img-txt"></i>
                                <h3>E-mail:</h3>
                                <p><?php
                                        $options = get_option("sample_theme_options");
                                    echo $options["sitetext"];
                                    ?></p>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <form action="http://formspree.io/bogdkovalov@yandex.ru" class="main_form" novalidate="" target="_blank" method="post">
                                <label class="form-group">
                                    <span class="color_element">*</span> Ваше имя:
                                    <input type="text" name="name" placeholder="Ваше имя" data-validation-required-message="Вы не ввели имя" required>
                                    <span class="help-block text-danger">
                                    </span>
                                </label>
                                <label class="form-group">
                                    <span class="color_element">*</span> Ваш E-mail:
                                    <input type="email" name="email" placeholder="Ваш E-mail" data-validation-required-message="Не корректно введен E-mail" required>
                                    <span class="help-block text-danger"></span>
                                </label>
                                <label class="form-group">
                                    <span class="color_element">*</span> Ваше сообщение:
                                    <textarea name="message" placeholder="Ваше сообщение" data-validation-required-message="Вы не ввели сообщение" required></textarea>
                                    <span class="help-block text-danger"></span>
                                </label>
                                <button>Отправить</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php get_footer();?>




