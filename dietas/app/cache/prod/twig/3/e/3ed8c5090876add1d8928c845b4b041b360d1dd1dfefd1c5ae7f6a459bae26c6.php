<?php

/* FrontBundle:Login:login.html.twig */
class __TwigTemplate_3ed8c5090876add1d8928c845b4b041b360d1dd1dfefd1c5ae7f6a459bae26c6 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("FrontBundle::layout.html.twig", "FrontBundle:Login:login.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'options' => array($this, 'block_options'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "FrontBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Login";
    }

    // line 5
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 6
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/css/login.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
    <link href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/plugins/iCheck/square/blue.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
";
    }

    // line 10
    public function block_options($context, array $blocks = array())
    {
        // line 11
        echo "    <nav>
        <ul class=\"nav nav-pills nav-main\" id=\"mainMenu\">
            <li>
                <a href=\"";
        // line 14
        echo $this->env->getExtension('routing')->getPath("join");
        echo "\">Join Us</a>
            </li>
        </ul>
    </nav>
";
    }

    // line 20
    public function block_body($context, array $blocks = array())
    {
        // line 21
        echo "    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-lg-12\">
                <h1 class=\"page-header\">Welcome to our Company
                    <small>Insert your credentils for a full access</small>
                </h1>
                <ol class=\"breadcrumb\">
                    <li><a href=\"";
        // line 28
        echo $this->env->getExtension('routing')->getPath("homepage");
        echo "\">Home</a></li>
                    <li class=\"active\">Login</li>
                </ol>
            </div>
        </div>

        <div class=\"row\">
            <div class=\"col-lg-12\">
                <div class=\"col-sm-12\">
                    <h4>Manage your Bussines</h4>

                    <p>Cookie jelly beans soufflé icing. Gummi bears tootsie roll powder chupa chups cheesecake
                        chocolate jelly-o lollipop lollipop. Halvah applicake chupa chups. Marshmallow chocolate jujubes
                        icing lollipop gummi bears chupa chups pudding bonbon. Jelly beans jelly soufflé jujubes.
                        <a href=\"#\"> read moore.</a></p>
                    <hr>
                </div>
                <div class=\"col-sm-4\">
                    <h4 class=\"text-center\">Mandatory fields</h4>
                    ";
        // line 47
        if ((isset($context["error"]) ? $context["error"] : null)) {
            // line 48
            echo "                        <div class=\"alert alert-danger\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getAttribute((isset($context["error"]) ? $context["error"] : null), "messageKey", array()), $this->getAttribute((isset($context["error"]) ? $context["error"] : null), "messageData", array()), "security"), "html", null, true);
            echo "</div>
                    ";
        }
        // line 50
        echo "                    <form id=\"login_form\" class=\"form-signin\" method=\"POST\" action=\"";
        echo $this->env->getExtension('routing')->getPath("check_path");
        echo "\">
                        <h2 class=\"form-signin-heading\"></h2>

                        <div class=\"form-group has-feedback\">
                            <input type=\"text\" id=\"inputUsername\" name=\"_username\" value=\"";
        // line 54
        echo twig_escape_filter($this->env, (isset($context["last_username"]) ? $context["last_username"] : null), "html", null, true);
        echo "\"
                                   class=\"form-control\"
                                   placeholder=\"Username\" required>
                            <span class=\"glyphicon glyphicon-user form-control-feedback\"></span>
                        </div>
                        <div class=\"form-group has-feedback\">
                            <input type=\"password\" id=\"inputPassword\" name=\"_password\" class=\"form-control\"
                                   placeholder=\"Password\"
                                   required>
                            <span class=\"glyphicon glyphicon-lock form-control-feedback\"></span>
                        </div>

                        <div class=\"checkbox icheck\">
                            <label>
                                <input type=\"checkbox\" value=\"remember-me\"> Remember me
                            </label>
                        </div>
                        <button class=\"btn btn-block btn-primary btn-lg\" type=\"submit\">Sign in</button>
                    </form>
                </div>
                <div class=\"col-sm-8\">

                    <h4>Welcome to 'Modern Business'</h4>

                    <p>This is a great place to introduce your company or project and describe what you do. This about
                        page
                        features general company information, employee bios, and other helpful elements.</p>

                    <p>Lid est laborum dolo rumes fugats untras. Etharums ser quidem rerum facilis dolores nemis omnis
                        fugats vitaes nemo minima rerums unsers sadips amets.. Sed ut perspiciatis unde omnis iste natus
                        error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab
                        illo
                        inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam
                        voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores
                        eos
                        qui ratione voluptatem sequi nesciunt.</p>
                    <hr>
                    <div class=\"well\">
                        <h4>Popular Categories</h4>

                        <div class=\"row\">
                            <div class=\"col-lg-6\">
                                <p>Bootstrap's default well's work great for side widgets! What is a widget anyways...?.
                                    Lid est laborum dolo rumes fugats untras.</p>
                            </div>
                            <div class=\"col-lg-6\">
                                <p>Bootstrap's default well's work great for side widgets! What is a widget
                                    anyways...?. Lid est laborum dolo rumes fugats untras.<a href=\"#\"> read moore.</a></p> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
";
    }

    // line 111
    public function block_javascripts($context, array $blocks = array())
    {
        // line 112
        echo "    <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/plugins/iCheck/icheck.min.js"), "html", null, true);
        echo "\"></script>
    <script>
        \$(function () {
            \$('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%'
            });
        });
    </script>
";
    }

    public function getTemplateName()
    {
        return "FrontBundle:Login:login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  182 => 112,  179 => 111,  119 => 54,  111 => 50,  105 => 48,  103 => 47,  81 => 28,  72 => 21,  69 => 20,  60 => 14,  55 => 11,  52 => 10,  46 => 7,  41 => 6,  38 => 5,  32 => 3,  11 => 1,);
    }
}
