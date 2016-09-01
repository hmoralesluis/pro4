<?php

/* AdminBundle:Modulos:updatemodule.html.twig */
class __TwigTemplate_713e28b0bd3c452bb6d8ba16efa2e84b597a32e51c7ce72a72794206df9aa1e3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("AdminBundle::layout.html.twig", "AdminBundle:Modulos:updatemodule.html.twig", 1);
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
        $__internal_36f4396cc70ad91adad89ef15d09cce8f78610838bdbbc4199c7952f81a92636 = $this->env->getExtension("native_profiler");
        $__internal_36f4396cc70ad91adad89ef15d09cce8f78610838bdbbc4199c7952f81a92636->enter($__internal_36f4396cc70ad91adad89ef15d09cce8f78610838bdbbc4199c7952f81a92636_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "AdminBundle:Modulos:updatemodule.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_36f4396cc70ad91adad89ef15d09cce8f78610838bdbbc4199c7952f81a92636->leave($__internal_36f4396cc70ad91adad89ef15d09cce8f78610838bdbbc4199c7952f81a92636_prof);

    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $__internal_eff69409b62479097d734a25d622f3566c98ac001be62aac6b5ef4a8b2e5b645 = $this->env->getExtension("native_profiler");
        $__internal_eff69409b62479097d734a25d622f3566c98ac001be62aac6b5ef4a8b2e5b645->enter($__internal_eff69409b62479097d734a25d622f3566c98ac001be62aac6b5ef4a8b2e5b645_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Actualización de Modulos";
        
        $__internal_eff69409b62479097d734a25d622f3566c98ac001be62aac6b5ef4a8b2e5b645->leave($__internal_eff69409b62479097d734a25d622f3566c98ac001be62aac6b5ef4a8b2e5b645_prof);

    }

    // line 5
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_b5c59035975a9a65604107cd2b9f108fc8329a752260bea320b35723ecd777a3 = $this->env->getExtension("native_profiler");
        $__internal_b5c59035975a9a65604107cd2b9f108fc8329a752260bea320b35723ecd777a3->enter($__internal_b5c59035975a9a65604107cd2b9f108fc8329a752260bea320b35723ecd777a3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 6
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/css/pages/profile.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\"
          xmlns=\"http://www.w3.org/1999/html\"/>
    <link rel=\"stylesheet\" type=\"text/css\"
          href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/plugins/select2/select2_metro.css"), "html", null, true);
        echo "\"/>
    <link rel=\"stylesheet\" href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/plugins/data-tables/DT_bootstrap.css"), "html", null, true);
        echo "\"/>
