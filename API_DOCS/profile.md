
## Profile

request: <strong> GET </strong>

<strong>
  https://gentle-depths-38045.herokuapp.com/api/profile
</strong>

<strong> No Request body </strong>


<strong> Must provide [ <code>Autherization header</code> (secret token) ] like that <code>Bearer 13|P6VvMvJmWQ05wgyic6zXux42deaqL5nzJtVnOCB3</code> </strong>


### Response 
#### if successful operation <code>status code = 200</code>
<pre>
<code>
{
    "patient": {
        "pat_id": 22,
        "pat_fname": "ali1",
        "pat_lname": "sayed1",
        "pat_age": 22,
        "pat_address": "Kuwait12",
        "pat_phone": 12345678911,
        "pat_email": "27med2001lotfy@gmail.com",
        "pat_DOF": "11/01/2001",
        "pat_SSN": 30112011404916,
        "patient_password": 123456789
    }
}
</code>
</pre>

