<?php

/* FrontBundle:Login:login.html.twig */
class __TwigTemplate_89dde4257581714f3fea97135ee84638b9d0f95d78df339e2a628bb78f3210fa extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("FrontBundle::layout.html.twig", "FrontBundle:Login:login.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'options' => array($this, 'block_options'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "FrontBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_e62acbb82ad484b0dd5658a4591bc66d5d174ab70004f24aa61376f31230f672 = $this->env->getExtension("native_profiler");
        $__internal_e62acbb82ad484b0dd5658a4591bc66d5d174ab70004f24aa61376f31230f672->enter($__internal_e62acbb82ad484b0dd5658a4591bc66d5d174ab70004f24aa61376f31230f672_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "FrontBundle:Login:login.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_e62acbb82ad484b0dd5658a4591bc66d5d174ab70004f24aa61376f31230f672->leave($__internal_e62acbb82ad484b0dd5658a4591bc66d5d174ab70004f24aa61376f31230f672_prof);

    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $__internal_5b0cd9b7b649788c91d066457c416d04767fdf1ad5edf0917524a6755ab008a0 = $this->env->getExtension("native_profiler");
        $__internal_5b0cd9b7b649788c91d066457c416d04767fdf1ad5edf0917524a6755ab008a0->enter($__internal_5b0cd9b7b649788c91d066457c416d04767fdf1ad5edf0917524a6755ab008a0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Login";
        
        $__internal_5b0cd9b7b649788c91d066457c416d04767fdf1ad5edf0917524a6755ab008a0->leave($__internal_5b0cd9b7b649788c91d066457c416d04767fdf1ad5edf0917524a6755ab008a0_prof);

    }

    // line 5
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_0830d3dfb5f9d40fb3667b4b4b92afbbb90df17ef17bb740b9728623258ce51e = $this->env->getExtension("native_profiler");
        $__internal_0830d3dfb5f9d40fb3667b4b4b92afbbb90df17ef17bb740b9728623258ce51e->enter($__internal_0830d3dfb5f9d40fb3667b4b4b92afbbb90df17ef17bb740b9728623258ce51e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 6
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/css/login.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
    <link href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/plugins/iCheck/square/blue.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
";
        
        $__internal_0830d3dfb5f9d40fb3667b4b4b92afbbb90df17ef17bb740b9728623258ce51e->leave($__internal_0830d3dfb5f9d40fb3667b4b4b92afbbb90df17ef17bb740b9728623258ce51e_prof);

    }

    // line 10
    public function block_options($context, array $blocks = array())
    {
        $__internal_bdc005d868f55f3381dea5b7b8c41ec3ddef1509d9f77993f8a83e33ab7c88c6 = $this->env->getExtension("native_profiler");
        $__internal_bdc005d868f55f3381dea5b7b8c41ec3ddef1509d9f77993f8a83e33ab7c88c6->enter($__internal_bdc005d868f55f3381dea5b7b8c41ec3ddef1509d9f77993f8a83e33ab7c88c6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "options"));

        // line 11
        echo "    <nav>
        <ul class=\"nav nav-pills nav-main\" id=\"mainMenu\">
            <li>
                <a href=\"";
        // line 14
        echo $this->env->getExtension('routing')->getPath("join");
        echo "\">Join Us</a>
            </li>
        </ul>
    </nav>
";
        
        $__internal_bdc005d868f55f3381dea5b7b8c41ec3ddef1509d9f77993f8a83e33ab7c88c6->leave($__internal_bdc005d868f55f3381dea5b7b8c41ec3ddef1509d9f77993f8a83e33ab7c88c6_prof);

    }

    // line 20
    public function block_body($context, array $blocks = array())
    {
        $__internal_cd1744f342be35f4e4e350817433ba77ed790c8a48b5dc73ff8c36f1dad97b0a = $this->env->getExtension("native_profiler");
        $__internal_cd1744f342be35f4e4e350817433ba77ed790c8a48b5dc73ff8c36f1dad97b0a->enter($__internal_cd1744f342be35f4e4e350817433ba77ed790c8a48b5dc73ff8c36f1dad97b0a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 21
        echo "    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-lg-12\">
                <h1 class=\"page-header\">Welcome to our Company
                    <small>Insert your credentils for a full access</small>
                </h1>
                <ol class=\"breadcrumb\">
                    <li><a href=\"";
        // line 28
        echo $this->env->getExtension('routing')->getPath("homepage");
        echo "\">Home</a></li>
                    <li class=\"active\">Login</li>
                </ol>
            </div>
        </div>

        <div class=\"row\">
            <div class=\"col-lg-12\">
                <div class=\"col-sm-12\">
                    <h4>Manage your Bussines</h4>

                    <p>Cookie jelly beans soufflé icing. Gummi bears tootsie roll powder chupa chups cheesecake
                        chocolate jelly-o lollipop lollipop. Halvah applicake chupa chups. Marshmallow chocolate jujubes
                        icing lollipop gummi bears chupa chups pudding bonbon. Jelly beans jelly soufflé jujubes.
                        <a href=\"#\"> read moore.</a></p>
                    <hr>
                </div>
                <div class=\"col-sm-4\">
                    <h4 class=\"text-center\">Mandatory fields</h4>
                    ";
        // line 47
        if ($this->getContext($context, "error")) {
            // line 48
            echo "                        <div class=\"alert alert-danger\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getAttribute($this->getContext($context, "error"), "messageKey", array()), $this->getAttribute($this->getContext($context, "error"), "messageData", array()), "security"), "html", null, true);
            echo "</div>
                    ";
        }
        // line 50
        echo "                    <form id=\"login_form\" class=\"form-signin\" method=\"POST\" action=\"";
        echo $this->env->getExtension('routing')->getPath("check_path");
        echo "\">
                        <h2 class=\"form-signin-heading\"></h2>

                        <div class=\"form-group has-feedback\">
                            <input type=\"text\" id=\"inputUsername\" name=\"_username\" value=\"";
        // line 54
        echo twig_escape_filter($this->env, $this->getContext($context, "last_username"), "html", null, true);
        echo "\"
                                   class=\"form-control\"
                                   placeholder=\"Username\" required>
                            <span class=\"glyphicon glyphicon-user form-control-feedback\"></span>
                        </div>
                        <div class=\"form-group has-feedback\">
                            <input type=\"password\" id=\"inputPassword\" name=\"_password\" class=\"form-control\"
                                   placeholder=\"Password\"
                                   required>
                            <span class=\"glyphicon glyphicon-lock form-control-feedback\"></span>
                        </div>

                        <div class=\"checkbox icheck\">
                            <label>
                                <input type=\"checkbox\" value=\"remember-me\"> Remember me
                            </label>
                        </div>
                        <button class=\"btn btn-block btn-primary btn-lg\" type=\"submit\">Sign in</button>
                    </form>
                </div>
                <div class=\"col-sm-8\">

                    <h4>Welcome to 'Modern Business'</h4>

                    <p>This is a great place to introduce your company or project and describe what you do. This about
                        page
                        features general company information, employee bios, and other helpful elements.</p>

                    <p>Lid est laborum dolo rumes fugats untras. Etharums ser quidem rerum facilis dolores nemis omnis
                        fugats vitaes nemo minima rerums unsers sadips amets.. Sed ut perspiciatis unde omnis iste natus
                        error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab
                        illo
                        inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam
                        voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores
                        eos
                        qui ratione voluptatem sequi nesciunt.</p>
                    <hr>
                    <div class=\"well\">
                        <h4>Popular Categories</h4>

                        <div class=\"row\">
                            <div class=\"col-lg-6\">
                                <p>Bootstrap's default well's work great for side widgets! What is a widget anyways...?.
                                    Lid est laborum dolo rumes fugats untras.</p>
                            </div>
                            <div class=\"col-lg-6\">
                                <p>Bootstrap's default well's work great for side widgets! What is a widget
                                    anyways...?. Lid est laborum dolo rumes fugats untras.<a href=\"#\"> read moore.</a></p> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
";
        
        $__internal_cd1744f342be35f4e4e350817433ba77ed790c8a48b5dc73ff8c36f1dad97b0a->leave($__internal_cd1744f342be35f4e4e350817433ba77ed790c8a48b5dc73ff8c36f1dad97b0a_prof);

    }

    // line 111
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_d0d365df071cef4904f150d51173edfa57c2372ef4ac47f39a7d372a61657723 = $this->env->getExtension("native_profiler");
        $__internal_d0d365df071cef4904f150d51173edfa57c2372ef4ac47f39a7d372a61657723->enter($__internal_d0d365df071cef4904f150d51173edfa57c2372ef4ac47f39a7d372a61657723_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 112
        echo "    <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/plugins/iCheck/icheck.min.js"), "html", null, true);
        echo "\"></script>
    <script>
        \$(function () {
            \$('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%'
            });
        });
    </script>
";
        
        $__internal_d0d365df071cef4904f150d51173edfa57c2372ef4ac47f39a7d372a61657723->leave($__internal_d0d365df071cef4904f150d51173edfa57c2372ef4ac47f39a7d372a61657723_prof);

    }

    public function getTemplateName()
    {
        return "FrontBundle:Login:login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  215 => 112,  209 => 111,  146 => 54,  138 => 50,  132 => 48,  130 => 47,  108 => 28,  99 => 21,  93 => 20,  81 => 14,  76 => 11,  70 => 10,  61 => 7,  56 => 6,  50 => 5,  38 => 3,  11 => 1,);
    }
}
