<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Email</title>
</head>

<body>
    <section style=" direction: ltr;
    width: 85%;
    margin: auto;
    padding: 20px;
    background-color: #e3e7f1;
    border-radius: 20px;
    border: 2px solid #287AEA;
    text-transform: capitalize;">
        <h2 style=" margin: 0px 10px;">Hi Doctor : {{ $doc_name }}</h2>
        <h2 style=" margin: 0px 10px;">Message From : <span style="color:#50658E">{{ $fromName }}</span></h2>
        <ul>
            <li>
                <h4>Email : <span style="color:#50658E;text-transform: lowercase;">{{ $fromEmail }}</span></h4>
            </li>
            <li>
                <h4>phone : <span style="color:#50658E">{{ $fromPhone }}</span></h4>
            </li>
        </ul>
        <br>
        <div style="width: 90%;
        margin: auto;
        background-color: #EEE;
        padding: 20px;
        border-radius: 20px;
        border: 2px solid #F6F8FD;
        font-size: 24px;">
            {{ $body }}
        </div>
        </div>

</body>

</html>
