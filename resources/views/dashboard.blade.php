@extends('layouts.app')
@section('content')
<div class="content">
      <div class="container-fluid">
          @if(Auth::user()->role_id ==1)
          <h2>Welcome Admin!</h2>
          @else
          <h2>Welcome Teacher {{Auth::user()->name}}!</h2>
          @endif

</div>
</div>
@endsection