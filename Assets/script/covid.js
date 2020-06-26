let total_case = document.getElementById('total_case');
let total_recovered = document.getElementById('total_recovered');
let total_death = document.getElementById('total_death');


fetch("https://coronavirus-monitor.p.rapidapi.com/coronavirus/latest_stat_by_country.php?country=thailand", {
	"method": "GET",
	"headers": {
		"x-rapidapi-host": "coronavirus-monitor.p.rapidapi.com",
		"x-rapidapi-key": "ed976b93b0msh6c3fc2dda245ac2p19e5f7jsn2b7dc99d2c0e"
	}
})
    .then(response => response.json().then(data => {
    	total_case.innerHTML = data.latest_stat_by_country[0].total_cases;
        total_recovered.innerHTML = data.latest_stat_by_country[0].total_recovered;
        total_death.innerHTML = data.latest_stat_by_country[0].total_deaths;

    }))
.catch(err => {
	console.log(err);
});