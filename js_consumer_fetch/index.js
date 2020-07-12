fetch('http://127.0.0.1:8000/api/products')
  .then(function(response) {
    return response.json();
  })
  .then(function(myJson) {
    console.log(myJson);
});