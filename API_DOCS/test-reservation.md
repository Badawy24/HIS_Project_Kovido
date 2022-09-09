## test-reservation

request: <strong> POST </strong>

<strong>
  http://127.0.0.1:8000/api/test-reservation
</strong>

<strong> Request body </strong>

<pre>
<code>
{
    'test_name': userInput
    'test_date': userInput
    'test_time': userInput
    'test_patient_health_name': userInput
}
</code>
</pre>
<strong> Must provide [ <code>Autherization header</code> (secret token) ] like that <code>Bearer 13|P6VvMvJmWQ05wgyic6zXux42deaqL5nzJtVnOCB3</code> </strong>


### Response 
#### if successful operation
<pre>
<code>
{
    "msg": "successful test reservation"
}
</code>
</pre>
#### if unsuccessful operation
<pre>
<code>
{
    "msg": "failed test reservation"
}
</code>
</pre>
