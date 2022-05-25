## delete-test-reservation

request: <strong> DELETE </strong>

<strong>
   https://gentle-depths-38045.herokuapp.com/api/delete-test-reservation
</strong>

<strong> Request body </strong>

<pre>
<code>
{
    'test_name': userInput
}
</code>
</pre>
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
    "msg": "unsuccessfull operation due to that reservation does not exist"
}
</code>
</pre>
