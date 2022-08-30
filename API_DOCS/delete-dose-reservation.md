## delete-dose-reservation

request: <strong> DELETE </strong>

<strong>
    http://127.0.0.1:8000/api/delete-dose-reservation
</strong>

<strong> No Request body </strong>


<strong> Must provide [ <code>Autherization header</code> (secret token) ] like that <code>Bearer 13|P6VvMvJmWQ05wgyic6zXux42deaqL5nzJtVnOCB3</code> </strong>


### Response 
#### if successful operation
<pre>
<code>
{
    "msg": "deleted successfully"
}
</code>
</pre>
#### if unsuccessful operation
<pre>
<code>
{
    "msg": "unsuccessful operation"
}
</code>
</pre>
