<?php

/* SonataDoctrineORMAdminBundle:CRUD:edit_orm_one_association_script.html.twig */
class __TwigTemplate_b6d73bf9d02610d779d211abddbe4dbb extends Twig_Template
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
        // line 11
        echo "

";
        // line 18
        echo "
";
        // line 20
        echo "
<!-- edit one association -->

<script type=\"text/javascript\">

    // handle the add link
    var field_add_";
        // line 26
        echo $this->getContext($context, "id");
        echo " = function(event) {

        event.preventDefault();
        event.stopPropagation();

        var form = jQuery(this).closest('form');

        // the ajax post
        jQuery(form).ajaxSubmit({
            url: '";
        // line 35
        echo $this->env->getExtension('routing')->getUrl("sonata_admin_append_form_element", (array("code" => $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "sonata_admin"), "admin"), "root"), "code"), "elementId" => $this->getContext($context, "id"), "objectId" => $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "sonata_admin"), "admin"), "root"), "id", array(0 => $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "sonata_admin"), "admin"), "root"), "subject")), "method"), "uniqid" => $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "sonata_admin"), "admin"), "root"), "uniqid")) + $this->getAttribute($this->getAttribute($this->getContext($context, "sonata_admin"), "field_description"), "getOption", array(0 => "link_parameters", 1 => array()), "method")));
        // line 40
        echo "',
            type: \"POST\",
            dataType: 'html',
            data: { _xml_http_request: true },
            success: function(html) {
                jQuery('#field_container_";
        // line 45
        echo $this->getContext($context, "id");
        echo "').replaceWith(html); // replace the html
                if(jQuery('input[type=\"file\"]', form).length > 0) {
                    jQuery(form).attr('enctype', 'multipart/form-data');
                    jQuery(form).attr('encoding', 'multipart/form-data');
                }
                jQuery('#sonata-ba-field-container-";
        // line 50
        echo $this->getContext($context, "id");
        echo "').trigger('sonata.add_element');
                jQuery('#field_container_";
        // line 51
        echo $this->getContext($context, "id");
        echo "').trigger('sonata.add_element');
            }
        });

        return false;
    };

    var field_widget_";
        // line 58
        echo $this->getContext($context, "id");
        echo " = false;

    // this function initialize the popup
    // this can be only done this way has popup can be cascaded
    function start_field_retrieve_";
        // line 62
        echo $this->getContext($context, "id");
        echo "(link) {

        link.onclick = null;

        // initialize component
        field_widget_";
        // line 67
        echo $this->getContext($context, "id");
        echo " = jQuery(\"#field_widget_";
        echo $this->getContext($context, "id");
        echo "\");

        // add the jQuery event to the a element
        jQuery(link)
            .click(field_add_";
        // line 71
        echo $this->getContext($context, "id");
        echo ")
            .trigger('click')
        ;

        return false;
    }
</script>

<!-- / edit one association -->

