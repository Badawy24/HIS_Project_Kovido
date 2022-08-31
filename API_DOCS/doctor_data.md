
## doctor_data

request: <strong> GET </strong>

<strong>
  http://127.0.0.1:8000/api/doctor_data
</strong>

<strong> No Request body </strong>


<strong> Must provide [ <code>Autherization header</code> (secret token) ] like that <code>Bearer 13|P6VvMvJmWQ05wgyic6zXux42deaqL5nzJtVnOCB3</code> </strong>


### Response 
#### if successful operation <code>status code = 200</code>
<pre>
<code>
{
    "doctor": {
        "doc_id": 3,
        "doc_fname": "Ahmed",
        "doc_lname": "Lotfy",
        "doc_phone": 12345678,
        "doc_email": "programmerahmedlotfy@gmail.com",
        "doc_sex": "male",
        "doc_age": 21,
        "doc_pass": "98765"
    }
}
</code>
</pre>

