
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
        "pat_fname": "ibthal",
        "pat_lname": "mohamed",
        "pat_email": "i@i.com",
        "message": "Hello",
        "reply": "Hi",
        "msg_id": 10,
        "doc_fname": "Adbelrahman",
        "doc_lname": "Ahmed"
    },
    {
        "pat_fname": "ll",
        "pat_lname": "qq",
        "pat_email": "q@q.com",
        "message": "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quisquam eius esse porro unde commodi culpa nesciunt, dolorum consequuntur et laboriosam ipsum quo voluptatum amet? Dolorum totam aut ullam cupiditate iusto?",
        "reply": "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quisquam eius esse porro unde commodi culpa nesciunt, dolorum consequuntur et laboriosam ipsum quo voluptatum amet? Dolorum totam aut ullam cupiditate iusto?",
        "msg_id": 11,
        "doc_fname": "Adbelrahman",
        "doc_lname": "Ahmed"
    }
]
</code>
</pre>

