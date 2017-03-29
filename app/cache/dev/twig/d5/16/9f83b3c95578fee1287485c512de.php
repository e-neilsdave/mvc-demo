<?php

/* FOSUserBundle::layout.html.twig */
class __TwigTemplate_d5169f83b3c95578fee1287485c512de extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'content' => array($this, 'block_content'),
            'fos_user_content' => array($this, 'block_fos_user_content'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"utf-8\" />
\t\t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0\" />
\t\t<title>SoFID | Homepage</title>
        <!--[if lt IE 9]>
          <script src=\"http://html5shiv.googlecode.com/svn/trunk/html5.js\"></script>
        <![endif]-->
        ";
        // line 10
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 15
        echo "
<style type=\"text/css\">
html {
\tbackground-image: none;
}
label.iPhoneCheckLabelOn span {
\tpadding-left:0px
}
#versionBar {
\tbackground-color:#212121;
\tposition:fixed;
\twidth:100%;
\theight:35px;
\tbottom:0;
\tleft:0;
\ttext-align:center;
\tline-height:35px;
\tz-index:11;
\t-webkit-box-shadow: black 0px 10px 10px -10px inset;
\t-moz-box-shadow: black 0px 10px 10px -10px inset;
\tbox-shadow: black 0px 10px 10px -10px inset;
}
.copyright{
\ttext-align:center; font-size:10px; color:#CCC;
}
.copyright a{
\tcolor:#A31F1A; text-decoration:none
}    
</style>
</head>
<body >
         
";
        // line 47
        $this->displayBlock('content', $context, $blocks);
        // line 50
        echo "
<div id=\"versionBar\" >
  <div id=\"footer\"> &copy; Copyright 2013 |<span class=\"tip\"> SoFID </span> </div>
  <!-- // copyright-->
</div>
<!-- Link JScript-->
";
        // line 56
        $this->displayBlock('javascripts', $context, $blocks);
        // line 64
        echo "</body>
</html>";
    }

    // line 10
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 11
        echo "\t\t\t<link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/css/zice.style.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" />
\t\t\t<link href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/css/icon.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" />
\t\t\t<link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/tipsy/tipsy.css"), "html", null, true);
        echo "\" media=\"all\"/>
\t\t";
    }

    // line 47
    public function block_content($context, array $blocks = array())
    {
        // line 48
        echo "    ";
        $this->displayBlock('fos_user_content', $context, $blocks);
    }

    public function block_fos_user_content($context, array $blocks = array())
    {
    }

    // line 56
    public function block_javascripts($context, array $blocks = array())
    {
        // line 57
        echo "<script type=\"text/javascript\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/js/jquery.min.js"), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\" src=\"";
        // line 58
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/effect/jquery-jrumble.js"), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\" src=\"";
        // line 59
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/ui/jquery.ui.min.js"), "html", null, true);
        echo "\"></script>     
<script type=\"text/javascript\" src=\"";
        // line 60
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/tipsy/jquery.tipsy.js"), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\" src=\"";
        // line 61
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/checkboxes/iphone.check.js"), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\" src=\"";
        // line 62
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/js/login.js"), "html", null, true);
        echo "\"></script>
";
    }

    public function getTemplateName()
    {
        return "FOSUserBundle::layout.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  141 => 62,  137 => 61,  133 => 60,  129 => 59,  125 => 58,  120 => 57,  117 => 56,  108 => 48,  105 => 47,  99 => 13,  95 => 12,  90 => 11,  87 => 10,  82 => 64,  80 => 56,  70 => 47,  34 => 10,  23 => 1,  98 => 42,  94 => 40,  86 => 35,  77 => 28,  72 => 50,  67 => 21,  63 => 20,  58 => 17,  52 => 15,  50 => 14,  45 => 12,  42 => 11,  36 => 15,  31 => 4,  28 => 3,);
    }
}
