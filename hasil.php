<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Review</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $results = $koneksi->query("SELECT * FROM contacts");
        if ($results && $results->num_rows > 0) {
            while ($value = $results->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($value["id"]); ?></td>
                    <td><?php echo htmlspecialchars($value["name"]); ?></td>
                    <td><?php echo htmlspecialchars($value["email"]); ?></td>
                    <td><?php echo htmlspecialchars($value["message"]); ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $value['id']; ?>" class="button-edit">Edit</a>
                        <a href="put.php?delete&id=<?php echo $value['id']; ?>" class="button-delete" onclick="return confirm('Are you sure?');">Delete</a>
                    </td>
                </tr>
                <?php
            }
        } else {
            echo "<tr><td colspan='5'>No data found</td></tr>";
        }
        ?>
    </tbody>
</table>
