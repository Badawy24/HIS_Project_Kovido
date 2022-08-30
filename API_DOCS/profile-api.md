
## Profile

request: <strong> GET </strong>

<strong>
   http://localhost:8000/api/profile
</strong>

<strong> No Request body </strong>


<strong> Must provide [ Autherization header (secret token) ] like that "Bearer 13|P6VvMvJmWQ05wgyic6zXux42deaqL5nzJtVnOCB3" </strong>


### Response 
#### if successful operation
<pre>
<code>
{
    "patient": {
        "pat_id": 5,
        "pat_fname": "AbdelAzizi",
        "pat_lname": "lotfy",
        "pat_age": 50,
        "pat_address": "Shoubra-elkheima",
        "pat_phone": 1001000100,
        "pat_email": "abdelaziz@gmail.com",
        "pat_DOF": "15/12/1972",
        "pat_SSN": 12343546765,
        "patient_password": "zxcv"
    }
}
</code>
</pre>

