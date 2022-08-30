## get_dose_reservation

request: <strong> GET </strong>

<strong>
   https://gentle-depths-38045.herokuapp.com/api/get_dose_reservation
</strong>

<strong> No Request body </strong>

<strong> Must provide [ <code>Autherization header</code> (secret token) ] like that <code>Bearer 13|P6VvMvJmWQ05wgyic6zXux42deaqL5nzJtVnOCB3</code> </strong>


### Response 
#### if successful operation
<pre>
<code>
[
    {
        "dose_name": "Pfizer",
        "pat_test_date": "14/07/2022",
        "pat_test_time": "19:00",
        "hc_name": "Sadr Imbaba Hospital"
    }
]
</code>
</pre>
