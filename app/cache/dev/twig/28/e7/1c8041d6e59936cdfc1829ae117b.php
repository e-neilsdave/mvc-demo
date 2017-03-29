<?php

/* SofidCommercantBundle:commercant:list.html.twig */
class __TwigTemplate_28e71c8041d6e59936cdfc1829ae117b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("SofidCommercantBundle::dashboard.html.twig");

        $this->blocks = array(
            'javascripts' => array($this, 'block_javascripts'),
            'titre' => array($this, 'block_titre'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "SofidCommercantBundle::dashboard.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_javascripts($context, array $blocks = array())
    {
        // line 4
        echo "        ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
        <script src=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fosjsrouting/js/router.js"), "html", null, true);
        echo "\"></script>
\t\t<script src=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("fos_js_routing_js", array("callback" => "fos.Router.setData")), "html", null, true);
        echo "\"></script>
\t    <script type=\"text/javascript\">
\t   \$('.points').live( 'change',function(){
                if (\$(\"#manual_point\").attr(\"checked\")) {
                            \$('#message').removeAttr('disabled');
                        }
                        else {
                            \$('#message').attr('disabled', true);
                        }
           });
            \$(function () {
\t\t    \$(\"#scan\").click(function() {
\t\t\t    
\t\t    \t loading('Checking');
\t\t\t\t \$('#preloader').html('Modif...');
\t\t\t\t 
\t\t\t\t var nb = \$(\"#nbpts\").val();
                                 var message =\$('#message').val();
                                  var is_editable=\$('input[name=\"point\"]:checked').val();
                                var conversion_value = \$('#conversion_value').val();
                                 
\t\t    \t\$.ajax({
                    url: Routing.generate('change_scan', { nb: nb, message: message, is_editable:is_editable, conversion_value: conversion_value}),
                    type: 'POST',
                    success: function(data, textStatus, xhr) {
                    \tshowSuccess('Succ&egrave;s',5000); 
                    \tunloading();
                    },
                    error: function(xhr, textStatus, errorThrown) {
                    \tunloading();
                    }
                });
\t\t    });
                  \$(\"#export\").click(function() {
                      \$('#action').val('export');
                      \$('#form-fidele').submit();
                  });
\t    
\t    });
\t    </script>
        ";
    }

    // line 48
    public function block_titre($context, array $blocks = array())
    {
        echo "Liste des fid&egrave;les";
    }

    // line 49
    public function block_content($context, array $blocks = array())
    {
        // line 50
        echo "
<div class=\"widgets\">
\t<div class=\"oneThree\">
    </div>
    <div class=\"twoOne\">

        <div class=\"section \">
           <div>
               <label >Nombre de Points par Scan</label> 
               <input type=\"text\" id=\"nbpts\" name=\"nbpts\" value=\"";
        // line 59
        echo twig_escape_filter($this->env, $this->getContext($context, "nbpts"));
        echo "\"/>
               ";
        // line 60
        if ($this->getContext($context, "display_editable")) {
            // line 61
            echo "                    <input type=\"radio\" class='points' id='fix_point' name=\"point\"  value=\"0\" ";
            if (($this->getContext($context, "is_editable") == false)) {
                echo "checked";
            }
            echo "> Fix Points
                    <input type=\"radio\"  class='points' id=\"manual_point\" name=\"point\" value=\"1\" ";
            // line 62
            if ($this->getContext($context, "is_editable")) {
                echo "checked";
            }
            echo ">  Manual Points           
                    </div>
                    <br>
                    <div class=\"text\" style='margin-left:-140px'>
                        <label >Message de l'écran de saisie manuelle des points</label> 
                        <textarea  rows=\"5\" cols=\"50\" id=\"message\" name=\"message\" ";
            // line 67
            if (($this->getContext($context, "is_editable") == false)) {
                echo "disabled";
            }
            echo " > ";
            echo twig_escape_filter($this->env, $this->getContext($context, "message"));
            echo "</textarea>
                    </div>
                 ";
        }
        // line 70
        echo "                    <div style=\"margin-top: 7px;\">
             <label>Conversion Value</label> 
              <input type=\"text\" id=\"conversion_value\" name=\"conversion_value\" value=\"";
        // line 72
        echo twig_escape_filter($this->env, $this->getContext($context, "conversionValue"), "html", null, true);
        echo "\" style=\"margin-left: 60px;\"/>       
            <input ";
        // line 73
        if ($this->getContext($context, "display_editable")) {
            echo " style='float:right ;margin-left: -358px'";
        }
        echo " type=\"button\" value=\"confirmer\" class=\"uibutton submit_form\" id=\"scan\" />
        </div>       
      </div> 

\t</div><!-- End Third / Half column-->
</div>
<div class=\"clear\"></div>

";
        // line 81
        if ((twig_length_filter($this->env, $this->getContext($context, "users")) > 0)) {
            // line 82
            echo "<form id=\"form-fidele\" action=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("list_fideles"), "html", null, true);
            echo "\">
    ";
            // line 83
            if ($this->getContext($context, "display_export")) {
                // line 84
                echo "        <input  type=\"button\" value=\"Export Users\" class=\"uibutton submit_form\" id=\"export\" action=\"export\"/>
        <input type=\"hidden\" value=\"\" name=\"action\" id=\"action\"/>
    ";
            }
            // line 87
            echo "    <div id=\"UITab\">
        <div class=\"tab_container\" >
            <div id=\"tab1\" class=\"tab_content\"> 
                <div class=\"load_page\">
                    <div class=\"tableName inTab\">
                        <table class=\"display data_table1 \"  id=\"data_table1\">
                            <thead>
                                <tr>
                                  <th width=\"352\" >Username</th>
                                  <th width=\"174\" >Date de naissance</th>
                                  <th width=\"246\" >Points fid&eacute;lit&eacute;s</th>
                                </tr>
                            </thead>
                            <tbody>
                            ";
            // line 101
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "users"));
            foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
                // line 102
                echo "                            <tr>
                                <td>";
                // line 103
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "username"));
                echo "</td>
                                <td >";
                // line 104
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "dateNaissance"));
                echo "</td>
                                <td >";
                // line 105
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "nbpts"));
                echo "</td>
                              </tr>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 108
            echo "                            </tbody>
                         </table>
                    </div>
                 </div>\t
             </div><!--tab1-->
          </div>
      </div>
 </form><!-- End UITab -->
";
        } else {
            // line 117
            echo "Aucun fid&egrave;le pour le moment!                 
";
        }
    }

    public function getTemplateName()
    {
        return "SofidCommercantBundle:commercant:list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  226 => 117,  215 => 108,  206 => 105,  202 => 104,  198 => 103,  195 => 102,  191 => 101,  175 => 87,  170 => 84,  168 => 83,  163 => 82,  161 => 81,  148 => 73,  144 => 72,  140 => 70,  130 => 67,  120 => 62,  113 => 61,  111 => 60,  107 => 59,  96 => 50,  93 => 49,  87 => 48,  42 => 6,  38 => 5,  33 => 4,  30 => 3,);
    }
}
