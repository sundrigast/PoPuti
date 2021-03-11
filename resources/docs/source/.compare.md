---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/docs/collection.json)

<!-- END_INFO -->

#Auth


Class AuthController
<!-- START_5ef90dd4846f0d2902b89354bf5c42bb -->
## Auth Request
register User with phone and request code from SMS.ru

> Example request:

```bash
curl -X POST \
    "http://localhost/api/auth" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG" \
    -d '{"phone":"perferendis"}'

```

```javascript
const url = new URL(
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
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (502):

```json
{
    "message": "auth.sms_failed"
}
```

### HTTP Request
`POST api/auth`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `phone` | required |  optional  | User's phone number
    
<!-- END_5ef90dd4846f0d2902b89354bf5c42bb -->

<!-- START_a925a8d22b3615f12fca79456d286859 -->
## Login User
[Login User with verification code and return access token]

> Example request:

```bash
curl -X POST \
    "http://localhost/api/auth/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG" \
    -d '{"phone":"+79998880123","code":1234}'

```

```javascript
const url = new URL(
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
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (422):

```json
{
    "message": "The given data was invalid.",
    "errors": {
        "phone": [
            "The selected phone is invalid."
        ],
        "code": [
            "The selected code is invalid."
        ]
    }
}
```

### HTTP Request
`POST api/auth/login`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `phone` | string |  required  | User's phone.
        `code` | integer |  required  | Auth code.
    
<!-- END_a925a8d22b3615f12fca79456d286859 -->

<!-- START_10ee8abe366895f0c1d35cc42004a092 -->
## Check User and return User&#039;s information

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/auth/check" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"
```

```javascript
const url = new URL(
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
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET api/auth/check`


<!-- END_10ee8abe366895f0c1d35cc42004a092 -->

<!-- START_16928cb8fc6adf2d9bb675d62a2095c5 -->
## Logout

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/auth/logout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"
```

```javascript
const url = new URL(
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
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET api/auth/logout`


<!-- END_16928cb8fc6adf2d9bb675d62a2095c5 -->

#Driver


Class DriverController
<!-- START_a1456aacb67521a2e69d0730748b0ce9 -->
## Show unverified drivers

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/drivers" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"
```

```javascript
const url = new URL(
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
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
[
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
]
```

### HTTP Request
`GET api/drivers`


<!-- END_a1456aacb67521a2e69d0730748b0ce9 -->

<!-- START_a90dbfa952a2d00ebd5881ca8b6b9011 -->
## Create Driver
[User registration as a driver]

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "http://localhost/api/drivers" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG" \
    -d '{"user_id":1,"car_brand":"Toyota","car_model":"Corolla","car_number":"c123cc","drivers_license":"1234543234567","passport":"12 34 567890","registration":"1234567788","longitude":"30.3446761","latitude":"59.932809","verify":true,"document":[10]}'

```

```javascript
const url = new URL(
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
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`POST api/drivers`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `user_id` | integer |  required  | User id to register as a driver.
        `car_brand` | string |  required  | Driver's car brand.
        `car_model` | string |  required  | Driver's car model.
        `car_number` | string |  required  | Driver's car number.
        `drivers_license` | string |  optional  | Document confirming the right to drive vehicles.
        `passport` | string |  optional  | Identity document.
        `registration` | string |  optional  | Document containing information about the vehicle.
        `longitude` | numeric |  optional  | longitude Driver location coordinates.
        `latitude` | numeric |  optional  | latitude Driver location coordinates.
        `verify` | boolean |  optional  | Driver verification status.
        `document` | array |  optional  | Array of used uploaded photos of documents.
        `document.*` | integer |  optional  | Id of uploaded photos of documents.
    
<!-- END_a90dbfa952a2d00ebd5881ca8b6b9011 -->

<!-- START_42fae5a497f284a63942263a2398734d -->
## Show driver

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/drivers/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"
```

```javascript
const url = new URL(
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
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
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
}
```

### HTTP Request
`GET api/drivers/{driver}`


<!-- END_42fae5a497f284a63942263a2398734d -->

<!-- START_689936c85252b1d08b025be0447f11ee -->
## Update the driver information.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PUT \
    "http://localhost/api/drivers/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG" \
    -d '{"car_brand":"Toyota","car_model":"Corolla","car_number":"c123cc","drivers_license":"1234543234567","passport":"12 34 567890","registration":"1234567788","longitude":30.3446761,"latitude":59.932809,"verify":true,"document":[13]}'

```

```javascript
const url = new URL(
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
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`PUT api/drivers/{driver}`

`PATCH api/drivers/{driver}`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `car_brand` | string |  optional  | Driver's car brand.
        `car_model` | string |  optional  | Driver's car model.
        `car_number` | string |  optional  | Driver's car number.
        `drivers_license` | string |  optional  | Document confirming the right to drive vehicles.
        `passport` | string |  optional  | Identity document.
        `registration` | string |  optional  | Document containing information about the vehicle.
        `longitude` | float |  optional  | longitude Driver location coordinates.
        `latitude` | float |  optional  | latitude Driver location coordinates.
        `verify` | boolean |  optional  | Driver verification status.
        `document` | array |  optional  | Array of used uploaded photos of documents.
        `document.*` | integer |  optional  | Id of uploaded photos of documents.
    
<!-- END_689936c85252b1d08b025be0447f11ee -->

<!-- START_819b51704b0da05513d2593a7c0ae257 -->
## Delete driver (for tests)

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/drivers/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"
```

```javascript
const url = new URL(
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
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`DELETE api/drivers/{driver}`


<!-- END_819b51704b0da05513d2593a7c0ae257 -->

<!-- START_96fbe7214a8e65c0aa03fa0e19d52c68 -->
## Show driver&#039;s documents

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/drivers/1/documents" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"
```

```javascript
const url = new URL(
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
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
[]
```

### HTTP Request
`GET api/drivers/{driver}/documents`


<!-- END_96fbe7214a8e65c0aa03fa0e19d52c68 -->

<!-- START_bbdedd8d5e313f3375db5b3c709de7ac -->
## Send driver location

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PUT \
    "http://localhost/api/drivers/1/location" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG" \
    -d '{"longitude":30.3446761,"latitude":59.932809}'

```

```javascript
const url = new URL(
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
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "message": "Местоположение отправлено",
    "location": {
        "latitude": 60.393031,
        "longitude": 30.153743
    }
}
```

### HTTP Request
`PUT api/drivers/{driver}/location`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `longitude` | float |  optional  | longitude Driver location coordinates.
        `latitude` | float |  optional  | latitude Driver location coordinates.
    
<!-- END_bbdedd8d5e313f3375db5b3c709de7ac -->

#Media


API for management medias (images)

Class MediaController
<!-- START_f178682e39dcb66c17814ee8c3203fcc -->
## Store media file

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "http://localhost/api/files" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG" \

```

```javascript
const url = new URL(
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
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`POST api/files`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `file` | image |  required  | Image need to be upload to server.
    
<!-- END_f178682e39dcb66c17814ee8c3203fcc -->

<!-- START_3383eecccc67028d796fb7abd735b552 -->
## Update media file information
[Confirmation and rejection of documents]

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PUT \
    "http://localhost/api/files/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG" \
    -d '{"verify":16,"name":"amet"}'

```

```javascript
const url = new URL(
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
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`PUT api/files/{file}`

`PATCH api/files/{file}`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `verify` | integer |  optional  | Photo verification status.
        `name` | string |  optional  | Photo name.
    
<!-- END_3383eecccc67028d796fb7abd735b552 -->

<!-- START_7fec844060fbf8f1a57014ed9b6c8e71 -->
## Delete media file

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/files/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"
```

```javascript
const url = new URL(
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
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`DELETE api/files/{file}`


<!-- END_7fec844060fbf8f1a57014ed9b6c8e71 -->

#Message


Class MessageController
<!-- START_35df1f44031ea96b6e03eca6e38ceda7 -->
## Create message for ride&#039;s chat

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "http://localhost/api/messages" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG" \
    -d '{"author_id":1,"ride_id":1,"text":"hello"}'

```

```javascript
const url = new URL(
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
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`POST api/messages`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `author_id` | integer |  required  | User id which message author.
        `ride_id` | integer |  required  | Ride id to send a message to ride member.
        `text` | string |  required  | Message text.
    
<!-- END_35df1f44031ea96b6e03eca6e38ceda7 -->

<!-- START_864df26c2d4bb4cd50d27fa6f76dde17 -->
## Update message
[Mark as read]

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PUT \
    "http://localhost/api/messages/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG" \
    -d '{"is_read":true}'

```

```javascript
const url = new URL(
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
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`PUT api/messages/{message}`

`PATCH api/messages/{message}`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `is_read` | boolean |  required  | Mark message as read.
    
<!-- END_864df26c2d4bb4cd50d27fa6f76dde17 -->

#Review


Class ReviewController
<!-- START_50999491bc3a54c383d134cba750f58d -->
## Show all reviews (for tests)

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/reviews" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"
```

```javascript
const url = new URL(
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
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
[
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
]
```

### HTTP Request
`GET api/reviews`


<!-- END_50999491bc3a54c383d134cba750f58d -->

<!-- START_addef74ffb3ebdd2a128f801a9009fb7 -->
## Create user review

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "http://localhost/api/reviews" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG" \
    -d '{"from_id":1,"to_id":1,"text":"Hice","rating":4}'

```

```javascript
const url = new URL(
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
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`POST api/reviews`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `from_id` | integer |  required  | User id Review sender.
        `to_id` | integer |  required  | User id Review addressee.
        `text` | string |  optional  | Review text.
        `rating` | integer |  required  | Rating.
    
<!-- END_addef74ffb3ebdd2a128f801a9009fb7 -->

<!-- START_f28c14203b1b4d273f19fb792d2eaa33 -->
## Show review (for tests)

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/reviews/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"
```

```javascript
const url = new URL(
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
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "id": 1,
    "text": "quidem voluptatem aut numquam voluptates tenetur sed",
    "rating": 5,
    "created_at": "2020-07-31T11:04:22.000000Z",
    "updated_at": "2020-07-31T11:04:22.000000Z",
    "from_id": 8,
    "to_id": 2
}
```

### HTTP Request
`GET api/reviews/{review}`


<!-- END_f28c14203b1b4d273f19fb792d2eaa33 -->

#Ride


Class RideController
<!-- START_80da6feff88f7028dcef0849896ea674 -->
## Show all rides with filters

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/rides?status=1&date=date%5B0%5D+%3D+%272020-01-01+00%3A00%3A00%27%3B+date%5B1%5D+%3D+%272020-01-01+12%3A30%3A00%27%3B&rating=price%5B0%5D+%3D+1%3B+price%5B1%5D+%3D+4&duration=02%3A11&member=member%5B0%5D+%3D+Ivan%3B+member%5B1%5D+%3D+Ivanov" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"
```

```javascript
const url = new URL(
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
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET api/rides`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `status` |  optional  | Filtering (searching) by ride status.
    `date` |  optional  | Filtering (searching) by dateTime ranges.
    `rating` |  optional  | Filtering (searching) by price ranges.
    `duration` |  optional  | Filtering (searching) by ride duration (hh:mm).
    `member` |  optional  | Filtering (searching) by ride participant.

<!-- END_80da6feff88f7028dcef0849896ea674 -->

<!-- START_1107959050903cccc58b4e90211295f3 -->
## Create ride

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "http://localhost/api/rides" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG" \
    -d '{"user_id":1,"status_id":1,"price":300,"comment":"Passenger with a child.","city":"Moscow","position":"\"223127, \u0410\u043c\u0443\u0440\u0441\u043a\u0430\u044f \u043e\u0431\u043b\u0430\u0441\u0442\u044c, \u0433\u043e\u0440\u043e\u0434 \u0427\u0435\u0445\u043e\u0432, \u043f\u0440. \u041b\u043e\u043c\u043e\u043d\u043e\u0441\u043e\u0432\u0430, 36\"","from_lat":"59.090273,","from_lng":"30.075711,","destination":"\"738200, \u0421\u0430\u043c\u0430\u0440\u0441\u043a\u0430\u044f \u043e\u0431\u043b\u0430\u0441\u0442\u044c, \u0433\u043e\u0440\u043e\u0434 \u041f\u0443\u0448\u043a\u0438\u043d\u043e, \u0443\u043b. \u0411\u0430\u043b\u043a\u0430\u043d\u0441\u043a\u0430\u044f, 52\"","to_lat":"59.090273,","to_lng":"30.075711,"}'

```

```javascript
const url = new URL(
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
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`POST api/rides`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `user_id` | integer |  required  | User id being a passenger.
        `status_id` | integer |  optional  | RideStatus id for ride status.
        `price` | integer |  required  | Price for ride.
        `comment` | string |  optional  | Comment on the ride.
        `city` | string |  required  | City of ride.
        `position` | string |  required  | Position address.
        `from_lat` | numeric |  required  | Position latitude.
        `from_lng` | numeric |  required  | Position longitude.
        `destination` | string |  required  | Destination address.
        `to_lat` | numeric |  required  | Destination latitude.
        `to_lng` | numeric |  required  | Destination longitude.
    
<!-- END_1107959050903cccc58b4e90211295f3 -->

<!-- START_6d86266fd0be30c64d47710be1ec9c81 -->
## Show ride

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/rides/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"
```

```javascript
const url = new URL(
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
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
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
}
```

### HTTP Request
`GET api/rides/{ride}`


<!-- END_6d86266fd0be30c64d47710be1ec9c81 -->

<!-- START_b6b06407f12bbb4a5e781dfbe721990d -->
## Update the ride information.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PUT \
    "http://localhost/api/rides/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG" \
    -d '{"driver_id":1,"status_id":1,"price":300,"comment":"Passenger with a child.","city":"Moscow","position":"\"223127, \u0410\u043c\u0443\u0440\u0441\u043a\u0430\u044f \u043e\u0431\u043b\u0430\u0441\u0442\u044c, \u0433\u043e\u0440\u043e\u0434 \u0427\u0435\u0445\u043e\u0432, \u043f\u0440. \u041b\u043e\u043c\u043e\u043d\u043e\u0441\u043e\u0432\u0430, 36\"","from_lat":"59.090273,","from_lng":"30.075711,","destination":"\"738200, \u0421\u0430\u043c\u0430\u0440\u0441\u043a\u0430\u044f \u043e\u0431\u043b\u0430\u0441\u0442\u044c, \u0433\u043e\u0440\u043e\u0434 \u041f\u0443\u0448\u043a\u0438\u043d\u043e, \u0443\u043b. \u0411\u0430\u043b\u043a\u0430\u043d\u0441\u043a\u0430\u044f, 52\"","to_lat":"59.090273,","to_lng":"30.075711,","start_at":"'2020-01-01 00:00:00',","finish_at":"'2020-01-01 10:30:00',"}'

```

```javascript
const url = new URL(
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
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`PUT api/rides/{ride}`

`PATCH api/rides/{ride}`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `driver_id` | integer |  required  | User id being a driver.
        `status_id` | integer |  optional  | RideStatus id for ride status.
        `price` | integer |  optional  | Price for ride.
        `comment` | string |  optional  | Comment on the ride.
        `city` | string |  required  | City of ride.
        `position` | string |  optional  | Position address.
        `from_lat` | numeric |  optional  | Position latitude.
        `from_lng` | numeric |  optional  | Position longitude.
        `destination` | string |  optional  | Destination address.
        `to_lat` | numeric |  optional  | Destination latitude.
        `to_lng` | numeric |  optional  | Destination longitude.
        `start_at` | date |  optional  | Destination latitude.
        `finish_at` | date |  required  | Destination longitude.
    
<!-- END_b6b06407f12bbb4a5e781dfbe721990d -->

<!-- START_8b5c1ecd2ebc964b4fd452629721700d -->
## Show ride price offers

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/rides/1/offers" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"
```

```javascript
const url = new URL(
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
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
[
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
]
```

### HTTP Request
`GET api/rides/{ride}/offers`


<!-- END_8b5c1ecd2ebc964b4fd452629721700d -->

<!-- START_f4db3aec9357c1502f94b748229b1753 -->
## Show ride chat

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/rides/1/chat" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"
```

```javascript
const url = new URL(
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
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
[]
```

### HTTP Request
`GET api/rides/{ride}/chat`


<!-- END_f4db3aec9357c1502f94b748229b1753 -->

<!-- START_2ac66414f529e06bc175c8483a5de8ca -->
## Create a reason for canceling a trip

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "http://localhost/api/reasons" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG" \
    -d '{"ride_id":1,"by_passenger":true,"text":"The driver did not arrive"}'

```

```javascript
const url = new URL(
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
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`POST api/reasons`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `ride_id` | integer |  required  | Ride id for cancellation.
        `by_passenger` | boolean |  required  | Whether the ride was canceled by the passenger.
        `text` | string |  optional  | Reason for cancellation.
    
<!-- END_2ac66414f529e06bc175c8483a5de8ca -->

<!-- START_a45eaa0bc07a2833fc15fdfb8cd32142 -->
## Create a price offer

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "http://localhost/api/offers" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG" \
    -d '{"driver_id":1,"ride_id":1,"price":300}'

```

```javascript
const url = new URL(
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
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`POST api/offers`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `driver_id` | integer |  required  | User id who offers new ride price.
        `ride_id` | integer |  required  | Ride id to offer a new price.
        `price` | integer |  required  | Price offer.
    
<!-- END_a45eaa0bc07a2833fc15fdfb8cd32142 -->

<!-- START_f7b14e58800200c9dd82259343ecea98 -->
## Delete offer

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/offers/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"
```

```javascript
const url = new URL(
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
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`DELETE api/offers/{offer}`


<!-- END_f7b14e58800200c9dd82259343ecea98 -->

#Schedule


Class ScheduleController
<!-- START_91eb75872fa74f2d8bb4a78be45be4a6 -->
## Create ride schedule

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "http://localhost/api/schedules" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG" \
    -d '{"monday":true,"tuesday":false,"wednesday":true,"thursday":true,"friday":true,"saturday":false,"sunday":false,"time":"quia","ride_id":1}'

```

```javascript
const url = new URL(
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
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`POST api/schedules`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `monday` | boolean |  required  | Monday availability on schedule.
        `tuesday` | boolean |  required  | Tuesday availability on schedule.
        `wednesday` | boolean |  required  | Wednesday availability on schedule.
        `thursday` | boolean |  required  | Thursday availability on schedule.
        `friday` | boolean |  required  | Friday availability on schedule.
        `saturday` | boolean |  required  | Saturday availability on schedule.
        `sunday` | boolean |  required  | Sunday availability on schedule.
        `time` | date |  required  | Time for schedule(format:H:i).
        `ride_id` | integer |  optional  | Ride id for ride schedule.
    
<!-- END_91eb75872fa74f2d8bb4a78be45be4a6 -->

<!-- START_79a60dca46732cb6ae6fe86ada7043d6 -->
## Update ride schedule

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PUT \
    "http://localhost/api/schedules/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG" \
    -d '{"monday":false,"tuesday":true,"wednesday":false,"thursday":false,"friday":true,"saturday":true,"sunday":false,"time":"ipsum","ride_id":1}'

```

```javascript
const url = new URL(
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
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`PUT api/schedules/{schedule}`

`PATCH api/schedules/{schedule}`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `monday` | boolean |  optional  | Monday availability on schedule.
        `tuesday` | boolean |  optional  | Tuesday availability on schedule.
        `wednesday` | boolean |  optional  | Wednesday availability on schedule.
        `thursday` | boolean |  optional  | Thursday availability on schedule.
        `friday` | boolean |  optional  | Friday availability on schedule.
        `saturday` | boolean |  optional  | Saturday availability on schedule.
        `sunday` | boolean |  optional  | Sunday availability on schedule.
        `time` | date |  optional  | Time for schedule(format:H:i).
        `ride_id` | integer |  optional  | Ride id for ride schedule.
    
<!-- END_79a60dca46732cb6ae6fe86ada7043d6 -->

#User


Class UserController
<!-- START_fc1e4f6a697e3c48257de845299b71d5 -->
## Show all users with filters

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/users?city=Moscow&name=name%5B0%5D+%3D+Ivan%3B+name%5B1%5D+%3D+Ivanov&rating=ex" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"
```

```javascript
const url = new URL(
    "http://localhost/api/users"
);

let params = {
    "city": "Moscow",
    "name": "name[0] = Ivan; name[1] = Ivanov",
    "rating": "ex",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
[]
```

### HTTP Request
`GET api/users`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `city` |  optional  | Filtering (searching) by user city.
    `verify` |  optional  | Filtering (searching) by user verification (true or false string).
    `phone` |  optional  | Filtering (searching) by user phone.
    `name` |  optional  | Filtering (searching) by user name.
    `rating` |  optional  | Filtering (searching) by rating ranges. rating[0] = 1; rating[1] = 4
    `driver` |  optional  | Filtering (searching) for driver registration (true or false string).

<!-- END_fc1e4f6a697e3c48257de845299b71d5 -->

<!-- START_8653614346cb0e3d444d164579a0a0a2 -->
## Show user

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/users/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"
```

```javascript
const url = new URL(
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
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
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
}
```

### HTTP Request
`GET api/users/{user}`


<!-- END_8653614346cb0e3d444d164579a0a0a2 -->

<!-- START_48a3115be98493a3c866eb0e23347262 -->
## Update user

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PUT \
    "http://localhost/api/users/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG" \
    -d '{"first_name":"reiciendis","last_name":"maxime","email":"mail@gmail.com","city":"Moscow","verify":false,"calls_allowed":false,"photo":[13]}'

```

```javascript
const url = new URL(
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
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`PUT api/users/{user}`

`PATCH api/users/{user}`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `first_name` | string |  optional  | User's first name.
        `last_name` | string |  optional  | User's first surname.
        `email` | string |  optional  | Email of register user.
        `city` | string |  optional  | User location city.
        `verify` | boolean |  optional  | User verification status.
        `calls_allowed` | boolean |  optional  | Allowing the user to call him.
        `photo` | array |  optional  | Array of used uploaded photos.
        `photo.*` | integer |  optional  | Id of uploaded photo.
    
<!-- END_48a3115be98493a3c866eb0e23347262 -->

<!-- START_c10406606ec5e4965f90dea09af4eb05 -->
## Show reviews for user

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/users/1/reviews" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"
```

```javascript
const url = new URL(
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
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
[
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
]
```

### HTTP Request
`GET api/users/{user}/reviews`


<!-- END_c10406606ec5e4965f90dea09af4eb05 -->

<!-- START_e9aa8e9cecac4d07efa45f1b2d470efb -->
## Login to admin panel

> Example request:

```bash
curl -X POST \
    "http://localhost/api/admin/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG" \
    -d '{"email":"mail@gmail.com","password":"1234qwer"}'

```

```javascript
const url = new URL(
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
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (404):

```json
{
    "message": "User not found."
}
```

### HTTP Request
`POST api/admin/login`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `email` | string |  required  | Email of register user to login.
        `password` | string |  required  | Password of registered user to login.
    
<!-- END_e9aa8e9cecac4d07efa45f1b2d470efb -->

#User (authorized)


<!-- START_8d1e53fcf4d2d02a6144ed392de856bf -->
## Show authenticated user

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/users/me" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"
```

```javascript
const url = new URL(
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
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET api/users/me`


<!-- END_8d1e53fcf4d2d02a6144ed392de856bf -->

<!-- START_a1657ed8afd1df35235043bc2739bc9c -->
## Rides history as a driver

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/users/me/driver_history" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"
```

```javascript
const url = new URL(
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
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET api/users/me/driver_history`


<!-- END_a1657ed8afd1df35235043bc2739bc9c -->

<!-- START_3bc78f394235ea49fd3ff518912622bc -->
## Rides history as a passenger

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/users/me/passenger_history" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"
```

```javascript
const url = new URL(
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
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET api/users/me/passenger_history`


<!-- END_3bc78f394235ea49fd3ff518912622bc -->

<!-- START_8f900cc4430f4ecbf2fcd64c22a75816 -->
## Show reviews for an authorized user

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/users/me/reviews" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"
```

```javascript
const url = new URL(
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
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET api/users/me/reviews`


<!-- END_8f900cc4430f4ecbf2fcd64c22a75816 -->

<!-- START_af666edd751d50671d985d116b9fdebd -->
## Show regular rides

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/users/me/regular_rides" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"
```

```javascript
const url = new URL(
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
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET api/users/me/regular_rides`


<!-- END_af666edd751d50671d985d116b9fdebd -->

<!-- START_c7d50c6e579f4a87247f902d05e777cb -->
## Show archived regular rides

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/users/me/regular_rides_archived" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"
```

```javascript
const url = new URL(
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
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET api/users/me/regular_rides_archived`


<!-- END_c7d50c6e579f4a87247f902d05e777cb -->

#general


<!-- START_4dfafe7f87ec132be3c8990dd1fa9078 -->
## Return an empty response simply to trigger the storage of the CSRF cookie in the browser.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/sanctum/csrf-cookie" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"
```

```javascript
const url = new URL(
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
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`GET sanctum/csrf-cookie`


<!-- END_4dfafe7f87ec132be3c8990dd1fa9078 -->

<!-- START_b85049f3742ca2add2aa92b16da03cd7 -->
## apidoc.json
> Example request:

```bash
curl -X GET \
    -G "http://localhost/apidoc.json" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"
```

```javascript
const url = new URL(
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
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
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
}
```

### HTTP Request
`GET apidoc.json`


<!-- END_b85049f3742ca2add2aa92b16da03cd7 -->

<!-- START_66df3678904adde969490f2278b8f47f -->
## Authenticate the request for channel access.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/broadcasting/auth" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer 7|8VbA2uljjQT98FlhtdJ7GdZM4G3NEpFvddMhZyV3NVPnyvihXhTmJlxPqKI0c9a8izGtycEyban8fcgG"
```

```javascript
const url = new URL(
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
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET broadcasting/auth`

`POST broadcasting/auth`


<!-- END_66df3678904adde969490f2278b8f47f -->


