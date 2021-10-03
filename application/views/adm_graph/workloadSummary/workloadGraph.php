<script type="text/javascript">

// load nodes
var data_nodes = <?php echo json_encode($graphNodes); ?>;

// load links
var data_links = <?php echo json_encode($graphLinks); ?>;

var graph = {};
graph['nodes'] = data_nodes;
graph['links'] = data_links;

// // console.log(graph);
            
/* Draw Graph */
var width  = window.innerWidth-(window.innerWidth/10),
    height = window.innerHeight-100;

var svg = d3.select("#network").append("svg")
            .attr("width", width)
            .attr("height", height)
            .call(d3.zoom().scaleExtent([1 / 2, 8]).on("zoom", zoomed))
           .append("g")
            .attr("transform", "translate(40,0)");

    
function zoomed() {
    svg.attr("transform", d3.event.transform);
}

var color = {"Underload": "#e67e00", 
             "Balanced": "#008900",
             "Overload": "#d61f1f"};

var simulation = d3.forceSimulation()
    .force("link", d3.forceLink().id(function(d) { return d.id; }).distance(80))
    .force("charge", d3.forceManyBody())
    .force("center", d3.forceCenter(width / 2.5, height / 2.2))
    .force("forceX", d3.forceX(0).strength(0.015) )
    .force("forceY", d3.forceY(0).strength(0.015) );

var link = svg.append("g")
    .attr("class", "links")
    .selectAll("line")
    .data(graph.links)
    .enter().append("line")
    .attr("stroke-width", 2)
    .style("stroke", "grey");

//	console.log(graph.links);
//	console.log(graph.nodes);

var node = svg.append("g")
    .attr("class", "nodes")
    .selectAll("g")
    .data(graph.nodes)
    .enter().append("g")
  
var circles = node.append("circle")
    .attr("r", function(d) { 
          if(d.group == "Member"){
              return 5;
          }else{
              return 12;
          }
    })
    .attr("fill", function(d) { 
          return color[d.occupancy_status];
    })
    .on("mouseover", handleMouseOver)
    .on("mouseout", handleMouseOut)
    .call(d3.drag()
        .on("start", dragstarted)
        .on("drag", dragged)
        .on("end", dragended));

var lables = node.append("text")
    .text(function(d) {
      return d.id.concat(' (',d.occupancy_rate,'%',')');
    })
    .style("font-size", function(d) {
        if(d.group == "Member"){
              return "8px";
          }else{
              return "14px";
          }
    })
    .style('fill', function(d) {
        return color[d.occupancy_status];
    })
    .attr('x', 15)
    .attr('y', 3);

simulation
    .nodes(graph.nodes)
    .on("tick", ticked);

simulation.force("link")
    .links(graph.links);

function ticked() {
  link
      .attr("x1", function(d) { return d.source.x; })
      .attr("y1", function(d) { return d.source.y; })
      .attr("x2", function(d) { return d.target.x; })
      .attr("y2", function(d) { return d.target.y; });

  node
      .attr("transform", function(d) {
        return "translate(" + d.x + "," + d.y + ")";
      })
}

function handleMouseOver(d, i) {
    var node_id = d.id;
    var hover_color = color[d.occupancy_status];
    
    /* Handle Nodes */
    var all_lines = d3.selectAll("line").data();
    var all_nodes = [node_id];
    for (i in all_lines){
        if(all_lines[i]["source"]["id"] == node_id){
            all_nodes.push(all_lines[i]["target"]["id"]);
        }else if(all_lines[i]["target"]["id"] == node_id){
            all_nodes.push(all_lines[i]["source"]["id"]);
        }
    }
    
    d3.selectAll("circle").attr("r", function(d){
                                if(all_nodes.includes(d.id)){
                                    if(d.group == "Member"){
                                        return 10;
                                    }else{
                                        return 17;
                                    }
                                }else{
                                    if(d.group == "Member"){
                                        return 2;
                                    }else{
                                        return 2;
                                    }
                                }
                                    
                                 });
       
    /* Handle Links */
    d3.selectAll("line").attr("stroke-width", function(k){
                            if(k["source"]["id"] == node_id || k["target"]["id"] == node_id){
                                return 10
                            }
                         })
                        .style("stroke", function(k){
                            if(k["source"]["id"] == node_id || k["target"]["id"] == node_id){
                                return hover_color;
                            }else{
                                return "grey";
                            }
                         });
                         
    /* Handle Labels */
    d3.selectAll("text").style("font-size", function(d) {
                            if(all_nodes.includes(d.id)){
                                    if( d.id == node_id){
                                        return "20px";
                                    }else{
                                        return "14px";
                                    }
                                }else{
                                    if(d.group == "Member"){
                                        return "2px";
                                    }else{
                                        return "2px";
                                    }
                                }	
                        });		
}

function handleMouseOut(d, i) {
    /* Handle Nodes */
    d3.selectAll("circle").attr("fill", function(d){
                                return color[d.occupancy_status];
                           })
                             .attr("r", function(d){
                                    if(d.group == "Member"){
                                            return 5;
                                      }else{
                                          return 12;
                                      }
                                 });
    
    /* Handle Links */
    d3.selectAll("line").attr("stroke-width", 2)
                        .style("stroke", "grey");
    
    /* Handle Labels */		
    d3.selectAll("text").style("font-size", function(d) {
                            if(d.group == "Member"){
                                return "8px";
                            }else{
                                return "14px";
                            }
                        });
}

function dragstarted(d) {
  if (!d3.event.active) simulation.alphaTarget(0.3).restart();
  d.fx = d.x;
  d.fy = d.y;
};

function dragged(d) {
  d.fx = d3.event.x;
  d.fy = d3.event.y;
};

function dragended(d) {
  if (!d3.event.active) simulation.alphaTarget(0);
  d.fx = null;
  d.fy = null;
}
/* End: Draw Graph */
</script>