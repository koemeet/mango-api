<?php

/* NelmioApiDocBundle::method.html.twig */
class __TwigTemplate_e69281183d9e9b18ec100e9e26fd522c0ca4a2562db45dcd968c64c3eac66e93 extends Twig_Template
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
        echo "<li class=\"";
        echo twig_escape_filter($this->env, twig_lower_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "method")), "html", null, true);
        echo " operation\" id=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "id"), "html", null, true);
        echo "\">
    <a class=\"heading toggler";
        // line 2
        if ($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "deprecated")) {
            echo " deprecated";
        }
        echo "\" href=\"#";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "id"), "html", null, true);
        echo "\">
        <h3>
            <span class=\"http_method\">
                <i>";
        // line 5
        echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "method")), "html", null, true);
        echo "</i>
            </span>

            ";
        // line 8
        if ($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "deprecated")) {
            // line 9
            echo "            <span class=\"deprecated\">
                <i>DEPRECATED</i>
            </span>
            ";
        }
        // line 13
        echo "
            ";
        // line 14
        if ($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "https")) {
            // line 15
            echo "                <span class=\"icon lock\" title=\"HTTPS\"></span>
            ";
        }
        // line 17
        echo "            ";
        if ($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "authentication")) {
            // line 18
            echo "                <span class=\"icon keys\" title=\"Needs ";
            echo twig_escape_filter($this->env, (((twig_length_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "authenticationRoles")) > 0)) ? (twig_join_filter($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "authenticationRoles"), ", ")) : ("authentication")), "html", null, true);
            echo "\"></span>
            ";
        }
        // line 20
        echo "
            <span class=\"path\">
                ";
        // line 22
        if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "host", array(), "any", true, true)) {
            // line 23
            echo (($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "https")) ? ("https://") : ("http://"));
            // line 24
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "host"), "html", null, true);
        }
        // line 26
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "uri"), "html", null, true);
        echo "
            </span>
        </h3>
        <ul class=\"options\">
            ";
        // line 30
        if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "description", array(), "any", true, true)) {
            // line 31
            echo "                <li>";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "description"), "html", null, true);
            echo "</li>
            ";
        }
        // line 33
        echo "        </ul>
    </a>

    <div class=\"content\" style=\"display: ";
        // line 36
        if ((array_key_exists("displayContent", $context) && ((isset($context["displayContent"]) ? $context["displayContent"] : $this->getContext($context, "displayContent")) == true))) {
            echo "display";
        } else {
            echo "none";
        }
        echo ";\">
        <ul class=\"tabs\">
            <li class=\"selected\" data-pane=\"content\">Documentation</li>
            ";
        // line 39
        if ((isset($context["enableSandbox"]) ? $context["enableSandbox"] : $this->getContext($context, "enableSandbox"))) {
            // line 40
            echo "                <li data-pane=\"sandbox\">Sandbox</li>
            ";
        }
        // line 42
        echo "        </ul>

        <div class=\"panes\">
            <div class=\"pane content selected\">
            ";
        // line 46
        if (($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "documentation", array(), "any", true, true) && (!twig_test_empty($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "documentation"))))) {
            // line 47
            echo "                <h4>Documentation</h4>
                <div>";
            // line 48
            echo $this->env->getExtension('nelmio_api_doc')->markdown($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "documentation"));
            echo "</div>
            ";
        }
        // line 50
        echo "
            ";
        // line 51
        if (($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "link", array(), "any", true, true) && (!twig_test_empty($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "link"))))) {
            // line 52
            echo "                <h4>Link</h4>
                <div><a href=\"";
            // line 53
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "link"), "html", null, true);
            echo "\" target=\"_blank\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "link"), "html", null, true);
            echo "</a></div>
            ";
        }
        // line 55
        echo "
            ";
        // line 56
        if (($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "requirements", array(), "any", true, true) && (!twig_test_empty($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "requirements"))))) {
            // line 57
            echo "                <h4>Requirements</h4>
                <table class=\"fullwidth\">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Requirement</th>
                            <th>Type</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        ";
            // line 68
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "requirements"));
            foreach ($context['_seq'] as $context["name"] => $context["infos"]) {
                // line 69
                echo "                            <tr>
                                <td>";
                // line 70
                echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : $this->getContext($context, "name")), "html", null, true);
                echo "</td>
                                <td>";
                // line 71
                echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["infos"]) ? $context["infos"] : null), "requirement", array(), "any", true, true)) ? ($this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "requirement")) : ("")), "html", null, true);
                echo "</td>
                                <td>";
                // line 72
                echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["infos"]) ? $context["infos"] : null), "dataType", array(), "any", true, true)) ? ($this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "dataType")) : ("")), "html", null, true);
                echo "</td>
                                <td>";
                // line 73
                echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["infos"]) ? $context["infos"] : null), "description", array(), "any", true, true)) ? ($this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "description")) : ("")), "html", null, true);
                echo "</td>
                            </tr>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['name'], $context['infos'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 76
            echo "                    </tbody>
                </table>
            ";
        }
        // line 79
        echo "
            ";
        // line 80
        if (($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "filters", array(), "any", true, true) && (!twig_test_empty($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "filters"))))) {
            // line 81
            echo "                <h4>Filters</h4>
                <table class=\"fullwidth\">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Information</th>
                        </tr>
                    </thead>
                    <tbody>
                    ";
            // line 90
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "filters"));
            foreach ($context['_seq'] as $context["name"] => $context["infos"]) {
                // line 91
                echo "                        <tr>
                            <td>";
                // line 92
                echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : $this->getContext($context, "name")), "html", null, true);
                echo "</td>
                            <td>
                                <table>
                                ";
                // line 95
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")));
                foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                    // line 96
                    echo "                                    <tr>
                                        <td>";
                    // line 97
                    echo twig_escape_filter($this->env, twig_title_string_filter($this->env, (isset($context["key"]) ? $context["key"] : $this->getContext($context, "key"))), "html", null, true);
                    echo "</td>
                                        <td>";
                    // line 98
                    echo twig_escape_filter($this->env, trim(strtr(twig_jsonencode_filter((isset($context["value"]) ? $context["value"] : $this->getContext($context, "value"))), array("\\\\" => "\\")), "\""), "html", null, true);
                    echo "</td>
                                    </tr>
                                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 101
                echo "                                </table>
                            </td>
                        </tr>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['name'], $context['infos'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 105
            echo "                    </tbody>
                </table>
            ";
        }
        // line 108
        echo "
            ";
        // line 109
        if (($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "parameters", array(), "any", true, true) && (!twig_test_empty($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "parameters"))))) {
            // line 110
            echo "                <h4>Parameters</h4>
                <table class='fullwidth'>
                    <thead>
                        <tr>
                            <th>Parameter</th>
                            <th>Type</th>
                            <th>Required?</th>
                            <th>Format</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        ";
            // line 122
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "parameters"));
            foreach ($context['_seq'] as $context["name"] => $context["infos"]) {
                // line 123
                echo "                            ";
                if ((!$this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "readonly"))) {
                    // line 124
                    echo "                                <tr>
                                    <td>";
                    // line 125
                    echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : $this->getContext($context, "name")), "html", null, true);
                    echo "</td>
                                    <td>";
                    // line 126
                    echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["infos"]) ? $context["infos"] : null), "dataType", array(), "any", true, true)) ? ($this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "dataType")) : ("")), "html", null, true);
                    echo "</td>
                                    <td>";
                    // line 127
                    echo (($this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "required")) ? ("true") : ("false"));
                    echo "</td>
                                    <td>";
                    // line 128
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "format"), "html", null, true);
                    echo "</td>
                                    <td>";
                    // line 129
                    echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["infos"]) ? $context["infos"] : null), "description", array(), "any", true, true)) ? ($this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "description")) : ("")), "html", null, true);
                    echo "</td>
                                </tr>
                            ";
                }
                // line 132
                echo "                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['name'], $context['infos'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 133
            echo "                    </tbody>
                </table>
            ";
        }
        // line 136
        echo "
            ";
        // line 137
        if (($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "response", array(), "any", true, true) && (!twig_test_empty($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "response"))))) {
            // line 138
            echo "                <h4>Return</h4>
                <table class='fullwidth'>
                    <thead>
                        <tr>
                            <th>Parameter</th>
                            <th>Type</th>
                            <th>Versions</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        ";
            // line 149
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "response"));
            foreach ($context['_seq'] as $context["name"] => $context["infos"]) {
                // line 150
                echo "                            <tr>
                                <td>";
                // line 151
                echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : $this->getContext($context, "name")), "html", null, true);
                echo "</td>
                                <td>";
                // line 152
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "dataType"), "html", null, true);
                echo "</td>
                                <td>";
                // line 153
                $this->env->loadTemplate("NelmioApiDocBundle:Components:version.html.twig")->display(array("sinceVersion" => $this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "sinceVersion"), "untilVersion" => $this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "untilVersion")));
                echo "</td>
                                <td>";
                // line 154
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "description"), "html", null, true);
                echo "</td>
                            </tr>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['name'], $context['infos'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 157
            echo "                    </tbody>
                </table>
            ";
        }
        // line 160
        echo "
            ";
        // line 161
        if (($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "statusCodes", array(), "any", true, true) && (!twig_test_empty($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "statusCodes"))))) {
            // line 162
            echo "                <h4>Status Codes</h4>
                <table class=\"fullwidth\">
                    <thead>
                    <tr>
                        <th>Status Code</th>
                        <th>Description</th>
                    </tr>
                    </thead>
                    <tbody>
                    ";
            // line 171
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "statusCodes"));
            foreach ($context['_seq'] as $context["status_code"] => $context["descriptions"]) {
                // line 172
                echo "                        <tr>
                            <td><a href=\"http://en.wikipedia.org/wiki/HTTP_";
                // line 173
                echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
                echo "\" target=\"_blank\">";
                echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
                echo "<a/></td>
                            <td>
                                <ul>
                                    ";
                // line 176
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["descriptions"]) ? $context["descriptions"] : $this->getContext($context, "descriptions")));
                foreach ($context['_seq'] as $context["_key"] => $context["description"]) {
                    // line 177
                    echo "                                        <li>";
                    echo twig_escape_filter($this->env, (isset($context["description"]) ? $context["description"] : $this->getContext($context, "description")), "html", null, true);
                    echo "</li>
                                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['description'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 179
                echo "                                </ul>
                            </td>
                        </tr>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['status_code'], $context['descriptions'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 183
            echo "                    </tbody>
                </table>
            ";
        }
        // line 186
        echo "
            ";
        // line 187
        if (($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "cache", array(), "any", true, true) && (!twig_test_empty($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "cache"))))) {
            // line 188
            echo "                <h4>Cache</h4>
                <div>";
            // line 189
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "cache"), "html", null, true);
            echo "s</div>
            ";
        }
        // line 191
        echo "
            </div>

            ";
        // line 194
        if ((isset($context["enableSandbox"]) ? $context["enableSandbox"] : $this->getContext($context, "enableSandbox"))) {
            // line 195
            echo "                <div class=\"pane sandbox\">
                    ";
            // line 196
            if ((((!(null === $this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request"))) && $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "https")) && ($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request"), "secure") != $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "https")))) {
                // line 197
                echo "                    Please reload the documentation using the scheme ";
                if ($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "https")) {
                    echo "HTTPS";
                } else {
                    echo "HTTP";
                }
                echo " if you want to use the sandbox.
                    ";
            } else {
                // line 199
                echo "                        <form method=\"";
                echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "method")), "html", null, true);
                echo "\" action=\"";
                if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "host", array(), "any", true, true)) {
                    echo (($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "https")) ? ("https://") : ("http://"));
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "host"), "html", null, true);
                }
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "uri"), "html", null, true);
                echo "\">
                            <fieldset class=\"parameters\">
                                <legend>Input</legend>
                                ";
                // line 202
                if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "requirements", array(), "any", true, true)) {
                    // line 203
                    echo "                                    <h4>Requirements</h4>
                                    ";
                    // line 204
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "requirements"));
                    foreach ($context['_seq'] as $context["name"] => $context["infos"]) {
                        // line 205
                        echo "                                        <p class=\"tuple\">
                                            <input type=\"text\" class=\"key\" value=\"";
                        // line 206
                        echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : $this->getContext($context, "name")), "html", null, true);
                        echo "\" placeholder=\"Key\" />
                                            <span>=</span>
                                            <input type=\"text\" class=\"value\" placeholder=\"";
                        // line 208
                        if ($this->getAttribute((isset($context["infos"]) ? $context["infos"] : null), "description", array(), "any", true, true)) {
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "description"), "html", null, true);
                        } else {
                            echo "Value";
                        }
                        echo "\" ";
                        if ($this->getAttribute((isset($context["infos"]) ? $context["infos"] : null), "default", array(), "any", true, true)) {
                            echo " value=\"";
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "default"), "html", null, true);
                            echo "\" ";
                        } elseif (((isset($context["name"]) ? $context["name"] : $this->getContext($context, "name")) == "_format")) {
                            echo " value=\"json\" ";
                        }
                        echo "/> <span class=\"remove\">-</span>
                                        </p>
                                    ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['name'], $context['infos'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 211
                    echo "                                ";
                }
                // line 212
                echo "                                ";
                if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "filters", array(), "any", true, true)) {
                    // line 213
                    echo "                                    <h4>Filters</h4>
                                    ";
                    // line 214
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "filters"));
                    foreach ($context['_seq'] as $context["name"] => $context["infos"]) {
                        // line 215
                        echo "                                        <p class=\"tuple\">
                                            <input type=\"text\" class=\"key\" value=\"";
                        // line 216
                        echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : $this->getContext($context, "name")), "html", null, true);
                        echo "\" placeholder=\"Key\" />
                                            <span>=</span>
                                            <input type=\"text\" class=\"value\" placeholder=\"";
                        // line 218
                        if ($this->getAttribute((isset($context["infos"]) ? $context["infos"] : null), "description", array(), "any", true, true)) {
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "description"), "html", null, true);
                        } else {
                            echo "Value";
                        }
                        echo "\" ";
                        if ($this->getAttribute((isset($context["infos"]) ? $context["infos"] : null), "default", array(), "any", true, true)) {
                            echo " value=\"";
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "default"), "html", null, true);
                            echo "\" ";
                        }
                        echo "/> <span class=\"remove\">-</span>
                                        </p>
                                    ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['name'], $context['infos'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 221
                    echo "                                ";
                }
                // line 222
                echo "                                ";
                if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "parameters", array(), "any", true, true)) {
                    // line 223
                    echo "                                    <h4>Parameters</h4>
                                    ";
                    // line 224
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "parameters"));
                    foreach ($context['_seq'] as $context["name"] => $context["infos"]) {
                        // line 225
                        echo "                                    ";
                        if ((!$this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "readonly"))) {
                            // line 226
                            echo "                                        <p class=\"tuple\">
                                            <input type=\"text\" class=\"key\" value=\"";
                            // line 227
                            echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : $this->getContext($context, "name")), "html", null, true);
                            echo "\" placeholder=\"Key\" />
                                            <span>=</span>
                                            <input type=\"text\" class=\"value\" placeholder=\"";
                            // line 229
                            if ($this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "dataType")) {
                                echo "[";
                                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "dataType"), "html", null, true);
                                echo "] ";
                            }
                            if ($this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "format")) {
                                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "format"), "html", null, true);
                            }
                            if ($this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "description")) {
                                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "description"), "html", null, true);
                            } else {
                                echo "Value";
                            }
                            echo "\" ";
                            if ($this->getAttribute((isset($context["infos"]) ? $context["infos"] : null), "default", array(), "any", true, true)) {
                                echo " value=\"";
                                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "default"), "html", null, true);
                                echo "\" ";
                            }
                            echo "/> <span class=\"remove\">-</span>
                                        </p>
                                    ";
                        }
                        // line 232
                        echo "                                    ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['name'], $context['infos'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 233
                    echo "                                    <button class=\"add\">New parameter</button>
                                ";
                }
                // line 235
                echo "
                            </fieldset>

                            <fieldset class=\"headers\">
                                <legend>Headers</legend>

                                ";
                // line 241
                if ((isset($context["acceptType"]) ? $context["acceptType"] : $this->getContext($context, "acceptType"))) {
                    // line 242
                    echo "                                    <p class=\"tuple\">
                                        <input type=\"text\" class=\"key\" value=\"Accept\" />
                                        <span>=</span>
                                        <input type=\"text\" class=\"value\" value=\"";
                    // line 245
                    echo twig_escape_filter($this->env, (isset($context["acceptType"]) ? $context["acceptType"] : $this->getContext($context, "acceptType")), "html", null, true);
                    echo "\" /> <span class=\"remove\">-</span>
                                    </p>
                                ";
                }
                // line 248
                echo "
                                <p class=\"tuple\">
                                    <input type=\"text\" class=\"key\" placeholder=\"Key\" />
                                    <span>=</span>
                                    <input type=\"text\" class=\"value\" placeholder=\"Value\" /> <span class=\"remove\">-</span>
                                </p>

                                <button class=\"add\">New header</button>
                            </fieldset>

                            <fieldset class=\"request-content\">
                                <legend>Content</legend>

                                <textarea class=\"content\" placeholder=\"Content set here will override the parameters that do not match the url\"></textarea>

                                <p class=\"tuple\">
                                    <input type=\"text\" class=\"key content-type\" value=\"Content-Type\" disabled=\"disabled\" />
                                    <span>=</span>
                                    <input type=\"text\" class=\"value\" placeholder=\"Value\" />
                                    <button class=\"set-content-type\">Set header</button> <small>Replaces header if set</small>
                                </p>
                            </fieldset>

                            <div class=\"buttons\">
                                <input type=\"submit\" value=\"Try!\" />
                            </div>
                        </form>

                        <script type=\"text/x-tmpl\" class=\"tuple_template\">
                        <p class=\"tuple\">
                            <input type=\"text\" class=\"key\" placeholder=\"Key\" />
                            <span>=</span>
                            <input type=\"text\" class=\"value\" placeholder=\"Value\" /> <span class=\"remove\">-</span>
                        </p>
                        </script>

                        <div class=\"result\">
                            <h4>Request URL</h4>
                            <pre class=\"url\"></pre>

                            <h4>Response Headers&nbsp;<small>[<a href=\"\" class=\"to-expand\">Expand</a>]</small></h4>
                            <pre class=\"headers to-expand\"></pre>

                            <h4>Response Body&nbsp;<small>[<a href=\"\" class=\"to-raw\">Raw</a>]</small></h4>
                            <pre class=\"response prettyprint\"></pre>
                        </div>
                    ";
            }
            // line 295
            echo "                </div>
            ";
        }
        // line 297
        echo "        </div>
    </div>
