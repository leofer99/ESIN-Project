<section>
        <h2>User Info</h2>
        <!-- Display membership status here -->
        <?php if ($error_msg == null) { ?>
          <?php foreach ($user_infos as $row) { ?>
            <article>
              <span>Name: <?php echo $row['name'] ?></span>
              <span>Email: <?php echo $row['email'] ?></span>
              <span>Gender: <?php echo $row['gender'] ?></span>
              <span>City: <?php echo $row['city'] ?></span>
              <span>Joined Date: <?php echo $row['joined_date'] ?></span>
            </article>
          <?php } ?>

        <?php } else { ?>
          <span>  <?php echo $error_msg ?> </span>
          <?php } ?>

    </section>

    <section>
        <h2>Fees Payment Info</h2>

        <!-- Display membership status here -->
        <?php if ($error_msg == null) { ?>
          <table>
            <tr>
                <th>Amount Paid </th>
                <th>Amount Owed </th>
                <th>Balance </th>
                <th>Fee Status </th>
            </tr>
              
          <?php  ?>
            <tr>
            <td><?php echo $user_paid ?>€</td>
            <td><?php echo $user_debt ?>€</td>
            <td><?php echo $balance?>€</td>
            <td><?php echo $fee_status ?></td>

            </tr>
            
          </table>
        <?php } else { ?>
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
            <td><?php echo $row['fee_amount'] ?>€</td>

            </tr>
          <?php } ?>

          </table>
        
        <?php } } else { ?>
          <span>  <?php echo $error_msg ?> </span>
          <?php } ?>

    </section>
    

    <section id="payments">
        <h2>Payment History</h2>
        <?php if ($error_msg == null) { ?>
        <table>
            <tr>
                <th>Date</th>
                <th>Amount Paid</th>
                <th>Type of Payment</th>
            </tr>

            <?php foreach ($payments as $row) { ?>
            <tr>
            <td><?php echo $row['date_payment'] ?></td>
              <td> <?php echo $row['amount_paid'] ?>€ </td>
              <td class="price"><?php echo $row['type_payment'] ?></td>
            </tr>
          <?php } ?>

        </table>

 

        <?php } else { ?>
          <span>  <?php echo $error_msg ?> </span>
          <?php } ?>
    </section>


    <section>
        <h2>Association History</h2>
        <?php if ($error_msg == null) { ?>
        <table>
            <tr>
                <th>Role</th>
                <th>Begin Date</th>
                <th>End Date</th>

            </tr>
              
          <?php foreach ($association as $row) { ?>
            <tr>
              <td><?php echo $row['role_asso'] ?></td>
              <td> <?php echo $row['role_date_begin'] ?> </td>
              <td> <?php echo $row['role_date_end'] ?> </td>

            </tr>
          <?php } ?>

          </table>
        
        <?php } else { ?>
          <span>  <?php echo $error_msg ?> </span>
          <?php } ?>

    </section>

    <section>
        <h2>Event History</h2>
        <?php if ($error_msg == null) { ?>
          
        <table>
            <tr>
                <th>Event Name</th>
                <th>Date</th>
                <th>Event Type</th>
                <th>Event Role</th>
            </tr>

            <?php foreach ($events as $row) { ?>
            <tr>
              <td><?php echo $row['event_name'] ?></td>
              <td> <?php echo $row['event_date'] ?> </td>
              <td> <?php echo $row['event_type'] ?> </td>
              <td> <?php echo $row['event_role'] ?> </td>

            </tr>
            <?php } ?>
        </table>
 
        <?php } else { ?>
          <span>  <?php echo $error_msg ?> </span>
          <?php } ?>

          <form action="action_insert_event_history.php" method="post">
            <label for="event_name">Event Name:</label>
            <input type="text" id="event_name" name="event_name" required>

            <label for="event_date">Date:</label>
            <input type="text" id="event_date" name="event_date" required>

            <label for="event_type">Type:</label>
            <input type="text" id="event_type" name="event_type" required>

            <label for="event_role">Role:</label>
            <input type="text" id="event_role" name="event_role" required>

            <button type="submit">Add New Event</button>
          </form>

    </section>

    <section>
        <h2>Inventory</h2>
        <?php if ($error_msg == null) { ?>
        <table>
            <tr>
                <th>Product Type</th>
                <th>Quantity</th>
                
            </tr>
            <?php foreach ($inventory as $row) { ?>
            <tr>
            <td><?php echo $row['product_type'] ?></td>
              <td> <?php echo $row['quantity'] ?> </td>
              <td><a href="action_remove_inventory.php?sid=<?php echo $row['sid']; ?>">X</a></td> 
            </tr>
          <?php } ?>

        </table>

        <?php } else { ?>
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