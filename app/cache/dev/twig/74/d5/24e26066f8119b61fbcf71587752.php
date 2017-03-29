<?php

/* SofidCommercantBundle:commercant:dash.html.twig */
class __TwigTemplate_74d524e26066f8119b61fbcf71587752 extends Twig_Template
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
\t\t    \$(\"#submit\").click(function() {
\t\t\t    
\t\t    \t loading('Checking');
\t\t\t\t \$('#preloader').html('Modif...');
\t\t\t\t 
\t\t\t\t var nb = \$(\"#ticket\").val();

\t\t    \t\$.ajax({
                    url: Routing.generate('change_ticket', { nb: nb }),
                    type: 'POST',
                    success: function(data, textStatus, xhr) {
                    \tshowSuccess('Succ&egrave;s',5000); 
                    \tunloading();
                    \t\$('#ca').html('<h1>'+data.result+'&euro;</h1>');
                    },
                    error: function(xhr, textStatus, errorThrown) {
                    \tunloading();
                    }
                });
\t\t    });

\t\t    \$(\"#submitEphem\").click(function() {
\t\t\t    
\t\t    \t loading('Checking');
\t\t\t\t \$('#preloader').html('Modif...');
\t\t\t\t 
\t\t\t\t var nb = \$(\"#ticketEphem\").val();

\t\t    \t\$.ajax({
                   url: Routing.generate('change_ticket_ephem', { nb: nb }),
                   type: 'POST',
                   success: function(data, textStatus, xhr) {
                   \tshowSuccess('Succ&egrave;s',5000); 
                   \tunloading();
                   \t\$('#ca').html('<h1>'+data.result+'&euro;</h1>');
                   },
                   error: function(xhr, textStatus, errorThrown) {
                   \tunloading();
                   }
               });
\t\t    });
\t    
\t    });
\t    </script>
        ";
    }

    // line 56
    public function block_titre($context, array $blocks = array())
    {
        echo "Dashboard";
    }

    // line 58
    public function block_content($context, array $blocks = array())
    {
        // line 59
        echo "
<center>

\t<table CELLSPACING=30>
\t\t<tr>
\t\t\t<td>
\t\t\t\t<div class=\"shoutcutBox\" > <center><span class=\"ico gray coin\"></span> <strong id=\"ca\"><h1>";
        // line 65
        echo twig_escape_filter($this->env, $this->getContext($context, "ca"), "html", null, true);
        echo "&euro;</h1></strong> <h4>CA Fid&eacute;lit&eacute;</h4>  </center></div>
\t\t\t\t<div class=\"breaks\"><span></span></div>
\t\t\t</td>
\t\t\t<td>
\t\t\t    <div class=\"shoutcutBox\"> <center><span class=\"ico gray group\"></span> <strong><h1>";
        // line 69
        echo twig_escape_filter($this->env, $this->getContext($context, "nb_fideles"), "html", null, true);
        echo "</h1></strong> <h4>Fid&egrave;les</h4> </center></div>
\t\t\t    <div class=\"breaks\"><span></span></div>
\t\t\t</td>
\t\t</tr>
\t\t<tr>
\t\t\t<td>\t\t\t\t\t\t\t\t
\t\t\t    <div class=\"shoutcutBox\" > <center><span class=\"ico gray star\"></span> <strong><h1>";
        // line 75
        echo twig_escape_filter($this->env, $this->getContext($context, "recompenses_paliers"), "html", null, true);
        echo "</h1></strong> <h4>Demandes de R&eacute;compenses normales</h4> </center></div>
\t\t\t\t<div class=\"breaks\"><span></span></div>
\t\t\t</td>
\t\t\t<td>
\t\t\t\t<div class=\"shoutcutBox\" > <center><span class=\"ico gray target\"></span> <strong><h1>";
        // line 79
        echo twig_escape_filter($this->env, $this->getContext($context, "recompenses_offres"), "html", null, true);
        echo "</h1></strong> <h4>Demandes de R&eacute;compenses &eacute;ph&eacute;m&egrave;res</h4> </center></div>
\t\t\t\t<div class=\"breaks\"><span></span></div>
\t\t\t</td>
\t\t</tr>
\t\t<tr>
\t\t\t<td colspan=\"2\">\t\t\t\t\t\t\t\t
\t\t\t    <div class=\"shoutcutBox\"> <center><span class=\"ico gray access_point\"></span> <strong><h1>";
        // line 85
        echo twig_escape_filter($this->env, $this->getContext($context, "shares"), "html", null, true);
        echo "</h1></strong> <h4>Partages Facebook</h4> </center></div>
\t\t\t</td>
\t\t</tr>
\t</table>
\t
\t    <div class=\"section \">
            <label>Valeur Ticket Moyen</label> 
            <input type=\"text\" id=\"ticket\" name=\"ticket\" value=\"";
        // line 92
        echo twig_escape_filter($this->env, $this->getContext($context, "ticket"));
        echo "\"/>
            <input type=\"button\" value=\"confirmer\" class=\"uibutton submit_form\" id=\"submit\" />
        </div>
        <div class=\"section \">
            <label>Valeur Ticket &Eacute;ph&eacute;m&egrave;re Moyen</label> 
            <input type=\"text\" id=\"ticketEphem\" name=\"ticketEphem\" value=\"";
        // line 97
        echo twig_escape_filter($this->env, $this->getContext($context, "ticketEphem"));
        echo "\"/>
            <input type=\"button\" value=\"confirmer\" class=\"uibutton submit_form\" id=\"submitEphem\" />
        </div>  <br />  
\t
</center>

";
    }

    public function getTemplateName()
    {
        return "SofidCommercantBundle:commercant:dash.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  162 => 97,  154 => 92,  144 => 85,  135 => 79,  128 => 75,  119 => 69,  112 => 65,  104 => 59,  101 => 58,  95 => 56,  42 => 6,  38 => 5,  33 => 4,  30 => 3,);
    }
}
