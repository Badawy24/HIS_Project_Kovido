<head>
    <meta charset="UTF-8" />
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link href="../css/meeting.css" rel="stylesheet" />


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>


    <title>JS-SDK | videosdk.live</title>

    <style>
        #screenShare {
            /* margin-top: 20px; */
            width: 80%;
        }

        audio {
            display: none;
        }

        /* Home Screen */
        .create-meetin {
            margin-top: 300px;
        }

        .create-btn {
            border-radius: 5px;
        }

        .or {
            color: grey;
        }

        .join-meeting {
            margin-top: 25px;
        }

        .join-group {
            width: 500px;
            margin-left: 70px;
        }

        .join-input {
            background-color: #212032;
            padding: 12px;
            margin-top: -15px;
        }

        .join-btn {
            border-radius: 5px;
            margin-left: 7px;
            margin-top: -5px;
            height: 50px;
            height: 40px;
        }

        /* Join Screen */
        .join-page {
            display: none;
            margin-left: -15px;
        }

        .join-container {
            margin: auto;
            display: flex
        }

        /* left join Screen*/
        .join-left {
            width: 650px;
            height: 350px;
            margin-right: 30px;
            margin-left: -160px;
            position: relative;
        }

        .join-video {
            position: absolute;
            width: 100%;
            height: 100%;
            border-radius: 10px;
            transform: rotate('90');
            object-fit: cover;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.19),
                0 6px 6px rgba(0, 0, 0, 0.23);
        }

        .cam-btn {
            border-radius: 20px;
            height: 50px;
            width: 50px;
        }

        .cam-on {
            color: black;
            font-size: 21px;
        }

        .cam-off {
            color: black;
            font-size: 21px;
            display: none;
        }

        .mic-btn {
            border-radius: 20px;
            height: 50px;
            width: 50px;
            margin-left: 5px;
        }

        .mic-on {
            color: black;
            font-size: 21px;
            display: none;
        }

        .mic-off {
            color: black;
            font-size: 21px;
            display: inline-block;
        }

        /* Right join Screen*/
        .join-right {
            width: 350px;
        }

        .join-right h1 {
            text-align: center;
            color: white;
        }

        .join-id {
            margin-top: 120px;
        }

        .join-right-btn {
            margin-left: 50px;
            width: 130px;
            border-radius: 5px;
        }

        /* Live Meeting page  */
        .live-meeting {
            display: none;
            position: relative;
        }

        .live-meeting-container {
            height: 70px;
            width: 100%;
            border-bottom: 1px solid grey;
        }
    </style>
</head>

