// import ApexCharts from 'apexcharts'

$(function(e) {

	/* Chartjs (#revenue) */
	var myCanvas = document.getElementById("revenue");
	myCanvas.height="225";

	var myCanvasContext = myCanvas.getContext("2d");
	var gradientStroke1 = myCanvasContext.createLinearGradient(0, 0, 0, 380);
	gradientStroke1.addColorStop(0, '#d43f8d');
	gradientStroke1.addColorStop(1, '#d43f8d');

	var gradientStroke2 = myCanvasContext.createLinearGradient(0, 0, 0, 300);
	gradientStroke2.addColorStop(0, '#0774f8');
	gradientStroke2.addColorStop(1, '#0774f8');

	var myChart = new Chart(myCanvas, {
		type: 'bar',
		data: {
			labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "July", "Aug", "Sep", "Oct", "Nov", "Dec"],
			datasets: [{
				label: 'Admited Student',
				data: [jan, feb, mar, apr, may, jun, july, aug, sep, oct, nov, dec],
							backgroundColor: gradientStroke1,
							hoverBackgroundColor: gradientStroke1,
							hoverBorderWidth: 2,
							hoverBorderColor: 'gradientStroke1',
							barPercentage: 0.5,
			}, {

			    label: 'Register Student',
				data: [reg_jan, reg_feb, reg_mar, reg_apr, reg_may, reg_jun, reg_july, reg_aug, reg_sep, reg_oct, reg_nov, reg_dec],
							backgroundColor: gradientStroke2,
							hoverBackgroundColor: gradientStroke2,
							hoverBorderWidth: 2,
							hoverBorderColor: 'gradientStroke2',
							barPercentage: 0.5,

			}
		  ]
		},
		options: {
			responsive: true,
			maintainAspectRatio: false,
			tooltips: {
				mode: 'index',
				titleFontSize: 12,
				titleFontColor: '#000',
				bodyFontColor: '#000',
				backgroundColor: '#fff',
				cornerRadius: 3,
				intersect: false,
			},

            scales: {
                x: {
                    ticks: {
                        color: "#9ba6b5",
                    },
                    display: true,
                    grid: {
                        color: 'rgba(119, 119, 142, 0.2)'
                    }
                },
                y: {
                    ticks: {
                        color: "#9ba6b5",
                    },
                    display: true,
                    grid: {
                        color: 'rgba(119, 119, 142, 0.2)'
                    },
                    scaleLabel: {
                        display: false,
                        labelString: 'Thousands',
                        fontColor: 'rgba(119, 119, 142, 0.2)'
                    }
                }
            },
        	plugins: {
				legend: {
					display: false,
				}
			},

			title: {
				display: false,
				text: 'Normal Legend'
			}
		}
	});
	/* Chartjs (#revenue) closed */

});

    /* start donut chart */
    var options13 = {
        series: [male, female, others],
        labels: ['Male', 'Others', 'Female'],
        chart: {
            type: 'donut',
            height: 350
        },
        legend: {
            position: 'bottom'
        },
        stroke: {
            show: true,
            curve: 'smooth',
            lineCap: 'butt',
            colors: 'transparent',
            width: 2,
            dashArray: 0,
        },

        colors: ["#089e60", "#1396cc", "#ff9933"],
        dropShadow: {
            enabled: false,
        },
        dataLabels: {
            size: 0,
            dropShadow: {
                enabled: false,
            }
        },
        plotOptions: {
            pie: {
                size: 50
            }
        }
    };
    var chart13 = new ApexCharts(document.querySelector("#Order-Status"), options13);
    chart13.render();
    /* end donut chart */
