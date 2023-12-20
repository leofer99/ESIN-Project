<section>
        <h2>New Registrations</h2>
      
      <?php if ($error_msg == null) { ?> 
        <?php if(empty($new_registrations)) { ?>
          <p>No new registrations</p>
      <?php } else { ?>

          <table id="registrations-table">
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Phone number</th>
              <th>Reject</th>
              <th>Accept</th>

            </tr>
           
          <?php foreach ($new_registrations as $row) { ?>
            <tr>
              <td><?php echo $row['name'] ?></td>
              <td><?php echo $row['email'] ?></td>
              <td><?php echo $row['phone_number'] ?></td>
              <td><a href="action_remove_user.php?id_=<?php echo $row['id_']; ?>">X</a></td> 
              <td><a href="action_add_to_user.php?id_=<?php echo $row['id_']; ?>">✓</a></td> 

            </tr>
          <?php } ?>
          </table>

        <?php } }  
        else { ?>
          <span>  <?php echo $error_msg ?> </span>
          <?php } ?>

    </section>

<section>
        <h2>Members Info</h2>
        <!-- All members names displayed, by clicking on the name of the respective user, 
        we can go to the quotas page of the respective member
        AND we can add information to their pages
      -->
        <?php if ($error_msg == null) { ?>
          <?php if(empty($members)) { ?>
          <p>No members</p>
      <?php } else { ?>

        <table>
            <tr>
              <th>Name</th>
              <th>Fee Status</th>
            </tr>

          <?php foreach ($members as $row) { ?>
            <tr>
              <td><a href="project_about_us.php"></a> <?php echo $row['name'] ?></td>
              <td><?php echo $row['fee_status'] ?></td>
             
          </tr>
          <?php } ?>
        </table>

        <?php } } else { ?>
          <span>  <?php echo $error_msg ?> </span>
          <?php } ?>

    </section>

    <section>
        <h2>Annual Fee</h2>
        <?php if ($error_msg == null) { ?>
          <?php if(empty($all_fees)) { ?>
          <p>No annual fee</p>
          <?php } else { ?>
        <table>
            <tr>
                <th>Fee Year</th>
                <th>Fee Amount</th>
            </tr>
              
          <?php foreach ($all_fees as $row) { ?>
            <tr>
            <td><?php echo $row['fee_year'] ?></td>
            <td><?php echo $row['fee_amount'] ?></td>

            </tr>
          <?php } ?>

          </table>
        
        <?php } } else { ?>
          <span>  <?php echo $error_msg ?> </span>
          <?php } ?>

    </section>

   

    <section id="payments">
        <h2>Payments History</h2>
        <?php if ($error_msg == null) { ?>
          <?php if(empty($all_payments)) { ?>
          <p>No payments</p>
          <?php } else { ?>
        <table>
            <tr>
                <th>Name</th>
                <th>Date</th>
                <th>Amount Paid</th>
                <th>Type of Payment</th>
            </tr>

            <?php foreach ($all_payments as $row) { ?>
            <tr>
            <td><?php echo $row['name'] ?></td>
            <td><?php echo $row['date_payment'] ?></td>
              <td> <?php echo $row['amount_paid'] ?>€ </td>
              <td class="price"><?php echo $row['type_payment'] ?></td>
            </tr>
          <?php } ?>

        </table>

        <?php } } else { ?>
          <span>  <?php echo $error_msg ?> </span>
          <?php } ?>
    </section>


    <section>
        <h2>Event History</h2>
        <?php if ($error_msg == null) { ?>
          <?php if(empty($all_events)) { ?>
          <p>No association roles</p>
          <?php } else { ?>
        <table>
            <tr>
                <th>Event Name</th>
                <th>Event Type</th>
                <th>Event Date</th>
                <th>Number of Roles</th>
            </tr>
              
          <?php foreach ($all_events as $row) { ?>
            <tr>
            <td><?php echo $row['event_name'] ?></td>
            <td><?php echo $row['event_type'] ?></td>
            <td><?php echo $row['event_date'] ?></td>
            <td><?php echo $row['role_count'] ?></td>

            </tr>
          <?php } ?>

          </table>
        
        <?php } } else { ?>
          <span>  <?php echo $error_msg ?> </span>
          <?php } ?>

    </section>


    <section>
        <h2>Total Inventory</h2>
        <?php if ($error_msg == null) { ?>
          <?php if(empty($all_inventory)) { ?>
          <p>No inventory</p>
          <?php } else { ?>

        <table>
            <tr>
                
                <th>Product Type</th>
                <th>Quantity</th>
                <th>Member</th>
            </tr>
            <?php foreach ($all_inventory as $row) { ?>
            <tr>
              
              <td><?php echo $row['product_type'] ?></td>
              <td> <?php echo $row['quantity'] ?> </td>
              <td><?php echo $row['name'] ?></td>
              <td><a href="action_remove_inventory.php?sid=<?php echo $row['sid']; ?>">X</a></td> 
            </tr>
          <?php } ?>

        </table>

        <?php } } else { ?>
          <span>  <?php echo $error_msg ?> </span>
          <?php } ?>

          <form action="action_insert_inventory.php" method="post">
            <label for="product_type">Product type:</label>
            <input type="text" id="product_type" name="product_type" required>

            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" required>

            <button type="submit">Add Inventory</button>
          </form>


    </section>