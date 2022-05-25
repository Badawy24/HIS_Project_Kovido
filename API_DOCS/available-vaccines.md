## available-vaccines

request: <strong> GET </strong>


<strong>
  https://gentle-depths-38045.herokuapp.com/api/available-tests
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
        "vaccine_name": "Pfizer"
    },
    {
        "dose_id": 2,
        "vaccine_name": "AstraZeneca"
    },
    {
        "dose_id": 3,
        "vaccine_name": "Johnson & Johnson"
    },
    {
        "dose_id": 4,
        "vaccine_name": "Sinopharm"
    }
]
</code>
</pre>
