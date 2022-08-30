
## messages_of_doctor

request: <strong> GET </strong>

<strong>
  http://127.0.0.1:8000/api/messages_of_doctor
</strong>

<strong> No Request body </strong>


<strong> Must provide [ <code>Autherization header</code> (secret token) ] like that <code>Bearer 13|P6VvMvJmWQ05wgyic6zXux42deaqL5nzJtVnOCB3</code> </strong>


### Response 
#### if successful operation <code>status code = 200</code>
<pre>
<code>
[
    {
        "doc_id": 3,
        "pat_id": 20,
        "message": "ay 7aga",
        "reply": "dak",
        "msg_id": 1000
    }
]
</code>
</pre>

