# Register

request: <strong> POST </strong>

<strong>
   <a>http://localhost:8000/api/register</a>
</strong>

<strong> Request body </strong>

<pre>
<code>
{
  patient_first_name: userInput,
  patient_last_name: userInput,
  patient_age: userInput,
  patienet_address: userInput,
  patient_phone: userInput,
  patient_email: userInput,
  patient_date_of_birth: userInput,
  patient_SSN: userInput,
  patient_password: userInput,
}
</code>
</pre>

<strong> Does not need [ Autherization header ]  </strong>

### Response 

#### if the email or ssn already registered before 
<pre>
<code>
{
    "msg": "this email or social security number is already registered"
}
</code>
</pre>

#### if successful operation
<pre>
<code>
{
  msg: 'successful registeration'
}
</code>
</pre>

### if unsuccessful operation
<pre>
<code>
{
  msg: 'error, unsuccessful registeration'
}
</code>
</pre>

<hr/>
