<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Pasabuyan API Documentation</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .bash-example code { display: none; }
                    body .content .javascript-example code { display: none; }
            </style>

    <script>
        var tryItOutBaseUrl = "http://127.0.0.1:8000";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("/vendor/scribe/js/tryitout-5.1.0.js") }}"></script>

    <script src="{{ asset("/vendor/scribe/js/theme-default-5.1.0.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("/vendor/scribe/images/navbar.png") }}" alt="navbar-image"/>
    </span>
</a>
<div class="tocify-wrapper">
    
            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                    </div>
    
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
                    <ul id="tocify-header-introduction" class="tocify-header">
                <li class="tocify-item level-1" data-unique="introduction">
                    <a href="#introduction">Introduction</a>
                </li>
                            </ul>
                    <ul id="tocify-header-authenticating-requests" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authenticating-requests">
                    <a href="#authenticating-requests">Authenticating requests</a>
                </li>
                            </ul>
                    <ul id="tocify-header-authentication" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authentication">
                    <a href="#authentication">Authentication</a>
                </li>
                                    <ul id="tocify-subheader-authentication" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="authentication-POSTapi-register">
                                <a href="#authentication-POSTapi-register">Register a new user.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="authentication-POSTapi-login">
                                <a href="#authentication-POSTapi-login">Login User</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-trip-management" class="tocify-header">
                <li class="tocify-item level-1" data-unique="trip-management">
                    <a href="#trip-management">Trip Management</a>
                </li>
                                    <ul id="tocify-subheader-trip-management" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="trip-management-GETapi-trips">
                                <a href="#trip-management-GETapi-trips">Get All Trips</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="trip-management-POSTapi-trips">
                                <a href="#trip-management-POSTapi-trips">Create a Trip</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="trip-management-GETapi-trips--id-">
                                <a href="#trip-management-GETapi-trips--id-">Get a Single Trip</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="trip-management-PUTapi-trips--id-">
                                <a href="#trip-management-PUTapi-trips--id-">Update a Trip</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="trip-management-DELETEapi-trips--id-">
                                <a href="#trip-management-DELETEapi-trips--id-">Delete a Trip</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-user-management" class="tocify-header">
                <li class="tocify-item level-1" data-unique="user-management">
                    <a href="#user-management">User Management</a>
                </li>
                                    <ul id="tocify-subheader-user-management" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="user-management-GETapi-user--id-">
                                <a href="#user-management-GETapi-user--id-">Get a Specific User by ID</a>
                            </li>
                                                                        </ul>
                            </ul>
            </div>

    <ul class="toc-footer" id="toc-footer">
                    <li style="padding-bottom: 5px;"><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li style="padding-bottom: 5px;"><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
    </ul>

    <ul class="toc-footer" id="last-updated">
        <li>Last updated: March 5, 2025</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<aside>
    <strong>Base URL</strong>: <code>http://127.0.0.1:8000</code>
</aside>
<pre><code>This documentation aims to provide all the information you need to work with our API.

&lt;aside&gt;As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).&lt;/aside&gt;</code></pre>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>This API is not authenticated.</p>

        <h1 id="authentication">Authentication</h1>

    <p>APIs for user authentication and registration</p>

                                <h2 id="authentication-POSTapi-register">Register a new user.</h2>

<p>
</p>



