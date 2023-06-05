<!DOCTYPE html>
<html>
<head>
    <style>
        /* Add your invoice styling here */
    </style>
</head>
<body>
    <h1>Invoice</h1>
    <p>Invoice Number: <?php echo $invoice_number; ?></p>
    <p>Date: <?php echo $date; ?></p>
    <p>Customer Name: <?php echo $customer_name; ?></p>
    
    <table>
        <thead>
            <tr>
                <th>Description</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($items as $item): ?>
                <tr>
                    <td><?php echo $item['description']; ?></td>
                    <td><?php echo $item['quantity']; ?></td>
                    <td><?php echo $item['price']; ?></td>
                    <td><?php echo $item['quantity'] * $item['price']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
    <p>Total Amount: <?php echo $total_amount; ?></p>
</body>
</html>
