<?php

/* ::base-front.html.twig */
class __TwigTemplate_1b8785043705ac3ca4fb9f92e7fc6641d9f8c38397e9faa9f9c60a033961a582 extends Twig_Template
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
        // line 1
        echo "<!DOCTYPE html>
<html>
<head>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"description\" content=\"\">
    <meta name=\"author\" content=\"\">
    <title>";
        // line 8
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
    <meta content=\"width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no\" name=\"viewport\">
    <link href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/css/css.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\">
    <!-- Libs CSS -->
    <link rel=\"stylesheet\" href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/css/bootstrap.css"), "html", null, true);
        echo "\">
    <link rel=\"stylesheet\" href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/css/fonts/font-awesome/css/font-awesome.css"), "html", null, true);
        echo "\">
    <link rel=\"stylesheet\" href=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/vendor/flexslider/flexslider.css"), "html", null, true);
        echo "\" media=\"screen\"/>
    <link rel=\"stylesheet\" href=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/vendor/fancybox/jquery.fancybox.css"), "html", null, true);
        echo "\" media=\"screen\"/>
    <!-- Theme CSS -->
    <link rel=\"stylesheet\" href=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/css/theme.css"), "html", null, true);
        echo "\">
    <link rel=\"stylesheet\" href=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/css/theme-elements.css"), "html", null, true);
        echo "\">
    <!-- Current Page Styles -->
    <link rel=\"stylesheet\" href=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/vendor/revolution-slider/css/settings.css"), "html", null, true);
        echo "\"
          media=\"screen\"/>
    <link rel=\"stylesheet\" href=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/vendor/revolution-slider/css/captions.css"), "html", null, true);
        echo "\"
          media=\"screen\"/>
    <link rel=\"stylesheet\" href=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/vendor/circle-flip-slideshow/css/component.css"), "html", null, true);
        echo "\"
          media=\"screen\"/>
    <!-- Custom CSS -->
    <link rel=\"stylesheet\" href=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/css/custom.css"), "html", null, true);
        echo "\">
    <!-- Skin -->
    <link rel=\"stylesheet\" href=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/css/skins/blue.css"), "html", null, true);
        echo "\">
    <!-- Responsive CSS -->
    <link rel=\"stylesheet\" href=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/css/bootstrap-responsive.css"), "html", null, true);
        echo "\"/>
    <link rel=\"stylesheet\" href=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/css/theme-responsive.css"), "html", null, true);
        echo "\"/>
    <!-- Favicons -->
    <link rel=\"shortcut icon\" href=\"";
        // line 34
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/img/favicon.ico"), "html", null, true);
        echo "\">
    <link rel=\"apple-touch-icon\" href=\"";
        // line 35
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/img/apple-touch-icon.png"), "html", null, true);
        echo "\">
    <link rel=\"apple-touch-icon\" sizes=\"72x72\" href=\"";
        // line 36
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/img/apple-touch-icon-72x72.png"), "html", null, true);
        echo "\">
    <link rel=\"apple-touch-icon\" sizes=\"114x114\" href=\"";
        // line 37
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/img/apple-touch-icon-114x114.png"), "html", null, true);
        echo "\">
    <link rel=\"apple-touch-icon\" sizes=\"144x144\" href=\"";
        // line 38
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/img/apple-touch-icon-144x144.png"), "html", null, true);
        echo "\">
    <!-- Head Libs -->
    <script src=\"";
        // line 40
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/vendor/modernizr.js"), "html", null, true);
        echo "\"></script>
    ";
        // line 41
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 42
        echo "</head>
<body>
<div class=\"body\">
    <header>
        <div class=\"container\">
            ";
        // line 47
        $this->displayBlock('header', $context, $blocks);
        // line 50
        echo "        </div>
    </header>
    ";
        // line 52
        $this->displayBlock('body', $context, $blocks);
        // line 53
        echo "    ";
        $this->displayBlock('footer', $context, $blocks);
        // line 54
        echo "</div>
<script src=\"";
        // line 55
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/vendor/jquery.min.js"), "html", null, true);
        echo "\"></script>
<script> window.jQuery || document.write('<script src=\"";
        // line 56
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/vendor/jquery.js"), "html", null, true);
        echo "\"><\\/script>') </script>
<script src=\"";
        // line 57
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/vendor/jquery.easing.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 58
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/vendor/jquery.cookie.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 59
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/vendor/bootstrap.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 60
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/vendor/selectnav.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 61
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/vendor/twitterjs/twitter.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 62
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/vendor/revolution-slider/js/jquery.themepunch.plugins.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 63
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/vendor/revolution-slider/js/jquery.themepunch.revolution.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 64
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/vendor/flexslider/jquery.flexslider.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 65
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/vendor/circle-flip-slideshow/js/jquery.flipshow.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 66
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/vendor/fancybox/jquery.fancybox.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 67
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/vendor/jquery.validate.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 68
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/js/plugins.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 69
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/js/views/view.home.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 70
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/js/theme.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 71
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/js/custom.js"), "html", null, true);
        echo "\"></script>
";
        // line 72
        $this->displayBlock('javascripts', $context, $blocks);
        // line 73
        echo "</body>
</html>
";
    }

    // line 8
    public function block_title($context, array $blocks = array())
    {
        echo "Welcome!";
    }

    // line 41
    public function block_stylesheets($context, array $blocks = array())
    {
    }

    // line 47
    public function block_header($context, array $blocks = array())
    {
        // line 48
        echo "                ";
        $this->displayBlock('options', $context, $blocks);
        // line 49
        echo "            ";
    }

    // line 48
    public function block_options($context, array $blocks = array())
    {
    }

    // line 52
    public function block_body($context, array $blocks = array())
    {
    }

    // line 53
    public function block_footer($context, array $blocks = array())
    {
    }

    // line 72
    public function block_javascripts($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "::base-front.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  266 => 72,  261 => 53,  256 => 52,  251 => 48,  247 => 49,  244 => 48,  241 => 47,  236 => 41,  230 => 8,  224 => 73,  222 => 72,  218 => 71,  214 => 70,  210 => 69,  206 => 68,  202 => 67,  198 => 66,  194 => 65,  190 => 64,  186 => 63,  182 => 62,  178 => 61,  174 => 60,  170 => 59,  166 => 58,  162 => 57,  158 => 56,  154 => 55,  151 => 54,  148 => 53,  146 => 52,  142 => 50,  140 => 47,  133 => 42,  131 => 41,  127 => 40,  122 => 38,  118 => 37,  114 => 36,  110 => 35,  106 => 34,  101 => 32,  97 => 31,  92 => 29,  87 => 27,  81 => 24,  76 => 22,  71 => 20,  66 => 18,  62 => 17,  57 => 15,  53 => 14,  49 => 13,  45 => 12,  40 => 10,  35 => 8,  26 => 1,);
    }
}
