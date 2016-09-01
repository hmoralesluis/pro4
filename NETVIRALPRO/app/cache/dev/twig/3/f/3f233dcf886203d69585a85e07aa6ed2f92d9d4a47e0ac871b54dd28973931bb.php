<?php

/* AdminBundle:Software:index.html.twig */
class __TwigTemplate_3f233dcf886203d69585a85e07aa6ed2f92d9d4a47e0ac871b54dd28973931bb extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("AdminBundle::layout.html.twig", "AdminBundle:Software:index.html.twig", 1);
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
        $__internal_582a2283d113cd670f6d4d604dea822afcca826fc8d2a8810568a08309bffa13 = $this->env->getExtension("native_profiler");
        $__internal_582a2283d113cd670f6d4d604dea822afcca826fc8d2a8810568a08309bffa13->enter($__internal_582a2283d113cd670f6d4d604dea822afcca826fc8d2a8810568a08309bffa13_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "AdminBundle:Software:index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_582a2283d113cd670f6d4d604dea822afcca826fc8d2a8810568a08309bffa13->leave($__internal_582a2283d113cd670f6d4d604dea822afcca826fc8d2a8810568a08309bffa13_prof);

    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $__internal_1152d22500153c43c1e45da0eeef08c8cb2c1ad3e08c87b15d1ccccd5ea5968e = $this->env->getExtension("native_profiler");
        $__internal_1152d22500153c43c1e45da0eeef08c8cb2c1ad3e08c87b15d1ccccd5ea5968e->enter($__internal_1152d22500153c43c1e45da0eeef08c8cb2c1ad3e08c87b15d1ccccd5ea5968e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Softwares";
        
        $__internal_1152d22500153c43c1e45da0eeef08c8cb2c1ad3e08c87b15d1ccccd5ea5968e->leave($__internal_1152d22500153c43c1e45da0eeef08c8cb2c1ad3e08c87b15d1ccccd5ea5968e_prof);

    }

    // line 5
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_398f088f69611b2ec9e06c1c1ee3d7eddf4e5d697b527a450888891e15290451 = $this->env->getExtension("native_profiler");
        $__internal_398f088f69611b2ec9e06c1c1ee3d7eddf4e5d697b527a450888891e15290451->enter($__internal_398f088f69611b2ec9e06c1c1ee3d7eddf4e5d697b527a450888891e15290451_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 6
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/css/pages/search.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\"/>
    <link rel=\"stylesheet\" href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/plugins/data-tables/DT_bootstrap.css"), "html", null, true);
        echo "\"/>
