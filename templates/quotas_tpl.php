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
          <?php foreach ($user_fees as $row) { ?>
            <article>
              <span>Fee Type: <?php echo $row['fee_type'] ?></span>
              <span>Fee Status: <?php echo $row['fee_status'] ?></span>
              <span>Months Ahead Without Needing To Pay: <?php echo $row['fee_months_ahead'] ?></span>
            </article>
          <?php } ?>

        <?php } else { ?>
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
                <th>Year</th>
            </tr>
              
          <?php foreach ($association as $row) { ?>
            <tr>
            <td><?php echo $row['role_asso'] ?></td>
              <td> <?php echo $row['year_asso'] ?> </td>
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