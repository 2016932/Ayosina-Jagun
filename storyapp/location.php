
<body onload="getLocation()">
    
    </body>
    
    <script>
    
    function getLocation() {
        navigator.geolocation.getCurrentPosition(function(position) { 
        let lat = position.coords.latitude;
        let long = position.coords.longitude;
        lat.innerText = lat.toFixed(2);
        long.innerText = long.toFixed(2);
            console.log(lat)
            console.log(long)
    
        let api_url = 'https://api.opencagedata.com/geocode/v1/json'
        let api_key = '763e87e056fd42c5ae7b7aad87d07a3b'
        let request_url = api_url
        + '?'
        + 'key=' + api_key
        + '&q=' + lat + ',' + long
        + '&pretty=1'
        + '&no_annotations=1';
        let url = request_url;
        console.log(url)
        fetch(url)
      .then(response => response.json())
      .then(data => {
       data = JSON.stringify(data)
        document.write(data)
      data.results[0].components.county
      data.results[0].components.country
      data.results[0].components.continent
      
      });
      })
      }
    
     
    </script>