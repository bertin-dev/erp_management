/*global $, document, LINECHARTEXMPLE*/
$(document).ready(function () {
    'use strict';

    let dataPie = [];
    let dataUserLine = [];

    var token = $('#statistiqueDashboard').attr('token');

    $.ajax({
        url: 'https://webservice.domaineteste.space.smopaye.fr/public/api/statistique/count',
        method: 'GET',
        beforeSend: function (xhr) {
            xhr.setRequestHeader('Authorization', token);
        },
        success: function (response) {  
            var lineChartExample = loadlineChart(response.data.userArr, response.data.accepteurArr, response.data.agentArr);
            var barChartExample = loadbarChart(response.data.momoArr,response.data.omArr);
            var barChartExample1 = loadbarChart1(response.data.momorArr,response.data.omrArr);
            var pieChartExample = loadpiechart(response.data.nbreQrcode,response.data.nbreDebits,response.data.nbreFacture);
            var radarChartExample = loadradarchar(response.data.compte, response.data.carte, response.data.unitedepot, response.data.depotunite);
         },

        error: function (error) { 

                console.error(error);

            }

    });

    var brandPrimary = 'rgba(51, 179, 90, 1)';

    var LINECHARTEXMPLE   = $('#lineChartExample'),
        PIECHARTEXMPLE    = $('#pieChartExample'),
        BARCHARTEXMPLE    = $('#barChartExample'),
        BARCHARTEXMPLE1    = $('#barChartExample1'),
        RADARCHARTEXMPLE  = $('#radarChartExample'),
        POLARCHARTEXMPLE  = $('#polarChartExample');

    function loadlineChart(user, accepteur, agent){
        return new Chart(LINECHARTEXMPLE, {
            type: 'line',
            data: {
                labels: ["January", "February", "March", "April", "May", "June", "July","August","September","October","November","December"],
                datasets: [
                    {
                        label: "Utilisateurs",
                        fill: true,
                        lineTension: 0.3,
                        backgroundColor: "rgba(51, 179, 90, 0.38)",
                        borderColor: brandPrimary,
                        borderCapStyle: 'butt',
                        borderDash: [],
                        borderDashOffset: 0.0,
                        borderJoinStyle: 'miter',
                        borderWidth: 1,
                        pointBorderColor: brandPrimary,
                        pointBackgroundColor: "#fff",
                        pointBorderWidth: 1,
                        pointHoverRadius: 5,
                        pointHoverBackgroundColor: brandPrimary,
                        pointHoverBorderColor: "rgba(220,220,220,1)",
                        pointHoverBorderWidth: 2,
                        pointRadius: 1,
                        pointHitRadius: 10,
                        data: user,
                        spanGaps: false
                    },
                    {
                        label: "Accepteurs",
                        fill: true,
                        lineTension: 0.3,
                        backgroundColor: "rgba(51, 179, 90, 0.38)",
                        borderColor: brandPrimary,
                        borderCapStyle: 'butt',
                        borderDash: [],
                        borderDashOffset: 0.0,
                        borderJoinStyle: 'miter',
                        borderWidth: 1,
                        pointBorderColor: brandPrimary,
                        pointBackgroundColor: "#fff",
                        pointBorderWidth: 1,
                        pointHoverRadius: 5,
                        pointHoverBackgroundColor: brandPrimary,
                        pointHoverBorderColor: "rgba(220,220,220,1)",
                        pointHoverBorderWidth: 2,
                        pointRadius: 1,
                        pointHitRadius: 10,
                        data: accepteur,
                        spanGaps: false
                    },
                    {
                        label: "Agents",
                        fill: true,
                        lineTension: 0.3,
                        backgroundColor: "rgba(75,192,192,0.4)",
                        borderColor: "rgba(75,192,192,1)",
                        borderCapStyle: 'butt',
                        borderDash: [],
                        borderDashOffset: 0.0,
                        borderJoinStyle: 'miter',
                        borderWidth: 1,
                        pointBorderColor: "rgba(75,192,192,1)",
                        pointBackgroundColor: "#fff",
                        pointBorderWidth: 1,
                        pointHoverRadius: 5,
                        pointHoverBackgroundColor: "rgba(75,192,192,1)",
                        pointHoverBorderColor: "rgba(220,220,220,1)",
                        pointHoverBorderWidth: 2,
                        pointRadius: 1,
                        pointHitRadius: 10,
                        data: agent,
                        spanGaps: false
                    }
                ]
            }
        });
    } 

    function loadpiechart(qrcode, debit, facture){
        return new Chart(PIECHARTEXMPLE, {
            type: 'doughnut',
            data: {
                labels: [
                    "Debits",
                    "QR-CODE",
                    "Payement-Facture"
                ],
                datasets: [
                    {
                        data: [debit, qrcode, facture],
                        borderWidth: [1, 1, 1],
                        backgroundColor: [
                            brandPrimary,
                            "rgba(75,192,192,1)",
                            "#FFCE56"
                        ],
                        hoverBackgroundColor: [
                            brandPrimary,
                            "rgba(75,192,192,1)",
                            "#FFCE56"
                        ]
                    }]
                }
        });
    }

    var pieChartExample = {
        responsive: true
    };

    function loadbarChart(mtn, om){
        return new Chart(BARCHARTEXMPLE, {
            type: 'bar',
            data: {
                labels: ["January", "February", "March", "April", "May", "June", "July","August","September","October","November","December"],
                datasets: [
                    {
                        label: "Recharges OM",
                        backgroundColor: [
                            'rgba(51, 179, 90, 0.6)',
                            'rgba(51, 179, 90, 0.6)',
                            'rgba(51, 179, 90, 0.6)',
                            'rgba(51, 179, 90, 0.6)',
                            'rgba(51, 179, 90, 0.6)',
                            'rgba(51, 179, 90, 0.6)',
                            'rgba(51, 179, 90, 0.6)'
                        ],
                        borderColor: [
                            'rgba(51, 179, 90, 1)',
                            'rgba(51, 179, 90, 1)',
                            'rgba(51, 179, 90, 1)',
                            'rgba(51, 179, 90, 1)',
                            'rgba(51, 179, 90, 1)',
                            'rgba(51, 179, 90, 1)',
                            'rgba(51, 179, 90, 1)'
                        ],
                        borderWidth: 1,
                        data: om,
                    },
                    {
                        label: "Recharge MTN",
                        backgroundColor: [
                            'rgba(203, 203, 203, 0.6)',
                            'rgba(203, 203, 203, 0.6)',
                            'rgba(203, 203, 203, 0.6)',
                            'rgba(203, 203, 203, 0.6)',
                            'rgba(203, 203, 203, 0.6)',
                            'rgba(203, 203, 203, 0.6)',
                            'rgba(203, 203, 203, 0.6)'
                        ],
                        borderColor: [
                            'rgba(203, 203, 203, 1)',
                            'rgba(203, 203, 203, 1)',
                            'rgba(203, 203, 203, 1)',
                            'rgba(203, 203, 203, 1)',
                            'rgba(203, 203, 203, 1)',
                            'rgba(203, 203, 203, 1)',
                            'rgba(203, 203, 203, 1)'
                        ],
                        borderWidth: 1,
                        data: mtn,
                    }
                ]
            }
        });
    }


    function loadbarChart1(mtn, om){
        console.log(mtn, om);
        return new Chart(BARCHARTEXMPLE1, {
            type: 'bar',
            data: {
                labels: ["January", "February", "March", "April", "May", "June", "July","August","September","October","November","December"],
                datasets: [
                    {
                        label: "Retrait OM",
                        backgroundColor: [
                            'rgba(51, 179, 90, 0.6)',
                            'rgba(51, 179, 90, 0.6)',
                            'rgba(51, 179, 90, 0.6)',
                            'rgba(51, 179, 90, 0.6)',
                            'rgba(51, 179, 90, 0.6)',
                            'rgba(51, 179, 90, 0.6)',
                            'rgba(51, 179, 90, 0.6)'
                        ],
                        borderColor: [
                            'rgba(51, 179, 90, 1)',
                            'rgba(51, 179, 90, 1)',
                            'rgba(51, 179, 90, 1)',
                            'rgba(51, 179, 90, 1)',
                            'rgba(51, 179, 90, 1)',
                            'rgba(51, 179, 90, 1)',
                            'rgba(51, 179, 90, 1)'
                        ],
                        borderWidth: 1,
                        data: om,
                    },
                    {
                        label: "Retraits MTN",
                        backgroundColor: [
                            'rgba(203, 203, 203, 0.6)',
                            'rgba(203, 203, 203, 0.6)',
                            'rgba(203, 203, 203, 0.6)',
                            'rgba(203, 203, 203, 0.6)',
                            'rgba(203, 203, 203, 0.6)',
                            'rgba(203, 203, 203, 0.6)',
                            'rgba(203, 203, 203, 0.6)'
                        ],
                        borderColor: [
                            'rgba(203, 203, 203, 1)',
                            'rgba(203, 203, 203, 1)',
                            'rgba(203, 203, 203, 1)',
                            'rgba(203, 203, 203, 1)',
                            'rgba(203, 203, 203, 1)',
                            'rgba(203, 203, 203, 1)',
                            'rgba(203, 203, 203, 1)'
                        ],
                        borderWidth: 1,
                        data: mtn,
                    }
                ]
            }
        });
    } 
    
    var polarChartExample = new Chart(POLARCHARTEXMPLE, {
        type: 'polarArea',
        data: {
            datasets: [{
                data: [
                    11,
                    16,
                    7
                ],
                backgroundColor: [
                    "rgba(51, 179, 90, 1)",
                    "#FF6384",
                    "#FFCE56"
                ],
                label: 'My dataset' // for legend
            }],
            labels: [
                "First",
                "Second",
                "Third"
            ]
        }
    });

    var polarChartExample = {
        responsive: true
    };

    function loadradarchar(compte, carte, unitedepot, depotunite){
        return new Chart(RADARCHARTEXMPLE, {
            type: 'radar',
            data: {
                labels: ["Eating", "Drinking", "Sleeping", "Designing", "Coding", "Cycling"],
                datasets: [
                    {
                        label: "Transferts compte a compte",
                        label: "Transferts compte a compte",
                        backgroundColor: "rgba(179,181,198,0.2)",
                        borderWidth: 2,
                        borderColor: "rgba(179,181,198,1)",
                        pointBackgroundColor: "rgba(179,181,198,1)",
                        pointBorderColor: "#fff",
                        pointHoverBackgroundColor: "#fff",
                        pointHoverBorderColor: "rgba(179,181,198,1)",
                        data: compte
                    },
                    {
                        label: "Transfert carte a carte ",
                        backgroundColor: "rgba(51, 179, 90, 0.2)",
                        borderWidth: 2,
                        borderColor: "rgba(51, 179, 90, 1)",
                        pointBackgroundColor: "rgba(51, 179, 90, 1)",
                        pointBorderColor: "#fff",
                        pointHoverBackgroundColor: "#fff",
                        pointHoverBorderColor: "rgba(51, 179, 90, 1)",
                        data: carte
                    },
                    {
                        label: "transfert depot-unite",
                        backgroundColor: "rgba(0, 0, 255, 0.5)",
                        borderWidth: 2,
                        borderColor: "rgbargba(0, 0, 255, 0.5)",
                        pointBackgroundColor: "rgba(0, 0, 255, 0.5)",
                        pointBorderColor: "#fff",
                        pointHoverBackgroundColor: "#fff",
                        pointHoverBorderColor: "rgbargba(0, 0, 255, 0.5)",
                        data: depotunite
                    },
                    {
                        label: "transfert unite-depot",
                        backgroundColor: "rgba(0, 0, 255, 0.5)",
                        borderWidth: 2,
                        borderColor: "rgbargba(0, 0, 255, 0.5)",
                        pointBackgroundColor: "rgba(0, 0, 255, 0.5)",
                        pointBorderColor: "#fff",
                        pointHoverBackgroundColor: "#fff",
                        pointHoverBorderColor: "rgbargba(0, 0, 255, 0.5)",
                        data: unitedepot
                    }
    
                ]
            }
        });
        var radarChartExample = {
            responsive: true
        };
    }



});
