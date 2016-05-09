<?php

/* ContentManagementBundle:ContentBlock:new.html.twig */
class __TwigTemplate_dabca33b1465faa162e3f7cc079eb978c73bca0208a6295837f44a372f66e23a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("AdminBundle::layout.html.twig", "ContentManagementBundle:ContentBlock:new.html.twig", 1);
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
        $__internal_5c964eca6fe528a85837eaf3920cb3d05a8d70f37b2967aac1517ccba6f2ee7c = $this->env->getExtension("native_profiler");
        $__internal_5c964eca6fe528a85837eaf3920cb3d05a8d70f37b2967aac1517ccba6f2ee7c->enter($__internal_5c964eca6fe528a85837eaf3920cb3d05a8d70f37b2967aac1517ccba6f2ee7c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "ContentManagementBundle:ContentBlock:new.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_5c964eca6fe528a85837eaf3920cb3d05a8d70f37b2967aac1517ccba6f2ee7c->leave($__internal_5c964eca6fe528a85837eaf3920cb3d05a8d70f37b2967aac1517ccba6f2ee7c_prof);

    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $__internal_8c7e4d16ec14242a6daf0653000c261f4e8e5cd3454d8959353b8dea450a2f22 = $this->env->getExtension("native_profiler");
        $__internal_8c7e4d16ec14242a6daf0653000c261f4e8e5cd3454d8959353b8dea450a2f22->enter($__internal_8c7e4d16ec14242a6daf0653000c261f4e8e5cd3454d8959353b8dea450a2f22_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "content block creation";
        
        $__internal_8c7e4d16ec14242a6daf0653000c261f4e8e5cd3454d8959353b8dea450a2f22->leave($__internal_8c7e4d16ec14242a6daf0653000c261f4e8e5cd3454d8959353b8dea450a2f22_prof);

    }

    // line 5
    public function block_description($context, array $blocks = array())
    {
        $__internal_bfe79df7a0c15ae11341a85f0601daffc553a91a87958fd781782912b2545076 = $this->env->getExtension("native_profiler");
        $__internal_bfe79df7a0c15ae11341a85f0601daffc553a91a87958fd781782912b2545076->enter($__internal_bfe79df7a0c15ae11341a85f0601daffc553a91a87958fd781782912b2545076_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "description"));

        echo "Manage content application";
        
        $__internal_bfe79df7a0c15ae11341a85f0601daffc553a91a87958fd781782912b2545076->leave($__internal_bfe79df7a0c15ae11341a85f0601daffc553a91a87958fd781782912b2545076_prof);

    }

    // line 7
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_f88457fd13783c5d8fc3f6fbe9499fa6d94f69f4c1e9d4dec71162b446a3919e = $this->env->getExtension("native_profiler");
        $__internal_f88457fd13783c5d8fc3f6fbe9499fa6d94f69f4c1e9d4dec71162b446a3919e->enter($__internal_f88457fd13783c5d8fc3f6fbe9499fa6d94f69f4c1e9d4dec71162b446a3919e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 8
        echo "    <link rel=\"stylesheet\" type=\"text/css\"
          href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/plugins/chosen-bootstrap/chosen/chosen.css"), "html", null, true);
        echo "\"/>
    <link rel=\"stylesheet\" type=\"text/css\"
          href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/plugins/bootstrap-fileupload/bootstrap-fileupload.css"), "html", null, true);
        echo "\"/>
";
        
        $__internal_f88457fd13783c5d8fc3f6fbe9499fa6d94f69f4c1e9d4dec71162b446a3919e->leave($__internal_f88457fd13783c5d8fc3f6fbe9499fa6d94f69f4c1e9d4dec71162b446a3919e_prof);

    }

    // line 14
    public function block_content($context, array $blocks = array())
    {
        $__internal_9bddf4e48441022e61511d74ca53764e9a5ae014c576cd01dafdc62a0f14d5d0 = $this->env->getExtension("native_profiler");
        $__internal_9bddf4e48441022e61511d74ca53764e9a5ae014c576cd01dafdc62a0f14d5d0->enter($__internal_9bddf4e48441022e61511d74ca53764e9a5ae014c576cd01dafdc62a0f14d5d0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        // line 15
        echo "    <div class=\"row-fluid\">
        <div class=\"span12\">
            <div class=\"portlet box blue\" id=\"form_wizard_1\">
                <div class=\"portlet-title\">
                    <div class=\"caption\">
                        <i class=\"icon-reorder\"></i>Form Wizard - <span class=\"step-title\">Step 1 of 2</span>
                    </div>
                </div>
                <div class=\"portlet-body form\">
                    <div class=\"clearfix\">
                        <div class=\"btn-group\">
                            <a href=\"";
        // line 26
        echo $this->env->getExtension('routing')->getPath("management_contentblock");
        echo "\" class=\"btn green\">
                                <i class=\"m-icon-swapleft m-icon-white\"></i> Back to the list
                            </a>
                        </div>
                    </div>
                    <form action=\"";
        // line 31
        echo $this->env->getExtension('routing')->getPath("management_contentblock_create");
        echo "\" id=\"bupload\" class=\"form-horizontal\" method=\"post\" enctype=\"multipart/form-data\">
                        <div class=\"form-wizard\">
                            <div class=\"navbar steps\">
                                <div class=\"navbar-inner\">
                                    <ul class=\"row-fluid\">
                                        <li class=\"span6\">
                                            <a href=\"#tab1\" data-toggle=\"tab\" class=\"step active\">
                                                <span class=\"number\">1</span>
                                                <span class=\"desc\"><i class=\"icon-ok\"></i> Information</span>
                                            </a>
                                        </li>
                                        <li class=\"span6\">
                                            <a href=\"#tab2\" data-toggle=\"tab\" class=\"step\">
                                                <span class=\"number\">2</span>
                                                <span class=\"desc\"><i class=\"icon-ok\"></i> Select File</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div id=\"bar\" class=\"progress progress-success progress-striped\">
                                <div class=\"bar\"></div>
                            </div>
                            <div class=\"tab-content\">
                                <div class=\"tab-pane active\" id=\"tab1\">
                                    <h3 class=\"block\">Provide block details</h3>

                                    <div class=\"control-group\">
                                        <label class=\"control-label\">Name</label>

                                        <div class=\"controls\">
                                            <input type=\"text\" name=\"name\" id=\"name\" class=\"span6 m-wrap\"/>
                                            <span class=\"help-inline\">Provide block name</span>
                                        </div>
                                    </div>
                                    <div class=\"control-group\">
                                        <label class=\"control-label\">Position</label>

                                        <div class=\"controls\">
                                            <input type=\"number\" name=\"position\" id=\"position\" class=\"span6 m-wrap\"/>
                                            <span class=\"help-inline\">Provide position on page (visibility order)</span>
                                        </div>
                                    </div>
                                    <div class=\"control-group\">
                                        <label class=\"control-label\">Is active ?</label>

                                        <div class=\"controls\">
                                            <input type=\"checkbox\" name=\"active\" id=\"active\" class=\"span6 m-wrap\"/>
                                            <span class=\"help-inline\">Show the information</span>
                                        </div>
                                    </div>
                                </div>
                                <div class=\"tab-pane\" id=\"tab2\">
                                    <h3 class=\"block\">Provide Image and File</h3>

                                    <div class=\"control-group\">
                                        <label class=\"control-label\">File Upload (.zip)</label>

                                        <div class=\"controls\">
                                            <div class=\"fileupload fileupload-new\" data-provides=\"fileupload\">
                                    <span class=\"btn btn-file\">
                                    <span class=\"fileupload-new\">Select file</span>
                                    <span class=\"fileupload-exists\">Change</span>
                                    <input type=\"file\" name=\"file\" id=\"file\" class=\"default\"/>
                                    </span>
                                                <span class=\"fileupload-preview\"></span>
                                                <a href=\"#\" class=\"close fileupload-exists\" data-dismiss=\"fileupload\"
                                                   style=\"float: none\"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=\"control-group\">
                                        <label class=\"control-label\">Image Upload</label>

                                        <div class=\"controls\">
                                            <div class=\"fileupload fileupload-new\" data-provides=\"fileupload\">
                                                <div class=\"fileupload-new thumbnail\"
                                                     style=\"width: 200px; height: 150px;\">
                                                    <img src=\"\"
                                                         alt=\"\"/>
                                                </div>
                                                <div class=\"fileupload-preview fileupload-exists thumbnail\"
                                                     style=\"max-width: 200px; max-height: 150px; line-height: 20px;\"></div>
                                                <div>
                                       <span class=\"btn btn-file\"><span class=\"fileupload-new\">Select image</span>
                                       <span class=\"fileupload-exists\">Change</span>
                                       <input type=\"file\" name=\"image\" id=\"image\" class=\"default\"/></span>
                                                    <a href=\"#\" class=\"btn fileupload-exists\" data-dismiss=\"fileupload\">Remove</a>
                                                </div>
                                            </div>
                                            <span class=\"label label-important\">NOTE!</span>
                                 <span>
                                 Attached image thumbnail is
                                 supported in Latest Firefox, Chrome, Opera,
                                 Safari and Internet Explorer 10 only
                                 </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class=\"form-actions clearfix\">
                                <a href=\"javascript:;\" class=\"btn button-previous\">
                                    <i class=\"m-icon-swapleft\"></i> Back
                                </a>
                                <a href=\"javascript:;\" class=\"btn blue button-next\">
                                    Continue <i class=\"m-icon-swapright m-icon-white\"></i>
                                </a>
                                <a href=\"javascript:;\" class=\"btn green button-submit\">
                                    Create <i class=\"m-icon-swapright m-icon-white\"></i>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
";
        
        $__internal_9bddf4e48441022e61511d74ca53764e9a5ae014c576cd01dafdc62a0f14d5d0->leave($__internal_9bddf4e48441022e61511d74ca53764e9a5ae014c576cd01dafdc62a0f14d5d0_prof);

    }

    // line 150
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_0956d2ae7ae855aaf2b63064c9029b0090d831b1c4ac271c6cee6948ead3d420 = $this->env->getExtension("native_profiler");
        $__internal_0956d2ae7ae855aaf2b63064c9029b0090d831b1c4ac271c6cee6948ead3d420->enter($__internal_0956d2ae7ae855aaf2b63064c9029b0090d831b1c4ac271c6cee6948ead3d420_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 151
        echo "    <script type=\"text/javascript\"
            src=\"";
        // line 152
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\"
            src=\"";
        // line 154
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/plugins/chosen-bootstrap/chosen/chosen.jquery.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 155
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/scripts/form-wizard.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\"
            src=\"";
        // line 157
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/plugins/bootstrap-fileupload/bootstrap-fileupload.js"), "html", null, true);
        echo "\"></script>
    <script>
        jQuery(document).ready(function () {
            FormWizard.init();
        });
    </script>
";
        
        $__internal_0956d2ae7ae855aaf2b63064c9029b0090d831b1c4ac271c6cee6948ead3d420->leave($__internal_0956d2ae7ae855aaf2b63064c9029b0090d831b1c4ac271c6cee6948ead3d420_prof);

    }

    public function getTemplateName()
    {
        return "ContentManagementBundle:ContentBlock:new.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  260 => 157,  255 => 155,  251 => 154,  246 => 152,  243 => 151,  237 => 150,  112 => 31,  104 => 26,  91 => 15,  85 => 14,  76 => 11,  71 => 9,  68 => 8,  62 => 7,  50 => 5,  38 => 3,  11 => 1,);
    }
}
