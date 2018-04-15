// Call the Watson GET API to return a keyword based on entered question
function classifyText() {
    // SAMPLE REQUEST! REAL ONE WILL BE DYNAMIC 
// curl -G --user "997e27c4-b5e4-443d-9018-a8748614e264":"g0veY0ndetkE" "https://gateway.watsonplatform.net/natural-languae-classifier/api/v1/classifiers/ab2c7bx342-nlc-652/classify" --data-urlencode "text=Where do seniors live?"


const myRequest = new Request('https://gateway.watsonplatform.net/natural-languae-classifier/api/v1/classifiers/ab2c7bx342-nlc-652/classify');

const myURL = myRequest.url; // http://localhost/flowers.jpg
const myMethod = myRequest.method; // GET
const myCred = myRequest.credentials; // omit

var myHeaders = new Headers();

myHeaders.append('username', '997e27c4-b5e4-443d-9018-a8748614e264');
myHeaders.append('password','g0veY0ndetkE');

// hard code for test
var data = "Where do seniors live?";
// Non hard code for real
// var data = $("#question").val();


// Enjoy deleting this shitty non working code in exchange for big normal code
fetch(myURL, {
    method: 'POST', // or 'PUT'
    body: JSON.stringify(data), // data can be `string` or {object}!
    headers: myHeaders
  }).then(res => res.json())
  .catch(error => console.error('Error:', error))
  .then(response => console.log('Success:', response));

}
