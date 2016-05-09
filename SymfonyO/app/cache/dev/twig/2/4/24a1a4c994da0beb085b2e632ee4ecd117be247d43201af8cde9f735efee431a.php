<?php

/* TwigBundle:Exception:exception_full.html.twig */
class __TwigTemplate_24a1a4c994da0beb085b2e632ee4ecd117be247d43201af8cde9f735efee431a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("TwigBundle::layout.html.twig", "TwigBundle:Exception:exception_full.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "TwigBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_afd0f97333b4ebb664aa16ddd5075f926ae1d3f8d9646ea45d4b2a6b86ba2890 = $this->env->getExtension("native_profiler");
        $__internal_afd0f97333b4ebb664aa16ddd5075f926ae1d3f8d9646ea45d4b2a6b86ba2890->enter($__internal_afd0f97333b4ebb664aa16ddd5075f926ae1d3f8d9646ea45d4b2a6b86ba2890_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_afd0f97333b4ebb664aa16ddd5075f926ae1d3f8d9646ea45d4b2a6b86ba2890->leave($__internal_afd0f97333b4ebb664aa16ddd5075f926ae1d3f8d9646ea45d4b2a6b86ba2890_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_3e7d105c0495892a4fa3b0034f8d0d7caa42759ed89f8106508fbc847dc516b6 = $this->env->getExtension("native_profiler");
        $__internal_3e7d105c0495892a4fa3b0034f8d0d7caa42759ed89f8106508fbc847dc516b6->enter($__internal_3e7d105c0495892a4fa3b0034f8d0d7caa42759ed89f8106508fbc847dc516b6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('request')->generateAbsoluteUrl($this->env->getExtension('asset')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_3e7d105c0495892a4fa3b0034f8d0d7caa42759ed89f8106508fbc847dc516b6->leave($__internal_3e7d105c0495892a4fa3b0034f8d0d7caa42759ed89f8106508fbc847dc516b6_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_52f11642395bdedbc823f840172dd010aa45aaf322dde08f9fa09ebf6f26b28f = $this->env->getExtension("native_profiler");
        $__internal_52f11642395bdedbc823f840172dd010aa45aaf322dde08f9fa09ebf6f26b28f->enter($__internal_52f11642395bdedbc823f840172dd010aa45aaf322dde08f9fa09ebf6f26b28f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "exception"), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, $this->getContext($context, "status_code"), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getContext($context, "status_text"), "html", null, true);
        echo ")
";
        
        $__internal_52f11642395bdedbc823f840172dd010aa45aaf322dde08f9fa09ebf6f26b28f->leave($__internal_52f11642395bdedbc823f840172dd010aa45aaf322dde08f9fa09ebf6f26b28f_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_22a42f3f02b501ff65223a2f5741607a8f8e2538e534280c8ec13517b2eaaf89 = $this->env->getExtension("native_profiler");
        $__internal_22a42f3f02b501ff65223a2f5741607a8f8e2538e534280c8ec13517b2eaaf89->enter($__internal_22a42f3f02b501ff65223a2f5741607a8f8e2538e534280c8ec13517b2eaaf89_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("TwigBundle:Exception:exception.html.twig", "TwigBundle:Exception:exception_full.html.twig", 12)->display($context);
        
        $__internal_22a42f3f02b501ff65223a2f5741607a8f8e2538e534280c8ec13517b2eaaf89->leave($__internal_22a42f3f02b501ff65223a2f5741607a8f8e2538e534280c8ec13517b2eaaf89_prof);

    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:exception_full.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 12,  72 => 11,  58 => 8,  52 => 7,  42 => 4,  36 => 3,  11 => 1,);
    }
}
