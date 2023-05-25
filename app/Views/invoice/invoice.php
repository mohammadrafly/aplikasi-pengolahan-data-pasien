<!DOCTYPE html>
<html>
<head>
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #555;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
        }

        th, td {
            text-align: left;
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            color: #555;
        }

        .grand-total {
            font-weight: bold;
            color: #333;
        }

        .total-amount {
            font-weight: bold;
            color: #f44336;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Invoice</h1>
    <table>
        <thead>
        <tr>
            <th>Nama Item</th>
            <th>Harga</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $total = 0;
        foreach ($items as $item):
            $total += $item['price'];
            ?>
            <tr>
                <td><?php echo $item['name']; ?></td>
                <td><?php echo number_to_currency($item['price'], 'IDR'); ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
        <tfoot>
          <tr>
              <td class="grand-total">Grand Total:</td>
              <td class="total-amount"><?php echo number_to_currency($total, 'IDR'); ?></td>
          </tr>
        </tfoot>
    </table>
</div>
</body>
</html>
