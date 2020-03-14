@if(\Auth::User()->user_type == 'client')

@if(\Auth::User()->status === 'approved')
<li><a href="{{ url('/chnagebanner') }}">change banner</a></li>
<li><a href="{{ url('/generatecode') }}">Generate Code</a></li>
<li><a href="{{ url('user/messageAdmin') }}">Message Admin</a></li>
<li><a href="{{ url('/viewcode') }}">View Code</a></li>
<li><a href="{{ url('/roundwinner') }}">Add Round Winner</a></li>
<li><a href="{{ url('/checkRoundWinner') }}">Check Round Winner</a></li>
<li><a href="{{ url('/user') }}">All User(s)</a></li>
@endif


{{--Getting the user message--}}
<?php
$total_msg = count(DB::table('messages')->where('promoter', Auth::User()->name)->get());
?>
<li><a href="{{ url('user/inbox') }}">Messages ({{ $total_msg }})</a></li>
@endif

@if(\Auth::User()->user_type == 'admin')
<li><a href="{{ route('admin/promoter') }}">Promoter</a></li>
<li><a href="{{ route('admin/message') }}">Message</a></li>
@endif
