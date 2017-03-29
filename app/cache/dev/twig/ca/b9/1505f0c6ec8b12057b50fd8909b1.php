<?php

/* SofidCommercantBundle:commercant:sms.html.twig */
class __TwigTemplate_cab91505f0c6ec8b12057b50fd8909b1 extends Twig_Template
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
            \$('#commentaires').keyup(function(){
                \$(\"#char-counter\").text((160 - \$(this).val().length));
            });
\t\t    \$(\"#submit\").click(function() {
\t\t\t    
\t\t    \t loading('Checking');
\t\t\t\t \$('#preloader').html('Envoi...');
\t\t\t\t 
\t\t\t\t var msg = \$(\"#commentaires\").val();
\t\t\t\tvar custfreq = \$('#custfreq').val();
\t\t\t\tvar custfreqcondition = \$('#custfreqcondition').val();
\t\t\t\tvar custpur = \$('#custpur').val();
\t\t\t\tvar custpurcondition = \$('#custpurcondition').val();
\t\t\t\tvar date1 = \$('#date1').val();
\t\t\t\tvar date2 = \$('#date2').val();
\t\t    \t\$.ajax({
                    url: Routing.generate('_sms_send'),
                    type: 'POST',
                    data: { msg: msg, custfreq:custfreq,custfreqcondition:custfreqcondition,custpur:custpur,custpurcondition:custpurcondition,date1:date1,date2:date2 },
                    success: function(data, textStatus, xhr) {
                        if (data.error)
                        {
                        \tif (data.error == \"2\")
                            {
                        \t\tshowError('Aucun fid&egrave;le',5000);
                            }else
                            {
                            \tshowError('Echec',5000);
                            }
                        \tunloading();
                        }else {
\t                    \tshowSuccess('Succ&egrave;s',5000); 
\t                    \tunloading();
                        }
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

    // line 54
    public function block_titre($context, array $blocks = array())
    {
        echo "Envoyer un SMS";
    }

    // line 56
    public function block_content($context, array $blocks = array())
    {
        // line 57
        echo "
\t<form action=\"\"  method=\"POST\"id=\"validation_demo\">
    \t
    \t<!-- Third / Half column-->
\t\t<div class=\"widgets\">
\t\t<div class=\"oneThree\">
        </div>

        <div class=\"twoOne\">
\t\t\t<label>Filters</label><hr/>
\t\t\t<div class=\"section \">
\t\t\t\t<label>Custpmer Frequency</label>
\t            <div class=\"controls\">
\t\t\t\t\t<input type=\"text\" name=\"custfreq\" id=\"custfreq\" />
\t\t\t\t\t<select id=\"custfreqcondition\" name=\"custfreqcondition\">
\t\t\t\t\t\t<option value=\">=\">Atleast</option>
\t\t\t\t\t\t<option value=\"<=\">Maximum</option>
\t\t\t\t\t</select>
\t\t\t\t</div>
\t\t\t\t<label>Customer Purchase</label>
\t            <div class=\"controls\">
\t\t\t\t\t<input type=\"text\" name=\"custpur\" id=\"custpur\" />
\t\t\t\t\t<select id=\"custpurcondition\" name=\"custpurcondition\">
\t\t\t\t\t\t<option value=\">=\">Atleast</option>
\t\t\t\t\t\t<option value=\"<=\">Maximum</option>
\t\t\t\t\t</select>
\t\t\t\t</div>
\t            <label>First date</label>
\t            <div class=\"controls\"><input type=\"text\" name=\"date1\" id=\"date1\"  /></div>
\t\t\t\t<label>Second date</label>
\t            <div class=\"controls\"><input type=\"text\" name=\"date2\" id=\"date2\"  /></div>
\t        </div>\t\t\t\t  
\t\t\t<label>Send Message</label><hr/>
\t        <div class=\"section \">
\t            <label>Message &agrave; envoyer</label>
\t            <div class=\"controls\"><textarea name=\"commentaires\" id=\"commentaires\" maxlength=\"160\" required></textarea></div>
\t            <div class=\"controls\"><p><span id=\"char-counter\">160</span>/160 caractères</p></div>
\t        </div>
\t
\t        <div class=\"section last\">
\t        \t<input type=\"button\" value=\"confirmer\" class=\"uibutton submit_form\" id=\"submit\" />
\t        </div>

        </div><!-- End Third / Half column-->

    </form>

";
    }

    public function getTemplateName()
    {
        return "SofidCommercantBundle:commercant:sms.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  102 => 57,  99 => 56,  93 => 54,  42 => 6,  38 => 5,  33 => 4,  30 => 3,);
    }
}
