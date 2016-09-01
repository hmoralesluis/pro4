<?php

/* AdminBundle:User:show.html.twig */
class __TwigTemplate_b19b799320990487a4a8cb595b41aa6656088e813ed3d285b0f5a9a3213c7411 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("AdminBundle::layout.html.twig", "AdminBundle:User:show.html.twig", 1);
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
        $__internal_12d0ea1c3d9628ba07d83dd805b5d4cd1ae574e01b5ad221b9ad8d432ec9efcf = $this->env->getExtension("native_profiler");
        $__internal_12d0ea1c3d9628ba07d83dd805b5d4cd1ae574e01b5ad221b9ad8d432ec9efcf->enter($__internal_12d0ea1c3d9628ba07d83dd805b5d4cd1ae574e01b5ad221b9ad8d432ec9efcf_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "AdminBundle:User:show.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_12d0ea1c3d9628ba07d83dd805b5d4cd1ae574e01b5ad221b9ad8d432ec9efcf->leave($__internal_12d0ea1c3d9628ba07d83dd805b5d4cd1ae574e01b5ad221b9ad8d432ec9efcf_prof);

    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $__internal_6dccf6939046d1bf28c4bfc8b37b40b640bbcd0c3aeb9275f435196096edbcaa = $this->env->getExtension("native_profiler");
        $__internal_6dccf6939046d1bf28c4bfc8b37b40b640bbcd0c3aeb9275f435196096edbcaa->enter($__internal_6dccf6939046d1bf28c4bfc8b37b40b640bbcd0c3aeb9275f435196096edbcaa_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Zona Personal ";
        if ( !(isset($context["fullInformation"]) ? $context["fullInformation"] : $this->getContext($context, "fullInformation"))) {
            echo "referente a ";
            echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "name", array()) . " ") . $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "lastName", array())), "html", null, true);
            echo " ";
        }
        
        $__internal_6dccf6939046d1bf28c4bfc8b37b40b640bbcd0c3aeb9275f435196096edbcaa->leave($__internal_6dccf6939046d1bf28c4bfc8b37b40b640bbcd0c3aeb9275f435196096edbcaa_prof);

    }

    // line 5
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_61a3f939b12fc0ebe4090daf5a0feb93522c0970335180df7c1d07452694aaea = $this->env->getExtension("native_profiler");
        $__internal_61a3f939b12fc0ebe4090daf5a0feb93522c0970335180df7c1d07452694aaea->enter($__internal_61a3f939b12fc0ebe4090daf5a0feb93522c0970335180df7c1d07452694aaea_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 6
        echo "    <link rel=\"stylesheet\" type=\"text/css\"
          href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/plugins/bootstrap-datepicker/css/datepicker.css"), "html", null, true);
        echo "\"
          xmlns=\"http://www.w3.org/1999/html\"/>
    <link href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/plugins/bootstrap-fileupload/bootstrap-fileupload.css"), "html", null, true);
        echo "\" rel=\"stylesheet\"
          type=\"text/css\"/>
    <link href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/plugins/chosen-bootstrap/chosen/chosen.css"), "html", null, true);
        echo "\" rel=\"stylesheet\"
          type=\"text/css\"/>
    <link href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/css/pages/profile.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\"
          xmlns=\"http://www.w3.org/1999/html\"/>
";
        
        $__internal_61a3f939b12fc0ebe4090daf5a0feb93522c0970335180df7c1d07452694aaea->leave($__internal_61a3f939b12fc0ebe4090daf5a0feb93522c0970335180df7c1d07452694aaea_prof);

    }

    // line 17
    public function block_content($context, array $blocks = array())
    {
        $__internal_ce1e464d74356467b268c87ff696b94347e0906c28ed820b4dd86fb78e257963 = $this->env->getExtension("native_profiler");
        $__internal_ce1e464d74356467b268c87ff696b94347e0906c28ed820b4dd86fb78e257963->enter($__internal_ce1e464d74356467b268c87ff696b94347e0906c28ed820b4dd86fb78e257963_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        // line 18
        echo "    <div class=\"row-fluid profile\">
        <div class=\"span12\">
            <!--BEGIN TABS-->
            <div class=\"tabbable tabbable-custom tabbable-full-width\">
                <ul class=\"nav nav-tabs\">
                    <li class=\"active\"><a href=\"#tab_1_1\" data-toggle=\"tab\">Perfil</a></li>
                    ";
        // line 24
        if ((isset($context["fullInformation"]) ? $context["fullInformation"] : $this->getContext($context, "fullInformation"))) {
            // line 25
            echo "                        <li><a href=\"#tab_1_2\" data-toggle=\"tab\">Cuenta Personal</a></li>
                    ";
        }
        // line 27
        echo "                </ul>
                <div class=\"tab-content\">
                    <div class=\"tab-pane profile-classic row-fluid active\" id=\"tab_1_1\">
                        <div class=\"span2\">
                            <div class=\"thumbnail\">
                                ";
        // line 32
        if (file_exists((((((isset($context["web_path"]) ? $context["web_path"] : $this->getContext($context, "web_path")) . "bundles/admin/usuarios/") . $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "username", array())) . ".") . (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "PhotoExtension", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "PhotoExtension", array()), ".jpg")) : (".jpg"))))) {
            // line 33
            echo "                                    <img src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl(((("bundles/admin/usuarios/" . $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "username", array())) . ".") . (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "PhotoExtension", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "PhotoExtension", array()), ".jpg")) : (".jpg")))), "html", null, true);
            echo "\">
                                ";
        } else {
            // line 35
            echo "                                    ";
            if (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "sex", array()) == "Hombre")) {
                // line 36
                echo "                                        <img alt=\"\" src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/img/hombre.jpg"), "html", null, true);
                echo "\"/>
                                    ";
            } else {
                // line 38
                echo "                                        <img alt=\"\" src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/img/mujer.jpg"), "html", null, true);
                echo "\"/>
                                    ";
            }
            // line 40
            echo "                                ";
        }
        // line 41
        echo "                            </div>
                        </div>
                        <ul class=\"unstyled span10\">
                            <li><span>Usuario:</span> ";
        // line 44
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "username", array()), "html", null, true);
        echo "</li>
                            <li><span>Nombre:</span> ";
        // line 45
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "name", array()), "html", null, true);
        echo "</li>
                            <li><span>Apellidos:</span> ";
        // line 46
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "lastName", array()), "html", null, true);
        echo "</li>
                            <li><span>Sexo:</span> ";
        // line 47
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "sex", array()), "html", null, true);
        echo "</li>
                            <li>
                                <span>Cumpleaños:</span> ";
        // line 49
        if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "birthday", array())) {
            echo " ";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "birthday", array()), "Y-n-j"), "html", null, true);
            echo " ";
        }
        // line 50
        echo "                            </li>
                            <li><span>País:</span> ";
        // line 51
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "country", array(), "any", false, true), "name", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "country", array(), "any", false, true), "name", array()), "")) : ("")), "html", null, true);
        echo "</li>
                            <li><span>Ciudad:</span> ";
        // line 52
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "city", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "city", array()), "")) : ("")), "html", null, true);
        echo "</li>
                            <li><span>Dirección:</span> ";
        // line 53
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "address", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "address", array()), "")) : ("")), "html", null, true);
        echo "</li>
                            <li><span>Correo electrónico:</span> <a
                                        href=\"mailto:";
        // line 55
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "email", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "email", array()), "")) : ("")), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "email", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "email", array()), "")) : ("")), "html", null, true);
        echo "</a>
                            </li>
                            <li>
                                <span>Registro:</span> ";
        // line 58
        if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "signUpDate", array())) {
            echo " ";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "signUpDate", array()), "Y-n-j"), "html", null, true);
            echo " ";
        }
        // line 59
        echo "                            </li>
                            <li><span>Skype:</span> ";
        // line 60
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "skype", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "skype", array()), "")) : ("")), "html", null, true);
        echo "</li>
                            <li><span>Whatsapp:</span> ";
        // line 61
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "whatsapp", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "whatsapp", array()), "")) : ("")), "html", null, true);
        echo "</li>
                            <li><span>Facebook:</span> ";
        // line 62
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "facebook", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "facebook", array()), "")) : ("")), "html", null, true);
        echo "</li>
                            <li><span>Twitter:</span> ";
        // line 63
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "twitter", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "twitter", array()), "")) : ("")), "html", null, true);
        echo "</li>
                            <li><span>Google:</span> ";
        // line 64
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "google", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "google", array()), "")) : ("")), "html", null, true);
        echo "</li>
                            <li><span>Página Personal:</span> <a
                                        href=\"";
        // line 66
        echo twig_escape_filter($this->env, ((($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "getSchemeAndHttpHost", array(), "method") . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "baseurl", array())) . "/") . $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "username", array())), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, ((($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "getSchemeAndHttpHost", array(), "method") . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "baseurl", array())) . "/") . $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "username", array())), "html", null, true);
        echo "</a>
                            </li>
                            <li><span>Número del Movil:</span> ";
        // line 68
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "contactPhone", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "contactPhone", array()), "")) : ("")), "html", null, true);
        echo "</li>
                            <li><span>Sobre mi:</span> ";
        // line 69
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "about", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "about", array()), "")) : ("")), "html", null, true);
        echo "
                            </li>
                        </ul>
                    </div>
                    <!--tab_1_2-->
                    ";
        // line 74
        if ((isset($context["fullInformation"]) ? $context["fullInformation"] : $this->getContext($context, "fullInformation"))) {
            // line 75
            echo "                        <div class=\"tab-pane row-fluid profile-account\" id=\"tab_1_2\">
                            <div class=\"row-fluid\">
                                <div class=\"span12\">
                                    <div class=\"span3\">
                                        <ul class=\"ver-inline-menu tabbable margin-bottom-10\">
                                            <li class=\"active\">
                                                <a data-toggle=\"tab\" href=\"#tab_1-1\">
                                                    <i class=\"icon-cog\"></i>
                                                    Información Personal
                                                </a>
                                                <span class=\"after\"></span>
                                            </li>
                                            <li class=\"\"><a data-toggle=\"tab\" href=\"#tab_2-2\"><i
                                                            class=\"icon-picture\"></i> Cambiar Avatar</a></li>
                                            <li class=\"\"><a data-toggle=\"tab\" href=\"#tab_3-3\"><i
                                                            class=\"icon-lock\"></i> Cambiar Contraseña</a></li>
                                            <li class=\"\"><a data-toggle=\"tab\" href=\"#tab_4-4\"><i
                                                            class=\"icon-eye-open\"></i> Configuración de
                                                    Notificaciones</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class=\"span9\">
                                        <div class=\"tab-content\">
                                            <div id=\"tab_1-1\" class=\"tab-pane active\">
                                                <div style=\"height: auto;\" id=\"accordion1-1\"
                                                     class=\"accordion collapse\">
                                                    <form action=\"";
            // line 102
            echo $this->env->getExtension('routing')->getPath("management_user_update");
            echo "\" method=\"post\"
                                                          id=\"infoForm\">
                                                        <label class=\"control-label\">Usuario</label>
                                                        <input type=\"text\" name=\"username\" value=\"";
            // line 105
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "username", array()), "html", null, true);
            echo "\"
                                                               class=\"m-wrap span8\"/>
                                                        <label class=\"control-label\">Nombre</label>
                                                        <input type=\"text\" name=\"name\" value=\"";
            // line 108
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "name", array()), "html", null, true);
            echo "\"
                                                               class=\"m-wrap span8\"/>
                                                        <label class=\"control-label\">Apellidos</label>
                                                        <input type=\"text\" name=\"lastName\" value=\"";
            // line 111
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "lastName", array()), "html", null, true);
            echo "\"
                                                               class=\"m-wrap span8\"/>
                                                        <label class=\"control-label\">Sexo</label>
                                                        <select name=\"sex\" id=\"sex\" class=\"m-wrap span8\">
                                                            ";
            // line 115
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(array(0 => "Hombre", 1 => "Mujer"));
            foreach ($context['_seq'] as $context["_key"] => $context["sex"]) {
                // line 116
                echo "                                                                <option ";
                if (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "sex", array()) == $context["sex"])) {
                    echo " selected
                                                                                                   ";
                }
                // line 117
                echo "value=\"";
                echo twig_escape_filter($this->env, $context["sex"], "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $context["sex"], "html", null, true);
                echo "</option>
                                                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['sex'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 119
            echo "                                                        </select>
                                                        <label class=\"control-label\">Cumpleaños</label>

                                                        <div class=\"controls\">
                                                            <input name=\"birthday\"
                                                                   class=\"m-wrap span8 m-ctrl-medium date-picker\"
                                                                   data-date-format=\"yyyy-m-d\" type=\"text\"
                                                                   value=\"";
            // line 126
            if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "birthday", array())) {
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "birthday", array()), "Y-n-j"), "html", null, true);
                echo " ";
            }
            echo "\"/>
                                                        </div>
                                                        <label class=\"control-label\">País</label>
                                                        <select name=\"country\" id=\"country\" class=\"m-wrap span8\">
                                                            ";
            // line 130
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["countries"]) ? $context["countries"] : $this->getContext($context, "countries")));
            foreach ($context['_seq'] as $context["_key"] => $context["country"]) {
                // line 131
                echo "                                                                <option ";
                if (($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "country", array()), "Alpha2Code", array()) == $this->getAttribute($context["country"], "Alpha2Code", array()))) {
                    // line 132
                    echo "                                                                        selected
                                                                        ";
                }
                // line 133
                echo "value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["country"], "Alpha2Code", array()), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["country"], "name", array()), "html", null, true);
                echo "</option>
                                                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['country'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 135
            echo "                                                        </select>
                                                        <label class=\"control-label\">Ciudad</label>
                                                        <input type=\"text\" name=\"city\" value=\"";
            // line 137
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "city", array()), "html", null, true);
            echo "\"
                                                               class=\"m-wrap span8\"/>
                                                        <label class=\"control-label\">Dirección</label>
                                                        <input type=\"text\" name=\"address\" value=\"";
            // line 140
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "address", array()), "html", null, true);
            echo "\"
                                                               class=\"m-wrap span8\"/>
                                                        <label class=\"control-label\">Correo</label>
                                                        <input type=\"text\" name=\"email\" value=\"";
            // line 143
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "email", array()), "html", null, true);
            echo "\"
                                                               class=\"icon-envelope span8\"/>
                                                        <label class=\"control-label\">Skype</label>
                                                        <input type=\"text\" name=\"skype\" value=\"";
            // line 146
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "skype", array()), "html", null, true);
            echo "\"
                                                               class=\"m-wrap span8\"/>
                                                        <label class=\"control-label\">Whatsapp</label>
                                                        <input type=\"text\" name=\"whatsapp\" value=\"";
            // line 149
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "whatsapp", array()), "html", null, true);
            echo "\"
                                                               class=\"m-wrap span8\"/>
                                                        <label class=\"control-label\">Facebook</label>
                                                        <input type=\"text\" name=\"facebook\" value=\"";
            // line 152
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "facebook", array()), "html", null, true);
            echo "\"
                                                               class=\"m-wrap span8\"/>
                                                        <label class=\"control-label\">Twitter</label>
                                                        <input type=\"text\" name=\"twitter\" value=\"";
            // line 155
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "twitter", array()), "html", null, true);
            echo "\"
                                                               class=\"m-wrap span8\"/>
                                                        <label class=\"control-label\">Google</label>
                                                        <input type=\"text\" name=\"google\" value=\"";
            // line 158
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "google", array()), "html", null, true);
            echo "\"
                                                               class=\"m-wrap span8\"/>
                                                        <label class=\"control-label\">Teléfono de Contacto</label>
                                                        <input type=\"text\" name=\"contactPhone\"
                                                               value=\"";
            // line 162
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "contactPhone", array()), "html", null, true);
            echo "\"
                                                               class=\"m-wrap span8\"/>
                                                        <label class=\"control-label\">Sobre mi</label>
                                                    <textarea name=\"about\" value=\"";
            // line 165
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "about", array()), "html", null, true);
            echo "\"
                                                              class=\"span8 m-wrap\" rows=\"3\"></textarea>

                                                        <div class=\"submit-btn\">
                                                            <a href=\"javascript:\$('#infoForm').submit();\"
                                                               class=\"btn green\">Guardar
                                                                Cambios</a>
                                                            <input class=\"btn\" type=\"reset\" value=\"Cancelar\" />
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div id=\"tab_2-2\" class=\"tab-pane\">
                                                <div style=\"height: auto;\" id=\"accordion2-2\"
                                                     class=\"accordion collapse\">
                                                    <form action=\"";
            // line 180
            echo $this->env->getExtension('routing')->getPath("management_user_avatar");
            echo "\" method=\"post\"
                                                          enctype=\"multipart/form-data\" id=\"avatarForm\">
                                                        <p>Anim pariatur cliche reprehenderit, enim eiusmod high
                                                            life accusamus terry richardson ad squid. 3 wolf moon
                                                            officia aute, non cupidatat skateboard dolor brunch.
                                                            Food truck quinoa nesciunt laborum eiusmod.</p>
                                                        <br/>

                                                        <div class=\"controls\">
                                                            <div class=\"thumbnail\"
                                                                 style=\"width: 278px; height: 250px;\">
                                                                ";
            // line 191
            if (file_exists((((((isset($context["web_path"]) ? $context["web_path"] : $this->getContext($context, "web_path")) . "bundles/admin/usuarios/") . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "username", array())) . ".") . (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array(), "any", false, true), "PhotoExtension", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array(), "any", false, true), "PhotoExtension", array()), ".jpg")) : (".jpg"))))) {
                // line 192
                echo "                                                                    <img src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl(((("bundles/admin/usuarios/" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "username", array())) . ".") . (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array(), "any", false, true), "PhotoExtension", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array(), "any", false, true), "PhotoExtension", array()), ".jpg")) : (".jpg")))), "html", null, true);
                echo "\"
                                                                         style=\"width: 278px; height: 250px;\">
                                                                ";
            } else {
                // line 195
                echo "                                                                    ";
                if (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "sex", array()) == "Hombre")) {
                    // line 196
                    echo "                                                                        <img alt=\"\" style=\"width: 278px; height: 250px;\"
                                                                             src=\"";
                    // line 197
                    echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/img/hombre.jpg"), "html", null, true);
                    echo "\"/>
                                                                    ";
                } else {
                    // line 199
                    echo "                                                                        <img alt=\"\" style=\"width: 278px; height: 250px;\"
                                                                             src=\"";
                    // line 200
                    echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/img/mujer.jpg"), "html", null, true);
                    echo "\"/>
                                                                    ";
                }
                // line 202
                echo "                                                                ";
            }
            // line 203
            echo "                                                            </div>
                                                        </div>
                                                        <div class=\"space10\"></div>
                                                        <div class=\"fileupload fileupload-new\"
                                                             data-provides=\"fileupload\">
                                                            <div class=\"input-append\">
                                                                <div class=\"uneditable-input\">
                                                                    <i class=\"icon-file fileupload-exists\"></i>
                                                                    <span class=\"fileupload-preview\"></span>
                                                                </div>
                                                      <span class=\"btn btn-file\">
                                                      <span class=\"fileupload-new\">Buscar</span>
                                                      <span class=\"fileupload-exists\">Cambiar</span>
                                                      <input type=\"file\" id=\"file\" class=\"default\" name=\"file\"/>
                                                      </span>
                                                                <a href=\"#\" class=\"btn fileupload-exists\"
                                                                   data-dismiss=\"fileupload\">Eliminar</a>
                                                            </div>
                                                        </div>
                                                        <div class=\"clearfix\"></div>
                                                        <div class=\"controls\">
                                                            ";
            // line 224
            if (file_exists((((((isset($context["web_path"]) ? $context["web_path"] : $this->getContext($context, "web_path")) . "bundles/admin/usuarios/") . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "username", array())) . ".") . (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array(), "any", false, true), "PhotoExtension", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array(), "any", false, true), "PhotoExtension", array()), ".jpg")) : (".jpg"))))) {
                // line 225
                echo "                                                                <span class=\"label label-important\">NOTA!</span>
                                                                <span>Usted puede eliminar su foto dando clic <a
                                                                            href=\"";
                // line 227
                echo $this->env->getExtension('routing')->getPath("management_user_avatar_delete");
                echo "\">aquí</a>..</span>
                                                            ";
            }
            // line 229
            echo "                                                        </div>
                                                        <div class=\"space10\"></div>
                                                        <div class=\"submit-btn\">
                                                            <a href=\"javascript: if(\$('#file').val() != '') { \$('#avatarForm').submit(); }\"
                                                               class=\"btn green\">Establecer Imagen</a>
                                                            <input class=\"btn\" type=\"reset\" value=\"Cancelar\" />
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div id=\"tab_3-3\" class=\"tab-pane\">
                                                <div style=\"height: auto;\" id=\"accordion3-3\"
                                                     class=\"accordion collapse\">
                                                    <form action=\"";
            // line 242
            echo $this->env->getExtension('routing')->getPath("management_user_password_change");
            echo "\"
                                                          id=\"changePassForm\" method=\"post\">
                                                        <label class=\"control-label\">Contraseña Actual</label>
                                                        <input type=\"password\" name=\"oldPassword\" id=\"oldPassword\"
                                                               class=\"m-wrap span8\" data-required=\"1\"/>
                                                        <label class=\"control-label\">Nueva Contraseña</label>
                                                        <input type=\"password\" name=\"password\" id=\"password\"
                                                               class=\"m-wrap span8\" data-required=\"1\"/>
                                                        <label class=\"control-label\">Confirmar Nueva Contraseña</label>
                                                        <input type=\"password\" name=\"confimPassword\" id=\"confimPassword\"
                                                               class=\"m-wrap span8\" data-required=\"1\"/>

                                                        <div class=\"submit-btn\">
                                                            <a href=\"javascript: if( \$('#oldPassword').val() != '' && \$('#password').val() != '' && \$('#confimPassword').val() != '' ){
                                                                if(\$('#password').val() == \$('#confimPassword').val()){
                                                                    \$('#changePassForm').submit();
                                                                } else { Codes.showMessage('Error', 'Las contraseñas proporcionadas no coinciden!') }
                                                            }  else { Codes.showMessage('Error', 'Existen uno o varios campos vacios!'); }\"
                                                               class=\"btn green\">Guardar Cambios</a>
                                                            <input class=\"btn\" type=\"reset\" value=\"Cancelar\" />
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div id=\"tab_4-4\" class=\"tab-pane\">
                                                <div style=\"height: auto;\" id=\"accordion4-4\"
                                                     class=\"accordion collapse\">
                                                    ";
            // line 269
            if ((twig_length_filter($this->env, (isset($context["notificationTypes"]) ? $context["notificationTypes"] : $this->getContext($context, "notificationTypes"))) != 0)) {
                // line 270
                echo "                                                        <form action=\"";
                echo $this->env->getExtension('routing')->getPath("management_user_associate_notificationType");
                echo "\" id=\"notificationTypesForm\" method=\"post\">
                                                            ";
                // line 271
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["notificationTypes"]) ? $context["notificationTypes"] : $this->getContext($context, "notificationTypes")));
                foreach ($context['_seq'] as $context["_key"] => $context["notificationType"]) {
                    // line 272
                    echo "                                                                ";
                    $context["associated"] = false;
                    // line 273
                    echo "                                                                ";
                    if (twig_in_filter($context["notificationType"], (isset($context["associatedNotificationTypes"]) ? $context["associatedNotificationTypes"] : $this->getContext($context, "associatedNotificationTypes")))) {
                        // line 274
                        echo "                                                                    ";
                        $context["associated"] = true;
                        // line 275
                        echo "                                                                ";
                    }
                    // line 276
                    echo "                                                                <div class=\"profile-settings row-fluid\">
                                                                    <div class=\"span9\">
                                                                        <p>Recibir notificaciones referente
                                                                            a ";
                    // line 279
                    echo twig_escape_filter($this->env, $this->getAttribute($context["notificationType"], "description", array()), "html", null, true);
                    echo "
                                                                            ?</p>
                                                                    </div>
                                                                    <div class=\"control-group span3\">
                                                                        <div class=\"controls\">
                                                                            <label class=\"radio\">
                                                                                <input type=\"radio\"
                                                                                       name=\"";
                    // line 286
                    echo twig_escape_filter($this->env, $this->getAttribute($context["notificationType"], "id", array()), "html", null, true);
                    echo "\"
                                                                                       value=\"1\" ";
                    // line 287
                    if ((isset($context["associated"]) ? $context["associated"] : $this->getContext($context, "associated"))) {
                        echo " checked ";
                    }
                    echo "/>
                                                                                Si
                                                                            </label>
                                                                            <label class=\"radio\">
                                                                                <input type=\"radio\"
                                                                                       name=\"";
                    // line 292
                    echo twig_escape_filter($this->env, $this->getAttribute($context["notificationType"], "id", array()), "html", null, true);
                    echo "\"
                                                                                       value=\"0\" ";
                    // line 293
                    if ( !(isset($context["associated"]) ? $context["associated"] : $this->getContext($context, "associated"))) {
                        echo " checked ";
                    }
                    echo "/>
                                                                                No
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['notificationType'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 300
                echo "                                                            <div class=\"space5\"></div>
                                                            <div class=\"submit-btn\">
                                                                <a href=\"javascript: \$('#notificationTypesForm').submit();\" class=\"btn green\">Guardar Cambios</a>
                                                            </div>
                                                        </form>
                                                    ";
            } else {
                // line 306
                echo "                                                        <div class=\"alert alert-block alert-error fade in\">
                                                            <button type=\"button\" class=\"close\"
                                                                    data-dismiss=\"alert\"></button>
                                                            <h4 class=\"alert-heading\">Error!</h4>

                                                            <p>
                                                                No existen tipos de notificaciones registradas en el
                                                                sistema aún.
                                                            </p>
                                                        </div>
                                                    ";
            }
            // line 317
            echo "                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end span9-->
                                </div>
                            </div>
                        </div>
                    ";
        }
        // line 326
        echo "                    <!--end tab-pane-->
                </div>
            </div>
            <!--END TABS-->
        </div>
    </div>
