## Login

request: <strong> POST </strong>

<strong>
  http://127.0.0.1:8000/api/login
    
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
#### if successful operation for patient
<pre>
<code>
{
    "msg": "logged In successfully",
    "user": "patient",
    "token": "3|pWjEPTD1W73Ub8J85hqDGdFxAvrpie76nv8lls7M"
}
</code>
</pre>

#### if successful operation for doctor
<pre>
<code>
{
    "msg": "Logged In successfully",
    "user": "doctor",
    "token": "8|iFZukX0QLLyVkEXNfMcJmTHVAYZCIMbdSf5j633p"
}
</code>
</pre>

#### if unsuccessful operation
<pre>
<code>
{
    "error": "wrong email or password"
}
</code>
</pre>
