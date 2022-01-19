<style scoped>
.chartbox{
    border: 1px solid #dadce0;
    padding: 10px;
    border-radius: 8px;
}
.chartbox2 {
  border: 1px solid #dadce0;
  padding: 10px 0px;
  border-radius: 8px;
}
.kb-mt-tp-2{
  margin-top: -20px;;
}
.kb-heatmapnew{
    font-size: 75px;
    font-weight: bold;
    text-align: center;
    position: relative;
    /* top: 75%; */
    /* left: 33%; */
}
.kb-heatmapnew span {
    font-size: 22px;
    color: #d8c898;
}

</style>
<template>
    <div id="kb-keaanalytics">
    <div class="container-fluid">
       <div class="row kb-mt-tp-2">
          <div class="col-md-12">
              <img src="/images/heatmap/analytics.jpg" class="img-fluid" alt="">
              <p class="kb-heatmapnew"><span>ALL NEW</span> ANALYTICS</p>
          </div>
      </div>
    </div>


    <div class="container-fluid mt-10">
        <div class="row">
            <div class="col-md-6">
                 <div  v-if="series[0].data.length" class="chartbox">
                   <p>WHICH COUNTRY GET THE MOST VIEWS?</p>
                    <apexchart type="line" height="350" :options="chartOptions" :series="series"></apexchart>
                </div>
            </div>
            <div class="col-md-6">
                <div   v-if="series2[0].data.length" class="chartbox">
                  <p>WHICH PAGES AND SCREENS GET THE MOST VIEWS?</p>
                  <apexchart type="bar" height="350" :options="chartOptions2" :series="series2"></apexchart>
              </div>
            </div>
            <div class="col-md-4 mt-4">
              <div  v-if="series3[0].data.length" class="chartbox">
                <p>WHICH CITY THE MOST VIEWS?</p>
                <apexchart type="radar" height="350" :options="chartOptions3" :series="series3"></apexchart>
              </div>
            </div>
            <div class="col-md-8 mt-4 row m-0">
              <div class="col-12 chartbox">
                  <p>WHICH COUNTRY THE USERS COMES FROM?</p>
                  <gmap-map :options="{ zoomControl: true, mapTypeControl: false, scaleControl: false, streetViewControl: false, rotateControl: false, fullscreenControl: false, disableDefaultUi: false}" :center="{lat:0, lng:0}" :zoom="1"  style="width: 100%; height: 90%">
                        <gmap-marker v-for="val in upcomingScheduleds" v-bind:key="val.id" :position="{lat:parseInt(val.latitude), lng:parseInt(val.longitude)}" :clickable="true" :draggable="false"/>
                  </gmap-map>
              </div>
            </div>
             <div class="col-md-4 mt-4">
                <div class="chartbox"  v-if="series4[0].data.length">
                  <p>WHICH BROWSER GET THE MOST VIEWS?</p>
                    <apexchart type="area" height="350" :options="chartOptions4" :series="series4"></apexchart>
                </div>
             </div>
             <div class="col-md-4 mt-4">
               <div class="chartbox"  v-if="series5[0].data.length">
                 <p>WHICH OPERATING SYSTEM GET THE MOST VIEWS?</p>
                <apexchart type="bar" height="350" :options="chartOptions5" :series="series5"></apexchart>
              </div>
             </div>
              <div class="col-md-4 mt-4">
                <div class="chartbox"  v-if="series6[0].data.length">
                      <p>WHICH DEVICE GET THE MOST VIEWS?</p>
                      <apexchart type="treemap" height="350" :options="chartOptions6" :series="series6"></apexchart>
                </div>
             </div>


        </div>
    </div>
   

    </div>
</template>

