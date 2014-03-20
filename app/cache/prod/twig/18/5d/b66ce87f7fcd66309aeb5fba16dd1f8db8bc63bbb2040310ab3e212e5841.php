<?php

/* NelmioApiDocBundle::layout.html.twig */
class __TwigTemplate_185db66ce87f7fcd66309aeb5fba16dd1f8db8bc63bbb2040310ab3e212e5841 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html>
    <head>
        <meta charset=\"utf-8\" />
        <!-- Always force latest IE rendering engine (even in intranet) and Chrome Frame -->
        <meta content=\"IE=edge,chrome=1\" http-equiv=\"X-UA-Compatible\" />
        <title>";
        // line 7
        echo twig_escape_filter($this->env, (isset($context["apiName"]) ? $context["apiName"] : null), "html", null, true);
        echo "</title>
        <style type=\"text/css\">
            ";
        // line 9
        echo (isset($context["css"]) ? $context["css"] : null);
        echo "
        </style>
        <script type=\"text/javascript\">
            ";
        // line 12
        echo (isset($context["js"]) ? $context["js"] : null);
        echo "
        </script>
    </head>
    <body>
        <div id=\"header\">
            <a href=\"";
        // line 17
        echo $this->env->getExtension('routing')->getPath("nelmio_api_doc_index");
        echo "\"><h1>";
        echo twig_escape_filter($this->env, (isset($context["apiName"]) ? $context["apiName"] : null), "html", null, true);
        echo "</h1></a>
            <div id=\"sandbox_configuration\">
                body format:
                <select id=\"body_format\">
                    <option value=\"x-www-form-urlencoded\"";
        // line 21
        echo ((((isset($context["bodyFormat"]) ? $context["bodyFormat"] : null) == "form")) ? (" selected") : (""));
        echo ">Form Data</option>
                    <option value=\"json\"";
        // line 22
        echo ((((isset($context["bodyFormat"]) ? $context["bodyFormat"] : null) == "json")) ? (" selected") : (""));
        echo ">JSON</option>
                </select>
                request format:
                <select id=\"request_format\">
                    <option value=\"json\"";
        // line 26
        echo ((((isset($context["defaultRequestFormat"]) ? $context["defaultRequestFormat"] : null) == "json")) ? (" selected") : (""));
        echo ">JSON</option>
                    <option value=\"xml\"";
        // line 27
        echo ((((isset($context["defaultRequestFormat"]) ? $context["defaultRequestFormat"] : null) == "xml")) ? (" selected") : (""));
        echo ">XML</option>
                </select>
                ";
        // line 29
        if (((isset($context["authentication"]) ? $context["authentication"] : null) && twig_in_filter($this->getAttribute((isset($context["authentication"]) ? $context["authentication"] : null), "delivery"), array(0 => "query", 1 => "http_basic", 2 => "header")))) {
            // line 30
            echo "                    api key: <input type=\"text\" id=\"api_key\" value=\"\"/>
                ";
        }
        // line 32
        echo "                ";
        if (((isset($context["authentication"]) ? $context["authentication"] : null) && twig_in_filter($this->getAttribute((isset($context["authentication"]) ? $context["authentication"] : null), "delivery"), array(0 => "http_basic")))) {
            // line 33
            echo "                    api pass: <input type=\"text\" id=\"api_pass\" value=\"\"/>
                ";
        }
        // line 35
        echo "                ";
        if (((isset($context["authentication"]) ? $context["authentication"] : null) && $this->getAttribute((isset($context["authentication"]) ? $context["authentication"] : null), "custom_endpoint"))) {
            // line 36
            echo "                    api endpoint: <input type=\"text\" id=\"api_endpoint\" value=\"\"/>
                ";
        }
        // line 38
        echo "            </div>
            <br style=\"clear: both;\" />
        </div>
        ";
        // line 41
        $template = $this->env->resolveTemplate((isset($context["motdTemplate"]) ? $context["motdTemplate"] : null));
        $template->display($context);
        // line 42
        echo "        <div class=\"container\" id=\"resources_container\">
            <ul id=\"resources\">
                ";
        // line 44
        $this->displayBlock('content', $context, $blocks);
        // line 45
        echo "            </ul>
        </div>
        <p id=\"colophon\">
            Documentation auto-generated on ";
        // line 48
        echo twig_escape_filter($this->env, (isset($context["date"]) ? $context["date"] : null), "html", null, true);
        echo "
        </p>
        <script type=\"text/javascript\">

            \$(window).load(function() {
                var id = (window.location.hash || '').substr(1).replace( /([:\\.\\[\\]\\{\\}])/g, \"\\\\\$1\");
                var elem = \$('#' + id);
                if (elem.length) {
                    setTimeout(function() {
                        \$('body,html').scrollTop(elem.position().top);
                    });
                    elem.find('a.toggler').click();
                }
            });

            \$('.toggler').click(function() {
                \$(this).next().slideToggle('fast');
            });

            ";
        // line 67
        if ((isset($context["enableSandbox"]) ? $context["enableSandbox"] : null)) {
            // line 68
            echo "                var toggleButtonText = function (\$btn) {
                    if (\$btn.text() === 'Default') {
                        \$btn.text('Raw');
                    } else {
                        \$btn.text('Default');
                    }
                };

                var renderRawBody = function (\$container) {
                    var rawData, \$btn;

                    rawData = \$container.data('raw-response');
                    \$btn = \$container.parents('.pane').find('.to-raw');

                    \$container.addClass('prettyprinted');
                    \$container.html(\$('<div/>').text(rawData).html());

                    \$btn.removeClass('to-raw');
                    \$btn.addClass('to-prettify');

                    toggleButtonText(\$btn);
                };

                var renderPrettifiedBody = function (\$container) {
                    var rawData, \$btn;

                    rawData = \$container.data('raw-response');
                    \$btn = \$container.parents('.pane').find('.to-prettify');

                    \$container.removeClass('prettyprinted');
                    \$container.html(prettifyResponse(rawData));
                    prettyPrint && prettyPrint();

                    \$btn.removeClass('to-prettify');
                    \$btn.addClass('to-raw');

                    toggleButtonText(\$btn);
                };

                var unflattenDict = function (body) {
                    var found = true;
                    while(found) {
                        found = false;

                        for (var key in body) {
                            var okey;
                            var value = body[key];
                            var dictMatch = key.match(/^(.+)\\[([^\\]]+)\\]\$/);

                            if(dictMatch) {
                                found = true;
                                okey = dictMatch[1];
                                var subkey = dictMatch[2];
                                body[okey] = body[okey] || {};
                                body[okey][subkey] = value;
                                delete body[key];
                            } else {
                                body[key] = value;
                            }
                        }
                    }
                    return body;
                }

                \$('.tabs li').click(function() {
                    var contentGroup = \$(this).parents('.content');

                    \$('.pane.selected', contentGroup).removeClass('selected');
                    \$('.pane.' + \$(this).data('pane'), contentGroup).addClass('selected');

                    \$('li', \$(this).parent()).removeClass('selected');
                    \$(this).addClass('selected');
                });

                var prettifyResponse = function(text) {
                    try {
                        var data = typeof text === 'string' ? JSON.parse(text) : text;
                        text = JSON.stringify(data, undefined, '  ');
                    } catch (err) {
                    }

                    // HTML encode the result
                    return \$('<div>').text(text).html();
                };

                var displayFinalUrl = function(xhr, method, url, container) {
                    container.text(method + ' ' + url);
                };

                var displayResponseData = function(xhr, container) {
                    var data = xhr.responseText;

                    container.data('raw-response', data);

                    renderPrettifiedBody(container);

                    container.parents('.pane').find('.to-prettify').text('Raw');
                    container.parents('.pane').find('.to-raw').text('Raw');
                };

                var displayResponseHeaders = function(xhr, container) {
                    var text = xhr.status + ' ' + xhr.statusText + \"\\n\\n\";
                    text += xhr.getAllResponseHeaders();

                    container.text(text);
                };

                var displayResponse = function(xhr, method, url, result_container) {
                    displayFinalUrl(xhr, method, url, \$('.url', result_container));
                    displayResponseData(xhr, \$('.response', result_container));
                    displayResponseHeaders(xhr, \$('.headers', result_container));

                    result_container.show();
                };

                \$('.pane.sandbox form').submit(function() {
                    var url = \$(this).attr('action'),
                        method = \$(this).attr('method'),
                        self = this,
                        params = {},
                        headers = {},
                        content = \$(this).find('textarea.content').val(),
                        result_container = \$('.result', \$(this).parent());

                    if (method === 'ANY') {
                        method = 'POST';
                    } else if (method.indexOf('|') !== -1) {
                        method = method.split('|').sort().pop();
                    }

                    // set default requestFormat
                    var requestFormat = \$('#request_format').val();
                    var requestFormatMethod = '";
            // line 200
            echo twig_escape_filter($this->env, (isset($context["requestFormatMethod"]) ? $context["requestFormatMethod"] : null), "html", null, true);
            echo "';
                    if (requestFormatMethod == 'format_param') {
                        params['_format'] = requestFormat;
                    } else if (requestFormatMethod == 'accept_header') {
                        headers['Accept'] = 'application/' + requestFormat;
                    }

                    // set default bodyFormat
                    var bodyFormat = \$('#body_format').val();

                    if(!('Content-type' in headers)) {
                        headers['Content-type'] = 'application/'+bodyFormat;
                    }

                    // retrieve all the parameters to send
                    \$('.parameters .tuple', \$(this)).each(function() {
                        var key, value;

                        key = \$('.key', \$(this)).val();
                        value = \$('.value', \$(this)).val();

                        if (value) {
                            params[key] = value;
                        }
                    });

                    // retrieve the additional headers to send
                    \$('.headers .tuple', \$(this)).each(function() {
                        var key, value;

                        key = \$('.key', \$(this)).val();
                        value = \$('.value', \$(this)).val();

                        if (value) {
                            headers[key] = value;
                        }

                    });

                    // fix parameters in URL
                    for (var key in \$.extend({}, params)) {
                        if (url.indexOf('{' + key + '}') !== -1) {
                            url = url.replace('{' + key + '}', params[key]);
                            delete params[key];
                        }
                    };

                    // disable all the fiels and buttons
                    \$('input, button', \$(this)).attr('disabled', 'disabled');

                    // append the query authentication
                    if (authentication_delivery == 'query') {
                        url += url.indexOf('?') > 0 ? '&' : '?';
                        url += api_key_parameter + '=' + \$('#api_key').val();
                    }

                    // prepare the api enpoint
                    ";
            // line 257
            if (((((isset($context["endpoint"]) ? $context["endpoint"] : null) == "") && (!(null === $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request")))) && $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request"), "host"))) {
                // line 258
                echo "var endpoint = '";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request"), "getBaseUrl", array(), "method"), "html", null, true);
                echo "';
                    ";
            } else {
                // line 260
                echo "var endpoint = '";
                echo twig_escape_filter($this->env, (isset($context["endpoint"]) ? $context["endpoint"] : null), "html", null, true);
                echo "';
                    ";
            }
            // line 262
            echo "if (\$('#api_endpoint') && \$('#api_endpoint').val() != null) {
                        endpoint = \$('#api_endpoint').val();
                    }

                    // prepare final parameters
                    var body = {};
                    if(bodyFormat == 'json' && method != 'GET') {
                        body = unflattenDict(params);
                        body = JSON.stringify(body);
                    } else {
                        body = params;
                    }
                    var data = content.length ? content : body;

                    // and trigger the API call
                    \$.ajax({
                        url: endpoint + url,
                        type: method,
                        data: data,
                        headers: headers,
                        crossDomain: true,
                        beforeSend: function (xhr) {
                            if (authentication_delivery == 'http_basic') {
                                xhr.setRequestHeader('Authorization', 'Basic ' + btoa(\$('#api_key').val() + ':' + \$('#api_pass').val()));
                            }else if(authentication_delivery == 'header') {
                                xhr.setRequestHeader(api_key_parameter, \$('#api_key').val());
                            }
                        },
                        complete: function(xhr) {
                            displayResponse(xhr, method, url, result_container);

                            // and enable them back
                            \$('input:not(.content-type), button', \$(self)).removeAttr('disabled');
                        }
                    });

                    return false;
                });

                \$('.operations').on('click', '.operation > a', function(e) {
                    if (history.pushState) {
                        history.pushState(null, null, \$(this).attr('href'));
                        e.preventDefault();
                    }
                });

                \$('.pane.sandbox').on('click', '.to-raw', function(e) {
                    renderRawBody(\$(this).parents('.pane').find('.response'));

                    e.preventDefault();
                });

                \$('.pane.sandbox').on('click', '.to-prettify', function(e) {
                    renderPrettifiedBody(\$(this).parents('.pane').find('.response'));

                    e.preventDefault();
                });

                \$('.pane.sandbox').on('click', '.to-expand, .to-shrink', function(e) {
                    var \$headers = \$(this).parents('.result').find('.headers');
                    var \$label = \$(this).parents('.result').find('a.to-expand');

                    if (\$headers.hasClass('to-expand')) {
                        \$headers.removeClass('to-expand');
                        \$headers.addClass('to-shrink');
                        \$label.text('Shrink');
                    } else {
                        \$headers.removeClass('to-shrink');
                        \$headers.addClass('to-expand');
                        \$label.text('Expand');
                    }

                    e.preventDefault();
                });

                \$('.pane.sandbox').on('click', '.add', function() {
                    var html = \$(this).parents('.pane').find('.tuple_template').html();

                    \$(this).before(html);

                    return false;
                });

                \$('.pane.sandbox').on('click', '.remove', function() {
                    \$(this).parent().remove();
                });

                \$('.pane.sandbox').on('click', '.set-content-type', function(e) {
                    var html;
                    var \$element;
                    var \$headers = \$(this).parents('form').find('.headers');
                    var content_type = \$(this).prev('input.value').val();

                    e.preventDefault();

                    if (content_type.length === 0) {
                        return;
                    }

                    \$headers.find('input.key').each(function() {
                        if (\$.trim(\$(this).val().toLowerCase()) === 'content-type') {
                            \$element = \$(this).parents('p');
                            return false;
                        }
                    });

                    if (typeof \$element === 'undefined') {
                        html = \$(this).parents('.pane').find('.tuple_template').html();

                        \$element = \$headers.find('legend').after(html).next('p');
                    }

                    \$element.find('input.key').val('Content-Type');
                    \$element.find('input.value').val(content_type);

                });

                ";
            // line 379
            if (((isset($context["authentication"]) ? $context["authentication"] : null) && ($this->getAttribute((isset($context["authentication"]) ? $context["authentication"] : null), "delivery") == "http_basic"))) {
                // line 380
                echo "                var authentication_delivery = '";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["authentication"]) ? $context["authentication"] : null), "delivery"), "html", null, true);
                echo "';
                ";
            } elseif (((isset($context["authentication"]) ? $context["authentication"] : null) && ($this->getAttribute((isset($context["authentication"]) ? $context["authentication"] : null), "delivery") == "query"))) {
                // line 382
                echo "                var authentication_delivery = '";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["authentication"]) ? $context["authentication"] : null), "delivery"), "html", null, true);
                echo "';
                var api_key_parameter = '";
                // line 383
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["authentication"]) ? $context["authentication"] : null), "name"), "html", null, true);
                echo "';
                var search = window.location.search;
                var api_key_start = search.indexOf(api_key_parameter) + api_key_parameter.length + 1;

                if (api_key_start > 0 ) {
                    var api_key_end = search.indexOf('&', api_key_start);

                    var api_key = -1 == api_key_end
                        ? search.substr(api_key_start)
                        : search.substring(api_key_start, api_key_end);

                    \$('#api_key').val(api_key);
                }
                ";
            } elseif (((isset($context["authentication"]) ? $context["authentication"] : null) && ($this->getAttribute((isset($context["authentication"]) ? $context["authentication"] : null), "delivery") == "header"))) {
                // line 397
                echo "                var authentication_delivery = '";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["authentication"]) ? $context["authentication"] : null), "delivery"), "html", null, true);
                echo "';
                var api_key_parameter = '";
                // line 398
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["authentication"]) ? $context["authentication"] : null), "name"), "html", null, true);
                echo "';
                ";
            } else {
                // line 400
                echo "                var authentication_delivery = false;
                ";
            }
            // line 402
            echo "            ";
        }
        // line 403
        echo "        </script>
    </body>
