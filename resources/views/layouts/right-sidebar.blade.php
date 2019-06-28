

<!-- FIXED SIDEBAR RIGHT -->
<div class="fixed-sidebar right">
  <!-- Fixed Sidebar chica -->
  <div class="fixed-sidebar-right sidebar--small" id="sidebar-right">
    <div class="mCustomScrollbar" data-mcs-theme="dark">
    </div>
    @if($action=='growlog-create')<a  class="olympus-chat inline-items  fa fa-plus" href="{{route('growlogs.create')}}" style="color:white; font-size: 21px;text-decoration: none;"  ></a>@endif
    @if($action=='day-create')<a  class="olympus-chat inline-items  fa fa-camera" href="{{route('days.create',['growlog'=>$growlog->id])}}" style="color:white; font-size: 21px;text-decoration: none;"  ></a>@endif
    @if($action=='growlog-date')<a  class="olympus-chat inline-items  fa fa-calendar" href="{{route('growlogs.create')}}" style="color:white; font-size: 21px;text-decoration: none;"  ></a>@endif

  </div>


</div>
<!-- ... end Fixed Sidebar Right -->




<!-- FIXED SIDEBAR RIGHT RESPONSIVE-->

  <div class="fixed-sidebar right fixed-sidebar-responsive">

    <div class="fixed-sidebar-right sidebar--small" id="sidebar-right-responsive">
      <a   class="olympus-chat inline-items  fa fa-camera" href="{{route('growlogs.create')}}" style="color:white; font-size: 21px;" >
      </a>
    </div>

  </div>

  <!-- ... end Fixed Sidebar Right -->
