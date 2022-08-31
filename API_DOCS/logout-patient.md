## Logout

request: <strong> GET </strong>

<strong>
   http://127.0.0.1:8000/api/logout-patient
</strong>

<strong> No Request body </strong>


<strong> Must provide [ <code>Autherization header</code> (secret token) ] like that <code>Bearer 13|P6VvMvJmWQ05wgyic6zXux42deaqL5nzJtVnOCB3</code> </strong>


### Response 
#### if successful operation
<pre>
<code>
{
    "message": "logged out successfully"
}
</code>
</pre>
