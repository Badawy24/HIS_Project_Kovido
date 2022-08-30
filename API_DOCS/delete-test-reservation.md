## delete-test-reservation

request: <strong> delete </strong>

<strong> http://127.0.0.1:8000/api/delete-test-reservation </strong>
</br>

<strong> Request body </strong>

<pre>
<code>
{
      'res_id': userInput
}
</code>
</pre>

<strong> need [ Autherization header ]  </strong>


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
