</form>

</div>
        </div>
    </div>
    <?php
    $id = $rows["id"];
    if (isset($_POST["delete"])) {
        $delete_id = $_POST["delete_id"];
        if (isset($_POST["delete"])) {
            $delete_id = $_POST["delete_id"];
            $sql_delete = "DELETE FROM cart WHERE id = :id";
            $stmt_delete = $conn->prepare($sql_delete);
            $stmt_delete->execute(['id' => $delete_id]);
        
            // Redirect the user back to the cart page
            header("Location: Cart.php");
            exit(); // Make sure to exit after a header redirect
        }
    }
    echo "<form action='' method='post'>
        <input type='hidden' name='delete_id' value='$id'>
        <button class='delete' type='submit' name= 'delete' style='height:55px;'>Delete</button>
        </form>";
    ?>
<?php
}
}
?>