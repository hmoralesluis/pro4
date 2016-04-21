<?php

/* @Admin/Macro/macros.html.twig */
class __TwigTemplate_02df90fbc7406e694404705354b8a2f497f59c13004da005d012ad1733ba2546 extends Twig_Template
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
        // line 1
        echo "﻿";
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
            // line 2
            echo "    ";
            $context["_hit"] = false;
            // line 3
            echo "    ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["objects"]) ? $context["objects"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["_item"]) {
                // line 4
                echo "        ";
                $context["_value"] = ((((null != $this->getAttribute($context["_item"], "AsociatedOption", array())) && (null != $this->getAttribute($this->getAttribute($context["_item"], "AsociatedOption", array()), "id", array())))) ? ($this->getAttribute($this->getAttribute($context["_item"], "AsociatedOption", array()), "id", array())) : (null));
                // line 5
                echo "        ";
                if (((isset($context["parent"]) ? $context["parent"] : null) == (isset($context["_value"]) ? $context["_value"] : null))) {
                    // line 6
                    echo "            ";
                    if ( !(isset($context["_hit"]) ? $context["_hit"] : null)) {
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
            if ((isset($context["_hit"]) ? $context["_hit"] : null)) {
                // line 21
                echo "        </ul>
    ";
            }
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
        return array (  102 => 21,  99 => 20,  93 => 19,  87 => 16,  84 => 15,  80 => 14,  76 => 13,  72 => 12,  62 => 11,  59 => 10,  56 => 9,  54 => 8,  51 => 7,  48 => 6,  45 => 5,  42 => 4,  37 => 3,  34 => 2,  19 => 1,);
    }
}
