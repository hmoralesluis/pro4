<?php

/* AdminBundle:Home:home.html.twig */
class __TwigTemplate_f92d302185179e5ae2db390e0bea26b874bb6c902ef4645fbdf791ea8d2aee06 extends Twig_Template
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
        $__internal_c8ac07a5bec24e20aed99b55ac44d31ee0104d98eaf17d1d7096e27faa56a1fc = $this->env->getExtension("native_profiler");
        $__internal_c8ac07a5bec24e20aed99b55ac44d31ee0104d98eaf17d1d7096e27faa56a1fc->enter($__internal_c8ac07a5bec24e20aed99b55ac44d31ee0104d98eaf17d1d7096e27faa56a1fc_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "AdminBundle:Home:home.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_c8ac07a5bec24e20aed99b55ac44d31ee0104d98eaf17d1d7096e27faa56a1fc->leave($__internal_c8ac07a5bec24e20aed99b55ac44d31ee0104d98eaf17d1d7096e27faa56a1fc_prof);

    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $__internal_e4ab4ec93156f4dbae33fcec890e8e48cd6f8026fdf5380d2e844f1a7f27487b = $this->env->getExtension("native_profiler");
        $__internal_e4ab4ec93156f4dbae33fcec890e8e48cd6f8026fdf5380d2e844f1a7f27487b->enter($__internal_e4ab4ec93156f4dbae33fcec890e8e48cd6f8026fdf5380d2e844f1a7f27487b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Home";
        
        $__internal_e4ab4ec93156f4dbae33fcec890e8e48cd6f8026fdf5380d2e844f1a7f27487b->leave($__internal_e4ab4ec93156f4dbae33fcec890e8e48cd6f8026fdf5380d2e844f1a7f27487b_prof);

    }

    // line 5
    public function block_description($context, array $blocks = array())
    {
        $__internal_217e337a79777450ccad5ca3036546cb6229406a176c75003fa8d4b42cabc234 = $this->env->getExtension("native_profiler");
        $__internal_217e337a79777450ccad5ca3036546cb6229406a176c75003fa8d4b42cabc234->enter($__internal_217e337a79777450ccad5ca3036546cb6229406a176c75003fa8d4b42cabc234_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "description"));

        echo "Manage your bussines";
        
        $__internal_217e337a79777450ccad5ca3036546cb6229406a176c75003fa8d4b42cabc234->leave($__internal_217e337a79777450ccad5ca3036546cb6229406a176c75003fa8d4b42cabc234_prof);

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
