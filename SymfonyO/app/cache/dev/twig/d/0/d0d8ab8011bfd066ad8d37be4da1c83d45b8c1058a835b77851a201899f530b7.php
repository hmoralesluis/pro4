<?php

/* TwigBundle:Exception:traces.txt.twig */
class __TwigTemplate_d0d8ab8011bfd066ad8d37be4da1c83d45b8c1058a835b77851a201899f530b7 extends Twig_Template
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
        $__internal_518561460ede4858ebc454a9d28eaeed1d09bf17062e06b033d073c3eec3cd45 = $this->env->getExtension("native_profiler");
        $__internal_518561460ede4858ebc454a9d28eaeed1d09bf17062e06b033d073c3eec3cd45->enter($__internal_518561460ede4858ebc454a9d28eaeed1d09bf17062e06b033d073c3eec3cd45_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:traces.txt.twig"));

        // line 1
        if (twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "exception"), "trace", array()))) {
            // line 2
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "exception"), "trace", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["trace"]) {
                // line 3
                $this->loadTemplate("TwigBundle:Exception:trace.txt.twig", "TwigBundle:Exception:traces.txt.twig", 3)->display(array("trace" => $context["trace"]));
                // line 4
                echo "
";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['trace'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        
        $__internal_518561460ede4858ebc454a9d28eaeed1d09bf17062e06b033d073c3eec3cd45->leave($__internal_518561460ede4858ebc454a9d28eaeed1d09bf17062e06b033d073c3eec3cd45_prof);

    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:traces.txt.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  30 => 4,  28 => 3,  24 => 2,  22 => 1,);
    }
}
