 <!-- Bar Chart -->
 <div class="card shadow mb-4">
     <div class="card-body">
         <div class="chart-pie">
             <canvas id="pie_month"></canvas>
         </div>
     </div>
 </div>

 <!-- backend -->

 <div id="month_totalsale" style="display: none;">
     <?php
        $output = $logic->logic_mothly_sale_totalAmount();
        echo htmlspecialchars($output);
        ?>
 </div>
 <div id="month_due" style="display: none;">
     <?php
        $output2 = $logic->logic_month_sale_due();
        echo htmlspecialchars($output2);
        ?>
 </div>
 <div id="month_expence" style="display: none;">
     <?php
        $output3 = $logic->logic_month_expence();
        echo htmlspecialchars($output3);
        ?>
 </div>
 <div id="month_profit" style="display: none;">
     <?php
        $output4 = $logic->logic_month_sale_profit();
        echo htmlspecialchars($output4);
        ?>
 </div>

<script src="vendor/chart.js/Chart.min.js"></script>
 <script>
     var div = document.getElementById("month_totalsale");
     var month_sale = div.textContent;
     var div2 = document.getElementById("month_due");
     var month_due = div2.textContent;
     var div3 = document.getElementById("month_expence");
     var month_expence = div3.textContent;
     var div4 = document.getElementById("month_profit");
     var month_profit = div4.textContent;
 </script>
 <!-- custom js  -->
<script language="JavaScript" type="text/javascript" src="js/custom_3.js"></script>
