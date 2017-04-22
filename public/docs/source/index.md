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

#general
<!-- START_e48c87fe4e56d4dbef953329facb44ff -->
## Display the specified resource.

return [
'title' => 'required|max:255',
'body' => 'required',
'type' => 'in:foo,bar',
'thumbnail' => 'required_if:type,foo|image',
];

> Example request:

```bash
curl -X POST "http://localhost/api/v1/signin" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/signin",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/v1/signin`


<!-- END_e48c87fe4e56d4dbef953329facb44ff -->

