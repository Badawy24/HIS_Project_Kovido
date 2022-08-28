<?php
use Illuminate\Support\Facades\DB;
?>
@extends('main-template')
@section('content')
<div  class = "doc-content">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="avatar">
                    <img src="/images_dark/doc_online.png" class="img-doc img-fluid" /> 
                </div>
            </div>
            <div class="col-md-6">
                <div class="doc-content-msg">
                    <h3>Hello D/ {{$doctor[0]->doc_fname . ' ' . $doctor[0]->doc_lname}}</h3>
                    <?php
                        $msgs = DB::select('select * from doc_pat where doc_id = ?', [$doctor[0]->doc_id]);
                        $collname = 'fluch-collapse';
                        $collapseName = array();
                        for($i = 0; $i<count($msgs); $i+=1){
                            $collapseName[$i] = $collname . $i+1;
                        }
                        $x = 0;
                    ?>
                    <p class="lead">You Have got {{count($msgs)}} messages..</p>
                    <div class="msgs">
                        <div class="accordion accordion-flush" id="accordionFlushExample">

                            @foreach ($msgs as $msg)
                                
                            <div class="accordion-item">

                                <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target={{"#" . $collapseName[$x]}} aria-expanded="false" aria-controls={{$collapseName[$x]}}>
                                    @if ($msg->reply == '')
                                        <i class="not-rp rp-icon fa-brands fa-replyd"></i>
                                    @else
                                    <i class="rp rp-icon fa-solid fa-circle-check"></i>
                                    @endif
                                    Message Number #<?php $r = $x + 1; echo $r; ?> :
                                </button>
                                </h2>
                                <div id={{$collapseName[$x]}} class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <h5>Patient Name : <?php 
                                        $pat_id = $msg->pat_id;
                                        $pat_name = DB::select('select pat_fname, pat_lname from patient where pat_id = ?', [$pat_id]);
                                        ?>{{$pat_name[0]->pat_fname . ' ' . $pat_name[0]->pat_lname}}</h5>
                                    <p class="lead msg-cont">
                                        <strong>Message Content : </strong> {{$msg->message}}
                                    </p>
                                    @if ($msg->reply == '')
                                    <p class="comment">
                                        <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                            <i class="fa-solid fa-comment-dots"></i>
                                        </a>
                                    </p>
                                    <div class="collapse text-comment" id="collapseExample">
                                        <div class="card-body">
                                        <form action=<?php $act = '/saveReply'; $act.= '/' . $msg->msg_id; echo $act; ?> method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-10">
                                                    <textarea name="reply"></textarea>
                                                    @error('reply')
                                                        <div class="alert alert-danger d-flex align-items-center" role="alert">
                                                            <i class="fa-solid fa-triangle-exclamation"></i>
                                                            <div>{{ $message }} </div>
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-2">
                                                    <input type ="submit" value="Save"/>
                                                </div>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                    @else
                                        <div class="reply">
                                            <p class="lead">
                                                <strong>your Reply : </strong>
                                                {{$msg->reply}}
                                            </p>
                                        </div>
                                    @endif
                                        
                                </div>
                                </div>

                            </div>

                            <?php $x+= 1; ?>
                            @endforeach
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection