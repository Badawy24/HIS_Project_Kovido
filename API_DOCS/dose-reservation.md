## dose-reservation

request: <strong> POST </strong>

<strong>
   http://localhost:8000/api/dose-reservation
</strong>

<strong> Request body </strong>

<pre>
<code>
{
    'dose_name': userInput
    'dose_date': userInput
    'dose_time': userInput
    'dose_patient_health_name': userInput
}
</code>
</pre>
<strong> Must provide [ <code>Autherization header</code> (secret token) ] like that <code>Bearer 13|P6VvMvJmWQ05wgyic6zXux42deaqL5nzJtVnOCB3</code> </strong>


### Response 
#### if successful operation
<pre>
<code>
{
    "msg": "successful dose reservation"
}
</code>
</pre>
#### if unsuccessful operation
<pre>
<code>
{
    "msg": "failed dose reservation"
}
</code>
</pre>
