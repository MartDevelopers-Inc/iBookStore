<?php
    /*
        Logic
        1. Get all kindergern books
        2. Get all Primary school books
        3. Get all secondary school books
        4. Get all tertiary books
        5. Get all magazines
        6. Get all Novels
        7. Get others

    */
    //1. Get all kindergern books
    $query ="SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Kindergarten Books' ";
    $stmt = $mysqli->prepare($query);
    $stmt ->execute();
    $stmt->bind_result($Kindergarten);
    $stmt->fetch();
    $stmt->close();

    //2. Get all Primary school books
    $query ="SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Primary School Books' ";
    $stmt = $mysqli->prepare($query);
    $stmt ->execute();
    $stmt->bind_result($Primary_School);
    $stmt->fetch();
    $stmt->close();

    //3.  Get all secondary school books
    $query ="SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Secondary School Books' ";
    $stmt = $mysqli->prepare($query);
    $stmt ->execute();
    $stmt->bind_result($Secondary_School);
    $stmt->fetch();
    $stmt->close();

    //4.  Get all tertiary books
    $query ="SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Tertiary Books' ";
    $stmt = $mysqli->prepare($query);
    $stmt ->execute();
    $stmt->bind_result($Tertiary);
    $stmt->fetch();
    $stmt->close();

    //5.  Get all Novels books
    $query ="SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Novels' ";
    $stmt = $mysqli->prepare($query);
    $stmt ->execute();
    $stmt->bind_result($Novels);
    $stmt->fetch();
    $stmt->close();

    //6.  Get all Magazines
    $query ="SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Magazines' ";
    $stmt = $mysqli->prepare($query);
    $stmt ->execute();
    $stmt->bind_result($Magazines);
    $stmt->fetch();
    $stmt->close();

    //7.  Get all Others
    $query ="SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Others' ";
    $stmt = $mysqli->prepare($query);
    $stmt ->execute();
    $stmt->bind_result($Others);
    $stmt->fetch();
    $stmt->close();
?>
<script>
   try {

            var d_1options1 = {
            chart: {
                height: 350,
                type: 'bar',
                toolbar: {
                    show: false,
                },
                dropShadow: {
                    enabled: true,
                    top: 1,
                    left: 1,
                    blur: 2,
                    color: '#acb0c3',
                    opacity: 0.7,
                }
            },
            colors: ['#5c1ac3', '#ffbb44'],
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    endingShape: 'rounded'  
                },
            },
            dataLabels: {
                enabled: false
            },
            legend: {
                    position: 'bottom',
                    horizontalAlign: 'center',
                    fontSize: '14px',
                    markers: {
                    width: 10,
                    height: 10,
                    },
                    itemMargin: {
                    horizontal: 0,
                    vertical: 8
                    }
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            series: [{
                name: 'Sales',
                data: [<?php echo $Kindergarten;?>, <?php echo $Primary_School;?>, <?php echo $Secondary_School;?>, <?php echo $Tertiary;?>, <?php echo $Novels;?>, <?php echo $Magazines;?>, <?php echo $Others;?>]
            }            
            ],
            xaxis: {
                categories: ['Kindergarten', 'Primary School', 'Secondary School', 'Tertiary', 'Novels', 'Magazines', 'Others'],
            },
            fill: {
                type: 'gradient',
                gradient: {
                shade: 'light',
                type: 'vertical',
                shadeIntensity: 0.3,
                inverseColors: false,
                opacityFrom: 1,
                opacityTo: 0.8,
                stops: [0, 100]
                }
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                        return val
                    }
                }
            }
            }

            var d_1C_3 = new ApexCharts(
                document.querySelector("#salesPerBookCategory"),
                d_1options1
            );
            d_1C_3.render();


            const ps = new PerfectScrollbar(document.querySelector('.mt-container'));


            } catch(e) {
            // statements
            console.log(e);
            }

</script>