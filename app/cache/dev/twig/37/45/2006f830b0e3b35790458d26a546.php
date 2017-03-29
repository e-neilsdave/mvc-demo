<?php

/* SonataAdminBundle:CRUD:list_boolean.html.twig */
class __TwigTemplate_37452006f830b0e3b35790458d26a546 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'field' => array($this, 'block_field'),
        );
    }

    protected function doGetParent(array $context)
    {
        return $this->env->resolveTemplate($this->getAttribute($this->getContext($context, "admin"), "getTemplate", array(0 => "base_list_field"), "method"));
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 14
    public function block_field($context, array $blocks = array())
    {
        // line 15
        ob_start();
        // line 16
        if ((($this->getAttribute($this->getAttribute($this->getContext($context, "field_description", true), "options", array(), "any", false, true), "editable", array(), "any", true, true) && $this->getAttribute($this->getAttribute($this->getContext($context, "field_description"), "options"), "editable")) && $this->getAttribute($this->getContext($context, "admin"), "isGranted", array(0 => "EDIT", 1 => $this->getContext($context, "object")), "method"))) {
            // line 17
            echo "    ";
            if ($this->getContext($context, "value")) {
                // line 18
                echo "        <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("sonata_admin_set_object_field_value", array("context" => "list", "field" => $this->getAttribute($this->getContext($context, "field_description"), "name"), "objectId" => $this->getAttribute($this->getContext($context, "admin"), "id", array(0 => $this->getContext($context, "object")), "method"), "value" => 0, "code" => $this->getAttribute($this->getContext($context, "admin"), "code", array(0 => $this->getContext($context, "object")), "method"))), "html", null, true);
                echo "\" class=\"sonata-ba-action sonata-ba-edit-inline\">
            <i class=\"icon-ok-circle\"></i>&nbsp;";
                // line 20
                echo $this->env->getExtension('translator')->getTranslator()->trans("label_type_yes", array(), "SonataAdminBundle");
                // line 21
                echo "</a>
    ";
            } else {
                // line 23
                echo "        <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("sonata_admin_set_object_field_value", array("context" => "list", "field" => $this->getAttribute($this->getContext($context, "field_description"), "name"), "objectId" => $this->getAttribute($this->getContext($context, "admin"), "id", array(0 => $this->getContext($context, "object")), "method"), "value" => 1, "code" => $this->getAttribute($this->getContext($context, "admin"), "code", array(0 => $this->getContext($context, "object")), "method"))), "html", null, true);
                echo "\" class=\"sonata-ba-action sonata-ba-edit-inline\">
            <i class=\"icon-ban-circle\"></i>&nbsp;";
                // line 25
                echo $this->env->getExtension('translator')->getTranslator()->trans("label_type_no", array(), "SonataAdminBundle");
                // line 26
                echo "</a>
    ";
            }
        } else {
            // line 29
            echo "    ";
            if ($this->getContext($context, "value")) {
                // line 30
                echo "        <i class=\"icon-ok-circle\"></i>&nbsp;";
                // line 31
                echo $this->env->getExtension('translator')->getTranslator()->trans("label_type_yes", array(), "SonataAdminBundle");
            } else {
                // line 33
                echo "        <i class=\"icon-ban-circle\"></i>&nbsp;";
                // line 34
                echo $this->env->getExtension('translator')->getTranslator()->trans("label_type_no", array(), "SonataAdminBundle");
            }
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "SonataAdminBundle:CRUD:list_boolean.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  69 => 34,  67 => 33,  64 => 31,  62 => 30,  59 => 29,  36 => 18,  33 => 17,  24 => 3,  52 => 25,  47 => 23,  37 => 21,  23 => 12,  20 => 11,  34 => 5,  31 => 16,  29 => 15,  26 => 14,  22 => 2,  19 => 1,  653 => 211,  648 => 209,  642 => 207,  640 => 206,  634 => 202,  625 => 199,  621 => 198,  615 => 197,  612 => 196,  608 => 195,  603 => 193,  596 => 191,  588 => 189,  585 => 188,  582 => 187,  577 => 104,  566 => 102,  562 => 101,  555 => 97,  551 => 96,  546 => 95,  543 => 94,  531 => 83,  528 => 82,  524 => 106,  522 => 94,  518 => 92,  516 => 82,  513 => 81,  510 => 80,  506 => 175,  499 => 170,  491 => 168,  489 => 167,  486 => 166,  478 => 164,  476 => 163,  473 => 162,  467 => 161,  459 => 159,  451 => 157,  448 => 156,  443 => 155,  440 => 153,  432 => 151,  430 => 150,  427 => 149,  419 => 147,  417 => 146,  411 => 143,  408 => 142,  406 => 141,  401 => 138,  396 => 135,  387 => 132,  378 => 131,  374 => 130,  370 => 129,  364 => 128,  360 => 126,  358 => 125,  349 => 121,  346 => 120,  341 => 117,  327 => 116,  318 => 115,  301 => 114,  296 => 113,  294 => 112,  290 => 110,  285 => 108,  282 => 107,  279 => 80,  276 => 79,  274 => 78,  269 => 76,  266 => 75,  263 => 74,  258 => 71,  243 => 69,  240 => 68,  237 => 67,  220 => 66,  217 => 65,  214 => 64,  208 => 60,  202 => 59,  199 => 58,  195 => 56,  191 => 55,  186 => 54,  180 => 53,  168 => 52,  166 => 51,  163 => 50,  160 => 49,  157 => 48,  154 => 47,  151 => 46,  148 => 45,  145 => 44,  142 => 43,  139 => 42,  136 => 41,  134 => 40,  130 => 38,  124 => 34,  121 => 33,  117 => 32,  113 => 30,  110 => 29,  102 => 182,  99 => 181,  96 => 180,  92 => 178,  90 => 177,  87 => 176,  85 => 74,  82 => 73,  80 => 64,  77 => 63,  75 => 29,  72 => 28,  66 => 26,  63 => 25,  60 => 24,  57 => 23,  54 => 26,  48 => 20,  43 => 21,  41 => 20,  38 => 15,  35 => 20,);
    }
}
