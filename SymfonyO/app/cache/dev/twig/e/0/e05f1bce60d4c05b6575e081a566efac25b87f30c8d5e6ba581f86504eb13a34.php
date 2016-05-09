<?php

/* FrontBundle:Homepage:homepage.html.twig */
class __TwigTemplate_e05f1bce60d4c05b6575e081a566efac25b87f30c8d5e6ba581f86504eb13a34 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("FrontBundle::layout.html.twig", "FrontBundle:Homepage:homepage.html.twig", 1);
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
        $__internal_52124f1300da1b5cb35c6e0519f69a6d6fa987214437483cc6e078dd5d7c8050 = $this->env->getExtension("native_profiler");
        $__internal_52124f1300da1b5cb35c6e0519f69a6d6fa987214437483cc6e078dd5d7c8050->enter($__internal_52124f1300da1b5cb35c6e0519f69a6d6fa987214437483cc6e078dd5d7c8050_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "FrontBundle:Homepage:homepage.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_52124f1300da1b5cb35c6e0519f69a6d6fa987214437483cc6e078dd5d7c8050->leave($__internal_52124f1300da1b5cb35c6e0519f69a6d6fa987214437483cc6e078dd5d7c8050_prof);

    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $__internal_3ae829bd7669a6f6002dc9dd3b795dc4b01517bb3fead152b3133c042de0bbd3 = $this->env->getExtension("native_profiler");
        $__internal_3ae829bd7669a6f6002dc9dd3b795dc4b01517bb3fead152b3133c042de0bbd3->enter($__internal_3ae829bd7669a6f6002dc9dd3b795dc4b01517bb3fead152b3133c042de0bbd3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Homepage";
        
        $__internal_3ae829bd7669a6f6002dc9dd3b795dc4b01517bb3fead152b3133c042de0bbd3->leave($__internal_3ae829bd7669a6f6002dc9dd3b795dc4b01517bb3fead152b3133c042de0bbd3_prof);

    }

    // line 5
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_d9afeb2845e5e01f61db98933c42121fbed70fcf25b7e8286d5ebd5578d40f28 = $this->env->getExtension("native_profiler");
        $__internal_d9afeb2845e5e01f61db98933c42121fbed70fcf25b7e8286d5ebd5578d40f28->enter($__internal_d9afeb2845e5e01f61db98933c42121fbed70fcf25b7e8286d5ebd5578d40f28_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 6
        echo "    <link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/front/css/login.css"), "html", null, true);
        echo "\"/>
";
        
        $__internal_d9afeb2845e5e01f61db98933c42121fbed70fcf25b7e8286d5ebd5578d40f28->leave($__internal_d9afeb2845e5e01f61db98933c42121fbed70fcf25b7e8286d5ebd5578d40f28_prof);

    }

    // line 9
    public function block_options($context, array $blocks = array())
    {
        $__internal_1f6e639025fdde134c925f52b9b61c6bcd5f33fb3810a190d507ec70c3ce0f5d = $this->env->getExtension("native_profiler");
        $__internal_1f6e639025fdde134c925f52b9b61c6bcd5f33fb3810a190d507ec70c3ce0f5d->enter($__internal_1f6e639025fdde134c925f52b9b61c6bcd5f33fb3810a190d507ec70c3ce0f5d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "options"));

        // line 10
        echo "    <nav>
        <ul class=\"nav nav-pills nav-main\" id=\"mainMenu\">
            <li class=\"active\">
                <a href=\"#\" class=\"signin\"><span>Login </span><i class=\"icon-angle-up\"></i></a>
                <fieldset id=\"signin_menu\">
                    <form method=\"post\" id=\"signin\" action=\"";
        // line 15
        echo $this->env->getExtension('routing')->getPath("check_path");
        echo "\">
                        <input id=\"username\" name=\"_username\" value=\"";
        // line 16
        echo twig_escape_filter($this->env, ((array_key_exists("last_username", $context)) ? (_twig_default_filter($this->getContext($context, "last_username"), "")) : ("")), "html", null, true);
        echo "\" title=\"username\"
                               placeholder=\"Username\" tabindex=\"4\" type=\"text\">
                        </p>
                        <p>
                            <input id=\"password\" name=\"_password\" value=\"\" title=\"password\" tabindex=\"5\"
                                   placeholder=\"Password\" type=\"password\">
                        </p>

                        <p class=\"remember\">
                            <a class=\"btn btn-flat btn-mini btn-primary\" href=\"javascript:\$('#signin').submit()\">Sign
                                in</a>
                            <input id=\"remember\" name=\"remember_me\" value=\"1\" tabindex=\"7\" type=\"checkbox\">
                            <label for=\"remember\">Remember me</label>
                        </p>

                        <p class=\"forgot\"><a href=\"#\" id=\"resend_password_link\">Forgot your password?</a></p>

                        <p class=\"forgot-username\"><a rel=\"tooltip\"
                                                      title=\"If you remember your password, try logging in with your email\"
                                                      href=\"#\">Forgot your username?</a></p>
                    </form>
                </fieldset>
            </li>
            <li>
                <a href=\"";
        // line 40
        echo $this->env->getExtension('routing')->getPath("join");
        echo "\">Join Us</a>
            </li>
        </ul>
    </nav>
