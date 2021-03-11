<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>API Reference</title>

    <link rel="stylesheet" href="{{ asset('/docs/css/style.css') }}" />
    <script src="{{ asset('/docs/js/all.js') }}"></script>


          <script>
        $(function() {
            setupLanguages(["bash","javascript"]);
        });
      </script>
      </head>

  <body class="">
    <a href="#" id="nav-button">
      <span>
        NAV
        <img src="/docs/images/navbar.png" />
      </span>
    </a>
    <div class="tocify-wrapper">
        <img src="/docs/images/logo.png" />
                    <div class="lang-selector">
                                  <a href="#" data-language-name="bash">bash</a>
                                  <a href="#" data-language-name="javascript">javascript</a>
                            </div>
                            <div class="search">
              <input type="text" class="search" id="input-search" placeholder="Search">
            </div>
            <ul class="search-results"></ul>
              <div id="toc">
      </div>
                    <ul class="toc-footer">
                                  <li><a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a></li>
                            </ul>
            </div>
    <div class="page-wrapper">
      <div class="dark-box"></div>
      <div class="content">
          <!-- START_INFO -->
<h1>Info</h1>
<p>Welcome to the generated API reference.
<a href="{{ route("apidoc.json") }}">Get Postman Collection</a></p>
<!-- END_INFO -->
<h1>Auth</h1>
<p>Class AuthController</p>
<!-- START_5ef90dd4846f0d2902b89354bf5c42bb -->
<h2>Auth Request</h2>
<p>register User with phone and request code from SMS.ru</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/api/auth" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG" \
    -d '{"phone":"perferendis"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/auth"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG",
};

let body = {
    "phone": "perferendis"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (502):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "auth.sms_failed"
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/auth</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>phone</code></td>
<td>required</td>
<td>optional</td>
<td>User's phone number</td>
</tr>
</tbody>
</table>
<!-- END_5ef90dd4846f0d2902b89354bf5c42bb -->
<!-- START_a925a8d22b3615f12fca79456d286859 -->
<h2>Login User</h2>
<p>[Login User with verification code and return access token]</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/api/auth/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG" \
    -d '{"phone":"+79998880123","code":1234}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/auth/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG",
};

let body = {
    "phone": "+79998880123",
    "code": 1234
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (422):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "The given data was invalid.",
    "errors": {
        "phone": [
            "The selected phone is invalid."
        ],
        "code": [
            "The selected code is invalid."
        ]
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/auth/login</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>phone</code></td>
<td>string</td>
<td>required</td>
<td>User's phone.</td>
</tr>
<tr>
<td><code>code</code></td>
<td>integer</td>
<td>required</td>
<td>Auth code.</td>
</tr>
</tbody>
</table>
<!-- END_a925a8d22b3615f12fca79456d286859 -->
<!-- START_10ee8abe366895f0c1d35cc42004a092 -->
<h2>Check User and return User&#039;s information</h2>
<p><br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/api/auth/check" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/auth/check"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "error": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/auth/check</code></p>
<!-- END_10ee8abe366895f0c1d35cc42004a092 -->
<!-- START_16928cb8fc6adf2d9bb675d62a2095c5 -->
<h2>Logout</h2>
<p><br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/api/auth/logout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/auth/logout"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "error": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/auth/logout</code></p>
<!-- END_16928cb8fc6adf2d9bb675d62a2095c5 -->
<h1>Driver</h1>
<p>Class DriverController</p>
<!-- START_a1456aacb67521a2e69d0730748b0ce9 -->
<h2>Show unverified drivers</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/api/drivers" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/drivers"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">[
    {
        "id": 1,
        "first_name": "Оксана",
        "last_name": "Сазоновa",
        "verify": 0,
        "updated_at": "2020-07-31 14:04:22",
        "passport": "9792647005395",
        "drivers_license": "9873297669",
        "car_brand": "maiores",
        "car_model": "alias",
        "car_number": "272",
        "registration": "9793882110653",
        "documents": []
    },
    {
        "id": 2,
        "first_name": "Капитолина",
        "last_name": "Дроздовa",
        "verify": 0,
        "updated_at": "2020-07-31 14:04:22",
        "passport": "9797830779282",
        "drivers_license": "6181284842",
        "car_brand": "et",
        "car_model": "architecto",
        "car_number": "910",
        "registration": "9784798441771",
        "documents": []
    },
    {
        "id": 4,
        "first_name": "Василиса",
        "last_name": "Сазоновa",
        "verify": 0,
        "updated_at": "2020-07-31 14:04:22",
        "passport": "9786269406289",
        "drivers_license": "3123759423",
        "car_brand": "officia",
        "car_model": "voluptatem aliquid",
        "car_number": "173",
        "registration": "9782908121094",
        "documents": []
    },
    {
        "id": 6,
        "first_name": "Галина",
        "last_name": "Тихоновa",
        "verify": 0,
        "updated_at": "2020-07-31 14:04:25",
        "passport": null,
        "drivers_license": null,
        "car_brand": "autem",
        "car_model": "ad",
        "car_number": "beatae",
        "registration": null,
        "documents": [
            {
                "id": 1,
                "name": "file-name-1",
                "url": "http:\/\/localhost\/storage\/1\/file-name-1.jpg",
                "verify": 0
            }
        ]
    }
]</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/drivers</code></p>
<!-- END_a1456aacb67521a2e69d0730748b0ce9 -->
<!-- START_a90dbfa952a2d00ebd5881ca8b6b9011 -->
<h2>Create Driver</h2>
<p>[User registration as a driver]</p>
<p><br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/api/drivers" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG" \
    -d '{"user_id":1,"car_brand":"Toyota","car_model":"Corolla","car_number":"c123cc","drivers_license":"1234543234567","passport":"12 34 567890","registration":"1234567788","longitude":"30.3446761","latitude":"59.932809","verify":true,"document":[10]}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/drivers"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG",
};

let body = {
    "user_id": 1,
    "car_brand": "Toyota",
    "car_model": "Corolla",
    "car_number": "c123cc",
    "drivers_license": "1234543234567",
    "passport": "12 34 567890",
    "registration": "1234567788",
    "longitude": "30.3446761",
    "latitude": "59.932809",
    "verify": true,
    "document": [
        10
    ]
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "error": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/drivers</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>user_id</code></td>
<td>integer</td>
<td>required</td>
<td>User id to register as a driver.</td>
</tr>
<tr>
<td><code>car_brand</code></td>
<td>string</td>
<td>required</td>
<td>Driver's car brand.</td>
</tr>
<tr>
<td><code>car_model</code></td>
<td>string</td>
<td>required</td>
<td>Driver's car model.</td>
</tr>
<tr>
<td><code>car_number</code></td>
<td>string</td>
<td>required</td>
<td>Driver's car number.</td>
</tr>
<tr>
<td><code>drivers_license</code></td>
<td>string</td>
<td>optional</td>
<td>Document confirming the right to drive vehicles.</td>
</tr>
<tr>
<td><code>passport</code></td>
<td>string</td>
<td>optional</td>
<td>Identity document.</td>
</tr>
<tr>
<td><code>registration</code></td>
<td>string</td>
<td>optional</td>
<td>Document containing information about the vehicle.</td>
</tr>
<tr>
<td><code>longitude</code></td>
<td>numeric</td>
<td>optional</td>
<td>longitude Driver location coordinates.</td>
</tr>
<tr>
<td><code>latitude</code></td>
<td>numeric</td>
<td>optional</td>
<td>latitude Driver location coordinates.</td>
</tr>
<tr>
<td><code>verify</code></td>
<td>boolean</td>
<td>optional</td>
<td>Driver verification status.</td>
</tr>
<tr>
<td><code>document</code></td>
<td>array</td>
<td>optional</td>
<td>Array of used uploaded photos of documents.</td>
</tr>
<tr>
<td><code>document.*</code></td>
<td>integer</td>
<td>optional</td>
<td>Id of uploaded photos of documents.</td>
</tr>
</tbody>
</table>
<!-- END_a90dbfa952a2d00ebd5881ca8b6b9011 -->
<!-- START_42fae5a497f284a63942263a2398734d -->
<h2>Show driver</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/api/drivers/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/drivers/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "id": 1,
    "first_name": "Оксана",
    "last_name": "Сазоновa",
    "verify": 0,
    "updated_at": "2020-07-31 14:04:22",
    "passport": "9792647005395",
    "drivers_license": "9873297669",
    "car_brand": "maiores",
    "car_model": "alias",
    "car_number": "272",
    "registration": "9793882110653",
    "documents": []
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/drivers/{driver}</code></p>
<!-- END_42fae5a497f284a63942263a2398734d -->
<!-- START_689936c85252b1d08b025be0447f11ee -->
<h2>Update the driver information.</h2>
<p><br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "http://localhost/api/drivers/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG" \
    -d '{"car_brand":"Toyota","car_model":"Corolla","car_number":"c123cc","drivers_license":"1234543234567","passport":"12 34 567890","registration":"1234567788","longitude":30.3446761,"latitude":59.932809,"verify":true,"document":[13]}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/drivers/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG",
};

