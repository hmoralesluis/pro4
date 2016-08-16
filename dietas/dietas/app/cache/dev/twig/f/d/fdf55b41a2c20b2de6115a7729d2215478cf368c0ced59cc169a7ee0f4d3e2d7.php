<?php

/* FrontBundle::layout.html.twig */
class __TwigTemplate_fdf55b41a2c20b2de6115a7729d2215478cf368c0ced59cc169a7ee0f4d3e2d7 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::base-front.html.twig", "FrontBundle::layout.html.twig", 1);
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
        return "::base-front.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_5498adf1a30b0ce94abd7017dda7dba33f49759de5d4982d568f26cbe805c60c = $this->env->getExtension("native_profiler");
        $__internal_5498adf1a30b0ce94abd7017dda7dba33f49759de5d4982d568f26cbe805c60c->enter($__internal_5498adf1a30b0ce94abd7017dda7dba33f49759de5d4982d568f26cbe805c60c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "FrontBundle::layout.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_5498adf1a30b0ce94abd7017dda7dba33f49759de5d4982d568f26cbe805c60c->leave($__internal_5498adf1a30b0ce94abd7017dda7dba33f49759de5d4982d568f26cbe805c60c_prof);

    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $__internal_e8b05f0b1be3f80eb91ac659bbf6c49dd42436caff691ad61541bae81eb5f294 = $this->env->getExtension("native_profiler");
        $__internal_e8b05f0b1be3f80eb91ac659bbf6c49dd42436caff691ad61541bae81eb5f294->enter($__internal_e8b05f0b1be3f80eb91ac659bbf6c49dd42436caff691ad61541bae81eb5f294_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        
        $__internal_e8b05f0b1be3f80eb91ac659bbf6c49dd42436caff691ad61541bae81eb5f294->leave($__internal_e8b05f0b1be3f80eb91ac659bbf6c49dd42436caff691ad61541bae81eb5f294_prof);

    }

    // line 5
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_38a659ffce70b9377775cdc2cdd64597e4ce602b7be334296b27768a8c84974b = $this->env->getExtension("native_profiler");
        $__internal_38a659ffce70b9377775cdc2cdd64597e4ce602b7be334296b27768a8c84974b->enter($__internal_38a659ffce70b9377775cdc2cdd64597e4ce602b7be334296b27768a8c84974b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 6
        echo "    <link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/css/login.css"), "html", null, true);
        echo "\"/>
