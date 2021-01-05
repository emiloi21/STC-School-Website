 <!-- Counts Section -->
      <section class="dashboard-counts section-padding">
        <div class="container-fluid">
          <div class="row">
          
            <!-- Count item widget-->
            <div class="col-xl-12 col-md-12 col-12">
              <div class="wrapper count-title d-flex">
                <div class="icon"><i class="fa fa-child"></i></div>
                <div class="name col-12"><strong class="text-uppercase"><a href="#" style="text-decoration-line: none;">QUICK COUNT</a></strong>

                <span>Web Portal  User Quick Count</span>
                
                <div class="row">
                    
                <div class="col-12">
                
                <table style="width: 100%;">
                
                <tr>
                <td>Status</td>
                <td>Grade School</td>
                <td>Junior High</td>
                <td>Senior High</td>
                <td>College</td>
                <td>Total per Status</td>
                </tr>
                
                <tr>
                <td>Setup</td>
                <td><?php echo $gs_stat_setup_ctr_query->rowCount(); ?></td>
                <td><?php echo $jhs_stat_setup_ctr_query->rowCount(); ?></td>
                <td><?php echo $shs_stat_setup_ctr_query->rowCount(); ?></td>
                <td><?php echo $col_stat_setup_ctr_query->rowCount(); ?></td>
                <td><?php echo $tot_setup=$gs_stat_setup_ctr_query->rowCount()+$jhs_stat_setup_ctr_query->rowCount()+$shs_stat_setup_ctr_query->rowCount()+$col_stat_setup_ctr_query->rowCount(); ?></td>
                </tr>
                
                <tr>
                <td>Application Assessment</td>
                <td><?php echo $gs_stat_reg_ctr_query->rowCount(); ?></td>
                <td><?php echo $jhs_stat_reg_ctr_query->rowCount(); ?></td>
                <td><?php echo $shs_stat_reg_ctr_query->rowCount(); ?></td>
                <td><?php echo $col_stat_reg_ctr_query->rowCount(); ?></td>
                <td><?php echo $tot_reg=$gs_stat_reg_ctr_query->rowCount()+$jhs_stat_reg_ctr_query->rowCount()+$shs_stat_reg_ctr_query->rowCount()+$col_stat_reg_ctr_query->rowCount(); ?></td>
                </tr>
                
                <tr>
                <td>Account Assessment</td>
                <td><?php echo $gs_stat_acct_ctr_query->rowCount(); ?></td>
                <td><?php echo $jhs_stat_acct_ctr_query->rowCount(); ?></td>
                <td><?php echo $shs_stat_acct_ctr_query->rowCount(); ?></td>
                <td><?php echo $col_stat_acct_ctr_query->rowCount(); ?></td>
                <td><?php echo $tot_acct=$gs_stat_acct_ctr_query->rowCount()+$jhs_stat_acct_ctr_query->rowCount()+$shs_stat_acct_ctr_query->rowCount()+$col_stat_acct_ctr_query->rowCount(); ?></td>
                </tr>
                
                <tr>
                <td>Payment</td>
                <td><?php echo $gs_stat_pay_ctr_query->rowCount(); ?></td>
                <td><?php echo $jhs_stat_pay_ctr_query->rowCount(); ?></td>
                <td><?php echo $shs_stat_pay_ctr_query->rowCount(); ?></td>
                <td><?php echo $col_stat_pay_ctr_query->rowCount(); ?></td>
                <td><?php echo $tot_pay=$gs_stat_pay_ctr_query->rowCount()+$jhs_stat_pay_ctr_query->rowCount()+$shs_stat_pay_ctr_query->rowCount()+$col_stat_pay_ctr_query->rowCount(); ?></td>
                </tr>
                
                <tr>
                <td>Enrolled</td>
                <td><?php echo $gs_stat_enrol_ctr_query->rowCount(); ?></td>
                <td><?php echo $jhs_stat_enrol_ctr_query->rowCount(); ?></td>
                <td><?php echo $shs_stat_enrol_ctr_query->rowCount(); ?></td>
                <td><?php echo $col_stat_enrol_ctr_query->rowCount(); ?></td>
                <td><?php echo $tot_enrol=$gs_stat_enrol_ctr_query->rowCount()+$jhs_stat_enrol_ctr_query->rowCount()+$shs_stat_enrol_ctr_query->rowCount()+$col_stat_enrol_ctr_query->rowCount(); ?></td>
                </tr>
                
                <tr>
                <td>Total per Level</td>
                <td><?php echo $gs_stat_setup_ctr_query->rowCount()+$gs_stat_reg_ctr_query->rowCount()+$gs_stat_acct_ctr_query->rowCount()+$gs_stat_pay_ctr_query->rowCount()+$gs_stat_enrol_ctr_query->rowCount(); ?></td>
                <td><?php echo $jhs_stat_setup_ctr_query->rowCount()+$jhs_stat_reg_ctr_query->rowCount()+$jhs_stat_acct_ctr_query->rowCount()+$jhs_stat_pay_ctr_query->rowCount()+$jhs_stat_enrol_ctr_query->rowCount(); ?></td>
                <td><?php echo $shs_stat_setup_ctr_query->rowCount()+$shs_stat_reg_ctr_query->rowCount()+$shs_stat_acct_ctr_query->rowCount()+$shs_stat_pay_ctr_query->rowCount()+$shs_stat_enrol_ctr_query->rowCount(); ?></td>
                <td><?php echo $col_stat_setup_ctr_query->rowCount()+$col_stat_reg_ctr_query->rowCount()+$col_stat_acct_ctr_query->rowCount()+$col_stat_pay_ctr_query->rowCount()+$col_stat_enrol_ctr_query->rowCount(); ?></td>
                <td><?php echo $tot_setup+$tot_reg+$tot_acct+$tot_pay+$tot_enrol; ?></td>
                </tr>
                
                </table>
                
                </div>
                </div>
                </div>
                
              </div>
            </div>
 
            
          </div>
        </div>
      </section>