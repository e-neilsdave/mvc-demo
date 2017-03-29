<?php

/* SofidFideleBundle::layout.html.twig */
class __TwigTemplate_4b9b5b69ace7ae6a45d448cdaa2aabc9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'content' => array($this, 'block_content'),
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
        // line 48
        echo "
<div id=\"versionBar\" >
  <div id=\"footer\"> &copy; Copyright 2013 |<span class=\"tip\"> SoFID </span> </div>
  <!-- // copyright-->
</div>
<!-- Link JScript-->
";
        // line 54
        $this->displayBlock('javascripts', $context, $blocks);
        // line 62
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
    }

    // line 54
    public function block_javascripts($context, array $blocks = array())
    {
        // line 55
        echo "<script type=\"text/javascript\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/js/jquery.min.js"), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\" src=\"";
        // line 56
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/effect/jquery-jrumble.js"), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\" src=\"";
        // line 57
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/ui/jquery.ui.min.js"), "html", null, true);
        echo "\"></script>     
<script type=\"text/javascript\" src=\"";
        // line 58
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/tipsy/jquery.tipsy.js"), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\" src=\"";
        // line 59
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/checkboxes/iphone.check.js"), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\" src=\"";
        // line 60
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/js/login.js"), "html", null, true);
        echo "\"></script>
";
    }

    public function getTemplateName()
    {
        return "SofidFideleBundle::layout.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  133 => 60,  129 => 59,  125 => 58,  121 => 57,  117 => 56,  112 => 55,  109 => 54,  104 => 47,  98 => 13,  94 => 12,  89 => 11,  86 => 10,  81 => 62,  79 => 54,  71 => 48,  69 => 47,  35 => 15,  33 => 10,  22 => 1,  103 => 48,  96 => 43,  92 => 41,  78 => 29,  73 => 25,  68 => 22,  63 => 19,  57 => 17,  54 => 16,  50 => 14,  48 => 13,  43 => 11,  36 => 7,  31 => 4,  28 => 3,);
    }
}
