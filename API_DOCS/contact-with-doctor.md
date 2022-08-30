## contact-with-doctor

request: <strong> POST </strong>

<strong>
  http://127.0.0.1:8000/api/contact-with-doctor
</strong>

<strong> Request body </strong>

<pre>
<code>
{
    'doctor_email': userInput
    'msg': userInput
}
</code>
</pre>
<strong> Must provide [ <code>Autherization header</code> (secret token) ] like that <code>Bearer 13|P6VvMvJmWQ05wgyic6zXux42deaqL5nzJtVnOCB3</code> </strong>


### Response 
#### if successful operation
<pre>
<code>
{
    "msg": "successfully"
}
</code>
</pre>
#### if unsuccessful operation
<pre>
<code>
{
    "msg": "unsuccessfully"
}
</code>
</pre>