let body = {
    "car_brand": "Toyota",
    "car_model": "Corolla",
    "car_number": "c123cc",
    "drivers_license": "1234543234567",
    "passport": "12 34 567890",
    "registration": "1234567788",
    "longitude": 30.3446761,
    "latitude": 59.932809,
    "verify": true,
    "document": [
        13
    ]
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "error": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>PUT api/drivers/{driver}</code></p>
<p><code>PATCH api/drivers/{driver}</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>car_brand</code></td>
<td>string</td>
<td>optional</td>
<td>Driver's car brand.</td>
</tr>
<tr>
<td><code>car_model</code></td>
<td>string</td>
<td>optional</td>
<td>Driver's car model.</td>
</tr>
<tr>
<td><code>car_number</code></td>
<td>string</td>
<td>optional</td>
<td>Driver's car number.</td>
</tr>
<tr>
<td><code>drivers_license</code></td>
<td>string</td>
<td>optional</td>
<td>Document confirming the right to drive vehicles.</td>
</tr>
<tr>
<td><code>passport</code></td>
<td>string</td>
<td>optional</td>
<td>Identity document.</td>
</tr>
<tr>
<td><code>registration</code></td>
<td>string</td>
<td>optional</td>
<td>Document containing information about the vehicle.</td>
</tr>
<tr>
<td><code>longitude</code></td>
<td>float</td>
<td>optional</td>
<td>longitude Driver location coordinates.</td>
</tr>
<tr>
<td><code>latitude</code></td>
<td>float</td>
<td>optional</td>
<td>latitude Driver location coordinates.</td>
</tr>
<tr>
<td><code>verify</code></td>
<td>boolean</td>
<td>optional</td>
<td>Driver verification status.</td>
</tr>
<tr>
<td><code>document</code></td>
<td>array</td>
<td>optional</td>
<td>Array of used uploaded photos of documents.</td>
</tr>
<tr>
<td><code>document.*</code></td>
<td>integer</td>
<td>optional</td>
<td>Id of uploaded photos of documents.</td>
</tr>
</tbody>
</table>
<!-- END_689936c85252b1d08b025be0447f11ee -->
<!-- START_819b51704b0da05513d2593a7c0ae257 -->
<h2>Delete driver (for tests)</h2>
<p><br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "http://localhost/api/drivers/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/drivers/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "error": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>DELETE api/drivers/{driver}</code></p>
<!-- END_819b51704b0da05513d2593a7c0ae257 -->
<!-- START_96fbe7214a8e65c0aa03fa0e19d52c68 -->
<h2>Show driver&#039;s documents</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/api/drivers/1/documents" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/drivers/1/documents"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">[]</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/drivers/{driver}/documents</code></p>
<!-- END_96fbe7214a8e65c0aa03fa0e19d52c68 -->
<!-- START_bbdedd8d5e313f3375db5b3c709de7ac -->
<h2>Send driver location</h2>
<p><br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "http://localhost/api/drivers/1/location" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG" \
    -d '{"longitude":30.3446761,"latitude":59.932809}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/drivers/1/location"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG",
};

let body = {
    "longitude": 30.3446761,
    "latitude": 59.932809
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Местоположение отправлено",
    "location": {
        "latitude": 60.393031,
        "longitude": 30.153743
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>PUT api/drivers/{driver}/location</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>longitude</code></td>
<td>float</td>
<td>optional</td>
<td>longitude Driver location coordinates.</td>
</tr>
<tr>
<td><code>latitude</code></td>
<td>float</td>
<td>optional</td>
<td>latitude Driver location coordinates.</td>
</tr>
</tbody>
</table>
<!-- END_bbdedd8d5e313f3375db5b3c709de7ac -->
<h1>Media</h1>
<p>API for management medias (images)</p>
<p>Class MediaController</p>
<!-- START_f178682e39dcb66c17814ee8c3203fcc -->
<h2>Store media file</h2>
<p><br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/api/files" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG" \
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/files"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG",
};

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "error": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/files</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>file</code></td>
<td>image</td>
<td>required</td>
<td>Image need to be upload to server.</td>
</tr>
</tbody>
</table>
<!-- END_f178682e39dcb66c17814ee8c3203fcc -->
<!-- START_3383eecccc67028d796fb7abd735b552 -->
<h2>Update media file information</h2>
<p>[Confirmation and rejection of documents]</p>
<p><br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "http://localhost/api/files/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG" \
    -d '{"verify":16,"name":"amet"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/files/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG",
};

let body = {
    "verify": 16,
    "name": "amet"
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "error": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>PUT api/files/{file}</code></p>
<p><code>PATCH api/files/{file}</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>verify</code></td>
<td>integer</td>
<td>optional</td>
<td>Photo verification status.</td>
</tr>
<tr>
<td><code>name</code></td>
<td>string</td>
<td>optional</td>
<td>Photo name.</td>
</tr>
</tbody>
</table>
<!-- END_3383eecccc67028d796fb7abd735b552 -->
<!-- START_7fec844060fbf8f1a57014ed9b6c8e71 -->
<h2>Delete media file</h2>
<p><br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "http://localhost/api/files/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/files/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "error": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>DELETE api/files/{file}</code></p>
<!-- END_7fec844060fbf8f1a57014ed9b6c8e71 -->
<h1>Message</h1>
<p>Class MessageController</p>
<!-- START_35df1f44031ea96b6e03eca6e38ceda7 -->
<h2>Create message for ride&#039;s chat</h2>
<p><br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/api/messages" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG" \
    -d '{"author_id":1,"ride_id":1,"text":"hello"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/messages"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG",
};

let body = {
    "author_id": 1,
    "ride_id": 1,
    "text": "hello"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "error": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/messages</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>author_id</code></td>
<td>integer</td>
<td>required</td>
<td>User id which message author.</td>
</tr>
<tr>
<td><code>ride_id</code></td>
<td>integer</td>
<td>required</td>
<td>Ride id to send a message to ride member.</td>
</tr>
<tr>
<td><code>text</code></td>
<td>string</td>
<td>required</td>
<td>Message text.</td>
</tr>
</tbody>
</table>
<!-- END_35df1f44031ea96b6e03eca6e38ceda7 -->
<!-- START_864df26c2d4bb4cd50d27fa6f76dde17 -->
<h2>Update message</h2>
<p>[Mark as read]</p>
<p><br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "http://localhost/api/messages/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG" \
    -d '{"is_read":true}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/messages/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG",
};

