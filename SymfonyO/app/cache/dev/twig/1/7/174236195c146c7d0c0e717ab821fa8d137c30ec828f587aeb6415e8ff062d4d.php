<?php

/* AdminBundle:Home:home.html.twig */
class __TwigTemplate_174236195c146c7d0c0e717ab821fa8d137c30ec828f587aeb6415e8ff062d4d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("AdminBundle::layout.html.twig", "AdminBundle:Home:home.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'description' => array($this, 'block_description'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "AdminBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_31bc227c7ae91bdc9c0dfad8bce5f4ee2c587f7e130c5086d36179aa2a0de7b1 = $this->env->getExtension("native_profiler");
        $__internal_31bc227c7ae91bdc9c0dfad8bce5f4ee2c587f7e130c5086d36179aa2a0de7b1->enter($__internal_31bc227c7ae91bdc9c0dfad8bce5f4ee2c587f7e130c5086d36179aa2a0de7b1_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "AdminBundle:Home:home.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_31bc227c7ae91bdc9c0dfad8bce5f4ee2c587f7e130c5086d36179aa2a0de7b1->leave($__internal_31bc227c7ae91bdc9c0dfad8bce5f4ee2c587f7e130c5086d36179aa2a0de7b1_prof);

    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $__internal_757a703d8e6c7c2c3c4a6961d2292501ffb454a5bbbc7262b3d2f9206b5ea68b = $this->env->getExtension("native_profiler");
        $__internal_757a703d8e6c7c2c3c4a6961d2292501ffb454a5bbbc7262b3d2f9206b5ea68b->enter($__internal_757a703d8e6c7c2c3c4a6961d2292501ffb454a5bbbc7262b3d2f9206b5ea68b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Home";
        
        $__internal_757a703d8e6c7c2c3c4a6961d2292501ffb454a5bbbc7262b3d2f9206b5ea68b->leave($__internal_757a703d8e6c7c2c3c4a6961d2292501ffb454a5bbbc7262b3d2f9206b5ea68b_prof);

    }

    // line 5
    public function block_description($context, array $blocks = array())
    {
        $__internal_63e2e8b9722a972b1fff82ddf0fbf37bf5ae6991ee5150231010c890aa51645d = $this->env->getExtension("native_profiler");
        $__internal_63e2e8b9722a972b1fff82ddf0fbf37bf5ae6991ee5150231010c890aa51645d->enter($__internal_63e2e8b9722a972b1fff82ddf0fbf37bf5ae6991ee5150231010c890aa51645d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "description"));

        echo "Manage your bussines";
        
        $__internal_63e2e8b9722a972b1fff82ddf0fbf37bf5ae6991ee5150231010c890aa51645d->leave($__internal_63e2e8b9722a972b1fff82ddf0fbf37bf5ae6991ee5150231010c890aa51645d_prof);

    }

    public function getTemplateName()
    {
        return "AdminBundle:Home:home.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  47 => 5,  35 => 3,  11 => 1,);
    }
}
