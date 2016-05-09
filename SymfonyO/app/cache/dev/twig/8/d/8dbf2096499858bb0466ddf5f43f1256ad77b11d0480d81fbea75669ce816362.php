<?php

/* ::base-admin.html.twig */
class __TwigTemplate_8dbf2096499858bb0466ddf5f43f1256ad77b11d0480d81fbea75669ce816362 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'notifications' => array($this, 'block_notifications'),
            'menu' => array($this, 'block_menu'),
            'description' => array($this, 'block_description'),
            'content' => array($this, 'block_content'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_4dd839168a98021619b8b686aba8196948202d3908325a64264957060cdc1f00 = $this->env->getExtension("native_profiler");
        $__internal_4dd839168a98021619b8b686aba8196948202d3908325a64264957060cdc1f00->enter($__internal_4dd839168a98021619b8b686aba8196948202d3908325a64264957060cdc1f00_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "::base-admin.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
<head>
    <meta charset=\"UTF-8\"/>
    <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
    <meta content=\"width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no\" name=\"viewport\">

    <link href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/plugins/bootstrap/css/bootstrap.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\"/>
    <link href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/plugins/bootstrap/css/bootstrap-responsive.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\"
          type=\"text/css\"/>
    <link href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/plugins/font-awesome/css/font-awesome.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\"
          type=\"text/css\"/>
    <link href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/css/style-metro.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\"/>
    <link href=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/css/style.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\"/>
    <link href=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/css/style-responsive.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\"/>
    <link href=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/css/themes/default.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" id=\"style_color\"/>
    <link href=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/plugins/uniform/css/uniform.default.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\"/>
    <link href=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/plugins/gritter/css/jquery.gritter.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\"/>
    ";
        // line 19
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 20
        echo "    <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\"/>
</head>
<body class=\"fixed-top\">
<div class=\"header navbar navbar-inverse navbar-fixed-top\">
    <div class=\"navbar-inner\">
        <div class=\"container-fluid\">
            <a class=\"brand\" href=\"#\">
                <img src=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/img/megalifepro.png"), "html", null, true);
        echo "\" alt=\"logo\"/>
            </a>
            <a href=\"#\" class=\"btn-navbar collapsed\" data-toggle=\"collapse\" data-target=\".nav-collapse\">
                <img src=\"";
        // line 30
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/img/menu-toggler.png"), "html", null, true);
        echo "\" alt=\"\"/>
            </a>
            <ul class=\"nav pull-right\">
                ";
        // line 33
        $this->displayBlock('notifications', $context, $blocks);
        // line 34
        echo "                <li class=\"dropdown user\">
                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
                        <img alt=\"\" src=\"";
        // line 36
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/img/avatar1_small.jpg"), "html", null, true);
        echo "\"/>
                        <span class=\"username\">";
        // line 37
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "user", array()), "username", array()), "html", null, true);
        echo "</span>
                        <i class=\"icon-angle-down\"></i>
                    </a>
                    <ul class=\"dropdown-menu\">
                        <li><a href=\"#\"><i class=\"icon-user\"></i> My Profile</a></li>
                        <li><a href=\"#\"><i class=\"icon-calendar\"></i> My Calendar</a></li>
                        <li><a href=\"#\"><i class=\"icon-envelope\"></i> My Inbox(3)</a></li>
                        <li><a href=\"#\"><i class=\"icon-tasks\"></i> My Tasks</a></li>
                        <li class=\"divider\"></li>
                        <li><a href=\"";
        // line 46
        echo $this->env->getExtension('routing')->getPath("logout");
        echo "\"><i class=\"icon-key\"></i> Log Out</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class=\"page-container\">
    <div class=\"page-sidebar nav-collapse collapse\">
        <ul>
            <li>
                <div class=\"sidebar-toggler hidden-phone\"></div>
            </li>
            <li>
                <form class=\"sidebar-search\">
                    <div class=\"input-box\">
                        <a href=\"javascript:;\" class=\"remove\"></a>
                        <input type=\"text\" placeholder=\"Search...\"/>
                        <input type=\"button\" class=\"submit\" value=\" \"/>
                    </div>
                </form>
            </li>
            ";
        // line 68
        $this->displayBlock('menu', $context, $blocks);
        // line 69
        echo "        </ul>
    </div>

    <div class=\"page-content\">
        <div class=\"container-fluid\">
            <div class=\"row-fluid\">
                <div class=\"span12\">
                    <h3 class=\"page-title\">";
        // line 76
        $this->displayBlock("title", $context, $blocks);
        echo "
                        <small>";
        // line 77
        $this->displayBlock('description', $context, $blocks);
        echo "</small>
                    </h3>
                </div>
            </div>
            <div class=\"row-fluid\">
                <div class=\"span3 responsive\" data-tablet=\"span6\" data-desktop=\"span3\">
                    <div class=\"dashboard-stat blue\">
                        <div class=\"visual\">
                            <i class=\"icon-user\"></i>
                        </div>
                        <div class=\"details\">
                            <div class=\"number\">
                                60
                            </div>
                            <div class=\"desc\">
                                New Users
                            </div>
                        </div>
                        <a class=\"more\" href=\"#\">
                            View more <i class=\"m-icon-swapright m-icon-white\"></i>
                        </a>
                    </div>
                </div>
                <div class=\"span3 responsive\" data-tablet=\"span6\" data-desktop=\"span3\">
                    <div class=\"dashboard-stat green\">
                        <div class=\"visual\">
                            <i class=\"icon-shopping-cart\"></i>
                        </div>
                        <div class=\"details\">
                            <div class=\"number\">43</div>
                            <div class=\"desc\">Product Sales</div>
                        </div>
                        <a class=\"more\" href=\"#\">
                            View more <i class=\"m-icon-swapright m-icon-white\"></i>
                        </a>
                    </div>
                </div>
                <div class=\"span3 responsive\" data-tablet=\"span6  fix-offset\" data-desktop=\"span3\">
                    <div class=\"dashboard-stat purple\">
                        <div class=\"visual\">
                            <i class=\"icon-money\"></i>
                        </div>
                        <div class=\"details\">
                            <div class=\"number\">\$168</div>
                            <div class=\"desc\">Earned Money</div>
                        </div>
                        <a class=\"more\" href=\"#\">
                            View more <i class=\"m-icon-swapright m-icon-white\"></i>
                        </a>
                    </div>
                </div>
                <div class=\"span3 responsive\" data-tablet=\"span6\" data-desktop=\"span3\">
                    <div class=\"dashboard-stat yellow\">
                        <div class=\"visual\">
                            <i class=\"icon-tags\"></i>
                        </div>
                        <div class=\"details\">
                            <div class=\"number\">68</div>
                            <div class=\"desc\">New Products</div>
                        </div>
                        <a class=\"more\" href=\"#\">
                            View more <i class=\"m-icon-swapright m-icon-white\"></i>
                        </a>
                    </div>
                </div>
            </div>
            ";
        // line 143
        $this->displayBlock('content', $context, $blocks);
        // line 144
        echo "        </div>
    </div>
