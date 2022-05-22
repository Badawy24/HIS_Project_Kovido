## Register

request: <strong> POST </strong>

<strong>
   http://localhost:8000/api/register
</strong>

<strong> Request body </strong>

<pre>
<code>
{
  patinet_first_name: userInput,
  patinet_last_name: userInput,
  patinet_age: userInput,
  patinet_address: userInput,
  patient_phone: userInput,
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
