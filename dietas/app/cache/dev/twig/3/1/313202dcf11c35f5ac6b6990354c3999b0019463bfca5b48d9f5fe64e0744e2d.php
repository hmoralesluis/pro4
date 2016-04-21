<?php

/* FrontBundle:Homepage:homepage.html.twig */
class __TwigTemplate_313202dcf11c35f5ac6b6990354c3999b0019463bfca5b48d9f5fe64e0744e2d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("FrontBundle::layout.html.twig", "FrontBundle:Homepage:homepage.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'options' => array($this, 'block_options'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "FrontBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_18cb80b9a29e26bd5567cc89135057bde9a1666bd1b8f9ea738f897de8b28700 = $this->env->getExtension("native_profiler");
        $__internal_18cb80b9a29e26bd5567cc89135057bde9a1666bd1b8f9ea738f897de8b28700->enter($__internal_18cb80b9a29e26bd5567cc89135057bde9a1666bd1b8f9ea738f897de8b28700_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "FrontBundle:Homepage:homepage.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_18cb80b9a29e26bd5567cc89135057bde9a1666bd1b8f9ea738f897de8b28700->leave($__internal_18cb80b9a29e26bd5567cc89135057bde9a1666bd1b8f9ea738f897de8b28700_prof);

    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $__internal_12fff051a8eff219dede085b2c427a53c0519fd13e966dca47b1bf8202e3c31e = $this->env->getExtension("native_profiler");
        $__internal_12fff051a8eff219dede085b2c427a53c0519fd13e966dca47b1bf8202e3c31e->enter($__internal_12fff051a8eff219dede085b2c427a53c0519fd13e966dca47b1bf8202e3c31e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Homepage";
        
        $__internal_12fff051a8eff219dede085b2c427a53c0519fd13e966dca47b1bf8202e3c31e->leave($__internal_12fff051a8eff219dede085b2c427a53c0519fd13e966dca47b1bf8202e3c31e_prof);

    }

    // line 5
    public function block_options($context, array $blocks = array())
    {
        $__internal_4c364885224b2faacf74b3fc30ec7b6a14a9d244dd8ae01f51614c33b18bdaf2 = $this->env->getExtension("native_profiler");
        $__internal_4c364885224b2faacf74b3fc30ec7b6a14a9d244dd8ae01f51614c33b18bdaf2->enter($__internal_4c364885224b2faacf74b3fc30ec7b6a14a9d244dd8ae01f51614c33b18bdaf2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "options"));

        // line 6
        echo "    <nav>
        <ul class=\"nav nav-pills nav-main\" id=\"mainMenu\">
            <li>
                <a href=\"";
        // line 9
        echo $this->env->getExtension('routing')->getPath("login");
        echo "\">Login</a>
            </li>
            <li>
                <a href=\"";
        // line 12
        echo $this->env->getExtension('routing')->getPath("join");
        echo "\">Join Us</a>
            </li>
        </ul>
    </nav>
";
        
        $__internal_4c364885224b2faacf74b3fc30ec7b6a14a9d244dd8ae01f51614c33b18bdaf2->leave($__internal_4c364885224b2faacf74b3fc30ec7b6a14a9d244dd8ae01f51614c33b18bdaf2_prof);

    }

    // line 18
    public function block_body($context, array $blocks = array())
    {
        $__internal_260922b71d3764be818ab6a7c0822fb63e2db2212baa7084b4a31d2c3e7d8ecd = $this->env->getExtension("native_profiler");
        $__internal_260922b71d3764be818ab6a7c0822fb63e2db2212baa7084b4a31d2c3e7d8ecd->enter($__internal_260922b71d3764be818ab6a7c0822fb63e2db2212baa7084b4a31d2c3e7d8ecd_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 19
        echo "    <div role=\"main\" class=\"main\">
        <div id=\"content\" class=\"content full\">

            <div class=\"slider-container\">
                <div class=\"slider\" id=\"revolutionSlider\">
                    <ul>
                        <li data-transition=\"fade\" data-slotamount=\"10\" data-masterspeed=\"300\">
                            <img src=\"";
        // line 26
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/img/slides/slide-bg.jpg"), "html", null, true);
        echo "\" data-fullwidthcentering=\"on\"
                                 alt=\"\">

                            <div class=\"caption sft stb visible-desktop\"
                                 data-x=\"42\"
                                 data-y=\"180\"
                                 data-speed=\"300\"
                                 data-start=\"1000\"
                                 data-easing=\"easeOutExpo\"><img
                                        src=\"";
        // line 35
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/img/slides/slide-title-border.png"), "html", null, true);
        echo "\" alt=\"\">
                            </div>

                            <div class=\"caption top-label lfl stl\"
                                 data-x=\"92\"
                                 data-y=\"180\"
                                 data-speed=\"300\"
                                 data-start=\"500\"
                                 data-easing=\"easeOutExpo\">DO YOU NEED A NEW
                            </div>

                            <div class=\"caption sft stb visible-desktop\"
                                 data-x=\"342\"
                                 data-y=\"180\"
                                 data-speed=\"300\"
                                 data-start=\"1000\"
                                 data-easing=\"easeOutExpo\"><img
                                        src=\"";
        // line 52
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/img/slides/slide-title-border.png"), "html", null, true);
        echo "\" alt=\"\">
                            </div>

                            <div class=\"caption main-label sft stb\"
                                 data-x=\"0\"
                                 data-y=\"230\"
                                 data-speed=\"300\"
                                 data-start=\"1500\"
                                 data-easing=\"easeOutExpo\">WEB DESIGN?
                            </div>

                            <div class=\"caption bottom-label sft stb\"
                                 data-x=\"50\"
                                 data-y=\"280\"
                                 data-speed=\"500\"
                                 data-start=\"2000\"
                                 data-easing=\"easeOutExpo\">Check out our options and features.
                            </div>

                            <div class=\"caption fade\"
                                 data-x=\"450\"
                                 data-y=\"50\"
                                 data-speed=\"500\"
                                 data-start=\"2500\"
                                 data-easing=\"easeOutExpo\"><img
                                        src=\"";
        // line 77
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/img/slides/slide-concept.png"), "html", null, true);
        echo "\" alt=\"\"></div>

                        </li>
                        <li data-transition=\"fade\" data-slotamount=\"10\" data-masterspeed=\"300\">
                            <img src=\"";
        // line 81
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/img/slides/slide-bg.jpg"), "html", null, true);
        echo "\" data-fullwidthcentering=\"on\"
                                 alt=\"\">

                            <div class=\"caption fade\"
                                 data-x=\"0\"
                                 data-y=\"50\"
                                 data-speed=\"500\"
                                 data-start=\"200\"
                                 data-easing=\"easeOutExpo\"><img
                                        src=\"";
        // line 90
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/img/slides/slide-concept-2.png"), "html", null, true);
        echo "\" alt=\"\"></div>

                            <div class=\"caption main-label sft stb\"
                                 data-x=\"550\"
                                 data-y=\"200\"
                                 data-speed=\"300\"
                                 data-start=\"1500\"
                                 data-easing=\"easeOutExpo\">CONTACT US
                            </div>

                            <div class=\"caption bottom-label sft stb\"
                                 data-x=\"570\"
                                 data-y=\"250\"
                                 data-speed=\"500\"
                                 data-start=\"2000\"
                                 data-easing=\"easeOutExpo\">And check out our options and features.
                            </div>

                        </li>
                    </ul>
                </div>
            </div>

            <div class=\"home-intro\">
                <div class=\"container\">

                    <div class=\"row\">
                        <div class=\"span8\">
                            <p>
                                The fastest way to grow your business with the leader in <em>Technology.</em>
                                <span>Check out our options and features included.</span>
                            </p>
                        </div>
                        <div class=\"span4\">
                            <div class=\"get-started\">
                                <a href=\"#\" class=\"btn btn-large btn-primary\">Get Started Now!</a>

                                <div class=\"learn-more\">or <a href=\"#\">learn more.</a></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class=\"container\">

                <div class=\"row center\">
                    <div class=\"span12\">
                        <h2 class=\"short\">Porto is <strong class=\"inverted\">incredibly</strong> beautiful and fully
                            responsive.</h2>

                        <p class=\"featured lead\">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce elementum, nulla vel
                            pellentesque consequat, ante nulla hendrerit arcu, ac tincidunt mauris lacus sed leo. vamus
                            suscipit molestie vestibulum.
                        </p>
                    </div>
                </div>

            </div>

            <div class=\"home-concept\">
                <div class=\"container\">

                    <div class=\"row center\">
                        <span class=\"sun\"></span>
                        <span class=\"cloud\"></span>

                        <div class=\"span2 offset1\">
                            <div class=\"process-image\">
                                <img src=\"";
        // line 161
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/img/home-concept-item-1.png"), "html", null, true);
        echo "\" alt=\"\"/>
                                <strong>Strategy</strong>
                            </div>
                        </div>
                        <div class=\"span2\">
                            <div class=\"process-image\">
                                <img src=\"";
        // line 167
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/img/home-concept-item-2.png"), "html", null, true);
        echo "\" alt=\"\"/>
                                <strong>Planning</strong>
                            </div>
                        </div>
                        <div class=\"span2\">
                            <div class=\"process-image\">
                                <img src=\"";
        // line 173
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/img/home-concept-item-3.png"), "html", null, true);
        echo "\" alt=\"\"/>
                                <strong>Build</strong>
                            </div>
                        </div>
                        <div class=\"span4 offset1\">
                            <div class=\"project-image\">
                                <div id=\"fcSlideshow\" class=\"fc-slideshow\">
                                    <ul class=\"fc-slides\">
                                        <li><a href=\"#\"><img
                                                        src=\"";
        // line 182
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/img/projects/project-home-1.jpg"), "html", null, true);
        echo "\"/></a>
                                        </li>
                                        <li><a href=\"#\"><img
                                                        src=\"";
        // line 185
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/img/projects/project-home-2.jpg"), "html", null, true);
        echo "\"/></a>
                                        </li>
                                    </ul>
                                </div>
                                <strong class=\"our-work\">Our Work</strong>
                            </div>
                        </div>
                    </div>

                    <hr class=\"tall\"/>

                </div>
            </div>

            <div class=\"container\">

                <div class=\"row\">
                    <div class=\"span8\">
                        <h2>Our <strong>Features</strong></h2>

                        <div class=\"row\">
                            <div class=\"span4\">
                                <div class=\"feature-box\">
                                    <div class=\"feature-box-icon\">
                                        <i class=\"icon-group\"></i>
                                    </div>
                                    <div class=\"feature-box-info\">
                                        <h4 class=\"shorter\">Customer Support</h4>

                                        <p class=\"tall\">Lorem ipsum dolor sit amet, consectetur adip.</p>
                                    </div>
                                </div>
                                <div class=\"feature-box\">
                                    <div class=\"feature-box-icon\">
                                        <i class=\"icon-file\"></i>
                                    </div>
                                    <div class=\"feature-box-info\">
                                        <h4 class=\"shorter\">HTML5 / CSS3 / JS</h4>

                                        <p class=\"tall\">Lorem ipsum dolor sit amet, adip.</p>
                                    </div>
                                </div>
                                <div class=\"feature-box\">
                                    <div class=\"feature-box-icon\">
                                        <i class=\"icon-google-plus\"></i>
                                    </div>
                                    <div class=\"feature-box-info\">
                                        <h4 class=\"shorter\">500+ Google Fonts</h4>

                                        <p class=\"tall\">Lorem ipsum dolor sit amet, consectetur adip.</p>
                                    </div>
                                </div>
                                <div class=\"feature-box\">
                                    <div class=\"feature-box-icon\">
                                        <i class=\"icon-adjust\"></i>
                                    </div>
                                    <div class=\"feature-box-info\">
                                        <h4 class=\"shorter\">Colors</h4>

                                        <p class=\"tall\">Lorem ipsum dolor sit amet, consectetur adip.</p>
                                    </div>
                                </div>
                            </div>
                            <div class=\"span4\">
                                <div class=\"feature-box\">
                                    <div class=\"feature-box-icon\">
                                        <i class=\"icon-film\"></i>
                                    </div>
                                    <div class=\"feature-box-info\">
                                        <h4 class=\"shorter\">Sliders</h4>

                                        <p class=\"tall\">Lorem ipsum dolor sit amet, consectetur.</p>
                                    </div>
                                </div>
                                <div class=\"feature-box\">
                                    <div class=\"feature-box-icon\">
                                        <i class=\"icon-ok\"></i>
                                    </div>
                                    <div class=\"feature-box-info\">
                                        <h4 class=\"shorter\">Icons</h4>

                                        <p class=\"tall\">Lorem ipsum dolor sit amet, consectetur adip.</p>
                                    </div>
                                </div>
                                <div class=\"feature-box\">
                                    <div class=\"feature-box-icon\">
                                        <i class=\"icon-reorder\"></i>
                                    </div>
                                    <div class=\"feature-box-info\">
                                        <h4 class=\"shorter\">Buttons</h4>

                                        <p class=\"tall\">Lorem ipsum dolor sit, consectetur adip.</p>
                                    </div>
                                </div>
                                <div class=\"feature-box\">
                                    <div class=\"feature-box-icon\">
                                        <i class=\"icon-desktop\"></i>
                                    </div>
                                    <div class=\"feature-box-info\">
                                        <h4 class=\"shorter\">Lightbox</h4>

                                        <p class=\"tall\">Lorem sit amet, consectetur adip.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=\"span4\">
                        <h2>and more...</h2>

                        <div class=\"accordion\" id=\"accordion\">
                            <div class=\"accordion-group\">
                                <div class=\"accordion-heading\">
                                    <a class=\"accordion-toggle\" data-toggle=\"collapse\" data-parent=\"#accordion\"
                                       href=\"#collapseOne\"><i class=\"icon-lightbulb\"></i> Group Item #1</a>
                                </div>
                                <div id=\"collapseOne\" class=\"accordion-body collapse in\">
                                    <div class=\"accordion-inner\">
                                        Donec tellus massa, tristique sit amet condimentum vel, facilisis quis sapien.
                                        Praesent id enim sit amet odio vulputate eleifend in in tortor odio vulputate
                                        eleifend in in tortorodio vulputate eleifend in in tortor.
                                    </div>
                                </div>
                            </div>
                            <div class=\"accordion-group\">
                                <div class=\"accordion-heading\">
                                    <a class=\"accordion-toggle\" data-toggle=\"collapse\" data-parent=\"#accordion\"
                                       href=\"#collapseTwo\"><i class=\"icon-bell-alt\"></i> Group Item #2</a>
                                </div>
                                <div id=\"collapseTwo\" class=\"accordion-body collapse\">
                                    <div class=\"accordion-inner\">
                                        Donec tellus massa, tristique sit amet condimentum vel, facilisis quis sapien.
                                    </div>
                                </div>
                            </div>
                            <div class=\"accordion-group\">
                                <div class=\"accordion-heading\">
                                    <a class=\"accordion-toggle\" data-toggle=\"collapse\" data-parent=\"#accordion\"
                                       href=\"#collapseThree\"><i class=\"icon-laptop\"></i> Group Item #3</a>
                                </div>
                                <div id=\"collapseThree\" class=\"accordion-body collapse\">
                                    <div class=\"accordion-inner\">
                                        Donec tellus massa, tristique sit amet condimentum vel, facilisis quis sapien.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class=\"tall\"/>

                <div class=\"row center\">
                    <div class=\"span12\">
                        <h2 class=\"short\">We're not the only ones <strong>excited</strong> about Porto Template...</h2>
                        <h4 class=\"lead tall\">5,500 customers in 100 countries use Porto Template. Meet our
                            customers.</h4>
                    </div>
                </div>
                <div class=\"row center\">
                    <div class=\"flexslider unstyled\"
                         data-plugin-options='{\"directionNav\":false, \"animation\":\"slide\", \"slideshow\": false, \"maxVisibleItems\": 6}'>
                        <ul class=\"slides\">
                            <li>
                                <div class=\"span2\">
                                    <img class=\"mobile-max-width small\"
                                         src=\"";
        // line 351
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/img/logo-client-1.jpg"), "html", null, true);
        echo "\" alt=\"\">
                                </div>
                            </li>
                            <li>
                                <div class=\"span2\">
                                    <img class=\"mobile-max-width small\"
                                         src=\"";
        // line 357
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/img/logo-client-2.jpg"), "html", null, true);
        echo "\" alt=\"\">
                                </div>
                            </li>
                            <li>
                                <div class=\"span2\">
                                    <img class=\"mobile-max-width small\"
                                         src=\"";
        // line 363
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/img/logo-client-3.jpg"), "html", null, true);
        echo "\" alt=\"\">
                                </div>
                            </li>
                            <li>
                                <div class=\"span2\">
                                    <img class=\"mobile-max-width small\"
                                         src=\"";
        // line 369
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/img/logo-client-4.jpg"), "html", null, true);
        echo "\" alt=\"\">
                                </div>
                            </li>
                            <li>
                                <div class=\"span2\">
                                    <img class=\"mobile-max-width small\"
                                         src=\"";
        // line 375
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/img/logo-client-5.jpg"), "html", null, true);
        echo "\" alt=\"\">
                                </div>
                            </li>
                            <li>
                                <div class=\"span2\">
                                    <img class=\"mobile-max-width small\"
                                         src=\"";
        // line 381
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/img/logo-client-6.jpg"), "html", null, true);
        echo "\" alt=\"\">
                                </div>
                            </li>
                            <li>
                                <div class=\"span2\">
                                    <img class=\"mobile-max-width small\"
                                         src=\"";
        // line 387
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/img/logo-client-4.jpg"), "html", null, true);
        echo "\" alt=\"\">
                                </div>
                            </li>
                            <li>
                                <div class=\"span2\">
                                    <img class=\"mobile-max-width small\"
                                         src=\"";
        // line 393
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/img/logo-client-2.jpg"), "html", null, true);
        echo "\" alt=\"\">
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>

            <div class=\"map-section\">
                <section class=\"featured footer map\">
                    <div class=\"container\">
                        <div class=\"row\">
                            <div class=\"span6\">
                                <div class=\"recent-posts\">
                                    <h2>Latest <strong>Blog</strong> Posts</h2>

                                    <div class=\"row\">
                                        <div class=\"flexslider unstyled\"
                                             data-plugin-options='{\"directionNav\":false, \"animation\":\"slide\"}'>
                                            <ul class=\"slides\">
                                                <li>
                                                    <div class=\"span3\">
                                                        <article>
                                                            <div class=\"date\">
                                                                <span class=\"day\">15</span>
                                                                <span class=\"month\">Jan</span>
                                                            </div>
                                                            <h4><a href=\"#\">Lorem ipsum dolor sit amet,
                                                                    consectetur adipiscing elit.</a></h4>

                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                                Donec hendrerit vehicula est, in consequat libero. <a
                                                                        href=\"/\" class=\"read-more\">read more <i
                                                                            class=\"icon-angle-right\"></i></a></p>
                                                        </article>
                                                    </div>
                                                    <div class=\"span3\">
                                                        <article>
                                                            <div class=\"date\">
                                                                <span class=\"day\">15</span>
                                                                <span class=\"month\">Jan</span>
                                                            </div>
                                                            <h4><a href=\"#\">Lorem ipsum dolor</a></h4>

                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                                Donec hendrerit vehicula est, in consequat. <a href=\"/\"
                                                                                                               class=\"read-more\">read
                                                                    more <i class=\"icon-angle-right\"></i></a></p>
                                                        </article>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class=\"span3\">
                                                        <article>
                                                            <div class=\"date\">
                                                                <span class=\"day\">12</span>
                                                                <span class=\"month\">Jan</span>
                                                            </div>
                                                            <h4><a href=\"#\">Lorem ipsum dolor sit amet,
                                                                    consectetur adipiscing elit.</a></h4>

                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                                Donec hendrerit vehicula est, in consequat libero. <a
                                                                        href=\"/\" class=\"read-more\">read more <i
                                                                            class=\"icon-angle-right\"></i></a></p>
                                                        </article>
                                                    </div>
                                                    <div class=\"span3\">
                                                        <article>
                                                            <div class=\"date\">
                                                                <span class=\"day\">11</span>
                                                                <span class=\"month\">Jan</span>
                                                            </div>
                                                            <h4><a href=\"#\">Lorem ipsum dolor</a></h4>

                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                                <a href=\"/\" class=\"read-more\">read more <i
                                                                            class=\"icon-angle-right\"></i></a></p>
                                                        </article>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class=\"span3\">
                                                        <article>
                                                            <div class=\"date\">
                                                                <span class=\"day\">15</span>
                                                                <span class=\"month\">Jan</span>
                                                            </div>
                                                            <h4><a href=\"#\">Lorem ipsum dolor sit amet,
                                                                    consectetur adipiscing elit.</a></h4>

                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                                Donec hendrerit vehicula est, in consequat libero. <a
                                                                        href=\"/\" class=\"read-more\">read more <i
                                                                            class=\"icon-angle-right\"></i></a></p>
                                                        </article>
                                                    </div>
                                                    <div class=\"span3\">
                                                        <article>
                                                            <div class=\"date\">
                                                                <span class=\"day\">15</span>
                                                                <span class=\"month\">Jan</span>
                                                            </div>
                                                            <h4><a href=\"#\">Lorem ipsum dolor</a></h4>

                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                                Donec hendrerit vehicula est, in consequat. <a href=\"/\"
                                                                                                               class=\"read-more\">read
                                                                    more <i class=\"icon-angle-right\"></i></a></p>
                                                        </article>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class=\"row\">
                                            <div class=\"span6\">
                                                <a class=\"btn btn-flat btn-mini btn-primary pull-right pull-bottom-phone\"
                                                   href=\"#\">View All Posts <i class=\"icon-arrow-right\"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class=\"span6\">
                                <h2><strong>What</strong> Client’s Say</h2>

                                <div class=\"row\">
                                    <div class=\"flexslider flexslider-top-title unstyled\"
                                         data-plugin-options='{\"controlNav\":false, \"slideshow\": false, \"animationLoop\": true, \"animation\":\"slide\"}'>
                                        <ul class=\"slides\">
                                            <li>
                                                <div class=\"span6\">
                                                    <blockquote class=\"testimonial\">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                            Donec hendrerit vehicula est, in consequat. Lorem ipsum
                                                            dolor sit amet, consectetur adipiscing elit. Donec hendrerit
                                                            vehicula est, in consequat. Donec hendrerit vehicula est, in
                                                            consequat. Donec hendrerit vehicula est, in consequat.</p>
                                                    </blockquote>
                                                    <div class=\"testimonial-arrow-down\"></div>
                                                    <div class=\"testimonial-author\">
                                                        <div class=\"thumbnail thumbnail-small\">
                                                            <img src=\"";
        // line 536
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/img/clients/client-1.jpg"), "html", null, true);
        echo "\"
                                                                 alt=\"\">
                                                        </div>
                                                        <p><strong>John
                                                                Smith</strong><span>CEO & Founder - Red Wine</span></p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class=\"span6\">
                                                    <blockquote class=\"testimonial\">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                            Donec hendrerit vehicula est, in consequat. Lorem ipsum
                                                            dolor sit amet, consectetur adipiscing elit.</p>
                                                    </blockquote>
                                                    <div class=\"testimonial-arrow-down\"></div>
                                                    <div class=\"testimonial-author\">
                                                        <div class=\"thumbnail thumbnail-small\">
                                                            <img src=\"";
        // line 554
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/img/clients/client-1.jpg"), "html", null, true);
        echo "\"
                                                                 alt=\"\">
                                                        </div>
                                                        <p><strong>John
                                                                Smith</strong><span>CEO & Founder - Crivos</span></p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
";
        
        $__internal_260922b71d3764be818ab6a7c0822fb63e2db2212baa7084b4a31d2c3e7d8ecd->leave($__internal_260922b71d3764be818ab6a7c0822fb63e2db2212baa7084b4a31d2c3e7d8ecd_prof);

    }

    public function getTemplateName()
    {
        return "FrontBundle:Homepage:homepage.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  680 => 554,  659 => 536,  513 => 393,  504 => 387,  495 => 381,  486 => 375,  477 => 369,  468 => 363,  459 => 357,  450 => 351,  281 => 185,  275 => 182,  263 => 173,  254 => 167,  245 => 161,  171 => 90,  159 => 81,  152 => 77,  124 => 52,  104 => 35,  92 => 26,  83 => 19,  77 => 18,  65 => 12,  59 => 9,  54 => 6,  48 => 5,  36 => 3,  11 => 1,);
    }
}
