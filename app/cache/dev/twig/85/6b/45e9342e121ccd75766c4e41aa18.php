<?php

/* SonataAdminBundle:CRUD:base_list.html.twig */
class __TwigTemplate_856b45e9342e121ccd75766c4e41aa18 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'actions' => array($this, 'block_actions'),
            'side_menu' => array($this, 'block_side_menu'),
            'list_table' => array($this, 'block_list_table'),
            'table_header' => array($this, 'block_table_header'),
            'table_body' => array($this, 'block_table_body'),
            'table_footer' => array($this, 'block_table_footer'),
            'batch' => array($this, 'block_batch'),
            'batch_javascript' => array($this, 'block_batch_javascript'),
            'batch_actions' => array($this, 'block_batch_actions'),
            'list_filters' => array($this, 'block_list_filters'),
        );
    }

    protected function doGetParent(array $context)
    {
        return $this->env->resolveTemplate($this->getContext($context, "base_template"));
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 14
    public function block_actions($context, array $blocks = array())
    {
        // line 15
        echo "    <div class=\"sonata-actions btn-group\">
        ";
        // line 16
        $this->env->loadTemplate("SonataAdminBundle:Core:create_button.html.twig")->display($context);
        // line 17
        echo "    </div>
";
    }

    // line 20
    public function block_side_menu($context, array $blocks = array())
    {
        echo $this->env->getExtension('knp_menu')->render($this->getAttribute($this->getContext($context, "admin"), "sidemenu", array(0 => $this->getContext($context, "action")), "method"), array("currentClass" => "active"), "list");
    }

    // line 22
    public function block_list_table($context, array $blocks = array())
    {
        // line 23
        echo "    ";
        $context["batchactions"] = $this->getAttribute($this->getContext($context, "admin"), "batchactions");
        // line 24
        echo "    ";
        if ((twig_length_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "admin"), "datagrid"), "results")) > 0)) {
            // line 25
            echo "        ";
            if ($this->getAttribute($this->getContext($context, "admin"), "hasRoute", array(0 => "batch"), "method")) {
                // line 26
                echo "        <form action=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "admin"), "generateUrl", array(0 => "batch", 1 => array("filter" => $this->getAttribute($this->getContext($context, "admin"), "filterParameters"))), "method"), "html", null, true);
                echo "\" method=\"POST\" >
        ";
            }
            // line 28
            echo "            <table class=\"table table-bordered table-striped\">
                ";
            // line 29
            $this->displayBlock('table_header', $context, $blocks);
            // line 63
            echo "
                ";
            // line 64
            $this->displayBlock('table_body', $context, $blocks);
            // line 73
            echo "
                ";
            // line 74
            $this->displayBlock('table_footer', $context, $blocks);
            // line 176
            echo "            </table>
        ";
            // line 177
            if ($this->getAttribute($this->getContext($context, "admin"), "hasRoute", array(0 => "batch"), "method")) {
                // line 178
                echo "        </form>
        ";
            }
            // line 180
            echo "    ";
        } else {
            // line 181
            echo "        <p class=\"notice\">
            ";
            // line 182
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("no_result", array(), "SonataAdminBundle"), "html", null, true);
            echo "
        </p>
    ";
        }
    }

    // line 29
    public function block_table_header($context, array $blocks = array())
    {
        // line 30
        echo "                    <thead>
                        <tr class=\"sonata-ba-list-field-header\">
                            ";
        // line 32
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getContext($context, "admin"), "list"), "elements"));
        foreach ($context['_seq'] as $context["_key"] => $context["field_description"]) {
            // line 33
            echo "                                ";
            if ((($this->getAttribute($this->getContext($context, "admin"), "hasRoute", array(0 => "batch"), "method") && ($this->getAttribute($this->getContext($context, "field_description"), "getOption", array(0 => "code"), "method") == "_batch")) && (twig_length_filter($this->env, $this->getContext($context, "batchactions")) > 0))) {
                // line 34
                echo "                                    <th class=\"sonata-ba-list-field-header sonata-ba-list-field-header-batch\">
                                      <input type=\"checkbox\" id=\"list_batch_checkbox\" />
                                    </th>
                                ";
            } elseif (($this->getAttribute($this->getContext($context, "field_description"), "getOption", array(0 => "code"), "method") == "_select")) {
                // line 38
                echo "                                    <th class=\"sonata-ba-list-field-header sonata-ba-list-field-header-select\"></th>
                                ";
            } elseif ((($this->getAttribute($this->getContext($context, "field_description"), "name") == "_action") && $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "isXmlHttpRequest"))) {
                // line 40
                echo "                                        ";
                // line 41
                echo "                                ";
            } else {
                // line 42
                echo "                                    ";
                $context["sortable"] = false;
                // line 43
                echo "                                    ";
                if (($this->getAttribute($this->getAttribute($this->getContext($context, "field_description", true), "options", array(), "any", false, true), "sortable", array(), "any", true, true) && $this->getAttribute($this->getAttribute($this->getContext($context, "field_description"), "options"), "sortable"))) {
                    // line 44
                    echo "                                        ";
                    $context["sortable"] = true;
                    // line 45
                    echo "                                        ";
                    $context["current"] = ($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "admin"), "datagrid"), "values"), "_sort_by") == $this->getContext($context, "field_description"));
                    // line 46
                    echo "                                        ";
                    $context["sort_parameters"] = $this->getAttribute($this->getAttribute($this->getContext($context, "admin"), "modelmanager"), "sortparameters", array(0 => $this->getContext($context, "field_description"), 1 => $this->getAttribute($this->getContext($context, "admin"), "datagrid")), "method");
                    // line 47
                    echo "                                        ";
                    $context["sort_active_class"] = (($this->getContext($context, "current")) ? ("sonata-ba-list-field-order-active") : (""));
                    // line 48
                    echo "                                        ";
                    $context["sort_by"] = (($this->getContext($context, "current")) ? ($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "admin"), "datagrid"), "values"), "_sort_order")) : ($this->getAttribute($this->getAttribute($this->getContext($context, "field_description"), "options"), "_sort_order")));
                    // line 49
                    echo "                                    ";
                }
                // line 50
                echo "
                                    ";
                // line 51
                ob_start();
                // line 52
                echo "                                        <th class=\"sonata-ba-list-field-header-";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "field_description"), "type"), "html", null, true);
                echo " ";
                if ($this->getContext($context, "sortable")) {
                    echo " sonata-ba-list-field-header-order-";
                    echo twig_escape_filter($this->env, twig_lower_filter($this->env, $this->getContext($context, "sort_by")), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getContext($context, "sort_active_class"), "html", null, true);
                }
                echo "\">
                                            ";
                // line 53
                if ($this->getContext($context, "sortable")) {
                    echo "<a href=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "admin"), "generateUrl", array(0 => "list", 1 => $this->getContext($context, "sort_parameters")), "method"), "html", null, true);
                    echo "\">";
                }
                // line 54
                echo "                                            ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "admin"), "trans", array(0 => $this->getAttribute($this->getContext($context, "field_description"), "label")), "method"), "html", null, true);
                echo "
                                            ";
                // line 55
                if ($this->getContext($context, "sortable")) {
                    echo "</a>";
                }
                // line 56
                echo "                                        </th>
                                    ";
                echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
                // line 58
                echo "                                ";
            }
            // line 59
            echo "                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['field_description'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 60
        echo "                        </tr>
                    </thead>
                ";
    }

    // line 64
    public function block_table_body($context, array $blocks = array())
    {
        // line 65
        echo "                    <tbody>
                        ";
        // line 66
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getContext($context, "admin"), "datagrid"), "results"));
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
        foreach ($context['_seq'] as $context["_key"] => $context["object"]) {
            // line 67
            echo "                            <tr>
                                ";
            // line 68
            $template = $this->env->resolveTemplate($this->getAttribute($this->getContext($context, "admin"), "getTemplate", array(0 => "inner_list_row"), "method"));
            $template->display($context);
            // line 69
            echo "                            </tr>
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['object'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 71
        echo "                    </tbody>
                ";
    }

    // line 74
    public function block_table_footer($context, array $blocks = array())
    {
        // line 75
        echo "                    <tr>
                        <th colspan=\"";
        // line 76
        echo twig_escape_filter($this->env, (twig_length_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "admin"), "list"), "elements")) - (($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "isXmlHttpRequest")) ? (($this->getAttribute($this->getAttribute($this->getContext($context, "admin"), "list"), "has", array(0 => "_action"), "method") + $this->getAttribute($this->getAttribute($this->getContext($context, "admin"), "list"), "has", array(0 => "batch"), "method"))) : (0))), "html", null, true);
        echo "\">
                            <div class=\"form-inline\">
                                ";
        // line 78
        if ((!$this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "isXmlHttpRequest"))) {
            // line 79
            echo "                                    ";
            if (($this->getAttribute($this->getContext($context, "admin"), "hasRoute", array(0 => "batch"), "method") && (twig_length_filter($this->env, $this->getContext($context, "batchactions")) > 0))) {
                // line 80
                echo "                                        ";
                $this->displayBlock('batch', $context, $blocks);
                // line 107
                echo "
                                        <input type=\"submit\" class=\"btn btn-small btn-primary\" value=\"";
                // line 108
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("btn_batch", array(), "SonataAdminBundle"), "html", null, true);
                echo "\"/>
                                    ";
            }
            // line 110
            echo "
                                    <div class=\"pull-right\">
                                        ";
            // line 112
            if ((($this->getAttribute($this->getContext($context, "admin"), "hasRoute", array(0 => "export"), "method") && $this->getAttribute($this->getContext($context, "admin"), "isGranted", array(0 => "EXPORT"), "method")) && twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "admin"), "getExportFormats", array(), "method")))) {
                // line 113
                echo "                                            ";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("label_export_download", array(), "SonataAdminBundle"), "html", null, true);
                echo "
                                            ";
                // line 114
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "admin"), "getExportFormats", array(), "method"));
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
                foreach ($context['_seq'] as $context["_key"] => $context["format"]) {
                    // line 115
                    echo "                                                <a href=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "admin"), "generateUrl", array(0 => "export", 1 => ($this->getAttribute($this->getAttribute($this->getContext($context, "admin"), "modelmanager"), "paginationparameters", array(0 => $this->getAttribute($this->getContext($context, "admin"), "datagrid"), 1 => 0), "method") + array("format" => $this->getContext($context, "format")))), "method"), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getContext($context, "format"), "html", null, true);
                    echo "</a>";
                    if ((!$this->getAttribute($this->getContext($context, "loop"), "last"))) {
                        echo ",";
                    }
                    // line 116
                    echo "                                            ";
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
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['format'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 117
                echo "
                                            &nbsp;-&nbsp;
                                        ";
            }
            // line 120
            echo "
                                        ";
            // line 121
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "admin"), "datagrid"), "pager"), "page"), "html", null, true);
            echo " / ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "admin"), "datagrid"), "pager"), "lastpage"), "html", null, true);
            echo "

                                        &nbsp;-&nbsp;

                                        ";
            // line 125
            echo $this->env->getExtension('translator')->getTranslator()->transChoice("list_results_count", $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "admin"), "datagrid"), "pager"), "nbresults"), array("%count%" => $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "admin"), "datagrid"), "pager"), "nbresults")), "SonataAdminBundle");
            // line 126
            echo "
                                        &nbsp;-&nbsp;
                                        <label class=\"control-label\" for=\"";
            // line 128
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "admin"), "uniqid"), "html", null, true);
            echo "_per_page\">";
            echo $this->env->getExtension('translator')->getTranslator()->trans("label_per_page", array(), "SonataAdminBundle");
            echo "</label>
                                        <select class=\"per-page small\" id=\"";
            // line 129
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "admin"), "uniqid"), "html", null, true);
            echo "_per_page\" style=\"width: auto; height: auto\">
                                            ";
            // line 130
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "admin"), "getperpageoptions"));
            foreach ($context['_seq'] as $context["_key"] => $context["per_page"]) {
                // line 131
                echo "                                                <option ";
                if (($this->getContext($context, "per_page") == $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "admin"), "datagrid"), "pager"), "maxperpage"))) {
                    echo "selected=\"selected\"";
                }
                echo " value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "admin"), "generateUrl", array(0 => "list", 1 => array("filter" => twig_array_merge($this->getAttribute($this->getAttribute($this->getContext($context, "admin"), "datagrid"), "values"), array("_per_page" => $this->getContext($context, "per_page"))))), "method"), "html", null, true);
                echo "\">
                                                    ";
                // line 132
                echo twig_escape_filter($this->env, $this->getContext($context, "per_page"), "html", null, true);
                echo "
                                                </option>
                                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['per_page'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 135
            echo "                                        </select>
                                    </div>
                                ";
        }
        // line 138
        echo "                            </div>
                        </th>
                    </tr>
                    ";
        // line 141
        if ($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "admin"), "datagrid"), "pager"), "haveToPaginate", array(), "method")) {
            // line 142
            echo "                        <tr>
                            <td colspan=\"";
            // line 143
            echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "admin"), "list"), "elements")), "html", null, true);
            echo "\">
                                <div class=\"pagination pagination-centered\">
                                    <ul>
                                        ";
            // line 146
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "admin"), "datagrid"), "pager"), "page") > 2)) {
                // line 147
                echo "                                            <li><a href=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "admin"), "generateUrl", array(0 => "list", 1 => $this->getAttribute($this->getAttribute($this->getContext($context, "admin"), "modelmanager"), "paginationparameters", array(0 => $this->getAttribute($this->getContext($context, "admin"), "datagrid"), 1 => 1), "method")), "method"), "html", null, true);
                echo "\" title=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("link_first_pager", array(), "SonataAdminBundle"), "html", null, true);
                echo "\">&laquo;</a></li>
                                        ";
            }
            // line 149
            echo "
                                        ";
            // line 150
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "admin"), "datagrid"), "pager"), "page") != $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "admin"), "datagrid"), "pager"), "previouspage"))) {
                // line 151
                echo "                                            <li><a href=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "admin"), "generateUrl", array(0 => "list", 1 => $this->getAttribute($this->getAttribute($this->getContext($context, "admin"), "modelmanager"), "paginationparameters", array(0 => $this->getAttribute($this->getContext($context, "admin"), "datagrid"), 1 => $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "admin"), "datagrid"), "pager"), "previouspage")), "method")), "method"), "html", null, true);
                echo "\" title=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("link_previous_pager", array(), "SonataAdminBundle"), "html", null, true);
                echo "\">&lsaquo;</a></li>
                                        ";
            }
            // line 153
            echo "
                                        ";
            // line 155
            echo "                                        ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "admin"), "datagrid"), "pager"), "getLinks", array(), "method"));
            foreach ($context['_seq'] as $context["_key"] => $context["page"]) {
                // line 156
                echo "                                            ";
                if (($this->getContext($context, "page") == $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "admin"), "datagrid"), "pager"), "page"))) {
                    // line 157
                    echo "                                                <li class=\"active\"><a href=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "admin"), "generateUrl", array(0 => "list", 1 => $this->getAttribute($this->getAttribute($this->getContext($context, "admin"), "modelmanager"), "paginationparameters", array(0 => $this->getAttribute($this->getContext($context, "admin"), "datagrid"), 1 => $this->getContext($context, "page")), "method")), "method"), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getContext($context, "page"), "html", null, true);
                    echo "</a></li>
                                            ";
                } else {
                    // line 159
                    echo "                                                <li><a href=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "admin"), "generateUrl", array(0 => "list", 1 => $this->getAttribute($this->getAttribute($this->getContext($context, "admin"), "modelmanager"), "paginationparameters", array(0 => $this->getAttribute($this->getContext($context, "admin"), "datagrid"), 1 => $this->getContext($context, "page")), "method")), "method"), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getContext($context, "page"), "html", null, true);
                    echo "</a></li>
                                            ";
                }
                // line 161
                echo "                                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['page'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 162
            echo "
                                        ";
            // line 163
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "admin"), "datagrid"), "pager"), "page") != $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "admin"), "datagrid"), "pager"), "nextpage"))) {
                // line 164
                echo "                                            <li><a href=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "admin"), "generateUrl", array(0 => "list", 1 => $this->getAttribute($this->getAttribute($this->getContext($context, "admin"), "modelmanager"), "paginationparameters", array(0 => $this->getAttribute($this->getContext($context, "admin"), "datagrid"), 1 => $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "admin"), "datagrid"), "pager"), "nextpage")), "method")), "method"), "html", null, true);
                echo "\" title=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("link_next_pager", array(), "SonataAdminBundle"), "html", null, true);
                echo "\">&rsaquo;</a></li>
                                        ";
            }
            // line 166
            echo "
                                        ";
            // line 167
            if ((($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "admin"), "datagrid"), "pager"), "page") != $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "admin"), "datagrid"), "pager"), "lastpage")) && ($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "admin"), "datagrid"), "pager"), "lastpage") != $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "admin"), "datagrid"), "pager"), "nextpage")))) {
                // line 168
                echo "                                            <li><a href=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "admin"), "generateUrl", array(0 => "list", 1 => $this->getAttribute($this->getAttribute($this->getContext($context, "admin"), "modelmanager"), "paginationparameters", array(0 => $this->getAttribute($this->getContext($context, "admin"), "datagrid"), 1 => $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "admin"), "datagrid"), "pager"), "lastpage")), "method")), "method"), "html", null, true);
                echo "\" title=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("link_last_pager", array(), "SonataAdminBundle"), "html", null, true);
                echo "\">&raquo;</a></li>
                                        ";
            }
            // line 170
            echo "                                    </ul>
                                </div>
                            </td>
                        </tr>
                    ";
        }
        // line 175
        echo "                ";
    }

    // line 80
    public function block_batch($context, array $blocks = array())
    {
        // line 81
        echo "                                            <script type=\"text/javascript\">
                                                ";
        // line 82
        $this->displayBlock('batch_javascript', $context, $blocks);
        // line 92
        echo "                                            </script>

                                            ";
        // line 94
        $this->displayBlock('batch_actions', $context, $blocks);
        // line 106
        echo "                                        ";
    }

    // line 82
    public function block_batch_javascript($context, array $blocks = array())
    {
        // line 83
        echo "                                                    jQuery(document).ready(function (\$) {
                                                        \$('#list_batch_checkbox').click(function () {
                                                            \$(this).closest('table').find(\"td input[type='checkbox']\").attr('checked', \$(this).is(':checked')).parent().parent().toggleClass('sonata-ba-list-row-selected', \$(this).is(':checked'));
                                                        });
                                                        \$(\"td.sonata-ba-list-field-batch input[type='checkbox']\").change(function () {
                                                            \$(this).parent().parent().toggleClass('sonata-ba-list-row-selected', \$(this).is(':checked'));
                                                        });
                                                    });
                                                ";
    }

    // line 94
    public function block_batch_actions($context, array $blocks = array())
    {
        // line 95
        echo "                                                <label class=\"checkbox\" for=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "admin"), "uniqid"), "html", null, true);
        echo "_all_elements\">
                                                    <input type=\"checkbox\" name=\"all_elements\" id=\"";
        // line 96
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "admin"), "uniqid"), "html", null, true);
        echo "_all_elements\"/>
                                                    ";
        // line 97
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("all_elements", array(), "SonataAdminBundle"), "html", null, true);
        echo "
                                                </label>

                                                <select name=\"action\" style=\"width: auto; height: auto\">
                                                    ";
        // line 101
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "batchactions"));
        foreach ($context['_seq'] as $context["action"] => $context["options"]) {
            // line 102
            echo "                                                        <option value=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "action"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "options"), "label"), "html", null, true);
            echo "</option>
                                                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['action'], $context['options'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 104
        echo "                                                </select>
                                            ";
    }

    // line 187
    public function block_list_filters($context, array $blocks = array())
    {
        // line 188
        echo "    ";
        if ($this->getAttribute($this->getAttribute($this->getContext($context, "admin"), "datagrid"), "filters")) {
            // line 189
            echo "        <form class=\"sonata-filter-form ";
            echo ((($this->getAttribute($this->getContext($context, "admin"), "isChild") && (1 == twig_length_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "admin"), "datagrid"), "filters"))))) ? ("hide") : (""));
            echo "\" action=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "admin"), "generateUrl", array(0 => "list"), "method"), "html", null, true);
            echo "\" method=\"GET\">
            <fieldset class=\"filter_legend\">
                <legend class=\"filter_legend ";
            // line 191
            echo (($this->getAttribute($this->getAttribute($this->getContext($context, "admin"), "datagrid"), "hasActiveFilters")) ? ("active") : ("inactive"));
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("label_filters", array(), "SonataAdminBundle"), "html", null, true);
            echo "</legend>

                <div class=\"filter_container ";
            // line 193
            echo (($this->getAttribute($this->getAttribute($this->getContext($context, "admin"), "datagrid"), "hasActiveFilters")) ? ("active") : ("inactive"));
            echo "\">
                    <div>
                        ";
            // line 195
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getContext($context, "admin"), "datagrid"), "filters"));
            foreach ($context['_seq'] as $context["_key"] => $context["filter"]) {
                // line 196
                echo "                            <div class=\"clearfix\">
                                <label for=\"";
                // line 197
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "form"), "children"), $this->getAttribute($this->getContext($context, "filter"), "formName"), array(), "array"), "children"), "value", array(), "array"), "vars"), "id"), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "admin"), "trans", array(0 => $this->getAttribute($this->getContext($context, "filter"), "label")), "method"), "html", null, true);
                echo "</label>
                                ";
                // line 198
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "form"), "children"), $this->getAttribute($this->getContext($context, "filter"), "formName"), array(), "array"), "children"), "type", array(), "array"), 'widget', array("attr" => array("class" => "span8 sonata-filter-option")));
                echo "
                                ";
                // line 199
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "form"), "children"), $this->getAttribute($this->getContext($context, "filter"), "formName"), array(), "array"), "children"), "value", array(), "array"), 'widget', array("attr" => array("class" => "span8")));
                echo "
                            </div>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['filter'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 202
            echo "                    </div>

                    <input type=\"hidden\" name=\"filter[_page]\" id=\"filter__page\" value=\"1\" />

                    ";
            // line 206
            $context["foo"] = $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "form"), "children"), "_page", array(), "array"), "setRendered", array(), "method");
            // line 207
            echo "                    ";
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'rest');
            echo "

                    <input type=\"submit\" class=\"btn btn-primary\" value=\"";
            // line 209
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("btn_filter", array(), "SonataAdminBundle"), "html", null, true);
            echo "\" />

                    <a class=\"btn\" href=\"";
            // line 211
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "admin"), "generateUrl", array(0 => "list", 1 => array("filters" => "reset")), "method"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("link_reset_filter", array(), "SonataAdminBundle"), "html", null, true);
            echo "</a>
                </div>
            </fieldset>
        </form>
    ";
        }
    }

    public function getTemplateName()
    {
        return "SonataAdminBundle:CRUD:base_list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  653 => 211,  648 => 209,  642 => 207,  640 => 206,  634 => 202,  625 => 199,  621 => 198,  615 => 197,  612 => 196,  608 => 195,  603 => 193,  596 => 191,  588 => 189,  585 => 188,  582 => 187,  577 => 104,  566 => 102,  562 => 101,  555 => 97,  551 => 96,  546 => 95,  543 => 94,  531 => 83,  528 => 82,  524 => 106,  522 => 94,  518 => 92,  516 => 82,  513 => 81,  510 => 80,  506 => 175,  499 => 170,  491 => 168,  489 => 167,  486 => 166,  478 => 164,  476 => 163,  473 => 162,  467 => 161,  459 => 159,  451 => 157,  448 => 156,  443 => 155,  440 => 153,  432 => 151,  430 => 150,  427 => 149,  419 => 147,  417 => 146,  411 => 143,  408 => 142,  406 => 141,  401 => 138,  396 => 135,  387 => 132,  378 => 131,  374 => 130,  370 => 129,  364 => 128,  360 => 126,  358 => 125,  349 => 121,  346 => 120,  341 => 117,  327 => 116,  318 => 115,  301 => 114,  296 => 113,  294 => 112,  290 => 110,  285 => 108,  282 => 107,  279 => 80,  276 => 79,  274 => 78,  269 => 76,  266 => 75,  263 => 74,  258 => 71,  243 => 69,  240 => 68,  237 => 67,  220 => 66,  217 => 65,  214 => 64,  208 => 60,  202 => 59,  199 => 58,  195 => 56,  191 => 55,  186 => 54,  180 => 53,  168 => 52,  166 => 51,  163 => 50,  160 => 49,  157 => 48,  154 => 47,  151 => 46,  148 => 45,  145 => 44,  142 => 43,  139 => 42,  136 => 41,  134 => 40,  130 => 38,  124 => 34,  121 => 33,  117 => 32,  113 => 30,  110 => 29,  102 => 182,  99 => 181,  96 => 180,  92 => 178,  90 => 177,  87 => 176,  85 => 74,  82 => 73,  80 => 64,  77 => 63,  75 => 29,  72 => 28,  66 => 26,  63 => 25,  60 => 24,  57 => 23,  54 => 22,  48 => 20,  43 => 17,  41 => 16,  38 => 15,  35 => 14,);
    }
}