let body = {
    "is_read": true
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "error": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>PUT api/messages/{message}</code></p>
<p><code>PATCH api/messages/{message}</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>is_read</code></td>
<td>boolean</td>
<td>required</td>
<td>Mark message as read.</td>
</tr>
</tbody>
</table>
<!-- END_864df26c2d4bb4cd50d27fa6f76dde17 -->
<h1>Review</h1>
<p>Class ReviewController</p>
<!-- START_50999491bc3a54c383d134cba750f58d -->
<h2>Show all reviews (for tests)</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/api/reviews" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/reviews"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">[
    {
        "id": 1,
        "text": "quidem voluptatem aut numquam voluptates tenetur sed",
        "rating": 5,
        "created_at": "2020-07-31T11:04:22.000000Z",
        "updated_at": "2020-07-31T11:04:22.000000Z",
        "from_id": 8,
        "to_id": 2
    },
    {
        "id": 2,
        "text": "repudiandae facilis molestiae nulla rerum",
        "rating": 3,
        "created_at": "2020-07-31T11:04:22.000000Z",
        "updated_at": "2020-07-31T11:04:22.000000Z",
        "from_id": 10,
        "to_id": 1
    },
    {
        "id": 3,
        "text": "quia voluptas optio provident voluptatibus ea perferendis sed",
        "rating": 3,
        "created_at": "2020-07-31T11:04:22.000000Z",
        "updated_at": "2020-07-31T11:04:22.000000Z",
        "from_id": 6,
        "to_id": 6
    },
    {
        "id": 4,
        "text": "nesciunt quia necessitatibus sint",
        "rating": 3,
        "created_at": "2020-07-31T11:04:22.000000Z",
        "updated_at": "2020-07-31T11:04:22.000000Z",
        "from_id": 7,
        "to_id": 10
    },
    {
        "id": 5,
        "text": "et voluptatum dolorem consectetur",
        "rating": 3,
        "created_at": "2020-07-31T11:04:22.000000Z",
        "updated_at": "2020-07-31T11:04:22.000000Z",
        "from_id": 5,
        "to_id": 1
    },
    {
        "id": 6,
        "text": "velit aut nesciunt et",
        "rating": 1,
        "created_at": "2020-07-31T11:04:22.000000Z",
        "updated_at": "2020-07-31T11:04:22.000000Z",
        "from_id": 10,
        "to_id": 10
    },
    {
        "id": 7,
        "text": "voluptatem excepturi est",
        "rating": 1,
        "created_at": "2020-07-31T11:04:22.000000Z",
        "updated_at": "2020-07-31T11:04:22.000000Z",
        "from_id": 7,
        "to_id": 1
    },
    {
        "id": 8,
        "text": "magnam quod ullam voluptatem reprehenderit ut",
        "rating": 2,
        "created_at": "2020-07-31T11:04:22.000000Z",
        "updated_at": "2020-07-31T11:04:22.000000Z",
        "from_id": 4,
        "to_id": 5
    },
    {
        "id": 9,
        "text": "repellendus beatae",
        "rating": 3,
        "created_at": "2020-07-31T11:04:22.000000Z",
        "updated_at": "2020-07-31T11:04:22.000000Z",
        "from_id": 4,
        "to_id": 5
    },
    {
        "id": 10,
        "text": "officiis nam magni ut dolores et vitae assumenda sed ducimus",
        "rating": 2,
        "created_at": "2020-07-31T11:04:22.000000Z",
        "updated_at": "2020-07-31T11:04:22.000000Z",
        "from_id": 11,
        "to_id": 10
    },
    {
        "id": 11,
        "text": "qui perferendis ut quo quo",
        "rating": 4,
        "created_at": "2020-07-31T11:04:22.000000Z",
        "updated_at": "2020-07-31T11:04:22.000000Z",
        "from_id": 3,
        "to_id": 3
    },
    {
        "id": 12,
        "text": "numquam provident earum",
        "rating": 1,
        "created_at": "2020-07-31T11:04:22.000000Z",
        "updated_at": "2020-07-31T11:04:22.000000Z",
        "from_id": 1,
        "to_id": 8
    },
    {
        "id": 13,
        "text": "voluptas inventore harum maiores iusto non",
        "rating": 2,
        "created_at": "2020-07-31T11:04:22.000000Z",
        "updated_at": "2020-07-31T11:04:22.000000Z",
        "from_id": 4,
        "to_id": 7
    },
    {
        "id": 14,
        "text": "in nam quis excepturi est earum aliquam non non fugiat",
        "rating": 3,
        "created_at": "2020-07-31T11:04:22.000000Z",
        "updated_at": "2020-07-31T11:04:22.000000Z",
        "from_id": 1,
        "to_id": 2
    },
    {
        "id": 15,
        "text": "aspernatur expedita fugit illo saepe aut sit",
        "rating": 1,
        "created_at": "2020-07-31T11:04:22.000000Z",
        "updated_at": "2020-07-31T11:04:22.000000Z",
        "from_id": 6,
        "to_id": 9
    },
    {
        "id": 16,
        "text": "dolorem ut pariatur non sint autem veritatis labore voluptatibus",
        "rating": 2,
        "created_at": "2020-07-31T11:04:22.000000Z",
        "updated_at": "2020-07-31T11:04:22.000000Z",
        "from_id": 10,
        "to_id": 10
    },
    {
        "id": 17,
        "text": "tenetur mollitia nesciunt et ut quisquam rerum",
        "rating": 4,
        "created_at": "2020-07-31T11:04:22.000000Z",
        "updated_at": "2020-07-31T11:04:22.000000Z",
        "from_id": 8,
        "to_id": 10
    },
    {
        "id": 18,
        "text": "nisi quos reiciendis repellat natus labore molestiae",
        "rating": 2,
        "created_at": "2020-07-31T11:04:22.000000Z",
        "updated_at": "2020-07-31T11:04:22.000000Z",
        "from_id": 8,
        "to_id": 8
    },
    {
        "id": 19,
        "text": "voluptatibus ad error id aut aut aut at temporibus",
        "rating": 4,
        "created_at": "2020-07-31T11:04:22.000000Z",
        "updated_at": "2020-07-31T11:04:22.000000Z",
        "from_id": 11,
        "to_id": 9
    },
    {
        "id": 20,
        "text": "qui eos voluptatum eveniet vel aut praesentium beatae magni cumque",
        "rating": 3,
        "created_at": "2020-07-31T11:04:22.000000Z",
        "updated_at": "2020-07-31T11:04:22.000000Z",
        "from_id": 6,
        "to_id": 8
    }
]</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/reviews</code></p>
<!-- END_50999491bc3a54c383d134cba750f58d -->
<!-- START_addef74ffb3ebdd2a128f801a9009fb7 -->
<h2>Create user review</h2>
<p><br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/api/reviews" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG" \
    -d '{"from_id":1,"to_id":1,"text":"Hice","rating":4}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/reviews"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG",
};

let body = {
    "from_id": 1,
    "to_id": 1,
    "text": "Hice",
    "rating": 4
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "error": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/reviews</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>from_id</code></td>
<td>integer</td>
<td>required</td>
<td>User id Review sender.</td>
</tr>
<tr>
<td><code>to_id</code></td>
<td>integer</td>
<td>required</td>
<td>User id Review addressee.</td>
</tr>
<tr>
<td><code>text</code></td>
<td>string</td>
<td>optional</td>
<td>Review text.</td>
</tr>
<tr>
<td><code>rating</code></td>
<td>integer</td>
<td>required</td>
<td>Rating.</td>
</tr>
</tbody>
</table>
<!-- END_addef74ffb3ebdd2a128f801a9009fb7 -->
<!-- START_f28c14203b1b4d273f19fb792d2eaa33 -->
<h2>Show review (for tests)</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/api/reviews/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/reviews/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "id": 1,
    "text": "quidem voluptatem aut numquam voluptates tenetur sed",
    "rating": 5,
    "created_at": "2020-07-31T11:04:22.000000Z",
    "updated_at": "2020-07-31T11:04:22.000000Z",
    "from_id": 8,
    "to_id": 2
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/reviews/{review}</code></p>
<!-- END_f28c14203b1b4d273f19fb792d2eaa33 -->
<h1>Ride</h1>
<p>Class RideController</p>
<!-- START_80da6feff88f7028dcef0849896ea674 -->
<h2>Show all rides with filters</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/api/rides?status=1&amp;date=date%5B0%5D+%3D+%272020-01-01+00%3A00%3A00%27%3B+date%5B1%5D+%3D+%272020-01-01+12%3A30%3A00%27%3B&amp;rating=price%5B0%5D+%3D+1%3B+price%5B1%5D+%3D+4&amp;duration=02%3A11&amp;member=member%5B0%5D+%3D+Ivan%3B+member%5B1%5D+%3D+Ivanov" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/rides"
);

