
    <section>

     
        <div class="container">
            <div class="row">
               <h1 class="mt-5 text-primary fw-bold text-decoration-underline">Customer Registration</h1>

                <div class="col-lg-8">
                    <?php 
                    if($this->session->flashdata('reg')){

                        echo '<h3 class= "text-start text-success fw-bold">Customer Registered</h3>';
                    }
                    ?>
                    <form method="POST" action="<?= base_url() ?>main/cus_reg">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Name</label>
                            <input type="text" class="form-control"
                             name="name" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Address</label>
                            <input type="text" class="form-control" 
                             name="address"id="exampleInputPassword1">
                        </div>
                    
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Age</label>
                            <input type="number" class="form-control" 
                              name="age"id="exampleInputPassword1">
                        </div>
                    
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Phone Number</label>
                            <input type="number" class="form-control" 
                              name="number" id="exampleInputPassword1">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Email</label>
                            <input type="email" class="form-control" 
                              name="email" id="exampleInputPassword1">
                        </div>

                        <section class="mb-3">
                            <div class="card p-3">
                                <div class="mb-3">
                                    <label class="form-label" for="">Select Item</label>
                                    <select class="form-select form-select mb-3" 
                                        aria-label=".form-select-lg example" name="item" id="item">
                                        <option selected="" disabled="" >--Select--</option>
                                            <?php

                                                foreach($items as $row){

                                                    echo '<option value="'.$row->item_id.'">'.$row->item_name.'</option>';
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
                    
                        <button type="submit" name="submit" class="btn btn-primary mb-5">Submit</button>
                    </form>    
                </div>                
            </div>
        </div>
    </section>

    <div class="container mb-5">
        <div class="row">
            <h2>All Customers</h2>
            <section class="mt-3 ">
                <table class="table" id="">
                    <thead class="thead-primary bg-primary text-white">
                        <tr>
                            <th class="text-white" scope="col">#</th>
                            <th class="text-white" scope="col">Customer ID</th>
                            <th class="text-white" scope="col">Customer Name</th>
                            <th class="text-white" scope="col">Age</th>
                            <th class="text-white" scope="col">Address</th>
                            <th class="text-white" scope="col">Phone Number</th>
                            <th class="text-white" scope="col">email </th>
                            <th class="text-white" scope="col">Registered Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  
                            $i=0;
                            foreach($customers as $wc){
                            $i++;
                        ?>
                        <tr>
                            <th scope="row"><?php echo $i ?></th>
                            <td><?php echo $wc->customer_id ?></td>
                            <td><?php echo $wc->name ?></td>       
                            <td><?php echo $wc->age ?></td>               
                            <td><?php echo $wc->address ?></td>               
                            <td><?php echo $wc->number ?></td>               
                            <td><?php echo $wc->email_id ?></td>               
                            <td><?php echo $wc->date ?></td>               
                        </tr>
                        <?php
                        }
                        echo $link;
                        ?>
                    </tbody>
                </table>
            </section>
        </div>
    </div>
   



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>