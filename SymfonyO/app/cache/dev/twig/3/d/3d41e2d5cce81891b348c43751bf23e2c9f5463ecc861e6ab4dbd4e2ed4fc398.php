<?php

/* ::base-front.html.twig */
class __TwigTemplate_3d41e2d5cce81891b348c43751bf23e2c9f5463ecc861e6ab4dbd4e2ed4fc398 extends Twig_Template
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
        $__internal_1883f7c74b5d920597cc76e5d42dfe48aafdf78de21577d6bc186b534d5e597f = $this->env->getExtension("native_profiler");
        $__internal_1883f7c74b5d920597cc76e5d42dfe48aafdf78de21577d6bc186b534d5e597f->enter($__internal_1883f7c74b5d920597cc76e5d42dfe48aafdf78de21577d6bc186b534d5e597f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "::base-front.html.twig"));

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
    ";
        // line 39
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 40
        echo "    <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/vendor/modernizr.js"), "html", null, true);
        echo "\"></script>
</head>
<body>
<div class=\"body\">
    <header>
        <div class=\"container\">
            ";
        // line 46
        $this->displayBlock('header', $context, $blocks);
        // line 49
        echo "        </div>
    </header>
    ";
        // line 51
        $this->displayBlock('body', $context, $blocks);
        // line 52
        echo "    ";
        $this->displayBlock('footer', $context, $blocks);
        // line 53
        echo "</div>
<script src=\"";
        // line 54
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/vendor/jquery.min.js"), "html", null, true);
        echo "\"></script>
