<?php

/* SonataAdminBundle::standard_layout.html.twig */
class __TwigTemplate_2aadd85804f1a5f5d8fc9cdc0ae5ba74 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascripts' => array($this, 'block_javascripts'),
            'logo' => array($this, 'block_logo'),
            'sonata_nav_menu' => array($this, 'block_sonata_nav_menu'),
            'top_bar_before_nav' => array($this, 'block_top_bar_before_nav'),
            'sonata_top_bar_nav' => array($this, 'block_sonata_top_bar_nav'),
            'top_bar_after_nav' => array($this, 'block_top_bar_after_nav'),
            'notice' => array($this, 'block_notice'),
            'actions' => array($this, 'block_actions'),
            'sonata_admin_content' => array($this, 'block_sonata_admin_content'),
            'footer' => array($this, 'block_footer'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 11
        $context["_preview"] = $this->renderBlock("preview", $context, $blocks);
        // line 12
        $context["_form"] = $this->renderBlock("form", $context, $blocks);
        // line 13
        $context["_show"] = $this->renderBlock("show", $context, $blocks);
        // line 14
        $context["_list_table"] = $this->renderBlock("list_table", $context, $blocks);
        // line 15
        $context["_list_filters"] = $this->renderBlock("list_filters", $context, $blocks);
        // line 16
        $context["_side_menu"] = $this->renderBlock("side_menu", $context, $blocks);
        // line 17
        $context["_content"] = $this->renderBlock("content", $context, $blocks);
        // line 18
        $context["_title"] = $this->renderBlock("title", $context, $blocks);
        // line 19
        $context["_breadcrumb"] = $this->renderBlock("breadcrumb", $context, $blocks);
        // line 20
        echo "<!DOCTYPE html>
<html class=\"no-js\">
    <head>
        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />

        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">

        ";
        // line 27
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 38
        echo "
        ";
        // line 39
        $this->displayBlock('javascripts', $context, $blocks);
        // line 49
        echo "
        <title>
            ";
        // line 51
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Admin", array(), "SonataAdminBundle"), "html", null, true);
        echo "

            ";
        // line 53
        if ((!twig_test_empty($this->getContext($context, "_title")))) {
            // line 54
            echo "                ";
            echo $this->getContext($context, "_title");
            echo "
            ";
        } else {
            // line 56
            echo "                ";
            if (array_key_exists("action", $context)) {
                // line 57
                echo "                    -
                    ";
                // line 58
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "admin"), "breadcrumbs", array(0 => $this->getContext($context, "action")), "method"));
                $context['loop'] = array(
                  'parent' => $context['_parent'],
                  'index0' => 0,
                  'index'  => 1,
                  'first'  => true,
                );
                if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                    $length = count($context['_seq']);
                    $context['loop']['revindex0'] = $length - 1;
                    $context['loop']['revindex'] = $length;
                    $context['loop']['length'] = $length;
                    $context['loop']['last'] = 1 === $length;
                }
                foreach ($context['_seq'] as $context["_key"] => $context["menu"]) {
                    // line 59
                    echo "                        ";
                    if ((!$this->getAttribute($this->getContext($context, "loop"), "first"))) {
                        // line 60
                        echo "                            &gt;
                        ";
                    }
                    // line 62
                    echo "                        ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "menu"), "label"), "html", null, true);
                    echo "
                    ";
                    ++$context['loop']['index0'];
                    ++$context['loop']['index'];
                    $context['loop']['first'] = false;
                    if (isset($context['loop']['length'])) {
                        --$context['loop']['revindex0'];
                        --$context['loop']['revindex'];
                        $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['menu'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 64
                echo "                ";
            }
            // line 65
            echo "            ";
        }
        // line 66
        echo "        </title>
    </head>
    <body class=\"sonata-bc ";
        // line 68
        if (twig_test_empty($this->getContext($context, "_side_menu"))) {
            echo "sonata-ba-no-side-menu";
        }
        echo "\">
        ";
        // line 70
        echo "
        <div class=\"navbar navbar-fixed-top\">
            <div class=\"navbar-inner\">
                <div class=\"container-fluid\">
                    <a class=\"btn btn-navbar\" data-toggle=\"collapse\" data-target=\".nav-collapse\">
                        <span class=\"icon-bar\"></span>
                        <span class=\"icon-bar\"></span>
                        <span class=\"icon-bar\"></span>
                    </a>

                    ";
        // line 80
        if (array_key_exists("admin_pool", $context)) {
            // line 81
            echo "                        <div class=\"navbar-text pull-right\">";
            $template = $this->env->resolveTemplate($this->getAttribute($this->getContext($context, "admin_pool"), "getTemplate", array(0 => "user_block"), "method"));
            $template->display($context);
            echo "</div>

                        ";
            // line 83
            $this->displayBlock('logo', $context, $blocks);
            // line 89
            echo "
                        ";
            // line 90
            $this->displayBlock('sonata_nav_menu', $context, $blocks);
            // line 114
            echo "                    ";
        }
        // line 115
        echo "                </div>
            </div>
        </div>

        <div class=\"container-fluid\">
            ";
        // line 120
        $this->displayBlock('notice', $context, $blocks);
        // line 130
        echo "
            <div class=\"row-fluid\">
                <div class=\"span6\">
                    ";
        // line 133
        if (((!twig_test_empty($this->getContext($context, "_breadcrumb"))) || array_key_exists("action", $context))) {
            // line 134
            echo "                        <ul class=\"breadcrumb\">
                            ";
            // line 135
            if (twig_test_empty($this->getContext($context, "_breadcrumb"))) {
                // line 136
                echo "                                ";
                if (array_key_exists("action", $context)) {
                    // line 137
                    echo "                                    ";
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "admin"), "breadcrumbs", array(0 => $this->getContext($context, "action")), "method"));
                    $context['loop'] = array(
                      'parent' => $context['_parent'],
                      'index0' => 0,
                      'index'  => 1,
                      'first'  => true,
                    );
                    if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                        $length = count($context['_seq']);
                        $context['loop']['revindex0'] = $length - 1;
                        $context['loop']['revindex'] = $length;
                        $context['loop']['length'] = $length;
                        $context['loop']['last'] = 1 === $length;
                    }
                    foreach ($context['_seq'] as $context["_key"] => $context["menu"]) {
                        // line 138
                        echo "                                        ";
                        if ((!$this->getAttribute($this->getContext($context, "loop"), "last"))) {
                            // line 139
                            echo "                                            <li>
                                                ";
                            // line 140
                            if ((!twig_test_empty($this->getAttribute($this->getContext($context, "menu"), "uri")))) {
                                // line 141
                                echo "                                                    <a href=\"";
                                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "menu"), "uri"), "html", null, true);
                                echo "\">";
                                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "menu"), "label"), "html", null, true);
                                echo "</a>
                                                ";
                            } else {
                                // line 143
                                echo "                                                    ";
                                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "menu"), "label"), "html", null, true);
                                echo "
                                                ";
                            }
                            // line 145
                            echo "                                                <span class=\"divider\">/</span>
                                            </li>
                                        ";
                        } else {
                            // line 148
                            echo "                                            <li class=\"active\">";
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "menu"), "label"), "html", null, true);
                            echo "</li>
                                        ";
                        }
                        // line 150
                        echo "                                    ";
                        ++$context['loop']['index0'];
                        ++$context['loop']['index'];
                        $context['loop']['first'] = false;
                        if (isset($context['loop']['length'])) {
                            --$context['loop']['revindex0'];
                            --$context['loop']['revindex'];
                            $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                        }
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['menu'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 151
                    echo "                                ";
                }
                // line 152
                echo "                            ";
            } else {
                // line 153
                echo "                                ";
                echo $this->getContext($context, "_breadcrumb");
                echo "
                            ";
            }
            // line 155
            echo "                        </ul>
                    ";
        }
        // line 157
        echo "                </div>

                <div class=\"span4 offset2\">
                    ";
        // line 160
        $this->displayBlock('actions', $context, $blocks);
        // line 161
        echo "                </div>
            </div>

            <div class=\"row-fluid\">
                ";
        // line 165
        if ((!twig_test_empty($this->getContext($context, "_side_menu")))) {
            // line 166
            echo "                    <div class=\"sidebar span2\">
                        <div class=\"well sonata-ba-side-menu\" style=\"padding: 8px 0;\">";
            // line 167
            echo $this->getContext($context, "_side_menu");
            echo "</div>
                    </div>
                ";
        }
        // line 170
        echo "
                <div class=\"content ";
        // line 171
        echo (((!twig_test_empty($this->getContext($context, "_side_menu")))) ? (" span10") : ("span12"));
        echo "\">
                    ";
        // line 172
        $this->displayBlock('sonata_admin_content', $context, $blocks);
        // line 202
        echo "                </div>
            </div>

            ";
        // line 205
        $this->displayBlock('footer', $context, $blocks);
        // line 212
        echo "        </div>
    </body>
