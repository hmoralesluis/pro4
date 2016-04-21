<?php

/* ::base-admin.html.twig */
class __TwigTemplate_27e3ad3d5cad6326f5a22bb6d6956f90db1b21779e3bc3336b13321e123600da extends Twig_Template
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
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/img/logo.png"), "html", null, true);
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
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "username", array()), "html", null, true);
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
                    <ul class=\"breadcrumb\"></ul>
                </div>
            </div>
            ";
        // line 82
        $this->displayBlock('content', $context, $blocks);
        // line 83
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
        // line 92
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/plugins/jquery-1.8.3.min.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
<script src=\"";
        // line 93
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js"), "html", null, true);
        echo "\"
        type=\"text/javascript\"></script>
<script src=\"";
        // line 95
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/plugins/bootstrap/js/bootstrap.min.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
<script src=\"";
        // line 96
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/plugins/breakpoints/breakpoints.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
<script src=\"";
        // line 97
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/plugins/jquery-slimscroll/jquery.slimscroll.min.js"), "html", null, true);
        echo "\"
        type=\"text/javascript\"></script>
<script src=\"";
        // line 99
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/plugins/jquery.blockui.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
<script src=\"";
        // line 100
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/plugins/jquery.cookie.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
<script src=\"";
        // line 101
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/plugins/uniform/jquery.uniform.min.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>

<script src=\"";
        // line 103
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/plugins/jquery.pulsate.min.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
<script src=\"";
        // line 104
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/plugins/gritter/js/jquery.gritter.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>

<script src=\"";
        // line 106
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/scripts/app.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
<script src=\"";
        // line 107
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
        // line 116
        $this->displayBlock('javascripts', $context, $blocks);
        // line 117
        echo "</body>
</html>
";
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        echo "Welcome!";
    }

    // line 19
    public function block_stylesheets($context, array $blocks = array())
    {
    }

    // line 33
    public function block_notifications($context, array $blocks = array())
    {
    }

    // line 68
    public function block_menu($context, array $blocks = array())
    {
    }

    // line 77
    public function block_description($context, array $blocks = array())
    {
        echo " ";
    }

    // line 82
    public function block_content($context, array $blocks = array())
    {
    }

    // line 116
    public function block_javascripts($context, array $blocks = array())
    {
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
        return array (  284 => 116,  279 => 82,  273 => 77,  268 => 68,  263 => 33,  258 => 19,  252 => 5,  246 => 117,  244 => 116,  232 => 107,  228 => 106,  223 => 104,  219 => 103,  214 => 101,  210 => 100,  206 => 99,  201 => 97,  197 => 96,  193 => 95,  188 => 93,  184 => 92,  173 => 83,  171 => 82,  163 => 77,  159 => 76,  150 => 69,  148 => 68,  123 => 46,  111 => 37,  107 => 36,  103 => 34,  101 => 33,  95 => 30,  89 => 27,  78 => 20,  76 => 19,  72 => 18,  68 => 17,  64 => 16,  60 => 15,  56 => 14,  52 => 13,  47 => 11,  42 => 9,  38 => 8,  32 => 5,  26 => 1,);
    }
}
