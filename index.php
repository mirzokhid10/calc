<?php
$first_num = isset($_POST['first_num']) ? $_POST['first_num'] : '';
$second_num = isset($_POST['second_num']) ? $_POST['second_num'] : '';
$operator = isset($_POST['operator']) ? $_POST['operator'] : '';
$result = '';

if (is_numeric($first_num) && is_numeric($second_num)) {
    switch ($operator) {
        case "Add":
            $result = $first_num + $second_num;
            break;
        case "Subtract":
            $result = $first_num - $second_num;
            break;
        case "Multiply":
            $result = $first_num * $second_num;
            break;
        case "Divide":
            if ($second_num != 0) {
                $result = $first_num / $second_num;
            } else {
                $result = "Cannot divide by zero!";
            }
            break;
        default:
            $result = "Invalid operator!";
    }
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Simple Calculator Program in PHP - Tutorials Class</title>
  </head>

  <body>
    <div id="page-wrap">
      <h1>PHP - Simple Calculator Program</h1>
      <form action="#" method="post" id="calculator-form">
        <p>
          <input
            type="number"
            name="first_num"
            id="first_num"
            required="required"
            value="<?php echo $first_num; ?>"
          />
          <b>First Number</b>
        </p>
        <p>
          <input
            type="number"
            name="second_num"
            id="second_num"
            required="required"
            value="<?php echo $second_num; ?>"
          />
          <b>Second Number</b>
        </p>
        <p>
          <input
            readonly="readonly"
            name="result"
            value="<?php echo $result; ?>"
          />
          <b>Result</b>
        </p>
        <!-- Use JavaScript to set the value of the hidden input field 'operator' -->
        <input
          type="hidden"
          name="operator"
          id="operator"
          value="<?php echo $operator; ?>"
        />
        <!-- Use JavaScript to submit the form when an operator button is clicked -->
        <button type="button" onclick="setOperator('Add')">Add</button>
        <button type="button" onclick="setOperator('Subtract')">
          Subtract
        </button>
        <button type="button" onclick="setOperator('Multiply')">
          Multiply
        </button>
        <button type="button" onclick="setOperator('Divide')">Divide</button>
        <input type="submit" style="display: none" />
      </form>
    </div>

    <script>
      function setOperator(operator) {
        document.getElementById("operator").value = operator;
        document.getElementById("calculator-form").submit();
      }
    </script>
  </body>
</html>