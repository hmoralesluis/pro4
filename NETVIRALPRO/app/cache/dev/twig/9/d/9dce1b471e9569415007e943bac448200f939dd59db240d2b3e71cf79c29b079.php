<?php

/* AdminBundle:ProductType:index.html.twig */
class __TwigTemplate_9dce1b471e9569415007e943bac448200f939dd59db240d2b3e71cf79c29b079 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("AdminBundle::layout.html.twig", "AdminBundle:ProductType:index.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'content' => array($this, 'block_content'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "AdminBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_95de7e03c57e2cd7427ec56e57fba140a549f75e0f9027e84c1cc47fe5322240 = $this->env->getExtension("native_profiler");
        $__internal_95de7e03c57e2cd7427ec56e57fba140a549f75e0f9027e84c1cc47fe5322240->enter($__internal_95de7e03c57e2cd7427ec56e57fba140a549f75e0f9027e84c1cc47fe5322240_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "AdminBundle:ProductType:index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_95de7e03c57e2cd7427ec56e57fba140a549f75e0f9027e84c1cc47fe5322240->leave($__internal_95de7e03c57e2cd7427ec56e57fba140a549f75e0f9027e84c1cc47fe5322240_prof);

    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $__internal_911d6cc4534df9259a1a63347b844e5a6fb82f4e9b7920a9dd303e4fab5d648c = $this->env->getExtension("native_profiler");
        $__internal_911d6cc4534df9259a1a63347b844e5a6fb82f4e9b7920a9dd303e4fab5d648c->enter($__internal_911d6cc4534df9259a1a63347b844e5a6fb82f4e9b7920a9dd303e4fab5d648c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Tipos de Producto";
        
        $__internal_911d6cc4534df9259a1a63347b844e5a6fb82f4e9b7920a9dd303e4fab5d648c->leave($__internal_911d6cc4534df9259a1a63347b844e5a6fb82f4e9b7920a9dd303e4fab5d648c_prof);

    }

    // line 5
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_7edf86f063b74f9625192ea321fbcbe25d650948e0ad63920ce9a1530389f8ca = $this->env->getExtension("native_profiler");
        $__internal_7edf86f063b74f9625192ea321fbcbe25d650948e0ad63920ce9a1530389f8ca->enter($__internal_7edf86f063b74f9625192ea321fbcbe25d650948e0ad63920ce9a1530389f8ca_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 6
        echo "    <link rel=\"stylesheet\" type=\"text/css\"
          href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/plugins/select2/select2_metro.css"), "html", null, true);
        echo "\"/>
    <link rel=\"stylesheet\" href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/plugins/data-tables/DT_bootstrap.css"), "html", null, true);
        echo "\"/>
";
        
        $__internal_7edf86f063b74f9625192ea321fbcbe25d650948e0ad63920ce9a1530389f8ca->leave($__internal_7edf86f063b74f9625192ea321fbcbe25d650948e0ad63920ce9a1530389f8ca_prof);

    }

    // line 11
    public function block_content($context, array $blocks = array())
    {
        $__internal_c843b80ccfa71ad481a024d50a85b5a45f2df40f4459aec0b8b6b69b56ca3d4d = $this->env->getExtension("native_profiler");
        $__internal_c843b80ccfa71ad481a024d50a85b5a45f2df40f4459aec0b8b6b69b56ca3d4d->enter($__internal_c843b80ccfa71ad481a024d50a85b5a45f2df40f4459aec0b8b6b69b56ca3d4d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        // line 12
        echo "    <div class=\"portlet box yellow\">
        <div class=\"portlet-title\">
            <div class=\"caption\"><i class=\"icon-list\"></i>Listado de Tipos de producto</div>
            <div class=\"tools\">
                <a href=\"javascript:;\" class=\"collapse\"></a>
                <a href=\"#portlet-config\" data-toggle=\"modal\" class=\"config\"></a>
                <a href=\"javascript:;\" class=\"reload\"></a>
                <a href=\"javascript:;\" class=\"remove\"></a>
            </div>
        </div>
        <div class=\"portlet-body\">
            <div class=\"clearfix\">
                <div class=\"btn-group\">
                    <a href=\"";
        // line 25
        echo $this->env->getExtension('routing')->getPath("config_producttype_new");
        echo "\" class=\"btn green\">
                        Registrar tipo de producto
                    </a>
                </div>
                <div class=\"btn-group pull-right\">
                    <button class=\"btn dropdown-toggle\" data-toggle=\"dropdown\">Herramientas <i
                                class=\"icon-angle-down\"></i>
                    </button>
                    <ul class=\"dropdown-menu pull-right\">
                        <li><a href=\"#\">Imprimir listado</a></li>
                    </ul>
                </div>
            </div>
            <table class=\"table table-striped table-hover\" id=\"types\">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Activo</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                ";
        // line 49
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")));
        foreach ($context['_seq'] as $context["_key"] => $context["entity"]) {
            // line 50
            echo "                    <tr>
                        <td><a href=\"";
            // line 51
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("config_producttype_show", array("id" => $this->getAttribute($context["entity"], "id", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "id", array()), "html", null, true);
            echo "</a>
                        </td>
                        <td>";
            // line 53
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "name", array()), "html", null, true);
            echo "</td>
                        <td>";
            // line 54
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "active", array()), "html", null, true);
            echo "</td>
                        <td>
                            <a class=\"btn mini green\" href=\"";
            // line 56
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("config_producttype_show", array("id" => $this->getAttribute($context["entity"], "id", array()))), "html", null, true);
            echo "\"><i
                                        class=\"icon-eye-open\"></i> Mostrar</a>
                        </td>
                        <td>
                            <a class=\"btn mini blue\"
                               href=\"";
            // line 61
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("config_producttype_edit", array("id" => $this->getAttribute($context["entity"], "id", array()))), "html", null, true);
            echo "\"><i
                                        class=\"icon-edit\"></i> Editar</a>
                        </td>
                    </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entity'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 66
        echo "                </tbody>
            </table>
        </div>
    </div>
