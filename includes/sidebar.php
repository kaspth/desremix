<section class="sidebar">
  <section class="cart">
    <table>
      <thead>
        <th>Antal</th>
        <th>Produkter</th>
        <th>Pris</th>
      </thead>

      <tbody>
        <?php foreach($line_items as $line_item) { ?>
          <tr>
            <td><?php echo $line_item['count'] ?></td>
            <td><?php echo $line_item['name'] ?></td>
            <td><?php echo $line_item['price'] ?></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </section>
</section>