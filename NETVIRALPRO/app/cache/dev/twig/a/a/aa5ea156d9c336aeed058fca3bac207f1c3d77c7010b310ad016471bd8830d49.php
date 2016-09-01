<?php

/* AdminBundle:Software:new.html.twig */
class __TwigTemplate_aa5ea156d9c336aeed058fca3bac207f1c3d77c7010b310ad016471bd8830d49 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("AdminBundle::layout.html.twig", "AdminBundle:Software:new.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "AdminBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_0c9e2c9dfb9ac6c38828b55e52f1614a9925b740661366feaddaad249dde8548 = $this->env->getExtension("native_profiler");
        $__internal_0c9e2c9dfb9ac6c38828b55e52f1614a9925b740661366feaddaad249dde8548->enter($__internal_0c9e2c9dfb9ac6c38828b55e52f1614a9925b740661366feaddaad249dde8548_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "AdminBundle:Software:new.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_0c9e2c9dfb9ac6c38828b55e52f1614a9925b740661366feaddaad249dde8548->leave($__internal_0c9e2c9dfb9ac6c38828b55e52f1614a9925b740661366feaddaad249dde8548_prof);

    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $__internal_e3dacaec35ffe04715ac30c718154cc1b1b5006b6b7792c1bc19d61d399b6079 = $this->env->getExtension("native_profiler");
        $__internal_e3dacaec35ffe04715ac30c718154cc1b1b5006b6b7792c1bc19d61d399b6079->enter($__internal_e3dacaec35ffe04715ac30c718154cc1b1b5006b6b7792c1bc19d61d399b6079_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Registrar Software";
        
        $__internal_e3dacaec35ffe04715ac30c718154cc1b1b5006b6b7792c1bc19d61d399b6079->leave($__internal_e3dacaec35ffe04715ac30c718154cc1b1b5006b6b7792c1bc19d61d399b6079_prof);

    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        $__internal_912f1deea02a214103e8f755946199f6f2fe8acd447e9c26c48cff93b3133e7d = $this->env->getExtension("native_profiler");
        $__internal_912f1deea02a214103e8f755946199f6f2fe8acd447e9c26c48cff93b3133e7d->enter($__internal_912f1deea02a214103e8f755946199f6f2fe8acd447e9c26c48cff93b3133e7d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        // line 6
        echo "    <div class=\"portlet box yellow\">
        <div class=\"portlet-title\">
            <div class=\"caption\"><i class=\"icon-list\"></i>Registro de Software</div>
            <div class=\"tools\">
                <a href=\"javascript:;\" class=\"collapse\"></a>
                <a href=\"#portlet-config\" data-toggle=\"modal\" class=\"config\"></a>
                <a href=\"javascript:;\" class=\"reload\"></a>
                <a href=\"javascript:;\" class=\"remove\"></a>
            </div>
        </div>
        <div class=\"portlet-body\">
            <div class=\"clearfix\">
                <div class=\"btn-group\">
                    <a href=\"";
        // line 19
        echo $this->env->getExtension('routing')->getPath("management_software");
        echo "\" class=\"btn green\">
                        Volver al listado
                    </a>
                </div>
            </div>
            ";
        // line 24
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form');
        echo "
        </div>
    </div>
";
        
        $__internal_912f1deea02a214103e8f755946199f6f2fe8acd447e9c26c48cff93b3133e7d->leave($__internal_912f1deea02a214103e8f755946199f6f2fe8acd447e9c26c48cff93b3133e7d_prof);

    }

    // line 29
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_b3d84ea71e25c2db4e53415de42cc304bf021086cafa12baf905840408ec5667 = $this->env->getExtension("native_profiler");
        $__internal_b3d84ea71e25c2db4e53415de42cc304bf021086cafa12baf905840408ec5667->enter($__internal_b3d84ea71e25c2db4e53415de42cc304bf021086cafa12baf905840408ec5667_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 30
        echo "    <script>
        ";
        // line 31
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "flashbag", array()), "get", array(0 => "notice"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 32
            echo "        Codes.showMessage('Información', '";
            echo twig_escape_filter($this->env, $context["flashMessage"], "html", null, true);
            echo "');
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 34
        echo "    </script>
";
        
        $__internal_b3d84ea71e25c2db4e53415de42cc304bf021086cafa12baf905840408ec5667->leave($__internal_b3d84ea71e25c2db4e53415de42cc304bf021086cafa12baf905840408ec5667_prof);

    }

    public function getTemplateName()
    {
        return "AdminBundle:Software:new.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  110 => 34,  101 => 32,  97 => 31,  94 => 30,  88 => 29,  77 => 24,  69 => 19,  54 => 6,  48 => 5,  36 => 3,  11 => 1,);
    }
}
