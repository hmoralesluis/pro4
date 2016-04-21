<?php

/* TwigBundle:Exception:trace.txt.twig */
class __TwigTemplate_a5df0f9a599adef4120b7a253756f67988eac5a476fc50da7043ec558a0a12e9 extends Twig_Template
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
        $__internal_c24afc8c8e338c4dc4381af9e8d5ffc23f2f249826aa2a28c5688895126b14ba = $this->env->getExtension("native_profiler");
        $__internal_c24afc8c8e338c4dc4381af9e8d5ffc23f2f249826aa2a28c5688895126b14ba->enter($__internal_c24afc8c8e338c4dc4381af9e8d5ffc23f2f249826aa2a28c5688895126b14ba_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:trace.txt.twig"));

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
        
        $__internal_c24afc8c8e338c4dc4381af9e8d5ffc23f2f249826aa2a28c5688895126b14ba->leave($__internal_c24afc8c8e338c4dc4381af9e8d5ffc23f2f249826aa2a28c5688895126b14ba_prof);

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
