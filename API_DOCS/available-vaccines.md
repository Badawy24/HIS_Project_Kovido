## available-vaccines

request: <strong> GET </strong>


<strong>
   http://localhost:8000/api/available-tests
</strong>

<strong> No Request body </strong>


<strong> Must provide [ Autherization header (secret token) ] like that <code>Bearer 13|P6VvMvJmWQ05wgyic6zXux42deaqL5nzJtVnOCB3</code> </strong>

### Response 
#### if successful operation
<pre>
<code>
[
    {
        "dose_id": 1,
        "dose_number": 1,
        "vaccine_name": "Pfizer"
    },
    {
        "dose_id": 2,
        "dose_number": 1,
        "vaccine_name": "Astrazeneka"
    },
    {
        "dose_id": 3,
        "dose_number": 1,
        "vaccine_name": "Sinopharm"
    },
    {
        "dose_id": 4,
        "dose_number": 1,
        "vaccine_name": "johnson and johnson"
    }
] }
]
</code>
</pre>