<body>
    <section id="joinPage" class="main-bg">
        <div class="container">
            <div class="join-container">
                <!--join screen left grid start-->
                <article class="join-left">
                    <div class="video-view">
                        <video class="video join-video" id="joinCam"></video>
                        <div class="input-group mb-3 video-content">

                            <button class="cam-btn" id="camButton" onclick="toggleWebCam()">
                                <i class="bi bi-camera-video-fill cam-on" id="onCamera"></i>
                                <i class="bi bi-camera-video-off-fill cam-off" id="offCamera"></i>
                            </button>

                            <button class="mic-btn" id="micButton" onclick="toggleMic()">
                                <i class="bi bi-mic-mute-fill mic-on" id="muteMic"></i>
                                <i class="bi bi-mic-fill mic-off" id="unmuteMic"></i>
                            </button>
                        </div>
                    </div>
                </article>

                <!--join screen right grid start-->
                <article class="join-right">
                    <h1>JOIN PAGE</h1>
                    <div>
                        <div class="class-control row join-id">
                            <div class="col-1">
                                <img src="../assets/icons/svg-path.svg" height="25px" width="25px" />
                            </div>
                            <div class="col-8">
                                <input type="hidden" id="joinMeetingId" value="<?php echo e($meetingid->con_meet_id); ?>">
                                <input type="text" id="joinMeetingName" placeholder="Name Of Participant"
                                    class="form-control" value="<?php echo e($pat_name->pat_fname . ' ' . $pat_name->pat_lname); ?>"
                                    disabled />
                            </div>
                            <div class="col-2">
                                <button id="meetingJoinButton" onclick="joinMeeting()"
                                    class="join-right-btn btn btn-primary">
                                    Join Meeting
                                </button>
                            </div>
                        </div>
                    </div>
                </article>
                <!--join screen right grid end-->
            </div>
    </section>

    <section class="grid-page flex-container live-meeting" id="gridPpage">
        <div class="row live-meeting-container">
            <article class="col-3 d-flex justify-content-start">
                <input type="text" class="form-control navbar-brand" id="meetingid" readonly />

                
            </article>

            <article class="col-9" style="margin-top: 13px; position: static; align-content: right">
                <div class="d-flex justify-content-end">

                    <!-- main page toggle mic-->
                    <div class="btn-group" id="main-pg-mute-mic" style="display: inline-block">
                        <button type="button" class="btn btn-outline-light ms-1" aria-haspopup="true"
                            aria-expanded="false">
                            <span class="material-icons"> mic_off </span>
                        </button>
                    </div>
                    <div class="btn-group" id="main-pg-unmute-mic" style="display: none">
                        <button type="button" class="btn btn-outline-light ms-1" aria-haspopup="true"
                            aria-expanded="false">
                            <span class="material-icons"> mic </span>
                        </button>
                    </div>
                    <!--main page toggle web-cam-->
                    <div class="btn-group" id="main-pg-cam-off" style="display: inline-block">
                        <button type="button" class="btn btn-outline-light ms-1" aria-haspopup="true"
                            aria-expanded="false">
                            <span class="material-icons"> videocam_off</span>
                        </button>
                    </div>
                    <div class="btn-group" id="main-pg-cam-on" style="display: none">
                        <button type="button" class="btn btn-outline-light ms-1" aria-haspopup="true"
                            aria-expanded="false" id="videoCamOn">
                            <span class="material-icons"> videocam </span>
                        </button>
                    </div>
                    <!--screen share-->
                    <button type="button" id="btnScreenShare" class="btn btn-outline-light ms-1">
                        <span class="material-icons"> screen_share </span>
                    </button>
                    <span class="vertical-line"></span>
                    <!--participants-->
                    <button type="button" class="btn btn-outline-light ms-1" onclick="openParticipantWrapper()">
                        <span class="material-icons"> people </span>
                    </button>
                    <!--chat-->
                    <button type="button" class="btn btn-outline-light ms-1" onclick="openChatWrapper()">
                        <span class="material-icons"> chat </span>
                    </button>
                    <span class="vertical-line"></span>
                    <!--call end-->
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger ms-1" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <span class="material-icons"> call_end </span>
                        </button>
                        <div class="dropdown-menu"
                            style="
                background-color: #212032;
                color: white;
                margin-left: -80px;
                ">
                            <a class="dropdown-item" id="endCall">End Call</a>
                            <a class="dropdown-item" id="leaveCall">Leave Meeting</a>
                        </div>
                    </div>
                </div>
            </article>
        </div>
        <div class="row" id="videoContainer"></div>
        <video style="width: 80%; padding: 10px;" id="videoScreenShare"></video>
    </section>

    <!--raise hand pop-up-->
    <section id="contentRaiseHand" class="alert alert-info col-2"
        style="left: 10; bottom: 0; position: absolute; height: 60px; display: none; " role="alert"></section>

    <!--participant wrapper-->
    <section class="participant-wrapper" id="participants">
        <div class="participant-wrapper-header text-light">
            <span class="closebtn" id="ParticipantsCloseBtn" onclick="closeParticipantWrapper()">&times;</span>
            <h5 id="totalParticipants"></h5>
        </div>
        <hr class="border-light rounded 3" />
        <div id="participantsList" class="participant-wrapper-content text-light"></div>
    </section>

    <!--chat wrapper-->
    <section class="chat-wrapper" id="chatModule">
        <div class="chat-wrapper-header text-light">
            <span class="closebtn" id="chatCloseBtn" onclick="closeChatWrapper()">&times;</span>
            <h5 id="chatHeading">Let's Chat!</h5>
        </div>
        <hr class="border-light rounded 3" />
        <div id="chatArea" class="chat-wrapper-content text-light" style="overflow-y: scroll"></div>
        <div class="message-box input-group mb-2">
            <input type="text" id="txtChat"="form-control" placeholder="Message..." />
            <div id="btnSend" class="input-group-append">
                <button class="btn btn-primary">Send</button>
            </div>
        </div>
        </div>
    </section>

    <script src="../js/meeting/meeting.js"></script>
    <script src="https://sdk.videosdk.live/js-sdk/0.0.37/videosdk.js"></script>
    <script src="../js/meeting/config.js"></script>
</body>
<div id="viewer"></div>

</html>
<?php /**PATH C:\Users\Badawy\Desktop\v0.2\HIS_Project_Kovido\resources\views/meeting/startMeeting.blade.php ENDPATH**/ ?>