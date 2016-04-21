<?php

/* TwigBundle:Exception:exception_full.html.twig */
class __TwigTemplate_a42cfc8514784befa7c8928fabfe12e78777cca3ddbfd7d18c75d9b1ab77c444 extends Twig_Template
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
        $__internal_6465ccf878ebf2ea300714da63edf8349e7f83c4dfbdc81e4db7837edf0ba40e = $this->env->getExtension("native_profiler");
        $__internal_6465ccf878ebf2ea300714da63edf8349e7f83c4dfbdc81e4db7837edf0ba40e->enter($__internal_6465ccf878ebf2ea300714da63edf8349e7f83c4dfbdc81e4db7837edf0ba40e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_6465ccf878ebf2ea300714da63edf8349e7f83c4dfbdc81e4db7837edf0ba40e->leave($__internal_6465ccf878ebf2ea300714da63edf8349e7f83c4dfbdc81e4db7837edf0ba40e_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_624c0634c5309b01dcf01e66091b891877d1694f0f61454aa2dd64202505c768 = $this->env->getExtension("native_profiler");
        $__internal_624c0634c5309b01dcf01e66091b891877d1694f0f61454aa2dd64202505c768->enter($__internal_624c0634c5309b01dcf01e66091b891877d1694f0f61454aa2dd64202505c768_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('request')->generateAbsoluteUrl($this->env->getExtension('asset')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_624c0634c5309b01dcf01e66091b891877d1694f0f61454aa2dd64202505c768->leave($__internal_624c0634c5309b01dcf01e66091b891877d1694f0f61454aa2dd64202505c768_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_fa92e7de3092b2c7752278a78b6d536e8f694033f261014e44e174303dd3b500 = $this->env->getExtension("native_profiler");
        $__internal_fa92e7de3092b2c7752278a78b6d536e8f694033f261014e44e174303dd3b500->enter($__internal_fa92e7de3092b2c7752278a78b6d536e8f694033f261014e44e174303dd3b500_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "exception"), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, $this->getContext($context, "status_code"), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getContext($context, "status_text"), "html", null, true);
        echo ")
";
        
        $__internal_fa92e7de3092b2c7752278a78b6d536e8f694033f261014e44e174303dd3b500->leave($__internal_fa92e7de3092b2c7752278a78b6d536e8f694033f261014e44e174303dd3b500_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_4451a73065d52d13b20b2caac7d23e2f95a2ee2568dc67a162d2f0f3efb28dfe = $this->env->getExtension("native_profiler");
        $__internal_4451a73065d52d13b20b2caac7d23e2f95a2ee2568dc67a162d2f0f3efb28dfe->enter($__internal_4451a73065d52d13b20b2caac7d23e2f95a2ee2568dc67a162d2f0f3efb28dfe_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("TwigBundle:Exception:exception.html.twig", "TwigBundle:Exception:exception_full.html.twig", 12)->display($context);
        
        $__internal_4451a73065d52d13b20b2caac7d23e2f95a2ee2568dc67a162d2f0f3efb28dfe->leave($__internal_4451a73065d52d13b20b2caac7d23e2f95a2ee2568dc67a162d2f0f3efb28dfe_prof);

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
