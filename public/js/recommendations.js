// Call the Watson GET API to return a keyword based on entered question
function classifyText(elem) {
  // SAMPLE REQUEST! REAL ONE WILL BE DYNAMIC
  // curl -G --user "997e27c4-b5e4-443d-9018-a8748614e264":"g0veY0ndetkE" "https://gateway.watsonplatform.net/natural-language-classifier/api/v1/classifiers/ab2c7bx342-nlc-652/classify" --data-urlencode "text=Where do seniors live?"

  const data = {text: "Where do seniors live?"};

  const myHeaders = new Headers();

  myHeaders.append(
    'Authorization',
     'AuthorizationBasic OTk3ZTI3YzQtYjVlNC00NDNkLTkwMTgtYTg3NDg2MTRlMjY0OmcwdmVZMG5kZXRrRQ=='
   );
  myHeaders.append('content-type', 'application/json');

  const myRequest = new Request('https://gateway.watsonplatform.net/natural-language-classifier/api/v1/classifiers/ab2f65x344-nlc-639/classify?' + encodeQueryData(data),
  {
    method: 'GET',
    headers: myHeaders,
  });

  fetch(myRequest)
  .then(res => res.json())
  .catch(error => console.error('Error:', error))
  .then(response => console.log('Success:', response));

}

function encodeQueryData(data) {
   let ret = [];
   for (let d in data)
     ret.push(encodeURIComponent(d) + '=' + encodeURIComponent(data[d]));
   return ret.join('&');
}
