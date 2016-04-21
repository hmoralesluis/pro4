<?php

/* TwigBundle:Exception:traces.txt.twig */
class __TwigTemplate_d79cfb06763580b133acb881637905a61e7923109b00373bbafb57ba907cf4dd extends Twig_Template
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
        $__internal_caa31807d414900374cca3025aaaf23167baf5f5702873c3602d69974ab2ea3d = $this->env->getExtension("native_profiler");
        $__internal_caa31807d414900374cca3025aaaf23167baf5f5702873c3602d69974ab2ea3d->enter($__internal_caa31807d414900374cca3025aaaf23167baf5f5702873c3602d69974ab2ea3d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:traces.txt.twig"));

        // line 1
        if (twig_length_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "trace", array()))) {
            // line 2
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "trace", array()));
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
        
        $__internal_caa31807d414900374cca3025aaaf23167baf5f5702873c3602d69974ab2ea3d->leave($__internal_caa31807d414900374cca3025aaaf23167baf5f5702873c3602d69974ab2ea3d_prof);

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
