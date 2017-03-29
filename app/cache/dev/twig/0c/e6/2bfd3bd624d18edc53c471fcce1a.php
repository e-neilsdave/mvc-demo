<?php

/* SofidUserBundle:ChangePassword:changePassword_content.html.twig */
class __TwigTemplate_0ce62bfd3bd624d18edc53c471fcce1a extends Twig_Template
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
        echo "<form action=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("fos_user_change_password"), "html", null, true);
        echo "\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'enctype');
        echo " method=\"POST\" class=\"fos_user_change_password form-horizontal\" id=\"validation_demo\">
    
    \t\t\t\t\t<!-- Third / Half column-->
\t\t\t\t\t\t<div class=\"widgets\">
\t\t\t\t\t\t\t<div class=\"oneThree\">
                            </div>

                            <div class=\"twoOne\">

";
        // line 10
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'errors');
        echo "
                            
        <div class=\"section \">
            <label>Mot de Passe Actuel</label> 
            <div class=\"controls\">";
        // line 14
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "current_password"), 'widget');
        echo "</div>
        </div>                 
        <div class=\"section \">
            <label>Nouveau Mot de Passe</label> 
            <div class=\"controls\">";
        // line 18
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getContext($context, "form"), "new"), "first"), 'widget');
        echo "</div>
        </div>
        <div class=\"section \">
            <label>V&eacute;rification</label> 
            <div class=\"controls\">";
        // line 22
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getContext($context, "form"), "new"), "second"), 'widget');
        echo "</div>
        </div>

        <div class=\"section last\">
        ";
        // line 26
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'rest');
        echo "
        \t<input type=\"submit\" value=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("change_password.submit", array(), "FOSUserBundle"), "html", null, true);
        echo "\" class=\"uibutton submit_form\" />
        </div>

\t\t\t\t\t\t</div><!-- End Third / Half column-->
    
</form>";
    }

    public function getTemplateName()
    {
        return "SofidUserBundle:ChangePassword:changePassword_content.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  66 => 27,  55 => 22,  48 => 18,  41 => 14,  34 => 10,  19 => 1,  97 => 24,  95 => 23,  92 => 22,  89 => 21,  84 => 26,  82 => 21,  79 => 20,  76 => 19,  70 => 17,  62 => 26,  58 => 11,  54 => 10,  50 => 9,  46 => 8,  42 => 7,  38 => 6,  31 => 3,);
    }
}
