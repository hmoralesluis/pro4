<?php

/* FrontBundle::layout.html.twig */
class __TwigTemplate_2281e39111ef9d957ccd9ed19512dd498a013d8fd8a4fe35f16469f1c73874e8 extends Twig_Template
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
        $__internal_06e7e6d42cc9a701a3a569459188837ec96815b8af0328d6e5fcc7f832d24d2e = $this->env->getExtension("native_profiler");
        $__internal_06e7e6d42cc9a701a3a569459188837ec96815b8af0328d6e5fcc7f832d24d2e->enter($__internal_06e7e6d42cc9a701a3a569459188837ec96815b8af0328d6e5fcc7f832d24d2e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "FrontBundle::layout.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_06e7e6d42cc9a701a3a569459188837ec96815b8af0328d6e5fcc7f832d24d2e->leave($__internal_06e7e6d42cc9a701a3a569459188837ec96815b8af0328d6e5fcc7f832d24d2e_prof);

    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $__internal_09fdcb8a030284df332129676407d13e35eff652c383e9eafacf40619344f559 = $this->env->getExtension("native_profiler");
        $__internal_09fdcb8a030284df332129676407d13e35eff652c383e9eafacf40619344f559->enter($__internal_09fdcb8a030284df332129676407d13e35eff652c383e9eafacf40619344f559_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        
        $__internal_09fdcb8a030284df332129676407d13e35eff652c383e9eafacf40619344f559->leave($__internal_09fdcb8a030284df332129676407d13e35eff652c383e9eafacf40619344f559_prof);

    }

    // line 5
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_0a3bf8a12c10fff1f839e0ec3b7c5eb0e62349d96dc0108abe3074827f3a9cba = $this->env->getExtension("native_profiler");
        $__internal_0a3bf8a12c10fff1f839e0ec3b7c5eb0e62349d96dc0108abe3074827f3a9cba->enter($__internal_0a3bf8a12c10fff1f839e0ec3b7c5eb0e62349d96dc0108abe3074827f3a9cba_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        
        $__internal_0a3bf8a12c10fff1f839e0ec3b7c5eb0e62349d96dc0108abe3074827f3a9cba->leave($__internal_0a3bf8a12c10fff1f839e0ec3b7c5eb0e62349d96dc0108abe3074827f3a9cba_prof);

    }

    // line 7
    public function block_header($context, array $blocks = array())
    {
        $__internal_0fb66175817105ea04656864ee0db8ba3d41c65ac2baacb02208e9a58ceab465 = $this->env->getExtension("native_profiler");
        $__internal_0fb66175817105ea04656864ee0db8ba3d41c65ac2baacb02208e9a58ceab465->enter($__internal_0fb66175817105ea04656864ee0db8ba3d41c65ac2baacb02208e9a58ceab465_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "header"));

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
        
        $__internal_0fb66175817105ea04656864ee0db8ba3d41c65ac2baacb02208e9a58ceab465->leave($__internal_0fb66175817105ea04656864ee0db8ba3d41c65ac2baacb02208e9a58ceab465_prof);

    }

    public function block_options($context, array $blocks = array())
    {
        $__internal_f22eacf03d29ba9bed853ba462eb4496979b21301b800d3d846fdaea01a39260 = $this->env->getExtension("native_profiler");
        $__internal_f22eacf03d29ba9bed853ba462eb4496979b21301b800d3d846fdaea01a39260->enter($__internal_f22eacf03d29ba9bed853ba462eb4496979b21301b800d3d846fdaea01a39260_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "options"));

        
        $__internal_f22eacf03d29ba9bed853ba462eb4496979b21301b800d3d846fdaea01a39260->leave($__internal_f22eacf03d29ba9bed853ba462eb4496979b21301b800d3d846fdaea01a39260_prof);

    }

    // line 48
    public function block_body($context, array $blocks = array())
    {
        $__internal_5a1c61c72a325db832e079c4719c38f9c5661d1d7916854654e63b3030d63adf = $this->env->getExtension("native_profiler");
        $__internal_5a1c61c72a325db832e079c4719c38f9c5661d1d7916854654e63b3030d63adf->enter($__internal_5a1c61c72a325db832e079c4719c38f9c5661d1d7916854654e63b3030d63adf_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_5a1c61c72a325db832e079c4719c38f9c5661d1d7916854654e63b3030d63adf->leave($__internal_5a1c61c72a325db832e079c4719c38f9c5661d1d7916854654e63b3030d63adf_prof);

    }

    // line 50
    public function block_footer($context, array $blocks = array())
    {
        $__internal_35191d7d523648749caa5838baad77a3ae8d652cb00c14e2ff2c89d94d5fdf91 = $this->env->getExtension("native_profiler");
        $__internal_35191d7d523648749caa5838baad77a3ae8d652cb00c14e2ff2c89d94d5fdf91->enter($__internal_35191d7d523648749caa5838baad77a3ae8d652cb00c14e2ff2c89d94d5fdf91_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "footer"));

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
        
        $__internal_35191d7d523648749caa5838baad77a3ae8d652cb00c14e2ff2c89d94d5fdf91->leave($__internal_35191d7d523648749caa5838baad77a3ae8d652cb00c14e2ff2c89d94d5fdf91_prof);

    }

    // line 142
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_8ebba20f5645eb971705e0a4684bd30944d575bf8dd2c9857fdf72be64b843f8 = $this->env->getExtension("native_profiler");
        $__internal_8ebba20f5645eb971705e0a4684bd30944d575bf8dd2c9857fdf72be64b843f8->enter($__internal_8ebba20f5645eb971705e0a4684bd30944d575bf8dd2c9857fdf72be64b843f8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        
        $__internal_8ebba20f5645eb971705e0a4684bd30944d575bf8dd2c9857fdf72be64b843f8->leave($__internal_8ebba20f5645eb971705e0a4684bd30944d575bf8dd2c9857fdf72be64b843f8_prof);

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
        return array (  243 => 142,  216 => 121,  144 => 51,  138 => 50,  127 => 48,  110 => 45,  72 => 10,  68 => 8,  62 => 7,  51 => 5,  40 => 3,  11 => 1,);
    }
}
