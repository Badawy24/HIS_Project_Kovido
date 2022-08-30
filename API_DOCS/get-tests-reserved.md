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
        "test_name": "PCR",
        "pat_test_date": "12-06-2022",
        "pat_test_time": "12:00",
        "hc_name": "Abbasia Hospital for Chest Diseases"
    },
    {
        "test_name": "Anti-bodies",
        "pat_test_date": "20/03/2023",
        "pat_test_time": "14:30",
        "hc_name": "Sadr Imbaba Hospital"
    },
    {
        "test_name": "CBC",
        "pat_test_date": "20/03/2023",
        "pat_test_time": "14:30",
        "hc_name": "Abbasia Hospital for Chest Diseases"
    },
    {
        "test_name": "CBC",
        "pat_test_date": "20/03/2023",
        "pat_test_time": "14:30",
        "hc_name": "Abbasia Hospital for Chest Diseases"
    }
]
</code>
</pre>
