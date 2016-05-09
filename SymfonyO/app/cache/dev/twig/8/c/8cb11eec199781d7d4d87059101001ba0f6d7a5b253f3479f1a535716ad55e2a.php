<?php

/* AdminBundle::layout.html.twig */
class __TwigTemplate_8cb11eec199781d7d4d87059101001ba0f6d7a5b253f3479f1a535716ad55e2a extends Twig_Template
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
        $__internal_fdf6db131f44c638867c0a5b891adc349d3db56b7b3a015594c73db07a182a88 = $this->env->getExtension("native_profiler");
        $__internal_fdf6db131f44c638867c0a5b891adc349d3db56b7b3a015594c73db07a182a88->enter($__internal_fdf6db131f44c638867c0a5b891adc349d3db56b7b3a015594c73db07a182a88_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "AdminBundle::layout.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_fdf6db131f44c638867c0a5b891adc349d3db56b7b3a015594c73db07a182a88->leave($__internal_fdf6db131f44c638867c0a5b891adc349d3db56b7b3a015594c73db07a182a88_prof);

    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $__internal_3748cb638953292b170984fd47bbfe7973ebbcea10bf4292cc151eae34ddac9d = $this->env->getExtension("native_profiler");
        $__internal_3748cb638953292b170984fd47bbfe7973ebbcea10bf4292cc151eae34ddac9d->enter($__internal_3748cb638953292b170984fd47bbfe7973ebbcea10bf4292cc151eae34ddac9d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        
        $__internal_3748cb638953292b170984fd47bbfe7973ebbcea10bf4292cc151eae34ddac9d->leave($__internal_3748cb638953292b170984fd47bbfe7973ebbcea10bf4292cc151eae34ddac9d_prof);

    }

    // line 5
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_11ee5c9a933f635095623cac17578077c242355bbca63ba978344a61d7198f9e = $this->env->getExtension("native_profiler");
        $__internal_11ee5c9a933f635095623cac17578077c242355bbca63ba978344a61d7198f9e->enter($__internal_11ee5c9a933f635095623cac17578077c242355bbca63ba978344a61d7198f9e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        
        $__internal_11ee5c9a933f635095623cac17578077c242355bbca63ba978344a61d7198f9e->leave($__internal_11ee5c9a933f635095623cac17578077c242355bbca63ba978344a61d7198f9e_prof);

    }

    // line 7
    public function block_notifications($context, array $blocks = array())
    {
        $__internal_238797dffe1e8812a31732ba16f2d825581533ea821bd9478be2a852ea760a46 = $this->env->getExtension("native_profiler");
        $__internal_238797dffe1e8812a31732ba16f2d825581533ea821bd9478be2a852ea760a46->enter($__internal_238797dffe1e8812a31732ba16f2d825581533ea821bd9478be2a852ea760a46_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "notifications"));

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
        
        $__internal_238797dffe1e8812a31732ba16f2d825581533ea821bd9478be2a852ea760a46->leave($__internal_238797dffe1e8812a31732ba16f2d825581533ea821bd9478be2a852ea760a46_prof);

    }

    // line 199
    public function block_menu($context, array $blocks = array())
    {
        $__internal_47fc4f5cdee11d221f8bfae073250328baf9c524db9f6e0dc6a48d18bfbdfd37 = $this->env->getExtension("native_profiler");
        $__internal_47fc4f5cdee11d221f8bfae073250328baf9c524db9f6e0dc6a48d18bfbdfd37->enter($__internal_47fc4f5cdee11d221f8bfae073250328baf9c524db9f6e0dc6a48d18bfbdfd37_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

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
        
        $__internal_47fc4f5cdee11d221f8bfae073250328baf9c524db9f6e0dc6a48d18bfbdfd37->leave($__internal_47fc4f5cdee11d221f8bfae073250328baf9c524db9f6e0dc6a48d18bfbdfd37_prof);

    }

    // line 214
    public function block_description($context, array $blocks = array())
    {
        $__internal_f2dab70f3b2a36b4da39ebf9a66b2fa65a3b59c213106dff9e20f7cbbc901a09 = $this->env->getExtension("native_profiler");
        $__internal_f2dab70f3b2a36b4da39ebf9a66b2fa65a3b59c213106dff9e20f7cbbc901a09->enter($__internal_f2dab70f3b2a36b4da39ebf9a66b2fa65a3b59c213106dff9e20f7cbbc901a09_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "description"));

        
        $__internal_f2dab70f3b2a36b4da39ebf9a66b2fa65a3b59c213106dff9e20f7cbbc901a09->leave($__internal_f2dab70f3b2a36b4da39ebf9a66b2fa65a3b59c213106dff9e20f7cbbc901a09_prof);

    }

    // line 216
    public function block_content($context, array $blocks = array())
    {
        $__internal_759f6e80432b7ed3f169e718936bc5d38e6d3cbb190a5a27a447a51612ebaa17 = $this->env->getExtension("native_profiler");
        $__internal_759f6e80432b7ed3f169e718936bc5d38e6d3cbb190a5a27a447a51612ebaa17->enter($__internal_759f6e80432b7ed3f169e718936bc5d38e6d3cbb190a5a27a447a51612ebaa17_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        
        $__internal_759f6e80432b7ed3f169e718936bc5d38e6d3cbb190a5a27a447a51612ebaa17->leave($__internal_759f6e80432b7ed3f169e718936bc5d38e6d3cbb190a5a27a447a51612ebaa17_prof);

    }

    // line 218
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_bc4c05272a3ea82db3ab20d7f877f1602c580789315c77214a22a241d6b4bc5c = $this->env->getExtension("native_profiler");
        $__internal_bc4c05272a3ea82db3ab20d7f877f1602c580789315c77214a22a241d6b4bc5c->enter($__internal_bc4c05272a3ea82db3ab20d7f877f1602c580789315c77214a22a241d6b4bc5c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        
        $__internal_bc4c05272a3ea82db3ab20d7f877f1602c580789315c77214a22a241d6b4bc5c->leave($__internal_bc4c05272a3ea82db3ab20d7f877f1602c580789315c77214a22a241d6b4bc5c_prof);

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
