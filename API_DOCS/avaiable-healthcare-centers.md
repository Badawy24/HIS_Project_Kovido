## avaiable-healthcare-centers

request: <strong> GET </strong>

<strong> http://localhost:8000/api/avaiable-healthcare-centers </strong>
<strong> No Request body </strong>

<strong> Must provide [ <code>Autherization header</code> (secret token) ] like that <code>Bearer 13|P6VvMvJmWQ05wgyic6zXux42deaqL5nzJtVnOCB3</code> </strong>

### Response 
#### if successful operation <code>status code = 200</code>

<pre>
<code>
[
    {
        "hc_id": 1,
        "hc_name": "Abbasia Hospital for Chest Diseases",
        "hc_address": "Cairo"
    },
    {
        "hc_id": 2,
        "hc_name": "Sadr Imbaba Hospital",
        "hc_address": "Giza"
    },
    {
        "hc_id": 3,
        "hc_name": "Al-Sadr Hospital in Shubra",
        "hc_address": "Cairo"
    }
]
</code>
</pre>
