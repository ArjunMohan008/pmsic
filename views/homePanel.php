<?php
	require("../controllers/controller_employee.php");
?>

<div class="panel">
	<div class="row">
		<div class="col-md-6 col-sm-6 col-xs-6" style="background-color:#FFFFFF">
			<div id="divProduct" style="height:320px;"></div>
		</div>
		<div class="col-md-6 col-sm-6 col-xs-6" style="background-color:#FFFFFF">
			<div id="divCllctHrvst" style="height:320px;"></div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 col-sm-6 col-xs-6" style="background-color:#FFFFFF">
			<div id="mainbcd" style="height:250px;"></div>
		</div>
		<div class="col-md-6 col-sm-6 col-xs-6" style="background-color:#FFFFFF">
			<div id="divDiseases" style="height:350px;"></div>
		</div>

	</div>    
</div>


<script type="text/javascript">
  $(document).ready(function(){
        load_CulrivatedArea();
        load_CulrivatedArea2();
  });

  function load_CulrivatedArea() {
        $.get('controllers/chart_handler.php?type=product',function (data,status) {
        	if(status=="success")
        	{
        		var data=jQuery.parseJSON(data);
	            var echartBar = echarts.init(document.getElementById('divProduct'), 'minimal');
	            var arr_name=[];
	            var arr_quantity=[];
	            var arr_reorderLevel=[];

	            for (var j = 0; j < data.length; j++) {
	            	arr_name[j] = data[j].pname;
	            	arr_quantity[j] = data[j].quantity;
	            	arr_reorderLevel[j]=data[j].reorderLevel;
	            }

	            echartBar.setOption({
	            	title : {
	            		text: 'Products',
	            		subtext: 'Amount'
	            	},
	            	tooltip : {
	            		trigger: 'axis'
	            	},
	            	legend: {
	            		data:['Stock Level','Reorder Level']
	            	},
	            	toolbox: {
	            		show : true,
	            		feature : {
	            			dataView : {show: true, readOnly: false},
	            			magicType : {show: true, type: ['line', 'bar']},
	            			restore : {show: true},
	            			saveAsImage : {show: true}
	            		}
	            	},
	            	calculable : true,
	            	xAxis : [
	            	{
	            		type : 'category',
	            		data : arr_name
	            	}
	            	],
	            	yAxis : [
	            	{
	            		type : 'value'
	            	}
	            	],
	            	series : [
	            	{
	            		name:'Stock Level',
	            		type:'bar',
	            		data:arr_quantity,
	            	},
	            	{
	            		name:'Reorder Quantity',
	            		type:'bar',
	            		data:arr_reorderLevel,
	            	}
	            	]
	            });
        	} //end if
            
        });// end get
    }



  function load_CulrivatedArea2() {
        $.get('controllers/chart_handler.php?type=product',function (data,status) {
        	if(status=="success")
        	{
        		var data=jQuery.parseJSON(data);
	            var echartBar = echarts.init(document.getElementById('divCllctHrvst'), 'minimal');
	            var arr_name=[];
	            var arr_quantity=[];
	            var arr_reorderLevel=[];

	            for (var j = 0; j < data.length; j++) {
	            	arr_name[j] = data[j].pname;
	            	arr_quantity[j] = data[j].quantity;
	            	arr_reorderLevel[j]=data[j].reorderLevel;
	            }

	            echartBar.setOption({
	            	title : {
	            		text: 'Income',
	            		subtext: 'LKR'
	            	},
	            	tooltip : {
	            		trigger: 'axis'
	            	},
	            	legend: {
	            		data:['Income']
	            	},
	            	toolbox: {
	            		show : true,
	            		feature : {
	            			dataView : {show: true, readOnly: false},
	            			magicType : {show: true, type: ['line', 'bar']},
	            			restore : {show: true},
	            			saveAsImage : {show: true}
	            		}
	            	},
	            	calculable : true,
	            	xAxis : [
	            	{
	            		type : 'category',
	            		data : arr_name
	            	}
	            	],
	            	yAxis : [
	            	{
	            		type : 'value'
	            	}
	            	],
	            	series : [
	            	{
	            		name:'Income',
	            		type:'bar',
	            		data:arr_quantity,
	            	},
	            	]
	            });
        	} //end if
            
        });// end get
    }

</script>