";
        
        $__internal_ce1e464d74356467b268c87ff696b94347e0906c28ed820b4dd86fb78e257963->leave($__internal_ce1e464d74356467b268c87ff696b94347e0906c28ed820b4dd86fb78e257963_prof);

    }

    // line 334
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_287dc874f54d844876f32f378b7b1cc2120bbc5e8cf0482cb64f6e2c41d4f1d2 = $this->env->getExtension("native_profiler");
        $__internal_287dc874f54d844876f32f378b7b1cc2120bbc5e8cf0482cb64f6e2c41d4f1d2->enter($__internal_287dc874f54d844876f32f378b7b1cc2120bbc5e8cf0482cb64f6e2c41d4f1d2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 335
        echo "    <script type=\"text/javascript\"
            src=\"";
        // line 336
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\"
            src=\"";
        // line 338
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/plugins/bootstrap-fileupload/bootstrap-fileupload.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\"
            src=\"";
        // line 340
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/admin/plugins/chosen-bootstrap/chosen/chosen.jquery.min.js"), "html", null, true);
        echo "\"></script>
    <script>
        if (jQuery().datepicker) {
            \$('.date-picker').datepicker();
        }

        ";
        // line 346
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "flashbag", array()), "get", array(0 => "notice"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 347
            echo "        Codes.showMessage('Información', '";
            echo twig_escape_filter($this->env, $context["flashMessage"], "html", null, true);
            echo "');
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 349
        echo "
    </script>
";
        
        $__internal_287dc874f54d844876f32f378b7b1cc2120bbc5e8cf0482cb64f6e2c41d4f1d2->leave($__internal_287dc874f54d844876f32f378b7b1cc2120bbc5e8cf0482cb64f6e2c41d4f1d2_prof);

    }

    public function getTemplateName()
    {
        return "AdminBundle:User:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  718 => 349,  709 => 347,  705 => 346,  696 => 340,  691 => 338,  686 => 336,  683 => 335,  677 => 334,  664 => 326,  653 => 317,  640 => 306,  632 => 300,  617 => 293,  613 => 292,  603 => 287,  599 => 286,  589 => 279,  584 => 276,  581 => 275,  578 => 274,  575 => 273,  572 => 272,  568 => 271,  563 => 270,  561 => 269,  531 => 242,  516 => 229,  511 => 227,  507 => 225,  505 => 224,  482 => 203,  479 => 202,  474 => 200,  471 => 199,  466 => 197,  463 => 196,  460 => 195,  453 => 192,  451 => 191,  437 => 180,  419 => 165,  413 => 162,  406 => 158,  400 => 155,  394 => 152,  388 => 149,  382 => 146,  376 => 143,  370 => 140,  364 => 137,  360 => 135,  349 => 133,  345 => 132,  342 => 131,  338 => 130,  328 => 126,  319 => 119,  308 => 117,  302 => 116,  298 => 115,  291 => 111,  285 => 108,  279 => 105,  273 => 102,  244 => 75,  242 => 74,  234 => 69,  230 => 68,  223 => 66,  218 => 64,  214 => 63,  210 => 62,  206 => 61,  202 => 60,  199 => 59,  193 => 58,  185 => 55,  180 => 53,  176 => 52,  172 => 51,  169 => 50,  163 => 49,  158 => 47,  154 => 46,  150 => 45,  146 => 44,  141 => 41,  138 => 40,  132 => 38,  126 => 36,  123 => 35,  117 => 33,  115 => 32,  108 => 27,  104 => 25,  102 => 24,  94 => 18,  88 => 17,  78 => 13,  73 => 11,  68 => 9,  63 => 7,  60 => 6,  54 => 5,  37 => 3,  11 => 1,);
    }
}
