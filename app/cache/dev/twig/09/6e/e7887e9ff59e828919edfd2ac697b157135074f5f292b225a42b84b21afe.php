<?php

/* FOSOAuthServerBundle::layout.html.twig */
class __TwigTemplate_096ee7887e9ff59e828919edfd2ac697b157135074f5f292b225a42b84b21afe extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'fos_oauth_server_content' => array($this, 'block_fos_oauth_server_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
    </head>
    <body>
        <div>
            ";
        // line 8
        $this->displayBlock('fos_oauth_server_content', $context, $blocks);
        // line 10
        echo "        </div>
    </body>
</html>
";
    }

    // line 8
    public function block_fos_oauth_server_content($context, array $blocks = array())
    {
        // line 9
        echo "            ";
    }

    public function getTemplateName()
    {
        return "FOSOAuthServerBundle::layout.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  161 => 32,  90 => 15,  84 => 13,  689 => 297,  685 => 295,  636 => 248,  630 => 245,  625 => 242,  623 => 241,  615 => 235,  611 => 233,  605 => 232,  581 => 229,  576 => 227,  573 => 226,  570 => 225,  566 => 224,  563 => 223,  560 => 222,  557 => 221,  538 => 218,  533 => 216,  530 => 215,  526 => 214,  523 => 213,  517 => 211,  491 => 206,  488 => 205,  484 => 204,  481 => 203,  456 => 197,  454 => 196,  451 => 195,  449 => 194,  439 => 189,  436 => 188,  434 => 187,  431 => 186,  426 => 183,  417 => 179,  408 => 177,  404 => 176,  396 => 173,  389 => 171,  378 => 162,  376 => 161,  373 => 160,  359 => 154,  351 => 152,  344 => 150,  340 => 149,  327 => 138,  325 => 137,  317 => 133,  311 => 132,  301 => 128,  297 => 127,  293 => 126,  289 => 125,  286 => 124,  279 => 122,  265 => 110,  263 => 109,  260 => 108,  255 => 105,  237 => 98,  233 => 97,  226 => 95,  213 => 90,  202 => 81,  200 => 80,  197 => 79,  192 => 76,  175 => 71,  146 => 55,  134 => 51,  126 => 48,  53 => 14,  520 => 212,  513 => 403,  510 => 402,  506 => 400,  501 => 398,  496 => 208,  479 => 202,  468 => 380,  466 => 199,  347 => 151,  335 => 258,  333 => 257,  137 => 67,  110 => 45,  104 => 42,  76 => 24,  20 => 1,  34 => 6,  480 => 162,  474 => 382,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 191,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 172,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 157,  365 => 111,  362 => 110,  360 => 109,  355 => 153,  341 => 260,  337 => 103,  322 => 136,  314 => 99,  312 => 98,  309 => 97,  305 => 129,  298 => 91,  294 => 90,  285 => 89,  283 => 123,  278 => 86,  268 => 85,  264 => 84,  258 => 81,  252 => 80,  247 => 78,  241 => 77,  229 => 73,  220 => 92,  214 => 69,  177 => 65,  169 => 60,  140 => 55,  132 => 51,  128 => 49,  107 => 36,  61 => 13,  273 => 200,  269 => 94,  254 => 92,  243 => 88,  240 => 86,  238 => 85,  235 => 74,  230 => 96,  227 => 81,  224 => 71,  221 => 77,  219 => 76,  217 => 91,  208 => 68,  204 => 72,  179 => 72,  159 => 61,  143 => 56,  135 => 53,  119 => 22,  102 => 21,  71 => 27,  67 => 26,  63 => 15,  59 => 17,  38 => 8,  94 => 33,  89 => 35,  85 => 33,  75 => 17,  68 => 20,  56 => 21,  87 => 25,  21 => 2,  26 => 2,  93 => 28,  88 => 31,  78 => 10,  46 => 7,  27 => 4,  44 => 9,  31 => 10,  28 => 3,  201 => 92,  196 => 90,  183 => 73,  171 => 70,  166 => 71,  163 => 62,  158 => 67,  156 => 66,  151 => 57,  142 => 59,  138 => 54,  136 => 24,  121 => 46,  117 => 44,  105 => 40,  91 => 27,  62 => 18,  49 => 5,  24 => 4,  25 => 4,  19 => 1,  79 => 26,  72 => 22,  69 => 25,  47 => 17,  40 => 8,  37 => 8,  22 => 2,  246 => 101,  157 => 30,  145 => 46,  139 => 53,  131 => 50,  123 => 47,  120 => 40,  115 => 42,  111 => 40,  108 => 44,  101 => 41,  98 => 31,  96 => 17,  83 => 25,  74 => 23,  66 => 15,  55 => 7,  52 => 6,  50 => 13,  43 => 8,  41 => 9,  35 => 5,  32 => 4,  29 => 8,  209 => 82,  203 => 78,  199 => 67,  193 => 73,  189 => 71,  187 => 84,  182 => 66,  176 => 64,  173 => 65,  168 => 69,  164 => 68,  162 => 57,  154 => 29,  149 => 56,  147 => 58,  144 => 49,  141 => 48,  133 => 55,  130 => 41,  125 => 44,  122 => 23,  116 => 41,  112 => 42,  109 => 39,  106 => 36,  103 => 32,  99 => 36,  95 => 28,  92 => 36,  86 => 30,  82 => 12,  80 => 19,  73 => 19,  64 => 17,  60 => 9,  57 => 11,  54 => 10,  51 => 14,  48 => 13,  45 => 17,  42 => 8,  39 => 9,  36 => 5,  33 => 9,  30 => 7,);
    }
}