let params = {
    "status": "1",
    "date": "date[0] = '2020-01-01 00:00:00'; date[1] = '2020-01-01 12:30:00';",
    "rating": "price[0] = 1; price[1] = 4",
    "duration": "02:11",
    "member": "member[0] = Ivan; member[1] = Ivanov",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (500):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Server Error"
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/rides</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>status</code></td>
<td>optional</td>
<td>Filtering (searching) by ride status.</td>
</tr>
<tr>
<td><code>date</code></td>
<td>optional</td>
<td>Filtering (searching) by dateTime ranges.</td>
</tr>
<tr>
<td><code>rating</code></td>
<td>optional</td>
<td>Filtering (searching) by price ranges.</td>
</tr>
<tr>
<td><code>duration</code></td>
<td>optional</td>
<td>Filtering (searching) by ride duration (hh:mm).</td>
</tr>
<tr>
<td><code>member</code></td>
<td>optional</td>
<td>Filtering (searching) by ride participant.</td>
</tr>
</tbody>
</table>
<!-- END_80da6feff88f7028dcef0849896ea674 -->
<!-- START_1107959050903cccc58b4e90211295f3 -->
<h2>Create ride</h2>
<p><br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/api/rides" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG" \
    -d '{"user_id":1,"status_id":1,"price":300,"comment":"Passenger with a child.","city":"Moscow","position":"\"223127, \u0410\u043c\u0443\u0440\u0441\u043a\u0430\u044f \u043e\u0431\u043b\u0430\u0441\u0442\u044c, \u0433\u043e\u0440\u043e\u0434 \u0427\u0435\u0445\u043e\u0432, \u043f\u0440. \u041b\u043e\u043c\u043e\u043d\u043e\u0441\u043e\u0432\u0430, 36\"","from_lat":"59.090273,","from_lng":"30.075711,","destination":"\"738200, \u0421\u0430\u043c\u0430\u0440\u0441\u043a\u0430\u044f \u043e\u0431\u043b\u0430\u0441\u0442\u044c, \u0433\u043e\u0440\u043e\u0434 \u041f\u0443\u0448\u043a\u0438\u043d\u043e, \u0443\u043b. \u0411\u0430\u043b\u043a\u0430\u043d\u0441\u043a\u0430\u044f, 52\"","to_lat":"59.090273,","to_lng":"30.075711,"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/rides"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG",
};

let body = {
    "user_id": 1,
    "status_id": 1,
    "price": 300,
    "comment": "Passenger with a child.",
    "city": "Moscow",
    "position": "\"223127, \u0410\u043c\u0443\u0440\u0441\u043a\u0430\u044f \u043e\u0431\u043b\u0430\u0441\u0442\u044c, \u0433\u043e\u0440\u043e\u0434 \u0427\u0435\u0445\u043e\u0432, \u043f\u0440. \u041b\u043e\u043c\u043e\u043d\u043e\u0441\u043e\u0432\u0430, 36\"",
    "from_lat": "59.090273,",
    "from_lng": "30.075711,",
    "destination": "\"738200, \u0421\u0430\u043c\u0430\u0440\u0441\u043a\u0430\u044f \u043e\u0431\u043b\u0430\u0441\u0442\u044c, \u0433\u043e\u0440\u043e\u0434 \u041f\u0443\u0448\u043a\u0438\u043d\u043e, \u0443\u043b. \u0411\u0430\u043b\u043a\u0430\u043d\u0441\u043a\u0430\u044f, 52\"",
    "to_lat": "59.090273,",
    "to_lng": "30.075711,"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "error": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/rides</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>user_id</code></td>
<td>integer</td>
<td>required</td>
<td>User id being a passenger.</td>
</tr>
<tr>
<td><code>status_id</code></td>
<td>integer</td>
<td>optional</td>
<td>RideStatus id for ride status.</td>
</tr>
<tr>
<td><code>price</code></td>
<td>integer</td>
<td>required</td>
<td>Price for ride.</td>
</tr>
<tr>
<td><code>comment</code></td>
<td>string</td>
<td>optional</td>
<td>Comment on the ride.</td>
</tr>
<tr>
<td><code>city</code></td>
<td>string</td>
<td>required</td>
<td>City of ride.</td>
</tr>
<tr>
<td><code>position</code></td>
<td>string</td>
<td>required</td>
<td>Position address.</td>
</tr>
<tr>
<td><code>from_lat</code></td>
<td>numeric</td>
<td>required</td>
<td>Position latitude.</td>
</tr>
<tr>
<td><code>from_lng</code></td>
<td>numeric</td>
<td>required</td>
<td>Position longitude.</td>
</tr>
<tr>
<td><code>destination</code></td>
<td>string</td>
<td>required</td>
<td>Destination address.</td>
</tr>
<tr>
<td><code>to_lat</code></td>
<td>numeric</td>
<td>required</td>
<td>Destination latitude.</td>
</tr>
<tr>
<td><code>to_lng</code></td>
<td>numeric</td>
<td>required</td>
<td>Destination longitude.</td>
</tr>
</tbody>
</table>
<!-- END_1107959050903cccc58b4e90211295f3 -->
<!-- START_6d86266fd0be30c64d47710be1ec9c81 -->
<h2>Show ride</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/api/rides/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/rides/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "id": 1,
    "city": "",
    "from_lat": 59.794778,
    "from_lng": 30.31549,
    "position": "166712, Астраханская область, город Луховицы, бульвар Ломоносова, 78",
    "to_lat": 59.742981,
    "to_lng": 30.701953,
    "destination": "868614, Тамбовская область, город Серебряные Пруды, проезд Ленина, 30",
    "price": 879,
    "comment": "quo iure dolorem saepe consectetur",
    "start_at": "1974-11-01 08:50:13",
    "finish_at": "2013-09-29 13:29:31",
    "duration": "14:50:16",
    "passenger": {
        "id": 10,
        "first_name": "Жанна",
        "last_name": "Трофимов",
        "rating": 5,
        "phone": "8-800-892-8748",
        "photos": []
    },
    "driver": {
        "id": 2,
        "first_name": "Оксана",
        "last_name": "Сазоновa",
        "rating": 5,
        "phone": "(35222) 85-9376",
        "car": {
            "car_brand": "maiores",
            "car_model": "alias",
            "car_number": "272"
        },
        "driver_location": {
            "latitude": 60.393031,
            "longitude": 30.153743
        },
        "photos": []
    },
    "status_id": 3,
    "status": "Водитель подъехал",
    "reason": null
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/rides/{ride}</code></p>
<!-- END_6d86266fd0be30c64d47710be1ec9c81 -->
<!-- START_b6b06407f12bbb4a5e781dfbe721990d -->
<h2>Update the ride information.</h2>
<p><br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "http://localhost/api/rides/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG" \
    -d '{"driver_id":1,"status_id":1,"price":300,"comment":"Passenger with a child.","city":"Moscow","position":"\"223127, \u0410\u043c\u0443\u0440\u0441\u043a\u0430\u044f \u043e\u0431\u043b\u0430\u0441\u0442\u044c, \u0433\u043e\u0440\u043e\u0434 \u0427\u0435\u0445\u043e\u0432, \u043f\u0440. \u041b\u043e\u043c\u043e\u043d\u043e\u0441\u043e\u0432\u0430, 36\"","from_lat":"59.090273,","from_lng":"30.075711,","destination":"\"738200, \u0421\u0430\u043c\u0430\u0440\u0441\u043a\u0430\u044f \u043e\u0431\u043b\u0430\u0441\u0442\u044c, \u0433\u043e\u0440\u043e\u0434 \u041f\u0443\u0448\u043a\u0438\u043d\u043e, \u0443\u043b. \u0411\u0430\u043b\u043a\u0430\u043d\u0441\u043a\u0430\u044f, 52\"","to_lat":"59.090273,","to_lng":"30.075711,","start_at":"'2020-01-01 00:00:00',","finish_at":"'2020-01-01 10:30:00',"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/rides/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG",
};

