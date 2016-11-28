<a href="#" class="dropdown-toggle" data-toggle="dropdown">
  <i id="bell" class="fa fa-bell-o"></i>
  <span class="label label-warning">
    {{ count($notifys) }}
  </span>
</a>
<ul class="dropdown-menu">
  <li class="header">You have @if(count($notifys) > 5) {{ 'More than 5' }} @else {{ count($notifys) }} @endif notifications</li>
  <li>
    <!-- inner menu: contains the actual data -->
    <ul class="menu">
    @if(count($notifys) > 5) 
    @php($notifys = \App\Models\Tiket::where('status','0')->where('msg','0')->limit(5)->get())
      @foreach($notifys as $notify)
        <li>
          <a href="{{ URL('notifikasi') }}">
            <i class="fa fa-user-circle-o text-aqua"></i> {{ ucwords($notify->nama) }}
          </a>
        </li>
      @endforeach
    @else
      @foreach($notifys as $notify)
        <li>
          <a href="{{ URL('notifikasi') }}">
            <i class="fa fa-user-circle-o text-aqua"></i> {{ ucwords($notify->nama) }}
          </a>
        </li>
      @endforeach
    @endif
    </ul>
  </li>
  @if(count($notifys) > 1)
    <li class="footer"><a href="{{ URL('notifikasi') }}">View all</a></li>
  @endif
</ul>