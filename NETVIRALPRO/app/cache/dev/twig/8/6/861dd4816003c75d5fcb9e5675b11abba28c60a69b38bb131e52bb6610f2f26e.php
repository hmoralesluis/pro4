<?php

/* AdminBundle:Home:home.html.twig */
class __TwigTemplate_861dd4816003c75d5fcb9e5675b11abba28c60a69b38bb131e52bb6610f2f26e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("AdminBundle::layout.html.twig", "AdminBundle:Home:home.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "AdminBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_a746e4f7c9ee9f6b4aeed88c78151ccbc6261acd1879b484a79e5019cc5bfc91 = $this->env->getExtension("native_profiler");
        $__internal_a746e4f7c9ee9f6b4aeed88c78151ccbc6261acd1879b484a79e5019cc5bfc91->enter($__internal_a746e4f7c9ee9f6b4aeed88c78151ccbc6261acd1879b484a79e5019cc5bfc91_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "AdminBundle:Home:home.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_a746e4f7c9ee9f6b4aeed88c78151ccbc6261acd1879b484a79e5019cc5bfc91->leave($__internal_a746e4f7c9ee9f6b4aeed88c78151ccbc6261acd1879b484a79e5019cc5bfc91_prof);

    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $__internal_8f2908e62cf6871bd729c1da9b6ea2c8841d9f0b78a731e96ec86f7ed439a489 = $this->env->getExtension("native_profiler");
        $__internal_8f2908e62cf6871bd729c1da9b6ea2c8841d9f0b78a731e96ec86f7ed439a489->enter($__internal_8f2908e62cf6871bd729c1da9b6ea2c8841d9f0b78a731e96ec86f7ed439a489_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Bienvenido a MegalifePro!";
        
        $__internal_8f2908e62cf6871bd729c1da9b6ea2c8841d9f0b78a731e96ec86f7ed439a489->leave($__internal_8f2908e62cf6871bd729c1da9b6ea2c8841d9f0b78a731e96ec86f7ed439a489_prof);

    }

    public function getTemplateName()
    {
        return "AdminBundle:Home:home.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  34 => 3,  11 => 1,);
    }
}
