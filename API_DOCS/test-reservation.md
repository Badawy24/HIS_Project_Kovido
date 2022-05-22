## test-reservation

request: <strong> POST </strong>

<strong>
   http://localhost:8000/api/test-reservation
</strong>

<strong> Request body </strong>

<pre>
<code>
{
    'test_id': userInput
    'test_date': userInput
    'test_time': userInput
}
</code>
</pre>
<strong> Does not need [ Autherization header ]  </strong>


### Response 
#### if successful operation
<pre>
<code>
{
    "msg": "successful reservation"
}
</code>
</pre>
#### if unsuccessful operation
<pre>
<code>
{
    "msg": "failed reservation"
}
</code>
</pre>
