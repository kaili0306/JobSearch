<!Doctype html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../style/stylesheet.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
</body>
<?php include('searchbar.php')?>

<script>
    
    var search = location.search
    var newsearch = search.split('=');
    var pos =newsearch[1].includes("+")
    var newcity = newsearch[1].split('+')
    var name = ""
       if(pos){
            for(var i = 0;i<newcity.length;i++)
            name += newcity[i] + " "
        }else
            name =newsearch[1]

var url = 'http://localhost/php_rest_jobSearch/api/city/read_single.php?name='+ name
fetch(url).then(response => {
    return response.json();
}).then(data => {
    if(data.message)
    document.getElementById('title').innerHTML = name + data.message + " Please enter a valid city name"
    else
    getJobs(data.id)
    
}).catch(err => {
    console.log(err)
})

function getJobs (id){
    var url = 'http://localhost/php_rest_jobSearch/api/job/read_city.php?city_id='+ id
    fetch(url).then(response=>{
        return response.json();
    }).then(data=>{
        if(data.message){
            document.getElementById('title').innerHTML = data.message+" in "+name
        }else{
            document.getElementById('title').innerHTML = data.data.length+" Jobs found in "+name
            
            data.data.forEach(job=>{
                const div = document.createElement('div')
                div.setAttribute('id','jobContainer')

                const a = document.createElement('a')
                a.setAttribute('href',job.link)

                const linkP = document.createElement('p')
                linkP.setAttribute('id','applyBtn')
                linkP.innerHTML = "Apply Now"

                const h4 = document.createElement('h4')
                h4.setAttribute('id','jobtitle')
                h4.textContent = job.title

                const p = document.createElement('p')
                p.setAttribute('id','companyName')
                p.textContent = job.companyName

                div.appendChild(h4)
                div.appendChild(p)
                div.appendChild(a)
                a.appendChild(linkP)
                document.getElementById('search-result').appendChild(div);
            })
       } }).catch(err => {
    console.log(err)
})

    }
</script>

<h3 id= "title"></h3>
<div id=search-result></div>


</body>
</html>