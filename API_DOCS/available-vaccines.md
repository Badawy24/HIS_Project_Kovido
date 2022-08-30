## available-vaccines

request: <strong> GET </strong>


<strong>
  http://127.0.0.1:8000/api/available-vaccines
</strong>

<strong> No Request body </strong>


<strong> Must provide [ <code>Autherization header</code> (secret token) ] like that <code>Bearer 13|P6VvMvJmWQ05wgyic6zXux42deaqL5nzJtVnOCB3</code> </strong>

### Response 
#### if successful operation
<pre>
<code>
[
    {
        "dose_id": 1,
        "vaccine_name": "AAA"
    },
    {
        "dose_id": 2,
        "vaccine_name": "BBB"
    },
    {
        "dose_id": 3,
        "vaccine_name": "CCC"
    },
    {
        "dose_id": 4,
        "vaccine_name": "DDD"
    }
]
</code>
</pre>