";
        
        $__internal_398f088f69611b2ec9e06c1c1ee3d7eddf4e5d697b527a450888891e15290451->leave($__internal_398f088f69611b2ec9e06c1c1ee3d7eddf4e5d697b527a450888891e15290451_prof);

    }

    // line 10
    public function block_content($context, array $blocks = array())
    {
        $__internal_d3c670eb90cf1b54c35c19f3db8db8b3c270f08093ac96170f095a50278749be = $this->env->getExtension("native_profiler");
        $__internal_d3c670eb90cf1b54c35c19f3db8db8b3c270f08093ac96170f095a50278749be->enter($__internal_d3c670eb90cf1b54c35c19f3db8db8b3c270f08093ac96170f095a50278749be_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        // line 11
        echo "    <div class=\"portlet\">
        <div class=\"portlet-title\">
            <div class=\"caption\"><i class=\"icon-star\"></i>Softwares</div>
            <div class=\"tools\">
                <a href=\"javascript:;\" class=\"collapse\"></a>
            </div>
        </div>
        <div class=\"portlet-body\">
            ";
        // line 19
        if ($this->env->getExtension('security')->isGranted("ROLE_ADMIN")) {
            // line 20
            echo "                <div class=\"row-fluid\">
                    <div class=\"span4\">
                        <div class=\"booking-app\">
                            <a href=\"";
            // line 23
            echo $this->env->getExtension('routing')->getPath("management_software_new");
            echo "\">
                                <i class=\"icon-desktop pull-right\"></i>
                                <span class=\"pull-right\">Registrar Software</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class=\"space40\"></div>
            ";
        }
        // line 32
        echo "            <table class=\"table table-striped table-hover\" id=\"software\">
                <thead>
                <tr>
                    <th align=\"center\"></th>
                </tr>
                </thead>
                <tbody>
                ";
        // line 39
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")));
        foreach ($context['_seq'] as $context["_key"] => $context["entity"]) {
            // line 40
            echo "                    <tr class=\"odd gradeX\">
                        <td>
                            <div class=\"row-fluid portfolio-block\">
                                <div class=\"span10 booking-blocks\">
                                    <div class=\"pull-left booking-img\">
                                        <img src=\"";
            // line 45
            echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/img/gallery/image4.jpg"), "html", null, true);
            echo "\" alt=\"\">
                                        <ul class=\"unstyled\">
                                            <li><i class=\"icon-desktop\"></i>";
            // line 47
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "plataform", array()), "html", null, true);
            echo "</li>
                                            <li>";
            // line 48
            if ($this->getAttribute($context["entity"], "activationCode", array())) {
                echo " <i
                                                        class=\"icon-map-marker\"></i> Código de Activación ";
            }
            // line 49
            echo "</li>
                                        </ul>
                                    </div>
                                    <div style=\"overflow:hidden;\">
                                        <h2>
                                            <a href=\"";
            // line 54
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("management_software_show", array("id" => $this->getAttribute($context["entity"], "id", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "name", array()), "html", null, true);
            echo "</a>
                                        </h2>
                                        <ul class=\"unstyled inline\">
                                            <li><i class=\"icon-star\"></i></li>
                                            <li><i class=\"icon-star\"></i></li>
                                            <li><i class=\"icon-star\"></i></li>
                                            <li><i class=\"icon-star\"></i></li>
                                            <li><i class=\"icon-star-empty\"></i></li>
                                        </ul>
                                        <p> ";
            // line 63
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "description", array()), "html", null, true);
            echo " <a href=\"#\">ver más</a></p>
                                    </div>
                                </div>
                                <div class=\"span2 portfolio-btn\">
                                    <a href=\"";
            // line 67
            echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "basePath", array()) . "/") . $this->getAttribute($context["entity"], "getWebPath", array(), "method")), "html", null, true);
            echo "\"
                                       class=\"btn bigicn-only\"><span>Descargar</span></a>
                                </div>
                            </div>
                        </td>
                    </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entity'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 74
        echo "                </tbody>
            </table>
        </div>
    </div>
";
        
        $__internal_d3c670eb90cf1b54c35c19f3db8db8b3c270f08093ac96170f095a50278749be->leave($__internal_d3c670eb90cf1b54c35c19f3db8db8b3c270f08093ac96170f095a50278749be_prof);

    }

    // line 80
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_4f4900c3d108453a21ce9446b1af14db678716224ee6545066d41b954876642e = $this->env->getExtension("native_profiler");
        $__internal_4f4900c3d108453a21ce9446b1af14db678716224ee6545066d41b954876642e->enter($__internal_4f4900c3d108453a21ce9446b1af14db678716224ee6545066d41b954876642e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 81
        echo "    <script type=\"text/javascript\"
            src=\"";
        // line 82
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/plugins/data-tables/jquery.dataTables.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\"
            src=\"";
        // line 84
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/plugins/data-tables/DT_bootstrap.js"), "html", null, true);
        echo "\"></script>
    <script>
        \$('#software').dataTable({
            \"aLengthMenu\": [
                [5, 15, 20, -1],
                [5, 15, 20, \"Todos\"] // change per page values here
            ],
            // set the initial value
            \"iDisplayLength\": 5,
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
                'aTargets': [0]
            }
            ]
        });
    </script>
";
        
        $__internal_4f4900c3d108453a21ce9446b1af14db678716224ee6545066d41b954876642e->leave($__internal_4f4900c3d108453a21ce9446b1af14db678716224ee6545066d41b954876642e_prof);

    }

    public function getTemplateName()
    {
        return "AdminBundle:Software:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  204 => 84,  199 => 82,  196 => 81,  190 => 80,  179 => 74,  166 => 67,  159 => 63,  145 => 54,  138 => 49,  133 => 48,  129 => 47,  124 => 45,  117 => 40,  113 => 39,  104 => 32,  92 => 23,  87 => 20,  85 => 19,  75 => 11,  69 => 10,  60 => 7,  55 => 6,  49 => 5,  37 => 3,  11 => 1,);
    }
}
