<?php

/* AdminBundle:Conference:index.html.twig */
class __TwigTemplate_00b04bec0237c1c2f2ba3bce768e5b2fa29bbb37905228f15fc26a311f21cf85 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("AdminBundle::layout.html.twig", "AdminBundle:Conference:index.html.twig", 1);
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
        $__internal_b05c4f0b903e402a21296c05728a2d472e541242645ab8fb2c6cf7fe88387b57 = $this->env->getExtension("native_profiler");
        $__internal_b05c4f0b903e402a21296c05728a2d472e541242645ab8fb2c6cf7fe88387b57->enter($__internal_b05c4f0b903e402a21296c05728a2d472e541242645ab8fb2c6cf7fe88387b57_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "AdminBundle:Conference:index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_b05c4f0b903e402a21296c05728a2d472e541242645ab8fb2c6cf7fe88387b57->leave($__internal_b05c4f0b903e402a21296c05728a2d472e541242645ab8fb2c6cf7fe88387b57_prof);

    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $__internal_d35c072443f57ec4e1fb56da59729d260fbaeec34888c08b93db4b3449f1d52e = $this->env->getExtension("native_profiler");
        $__internal_d35c072443f57ec4e1fb56da59729d260fbaeec34888c08b93db4b3449f1d52e->enter($__internal_d35c072443f57ec4e1fb56da59729d260fbaeec34888c08b93db4b3449f1d52e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Conferencias";
        
        $__internal_d35c072443f57ec4e1fb56da59729d260fbaeec34888c08b93db4b3449f1d52e->leave($__internal_d35c072443f57ec4e1fb56da59729d260fbaeec34888c08b93db4b3449f1d52e_prof);

    }

    // line 5
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_5fe6b7618383e30401bda7010e9b78d1b6bb62dd0214a88eb7275d0d12f34fbf = $this->env->getExtension("native_profiler");
        $__internal_5fe6b7618383e30401bda7010e9b78d1b6bb62dd0214a88eb7275d0d12f34fbf->enter($__internal_5fe6b7618383e30401bda7010e9b78d1b6bb62dd0214a88eb7275d0d12f34fbf_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 6
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/css/pages/search.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\"/>
    <link rel=\"stylesheet\" href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/plugins/data-tables/DT_bootstrap.css"), "html", null, true);
        echo "\"/>
