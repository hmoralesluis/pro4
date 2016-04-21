<?php

/* ::base-admin.html.twig */
class __TwigTemplate_91408dac046498141c06fd65e336bc8b6ac5851bce5a66f0ff7f59a3633e0005 extends Twig_Template
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
        $__internal_bb448d51351e8faa6656bfd0218f98352e5b084946028ac33b54302726823bf9 = $this->env->getExtension("native_profiler");
        $__internal_bb448d51351e8faa6656bfd0218f98352e5b084946028ac33b54302726823bf9->enter($__internal_bb448d51351e8faa6656bfd0218f98352e5b084946028ac33b54302726823bf9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "::base-admin.html.twig"));

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
        
        $__internal_bb448d51351e8faa6656bfd0218f98352e5b084946028ac33b54302726823bf9->leave($__internal_bb448d51351e8faa6656bfd0218f98352e5b084946028ac33b54302726823bf9_prof);

    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        $__internal_0cd9c2515124025b8bc6358160f33d6635da84662e10cd9929bd3846409079c3 = $this->env->getExtension("native_profiler");
        $__internal_0cd9c2515124025b8bc6358160f33d6635da84662e10cd9929bd3846409079c3->enter($__internal_0cd9c2515124025b8bc6358160f33d6635da84662e10cd9929bd3846409079c3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Welcome!";
        
        $__internal_0cd9c2515124025b8bc6358160f33d6635da84662e10cd9929bd3846409079c3->leave($__internal_0cd9c2515124025b8bc6358160f33d6635da84662e10cd9929bd3846409079c3_prof);

    }

    // line 19
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_56c78d384827d79ef2ee952866488bc80322d2be9bddd877a9026fd30ed12d6e = $this->env->getExtension("native_profiler");
        $__internal_56c78d384827d79ef2ee952866488bc80322d2be9bddd877a9026fd30ed12d6e->enter($__internal_56c78d384827d79ef2ee952866488bc80322d2be9bddd877a9026fd30ed12d6e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        
        $__internal_56c78d384827d79ef2ee952866488bc80322d2be9bddd877a9026fd30ed12d6e->leave($__internal_56c78d384827d79ef2ee952866488bc80322d2be9bddd877a9026fd30ed12d6e_prof);

    }

    // line 33
    public function block_notifications($context, array $blocks = array())
    {
        $__internal_0b403bb626f6633c9fe353b23cb4be8c0cdfcac64aed4b50ba9a761693e70b3a = $this->env->getExtension("native_profiler");
        $__internal_0b403bb626f6633c9fe353b23cb4be8c0cdfcac64aed4b50ba9a761693e70b3a->enter($__internal_0b403bb626f6633c9fe353b23cb4be8c0cdfcac64aed4b50ba9a761693e70b3a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "notifications"));

        
        $__internal_0b403bb626f6633c9fe353b23cb4be8c0cdfcac64aed4b50ba9a761693e70b3a->leave($__internal_0b403bb626f6633c9fe353b23cb4be8c0cdfcac64aed4b50ba9a761693e70b3a_prof);

    }

    // line 68
    public function block_menu($context, array $blocks = array())
    {
        $__internal_2ea421335b94cbfb62ebb3af08ff4afbbb5ad2b9fb0bc7a698ace9be238b3dc9 = $this->env->getExtension("native_profiler");
        $__internal_2ea421335b94cbfb62ebb3af08ff4afbbb5ad2b9fb0bc7a698ace9be238b3dc9->enter($__internal_2ea421335b94cbfb62ebb3af08ff4afbbb5ad2b9fb0bc7a698ace9be238b3dc9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        
        $__internal_2ea421335b94cbfb62ebb3af08ff4afbbb5ad2b9fb0bc7a698ace9be238b3dc9->leave($__internal_2ea421335b94cbfb62ebb3af08ff4afbbb5ad2b9fb0bc7a698ace9be238b3dc9_prof);

    }

    // line 77
    public function block_description($context, array $blocks = array())
    {
        $__internal_8bce1b121a57f0c77732835e0b7d9ea4ea0f40e36b24d0fc35ce438f19ff7221 = $this->env->getExtension("native_profiler");
        $__internal_8bce1b121a57f0c77732835e0b7d9ea4ea0f40e36b24d0fc35ce438f19ff7221->enter($__internal_8bce1b121a57f0c77732835e0b7d9ea4ea0f40e36b24d0fc35ce438f19ff7221_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "description"));

        echo " ";
        
        $__internal_8bce1b121a57f0c77732835e0b7d9ea4ea0f40e36b24d0fc35ce438f19ff7221->leave($__internal_8bce1b121a57f0c77732835e0b7d9ea4ea0f40e36b24d0fc35ce438f19ff7221_prof);

    }

    // line 82
    public function block_content($context, array $blocks = array())
    {
        $__internal_e6178018f9553ad2d34d7c92347b050e4107f01e87e813bb4b7233d75debe542 = $this->env->getExtension("native_profiler");
        $__internal_e6178018f9553ad2d34d7c92347b050e4107f01e87e813bb4b7233d75debe542->enter($__internal_e6178018f9553ad2d34d7c92347b050e4107f01e87e813bb4b7233d75debe542_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        
        $__internal_e6178018f9553ad2d34d7c92347b050e4107f01e87e813bb4b7233d75debe542->leave($__internal_e6178018f9553ad2d34d7c92347b050e4107f01e87e813bb4b7233d75debe542_prof);

    }

    // line 116
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_31d0bd4857e8eff66e44e247ff494de4abc756bc94cb46140f8c5242f80d010a = $this->env->getExtension("native_profiler");
        $__internal_31d0bd4857e8eff66e44e247ff494de4abc756bc94cb46140f8c5242f80d010a->enter($__internal_31d0bd4857e8eff66e44e247ff494de4abc756bc94cb46140f8c5242f80d010a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        
        $__internal_31d0bd4857e8eff66e44e247ff494de4abc756bc94cb46140f8c5242f80d010a->leave($__internal_31d0bd4857e8eff66e44e247ff494de4abc756bc94cb46140f8c5242f80d010a_prof);

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
        return array (  326 => 116,  315 => 82,  303 => 77,  292 => 68,  281 => 33,  270 => 19,  258 => 5,  249 => 117,  247 => 116,  235 => 107,  231 => 106,  226 => 104,  222 => 103,  217 => 101,  213 => 100,  209 => 99,  204 => 97,  200 => 96,  196 => 95,  191 => 93,  187 => 92,  176 => 83,  174 => 82,  166 => 77,  162 => 76,  153 => 69,  151 => 68,  126 => 46,  114 => 37,  110 => 36,  106 => 34,  104 => 33,  98 => 30,  92 => 27,  81 => 20,  79 => 19,  75 => 18,  71 => 17,  67 => 16,  63 => 15,  59 => 14,  55 => 13,  50 => 11,  45 => 9,  41 => 8,  35 => 5,  29 => 1,);
    }
}
