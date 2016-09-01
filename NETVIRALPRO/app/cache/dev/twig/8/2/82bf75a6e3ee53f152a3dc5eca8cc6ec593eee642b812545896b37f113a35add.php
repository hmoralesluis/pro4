<?php

/* ::base-front-convert.html.twig */
class __TwigTemplate_82bf75a6e3ee53f152a3dc5eca8cc6ec593eee642b812545896b37f113a35add extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

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

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_194661c34b581cda42494f993ea27a5e1b84b4a0c1a830f3585dbbb342a36354 = $this->env->getExtension("native_profiler");
        $__internal_194661c34b581cda42494f993ea27a5e1b84b4a0c1a830f3585dbbb342a36354->enter($__internal_194661c34b581cda42494f993ea27a5e1b84b4a0c1a830f3585dbbb342a36354_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "::base-front-convert.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
<head>

    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, maximum-scale=1\">
    <meta name=\"description\" content=\"\">
    <meta name=\"author\" content=\"\">
    <meta name=\"keywords\" content=\"\">
    <!-- SITE META -->

    <title>";
        // line 13
        $this->displayBlock('title', $context, $blocks);
        echo "</title>

    <!-- FAVICONS -->
    <link rel=\"shortcut icon\" href=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/images/favicon.ico"), "html", null, true);
        echo "\" type=\"image/x-icon\">
    <link rel=\"apple-touch-icon\" href=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/images/apple-touch-icon.png"), "html", null, true);
        echo "\">
    <link rel=\"apple-touch-icon\" sizes=\"57x57\" href=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/images/apple-touch-icon-57x57.png"), "html", null, true);
        echo "\">
    <link rel=\"apple-touch-icon\" sizes=\"72x72\" href=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/images/apple-touch-icon-72x72.png"), "html", null, true);
        echo "\">
    <link rel=\"apple-touch-icon\" sizes=\"76x76\" href=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/images/apple-touch-icon-76x76.png"), "html", null, true);
        echo "\">
    <link rel=\"apple-touch-icon\" sizes=\"114x114\" href=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/images/apple-touch-icon-114x114.png"), "html", null, true);
        echo "\">
    <link rel=\"apple-touch-icon\" sizes=\"120x120\" href=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/images/apple-touch-icon-120x120.png"), "html", null, true);
        echo "\">
    <link rel=\"apple-touch-icon\" sizes=\"144x144\" href=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/images/apple-touch-icon-144x144.png"), "html", null, true);
        echo "\">
    <link rel=\"apple-touch-icon\" sizes=\"152x152\" href=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/images/apple-touch-icon-152x152.png"), "html", null, true);
        echo "\">

    <!-- BOOTSTRAP STYLES -->
    <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/css/bootstrap.min.css"), "html", null, true);
        echo "\">
    <!-- TEMPLATE STYLES -->
    <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/style.css"), "html", null, true);
        echo "\">
    <!-- RESPONSIVE STYLES -->
    <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/css/responsive.css"), "html", null, true);
        echo "\">
    <!-- COLOR STYLES -->
    <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 33
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/css/colors.css"), "html", null, true);
        echo "\">
    <!-- CUSTOM STYLES -->
    <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 35
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/css/custom.css"), "html", null, true);
        echo "\">

    <!-- REVOLUTION STYLE SHEETS -->
    <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 38
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/revolution/css/settings.css"), "html", null, true);
        echo "\">
    <!-- REVOLUTION LAYERS STYLES -->
    <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 40
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/revolution/css/layers.css"), "html", null, true);
        echo "\">
    <!-- REVOLUTION NAVIGATION STYLES -->
    <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 42
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/revolution/css/navigation.css"), "html", null, true);
        echo "\">

    <link rel=\"stylesheet\" href=\"";
        // line 44
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/vendor/nivo-slider/themes/default/default.css"), "html", null, true);
        echo "\" media=\"screen\" />
    <link rel=\"stylesheet\" href=\"";
        // line 45
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/vendor/circle-flip-slideshow/css/component.css"), "html", null, true);
        echo "\" media=\"screen\" />

    <link rel=\"stylesheet\" href=\"";
        // line 47
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/vendor/nivo-slider/nivo-slider.css"), "html", null, true);
        echo "\" media=\"screen\" />
    <link rel=\"stylesheet\" href=\"";
        // line 48
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/vendor/flexslider/flexslider.css"), "html", null, true);
        echo "\" media=\"screen\" />
    <link rel=\"stylesheet\" href=\"";
        // line 49
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/vendor/fancybox/jquery.fancybox.css"), "html", null, true);
        echo "\" media=\"screen\" />

    ";
        // line 51
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 52
        echo "
    <!--[if IE]>
    <script src=\"http://html5shiv.googlecode.com/svn/trunk/html5.js\"></script>
    <![endif]-->

</head>

<body>
<div class=\"body\">
    <header>
            ";
        // line 62
        $this->displayBlock('header', $context, $blocks);
        // line 65
        echo "    </header>
    ";
        // line 66
        $this->displayBlock('body', $context, $blocks);
        // line 67
        echo "    ";
        $this->displayBlock('footer', $context, $blocks);
        // line 68
        echo "
