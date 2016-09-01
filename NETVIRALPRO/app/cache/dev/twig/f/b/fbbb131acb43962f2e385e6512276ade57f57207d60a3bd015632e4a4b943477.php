<?php

/* TwigBundle:Exception:exception_full.html.twig */
class __TwigTemplate_fbbb131acb43962f2e385e6512276ade57f57207d60a3bd015632e4a4b943477 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("TwigBundle::layout.html.twig", "TwigBundle:Exception:exception_full.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "TwigBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_bf257f1445dda3ceb1032b8e04ddb60b555e56f43c0211ec2de18e448856665a = $this->env->getExtension("native_profiler");
        $__internal_bf257f1445dda3ceb1032b8e04ddb60b555e56f43c0211ec2de18e448856665a->enter($__internal_bf257f1445dda3ceb1032b8e04ddb60b555e56f43c0211ec2de18e448856665a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_bf257f1445dda3ceb1032b8e04ddb60b555e56f43c0211ec2de18e448856665a->leave($__internal_bf257f1445dda3ceb1032b8e04ddb60b555e56f43c0211ec2de18e448856665a_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_027137489bead48b5177efccdbb06ed2fc42d9bc5028902eaedce92c6a4746e6 = $this->env->getExtension("native_profiler");
        $__internal_027137489bead48b5177efccdbb06ed2fc42d9bc5028902eaedce92c6a4746e6->enter($__internal_027137489bead48b5177efccdbb06ed2fc42d9bc5028902eaedce92c6a4746e6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('request')->generateAbsoluteUrl($this->env->getExtension('asset')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_027137489bead48b5177efccdbb06ed2fc42d9bc5028902eaedce92c6a4746e6->leave($__internal_027137489bead48b5177efccdbb06ed2fc42d9bc5028902eaedce92c6a4746e6_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_d684a4027d631ae0b95b3ff503ea6b65a86e11dca3b212c2f4c5309886be73c2 = $this->env->getExtension("native_profiler");
        $__internal_d684a4027d631ae0b95b3ff503ea6b65a86e11dca3b212c2f4c5309886be73c2->enter($__internal_d684a4027d631ae0b95b3ff503ea6b65a86e11dca3b212c2f4c5309886be73c2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_d684a4027d631ae0b95b3ff503ea6b65a86e11dca3b212c2f4c5309886be73c2->leave($__internal_d684a4027d631ae0b95b3ff503ea6b65a86e11dca3b212c2f4c5309886be73c2_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_c65fa63b67b7f8b3907768da6dbfcaa2a5242dce2875ce77ce0767e8c66451b6 = $this->env->getExtension("native_profiler");
        $__internal_c65fa63b67b7f8b3907768da6dbfcaa2a5242dce2875ce77ce0767e8c66451b6->enter($__internal_c65fa63b67b7f8b3907768da6dbfcaa2a5242dce2875ce77ce0767e8c66451b6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("TwigBundle:Exception:exception.html.twig", "TwigBundle:Exception:exception_full.html.twig", 12)->display($context);
        
        $__internal_c65fa63b67b7f8b3907768da6dbfcaa2a5242dce2875ce77ce0767e8c66451b6->leave($__internal_c65fa63b67b7f8b3907768da6dbfcaa2a5242dce2875ce77ce0767e8c66451b6_prof);

    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:exception_full.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 12,  72 => 11,  58 => 8,  52 => 7,  42 => 4,  36 => 3,  11 => 1,);
    }
}
