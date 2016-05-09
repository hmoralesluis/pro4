<?php

/* @WebProfiler/Collector/router.html.twig */
class __TwigTemplate_1cda178179bb5023fb992a173809d327b9ed8702b001f6f7e38b61162656add7 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "@WebProfiler/Collector/router.html.twig", 1);
        $this->blocks = array(
            'toolbar' => array($this, 'block_toolbar'),
            'menu' => array($this, 'block_menu'),
            'panel' => array($this, 'block_panel'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@WebProfiler/Profiler/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_42433e1e424ded7ab0d8eff06d6561e150d014eb49ee9afb4f359f034c55dd21 = $this->env->getExtension("native_profiler");
        $__internal_42433e1e424ded7ab0d8eff06d6561e150d014eb49ee9afb4f359f034c55dd21->enter($__internal_42433e1e424ded7ab0d8eff06d6561e150d014eb49ee9afb4f359f034c55dd21_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_42433e1e424ded7ab0d8eff06d6561e150d014eb49ee9afb4f359f034c55dd21->leave($__internal_42433e1e424ded7ab0d8eff06d6561e150d014eb49ee9afb4f359f034c55dd21_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_69b1523dfea68c19694168954e2351cd3149b70b189f6de210d140609de2cf37 = $this->env->getExtension("native_profiler");
        $__internal_69b1523dfea68c19694168954e2351cd3149b70b189f6de210d140609de2cf37->enter($__internal_69b1523dfea68c19694168954e2351cd3149b70b189f6de210d140609de2cf37_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_69b1523dfea68c19694168954e2351cd3149b70b189f6de210d140609de2cf37->leave($__internal_69b1523dfea68c19694168954e2351cd3149b70b189f6de210d140609de2cf37_prof);

    }

    // line 6
    public function block_menu($context, array $blocks = array())
    {
        $__internal_9f12bda1c31b5b40c256e3e5f0498ce0b8fc30069901ae093977bfecffde3622 = $this->env->getExtension("native_profiler");
        $__internal_9f12bda1c31b5b40c256e3e5f0498ce0b8fc30069901ae093977bfecffde3622->enter($__internal_9f12bda1c31b5b40c256e3e5f0498ce0b8fc30069901ae093977bfecffde3622_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 7
        echo "<span class=\"label\">
    <span class=\"icon\"><svg width=\"32\" height=\"32\" xmlns=\"http://www.w3.org/2000/svg\" version=\"1.1\" x=\"0px\" y=\"0px\" viewBox=\"0 0 32 32\" enable-background=\"new 0 0 32 32\" xml:space=\"preserve\"><g><path fill=\"#3F3F3F\" d=\"M15 2c-1.1 0-2 0.9-2 2v25c0 1.1 0.9 2 2 2s2-0.9 2-2V4C17 2.9 16.1 2 15 2z\"/><path fill=\"#3F3F3F\" d=\"M30.7 8.2l-2.9-2.9C27.6 5.1 27.3 5 27 5h0h0h-9v8h9c0.3 0 0.6-0.1 0.8-0.3l2.9-2.9 C31.1 9.4 31.1 8.6 30.7 8.2z\"/><path fill=\"#3F3F3F\" d=\"M5 8L5 8C4.7 8 4.4 8.1 4.2 8.3l-2.9 2.9c-0.4 0.4-0.4 1.1 0 1.6l2.9 2.9C4.4 15.9 4.7 16 5 16h7V8H5L5 8z\"/><path fill=\"#3F3F3F\" d=\"M24.8 16.2c-0.2-0.2-0.3-0.2-0.5-0.2h0h0H18v6h6.2c0.2 0 0.4-0.1 0.5-0.2l2-2.2c0.3-0.3 0.3-0.9 0-1.2 L24.8 16.2z\"/></g></svg></span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_9f12bda1c31b5b40c256e3e5f0498ce0b8fc30069901ae093977bfecffde3622->leave($__internal_9f12bda1c31b5b40c256e3e5f0498ce0b8fc30069901ae093977bfecffde3622_prof);

    }

    // line 13
    public function block_panel($context, array $blocks = array())
    {
        $__internal_9eabe46d259caef595746a759bfd686f4bc6388ec1d408548ec5170eb08b5bc0 = $this->env->getExtension("native_profiler");
        $__internal_9eabe46d259caef595746a759bfd686f4bc6388ec1d408548ec5170eb08b5bc0->enter($__internal_9eabe46d259caef595746a759bfd686f4bc6388ec1d408548ec5170eb08b5bc0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 14
        echo "    ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('routing')->getPath("_profiler_router", array("token" => $this->getContext($context, "token"))));
        echo "
";
        
        $__internal_9eabe46d259caef595746a759bfd686f4bc6388ec1d408548ec5170eb08b5bc0->leave($__internal_9eabe46d259caef595746a759bfd686f4bc6388ec1d408548ec5170eb08b5bc0_prof);

    }

    public function getTemplateName()
    {
        return "@WebProfiler/Collector/router.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  70 => 14,  64 => 13,  53 => 7,  47 => 6,  36 => 3,  11 => 1,);
    }
}
