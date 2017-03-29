<?php

/* SofidAdminBundle:Form:list_commercant_qrcode.html.twig */
class __TwigTemplate_bd0f0c9797216d51b312cdc5fbc721e4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<td width=\"53\">
";
        // line 2
        if ($this->getAttribute($this->getContext($context, "object"), "code")) {
            // line 3
            echo "    ";
            // line 4
            echo "    <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("commercant_download_qrcode", array("id" => $this->getAttribute($this->getContext($context, "object"), "id"))), "html", null, true);
            echo "\">Download code</a>
";
        }
        // line 6
        echo "</td>";
    }

    public function getTemplateName()
    {
        return "SofidAdminBundle:Form:list_commercant_qrcode.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  32 => 6,  51 => 17,  69 => 34,  67 => 33,  64 => 31,  62 => 30,  59 => 29,  36 => 18,  33 => 17,  24 => 3,  52 => 25,  47 => 16,  37 => 21,  23 => 12,  20 => 11,  34 => 5,  31 => 16,  29 => 15,  26 => 4,  22 => 2,  19 => 1,  653 => 211,  648 => 209,  642 => 207,  640 => 206,  634 => 202,  625 => 199,  621 => 198,  615 => 197,  612 => 196,  608 => 195,  603 => 193,  596 => 191,  588 => 189,  585 => 188,  582 => 187,  577 => 104,  566 => 102,  562 => 101,  555 => 97,  551 => 96,  546 => 95,  543 => 94,  531 => 83,  528 => 82,  524 => 106,  522 => 94,  518 => 92,  516 => 82,  513 => 81,  510 => 80,  506 => 175,  499 => 170,  491 => 168,  489 => 167,  486 => 166,  478 => 164,  476 => 163,  473 => 162,  467 => 161,  459 => 159,  451 => 157,  448 => 156,  443 => 155,  440 => 153,  432 => 151,  430 => 150,  427 => 149,  419 => 147,  417 => 146,  411 => 143,  408 => 142,  406 => 141,  401 => 138,  396 => 135,  387 => 132,  378 => 131,  374 => 130,  370 => 129,  364 => 128,  360 => 126,  358 => 125,  349 => 121,  346 => 120,  341 => 117,  327 => 116,  318 => 115,  301 => 114,  296 => 113,  294 => 112,  290 => 110,  285 => 108,  282 => 107,  279 => 80,  276 => 79,  274 => 78,  269 => 76,  266 => 75,  263 => 74,  258 => 71,  243 => 69,  240 => 68,  237 => 67,  220 => 66,  217 => 65,  214 => 64,  208 => 60,  202 => 59,  199 => 58,  195 => 56,  191 => 55,  186 => 54,  180 => 53,  168 => 52,  166 => 51,  163 => 50,  160 => 49,  157 => 48,  154 => 47,  151 => 46,  148 => 45,  145 => 44,  142 => 43,  139 => 42,  136 => 41,  134 => 40,  130 => 38,  124 => 34,  121 => 33,  117 => 32,  113 => 30,  110 => 29,  102 => 182,  99 => 181,  96 => 180,  92 => 178,  90 => 177,  87 => 176,  85 => 74,  82 => 73,  80 => 64,  77 => 63,  75 => 29,  72 => 28,  66 => 26,  63 => 25,  60 => 24,  57 => 23,  54 => 26,  48 => 20,  43 => 21,  41 => 20,  38 => 15,  35 => 20,);
    }
}
