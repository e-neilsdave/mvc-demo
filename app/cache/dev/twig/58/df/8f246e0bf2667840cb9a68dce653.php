<?php

/* SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig */
class __TwigTemplate_58df8f246e0bf2667840cb9a68dce653 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("SonataAdminBundle:Form:form_admin_fields.html.twig");

        $this->blocks = array(
            'sonata_admin_orm_one_to_one_widget' => array($this, 'block_sonata_admin_orm_one_to_one_widget'),
            'sonata_admin_orm_many_to_many_widget' => array($this, 'block_sonata_admin_orm_many_to_many_widget'),
            'sonata_admin_orm_many_to_one_widget' => array($this, 'block_sonata_admin_orm_many_to_one_widget'),
            'sonata_admin_orm_one_to_many_widget' => array($this, 'block_sonata_admin_orm_one_to_many_widget'),
            'sonata_type_model_widget' => array($this, 'block_sonata_type_model_widget'),
            'sonata_type_model_list_widget' => array($this, 'block_sonata_type_model_list_widget'),
            'sonata_type_admin_widget' => array($this, 'block_sonata_type_admin_widget'),
            'sonata_type_collection_widget' => array($this, 'block_sonata_type_collection_widget'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "SonataAdminBundle:Form:form_admin_fields.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 16
    public function block_sonata_admin_orm_one_to_one_widget($context, array $blocks = array())
    {
        // line 17
        echo "    ";
        $this->env->loadTemplate("SonataDoctrineORMAdminBundle:CRUD:edit_orm_one_to_one.html.twig")->display($context);
    }

    // line 20
    public function block_sonata_admin_orm_many_to_many_widget($context, array $blocks = array())
    {
        // line 21
        echo "    ";
        $this->env->loadTemplate("SonataDoctrineORMAdminBundle:CRUD:edit_orm_many_to_many.html.twig")->display($context);
    }

    // line 24
    public function block_sonata_admin_orm_many_to_one_widget($context, array $blocks = array())
    {
        // line 25
        echo "    ";
        $this->env->loadTemplate("SonataDoctrineORMAdminBundle:CRUD:edit_orm_many_to_one.html.twig")->display($context);
    }

    // line 28
    public function block_sonata_admin_orm_one_to_many_widget($context, array $blocks = array())
    {
        // line 29
        echo "    ";
        $this->env->loadTemplate("SonataDoctrineORMAdminBundle:CRUD:edit_orm_one_to_many.html.twig")->display($context);
    }

    // line 32
    public function block_sonata_type_model_widget($context, array $blocks = array())
    {
        // line 33
        echo "    ";
        // line 37
        echo "
    ";
        // line 39
        echo "
    ";
        // line 40
        if (twig_test_empty($this->getAttribute($this->getContext($context, "sonata_admin"), "field_description"))) {
            // line 41
            echo "        ";
            $this->displayBlock("choice_widget", $context, $blocks);
            echo "
    ";
        } elseif (($this->getAttribute($this->getAttribute($this->getContext($context, "sonata_admin"), "field_description"), "mappingtype") == 1)) {
            // line 43
            echo "        ";
            $this->displayBlock("sonata_admin_orm_one_to_one_widget", $context, $blocks);
            echo "
    ";
        } elseif (($this->getAttribute($this->getAttribute($this->getContext($context, "sonata_admin"), "field_description"), "mappingtype") == 2)) {
            // line 45
            echo "        ";
            $this->displayBlock("sonata_admin_orm_many_to_one_widget", $context, $blocks);
            echo "
    ";
        } elseif (($this->getAttribute($this->getAttribute($this->getContext($context, "sonata_admin"), "field_description"), "mappingtype") == 8)) {
            // line 47
            echo "        ";
            $this->displayBlock("sonata_admin_orm_many_to_many_widget", $context, $blocks);
            echo "
    ";
        } elseif (($this->getAttribute($this->getAttribute($this->getContext($context, "sonata_admin"), "field_description"), "mappingtype") == 4)) {
            // line 49
            echo "        ";
            $this->displayBlock("sonata_admin_orm_one_to_many_widget", $context, $blocks);
            echo "
    ";
        } else {
            // line 51
            echo "        ";
            // line 52
            echo "        ";
            $this->displayBlock("choice_widget", $context, $blocks);
            echo "
    ";
        }
    }

    // line 56
    public function block_sonata_type_model_list_widget($context, array $blocks = array())
    {
        // line 57
        echo "    <div id=\"field_container_";
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\" class=\"field-container\">
        <span id=\"field_actions_";
        // line 58
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\" class=\"field-actions\">
            <span id=\"field_widget_";
        // line 59
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\" class=\"field-short-description\">
                ";
        // line 60
        if ($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "sonata_admin"), "field_description"), "associationadmin"), "id", array(0 => $this->getAttribute($this->getContext($context, "sonata_admin"), "value")), "method")) {
            // line 61
            echo "                    ";
            echo $this->env->getExtension('actions')->renderUri($this->env->getExtension('routing')->getUrl("sonata_admin_short_object_information", array("code" => $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "sonata_admin"), "field_description"), "associationadmin"), "code"), "objectId" => $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "sonata_admin"), "field_description"), "associationadmin"), "id", array(0 => $this->getAttribute($this->getContext($context, "sonata_admin"), "value")), "method"), "uniqid" => $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "sonata_admin"), "field_description"), "associationadmin"), "uniqid"))), array());
            // line 67
            echo "                ";
        }
        // line 68
        echo "            </span>

            <span class=\"btn-group\">
                ";
        // line 71
        if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "sonata_admin"), "field_description"), "associationadmin"), "hasroute", array(0 => "list"), "method") && $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "sonata_admin"), "field_description"), "associationadmin"), "isGranted", array(0 => "LIST"), "method"))) {
            // line 72
            echo "                    <a  href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "sonata_admin"), "field_description"), "associationadmin"), "generateUrl", array(0 => "list"), "method"), "html", null, true);
            echo "\"
                        onclick=\"return start_field_dialog_form_list_";
            // line 73
            echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
            echo "(this);\"
                        class=\"btn sonata-ba-action\"
                        title=\"";
            // line 75
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("link_list", array(), "SonataAdminBundle"), "html", null, true);
            echo "\"
                            >
                        <i class=\"icon-list\"></i>
                        ";
            // line 78
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("link_list", array(), "SonataAdminBundle"), "html", null, true);
            echo "
                    </a>
                ";
        }
        // line 81
        echo "
                ";
        // line 82
        if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "sonata_admin"), "field_description"), "associationadmin"), "hasroute", array(0 => "create"), "method") && $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "sonata_admin"), "field_description"), "associationadmin"), "isGranted", array(0 => "CREATE"), "method"))) {
            // line 83
            echo "                    <a  href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "sonata_admin"), "field_description"), "associationadmin"), "generateUrl", array(0 => "create"), "method"), "html", null, true);
            echo "\"
                        onclick=\"return start_field_dialog_form_add_";
            // line 84
            echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
            echo "(this);\"
                        class=\"btn sonata-ba-action\"
                        title=\"";
            // line 86
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("link_add", array(), "SonataAdminBundle"), "html", null, true);
            echo "\"
                            >
                        <i class=\"icon-plus\"></i>
                        ";
            // line 89
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("link_add", array(), "SonataAdminBundle"), "html", null, true);
            echo "
                    </a>
                ";
        }
        // line 92
        echo "            </span>

            <span class=\"btn-group\">
                ";
        // line 95
        if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "sonata_admin"), "field_description"), "associationadmin"), "hasRoute", array(0 => "delete"), "method") && $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "sonata_admin"), "field_description"), "associationadmin"), "isGranted", array(0 => "DELETE"), "method"))) {
            // line 96
            echo "                    <a  href=\"\"
                        onclick=\"return remove_selected_element_";
            // line 97
            echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
            echo "(this);\"
                        class=\"btn sonata-ba-action\"
                        title=\"";
            // line 99
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("link_delete", array(), "SonataAdminBundle"), "html", null, true);
            echo "\"
                            >
                        <i class=\"icon-off\"></i>
                        ";
            // line 102
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("link_delete", array(), "SonataAdminBundle"), "html", null, true);
            echo "
                    </a>
                ";
        }
        // line 105
        echo "            </span>
        </span>

        <span style=\"display: none\" >
            ";
        // line 109
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'widget');
        echo "
        </span>

        <div class=\"container sonata-ba-modal sonata-ba-modal-edit-one-to-one\" style=\"display: none\" id=\"field_dialog_";
        // line 112
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\">

        </div>
    </div>

    ";
        // line 117
        $this->env->loadTemplate("SonataDoctrineORMAdminBundle:CRUD:edit_orm_many_association_script.html.twig")->display($context);
    }

    // line 120
    public function block_sonata_type_admin_widget($context, array $blocks = array())
    {
        // line 121
        echo "    ";
        // line 122
        echo "    ";
        if (($this->getAttribute($this->getAttribute($this->getContext($context, "sonata_admin"), "field_description"), "mappingtype") == 1)) {
            // line 123
            echo "        ";
            $this->displayBlock("sonata_admin_orm_one_to_one_widget", $context, $blocks);
            echo "
    ";
        } elseif (($this->getAttribute($this->getAttribute($this->getContext($context, "sonata_admin"), "field_description"), "mappingtype") == 2)) {
            // line 125
            echo "        ";
            $this->displayBlock("sonata_admin_orm_many_to_one_widget", $context, $blocks);
            echo "
    ";
        } elseif (($this->getAttribute($this->getAttribute($this->getContext($context, "sonata_admin"), "field_description"), "mappingtype") == 8)) {
            // line 127
            echo "        ";
            $this->displayBlock("sonata_admin_orm_many_to_many_widget", $context, $blocks);
            echo "
    ";
        } elseif (($this->getAttribute($this->getAttribute($this->getContext($context, "sonata_admin"), "field_description"), "mappingtype") == 4)) {
            // line 129
            echo "        ";
            $this->displayBlock("sonata_admin_orm_one_to_many_widget", $context, $blocks);
            echo "
    ";
        } else {
            // line 131
            echo "        INVALID MODE : ";
            echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
            echo "
    ";
        }
    }

    // line 135
    public function block_sonata_type_collection_widget($context, array $blocks = array())
    {
        // line 136
        echo "    ";
        if (($this->getAttribute($this->getAttribute($this->getContext($context, "sonata_admin"), "field_description"), "mappingtype") == 4)) {
            // line 137
            echo "        ";
            $this->displayBlock("sonata_admin_orm_one_to_many_widget", $context, $blocks);
            echo "
    ";
        } else {
            // line 139
            echo "        INVALID MODE : ";
            echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
            echo " - type : sonata_type_collection - mapping : ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "sonata_admin"), "field_description"), "mappingtype"), "html", null, true);
            echo "
    ";
        }
    }

    public function getTemplateName()
    {
        return "SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  303 => 139,  297 => 137,  294 => 136,  291 => 135,  259 => 123,  256 => 122,  251 => 120,  247 => 117,  239 => 112,  233 => 109,  227 => 105,  221 => 102,  215 => 99,  210 => 97,  207 => 96,  205 => 95,  200 => 92,  194 => 89,  183 => 84,  178 => 83,  173 => 81,  167 => 78,  161 => 75,  156 => 73,  151 => 72,  149 => 71,  144 => 68,  141 => 67,  138 => 61,  136 => 60,  132 => 59,  123 => 57,  120 => 56,  112 => 52,  110 => 51,  104 => 49,  98 => 47,  92 => 45,  86 => 43,  78 => 40,  75 => 39,  72 => 37,  70 => 33,  67 => 32,  62 => 29,  59 => 28,  54 => 25,  51 => 24,  38 => 17,  347 => 92,  344 => 91,  339 => 89,  335 => 88,  330 => 87,  327 => 86,  320 => 84,  315 => 83,  313 => 82,  310 => 81,  304 => 79,  302 => 78,  296 => 76,  293 => 75,  287 => 72,  283 => 131,  280 => 69,  277 => 129,  271 => 127,  265 => 125,  262 => 63,  260 => 62,  257 => 61,  254 => 121,  249 => 55,  246 => 54,  241 => 31,  223 => 27,  216 => 25,  209 => 24,  192 => 23,  188 => 86,  185 => 20,  180 => 96,  176 => 82,  174 => 60,  169 => 58,  166 => 57,  164 => 54,  160 => 52,  143 => 48,  137 => 47,  131 => 45,  128 => 58,  124 => 43,  121 => 42,  115 => 40,  113 => 39,  100 => 36,  83 => 35,  79 => 33,  68 => 16,  65 => 15,  60 => 13,  56 => 12,  40 => 6,  37 => 5,  35 => 16,  32 => 3,  29 => 2,  23 => 1,  94 => 36,  91 => 35,  85 => 31,  80 => 41,  77 => 20,  74 => 19,  71 => 25,  69 => 24,  66 => 23,  63 => 14,  55 => 18,  49 => 10,  46 => 21,  43 => 20,  12 => 33,);
    }
}
