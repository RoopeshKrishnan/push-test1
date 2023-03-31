
    <section>

     
        <div class="container">
            <div class="row">
               <h1 class="mt-5 text-primary fw-bold text-decoration-underline">Rent Collection </h1>

                <div class="col-lg-8">
                    <?php 
                    if($this->session->flashdata('rent_reg')){

                        echo '<h3 class= "text-start text-success fw-bold">Rent Created</h3>';
                    }
                    ?>
                    <form method="POST" action="<?= base_url() ?>main/rent_op">

                                <div class="mb-3">
                                    <label class="form-label" for="">Select Customer</label>
                                    <select class="form-select form-select mb-3" 
                                        aria-label=".form-select-lg example" name="customer" id="customer">
                                        <option selected="" disabled="" >--Select--</option>
                                            <?php

                                                foreach($customers as $row){

                                                    echo '<option value="'.$row->customer_id.'">'.$row->name.'</option>';
                                                }
                                            ?>
                                    </select>       
                                </div>

                                 <div class="mb-3">
                                    <label class="form-label" for="">Select Item</label>
                                    <select class="form-select form-select mb-3" 
                                        aria-label=".form-select-lg example" name="item" id="item">
                                        <option selected="" disabled="" >--Select--</option>
         
                                    </select>       
                                </div>

                                
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Rent amount</label>
                                    <input type="text" class="form-control"
                                    name="rent_amount" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>

                               
                                <div class="mb-3">
                                    <label class="form-label" for="">Unit type</label>
                                    <select class="form-select form-select mb-3" 
                                        aria-label=".form-select-lg example" name="unit_type" id="unit_type">
                                        <option selected="" disabled="" >--Select--</option>
                                        <!-- <option value="hourly">hourly</option> -->
                                        <option value="dayily">dayily</option>
                                        <option value="weekly">weekly</option>
                                        <option value="monthly">monthly</option>
                                        <option value="yearly">yearly</option>                               
                                    </select>       
                                </div>


                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Duration</label>
                                    <input type="number" class="form-control"
                                    name="duration" id="duration" aria-describedby="emailHelp">
                                </div>
                                
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Rent start date</label>
                                    <input type="date" class="form-control"
                                    name="rent_sdate" id="rent_sdate" aria-describedby="emailHelp">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Rent end date</label>
                                    <input type="date" class="form-control"
                                    name="rent_edate" id="rent_edate" aria-describedby="emailHelp">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Rent overdraft</label>
                                    <input type="date" class="form-control"
                                    name="rent_overdraft" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Rent assign date</label>
                                    <input type="date" class="form-control"
                                    name="rent_assign" id="rent_assign" aria-describedby="emailHelp">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Next rent date</label>
                                    <input type="date" class="form-control"
                                    name="next_rent" id="next_rent" aria-describedby="emailHelp">
                                </div>


                    
                        <button type="submit" name="submit" id="rentsub" class="btn btn-primary">Submit</button>
                    </form>    
                </div>                
            </div>
        </div>
    </section>
    <input type="hidden" id="base" value="<?php echo base_url(); ?>">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/main.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>