";
        
        $__internal_5fe6b7618383e30401bda7010e9b78d1b6bb62dd0214a88eb7275d0d12f34fbf->leave($__internal_5fe6b7618383e30401bda7010e9b78d1b6bb62dd0214a88eb7275d0d12f34fbf_prof);

    }

    // line 10
    public function block_content($context, array $blocks = array())
    {
        $__internal_6d7a6d721399e0092114b8d07d79fb12bb329f5fe6ad9f160bd4907e867298bd = $this->env->getExtension("native_profiler");
        $__internal_6d7a6d721399e0092114b8d07d79fb12bb329f5fe6ad9f160bd4907e867298bd->enter($__internal_6d7a6d721399e0092114b8d07d79fb12bb329f5fe6ad9f160bd4907e867298bd_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        // line 11
        echo "    <div class=\"portlet\">
        <div class=\"portlet-title\">
            <div class=\"caption\"><i class=\"icon-star\"></i>Conferencias</div>
            <div class=\"tools\">
                <a href=\"javascript:;\" class=\"collapse\"></a>
            </div>
        </div>
        <div class=\"portlet-body\">
            <div class=\"row-fluid\">
                <div class=\"span8 booking-search\">
                    <form action=\"#\">
                        <div class=\"clearfix margin-bottom-10\">
                            <label>Distanation</label>
                            <div class=\"input-icon left\">
                                <i class=\"icon-map-marker\"></i>
                                <input class=\"m-wrap span12\" type=\"text\" placeholder=\"Canada, Malaysia, Russia ...\">
                            </div>
                        </div>
                        <div class=\"clearfix margin-bottom-20\">
                            <div class=\"control-group pull-left margin-right-20\">
                                <label class=\"control-label\">Check-in:</label>
                                <div class=\"controls\">
                                    <div class=\"input-append date date-picker\" data-date=\"12-02-2012\" data-date-format=\"dd-mm-yyyy\" data-date-viewmode=\"years\">
                                        <input class=\"m-wrap m-ctrl-medium date-picker\" size=\"16\" type=\"text\" value=\"12-02-2012\" /><span class=\"add-on\"><i class=\"icon-calendar\"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class=\"control-group pull-left\">
                                <label class=\"control-label\">Check-out:</label>
                                <div class=\"controls\">
                                    <div class=\"input-append date date-picker\" data-date=\"102/2012\" data-date-format=\"mm/yyyy\" data-date-viewmode=\"years\" data-date-minviewmode=\"months\">
                                        <input class=\"m-wrap m-ctrl-medium date-picker\" size=\"16\" type=\"text\" value=\"02/2012\" /><span class=\"add-on\"><i class=\"icon-calendar\"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=\"clearfix margin-bottom-10\">
                            <div class=\"pull-left margin-right-20\">
                                <label>How Many</label>
                                <div class=\"input-icon left\">
                                    <i class=\"icon-user\"></i>
                                    <input class=\"m-wrap\" type=\"text\" placeholder=\"1 Room, 2 Adults, 0 Children\">
                                </div>
                            </div>
                            <div class=\"pull-left\">
                                <div class=\"control-group booking-option\">
                                    <label class=\"control-label\">Choose Option</label>
                                    <div class=\"controls controls-uniform\">
                                        <label class=\"radio\">
                                            <input type=\"radio\" name=\"optionsRadios2\" value=\"option1\" />
                                            Option1
                                        </label>
                                        <label class=\"radio\">
                                            <input type=\"radio\" name=\"optionsRadios2\" value=\"option2\" checked />
                                            Option2
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class=\"btn blue btn-block\">SEARCH <i class=\"m-icon-swapright m-icon-white\"></i></button>
                    </form>
                </div>
                <!--end booking-search-->
                <div class=\"span4\">
                    ";
        // line 76
        if ($this->env->getExtension('security')->isGranted("ROLE_ADMIN")) {
            // line 77
            echo "                    <div class=\"booking-app\">
                        <a href=\"";
            // line 78
            echo $this->env->getExtension('routing')->getPath("management_conference_new");
            echo "\">
                            <i class=\"icon-bullhorn pull-right\"></i>
                            <span class=\"pull-right\">Registrar Conferencia</span>
                        </a>
                    </div>
                    ";
        }
        // line 84
        echo "                    <div class=\"booking-offer\">
                        <img src=\"";
        // line 85
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/img/search/1.jpg"), "html", null, true);
        echo "\" alt=\"\">
                        <div class=\"booking-offer-in\">
                            <span>Conferencias y Cursos</span>
                            <em>Registrese hoy con un 30% de descuento!</em>
                        </div>
                    </div>
                </div>
                <!--end span4-->
            </div>
            <div class=\"space40\"></div>
            <table class=\"table table-striped table-hover\" id=\"conference\">
                <thead>
                <tr>
                    <th align=\"center\"></th>
                </tr>
                </thead>
                <tbody>
                ";
        // line 102
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")));
        foreach ($context['_seq'] as $context["_key"] => $context["entity"]) {
            // line 103
            echo "                    <tr class=\"odd gradeX\">
                        <td>
                            <div class=\"row-fluid portfolio-block\">
                                <div class=\"span10 booking-blocks\">
                                    <div class=\"pull-left booking-img\">
                                        <img src=\"";
            // line 108
            echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/img/gallery/image4.jpg"), "html", null, true);
            echo "\" alt=\"\">
                                        <ul class=\"unstyled\">
                                            <li><i class=\"icon-flag\"></i>";
            // line 110
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "language", array()), "html", null, true);
            echo "</li>
                                        </ul>
                                    </div>
                                    <div style=\"overflow:hidden;\">
                                        <h2>
                                            <a href=\"";
            // line 115
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("management_conference_show", array("id" => $this->getAttribute($context["entity"], "id", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "title", array()), "html", null, true);
            echo "</a>
                                        </h2>
                                        <ul class=\"unstyled inline\">
                                            <li><i class=\"icon-star\"></i></li>
                                            <li><i class=\"icon-star\"></i></li>
                                            <li><i class=\"icon-star\"></i></li>
                                            <li><i class=\"icon-star\"></i></li>
                                            <li><i class=\"icon-star-empty\"></i></li>
                                        </ul>
                                        <p>Duración ";
            // line 124
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "duration", array()), "html", null, true);
            echo " minutos</p>
                                        <p><i class=\"icon-user\"></i> Autor: ";
            // line 125
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "author", array()), "html", null, true);
            echo "</p>
                                    </div>
                                </div>
                                <div class=\"span2 portfolio-btn\">
                                    <a href=\"";
            // line 129
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
        // line 136
        echo "                </tbody>
            </table>
        </div>
    </div>
";
        
        $__internal_6d7a6d721399e0092114b8d07d79fb12bb329f5fe6ad9f160bd4907e867298bd->leave($__internal_6d7a6d721399e0092114b8d07d79fb12bb329f5fe6ad9f160bd4907e867298bd_prof);

    }

    // line 142
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_0553cd898617f41d55ccf3c8a86c964231f798416ca8af10353e8d07c77401e6 = $this->env->getExtension("native_profiler");
        $__internal_0553cd898617f41d55ccf3c8a86c964231f798416ca8af10353e8d07c77401e6->enter($__internal_0553cd898617f41d55ccf3c8a86c964231f798416ca8af10353e8d07c77401e6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 143
        echo "    <script type=\"text/javascript\"
            src=\"";
        // line 144
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/plugins/data-tables/jquery.dataTables.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\"
            src=\"";
        // line 146
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/plugins/data-tables/DT_bootstrap.js"), "html", null, true);
        echo "\"></script>
    <script>
        \$('#conference').dataTable({
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
        
        $__internal_0553cd898617f41d55ccf3c8a86c964231f798416ca8af10353e8d07c77401e6->leave($__internal_0553cd898617f41d55ccf3c8a86c964231f798416ca8af10353e8d07c77401e6_prof);

    }

    public function getTemplateName()
    {
        return "AdminBundle:Conference:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  266 => 146,  261 => 144,  258 => 143,  252 => 142,  241 => 136,  228 => 129,  221 => 125,  217 => 124,  203 => 115,  195 => 110,  190 => 108,  183 => 103,  179 => 102,  159 => 85,  156 => 84,  147 => 78,  144 => 77,  142 => 76,  75 => 11,  69 => 10,  60 => 7,  55 => 6,  49 => 5,  37 => 3,  11 => 1,);
    }
}
