<?php

/* TwigBundle:Exception:exception_full.html.twig */
class __TwigTemplate_e63211935439d17d49bc844a9afa1f26ede76154efe3e486657070d373a6fe2c extends Twig_Template
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
        $__internal_26aa9766ffb561ebe61c37800eed0cac89273784f65459f3e307ec023fe4ffdc = $this->env->getExtension("native_profiler");
        $__internal_26aa9766ffb561ebe61c37800eed0cac89273784f65459f3e307ec023fe4ffdc->enter($__internal_26aa9766ffb561ebe61c37800eed0cac89273784f65459f3e307ec023fe4ffdc_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_26aa9766ffb561ebe61c37800eed0cac89273784f65459f3e307ec023fe4ffdc->leave($__internal_26aa9766ffb561ebe61c37800eed0cac89273784f65459f3e307ec023fe4ffdc_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_7d6992e7986564fa9d18a78d055dfe024ec0a4349e73445ea5387f18545c631f = $this->env->getExtension("native_profiler");
        $__internal_7d6992e7986564fa9d18a78d055dfe024ec0a4349e73445ea5387f18545c631f->enter($__internal_7d6992e7986564fa9d18a78d055dfe024ec0a4349e73445ea5387f18545c631f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('request')->generateAbsoluteUrl($this->env->getExtension('asset')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_7d6992e7986564fa9d18a78d055dfe024ec0a4349e73445ea5387f18545c631f->leave($__internal_7d6992e7986564fa9d18a78d055dfe024ec0a4349e73445ea5387f18545c631f_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_b143e7694b280668db77b58c629294c7879a5cda4f6cec163565f6a62cbcb227 = $this->env->getExtension("native_profiler");
        $__internal_b143e7694b280668db77b58c629294c7879a5cda4f6cec163565f6a62cbcb227->enter($__internal_b143e7694b280668db77b58c629294c7879a5cda4f6cec163565f6a62cbcb227_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_b143e7694b280668db77b58c629294c7879a5cda4f6cec163565f6a62cbcb227->leave($__internal_b143e7694b280668db77b58c629294c7879a5cda4f6cec163565f6a62cbcb227_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_f5dd36a82ce7ccad9adc1627f5be9a844efa5252094b953edc7ae74809f19eb2 = $this->env->getExtension("native_profiler");
        $__internal_f5dd36a82ce7ccad9adc1627f5be9a844efa5252094b953edc7ae74809f19eb2->enter($__internal_f5dd36a82ce7ccad9adc1627f5be9a844efa5252094b953edc7ae74809f19eb2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("TwigBundle:Exception:exception.html.twig", "TwigBundle:Exception:exception_full.html.twig", 12)->display($context);
        
        $__internal_f5dd36a82ce7ccad9adc1627f5be9a844efa5252094b953edc7ae74809f19eb2->leave($__internal_f5dd36a82ce7ccad9adc1627f5be9a844efa5252094b953edc7ae74809f19eb2_prof);

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
