# get-tests-reserved

this is for get all tests that the user reserved

<code>http://127.0.0.1:8000/api/get-tests-reserved</code>

request: <strong> GET </strong>

<strong> No Request body </strong>

<strong> Must provide [ <code>Autherization header</code> (secret token) ] like that <code>Bearer 13|P6VvMvJmWQ05wgyic6zXux42deaqL5nzJtVnOCB3</code> </strong>

### Response 
#### if successful operation <code>status code = 200</code>

<pre>
<code>
[
    {
        "test_name": "CBC",
        "pat_test_date": "25/10/2022",
        "pat_test_time": "09:00",
        "hc_name": "benha",
        "res_id": 25
    }
]
</code>
</pre>
