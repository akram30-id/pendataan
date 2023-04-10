// import 'https://code.jquery.com/jquery-3.6.4.min.js'

console.info('Dashboard JS Loaded')

// get data warga with ajax
const dataWarga = function () {
    $.ajax({
        type: 'GET',
        url: 'http://localhost/pendataan/pages/dasbor/rest.php',
        dataType: 'json',
        success: function (response) {
            console.info(response)
            genderChart(response.by_gender)
            ageChart(response.by_age)
        }
    })
}

dataWarga()

const ctx = document.getElementById('genderChart');
const ctx2 = document.getElementById('ageChart');

const genderChart = function (data) {
    return new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Laki-Laki', 'Perempuan'],
            datasets: [{
                data: data,
                borderWidth: 1,
                hoverOffset: 4
            }]
        }
    });
}

const ageChart = function (data) {
    return new Chart(ctx2, {
        type: 'pie',
        data: {
            labels: ['Warga Diatas 17 Tahun ', 'Warga Dibawah 17 Tahun'],
            datasets: [{
                data: data,
                borderWidth: 1,
                hoverOffset: 4,
                backgroundColor: [
                    'rgb(18, 138, 0)',
                    'rgb(189, 27, 2)',
                ]
            }]
        }
    });
}