let body = {
    "driver_id": 1,
    "status_id": 1,
    "price": 300,
    "comment": "Passenger with a child.",
    "city": "Moscow",
    "position": "\"223127, \u0410\u043c\u0443\u0440\u0441\u043a\u0430\u044f \u043e\u0431\u043b\u0430\u0441\u0442\u044c, \u0433\u043e\u0440\u043e\u0434 \u0427\u0435\u0445\u043e\u0432, \u043f\u0440. \u041b\u043e\u043c\u043e\u043d\u043e\u0441\u043e\u0432\u0430, 36\"",
    "from_lat": "59.090273,",
    "from_lng": "30.075711,",
    "destination": "\"738200, \u0421\u0430\u043c\u0430\u0440\u0441\u043a\u0430\u044f \u043e\u0431\u043b\u0430\u0441\u0442\u044c, \u0433\u043e\u0440\u043e\u0434 \u041f\u0443\u0448\u043a\u0438\u043d\u043e, \u0443\u043b. \u0411\u0430\u043b\u043a\u0430\u043d\u0441\u043a\u0430\u044f, 52\"",
    "to_lat": "59.090273,",
    "to_lng": "30.075711,",
    "start_at": "'2020-01-01 00:00:00',",
    "finish_at": "'2020-01-01 10:30:00',"
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "error": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>PUT api/rides/{ride}</code></p>
<p><code>PATCH api/rides/{ride}</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>driver_id</code></td>
<td>integer</td>
<td>required</td>
<td>User id being a driver.</td>
</tr>
<tr>
<td><code>status_id</code></td>
<td>integer</td>
<td>optional</td>
<td>RideStatus id for ride status.</td>
</tr>
<tr>
<td><code>price</code></td>
<td>integer</td>
<td>optional</td>
<td>Price for ride.</td>
</tr>
<tr>
<td><code>comment</code></td>
<td>string</td>
<td>optional</td>
<td>Comment on the ride.</td>
</tr>
<tr>
<td><code>city</code></td>
<td>string</td>
<td>required</td>
<td>City of ride.</td>
</tr>
<tr>
<td><code>position</code></td>
<td>string</td>
<td>optional</td>
<td>Position address.</td>
</tr>
<tr>
<td><code>from_lat</code></td>
<td>numeric</td>
<td>optional</td>
<td>Position latitude.</td>
</tr>
<tr>
<td><code>from_lng</code></td>
<td>numeric</td>
<td>optional</td>
<td>Position longitude.</td>
</tr>
<tr>
<td><code>destination</code></td>
<td>string</td>
<td>optional</td>
<td>Destination address.</td>
</tr>
<tr>
<td><code>to_lat</code></td>
<td>numeric</td>
<td>optional</td>
<td>Destination latitude.</td>
</tr>
<tr>
<td><code>to_lng</code></td>
<td>numeric</td>
<td>optional</td>
<td>Destination longitude.</td>
</tr>
<tr>
<td><code>start_at</code></td>
<td>date</td>
<td>optional</td>
<td>Destination latitude.</td>
</tr>
<tr>
<td><code>finish_at</code></td>
<td>date</td>
<td>required</td>
<td>Destination longitude.</td>
</tr>
</tbody>
</table>
<!-- END_b6b06407f12bbb4a5e781dfbe721990d -->
<!-- START_8b5c1ecd2ebc964b4fd452629721700d -->
<h2>Show ride price offers</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/api/rides/1/offers" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/rides/1/offers"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">[
    {
        "id": 29,
        "driver_id": {
            "id": 8,
            "first_name": "Кристина",
            "last_name": "Воронов",
            "rating": 1,
            "phone": "(812) 036-37-65",
            "car": null,
            "driver_location": null,
            "photos": []
        },
        "price": "946",
        "created_at": "2020-07-31 14:04:23"
    },
    {
        "id": 31,
        "driver_id": {
            "id": 10,
            "first_name": "Жанна",
            "last_name": "Трофимов",
            "rating": 5,
            "phone": "8-800-892-8748",
            "car": null,
            "driver_location": null,
            "photos": []
        },
        "price": "887",
        "created_at": "2020-07-31 14:04:23"
    }
]</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/rides/{ride}/offers</code></p>
<!-- END_8b5c1ecd2ebc964b4fd452629721700d -->
<!-- START_f4db3aec9357c1502f94b748229b1753 -->
<h2>Show ride chat</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/api/rides/1/chat" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/rides/1/chat"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">[]</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/rides/{ride}/chat</code></p>
<!-- END_f4db3aec9357c1502f94b748229b1753 -->
<!-- START_2ac66414f529e06bc175c8483a5de8ca -->
<h2>Create a reason for canceling a trip</h2>
<p><br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/api/reasons" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG" \
    -d '{"ride_id":1,"by_passenger":true,"text":"The driver did not arrive"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/reasons"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG",
};

let body = {
    "ride_id": 1,
    "by_passenger": true,
    "text": "The driver did not arrive"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "error": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/reasons</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>ride_id</code></td>
<td>integer</td>
<td>required</td>
<td>Ride id for cancellation.</td>
</tr>
<tr>
<td><code>by_passenger</code></td>
<td>boolean</td>
<td>required</td>
<td>Whether the ride was canceled by the passenger.</td>
</tr>
<tr>
<td><code>text</code></td>
<td>string</td>
<td>optional</td>
<td>Reason for cancellation.</td>
</tr>
</tbody>
</table>
<!-- END_2ac66414f529e06bc175c8483a5de8ca -->
<!-- START_a45eaa0bc07a2833fc15fdfb8cd32142 -->
<h2>Create a price offer</h2>
<p><br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/api/offers" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG" \
    -d '{"driver_id":1,"ride_id":1,"price":300}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/offers"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG",
};

let body = {
    "driver_id": 1,
    "ride_id": 1,
    "price": 300
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "error": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/offers</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>driver_id</code></td>
<td>integer</td>
<td>required</td>
<td>User id who offers new ride price.</td>
</tr>
<tr>
<td><code>ride_id</code></td>
<td>integer</td>
<td>required</td>
<td>Ride id to offer a new price.</td>
</tr>
<tr>
<td><code>price</code></td>
<td>integer</td>
<td>required</td>
<td>Price offer.</td>
</tr>
</tbody>
</table>
<!-- END_a45eaa0bc07a2833fc15fdfb8cd32142 -->
<!-- START_f7b14e58800200c9dd82259343ecea98 -->
<h2>Delete offer</h2>
<p><br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "http://localhost/api/offers/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/offers/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "error": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>DELETE api/offers/{offer}</code></p>
<!-- END_f7b14e58800200c9dd82259343ecea98 -->
<h1>Schedule</h1>
<p>Class ScheduleController</p>
<!-- START_91eb75872fa74f2d8bb4a78be45be4a6 -->
<h2>Create ride schedule</h2>
<p><br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/api/schedules" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG" \
    -d '{"monday":true,"tuesday":false,"wednesday":true,"thursday":true,"friday":true,"saturday":false,"sunday":false,"time":"quia","ride_id":1}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/schedules"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG",
};

let body = {
    "monday": true,
    "tuesday": false,
    "wednesday": true,
    "thursday": true,
    "friday": true,
    "saturday": false,
    "sunday": false,
    "time": "quia",
    "ride_id": 1
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "error": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/schedules</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>monday</code></td>
<td>boolean</td>
<td>required</td>
<td>Monday availability on schedule.</td>
</tr>
<tr>
<td><code>tuesday</code></td>
<td>boolean</td>
<td>required</td>
<td>Tuesday availability on schedule.</td>
</tr>
<tr>
<td><code>wednesday</code></td>
<td>boolean</td>
<td>required</td>
<td>Wednesday availability on schedule.</td>
</tr>
<tr>
<td><code>thursday</code></td>
<td>boolean</td>
<td>required</td>
<td>Thursday availability on schedule.</td>
</tr>
<tr>
<td><code>friday</code></td>
<td>boolean</td>
<td>required</td>
<td>Friday availability on schedule.</td>
</tr>
<tr>
<td><code>saturday</code></td>
<td>boolean</td>
<td>required</td>
<td>Saturday availability on schedule.</td>
</tr>
<tr>
<td><code>sunday</code></td>
<td>boolean</td>
<td>required</td>
<td>Sunday availability on schedule.</td>
</tr>
<tr>
<td><code>time</code></td>
<td>date</td>
<td>required</td>
<td>Time for schedule(format:H:i).</td>
</tr>
<tr>
<td><code>ride_id</code></td>
<td>integer</td>
<td>optional</td>
<td>Ride id for ride schedule.</td>
</tr>
</tbody>
</table>
<!-- END_91eb75872fa74f2d8bb4a78be45be4a6 -->
<!-- START_79a60dca46732cb6ae6fe86ada7043d6 -->
<h2>Update ride schedule</h2>
<p><br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "http://localhost/api/schedules/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG" \
    -d '{"monday":false,"tuesday":true,"wednesday":false,"thursday":false,"friday":true,"saturday":true,"sunday":false,"time":"ipsum","ride_id":1}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/schedules/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG",
};

