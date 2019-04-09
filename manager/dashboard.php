
<style>

@font-face {
    font-family: 'BebasNeueRegular';
    src: url('BebasNeue-webfont.eot');
    src: url('BebasNeue-webfont.eot?#iefix') format('embedded-opentype'),
         url('BebasNeue-webfont.woff') format('woff'),
         url('BebasNeue-webfont.ttf') format('truetype'),
         url('BebasNeue-webfont.svg#BebasNeueRegular') format('svg');
    font-weight: normal;
    font-style: normal;
}

#clock_holder .container {width: 960px; margin: 0 auto; overflow: hidden;}

#clock_holder .clock {width:800px; margin:0 auto; padding:30px; border:1px solid #333; color:#fff; }

#Date { font-family:'BebasNeueRegular', Arial, Helvetica, sans-serif; font-size: 40px; text-align:center; text-shadow:0 0 5px #00c6ff; }

#clock_holder  ul { width:800px; margin:0 auto; padding:0px; list-style:none; text-align:center; }
#clock_holder  ul li { display:inline; font-size:60px; text-align:center; font-family:'BebasNeueRegular', Arial, Helvetica, sans-serif; text-shadow:0 0 5px #00c6ff; }

#point { position:relative; -moz-animation:mymove 1s ease infinite; -webkit-animation:mymove 1s ease infinite; padding-left:10px; padding-right:10px; }

/* Simple <a href="https://www.jqueryscript.net/animation/">Animation</a> */
@-webkit-keyframes mymove
{
0% {opacity:1.0; text-shadow:0 0 20px #00c6ff;}
50% {opacity:0; text-shadow:none; }
100% {opacity:1.0; text-shadow:0 0 20px #00c6ff; }
}

@-moz-keyframes mymove
{
0% {opacity:1.0; text-shadow:0 0 20px #00c6ff;}
50% {opacity:0; text-shadow:none; }
100% {opacity:1.0; text-shadow:0 0 20px #00c6ff; }
}
</style>


        <div id="global">
            
                <div class="container-fluid">

               


<div class="row">
    <div class="col-sm-4">
        <div class="panel panel-default">
            <div class="panel-heading">TOTAL ITEMS</div>
                <div class="panel-body">
                    <div id="d1-c1" style="height:150px"></div>
                    </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="panel panel-default">
            <div class="panel-heading">TRANSFERS</div>
                <div class="panel-body">
                    <div id="d1-c2" style="height:150px"></div>
            </div>
                </div>
    </div>
    <div class="col-sm-4">
          <div class="panel panel-default">
             <div class="panel-heading">RETURNS</div>
                 <div class="panel-body">
                    <div id="d1-c3" style="height:150px"></div>
             </div>
          </div>
        </div>
    </div>


    <div class="row">
            <div class="col-xs-12">
            <div class="box" id="clock_holder" style="background-color:#202020">
    <br>
    <div class="container">
        <div class="row">
            <div class="clock">
                <div id="Date"></div>
                <ul>
                    <li id="hours"></li>
                    <li id="point">:</li>
                    <li id="min"></li>
                    <li id="point">:</li>
                    <li id="sec"></li>
                </ul>
            </div>
        </div>
        <br><br>
    </div>
</div>
            </div>
          </div>