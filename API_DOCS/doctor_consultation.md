## doctor_consultation

<p>This is for doctor to make him see his meeting that sent from patient reservations in his profile</p>

request: <strong> GET </strong>

<strong> http://127.0.0.1:8000/api/doctor_consultation </strong>
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
        "pat_fname": "Artificial",
        "pat_lname": "Intelligence",
        "pat_age": 15,
        "pat_email": "ai@ai.com"
    }
]
</code>
</pre>
