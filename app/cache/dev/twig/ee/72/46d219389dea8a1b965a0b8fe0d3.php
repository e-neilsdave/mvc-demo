<?php

/* SofidCommercantBundle::dashboard.html.twig */
class __TwigTemplate_ee7246d219389dea8a1b965a0b8fe0d3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascripts' => array($this, 'block_javascripts'),
            'jslogout' => array($this, 'block_jslogout'),
            'jsiconlogout' => array($this, 'block_jsiconlogout'),
            'menu' => array($this, 'block_menu'),
            'titre' => array($this, 'block_titre'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\">

<head>

        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\"/>
\t\t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0\" />
        <meta name=\"description\" content=\"\"/>
        <meta name=\"keywords\" content=\"\"/>
        
        <title>SoFID | Dashboard</title>

        <!-- Link shortcut icon-->
        <link rel=\"shortcut icon\" type=\"image/ico\" href=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/images/favicon2.ico"), "html", null, true);
        echo "\"/> 
        
        ";
        // line 16
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 21
        echo "\t\t
\t\t";
        // line 22
        $this->displayBlock('javascripts', $context, $blocks);
        // line 70
        echo "\t\t
\t\t";
        // line 71
        $this->displayBlock('jslogout', $context, $blocks);
        // line 87
        echo "\t    
\t    ";
        // line 88
        $this->displayBlock('jsiconlogout', $context, $blocks);
        // line 108
        echo "\t    
\t\t</head>        
        <body class=\"dashborad\">        
        <div id=\"alertMessage\" class=\"error\"></div>
\t\t<!-- Header -->
        <div id=\"header\">
                <div id=\"account_info\"> 
\t\t\t\t\t<div class=\"setting\"><b>Bonjour,</b> <b class=\"blue\">";
        // line 115
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "user"), "username"), "html", null, true);
        echo "</b><img src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/images/gear.png"), "html", null, true);
        echo "\" class=\"gear\"  alt=\"Profile Setting\" >
                  </div>
\t\t\t\t\t<div class=\"logout\" title=\"Disconnect\"><b >D&eacute;connexion</b><img src=\"";
        // line 117
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/images/connect.png"), "html", null, true);
        echo "\" name=\"connect\" class=\"disconnect\" alt=\"disconnect\" ></div> 
                </div>
            </div><!-- End Header -->
\t\t\t<div id=\"shadowhead\"></div>
              ";
        // line 121
        $this->displayBlock('menu', $context, $blocks);
        // line 136
        echo "              <div id=\"content\">
                <div class=\"inner\">
\t\t\t\t\t<div class=\"topcolumn\">
\t\t\t\t\t\t<div class=\"logo\"></div>
                            <ul  id=\"shortcut\">
                                
                            </ul>
\t\t\t\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t\t</div>
                    <div class=\"clear\"></div>               
                    <!-- full width -->
                    <div class=\"widget\" >
                        <div class=\"header\"><span ><span class=\"ico gray stats_lines\"></span>";
        // line 148
        $this->displayBlock('titre', $context, $blocks);
        echo "</span></div>
                        <div class=\"content\" > <br  class=\"clear\"/>


\t\t\t\t\t\t\t";
        // line 152
        $this->displayBlock('content', $context, $blocks);
        // line 153
        echo "
                            <!-- clear fix -->
\t\t\t\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t\t\t\t
                        </div><!-- End content -->
                    </div><!-- End full width -->
                        
\t\t\t\t\t<!-- clear fix -->
\t\t\t\t\t<div class=\"clear\"></div>

                    <div id=\"footer\"> &copy; Copyright 2013 |<span class=\"tip\"> SoFID </span> </div>

                </div> <!--// End inner -->
              </div> <!--// End content --> 
</body>
</html>";
    }

    // line 16
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 17
        echo "        <!-- Link css-->
        <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/css/zice.style.css"), "html", null, true);
        echo "\"/>
            <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/tipsy/tipsy.css"), "html", null, true);
        echo "\" media=\"all\"/>
        ";
    }

    // line 22
    public function block_javascripts($context, array $blocks = array())
    {
        // line 23
        echo "\t\t<!--[if lte IE 8]><script language=\"javascript\" type=\"text/javascript\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/flot/excanvas.min.js"), "html", null, true);
        echo "\"></script><![endif]-->  
        <script type=\"text/javascript\" src=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/js/jquery.min.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/ui/jquery.ui.min.js"), "html", null, true);
        echo "\"></script> 
        <script type=\"text/javascript\" src=\"";
        // line 26
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/ui/jquery.autotab.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/ui/timepicker.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/colorpicker/js/colorpicker.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/checkboxes/iphone.check.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 30
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/elfinder/js/elfinder.full.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/datatables/dataTables.min.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/datatables/ColVis.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 33
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/scrolltop/scrolltopcontrol.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 34
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/fancybox/jquery.fancybox.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 35
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/jscrollpane/mousewheel.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 36
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/jscrollpane/mwheelIntent.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 37
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/jscrollpane/jscrollpane.min.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 38
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/spinner/ui.spinner.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 39
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/tipsy/jquery.tipsy.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 40
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/editor/jquery.cleditor.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 41
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/chosen/chosen.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 42
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/confirm/jquery.confirm.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 43
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/validationEngine/jquery.validationEngine.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 44
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/validationEngine/jquery.validationEngine-en.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 45
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/vticker/jquery.vticker-min.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 46
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/sourcerer/sourcerer.js"), "html", null, true);
        echo "\"></script>