<span id="example-requests-POSTapi-register">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/register" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"Leonardo da Vinci\",
    \"email\": \"leo@davinci.com\",
    \"password\": \"Le0DaV!nc!\",
    \"password_confirmation\": \"Le0DaV!nc!\",
    \"phone_number\": \"123-456-7890\",
    \"about\": \"Professional overthinker, amateur napper, and certified snack enthusiast..\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/register"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "Leonardo da Vinci",
    "email": "leo@davinci.com",
    "password": "Le0DaV!nc!",
    "password_confirmation": "Le0DaV!nc!",
    "phone_number": "123-456-7890",
    "about": "Professional overthinker, amateur napper, and certified snack enthusiast.."
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-register">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;User registered successfully&quot;,
    &quot;user&quot;: {
        &quot;id&quot;: 1,
        &quot;name&quot;: &quot;Leonardo da Vinci&quot;,
        &quot;email&quot;: &quot;leo@davinci.com&quot;
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (422):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;The given data was invalid.&quot;,
    &quot;errors&quot;: {
        &quot;email&quot;: [
            &quot;The email has already been taken.&quot;
        ]
    }
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-register" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-register"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-register"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-register" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-register">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-register" data-method="POST"
      data-path="api/register"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-register', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-register"
                    onclick="tryItOut('POSTapi-register');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-register"
                    onclick="cancelTryOut('POSTapi-register');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-register"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/register</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-register"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-register"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-register"
               value="Leonardo da Vinci"
               data-component="body">
    <br>
<p>The name of the user. Example: <code>Leonardo da Vinci</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-register"
               value="leo@davinci.com"
               data-component="body">
    <br>
<p>The email of the user. Example: <code>leo@davinci.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTapi-register"
               value="Le0DaV!nc!"
               data-component="body">
    <br>
<p>The password of the user. Must be at least 8 characters long. Example: <code>Le0DaV!nc!</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password_confirmation</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password_confirmation"                data-endpoint="POSTapi-register"
               value="Le0DaV!nc!"
               data-component="body">
    <br>
<p>The password confirmation. Must match the <code>password</code> field. Example: <code>Le0DaV!nc!</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>phone_number</code></b>&nbsp;&nbsp;
<small>optional</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="phone_number"                data-endpoint="POSTapi-register"
               value="123-456-7890"
               data-component="body">
    <br>
<p>The phone number of the user. Must be 8 to 11 digits long. Example: <code>123-456-7890</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>about</code></b>&nbsp;&nbsp;
<small>optional</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="about"                data-endpoint="POSTapi-register"
               value="Professional overthinker, amateur napper, and certified snack enthusiast.."
               data-component="body">
    <br>
<p>Info of the user. Tell us a little about yourself... Example: <code>Professional overthinker, amateur napper, and certified snack enthusiast..</code></p>
        </div>
        </form>

                    <h2 id="authentication-POSTapi-login">Login User</h2>

<p>
</p>

<p>Authenticate a user and return an access token.</p>

<span id="example-requests-POSTapi-login">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/login" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"email\": \"john.doe@example.com\",
    \"password\": \"Password123!\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/login"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "john.doe@example.com",
    "password": "Password123!"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-login">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;user&quot;: {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;John Doe&quot;,
            &quot;email&quot;: &quot;john.doe@example.com&quot;
        },
        &quot;token&quot;: &quot;1|abcdef1234567890&quot;
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: false,
    &quot;message&quot;: &quot;Invalid login credentials&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (422):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: false,
    &quot;errors&quot;: {
        &quot;email&quot;: [
            &quot;The email field is required.&quot;
        ],
        &quot;password&quot;: [
            &quot;The password field is required.&quot;
        ]
    }
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-login" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-login"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-login"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-login">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-login" data-method="POST"
      data-path="api/login"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-login', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-login"
                    onclick="tryItOut('POSTapi-login');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-login"
                    onclick="cancelTryOut('POSTapi-login');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-login"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/login</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-login"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-login"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-login"
               value="john.doe@example.com"
               data-component="body">
    <br>
<p>The email address of the user. Example: <code>john.doe@example.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTapi-login"
               value="Password123!"
               data-component="body">
    <br>
<p>The password for the user. Example: <code>Password123!</code></p>
        </div>
        </form>

                <h1 id="trip-management">Trip Management</h1>

    <p>APIs for managing trips</p>

                                <h2 id="trip-management-GETapi-trips">Get All Trips</h2>

<p>
</p>

<p>Retrieve a list of all trips.</p>

<span id="example-requests-GETapi-trips">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/trips" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/trips"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-trips">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;user_id&quot;: 1,
            &quot;origin_city&quot;: &quot;New York&quot;,
            &quot;origin_country&quot;: &quot;USA&quot;,
            &quot;destination_city&quot;: &quot;Paris&quot;,
            &quot;destination_country&quot;: &quot;France&quot;,
            &quot;departure_date&quot;: &quot;2023-10-01T12:00:00.000000Z&quot;,
            &quot;arrival_date&quot;: &quot;2023-10-07T12:00:00.000000Z&quot;,
            &quot;transportation_mode&quot;: &quot;air&quot;,
            &quot;max_weight_kg&quot;: 20.5,
            &quot;max_volume_l&quot;: 50,
            &quot;notes&quot;: &quot;Fragile items included&quot;,
            &quot;status&quot;: &quot;pending&quot;
        }
    ]
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;No trips found&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-trips" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-trips"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-trips"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-trips" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-trips">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-trips" data-method="GET"
      data-path="api/trips"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-trips', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-trips"
                    onclick="tryItOut('GETapi-trips');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-trips"
                    onclick="cancelTryOut('GETapi-trips');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-trips"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/trips</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-trips"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-trips"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="trip-management-POSTapi-trips">Create a Trip</h2>

<p>
</p>

<p>Store a newly created trip in the database.</p>

