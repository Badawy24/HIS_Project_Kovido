## if-dose-reserved

request: <strong> GET </strong>



<strong>
   http://127.0.0.1:8000/api/if-dose-reserved
</strong>


<strong> No Request body </strong>


<strong> Must provide [ <code>Autherization header</code> (secret token) ] like that <code>Bearer 13|P6VvMvJmWQ05wgyic6zXux42deaqL5nzJtVnOCB3</code> </strong>

### Response 
#### if reservation exist
<pre>
<code>
{
    "msg": "yes"
}
</code>
</pre>

#### else
<pre>
<code>
{
    "msg": "no"
}
</code>
</pre>