<script>
export default {
  data() {
      return {
        upcomingScheduleds:[],
           series: [
            {
              name: "User Count",
              data: []
            }
          ],
          chartOptions: {
            chart: {
              height: 350,
              type: 'line',
              dropShadow: {
                enabled: true,
                color: '#000',
                top: 18,
                left: 7,
                blur: 10,
                opacity: 0.2
              },
              toolbar: {
                show: false
              }
            },
            colors: ['#77B6EA', '#545454'],
            dataLabels: {
              enabled: true,
            },
            stroke: {
              curve: 'smooth'
            },
            title: {
              text: 'Users By Country',
              align: 'left'
            },
            grid: {
              borderColor: '#e7e7e7',
              row: {
                colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                opacity: 0.5
              },
            },
            markers: {
              size: 1
            },
            xaxis: {
              categories: [],
              title: {
                text: 'Country'
              }
            },
            yaxis: {
              title: {
                text: 'Users'
              },
              min: 1
            },
            legend: {
              position: 'top',
              horizontalAlign: 'right',
              floating: true,
              offsetY: -25,
              offsetX: -5
            }
          },
           series2: [{
            data: []
          }],
          chartOptions2: {
            chart: {
              type: 'bar',
              height: 350
            },
            plotOptions: {
              bar: {
                borderRadius: 4,
                horizontal: true,
              }
            },
            dataLabels: {
              enabled: false
            },
            xaxis: {
              categories: [],
            }
          },
          series3: [{
            name: 'Series 1',
            data: [],
          }],
          chartOptions3: {
            chart: {
              height: 350,
              type: 'radar',
            },
            title: {
              text: 'Users by cities'
            },
            xaxis: {
              categories: []
            }
          },
           series4: [{
            name: 'Views',
            data: []
          }],
          chartOptions4: {
            chart: {
              height: 350,
              type: 'bar',
            },
            plotOptions: {
              bar: {
                borderRadius: 10,
                dataLabels: {
                  position: 'top', // top, center, bottom
                },
              }
            },
            dataLabels: {
              enabled: true,
              formatter: function (val) {
                return val + "%";
              },
              offsetY: -20,
              style: {
                fontSize: '12px',
                colors: ["#304758"]
              }
            },
            
            xaxis: {
              categories: [],
              position: 'top',
              axisBorder: {
                show: false
              },
              axisTicks: {
                show: false
              },
              crosshairs: {
                fill: {
                  type: 'gradient',
                  gradient: {
                    colorFrom: '#D8E3F0',
                    colorTo: '#BED1E6',
                    stops: [0, 100],
                    opacityFrom: 0.4,
                    opacityTo: 0.5,
                  }
                }
              },
              tooltip: {
                enabled: true,
              }
            },
            yaxis: {
              axisBorder: {
                show: false
              },
              axisTicks: {
                show: false,
              },
              labels: {
                show: false,
                formatter: function (val) {
                  return val + "%";
                }
              }
            
            },
            title: {
              text: 'Users by browser',
              floating: true,
              offsetY: 330,
              align: 'center',
              style: {
                color: '#444'
              }
            }
          },
          series5: [{
            name: 'OS',
            data: []
          }],
          chartOptions5: {
            
            chart: {
              height: 350,
              type: 'bar',
            },
            plotOptions: {
              bar: {
                borderRadius: 10,
                columnWidth: '50%',
              }
            },
            dataLabels: {
              enabled: false
            },
            stroke: {
              width: 2
            },
            
            grid: {
              row: {
                colors: ['#fff', '#f2f2f2']
              }
            },
            xaxis: {
              labels: {
                rotate: -45
              },
              categories: [],
              tickPlacement: 'on'
            },
            yaxis: {
              title: {
                text: 'Views',
              },
            },
            fill: {
              type: 'gradient',
              gradient: {
                shade: 'light',
                type: "horizontal",
                shadeIntensity: 0.25,
                gradientToColors: undefined,
                inverseColors: true,
                opacityFrom: 0.85,
                opacityTo: 0.85,
                stops: [50, 0, 100]
              },
            }
          },
           series6: [
            {
              data: []
            }
          ],
          chartOptions6: {
            legend: {
              show: false
            },
            chart: {
              height: 350,
              type: 'treemap'
            },
            title: {
              text: 'User Device'
            }
          },

      }
  },created(){
        this.init();
    },
  methods: {
        init(){

            // Users by country
            axios.get('usersbycountry').then(response => {
                var userval = [];
                response.data.forEach(element => {
                    userval.push(element['location']);
                });
                
                var newuserval = this.find_duplicate_in_array(userval);

                 var newob1 = Object.keys(newuserval);
                var newitemindex1 = [];
                newob1.forEach(function(item, index){
                  if(index<8){
                    newitemindex1.push(item);
                  }
                });

                var newob2 = Object.values(newuserval);
                var newitemindex2 = [];
                newob2.forEach(function(item, index){
                  if(index<8){
                    newitemindex2.push(item);
                  }
                });

                this.chartOptions.xaxis.categories = newitemindex1;
                this.series[0].data = newitemindex2;

            }).catch(error => {
                console.log(error.response.data.error);
            });

            // Views by Page title
             axios.get('usersdoctitle').then(response2 => {
                var userval2 = [];
                response2.data.forEach(element2 => {
                    userval2.push(element2['doc_title']);
                });
                
                var newuserval2 = this.find_duplicate_in_array(userval2);

                var newob1 = Object.keys(newuserval2);
                var newitemindex1 = [];
                newob1.forEach(function(item, index){
                  if(index<8){
                    newitemindex1.push(item);
                  }
                });

                var newob2 = Object.values(newuserval2);
                var newitemindex2 = [];
                newob2.forEach(function(item, index){
                  if(index<8){
                    newitemindex2.push(item);
                  }
                });
  
                this.chartOptions2.xaxis.categories = newitemindex1;
                this.series2[0].data = newitemindex2;

            }).catch(error => {
                console.log(error.response.data.error);
            });

            //view by city
             axios.get('usersbycity').then(response3 => {
                var userval3 = [];
                response3.data.forEach(element3 => {
                    userval3.push(element3['city']);
                });
                
                var newuserval3 = this.find_duplicate_in_array(userval3);

                var newob1 = Object.keys(newuserval3);
                var newitemindex1 = [];
                newob1.forEach(function(item, index){
                  if(index<8){
                    newitemindex1.push(item);
                  }
                });

                var newob2 = Object.values(newuserval3);
                var newitemindex2 = [];
                newob2.forEach(function(item, index){
                  if(index<8){
                    newitemindex2.push(item);
                  }
                });
               
                this.chartOptions3.xaxis.categories = newitemindex1;
                this.series3[0].data = newitemindex2;

            }).catch(error => {
                console.log(error.response.data.error);
            });

            //view by latitude longtitude
             axios.get('latitudelongtitude').then(response4 => {
                  var userval4b = [];
                  response4.data.forEach(element4 => {
                    if(element4['latitude']!=null && element4['latitude']!=''){
                      var userval4a = {};
                      userval4a.latitude = element4['latitude'];
                      userval4a.longitude = element4['longitude'];
                      userval4b.push(userval4a);
                    }
                  });

                  var userval4c = [];
                  userval4b.forEach(function(item, index){

                  if(index<8){
                    userval4c.push(item);
                    }

                });

                  this.upcomingScheduleds = userval4c;

            }).catch(error => {
                  console.log(error.response.data.error);
            });

             //view by browser
            axios.get('userbrowser').then(response5 => {
                var userval5 = [];
                response5.data.forEach(element5 => {
                    userval5.push(element5['browser']);
                });
                
                var newuserval5 = this.find_duplicate_in_array(userval5);

                 var newob1 = Object.keys(newuserval5);
                var newitemindex1 = [];
                newob1.forEach(function(item, index){
                  if(index<8){
                    newitemindex1.push(item);
                  }
                });

                var newob2 = Object.values(newuserval5);
                var newitemindex2 = [];
                newob2.forEach(function(item, index){
                  if(index<8){
                    newitemindex2.push(item);
                  }
                });

                this.chartOptions4.xaxis.categories = newitemindex1;
                this.series4[0].data = newitemindex2;

            }).catch(error => {
                console.log(error.response.data.error);
            });

            //view by os
            axios.get('useros').then(response6 => {
                var userval6 = [];
                response6.data.forEach(element6 => {
                    userval6.push(element6['os']);
                });
                
                var newuserval6 = this.find_duplicate_in_array(userval6);

                 var newob1 = Object.keys(newuserval6);
                var newitemindex1 = [];
                newob1.forEach(function(item, index){
                  if(index<8){
                    newitemindex1.push(item);
                  }
                });

                var newob2 = Object.values(newuserval6);
                var newitemindex2 = [];
                newob2.forEach(function(item, index){
                  if(index<8){
                    newitemindex2.push(item);
                  }
                });

                this.chartOptions5.xaxis.categories = newitemindex1;
                this.series5[0].data = newitemindex2;

            }).catch(error => {
                console.log(error.response.data.error);
            });

            //view by devices
             axios.get('userdevice').then(response7 => {
                   var userval7 = [];
                response7.data.forEach(element7 => {
                    userval7.push(element7['device']);
                });
                
                var newuserval7 = this.find_duplicate_in_array(userval7);

                 var newob1 = Object.keys(newuserval7);
                var newitemindex1 = [];
                newob1.forEach(function(item, index){
                  if(index<8){
                    newitemindex1.push(item);
                  }
                });

                var newob2 = Object.values(newuserval7);
                var newitemindex2 = [];
                newob2.forEach(function(item, index){
                  if(index<8){
                    newitemindex2.push(item);
                  }
                });
                
                var makenewuser = [];

                  for(var ab=0; ab<newitemindex1.length; ab++){
                      var newobjlngth = {};
                      newobjlngth.x = newitemindex1[ab];
                      newobjlngth.y = newitemindex2[ab];
                      makenewuser.push(newobjlngth);
                  }

                this.series6[0].data = makenewuser;

            }).catch(error => {
                  console.log(error.response.data.error);
            });

        },
       find_duplicate_in_array(array){
            const count = {}

            array.forEach(item => {
                if (count[item]) {
                count[item] +=1
                return
                }
                count[item] = 1
            })

            // console.log(count)
            return count;

            }




  }
}
</script>