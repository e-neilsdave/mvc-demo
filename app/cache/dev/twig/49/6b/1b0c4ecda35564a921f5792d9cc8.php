<?php

/* SofidCommercantBundle:commercant:offres.html.twig */
class __TwigTemplate_496b1b0c4ecda35564a921f5792d9cc8 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("SofidCommercantBundle::dashboard.html.twig");

        $this->blocks = array(
            'javascripts' => array($this, 'block_javascripts'),
            'stylesheets' => array($this, 'block_stylesheets'),
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
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
<script src=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fosjsrouting/js/router.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("fos_js_routing_js", array("callback" => "fos.Router.setData")), "html", null, true);
        echo "\"></script>
<script type='text/javascript' src='";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/js/jquery.weekcalendar.js.min.js"), "html", null, true);
        echo "'></script>
<script type='text/javascript' src='";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/js/calendrier.js"), "html", null, true);
        echo "'></script>
<script type='text/javascript' src='";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/js/jquery.upload.js"), "html", null, true);
        echo "'></script>
";
    }

    // line 12
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 13
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
<style type='text/css'>

\tbody {
\t\tfont-family: \"Lucida Grande\",Helvetica,Arial,Verdana,sans-serif;
\t\tmargin: 0;
\t}
\t
\th1 {
\t\tmargin: 0;
\t\tpadding: 0.5em;
\t}
\t
\tp.description {
\t\tfont-size: 0.8em;
\t\tpadding: 1em;
\t\tposition: absolute;
\t\ttop: 3.2em;
\t\tmargin-right: 400px;
\t} 
\t
\t#message {
\t\tfont-size: 0.7em;
\t\tposition: absolute;
\t\ttop: 1em; 
\t\tright: 1em;
\t\twidth: 350px;
\t\tdisplay: none;
\t\tpadding: 1em;
\t\tbackground: #ffc;
\t\tborder: 1px solid #dda;
\t}
\t
</style>
<link rel='stylesheet' type='text/css' href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/smoothness/jquery-ui.css' />
<link rel='stylesheet' type='text/css' href='";
        // line 48
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/css/jquery.weekcalendar.css"), "html", null, true);
        echo "' />
<link rel='stylesheet' type='text/css' href='";
        // line 49
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sofidcommercant/css/calendrier.css"), "html", null, true);
        echo "' />
";
    }

    // line 52
    public function block_titre($context, array $blocks = array())
    {
        echo "Liste des offres";
    }

    // line 54
    public function block_content($context, array $blocks = array())
    {
        // line 55
        echo "\t<h1>Calendrier des Offres &eacute;ph&eacute;m&egrave;res</h1>
\t<div id='calendar'></div>
\t\t<div id=\"event_edit_container\">
\t\t<form enctype=\"multipart/form-data\" method=\"post\">
\t\t\t<ul id=\"fields\">
\t\t\t\t<li>
\t\t\t\t\t<span>Date: </span><span class=\"date_holder\"></span> 
\t\t\t\t</li>
\t\t\t\t<li>
\t\t\t\t\t<label for=\"start\">Date de d&eacute;but: </label><select name=\"start\"><option value=\"\">S&eacute;lectionnez la date de d&eacute;but</option></select>
\t\t\t\t</li>
\t\t\t\t<li>
\t\t\t\t\t<label for=\"end\">Date de fin: </label><select name=\"end\"><option value=\"\">Selectionnez la date de fin</option></select>
\t\t\t\t</li>
\t\t\t\t<li>
\t\t\t\t\t<label for=\"title\">Titre: </label><input type=\"text\" name=\"title\" />
\t\t\t\t</li>
\t\t\t\t<li>
\t\t\t\t\t<label for=\"recompense\">R&eacute;compense: </label><input type=\"text\" name=\"recompense\" />
\t\t\t\t</li>
\t\t\t\t<li>
\t\t\t\t\t<label for=\"commentaires\">Message: </label><textarea name=\"commentaires\" ></textarea>
\t\t\t\t</li>
                                <li>
\t\t\t\t\t<label for=\"img\">Image: </label><input type=\"file\" name=\"img\" accept=\"image/gif, image/jpeg, image/png\"/>
\t\t\t\t</li>
\t\t\t\t<li>
\t\t\t\t\t<label for=\"nbpts\">Nombre de Points: </label><input type=\"number\" name=\"nbpts\" />
\t\t\t\t</li>
\t\t\t\t<li>
\t\t\t\t\t<br />Envoyer un SMS : <input type=\"checkbox\" name=\"smscheck\" id=\"smscheck\" value=\"1\"> 
\t\t\t\t</li>
\t\t\t</ul>
\t\t</form>
\t</div>
";
    }

    public function getTemplateName()
    {
        return "SofidCommercantBundle:commercant:offres.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  120 => 55,  117 => 54,  111 => 52,  105 => 49,  101 => 48,  63 => 13,  60 => 12,  54 => 9,  50 => 8,  46 => 7,  42 => 6,  38 => 5,  34 => 4,  31 => 3,);
    }
}
