## patient-consultation

<p>This is for patient to make him see his meeting reservations in his profile</p>

request: <strong> GET </strong>

<strong> http://127.0.0.1:8000/api/patient-consultation </strong>
</br>


<strong> No Request body </strong>

<strong> Must provide [ <code>Autherization header</code> (secret token) ] like that <code>Bearer 13|P6VvMvJmWQ05wgyic6zXux42deaqL5nzJtVnOCB3</code> </strong>

### Response 
#### if successful operation <code>status code = 200</code>

<pre>
<code>
[
    {
        "con_title": "India",
        "con_date": "2022-09-29",
        "con_meet_id": "123-456-789",
        "con_desc": "narendra modi",
        "doc_fname": "Adbelrahman",
        "doc_lname": "Ahmed",
        "doc_email": "covidninty622@gmail.com"
    }
]
</code>
</pre>
