<!DOCTYPE html>
<html>
  <head>
    <title>Invoice</title>
    <style>
      table {
        border-collapse: collapse;
        width: 100%;
      }
      
      th, td {
        text-align: left;
        padding: 8px;
        border-bottom: 1px solid #ddd;
      }

      th {
        background-color: #ddd;
      }

      .grand-total {
        font-weight: bold;
      }
    </style>
  </head>
  <body>
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
        foreach($items as $item): 
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
          <td colspan="3" class="grand-total">Grand Total:</td>
          <td><?php echo number_to_currency($total, 'IDR'); ?></td>
        </tr>
      </tfoot>
    </table>
  </body>
</html>
