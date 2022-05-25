## available-doctors

request: <strong> GET </strong>


<strong>
   https://gentle-depths-38045.herokuapp.com/api/available-doctors
</strong>

<strong> No Request body </strong>


<strong> Must provide [ <code>Autherization header</code> (secret token) ] like that <code>Bearer 13|P6VvMvJmWQ05wgyic6zXux42deaqL5nzJtVnOCB3</code> </strong>

### Response 
#### if successful operation
<pre>
<code>
[
    {
        "doc_id": 1,
        "doc_fname": "Nour",
        "doc_lname": "Lotfy",
        "doc_phone": "1114349990",
        "doc_email": "nour@gmail.com",
        "doc_sex": "Female",
        "doc_age": 18
    },
    {
        "doc_id": 2,
        "doc_fname": "Ahmed",
        "doc_lname": "Salah",
        "doc_phone": "0100100100",
        "doc_email": "salah@gmail.com",
        "doc_sex": "Male",
        "doc_age": 50
    }
]
</code>
</pre>
