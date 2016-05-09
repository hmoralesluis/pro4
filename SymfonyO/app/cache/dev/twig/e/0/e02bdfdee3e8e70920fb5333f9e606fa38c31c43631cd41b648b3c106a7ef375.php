<?php

/* TwigBundle:Exception:trace.txt.twig */
class __TwigTemplate_e02bdfdee3e8e70920fb5333f9e606fa38c31c43631cd41b648b3c106a7ef375 extends Twig_Template
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
        $__internal_0e29eede3ffd62f8fa11b04ecfe55f5668cb09c5978b2eb52b221ae1777b468c = $this->env->getExtension("native_profiler");
        $__internal_0e29eede3ffd62f8fa11b04ecfe55f5668cb09c5978b2eb52b221ae1777b468c->enter($__internal_0e29eede3ffd62f8fa11b04ecfe55f5668cb09c5978b2eb52b221ae1777b468c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:trace.txt.twig"));

        // line 1
        if ($this->getAttribute($this->getContext($context, "trace"), "function", array())) {
            // line 2
            echo "    at ";
            echo (($this->getAttribute($this->getContext($context, "trace"), "class", array()) . $this->getAttribute($this->getContext($context, "trace"), "type", array())) . $this->getAttribute($this->getContext($context, "trace"), "function", array()));
            echo "(";
            echo $this->env->getExtension('code')->formatArgsAsText($this->getAttribute($this->getContext($context, "trace"), "args", array()));
            echo ")
";
        } else {
            // line 4
            echo "    at n/a
";
        }
        // line 6
        if (($this->getAttribute($this->getContext($context, "trace", true), "file", array(), "any", true, true) && $this->getAttribute($this->getContext($context, "trace", true), "line", array(), "any", true, true))) {
            // line 7
            echo "        in ";
            echo $this->getAttribute($this->getContext($context, "trace"), "file", array());
            echo " line ";
            echo $this->getAttribute($this->getContext($context, "trace"), "line", array());
            echo "
";
        }
        
        $__internal_0e29eede3ffd62f8fa11b04ecfe55f5668cb09c5978b2eb52b221ae1777b468c->leave($__internal_0e29eede3ffd62f8fa11b04ecfe55f5668cb09c5978b2eb52b221ae1777b468c_prof);

    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:trace.txt.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  38 => 7,  36 => 6,  32 => 4,  24 => 2,  22 => 1,);
    }
}
