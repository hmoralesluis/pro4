<?php

/* AdminBundle:Product:audio_ebook.html.twig */
class __TwigTemplate_b3ded3edaa94fa91314247782a62f285b8219b92c3a0e06a24fe687469b13043 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("AdminBundle::layout.html.twig", "AdminBundle:Product:audio_ebook.html.twig", 1);
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
        $__internal_8ceb9385f56cc4ac79b0aef41a789c4076c3e56caedda580966374b9b7d39a1e = $this->env->getExtension("native_profiler");
        $__internal_8ceb9385f56cc4ac79b0aef41a789c4076c3e56caedda580966374b9b7d39a1e->enter($__internal_8ceb9385f56cc4ac79b0aef41a789c4076c3e56caedda580966374b9b7d39a1e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "AdminBundle:Product:audio_ebook.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_8ceb9385f56cc4ac79b0aef41a789c4076c3e56caedda580966374b9b7d39a1e->leave($__internal_8ceb9385f56cc4ac79b0aef41a789c4076c3e56caedda580966374b9b7d39a1e_prof);

    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $__internal_b5c18848bc94e7de0072ad0e4a750afa220090ea6ae9ba7343130c762a45d11f = $this->env->getExtension("native_profiler");
        $__internal_b5c18848bc94e7de0072ad0e4a750afa220090ea6ae9ba7343130c762a45d11f->enter($__internal_b5c18848bc94e7de0072ad0e4a750afa220090ea6ae9ba7343130c762a45d11f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Main Infuence";
        
        $__internal_b5c18848bc94e7de0072ad0e4a750afa220090ea6ae9ba7343130c762a45d11f->leave($__internal_b5c18848bc94e7de0072ad0e4a750afa220090ea6ae9ba7343130c762a45d11f_prof);

    }

    // line 5
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_97a6cb37fbfdc8b3acc7649ab266d99dbf07df942fe7aa9621245a23728722c4 = $this->env->getExtension("native_profiler");
        $__internal_97a6cb37fbfdc8b3acc7649ab266d99dbf07df942fe7aa9621245a23728722c4->enter($__internal_97a6cb37fbfdc8b3acc7649ab266d99dbf07df942fe7aa9621245a23728722c4_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 6
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/css/pages/search.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\"/>
    <link rel=\"stylesheet\" href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/plugins/data-tables/DT_bootstrap.css"), "html", null, true);
        echo "\"/>