<span id="example-requests-POSTapi-trips">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/trips" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"user_id\": 1,
    \"origin_city\": \"New York\",
    \"origin_country\": \"USA\",
    \"destination_city\": \"Paris\",
    \"destination_country\": \"France\",
    \"departure_date\": \"2023-10-01T12:00:00Z\",
    \"arrival_date\": \"2023-10-07T12:00:00Z\",
    \"transportation_mode\": \"air\",
    \"max_weight_kg\": 20.5,
    \"max_volume_l\": 50,
    \"notes\": \"Fragile items included\",
    \"status\": \"pending\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/trips"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "user_id": 1,
    "origin_city": "New York",
    "origin_country": "USA",
    "destination_city": "Paris",
    "destination_country": "France",
    "departure_date": "2023-10-01T12:00:00Z",
    "arrival_date": "2023-10-07T12:00:00Z",
    "transportation_mode": "air",
    "max_weight_kg": 20.5,
    "max_volume_l": 50,
    "notes": "Fragile items included",
    "status": "pending"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-trips">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Trip created successfully&quot;,
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;user_id&quot;: 1,
        &quot;origin_city&quot;: &quot;New York&quot;,
        &quot;origin_country&quot;: &quot;USA&quot;,
        &quot;destination_city&quot;: &quot;Paris&quot;,
        &quot;destination_country&quot;: &quot;France&quot;,
        &quot;departure_date&quot;: &quot;2023-10-01T12:00:00.000000Z&quot;,
        &quot;arrival_date&quot;: &quot;2023-10-07T12:00:00.000000Z&quot;,
        &quot;transportation_mode&quot;: &quot;air&quot;,
        &quot;max_weight_kg&quot;: 20.5,
        &quot;max_volume_l&quot;: 50,
        &quot;notes&quot;: &quot;Fragile items included&quot;,
        &quot;status&quot;: &quot;pending&quot;
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (422):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Validation failed&quot;,
    &quot;errors&quot;: {
        &quot;user_id&quot;: [
            &quot;The user ID field is required.&quot;
        ],
        &quot;departure_date&quot;: [
            &quot;The departure date must be a valid date.&quot;
        ]
    }
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-trips" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-trips"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-trips"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-trips" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-trips">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-trips" data-method="POST"
      data-path="api/trips"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-trips', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-trips"
                    onclick="tryItOut('POSTapi-trips');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-trips"
                    onclick="cancelTryOut('POSTapi-trips');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-trips"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/trips</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-trips"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-trips"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>user_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="user_id"                data-endpoint="POSTapi-trips"
               value="1"
               data-component="body">
    <br>
<p>The ID of the user creating the trip. Example: <code>1</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>origin_city</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="origin_city"                data-endpoint="POSTapi-trips"
               value="New York"
               data-component="body">
    <br>
<p>The origin city of the trip. Example: <code>New York</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>origin_country</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="origin_country"                data-endpoint="POSTapi-trips"
               value="USA"
               data-component="body">
    <br>
<p>The origin country of the trip. Example: <code>USA</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>destination_city</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="destination_city"                data-endpoint="POSTapi-trips"
               value="Paris"
               data-component="body">
    <br>
<p>The destination city of the trip. Example: <code>Paris</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>destination_country</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="destination_country"                data-endpoint="POSTapi-trips"
               value="France"
               data-component="body">
    <br>
<p>The destination country of the trip. Example: <code>France</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>departure_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="departure_date"                data-endpoint="POSTapi-trips"
               value="2023-10-01T12:00:00Z"
               data-component="body">
    <br>
<p>The departure date of the trip (ISO 8601 format). Example: <code>2023-10-01T12:00:00Z</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>arrival_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="arrival_date"                data-endpoint="POSTapi-trips"
               value="2023-10-07T12:00:00Z"
               data-component="body">
    <br>
<p>The arrival date of the trip (ISO 8601 format). Example: <code>2023-10-07T12:00:00Z</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>transportation_mode</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="transportation_mode"                data-endpoint="POSTapi-trips"
               value="air"
               data-component="body">
    <br>
<p>The mode of transportation. Example: <code>air</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>max_weight_kg</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="max_weight_kg"                data-endpoint="POSTapi-trips"
               value="20.5"
               data-component="body">
    <br>
<p>The maximum weight allowed in kilograms. Example: <code>20.5</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>max_volume_l</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="max_volume_l"                data-endpoint="POSTapi-trips"
               value="50"
               data-component="body">
    <br>
<p>The maximum volume allowed in liters. Example: <code>50</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>notes</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="notes"                data-endpoint="POSTapi-trips"
               value="Fragile items included"
               data-component="body">
    <br>
