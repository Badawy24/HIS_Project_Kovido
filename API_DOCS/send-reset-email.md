## send-reset-email

request: <strong> POST </strong>

<strong>
  http://127.0.0.1:8000/api/send-reset-email
</strong>

<strong> Request body </strong>

<pre>
<code>
{
    'email': userInput
}
</code>
</pre>
<strong> Does not need [ Autherization header ]  </strong>


### Response 
#### if successful operation
<pre>
<code>
{
    "msg": "Email sent Successfully"
}
</code>
</pre>

