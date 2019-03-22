
@extends('main')

@section('title', '| Homepage')
@section('content')
	
	<div class="page-wrapper">
		
    {{--   <script>
         //training data set[length, width, color(0=blue and 1=red)]
         var dataB1 = [2,1,0];
         var dataB2 = [3,1,0];
         var dataB3 = [2,.5,0];
         var dataB4 = [1,1,0];

         var dataR1 = [3,1.5,1];
         var dataR2 = [3.5, .5, 1];
         var dataR3 = [4,1.5,1];
         var dataR4 = [5.5,1,1];

         //unknown type data that we want to know
         var dataU = [4.5, 1, "it should be one"];
         var all_points = [dataB1,dataB2,dataB3,dataB4,dataR1,dataR2,dataR3,dataR4];

         function sigmoid(x) {
            return 1/(1+Math.expo(-x));
         }

         //training
         function train(){
            let w1 = Math.random()*.2- .1;
            let w2 = Math.random()*.2- .1;
            let b = Math.random()*.2- .1;

            let learning_rate = 0.2;
            for(let iter = 0; iter < 50000; iter++){
               //pick a random point
               let random_idx = Math.floor(Math.random() * all_points.lenth);
               let point = all_points[random_idx];
               let target = point[2];//target stored in 3rd coord of points

               //feed forward
               let z = w1 * point[0] + w2 * point[1] + b;
               let pred = sigmoid(z);

               //now we compare the model prediction with the target
               let cost  = (pred - target) ** 2;

               //now we find the slope of the cost w.r.t each parameter (w1, w2, b)
               //bring derivative through square function
               let dcost_dpred = 2 * (pred - target);

               //bring derivative through sigmoid
               //derivative of sigmoid can be written through more ssigmoids! d/dz sigmoid(z) = sigmoid(z)*(1-sigmoid(z))

               let dpred_dz = sigmoid(z) * (1-sigmoid(z));

               //I think you forgot these in your slope calculation
               let dz_dw1 = point[0];
               let dz_dw2 = point[1];
               let dz_db = 1;

               let dcost_dw1 = dcost_dpred * dpred_dz * dz_dw1;
               let dcost_dw2 = dcost_dpred * dpred_dz * dz_dw2;
               let dcost_b = dcost_dpred * dpred_dz * dz_db;

               w1 -= learning_rate * dcost_dw1;
               w2 -= learning_rate * dcost_dw2;
               b -= learning_rate * dcost_db;

               let canvas = document.createElement("canvas");
               canvas.width = 400;
               canvas.height = 400;
               document.body.appendChild(canvas);
               let ctx = canvas.getContext("2d");
               ctx.font = "Helventica";

               let graph_size = {width: 7, height: 7};
               function to_screen(x, y) {
                  return {x: (x/graph_size.width)*canvas.width, y: -(y/graph_size.height)*canvas.height + canvas.height};
               }

               function to_graph(x, y) {
                  return {x: x/canvas.width*graph_size.width, y:graph_size.height - y/canvas.height*graph_size.height};
               }

               function draw_grid(){
                  ctx.strokeStyle = '#AAAAAA';
                  for (let j = 0; j <= graph_size.width; j++){

                     //x lines
                     ctx.beginPath();
                     let p = to_screen(j, 0);
                     ctx.moveTo(p.x, p.y);
                     p = to_screen(j, graph_size.height);
                     ctx.lineTo(p.x, p.y);
                     ctx.stroke();

                     //y lines
                     ctx.beginPath();
                     p = to_screen(0, j);
                     ctx.moveTo(p.x, p.y);
                     p = to_screen(graph_size.width, j);
                     ctx.lineTo(p.x, p.y);
                     ctx.stroke();
                  }
               }



            }
         }
         
      </script> --}}
		
	<div class="text-center center">
		<h3>Welcome To Grocery Shop</h3>
		<button id="shop" class="btn btn-success"> SHOP NOW!! </button>
	</div>
     </section>
   	<section class="middle">
   		<div class="container">
   		<div class="row">
   			<div class="col-md-3">
   				<div class="jumbotron img1">
   					<p>Fresh Tomatoes | Fresh from the gurden </p>
   				</div>
   			</div>
   			<div class="col-md-3">
   				<div class="jumbotron img2">
   					<p>Fresh Vegies | vegies are essential in your daily life</p>
   				</div>
   			</div>
   			<div class="col-md-3">
   				<div class="jumbotron img3">
   					<p>Sweet And Yummy Fruits | Fruits contain alot of vitamins</p>
   				</div>
   			</div>
   			<div class="col-md-3">
   				<div class="jumbotron img4">
   					<p>Live A healthy lifestyle | Shop At our grocery shop</p>
   				</div>
   			</div>
   		</div>
   	</div>
   	</section>

   	<section class="tip23">
   		<div class="container">	
   		
   		<h3 style="color: #000;" class="text-center">Tip OF The Day</h3>

   		<div class="row">
   			<div class="col-md-6">
   				<div style="color: #000;" class="jumbotron box">
   					<span class="cont">
   					<p>Some experts say that masticating juicers are best because they juice more efficiently and produce more juice. Instead of spinning like a centrifugal juicer, a masticating juicer grinds vegetables and fruits at low speeds to separate the juice from the fiber. Another benefit of using a masticating juicer is that they tend to be easier to clean than centrifugal juicers. Anything that reduces the amount of work it takes to follow a diet is a benefit. However, on the downside, masticating juicers tend to cost more than centrifugal juicers.</p>
   				</span>
   				</div>
   			</div>
   			<div class="col-md-6">
   				<div style="background-color: #fff;" class="jumbotron box">
   					<span class="cont" >
   					<img src=""  >
   					</span>
   				</div>
   			</div>
   		</div>
   	</div>
   	</section>

   	</div>
  
@endsection


{{----}}