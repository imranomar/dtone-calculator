<template>
  <div id="calculator" >
    <div class="container shadow">
      <div class="row">
        <div class="col-12 display" >{{text}}</div>
      </div>
      <div class="row">
        <div class="col alert alert-secondary " >{{error}}</div>
      </div>
      <div class="row">
        <div class="col-2 btn btn-secondary" @click="sqt">&radic;</div>
        <div class="col-2 btn btn-secondary" @click="cut">&#8731;</div>
        <div class="col-2 btn btn-secondary" @click="factor">FAC</div>
        <div class="col-2 btn btn-secondary"  :class="[operator=='pow'?'active':'']"   @click="operate('pow')">x<sup>n</sup></div>
        <div class="col-2 btn btn-light" @click="backspace"><</div>
        <div class="col-2 btn btn-light" @click="reset">AC</div>
      </div>
      <div class="row">
        <div class="col-3 btn btn-primary" @click="keyPressed">7</div>
        <div class="col-3 btn btn-primary" @click="keyPressed">8</div>
        <div class="col-3 btn btn-primary" @click="keyPressed">9</div>
        <div class="col-3 btn btn-info bold bigger "  :class="[operator=='+'?'active':'']" @click="operate('+')">+</div>
      </div>
      <div class="row">
        <div class="col-3 btn btn-primary" @click="keyPressed">4</div>
        <div class="col-3 btn btn-primary" @click="keyPressed">5</div>
        <div class="col-3 btn btn-primary" @click="keyPressed">6</div>
        <div class="col-3 btn btn-info bold bigger" :class="[operator=='-'?'active':'']"  @click="operate('-')">-</div>
      </div>
      <div class="row">
        <div class="col-3 btn btn-primary" @click="keyPressed">1</div>
        <div class="col-3 btn btn-primary" @click="keyPressed">2</div>
        <div class="col-3 btn btn-primary" @click="keyPressed">3</div>
        <div class="col-3 btn btn-info  bigger"  :class="[operator=='/'?'active':'']"  @click="operate('/')" >/</div>
      </div>
      <div class="row">
        <div class="col-3 btn btn-primary" @click="negative">+/-</div>
        <div class="col-3 btn btn-primary" @click="keyPressed">.</div>
        <div class="col-3 btn btn-primary" @click="keyPressed">0</div>
        <div class="col-3 btn btn-info bold bigger"  :class="[operator=='*'?'active':'']"  @click="operate('*')">*</div>
      </div>
      <div class="row">
        <div class="col-12 equal btn btn-warning" @click="equal">
          =
        </div>
      </div>
    </div>
  </div>

</template>

