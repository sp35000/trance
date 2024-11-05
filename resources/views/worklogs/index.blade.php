@extends('layouts.siglayout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 columns firstdiv">
            <h1 class="text-center">Trance Worklog</h1>
            <div id="calendar"></div>
            <p id="selectedDate" class="text-center">{{ $selectedDate }}</p>
            <ul>
                @foreach ($worklogs as $w)
                    <li>{{ $w->date }}: {{ $w-> task }}: {{ $w-> description }}</li>
                @endforeach
            </ul>
            {!! $worklogs->links() !!}
        </div>
    </div>
</div>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.js'></script>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          height: 300,
          initialView: 'dayGridMonth',
          initialDate: document.getElementById("selectedDate").innerHTML,
          headerToolbar: {
            start: 'title', // will normally be on the left. if RTL, will be on the right
            center: '',
            end: 'prevYear,prev,today,next,nextYear' // will normally be on the right. if RTL, will be on the left
            },
          dateClick: function(info) {
            var d=info.date;
            var mm = d.getMonth() + 1;
            var dd = d.getDate();
            selectedDate=[d.getFullYear(),(mm>9 ? '' : '0') + mm,(dd>9 ? '' : '0') + dd].join('');
            window.location.href = "http://192.168.0.152:8000/worklogs/"+selectedDate;
        }
        });
        calendar.render();
      });
    </script>
@endsection