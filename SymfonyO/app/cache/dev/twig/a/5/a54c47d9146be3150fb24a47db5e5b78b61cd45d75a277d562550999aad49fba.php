<?php

/* FrontBundle::layout.html.twig */
class __TwigTemplate_a54c47d9146be3150fb24a47db5e5b78b61cd45d75a277d562550999aad49fba extends Twig_Template
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
        $__internal_56ef2adb003c95fed0a4151c9a2fa9614dcb061d71bdc506a3ce200d560dd29e = $this->env->getExtension("native_profiler");
        $__internal_56ef2adb003c95fed0a4151c9a2fa9614dcb061d71bdc506a3ce200d560dd29e->enter($__internal_56ef2adb003c95fed0a4151c9a2fa9614dcb061d71bdc506a3ce200d560dd29e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "FrontBundle::layout.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_56ef2adb003c95fed0a4151c9a2fa9614dcb061d71bdc506a3ce200d560dd29e->leave($__internal_56ef2adb003c95fed0a4151c9a2fa9614dcb061d71bdc506a3ce200d560dd29e_prof);

    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $__internal_a1a9ba13193575348b940c05c045a228b2b914027865fdd08f2cf55d4d2cd760 = $this->env->getExtension("native_profiler");
        $__internal_a1a9ba13193575348b940c05c045a228b2b914027865fdd08f2cf55d4d2cd760->enter($__internal_a1a9ba13193575348b940c05c045a228b2b914027865fdd08f2cf55d4d2cd760_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        
        $__internal_a1a9ba13193575348b940c05c045a228b2b914027865fdd08f2cf55d4d2cd760->leave($__internal_a1a9ba13193575348b940c05c045a228b2b914027865fdd08f2cf55d4d2cd760_prof);

    }

    // line 5
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_ffe1a35d5ecd64b14af6be8008e9c94f06c76c393f85d687e6549b867a77cbe7 = $this->env->getExtension("native_profiler");
        $__internal_ffe1a35d5ecd64b14af6be8008e9c94f06c76c393f85d687e6549b867a77cbe7->enter($__internal_ffe1a35d5ecd64b14af6be8008e9c94f06c76c393f85d687e6549b867a77cbe7_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        
        $__internal_ffe1a35d5ecd64b14af6be8008e9c94f06c76c393f85d687e6549b867a77cbe7->leave($__internal_ffe1a35d5ecd64b14af6be8008e9c94f06c76c393f85d687e6549b867a77cbe7_prof);

    }

    // line 7
    public function block_header($context, array $blocks = array())
    {
        $__internal_938ce1e8bda778941f3ccaffc6424e1243aeccafbf7e33cd24a63a070d2772e0 = $this->env->getExtension("native_profiler");
        $__internal_938ce1e8bda778941f3ccaffc6424e1243aeccafbf7e33cd24a63a070d2772e0->enter($__internal_938ce1e8bda778941f3ccaffc6424e1243aeccafbf7e33cd24a63a070d2772e0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "header"));

        // line 8
        echo "    <h1 class=\"logo\">
        <a href=\"";
        // line 9
        echo $this->env->getExtension('routing')->getPath("homepage");
        echo "\">
            <img alt=\"Porto\" src=\"";
        // line 10
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
        // line 25
        echo $this->env->getExtension('routing')->getPath("about");
        echo "\"><i class=\"icon-angle-right\"></i>About Us</a>
            </li>
            <li>
                <a href=\"";
        // line 28
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
        // line 45
        $this->displayBlock('options', $context, $blocks);
        
        $__internal_938ce1e8bda778941f3ccaffc6424e1243aeccafbf7e33cd24a63a070d2772e0->leave($__internal_938ce1e8bda778941f3ccaffc6424e1243aeccafbf7e33cd24a63a070d2772e0_prof);

    }

    public function block_options($context, array $blocks = array())
    {
        $__internal_92b6a6c5aa7b1ecb766bf17fb3f9cb067eb9a6574e328fad1a720b2b55d44599 = $this->env->getExtension("native_profiler");
        $__internal_92b6a6c5aa7b1ecb766bf17fb3f9cb067eb9a6574e328fad1a720b2b55d44599->enter($__internal_92b6a6c5aa7b1ecb766bf17fb3f9cb067eb9a6574e328fad1a720b2b55d44599_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "options"));

        
        $__internal_92b6a6c5aa7b1ecb766bf17fb3f9cb067eb9a6574e328fad1a720b2b55d44599->leave($__internal_92b6a6c5aa7b1ecb766bf17fb3f9cb067eb9a6574e328fad1a720b2b55d44599_prof);

    }

    // line 48
    public function block_body($context, array $blocks = array())
    {
        $__internal_5b55e0f334e377d38ed87caf7d6f51a0680cbd8d0ae26c0dc7750ca1dac90af1 = $this->env->getExtension("native_profiler");
        $__internal_5b55e0f334e377d38ed87caf7d6f51a0680cbd8d0ae26c0dc7750ca1dac90af1->enter($__internal_5b55e0f334e377d38ed87caf7d6f51a0680cbd8d0ae26c0dc7750ca1dac90af1_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_5b55e0f334e377d38ed87caf7d6f51a0680cbd8d0ae26c0dc7750ca1dac90af1->leave($__internal_5b55e0f334e377d38ed87caf7d6f51a0680cbd8d0ae26c0dc7750ca1dac90af1_prof);

    }

    // line 50
    public function block_footer($context, array $blocks = array())
    {
        $__internal_dcab2cfa2baec4e18914c16f06e60fd34fdbf82e21dd7892917fdaf8f20f18f1 = $this->env->getExtension("native_profiler");
        $__internal_dcab2cfa2baec4e18914c16f06e60fd34fdbf82e21dd7892917fdaf8f20f18f1->enter($__internal_dcab2cfa2baec4e18914c16f06e60fd34fdbf82e21dd7892917fdaf8f20f18f1_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "footer"));

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
        
        $__internal_dcab2cfa2baec4e18914c16f06e60fd34fdbf82e21dd7892917fdaf8f20f18f1->leave($__internal_dcab2cfa2baec4e18914c16f06e60fd34fdbf82e21dd7892917fdaf8f20f18f1_prof);

    }

    // line 142
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_a7bbcde62d4a4b428454c5db918d4ea823ba06621b3a70ace5dafc75833559d7 = $this->env->getExtension("native_profiler");
        $__internal_a7bbcde62d4a4b428454c5db918d4ea823ba06621b3a70ace5dafc75833559d7->enter($__internal_a7bbcde62d4a4b428454c5db918d4ea823ba06621b3a70ace5dafc75833559d7_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        
        $__internal_a7bbcde62d4a4b428454c5db918d4ea823ba06621b3a70ace5dafc75833559d7->leave($__internal_a7bbcde62d4a4b428454c5db918d4ea823ba06621b3a70ace5dafc75833559d7_prof);

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
        return array (  252 => 142,  225 => 121,  153 => 51,  147 => 50,  136 => 48,  119 => 45,  99 => 28,  93 => 25,  75 => 10,  71 => 9,  68 => 8,  62 => 7,  51 => 5,  40 => 3,  11 => 1,);
    }
}