";
        // line 48
        echo "        <script type=\"text/javascript\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/flot/flot.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 49
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/flot/flot.pie.min.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 50
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/flot/flot.resize.min.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 51
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/flot/graphtable.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 52
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/uploadify/swfobject.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 53
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/uploadify/uploadify.js"), "html", null, true);
        echo "\"></script>        
        <script type=\"text/javascript\" src=\"";
        // line 54
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/checkboxes/customInput.jquery.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 55
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/effect/jquery-jrumble.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 56
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/filestyle/jquery.filestyle.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 57
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/placeholder/jquery.placeholder.js"), "html", null, true);
        echo "\"></script>
\t\t<script type=\"text/javascript\" src=\"";
        // line 58
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/Jcrop/jquery.Jcrop.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 59
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/imgTransform/jquery.transform.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 60
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/webcam/webcam.js"), "html", null, true);
        echo "\"></script>
\t\t<script type=\"text/javascript\" src=\"";
        // line 61
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/rating_star/rating_star.js"), "html", null, true);
        echo "\"></script>
\t\t<script type=\"text/javascript\" src=\"";
        // line 62
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/dualListBox/dualListBox.js"), "html", null, true);
        echo "\"></script>
\t\t<script type=\"text/javascript\" src=\"";
        // line 63
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/smartWizard/jquery.smartWizard.min.js"), "html", null, true);
        echo "\"></script>
\t\t<script type=\"text/javascript\" src=\"";
        // line 64
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/maskedinput/jquery.maskedinput.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 65
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/highlightText/highlightText.js"), "html", null, true);
        echo "\"></script>
\t\t<script type=\"text/javascript\" src=\"";
        // line 66
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/elastic/jquery.elastic.source.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 67
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/js/jquery.cookie.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 68
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/js/zice.custom.js"), "html", null, true);
        echo "\"></script>
\t\t";
    }

    // line 71
    public function block_jslogout($context, array $blocks = array())
    {
        // line 72
        echo "\t\t<script type=\"text/javascript\">
\t    \$(function () {
\t\t    
\t\t// Logout Click  
\t\t\$('.logout').live('click',function() { 
\t\t\t  var str=\"Logout\"; 
\t\t\t  var overlay=\"1\"; 
\t\t\t  loading(str,overlay);
\t\t\t  setTimeout(\"unloading()\",1500);
\t\t\t  setTimeout( \"window.location.href=window.location.pathname+'/../../../commercant/logout'\", 2000 );
\t\t  });
\t\t  
\t    });
\t    </script>
\t    ";
    }

    // line 88
    public function block_jsiconlogout($context, array $blocks = array())
    {
        // line 89
        echo "\t\t<script type=\"text/javascript\">
\t    \$(function () {

\t\t    // Animation icon  Logout 
\t\t\t\$('div.logout').hover(function(){
\t\t\t\t  var name=\$(this).find('img').attr('alt');
\t\t\t\t  \$(this).find('img').animate({ opacity: 0.4 }, 200, function(){
\t\t\t\t\t    \$(this).attr('src','../../bundles/sofidcommercant/images/'+name+'.png').animate({ opacity: 1 }, 500);\t\t\t\t\t\t\t\t\t 
\t\t\t\t });
\t\t\t},function(){
\t\t\t\t  var name=\$(this).find('img').attr('name');
\t\t\t\t  \$(this).find('img').animate({ opacity: 0.5 }, 200, function(){
\t\t\t\t\t    \$(this).attr('src','../../bundles/sofidcommercant/images/'+name+'.png').animate({ opacity: 1 }, 500);\t\t\t\t\t\t\t\t\t 
\t\t\t\t });
\t\t\t })
\t\t\t 
\t    });
\t\t </script>
\t    ";
    }

    // line 121
    public function block_menu($context, array $blocks = array())
    {
        echo "     
              <div id=\"left_menu\">
                    <ul id=\"main_menu\" class=\"main_menu\">
                      <li class=\"limenu ";
        // line 124
        if (($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "requesturi") == $this->env->getExtension('routing')->getPath("dashboard"))) {
            echo " select ";
        }
        echo "\"><a href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("dashboard"), "html", null, true);
        echo "\"><span class=\"ico gray shadow home\" ></span><b>Dashboard</b></a></li>
                      <li class=\"limenu ";
        // line 125
        if (($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "requesturi") == $this->env->getExtension('routing')->getPath("list_fideles"))) {
            echo " select ";
        }
        echo "\" ><a href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("list_fideles"), "html", null, true);
        echo "\"><span class=\"ico gray shadow group\" ></span><b>Liste des Fid&egrave;les</b></a></li>
\t\t\t\t\t  <li class=\"limenu ";
        // line 126
        if (($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "requesturi") == $this->env->getExtension('routing')->getPath("list_paliers"))) {
            echo " select ";
        }
        echo "\" ><a href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("list_paliers"), "html", null, true);
        echo "\" ><span class=\"ico gray shadow pyramid\"></span><b>Paliers</b></a></li>
