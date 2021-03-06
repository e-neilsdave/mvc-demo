<?php

/* SonataAdminBundle:Button:create_button.html.twig */
class __TwigTemplate_1577a3940d705e5c9c443443e57fbe1f extends Twig_Template
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
        // line 11
        echo "
";
        // line 12
        if (($this->getAttribute($this->getContext($context, "admin"), "hasRoute", array(0 => "create"), "method") && $this->getAttribute($this->getContext($context, "admin"), "isGranted", array(0 => "CREATE"), "method"))) {
            // line 13
            echo "    ";
            if (twig_test_empty($this->getAttribute($this->getContext($context, "admin"), "subClasses"))) {
                // line 14
                echo "        <a class=\"btn sonata-action-element\" href=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "admin"), "generateUrl", array(0 => "create"), "method"), "html", null, true);
                echo "\">
            <i class=\"icon-plus\"></i>
            ";
                // line 16
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("link_action_create", array(), "SonataAdminBundle"), "html", null, true);
                echo "</a>
    ";
            } else {
                // line 18
                echo "        <span class=\"btn-group sonata-action-element\">
            <a class=\"btn dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\">
                <i class=\"icon-plus\"></i>
                ";
                // line 21
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("link_action_create", array(), "SonataAdminBundle"), "html", null, true);
                echo "
                <span class=\"caret\"></span>
            </a>
            <ul class=\"dropdown-menu\">
                ";
                // line 25
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_array_keys_filter($this->getAttribute($this->getContext($context, "admin"), "subclasses")));
                foreach ($context['_seq'] as $context["_key"] => $context["subclass"]) {
                    // line 26
                    echo "                    <li>
                        <a href=\"";
                    // line 27
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "admin"), "generateUrl", array(0 => "create", 1 => array("subclass" => $this->getContext($context, "subclass"))), "method"), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getContext($context, "subclass"), array(), $this->getAttribute($this->getContext($context, "admin"), "translationdomain")), "html", null, true);
                    echo "</a>
                    </li>
                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['subclass'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 30
                echo "            </ul>
        </span>
    ";
            }
        }
    }

    public function getTemplateName()
    {
        return "SonataAdminBundle:Button:create_button.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  50 => 25,  33 => 16,  27 => 14,  30 => 15,  24 => 13,  22 => 12,  698 => 414,  689 => 408,  685 => 406,  683 => 402,  673 => 399,  668 => 397,  663 => 395,  652 => 386,  648 => 385,  638 => 381,  632 => 378,  622 => 371,  614 => 366,  604 => 359,  597 => 355,  586 => 349,  584 => 346,  582 => 345,  576 => 342,  559 => 331,  551 => 326,  547 => 324,  540 => 317,  535 => 315,  527 => 312,  523 => 311,  518 => 309,  513 => 307,  501 => 300,  490 => 295,  483 => 290,  465 => 278,  461 => 277,  455 => 273,  449 => 267,  445 => 265,  439 => 262,  434 => 261,  430 => 256,  425 => 254,  415 => 247,  409 => 244,  397 => 235,  384 => 225,  367 => 211,  326 => 185,  253 => 148,  231 => 135,  226 => 133,  212 => 125,  165 => 99,  134 => 80,  126 => 75,  108 => 68,  103 => 66,  96 => 62,  31 => 22,  48 => 40,  399 => 158,  396 => 157,  394 => 156,  387 => 152,  383 => 150,  362 => 209,  357 => 139,  352 => 138,  348 => 136,  345 => 135,  342 => 133,  325 => 125,  308 => 118,  276 => 102,  273 => 101,  270 => 100,  267 => 156,  245 => 88,  237 => 138,  234 => 84,  232 => 83,  218 => 128,  214 => 75,  202 => 121,  196 => 118,  193 => 70,  182 => 64,  177 => 63,  170 => 101,  162 => 57,  155 => 92,  148 => 53,  142 => 50,  130 => 46,  127 => 45,  125 => 44,  119 => 42,  117 => 41,  106 => 40,  102 => 39,  99 => 38,  73 => 51,  36 => 16,  26 => 20,  21 => 12,  19 => 11,  686 => 206,  680 => 203,  677 => 202,  675 => 201,  669 => 198,  659 => 393,  654 => 195,  642 => 382,  639 => 192,  636 => 191,  627 => 185,  624 => 184,  607 => 182,  590 => 351,  585 => 179,  581 => 178,  578 => 177,  575 => 176,  572 => 175,  566 => 335,  562 => 169,  560 => 168,  555 => 167,  538 => 165,  521 => 164,  517 => 163,  512 => 162,  509 => 161,  506 => 160,  503 => 159,  500 => 158,  498 => 157,  495 => 297,  486 => 151,  482 => 149,  480 => 148,  477 => 147,  475 => 285,  472 => 145,  468 => 125,  462 => 123,  456 => 121,  453 => 268,  450 => 119,  443 => 140,  437 => 138,  435 => 137,  432 => 257,  426 => 133,  423 => 132,  421 => 131,  416 => 129,  405 => 127,  402 => 126,  400 => 119,  391 => 118,  386 => 115,  380 => 112,  377 => 147,  375 => 110,  371 => 144,  366 => 142,  359 => 140,  356 => 105,  353 => 104,  343 => 98,  340 => 97,  337 => 96,  331 => 187,  329 => 126,  324 => 92,  321 => 183,  318 => 90,  312 => 177,  298 => 173,  289 => 109,  286 => 80,  282 => 79,  274 => 77,  272 => 158,  269 => 75,  263 => 71,  250 => 67,  243 => 65,  238 => 64,  236 => 63,  228 => 59,  208 => 74,  203 => 56,  197 => 54,  191 => 69,  184 => 47,  175 => 43,  157 => 41,  152 => 38,  146 => 89,  139 => 49,  118 => 28,  107 => 24,  101 => 71,  95 => 37,  90 => 34,  87 => 59,  84 => 62,  81 => 15,  76 => 13,  64 => 26,  57 => 27,  52 => 21,  47 => 19,  44 => 74,  42 => 62,  39 => 17,  34 => 26,  303 => 139,  297 => 137,  294 => 111,  291 => 169,  259 => 123,  256 => 122,  251 => 120,  247 => 66,  239 => 86,  233 => 62,  227 => 80,  221 => 78,  215 => 99,  210 => 97,  207 => 123,  205 => 95,  200 => 55,  194 => 89,  183 => 84,  178 => 106,  173 => 62,  167 => 60,  161 => 75,  156 => 73,  151 => 91,  149 => 36,  144 => 33,  141 => 67,  138 => 61,  136 => 48,  132 => 59,  123 => 30,  120 => 74,  112 => 26,  110 => 25,  104 => 23,  98 => 21,  92 => 67,  86 => 43,  78 => 30,  75 => 39,  72 => 191,  70 => 33,  67 => 51,  62 => 156,  59 => 155,  54 => 26,  51 => 38,  38 => 18,  347 => 197,  344 => 91,  339 => 89,  335 => 188,  330 => 87,  327 => 86,  320 => 84,  315 => 83,  313 => 82,  310 => 87,  304 => 174,  302 => 86,  296 => 76,  293 => 75,  287 => 72,  283 => 166,  280 => 69,  277 => 78,  271 => 127,  265 => 125,  262 => 63,  260 => 94,  257 => 149,  254 => 91,  249 => 89,  246 => 54,  241 => 139,  223 => 58,  216 => 25,  209 => 24,  192 => 23,  188 => 68,  185 => 110,  180 => 96,  176 => 82,  174 => 60,  169 => 58,  166 => 57,  164 => 54,  160 => 52,  143 => 48,  137 => 47,  131 => 45,  128 => 58,  124 => 43,  121 => 29,  115 => 27,  113 => 70,  100 => 36,  83 => 35,  79 => 14,  68 => 30,  65 => 15,  60 => 25,  56 => 40,  40 => 6,  37 => 54,  35 => 16,  32 => 13,  29 => 21,  23 => 18,  94 => 36,  91 => 60,  85 => 31,  80 => 41,  77 => 52,  74 => 19,  71 => 25,  69 => 190,  66 => 23,  63 => 50,  55 => 45,  49 => 20,  46 => 35,  43 => 21,  12 => 33,);
    }
}
