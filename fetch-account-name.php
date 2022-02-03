<?php
require_once "db.php";
$method = $_POST["method"];
if($method==2)
{ ?>                                <label class="col-md-3 control-label"> Account Name</label>
	                                <div class="col-md-6">
                                    <!-- col-md-6 Begin -->

                                    <input name="account_name" type="text" class="form-control" required>

                                </div><!-- col-md-6 Finish -->

<?php 
}
?>