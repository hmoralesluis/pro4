<?php

/* FrontBundle::layout.html.twig */
class __TwigTemplate_a95d89c32ef639a740738e7bf82e98b07015aff007ab672fd4b64046305327ca extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::base-front-convert.html.twig", "FrontBundle::layout.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'header' => array($this, 'block_header'),
            'options' => array($this, 'block_options'),
            'body' => array($this, 'block_body'),
            'footer' => array($this, 'block_footer'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base-front-convert.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_c24b2897011f7ac015416807bd6c950fdd96579381a24b889a88b16d1fd4b1d4 = $this->env->getExtension("native_profiler");
        $__internal_c24b2897011f7ac015416807bd6c950fdd96579381a24b889a88b16d1fd4b1d4->enter($__internal_c24b2897011f7ac015416807bd6c950fdd96579381a24b889a88b16d1fd4b1d4_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "FrontBundle::layout.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_c24b2897011f7ac015416807bd6c950fdd96579381a24b889a88b16d1fd4b1d4->leave($__internal_c24b2897011f7ac015416807bd6c950fdd96579381a24b889a88b16d1fd4b1d4_prof);

    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $__internal_4b9fee077dc0a3389b85deb39b432ddd152b6e0e2bb0a00b0198db9e158ab8fa = $this->env->getExtension("native_profiler");
        $__internal_4b9fee077dc0a3389b85deb39b432ddd152b6e0e2bb0a00b0198db9e158ab8fa->enter($__internal_4b9fee077dc0a3389b85deb39b432ddd152b6e0e2bb0a00b0198db9e158ab8fa_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        
        $__internal_4b9fee077dc0a3389b85deb39b432ddd152b6e0e2bb0a00b0198db9e158ab8fa->leave($__internal_4b9fee077dc0a3389b85deb39b432ddd152b6e0e2bb0a00b0198db9e158ab8fa_prof);

    }

    // line 5
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_627ef1a7a4c24785111f0664233d3b78b40d1c6b73a94ceeb1180f924fede24b = $this->env->getExtension("native_profiler");
        $__internal_627ef1a7a4c24785111f0664233d3b78b40d1c6b73a94ceeb1180f924fede24b->enter($__internal_627ef1a7a4c24785111f0664233d3b78b40d1c6b73a94ceeb1180f924fede24b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 6
        echo "    <link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/css/login.css"), "html", null, true);
        echo "\"/>
";
        
        $__internal_627ef1a7a4c24785111f0664233d3b78b40d1c6b73a94ceeb1180f924fede24b->leave($__internal_627ef1a7a4c24785111f0664233d3b78b40d1c6b73a94ceeb1180f924fede24b_prof);

    }

    // line 9
    public function block_header($context, array $blocks = array())
    {
        $__internal_92a08eb3ec920e1d9f48ab465fc545095c70bfeaefdd94dc0ebc23539607fcd7 = $this->env->getExtension("native_profiler");
        $__internal_92a08eb3ec920e1d9f48ab465fc545095c70bfeaefdd94dc0ebc23539607fcd7->enter($__internal_92a08eb3ec920e1d9f48ab465fc545095c70bfeaefdd94dc0ebc23539607fcd7_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "header"));

        // line 10
        echo "    <header class=\"header header-fullwidth header-fullwidth header-dark\" data-spy=\"affix\" data-offset-top=\"0\">
        <nav class=\"navbar navbar-default yamm\">
            <div class=\"container-full\">

                <div id=\"navbar\" class=\"navbar-collapse collapse\">
                    <ul class=\"nav navbar-nav\">
                        <li class=\"megamenu\">
                            <a href=\"";
        // line 17
        echo $this->env->getExtension('routing')->getPath("homepage");
        echo "\">
                                <img alt=\"Megalifepro\" src=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/img/netviralpro-p.png"), "html", null, true);
        echo "\">
                            </a>
                        </li>

                        <li class=\"megamenu\">
                            <a href=\"#\" class=\"dropdown-toggle\" role=\"button\"
                               aria-haspopup=\"true\" aria-expanded=\"false\">SOBRE NOSOTROS <span class=\"fa\"></span></a>
                        </li>
                        <!-- end mega menu -->

                        <li class=\"megamenu dropdown yamm-half hasmenu\">
                            <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\"
                               aria-haspopup=\"true\" aria-expanded=\"false\">PRODUCTOS <span class=\"fa\"></span></a>
                        </li>
                        <!-- end mega menu -->

                        <li class=\"megamenu dropdown yamm-half hasmenu\">
                            <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\"
                               aria-haspopup=\"true\" aria-expanded=\"false\">OPORTUNIDAD <span class=\"fa\"></span></a>
                        </li>
                        <!-- end mega menu -->

                        <li class=\"dropdown has-submenu yamm-half hasmenu\">
                            <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\"
                               aria-haspopup=\"true\" aria-expanded=\"false\">TESTIMONIOS <span class=\"fa\"></span></a>
                        </li>
                        <!-- end dropdown-menu -->

                        <li class=\"dropdown has-submenu yamm-half hasmenu\">
                            <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\"
                               aria-haspopup=\"true\" aria-expanded=\"false\">PORQUE NETVIRALPRO? <span
                                        class=\"fa\"></span></a>
                        </li>
                        <!-- end dropdown-menu -->

                        <li class=\"dropdown has-submenu yamm-half hasmenu\">
                            <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\"
                               aria-haspopup=\"true\" aria-expanded=\"false\">CONTACTA <span class=\"fa\"></span></a>
                        </li>

                        <li class=\"megamenu dropdown yamm-half hasmenu\">
                            <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\"><img src=\"";
        // line 59
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/img/US.png"), "html", null, true);
        echo "\" alt=\"\">ENG <span class=\"fa fa-angle-down\"></span></a>
                            <ul class=\"dropdown-menu\">
                                <li>
                                    <div class=\"flag\">
                                        <div class=\"row\">
                                            <div class=\"col-md-4 border-right\">
                                                <div class=\"menu\">
                                                    <ul>
                                                        <li><a href=\"#\"><img src=\"";
        // line 67
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/img/PT.png"), "html", null, true);
        echo "\" alt=\"\"> ENG</a></li>
                                                        <li><a href=\"#\"><img src=\"";
        // line 68
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/img/FR.png"), "html", null, true);
        echo "\" alt=\"\"> FR</a></li>
                                                        <li><a href=\"#\"><img src=\"";
        // line 69
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/img/ES.png"), "html", null, true);
        echo "\" alt=\"\"> ES</a></li>
                                                    </ul>
                                                </div>
                                                <!-- end menu-widget -->
                                            </div>
                                        </div>
                                        <!-- end row -->
                                    </div>
                                    <!-- end yamm -->
                                </li>
                            </ul>
                        </li>
                        <!-- end mega menu -->

                        ";
        // line 83
        $context["referring_affiliate"] = $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "get", array(0 => "affiliate"), "method");
        // line 84
        echo "                        ";
        if ((isset($context["referring_affiliate"]) ? $context["referring_affiliate"] : $this->getContext($context, "referring_affiliate"))) {
            // line 85
            echo "                            <li class=\"yamm-half\">
                                <a href=\"#\" class=\"dropdown-toggle\" role=\"button\" aria-expanded=\"false\">Referido:
                                    ";
            // line 87
            echo twig_escape_filter($this->env, (isset($context["referring_affiliate"]) ? $context["referring_affiliate"] : $this->getContext($context, "referring_affiliate")), "html", null, true);
            echo " <span class=\"fa\"></span></a>
                                <ul class=\"dropdown-menu\">
                                </ul>
                            </li>
                        ";
        }
        // line 92
        echo "
                        <li class=\"dropdown has-submenu yamm-half hasmenu\">
                            <a href=\"#\" class=\"signin\"><span>Login </span><i class=\"icon-angle-up\"></i></a>
                            <fieldset id=\"signin_menu\">
                                <form method=\"post\" id=\"signin\" action=\"";
        // line 96
        echo $this->env->getExtension('routing')->getPath("check_path");
        echo "\">
                                    <input id=\"username\" name=\"_username\"
                                           value=\"";
        // line 98
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array(), "any", false, true), "get", array(0 => "lastUsername"), "method", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array(), "any", false, true), "get", array(0 => "lastUsername"), "method"), "")) : ("")), "html", null, true);
        echo "\"
                                           title=\"username\"
                                           placeholder=\"Username\" tabindex=\"4\" type=\"text\">
                                    </p>
                                    <p>
                                        <input id=\"password\" name=\"_password\" value=\"\" title=\"password\"
                                               tabindex=\"5\"
                                               placeholder=\"Password\" type=\"password\">
                                    </p>

                                    <p class=\"remember\">
                                        <a class=\"btn btn-flat btn-mini btn-primary\"
                                           href=\"javascript:\$('#signin').submit()\">Sign
                                            in</a>
                                        <input id=\"remember\" name=\"remember_me\" value=\"1\" tabindex=\"7\"
                                               type=\"checkbox\">
                                        <label for=\"remember\">Remember me</label>
                                    </p>

                                    <p class=\"forgot\"><a href=\"#\" id=\"resend_password_link\">Forgot your
                                            credentials?</a></p>
                                </form>
                            </fieldset>
                        </li>

                    </ul>
                    <!-- end dropdown -->

                </div>
                <!--/.nav-collapse -->
            </div>
            <!--/.container-fluid -->
        </nav>
        <!-- end nav -->


        <!-- end container -->
    </header>
    <!-- end header -->

    <!-- end wrapper -->

    ";
        // line 140
        $this->displayBlock('options', $context, $blocks);
        
        $__internal_92a08eb3ec920e1d9f48ab465fc545095c70bfeaefdd94dc0ebc23539607fcd7->leave($__internal_92a08eb3ec920e1d9f48ab465fc545095c70bfeaefdd94dc0ebc23539607fcd7_prof);

    }

    public function block_options($context, array $blocks = array())
    {
        $__internal_674d6be3764e7b327ef05093f6d356e85653f6e6574d7e007dd04a60cab6b562 = $this->env->getExtension("native_profiler");
        $__internal_674d6be3764e7b327ef05093f6d356e85653f6e6574d7e007dd04a60cab6b562->enter($__internal_674d6be3764e7b327ef05093f6d356e85653f6e6574d7e007dd04a60cab6b562_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "options"));

        // line 141
        echo "
    ";
        
        $__internal_674d6be3764e7b327ef05093f6d356e85653f6e6574d7e007dd04a60cab6b562->leave($__internal_674d6be3764e7b327ef05093f6d356e85653f6e6574d7e007dd04a60cab6b562_prof);

    }

    // line 145
    public function block_body($context, array $blocks = array())
    {
        $__internal_e42dd5d92e116e365ccc25884e09a2ebecf6141d385e3517437a20164699f8ea = $this->env->getExtension("native_profiler");
        $__internal_e42dd5d92e116e365ccc25884e09a2ebecf6141d385e3517437a20164699f8ea->enter($__internal_e42dd5d92e116e365ccc25884e09a2ebecf6141d385e3517437a20164699f8ea_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_e42dd5d92e116e365ccc25884e09a2ebecf6141d385e3517437a20164699f8ea->leave($__internal_e42dd5d92e116e365ccc25884e09a2ebecf6141d385e3517437a20164699f8ea_prof);

    }

    // line 147
    public function block_footer($context, array $blocks = array())
    {
        $__internal_1d7b64b1296de7497483d758323ede5b5275091f10e0a9257b1f859fd11e2b0d = $this->env->getExtension("native_profiler");
        $__internal_1d7b64b1296de7497483d758323ede5b5275091f10e0a9257b1f859fd11e2b0d->enter($__internal_1d7b64b1296de7497483d758323ede5b5275091f10e0a9257b1f859fd11e2b0d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "footer"));

        // line 148
        echo "    <footer class=\"footer section db\">
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"col-md-3 col-sm-12\">
                    <div class=\"widget clearfix\">
                        <div class=\"widget-title\">
                            <h4>About Company</h4>
                        </div><!-- end widget-title -->
                        <div class=\"about-widget\">
                            <p>Hi there, welcome to the &copy;Convert Web Solutions INC. We are small group who design
                                beautiful website templates, creative mobile applications, graphics and more.</p>
                            <a href=\"#\" class=\"btn btn-primary\">Read More</a>
                        </div><!-- end about-widget -->
                    </div><!-- end widget -->
                </div><!-- end col -->

                <div class=\"col-md-2 col-sm-12\">
                    <div class=\"widget clearfix\">
                        <div class=\"widget-title\">
                            <h4>Site Info</h4>
                        </div><!-- end about -->
                        <div class=\"menu-widget\">
                            <ul class=\"check\">
                                <li><a href=\"#\">Welcome</a></li>
                                <li><a href=\"#\">Who We Are</a></li>
                                <li><a href=\"#\">Our Mission</a></li>
                                <li><a href=\"#\">Blog & News</a></li>
                                <li><a href=\"#\">Press Releases</a></li>
                            </ul><!-- end ul -->
                        </div><!-- end menu-widget -->
                    </div><!-- end widget -->
                </div><!-- end col -->

                <div class=\"col-md-2 col-sm-12\">
                    <div class=\"widget clearfix\">
                        <div class=\"widget-title\">
                            <h4>Partner</h4>
                        </div><!-- end about -->
                        <div class=\"menu-widget\">
                            <ul class=\"check\">
                                <li><a href=\"#\">Affiliate Program</a></li>
                                <li><a href=\"#\">Reseller Program</a></li>
                                <li><a href=\"#\">Developer Portal</a></li>
                                <li><a href=\"#\">Support Center</a></li>
                                <li><a href=\"#\">Customer Portal</a></li>
                                <li><a href=\"#\">Became a Client</a></li>
                            </ul><!-- end ul -->
                        </div><!-- end menu-widget -->
                    </div><!-- end widget -->
                </div><!-- end col -->

                <div class=\"col-md-2 col-sm-12\">
                    <div class=\"widget clearfix\">
                        <div class=\"widget-title\">
                            <h4>Be Social</h4>
                        </div><!-- end about -->
                        <div class=\"menu-widget\">
                            <ul class=\"social-widget\">
                                <li><a href=\"#\"><i class=\"fa fa-facebook\"></i> Facebook</a></li>
                                <li><a href=\"#\"><i class=\"fa fa-twitter\"></i> Twitter</a></li>
                                <li><a href=\"#\"><i class=\"fa fa-linkedin\"></i> Linkedin</a></li>
                                <li><a href=\"#\"><i class=\"fa fa-instagram\"></i> Instagram</a></li>
                                <li><a href=\"#\"><i class=\"fa fa-google-plus\"></i> Google Plus</a></li>
                            </ul><!-- end ul -->
                        </div><!-- end menu-widget -->
                    </div><!-- end widget -->
                </div><!-- end col -->

                <div class=\"col-md-3 col-sm-12 lastwidget\">
                    <div class=\"widget clearfix\">
                        <div class=\"widget-title\">
                            <h4>Email Newsletter</h4>
                        </div><!-- end about -->
                        <div class=\"newsletter-widget\">
                            <form>
                                <input type=\"text\" class=\"form-control input-lg\" placeholder=\"Your name\"/>
                                <input type=\"email\" class=\"form-control input-lg\" placeholder=\"Email\"/>
                                <button class=\"btn btn-primary\">Subscribe</button>
                            </form>
                        </div><!-- end newsletter -->
                    </div><!-- end widget -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </footer><!-- end footer -->
    <footer class=\"copyrights\">
        <div class=\"container\">
            <div class=\"row-center\">
                <div class=\"logo\">
                    <li class=\"megamenu\">
                        <a href=\"";
        // line 238
        echo $this->env->getExtension('routing')->getPath("homepage");
        echo "\">
                            <img alt=\"Megalifepro\" src=\"";
        // line 239
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/img/netviralpro-m.png"), "html", null, true);
        echo "\">
                        </a>
                    </li>
                </div>
            </div>

            <div class=\"row\">
                <div class=\"col-md-6 col-sm-12\">
                    <div class=\"copylinks\">
                        <ul class=\"list-inline\">
                            <li><a href=\"#\">Home</a></li>
                            <li><a href=\"#\">About</a></li>
                            <li><a href=\"#\">Contact</a></li>
                            <li><a href=\"#\">Terms of Usage</a></li>
                            <li><a href=\"#\">Trademark</a></li>
                            <li><a href=\"#\">License</a></li>
                        </ul><!-- end ul -->
                        <p>ProNET &copy; 2016</p>
                    </div><!-- end links -->
                </div><!-- end col -->

                <div class=\"col-md-6 col-sm-12\">
                    <div class=\"footer-social text-right\">
                        <a href=\"#\"><i class=\"fa fa-facebook\"></i></a>
                        <a href=\"#\"><i class=\"fa fa-twitter\"></i></a>
                        <a href=\"#\"><i class=\"fa fa-google-plus\"></i></a>
                        <a href=\"#\"><i class=\"fa fa-linkedin\"></i></a>
                        <a href=\"#\"><i class=\"fa fa-github\"></i></a>
                        <a class=\"dmtop\" href=\"#\"><i class=\"fa fa-arrow-up\"></i></a>
                    </div>
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </footer><!-- end copyrights -->

";
        
        $__internal_1d7b64b1296de7497483d758323ede5b5275091f10e0a9257b1f859fd11e2b0d->leave($__internal_1d7b64b1296de7497483d758323ede5b5275091f10e0a9257b1f859fd11e2b0d_prof);

    }

    // line 276
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_531bc3ae68663bbb619f982376647b733fc9e2f9086f8280225999c19a495f89 = $this->env->getExtension("native_profiler");
        $__internal_531bc3ae68663bbb619f982376647b733fc9e2f9086f8280225999c19a495f89->enter($__internal_531bc3ae68663bbb619f982376647b733fc9e2f9086f8280225999c19a495f89_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 277
        echo "    <script type=\"text/javascript\">
        \$(document).ready(function () {
            \$(\".signin\").click(function (e) {
                e.preventDefault();
                \$(\"fieldset#signin_menu\").toggle();
                \$(\".signin\").toggleClass(\"menu-open\");
                if (\$('.signin').hasClass('menu-open')) {
                    \$('.signin i.icon-angle-up').removeClass('icon-angle-up').addClass('icon-angle-down');
                } else {
                    \$('.signin i.icon-angle-down').removeClass('icon-angle-down').addClass('icon-angle-up');
                }
            });

            \$(\"fieldset#signin_menu\").mouseup(function () {
                return false
            });
            \$(document).mouseup(function (e) {
                if (\$(e.target).parent(\"a.signin\").length == 0) {
                    \$(\".signin\").removeClass(\"menu-open\");
                    \$(\"fieldset#signin_menu\").hide();
                    \$('.signin i.icon-angle-down').removeClass('icon-angle-down').addClass('icon-angle-up');
                }
            });

        });
    </script>
";
        
        $__internal_531bc3ae68663bbb619f982376647b733fc9e2f9086f8280225999c19a495f89->leave($__internal_531bc3ae68663bbb619f982376647b733fc9e2f9086f8280225999c19a495f89_prof);

    }

    public function getTemplateName()
    {
        return "FrontBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  421 => 277,  415 => 276,  372 => 239,  368 => 238,  276 => 148,  270 => 147,  259 => 145,  251 => 141,  239 => 140,  194 => 98,  189 => 96,  183 => 92,  175 => 87,  171 => 85,  168 => 84,  166 => 83,  149 => 69,  145 => 68,  141 => 67,  130 => 59,  86 => 18,  82 => 17,  73 => 10,  67 => 9,  57 => 6,  51 => 5,  40 => 3,  11 => 1,);
    }
}
