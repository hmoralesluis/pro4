<?php

/* bootstrap_3_horizontal_layout.html.twig */
class __TwigTemplate_0bc2d7593ab2d5467e8f6e3d4e69c50e869a2878b90bd57871dae697830e5d12 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $_trait_0 = $this->loadTemplate("bootstrap_3_layout.html.twig", "bootstrap_3_horizontal_layout.html.twig", 1);
        // line 1
        if (!$_trait_0->isTraitable()) {
            throw new Twig_Error_Runtime('Template "'."bootstrap_3_layout.html.twig".'" cannot be used as a trait.');
        }
        $_trait_0_blocks = $_trait_0->getBlocks();

        $this->traits = $_trait_0_blocks;

        $this->blocks = array_merge(
            $this->traits,
            array(
                'form_start' => array($this, 'block_form_start'),
                'form_label' => array($this, 'block_form_label'),
                'form_label_class' => array($this, 'block_form_label_class'),
                'form_row' => array($this, 'block_form_row'),
                'checkbox_row' => array($this, 'block_checkbox_row'),
                'radio_row' => array($this, 'block_radio_row'),
                'checkbox_radio_row' => array($this, 'block_checkbox_radio_row'),
                'submit_row' => array($this, 'block_submit_row'),
                'form_group_class' => array($this, 'block_form_group_class'),
            )
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_e85e9a3b2600c913328f1eecef0ff661ec4105acba2a926f2a492f19dcb74eb0 = $this->env->getExtension("native_profiler");
        $__internal_e85e9a3b2600c913328f1eecef0ff661ec4105acba2a926f2a492f19dcb74eb0->enter($__internal_e85e9a3b2600c913328f1eecef0ff661ec4105acba2a926f2a492f19dcb74eb0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "bootstrap_3_horizontal_layout.html.twig"));

        // line 2
        echo "
";
        // line 3
        $this->displayBlock('form_start', $context, $blocks);
        // line 7
        echo "
";
        // line 9
        echo "
";
        // line 10
        $this->displayBlock('form_label', $context, $blocks);
        // line 20
        echo "
";
        // line 21
        $this->displayBlock('form_label_class', $context, $blocks);
        // line 24
        echo "
";
        // line 26
        echo "
";
        // line 27
        $this->displayBlock('form_row', $context, $blocks);
        // line 38
        echo "
";
        // line 39
        $this->displayBlock('checkbox_row', $context, $blocks);
        // line 42
        echo "
";
        // line 43
        $this->displayBlock('radio_row', $context, $blocks);
        // line 46
        echo "
";
        // line 47
        $this->displayBlock('checkbox_radio_row', $context, $blocks);
        // line 58
        echo "
";
        // line 59
        $this->displayBlock('submit_row', $context, $blocks);
        // line 69
        echo "
