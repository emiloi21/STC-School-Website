      <!-- Login Modal-->
      <div id="reg-code-help-modal" tabindex="-1" role="dialog" aria-labelledby="login-modalLabel" aria-hidden="true" class="modal fade">
        <div role="document" class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 id="login-modalLabel" class="modal-title">Registration Code Help</h4>
              <a href="#" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="fa fa-times"></i></span></a>
            </div>
            <div class="modal-body">
            <p>Enter 10-character Registration Code sent to your registered email address/contact number to load student profile.</p>
            
            
            <!--hr />
            
              <div class="form-group">
                  <label>Resend Registration Code by SMS</label>
                  <div class="form-group">
                      <div class="input-group">
                          <div class="input-group-prepend"><span class="input-group-text">+63</span></div>
                          <input name="contact_num" type="text" class="form-control" required="" placeholder="Enter registered contact number" />
                          <div class="input-group-prepend"><button name="load_reg_code" class="btn btn-primary"><i class="fa fa-send"></i> SEND SMS</button></div>        
                      </div>
                  </div>
              </div-->
              
            </div>
            
            <div class="modal-footer">
                <div class="form-group" style="text-align: right;">       
                    <a href="#" data-dismiss="modal"  class="btn btn-secondary">Close</a>
                </div>
            </div>
            
          </div>
        </div>
      </div>
      <!-- Login modal end-->
      
      
      <!-- Login Modal-->
      <div id="new-gradeschool-modal" tabindex="-1" role="dialog" aria-labelledby="login-modalLabel" aria-hidden="true" class="modal fade">
        <div role="document" class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 id="login-modalLabel" class="modal-title">New - Grade School</h4>
              <a href="#" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="fa fa-times"></i></span></a>
            </div>
            <div class="modal-body">
  
            <form action="save_userInfo_reg.php" method="POST">
                              
            <input name="dept" value="Grade School" type="hidden" />
            <input name="strand" type="hidden" value="N/A" />
            <input name="major" type="hidden" value="N/A" />
            <input name="classification" type="hidden" value="New" />
            
            <div class="form-group">       
            <label>LRN <small>(12 Digit)</small></label>
            <input name="lrn" id="lrn" onmouseout="checkLRNStatus()" class="form-control" placeholder="Enter 12 Digit LRN" required="" type="number" min="100000000000" max="999999999999" step="1" />
            <span id="lrn_message" style="font-size: small;"></span>
            </div>
            
            <div class="form-group">
                <label>First Name</label>
                <input name="fname" type="text" class="form-control" placeholder="Enter first name" required="" />
            </div>
            
            <div class="form-group">
                <label>Last Name</label>
                <input name="lname" type="text" class="form-control" placeholder="Enter last name" required="" />
            </div>
            
            <div class="form-group">
                <label>Contact Number</label>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text">+63</span></div>
                        <input name="contact_num" type="text" class="form-control" required="" placeholder="Enter contact number" />
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <label>Email Address</label>
                <input name="email" type="text" class="form-control" placeholder="Enter email address" />
            </div>
            
            <div class="form-group">
                <label>Grade Level</label>
                <select name="gradeLevel" class="form-control">
                <option>Nursery</option>
                <option>Preparatory</option>
                <option>Kinder</option>
                </select>
            </div>
            
            </div>
            
            <div class="modal-footer">
                <div class="form-group" style="text-align: right;">       
                    <button name="setCourse" class="btn btn-primary">NEXT</button>
                </div>
            </div>
            
            </form>
          </div>
        </div>
      </div>
      <!-- Login modal end-->
      
      
      <!-- Login Modal-->
      <div id="new-jhs-modal" tabindex="-1" role="dialog" aria-labelledby="login-modalLabel" aria-hidden="true" class="modal fade">
        <div role="document" class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 id="login-modalLabel" class="modal-title">New - Junior High School</h4>
              <a href="#" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="fa fa-times"></i></span></a>
            </div>
            <div class="modal-body">
  
            <form action="save_userInfo_reg.php" method="POST">
                              
            <input name="dept" value="Junior High School" type="hidden" />
            <input name="strand" type="hidden" value="N/A" />
            <input name="major" type="hidden" value="N/A" />
            <input name="classification" type="hidden" value="New" />
            
            <div class="form-group">       
            <label>LRN <small>(12 Digit)</small></label>
            <input name="lrn" id="lrn_jhs" onmouseout="checkLRNStatus_jhs()" class="form-control" placeholder="Enter 12 Digit LRN" required="" type="number" min="100000000000" max="999999999999" step="1" />
            <span id="lrn_message_jhs" style="font-size: small;"></span>
            </div>
            
            <div class="form-group">
                <label>First Name</label>
                <input name="fname" type="text" class="form-control" placeholder="Enter first name" required="" />
            </div>
            
            <div class="form-group">
                <label>Last Name</label>
                <input name="lname" type="text" class="form-control" placeholder="Enter last name" required="" />
            </div>
            
            <div class="form-group">
                <label>Contact Number</label>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text">+63</span></div>
                        <input name="contact_num" type="text" class="form-control" required="" placeholder="Enter contact number" />
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <label>Email Address</label>
                <input name="email" type="text" class="form-control" placeholder="Enter email address" />
            </div>
            
            <div class="form-group">
                <label>Grade Level</label>
                <select name="gradeLevel" class="form-control">
                <option>Grade 7</option>
                </select>
            </div>
            
            </div>
            
            <div class="modal-footer">
                <div class="form-group" style="text-align: right;">       
                    <button name="setCourse" class="btn btn-primary">NEXT</button>
                </div>
            </div>
            
            </form>
          </div>
        </div>
      </div>
      <!-- Login modal end-->
      
      
      <!-- Login Modal-->
      <div id="new-shs-modal" tabindex="-1" role="dialog" aria-labelledby="login-modalLabel" aria-hidden="true" class="modal fade">
        <div role="document" class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 id="login-modalLabel" class="modal-title">New - Senior High School</h4>
              <a href="#" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="fa fa-times"></i></span></a>
            </div>
            <div class="modal-body">
  
            <form action="save_userInfo_reg.php" method="POST">
                              
            <input name="dept" value="Senior High School" type="hidden" />
            <input name="major" type="hidden" value="N/A" />
            <input name="classification" type="hidden" value="New" />
            
            <div class="form-group">       
            <label>LRN <small>(12 Digit)</small></label>
            <input name="lrn" id="lrn_shs" onmouseout="checkLRNStatus_shs()" class="form-control" placeholder="Enter 12 Digit LRN" required="" type="number" min="100000000000" max="999999999999" step="1" />
            <span id="lrn_message_shs" style="font-size: small;"></span>
            </div>
            
            <div class="form-group">
                <label>First Name</label>
                <input name="fname" type="text" class="form-control" placeholder="Enter first name" required="" />
            </div>
            
            <div class="form-group">
                <label>Last Name</label>
                <input name="lname" type="text" class="form-control" placeholder="Enter last name" required="" />
            </div>
            
            <div class="form-group">
                <label>Contact Number</label>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text">+63</span></div>
                        <input name="contact_num" type="text" class="form-control" required="" placeholder="Enter contact number" />
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <label>Email Address</label>
                <input name="email" type="text" class="form-control" placeholder="Enter email address" />
            </div>
            
            <div class="form-group">
                <label>Grade Level</label>
                <select name="gradeLevel" class="form-control">
                <option>Grade 11</option>
                </select>
            </div>
            
            <div class="form-group">
                <label>Strand</label>
                <select name="strand" class="form-control">
                <option>ABM</option>
                <option>GAS</option>
                <option>HUMSS</option>
                <option>STEM</option>
                </select>
            </div>
            
            </div>
            
            <div class="modal-footer">
                <div class="form-group" style="text-align: right;">       
                    <button name="setCourse" class="btn btn-primary">NEXT</button>
                </div>
            </div>
            
            </form>
          </div>
        </div>
      </div>
      <!-- Login modal end-->
      
      
      <!-- Login Modal-->
      <div id="new-college-modal" tabindex="-1" role="dialog" aria-labelledby="login-modalLabel" aria-hidden="true" class="modal fade">
        <div role="document" class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 id="login-modalLabel" class="modal-title">New - College</h4>
              <a href="#" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="fa fa-times"></i></span></a>
            </div>
            <div class="modal-body">
  
            <form action="save_userInfo_reg.php" method="POST">
                              
            <input name="dept" value="College" type="hidden" />
            <input name="classification" type="hidden" value="New" />
            <input name="lrn" type="hidden" value="-" />
            
            <div class="form-group">
                <label>First Name</label>
                <input name="fname" type="text" class="form-control" placeholder="Enter first name" required="" />
            </div>
            
            <div class="form-group">
                <label>Last Name</label>
                <input name="lname" type="text" class="form-control" placeholder="Enter last name" required="" />
            </div>
            
            <div class="form-group">
                <label>Contact Number</label>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text">+63</span></div>
                        <input name="contact_num" type="text" class="form-control" required="" placeholder="Enter contact number" />
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <label>Email Address</label>
                <input name="email" type="text" class="form-control" placeholder="Enter email address" />
            </div>
            
            <div class="form-group">
                <label>Grade Level</label>
                <select name="gradeLevel" class="form-control">
                <option>1st Year</option>
                </select>
            </div>
            
            <div class="form-group">
                <label>Strand</label>
                <select name="strand" class="form-control">
                    <option>BSED</option>
                    <option>BEED</option>
                    <option>BSCS</option>
                    <option>BSIT</option>
                    <option>BSOA</option>
                    <option>BSBA</option>
                    <option>BSPSYCH</option>
                    <option>BSTM</option>
                    <option>BSHM</option>
                    <option>ACT</option>
                    <option>AOA</option>
                </select>
            </div>
            
            <div class="form-group">
                <label>Major</label>
                <select name="major" class="form-control" style="font-size: small;">
                    <option>N/A</option>
                    
                    <optgroup label="BSED Courses"></optgroup>
                    <option value="English">English</option>
                    <option value="Filipino">Filipino</option>
                    <option value="Mathematics">Mathematics</option>
                    <option value="Science">Science</option>
                    <option value="Social Studies">Social Studies</option>
                    <option value="Values Education">Values Education</option>
                              
                    <optgroup label="BSBA Courses"></optgroup>
                    <option value="FM">Financial Management</option>
                    <option value="HRDM">Human Resource Development Management</option>
                              
                </select>
            </div>
            
            </div>
            
            <div class="modal-footer">
                <div class="form-group" style="text-align: right;">       
                    <button name="setCourse" class="btn btn-primary">NEXT</button>
                </div>
            </div>
            
            </form>
          </div>
        </div>
      </div>
      <!-- Login modal end-->
      
      
      <!-- TRANSFEREE - REGISTRATION MODAL -->
      <!-- Login Modal-->
      <div id="trans-gradeschool-modal" tabindex="-1" role="dialog" aria-labelledby="login-modalLabel" aria-hidden="true" class="modal fade">
        <div role="document" class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 id="login-modalLabel" class="modal-title">Transferee - Grade School</h4>
              <a href="#" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="fa fa-times"></i></span></a>
            </div>
            <div class="modal-body">
  
            <form action="save_userInfo_reg.php" method="POST">
                              
            <input name="dept" value="Grade School" type="hidden" />
            <input name="strand" type="hidden" value="N/A" />
            <input name="major" type="hidden" value="N/A" />
            <input name="classification" type="hidden" value="Transferee" />
            
            <div class="form-group">       
            <label>LRN <small>(12 Digit)</small></label>
            <input name="lrn" id="lrn" onmouseout="checkLRNStatus()" class="form-control" placeholder="Enter 12 Digit LRN" required="" type="number" min="100000000000" max="999999999999" step="1" />
            <span id="lrn_message" style="font-size: small;"></span>
            </div>
            
            <div class="form-group">
                <label>First Name</label>
                <input name="fname" type="text" class="form-control" placeholder="Enter first name" required="" />
            </div>
            
            <div class="form-group">
                <label>Last Name</label>
                <input name="lname" type="text" class="form-control" placeholder="Enter last name" required="" />
            </div>
            
            <div class="form-group">
                <label>Contact Number</label>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text">+63</span></div>
                        <input name="contact_num" type="text" class="form-control" required="" placeholder="Enter contact number" />
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <label>Email Address</label>
                <input name="email" type="text" class="form-control" placeholder="Enter email address" />
            </div>
            
            <div class="form-group">
                <label>Grade Level</label>
                <select name="gradeLevel" class="form-control">
                <option>Grade 1</option>
                <option>Grade 2</option>
                <option>Grade 3</option>
                <option>Grade 4</option>
                <option>Grade 5</option>
                <option>Grade 6</option>
                </select>
            </div>
            
            </div>
            
            <div class="modal-footer">
                <div class="form-group" style="text-align: right;">       
                    <button name="setCourse" class="btn btn-primary">NEXT</button>
                </div>
            </div>
            
            </form>
          </div>
        </div>
      </div>
      <!-- Login modal end-->
      
      
      <!-- Login Modal-->
      <div id="trans-jhs-modal" tabindex="-1" role="dialog" aria-labelledby="login-modalLabel" aria-hidden="true" class="modal fade">
        <div role="document" class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 id="login-modalLabel" class="modal-title">Transferee - Junior High School</h4>
              <a href="#" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="fa fa-times"></i></span></a>
            </div>
            <div class="modal-body">
  
            <form action="save_userInfo_reg.php" method="POST">
                              
            <input name="dept" value="Junior High School" type="hidden" />
            <input name="strand" type="hidden" value="N/A" />
            <input name="major" type="hidden" value="N/A" />
            <input name="classification" type="hidden" value="Transferee" />
            
            <div class="form-group">       
            <label>LRN <small>(12 Digit)</small></label>
            <input name="lrn" id="lrn_jhs" onmouseout="checkLRNStatus_jhs()" class="form-control" placeholder="Enter 12 Digit LRN" required="" type="number" min="100000000000" max="999999999999" step="1" />
            <span id="lrn_message_jhs" style="font-size: small;"></span>
            </div>
            
            <div class="form-group">
                <label>First Name</label>
                <input name="fname" type="text" class="form-control" placeholder="Enter first name" required="" />
            </div>
            
            <div class="form-group">
                <label>Last Name</label>
                <input name="lname" type="text" class="form-control" placeholder="Enter last name" required="" />
            </div>
            
            <div class="form-group">
                <label>Contact Number</label>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text">+63</span></div>
                        <input name="contact_num" type="text" class="form-control" required="" placeholder="Enter contact number" />
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <label>Email Address</label>
                <input name="email" type="text" class="form-control" placeholder="Enter email address" />
            </div>
            
            <div class="form-group">
                <label>Grade Level</label>
                <select name="gradeLevel" class="form-control">
                <option>Grade 8</option>
                <option>Grade 9</option>
                <option>Grade 10</option>
                </select>
            </div>
            
            </div>
            
            <div class="modal-footer">
                <div class="form-group" style="text-align: right;">       
                    <button name="setCourse" class="btn btn-primary">NEXT</button>
                </div>
            </div>
            
            </form>
          </div>
        </div>
      </div>
      <!-- Login modal end-->
      
      
      <!-- Login Modal-->
      <div id="trans-shs-modal" tabindex="-1" role="dialog" aria-labelledby="login-modalLabel" aria-hidden="true" class="modal fade">
        <div role="document" class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 id="login-modalLabel" class="modal-title">Transferee - Senior High School</h4>
              <a href="#" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="fa fa-times"></i></span></a>
            </div>
            <div class="modal-body">
  
            <form action="save_userInfo_reg.php" method="POST">
                              
            <input name="dept" value="Senior High School" type="hidden" />
            <input name="major" type="hidden" value="N/A" />
            <input name="classification" type="hidden" value="Transferee" />
            
            <div class="form-group">       
            <label>LRN <small>(12 Digit)</small></label>
            <input name="lrn" id="lrn_shs" onmouseout="checkLRNStatus_shs()" class="form-control" placeholder="Enter 12 Digit LRN" required="" type="number" min="100000000000" max="999999999999" step="1" />
            <span id="lrn_message_shs" style="font-size: small;"></span>
            </div>
            
            <div class="form-group">
                <label>First Name</label>
                <input name="fname" type="text" class="form-control" placeholder="Enter first name" required="" />
            </div>
            
            <div class="form-group">
                <label>Last Name</label>
                <input name="lname" type="text" class="form-control" placeholder="Enter last name" required="" />
            </div>
            
            <div class="form-group">
                <label>Contact Number</label>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text">+63</span></div>
                        <input name="contact_num" type="text" class="form-control" required="" placeholder="Enter contact number" />
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <label>Email Address</label>
                <input name="email" type="text" class="form-control" placeholder="Enter email address" />
            </div>
            
            <div class="form-group">
                <label>Grade Level</label>
                <select name="gradeLevel" class="form-control">
                <option>Grade 12</option>
                </select>
            </div>
            
            <div class="form-group">
                <label>Strand</label>
                <select name="strand" class="form-control">
                <option>ABM</option>
                <option>GAS</option>
                <option>HUMSS</option>
                <option>STEM</option>
                </select>
            </div>
            
            </div>
            
            <div class="modal-footer">
                <div class="form-group" style="text-align: right;">       
                    <button name="setCourse" class="btn btn-primary">NEXT</button>
                </div>
            </div>
            
            </form>
          </div>
        </div>
      </div>
      <!-- Login modal end-->
      
      
      <!-- Login Modal-->
      <div id="trans-college-modal" tabindex="-1" role="dialog" aria-labelledby="login-modalLabel" aria-hidden="true" class="modal fade">
        <div role="document" class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 id="login-modalLabel" class="modal-title">Transferee - College</h4>
              <a href="#" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="fa fa-times"></i></span></a>
            </div>
            <div class="modal-body">
  
            <form action="save_userInfo_reg.php" method="POST">
                              
            <input name="dept" value="College" type="hidden" />
            <input name="classification" type="hidden" value="Transferee" />
            <input name="lrn" type="hidden" value="-" />
            
            <div class="form-group">
                <label>First Name</label>
                <input name="fname" type="text" class="form-control" placeholder="Enter first name" required="" />
            </div>
            
            <div class="form-group">
                <label>Last Name</label>
                <input name="lname" type="text" class="form-control" placeholder="Enter last name" required="" />
            </div>
            
            <div class="form-group">
                <label>Contact Number</label>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text">+63</span></div>
                        <input name="contact_num" type="text" class="form-control" required="" placeholder="Enter contact number" />
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <label>Email Address</label>
                <input name="email" type="text" class="form-control" placeholder="Enter email address" />
            </div>
            
            <div class="form-group">
                <label>Grade Level</label>
                <select name="gradeLevel" class="form-control">
                <option>2nd Year College</option>
                <option>3rd Year College</option>
                </select>
            </div>
            
            <div class="form-group">
                <label>Strand</label>
                <select name="strand" class="form-control">
                    <option>BSED</option>
                    <option>BEED</option>
                    <option>BSCS</option>
                    <option>BSIT</option>
                    <option>BSOA</option>
                    <option>BSBA</option>
                    <option>BSPSYCH</option>
                    <option>BSTM</option>
                    <option>BSHM</option>
                    <option>ACT</option>
                    <option>AOA</option>
                </select>
            </div>
            
            <div class="form-group">
                <label>Major</label>
                <select name="major" class="form-control" style="font-size: small;">
                    <option>N/A</option>
                    <option value="English">English (BSED)</option>
                    <option value="Filipino">Filipino (BSED)</option>
                    <option value="Mathematics">Mathematics (BSED)</option>
                    <option value="Science">Science (BSED)</option>
                    <option value="Social Studies">Social Studies (BSED)</option>
                    <option value="Values Education">Values Education (BSED)</option>
                    <option value="FM">Financial Management (BSBA)</option>
                    <option value="HRDM">Human Resource Development Management (BSBA)</option>
                </select>
            </div>
            
            </div>
            
            <div class="modal-footer">
                <div class="form-group" style="text-align: right;">       
                    <button name="setCourse" class="btn btn-primary">NEXT</button>
                </div>
            </div>
            
            </form>
          </div>
        </div>
      </div>
      <!-- Login modal end-->
      <!-- TRANSFEREE - REGISTRATION MODAL -->
      
      <!-- OLD - REGISTRATION MODAL -->
      
      <!-- GRADE SCHOOL Modal-->
      <div id="old-student-modal" tabindex="-1" role="dialog" aria-labelledby="login-modalLabel" aria-hidden="true" class="modal fade">
        <div role="document" class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 id="login-modalLabel" class="modal-title">Old Student</h4>
              <a href="#" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="fa fa-times"></i></span></a>
            </div>
            <div class="modal-body">
  
            <form action="save_userInfo_reg.php" method="POST">
            
            <input name="classification" type="hidden" value="Old" />
            
            <div class="form-group">
                <label>Student ID Code</label>
                <input name="student_id" type="text" class="form-control" placeholder="Enter student ID code" required="" />
            </div>
            
            
            <div class="form-group">
                <label>First Name</label>
                <input name="fname" type="text" class="form-control" placeholder="Enter first name" required="" />
            </div>
            
            <div class="form-group">
                <label>Last Name</label>
                <input name="lname" type="text" class="form-control" placeholder="Enter last name" required="" />
            </div>
            
            <div class="form-group">
                <label>Contact Number</label>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text">+63</span></div>
                        <input name="contact_num" type="text" class="form-control" required="" placeholder="Enter contact number" />
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <label>Email Address</label>
                <input name="email" type="text" class="form-control" placeholder="Enter email address" />
            </div>
            
            </div>
            
            <div class="modal-footer">
                <div class="form-group" style="text-align: right;">       
                    <button name="setCourse" class="btn btn-primary">NEXT</button>
                </div>
            </div>
            
            </form>
          </div>
        </div>
      </div>
      <!-- GRADE SCHOOL modal end-->
      