";
        
        $__internal_b5c59035975a9a65604107cd2b9f108fc8329a752260bea320b35723ecd777a3->leave($__internal_b5c59035975a9a65604107cd2b9f108fc8329a752260bea320b35723ecd777a3_prof);

    }

    // line 13
    public function block_content($context, array $blocks = array())
    {
        $__internal_694d9f275a5a5372e3a31fadaec629268a89992483e1fde277d8ff215a047f12 = $this->env->getExtension("native_profiler");
        $__internal_694d9f275a5a5372e3a31fadaec629268a89992483e1fde277d8ff215a047f12->enter($__internal_694d9f275a5a5372e3a31fadaec629268a89992483e1fde277d8ff215a047f12_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        // line 14
        echo "
    <div class=\"control-group\">
        <label class=\"control-label\">Seleccione el Modulo a modificar</label>
        <div class=\"controls\">
            <select class=\"span6 m-wrap\" data-placeholder=\"Choose a Category\" tabindex=\"1\">
                ";
        // line 19
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["modules"]) ? $context["modules"] : $this->getContext($context, "modules")));
        foreach ($context['_seq'] as $context["_key"] => $context["module"]) {
            // line 20
            echo "                    <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["module"], "name", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["module"], "name", array()), "html", null, true);
            echo "</option>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['module'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 22
        echo "            </select>
        </div>
    </div>

    <!-- BEGIN PAGE CONTENT-->
    <div class=\"row-fluid\">
        <div class=\"span12\">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class=\"portlet box blue\">
                <div class=\"portlet-title\">
                    <div class=\"caption\"><i class=\"icon-reorder\"></i>Datos del Modulo</div>
                </div>
                <div class=\"portlet-body form\">
                    <!-- BEGIN FORM-->
                    <form action=\"#\" class=\"form-horizontal\">
                        <div class=\"control-group\">
                            <label class=\"control-label\">Nombre del Modulo</label>
                            <div class=\"controls\">
                                <input type=\"text\" class=\"span6 m-wrap\" style=\"margin: 0 auto;\" data-provide=\"typeahead\" data-items=\"4\" data-source=\"[&quot;Alabama&quot;,&quot;Alaska&quot;,&quot;Arizona&quot;,&quot;Arkansas&quot;,&quot;California&quot;,&quot;Colorado&quot;,&quot;Connecticut&quot;,&quot;Delaware&quot;,&quot;Florida&quot;,&quot;Georgia&quot;,&quot;Hawaii&quot;,&quot;Idaho&quot;,&quot;Illinois&quot;,&quot;Indiana&quot;,&quot;Iowa&quot;,&quot;Kansas&quot;,&quot;Kentucky&quot;,&quot;Louisiana&quot;,&quot;Maine&quot;,&quot;Maryland&quot;,&quot;Massachusetts&quot;,&quot;Michigan&quot;,&quot;Minnesota&quot;,&quot;Mississippi&quot;,&quot;Missouri&quot;,&quot;Montana&quot;,&quot;Nebraska&quot;,&quot;Nevada&quot;,&quot;New Hampshire&quot;,&quot;New Jersey&quot;,&quot;New Mexico&quot;,&quot;New York&quot;,&quot;North Dakota&quot;,&quot;North Carolina&quot;,&quot;Ohio&quot;,&quot;Oklahoma&quot;,&quot;Oregon&quot;,&quot;Pennsylvania&quot;,&quot;Rhode Island&quot;,&quot;South Carolina&quot;,&quot;South Dakota&quot;,&quot;Tennessee&quot;,&quot;Texas&quot;,&quot;Utah&quot;,&quot;Vermont&quot;,&quot;Virginia&quot;,&quot;Washington&quot;,&quot;West Virginia&quot;,&quot;Wisconsin&quot;,&quot;Wyoming&quot;]\" />

                            </div>
                        </div>
                        <div class=\"control-group\">
                            <label class=\"control-label\">Precio de Venta</label>
                            <div class=\"controls\">
                                <div class=\"input-prepend input-append\">
                                    <span class=\"add-on\">\$</span><input class=\"m-wrap \" type=\"text\" /><span class=\"add-on\">.00</span>
                                </div>
                            </div>
                        </div>
                        <div class=\"control-group\">
                            <label class=\"control-label\">Checkbox</label>
                            <div class=\"controls\">
                                <label class=\"checkbox\">
                                    <input type=\"checkbox\" value=\"\" /> Checkbox 1
                                </label>
                                <label class=\"checkbox\">
                                    <input type=\"checkbox\" value=\"\" /> Checkbox 2
                                </label>
                            </div>
                        </div>
                        <div class=\"control-group\">
                            <label class=\"control-label\">Breve Descripción</label>
                            <div class=\"controls\">
                                <textarea class=\"span6 m-wrap\" rows=\"3\"></textarea>
                            </div>
                        </div>
                        <div class=\"control-group\">
                            <label class=\"control-label\">Amplia Descripción</label>
                            <div class=\"controls\">
                                <textarea class=\"span6 m-wrap\" rows=\"3\"></textarea>
                            </div>
                        </div>

                        <div class=\"form-actions\">
                            <button type=\"submit\" class=\"btn blue\">Guardar</button>
                            <button type=\"button\" class=\"btn\">Cancel</button>
                        </div>
                    </form>
                    <!-- END FORM-->
                </div>
            </div>
            <!-- END SAMPLE FORM PORTLET-->
        </div>
    </div>

";
        
        $__internal_694d9f275a5a5372e3a31fadaec629268a89992483e1fde277d8ff215a047f12->leave($__internal_694d9f275a5a5372e3a31fadaec629268a89992483e1fde277d8ff215a047f12_prof);

    }

    // line 90
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_28ef43df2ce64ed6a7c427f7a1d2ea33ca57d1a4ad19bddb928c0f02377023d1 = $this->env->getExtension("native_profiler");
        $__internal_28ef43df2ce64ed6a7c427f7a1d2ea33ca57d1a4ad19bddb928c0f02377023d1->enter($__internal_28ef43df2ce64ed6a7c427f7a1d2ea33ca57d1a4ad19bddb928c0f02377023d1_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 91
        echo "    <script type=\"text/javascript\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/plugins/select2/select2.min.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\"
            src=\"";
        // line 93
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/plugins/data-tables/jquery.dataTables.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\"
            src=\"";
        // line 95
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/plugins/data-tables/DT_bootstrap.js"), "html", null, true);
        echo "\"></script>
    <script>
        \$('#network, #network_bussines').dataTable({
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
                'bSortable': true,
                'aTargets': [0]
            }
            ]
        });
    </script>
";
        
        $__internal_28ef43df2ce64ed6a7c427f7a1d2ea33ca57d1a4ad19bddb928c0f02377023d1->leave($__internal_28ef43df2ce64ed6a7c427f7a1d2ea33ca57d1a4ad19bddb928c0f02377023d1_prof);

    }

    public function getTemplateName()
    {
        return "AdminBundle:Modulos:updatemodule.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  193 => 95,  188 => 93,  182 => 91,  176 => 90,  103 => 22,  92 => 20,  88 => 19,  81 => 14,  75 => 13,  66 => 10,  62 => 9,  55 => 6,  49 => 5,  37 => 3,  11 => 1,);
    }
}
