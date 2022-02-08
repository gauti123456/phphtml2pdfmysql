<?php
                
                include_once("connection.php");

                $sql = "SELECT * FROM users";

                $result = mysqli_query($conn,$sql);

                while($row = mysqli_fetch_array($result)){

                ?>

                <tr>
                    <td><?php echo $row['name_of_player']; ?></td>
                    <td><?php echo $row['team']; ?></td>
                    <td><?php echo $row['country']; ?></td>
                </tr>
          </tbody>
          <?php
                }
                ?>