";
        
        $__internal_38a659ffce70b9377775cdc2cdd64597e4ce602b7be334296b27768a8c84974b->leave($__internal_38a659ffce70b9377775cdc2cdd64597e4ce602b7be334296b27768a8c84974b_prof);

    }

    // line 9
    public function block_header($context, array $blocks = array())
    {
        $__internal_fba128426159715dd6baaaf1e109c5f58bf88f300994e43f005da1ae22646749 = $this->env->getExtension("native_profiler");
        $__internal_fba128426159715dd6baaaf1e109c5f58bf88f300994e43f005da1ae22646749->enter($__internal_fba128426159715dd6baaaf1e109c5f58bf88f300994e43f005da1ae22646749_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "header"));

        // line 10
        echo "    <h1 class=\"logo\">
        <a href=\"";
        // line 11
        echo $this->env->getExtension('routing')->getPath("homepage");
        echo "\">
            <img alt=\"Megalifepro\" src=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/img/megalifepro.png"), "html", null, true);
        echo "\">
        </a>
    </h1>

    <div class=\"search\">
        <form class=\"form-search\" id=\"searchForm\" action=\"\" method=\"get\">
            <div class=\"control-group\">
                <input type=\"text\" class=\"input-medium search-query\" name=\"q\" id=\"q\" placeholder=\"Search...\">
                <button class=\"search\" type=\"submit\"><i class=\"icon-search\"></i></button>
            </div>
        </form>
    </div>
    <nav>
        <ul class=\"nav nav-pills nav-top\">
            <li>
                <a href=\"";
        // line 27
        echo $this->env->getExtension('routing')->getPath("about");
        echo "\"><i class=\"icon-angle-right\"></i>About Us</a>
            </li>
            <li>
                <a href=\"";
        // line 30
        echo $this->env->getExtension('routing')->getPath("contact");
        echo "\"><i class=\"icon-angle-right\"></i>Contact Us</a>
            </li>
            <li class=\"phone\">
                <span><i class=\"icon-phone\"></i>(123) 456-7890</span>
            </li>
        </ul>
    </nav>
    <div class=\"social-icons\">
        <ul class=\"social-icons\">
            <li class=\"facebook\"><a href=\"http://www.facebook.com/\" target=\"_blank\"
                                    title=\"Facebook\">Facebook</a></li>
            <li class=\"twitter\"><a href=\"http://www.twitter.com/\" target=\"_blank\" title=\"Twitter\">Twitter</a>
            </li>
            <li class=\"linkedin\"><a href=\"http://www.linkedin.com/\" target=\"_blank\"
                                    title=\"Linkedin\">Linkedin</a></li>
        </ul>
    </div>
    ";
        // line 47
        $this->displayBlock('options', $context, $blocks);
        
        $__internal_fba128426159715dd6baaaf1e109c5f58bf88f300994e43f005da1ae22646749->leave($__internal_fba128426159715dd6baaaf1e109c5f58bf88f300994e43f005da1ae22646749_prof);

    }

    public function block_options($context, array $blocks = array())
    {
        $__internal_01cbfc4356210c7db3e99db08a8baa4cf777637601194755aa9f83c6838dc6b4 = $this->env->getExtension("native_profiler");
        $__internal_01cbfc4356210c7db3e99db08a8baa4cf777637601194755aa9f83c6838dc6b4->enter($__internal_01cbfc4356210c7db3e99db08a8baa4cf777637601194755aa9f83c6838dc6b4_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "options"));

        // line 48
        echo "        <nav>
            <ul class=\"nav nav-pills nav-main\" id=\"mainMenu\">
                <li class=\"active\">
                    <a href=\"#\" class=\"signin\"><span>Login </span><i class=\"icon-angle-up\"></i></a>
                    <fieldset id=\"signin_menu\">
                        <form method=\"post\" id=\"signin\" action=\"";
        // line 53
        echo $this->env->getExtension('routing')->getPath("check_path");
        echo "\">
                            <input id=\"username\" name=\"_username\"
                                   value=\"";
        // line 55
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array(), "any", false, true), "get", array(0 => "lastUsername"), "method", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array(), "any", false, true), "get", array(0 => "lastUsername"), "method"), "")) : ("")), "html", null, true);
        echo "\" title=\"username\"
                                   placeholder=\"Username\" tabindex=\"4\" type=\"text\">
                            </p>
                            <p>
                                <input id=\"password\" name=\"_password\" value=\"\" title=\"password\" tabindex=\"5\"
                                       placeholder=\"Password\" type=\"password\">
                            </p>

                            <p class=\"remember\">
                                <a class=\"btn btn-flat btn-mini btn-primary\" href=\"javascript:\$('#signin').submit()\">Sign
                                    in</a>
                                <input id=\"remember\" name=\"remember_me\" value=\"1\" tabindex=\"7\" type=\"checkbox\">
                                <label for=\"remember\">Remember me</label>
                            </p>

                            <p class=\"forgot\"><a href=\"#\" id=\"resend_password_link\">Forgot your password?</a></p>

                            <p class=\"forgot-username\"><a rel=\"tooltip\"
                                                          title=\"If you remember your password, try logging in with your email\"
                                                          href=\"#\">Forgot your username?</a></p>
                        </form>
                    </fieldset>
                </li>
                <li>
                    <a href=\"";
        // line 79
        echo $this->env->getExtension('routing')->getPath("join");
        echo "\">Join Us</a>
                </li>
            </ul>
        </nav>
    ";
        
        $__internal_01cbfc4356210c7db3e99db08a8baa4cf777637601194755aa9f83c6838dc6b4->leave($__internal_01cbfc4356210c7db3e99db08a8baa4cf777637601194755aa9f83c6838dc6b4_prof);

    }

    // line 86
    public function block_body($context, array $blocks = array())
    {
        $__internal_6f8d03008e27c7056c22f44939b4ba13f5680d13f5d0d0ff06dd08040b4db5fe = $this->env->getExtension("native_profiler");
        $__internal_6f8d03008e27c7056c22f44939b4ba13f5680d13f5d0d0ff06dd08040b4db5fe->enter($__internal_6f8d03008e27c7056c22f44939b4ba13f5680d13f5d0d0ff06dd08040b4db5fe_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_6f8d03008e27c7056c22f44939b4ba13f5680d13f5d0d0ff06dd08040b4db5fe->leave($__internal_6f8d03008e27c7056c22f44939b4ba13f5680d13f5d0d0ff06dd08040b4db5fe_prof);

    }

    // line 88
    public function block_footer($context, array $blocks = array())
    {
        $__internal_aad928a0028b7d9d5ac2463452579fd6f567fe06c34fe8b018de76c4d1328033 = $this->env->getExtension("native_profiler");
        $__internal_aad928a0028b7d9d5ac2463452579fd6f567fe06c34fe8b018de76c4d1328033->enter($__internal_aad928a0028b7d9d5ac2463452579fd6f567fe06c34fe8b018de76c4d1328033_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "footer"));

        // line 89
        echo "    <footer>
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"footer-ribon\">
                    <span>Get in Touch</span>
                </div>
                <div class=\"span3\">
                    <h4>Newsletter</h4>

                    <p>Keep up on our always evolving product features and technology. Enter your e-mail and subscribe
                        to our newsletter.</p>

                    <div class=\"alert alert-success hidden\" id=\"newsletterSuccess\">
                        <strong>Success!</strong> You've been added to our email list.
                    </div>

                    <div class=\"alert alert-error hidden\" id=\"newsletterError\"></div>

                    <form class=\"form-inline\" id=\"newsletterForm\" action=\"\" method=\"POST\">
                        <div class=\"control-group\">
                            <div class=\"input-append\">
                                <input class=\"span2\" placeholder=\"Email Address\" name=\"email\" id=\"email\" type=\"text\">
                                <button class=\"btn\" type=\"submit\">Go!</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class=\"span3\">
                    <h4>Latest Tweet</h4>

                    <div id=\"tweet\" class=\"twitter\">
                        <p>Please wait...</p>
                    </div>
                </div>
                <div class=\"span4\">
                    <div class=\"contact-details\">
                        <h4>Contact Us</h4>
                        <ul class=\"contact\">
                            <li><p><i class=\"icon-map-marker\"></i> <strong>Address:</strong> 1234 Street Name, City
                                    Name, United States</p></li>
                            <li><p><i class=\"icon-phone\"></i> <strong>Phone:</strong> (123) 456-7890</p></li>
                            <li><p><i class=\"icon-envelope\"></i> <strong>Email:</strong> <a
                                            href=\"mailto:mail@example.com\">mail@example.com</a></p></li>
                        </ul>
                    </div>
                </div>
                <div class=\"span2\">
                    <h4>Follow Us</h4>

                    <div class=\"social-icons\">
                        <ul class=\"social-icons\">
                            <li class=\"facebook\"><a href=\"http://www.facebook.com/\" target=\"_blank\"
                                                    data-placement=\"bottom\" rel=\"tooltip\" title=\"Facebook\">Facebook</a>
                            </li>
                            <li class=\"twitter\"><a href=\"http://www.twitter.com/\" target=\"_blank\"
                                                   data-placement=\"bottom\" rel=\"tooltip\" title=\"Twitter\">Twitter</a>
                            </li>
                            <li class=\"linkedin\"><a href=\"http://www.linkedin.com/\" target=\"_blank\"
                                                    data-placement=\"bottom\" rel=\"tooltip\" title=\"Linkedin\">Linkedin</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class=\"footer-copyright\">
            <div class=\"container\">
                <div class=\"row\">
                    <div class=\"span1\">
                        <a href=\"#\" class=\"logo\">
                            <img alt=\"Porto Website Template\" src=\"";
        // line 159
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/img/logo-footer.png"), "html", null, true);
        echo "\">
                        </a>
                    </div>
                    <div class=\"";
        // line 162
        if (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "get", array(0 => "affiliate"), "method") != "")) {
            echo "span4";
        } else {
            echo "span7";
        }
        echo "\">
                        <p>© Copyright 2013 by Crivos. All Rights Reserved.</p>
                    </div>
                    ";
        // line 165
        if (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "get", array(0 => "affiliate"), "method") != "")) {
            // line 166
            echo "                        <div class=\"span3\">
                            <p>Referring affiliate: ";
            // line 167
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "get", array(0 => "affiliate"), "method"), "html", null, true);
            echo "</p>
                        </div>
                    ";
        }
        // line 170
        echo "                    <div class=\"span4\">
                        <nav id=\"sub-menu\">
                            <ul>
                                <li><a href=\"#\">FAQ's</a></li>
                                <li><a href=\"#\">Sitemap</a></li>
                                <li><a href=\"#\">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </footer>
