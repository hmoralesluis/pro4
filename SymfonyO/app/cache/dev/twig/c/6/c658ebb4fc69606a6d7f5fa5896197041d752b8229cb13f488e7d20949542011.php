<?php

/* ContentManagementBundle:ContentBlock:index.html.twig */
class __TwigTemplate_c658ebb4fc69606a6d7f5fa5896197041d752b8229cb13f488e7d20949542011 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("AdminBundle::layout.html.twig", "ContentManagementBundle:ContentBlock:index.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'description' => array($this, 'block_description'),
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
        $__internal_1bff8731ff4ae2734f6c3c73120f7ebb213037260e1519959c4c559813840c00 = $this->env->getExtension("native_profiler");
        $__internal_1bff8731ff4ae2734f6c3c73120f7ebb213037260e1519959c4c559813840c00->enter($__internal_1bff8731ff4ae2734f6c3c73120f7ebb213037260e1519959c4c559813840c00_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "ContentManagementBundle:ContentBlock:index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_1bff8731ff4ae2734f6c3c73120f7ebb213037260e1519959c4c559813840c00->leave($__internal_1bff8731ff4ae2734f6c3c73120f7ebb213037260e1519959c4c559813840c00_prof);

    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $__internal_93b0c760569abe88f3e068d76cc13b158eb55c7939917bf9926afbc0815edc62 = $this->env->getExtension("native_profiler");
        $__internal_93b0c760569abe88f3e068d76cc13b158eb55c7939917bf9926afbc0815edc62->enter($__internal_93b0c760569abe88f3e068d76cc13b158eb55c7939917bf9926afbc0815edc62_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "list of content blocks";
        
        $__internal_93b0c760569abe88f3e068d76cc13b158eb55c7939917bf9926afbc0815edc62->leave($__internal_93b0c760569abe88f3e068d76cc13b158eb55c7939917bf9926afbc0815edc62_prof);

    }

    // line 5
    public function block_description($context, array $blocks = array())
    {
        $__internal_d06129c158b1e1638727a1aa9846bdb6b585ebbfbcc2617ef90cb148dbfb88bb = $this->env->getExtension("native_profiler");
        $__internal_d06129c158b1e1638727a1aa9846bdb6b585ebbfbcc2617ef90cb148dbfb88bb->enter($__internal_d06129c158b1e1638727a1aa9846bdb6b585ebbfbcc2617ef90cb148dbfb88bb_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "description"));

        echo "Manage content application";
        
        $__internal_d06129c158b1e1638727a1aa9846bdb6b585ebbfbcc2617ef90cb148dbfb88bb->leave($__internal_d06129c158b1e1638727a1aa9846bdb6b585ebbfbcc2617ef90cb148dbfb88bb_prof);

    }

    // line 7
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_53cb134681d63dd11411d92e32e712230a15c8123fbae869f982f13daf87ebe2 = $this->env->getExtension("native_profiler");
        $__internal_53cb134681d63dd11411d92e32e712230a15c8123fbae869f982f13daf87ebe2->enter($__internal_53cb134681d63dd11411d92e32e712230a15c8123fbae869f982f13daf87ebe2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 8
        echo "    <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/plugins/select2/select2_metro.css"), "html", null, true);
        echo "\"/>
    <link rel=\"stylesheet\" href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/plugins/data-tables/DT_bootstrap.css"), "html", null, true);
        echo "\"/>