";
    }

    public function getTemplateName()
    {
        return "SonataDoctrineORMAdminBundle:CRUD:edit_orm_one_association_script.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  48 => 40,  399 => 158,  396 => 157,  394 => 156,  387 => 152,  383 => 150,  362 => 141,  357 => 139,  352 => 138,  348 => 136,  345 => 135,  342 => 133,  325 => 125,  308 => 118,  276 => 102,  273 => 101,  270 => 100,  267 => 98,  245 => 88,  237 => 85,  234 => 84,  232 => 83,  218 => 77,  214 => 75,  202 => 73,  196 => 71,  193 => 70,  182 => 64,  177 => 63,  170 => 61,  162 => 57,  155 => 55,  148 => 53,  142 => 50,  130 => 46,  127 => 45,  125 => 44,  119 => 42,  117 => 41,  106 => 40,  102 => 39,  99 => 38,  73 => 29,  36 => 16,  26 => 20,  21 => 12,  19 => 11,  686 => 206,  680 => 203,  677 => 202,  675 => 201,  669 => 198,  659 => 197,  654 => 195,  642 => 193,  639 => 192,  636 => 191,  627 => 185,  624 => 184,  607 => 182,  590 => 181,  585 => 179,  581 => 178,  578 => 177,  575 => 176,  572 => 175,  566 => 171,  562 => 169,  560 => 168,  555 => 167,  538 => 165,  521 => 164,  517 => 163,  512 => 162,  509 => 161,  506 => 160,  503 => 159,  500 => 158,  498 => 157,  495 => 156,  486 => 151,  482 => 149,  480 => 148,  477 => 147,  475 => 146,  472 => 145,  468 => 125,  462 => 123,  456 => 121,  453 => 120,  450 => 119,  443 => 140,  437 => 138,  435 => 137,  432 => 136,  426 => 133,  423 => 132,  421 => 131,  416 => 129,  405 => 127,  402 => 126,  400 => 119,  391 => 118,  386 => 115,  380 => 112,  377 => 147,  375 => 110,  371 => 144,  366 => 142,  359 => 140,  356 => 105,  353 => 104,  343 => 98,  340 => 97,  337 => 96,  331 => 94,  329 => 126,  324 => 92,  321 => 124,  318 => 90,  312 => 88,  298 => 84,  289 => 109,  286 => 80,  282 => 79,  274 => 77,  272 => 76,  269 => 75,  263 => 71,  250 => 67,  243 => 65,  238 => 64,  236 => 63,  228 => 59,  208 => 74,  203 => 56,  197 => 54,  191 => 69,  184 => 47,  175 => 43,  157 => 41,  152 => 38,  146 => 34,  139 => 49,  118 => 28,  107 => 24,  101 => 71,  95 => 37,  90 => 34,  87 => 17,  84 => 62,  81 => 15,  76 => 13,  64 => 26,  57 => 145,  52 => 21,  47 => 19,  44 => 74,  42 => 62,  39 => 17,  34 => 26,  303 => 139,  297 => 137,  294 => 111,  291 => 135,  259 => 123,  256 => 122,  251 => 120,  247 => 66,  239 => 86,  233 => 62,  227 => 80,  221 => 78,  215 => 99,  210 => 97,  207 => 96,  205 => 95,  200 => 55,  194 => 89,  183 => 84,  178 => 45,  173 => 62,  167 => 60,  161 => 75,  156 => 73,  151 => 72,  149 => 36,  144 => 33,  141 => 67,  138 => 61,  136 => 48,  132 => 59,  123 => 30,  120 => 56,  112 => 26,  110 => 25,  104 => 23,  98 => 21,  92 => 67,  86 => 43,  78 => 30,  75 => 39,  72 => 191,  70 => 33,  67 => 51,  62 => 156,  59 => 155,  54 => 144,  51 => 24,  38 => 17,  347 => 92,  344 => 91,  339 => 89,  335 => 129,  330 => 87,  327 => 86,  320 => 84,  315 => 83,  313 => 82,  310 => 87,  304 => 79,  302 => 86,  296 => 76,  293 => 75,  287 => 72,  283 => 106,  280 => 69,  277 => 78,  271 => 127,  265 => 125,  262 => 63,  260 => 94,  257 => 61,  254 => 91,  249 => 89,  246 => 54,  241 => 31,  223 => 58,  216 => 25,  209 => 24,  192 => 23,  188 => 68,  185 => 65,  180 => 96,  176 => 82,  174 => 60,  169 => 58,  166 => 57,  164 => 54,  160 => 52,  143 => 48,  137 => 47,  131 => 45,  128 => 58,  124 => 43,  121 => 29,  115 => 27,  113 => 39,  100 => 36,  83 => 35,  79 => 14,  68 => 16,  65 => 15,  60 => 25,  56 => 12,  40 => 6,  37 => 54,  35 => 16,  32 => 13,  29 => 11,  23 => 18,  94 => 36,  91 => 35,  85 => 31,  80 => 41,  77 => 58,  74 => 19,  71 => 25,  69 => 190,  66 => 23,  63 => 50,  55 => 45,  49 => 20,  46 => 35,  43 => 18,  12 => 33,);
    }
}