\t\t\t\t\t  <li class=\"limenu ";
        // line 127
        if (($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "requesturi") == $this->env->getExtension('routing')->getPath("list_offres"))) {
            echo " select ";
        }
        echo "\" ><a href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("list_offres"), "html", null, true);
        echo "\" ><span class=\"ico gray shadow star\"></span><b>Offres</b></a></li>
\t\t\t\t\t  <li class=\"limenu ";
        // line 128
        if (($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "requesturi") == $this->env->getExtension('routing')->getPath("fos_user_profile_edit"))) {
            echo " select ";
        }
        echo "\" ><a href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("fos_user_profile_edit"), "html", null, true);
        echo "\" ><span class=\"ico gray shadow administrator\"></span><b>Profil</b></a></li>
                      <li class=\"limenu ";
        // line 129
        if (($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "requesturi") == $this->env->getExtension('routing')->getPath("fos_user_change_password"))) {
            echo " select ";
        }
        echo "\" ><a href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("fos_user_change_password"), "html", null, true);
        echo "\" ><span class=\"ico gray shadow lock\"></span><b>Mot de passe</b></a></li>
                      <li class=\"limenu ";
        // line 130
        if (($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "requesturi") == $this->env->getExtension('routing')->getPath("sms"))) {
            echo " select ";
        }
        echo "\" ><a href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("sms"), "html", null, true);
        echo "\" ><span class=\"ico gray shadow mail\"></span><b>SMS</b></a></li>
                      <li class=\"limenu ";
        // line 131
        if (($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "requesturi") == $this->env->getExtension('routing')->getPath("pool_homepage"))) {
            echo " select ";
        }
        echo "\" ><a href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("pool_homepage"), "html", null, true);
        echo "\" ><span class=\"ico gray shadow cloud\"></span><b>Pool</b></a></li>
                      <li class=\"limenu ";
        // line 132
        if (($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "requesturi") == $this->env->getExtension('routing')->getPath("pool_result"))) {
            echo " select ";
        }
        echo "\" ><a href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("pool_result"), "html", null, true);
        echo "\" ><span class=\"ico gray shadow cloud\"></span><b>Pool results</b></a></li>
                    </ul>
              </div>          
\t\t\t  ";
    }

    // line 148
    public function block_titre($context, array $blocks = array())
    {
    }

    // line 152
    public function block_content($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "SofidCommercantBundle::dashboard.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  467 => 152,  462 => 148,  450 => 132,  442 => 131,  434 => 130,  426 => 129,  418 => 128,  410 => 127,  402 => 126,  394 => 125,  386 => 124,  379 => 121,  357 => 89,  354 => 88,  336 => 72,  333 => 71,  327 => 68,  323 => 67,  319 => 66,  315 => 65,  311 => 64,  307 => 63,  303 => 62,  299 => 61,  295 => 60,  291 => 59,  287 => 58,  283 => 57,  279 => 56,  275 => 55,  271 => 54,  267 => 53,  263 => 52,  259 => 51,  255 => 50,  251 => 49,  246 => 48,  242 => 46,  238 => 45,  234 => 44,  230 => 43,  226 => 42,  222 => 41,  218 => 40,  214 => 39,  210 => 38,  206 => 37,  202 => 36,  198 => 35,  194 => 34,  190 => 33,  186 => 32,  182 => 31,  178 => 30,  174 => 29,  170 => 28,  166 => 27,  158 => 25,  149 => 23,  146 => 22,  140 => 19,  136 => 18,  133 => 17,  130 => 16,  111 => 153,  109 => 152,  102 => 148,  88 => 136,  86 => 121,  79 => 117,  72 => 115,  63 => 108,  61 => 88,  58 => 87,  56 => 71,  53 => 70,  51 => 22,  48 => 21,  46 => 16,  41 => 14,  26 => 1,  162 => 26,  154 => 24,  144 => 85,  135 => 79,  128 => 75,  119 => 69,  112 => 65,  104 => 59,  101 => 58,  95 => 56,  42 => 6,  38 => 5,  33 => 4,  30 => 3,);
    }
}
