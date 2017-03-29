<?php

/* SofidUserBundle:Profile:edit_content.html.twig */
class __TwigTemplate_3f6baa8f1a092f688f80de16a3d269d2 extends Twig_Template
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
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("fos_user_profile_edit"), "html", null, true);
        echo "\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'enctype');
        echo " method=\"POST\" class=\"fos_user_profile_edit form-horizontal\" id=\"validation_demo\">
    
    \t\t\t\t\t<!-- Third / Half column-->
\t\t\t\t\t\t<div class=\"widgets\">
\t\t\t\t\t\t\t<div class=\"oneThree\">
                                    <div class=\"profileSetting\" >
                                           <div class=\"avartar\">
                                           ";
        // line 8
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "image"), 'widget');
        echo "
                                           <p align=\"center\"><span>Photo du commer&ccedil;ant</span></p>
                                           </div>
                                    </div>
                            </div>

                            <div class=\"twoOne\">

";
        // line 16
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'errors');
        echo "
        <div class=\"section \">
            <label>Mot de Passe Actuel (v&eacute;rification)</label> 
            <div class=\"controls\">";
        // line 19
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "current_password"), 'widget');
        echo "</div>
        </div>                    
        <div class=\"section \">
            <label>Username</label> 
            <div class=\"controls\">";
        // line 23
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "username"), 'widget');
        echo "</div>
        </div>                 
        <div class=\"section \">
            <label>Pr&eacute;nom</label> 
            <div class=\"controls\">";
        // line 27
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "firstname"), 'widget');
        echo "</div>
        </div>
        <div class=\"section \">
            <label>Nom</label> 
            <div class=\"controls\">";
        // line 31
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "lastname"), 'widget');
        echo "</div>
        </div>
        <div class=\"section \">
            <label>Email</label> 
            <div class=\"controls\">";
        // line 35
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "email"), 'widget');
        echo "</div>
        </div> 
        <div class=\"section \">
            <label>Sexe</label> 
            <div class=\"controls\">";
        // line 39
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "gender"), 'widget');
        echo "</div>
        </div>
        <div class=\"section \">
            <label>Entreprise</label> 
            <div class=\"controls\">";
        // line 43
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "entreprise"), 'widget');
        echo "</div>
        </div>
        <div class=\"section \">
            <label>Site Web</label> 
            <div class=\"controls\">";
        // line 47
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "website"), 'widget');
        echo "</div>
        </div>
        <div class=\"section \">
            <label>Date de Naissance</label> 
            <div class=\"controls\">";
        // line 51
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "dateOfBirth"), 'widget', array("attr" => array("class" => "span1")));
        echo "</div>
        </div>
        <div class=\"section \">
            <label>T&eacute;l&eacute;phone</label> 
            <div class=\"controls\">";
        // line 55
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "phone"), 'widget');
        echo "</div>
        </div>
        <div class=\"section \">
            <label>Adresse</label> 
            <div class=\"controls\">";
        // line 59
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "adresse"), 'widget');
        echo "</div>
        </div>
        <div class=\"section \">
            <label>Code Postal</label> 
            <div class=\"controls\">";
        // line 63
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "codePostal"), 'widget');
        echo "</div>
        </div>
        <div class=\"section \">
            <label>Ville</label> 
            <div class=\"controls\">";
        // line 67
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "ville"), 'widget');
        echo "</div>
        </div>
        <div class=\"section \">
            <label>Pays</label> 
            <div class=\"controls\">";
        // line 71
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "pays"), 'widget');
        echo "</div>
        </div>
        <div class=\"section \">
            <label>Raison sociale</label> 
            <div class=\"controls\">";
        // line 75
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "raisonSociale"), 'widget');
        echo "</div>
        </div>

        <div class=\"section last\">
        ";
        // line 79
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'rest');
        echo "
        \t<input type=\"submit\" value=\"";
        // line 80
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("profile.edit.submit", array(), "FOSUserBundle"), "html", null, true);
        echo "\" class=\"uibutton submit_form\" />
        </div>

\t\t\t\t\t\t</div><!-- End Third / Half column-->
    
</form>";
    }

    public function getTemplateName()
    {
        return "SofidUserBundle:Profile:edit_content.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  158 => 80,  154 => 79,  147 => 75,  140 => 71,  133 => 67,  126 => 63,  119 => 59,  112 => 55,  105 => 51,  98 => 47,  91 => 43,  77 => 35,  63 => 27,  56 => 23,  49 => 19,  43 => 16,  32 => 8,  19 => 1,  97 => 24,  95 => 23,  92 => 22,  89 => 21,  84 => 39,  82 => 21,  79 => 20,  76 => 19,  70 => 31,  62 => 12,  58 => 11,  54 => 10,  50 => 9,  46 => 8,  42 => 7,  38 => 6,  31 => 3,);
    }
}