";
        
        $__internal_1f6e639025fdde134c925f52b9b61c6bcd5f33fb3810a190d507ec70c3ce0f5d->leave($__internal_1f6e639025fdde134c925f52b9b61c6bcd5f33fb3810a190d507ec70c3ce0f5d_prof);

    }

    // line 46
    public function block_body($context, array $blocks = array())
    {
        $__internal_1e2d83ae98d85c793dcc9781d1068be96931ccdf9ab1ac51c0c240da1387a3fa = $this->env->getExtension("native_profiler");
        $__internal_1e2d83ae98d85c793dcc9781d1068be96931ccdf9ab1ac51c0c240da1387a3fa->enter($__internal_1e2d83ae98d85c793dcc9781d1068be96931ccdf9ab1ac51c0c240da1387a3fa_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 47
        echo "    <div role=\"main\" class=\"main\">
        <div id=\"content\" class=\"content full\">
            ";
        // line 49
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(((array_key_exists("blocks", $context)) ? (_twig_default_filter($this->getContext($context, "blocks"), array())) : (array())));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        foreach ($context['_seq'] as $context["_key"] => $context["block"]) {
            if ($this->getAttribute($context["block"], "active", array())) {
                // line 50
                echo "                ";
                try {
                    $this->loadTemplate((("FrontBundle:Blocks:" . $this->getAttribute($context["block"], "name", array())) . ".html.twig"), "FrontBundle:Homepage:homepage.html.twig", 50)->display($context);
                } catch (Twig_Error_Loader $e) {
                    // ignore missing template
                }

                // line 51
                echo "            ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['block'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 52
        echo "        </div>
    </div>
";
        
        $__internal_1e2d83ae98d85c793dcc9781d1068be96931ccdf9ab1ac51c0c240da1387a3fa->leave($__internal_1e2d83ae98d85c793dcc9781d1068be96931ccdf9ab1ac51c0c240da1387a3fa_prof);

    }

    // line 56
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_f8e426cc19cdf000c2f8bdc899d72b860aab20da3cb56b1bc71a78cf0c0b091c = $this->env->getExtension("native_profiler");
        $__internal_f8e426cc19cdf000c2f8bdc899d72b860aab20da3cb56b1bc71a78cf0c0b091c->enter($__internal_f8e426cc19cdf000c2f8bdc899d72b860aab20da3cb56b1bc71a78cf0c0b091c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 57
        echo "    <script type=\"text/javascript\">
        \$(document).ready(function () {
            \$(\".signin\").click(function (e) {
                e.preventDefault();
                \$(\"fieldset#signin_menu\").toggle();
                \$(\".signin\").toggleClass(\"menu-open\");
                if (\$('.signin').hasClass('menu-open')) {
                    \$('.signin i.icon-angle-up').removeClass('icon-angle-up').addClass('icon-angle-down');
                } else {
                    \$('.signin i.icon-angle-down').removeClass('icon-angle-down').addClass('icon-angle-up');
                }
            });

            \$(\"fieldset#signin_menu\").mouseup(function () {
                return false
            });
            \$(document).mouseup(function (e) {
                if (\$(e.target).parent(\"a.signin\").length == 0) {
                    \$(\".signin\").removeClass(\"menu-open\");
                    \$(\"fieldset#signin_menu\").hide();
                    \$('.signin i.icon-angle-down').removeClass('icon-angle-down').addClass('icon-angle-up');
                }
            });

        });
    </script>
";
        
        $__internal_f8e426cc19cdf000c2f8bdc899d72b860aab20da3cb56b1bc71a78cf0c0b091c->leave($__internal_f8e426cc19cdf000c2f8bdc899d72b860aab20da3cb56b1bc71a78cf0c0b091c_prof);

    }

    public function getTemplateName()
    {
        return "FrontBundle:Homepage:homepage.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  176 => 57,  170 => 56,  161 => 52,  151 => 51,  143 => 50,  132 => 49,  128 => 47,  122 => 46,  110 => 40,  83 => 16,  79 => 15,  72 => 10,  66 => 9,  56 => 6,  50 => 5,  38 => 3,  11 => 1,);
    }
}