";
        
        $__internal_53cb134681d63dd11411d92e32e712230a15c8123fbae869f982f13daf87ebe2->leave($__internal_53cb134681d63dd11411d92e32e712230a15c8123fbae869f982f13daf87ebe2_prof);

    }

    // line 12
    public function block_content($context, array $blocks = array())
    {
        $__internal_169a7db517f313184ffcae81cf902aad0a0b6d40697baf8d4e1a833d79e69cfe = $this->env->getExtension("native_profiler");
        $__internal_169a7db517f313184ffcae81cf902aad0a0b6d40697baf8d4e1a833d79e69cfe->enter($__internal_169a7db517f313184ffcae81cf902aad0a0b6d40697baf8d4e1a833d79e69cfe_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        // line 13
        echo "    <div class=\"row-fluid\">
        <div class=\"span12\">
            <div class=\"portlet box blue\">
                <div class=\"portlet-title\">
                    <div class=\"caption\"><i class=\"icon-reorder\"></i>Content Blocks</div>
                </div>
                <div class=\"portlet-body flip-scroll\">
                    <div class=\"clearfix\">
                        <div class=\"btn-group\">
                            <a href=\"";
        // line 22
        echo $this->env->getExtension('routing')->getPath("management_contentblock_new");
        echo "\" class=\"btn green\">
                                Add new content block <i class=\"icon-plus\"></i>
                            </a>
                        </div>
                        <div class=\"btn-group pull-right\">
                            <button class=\"btn dropdown-toggle\" data-toggle=\"dropdown\">Tools <i
                                        class=\"icon-angle-down\"></i>
                            </button>
                            <ul class=\"dropdown-menu pull-right\">
                                <li><a href=\"#\">Active</a></li>
                                <li><a href=\"#\">Inactive</a></li>
                            </ul>
                        </div>
                    </div>
                    <table class=\"table table-hover\" id=\"sample_3\">
                        <thead>
                        <tr>
                            <th style=\"width:8px;\"><input type=\"checkbox\" class=\"group-checkable\"
                                                          data-set=\"#sample_3 .checkboxes\"/></th>
                            <th>Name</th>
                            <th class=\"hidden-480\">Position</th>
                            <th class=\"hidden-480\">Active</th>
                            <th class=\"hidden-480\">Content</th>
                        </tr>
                        </thead>
                        <tbody>
                        ";
        // line 48
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "entities"));
        foreach ($context['_seq'] as $context["_key"] => $context["entity"]) {
            // line 49
            echo "                            <tr class=\"odd gradeX\">
                                <td><input type=\"checkbox\" class=\"checkboxes\" value=\"1\"/></td>
                                <td>";
            // line 51
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "name", array()), "html", null, true);
            echo "</td>
                                <td class=\"hidden-480\">
                                    <select>
                                        ";
            // line 54
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(range(1, twig_length_filter($this->env, $this->getContext($context, "entities"))));
            foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
                // line 55
                echo "                                            <option ";
                if (($context["p"] == $this->getAttribute($context["entity"], "position", array()))) {
                    echo " selected ";
                }
                // line 56
                echo "                                                    onclick=\"window.location.href='";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("management_contentblock_position_update", array("id" => $this->getAttribute($context["entity"], "id", array()), "p" => $context["p"])), "html", null, true);
                echo "'\">";
                echo twig_escape_filter($this->env, $context["p"], "html", null, true);
                echo "</option>
                                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['p'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 58
            echo "                                    </select>
                                    <a href=\"#\">";
            // line 59
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "position", array()), "html", null, true);
            echo "</a>
                                </td>
                                ";
            // line 61
            if ($this->getAttribute($context["entity"], "active", array())) {
                // line 62
                echo "                                    <td><span class=\"label label-success\">active</span></td>
                                ";
            } else {
                // line 64
                echo "                                    <td><span class=\"label label-important\">inactive</span></td>
                                ";
            }
            // line 66
            echo "                                <td><a href=\"#\" class=\"tooltips\" data-original-title=\"Edit associated content to this block\"><i class=\"icon-pencil\"></i></a></td>
                            </tr>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entity'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 69
        echo "                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
";
        
        $__internal_169a7db517f313184ffcae81cf902aad0a0b6d40697baf8d4e1a833d79e69cfe->leave($__internal_169a7db517f313184ffcae81cf902aad0a0b6d40697baf8d4e1a833d79e69cfe_prof);

    }

    // line 77
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_dc531b83157f09cc8af84d5e964bc04057233ff63fc7b120bc701a1cf89ff13b = $this->env->getExtension("native_profiler");
        $__internal_dc531b83157f09cc8af84d5e964bc04057233ff63fc7b120bc701a1cf89ff13b->enter($__internal_dc531b83157f09cc8af84d5e964bc04057233ff63fc7b120bc701a1cf89ff13b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 78
        echo "    <script type=\"text/javascript\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/plugins/select2/select2.min.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 79
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/plugins/data-tables/jquery.dataTables.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 80
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/plugins/data-tables/DT_bootstrap.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 81
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/scripts/table-managed.js"), "html", null, true);
        echo "\"></script>
    <script>
        jQuery(document).ready(function () {
            TableManaged.init();
        });
    </script>
";
        
        $__internal_dc531b83157f09cc8af84d5e964bc04057233ff63fc7b120bc701a1cf89ff13b->leave($__internal_dc531b83157f09cc8af84d5e964bc04057233ff63fc7b120bc701a1cf89ff13b_prof);

    }

    public function getTemplateName()
    {
        return "ContentManagementBundle:ContentBlock:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  220 => 81,  216 => 80,  212 => 79,  207 => 78,  201 => 77,  188 => 69,  180 => 66,  176 => 64,  172 => 62,  170 => 61,  165 => 59,  162 => 58,  151 => 56,  146 => 55,  142 => 54,  136 => 51,  132 => 49,  128 => 48,  99 => 22,  88 => 13,  82 => 12,  73 => 9,  68 => 8,  62 => 7,  50 => 5,  38 => 3,  11 => 1,);
    }
}