";
        
        $__internal_97a6cb37fbfdc8b3acc7649ab266d99dbf07df942fe7aa9621245a23728722c4->leave($__internal_97a6cb37fbfdc8b3acc7649ab266d99dbf07df942fe7aa9621245a23728722c4_prof);

    }

    // line 10
    public function block_content($context, array $blocks = array())
    {
        $__internal_2bfac58a4a8df94cdc5bf8ef23be6dae43a17c1451ba0c9ad9eaacd1d271fe00 = $this->env->getExtension("native_profiler");
        $__internal_2bfac58a4a8df94cdc5bf8ef23be6dae43a17c1451ba0c9ad9eaacd1d271fe00->enter($__internal_2bfac58a4a8df94cdc5bf8ef23be6dae43a17c1451ba0c9ad9eaacd1d271fe00_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        // line 11
        echo "    <div class=\"row-fluid profile\">
        <div class=\"span12\">
            <!--BEGIN TABS-->
            <div class=\"tabbable tabbable-custom tabbable-full-width\">
                <ul class=\"nav nav-tabs\">
                    <li class=\"active\"><a href=\"#tab_1_1\" data-toggle=\"tab\">Audios</a></li>
                    <li><a href=\"#tab_1_2\" data-toggle=\"tab\">Ebooks</a></li>
                </ul>
                <div class=\"tab-content\">
                    <div class=\"tab-pane row-fluid active\" id=\"tab_1_1\">
                        ";
        // line 21
        if ($this->env->getExtension('security')->isGranted("ROLE_ADMIN")) {
            // line 22
            echo "                            <div class=\"row-fluid\">
                                <div class=\"span4\">
                                    <div class=\"booking-app\">
                                        <a href=\"";
            // line 25
            echo $this->env->getExtension('routing')->getPath("management_audio_new");
            echo "\">
                                            <i class=\"icon-headphones pull-right\"></i>
                                            <span class=\"pull-right\">Registrar fichero de audio</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class=\"space40\"></div>
                        ";
        }
        // line 34
        echo "                        <table class=\"table table-striped table-hover\" id=\"audio\">
                            <thead>
                            <tr>
                                <th align=\"center\"></th>
                            </tr>
                            </thead>
                            <tbody>
                            ";
        // line 41
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["audios"]) ? $context["audios"] : $this->getContext($context, "audios")));
        foreach ($context['_seq'] as $context["_key"] => $context["audio"]) {
            // line 42
            echo "                                <tr class=\"odd gradeX\">

                                    <td>
                                        <div class=\"row-fluid portfolio-block\">
                                            <div class=\"span5 portfolio-text\">
                                                <img src=\"";
            // line 47
            echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/img/profile/portfolio/logo_azteca.jpg"), "html", null, true);
            echo "\"
                                                     alt=\"\"/>

                                                <div class=\"portfolio-text-info\">
                                                    <h4>";
            // line 51
            echo twig_escape_filter($this->env, $this->getAttribute($context["audio"], "author", array()), "html", null, true);
            echo "</h4>

                                                    <p>";
            // line 53
            echo twig_escape_filter($this->env, $this->getAttribute($context["audio"], "name", array()), "html", null, true);
            echo "</p>
                                                </div>
                                            </div>


                                            <div class=\"span5\">
                                                <div class=\"portfolio-info\">
                                                    Archivo de audio
                                                    <span>";
            // line 61
            echo twig_escape_filter($this->env, $this->getAttribute($context["audio"], "path", array()), "html", null, true);
            echo "</span>
                                                </div>
                                            </div>

                                            <div class=\"span2 portfolio-btn\">
                                                <a href=\"";
            // line 66
            echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "basePath", array()) . "/") . $this->getAttribute($context["audio"], "getWebPath", array(), "method")), "html", null, true);
            echo "\"
                                                   class=\"btn bigicn-only\"><span>Descargar</span></a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['audio'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 73
        echo "                            </tbody>
                        </table>
                    </div>
                    <!--tab_1_2-->
                    <div class=\"tab-pane row-fluid\" id=\"tab_1_2\">
                        ";
        // line 78
        if ($this->env->getExtension('security')->isGranted("ROLE_ADMIN")) {
            // line 79
            echo "                            <div class=\"row-fluid\">
                                <div class=\"span4\">
                                    <div class=\"booking-app\">
                                        <a href=\"";
            // line 82
            echo $this->env->getExtension('routing')->getPath("management_ebook_new");
            echo "\">
                                            <i class=\"icon-book pull-right\"></i>
                                            <span class=\"pull-right\">Registrar Ebook</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class=\"space40\"></div>
                        ";
        }
        // line 91
        echo "                        <table class=\"table table-striped table-hover\" id=\"ebook\">
                            <thead>
                            <tr>
                                <th align=\"center\"></th>
                            </tr>
                            </thead>
                            <tbody>
                            ";
        // line 98
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["ebooks"]) ? $context["ebooks"] : $this->getContext($context, "ebooks")));
        foreach ($context['_seq'] as $context["_key"] => $context["ebook"]) {
            // line 99
            echo "                                <tr class=\"odd gradeX\">
                                    <td>
                                        <div class=\"row-fluid portfolio-block\">
                                            <div class=\"span5 portfolio-text\">
                                                <img src=\"";
            // line 103
            echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/img/profile/portfolio/logo_conquer.jpg"), "html", null, true);
            echo "\"
                                                     alt=\"\"/>

                                                <div class=\"portfolio-text-info\">
                                                    <h4>Ebook</h4>

                                                    <p>";
            // line 109
            echo twig_escape_filter($this->env, $this->getAttribute($context["ebook"], "name", array()), "html", null, true);
            echo "</p>
                                                </div>
                                            </div>


                                            <div class=\"span5\">
                                                <div class=\"portfolio-info\">
                                                    Fichero de Texto
                                                    <span>";
            // line 117
            echo twig_escape_filter($this->env, $this->getAttribute($context["ebook"], "path", array()), "html", null, true);
            echo "</span>
                                                </div>
                                            </div>

                                            <div class=\"span2 portfolio-btn\">
                                                <a href=\"";
            // line 122
            echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "basePath", array()) . "/") . $this->getAttribute($context["ebook"], "getWebPath", array(), "method")), "html", null, true);
            echo "\"
                                                   class=\"btn bigicn-only\"><span>Descargar</span></a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ebook'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 129
        echo "                            </tbody>
                        </table>
                    </div>
                    <!--end tab-pane-->
                </div>
            </div>
            <!--END TABS-->
        </div>
    </div>
";
        
        $__internal_2bfac58a4a8df94cdc5bf8ef23be6dae43a17c1451ba0c9ad9eaacd1d271fe00->leave($__internal_2bfac58a4a8df94cdc5bf8ef23be6dae43a17c1451ba0c9ad9eaacd1d271fe00_prof);

    }

    // line 140
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_139c9de3ab00a8ad8fc9ea125219fdf4d56a6de6a7f7af81229f1cbd09283e21 = $this->env->getExtension("native_profiler");
        $__internal_139c9de3ab00a8ad8fc9ea125219fdf4d56a6de6a7f7af81229f1cbd09283e21->enter($__internal_139c9de3ab00a8ad8fc9ea125219fdf4d56a6de6a7f7af81229f1cbd09283e21_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 141
        echo "    <script type=\"text/javascript\"
            src=\"";
        // line 142
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/plugins/data-tables/jquery.dataTables.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\"
            src=\"";
        // line 144
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/plugins/data-tables/DT_bootstrap.js"), "html", null, true);
        echo "\"></script>
    <script>
        \$('#audio, #ebook').dataTable({
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
        
        $__internal_139c9de3ab00a8ad8fc9ea125219fdf4d56a6de6a7f7af81229f1cbd09283e21->leave($__internal_139c9de3ab00a8ad8fc9ea125219fdf4d56a6de6a7f7af81229f1cbd09283e21_prof);

    }

    public function getTemplateName()
    {
        return "AdminBundle:Product:audio_ebook.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  286 => 144,  281 => 142,  278 => 141,  272 => 140,  256 => 129,  243 => 122,  235 => 117,  224 => 109,  215 => 103,  209 => 99,  205 => 98,  196 => 91,  184 => 82,  179 => 79,  177 => 78,  170 => 73,  157 => 66,  149 => 61,  138 => 53,  133 => 51,  126 => 47,  119 => 42,  115 => 41,  106 => 34,  94 => 25,  89 => 22,  87 => 21,  75 => 11,  69 => 10,  60 => 7,  55 => 6,  49 => 5,  37 => 3,  11 => 1,);
    }
}