<p>nullable Additional notes about the trip. Example: <code>Fragile items included</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="POSTapi-trips"
               value="pending"
               data-component="body">
    <br>
<p>The status of the trip. Example: <code>pending</code></p>
        </div>
        </form>

                    <h2 id="trip-management-GETapi-trips--id-">Get a Single Trip</h2>

<p>
</p>

<p>Retrieve details of a specific trip by its ID.</p>

<span id="example-requests-GETapi-trips--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/trips/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/trips/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-trips--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;trip&quot;: {
            &quot;id&quot;: 1,
            &quot;user_id&quot;: 1,
            &quot;origin_city&quot;: &quot;New York&quot;,
            &quot;origin_country&quot;: &quot;USA&quot;,
            &quot;destination_city&quot;: &quot;Paris&quot;,
            &quot;destination_country&quot;: &quot;France&quot;,
            &quot;departure_date&quot;: &quot;2023-10-01T12:00:00.000000Z&quot;,
            &quot;arrival_date&quot;: &quot;2023-10-07T12:00:00.000000Z&quot;,
            &quot;transportation_mode&quot;: &quot;air&quot;,
            &quot;max_weight_kg&quot;: 20.5,
            &quot;max_volume_l&quot;: 50,
            &quot;notes&quot;: &quot;Fragile items included&quot;,
            &quot;status&quot;: &quot;pending&quot;
        }
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Trip not found&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-trips--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-trips--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-trips--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-trips--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-trips--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-trips--id-" data-method="GET"
      data-path="api/trips/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-trips--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-trips--id-"
                    onclick="tryItOut('GETapi-trips--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-trips--id-"
                    onclick="cancelTryOut('GETapi-trips--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-trips--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/trips/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-trips--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-trips--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-trips--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the trip. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="trip-management-PUTapi-trips--id-">Update a Trip</h2>

<p>
</p>

<p>Update the details of a specific trip by its ID.</p>

<span id="example-requests-PUTapi-trips--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://127.0.0.1:8000/api/trips/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"user_id\": 1,
    \"origin_city\": \"Los Angeles\",
    \"origin_country\": \"USA\",
    \"destination_city\": \"Tokyo\",
    \"destination_country\": \"Japan\",
    \"departure_date\": \"2023-11-01T12:00:00Z\",
    \"arrival_date\": \"2023-11-10T12:00:00Z\",
    \"transportation_mode\": \"sea\",
    \"max_weight_kg\": 25,
    \"max_volume_l\": 60,
    \"notes\": \"Handle with care\",
    \"status\": \"completed\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/trips/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "user_id": 1,
    "origin_city": "Los Angeles",
    "origin_country": "USA",
    "destination_city": "Tokyo",
    "destination_country": "Japan",
    "departure_date": "2023-11-01T12:00:00Z",
    "arrival_date": "2023-11-10T12:00:00Z",
    "transportation_mode": "sea",
    "max_weight_kg": 25,
    "max_volume_l": 60,
    "notes": "Handle with care",
    "status": "completed"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-trips--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Trip updated successfully&quot;,
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;user_id&quot;: 1,
        &quot;origin_city&quot;: &quot;Los Angeles&quot;,
        &quot;origin_country&quot;: &quot;USA&quot;,
        &quot;destination_city&quot;: &quot;Tokyo&quot;,
        &quot;destination_country&quot;: &quot;Japan&quot;,
        &quot;departure_date&quot;: &quot;2023-11-01T12:00:00.000000Z&quot;,
        &quot;arrival_date&quot;: &quot;2023-11-10T12:00:00.000000Z&quot;,
        &quot;transportation_mode&quot;: &quot;sea&quot;,
        &quot;max_weight_kg&quot;: 25,
        &quot;max_volume_l&quot;: 60,
        &quot;notes&quot;: &quot;Handle with care&quot;,
        &quot;status&quot;: &quot;completed&quot;
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Trip not found&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (422):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Validation failed&quot;,
    &quot;errors&quot;: {
        &quot;departure_date&quot;: [
            &quot;The departure date must be a valid date.&quot;
        ]
    }
}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-trips--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-trips--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-trips--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-trips--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-trips--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-trips--id-" data-method="PUT"
      data-path="api/trips/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-trips--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-trips--id-"
                    onclick="tryItOut('PUTapi-trips--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-trips--id-"
                    onclick="cancelTryOut('PUTapi-trips--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-trips--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/trips/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/trips/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-trips--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-trips--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-trips--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the trip. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>user_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="user_id"                data-endpoint="PUTapi-trips--id-"
               value="1"
               data-component="body">
    <br>
