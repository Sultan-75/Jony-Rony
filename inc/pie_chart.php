 <!-- Bar Chart -->
 <div class="card shadow mb-4">
     <div class="card-body">
         <div class="chart-pie">
             <canvas id="pie"></canvas>
         </div>
     </div>
 </div>

 <!-- backend -->

 <div id="weekly_totalsale" style="display: none;">
     <?php
        $output = $logic->logic_week_sale_totalAmount();
        echo htmlspecialchars($output);
        ?>
 </div>
 <div id="weekly_due" style="display: none;">
     <?php
        $output2 = $logic->logic_Week_sale_due();
        echo htmlspecialchars($output2);
        ?>
 </div>
 <div id="weekly_expence" style="display: none;">
     <?php
        $output3 = $logic->logic_week_expence();
        echo htmlspecialchars($output3);
        ?>
 </div>
 <div id="weekly_profit" style="display: none;">
     <?php
        $output4 = $logic->logic_week_sale_profit();
        echo htmlspecialchars($output4);
        ?>
 </div>

<script src="vendor/chart.js/Chart.min.js"></script>
 <script>
     var div = document.getElementById("weekly_totalsale");
     var week_sale = div.textContent;
     var div2 = document.getElementById("weekly_due");
     var week_due = div2.textContent;
     var div3 = document.getElementById("weekly_expence");
     var week_expence = div3.textContent;
     var div4 = document.getElementById("weekly_profit");
     var week_profit = div4.textContent;
 </script>
 <!-- custom js  -->
<script language="JavaScript" type="text/javascript" src="js/custom_2.js"></script>