</html>
";
    }

    // line 27
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 28
        echo "            <!-- jQuery code -->
            <link rel=\"stylesheet\" href=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sonatajquery/themes/flick/jquery-ui-1.8.16.custom.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"all\" />

            <link rel=\"stylesheet\" href=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sonataadmin/bootstrap/css/bootstrap.min.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"all\"  />
            <link rel=\"stylesheet\" href=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sonataadmin/bootstrap/css/bootstrap-responsive.min.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"all\" />

            <!-- base application asset -->
            <link rel=\"stylesheet\" href=\"";
        // line 35
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sonataadmin/css/layout.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"all\" />
            <link rel=\"stylesheet\" href=\"";
        // line 36
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sonataadmin/css/colors.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"all\" />
        ";
    }

    // line 39
    public function block_javascripts($context, array $blocks = array())
    {
        // line 40
        echo "            <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sonatajquery/jquery-1.8.3.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
            <script src=\"";
        // line 41
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sonatajquery/jquery-ui-1.8.23.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
            <script src=\"";
        // line 42
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sonatajquery/jquery-ui-i18n.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>

            <script src=\"";
        // line 44
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sonataadmin/bootstrap/js/bootstrap.min.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>

            <script src=\"";
        // line 46
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sonataadmin/jquery/jquery.form.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
            <script src=\"";
        // line 47
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sonataadmin/base.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
        ";
    }

    // line 83
    public function block_logo($context, array $blocks = array())
    {
        // line 84
        echo "                            <a href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("sonata_admin_dashboard"), "html", null, true);
        echo "\" class=\"brand\">
                                <img src=\"";
        // line 85
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute($this->getContext($context, "admin_pool"), "titlelogo")), "html", null, true);
        echo "\"  alt=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "admin_pool"), "title"), "html", null, true);
        echo "\" />
                                ";
        // line 86
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "admin_pool"), "title"), "html", null, true);
        echo "
                            </a>
                        ";
    }

    // line 90
    public function block_sonata_nav_menu($context, array $blocks = array())
    {
        // line 91
        echo "                            <div class=\"nav-collapse\">
                                <ul class=\"nav\">
                                    ";
        // line 93
        $this->displayBlock('top_bar_before_nav', $context, $blocks);
        // line 94
        echo "                                    ";
        $this->displayBlock('sonata_top_bar_nav', $context, $blocks);
        // line 110
        echo "                                    ";
        $this->displayBlock('top_bar_after_nav', $context, $blocks);
        // line 111
        echo "                                </ul>
                            </div>
                        ";
    }

    // line 93
    public function block_top_bar_before_nav($context, array $blocks = array())
    {
        echo " ";
    }

    // line 94
    public function block_sonata_top_bar_nav($context, array $blocks = array())
    {
        // line 95
        echo "                                        ";
        if (($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "security"), "token") && $this->env->getExtension('security')->isGranted("ROLE_SONATA_ADMIN"))) {
            // line 96
            echo "                                            ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "admin_pool"), "dashboardgroups"));
            foreach ($context['_seq'] as $context["_key"] => $context["group"]) {
                // line 97
                echo "                                                <li class=\"dropdown\">
                                                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">";
                // line 98
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getAttribute($this->getContext($context, "group"), "label"), array(), $this->getAttribute($this->getContext($context, "group"), "label_catalogue")), "html", null, true);
                echo " <span class=\"caret\"></span></a>
                                                    <ul class=\"dropdown-menu\">
                                                        ";
                // line 100
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "group"), "items"));
                foreach ($context['_seq'] as $context["_key"] => $context["admin"]) {
                    // line 101
                    echo "                                                            ";
                    if (($this->getAttribute($this->getContext($context, "admin"), "hasroute", array(0 => "list"), "method") && $this->getAttribute($this->getContext($context, "admin"), "isGranted", array(0 => "LIST"), "method"))) {
                        // line 102
                        echo "                                                                <li><a href=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "admin"), "generateUrl", array(0 => "list"), "method"), "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getAttribute($this->getContext($context, "admin"), "label"), array(), $this->getAttribute($this->getContext($context, "admin"), "translationdomain")), "html", null, true);
                        echo "</a></li>
                                                            ";
                    }
                    // line 104
                    echo "                                                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['admin'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 105
                echo "                                                    </ul>
                                                </li>
                                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['group'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 108
            echo "                                        ";
        }
        // line 109
        echo "                                    ";
    }

    // line 110
    public function block_top_bar_after_nav($context, array $blocks = array())
    {
        echo " ";
    }

    // line 120
    public function block_notice($context, array $blocks = array())
    {
        // line 121
        echo "                ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(array(0 => "success", 1 => "error", 2 => "info", 3 => "warning"));
        foreach ($context['_seq'] as $context["_key"] => $context["notice_level"]) {
            // line 122
            echo "                    ";
            $context["session_var"] = ("sonata_flash_" . $this->getContext($context, "notice_level"));
            // line 123
            echo "                    ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "flashbag"), "get", array(0 => $this->getContext($context, "session_var")), "method"));
            foreach ($context['_seq'] as $context["_key"] => $context["flash"]) {
                // line 124
                echo "                        <div class=\"alert ";
                echo twig_escape_filter($this->env, ("alert-" . $this->getContext($context, "notice_level")), "html", null, true);
                echo "\">
                            ";
                // line 125
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getContext($context, "flash"), array(), "SonataAdminBundle"), "html", null, true);
                echo "
                        </div>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flash'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 128
            echo "                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['notice_level'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 129
        echo "            ";
    }

    // line 160
    public function block_actions($context, array $blocks = array())
    {
    }

    // line 172
    public function block_sonata_admin_content($context, array $blocks = array())
    {
        // line 173
        echo "
                        ";
        // line 174
        if ((!twig_test_empty($this->getContext($context, "_preview")))) {
            // line 175
            echo "                            <div class=\"sonata-ba-preview\">";
            echo $this->getContext($context, "_preview");
            echo "</div>
                        ";
        }
        // line 177
        echo "
                        ";
        // line 178
        if ((!twig_test_empty($this->getContext($context, "_content")))) {
            // line 179
            echo "                            <div class=\"sonata-ba-content\">";
            echo $this->getContext($context, "_content");
            echo "</div>
                        ";
        }
        // line 181
        echo "
                        ";
        // line 182
        if ((!twig_test_empty($this->getContext($context, "_show")))) {
            // line 183
            echo "                            <div class=\"sonata-ba-show\">";
            echo $this->getContext($context, "_show");
            echo "</div>
                        ";
        }
        // line 185
        echo "
                        ";
        // line 186
        if ((!twig_test_empty($this->getContext($context, "_form")))) {
            // line 187
            echo "                            <div class=\"sonata-ba-form\">";
            echo $this->getContext($context, "_form");
            echo "</div>
                        ";
        }
        // line 189
        echo "
                        ";
        // line 190
        if (((!twig_test_empty($this->getContext($context, "_list_table"))) || (!twig_test_empty($this->getContext($context, "_list_filters"))))) {
            // line 191
            echo "                            <div class=\"row-fluid\">
                                <div class=\"sonata-ba-list span10\">
                                    ";
            // line 193
            echo $this->getContext($context, "_list_table");
            echo "
                                </div>
                                <div class=\"sonata-ba-filter span2\">
                                    ";
            // line 196
            echo $this->getContext($context, "_list_filters");
            echo "
                                </div>
                            </div>
                        ";
        }
        // line 200
        echo "
                    ";
    }

    // line 205
    public function block_footer($context, array $blocks = array())
    {
        // line 206
        echo "                <div class=\"row-fluid\">
                    <div class=\"span2 offset10 pull-right\">
                        <span class=\"label\"><a href=\"http://sonata-project.org\" rel=\"noreferrer\" style=\"text-decoration: none; color: black\">Sonata Project</a></span>
                    </div>
                </div>
            ";
    }

    public function getTemplateName()
    {
        return "SonataAdminBundle::standard_layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  621 => 206,  618 => 205,  613 => 200,  606 => 196,  600 => 193,  596 => 191,  594 => 190,  591 => 189,  585 => 187,  583 => 186,  580 => 185,  574 => 183,  572 => 182,  569 => 181,  563 => 179,  561 => 178,  558 => 177,  552 => 175,  550 => 174,  547 => 173,  544 => 172,  539 => 160,  535 => 129,  529 => 128,  520 => 125,  515 => 124,  510 => 123,  507 => 122,  502 => 121,  499 => 120,  493 => 110,  489 => 109,  486 => 108,  478 => 105,  472 => 104,  464 => 102,  461 => 101,  457 => 100,  452 => 98,  449 => 97,  444 => 96,  441 => 95,  438 => 94,  432 => 93,  426 => 111,  423 => 110,  420 => 94,  418 => 93,  414 => 91,  411 => 90,  404 => 86,  398 => 85,  393 => 84,  390 => 83,  384 => 47,  380 => 46,  375 => 44,  370 => 42,  366 => 41,  361 => 40,  358 => 39,  352 => 36,  348 => 35,  342 => 32,  338 => 31,  333 => 29,  330 => 28,  327 => 27,  320 => 212,  318 => 205,  313 => 202,  311 => 172,  307 => 171,  304 => 170,  298 => 167,  295 => 166,  293 => 165,  287 => 161,  285 => 160,  280 => 157,  276 => 155,  270 => 153,  267 => 152,  264 => 151,  250 => 150,  244 => 148,  239 => 145,  233 => 143,  225 => 141,  223 => 140,  220 => 139,  217 => 138,  199 => 137,  196 => 136,  194 => 135,  191 => 134,  189 => 133,  184 => 130,  182 => 120,  175 => 115,  172 => 114,  170 => 90,  167 => 89,  165 => 83,  158 => 81,  156 => 80,  144 => 70,  138 => 68,  134 => 66,  131 => 65,  128 => 64,  111 => 62,  107 => 60,  104 => 59,  87 => 58,  84 => 57,  81 => 56,  75 => 54,  68 => 51,  64 => 49,  62 => 39,  57 => 27,  48 => 20,  44 => 18,  40 => 16,  38 => 15,  36 => 14,  32 => 12,  30 => 11,  88 => 31,  82 => 30,  76 => 28,  73 => 53,  69 => 26,  65 => 24,  59 => 38,  53 => 21,  50 => 20,  46 => 19,  42 => 17,  39 => 16,  34 => 13,  28 => 14,);
    }
}