<script> window.jQuery || document.write('<script src=\"";
        // line 55
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/vendor/jquery.js"), "html", null, true);
        echo "\"><\\/script>') </script>
<script src=\"";
        // line 56
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/vendor/jquery.easing.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 57
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/vendor/jquery.cookie.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 58
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/vendor/bootstrap.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 59
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/vendor/selectnav.js"), "html", null, true);
        echo "\"></script>
<!--script src=\"";
        // line 60
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/vendor/twitterjs/twitter.js"), "html", null, true);
        echo "\"></script-->
<script src=\"";
        // line 61
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/vendor/revolution-slider/js/jquery.themepunch.plugins.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 62
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/vendor/revolution-slider/js/jquery.themepunch.revolution.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 63
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/vendor/flexslider/jquery.flexslider.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 64
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/vendor/circle-flip-slideshow/js/jquery.flipshow.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 65
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/vendor/fancybox/jquery.fancybox.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 66
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/vendor/jquery.validate.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 67
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/js/plugins.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 68
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/js/views/view.home.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 69
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/js/theme.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 70
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/js/custom.js"), "html", null, true);
        echo "\"></script>
";
        // line 71
        $this->displayBlock('javascripts', $context, $blocks);
        // line 72
        echo "</body>
</html>
";
        
        $__internal_1883f7c74b5d920597cc76e5d42dfe48aafdf78de21577d6bc186b534d5e597f->leave($__internal_1883f7c74b5d920597cc76e5d42dfe48aafdf78de21577d6bc186b534d5e597f_prof);

    }

    // line 8
    public function block_title($context, array $blocks = array())
    {
        $__internal_029a6c9c43a66b153986892c7bf5bf4b3e61c55787e3c1d694d1ecaff2960e56 = $this->env->getExtension("native_profiler");
        $__internal_029a6c9c43a66b153986892c7bf5bf4b3e61c55787e3c1d694d1ecaff2960e56->enter($__internal_029a6c9c43a66b153986892c7bf5bf4b3e61c55787e3c1d694d1ecaff2960e56_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Welcome!";
        
        $__internal_029a6c9c43a66b153986892c7bf5bf4b3e61c55787e3c1d694d1ecaff2960e56->leave($__internal_029a6c9c43a66b153986892c7bf5bf4b3e61c55787e3c1d694d1ecaff2960e56_prof);

    }

    // line 39
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_8d5a40cff6fc22dcd4af1111054987e66dce0fc95666900d04fb024a9ba86dd3 = $this->env->getExtension("native_profiler");
        $__internal_8d5a40cff6fc22dcd4af1111054987e66dce0fc95666900d04fb024a9ba86dd3->enter($__internal_8d5a40cff6fc22dcd4af1111054987e66dce0fc95666900d04fb024a9ba86dd3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        
        $__internal_8d5a40cff6fc22dcd4af1111054987e66dce0fc95666900d04fb024a9ba86dd3->leave($__internal_8d5a40cff6fc22dcd4af1111054987e66dce0fc95666900d04fb024a9ba86dd3_prof);

    }

    // line 46
    public function block_header($context, array $blocks = array())
    {
        $__internal_1bfdd9c85daa1f241f2e1c7017ff0bb5dca184ed742744f2a4f715a870dfaecc = $this->env->getExtension("native_profiler");
        $__internal_1bfdd9c85daa1f241f2e1c7017ff0bb5dca184ed742744f2a4f715a870dfaecc->enter($__internal_1bfdd9c85daa1f241f2e1c7017ff0bb5dca184ed742744f2a4f715a870dfaecc_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "header"));

        // line 47
        echo "                ";
        $this->displayBlock('options', $context, $blocks);
        // line 48
        echo "            ";
        
        $__internal_1bfdd9c85daa1f241f2e1c7017ff0bb5dca184ed742744f2a4f715a870dfaecc->leave($__internal_1bfdd9c85daa1f241f2e1c7017ff0bb5dca184ed742744f2a4f715a870dfaecc_prof);

    }

    // line 47
    public function block_options($context, array $blocks = array())
    {
        $__internal_85581738682d237f073ba25cccffd95fc84559574d4f8f0c84d3e9ab6244463f = $this->env->getExtension("native_profiler");
        $__internal_85581738682d237f073ba25cccffd95fc84559574d4f8f0c84d3e9ab6244463f->enter($__internal_85581738682d237f073ba25cccffd95fc84559574d4f8f0c84d3e9ab6244463f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "options"));

        
        $__internal_85581738682d237f073ba25cccffd95fc84559574d4f8f0c84d3e9ab6244463f->leave($__internal_85581738682d237f073ba25cccffd95fc84559574d4f8f0c84d3e9ab6244463f_prof);

    }

    // line 51
    public function block_body($context, array $blocks = array())
    {
        $__internal_e36b6dbe523498cedfa533d1411b8bedde71c4fa4a488d2a5b044c6a5afdf4fe = $this->env->getExtension("native_profiler");
        $__internal_e36b6dbe523498cedfa533d1411b8bedde71c4fa4a488d2a5b044c6a5afdf4fe->enter($__internal_e36b6dbe523498cedfa533d1411b8bedde71c4fa4a488d2a5b044c6a5afdf4fe_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_e36b6dbe523498cedfa533d1411b8bedde71c4fa4a488d2a5b044c6a5afdf4fe->leave($__internal_e36b6dbe523498cedfa533d1411b8bedde71c4fa4a488d2a5b044c6a5afdf4fe_prof);

    }

    // line 52
    public function block_footer($context, array $blocks = array())
    {
        $__internal_58565ef7bde3e86aa69aa499e87734d2eec8a2170ba48e3c58c2f906887d2fa5 = $this->env->getExtension("native_profiler");
        $__internal_58565ef7bde3e86aa69aa499e87734d2eec8a2170ba48e3c58c2f906887d2fa5->enter($__internal_58565ef7bde3e86aa69aa499e87734d2eec8a2170ba48e3c58c2f906887d2fa5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "footer"));

        
        $__internal_58565ef7bde3e86aa69aa499e87734d2eec8a2170ba48e3c58c2f906887d2fa5->leave($__internal_58565ef7bde3e86aa69aa499e87734d2eec8a2170ba48e3c58c2f906887d2fa5_prof);

    }

    // line 71
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_c9088ca153dd5163595783119d4976336e62f519d71228cea4cf771e103552c7 = $this->env->getExtension("native_profiler");
        $__internal_c9088ca153dd5163595783119d4976336e62f519d71228cea4cf771e103552c7->enter($__internal_c9088ca153dd5163595783119d4976336e62f519d71228cea4cf771e103552c7_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        
        $__internal_c9088ca153dd5163595783119d4976336e62f519d71228cea4cf771e103552c7->leave($__internal_c9088ca153dd5163595783119d4976336e62f519d71228cea4cf771e103552c7_prof);

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
        return array (  306 => 71,  295 => 52,  284 => 51,  273 => 47,  266 => 48,  263 => 47,  257 => 46,  246 => 39,  234 => 8,  225 => 72,  223 => 71,  219 => 70,  215 => 69,  211 => 68,  207 => 67,  203 => 66,  199 => 65,  195 => 64,  191 => 63,  187 => 62,  183 => 61,  179 => 60,  175 => 59,  171 => 58,  167 => 57,  163 => 56,  159 => 55,  155 => 54,  152 => 53,  149 => 52,  147 => 51,  143 => 49,  141 => 46,  131 => 40,  129 => 39,  125 => 38,  121 => 37,  117 => 36,  113 => 35,  109 => 34,  104 => 32,  100 => 31,  95 => 29,  90 => 27,  84 => 24,  79 => 22,  74 => 20,  69 => 18,  65 => 17,  60 => 15,  56 => 14,  52 => 13,  48 => 12,  43 => 10,  38 => 8,  29 => 1,);
    }
}
