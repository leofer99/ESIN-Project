<section>
        <h2>New Registrations</h2>
        <!-- All members names displayed, by clicking on the name of the respective user, 
        we can go to the quotas page of the respective member
        AND we can add information to their pages
      -->
        <?php if ($error_msg == null) { ?>
          <?php foreach ($new_registrations as $row) { ?>
            <article>
              <span>Name: <?php echo $row['name'] ?></span>
              <span>Email: <?php echo $row['email'] ?></span>
              <span>Phone number: <?php echo $row['phone_number'] ?></span>
            </article>
          <?php } ?>

        <?php } else { ?>
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
          <?php foreach ($members as $row) { ?>
            <article>
              <span>Name: <?php echo $row['name'] ?></span>
              <span>Fee Status: <?php echo $row['fee_status'] ?></span>
             
            </article>
          <?php } ?>

        <?php } else { ?>
          <span>  <?php echo $error_msg ?> </span>
          <?php } ?>

    </section>
   

    <section id="payments">
        <h2>Payments History</h2>
        <?php if ($error_msg == null) { ?>
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
        <h2>Total Inventory</h2>
        <?php if ($error_msg == null) { ?>
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