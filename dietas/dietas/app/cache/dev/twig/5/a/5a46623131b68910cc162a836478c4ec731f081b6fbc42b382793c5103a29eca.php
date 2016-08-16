<?php

/* TwigBundle:Exception:exception_full.html.twig */
class __TwigTemplate_5a46623131b68910cc162a836478c4ec731f081b6fbc42b382793c5103a29eca extends Twig_Template
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
        $__internal_c9669fd9aaba7828ebe636356ee6a9205ced9f50bcd95304ba1ef1b1c1940ec8 = $this->env->getExtension("native_profiler");
        $__internal_c9669fd9aaba7828ebe636356ee6a9205ced9f50bcd95304ba1ef1b1c1940ec8->enter($__internal_c9669fd9aaba7828ebe636356ee6a9205ced9f50bcd95304ba1ef1b1c1940ec8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_c9669fd9aaba7828ebe636356ee6a9205ced9f50bcd95304ba1ef1b1c1940ec8->leave($__internal_c9669fd9aaba7828ebe636356ee6a9205ced9f50bcd95304ba1ef1b1c1940ec8_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_b36d39c171cc559218d4bed83f240cd79a095fe9330fd6c1cd6f9db6403b91a6 = $this->env->getExtension("native_profiler");
        $__internal_b36d39c171cc559218d4bed83f240cd79a095fe9330fd6c1cd6f9db6403b91a6->enter($__internal_b36d39c171cc559218d4bed83f240cd79a095fe9330fd6c1cd6f9db6403b91a6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('request')->generateAbsoluteUrl($this->env->getExtension('asset')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_b36d39c171cc559218d4bed83f240cd79a095fe9330fd6c1cd6f9db6403b91a6->leave($__internal_b36d39c171cc559218d4bed83f240cd79a095fe9330fd6c1cd6f9db6403b91a6_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_85d4f7aa4b1d07f2aaeaefb7eb6cfcdc1637d26b7005e9a4fe340ad88190df5e = $this->env->getExtension("native_profiler");
        $__internal_85d4f7aa4b1d07f2aaeaefb7eb6cfcdc1637d26b7005e9a4fe340ad88190df5e->enter($__internal_85d4f7aa4b1d07f2aaeaefb7eb6cfcdc1637d26b7005e9a4fe340ad88190df5e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_85d4f7aa4b1d07f2aaeaefb7eb6cfcdc1637d26b7005e9a4fe340ad88190df5e->leave($__internal_85d4f7aa4b1d07f2aaeaefb7eb6cfcdc1637d26b7005e9a4fe340ad88190df5e_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_7c814da7a05fa6e2bd4ee1331fb1117361b977295f45b019cb446aba7c9a26e0 = $this->env->getExtension("native_profiler");
        $__internal_7c814da7a05fa6e2bd4ee1331fb1117361b977295f45b019cb446aba7c9a26e0->enter($__internal_7c814da7a05fa6e2bd4ee1331fb1117361b977295f45b019cb446aba7c9a26e0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("TwigBundle:Exception:exception.html.twig", "TwigBundle:Exception:exception_full.html.twig", 12)->display($context);
        
        $__internal_7c814da7a05fa6e2bd4ee1331fb1117361b977295f45b019cb446aba7c9a26e0->leave($__internal_7c814da7a05fa6e2bd4ee1331fb1117361b977295f45b019cb446aba7c9a26e0_prof);

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
