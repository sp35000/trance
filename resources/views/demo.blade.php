@extends('layouts.siglayout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 columns text-center firstdiv">
            <div id="calendar"></div>
        </div>
    </div>
</div>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.js'></script>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
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