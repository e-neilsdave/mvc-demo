<?php

/* SonataBlockBundle:Block:block_base.html.twig */
class __TwigTemplate_5f74910e623f104c7e9617875bb65a42 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'block' => array($this, 'block_block'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 11
        echo "<div id=\"cms-block-";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "block"), "id"), "html", null, true);
        echo "\" class=\"cms-block cms-block-element\">
    ";
        // line 12
        $this->displayBlock('block', $context, $blocks);
        // line 13
        echo "</div>
";
    }

    // line 12
    public function block_block($context, array $blocks = array())
    {
        echo "EMPTY CONTENT";
    }

    public function getTemplateName()
    {
        return "SonataBlockBundle:Block:block_base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  27 => 13,  25 => 12,  20 => 11,  145 => 62,  139 => 61,  133 => 57,  129 => 55,  127 => 54,  121 => 52,  118 => 51,  115 => 50,  100 => 45,  97 => 44,  93 => 43,  86 => 39,  78 => 35,  70 => 32,  67 => 31,  56 => 26,  49 => 24,  41 => 19,  31 => 15,  621 => 206,  618 => 205,  613 => 200,  606 => 196,  600 => 193,  596 => 191,  594 => 190,  591 => 189,  585 => 187,  583 => 186,  580 => 185,  574 => 183,  572 => 182,  569 => 181,  563 => 179,  561 => 178,  558 => 177,  552 => 175,  550 => 174,  547 => 173,  544 => 172,  539 => 160,  535 => 129,  529 => 128,  520 => 125,  515 => 124,  510 => 123,  507 => 122,  502 => 121,  499 => 120,  493 => 110,  489 => 109,  486 => 108,  478 => 105,  472 => 104,  464 => 102,  461 => 101,  457 => 100,  452 => 98,  449 => 97,  444 => 96,  441 => 95,  438 => 94,  432 => 93,  426 => 111,  423 => 110,  420 => 94,  418 => 93,  414 => 91,  411 => 90,  404 => 86,  398 => 85,  393 => 84,  390 => 83,  384 => 47,  380 => 46,  375 => 44,  370 => 42,  366 => 41,  361 => 40,  358 => 39,  352 => 36,  348 => 35,  342 => 32,  338 => 31,  333 => 29,  330 => 28,  327 => 27,  320 => 212,  318 => 205,  313 => 202,  311 => 172,  307 => 171,  304 => 170,  298 => 167,  295 => 166,  293 => 165,  287 => 161,  285 => 160,  280 => 157,  276 => 155,  270 => 153,  267 => 152,  264 => 151,  250 => 150,  244 => 148,  239 => 145,  233 => 143,  225 => 141,  223 => 140,  220 => 139,  217 => 138,  199 => 137,  196 => 136,  194 => 135,  191 => 134,  189 => 133,  184 => 130,  182 => 120,  175 => 115,  172 => 114,  170 => 90,  167 => 89,  165 => 83,  158 => 81,  156 => 80,  144 => 70,  138 => 68,  134 => 66,  131 => 65,  128 => 64,  111 => 48,  107 => 60,  104 => 59,  87 => 58,  84 => 57,  81 => 56,  75 => 54,  68 => 51,  64 => 49,  62 => 39,  57 => 27,  48 => 20,  44 => 18,  40 => 16,  38 => 15,  36 => 16,  32 => 12,  30 => 11,  88 => 40,  82 => 37,  76 => 34,  73 => 53,  69 => 26,  65 => 30,  59 => 27,  53 => 25,  50 => 20,  46 => 19,  42 => 17,  39 => 16,  34 => 13,  28 => 14,);
    }
}