let body = {
    "monday": false,
    "tuesday": true,
    "wednesday": false,
    "thursday": false,
    "friday": true,
    "saturday": true,
    "sunday": false,
    "time": "ipsum",
    "ride_id": 1
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "error": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>PUT api/schedules/{schedule}</code></p>
<p><code>PATCH api/schedules/{schedule}</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>monday</code></td>
<td>boolean</td>
<td>optional</td>
<td>Monday availability on schedule.</td>
</tr>
<tr>
<td><code>tuesday</code></td>
<td>boolean</td>
<td>optional</td>
<td>Tuesday availability on schedule.</td>
</tr>
<tr>
<td><code>wednesday</code></td>
<td>boolean</td>
<td>optional</td>
<td>Wednesday availability on schedule.</td>
</tr>
<tr>
<td><code>thursday</code></td>
<td>boolean</td>
<td>optional</td>
<td>Thursday availability on schedule.</td>
</tr>
<tr>
<td><code>friday</code></td>
<td>boolean</td>
<td>optional</td>
<td>Friday availability on schedule.</td>
</tr>
<tr>
<td><code>saturday</code></td>
<td>boolean</td>
<td>optional</td>
<td>Saturday availability on schedule.</td>
</tr>
<tr>
<td><code>sunday</code></td>
<td>boolean</td>
<td>optional</td>
<td>Sunday availability on schedule.</td>
</tr>
<tr>
<td><code>time</code></td>
<td>date</td>
<td>optional</td>
<td>Time for schedule(format:H:i).</td>
</tr>
<tr>
<td><code>ride_id</code></td>
<td>integer</td>
<td>optional</td>
<td>Ride id for ride schedule.</td>
</tr>
</tbody>
</table>
<!-- END_79a60dca46732cb6ae6fe86ada7043d6 -->
<h1>User</h1>
<p>Class UserController</p>
<!-- START_fc1e4f6a697e3c48257de845299b71d5 -->
<h2>Show all users with filters</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/api/users?city=Moscow&amp;name=name%5B0%5D+%3D+Ivan%3B+name%5B1%5D+%3D+Ivanov&amp;rating=ex" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/users"
);

let params = {
    "city": "Moscow",
    "name": "name[0] = Ivan; name[1] = Ivanov",
    "rating": "ex",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">[]</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/users</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>city</code></td>
<td>optional</td>
<td>Filtering (searching) by user city.</td>
</tr>
<tr>
<td><code>verify</code></td>
<td>optional</td>
<td>Filtering (searching) by user verification (true or false string).</td>
</tr>
<tr>
<td><code>phone</code></td>
<td>optional</td>
<td>Filtering (searching) by user phone.</td>
</tr>
<tr>
<td><code>name</code></td>
<td>optional</td>
<td>Filtering (searching) by user name.</td>
</tr>
<tr>
<td><code>rating</code></td>
<td>optional</td>
<td>Filtering (searching) by rating ranges. rating[0] = 1; rating[1] = 4</td>
</tr>
<tr>
<td><code>driver</code></td>
<td>optional</td>
<td>Filtering (searching) for driver registration (true or false string).</td>
</tr>
</tbody>
</table>
<!-- END_fc1e4f6a697e3c48257de845299b71d5 -->
<!-- START_8653614346cb0e3d444d164579a0a0a2 -->
<h2>Show user</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/api/users/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/users/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "id": 1,
    "first_name": "Admin",
    "last_name": null,
    "verify": 1,
    "rating": null,
    "email": "admin@poputi.com",
    "phone": null,
    "city": null,
    "calls_allowed": 1,
    "driver": {
        "id": 5,
        "verify": 1,
        "passport": "9799428471608",
        "drivers_license": "1405526882",
        "car_brand": "at consequuntur",
        "car_model": "aut",
        "car_number": "543",
        "registration": "9780923307189"
    },
    "photos": []
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/users/{user}</code></p>
<!-- END_8653614346cb0e3d444d164579a0a0a2 -->
<!-- START_48a3115be98493a3c866eb0e23347262 -->
<h2>Update user</h2>
<p><br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "http://localhost/api/users/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG" \
    -d '{"first_name":"reiciendis","last_name":"maxime","email":"mail@gmail.com","city":"Moscow","verify":false,"calls_allowed":false,"photo":[13]}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/users/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG",
};

let body = {
    "first_name": "reiciendis",
    "last_name": "maxime",
    "email": "mail@gmail.com",
    "city": "Moscow",
    "verify": false,
    "calls_allowed": false,
    "photo": [
        13
    ]
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "error": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>PUT api/users/{user}</code></p>
<p><code>PATCH api/users/{user}</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>first_name</code></td>
<td>string</td>
<td>optional</td>
<td>User's first name.</td>
</tr>
<tr>
<td><code>last_name</code></td>
<td>string</td>
<td>optional</td>
<td>User's first surname.</td>
</tr>
<tr>
<td><code>email</code></td>
<td>string</td>
<td>optional</td>
<td>Email of register user.</td>
</tr>
<tr>
<td><code>city</code></td>
<td>string</td>
<td>optional</td>
<td>User location city.</td>
</tr>
<tr>
<td><code>verify</code></td>
<td>boolean</td>
<td>optional</td>
<td>User verification status.</td>
</tr>
<tr>
<td><code>calls_allowed</code></td>
<td>boolean</td>
<td>optional</td>
<td>Allowing the user to call him.</td>
</tr>
<tr>
<td><code>photo</code></td>
<td>array</td>
<td>optional</td>
<td>Array of used uploaded photos.</td>
</tr>
<tr>
<td><code>photo.*</code></td>
<td>integer</td>
<td>optional</td>
<td>Id of uploaded photo.</td>
</tr>
</tbody>
</table>
<!-- END_48a3115be98493a3c866eb0e23347262 -->
<!-- START_c10406606ec5e4965f90dea09af4eb05 -->
<h2>Show reviews for user</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/api/users/1/reviews" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/users/1/reviews"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">[
    {
        "id": 2,
        "text": "repudiandae facilis molestiae nulla rerum",
        "rating": 3,
        "created_at": "2020-07-31T11:04:22.000000Z",
        "updated_at": "2020-07-31T11:04:22.000000Z",
        "from_id": 10,
        "to_id": 1
    },
    {
        "id": 5,
        "text": "et voluptatum dolorem consectetur",
        "rating": 3,
        "created_at": "2020-07-31T11:04:22.000000Z",
        "updated_at": "2020-07-31T11:04:22.000000Z",
        "from_id": 5,
        "to_id": 1
    },
    {
        "id": 7,
        "text": "voluptatem excepturi est",
        "rating": 1,
        "created_at": "2020-07-31T11:04:22.000000Z",
        "updated_at": "2020-07-31T11:04:22.000000Z",
        "from_id": 7,
        "to_id": 1
    }
]</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/users/{user}/reviews</code></p>
<!-- END_c10406606ec5e4965f90dea09af4eb05 -->
<!-- START_e9aa8e9cecac4d07efa45f1b2d470efb -->
<h2>Login to admin panel</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/api/admin/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG" \
    -d '{"email":"mail@gmail.com","password":"1234qwer"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/admin/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG",
};

