<?php

/* SonataAdminBundle:Block:block_admin_list.html.twig */
class __TwigTemplate_0da923f66f47d6535134b89f6479534f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("SonataBlockBundle:Block:block_base.html.twig");

        $this->blocks = array(
            'block' => array($this, 'block_block'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "SonataBlockBundle:Block:block_base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 14
    public function block_block($context, array $blocks = array())
    {
        // line 15
        echo "    ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "groups"));
        foreach ($context['_seq'] as $context["_key"] => $context["group"]) {
            // line 16
            echo "        <table class=\"table table-bordered table-striped sonata-ba-list\">
            <thead>
                <tr>
                    <th colspan=\"3\">";
            // line 19
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getAttribute($this->getContext($context, "group"), "label"), array(), $this->getAttribute($this->getContext($context, "group"), "label_catalogue")), "html", null, true);
            echo "</th>
                </tr>
            </thead>

            <tbody>
                ";
            // line 24
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "group"), "items"));
            foreach ($context['_seq'] as $context["_key"] => $context["admin"]) {
                // line 25
                echo "                    ";
                if ((($this->getAttribute($this->getContext($context, "admin"), "hasroute", array(0 => "create"), "method") && $this->getAttribute($this->getContext($context, "admin"), "isGranted", array(0 => "CREATE"), "method")) || ($this->getAttribute($this->getContext($context, "admin"), "hasroute", array(0 => "list"), "method") && $this->getAttribute($this->getContext($context, "admin"), "isGranted", array(0 => "LIST"), "method")))) {
                    // line 26
                    echo "                        <tr>
                            <td class=\"sonata-ba-list-label\">";
                    // line 27
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getAttribute($this->getContext($context, "admin"), "label"), array(), $this->getAttribute($this->getContext($context, "admin"), "translationdomain")), "html", null, true);
                    echo "</td>
                            <td>
                                <div class=\"btn-group\">
                                    ";
                    // line 30
                    if (($this->getAttribute($this->getContext($context, "admin"), "hasroute", array(0 => "create"), "method") && $this->getAttribute($this->getContext($context, "admin"), "isGranted", array(0 => "CREATE"), "method"))) {
                        // line 31
                        echo "                                        ";
                        if (twig_test_empty($this->getAttribute($this->getContext($context, "admin"), "subClasses"))) {
                            // line 32
                            echo "                                            <a class=\"btn btn-small\" href=\"";
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "admin"), "generateUrl", array(0 => "create"), "method"), "html", null, true);
                            echo "\">
                                                <i class=\"icon-plus\"></i>
                                                ";
                            // line 34
                            echo $this->env->getExtension('translator')->getTranslator()->trans("link_add", array(), "SonataAdminBundle");
                            // line 35
                            echo "                                            </a>
                                        ";
                        } else {
                            // line 37
                            echo "                                            <a class=\"btn btn-small dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\">
                                                <i class=\"icon-plus\"></i>
                                                ";
                            // line 39
                            echo $this->env->getExtension('translator')->getTranslator()->trans("link_add", array(), "SonataAdminBundle");
                            // line 40
                            echo "                                                <span class=\"caret\"></span>
                                            </a>
                                            <ul class=\"dropdown-menu\">
                                                ";
                            // line 43
                            $context['_parent'] = (array) $context;
                            $context['_seq'] = twig_ensure_traversable(twig_get_array_keys_filter($this->getAttribute($this->getContext($context, "admin"), "subclasses")));
                            foreach ($context['_seq'] as $context["_key"] => $context["subclass"]) {
                                // line 44
                                echo "                                                <li>
                                                    <a href=\"";
                                // line 45
                                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "admin"), "generateUrl", array(0 => "create", 1 => array("subclass" => $this->getContext($context, "subclass"))), "method"), "html", null, true);
                                echo "\">";
                                echo twig_escape_filter($this->env, $this->getContext($context, "subclass"), "html", null, true);
                                echo "</a>
                                                </li>
                                                ";
                            }
                            $_parent = $context['_parent'];
                            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['subclass'], $context['_parent'], $context['loop']);
                            $context = array_intersect_key($context, $_parent) + $_parent;
                            // line 48
                            echo "                                            </ul>
                                        ";
                        }
                        // line 50
                        echo "                                    ";
                    }
                    // line 51
                    echo "                                    ";
                    if (($this->getAttribute($this->getContext($context, "admin"), "hasroute", array(0 => "list"), "method") && $this->getAttribute($this->getContext($context, "admin"), "isGranted", array(0 => "LIST"), "method"))) {
                        // line 52
                        echo "                                        <a class=\"btn btn-small\" href=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "admin"), "generateUrl", array(0 => "list"), "method"), "html", null, true);
                        echo "\">
                                            <i class=\"icon-list\"></i>
                                            ";
                        // line 54
                        echo $this->env->getExtension('translator')->getTranslator()->trans("link_list", array(), "SonataAdminBundle");
                        // line 55
                        echo "</a>
                                    ";
                    }
                    // line 57
                    echo "                                </div>
                            </td>
                        </tr>
                    ";
                }
                // line 61
                echo "                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['admin'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 62
            echo "            </tbody>
        </table>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['group'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "SonataAdminBundle:Block:block_admin_list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  145 => 62,  139 => 61,  133 => 57,  129 => 55,  127 => 54,  121 => 52,  118 => 51,  115 => 50,  100 => 45,  97 => 44,  93 => 43,  86 => 39,  78 => 35,  70 => 32,  67 => 31,  56 => 26,  49 => 24,  41 => 19,  31 => 15,  621 => 206,  618 => 205,  613 => 200,  606 => 196,  600 => 193,  596 => 191,  594 => 190,  591 => 189,  585 => 187,  583 => 186,  580 => 185,  574 => 183,  572 => 182,  569 => 181,  563 => 179,  561 => 178,  558 => 177,  552 => 175,  550 => 174,  547 => 173,  544 => 172,  539 => 160,  535 => 129,  529 => 128,  520 => 125,  515 => 124,  510 => 123,  507 => 122,  502 => 121,  499 => 120,  493 => 110,  489 => 109,  486 => 108,  478 => 105,  472 => 104,  464 => 102,  461 => 101,  457 => 100,  452 => 98,  449 => 97,  444 => 96,  441 => 95,  438 => 94,  432 => 93,  426 => 111,  423 => 110,  420 => 94,  418 => 93,  414 => 91,  411 => 90,  404 => 86,  398 => 85,  393 => 84,  390 => 83,  384 => 47,  380 => 46,  375 => 44,  370 => 42,  366 => 41,  361 => 40,  358 => 39,  352 => 36,  348 => 35,  342 => 32,  338 => 31,  333 => 29,  330 => 28,  327 => 27,  320 => 212,  318 => 205,  313 => 202,  311 => 172,  307 => 171,  304 => 170,  298 => 167,  295 => 166,  293 => 165,  287 => 161,  285 => 160,  280 => 157,  276 => 155,  270 => 153,  267 => 152,  264 => 151,  250 => 150,  244 => 148,  239 => 145,  233 => 143,  225 => 141,  223 => 140,  220 => 139,  217 => 138,  199 => 137,  196 => 136,  194 => 135,  191 => 134,  189 => 133,  184 => 130,  182 => 120,  175 => 115,  172 => 114,  170 => 90,  167 => 89,  165 => 83,  158 => 81,  156 => 80,  144 => 70,  138 => 68,  134 => 66,  131 => 65,  128 => 64,  111 => 48,  107 => 60,  104 => 59,  87 => 58,  84 => 57,  81 => 56,  75 => 54,  68 => 51,  64 => 49,  62 => 39,  57 => 27,  48 => 20,  44 => 18,  40 => 16,  38 => 15,  36 => 16,  32 => 12,  30 => 11,  88 => 40,  82 => 37,  76 => 34,  73 => 53,  69 => 26,  65 => 30,  59 => 27,  53 => 25,  50 => 20,  46 => 19,  42 => 17,  39 => 16,  34 => 13,  28 => 14,);
    }
}
