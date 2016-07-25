<?php

/* FrontBundle:Homepage:homepage.html.twig */
class __TwigTemplate_ac3e818282ab8bda6e171f3d94fba2abc47032527dda305c7ce96093997372c6 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("FrontBundle::layout.html.twig", "FrontBundle:Homepage:homepage.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "FrontBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_244793b3fbac55506a920407d3423aa66b5579d5ff96e4b69833e3b480039709 = $this->env->getExtension("native_profiler");
        $__internal_244793b3fbac55506a920407d3423aa66b5579d5ff96e4b69833e3b480039709->enter($__internal_244793b3fbac55506a920407d3423aa66b5579d5ff96e4b69833e3b480039709_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "FrontBundle:Homepage:homepage.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_244793b3fbac55506a920407d3423aa66b5579d5ff96e4b69833e3b480039709->leave($__internal_244793b3fbac55506a920407d3423aa66b5579d5ff96e4b69833e3b480039709_prof);

    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $__internal_d0e1444349d1c16cc29ee19c6fcdf62afb91d72105329b9b56ed27aab9d09ee1 = $this->env->getExtension("native_profiler");
        $__internal_d0e1444349d1c16cc29ee19c6fcdf62afb91d72105329b9b56ed27aab9d09ee1->enter($__internal_d0e1444349d1c16cc29ee19c6fcdf62afb91d72105329b9b56ed27aab9d09ee1_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Homepage";
        
        $__internal_d0e1444349d1c16cc29ee19c6fcdf62afb91d72105329b9b56ed27aab9d09ee1->leave($__internal_d0e1444349d1c16cc29ee19c6fcdf62afb91d72105329b9b56ed27aab9d09ee1_prof);

    }

    // line 5
    public function block_body($context, array $blocks = array())
    {
        $__internal_6cd66565160061139a0c2bfd10aa581efc1993620b1f0012dc4cf51f602ecc0d = $this->env->getExtension("native_profiler");
        $__internal_6cd66565160061139a0c2bfd10aa581efc1993620b1f0012dc4cf51f602ecc0d->enter($__internal_6cd66565160061139a0c2bfd10aa581efc1993620b1f0012dc4cf51f602ecc0d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 6
        echo "    <div role=\"main\" class=\"main\">
        <div id=\"content\" class=\"content full\">
            ";
        // line 8
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(((array_key_exists("blocks", $context)) ? (_twig_default_filter((isset($context["blocks"]) ? $context["blocks"] : $this->getContext($context, "blocks")), array())) : (array())));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        foreach ($context['_seq'] as $context["_key"] => $context["block"]) {
            if ($this->getAttribute($context["block"], "active", array())) {
                // line 9
                echo "                ";
                try {
                    $this->loadTemplate((("FrontBundle:Blocks:" . $this->getAttribute($context["block"], "name", array())) . ".html.twig"), "FrontBundle:Homepage:homepage.html.twig", 9)->display($context);
                } catch (Twig_Error_Loader $e) {
                    // ignore missing template
                }

                // line 10
                echo "            ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['block'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 11
        echo "        </div>
    </div>
";
        
        $__internal_6cd66565160061139a0c2bfd10aa581efc1993620b1f0012dc4cf51f602ecc0d->leave($__internal_6cd66565160061139a0c2bfd10aa581efc1993620b1f0012dc4cf51f602ecc0d_prof);

    }

    // line 15
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_f30fcead19e144ca34944c27ac7707974656a4597e4ac8710e00bc06e5665978 = $this->env->getExtension("native_profiler");
        $__internal_f30fcead19e144ca34944c27ac7707974656a4597e4ac8710e00bc06e5665978->enter($__internal_f30fcead19e144ca34944c27ac7707974656a4597e4ac8710e00bc06e5665978_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 16
        echo "    <script type=\"text/javascript\">
        \$(document).ready(function () {
            \$(\".signin\").click(function (e) {
                e.preventDefault();
                \$(\"fieldset#signin_menu\").toggle();
                \$(\".signin\").toggleClass(\"menu-open\");
                if (\$('.signin').hasClass('menu-open')) {
                    \$('.signin i.icon-angle-up').removeClass('icon-angle-up').addClass('icon-angle-down');
                } else {
                    \$('.signin i.icon-angle-down').removeClass('icon-angle-down').addClass('icon-angle-up');
                }
            });

            \$(\"fieldset#signin_menu\").mouseup(function () {
                return false
            });
            \$(document).mouseup(function (e) {
                if (\$(e.target).parent(\"a.signin\").length == 0) {
                    \$(\".signin\").removeClass(\"menu-open\");
                    \$(\"fieldset#signin_menu\").hide();
                    \$('.signin i.icon-angle-down').removeClass('icon-angle-down').addClass('icon-angle-up');
                }
            });

        });
    </script>
";
        
        $__internal_f30fcead19e144ca34944c27ac7707974656a4597e4ac8710e00bc06e5665978->leave($__internal_f30fcead19e144ca34944c27ac7707974656a4597e4ac8710e00bc06e5665978_prof);

    }

    public function getTemplateName()
    {
        return "FrontBundle:Homepage:homepage.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  102 => 16,  96 => 15,  87 => 11,  77 => 10,  69 => 9,  58 => 8,  54 => 6,  48 => 5,  36 => 3,  11 => 1,);
    }
}
