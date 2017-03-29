<?php

/* TwigBundle:Exception:error.html.twig */
class __TwigTemplate_7e86c558bd874a6db40432e2377447e3 extends Twig_Template
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
        echo "<!DOCTYPE html>
<html>
<head>
<meta charset=\"utf-8\" />
<title>SoFID | 404</title>
<link href=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/css/zice.style.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" />
<script type=\"text/javascript\" src=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/js/jquery.min.js"), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\" src=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/js/jquery.cycle.all.js"), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\" src=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/components/effect/jquery-jrumble.js"), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\">
          jQuery(function(\$){
\t\t\t \$('#tv-wrap').jrumble({ x: 4,y: 0,rotation: 0 });\t
\t\t\t\$('#tv-wrap').trigger('startRumble');\t\t  
              \$('.slides').addClass('active').cycle({
                  fx:     'none',
                  speed:   1,
                  timeout: 70
              }).cycle(\"resume\");\t
          });
</script>
<style type=\"text/css\">
html {
\tbackground-image: none;
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
}
.copyright{
\ttext-align:center; font-size:10px; color:#CCC;
}
.copyright a{
\tcolor:#A31F1A; text-decoration:none
}    
</style>
</head>
<body class=\"error\">
<div class=\"errorpage\">
<div id=\"tv-wrap\"> <img src=\"";
        // line 45
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/images/tv.png"), "html", null, true);
        echo "\" width=\"300\" height=\"273\" id=\"tv\"/>
  <div class=\"slideshow-block\"></a>
    <ul class=\"slides\">
      <li><img src=\"";
        // line 48
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/images/pageserror/1.jpg"), "html", null, true);
        echo "\"/></li>
\t  <li><img src=\"";
        // line 49
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/images/pageserror/2.jpg"), "html", null, true);
        echo "\"/></li>
\t  <li><img src=\"";
        // line 50
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/images/pageserror/3.jpg"), "html", null, true);
        echo "\"/></li>
\t  <li><img src=\"";
        // line 51
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/images/pageserror/4.jpg"), "html", null, true);
        echo "\"/></li>
\t  <li><img src=\"";
        // line 52
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/images/pageserror/5.jpg"), "html", null, true);
        echo "\"/></li>
\t  <li><img src=\"";
        // line 53
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/images/pageserror/6.jpg"), "html", null, true);
        echo "\"/></li>
\t  <li><img src=\"";
        // line 54
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/images/pageserror/7.jpg"), "html", null, true);
        echo "\"/></li>
\t  <li><img src=\"";
        // line 55
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/images/pageserror/8.jpg"), "html", null, true);
        echo "\"/></li>
\t  <li><img src=\"";
        // line 56
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/images/pageserror/9.jpg"), "html", null, true);
        echo "\"/></li>
\t  <li><img src=\"";
        // line 57
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/images/pageserror/10.jpg"), "html", null, true);
        echo "\"/></li>
\t  <li><img src=\"";
        // line 58
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/images/pageserror/11.jpg"), "html", null, true);
        echo "\"/></li>
\t  <li><img src=\"";
        // line 59
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/images/pageserror/12.jpg"), "html", null, true);
        echo "\"/></li>
    </ul>
  </div>
</div>
<div id=\"text\">
  <h1> 404 Page not found!</h1>
  <h2>Oops! une erreur est survenue.</h2>
  
</div>
</div>
<div class=\"clear\"></div>
<div id=\"versionBar\" >
  <div id=\"footer\"> &copy; Copyright 2013 |<span class=\"tip\"> SoFID </span> </div>
  <!-- // copyright-->
</div>
<script type=\"text/javascript\">
var text = document.getElementById('text'),
\tbody = document.body,
\tsteps = 7;
function threedee (e) {
\tvar x = Math.round(steps / (window.innerWidth / 2) * (window.innerWidth / 2 - e.clientX)),
\t\ty = Math.round(steps / (window.innerHeight / 2) * (window.innerHeight / 2 - e.clientY)),
\t\tshadow = '',
\t\tcolor = 190,
\t\tradius = 3,
\t\ti;\t
\tfor (i=0; i<steps; i++) {
\t\ttx = Math.round(x / steps * i);
\t\tty = Math.round(y / steps * i);
\t\tif (tx || ty) {
\t\t\tcolor -= 3 * i;
\t\t\tshadow += tx + 'px ' + ty + 'px 0 rgb(' + color + ', ' + color + ', ' + color + '), ';
\t\t}
\t}
\tshadow += x + 'px ' + y + 'px 1px rgba(0,0,0,.2), ' + x*2 + 'px ' + y*2 + 'px 6px rgba(0,0,0,.3)';\t
\ttext.style.textShadow = shadow;
\ttext.style.webkitTransform = 'translateZ(0) rotateX(' + y*1.5 + 'deg) rotateY(' + -x*1.5 + 'deg)';
\ttext.style.MozTransform = 'translateZ(0) rotateX(' + y*1.5 + 'deg) rotateY(' + -x*1.5 + 'deg)';
}
document.addEventListener('mousemove', threedee, false);
</script>
</body>
</html>";
    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:error.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  127 => 59,  123 => 58,  119 => 57,  115 => 56,  111 => 55,  107 => 54,  103 => 53,  99 => 52,  95 => 51,  91 => 50,  87 => 49,  83 => 48,  77 => 45,  38 => 9,  34 => 8,  30 => 7,  26 => 6,  19 => 1,);
    }
}
