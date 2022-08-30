## avaiable-healthcare-centers

request: <strong> GET </strong>

<strong> http://127.0.0.1:8000/api/avaiable-healthcare-centers </strong>
<strong> No Request body </strong>

<strong> Must provide [ <code>Autherization header</code> (secret token) ] like that <code>Bearer 13|P6VvMvJmWQ05wgyic6zXux42deaqL5nzJtVnOCB3</code> </strong>

### Response 
#### if successful operation <code>status code = 200</code>

<pre>
<code>
[
    {
        "hc_id": 1,
        "hc_name": "benha",
        "hc_address": "benha"
    },
    {
        "hc_id": 2,
        "hc_name": "tanta",
        "hc_address": "tanta"
    },
    {
        "hc_id": 3,
        "hc_name": "giza",
        "hc_address": "giza"
    },
    {
        "hc_id": 4,
        "hc_name": "cairo hcc",
        "hc_address": "cairo hcc"
    }
]
</code>
</pre>