<script>
  export default {
    name: "Calculator",
    data: function ()
    {
      return {
        text: '0',
        operator: '',
        operand: '',
        error: '',
        clear: false,
      }
    },
    watch: {
      operator: function (val)
      {
        //alert(val);
      },
    },
    methods: {
      equal: function ()
      {
        console.log('equal pressed');
        console.log('operand ' + this.operand);
        console.log('operator ' + this.operator);

        if (!this.operand || !this.operator)
        {
          console.log('equal returning');
          return;
        }


        let path = '';

        switch (this.operator)
        {
          case '+':
            path = 'add';
            break;
          case '-':
            path = 'sub';
            break;
          case '*':
            path = 'mul';
            break;
          case '/':
            path = 'div';
            break;
          case 'pow':
            path = 'pow';
            break;

        }

        this.error = 'Calculating';
        self = this;
        this.$http.post('http://localhost/api/cal/' + path, {num1: this.operand, num2: this.text})
          .then(response =>
          {
            self.error = '';
            this.text = response.body;
          }, error =>
          {
            this.error = error.body;
          });

        this.operator = '';
        this.operand = '';
        this.clear = false;


      },
      operate: function (opp)
      {

        console.log('operator pressed');


        //only change operator
        if (this.clear)
        {
          this.operator = opp;
          return;
        }

        this.equal();
        this.operator = opp;
        this.clear = true;


      },
      factor: function (e)
      {
        this.error = 'Calculating';
        self = this;
        this.$http.post('http://localhost/api/cal/fac', {num1: this.text})
          .then(response =>
          {
            self.error = '';
            this.text = response.body;
          }, error =>
          {
            this.error = error.body;
          });
      },
      sqt: function (e)
      {
        this.error = 'Calculating';
        self = this;
        this.$http.post('http://localhost/api/cal/sqt', {num1: this.text})
          .then(response =>
          {
            self.error = '';
            this.text = response.body;
          }, error =>
          {
            this.error = error.body;
          });
      },
      cut: function (e)
      {
        this.error = 'Calculating';
        self = this;
        this.$http.post('http://localhost/api/cal/cut', {num1: this.text})
          .then(response =>
          {
            self.error = '';
            this.text = response.body;
          }, error =>
          {
            this.error = error.body;
          });
      },
      keyUp: function (e)
      {
        if (e.keyCode === 27)
        {
          this.reset();
        }
      },
      negative: function (e)
      {
        //+/- PRESSED

          if (this.text == '0') //and if text is 0 then do nothing
          {
            return;
          }
          else
          {

            if (this.text.indexOf('-') == 0) //remove negative if already
            {
              this.text = this.text.substr(1);
              return;
            }
            else
            {
              this.text = '-' + this.text;
              return;
            }

          }

      },
      backspace: function (e)
      {
        // < PRESSED

        //if the operator has been pressed and we are going to type 2nd operand
        if(this.operator && this.clear==true)
        {
          return;
        }

        this.text = this.text.slice(0, -1);
        if (this.text == '' || this.text == '-' || this.text == '0.') //and if text is 0 then do nothing
        {
          this.text = '0'
        }


      },
      keyPressed: function (e)
      {

        let pressed = e.target.innerHTML;


        if (this.clear)
        {
          // clear text
          this.operand = this.text;
          this.text = '';
          this.clear = false;
        }


        //ZERO PRESSED
        if (pressed == 0)
        {
          if (this.text == '0') //and if text is 0 then do nothing
          {
            return;
          }
        }

        //DECIMAL PRESSED
        if (pressed == '.')
        {

          if (this.text.indexOf('.') != -1)  //do not add decimal if already there
          {
            return;
          }


          if (this.text == '0') //add zero before decimal if nothing there
          {
            this.text = '0.';
            return;
          }
        }

        //DIGIT PRESSED WHEN ZERO WAS SHOWING
        if (this.text == '0')
        {
          this.text = '';
        }


        this.text = this.text + e.target.innerHTML;

      },
      reset: function ()
      {
        this.text = '0';
        this.error = '';
        this.operand = '';
        this.operator = '';
        this.clear = false;
      },
      created: function ()
      {
        document.addEventListener('keyup', this.keyUp);
      }
    }
  }
</script>

<style scoped>
  .display {
    background-color: #222222;
    color: white;
    text-align: right;
    border-top-left-radius: 20px;
    padding: 20px;
    border-top-right-radius: 20px;
    width: 500px;
    font-size:40px
  }

  .btn
  {
    border-radius: 0px;
    border: 1px solid deepskyblue;
    font-size: 1.25rem;
  }

  .bold
  {
    font-weight: bold;
  }

  .bigger
  {
    font-size: 20px;
  }

  .equal
  {

    color: white;
    text-align: center;
    border-bottom-left-radius: 20px;
    padding: 10px;
    border-bottom-right-radius: 20px;
    width: 500px;
    font-size: 30px
  }

  .alert
  {
    margin-bottom: 0px;
    padding: 0rem .8rem;
    font-size: 12px;
    border-radius: 0px;
    color: dodgerblue;
    font-weight:bold;
    min-height: 20px;
  }

  .container
  {
    border-radius: 20px;
  }

</style>
