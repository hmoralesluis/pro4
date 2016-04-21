<?php

/* FrontBundle::layout.html.twig */
class __TwigTemplate_519c520bee69b0dd707f61d6fd6d738215d4ec7944c2213a7535400878bc6864 extends Twig_Template
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
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
    }

    // line 5
    public function block_stylesheets($context, array $blocks = array())
    {
    }

    // line 7
    public function block_header($context, array $blocks = array())
    {
        // line 8
        echo "    <h1 class=\"logo\">
        <a href=\"#\">
            <img alt=\"Porto\" src=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/img/logo.png"), "html", null, true);
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
                <a href=\"#\"><i class=\"icon-angle-right\"></i>About Us</a>
            </li>
            <li>
                <a href=\"#\"><i class=\"icon-angle-right\"></i>Contact Us</a>
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
        // line 45
        $this->displayBlock('options', $context, $blocks);
    }

    public function block_options($context, array $blocks = array())
    {
    }

    // line 48
    public function block_body($context, array $blocks = array())
    {
    }

    // line 50
    public function block_footer($context, array $blocks = array())
    {
        // line 51
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
        // line 121
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/img/logo-footer.png"), "html", null, true);
        echo "\">
                        </a>
                    </div>
                    <div class=\"span7\">
                        <p>© Copyright 2013 by Crivos. All Rights Reserved.</p>
                    </div>
                    <div class=\"span4\">
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
    }

    // line 142
    public function block_javascripts($context, array $blocks = array())
    {
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
        return array (  201 => 142,  177 => 121,  105 => 51,  102 => 50,  97 => 48,  89 => 45,  51 => 10,  47 => 8,  44 => 7,  39 => 5,  34 => 3,  11 => 1,);
    }
}
