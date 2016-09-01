<?php

/* AdminBundle:TransactionType:index.html.twig */
class __TwigTemplate_9d22598d849f013bebf520183e9ef4d908a862c2db7e0bdd0c1bb42aec67896c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("AdminBundle::layout.html.twig", "AdminBundle:TransactionType:index.html.twig", 1);
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
        $__internal_38afc2ce32101c5232758aa1676455a27baa808ecfcd71c929e9f83569ee72a6 = $this->env->getExtension("native_profiler");
        $__internal_38afc2ce32101c5232758aa1676455a27baa808ecfcd71c929e9f83569ee72a6->enter($__internal_38afc2ce32101c5232758aa1676455a27baa808ecfcd71c929e9f83569ee72a6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "AdminBundle:TransactionType:index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_38afc2ce32101c5232758aa1676455a27baa808ecfcd71c929e9f83569ee72a6->leave($__internal_38afc2ce32101c5232758aa1676455a27baa808ecfcd71c929e9f83569ee72a6_prof);

    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $__internal_fc03b91398daf9d9bfc7e6d62edce0d7380be2533007eac2907e26c3864430b8 = $this->env->getExtension("native_profiler");
        $__internal_fc03b91398daf9d9bfc7e6d62edce0d7380be2533007eac2907e26c3864430b8->enter($__internal_fc03b91398daf9d9bfc7e6d62edce0d7380be2533007eac2907e26c3864430b8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Tipos de Transacciones";
        
        $__internal_fc03b91398daf9d9bfc7e6d62edce0d7380be2533007eac2907e26c3864430b8->leave($__internal_fc03b91398daf9d9bfc7e6d62edce0d7380be2533007eac2907e26c3864430b8_prof);

    }

    // line 5
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_c409ca25cbb9136cef68b1c63e5e7bc8e32909c69b3b93f6c13b3cc3fdac5fef = $this->env->getExtension("native_profiler");
        $__internal_c409ca25cbb9136cef68b1c63e5e7bc8e32909c69b3b93f6c13b3cc3fdac5fef->enter($__internal_c409ca25cbb9136cef68b1c63e5e7bc8e32909c69b3b93f6c13b3cc3fdac5fef_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

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
        
        $__internal_c409ca25cbb9136cef68b1c63e5e7bc8e32909c69b3b93f6c13b3cc3fdac5fef->leave($__internal_c409ca25cbb9136cef68b1c63e5e7bc8e32909c69b3b93f6c13b3cc3fdac5fef_prof);

    }

    // line 11
    public function block_content($context, array $blocks = array())
    {
        $__internal_3a2e15937ed08ca8163daf9e9ac6588bb2a8aad8d633accb0525e26654c1f4ef = $this->env->getExtension("native_profiler");
        $__internal_3a2e15937ed08ca8163daf9e9ac6588bb2a8aad8d633accb0525e26654c1f4ef->enter($__internal_3a2e15937ed08ca8163daf9e9ac6588bb2a8aad8d633accb0525e26654c1f4ef_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        // line 12
        echo "    <div class=\"portlet box yellow\">
        <div class=\"portlet-title\">
            <div class=\"caption\"><i class=\"icon-list\"></i>Listado de Tipos de Transacciones</div>
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
        echo $this->env->getExtension('routing')->getPath("config_transactiontype_new");
        echo "\" class=\"btn green\">
                        Registrar nuevo tipo de transacción
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
            <table class=\"table table-striped table-hover\" id=\"contries\">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                ";
        // line 48
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")));
        foreach ($context['_seq'] as $context["_key"] => $context["entity"]) {
            // line 49
            echo "                    <tr>
                        <td><a href=\"";
            // line 50
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("config_transactiontype_show", array("id" => $this->getAttribute($context["entity"], "id", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "id", array()), "html", null, true);
            echo "</a></td>
                        <td>";
            // line 51
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "name", array()), "html", null, true);
            echo "</td>
                        <td>
                            <a class=\"btn mini green\" href=\"";
            // line 53
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("config_country_show", array("id" => $this->getAttribute($context["entity"], "id", array()))), "html", null, true);
            echo "\"><i
                                        class=\"icon-eye-open\"></i> Mostrar</a>
                        </td>
                        <td>
                            <a class=\"btn mini blue\" href=\"";
            // line 57
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("config_transactiontype_edit", array("id" => $this->getAttribute($context["entity"], "id", array()))), "html", null, true);
            echo "\"><i
                                        class=\"icon-edit\"></i> Editar</a>
                        </td>
                    </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entity'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 62
        echo "                </tbody>
            </table>
        </div>
    </div>
";
        
        $__internal_3a2e15937ed08ca8163daf9e9ac6588bb2a8aad8d633accb0525e26654c1f4ef->leave($__internal_3a2e15937ed08ca8163daf9e9ac6588bb2a8aad8d633accb0525e26654c1f4ef_prof);

    }

    // line 68
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_93506d5ff538c36742b2f1a4dd26ecec7c42874b107709bc61b7b32ec9560196 = $this->env->getExtension("native_profiler");
        $__internal_93506d5ff538c36742b2f1a4dd26ecec7c42874b107709bc61b7b32ec9560196->enter($__internal_93506d5ff538c36742b2f1a4dd26ecec7c42874b107709bc61b7b32ec9560196_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 69
        echo "    <script type=\"text/javascript\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/plugins/select2/select2.min.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\"
            src=\"";
        // line 71
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/plugins/data-tables/jquery.dataTables.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\"
            src=\"";
        // line 73
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/plugins/data-tables/DT_bootstrap.js"), "html", null, true);
        echo "\"></script>
    <script>
        \$('#contries').dataTable({
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
                'aTargets': [2, 3]
            }
            ]
        });

        ";
        // line 98
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "flashbag", array()), "get", array(0 => "notice"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 99
            echo "        Codes.showMessage('Información', '";
            echo twig_escape_filter($this->env, $context["flashMessage"], "html", null, true);
            echo "');
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 101
        echo "    </script>
";
        
        $__internal_93506d5ff538c36742b2f1a4dd26ecec7c42874b107709bc61b7b32ec9560196->leave($__internal_93506d5ff538c36742b2f1a4dd26ecec7c42874b107709bc61b7b32ec9560196_prof);

    }

    public function getTemplateName()
    {
        return "AdminBundle:TransactionType:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  223 => 101,  214 => 99,  210 => 98,  182 => 73,  177 => 71,  171 => 69,  165 => 68,  154 => 62,  143 => 57,  136 => 53,  131 => 51,  125 => 50,  122 => 49,  118 => 48,  92 => 25,  77 => 12,  71 => 11,  62 => 8,  58 => 7,  55 => 6,  49 => 5,  37 => 3,  11 => 1,);
    }
}
