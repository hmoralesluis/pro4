<?php

/* @Admin/Macro/macros.html.twig */
class __TwigTemplate_d84e621e02eb3e0a9a17faf81df85800d9bc01f5474f766bffab5734269b3b04 extends Twig_Template
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
        $__internal_71d0b24e42f7849b19e9dc190eda7cb9fe057ec9e3181d73effb2cf84d1810c0 = $this->env->getExtension("native_profiler");
        $__internal_71d0b24e42f7849b19e9dc190eda7cb9fe057ec9e3181d73effb2cf84d1810c0->enter($__internal_71d0b24e42f7849b19e9dc190eda7cb9fe057ec9e3181d73effb2cf84d1810c0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Admin/Macro/macros.html.twig"));

        // line 1
        echo "﻿";
        
        $__internal_71d0b24e42f7849b19e9dc190eda7cb9fe057ec9e3181d73effb2cf84d1810c0->leave($__internal_71d0b24e42f7849b19e9dc190eda7cb9fe057ec9e3181d73effb2cf84d1810c0_prof);

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
            $__internal_4f95f79337137658e8b856da99f16dd41c4b7fc602a3b3f00b628b930d7374b2 = $this->env->getExtension("native_profiler");
            $__internal_4f95f79337137658e8b856da99f16dd41c4b7fc602a3b3f00b628b930d7374b2->enter($__internal_4f95f79337137658e8b856da99f16dd41c4b7fc602a3b3f00b628b930d7374b2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "macro", "recursiveList"));

            // line 2
            echo "    ";
            $context["_hit"] = false;
            // line 3
            echo "    ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "objects"));
            foreach ($context['_seq'] as $context["_key"] => $context["_item"]) {
                // line 4
                echo "        ";
                $context["_value"] = ((((null != $this->getAttribute($context["_item"], "AsociatedOption", array())) && (null != $this->getAttribute($this->getAttribute($context["_item"], "AsociatedOption", array()), "id", array())))) ? ($this->getAttribute($this->getAttribute($context["_item"], "AsociatedOption", array()), "id", array())) : (null));
                // line 5
                echo "        ";
                if (($this->getContext($context, "parent") == $this->getContext($context, "_value"))) {
                    // line 6
                    echo "            ";
                    if ( !$this->getContext($context, "_hit")) {
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
            if ($this->getContext($context, "_hit")) {
                // line 21
                echo "        </ul>
    ";
            }
            
            $__internal_4f95f79337137658e8b856da99f16dd41c4b7fc602a3b3f00b628b930d7374b2->leave($__internal_4f95f79337137658e8b856da99f16dd41c4b7fc602a3b3f00b628b930d7374b2_prof);

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
