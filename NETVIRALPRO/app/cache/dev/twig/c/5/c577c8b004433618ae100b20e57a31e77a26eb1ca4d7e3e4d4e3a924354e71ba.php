<?php

/* @Admin/Macro/macros.html.twig */
class __TwigTemplate_c577c8b004433618ae100b20e57a31e77a26eb1ca4d7e3e4d4e3a924354e71ba extends Twig_Template
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
        $__internal_e9275d9b691e1b6449906b70cbeadf1ac31dcaa335678ef7490a5092b0123918 = $this->env->getExtension("native_profiler");
        $__internal_e9275d9b691e1b6449906b70cbeadf1ac31dcaa335678ef7490a5092b0123918->enter($__internal_e9275d9b691e1b6449906b70cbeadf1ac31dcaa335678ef7490a5092b0123918_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Admin/Macro/macros.html.twig"));

        // line 1
        echo "﻿";
        
        $__internal_e9275d9b691e1b6449906b70cbeadf1ac31dcaa335678ef7490a5092b0123918->leave($__internal_e9275d9b691e1b6449906b70cbeadf1ac31dcaa335678ef7490a5092b0123918_prof);

    }

    public function getrecursiveList($__objects__ = null, $__parent__ = null)
    {
        $context = $this->env->mergeGlobals(array(
            "objects" => $__objects__,
            "parent" => $__parent__,
        ));

        $blocks = array();

        ob_start();
        try {
            $__internal_7165255287c5025d98d89d9d898167a23f29f467792faf12dbac5d909b8c5c6a = $this->env->getExtension("native_profiler");
            $__internal_7165255287c5025d98d89d9d898167a23f29f467792faf12dbac5d909b8c5c6a->enter($__internal_7165255287c5025d98d89d9d898167a23f29f467792faf12dbac5d909b8c5c6a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "macro", "recursiveList"));

            // line 2
            echo "    ";
            $context["_hit"] = false;
            // line 3
            echo "    ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["objects"]) ? $context["objects"] : $this->getContext($context, "objects")));
            foreach ($context['_seq'] as $context["_key"] => $context["_item"]) {
                // line 4
                echo "        ";
                $context["_value"] = ((((null != $this->getAttribute($context["_item"], "AsociatedOption", array())) && (null != $this->getAttribute($this->getAttribute($context["_item"], "AsociatedOption", array()), "id", array())))) ? ($this->getAttribute($this->getAttribute($context["_item"], "AsociatedOption", array()), "id", array())) : (null));
                // line 5
                echo "        ";
                if (((isset($context["parent"]) ? $context["parent"] : $this->getContext($context, "parent")) == (isset($context["_value"]) ? $context["_value"] : $this->getContext($context, "_value")))) {
                    // line 6
                    echo "            ";
                    if ( !(isset($context["_hit"]) ? $context["_hit"] : $this->getContext($context, "_hit"))) {
                        // line 7
                        echo "                <ul class=\"sub-menu\">
                ";
                        // line 8
                        $context["_hit"] = true;
                        // line 9
                        echo "            ";
                    }
                    // line 10
                    echo "            <li class=\"treeview\">
                <a id=\"";
                    // line 11
                    echo twig_escape_filter($this->env, $this->getAttribute($context["_item"], "id", array()), "html", null, true);
                    echo "\" href=\"";
                    if ($this->getAttribute($context["_item"], "path", array())) {
                        echo $this->env->getExtension('routing')->getPath($this->getAttribute($context["_item"], "path", array()));
                    } else {
                        echo "#";
                    }
                    echo "\">
                    <i class=\"";
                    // line 12
                    echo twig_escape_filter($this->env, $this->getAttribute($context["_item"], "icon", array()), "html", null, true);
                    echo "\"></i>
                    <span class=\"title\">";
                    // line 13
                    echo twig_escape_filter($this->env, $this->getAttribute($context["_item"], "name", array()), "html", null, true);
                    echo "</span>
                    ";
                    // line 14
                    if ((twig_length_filter($this->env, $this->getAttribute($context["_item"], "options", array())) > 0)) {
                        echo "<span class=\"arrow\"></span>";
                    }
                    // line 15
                    echo "                </a>
                ";
                    // line 16
                    echo $this->getAttribute($this, "recursiveList", array(0 => $this->getAttribute($context["_item"], "options", array()), 1 => $this->getAttribute($context["_item"], "id", array())), "method");
                    echo "
            </li>
        ";
                }
                // line 19
                echo "    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['_item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 20
            echo "    ";
            if ((isset($context["_hit"]) ? $context["_hit"] : $this->getContext($context, "_hit"))) {
                // line 21
                echo "        </ul>
    ";
            }
            
            $__internal_7165255287c5025d98d89d9d898167a23f29f467792faf12dbac5d909b8c5c6a->leave($__internal_7165255287c5025d98d89d9d898167a23f29f467792faf12dbac5d909b8c5c6a_prof);

        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "@Admin/Macro/macros.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  111 => 21,  108 => 20,  102 => 19,  96 => 16,  93 => 15,  89 => 14,  85 => 13,  81 => 12,  71 => 11,  68 => 10,  65 => 9,  63 => 8,  60 => 7,  57 => 6,  54 => 5,  51 => 4,  46 => 3,  43 => 2,  22 => 1,);
    }
}
