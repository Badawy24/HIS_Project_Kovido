## available-tests

request: <strong> GET </strong>

<strong> http://127.0.0.1:8000/api/available-tests </strong>
</br>


<strong> No Request body </strong>

<strong> Must provide [ <code>Autherization header</code> (secret token) ] like that <code>Bearer 13|P6VvMvJmWQ05wgyic6zXux42deaqL5nzJtVnOCB3</code> </strong>

### Response 
#### if successful operation <code>status code = 200</code>

<pre>
<code>
[
    {
        "test_id": 1,
        "test-name": "PCR"
    },
    {
        "test_id": 2,
        "test-name": "Anti-bodies"
    },
    {
        "test_id": 3,
        "test-name": "CBC"
    }
]
</code>
</pre>
