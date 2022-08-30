## available-doctors

request: <strong> GET </strong>


<strong>
   http://127.0.0.1:8000/api/available-doctors
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
        "doc_fname": "Aya",
        "doc_lname": "Osama",
        "doc_phone": 12928768,
        "doc_email": "aya55osma2001@gmail.com",
        "doc_sex": "female",
        "doc_age": 21
    },
    {
        "doc_id": 2,
        "doc_fname": "Abdelrahman",
        "doc_lname": "Ahmed",
        "doc_phone": 12827641,
        "doc_email": "abdelrahman.ahmed2410@gmail.com",
        "doc_sex": "male",
        "doc_age": 30
    },
    {
        "doc_id": 3,
        "doc_fname": "Ahmed",
        "doc_lname": "Lotfy",
        "doc_phone": 12345678,
        "doc_email": "programmerahmedlotfy@gmail.com",
        "doc_sex": "male",
        "doc_age": 21
    }
]
</code>
</pre>
