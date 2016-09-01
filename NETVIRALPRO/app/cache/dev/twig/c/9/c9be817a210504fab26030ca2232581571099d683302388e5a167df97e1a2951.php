<?php

/* ::base-admin.html.twig */
class __TwigTemplate_c9be817a210504fab26030ca2232581571099d683302388e5a167df97e1a2951 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'notifications' => array($this, 'block_notifications'),
            'menu' => array($this, 'block_menu'),
            'content' => array($this, 'block_content'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_6829b729547e95e73fa509ada52dcba6ee2c1d8e880821ea6b3e15c60cc241ab = $this->env->getExtension("native_profiler");
        $__internal_6829b729547e95e73fa509ada52dcba6ee2c1d8e880821ea6b3e15c60cc241ab->enter($__internal_6829b729547e95e73fa509ada52dcba6ee2c1d8e880821ea6b3e15c60cc241ab_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "::base-admin.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
<head>
    <meta charset=\"UTF-8\"/>
    <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
    <meta content=\"width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no\" name=\"viewport\">

    <link href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/plugins/bootstrap/css/bootstrap.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\"/>
    <link href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/plugins/bootstrap/css/bootstrap-responsive.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\"
          type=\"text/css\"/>
    <link href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/plugins/font-awesome/css/font-awesome.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\"
          type=\"text/css\"/>
    <link href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/css/style-metro.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\"/>
    <link href=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/css/style.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\"/>
    <link href=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/css/style-responsive.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\"/>
    <link href=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/css/themes/default.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" id=\"style_color\"/>
    <link href=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/css/pages/pricing-tables.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\"/>
    <link href=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/plugins/uniform/css/uniform.default.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\"/>
    <link href=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/plugins/gritter/css/jquery.gritter.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\"/>
    ";
        // line 20
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 21
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/css/custom-style.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\"/>
    <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\"/>
</head>
<body class=\"fixed-top\">
<div class=\"header navbar navbar-inverse navbar-fixed-top\">
    <div class=\"navbar-inner\">
        <div class=\"container-fluid\">
            <a class=\"brand\" href=\"";
        // line 28
        echo $this->env->getExtension('routing')->getPath("management");
        echo "\">
                <img src=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/img/megalifepro.png"), "html", null, true);
        echo "\" alt=\"logo\"/>
            </a>
            <a href=\"#\" class=\"btn-navbar collapsed\" data-toggle=\"collapse\" data-target=\".nav-collapse\">
                <img src=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/img/menu-toggler.png"), "html", null, true);
        echo "\" alt=\"\"/>
            </a>
            <ul class=\"nav pull-right\">
                ";
        // line 35
        $this->displayBlock('notifications', $context, $blocks);
        // line 36
        echo "                <li class=\"dropdown user\">
                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
                        ";
        // line 38
        if (file_exists((((((isset($context["web_path"]) ? $context["web_path"] : $this->getContext($context, "web_path")) . "bundles/admin/usuarios/") . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "username", array())) . ".") . (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array(), "any", false, true), "PhotoExtension", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array(), "any", false, true), "PhotoExtension", array()), ".jpg")) : (".jpg"))))) {
            // line 39
            echo "                            <img src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl(((("bundles/admin/usuarios/" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "username", array())) . ".") . (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array(), "any", false, true), "PhotoExtension", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array(), "any", false, true), "PhotoExtension", array()), ".jpg")) : (".jpg")))), "html", null, true);
            echo "\"
                                 height=\"29\" width=\"29\"/>
                        ";
        } else {
            // line 42
            echo "                            ";
            if (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "sex", array()) == "Hombre")) {
                // line 43
                echo "                                <img alt=\"\" src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/img/hombre_small.jpg"), "html", null, true);
                echo "\"/>
                            ";
            } else {
                // line 45
                echo "                                <img alt=\"\" src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/img/mujer_small.jpg"), "html", null, true);
                echo "\"/>
                            ";
            }
            // line 47
            echo "                        ";
        }
        // line 48
        echo "                        <span class=\"username\">";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "username", array()), "html", null, true);
        echo "</span>
                        <i class=\"icon-angle-down\"></i>
                    </a>
                    <ul class=\"dropdown-menu\">
                        <li><a href=\"";
        // line 52
        echo $this->env->getExtension('routing')->getPath("management_user_show");
        echo "\"><i class=\"icon-user\"></i> Datos Personales</a>
                        </li>
                        <li><a href=\"#\"><i class=\"icon-envelope\"></i> Correos</a></li>
                        <li class=\"divider\"></li>
                        <li><a href=\"";
        // line 56
        echo $this->env->getExtension('routing')->getPath("logout");
        echo "\"><i class=\"icon-key\"></i> Salir</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class=\"page-container\">
    <div class=\"page-sidebar nav-collapse collapse\">
        <ul>
            <li>
                <div class=\"sidebar-toggler hidden-phone\"></div>
            </li>
            <li>
                <form class=\"sidebar-search\">
                    <div class=\"input-box\">
                        <a href=\"javascript:;\" class=\"remove\"></a>
                        <input type=\"text\" placeholder=\"Search...\"/>
                        <input type=\"button\" class=\"submit\" value=\" \"/>
                    </div>
                </form>
            </li>
            ";
        // line 78
        $this->displayBlock('menu', $context, $blocks);
        // line 79
        echo "        </ul>
    </div>

    <div class=\"page-content\">
        <div class=\"container-fluid\">
            <div class=\"row-fluid\">
                <div class=\"span12\">
                    <h3 class=\"page-title\">";
        // line 86
        $this->displayBlock("title", $context, $blocks);
        echo "
                        <div class=\"pull-right\">
                            <small>Usuario con ";
        // line 88
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "role", array()), "name", array()), "html", null, true);
        echo "</small>
                        </div>
                    </h3>
                    <ul class=\"breadcrumb\">
                        <li>
                            <i class=\"icon-money\"></i>
                            <a href=\"#\">Ganancias</a>
                            <i class=\"icon-angle-right\"></i>
                        </li>
                        <li>
                            <a href=\"#\" class=\"btn blue mini disabled active\">25</a>
                        </li>
                        ";
        // line 100
        if ( !$this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "role", array()), "isPayment", array())) {
            // line 101
            echo "                            <li class=\"pull-right\">
                                <a href=\"#paymentModal\"
                                   class=\"active btn blue tooltips\" data-toggle=\"modal\"
                                   data-original-title=\"Forme parte del Negocio de la empresa\"
                                   data-trigger=\"hover\" style=\"display: initial; vertical-align: 0 !important;\">
                                    <i class=\"m-icon-swapright m-icon-white\"></i> Comprar módulo de Registro
                                </a>
                                <!-- Modal -->
                                <div id=\"paymentModal\" class=\"modal hide fade\" tabindex=\"-1\" role=\"dialog\"
                                     aria-labelledby=\"myModalLabel3\" aria-hidden=\"true\">
                                    <div class=\"modal-header\">
                                        <button type=\"button\" class=\"close\" data-dismiss=\"modal\"
                                                aria-hidden=\"true\"></button>
                                        <h3 id=\"myModalLabel3\">Comprar Módulo de Registro</h3>
                                    </div>
                                    <div class=\"modal-body\">

                                    </div>
                                    <div class=\"modal-footer\">
                                        <button class=\"btn\" data-dismiss=\"modal\" aria-hidden=\"true\">Close</button>
                                        <button data-dismiss=\"modal\"
                                                onclick=\"window.location.href = '";
            // line 122
            echo $this->env->getExtension('routing')->getPath("management_user_associate_module", array("id" => 2));
            echo "'\"
                                                class=\"btn blue\">Comprar
                                        </button>
                                    </div>
                                </div>
                            </li>
                        ";
        }
        // line 129
        echo "                    </ul>
                </div>
            </div>
            <div class=\"row-fluid\">
                <div class=\"span3\">
                    <div class=\"portlet sale-summary\">
                        <div class=\"portlet-title\">
                            <div class=\"caption\">Resumen de Ventas</div>
                            <div class=\"tools\">
                                <a class=\"reload\" href=\"javascript:Codes.updateSales('";
        // line 138
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "id", array()), "html", null, true);
        echo "', '";
        echo $this->env->getExtension('routing')->getPath("management_get_sales");
        echo "');\"></a>
                            </div>
                        </div>
                        <ul class=\"unstyled\">
                            <li>
                                <span class=\"sale-info\">Ventas del Día <i class=\"icon-img-up\"></i></span>
                                <span id=\"daily-sale\" class=\"sale-num\">...</span>
                            </li>
                            <li>
                                <span class=\"sale-info\">Ventas de la Semana <i class=\"icon-img-down\"></i></span>
                                <span id=\"weekly-sale\" class=\"sale-num\">...</span>
                            </li>
                            <li>
                                <span class=\"sale-info\">Ganancias</span>
                                <span id=\"earning\" class=\"sale-num\">...</span>
                            </li>
                        </ul>
                    </div>
                </div>
                ";
        // line 157
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "get", array(0 => "associatedNotificationTypes"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["associatedNotificationType"]) {
            if ($this->getAttribute($context["associatedNotificationType"], "onBody", array())) {
                // line 158
                echo "                    <div class=\"span3 responsive\" data-tablet=\"span6\" data-desktop=\"span3\">
                        <div class=\"dashboard-stat ";
                // line 159
                echo twig_escape_filter($this->env, $this->getAttribute($context["associatedNotificationType"], "color", array()), "html", null, true);
                echo "\">
                            <div class=\"visual\">
                                <i class=\"";
                // line 161
                echo twig_escape_filter($this->env, $this->getAttribute($context["associatedNotificationType"], "icon", array()), "html", null, true);
                echo "\"></i>
                            </div>
                            <div class=\"details\">
                                <div class=\"number\">
                                    ";
                // line 165
                echo twig_escape_filter($this->env, (($this->getAttribute($context["associatedNotificationType"], "amount", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($context["associatedNotificationType"], "amount", array()), 0)) : (0)), "html", null, true);
                echo "
                                </div>
                                <div class=\"desc\">
                                    ";
                // line 168
                echo twig_escape_filter($this->env, $this->getAttribute($context["associatedNotificationType"], "name", array()), "html", null, true);
                echo "
                                </div>
                            </div>
                            <a class=\"more\" href=\"#\">
                                Ver más <i class=\"m-icon-swapright m-icon-white\"></i>
                            </a>
                        </div>
                    </div>
                ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['associatedNotificationType'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 177
        echo "            </div>
            ";
        // line 178
        if ( !$this->env->getExtension('security')->isGranted("ROLE_ADMIN")) {
            // line 179
            echo "                <div class=\"row-fluid\">
                    <div class=\"span12\">
                        <div class=\"portlet\">
                            <div class=\"portlet-title\">
                                <div class=\"caption\"><i class=\"icon-money\"></i>Módulos Disponibles para Comprar</div>
                                <div class=\"tools\">
                                    <a href=\"javascript:;\" class=\"collapse\"></a>
                                </div>
                            </div>
                            <div class=\"portlet-body\">
                                <div class=\"row-fluid\">
                                    ";
            // line 190
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "get", array(0 => "modules"), "method"));
            foreach ($context['_seq'] as $context["_key"] => $context["module"]) {
                if ($this->getAttribute($context["module"], "isOnBody", array())) {
                    // line 191
                    echo "                                        ";
                    $context["associated"] = false;
                    // line 192
                    echo "                                        ";
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "get", array(0 => "associatedModules"), "method"));
                    foreach ($context['_seq'] as $context["_key"] => $context["associatedModule"]) {
                        // line 193
                        echo "                                            ";
                        if (($this->getAttribute($this->getAttribute($context["associatedModule"], "module", array()), "id", array()) == $this->getAttribute($context["module"], "id", array()))) {
                            // line 194
                            echo "                                                ";
                            $context["associated"] = true;
                            // line 195
                            echo "                                            ";
                        }
                        // line 196
                        echo "                                        ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['associatedModule'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 197
                    echo "                                        <div class=\"span3\">
                                            <div class=\"pricing-table2 ";
                    // line 198
                    if ((isset($context["associated"]) ? $context["associated"] : $this->getContext($context, "associated"))) {
                        echo "selected";
                    }
                    echo "\">
                                                <h3>";
                    // line 199
                    echo twig_escape_filter($this->env, $this->getAttribute($context["module"], "name", array()), "html", null, true);
                    echo "</h3>

                                                <div class=\"desc\">
                                                    ";
                    // line 202
                    echo twig_escape_filter($this->env, $this->getAttribute($context["module"], "description", array()), "html", null, true);
                    echo "
                                                </div>
                                                <div class=\"rate\">
                                                    <div class=\"price\">
                                                        <div class=\"currency \">
                                                            \$<br/>
                                                        </div>
                                                        <div class=\"amount \">
                                                            ";
                    // line 210
                    echo twig_escape_filter($this->env, $this->getAttribute($context["module"], "getCost", array()), "html", null, true);
                    echo "
                                                        </div>
                                                    </div>
                                                    ";
                    // line 213
                    if ( !$this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "role", array()), "isPayment", array())) {
                        // line 214
                        echo "                                                        <a href=\"#\" class=\"btn disabled tooltips\"
                                                           data-original-title=\"Para comprar este módulo debe comprar el de REGISTRO primero!\"
                                                           data-trigger=\"hover\">
                                                            Comprar <i class=\"m-icon-swapright\"></i>
                                                        </a>
                                                    ";
                    } elseif (($this->getAttribute($this->getAttribute($this->getAttribute(                    // line 219
(isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "role", array()), "isPayment", array()) && (isset($context["associated"]) ? $context["associated"] : $this->getContext($context, "associated")))) {
                        // line 220
                        echo "                                                        <a href=\"#\" class=\"btn disabled tooltips\"
                                                           data-original-title=\"Le quedan ";
                        // line 221
                        echo twig_escape_filter($this->env, $this->getAttribute($context["module"], "activeDays", array()), "html", null, true);
                        echo " días en este módulo\"
                                                           data-trigger=\"hover\">
                                                            ";
                        // line 223
                        echo twig_escape_filter($this->env, $this->getAttribute($context["module"], "activeDays", array()), "html", null, true);
                        echo " días <i class=\"icon-time\"></i>
                                                        </a>
                                                    ";
                    } else {
                        // line 226
                        echo "                                                        <a href=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("management_user_associate_module", array("id" => $this->getAttribute($context["module"], "id", array()))), "html", null, true);
                        echo "\"
                                                           class=\"btn tooltips\"
                                                           data-original-title=\"Compre y disfrute del módulo ";
                        // line 228
                        echo twig_escape_filter($this->env, $this->getAttribute($context["module"], "name", array()), "html", null, true);
                        echo "\"
                                                           data-trigger=\"hover\">
                                                            Comprar <i class=\"m-icon-swapright\"></i>
                                                        </a>
                                                    ";
                    }
                    // line 233
                    echo "                                                </div>
                                            </div>
                                        </div>
                                        <div class=\"spance10 visible-phone\"></div>
                                    ";
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['module'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 238
            echo "                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            ";
        }
        // line 244
        echo "            ";
        $this->displayBlock('content', $context, $blocks);
        // line 245
        echo "        </div>
    </div>
</div>
<div class=\"footer\">
    2016 &copy; Megalifepro
    <div class=\"span pull-right\">
        <span class=\"go-top\"><i class=\"icon-angle-up\"></i></span>
    </div>
</div>
<script src=\"";
        // line 254
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/plugins/jquery-1.8.3.min.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
<script src=\"";
        // line 255
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js"), "html", null, true);
        echo "\"
        type=\"text/javascript\"></script>
<script src=\"";
        // line 257
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/plugins/bootstrap/js/bootstrap.min.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
<script src=\"";
        // line 258
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/plugins/breakpoints/breakpoints.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
<script src=\"";
        // line 259
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/plugins/jquery-slimscroll/jquery.slimscroll.min.js"), "html", null, true);
        echo "\"
        type=\"text/javascript\"></script>
<script src=\"";
        // line 261
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/plugins/jquery.blockui.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
<script src=\"";
        // line 262
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/plugins/jquery.cookie.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
<script src=\"";
        // line 263
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/plugins/uniform/jquery.uniform.min.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>

<script src=\"";
        // line 265
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/plugins/jquery.pulsate.min.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
<script src=\"";
        // line 266
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/plugins/gritter/js/jquery.gritter.min.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>

<script src=\"";
        // line 268
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/scripts/app.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
<script src=\"";
        // line 269
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/scripts/codes.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
<script>
    jQuery(document).ready(function () {
        App.init();
        Codes.init();
        Codes.updateSales('";
        // line 274
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "id", array()), "html", null, true);
        echo "', '";
        echo $this->env->getExtension('routing')->getPath("management_get_sales");
        echo "');
        Codes.initOptions();
        Codes.initIntro();
    });
</script>
";
        // line 279
        $this->displayBlock('javascripts', $context, $blocks);
        // line 280
        echo "</body>
</html>
";
        
        $__internal_6829b729547e95e73fa509ada52dcba6ee2c1d8e880821ea6b3e15c60cc241ab->leave($__internal_6829b729547e95e73fa509ada52dcba6ee2c1d8e880821ea6b3e15c60cc241ab_prof);

    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        $__internal_27151c501c98bfc364ed8b7597d207360102492ceaedc63680a9a3c51b9d00ec = $this->env->getExtension("native_profiler");
        $__internal_27151c501c98bfc364ed8b7597d207360102492ceaedc63680a9a3c51b9d00ec->enter($__internal_27151c501c98bfc364ed8b7597d207360102492ceaedc63680a9a3c51b9d00ec_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Welcome!";
        
        $__internal_27151c501c98bfc364ed8b7597d207360102492ceaedc63680a9a3c51b9d00ec->leave($__internal_27151c501c98bfc364ed8b7597d207360102492ceaedc63680a9a3c51b9d00ec_prof);

    }

    // line 20
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_1862704bdf393a229015c68619301f922aea8989b5326da9244d1568a6bdf5a3 = $this->env->getExtension("native_profiler");
        $__internal_1862704bdf393a229015c68619301f922aea8989b5326da9244d1568a6bdf5a3->enter($__internal_1862704bdf393a229015c68619301f922aea8989b5326da9244d1568a6bdf5a3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        
        $__internal_1862704bdf393a229015c68619301f922aea8989b5326da9244d1568a6bdf5a3->leave($__internal_1862704bdf393a229015c68619301f922aea8989b5326da9244d1568a6bdf5a3_prof);

    }

    // line 35
    public function block_notifications($context, array $blocks = array())
    {
        $__internal_007ce9c38a76cde3a107b6d603f17b82ae602961c3660d69eb7718fae781c528 = $this->env->getExtension("native_profiler");
        $__internal_007ce9c38a76cde3a107b6d603f17b82ae602961c3660d69eb7718fae781c528->enter($__internal_007ce9c38a76cde3a107b6d603f17b82ae602961c3660d69eb7718fae781c528_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "notifications"));

        
        $__internal_007ce9c38a76cde3a107b6d603f17b82ae602961c3660d69eb7718fae781c528->leave($__internal_007ce9c38a76cde3a107b6d603f17b82ae602961c3660d69eb7718fae781c528_prof);

    }

    // line 78
    public function block_menu($context, array $blocks = array())
    {
        $__internal_057a1f54e3f96d25acfb69f3c278b94232be60193659265c7d7a5d0b8d915ccd = $this->env->getExtension("native_profiler");
        $__internal_057a1f54e3f96d25acfb69f3c278b94232be60193659265c7d7a5d0b8d915ccd->enter($__internal_057a1f54e3f96d25acfb69f3c278b94232be60193659265c7d7a5d0b8d915ccd_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        
        $__internal_057a1f54e3f96d25acfb69f3c278b94232be60193659265c7d7a5d0b8d915ccd->leave($__internal_057a1f54e3f96d25acfb69f3c278b94232be60193659265c7d7a5d0b8d915ccd_prof);

    }

    // line 244
    public function block_content($context, array $blocks = array())
    {
        $__internal_b1cdf95258ca5e4f0cd576a191481792d149096ad5994114a09a9d835680a2a0 = $this->env->getExtension("native_profiler");
        $__internal_b1cdf95258ca5e4f0cd576a191481792d149096ad5994114a09a9d835680a2a0->enter($__internal_b1cdf95258ca5e4f0cd576a191481792d149096ad5994114a09a9d835680a2a0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        
        $__internal_b1cdf95258ca5e4f0cd576a191481792d149096ad5994114a09a9d835680a2a0->leave($__internal_b1cdf95258ca5e4f0cd576a191481792d149096ad5994114a09a9d835680a2a0_prof);

    }

    // line 279
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_4793e5d42622e6f8579385fe7e3802567cae722da7a6f396ecb5c984981d5e0b = $this->env->getExtension("native_profiler");
        $__internal_4793e5d42622e6f8579385fe7e3802567cae722da7a6f396ecb5c984981d5e0b->enter($__internal_4793e5d42622e6f8579385fe7e3802567cae722da7a6f396ecb5c984981d5e0b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        
        $__internal_4793e5d42622e6f8579385fe7e3802567cae722da7a6f396ecb5c984981d5e0b->leave($__internal_4793e5d42622e6f8579385fe7e3802567cae722da7a6f396ecb5c984981d5e0b_prof);

    }

    public function getTemplateName()
    {
        return "::base-admin.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  613 => 279,  602 => 244,  591 => 78,  580 => 35,  569 => 20,  557 => 5,  548 => 280,  546 => 279,  536 => 274,  528 => 269,  524 => 268,  519 => 266,  515 => 265,  510 => 263,  506 => 262,  502 => 261,  497 => 259,  493 => 258,  489 => 257,  484 => 255,  480 => 254,  469 => 245,  466 => 244,  458 => 238,  447 => 233,  439 => 228,  433 => 226,  427 => 223,  422 => 221,  419 => 220,  417 => 219,  410 => 214,  408 => 213,  402 => 210,  391 => 202,  385 => 199,  379 => 198,  376 => 197,  370 => 196,  367 => 195,  364 => 194,  361 => 193,  356 => 192,  353 => 191,  348 => 190,  335 => 179,  333 => 178,  330 => 177,  314 => 168,  308 => 165,  301 => 161,  296 => 159,  293 => 158,  288 => 157,  264 => 138,  253 => 129,  243 => 122,  220 => 101,  218 => 100,  203 => 88,  198 => 86,  189 => 79,  187 => 78,  162 => 56,  155 => 52,  147 => 48,  144 => 47,  138 => 45,  132 => 43,  129 => 42,  122 => 39,  120 => 38,  116 => 36,  114 => 35,  108 => 32,  102 => 29,  98 => 28,  89 => 22,  84 => 21,  82 => 20,  78 => 19,  74 => 18,  70 => 17,  66 => 16,  62 => 15,  58 => 14,  54 => 13,  49 => 11,  44 => 9,  40 => 8,  34 => 5,  28 => 1,);
    }
}
