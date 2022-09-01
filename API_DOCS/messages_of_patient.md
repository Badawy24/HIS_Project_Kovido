## messages_of_patient

<strong>This represents all messages that the patient has sent and their replies if them exists</strong>

request: <strong> GET </strong>

<strong> http://127.0.0.1:8000/api/messages_of_patient </strong>
</br>

<strong> No Request body </strong>

<strong> Must provide [ <code>Autherization header</code> (secret token) ] like that <code>Bearer 13|P6VvMvJmWQ05wgyic6zXux42deaqL5nzJtVnOCB3</code> </strong>



### Response 
#### if successful operation <code>status code = 200</code>

<pre>
<code>
[
    {
        "doctor_first_name": "Aya",
        "doctor_last_name": "Osama",
        "message": "ay 7aga",
        "reply": "12345678"
    },
    {
        "doctor_first_name": "Ahmed",
        "doctor_last_name": "Lotfy",
        "message": "doctor",
        "reply": ""
    },
    {
        "doctor_first_name": "Ahmed",
        "doctor_last_name": "Lotfy",
        "message": "doctor",
        "reply": ""
    },
    {
        "doctor_first_name": "Ahmed",
        "doctor_last_name": "Lotfy",
        "message": "ay 7aga",
        "reply": "dak"
    }
]
</code>
</pre>