";
        
        $__internal_c843b80ccfa71ad481a024d50a85b5a45f2df40f4459aec0b8b6b69b56ca3d4d->leave($__internal_c843b80ccfa71ad481a024d50a85b5a45f2df40f4459aec0b8b6b69b56ca3d4d_prof);

    }

    // line 72
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_0f089d2c1f0c46b98b2e41ef5f0ddf2218cd1a0da149ed3e05a6c964607d26e8 = $this->env->getExtension("native_profiler");
        $__internal_0f089d2c1f0c46b98b2e41ef5f0ddf2218cd1a0da149ed3e05a6c964607d26e8->enter($__internal_0f089d2c1f0c46b98b2e41ef5f0ddf2218cd1a0da149ed3e05a6c964607d26e8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 73
        echo "    <script type=\"text/javascript\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/plugins/select2/select2.min.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\"
            src=\"";
        // line 75
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/plugins/data-tables/jquery.dataTables.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\"
            src=\"";
        // line 77
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/plugins/data-tables/DT_bootstrap.js"), "html", null, true);
        echo "\"></script>
    <script>
        \$('#types').dataTable({
            \"aLengthMenu\": [
                [5, 15, 20, -1],
                [5, 15, 20, \"Todos\"] // change per page values here
            ],
            // set the initial value
            \"iDisplayLength\": 5,
            \"sDom\": \"<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>\",
            \"sPaginationType\": \"bootstrap\",
            \"oLanguage\": {
                \"sLengthMenu\": \"_MENU_  por página\",
                \"oPaginate\": {
                    \"sPrevious\": \"Anterior\",
                    \"sNext\": \"Siguiente\"
                }
            },
            \"aoColumnDefs\": [{
                'bSortable': false,
                'aTargets': [3, 4]
            }
            ]
        });

        ";
        // line 102
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "flashbag", array()), "get", array(0 => "notice"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 103
            echo "        Codes.showMessage('Información', '";
            echo twig_escape_filter($this->env, $context["flashMessage"], "html", null, true);
            echo "');
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 105
        echo "    </script>
";
        
        $__internal_0f089d2c1f0c46b98b2e41ef5f0ddf2218cd1a0da149ed3e05a6c964607d26e8->leave($__internal_0f089d2c1f0c46b98b2e41ef5f0ddf2218cd1a0da149ed3e05a6c964607d26e8_prof);

    }

    public function getTemplateName()
    {
        return "AdminBundle:ProductType:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  230 => 105,  221 => 103,  217 => 102,  189 => 77,  184 => 75,  178 => 73,  172 => 72,  161 => 66,  150 => 61,  142 => 56,  137 => 54,  133 => 53,  126 => 51,  123 => 50,  119 => 49,  92 => 25,  77 => 12,  71 => 11,  62 => 8,  58 => 7,  55 => 6,  49 => 5,  37 => 3,  11 => 1,);
    }
}
