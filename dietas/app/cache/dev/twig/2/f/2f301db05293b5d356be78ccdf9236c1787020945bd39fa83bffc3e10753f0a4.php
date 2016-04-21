<?php

/* FrontBundle:Join:join.html.twig */
class __TwigTemplate_2f301db05293b5d356be78ccdf9236c1787020945bd39fa83bffc3e10753f0a4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("FrontBundle::layout.html.twig", "FrontBundle:Join:join.html.twig", 1);
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
        $__internal_71d5278719b5091072700b1513df96c4579d5ed9df39d18d1466335b38dd0a6c = $this->env->getExtension("native_profiler");
        $__internal_71d5278719b5091072700b1513df96c4579d5ed9df39d18d1466335b38dd0a6c->enter($__internal_71d5278719b5091072700b1513df96c4579d5ed9df39d18d1466335b38dd0a6c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "FrontBundle:Join:join.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_71d5278719b5091072700b1513df96c4579d5ed9df39d18d1466335b38dd0a6c->leave($__internal_71d5278719b5091072700b1513df96c4579d5ed9df39d18d1466335b38dd0a6c_prof);

    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $__internal_1cf8f3a4361f7fdf13ec46435397ff43355ef487731667f5a9b89ac2dc53b7a1 = $this->env->getExtension("native_profiler");
        $__internal_1cf8f3a4361f7fdf13ec46435397ff43355ef487731667f5a9b89ac2dc53b7a1->enter($__internal_1cf8f3a4361f7fdf13ec46435397ff43355ef487731667f5a9b89ac2dc53b7a1_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Join Us";
        
        $__internal_1cf8f3a4361f7fdf13ec46435397ff43355ef487731667f5a9b89ac2dc53b7a1->leave($__internal_1cf8f3a4361f7fdf13ec46435397ff43355ef487731667f5a9b89ac2dc53b7a1_prof);

    }

    // line 5
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_784d4933d17cfe6c013548b9d08e8c7e96b75711936dbc3d1869c234bc8ff589 = $this->env->getExtension("native_profiler");
        $__internal_784d4933d17cfe6c013548b9d08e8c7e96b75711936dbc3d1869c234bc8ff589->enter($__internal_784d4933d17cfe6c013548b9d08e8c7e96b75711936dbc3d1869c234bc8ff589_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 6
        echo "    <link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/plugins/select2/select2.min.css"), "html", null, true);
        echo "\">
";
        
        $__internal_784d4933d17cfe6c013548b9d08e8c7e96b75711936dbc3d1869c234bc8ff589->leave($__internal_784d4933d17cfe6c013548b9d08e8c7e96b75711936dbc3d1869c234bc8ff589_prof);

    }

    // line 9
    public function block_options($context, array $blocks = array())
    {
        $__internal_1f45462bf9eec2bc9940ca82d67ec06c7fccbc575fa345ad8fb18cddc41c3644 = $this->env->getExtension("native_profiler");
        $__internal_1f45462bf9eec2bc9940ca82d67ec06c7fccbc575fa345ad8fb18cddc41c3644->enter($__internal_1f45462bf9eec2bc9940ca82d67ec06c7fccbc575fa345ad8fb18cddc41c3644_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "options"));

        // line 10
        echo "    <nav>
        <ul class=\"nav nav-pills nav-main\" id=\"mainMenu\">
            <li>
                <a href=\"";
        // line 13
        echo $this->env->getExtension('routing')->getPath("login");
        echo "\">Login</a>
            </li>
        </ul>
    </nav>
