
    <section>

     
        <div class="container">
            <div class="row">
               <h1 class="mt-5 text-primary fw-bold text-decoration-underline">Item Creation</h1>

                <div class="col-lg-8">
                    <?php 
                    if($this->session->flashdata('item_reg')){

                        echo '<h3 class= "text-start text-success fw-bold">Item Created</h3>';
                    }
                    ?>
                    <form method="POST" action="<?= base_url() ?>main/item_creation">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Item Name</label>
                            <input type="text" class="form-control"
                             name="item_name" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Item Code</label>
                            <input type="text" class="form-control" 
                             name="item_code"id="exampleInputPassword1">
                        </div>
                    
                        <div class="mb-3">
                             <label class="form-label" for="">Tax</label>
                            <select class="form-select form-select mb-3" 
                                aria-label=".form-select-lg example" name="tax" id="tax">
                                <option selected="" disabled="" >--Select--</option>
                                <option value="1">1&nbsp;%</option>
                                <option value="2">2&nbsp;%</option>
                                <option value="3">3&nbsp;%</option>           
                            </select>       
                        </div>

                        <section class="mb-3">
                            <div class="card p-3">
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
                                    <label class="form-label" for="">Priority</label>
                                    <select class="form-select form-select mb-3" 
                                        aria-label=".form-select-lg example" name="priority" id="priority">
                                        <option selected="" disabled="" >--Select--</option>
                                        <option value="high">High</option>
                                        <option value="medium">Medium</option>
                                        <option value="low">Low</option>

                                    </select>       
                                </div>
                            </div>
                        </section>
                    

                    
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>    
                </div>                
            </div>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>