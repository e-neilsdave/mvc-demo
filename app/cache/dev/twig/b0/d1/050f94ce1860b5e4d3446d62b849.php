<?php

/* SofidFideleBundle::dashboard.html.twig */
class __TwigTemplate_b0d1050f94ce1860b5e4d3446d62b849 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascripts' => array($this, 'block_javascripts'),
            'jslogout' => array($this, 'block_jslogout'),
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
        // line 20
        echo "\t\t
\t\t";
        // line 21
        $this->displayBlock('javascripts', $context, $blocks);
        // line 69
        echo "\t\t
\t\t";
        // line 70
        $this->displayBlock('jslogout', $context, $blocks);
        // line 86
        echo "\t\t</head>        
        <body class=\"dashborad\">        
        <div id=\"alertMessage\" class=\"error\"></div>
\t\t<!-- Header -->
        <div id=\"header\">
                <div id=\"account_info\"> 
\t\t\t\t\t<div class=\"setting\"><b>Bonjour,</b> <b class=\"blue\">";
        // line 92
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "username"));
        echo "</b><img src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/images/gear.png"), "html", null, true);
        echo "\" class=\"gear\"  alt=\"Profile Setting\" >
                  </div>
\t\t\t\t\t<div class=\"logout\" title=\"Disconnect\"><b >D&eacute;connexion</b><img src=\"";
        // line 94
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/images/connect.png"), "html", null, true);
        echo "\" name=\"connect\" class=\"disconnect\" alt=\"disconnect\" ></div> 
                </div>
            </div><!-- End Header -->
\t\t\t<div id=\"shadowhead\"></div>
              ";
        // line 98
        $this->displayBlock('menu', $context, $blocks);
        // line 105
        echo "  
              <div id=\"content\">
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
        // line 118
        $this->displayBlock('titre', $context, $blocks);
        echo "</span></div>
                        <div class=\"content\" > <br  class=\"clear\"/>
\t\t\t\t\t\t
\t\t    \t\t\t\t";
        // line 121
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "flashbag"), "get", array(0 => "notice"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 122
            echo "\t\t\t\t\t\t\t    <div class=\"flash-notice\">
\t\t\t\t\t\t\t\t\t";
            // line 123
            echo twig_escape_filter($this->env, $this->getContext($context, "flashMessage"), "html", null, true);
            echo "
\t\t\t\t\t\t\t    </div>
\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 126
        echo "
\t\t\t\t\t\t\t";
        // line 127
        $this->displayBlock('content', $context, $blocks);
        // line 128
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
        ";
    }

    // line 21
    public function block_javascripts($context, array $blocks = array())
    {
        // line 22
        echo "\t\t<!--[if lte IE 8]><script language=\"javascript\" type=\"text/javascript\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/flot/excanvas.min.js"), "html", null, true);
        echo "\"></script><![endif]-->  
        <script type=\"text/javascript\" src=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/js/jquery.min.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/ui/jquery.ui.min.js"), "html", null, true);
        echo "\"></script> 
        <script type=\"text/javascript\" src=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/ui/jquery.autotab.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 26
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/ui/timepicker.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/colorpicker/js/colorpicker.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/checkboxes/iphone.check.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/elfinder/js/elfinder.full.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 30
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/datatables/dataTables.min.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/datatables/ColVis.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/scrolltop/scrolltopcontrol.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 33
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/fancybox/jquery.fancybox.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 34
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/jscrollpane/mousewheel.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 35
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/jscrollpane/mwheelIntent.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 36
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/jscrollpane/jscrollpane.min.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 37
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/spinner/ui.spinner.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 38
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/tipsy/jquery.tipsy.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 39
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/editor/jquery.cleditor.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 40
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/chosen/chosen.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 41
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/confirm/jquery.confirm.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 42
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/validationEngine/jquery.validationEngine.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 43
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/validationEngine/jquery.validationEngine-en.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 44
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/vticker/jquery.vticker-min.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 45
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/sourcerer/sourcerer.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 46
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/fullcalendar/fullcalendar.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 47
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/flot/flot.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 48
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/flot/flot.pie.min.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 49
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/flot/flot.resize.min.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 50
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/flot/graphtable.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 51
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/uploadify/swfobject.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 52
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/uploadify/uploadify.js"), "html", null, true);
        echo "\"></script>        
        <script type=\"text/javascript\" src=\"";
        // line 53
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/checkboxes/customInput.jquery.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 54
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/effect/jquery-jrumble.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 55
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/filestyle/jquery.filestyle.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 56
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/placeholder/jquery.placeholder.js"), "html", null, true);
        echo "\"></script>
