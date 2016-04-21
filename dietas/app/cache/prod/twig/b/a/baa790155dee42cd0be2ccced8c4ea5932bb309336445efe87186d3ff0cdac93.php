<?php

/* AdminBundle::layout.html.twig */
class __TwigTemplate_baa790155dee42cd0be2ccced8c4ea5932bb309336445efe87186d3ff0cdac93 extends Twig_Template
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
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
    }

    // line 5
    public function block_stylesheets($context, array $blocks = array())
    {
    }

    // line 7
    public function block_notifications($context, array $blocks = array())
    {
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
    }

    // line 199
    public function block_menu($context, array $blocks = array())
    {
        // line 200
        echo "    ";
        $context["macro"] = $this->loadTemplate("@Admin/Macro/macros.html.twig", "AdminBundle::layout.html.twig", 200);
        // line 201
        echo "    ";
        $context["options"] = $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array()), "get", array(0 => "options_to_show"), "method");
        // line 202
        echo "    ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["options"]) ? $context["options"] : null));
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
    }

    // line 214
    public function block_description($context, array $blocks = array())
    {
    }

    // line 216
    public function block_content($context, array $blocks = array())
    {
    }

    // line 218
    public function block_javascripts($context, array $blocks = array())
    {
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
        return array (  316 => 218,  311 => 216,  306 => 214,  294 => 209,  291 => 208,  287 => 207,  283 => 206,  279 => 205,  269 => 204,  264 => 203,  258 => 202,  255 => 201,  252 => 200,  249 => 199,  148 => 101,  132 => 88,  116 => 75,  47 => 8,  44 => 7,  39 => 5,  34 => 3,  11 => 1,);
    }
}