</li>
";
    }

    public function getTemplateName()
    {
        return "NelmioApiDocBundle::method.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  689 => 297,  685 => 295,  636 => 248,  630 => 245,  625 => 242,  623 => 241,  615 => 235,  611 => 233,  605 => 232,  581 => 229,  576 => 227,  573 => 226,  570 => 225,  566 => 224,  563 => 223,  560 => 222,  557 => 221,  538 => 218,  533 => 216,  530 => 215,  526 => 214,  523 => 213,  517 => 211,  491 => 206,  488 => 205,  484 => 204,  481 => 203,  456 => 197,  454 => 196,  451 => 195,  449 => 194,  439 => 189,  436 => 188,  434 => 187,  431 => 186,  426 => 183,  417 => 179,  408 => 177,  404 => 176,  396 => 173,  389 => 171,  378 => 162,  376 => 161,  373 => 160,  359 => 154,  351 => 152,  344 => 150,  340 => 149,  327 => 138,  325 => 137,  317 => 133,  311 => 132,  301 => 128,  297 => 127,  293 => 126,  289 => 125,  286 => 124,  279 => 122,  265 => 110,  263 => 109,  260 => 108,  255 => 105,  237 => 98,  233 => 97,  226 => 95,  213 => 90,  202 => 81,  200 => 80,  197 => 79,  192 => 76,  175 => 71,  146 => 55,  134 => 51,  126 => 48,  53 => 14,  520 => 212,  513 => 403,  510 => 402,  506 => 400,  501 => 398,  496 => 208,  479 => 202,  468 => 380,  466 => 199,  347 => 151,  335 => 258,  333 => 257,  137 => 67,  110 => 45,  104 => 42,  76 => 24,  20 => 1,  34 => 6,  480 => 162,  474 => 382,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 191,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 172,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 157,  365 => 111,  362 => 110,  360 => 109,  355 => 153,  341 => 260,  337 => 103,  322 => 136,  314 => 99,  312 => 98,  309 => 97,  305 => 129,  298 => 91,  294 => 90,  285 => 89,  283 => 123,  278 => 86,  268 => 85,  264 => 84,  258 => 81,  252 => 80,  247 => 78,  241 => 77,  229 => 73,  220 => 92,  214 => 69,  177 => 65,  169 => 60,  140 => 55,  132 => 51,  128 => 49,  107 => 36,  61 => 13,  273 => 200,  269 => 94,  254 => 92,  243 => 88,  240 => 86,  238 => 85,  235 => 74,  230 => 96,  227 => 81,  224 => 71,  221 => 77,  219 => 76,  217 => 91,  208 => 68,  204 => 72,  179 => 72,  159 => 61,  143 => 56,  135 => 53,  119 => 42,  102 => 32,  71 => 27,  67 => 26,  63 => 15,  59 => 17,  38 => 6,  94 => 33,  89 => 35,  85 => 33,  75 => 17,  68 => 20,  56 => 21,  87 => 25,  21 => 2,  26 => 2,  93 => 28,  88 => 31,  78 => 30,  46 => 7,  27 => 4,  44 => 9,  31 => 5,  28 => 7,  201 => 92,  196 => 90,  183 => 73,  171 => 70,  166 => 71,  163 => 62,  158 => 67,  156 => 66,  151 => 57,  142 => 59,  138 => 54,  136 => 52,  121 => 46,  117 => 44,  105 => 40,  91 => 27,  62 => 18,  49 => 19,  24 => 4,  25 => 4,  19 => 1,  79 => 26,  72 => 22,  69 => 25,  47 => 17,  40 => 8,  37 => 10,  22 => 2,  246 => 101,  157 => 56,  145 => 46,  139 => 53,  131 => 50,  123 => 47,  120 => 40,  115 => 42,  111 => 40,  108 => 44,  101 => 41,  98 => 31,  96 => 38,  83 => 25,  74 => 23,  66 => 15,  55 => 15,  52 => 21,  50 => 13,  43 => 8,  41 => 7,  35 => 5,  32 => 4,  29 => 3,  209 => 82,  203 => 78,  199 => 67,  193 => 73,  189 => 71,  187 => 84,  182 => 66,  176 => 64,  173 => 65,  168 => 69,  164 => 68,  162 => 57,  154 => 58,  149 => 56,  147 => 58,  144 => 49,  141 => 48,  133 => 55,  130 => 41,  125 => 44,  122 => 43,  116 => 41,  112 => 42,  109 => 39,  106 => 36,  103 => 32,  99 => 36,  95 => 28,  92 => 36,  86 => 30,  82 => 32,  80 => 19,  73 => 19,  64 => 17,  60 => 22,  57 => 11,  54 => 10,  51 => 14,  48 => 13,  45 => 17,  42 => 8,  39 => 12,  36 => 5,  33 => 9,  30 => 7,);
    }
}
