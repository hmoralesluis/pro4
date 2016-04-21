<?php

/* AdminBundle::layout.html.twig */
class __TwigTemplate_6af3be8c69c6ae20068113b64cff990d52915a10d94b5b6ef4f0490dcaff5bfa extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::base-admin.html.twig", "AdminBundle::layout.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'notifications' => array($this, 'block_notifications'),
            'menu' => array($this, 'block_menu'),
            'description' => array($this, 'block_description'),
            'content' => array($this, 'block_content'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base-admin.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_075aacdd972dff768efc8368e4e53d4321c290eca6943727e7aa241f67503adc = $this->env->getExtension("native_profiler");
        $__internal_075aacdd972dff768efc8368e4e53d4321c290eca6943727e7aa241f67503adc->enter($__internal_075aacdd972dff768efc8368e4e53d4321c290eca6943727e7aa241f67503adc_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "AdminBundle::layout.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_075aacdd972dff768efc8368e4e53d4321c290eca6943727e7aa241f67503adc->leave($__internal_075aacdd972dff768efc8368e4e53d4321c290eca6943727e7aa241f67503adc_prof);

    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $__internal_b581eb1759120a0db7c4f102fb1b9bd1d1f4b9e9efd1f125d7a8383160ea5464 = $this->env->getExtension("native_profiler");
        $__internal_b581eb1759120a0db7c4f102fb1b9bd1d1f4b9e9efd1f125d7a8383160ea5464->enter($__internal_b581eb1759120a0db7c4f102fb1b9bd1d1f4b9e9efd1f125d7a8383160ea5464_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        
        $__internal_b581eb1759120a0db7c4f102fb1b9bd1d1f4b9e9efd1f125d7a8383160ea5464->leave($__internal_b581eb1759120a0db7c4f102fb1b9bd1d1f4b9e9efd1f125d7a8383160ea5464_prof);

    }

    // line 5
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_44bebf4599181ed6100d0c7bea7d7a4899a014c1ebe63c08e51248a9885de585 = $this->env->getExtension("native_profiler");
        $__internal_44bebf4599181ed6100d0c7bea7d7a4899a014c1ebe63c08e51248a9885de585->enter($__internal_44bebf4599181ed6100d0c7bea7d7a4899a014c1ebe63c08e51248a9885de585_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        
        $__internal_44bebf4599181ed6100d0c7bea7d7a4899a014c1ebe63c08e51248a9885de585->leave($__internal_44bebf4599181ed6100d0c7bea7d7a4899a014c1ebe63c08e51248a9885de585_prof);

    }

    // line 7
    public function block_notifications($context, array $blocks = array())
    {
        $__internal_c902720495614d2e1accbf6c4ee19d8bc084c217834b78810313ca367c69752b = $this->env->getExtension("native_profiler");
        $__internal_c902720495614d2e1accbf6c4ee19d8bc084c217834b78810313ca367c69752b->enter($__internal_c902720495614d2e1accbf6c4ee19d8bc084c217834b78810313ca367c69752b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "notifications"));

        // line 8
        echo "    <li class=\"dropdown\" id=\"header_notification_bar\">
        <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
            <i class=\"icon-warning-sign\"></i>
            <span class=\"badge\">6</span>
        </a>
        <ul class=\"dropdown-menu extended notification\">
            <li>
                <p>You have 14 new notifications</p>
            </li>
            <li>
                <a href=\"#\">
                    <span class=\"label label-success\"><i class=\"icon-plus\"></i></span>
                    New user registered.
                    <span class=\"time\">Just now</span>
                </a>
            </li>
            <li>
                <a href=\"#\">
                    <span class=\"label label-important\"><i class=\"icon-bolt\"></i></span>
                    Server #12 overloaded.
                    <span class=\"time\">15 mins</span>
                </a>
            </li>
            <li>
                <a href=\"#\">
                    <span class=\"label label-warning\"><i class=\"icon-bell\"></i></span>
                    Server #2 not respoding.
                    <span class=\"time\">22 mins</span>
                </a>
            </li>
            <li>
                <a href=\"#\">
                    <span class=\"label label-info\"><i class=\"icon-bullhorn\"></i></span>
                    Application error.
                    <span class=\"time\">40 mins</span>
                </a>
            </li>
            <li>
                <a href=\"#\">
                    <span class=\"label label-important\"><i class=\"icon-bolt\"></i></span>
                    Database overloaded 68%.
                    <span class=\"time\">2 hrs</span>
                </a>
            </li>
            <li>
                <a href=\"#\">
                    <span class=\"label label-important\"><i class=\"icon-bolt\"></i></span>
                    2 user IP blocked.
                    <span class=\"time\">5 hrs</span>
                </a>
            </li>
            <li class=\"external\">
                <a href=\"#\">See all notifications <i class=\"m-icon-swapright\"></i></a>
            </li>
        </ul>
    </li>
    <li class=\"dropdown\" id=\"header_inbox_bar\">
        <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
            <i class=\"icon-envelope-alt\"></i>
            <span class=\"badge\">5</span>
        </a>
        <ul class=\"dropdown-menu extended inbox\">
            <li>
                <p>You have 12 new messages</p>
            </li>
            <li>
                <a href=\"#\">
                    <span class=\"photo\"><img src=\"";
        // line 75
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/img/avatar2.jpg"), "html", null, true);
        echo "\" alt=\"\"/></span>
                        <span class=\"subject\">
                        <span class=\"from\">Lisa Wong</span>
                        <span class=\"time\">Just Now</span>
                        </span>
                        <span class=\"message\">
                        Vivamus sed auctor nibh congue nibh. auctor nibh
                        auctor nibh...
                        </span>
                </a>
            </li>
            <li>
                <a href=\"#\">
                    <span class=\"photo\"><img src=\"";
        // line 88
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/img/avatar3.jpg"), "html", null, true);
        echo "\" alt=\"\"/></span>
                        <span class=\"subject\">
                        <span class=\"from\">Richard Doe</span>
                        <span class=\"time\">16 mins</span>
                        </span>
                        <span class=\"message\">
                        Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh
                        auctor nibh...
                        </span>
                </a>
            </li>
            <li>
                <a href=\"#\">
                    <span class=\"photo\"><img src=\"";
        // line 101
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/img/avatar1.jpg"), "html", null, true);
        echo "\" alt=\"\"/></span>
                        <span class=\"subject\">
                        <span class=\"from\">Bob Nilson</span>
                        <span class=\"time\">2 hrs</span>
                        </span>
                        <span class=\"message\">
                        Vivamus sed nibh auctor nibh congue nibh. auctor nibh
                        auctor nibh...
                        </span>
                </a>
            </li>
            <li class=\"external\">
                <a href=\"#\">See all messages <i class=\"m-icon-swapright\"></i></a>
            </li>
        </ul>
    </li>
    <li class=\"dropdown\" id=\"header_task_bar\">
        <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
            <i class=\"icon-tasks\"></i>
            <span class=\"badge\">5</span>
        </a>
        <ul class=\"dropdown-menu extended tasks\">
            <li>
                <p>You have 12 pending tasks</p>
            </li>
            <li>
                <a href=\"#\">
                        <span class=\"task\">
                        <span class=\"desc\">New release v1.2</span>
                        <span class=\"percent\">30%</span>
                        </span>
                        <span class=\"progress progress-success \">
                        <span style=\"width: 30%;\" class=\"bar\"></span>
                        </span>
                </a>
            </li>
            <li>
                <a href=\"#\">
                        <span class=\"task\">
                        <span class=\"desc\">Application deployment</span>
                        <span class=\"percent\">65%</span>
                        </span>
                        <span class=\"progress progress-danger progress-striped active\">
                        <span style=\"width: 65%;\" class=\"bar\"></span>
                        </span>
                </a>
            </li>
            <li>
                <a href=\"#\">
                        <span class=\"task\">
                        <span class=\"desc\">Mobile app release</span>
                        <span class=\"percent\">98%</span>
                        </span>
                        <span class=\"progress progress-success\">
                        <span style=\"width: 98%;\" class=\"bar\"></span>
                        </span>
                </a>
            </li>
            <li>
                <a href=\"#\">
                        <span class=\"task\">
                        <span class=\"desc\">Database migration</span>
                        <span class=\"percent\">10%</span>
                        </span>
                        <span class=\"progress progress-warning progress-striped\">
                        <span style=\"width: 10%;\" class=\"bar\"></span>
                        </span>
                </a>
            </li>
            <li>
                <a href=\"#\">
                        <span class=\"task\">
                        <span class=\"desc\">Web server upgrade</span>
                        <span class=\"percent\">58%</span>
                        </span>
                        <span class=\"progress progress-info\">
                        <span style=\"width: 58%;\" class=\"bar\"></span>
                        </span>
                </a>
            </li>
            <li>
                <a href=\"#\">
                        <span class=\"task\">
                        <span class=\"desc\">Mobile development</span>
                        <span class=\"percent\">85%</span>
                        </span>
                        <span class=\"progress progress-success\">
                        <span style=\"width: 85%;\" class=\"bar\"></span>
                        </span>
                </a>
            </li>
            <li class=\"external\">
                <a href=\"#\">See all tasks <i class=\"m-icon-swapright\"></i></a>
            </li>
        </ul>
    </li>
";
        
        $__internal_c902720495614d2e1accbf6c4ee19d8bc084c217834b78810313ca367c69752b->leave($__internal_c902720495614d2e1accbf6c4ee19d8bc084c217834b78810313ca367c69752b_prof);

    }

    // line 199
    public function block_menu($context, array $blocks = array())
    {
        $__internal_fa141d1b3bd2665338fd9f24570a18eab3173d6d6555181f48ec540cd71ce45c = $this->env->getExtension("native_profiler");
        $__internal_fa141d1b3bd2665338fd9f24570a18eab3173d6d6555181f48ec540cd71ce45c->enter($__internal_fa141d1b3bd2665338fd9f24570a18eab3173d6d6555181f48ec540cd71ce45c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 200
        echo "    ";
        $context["macro"] = $this->loadTemplate("@Admin/Macro/macros.html.twig", "AdminBundle::layout.html.twig", 200);
        // line 201
        echo "    ";
        $context["options"] = $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session", array()), "get", array(0 => "options_to_show"), "method");
        // line 202
        echo "    ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "options"));
        foreach ($context['_seq'] as $context["_key"] => $context["option"]) {
            if ((null === $this->getAttribute($context["option"], "AsociatedOption", array()))) {
                // line 203
                echo "        <li id=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["option"], "name", array()), "html", null, true);
                echo "\" class=\"treeview\">
            <a href=\"";
                // line 204
                if ($this->getAttribute($context["option"], "path", array())) {
                    echo " ";
                    echo $this->env->getExtension('routing')->getPath($this->getAttribute($context["option"], "path", array()));
                    echo " ";
                } else {
                    echo " # ";
                }
                echo "\">
                <i class=\"";
                // line 205
                echo twig_escape_filter($this->env, $this->getAttribute($context["option"], "icon", array()), "html", null, true);
                echo "\"></i>
                <span class=\"title\">";
                // line 206
                echo twig_escape_filter($this->env, $this->getAttribute($context["option"], "name", array()), "html", null, true);
                echo "</span>
                ";
                // line 207
                if ((twig_length_filter($this->env, $this->getAttribute($context["option"], "options", array())) > 0)) {
                    echo "<span class=\"arrow\"></span>";
                }
                // line 208
                echo "            </a>
            ";
                // line 209
                echo $context["macro"]->getrecursiveList($this->getAttribute($context["option"], "options", array()), $this->getAttribute($context["option"], "id", array()));
                echo "
        </li>
    ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['option'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        
        $__internal_fa141d1b3bd2665338fd9f24570a18eab3173d6d6555181f48ec540cd71ce45c->leave($__internal_fa141d1b3bd2665338fd9f24570a18eab3173d6d6555181f48ec540cd71ce45c_prof);

    }

    // line 214
    public function block_description($context, array $blocks = array())
    {
        $__internal_8b52242cb8bd7d244ca822ebed256eb2b0198805653815cf6978fdbf12e06d78 = $this->env->getExtension("native_profiler");
        $__internal_8b52242cb8bd7d244ca822ebed256eb2b0198805653815cf6978fdbf12e06d78->enter($__internal_8b52242cb8bd7d244ca822ebed256eb2b0198805653815cf6978fdbf12e06d78_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "description"));

        
        $__internal_8b52242cb8bd7d244ca822ebed256eb2b0198805653815cf6978fdbf12e06d78->leave($__internal_8b52242cb8bd7d244ca822ebed256eb2b0198805653815cf6978fdbf12e06d78_prof);

    }

    // line 216
    public function block_content($context, array $blocks = array())
    {
        $__internal_7797da0dd6d31877e46652dc67e97644c87a72e32d7054d01059de3f2c87596c = $this->env->getExtension("native_profiler");
        $__internal_7797da0dd6d31877e46652dc67e97644c87a72e32d7054d01059de3f2c87596c->enter($__internal_7797da0dd6d31877e46652dc67e97644c87a72e32d7054d01059de3f2c87596c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        
        $__internal_7797da0dd6d31877e46652dc67e97644c87a72e32d7054d01059de3f2c87596c->leave($__internal_7797da0dd6d31877e46652dc67e97644c87a72e32d7054d01059de3f2c87596c_prof);

    }

    // line 218
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_755d1e1969bc3b2bfb14aa8ac7397746c96d329623c030962f2cd478cffea507 = $this->env->getExtension("native_profiler");
        $__internal_755d1e1969bc3b2bfb14aa8ac7397746c96d329623c030962f2cd478cffea507->enter($__internal_755d1e1969bc3b2bfb14aa8ac7397746c96d329623c030962f2cd478cffea507_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        
        $__internal_755d1e1969bc3b2bfb14aa8ac7397746c96d329623c030962f2cd478cffea507->leave($__internal_755d1e1969bc3b2bfb14aa8ac7397746c96d329623c030962f2cd478cffea507_prof);

    }

    public function getTemplateName()
    {
        return "AdminBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  358 => 218,  347 => 216,  336 => 214,  321 => 209,  318 => 208,  314 => 207,  310 => 206,  306 => 205,  296 => 204,  291 => 203,  285 => 202,  282 => 201,  279 => 200,  273 => 199,  169 => 101,  153 => 88,  137 => 75,  68 => 8,  62 => 7,  51 => 5,  40 => 3,  11 => 1,);
    }
}