</div>


<!-- Libs -->
<script>window.jQuery || document.write('<script src=\"";
        // line 73
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/vendor/jquery.js"), "html", null, true);
        echo "\"><\\/script>')</script>
<!-- <script src=\"master/style-switcher/style.switcher.js\"></script> -->
<script src=\"";
        // line 75
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/vendor/nivo-slider/jquery.nivo.slider.js"), "html", null, true);
        echo "\"></script>
<!-- Current Page Scripts -->
<script src=\"";
        // line 77
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/js/views/view.home.js"), "html", null, true);
        echo "\"></script>


<!-- Main Scripts-->
<script src=\"";
        // line 81
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/js/jquery.min.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 82
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 83
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/js/plugins.js"), "html", null, true);
        echo "\"></script>

<!-- Libs -->
<script>window.jQuery || document.write('<script src=\"";
        // line 86
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/vendor/jquery.js"), "html", null, true);
        echo "\"><\\/script>')</script>
<script src=\"";
        // line 87
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/vendor/jquery.easing.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 88
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/vendor/jquery.cookie.js"), "html", null, true);
        echo "\"></script>

<!-- Current Page Scripts -->
<script src=\"";
        // line 91
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/js/views/view.home.js"), "html", null, true);
        echo "\"></script>

<!-- Theme Initializer -->
<script src=\"";
        // line 94
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/js/theme.js"), "html", null, true);
        echo "\"></script>

<!-- REVOLUTION JS FILES -->
<script type=\"text/javascript\" src=\"";
        // line 97
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/revolution/js/jquery.themepunch.tools.min.js"), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\" src=\"";
        // line 98
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/revolution/js/jquery.themepunch.revolution.min.js"), "html", null, true);
        echo "\"></script>

<!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
<script type=\"text/javascript\" src=\"";
        // line 101
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/revolution/js/extensions/revolution.extension.actions.min.js"), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\" src=\"";
        // line 102
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/revolution/js/extensions/revolution.extension.carousel.min.js"), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\" src=\"";
        // line 103
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/revolution/js/extensions/revolution.extension.kenburn.min.js"), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\" src=\"";
        // line 104
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/revolution/js/extensions/revolution.extension.layeranimation.min.js"), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\" src=\"";
        // line 105
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/revolution/js/extensions/revolution.extension.migration.min.js"), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\" src=\"";
        // line 106
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/revolution/js/extensions/revolution.extension.navigation.min.js"), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\" src=\"";
        // line 107
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/revolution/js/extensions/revolution.extension.parallax.min.js"), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\" src=\"";
        // line 108
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/revolution/js/extensions/revolution.extension.slideanims.min.js"), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\" src=\"";
        // line 109
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/revolution/js/extensions/revolution.extension.video.min.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 110
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/js/rev-07.js"), "html", null, true);
        echo "\"></script>

<script src=\"https://www.google.com/jsapi\"></script>
<script src=\"";
        // line 113
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/js/chart.js"), "html", null, true);
        echo "\"></script>

";
        // line 115
        $this->displayBlock('javascripts', $context, $blocks);
        // line 116
        echo "</body>

</html>
";
        
        $__internal_194661c34b581cda42494f993ea27a5e1b84b4a0c1a830f3585dbbb342a36354->leave($__internal_194661c34b581cda42494f993ea27a5e1b84b4a0c1a830f3585dbbb342a36354_prof);

    }

    // line 13
    public function block_title($context, array $blocks = array())
    {
        $__internal_67d92debbbe528f019789f0b0dda1a900f4f0d28b49e3e199e758249272be8e8 = $this->env->getExtension("native_profiler");
        $__internal_67d92debbbe528f019789f0b0dda1a900f4f0d28b49e3e199e758249272be8e8->enter($__internal_67d92debbbe528f019789f0b0dda1a900f4f0d28b49e3e199e758249272be8e8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Welcome!";
        
        $__internal_67d92debbbe528f019789f0b0dda1a900f4f0d28b49e3e199e758249272be8e8->leave($__internal_67d92debbbe528f019789f0b0dda1a900f4f0d28b49e3e199e758249272be8e8_prof);

    }

    // line 51
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_d9fa351c7ec4253a54ef9c16dcff63a0d189e68b98a6023e2e198cfbaf1464ee = $this->env->getExtension("native_profiler");
        $__internal_d9fa351c7ec4253a54ef9c16dcff63a0d189e68b98a6023e2e198cfbaf1464ee->enter($__internal_d9fa351c7ec4253a54ef9c16dcff63a0d189e68b98a6023e2e198cfbaf1464ee_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        
        $__internal_d9fa351c7ec4253a54ef9c16dcff63a0d189e68b98a6023e2e198cfbaf1464ee->leave($__internal_d9fa351c7ec4253a54ef9c16dcff63a0d189e68b98a6023e2e198cfbaf1464ee_prof);

    }

    // line 62
    public function block_header($context, array $blocks = array())
    {
        $__internal_14695d0717d7cf2f35ca5c3cc9426e1222cca014dce36854ab27b79c89bc2640 = $this->env->getExtension("native_profiler");
        $__internal_14695d0717d7cf2f35ca5c3cc9426e1222cca014dce36854ab27b79c89bc2640->enter($__internal_14695d0717d7cf2f35ca5c3cc9426e1222cca014dce36854ab27b79c89bc2640_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "header"));

        // line 63
        echo "                ";
        $this->displayBlock('options', $context, $blocks);
        // line 64
        echo "            ";
        
        $__internal_14695d0717d7cf2f35ca5c3cc9426e1222cca014dce36854ab27b79c89bc2640->leave($__internal_14695d0717d7cf2f35ca5c3cc9426e1222cca014dce36854ab27b79c89bc2640_prof);

    }

    // line 63
    public function block_options($context, array $blocks = array())
    {
        $__internal_58c73cf227ad0109af0a7ee94e39d0188cebf5df8648cd9dc1a41703fda235fb = $this->env->getExtension("native_profiler");
        $__internal_58c73cf227ad0109af0a7ee94e39d0188cebf5df8648cd9dc1a41703fda235fb->enter($__internal_58c73cf227ad0109af0a7ee94e39d0188cebf5df8648cd9dc1a41703fda235fb_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "options"));

        
        $__internal_58c73cf227ad0109af0a7ee94e39d0188cebf5df8648cd9dc1a41703fda235fb->leave($__internal_58c73cf227ad0109af0a7ee94e39d0188cebf5df8648cd9dc1a41703fda235fb_prof);

    }

    // line 66
    public function block_body($context, array $blocks = array())
    {
        $__internal_43c3636148b1179715ef9341b07337a3c3cea0ad29c793f338e70880489459f4 = $this->env->getExtension("native_profiler");
        $__internal_43c3636148b1179715ef9341b07337a3c3cea0ad29c793f338e70880489459f4->enter($__internal_43c3636148b1179715ef9341b07337a3c3cea0ad29c793f338e70880489459f4_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_43c3636148b1179715ef9341b07337a3c3cea0ad29c793f338e70880489459f4->leave($__internal_43c3636148b1179715ef9341b07337a3c3cea0ad29c793f338e70880489459f4_prof);

    }

    // line 67
    public function block_footer($context, array $blocks = array())
    {
        $__internal_c919031c15c98006f55aaadca3d40627653dcd59023902bf10f709ddc0e753d8 = $this->env->getExtension("native_profiler");
        $__internal_c919031c15c98006f55aaadca3d40627653dcd59023902bf10f709ddc0e753d8->enter($__internal_c919031c15c98006f55aaadca3d40627653dcd59023902bf10f709ddc0e753d8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "footer"));

        
        $__internal_c919031c15c98006f55aaadca3d40627653dcd59023902bf10f709ddc0e753d8->leave($__internal_c919031c15c98006f55aaadca3d40627653dcd59023902bf10f709ddc0e753d8_prof);

    }

    // line 115
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_5bd5c0df84eb6028e3ea488b6978fa63c2630c788dff9493592f36673f6bfdb3 = $this->env->getExtension("native_profiler");
        $__internal_5bd5c0df84eb6028e3ea488b6978fa63c2630c788dff9493592f36673f6bfdb3->enter($__internal_5bd5c0df84eb6028e3ea488b6978fa63c2630c788dff9493592f36673f6bfdb3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        
        $__internal_5bd5c0df84eb6028e3ea488b6978fa63c2630c788dff9493592f36673f6bfdb3->leave($__internal_5bd5c0df84eb6028e3ea488b6978fa63c2630c788dff9493592f36673f6bfdb3_prof);

    }

    public function getTemplateName()
    {
        return "::base-front-convert.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  379 => 115,  368 => 67,  357 => 66,  346 => 63,  339 => 64,  336 => 63,  330 => 62,  319 => 51,  307 => 13,  297 => 116,  295 => 115,  290 => 113,  284 => 110,  280 => 109,  276 => 108,  272 => 107,  268 => 106,  264 => 105,  260 => 104,  256 => 103,  252 => 102,  248 => 101,  242 => 98,  238 => 97,  232 => 94,  226 => 91,  220 => 88,  216 => 87,  212 => 86,  206 => 83,  202 => 82,  198 => 81,  191 => 77,  186 => 75,  181 => 73,  174 => 68,  171 => 67,  169 => 66,  166 => 65,  164 => 62,  152 => 52,  150 => 51,  145 => 49,  141 => 48,  137 => 47,  132 => 45,  128 => 44,  123 => 42,  118 => 40,  113 => 38,  107 => 35,  102 => 33,  97 => 31,  92 => 29,  87 => 27,  81 => 24,  77 => 23,  73 => 22,  69 => 21,  65 => 20,  61 => 19,  57 => 18,  53 => 17,  49 => 16,  43 => 13,  29 => 1,);
    }
}
