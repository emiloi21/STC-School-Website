
<select name="fruit">
  <option value="apple">Apple</option>
  <option value="banana">Banana</option>
  <option value="peach">Peach</option>
</select>


<br />


<select name="price">
  <option value="3">Apple 1kg 3€</option>
  <option value="5">Apple 2kg 5€</option>
  <option value="7">Apple 3kg 7€</option>
</select>


<script>

let prices = {"apple":[{value:3,desc:"Apple 1kg 3&euro;"},{value:5,desc:"Apple 2kg 5&euro;"},{value:7,desc:"Apple 3kg 7&euro;"}],
             "banana":[{value:3,desc:"Banana 2kg 3.5&euro;"},{value:5,desc:"Banana 4kg 7&euro;"},{value:7,desc:"Banana 5kg 11&euro;"}],
             "peach":[{value:3,desc:"Peach 1.5kg 3&euro;"},{value:5,desc:"Peach 3kg 6&euro;"},{value:7,desc:"Peach 4kg 7&euro;"}]}

document.getElementsByName('fruit')[0].addEventListener('change', function(e) {
  document.getElementsByName('price')[0].innerHTML = prices[this.value].reduce((acc, elem) => `${acc}<option value="${elem.value}">${elem.desc}</option>`, "");
});

</script>