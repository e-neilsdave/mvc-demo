<?php

/* SonataAdminBundle:Form:silex_form_div_layout.html.twig */
class __TwigTemplate_f3c7ef6007d72eecd8b87563266a2743 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'choice_widget' => array($this, 'block_choice_widget'),
            'form_widget_simple' => array($this, 'block_form_widget_simple'),
            'form_label' => array($this, 'block_form_label'),
            'form_row' => array($this, 'block_form_row'),
            'form_errors' => array($this, 'block_form_errors'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        echo "
";
        // line 3
        $this->displayBlock('choice_widget', $context, $blocks);
        // line 31
        echo "
";
        // line 32
        $this->displayBlock('form_widget_simple', $context, $blocks);
        // line 38
        echo "
";
        // line 40
        echo "
";
        // line 41
        $this->displayBlock('form_label', $context, $blocks);
        // line 61
        echo "
";
        // line 63
        echo "
";
        // line 64
        $this->displayBlock('form_row', $context, $blocks);
        // line 75
        echo "
";
        // line 77
        echo "
";
        // line 78
        $this->displayBlock('form_errors', $context, $blocks);
    }

    // line 3
    public function block_choice_widget($context, array $blocks = array())
    {
        // line 4
        ob_start();
        // line 5
        echo "    ";
        if ($this->getContext($context, "expanded")) {
            // line 6
            echo "        <ul ";
            $this->displayBlock("widget_container_attributes", $context, $blocks);
            echo " class=\"inputs-list\">
        ";
            // line 7
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "form"));
            foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
                // line 8
                echo "            <li>
                ";
                // line 9
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "child"), 'label', array("in_list_checkbox" => true, "widget" => $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "child"), 'widget')));
                echo "
            </li>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 12
            echo "        </ul>
    ";
        } else {
            // line 14
            echo "    <select ";
            $this->displayBlock("widget_attributes", $context, $blocks);
            if ($this->getContext($context, "multiple")) {
                echo " multiple=\"multiple\"";
            }
            echo ">
        ";
            // line 15
            if ((!(null === $this->getContext($context, "empty_value")))) {
                // line 16
                echo "            <option value=\"\">";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getContext($context, "empty_value")), "html", null, true);
                echo "</option>
        ";
            }
            // line 18
            echo "        ";
            if ((twig_length_filter($this->env, $this->getContext($context, "preferred_choices")) > 0)) {
                // line 19
                echo "            ";
                $context["options"] = $this->getContext($context, "preferred_choices");
                // line 20
                echo "            ";
                $this->displayBlock("choice_widget_options", $context, $blocks);
                echo "
            ";
                // line 21
                if (((twig_length_filter($this->env, $this->getContext($context, "choices")) > 0) && (!(null === $this->getContext($context, "separator"))))) {
                    // line 22
                    echo "                <option disabled=\"disabled\">";
                    echo twig_escape_filter($this->env, $this->getContext($context, "separator"), "html", null, true);
                    echo "</option>
            ";
                }
                // line 24
                echo "        ";
            }
            // line 25
            echo "        ";
            $context["options"] = $this->getContext($context, "choices");
            // line 26
            echo "        ";
            $this->displayBlock("choice_widget_options", $context, $blocks);
            echo "
    </select>
    ";
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 32
    public function block_form_widget_simple($context, array $blocks = array())
    {
        // line 33
        ob_start();
        // line 34
        echo "    ";
        $context["type"] = ((array_key_exists("type", $context)) ? (_twig_default_filter($this->getContext($context, "type"), "text")) : ("text"));
        // line 35
        echo "    <input type=\"";
        echo twig_escape_filter($this->env, $this->getContext($context, "type"), "html", null, true);
        echo "\" ";
        $this->displayBlock("widget_attributes", $context, $blocks);
        echo " value=\"";
        echo twig_escape_filter($this->env, $this->getContext($context, "value"), "html", null, true);
        echo "\" />
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 41
    public function block_form_label($context, array $blocks = array())
    {
        // line 42
        ob_start();
        // line 43
        echo "    ";
        if ((!$this->getContext($context, "compound"))) {
            // line 44
            echo "        ";
            $context["attr"] = twig_array_merge($this->getContext($context, "attr"), array("for" => $this->getContext($context, "id")));
            // line 45
            echo "    ";
        }
        // line 46
        echo "    ";
        if ($this->getContext($context, "required")) {
            // line 47
            echo "        ";
            $context["attr"] = twig_array_merge($this->getContext($context, "attr"), array("class" => ((($this->getAttribute($this->getContext($context, "attr", true), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "attr", true), "class"), "")) : ("")) . " required")));
            // line 48
            echo "    ";
        }
        // line 49
        echo "    ";
        if (((array_key_exists("in_list_checkbox", $context) && $this->getContext($context, "in_list_checkbox")) && array_key_exists("widget", $context))) {
            // line 50
            echo "        <label";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "attr"));
            foreach ($context['_seq'] as $context["attrname"] => $context["attrvalue"]) {
                echo " ";
                echo twig_escape_filter($this->env, $this->getContext($context, "attrname"), "html", null, true);
                echo "=\"";
                echo twig_escape_filter($this->env, $this->getContext($context, "attrvalue"), "html", null, true);
                echo "\"";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['attrname'], $context['attrvalue'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            echo ">
            ";
            // line 51
            echo $this->getContext($context, "widget");
            echo "
            <span>
                ";
            // line 53
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getContext($context, "label")), "html", null, true);
            echo "
            </span>
        </label>
    ";
        } else {
            // line 57
            echo "        <label";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "attr"));
            foreach ($context['_seq'] as $context["attrname"] => $context["attrvalue"]) {
                echo " ";
                echo twig_escape_filter($this->env, $this->getContext($context, "attrname"), "html", null, true);
                echo "=\"";
                echo twig_escape_filter($this->env, $this->getContext($context, "attrvalue"), "html", null, true);
                echo "\"";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['attrname'], $context['attrvalue'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            echo ">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getContext($context, "label")), "html", null, true);
            echo "</label>
    ";
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 64
    public function block_form_row($context, array $blocks = array())
    {
        // line 65
        ob_start();
        // line 66
        echo "    <div class=\"control-group ";
        echo (((0 < twig_length_filter($this->env, $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'errors')))) ? ("error") : (""));
        echo " \">
        ";
        // line 67
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'label', (twig_test_empty($_label_ = ((array_key_exists("label", $context)) ? (_twig_default_filter($this->getContext($context, "label"), null)) : (null))) ? array() : array("label" => $_label_)));
        echo "
        <div class=\"controls\">
            ";
        // line 69
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'widget');
        echo "
            ";
        // line 70
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'errors');
        echo "
        </div>
    </div>
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 78
    public function block_form_errors($context, array $blocks = array())
    {
        // line 79
        ob_start();
        // line 80
        echo "    ";
        if ((twig_length_filter($this->env, $this->getContext($context, "errors")) > 0)) {
            // line 81
            echo "        ";
            if (((!$this->getAttribute($this->getContext($context, "form"), "parent")) || twig_in_filter("repeated", $this->getAttribute($this->getAttribute($this->getContext($context, "form"), "vars"), "block_prefixes", array(), "array")))) {
                // line 82
                echo "            <div class=\"control-group error\">
        ";
            }
            // line 84
            echo "        <span class=\"help-inline\">
            ";
            // line 85
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "errors"));
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
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 86
                echo "                ";
                if ($this->getAttribute($this->getContext($context, "loop"), "first")) {
                    // line 87
                    echo "                    ";
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getAttribute($this->getContext($context, "error"), "messageTemplate"), $this->getAttribute($this->getContext($context, "error"), "messageParameters"), "validators"), "html", null, true);
                    echo "
                ";
                }
                // line 89
                echo "            ";
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 90
            echo "        </span>
        ";
            // line 91
            if (((!$this->getAttribute($this->getContext($context, "form"), "parent")) || twig_in_filter("repeated", $this->getAttribute($this->getAttribute($this->getContext($context, "form"), "vars"), "block_prefixes", array(), "array")))) {
                // line 92
                echo "            </div>
        ";
            }
            // line 94
            echo "    ";
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "SonataAdminBundle:Form:silex_form_div_layout.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  335 => 94,  331 => 92,  329 => 91,  326 => 90,  312 => 89,  306 => 87,  303 => 86,  286 => 85,  283 => 84,  273 => 80,  271 => 79,  268 => 78,  259 => 70,  255 => 69,  250 => 67,  245 => 66,  218 => 57,  211 => 53,  206 => 51,  190 => 50,  187 => 49,  184 => 48,  181 => 47,  178 => 46,  175 => 45,  172 => 44,  169 => 43,  167 => 42,  164 => 41,  152 => 35,  149 => 34,  147 => 33,  144 => 32,  131 => 25,  128 => 24,  122 => 22,  120 => 21,  115 => 20,  112 => 19,  109 => 18,  103 => 16,  101 => 15,  93 => 14,  89 => 12,  73 => 7,  68 => 6,  65 => 5,  56 => 78,  53 => 77,  50 => 75,  45 => 63,  42 => 61,  40 => 41,  27 => 3,  30 => 5,  32 => 32,  51 => 17,  69 => 34,  67 => 33,  64 => 31,  62 => 30,  59 => 29,  36 => 18,  33 => 17,  24 => 2,  52 => 25,  47 => 16,  37 => 40,  23 => 12,  20 => 11,  34 => 38,  31 => 16,  29 => 31,  26 => 4,  22 => 2,  19 => 1,  653 => 211,  648 => 209,  642 => 207,  640 => 206,  634 => 202,  625 => 199,  621 => 198,  615 => 197,  612 => 196,  608 => 195,  603 => 193,  596 => 191,  588 => 189,  585 => 188,  582 => 187,  577 => 104,  566 => 102,  562 => 101,  555 => 97,  551 => 96,  546 => 95,  543 => 94,  531 => 83,  528 => 82,  524 => 106,  522 => 94,  518 => 92,  516 => 82,  513 => 81,  510 => 80,  506 => 175,  499 => 170,  491 => 168,  489 => 167,  486 => 166,  478 => 164,  476 => 163,  473 => 162,  467 => 161,  459 => 159,  451 => 157,  448 => 156,  443 => 155,  440 => 153,  432 => 151,  430 => 150,  427 => 149,  419 => 147,  417 => 146,  411 => 143,  408 => 142,  406 => 141,  401 => 138,  396 => 135,  387 => 132,  378 => 131,  374 => 130,  370 => 129,  364 => 128,  360 => 126,  358 => 125,  349 => 121,  346 => 120,  341 => 117,  327 => 116,  318 => 115,  301 => 114,  296 => 113,  294 => 112,  290 => 110,  285 => 108,  282 => 107,  279 => 82,  276 => 81,  274 => 78,  269 => 76,  266 => 75,  263 => 74,  258 => 71,  243 => 65,  240 => 64,  237 => 67,  220 => 66,  217 => 65,  214 => 64,  208 => 60,  202 => 59,  199 => 58,  195 => 56,  191 => 55,  186 => 54,  180 => 53,  168 => 52,  166 => 51,  163 => 50,  160 => 49,  157 => 48,  154 => 47,  151 => 46,  148 => 45,  145 => 44,  142 => 43,  139 => 42,  136 => 41,  134 => 26,  130 => 38,  124 => 34,  121 => 33,  117 => 32,  113 => 30,  110 => 29,  102 => 182,  99 => 181,  96 => 180,  92 => 178,  90 => 177,  87 => 176,  85 => 74,  82 => 73,  80 => 9,  77 => 8,  75 => 29,  72 => 28,  66 => 26,  63 => 4,  60 => 3,  57 => 23,  54 => 26,  48 => 64,  43 => 21,  41 => 20,  38 => 15,  35 => 20,);
    }
}
