<?php

/* WebProfilerBundle:Profiler:toolbar_item.html.twig */
class __TwigTemplate_e56d0a9b17cee2df8a2a800a41e93d7f981f484df48b77c401a911f7b94e84fe extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_0d3a61de1939df62e57c49487d4df96eac38a328e264af98c8c62e9dd403107b = $this->env->getExtension("native_profiler");
        $__internal_0d3a61de1939df62e57c49487d4df96eac38a328e264af98c8c62e9dd403107b->enter($__internal_0d3a61de1939df62e57c49487d4df96eac38a328e264af98c8c62e9dd403107b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "WebProfilerBundle:Profiler:toolbar_item.html.twig"));

        // line 1
        if ($this->getContext($context, "link")) {
            // line 2
            echo "    ";
            ob_start();
            // line 3
            echo "        <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_profiler", array("token" => $this->getContext($context, "token"), "panel" => $this->getContext($context, "name"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getContext($context, "icon"), "html", null, true);
            echo "</a>
    ";
            $context["icon"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        }
        // line 6
        echo "<div class=\"sf-toolbar-block\">
     <div class=\"sf-toolbar-icon\">";
        // line 7
        echo twig_escape_filter($this->env, ((array_key_exists("icon", $context)) ? (_twig_default_filter($this->getContext($context, "icon"), "")) : ("")), "html", null, true);
        echo "</div>
     <div class=\"sf-toolbar-info\">";
        // line 8
        echo twig_escape_filter($this->env, ((array_key_exists("text", $context)) ? (_twig_default_filter($this->getContext($context, "text"), "")) : ("")), "html", null, true);
        echo "</div>
</div>
";
        
        $__internal_0d3a61de1939df62e57c49487d4df96eac38a328e264af98c8c62e9dd403107b->leave($__internal_0d3a61de1939df62e57c49487d4df96eac38a328e264af98c8c62e9dd403107b_prof);

    }

    public function getTemplateName()
    {
        return "WebProfilerBundle:Profiler:toolbar_item.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  43 => 8,  39 => 7,  36 => 6,  27 => 3,  24 => 2,  22 => 1,);
    }
}