</div>
<div class=\"footer\">
    2013 &copy; Metronic by keenthemes.
    <div class=\"span pull-right\">
        <span class=\"go-top\"><i class=\"icon-angle-up\"></i></span>
    </div>
</div>
<script src=\"";
        // line 153
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/plugins/jquery-1.8.3.min.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
<script src=\"";
        // line 154
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js"), "html", null, true);
        echo "\"
        type=\"text/javascript\"></script>
<script src=\"";
        // line 156
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/plugins/bootstrap/js/bootstrap.min.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
<script src=\"";
        // line 157
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/plugins/breakpoints/breakpoints.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
<script src=\"";
        // line 158
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/plugins/jquery-slimscroll/jquery.slimscroll.min.js"), "html", null, true);
        echo "\"
        type=\"text/javascript\"></script>
<script src=\"";
        // line 160
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/plugins/jquery.blockui.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
<script src=\"";
        // line 161
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/plugins/jquery.cookie.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
<script src=\"";
        // line 162
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/plugins/uniform/jquery.uniform.min.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>

<script src=\"";
        // line 164
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/plugins/jquery.pulsate.min.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
<script src=\"";
        // line 165
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/plugins/gritter/js/jquery.gritter.min.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>

<script src=\"";
        // line 167
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/scripts/app.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
<script src=\"";
        // line 168
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/scripts/codes.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
<script>
    jQuery(document).ready(function () {
        App.init();
        Codes.init();
        Codes.initOptions();
        Codes.initIntro();
    });
</script>
";
        // line 177
        $this->displayBlock('javascripts', $context, $blocks);
        // line 178
        echo "</body>