\t\t<script type=\"text/javascript\" src=\"";
        // line 57
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/Jcrop/jquery.Jcrop.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 58
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/imgTransform/jquery.transform.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 59
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/webcam/webcam.js"), "html", null, true);
        echo "\"></script>
\t\t<script type=\"text/javascript\" src=\"";
        // line 60
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/rating_star/rating_star.js"), "html", null, true);
        echo "\"></script>
\t\t<script type=\"text/javascript\" src=\"";
        // line 61
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/dualListBox/dualListBox.js"), "html", null, true);
        echo "\"></script>
\t\t<script type=\"text/javascript\" src=\"";
        // line 62
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/smartWizard/jquery.smartWizard.min.js"), "html", null, true);
        echo "\"></script>
\t\t<script type=\"text/javascript\" src=\"";
        // line 63
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/maskedinput/jquery.maskedinput.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 64
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/highlightText/highlightText.js"), "html", null, true);
        echo "\"></script>
\t\t<script type=\"text/javascript\" src=\"";
        // line 65
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/elastic/jquery.elastic.source.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 66
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/js/jquery.cookie.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 67
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/js/zice.custom.js"), "html", null, true);
        echo "\"></script>
\t\t";
    }

    // line 70
    public function block_jslogout($context, array $blocks = array())
    {
        // line 71
        echo "\t\t<script type=\"text/javascript\">
\t    \$(function () {
\t\t    
\t\t// Logout Click  
\t\t\$('.logout').live('click',function() { 
\t\t\t  var str=\"Logout\"; 
\t\t\t  var overlay=\"1\"; 
\t\t\t  loading(str,overlay);
\t\t\t  setTimeout(\"unloading()\",1500);
\t\t\t  setTimeout( \"window.location.href=window.location.pathname+'/../../fidele/logout'\", 2000 );
\t\t  });
\t\t  
\t    });
\t    </script>
\t    ";
    }

    // line 98
    public function block_menu($context, array $blocks = array())
    {
        echo "   
              <div id=\"left_menu\">
                    <ul id=\"main_menu\" class=\"main_menu\">
                      <li class=\"limenu select\"><a href=\"";
        // line 101
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("home_fidele"), "html", null, true);
        echo "\"><span class=\"ico gray shadow home\" ></span><b>Accueil</b></a></li>
\t\t\t\t\t  <li class=\"limenu\" ><a href=\"";
        // line 102
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("edit_fidele"), "html", null, true);
        echo "\" ><span class=\"ico gray shadow administrator\"></span><b>Profil</b></a></li>
                    </ul>
              </div>          
\t\t\t  ";
    }

    // line 118
    public function block_titre($context, array $blocks = array())
    {
    }

    // line 127
    public function block_content($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "SofidFideleBundle::dashboard.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  389 => 127,  384 => 118,  376 => 102,  372 => 101,  365 => 98,  347 => 71,  344 => 70,  338 => 67,  334 => 66,  330 => 65,  326 => 64,  322 => 63,  318 => 62,  314 => 61,  310 => 60,  306 => 59,  302 => 58,  298 => 57,  294 => 56,  290 => 55,  286 => 54,  282 => 53,  278 => 52,  274 => 51,  270 => 50,  266 => 49,  262 => 48,  258 => 47,  254 => 46,  250 => 45,  246 => 44,  242 => 43,  238 => 42,  234 => 41,  230 => 40,  226 => 39,  222 => 38,  218 => 37,  214 => 36,  210 => 35,  206 => 34,  202 => 33,  198 => 32,  194 => 31,  190 => 30,  186 => 29,  182 => 28,  178 => 27,  174 => 26,  170 => 25,  166 => 24,  162 => 23,  157 => 22,  154 => 21,  148 => 18,  145 => 17,  142 => 16,  123 => 128,  121 => 127,  118 => 126,  109 => 123,  106 => 122,  102 => 121,  96 => 118,  81 => 105,  79 => 98,  72 => 94,  57 => 86,  55 => 70,  52 => 69,  50 => 21,  47 => 20,  40 => 14,  25 => 1,  67 => 18,  65 => 92,  62 => 16,  59 => 15,  53 => 13,  45 => 16,  41 => 7,  37 => 6,  30 => 3,);
    }
}