";
        
        $__internal_1f45462bf9eec2bc9940ca82d67ec06c7fccbc575fa345ad8fb18cddc41c3644->leave($__internal_1f45462bf9eec2bc9940ca82d67ec06c7fccbc575fa345ad8fb18cddc41c3644_prof);

    }

    // line 19
    public function block_body($context, array $blocks = array())
    {
        $__internal_3d84b80359a7309abf920e9d6a77b159be618b9a9bd7769110fba168d4c2e139 = $this->env->getExtension("native_profiler");
        $__internal_3d84b80359a7309abf920e9d6a77b159be618b9a9bd7769110fba168d4c2e139->enter($__internal_3d84b80359a7309abf920e9d6a77b159be618b9a9bd7769110fba168d4c2e139_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 20
        echo "    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-lg-12\">
                <h1 class=\"page-header\">Pricing Table
                    <small>Our Pricing Options</small>
                </h1>
                <ol class=\"breadcrumb\">
                    <li><a href=\"";
        // line 27
        echo $this->env->getExtension('routing')->getPath("homepage");
        echo "\">Home</a></li>
                    <li class=\"active\">Join us</li>
                </ol>
            </div>
        </div>

        <div class=\"row\">
            <div class=\"col-lg-12\">
                <div class=\"col-sm-12\">
                    <h4>Modules Feature</h4>

                    <p>Cookie jelly beans soufflé icing. Gummi bears tootsie roll powder chupa chups cheesecake
                        chocolate jelly-o lollipop lollipop. Halvah applicake chupa chups. Marshmallow chocolate jujubes
                        icing lollipop gummi bears chupa chups pudding bonbon. Jelly beans jelly soufflé jujubes.
                        <a href=\"#\"> read moore.</a></p>
                    <hr>
                </div>
                <div class=\"col-sm-4\">
                    <form role=\"form\">
                        <div class=\"form-group\">
                            <label for=\"name\">Name</label>
                            <input required class=\"form-control\" id=\"name\" name=\"name\"
                                   placeholder=\"Enter your name\">
                        </div>
                        <div class=\"form-group\">
                            <label for=\"lastname\">Last Name</label>
                            <input required class=\"form-control\" id=\"lastname\" name=\"lastname\"
                                   placeholder=\"Last name\">
                        </div>
                        <div class=\"form-group\">
                            <label for=\"password\">Password</label>
                            <input type=\"password\" required class=\"form-control\" id=\"password\" name=\"password\"
                                   placeholder=\"Password\">
                        </div>
                        <div class=\"form-group\">
                            <label for=\"email\">Email address</label>
                            <input type=\"email\" required class=\"form-control\" id=\"email\" name=\"email\"
                                   placeholder=\"Enter email\">
                        </div>
                        <div class=\"form-group\">
                            <label>Country</label>
                            <select class=\"form-control select2\" style=\"width: 100%;\"></select>
                        </div>
                    </form>
                </div>
                <div class=\"col-sm-4\">
                    <div class=\"panel panel-default text-center\">
                        <div class=\"panel-heading\">
                            <strong>Free Membership</strong>
                        </div>
                        <div class=\"panel-body\">
                            <h3 class=\"panel-title price\">\$0<span class=\"price-cents\">Free</span></h3>
                        </div>
                        <ul class=\"list-group\">
                            <li class=\"list-group-item\">5 Diets</li>
                            <li class=\"list-group-item\">5 Training Plans</li>
                            <li class=\"list-group-item\">Some Tips</li>
                            <li class=\"list-group-item\">Personal Page</li>
                            <li class=\"list-group-item\">Share in Social Networks</li>
                            <li class=\"list-group-item\"><button class=\"btn btn-primary\">Sign Up Now!</button></li>
                        </ul>
                    </div>
                    <hr>
                    <h4>Membership Feature</h4>

                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc placerat diam quis nisl vestibulum
                        dignissim. In hac habitasse platea dictumst. Interdum et malesuada fames ac ante ipsum primis in
                        faucibus. <a href=\"#\"> read moore.</a></p>
                </div>
                <div class=\"col-sm-4\">
                    <div class=\"panel panel-default text-center\">
                        <div class=\"panel-heading\">
                            <strong>Payment Membership <span class=\"label label-success\">Best offert</span></strong>
                        </div>
                        <div class=\"panel-body\">
                            <h3 class=\"panel-title price\">\$9<span class=\"price-cents\">99</span><span
                                        class=\"price-month\">mo.</span>
                            </h3>
                        </div>
                        <ul class=\"list-group\">
                            <li class=\"list-group-item\">10 Diets</li>
                            <li class=\"list-group-item\">10 Training Plans</li>
                            <li class=\"list-group-item\">Some Tips</li>
                            <li class=\"list-group-item\">Personal Page</li>
                            <li class=\"list-group-item\">Calculator for body width</li>
                            <li class=\"list-group-item\"><button class=\"btn btn-primary\">Sign Up Now!</button></li>
                        </ul>
                    </div>
                    <hr>
                    <h4>Membership Feature</h4>

                    <p>Tilefish electric knifefish salmon shark southern Dolly Varden. Pacific argentine tope golden
                        shiner ilisha barreleye loosejaw catla, dogteeth tetra catfish tenpounder nase scup Ragfish
                        brotula. <a href=\"#\"> read moore.</a></p>
                </div>
            </div>
        </div>
    </div>
";
        
        $__internal_3d84b80359a7309abf920e9d6a77b159be618b9a9bd7769110fba168d4c2e139->leave($__internal_3d84b80359a7309abf920e9d6a77b159be618b9a9bd7769110fba168d4c2e139_prof);

    }

    // line 127
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_5280f2ae89907c35a4c71bdebde2dbaf15b14004194b8de1254d7007a3cb2bc9 = $this->env->getExtension("native_profiler");
        $__internal_5280f2ae89907c35a4c71bdebde2dbaf15b14004194b8de1254d7007a3cb2bc9->enter($__internal_5280f2ae89907c35a4c71bdebde2dbaf15b14004194b8de1254d7007a3cb2bc9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 128
        echo "    <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/plugins/select2/select2.full.min.js"), "html", null, true);
        echo "\"></script>
    <script>
        \$(function () {
            \$(\".select2\").select2();
        });
    </script>
";
        
        $__internal_5280f2ae89907c35a4c71bdebde2dbaf15b14004194b8de1254d7007a3cb2bc9->leave($__internal_5280f2ae89907c35a4c71bdebde2dbaf15b14004194b8de1254d7007a3cb2bc9_prof);

    }

    public function getTemplateName()
    {
        return "FrontBundle:Join:join.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  216 => 128,  210 => 127,  104 => 27,  95 => 20,  89 => 19,  77 => 13,  72 => 10,  66 => 9,  56 => 6,  50 => 5,  38 => 3,  11 => 1,);
    }
}
