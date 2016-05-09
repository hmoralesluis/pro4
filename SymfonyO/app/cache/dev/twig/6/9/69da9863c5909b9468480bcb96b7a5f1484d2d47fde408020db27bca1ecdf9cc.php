<?php

/* ContentManagementBundle:ContentBlock:profile.html.twig */
class __TwigTemplate_69da9863c5909b9468480bcb96b7a5f1484d2d47fde408020db27bca1ecdf9cc extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("AdminBundle::layout.html.twig", "ContentManagementBundle:ContentBlock:profile.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'description' => array($this, 'block_description'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "AdminBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_c2f34fe76e88f9b5adff4afac06520395a71b02b5f0a8ae770ed4bd24ecaa3da = $this->env->getExtension("native_profiler");
        $__internal_c2f34fe76e88f9b5adff4afac06520395a71b02b5f0a8ae770ed4bd24ecaa3da->enter($__internal_c2f34fe76e88f9b5adff4afac06520395a71b02b5f0a8ae770ed4bd24ecaa3da_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "ContentManagementBundle:ContentBlock:profile.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_c2f34fe76e88f9b5adff4afac06520395a71b02b5f0a8ae770ed4bd24ecaa3da->leave($__internal_c2f34fe76e88f9b5adff4afac06520395a71b02b5f0a8ae770ed4bd24ecaa3da_prof);

    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $__internal_7e8fdda69e287320e38efa481a0e717a7ea36a248a6dca7495b8d1a2cdecafa2 = $this->env->getExtension("native_profiler");
        $__internal_7e8fdda69e287320e38efa481a0e717a7ea36a248a6dca7495b8d1a2cdecafa2->enter($__internal_7e8fdda69e287320e38efa481a0e717a7ea36a248a6dca7495b8d1a2cdecafa2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Personal Zone";
        
        $__internal_7e8fdda69e287320e38efa481a0e717a7ea36a248a6dca7495b8d1a2cdecafa2->leave($__internal_7e8fdda69e287320e38efa481a0e717a7ea36a248a6dca7495b8d1a2cdecafa2_prof);

    }

    // line 5
    public function block_description($context, array $blocks = array())
    {
        $__internal_9b5b67ef9c05f34742dd748afbb0a361faeda2be9f883850b191a7f2ed168c5f = $this->env->getExtension("native_profiler");
        $__internal_9b5b67ef9c05f34742dd748afbb0a361faeda2be9f883850b191a7f2ed168c5f->enter($__internal_9b5b67ef9c05f34742dd748afbb0a361faeda2be9f883850b191a7f2ed168c5f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "description"));

        
        $__internal_9b5b67ef9c05f34742dd748afbb0a361faeda2be9f883850b191a7f2ed168c5f->leave($__internal_9b5b67ef9c05f34742dd748afbb0a361faeda2be9f883850b191a7f2ed168c5f_prof);

    }

    // line 7
    public function block_content($context, array $blocks = array())
    {
        $__internal_d0f1f62a2479733fd9bf7099f379b4c3a4d4ee9ae50ce21d89f8c87d0926c774 = $this->env->getExtension("native_profiler");
        $__internal_d0f1f62a2479733fd9bf7099f379b4c3a4d4ee9ae50ce21d89f8c87d0926c774->enter($__internal_d0f1f62a2479733fd9bf7099f379b4c3a4d4ee9ae50ce21d89f8c87d0926c774_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        // line 8
        echo "<head>
    <meta charset=\"utf-8\" />
    <title>User Profile</title>
    <meta content=\"width=device-width, initial-scale=1.0\" name=\"viewport\" />
    <meta content=\"\" name=\"description\" />
    <meta content=\"\" name=\"author\" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href=\"assets/plugins/bootstrap/css/bootstrap.min.css\" rel=\"stylesheet\" type=\"text/css\"/>
    <link href=\"assets/plugins/bootstrap/css/bootstrap-responsive.min.css\" rel=\"stylesheet\" type=\"text/css\"/>
    <link href=\"assets/plugins/font-awesome/css/font-awesome.min.css\" rel=\"stylesheet\" type=\"text/css\"/>
    <link href=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/css/style-metro.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\"/>
    <link href=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/css/style.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\"/>
    <link href=\"assets/css/style-responsive.css\" rel=\"stylesheet\" type=\"text/css\"/>
    <link href=\"assets/css/themes/default.css\" rel=\"stylesheet\" type=\"text/css\" id=\"style_color\"/>
    <link href=\"assets/plugins/uniform/css/uniform.default.css\" rel=\"stylesheet\" type=\"text/css\"/>
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href=\"assets/plugins/bootstrap-fileupload/bootstrap-fileupload.css\" rel=\"stylesheet\" type=\"text/css\" />
    <link href=\"assets/plugins/chosen-bootstrap/chosen/chosen.css\" rel=\"stylesheet\" type=\"text/css\" />
    <link href=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/css/pages/profile.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" />
    <!-- END PAGE LEVEL STYLES -->
    <link rel=\"shortcut icon\" href=\"favicon.ico\" />
</head>
<!-- END HEAD -->

<!-- BEGIN CONTAINER -->
    <!-- BEGIN PAGE -->
        <!-- BEGIN PAGE CONTAINER-->
        <div class=\"container-fluid\">
            <!-- BEGIN PAGE CONTENT-->
            <div class=\"row-fluid profile\">
                <div class=\"span12\">
                    <!--BEGIN TABS-->
                    <div class=\"tabbable tabbable-custom tabbable-full-width\">
                        <ul class=\"nav nav-tabs\">
                            <li class=\"active\"><a href=\"#tab_1_1\" data-toggle=\"tab\">Overview</a></li>
                            <li><a href=\"#tab_1_2\" data-toggle=\"tab\">Profile Info</a></li>
                            <li><a href=\"#tab_1_3\" data-toggle=\"tab\">Account</a></li>
                        </ul>
                        <div class=\"tab-content\">
                            <div class=\"tab-pane row-fluid active\" id=\"tab_1_1\">
                                <ul class=\"unstyled profile-nav span3\">
                                    <li><img src=\"";
        // line 50
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/img/profile/ado.jpg"), "html", null, true);
        echo "\" alt=\"\" /> <a href=\"#\" class=\"profile-edit\"></a></li>
                                    <li><a href=\"#\">Messages <span>3</span></a></li>
                                    <li><a href=\"#\">Asociados</a></li>
                                </ul>
                                <div class=\"span9\">
                                    <div class=\"row-fluid\">
                                        <div class=\"span8 profile-info\">
                                            <h1>Adolfo Anias Gutiérrez</h1>
                                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt laoreet dolore magna aliquam tincidunt erat volutpat laoreet dolore magna aliquam tincidunt erat volutpat.</p>
                                            <p><a href=\"#\">www.megalifepro.com/ado23</a></p>
                                            <ul class=\"unstyled inline\">
                                                <li><i class=\"icon-map-marker\"></i> Cuba</li>
                                                <li><i class=\"icon-calendar\"></i> 22 Dic 1974</li>
                                                <li><i class=\"icon-briefcase\"></i> Design</li>
                                            </ul>
                                        </div>
                                        <!--end span8-->
                                        <div class=\"span4\">
                                            <div class=\"portlet sale-summary\">
                                                <div class=\"portlet-title\">
                                                    <div class=\"caption\">Sales Summary</div>
                                                    <div class=\"tools\">
                                                        <a class=\"reload\" href=\"javascript:;\"></a>
                                                    </div>
                                                </div>
                                                <ul class=\"unstyled\">
                                                    <li>
                                                        <span class=\"sale-info\">TODAY SOLD <i class=\"icon-img-up\"></i></span>
                                                        <span class=\"sale-num\">23</span>
                                                    </li>
                                                    <li>
                                                        <span class=\"sale-info\">WEEKLY SALES <i class=\"icon-img-down\"></i></span>
                                                        <span class=\"sale-num\">87</span>
                                                    </li>
                                                    <li>
                                                        <span class=\"sale-info\">TOTAL SOLD</span>
                                                        <span class=\"sale-num\">2377</span>
                                                    </li>
                                                    <li>
                                                        <span class=\"sale-info\">EARNS</span>
                                                        <span class=\"sale-num\">\$37.990</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!--end span4-->
                                    </div>
                                    <!--end row-fluid-->
                                    <div class=\"tabbable tabbable-custom tabbable-custom-profile\">
                                        <ul class=\"nav nav-tabs\">
                                            <li class=\"active\"><a href=\"#tab_1_11\" data-toggle=\"tab\">Latest Clients</a></li>
                                            <li class=\"\"><a href=\"#tab_1_22\" data-toggle=\"tab\">Feeds</a></li>
                                        </ul>
                                        <div class=\"tab-content\">
                                            <div class=\"tab-pane active\" id=\"tab_1_11\">
                                                <div class=\"portlet-body\" style=\"display: block;\">
                                                    <table class=\"table table-striped table-bordered table-advance table-hover\">
                                                        <thead>
                                                        <tr>
                                                            <th><i class=\"icon-briefcase\"></i> Company</th>
                                                            <th class=\"hidden-phone\"><i class=\"icon-question-sign\"></i> Descrition</th>
                                                            <th><i class=\"icon-bookmark\"></i> Amount</th>
                                                            <th></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td><a href=\"#\">Pixel Ltd</a></td>
                                                            <td class=\"hidden-phone\">Server hardware purchase</td>
                                                            <td>52560.10\$ <span class=\"label label-success label-mini\">Paid</span></td>
                                                            <td><a class=\"btn mini green-stripe\" href=\"#\">View</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <a href=\"#\">
                                                                    Smart House
                                                                </a>
                                                            </td>
                                                            <td class=\"hidden-phone\">Office furniture purchase</td>
                                                            <td>5760.00\$ <span class=\"label label-warning label-mini\">Pending</span></td>
                                                            <td><a class=\"btn mini blue-stripe\" href=\"#\">View</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <a href=\"#\">
                                                                    FoodMaster Ltd
                                                                </a>
                                                            </td>
                                                            <td class=\"hidden-phone\">Company Anual Dinner Catering</td>
                                                            <td>12400.00\$ <span class=\"label label-success label-mini\">Paid</span></td>
                                                            <td><a class=\"btn mini blue-stripe\" href=\"#\">View</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <a href=\"#\">
                                                                    WaterPure Ltd
                                                                </a>
                                                            </td>
                                                            <td class=\"hidden-phone\">Payment for Jan 2013</td>
                                                            <td>610.50\$ <span class=\"label label-danger label-mini\">Overdue</span></td>
                                                            <td><a class=\"btn mini red-stripe\" href=\"#\">View</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td><a href=\"#\">Pixel Ltd</a></td>
                                                            <td class=\"hidden-phone\">Server hardware purchase</td>
                                                            <td>52560.10\$ <span class=\"label label-success label-mini\">Paid</span></td>
                                                            <td><a class=\"btn mini green-stripe\" href=\"#\">View</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <a href=\"#\">
                                                                    Smart House
                                                                </a>
                                                            </td>
                                                            <td class=\"hidden-phone\">Office furniture purchase</td>
                                                            <td>5760.00\$ <span class=\"label label-warning label-mini\">Pending</span></td>
                                                            <td><a class=\"btn mini blue-stripe\" href=\"#\">View</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <a href=\"#\">
                                                                    FoodMaster Ltd
                                                                </a>
                                                            </td>
                                                            <td class=\"hidden-phone\">Company Anual Dinner Catering</td>
                                                            <td>12400.00\$ <span class=\"label label-success label-mini\">Paid</span></td>
                                                            <td><a class=\"btn mini blue-stripe\" href=\"#\">View</a></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <!--tab-pane-->
                                            <div class=\"tab-pane\" id=\"tab_1_22\">
                                                <div class=\"tab-pane active\" id=\"tab_1_1_1\">
                                                    <div class=\"scroller\" data-height=\"290px\" data-always-visible=\"1\" data-rail-visible1=\"1\">
                                                        <ul class=\"feeds\">
                                                            <li>
                                                                <div class=\"col1\">
                                                                    <div class=\"cont\">
                                                                        <div class=\"cont-col1\">
                                                                            <div class=\"label label-success\">
                                                                                <i class=\"icon-bell\"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class=\"cont-col2\">
                                                                            <div class=\"desc\">
                                                                                You have 4 pending tasks.
                                                               <span class=\"label label-important label-mini\">
                                                               Take action
                                                               <i class=\"icon-share-alt\"></i>
                                                               </span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class=\"col2\">
                                                                    <div class=\"date\">
                                                                        Just now
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <a href=\"#\">
                                                                    <div class=\"col1\">
                                                                        <div class=\"cont\">
                                                                            <div class=\"cont-col1\">
                                                                                <div class=\"label label-success\">
                                                                                    <i class=\"icon-bell\"></i>
                                                                                </div>
                                                                            </div>
                                                                            <div class=\"cont-col2\">
                                                                                <div class=\"desc\">
                                                                                    New version v1.4 just lunched!
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class=\"col2\">
                                                                        <div class=\"date\">
                                                                            20 mins
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <div class=\"col1\">
                                                                    <div class=\"cont\">
                                                                        <div class=\"cont-col1\">
                                                                            <div class=\"label label-important\">
                                                                                <i class=\"icon-bolt\"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class=\"cont-col2\">
                                                                            <div class=\"desc\">
                                                                                Database server #12 overloaded. Please fix the issue.
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class=\"col2\">
                                                                    <div class=\"date\">
                                                                        24 mins
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class=\"col1\">
                                                                    <div class=\"cont\">
                                                                        <div class=\"cont-col1\">
                                                                            <div class=\"label label-info\">
                                                                                <i class=\"icon-bullhorn\"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class=\"cont-col2\">
                                                                            <div class=\"desc\">
                                                                                New order received. Please take care of it.
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class=\"col2\">
                                                                    <div class=\"date\">
                                                                        30 mins
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class=\"col1\">
                                                                    <div class=\"cont\">
                                                                        <div class=\"cont-col1\">
                                                                            <div class=\"label label-success\">
                                                                                <i class=\"icon-bullhorn\"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class=\"cont-col2\">
                                                                            <div class=\"desc\">
                                                                                New order received. Please take care of it.
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class=\"col2\">
                                                                    <div class=\"date\">
                                                                        40 mins
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class=\"col1\">
                                                                    <div class=\"cont\">
                                                                        <div class=\"cont-col1\">
                                                                            <div class=\"label label-warning\">
                                                                                <i class=\"icon-plus\"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class=\"cont-col2\">
                                                                            <div class=\"desc\">
                                                                                New user registered.
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class=\"col2\">
                                                                    <div class=\"date\">
                                                                        1.5 hours
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class=\"col1\">
                                                                    <div class=\"cont\">
                                                                        <div class=\"cont-col1\">
                                                                            <div class=\"label label-success\">
                                                                                <i class=\"icon-bell-alt\"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class=\"cont-col2\">
                                                                            <div class=\"desc\">
                                                                                Web server hardware needs to be upgraded.
                                                                                <span class=\"label label-inverse label-mini\">Overdue</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class=\"col2\">
                                                                    <div class=\"date\">
                                                                        2 hours
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class=\"col1\">
                                                                    <div class=\"cont\">
                                                                        <div class=\"cont-col1\">
                                                                            <div class=\"label\">
                                                                                <i class=\"icon-bullhorn\"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class=\"cont-col2\">
                                                                            <div class=\"desc\">
                                                                                New order received. Please take care of it.
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class=\"col2\">
                                                                    <div class=\"date\">
                                                                        3 hours
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class=\"col1\">
                                                                    <div class=\"cont\">
                                                                        <div class=\"cont-col1\">
                                                                            <div class=\"label label-warning\">
                                                                                <i class=\"icon-bullhorn\"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class=\"cont-col2\">
                                                                            <div class=\"desc\">
                                                                                New order received. Please take care of it.
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class=\"col2\">
                                                                    <div class=\"date\">
                                                                        5 hours
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class=\"col1\">
                                                                    <div class=\"cont\">
                                                                        <div class=\"cont-col1\">
                                                                            <div class=\"label label-info\">
                                                                                <i class=\"icon-bullhorn\"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class=\"cont-col2\">
                                                                            <div class=\"desc\">
                                                                                New order received. Please take care of it.
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class=\"col2\">
                                                                    <div class=\"date\">
                                                                        18 hours
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class=\"col1\">
                                                                    <div class=\"cont\">
                                                                        <div class=\"cont-col1\">
                                                                            <div class=\"label\">
                                                                                <i class=\"icon-bullhorn\"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class=\"cont-col2\">
                                                                            <div class=\"desc\">
                                                                                New order received. Please take care of it.
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class=\"col2\">
                                                                    <div class=\"date\">
                                                                        21 hours
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class=\"col1\">
                                                                    <div class=\"cont\">
                                                                        <div class=\"cont-col1\">
                                                                            <div class=\"label label-info\">
                                                                                <i class=\"icon-bullhorn\"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class=\"cont-col2\">
                                                                            <div class=\"desc\">
                                                                                New order received. Please take care of it.
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class=\"col2\">
                                                                    <div class=\"date\">
                                                                        22 hours
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class=\"col1\">
                                                                    <div class=\"cont\">
                                                                        <div class=\"cont-col1\">
                                                                            <div class=\"label\">
                                                                                <i class=\"icon-bullhorn\"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class=\"cont-col2\">
                                                                            <div class=\"desc\">
                                                                                New order received. Please take care of it.
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class=\"col2\">
                                                                    <div class=\"date\">
                                                                        21 hours
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class=\"col1\">
                                                                    <div class=\"cont\">
                                                                        <div class=\"cont-col1\">
                                                                            <div class=\"label label-info\">
                                                                                <i class=\"icon-bullhorn\"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class=\"cont-col2\">
                                                                            <div class=\"desc\">
                                                                                New order received. Please take care of it.
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class=\"col2\">
                                                                    <div class=\"date\">
                                                                        22 hours
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class=\"col1\">
                                                                    <div class=\"cont\">
                                                                        <div class=\"cont-col1\">
                                                                            <div class=\"label\">
                                                                                <i class=\"icon-bullhorn\"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class=\"cont-col2\">
                                                                            <div class=\"desc\">
                                                                                New order received. Please take care of it.
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class=\"col2\">
                                                                    <div class=\"date\">
                                                                        21 hours
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class=\"col1\">
                                                                    <div class=\"cont\">
                                                                        <div class=\"cont-col1\">
                                                                            <div class=\"label label-info\">
                                                                                <i class=\"icon-bullhorn\"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class=\"cont-col2\">
                                                                            <div class=\"desc\">
                                                                                New order received. Please take care of it.
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class=\"col2\">
                                                                    <div class=\"date\">
                                                                        22 hours
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class=\"col1\">
                                                                    <div class=\"cont\">
                                                                        <div class=\"cont-col1\">
                                                                            <div class=\"label\">
                                                                                <i class=\"icon-bullhorn\"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class=\"cont-col2\">
                                                                            <div class=\"desc\">
                                                                                New order received. Please take care of it.
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class=\"col2\">
                                                                    <div class=\"date\">
                                                                        21 hours
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class=\"col1\">
                                                                    <div class=\"cont\">
                                                                        <div class=\"cont-col1\">
                                                                            <div class=\"label label-info\">
                                                                                <i class=\"icon-bullhorn\"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class=\"cont-col2\">
                                                                            <div class=\"desc\">
                                                                                New order received. Please take care of it.
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class=\"col2\">
                                                                    <div class=\"date\">
                                                                        22 hours
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--tab-pane-->
                                        </div>
                                    </div>
                                </div>
                                <!--end span9-->
                            </div>
                            <!--end tab-pane-->
                            <div class=\"tab-pane profile-classic row-fluid\" id=\"tab_1_2\">
                                <div class=\"span2\"><img src=\"assets/img/profile/profile-img.png\" alt=\"\" /> <a href=\"#\" class=\"profile-edit\">edit</a></div>
                                <ul class=\"unstyled span10\">
                                    <li><span>User Name:</span> JDuser</li>
                                    <li><span>First Name:</span> John</li>
                                    <li><span>Last Name:</span> Doe</li>
                                    <li><span>Counrty:</span> Spain</li>
                                    <li><span>Birthday:</span> 18 Jan 1982</li>
                                    <li><span>Occupation:</span> Web Developer</li>
                                    <li><span>Email:</span> <a href=\"#\">john@mywebsite.com</a></li>
                                    <li><span>Interests:</span> Design, Web etc.</li>
                                    <li><span>Website Url:</span> <a href=\"#\">http://www.mywebsite.com</a></li>
                                    <li><span>Mobile Number:</span> +1 646 580 DEMO (6284)</li>
                                    <li><span>About:</span> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.</li>
                                </ul>
                            </div>
                            <!--tab_1_2-->
                            <div class=\"tab-pane row-fluid profile-account\" id=\"tab_1_3\">
                                <div class=\"row-fluid\">
                                    <div class=\"span12\">
                                        <div class=\"span3\">
                                            <ul class=\"ver-inline-menu tabbable margin-bottom-10\">
                                                <li class=\"active\">
                                                    <a data-toggle=\"tab\" href=\"#tab_1-1\">
                                                        <i class=\"icon-cog\"></i>
                                                        Personal info
                                                    </a>
                                                    <span class=\"after\"></span>
                                                </li>
                                                <li class=\"\"><a data-toggle=\"tab\" href=\"#tab_2-2\"><i class=\"icon-picture\"></i> Change Avatar</a></li>
                                                <li class=\"\"><a data-toggle=\"tab\" href=\"#tab_3-3\"><i class=\"icon-lock\"></i> Change Password</a></li>
                                                <li class=\"\"><a data-toggle=\"tab\" href=\"#tab_4-4\"><i class=\"icon-eye-open\"></i> Privacity Settings</a></li>
                                            </ul>
                                        </div>
                                        <div class=\"span9\">
                                            <div class=\"tab-content\">
                                                <div id=\"tab_1-1\" class=\"tab-pane active\">
                                                    <div style=\"height: auto;\" id=\"accordion1-1\" class=\"accordion collapse\">
                                                        <form action=\"#\">
                                                            <label class=\"control-label\">First Name</label>
                                                            <input type=\"text\" placeholder=\"John\" class=\"m-wrap span8\" />
                                                            <label class=\"control-label\">Last Name</label>
                                                            <input type=\"text\" placeholder=\"Doe\" class=\"m-wrap span8\" />
                                                            <label class=\"control-label\">Mobile Number</label>
                                                            <input type=\"text\" placeholder=\"+1 646 580 DEMO (6284)\" class=\"m-wrap span8\" />
                                                            <label class=\"control-label\">Interests</label>
                                                            <input type=\"text\" placeholder=\"Design, Web etc.\" class=\"m-wrap span8\" />
                                                            <label class=\"control-label\">Occupation</label>
                                                            <input type=\"text\" placeholder=\"Web Developer\" class=\"m-wrap span8\" />
                                                            <label class=\"control-label\">Counrty</label>
                                                            <div class=\"controls\">
                                                                <input type=\"text\" class=\"span8 m-wrap\" style=\"margin: 0 auto;\" data-provide=\"typeahead\" data-items=\"4\" data-source=\"[&quot;Alabama&quot;,&quot;Alaska&quot;,&quot;Arizona&quot;,&quot;Arkansas&quot;,&quot;US&quot;,&quot;Colorado&quot;,&quot;Connecticut&quot;,&quot;Delaware&quot;,&quot;Florida&quot;,&quot;Georgia&quot;,&quot;Hawaii&quot;,&quot;Idaho&quot;,&quot;Illinois&quot;,&quot;Indiana&quot;,&quot;Iowa&quot;,&quot;Kansas&quot;,&quot;Kentucky&quot;,&quot;Louisiana&quot;,&quot;Maine&quot;,&quot;Maryland&quot;,&quot;Massachusetts&quot;,&quot;Michigan&quot;,&quot;Minnesota&quot;,&quot;Mississippi&quot;,&quot;Missouri&quot;,&quot;Montana&quot;,&quot;Nebraska&quot;,&quot;Nevada&quot;,&quot;New Hampshire&quot;,&quot;New Jersey&quot;,&quot;New Mexico&quot;,&quot;New York&quot;,&quot;North Dakota&quot;,&quot;North Carolina&quot;,&quot;Ohio&quot;,&quot;Oklahoma&quot;,&quot;Oregon&quot;,&quot;Pennsylvania&quot;,&quot;Rhode Island&quot;,&quot;South Carolina&quot;,&quot;South Dakota&quot;,&quot;Tennessee&quot;,&quot;Texas&quot;,&quot;Utah&quot;,&quot;Vermont&quot;,&quot;Virginia&quot;,&quot;Washington&quot;,&quot;West Virginia&quot;,&quot;Wisconsin&quot;,&quot;Wyoming&quot;]\" />
                                                                <p class=\"help-block\"><span class=\"muted\">Start typing to auto complete!. E.g: US</span></p>
                                                            </div>
                                                            <label class=\"control-label\">About</label>
                                                            <textarea class=\"span8 m-wrap\" rows=\"3\"></textarea>
                                                            <label class=\"control-label\">Website Url</label>
                                                            <input type=\"text\" placeholder=\"http://www.mywebsite.com\" class=\"m-wrap span8\" />
                                                            <div class=\"submit-btn\">
                                                                <a href=\"#\" class=\"btn green\">Save Changes</a>
                                                                <a href=\"#\" class=\"btn\">Cancel</a>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div id=\"tab_2-2\" class=\"tab-pane\">
                                                    <div style=\"height: auto;\" id=\"accordion2-2\" class=\"accordion collapse\">
                                                        <form action=\"#\">
                                                            <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.</p>
                                                            <br />
                                                            <div class=\"controls\">
                                                                <div class=\"thumbnail\" style=\"width: 291px; height: 170px;\">
                                                                    <img src=\"http://www.placehold.it/291x170/EFEFEF/AAAAAA&amp;text=no+image\" alt=\"\" />
                                                                </div>
                                                            </div>
                                                            <div class=\"space10\"></div>
                                                            <div class=\"fileupload fileupload-new\" data-provides=\"fileupload\">
                                                                <div class=\"input-append\">
                                                                    <div class=\"uneditable-input\">
                                                                        <i class=\"icon-file fileupload-exists\"></i>
                                                                        <span class=\"fileupload-preview\"></span>
                                                                    </div>
                                                      <span class=\"btn btn-file\">
                                                      <span class=\"fileupload-new\">Select file</span>
                                                      <span class=\"fileupload-exists\">Change</span>
                                                      <input type=\"file\" class=\"default\" />
                                                      </span>
                                                                    <a href=\"#\" class=\"btn fileupload-exists\" data-dismiss=\"fileupload\">Remove</a>
                                                                </div>
                                                            </div>
                                                            <div class=\"clearfix\"></div>
                                                            <div class=\"controls\">
                                                                <span class=\"label label-important\">NOTE!</span>
                                                                <span>You can write some information here..</span>
                                                            </div>
                                                            <div class=\"space10\"></div>
                                                            <div class=\"submit-btn\">
                                                                <a href=\"#\" class=\"btn green\">Submit</a>
                                                                <a href=\"#\" class=\"btn\">Cancel</a>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div id=\"tab_3-3\" class=\"tab-pane\">
                                                    <div style=\"height: auto;\" id=\"accordion3-3\" class=\"accordion collapse\">
                                                        <form action=\"#\">
                                                            <label class=\"control-label\">Current Password</label>
                                                            <input type=\"password\" class=\"m-wrap span8\" />
                                                            <label class=\"control-label\">New Password</label>
                                                            <input type=\"password\" class=\"m-wrap span8\" />
                                                            <label class=\"control-label\">Re-type New Password</label>
                                                            <input type=\"password\" class=\"m-wrap span8\" />
                                                            <div class=\"submit-btn\">
                                                                <a href=\"#\" class=\"btn green\">Change Password</a>
                                                                <a href=\"#\" class=\"btn\">Cancel</a>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div id=\"tab_4-4\" class=\"tab-pane\">
                                                    <div style=\"height: auto;\" id=\"accordion4-4\" class=\"accordion collapse\">
                                                        <form action=\"#\">
                                                            <div class=\"profile-settings row-fluid\">
                                                                <div class=\"span9\">
                                                                    <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus..</p>
                                                                </div>
                                                                <div class=\"control-group span3\">
                                                                    <div class=\"controls\">
                                                                        <label class=\"radio\">
                                                                            <input type=\"radio\" name=\"optionsRadios1\" value=\"option1\" />
                                                                            Yes
                                                                        </label>
                                                                        <label class=\"radio\">
                                                                            <input type=\"radio\" name=\"optionsRadios1\" value=\"option2\" checked />
                                                                            No
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--end profile-settings-->
                                                            <div class=\"profile-settings row-fluid\">
                                                                <div class=\"span9\">
                                                                    <p>Enim eiusmod high life accusamus terry richardson ad squid wolf moon</p>
                                                                </div>
                                                                <div class=\"control-group span3\">
                                                                    <div class=\"controls\">
                                                                        <label class=\"checkbox\">
                                                                            <input type=\"checkbox\" value=\"\" /> All
                                                                        </label>
                                                                        <label class=\"checkbox\">
                                                                            <input type=\"checkbox\" value=\"\" /> Friends
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--end profile-settings-->
                                                            <div class=\"profile-settings row-fluid\">
                                                                <div class=\"span9\">
                                                                    <p>Pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson</p>
                                                                </div>
                                                                <div class=\"control-group span3\">
                                                                    <div class=\"controls\">
                                                                        <label class=\"checkbox\">
                                                                            <input type=\"checkbox\" value=\"\" /> Yes
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--end profile-settings-->
                                                            <div class=\"profile-settings row-fluid\">
                                                                <div class=\"span9\">
                                                                    <p>Cliche reprehenderit enim eiusmod high life accusamus terry</p>
                                                                </div>
                                                                <div class=\"control-group span3\">
                                                                    <div class=\"controls\">
                                                                        <label class=\"checkbox\">
                                                                            <input type=\"checkbox\" value=\"\" /> Yes
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--end profile-settings-->
                                                            <div class=\"profile-settings row-fluid\">
                                                                <div class=\"span9\">
                                                                    <p>Oiusmod high life accusamus terry richardson ad squid wolf fwopo</p>
                                                                </div>
                                                                <div class=\"control-group span3\">
                                                                    <div class=\"controls\">
                                                                        <label class=\"checkbox\">
                                                                            <input type=\"checkbox\" value=\"\" /> Yes
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--end profile-settings-->
                                                            <div class=\"space5\"></div>
                                                            <div class=\"submit-btn\">
                                                                <a href=\"#\" class=\"btn green\">Save Changes</a>
                                                                <a href=\"#\" class=\"btn\">Cancel</a>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end span9-->
                                    </div>
                                </div>
                            </div>
                            <!--end tab-pane-->
                        </div>
                    </div>
                    <!--END TABS-->
                </div>
            </div>
            <!-- END PAGE CONTENT-->
        </div>
        <!-- END PAGE CONTAINER-->

<!-- END CONTAINER -->
";
        
        $__internal_d0f1f62a2479733fd9bf7099f379b4c3a4d4ee9ae50ce21d89f8c87d0926c774->leave($__internal_d0f1f62a2479733fd9bf7099f379b4c3a4d4ee9ae50ce21d89f8c87d0926c774_prof);

    }

    public function getTemplateName()
    {
        return "ContentManagementBundle:ContentBlock:profile.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  118 => 50,  92 => 27,  81 => 19,  77 => 18,  65 => 8,  59 => 7,  48 => 5,  36 => 3,  11 => 1,);
    }
}