</html>
";
    }

    // line 44
    public function block_content($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "NelmioApiDocBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  520 => 44,  513 => 403,  510 => 402,  506 => 400,  501 => 398,  496 => 397,  479 => 383,  468 => 380,  466 => 379,  347 => 262,  335 => 258,  333 => 257,  139 => 68,  137 => 67,  110 => 45,  104 => 42,  96 => 38,  76 => 29,  20 => 1,  34 => 6,  480 => 162,  474 => 382,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 260,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 91,  294 => 90,  285 => 89,  283 => 88,  278 => 86,  268 => 85,  264 => 84,  258 => 81,  252 => 80,  247 => 78,  241 => 77,  229 => 73,  220 => 70,  214 => 69,  177 => 65,  169 => 60,  140 => 55,  132 => 51,  128 => 49,  111 => 37,  107 => 36,  61 => 13,  273 => 200,  269 => 94,  254 => 92,  246 => 90,  243 => 88,  240 => 86,  238 => 85,  235 => 74,  230 => 82,  227 => 81,  224 => 71,  221 => 77,  219 => 76,  217 => 75,  208 => 68,  204 => 72,  179 => 69,  159 => 61,  143 => 56,  135 => 53,  131 => 52,  119 => 42,  108 => 44,  102 => 32,  71 => 27,  67 => 26,  63 => 15,  59 => 14,  47 => 17,  38 => 6,  94 => 28,  89 => 35,  85 => 33,  79 => 18,  75 => 17,  68 => 14,  56 => 21,  50 => 10,  29 => 3,  87 => 25,  72 => 16,  55 => 15,  21 => 2,  26 => 6,  98 => 31,  93 => 28,  88 => 6,  78 => 30,  46 => 7,  27 => 4,  40 => 8,  44 => 12,  35 => 5,  31 => 5,  43 => 8,  41 => 7,  28 => 7,  201 => 92,  196 => 90,  183 => 82,  171 => 61,  166 => 71,  163 => 62,  158 => 67,  156 => 66,  151 => 63,  142 => 59,  138 => 54,  136 => 56,  123 => 47,  121 => 46,  117 => 44,  115 => 48,  105 => 40,  101 => 41,  91 => 27,  69 => 25,  66 => 15,  62 => 23,  49 => 19,  24 => 4,  32 => 4,  25 => 4,  22 => 2,  19 => 1,  209 => 82,  203 => 78,  199 => 67,  193 => 73,  189 => 71,  187 => 84,  182 => 66,  176 => 64,  173 => 65,  168 => 72,  164 => 59,  162 => 59,  154 => 58,  149 => 51,  147 => 58,  144 => 49,  141 => 48,  133 => 55,  130 => 41,  125 => 44,  122 => 43,  116 => 41,  112 => 42,  109 => 34,  106 => 33,  103 => 32,  99 => 31,  95 => 28,  92 => 36,  86 => 28,  82 => 32,  80 => 19,  73 => 19,  64 => 17,  60 => 22,  57 => 11,  54 => 10,  51 => 14,  48 => 13,  45 => 8,  42 => 7,  39 => 12,  36 => 5,  33 => 9,  30 => 7,);
    }
}
