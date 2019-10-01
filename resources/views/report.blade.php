<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>calc</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

</head>
<body>

<div class="container">
  <div class="row mt-5">
    <div class="col-12 text-center"><h1>CalCo Reports</h1></div>
  </div>
  <div class="row text-center mt-3" >
    <div class="col-sm-6 offset-sm-3 text-center shadow" style="background-color: orange; border-radius: 12px; ">

        <form id="form" method="get" action="">
          <div id="report-app" class="d-flex flex-row form-group">

            <div class="p-4">
              <div>Select day</div>
              <input class=" form-control" :class="[selectedType=='day' ? 'selectedType' : '' ]" type="text" @change="submiter('day')" v-model="selectedDate" id="selectedDate" value="{{$selectedDate}}" autocomplete="off" name="selectedDate"  >
            </div>
            <div class="p-4">
              <div>or Week</div>
              <input class=" form-control" type="text" id="selectedWeek" v-model="selectedWeek" value="{{$selectedDate}}" autocomplete="off" name="selectedWeek"  >
            </div>
            <div class="p-4">
              <div>or Month</div>
              <select class=" form-control" type="text" :class="[selectedType=='month' ? 'selectedType' : '' ]"  id="selectedMonth" v-model="selectedMonth" value="{{$selectedDate}}" autocomplete="off" name="selectedMonth"  >
                <option  value="1" >January</option>
                <option  value="2" >February</option>
                <option  value="3" selected>March</option>
                <option  value="4" >April</option>
                <option  value="5" >May</option>
                <option  value="6" >June</option>
                <option  value="7" >July</option>
                <option  value="8" >August</option>
                <option  value="9" >September</option>
                <option  value="10" >October</option>
                <option  value="11" >November</option>
                <option  value="12" >December</option>
              </select>
            </div>
            <input type="hidden" name="selectedType"  v-model="selectedType">
          </div>

        </form>

    </div>
  </div>
  @if($selectedDate && $selectedType)
    <div class="row mt-4">
      <div class="col-12 text-center" >
        @if($selectedType=='month')
          <h3>Month Report:  {{ \Carbon\Carbon::parse($selectedDate)->format('F' )}}</h3>
        @endif
        @if($selectedType=='week')
          Week Report : {{$selectedDate}}
        @endif
        @if($selectedType=='day')
            <h3>Day Report:  {{\Carbon\Carbon::parse($selectedDate)->format('M-d-Y') }}</h3>
        @endif
      </div>
    </div>

  @endif
  <div class="row  mt-3">
    <div class="col-sm-12 text-center shadow" style="background-color: darkturquoise; border-radius: 12px; ">
      <table class="'table thead-dark  table-striped" style="width: 100%">
        <thead>
        <th>Date</th>
        <th>End Point</th>
        <th>Number 1</th>
        <th>Number 2</th>
        <th>Response</th>
        </thead>
        <tbody>
        @foreach($log as $l)
          <tr>

            <td>{{$l->created_at}}</td>
            <td>{{$l->endpoint}}</td>
            <td>{{$l->num1}}</td>
            <td>{{$l->num2}}</td>
            <td>{{$l->response}}</td>

          </tr>
        @endforeach

        </tbody>
      </table>
      <div class="row">
        <div class="col-12 text-center mt-5">
          <div style="margin: auto">{{$log->render()}}</div>

        </div>
      </div>
    </div>
  </div>
</div>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="js/weekpicker.js"></script>

<script>
  //


  $(function () {
    $("#selectedDate").datepicker({
      showWeek: true,
      changeMonth: true,
      changeYear: true,
      firstDay: 1,

    });
  });

  var app = new Vue({
    el: '#report-app',
    data: {
      message: 'Hello Vue!',
      selectedType: '{{ $selectedType }}',
      selectedDate: '{{ $selectedDate }}',
      selectedMonth: '{{ $selectedMonth }}',
      selectedWeek:'',

    },
    methods: {
      submiter: function () {
        this.$nextTick(() => {
          $('#form').submit();
        });
      }
    },
    watch: {
      selectedDate: function (value) {
        this.selectedType = 'day';
        this.submiter();
      },
      selectedMonth: function() {
        this.selectedType = 'month';
        this.submiter();


      },


    },
    mounted() {
      var self = this;
      $('input[name=selectedDate]').datepicker({
        showWeek: true,
        changeMonth: true,
        changeYear: true,
        firstDay: 1,
        onSelect: function(dateText) {
          self.selectedType = 'day';
          self.selectedDate = dateText;
          self.submiter();
        }
      });

    }
  });
</script>



</html>


<style>
  body {
    align-items: center;
    background-image: linear-gradient(236deg, #74ebd5, #acb6e5);
    font-family: 'Helvetica', 'Arial', sans-serif;
    justify-content: center;
  }

  th {
    color: white;
    padding: 10px;
  }

  nav {
    float: right;
  }

  .selectedType
  {
    background-color: cyan;
  }



</style>