";
        
        $__internal_aad928a0028b7d9d5ac2463452579fd6f567fe06c34fe8b018de76c4d1328033->leave($__internal_aad928a0028b7d9d5ac2463452579fd6f567fe06c34fe8b018de76c4d1328033_prof);

    }

    // line 185
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_62431b4e78ca83c0971a2538475c5059b9a93463d091ad54c36ae90048fb1a88 = $this->env->getExtension("native_profiler");
        $__internal_62431b4e78ca83c0971a2538475c5059b9a93463d091ad54c36ae90048fb1a88->enter($__internal_62431b4e78ca83c0971a2538475c5059b9a93463d091ad54c36ae90048fb1a88_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        
        $__internal_62431b4e78ca83c0971a2538475c5059b9a93463d091ad54c36ae90048fb1a88->leave($__internal_62431b4e78ca83c0971a2538475c5059b9a93463d091ad54c36ae90048fb1a88_prof);

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
        return array (  323 => 185,  303 => 170,  297 => 167,  294 => 166,  292 => 165,  282 => 162,  276 => 159,  204 => 89,  198 => 88,  187 => 86,  175 => 79,  148 => 55,  143 => 53,  136 => 48,  124 => 47,  104 => 30,  98 => 27,  80 => 12,  76 => 11,  73 => 10,  67 => 9,  57 => 6,  51 => 5,  40 => 3,  11 => 1,);
    }
}
