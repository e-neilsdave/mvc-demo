<?php

/* SofidFideleBundle:Profile:show_content.html.twig */
class __TwigTemplate_b2711d87202f10ff13ff2a9f1887545e extends Twig_Template
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
        if ((twig_length_filter($this->env, $this->getContext($context, "gains")) > 0)) {
            // line 2
            echo "                      <div id=\"UITab\">
                      <div class=\"tab_container\" >

                          <div id=\"tab1\" class=\"tab_content\"> 
                            <div class=\"load_page\">

                              <form>
\t\t\t\t\t\t\t  <div class=\"tableName inTab\">
                              <table class=\"display data_table1 \"  id=\"data_table1\">
                                <thead>
                                  <tr>
                                    <th width=\"352\" >Commercant</th>
                                    <th width=\"174\" >Nombre de Points</th>
                                  </tr>
                                </thead>
                                <tbody id=\"gains\">
                                ";
            // line 18
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "gains"));
            foreach ($context['_seq'] as $context["_key"] => $context["gain"]) {
                // line 19
                echo "\t\t\t\t\t\t\t        <tr>
                                    <td>";
                // line 20
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "gain"), "commercant"), "entreprise"));
                echo "</td>
                                    <td >";
                // line 21
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "gain"), "nbPoints"));
                echo "</td>
                                  </tr>
\t\t\t\t\t\t\t    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['gain'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 24
            echo "                                </tbody>
                              </table>
\t\t\t\t\t\t\t  </div>
                              </form>
                              </div>\t
                          </div><!--tab1-->
                          
                  </div>
                  </div><!-- End UITab -->
";
        } else {
            // line 34
            echo "Aucun point de fid&eacute;lit&eacute; pour le moment!                 
";
        }
    }

    public function getTemplateName()
    {
        return "SofidFideleBundle:Profile:show_content.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  71 => 34,  46 => 20,  43 => 19,  39 => 18,  21 => 2,  19 => 1,  389 => 127,  384 => 118,  376 => 102,  372 => 101,  365 => 98,  347 => 71,  344 => 70,  338 => 67,  334 => 66,  330 => 65,  326 => 64,  322 => 63,  318 => 62,  314 => 61,  310 => 60,  306 => 59,  302 => 58,  298 => 57,  294 => 56,  290 => 55,  286 => 54,  282 => 53,  278 => 52,  274 => 51,  270 => 50,  266 => 49,  262 => 48,  258 => 47,  254 => 46,  250 => 45,  246 => 44,  242 => 43,  238 => 42,  234 => 41,  230 => 40,  226 => 39,  222 => 38,  218 => 37,  214 => 36,  210 => 35,  206 => 34,  202 => 33,  198 => 32,  194 => 31,  190 => 30,  186 => 29,  182 => 28,  178 => 27,  174 => 26,  170 => 25,  166 => 24,  162 => 23,  157 => 22,  154 => 21,  148 => 18,  145 => 17,  142 => 16,  123 => 128,  121 => 127,  118 => 126,  109 => 123,  106 => 122,  102 => 121,  96 => 118,  81 => 105,  79 => 98,  72 => 94,  57 => 86,  55 => 70,  52 => 69,  50 => 21,  47 => 20,  40 => 14,  25 => 1,  67 => 18,  65 => 92,  62 => 16,  59 => 24,  53 => 13,  45 => 16,  41 => 7,  37 => 6,  30 => 3,);
    }
}