let body = {
    "email": "mail@gmail.com",
    "password": "1234qwer"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (404):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "User not found."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/admin/login</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>email</code></td>
<td>string</td>
<td>required</td>
<td>Email of register user to login.</td>
</tr>
<tr>
<td><code>password</code></td>
<td>string</td>
<td>required</td>
<td>Password of registered user to login.</td>
</tr>
</tbody>
</table>
<!-- END_e9aa8e9cecac4d07efa45f1b2d470efb -->
<h1>User (authorized)</h1>
<!-- START_8d1e53fcf4d2d02a6144ed392de856bf -->
<h2>Show authenticated user</h2>
<p><br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/api/users/me" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/users/me"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "error": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/users/me</code></p>
<!-- END_8d1e53fcf4d2d02a6144ed392de856bf -->
<!-- START_a1657ed8afd1df35235043bc2739bc9c -->
<h2>Rides history as a driver</h2>
<p><br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/api/users/me/driver_history" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/users/me/driver_history"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "error": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/users/me/driver_history</code></p>
<!-- END_a1657ed8afd1df35235043bc2739bc9c -->
<!-- START_3bc78f394235ea49fd3ff518912622bc -->
<h2>Rides history as a passenger</h2>
<p><br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/api/users/me/passenger_history" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/users/me/passenger_history"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "error": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/users/me/passenger_history</code></p>
<!-- END_3bc78f394235ea49fd3ff518912622bc -->
<!-- START_8f900cc4430f4ecbf2fcd64c22a75816 -->
<h2>Show reviews for an authorized user</h2>
<p><br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/api/users/me/reviews" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/users/me/reviews"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "error": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/users/me/reviews</code></p>
<!-- END_8f900cc4430f4ecbf2fcd64c22a75816 -->
<!-- START_af666edd751d50671d985d116b9fdebd -->
<h2>Show regular rides</h2>
<p><br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/api/users/me/regular_rides" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/users/me/regular_rides"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "error": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/users/me/regular_rides</code></p>
<!-- END_af666edd751d50671d985d116b9fdebd -->
<!-- START_c7d50c6e579f4a87247f902d05e777cb -->
<h2>Show archived regular rides</h2>
<p><br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/api/users/me/regular_rides_archived" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/users/me/regular_rides_archived"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "error": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/users/me/regular_rides_archived</code></p>
<!-- END_c7d50c6e579f4a87247f902d05e777cb -->
<h1>general</h1>
<!-- START_4dfafe7f87ec132be3c8990dd1fa9078 -->
<h2>Return an empty response simply to trigger the storage of the CSRF cookie in the browser.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/sanctum/csrf-cookie" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/sanctum/csrf-cookie"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>GET sanctum/csrf-cookie</code></p>
<!-- END_4dfafe7f87ec132be3c8990dd1fa9078 -->
<!-- START_b85049f3742ca2add2aa92b16da03cd7 -->
<h2>apidoc.json</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/apidoc.json" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/apidoc.json"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "variables": [],
    "info": {
        "name": "Laravel API",
        "_postman_id": "9da33f28-8b0a-4d08-94d8-3e9e599f2008",
        "description": "",
        "schema": "https:\/\/schema.getpostman.com\/json\/collection\/v2.0.0\/collection.json"
    },
    "item": [
        {
            "name": "Auth",
            "description": "\nClass AuthController",
            "item": [
                {
                    "name": "Auth Request\nregister User with phone and request code from SMS.ru",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost",
                            "path": "api\/auth",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "Authorization",
                                "value": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"phone\": \"explicabo\"\n}"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Login User\n[Login User with verification code and return access token]",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost",
                            "path": "api\/auth\/login",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "Authorization",
                                "value": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"phone\": \"+79998880123\",\n    \"code\": 1234\n}"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Check User and return User's information",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost",
                            "path": "api\/auth\/check",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "Authorization",
                                "value": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Logout",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost",
                            "path": "api\/auth\/logout",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "Authorization",
                                "value": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                }
            ]
        },
        {
            "name": "Driver",
            "description": "\nClass DriverController",
            "item": [
                {
                    "name": "Show unverified drivers",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost",
                            "path": "api\/drivers",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "Authorization",
                                "value": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Create Driver\n[User registration as a driver]",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost",
                            "path": "api\/drivers",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "Authorization",
                                "value": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"user_id\": 1,\n    \"car_brand\": \"Toyota\",\n    \"car_model\": \"Corolla\",\n    \"car_number\": \"c123cc\",\n    \"drivers_license\": \"1234543234567\",\n    \"passport\": \"12 34 567890\",\n    \"registration\": \"1234567788\",\n    \"longitude\": \"30.3446761\",\n    \"latitude\": \"59.932809\",\n    \"verify\": false,\n    \"document\": [\n        15\n    ]\n}"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Show driver",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost",
                            "path": "api\/drivers\/:driver",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "Authorization",
                                "value": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Update the driver information.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost",
                            "path": "api\/drivers\/:driver",
                            "query": []
                        },
                        "method": "PUT",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "Authorization",
                                "value": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"car_brand\": \"Toyota\",\n    \"car_model\": \"Corolla\",\n    \"car_number\": \"c123cc\",\n    \"drivers_license\": \"1234543234567\",\n    \"passport\": \"12 34 567890\",\n    \"registration\": \"1234567788\",\n    \"longitude\": 30.3446761,\n    \"latitude\": 59.932809,\n    \"verify\": false,\n    \"document\": [\n        6\n    ]\n}"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Delete driver (for tests)",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost",
                            "path": "api\/drivers\/:driver",
                            "query": []
                        },
                        "method": "DELETE",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "Authorization",
                                "value": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Show driver's documents",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost",
                            "path": "api\/drivers\/:driver\/documents",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "Authorization",
                                "value": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Send driver location",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost",
                            "path": "api\/drivers\/:driver\/location",
                            "query": []
                        },
                        "method": "PUT",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "Authorization",
                                "value": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"longitude\": 30.3446761,\n    \"latitude\": 59.932809\n}"
                        },
                        "description": "",
                        "response": []
                    }
                }
            ]
        },
        {
            "name": "Media",
            "description": "\nAPI for management medias (images)\n\nClass MediaController",
            "item": [
                {
                    "name": "Store media file",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost",
                            "path": "api\/files",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "Authorization",
                                "value": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Update media file information\n[Confirmation and rejection of documents]",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost",
                            "path": "api\/files\/:file",
                            "query": []
                        },
                        "method": "PUT",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "Authorization",
                                "value": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"verify\": 4,\n    \"name\": \"sint\"\n}"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Delete media file",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost",
                            "path": "api\/files\/:file",
                            "query": []
                        },
                        "method": "DELETE",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "Authorization",
                                "value": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                }
            ]
        },
        {
            "name": "Message",
            "description": "\nClass MessageController",
            "item": [
                {
                    "name": "Create message for ride's chat",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost",
                            "path": "api\/messages",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "Authorization",
                                "value": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"author_id\": 1,\n    \"ride_id\": 1,\n    \"text\": \"hello\"\n}"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Update message\n[Mark as read]",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost",
                            "path": "api\/messages\/:message",
                            "query": []
                        },
                        "method": "PUT",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "Authorization",
                                "value": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"is_read\": false\n}"
                        },
                        "description": "",
                        "response": []
                    }
                }
            ]
        },
        {
            "name": "Review",
            "description": "\nClass ReviewController",
            "item": [
                {
                    "name": "Show all reviews (for tests)",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost",
                            "path": "api\/reviews",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "Authorization",
                                "value": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Create user review",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost",
                            "path": "api\/reviews",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "Authorization",
                                "value": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"from_id\": 1,\n    \"to_id\": 1,\n    \"text\": \"Hice\",\n    \"rating\": 4\n}"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Show review (for tests)",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost",
                            "path": "api\/reviews\/:review",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "Authorization",
                                "value": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                }
            ]
        },
        {
            "name": "Ride",
            "description": "\nClass RideController",
            "item": [
                {
                    "name": "Show all rides with filters",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost",
                            "path": "api\/rides",
                            "query": [
                                {
                                    "key": "status",
                                    "value": "1",
                                    "description": "Filtering (searching) by ride status.",
                                    "disabled": false
                                },
                                {
                                    "key": "date",
                                    "value": "date%5B0%5D+%3D+%272020-01-01+00%3A00%3A00%27%3B+date%5B1%5D+%3D+%272020-01-01+12%3A30%3A00%27%3B",
                                    "description": "Filtering (searching) by dateTime ranges.",
                                    "disabled": false
                                },
                                {
                                    "key": "rating",
                                    "value": "price%5B0%5D+%3D+1%3B+price%5B1%5D+%3D+4",
                                    "description": "Filtering (searching) by price ranges.",
                                    "disabled": false
                                },
                                {
                                    "key": "duration",
                                    "value": "02%3A11",
                                    "description": "Filtering (searching) by ride duration (hh:mm).",
                                    "disabled": false
                                },
                                {
                                    "key": "member",
                                    "value": "Ivan+Ivanov",
                                    "description": "Filtering (searching) by ride participant.",
                                    "disabled": false
                                }
                            ]
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "Authorization",
                                "value": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Create ride",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost",
                            "path": "api\/rides",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "Authorization",
                                "value": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"user_id\": 1,\n    \"status_id\": 1,\n    \"price\": 300,\n    \"comment\": \"Passenger with a child.\",\n    \"city\": \"Moscow\",\n    \"position\": \"\\\"223127, \\u0410\\u043c\\u0443\\u0440\\u0441\\u043a\\u0430\\u044f \\u043e\\u0431\\u043b\\u0430\\u0441\\u0442\\u044c, \\u0433\\u043e\\u0440\\u043e\\u0434 \\u0427\\u0435\\u0445\\u043e\\u0432, \\u043f\\u0440. \\u041b\\u043e\\u043c\\u043e\\u043d\\u043e\\u0441\\u043e\\u0432\\u0430, 36\\\"\",\n    \"from_lat\": \"59.090273,\",\n    \"from_lng\": \"30.075711,\",\n    \"destination\": \"\\\"738200, \\u0421\\u0430\\u043c\\u0430\\u0440\\u0441\\u043a\\u0430\\u044f \\u043e\\u0431\\u043b\\u0430\\u0441\\u0442\\u044c, \\u0433\\u043e\\u0440\\u043e\\u0434 \\u041f\\u0443\\u0448\\u043a\\u0438\\u043d\\u043e, \\u0443\\u043b. \\u0411\\u0430\\u043b\\u043a\\u0430\\u043d\\u0441\\u043a\\u0430\\u044f, 52\\\"\",\n    \"to_lat\": \"59.090273,\",\n    \"to_lng\": \"30.075711,\"\n}"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Show ride",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost",
                            "path": "api\/rides\/:ride",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "Authorization",
                                "value": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Update the ride information.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost",
                            "path": "api\/rides\/:ride",
                            "query": []
                        },
                        "method": "PUT",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "Authorization",
                                "value": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"driver_id\": 1,\n    \"status_id\": 1,\n    \"price\": 300,\n    \"comment\": \"Passenger with a child.\",\n    \"city\": \"Moscow\",\n    \"position\": \"\\\"223127, \\u0410\\u043c\\u0443\\u0440\\u0441\\u043a\\u0430\\u044f \\u043e\\u0431\\u043b\\u0430\\u0441\\u0442\\u044c, \\u0433\\u043e\\u0440\\u043e\\u0434 \\u0427\\u0435\\u0445\\u043e\\u0432, \\u043f\\u0440. \\u041b\\u043e\\u043c\\u043e\\u043d\\u043e\\u0441\\u043e\\u0432\\u0430, 36\\\"\",\n    \"from_lat\": \"59.090273,\",\n    \"from_lng\": \"30.075711,\",\n    \"destination\": \"\\\"738200, \\u0421\\u0430\\u043c\\u0430\\u0440\\u0441\\u043a\\u0430\\u044f \\u043e\\u0431\\u043b\\u0430\\u0441\\u0442\\u044c, \\u0433\\u043e\\u0440\\u043e\\u0434 \\u041f\\u0443\\u0448\\u043a\\u0438\\u043d\\u043e, \\u0443\\u043b. \\u0411\\u0430\\u043b\\u043a\\u0430\\u043d\\u0441\\u043a\\u0430\\u044f, 52\\\"\",\n    \"to_lat\": \"59.090273,\",\n    \"to_lng\": \"30.075711,\",\n    \"start_at\": \"'2020-01-01 00:00:00',\",\n    \"finish_at\": \"'2020-01-01 10:30:00',\"\n}"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Show ride price offers",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost",
                            "path": "api\/rides\/:ride\/offers",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "Authorization",
                                "value": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Show ride chat",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost",
                            "path": "api\/rides\/:ride\/chat",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "Authorization",
                                "value": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Create a reason for canceling a trip",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost",
                            "path": "api\/reasons",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "Authorization",
                                "value": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"ride_id\": 1,\n    \"by_passenger\": true,\n    \"text\": \"The driver did not arrive\"\n}"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Create a price offer",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost",
                            "path": "api\/offers",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "Authorization",
                                "value": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"driver_id\": 1,\n    \"ride_id\": 1,\n    \"price\": 300\n}"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Delete offer",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost",
                            "path": "api\/offers\/:offer",
                            "query": []
                        },
                        "method": "DELETE",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "Authorization",
                                "value": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                }
            ]
        },
        {
            "name": "Schedule",
            "description": "\nClass ScheduleController",
            "item": [
                {
                    "name": "Create ride schedule",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost",
                            "path": "api\/schedules",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "Authorization",
                                "value": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"monday\": false,\n    \"tuesday\": false,\n    \"wednesday\": false,\n    \"thursday\": false,\n    \"friday\": true,\n    \"saturday\": true,\n    \"sunday\": false,\n    \"time\": \"accusantium\",\n    \"ride_id\": 1\n}"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Update ride schedule",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost",
                            "path": "api\/schedules\/:schedule",
                            "query": []
                        },
                        "method": "PUT",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "Authorization",
                                "value": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"monday\": false,\n    \"tuesday\": false,\n    \"wednesday\": false,\n    \"thursday\": false,\n    \"friday\": true,\n    \"saturday\": true,\n    \"sunday\": false,\n    \"time\": \"vero\",\n    \"ride_id\": 1\n}"
                        },
                        "description": "",
                        "response": []
                    }
                }
            ]
        },
        {
            "name": "User",
            "description": "\nClass UserController",
            "item": [
                {
                    "name": "Show all users with filters",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost",
                            "path": "api\/users",
                            "query": [
                                {
                                    "key": "city",
                                    "value": "Moscow",
                                    "description": "Filtering (searching) by user city.",
                                    "disabled": false
                                },
                                {
                                    "key": "verify",
                                    "value": "",
                                    "description": "Filtering (searching) by user verification (true or false string).",
                                    "disabled": true
                                },
                                {
                                    "key": "phone",
                                    "value": "",
                                    "description": "Filtering (searching) by user phone.",
                                    "disabled": true
                                },
                                {
                                    "key": "name",
                                    "value": "Ivan+Ivanov",
                                    "description": "Filtering (searching) by user name.",
                                    "disabled": false
                                },
                                {
                                    "key": "rating",
                                    "value": "necessitatibus",
                                    "description": "Filtering (searching) by rating ranges. rating[0] = 1; rating[1] = 4",
                                    "disabled": false
                                },
                                {
                                    "key": "driver",
                                    "value": "",
                                    "description": "Filtering (searching) for driver registration (true or false string).",
                                    "disabled": true
                                }
                            ]
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "Authorization",
                                "value": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Show user",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost",
                            "path": "api\/users\/:user",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "Authorization",
                                "value": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Update user",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost",
                            "path": "api\/users\/:user",
                            "query": []
                        },
                        "method": "PUT",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "Authorization",
                                "value": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"first_name\": \"omnis\",\n    \"last_name\": \"deserunt\",\n    \"email\": \"mail@gmail.com\",\n    \"city\": \"Moscow\",\n    \"verify\": false,\n    \"calls_allowed\": true,\n    \"photo\": [\n        14\n    ]\n}"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Show reviews for user",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost",
                            "path": "api\/users\/:user\/reviews",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "Authorization",
                                "value": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Login to admin panel",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost",
                            "path": "api\/admin\/login",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "Authorization",
                                "value": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"email\": \"mail@gmail.com\",\n    \"password\": \"1234qwer\"\n}"
                        },
                        "description": "",
                        "response": []
                    }
                }
            ]
        },
        {
            "name": "User (authorized)",
            "description": "",
            "item": [
                {
                    "name": "Show authenticated user",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost",
                            "path": "api\/users\/me",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "Authorization",
                                "value": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Rides history as a driver",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost",
                            "path": "api\/users\/me\/driver_history",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "Authorization",
                                "value": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Rides history as a passenger",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost",
                            "path": "api\/users\/me\/passenger_history",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "Authorization",
                                "value": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Show reviews for an authorized user",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost",
                            "path": "api\/users\/me\/reviews",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "Authorization",
                                "value": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Show regular rides",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost",
                            "path": "api\/users\/me\/regular_rides",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "Authorization",
                                "value": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Show archived regular rides",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost",
                            "path": "api\/users\/me\/regular_rides_archived",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "Authorization",
                                "value": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                }
            ]
        },
        {
            "name": "general",
            "description": "",
            "item": [
                {
                    "name": "Return an empty response simply to trigger the storage of the CSRF cookie in the browser.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost",
                            "path": "sanctum\/csrf-cookie",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "Authorization",
                                "value": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "apidoc.json",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost",
                            "path": "apidoc.json",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "Authorization",
                                "value": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Authenticate the request for channel access.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost",
                            "path": "broadcasting\/auth",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "Authorization",
                                "value": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                }
            ]
        }
    ]
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET apidoc.json</code></p>
<!-- END_b85049f3742ca2add2aa92b16da03cd7 -->
<!-- START_66df3678904adde969490f2278b8f47f -->
<h2>Authenticate the request for channel access.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/broadcasting/auth" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/broadcasting/auth"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "error": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET broadcasting/auth</code></p>
<p><code>POST broadcasting/auth</code></p>
<!-- END_66df3678904adde969490f2278b8f47f -->
      </div>
      <div class="dark-box">
                        <div class="lang-selector">
                                    <a href="#" data-language-name="bash">bash</a>
                                    <a href="#" data-language-name="javascript">javascript</a>
                              </div>
                </div>
    </div>
  </body>
</html>