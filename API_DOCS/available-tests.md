## available-tests

request: <strong> GET </strong>

<strong> http://localhost:8000/api/available-tests </strong>
<strong> No Request body </strong>

<strong> Must provide [ Autherization header (secret token) ] like that <code>Bearer 13|P6VvMvJmWQ05wgyic6zXux42deaqL5nzJtVnOCB3</code> </strong>

### Response 
#### if successful operation

<pre>
<code>
[
    {
        "test_id": 1,
        "test-name": "PCR",
        "test-fee": 200
    },
    {
        "test_id": 2,
        "test-name": "anti-bodies",
        "test-fee": 100
    },
    {
        "test_id": 3,
        "test-name": "CBD",
        "test-fee": 150
    }
]
</code>
</pre>
