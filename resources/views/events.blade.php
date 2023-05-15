@extends('layouts.app')

@section('titulo')
  Calendar
@endsection

@section('contenido')
    <div id="calendar"></div> 
@endsection

@section('scripts')


<script>
  $(document).ready(function() {
      // page is now ready, initialize the calendar...
      $('#calendar').fullCalendar({
          // put your options and callbacks here
          events : [
              @foreach($events as $event)
              {
                  title : '{{ $event->title }}',
                  start : '{{ $event->start_date }}',
                  end : '{{ $event->end_date }}',
                  id : '{{ $event->id }}'
              },
              @endforeach
          ],
          eventMouseover: function(calEvent, jsEvent, view) {
              $(this).css('cursor', 'pointer');
          },
          eventClick: function(event, jsEvent, view) {
              window.location.href = '/events/' + event.id + '/edit';
          },
          
          eventRender: function(event, element) {
              const form = $('<form>', {
                  'method': 'POST',
                  'action': '/events/' + event.id,
              });

              const csrf = $('<input>', {
                  'type': 'hidden',
                  'name': '_token',
                  'value': '{{ csrf_token() }}'
              });

              const method = $('<input>', {
                  'type': 'hidden',
                  'name': '_method',
                  'value': 'DELETE'
              });

              const button = $('<button>', {
                  'class': 'bg-red-500 text-white mt-2',
                  'text': 'DELETE',
                  'click': function() {
                      form.submit();
                  }
              });

              form.append(csrf, method, button);
              element.append(form);
          }
      });
  });
</script>



@endsection






{{-- <script>
  $(document).ready(function() {
// page is now ready, initialize the calendar...
$('#calendar').fullCalendar({
    // put your options and callbacks here
    events : [
        @foreach($events as $event)
        {
            title : '{{ $event->title }}',
            start : '{{ $event->start_date }}',
            end : '{{ $event->end_date }}',
            id : '{{ $event->id }}'
        },
        @endforeach
    ],
    eventMouseover: function(calEvent, jsEvent, view) {
    $(this).css('cursor', 'pointer');
    },

    eventClick: function(calEvent, jsEvent, view) {
        window.location.href = '/events/' + calEvent.id + '/edit';
    }

    
  });

});
</script> --}}