</html>
";
        
        $__internal_4dd839168a98021619b8b686aba8196948202d3908325a64264957060cdc1f00->leave($__internal_4dd839168a98021619b8b686aba8196948202d3908325a64264957060cdc1f00_prof);

    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        $__internal_3f503e54e58a774b0286540d0c41a0db1db34ea15dd56f94210573200cfc401e = $this->env->getExtension("native_profiler");
        $__internal_3f503e54e58a774b0286540d0c41a0db1db34ea15dd56f94210573200cfc401e->enter($__internal_3f503e54e58a774b0286540d0c41a0db1db34ea15dd56f94210573200cfc401e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Welcome!";
        
        $__internal_3f503e54e58a774b0286540d0c41a0db1db34ea15dd56f94210573200cfc401e->leave($__internal_3f503e54e58a774b0286540d0c41a0db1db34ea15dd56f94210573200cfc401e_prof);

    }

    // line 19
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_4b564041c78689444b18163645a516fd930f84f2cea8e607f44c6a828f9765c6 = $this->env->getExtension("native_profiler");
        $__internal_4b564041c78689444b18163645a516fd930f84f2cea8e607f44c6a828f9765c6->enter($__internal_4b564041c78689444b18163645a516fd930f84f2cea8e607f44c6a828f9765c6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        
        $__internal_4b564041c78689444b18163645a516fd930f84f2cea8e607f44c6a828f9765c6->leave($__internal_4b564041c78689444b18163645a516fd930f84f2cea8e607f44c6a828f9765c6_prof);

    }

    // line 33
    public function block_notifications($context, array $blocks = array())
    {
        $__internal_cb0e1816d080c06022dadcf54840685448d759e0600656c0127a1ef197217fb0 = $this->env->getExtension("native_profiler");
        $__internal_cb0e1816d080c06022dadcf54840685448d759e0600656c0127a1ef197217fb0->enter($__internal_cb0e1816d080c06022dadcf54840685448d759e0600656c0127a1ef197217fb0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "notifications"));

        
        $__internal_cb0e1816d080c06022dadcf54840685448d759e0600656c0127a1ef197217fb0->leave($__internal_cb0e1816d080c06022dadcf54840685448d759e0600656c0127a1ef197217fb0_prof);

    }

    // line 68
    public function block_menu($context, array $blocks = array())
    {
        $__internal_a6c3d00638368808844e87af79b9c6511393afe0817eef0c12ad4715f692fba0 = $this->env->getExtension("native_profiler");
        $__internal_a6c3d00638368808844e87af79b9c6511393afe0817eef0c12ad4715f692fba0->enter($__internal_a6c3d00638368808844e87af79b9c6511393afe0817eef0c12ad4715f692fba0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        
        $__internal_a6c3d00638368808844e87af79b9c6511393afe0817eef0c12ad4715f692fba0->leave($__internal_a6c3d00638368808844e87af79b9c6511393afe0817eef0c12ad4715f692fba0_prof);

    }

    // line 77
    public function block_description($context, array $blocks = array())
    {
        $__internal_b60a5bc588c51d7ea55bc946b43cfff84583df0eeed5ccf64fd3ccec4dfdeca0 = $this->env->getExtension("native_profiler");
        $__internal_b60a5bc588c51d7ea55bc946b43cfff84583df0eeed5ccf64fd3ccec4dfdeca0->enter($__internal_b60a5bc588c51d7ea55bc946b43cfff84583df0eeed5ccf64fd3ccec4dfdeca0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "description"));

        echo " ";
        
        $__internal_b60a5bc588c51d7ea55bc946b43cfff84583df0eeed5ccf64fd3ccec4dfdeca0->leave($__internal_b60a5bc588c51d7ea55bc946b43cfff84583df0eeed5ccf64fd3ccec4dfdeca0_prof);

    }

    // line 143
    public function block_content($context, array $blocks = array())
    {
        $__internal_48e0cb682668062122da8b5795bc8ba76b3ee0e55b773dd125d1380ca00b6afc = $this->env->getExtension("native_profiler");
        $__internal_48e0cb682668062122da8b5795bc8ba76b3ee0e55b773dd125d1380ca00b6afc->enter($__internal_48e0cb682668062122da8b5795bc8ba76b3ee0e55b773dd125d1380ca00b6afc_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        
        $__internal_48e0cb682668062122da8b5795bc8ba76b3ee0e55b773dd125d1380ca00b6afc->leave($__internal_48e0cb682668062122da8b5795bc8ba76b3ee0e55b773dd125d1380ca00b6afc_prof);

    }

    // line 177
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_c00e61c94c6baf2b525431cdebb32dbe1017e84df796a79c881bcdec3ebe6b11 = $this->env->getExtension("native_profiler");
        $__internal_c00e61c94c6baf2b525431cdebb32dbe1017e84df796a79c881bcdec3ebe6b11->enter($__internal_c00e61c94c6baf2b525431cdebb32dbe1017e84df796a79c881bcdec3ebe6b11_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        
        $__internal_c00e61c94c6baf2b525431cdebb32dbe1017e84df796a79c881bcdec3ebe6b11->leave($__internal_c00e61c94c6baf2b525431cdebb32dbe1017e84df796a79c881bcdec3ebe6b11_prof);

    }

    public function getTemplateName()
    {
        return "::base-admin.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  387 => 177,  376 => 143,  364 => 77,  353 => 68,  342 => 33,  331 => 19,  319 => 5,  310 => 178,  308 => 177,  296 => 168,  292 => 167,  287 => 165,  283 => 164,  278 => 162,  274 => 161,  270 => 160,  265 => 158,  261 => 157,  257 => 156,  252 => 154,  248 => 153,  237 => 144,  235 => 143,  166 => 77,  162 => 76,  153 => 69,  151 => 68,  126 => 46,  114 => 37,  110 => 36,  106 => 34,  104 => 33,  98 => 30,  92 => 27,  81 => 20,  79 => 19,  75 => 18,  71 => 17,  67 => 16,  63 => 15,  59 => 14,  55 => 13,  50 => 11,  45 => 9,  41 => 8,  35 => 5,  29 => 1,);
    }
}
