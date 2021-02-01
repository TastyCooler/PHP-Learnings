<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <div>
      <br>

      <center>
        <a href="register.php"><button class="button">Add Member</button></a>
      </center>

      <center>
        <h1>Database Member Information</h1>
        <table class="altrowstable" id="alternatecolor">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Gender</th>
              <th>Email</th>
              <th>City</th>
              <th>Date</th>
              <th>edit</th>
              <th>delete</th>
            </tr>
          </thead>

          <tbody>
            <?php
            require_once 'dbconfig.php';

            $stmt = $db_con->prepare("SELECT * FROM member ORDER BY id DESC");
            $stmt->execute();
            while($row=$stmt->fetch(PDO::FETCH_ASSOC))
            { ?>
              <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['gender']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['city']; ?></td>
                <td><?php echo $row['cdate']; ?></td>

                <td align="center"> <a href="edit.php?eid=<?php echo $row['id']; ?>" title="Edit"><img src="img/edit.png" width="20px" /></a></td>
                <td align="center"><a href="delete.php?id=<?php echo $row['id']; ?>" title="Delete"><img src="img/delete.png" width="20px"/></a></td>
              </tr>
              <?php
            }
              ?>
          </tbody>
        </table>
        <br>
      </center>
    </div>
  </body>
</html>