<p>optional The ID of the user updating the trip. Example: <code>1</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>origin_city</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="origin_city"                data-endpoint="PUTapi-trips--id-"
               value="Los Angeles"
               data-component="body">
    <br>
<p>optional The origin city of the trip. Example: <code>Los Angeles</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>origin_country</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="origin_country"                data-endpoint="PUTapi-trips--id-"
               value="USA"
               data-component="body">
    <br>
<p>optional The origin country of the trip. Example: <code>USA</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>destination_city</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="destination_city"                data-endpoint="PUTapi-trips--id-"
               value="Tokyo"
               data-component="body">
    <br>
<p>optional The destination city of the trip. Example: <code>Tokyo</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>destination_country</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="destination_country"                data-endpoint="PUTapi-trips--id-"
               value="Japan"
               data-component="body">
    <br>
<p>optional The destination country of the trip. Example: <code>Japan</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>departure_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="departure_date"                data-endpoint="PUTapi-trips--id-"
               value="2023-11-01T12:00:00Z"
               data-component="body">
    <br>
<p>optional The departure date of the trip (ISO 8601 format). Example: <code>2023-11-01T12:00:00Z</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>arrival_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="arrival_date"                data-endpoint="PUTapi-trips--id-"
               value="2023-11-10T12:00:00Z"
               data-component="body">
    <br>
<p>optional The arrival date of the trip (ISO 8601 format). Example: <code>2023-11-10T12:00:00Z</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>transportation_mode</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="transportation_mode"                data-endpoint="PUTapi-trips--id-"
               value="sea"
               data-component="body">
    <br>
<p>optional The mode of transportation. Example: <code>sea</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>max_weight_kg</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="max_weight_kg"                data-endpoint="PUTapi-trips--id-"
               value="25"
               data-component="body">
    <br>
<p>optional The maximum weight allowed in kilograms. Example: <code>25</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>max_volume_l</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="max_volume_l"                data-endpoint="PUTapi-trips--id-"
               value="60"
               data-component="body">
    <br>
<p>optional The maximum volume allowed in liters. Example: <code>60</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>notes</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="notes"                data-endpoint="PUTapi-trips--id-"
               value="Handle with care"
               data-component="body">
    <br>
<p>optional Additional notes about the trip. Example: <code>Handle with care</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="PUTapi-trips--id-"
               value="completed"
               data-component="body">
    <br>
<p>optional The status of the trip. Example: <code>completed</code></p>
        </div>
        </form>

                    <h2 id="trip-management-DELETEapi-trips--id-">Delete a Trip</h2>

<p>
</p>

<p>Remove a specific trip by its ID.</p>

<span id="example-requests-DELETEapi-trips--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://127.0.0.1:8000/api/trips/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/trips/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-trips--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Trip deleted successfully&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Trip not found&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-trips--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-trips--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-trips--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-trips--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-trips--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-trips--id-" data-method="DELETE"
      data-path="api/trips/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-trips--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-trips--id-"
                    onclick="tryItOut('DELETEapi-trips--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-trips--id-"
                    onclick="cancelTryOut('DELETEapi-trips--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-trips--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/trips/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-trips--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-trips--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-trips--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the trip. Example: <code>1</code></p>
            </div>
                    </form>

                <h1 id="user-management">User Management</h1>

    <p>APIs for managing users</p>

                                <h2 id="user-management-GETapi-user--id-">Get a Specific User by ID</h2>

<p>
</p>

<p>Retrieve details of a specific user by their ID.</p>

<span id="example-requests-GETapi-user--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/user/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/user/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-user--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;name&quot;: &quot;John Doe&quot;,
        &quot;email&quot;: &quot;john.doe@example.com&quot;,
        &quot;phone_number&quot;: &quot;+1234567890&quot;,
        &quot;about&quot;: &quot;I am a software developer.&quot;,
        &quot;profile_picture&quot;: &quot;https://example.com/profile.jpg&quot;,
        &quot;id_verified&quot;: true,
        &quot;rating&quot;: 4.5
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: false,
    &quot;message&quot;: &quot;User not found&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-user--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-user--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-user--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-user--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-user--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-user--id-" data-method="GET"
      data-path="api/user/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-user--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-user--id-"
                    onclick="tryItOut('GETapi-user--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-user--id-"
                    onclick="cancelTryOut('GETapi-user--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-user--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/user/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-user--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-user--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-user--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the user. Example: <code>1</code></p>
            </div>
                    </form>

            

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                                        <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                            </div>
            </div>
</div>
</body>
</html>
