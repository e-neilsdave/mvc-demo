<?php

/* SofidCommercantBundle:commercant:list_paliers.html.twig */
class __TwigTemplate_18e8a248204e85a9a0e621e017021c49 extends Twig_Template
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
\t    \$(function () {
\t\t    
\t\t    \$(\"#add\").click(function() {
\t\t\t    
\t\t    \t loading('Checking');
\t\t\t\t \$('#preloader').html('Ajout...');

\t\t    \t\$.ajax({
                    url: Routing.generate('add_palier'),
                    type: 'POST',
                    success: function(data, textStatus, xhr) {

                    \tvar path = Routing.generate('edit_palier', { id: data.id });
                    \tunloading();
        \t\t\t\t\$(\"#paliers\").append('<tr><td>'+data.nombre+'</td><td>1</td><td ></td><td ><span class=\"tip\" ><a href=\"'+path+'\" title=\"Edit\" ><img src='+\$(\"#editsrc\").val()+' ></a></span><span class=\"tip\" ><a id=\"'+data.id+'\" class=\"Delete\"  name=\"'+data.nombre+'\" title=\"Delete\"><img src='+\$(\"#deletesrc\").val()+' ></a></span></td></tr>');
        \t\t\t\t\$('#error').html();
                    },
                    error: function(xhr, textStatus, errorThrown) {
                    \tsetTimeout(\"unloading();\",900);
                    \t\$('#error').html(\"Veuillez r&eacute;essayer!\"); 
                    }
                });
\t\t    });
\t    
\t    });
\t    </script>
        ";
    }

    // line 36
    public function block_titre($context, array $blocks = array())
    {
        echo "Liste des paliers";
    }

    // line 37
    public function block_content($context, array $blocks = array())
    {
        // line 38
        echo "
<input type=\"hidden\" id=\"editsrc\" value=\"";
        // line 39
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/images/icon/icon_edit.png"), "html", null, true);
        echo "\">
<input type=\"hidden\" id=\"deletesrc\" value=\"";
        // line 40
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/images/icon/icon_delete.png"), "html", null, true);
        echo "\">

                      <div id=\"UITab\">
                      <div class=\"tab_container\" >

                          <div id=\"tab1\" class=\"tab_content\"> 
                            <div class=\"load_page\">

                              <form>
\t\t\t\t\t\t\t  <div class=\"tableName inTab\">
                              <table class=\"display data_table1 \"  id=\"data_table1\">
                                <thead>
                                  <tr>
                                    <th width=\"352\" >Num Palier</th>
                                    <th width=\"174\" >Nombre de Points Par Palier</th>
                                    <th width=\"246\" >R&eacute;compense</th>
                                    <th width=\"199\" >Manager</th>
                                  </tr>
                                </thead>
                                <tbody id=\"paliers\">
                                ";
        // line 60
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "paliers"));
        foreach ($context['_seq'] as $context["_key"] => $context["palier"]) {
            // line 61
            echo "\t\t\t\t\t\t\t        <tr>
                                    <td>";
            // line 62
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "palier"), "numPalier"));
            echo "</td>
                                    <td >";
            // line 63
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "palier"), "nbPointPalier"));
            echo "</td>
                                    <td >";
            // line 64
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "palier"), "recompense"));
            echo "</td>
                                    <td >
                                      <span class=\"tip\" >
                                          <a href=\"";
            // line 67
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("edit_palier", array("id" => $this->getAttribute($this->getContext($context, "palier"), "id"))), "html", null, true);
            echo "\" title=\"Modifier\" >
                                              <img src=\"";
            // line 68
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/images/icon/icon_edit.png"), "html", null, true);
            echo "\" >
                                          </a>
                                      </span> 
                                      <span class=\"tip\" >
                                          <a id=\"";
            // line 72
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "palier"), "id"), "html", null, true);
            echo "\" class=\"Delete\"  name=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "palier"), "numPalier"));
            echo "\" title=\"Delete\"  >
                                              <img src=\"";
            // line 73
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/images/icon/icon_delete.png"), "html", null, true);
            echo "\" >
                                          </a>
                                      </span> 
                                    </td>
                                  </tr>
\t\t\t\t\t\t\t    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['palier'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 79
        echo "                                </tbody>
                              </table>
\t\t\t\t\t\t\t  </div>
                              </form>
                              </div>\t
                          </div><!--tab1-->
                          
                  </div>
                  </div><!-- End UITab -->
                  
                  <div id=\"error\"></div>
                  
                  <a  class=\"uibutton special\" id=\"add\">Ajouter un palier</a>
";
    }

    public function getTemplateName()
    {
        return "SofidCommercantBundle:commercant:list_paliers.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  164 => 79,  152 => 73,  146 => 72,  139 => 68,  135 => 67,  129 => 64,  125 => 63,  121 => 62,  118 => 61,  114 => 60,  91 => 40,  87 => 39,  84 => 38,  81 => 37,  75 => 36,  42 => 6,  38 => 5,  33 => 4,  30 => 3,);
    }
}
