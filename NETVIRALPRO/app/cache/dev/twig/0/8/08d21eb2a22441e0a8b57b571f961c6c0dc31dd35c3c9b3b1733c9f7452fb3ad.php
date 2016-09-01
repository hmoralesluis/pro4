<?php

/* AdminBundle::layout.html.twig */
class __TwigTemplate_08d21eb2a22441e0a8b57b571f961c6c0dc31dd35c3c9b3b1733c9f7452fb3ad extends Twig_Template
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
        $__internal_76f63ea56725ed27be50f9abe9464b9f463d8b0b0e6f02f3ca9032677ecd325f = $this->env->getExtension("native_profiler");
        $__internal_76f63ea56725ed27be50f9abe9464b9f463d8b0b0e6f02f3ca9032677ecd325f->enter($__internal_76f63ea56725ed27be50f9abe9464b9f463d8b0b0e6f02f3ca9032677ecd325f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "AdminBundle::layout.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_76f63ea56725ed27be50f9abe9464b9f463d8b0b0e6f02f3ca9032677ecd325f->leave($__internal_76f63ea56725ed27be50f9abe9464b9f463d8b0b0e6f02f3ca9032677ecd325f_prof);

    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $__internal_291ea90a5ad4dce9d2e5b3524b2ff3b25273594a1818a4334c8307fe87378d6c = $this->env->getExtension("native_profiler");
        $__internal_291ea90a5ad4dce9d2e5b3524b2ff3b25273594a1818a4334c8307fe87378d6c->enter($__internal_291ea90a5ad4dce9d2e5b3524b2ff3b25273594a1818a4334c8307fe87378d6c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        
        $__internal_291ea90a5ad4dce9d2e5b3524b2ff3b25273594a1818a4334c8307fe87378d6c->leave($__internal_291ea90a5ad4dce9d2e5b3524b2ff3b25273594a1818a4334c8307fe87378d6c_prof);

    }

    // line 5
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_0afda208c999598eb6fda740a41699fa9bd19b9639b7437a35050f37afffe67c = $this->env->getExtension("native_profiler");
        $__internal_0afda208c999598eb6fda740a41699fa9bd19b9639b7437a35050f37afffe67c->enter($__internal_0afda208c999598eb6fda740a41699fa9bd19b9639b7437a35050f37afffe67c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        
        $__internal_0afda208c999598eb6fda740a41699fa9bd19b9639b7437a35050f37afffe67c->leave($__internal_0afda208c999598eb6fda740a41699fa9bd19b9639b7437a35050f37afffe67c_prof);

    }

    // line 7
    public function block_notifications($context, array $blocks = array())
    {
        $__internal_55d134aee23766f76abf95bc33fcd0030bfa6f494aed00b839a80a63337a6570 = $this->env->getExtension("native_profiler");
        $__internal_55d134aee23766f76abf95bc33fcd0030bfa6f494aed00b839a80a63337a6570->enter($__internal_55d134aee23766f76abf95bc33fcd0030bfa6f494aed00b839a80a63337a6570_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "notifications"));

        // line 8
        echo "    ";
        $context["associatedNotificationTypes"] = $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "get", array(0 => "associatedNotificationTypes"), "method");
        // line 9
        echo "    ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["associatedNotificationTypes"]) ? $context["associatedNotificationTypes"] : $this->getContext($context, "associatedNotificationTypes")));
        foreach ($context['_seq'] as $context["_key"] => $context["associatedNotificationType"]) {
            if ( !$this->getAttribute($context["associatedNotificationType"], "onBody", array())) {
                // line 10
                echo "        <li class=\"dropdown\" id=\"header_notification_bar\">
            <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
                <i class=\"";
                // line 12
                echo twig_escape_filter($this->env, $this->getAttribute($context["associatedNotificationType"], "icon", array()), "html", null, true);
                echo "\"></i>
                ";
                // line 13
                if (($this->getAttribute($context["associatedNotificationType"], "amount", array()) > 0)) {
                    // line 14
                    echo "                    <span class=\"badge\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["associatedNotificationType"], "amount", array()), "html", null, true);
                    echo "</span>
                ";
                }
                // line 16
                echo "            </a>
            <ul class=\"dropdown-menu extended notification\">
                <li>
                    ";
                // line 19
                if (($this->getAttribute($context["associatedNotificationType"], "amount", array()) > 0)) {
                    // line 20
                    echo "                        ";
                    if (($this->getAttribute($context["associatedNotificationType"], "name", array()) == "Mensajería")) {
                        // line 21
                        echo "                            <p>Tiene ";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["associatedNotificationType"], "amount", array()), "html", null, true);
                        echo " mensajes nuevos</p>
                        ";
                    } else {
                        // line 23
                        echo "                            <p>Tiene ";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["associatedNotificationType"], "amount", array()), "html", null, true);
                        echo " notificaciones</p>
                        ";
                    }
                    // line 25
                    echo "                    ";
                } else {
                    // line 26
                    echo "                        ";
                    if (($this->getAttribute($context["associatedNotificationType"], "name", array()) == "Mensajería")) {
                        // line 27
                        echo "                            <p>No tiene mensajes sin leer</p>
                        ";
                    } else {
                        // line 29
                        echo "                            <p>No hay nuevas notificaciones</p>
                        ";
                    }
                    // line 31
                    echo "                    ";
                }
                // line 32
                echo "                </li>
                ";
                // line 33
                $context["notificationsInLastWeek"] = $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "get", array(0 => "notificationsInLastWeek"), "method");
                // line 34
                echo "                ";
                $context["cont"] = 0;
                // line 35
                echo "                ";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["notificationsInLastWeek"]) ? $context["notificationsInLastWeek"] : $this->getContext($context, "notificationsInLastWeek")));
                foreach ($context['_seq'] as $context["_key"] => $context["notification"]) {
                    // line 36
                    echo "                    ";
                    if (((isset($context["cont"]) ? $context["cont"] : $this->getContext($context, "cont")) < 5)) {
                        // line 37
                        echo "                        ";
                        if ((twig_in_filter($context["associatedNotificationType"], $this->getAttribute($context["notification"], "notificationTypes", array())) && ($this->getAttribute($context["associatedNotificationType"], "name", array()) == "Mensajería"))) {
                            // line 38
                            echo "                            <li>
                                <a href=\"#\">
                                <span class=\"photo\"><img
                                            src=\"";
                            // line 41
                            echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl(("bundles/admin/img/" . $this->getAttribute($context["notification"], "image", array()))), "html", null, true);
                            echo "\"
                                            alt=\"\"/></span>
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
                        ";
                        } elseif ((twig_in_filter(                        // line 53
$context["associatedNotificationType"], $this->getAttribute($context["notification"], "notificationTypes", array())) && ($this->getAttribute($context["associatedNotificationType"], "name", array()) != "Mensajería"))) {
                            // line 54
                            echo "                            <li>
                                <a href=\"#\">
                                <span class=\"label ";
                            // line 56
                            echo twig_escape_filter($this->env, $this->getAttribute($context["notification"], "label", array()), "html", null, true);
                            echo "\"><i
                                            class=\"";
                            // line 57
                            echo twig_escape_filter($this->env, $this->getAttribute($context["notification"], "image", array()), "html", null, true);
                            echo "\"></i></span>
                                    ";
                            // line 58
                            echo twig_escape_filter($this->env, $this->getAttribute($context["notification"], "title", array()), "html", null, true);
                            echo "
                                    <span class=\"time\">";
                            // line 59
                            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["notification"], "date", array()), "F jS"), "html", null, true);
                            echo "</span>
                                </a>
                            </li>
                        ";
                        }
                        // line 63
                        echo "                        ";
                        $context["cont"] = ((isset($context["cont"]) ? $context["cont"] : $this->getContext($context, "cont")) + 1);
                        // line 64
                        echo "                    ";
                    }
                    // line 65
                    echo "                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['notification'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 66
                echo "                ";
                if (($this->getAttribute($context["associatedNotificationType"], "amount", array()) > 5)) {
                    // line 67
                    echo "                    <li class=\"external\">
                        <a href=\"#\">Ver todas las Notificaciones <i class=\"m-icon-swapright\"></i></a>
                    </li>
                ";
                }
                // line 71
                echo "            </ul>
        </li>
    ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['associatedNotificationType'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        
        $__internal_55d134aee23766f76abf95bc33fcd0030bfa6f494aed00b839a80a63337a6570->leave($__internal_55d134aee23766f76abf95bc33fcd0030bfa6f494aed00b839a80a63337a6570_prof);

    }

    // line 76
    public function block_menu($context, array $blocks = array())
    {
        $__internal_6441f325e6cb319619f3edb0cd1c537d86697a4e7c4f5da9fb9ee5ebee07ea74 = $this->env->getExtension("native_profiler");
        $__internal_6441f325e6cb319619f3edb0cd1c537d86697a4e7c4f5da9fb9ee5ebee07ea74->enter($__internal_6441f325e6cb319619f3edb0cd1c537d86697a4e7c4f5da9fb9ee5ebee07ea74_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 77
        echo "    ";
        $context["macro"] = $this->loadTemplate("@Admin/Macro/macros.html.twig", "AdminBundle::layout.html.twig", 77);
        // line 78
        echo "    ";
        $context["options"] = $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "get", array(0 => "options_to_show"), "method");
        // line 79
        echo "    ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["options"]) ? $context["options"] : $this->getContext($context, "options")));
        foreach ($context['_seq'] as $context["_key"] => $context["option"]) {
            if ((null === $this->getAttribute($context["option"], "AsociatedOption", array()))) {
                // line 80
                echo "        <li id=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["option"], "name", array()), "html", null, true);
                echo "\" class=\"treeview\">
            <a href=\"";
                // line 81
                if ($this->getAttribute($context["option"], "path", array())) {
                    echo " ";
                    echo $this->env->getExtension('routing')->getPath($this->getAttribute($context["option"], "path", array()));
                    echo " ";
                } else {
                    echo " # ";
                }
                echo "\">
                <i class=\"";
                // line 82
                echo twig_escape_filter($this->env, $this->getAttribute($context["option"], "icon", array()), "html", null, true);
                echo "\"></i>
                <span class=\"title\">";
                // line 83
                echo twig_escape_filter($this->env, $this->getAttribute($context["option"], "name", array()), "html", null, true);
                echo "</span>
                ";
                // line 84
                if ((twig_length_filter($this->env, $this->getAttribute($context["option"], "options", array())) > 0)) {
                    echo "<span class=\"arrow\"></span>";
                }
                // line 85
                echo "            </a>
            ";
                // line 86
                echo $context["macro"]->getrecursiveList($this->getAttribute($context["option"], "options", array()), $this->getAttribute($context["option"], "id", array()));
                echo "
        </li>
    ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['option'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        
        $__internal_6441f325e6cb319619f3edb0cd1c537d86697a4e7c4f5da9fb9ee5ebee07ea74->leave($__internal_6441f325e6cb319619f3edb0cd1c537d86697a4e7c4f5da9fb9ee5ebee07ea74_prof);

    }

    // line 91
    public function block_content($context, array $blocks = array())
    {
        $__internal_181cd43fab9f50d151b127b5f3b1f97d941c86fb6e827a3ef11aaac2460312a3 = $this->env->getExtension("native_profiler");
        $__internal_181cd43fab9f50d151b127b5f3b1f97d941c86fb6e827a3ef11aaac2460312a3->enter($__internal_181cd43fab9f50d151b127b5f3b1f97d941c86fb6e827a3ef11aaac2460312a3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        
        $__internal_181cd43fab9f50d151b127b5f3b1f97d941c86fb6e827a3ef11aaac2460312a3->leave($__internal_181cd43fab9f50d151b127b5f3b1f97d941c86fb6e827a3ef11aaac2460312a3_prof);

    }

    // line 93
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_f21bcb8da6ebe8e149a15fa77d45185a0f72b6bf735b0030993fe7931fd52794 = $this->env->getExtension("native_profiler");
        $__internal_f21bcb8da6ebe8e149a15fa77d45185a0f72b6bf735b0030993fe7931fd52794->enter($__internal_f21bcb8da6ebe8e149a15fa77d45185a0f72b6bf735b0030993fe7931fd52794_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        
        $__internal_f21bcb8da6ebe8e149a15fa77d45185a0f72b6bf735b0030993fe7931fd52794->leave($__internal_f21bcb8da6ebe8e149a15fa77d45185a0f72b6bf735b0030993fe7931fd52794_prof);

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
        return array (  304 => 93,  293 => 91,  278 => 86,  275 => 85,  271 => 84,  267 => 83,  263 => 82,  253 => 81,  248 => 80,  242 => 79,  239 => 78,  236 => 77,  230 => 76,  216 => 71,  210 => 67,  207 => 66,  201 => 65,  198 => 64,  195 => 63,  188 => 59,  184 => 58,  180 => 57,  176 => 56,  172 => 54,  170 => 53,  155 => 41,  150 => 38,  147 => 37,  144 => 36,  139 => 35,  136 => 34,  134 => 33,  131 => 32,  128 => 31,  124 => 29,  120 => 27,  117 => 26,  114 => 25,  108 => 23,  102 => 21,  99 => 20,  97 => 19,  92 => 16,  86 => 14,  84 => 13,  80 => 12,  76 => 10,  70 => 9,  67 => 8,  61 => 7,  50 => 5,  39 => 3,  11 => 1,);
    }
}