";
        // line 70
        $this->displayBlock('form_group_class', $context, $blocks);
        
        $__internal_e85e9a3b2600c913328f1eecef0ff661ec4105acba2a926f2a492f19dcb74eb0->leave($__internal_e85e9a3b2600c913328f1eecef0ff661ec4105acba2a926f2a492f19dcb74eb0_prof);

    }

    // line 3
    public function block_form_start($context, array $blocks = array())
    {
        $__internal_659238f260f67cb9b3862f1a93832e6f77a52027fb7e95ab084a748663a23963 = $this->env->getExtension("native_profiler");
        $__internal_659238f260f67cb9b3862f1a93832e6f77a52027fb7e95ab084a748663a23963->enter($__internal_659238f260f67cb9b3862f1a93832e6f77a52027fb7e95ab084a748663a23963_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "form_start"));

        // line 4
        $context["attr"] = twig_array_merge((isset($context["attr"]) ? $context["attr"] : $this->getContext($context, "attr")), array("class" => trim(((($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "class", array()), "")) : ("")) . " form-horizontal"))));
        // line 5
        $this->displayParentBlock("form_start", $context, $blocks);
        
        $__internal_659238f260f67cb9b3862f1a93832e6f77a52027fb7e95ab084a748663a23963->leave($__internal_659238f260f67cb9b3862f1a93832e6f77a52027fb7e95ab084a748663a23963_prof);

    }

    // line 10
    public function block_form_label($context, array $blocks = array())
    {
        $__internal_780d1e465b98dbe46dad9c4c9ebd2a519c594b2d317be77f32419a3b032e2dcd = $this->env->getExtension("native_profiler");
        $__internal_780d1e465b98dbe46dad9c4c9ebd2a519c594b2d317be77f32419a3b032e2dcd->enter($__internal_780d1e465b98dbe46dad9c4c9ebd2a519c594b2d317be77f32419a3b032e2dcd_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "form_label"));

        // line 11
        ob_start();
        // line 12
        echo "    ";
        if (((isset($context["label"]) ? $context["label"] : $this->getContext($context, "label")) === false)) {
            // line 13
            echo "        <div class=\"";
            $this->displayBlock("form_label_class", $context, $blocks);
            echo "\"></div>
    ";
        } else {
            // line 15
            echo "        ";
            $context["label_attr"] = twig_array_merge((isset($context["label_attr"]) ? $context["label_attr"] : $this->getContext($context, "label_attr")), array("class" => trim((((($this->getAttribute((isset($context["label_attr"]) ? $context["label_attr"] : null), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["label_attr"]) ? $context["label_attr"] : null), "class", array()), "")) : ("")) . " ") . $this->renderBlock("form_label_class", $context, $blocks)))));
            // line 16
            $this->displayParentBlock("form_label", $context, $blocks);
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        
        $__internal_780d1e465b98dbe46dad9c4c9ebd2a519c594b2d317be77f32419a3b032e2dcd->leave($__internal_780d1e465b98dbe46dad9c4c9ebd2a519c594b2d317be77f32419a3b032e2dcd_prof);

    }

    // line 21
    public function block_form_label_class($context, array $blocks = array())
    {
        $__internal_832eb2461963b746afece872d231873c351a9218ba32f4a4464af8f269a84c99 = $this->env->getExtension("native_profiler");
        $__internal_832eb2461963b746afece872d231873c351a9218ba32f4a4464af8f269a84c99->enter($__internal_832eb2461963b746afece872d231873c351a9218ba32f4a4464af8f269a84c99_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "form_label_class"));

        // line 22
        echo "col-sm-2";
        
        $__internal_832eb2461963b746afece872d231873c351a9218ba32f4a4464af8f269a84c99->leave($__internal_832eb2461963b746afece872d231873c351a9218ba32f4a4464af8f269a84c99_prof);

    }

    // line 27
    public function block_form_row($context, array $blocks = array())
    {
        $__internal_337a10a9277aba2ab735e62db5dc01c565271343b2a168ae2a47ef8d4b55283e = $this->env->getExtension("native_profiler");
        $__internal_337a10a9277aba2ab735e62db5dc01c565271343b2a168ae2a47ef8d4b55283e->enter($__internal_337a10a9277aba2ab735e62db5dc01c565271343b2a168ae2a47ef8d4b55283e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "form_row"));

        // line 28
        ob_start();
        // line 29
        echo "    <div class=\"control-group";
        if ((( !(isset($context["compound"]) ? $context["compound"] : $this->getContext($context, "compound")) || ((array_key_exists("force_error", $context)) ? (_twig_default_filter((isset($context["force_error"]) ? $context["force_error"] : $this->getContext($context, "force_error")), false)) : (false))) &&  !(isset($context["valid"]) ? $context["valid"] : $this->getContext($context, "valid")))) {
            echo " has-error";
        }
        echo "\">
        ";
        // line 30
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'label');
        echo "
        <div class=\"";
        // line 31
        $this->displayBlock("form_group_class", $context, $blocks);
        echo "\">
            ";
        // line 32
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'widget');
        echo "
            ";
        // line 33
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'errors');
        echo "
        </div>
    </div>
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        
        $__internal_337a10a9277aba2ab735e62db5dc01c565271343b2a168ae2a47ef8d4b55283e->leave($__internal_337a10a9277aba2ab735e62db5dc01c565271343b2a168ae2a47ef8d4b55283e_prof);

    }

    // line 39
    public function block_checkbox_row($context, array $blocks = array())
    {
        $__internal_d16cc99dec9da7a8b0b01c02daeb9151f86d531c97f6fbd23aaa596f75c470ac = $this->env->getExtension("native_profiler");
        $__internal_d16cc99dec9da7a8b0b01c02daeb9151f86d531c97f6fbd23aaa596f75c470ac->enter($__internal_d16cc99dec9da7a8b0b01c02daeb9151f86d531c97f6fbd23aaa596f75c470ac_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "checkbox_row"));

        // line 40
        $this->displayBlock("checkbox_radio_row", $context, $blocks);
        
        $__internal_d16cc99dec9da7a8b0b01c02daeb9151f86d531c97f6fbd23aaa596f75c470ac->leave($__internal_d16cc99dec9da7a8b0b01c02daeb9151f86d531c97f6fbd23aaa596f75c470ac_prof);

    }

    // line 43
    public function block_radio_row($context, array $blocks = array())
    {
        $__internal_5ccbaa8aeb588737738a6c04ec0c910be1beeb011ef05ec998e34913a9183c79 = $this->env->getExtension("native_profiler");
        $__internal_5ccbaa8aeb588737738a6c04ec0c910be1beeb011ef05ec998e34913a9183c79->enter($__internal_5ccbaa8aeb588737738a6c04ec0c910be1beeb011ef05ec998e34913a9183c79_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "radio_row"));

        // line 44
        $this->displayBlock("checkbox_radio_row", $context, $blocks);
        
        $__internal_5ccbaa8aeb588737738a6c04ec0c910be1beeb011ef05ec998e34913a9183c79->leave($__internal_5ccbaa8aeb588737738a6c04ec0c910be1beeb011ef05ec998e34913a9183c79_prof);

    }

    // line 47
    public function block_checkbox_radio_row($context, array $blocks = array())
    {
        $__internal_c8f595583c1de5c6862a7f609a6b7a33e2522faffce74c6f6584df5da9ac900d = $this->env->getExtension("native_profiler");
        $__internal_c8f595583c1de5c6862a7f609a6b7a33e2522faffce74c6f6584df5da9ac900d->enter($__internal_c8f595583c1de5c6862a7f609a6b7a33e2522faffce74c6f6584df5da9ac900d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "checkbox_radio_row"));

        // line 48
        ob_start();
        // line 49
        echo "    <div class=\"control-group";
        if ( !(isset($context["valid"]) ? $context["valid"] : $this->getContext($context, "valid"))) {
            echo " has-error";
        }
        echo "\">
        <div class=\"";
        // line 50
        $this->displayBlock("form_label_class", $context, $blocks);
        echo "\"></div>
        <div class=\"";
        // line 51
        $this->displayBlock("form_group_class", $context, $blocks);
        echo "\">
            ";
        // line 52
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'widget');
        echo "
            ";
        // line 53
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'errors');
        echo "
        </div>
    </div>
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        
        $__internal_c8f595583c1de5c6862a7f609a6b7a33e2522faffce74c6f6584df5da9ac900d->leave($__internal_c8f595583c1de5c6862a7f609a6b7a33e2522faffce74c6f6584df5da9ac900d_prof);

    }

    // line 59
    public function block_submit_row($context, array $blocks = array())
    {
        $__internal_95628897a0e87d3abd2dc529860194608fa8e9cad3317d13c70f0e203e3c1674 = $this->env->getExtension("native_profiler");
        $__internal_95628897a0e87d3abd2dc529860194608fa8e9cad3317d13c70f0e203e3c1674->enter($__internal_95628897a0e87d3abd2dc529860194608fa8e9cad3317d13c70f0e203e3c1674_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "submit_row"));

        // line 60
        ob_start();
        // line 61
        echo "    <div class=\"control-group\">
        <div class=\"";
        // line 62
        $this->displayBlock("form_label_class", $context, $blocks);
        echo "\"></div>
        <div class=\"";
        // line 63
        $this->displayBlock("form_group_class", $context, $blocks);
        echo "\">
            ";
        // line 64
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'widget');
        echo "
        </div>
    </div>
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        
        $__internal_95628897a0e87d3abd2dc529860194608fa8e9cad3317d13c70f0e203e3c1674->leave($__internal_95628897a0e87d3abd2dc529860194608fa8e9cad3317d13c70f0e203e3c1674_prof);

    }

    // line 70
    public function block_form_group_class($context, array $blocks = array())
    {
        $__internal_3614ad4e56f37a3a3a60774853df3fadebd8cd08d80cfa60f43451622fa8e84b = $this->env->getExtension("native_profiler");
        $__internal_3614ad4e56f37a3a3a60774853df3fadebd8cd08d80cfa60f43451622fa8e84b->enter($__internal_3614ad4e56f37a3a3a60774853df3fadebd8cd08d80cfa60f43451622fa8e84b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "form_group_class"));

        // line 71
        echo "col-sm-10 controls";
        
        $__internal_3614ad4e56f37a3a3a60774853df3fadebd8cd08d80cfa60f43451622fa8e84b->leave($__internal_3614ad4e56f37a3a3a60774853df3fadebd8cd08d80cfa60f43451622fa8e84b_prof);

    }

    public function getTemplateName()
    {
        return "bootstrap_3_horizontal_layout.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  297 => 71,  291 => 70,  279 => 64,  275 => 63,  271 => 62,  268 => 61,  266 => 60,  260 => 59,  248 => 53,  244 => 52,  240 => 51,  236 => 50,  229 => 49,  227 => 48,  221 => 47,  214 => 44,  208 => 43,  201 => 40,  195 => 39,  183 => 33,  179 => 32,  175 => 31,  171 => 30,  164 => 29,  162 => 28,  156 => 27,  149 => 22,  143 => 21,  134 => 16,  131 => 15,  125 => 13,  122 => 12,  120 => 11,  114 => 10,  107 => 5,  105 => 4,  99 => 3,  92 => 70,  89 => 69,  87 => 59,  84 => 58,  82 => 47,  79 => 46,  77 => 43,  74 => 42,  72 => 39,  69 => 38,  67 => 27,  64 => 26,  61 => 24,  59 => 21,  56 => 20,  54 => 10,  51 => 9,  48 => 7,  46 => 3,  43 => 2,  14 => 1,);
    }
}
