<?php

/* ::base-front.html.twig */
class __TwigTemplate_123ee51094af70e4320ff2a13d74821706452ae7ae41466c0d99d115f03b7cf5 extends Twig_Template
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
        $__internal_4b2fe2bff03af3d609576e281c5c4519109ccfcd9e0d2b42a07d6d1052b1f88b = $this->env->getExtension("native_profiler");
        $__internal_4b2fe2bff03af3d609576e281c5c4519109ccfcd9e0d2b42a07d6d1052b1f88b->enter($__internal_4b2fe2bff03af3d609576e281c5c4519109ccfcd9e0d2b42a07d6d1052b1f88b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "::base-front.html.twig"));

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
        
        $__internal_4b2fe2bff03af3d609576e281c5c4519109ccfcd9e0d2b42a07d6d1052b1f88b->leave($__internal_4b2fe2bff03af3d609576e281c5c4519109ccfcd9e0d2b42a07d6d1052b1f88b_prof);

    }

    // line 8
    public function block_title($context, array $blocks = array())
    {
        $__internal_6587e76ae1e50c5d469c786b242aa0fa4908cef3c3358b855f197f36d1aa4f62 = $this->env->getExtension("native_profiler");
        $__internal_6587e76ae1e50c5d469c786b242aa0fa4908cef3c3358b855f197f36d1aa4f62->enter($__internal_6587e76ae1e50c5d469c786b242aa0fa4908cef3c3358b855f197f36d1aa4f62_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Welcome!";
        
        $__internal_6587e76ae1e50c5d469c786b242aa0fa4908cef3c3358b855f197f36d1aa4f62->leave($__internal_6587e76ae1e50c5d469c786b242aa0fa4908cef3c3358b855f197f36d1aa4f62_prof);

    }

    // line 41
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_ca87e9180f3641fd4b4197809e1ee9c9371955d53e1a6c75f565165b5b163162 = $this->env->getExtension("native_profiler");
        $__internal_ca87e9180f3641fd4b4197809e1ee9c9371955d53e1a6c75f565165b5b163162->enter($__internal_ca87e9180f3641fd4b4197809e1ee9c9371955d53e1a6c75f565165b5b163162_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        
        $__internal_ca87e9180f3641fd4b4197809e1ee9c9371955d53e1a6c75f565165b5b163162->leave($__internal_ca87e9180f3641fd4b4197809e1ee9c9371955d53e1a6c75f565165b5b163162_prof);

    }

    // line 47
    public function block_header($context, array $blocks = array())
    {
        $__internal_d331c998d42f2f81379ecc5e92369e4f2e8fac91a632a6544da3bd868df17c95 = $this->env->getExtension("native_profiler");
        $__internal_d331c998d42f2f81379ecc5e92369e4f2e8fac91a632a6544da3bd868df17c95->enter($__internal_d331c998d42f2f81379ecc5e92369e4f2e8fac91a632a6544da3bd868df17c95_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "header"));

        // line 48
        echo "                ";
        $this->displayBlock('options', $context, $blocks);
        // line 49
        echo "            ";
        
        $__internal_d331c998d42f2f81379ecc5e92369e4f2e8fac91a632a6544da3bd868df17c95->leave($__internal_d331c998d42f2f81379ecc5e92369e4f2e8fac91a632a6544da3bd868df17c95_prof);

    }

    // line 48
    public function block_options($context, array $blocks = array())
    {
        $__internal_be20ea93b83b1e80496397834d06e291dd583413f30b1509ca477c045d59ef46 = $this->env->getExtension("native_profiler");
        $__internal_be20ea93b83b1e80496397834d06e291dd583413f30b1509ca477c045d59ef46->enter($__internal_be20ea93b83b1e80496397834d06e291dd583413f30b1509ca477c045d59ef46_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "options"));

        
        $__internal_be20ea93b83b1e80496397834d06e291dd583413f30b1509ca477c045d59ef46->leave($__internal_be20ea93b83b1e80496397834d06e291dd583413f30b1509ca477c045d59ef46_prof);

    }

    // line 52
    public function block_body($context, array $blocks = array())
    {
        $__internal_70126419876fb5f41666773447af2adb0cfe528a3dc6e76690fc3f60c5b7d265 = $this->env->getExtension("native_profiler");
        $__internal_70126419876fb5f41666773447af2adb0cfe528a3dc6e76690fc3f60c5b7d265->enter($__internal_70126419876fb5f41666773447af2adb0cfe528a3dc6e76690fc3f60c5b7d265_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_70126419876fb5f41666773447af2adb0cfe528a3dc6e76690fc3f60c5b7d265->leave($__internal_70126419876fb5f41666773447af2adb0cfe528a3dc6e76690fc3f60c5b7d265_prof);

    }

    // line 53
    public function block_footer($context, array $blocks = array())
    {
        $__internal_0a2ee49db5180534f8a1a3599e957b01419f8b6dc6f1ef32ab4c84d07c4242b4 = $this->env->getExtension("native_profiler");
        $__internal_0a2ee49db5180534f8a1a3599e957b01419f8b6dc6f1ef32ab4c84d07c4242b4->enter($__internal_0a2ee49db5180534f8a1a3599e957b01419f8b6dc6f1ef32ab4c84d07c4242b4_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "footer"));

        
        $__internal_0a2ee49db5180534f8a1a3599e957b01419f8b6dc6f1ef32ab4c84d07c4242b4->leave($__internal_0a2ee49db5180534f8a1a3599e957b01419f8b6dc6f1ef32ab4c84d07c4242b4_prof);

    }

    // line 72
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_fcc003abc0540db5f9843a8ada4df9c927fb6c102cdb4b1e3641309e99ae85fa = $this->env->getExtension("native_profiler");
        $__internal_fcc003abc0540db5f9843a8ada4df9c927fb6c102cdb4b1e3641309e99ae85fa->enter($__internal_fcc003abc0540db5f9843a8ada4df9c927fb6c102cdb4b1e3641309e99ae85fa_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        
        $__internal_fcc003abc0540db5f9843a8ada4df9c927fb6c102cdb4b1e3641309e99ae85fa->leave($__internal_fcc003abc0540db5f9843a8ada4df9c927fb6c102cdb4b1e3641309e99ae85fa_prof);

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
        return array (  308 => 72,  297 => 53,  286 => 52,  275 => 48,  268 => 49,  265 => 48,  259 => 47,  248 => 41,  236 => 8,  227 => 73,  225 => 72,  221 => 71,  217 => 70,  213 => 69,  209 => 68,  205 => 67,  201 => 66,  197 => 65,  193 => 64,  189 => 63,  185 => 62,  181 => 61,  177 => 60,  173 => 59,  169 => 58,  165 => 57,  161 => 56,  157 => 55,  154 => 54,  151 => 53,  149 => 52,  145 => 50,  143 => 47,  136 => 42,  134 => 41,  130 => 40,  125 => 38,  121 => 37,  117 => 36,  113 => 35,  109 => 34,  104 => 32,  100 => 31,  95 => 29,  90 => 27,  84 => 24,  79 => 22,  74 => 20,  69 => 18,  65 => 17,  60 => 15,  56 => 14,  52 => 13,  48 => 12,  43 => 10,  38 => 8,  29 => 1,);
    }
}
