## Login

request: <strong> POST </strong>

<strong>
   http://localhost:8000/api/login
</strong>

<strong> Request body </strong>

<pre>
<code>
{
    'email': userInput
    'password': userInput
}
</code>
</pre>
<strong> Does not need [ Autherization header ]  </strong>


### Response 
#### if successful operation
<pre>
<code>
{
    "msg": "logged In successfully",
    "token": "12|X8UVjqjU7gbXIHpUhyMoSqHm17SJJdf8rsLGOR5w" => [or any valid token]
}
</code>
</pre>
