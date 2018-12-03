<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=7,IE=9" />
        <!--The viewport meta tag is used to improve the presentation and behavior of the samples
        on iOS devices-->
        <link rel="shortcut icon" href="images/icons/favicon.ico">
        <link rel="stylesheet" type="text/css" href="public/css/eddm_ws.css">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1,user-scalable=no"/>
        <title>EDDM Webservice Sample</title>
        <link rel="stylesheet" type="text/css" href="http://serverapi.arcgisonline.com/jsapi/arcgis/2.5/js/dojo/dijit/themes/claro/claro.css">
        <link rel="stylesheet" type="text/css" href="http://serverapi.arcgisonline.com/jsapi/arcgis/2.6/js/dojo/dojox/grid/resources/Grid.css">
        <link rel="stylesheet" type="text/css" href="http://serverapi.arcgisonline.com/jsapi/arcgis/2.6/js/dojo/dojox/grid/resources/claroGrid.css">
        <script type="text/javascript">
            djConfig = {
                parseOnLoad: true
            };
        </script>
        <script type="text/javascript" src="http://serverapi.arcgisonline.com/jsapi/arcgis/?v=2.6">
        </script>
        <!-- <script type="text/javascript" src="assets/geoprocessing.js">
        </script>
        <script type="text/javascript" src="assets/form.js"> -->
        <!-- </script> -->
        <script type="text/javascript">
            dojo.require("esri.tasks.gp");
            dojo.require("esri.map");
            dojo.require("esri.layers.agstiled");
            dojo.require("esri.toolbars.draw");
            dojo.require("dijit.layout.BorderContainer");
            dojo.require("dijit.layout.ContentPane");
            // for datagrid
            dojo.require("dojox.grid.DataGrid");
            dojo.require("dojo.data.ItemFileReadStore");
            
            var selectedSymbol = new esri.symbol.SimpleLineSymbol(esri.symbol.SimpleLineSymbol.STYLE_SOLID, new dojo.Color([255, 0, 0, 0.5]), 5);
            var originalSymbol;
            var extent = new esri.geometry.Extent();
            var map, gp, tb, results, renderer;
            var items = [];
            var crids = [];
            var zipcrids = [];
            //   *****************   Initialize   *****************/
            function init(){
                var initExtent = new esri.geometry.Extent({
                    "xmin": -9992006.03337272,
                    "ymin": 4162804.849412807,
                    "xmax": -9974253.533553513,
                    "ymax": 4176334.203419265,
                    "spatialReference": {
                        "wkid": 102100
                    }
                });
                //create map
                map = new esri.Map("map", {
                    extent: initExtent,
                    lods: lods
                });
                
                dojo.connect(map, "onLoad", initMap);
                // Load tile map from ArcGIS 
                var streetMap = new esri.layers.ArcGISTiledMapServiceLayer("http://server.arcgisonline.com/ArcGIS/rest/services/World_Street_Map/MapServer");
                
                map.addLayer(streetMap);
                
                initGP();
                
                dojo.connect(grid, "onRowClick", onRowClickHandler);
            }
            
            var lods = [
            {
                "level": 11,
                "resolution": 76.4370282850732,
                "scale": 288895.277144
            }, {
                "level": 12,
                "resolution": 38.2185141425366,
                "scale": 144447.638572
            }, {
                "level": 13,
                "resolution": 19.1092570712683,
                "scale": 72223.819286
            }, {
                "level": 14,
                "resolution": 9.55462853563415,
                "scale": 36111.909643
            },{
				"level":15,
				"resolution":4.77731426794937,
				"scale":18055.954822
			}
            ];
            
            // 12 colors for crid rendering
            var alpha = 0.75;
            var color = [new dojo.Color([128, 0, 0, alpha]), new dojo.Color([153, 0, 0, alpha]), new dojo.Color([165, 0, 33, alpha]), new dojo.Color([204, 51, 0, alpha]), new dojo.Color([204, 0, 51, alpha]), new dojo.Color([51, 102, 51, alpha]), new dojo.Color([0, 128, 0, alpha]), new dojo.Color([0, 153, 0, alpha]), new dojo.Color([0, 204, 51, alpha]), new dojo.Color([0, 255, 0, alpha]), new dojo.Color([0, 0, 128, alpha]), new dojo.Color([0, 0, 153, alpha]), new dojo.Color([0, 51, 204, alpha]), new dojo.Color([0, 102, 255, alpha]), new dojo.Color([51, 153, 255, alpha]), new dojo.Color([0, 204, 255, alpha]), new dojo.Color([0, 220, 255, alpha]), new dojo.Color([102, 51, 204, alpha]), new dojo.Color([102, 0, 153, alpha]), new dojo.Color([153, 0, 255, alpha]), new dojo.Color([255, 0, 255, alpha]), new dojo.Color([128, 0, 128, alpha]), new dojo.Color([102, 51, 153, alpha])];
            
            //Create data object to be used in datagrid
            var data = {
                identifier: "ZIP_CRID", //This field needs to have unique values
                label: "ZIP_CRID", //Name field for display. Not pertinent to a grid but may be used elsewhere.
                items: items
            };
            
            
            // **** Display results from all geoprocessors 
            function displayResults(results, messages){
                dojo.byId("dialog1").value = '';
                
                var resultFeatures = results[0].value.features;
                var featType = results[0].value.geometryType;// esriGeometryMultipoint esriGeometryPolyline
                var infoTemplate = new esri.InfoTemplate();
                infoTemplate.setTitle("Route ${ZIP_CODE} - ${CRID_ID}<br/> <b>${CITY_STATE}</b>");
                infoTemplate.setContent("<b>Residential: </b>${RES_CNT}<br/>" +
                "<b>Business: </b>${BUS_CNT}<br/>" +
                "<b>Total: </b>${TOT_CNT}");
                // PO Boxes 
                if (featType == 'esriGeometryMultipoint') {
                
                    // ** Add Graphics
                    for (var i = 0, il = resultFeatures.length; i < il; i++) {
                        zipcrid = resultFeatures[i].attributes['ZIP_CODE'] + resultFeatures[i].attributes['CRID_ID'];
                        if (zipcrids.indexOf(zipcrid) == -1) { // Do not add if already present
                            data.items.push(resultFeatures[i].attributes);
                            zipcrids.push(zipcrid);
                            //var graphic = resultFeatures[i];
                            //graphic.setInfoTemplate(infoTemplate);
                            //map.graphics.add(graphic);
                        }
                    }
                }
                
                // *** add crids to renderer
                // Carrier routes
                if (featType == 'esriGeometryPolyline') {
                    renderer = new esri.renderer.UniqueValueRenderer(new esri.symbol.SimpleLineSymbol({
                        "type": "esriSLS",
                        "style": "esriSLSSolid ",
                        "color": [255, 0, 0, 255],
                        "width": 3
                    }), "CRID_ID");
                    
                    // ***Only unique CRID_IDs for renderer
                    for (i = 0; i < resultFeatures.length; i++) {
                        crid = resultFeatures[i].attributes.CRID_ID;
                        if (crids.indexOf(crid) == -1) {
                            crids.push(crid);
                        }
                    }
                    for (x in crids) {
                        renderer.addValue({
                            value: crids[x],
                            symbol: new esri.symbol.SimpleLineSymbol(esri.symbol.SimpleLineSymbol.STYLE_SOLID, color[x % 12], 3),
                            label: crids[x],
                            description: "Renderer Desc"
                        });
                    }
                    // add renderer to map
                    map.graphics.setRenderer(renderer);
                    
                    // ** Add Graphics
                    for (i = 0, il = resultFeatures.length; i < il; i++) {
                        zipcrid = resultFeatures[i].attributes.ZIP_CODE + resultFeatures[i].attributes.CRID_ID;
                        if (zipcrids.indexOf(zipcrid) == -1) { // Do not add if already present
                            data.items.push(resultFeatures[i].attributes);
                            zipcrids.push(zipcrid);
                            var graphic = resultFeatures[i];
                            graphic.setInfoTemplate(infoTemplate);
                            map.graphics.add(graphic);
                        }
                    }
                }
                //Create data store and bind to grid.
                store = new dojo.data.ItemFileReadStore({
                    data: data
                });
                var grid = dijit.byId('grid');
                grid.setStore(store);
                
                setMapExtent();
                
                map.setMapCursor("default");
            }
            
            function setMapExtent(){
                var n = 0;
                for (x in map.graphics.graphics) {
                    if (map.graphics.graphics[x].attributes) {
                        if (n === 0) {
                            extent = map.graphics.graphics[x].geometry.getExtent();
                        }
                        extent = extent.union(map.graphics.graphics[x].geometry.getExtent());
                        n++;
                    }
                }
                if (n != 0) {
                    map.setExtent(extent);
                }
            }
            
            function errCallback(error){
                dojo.byId("dialog1").value = "Error: " + error.message;
                alert("Error = " + error.message);
            }
            
            function statusCallback(jobInfo){
                dojo.byId("dialog1").value = dojo.byId("dialog1").value + " Checking... ";
            }
            
            // Initialize Toolbar
            function initMap(map){
                tb = new esri.toolbars.Draw(map);
                dojo.connect(tb, "onDrawEnd", addPolygon);
                
            }
            
            //Zoom to the parcel when the user clicks a row
            var xc = 0;
            var lastClickedCrid = 'xxxx';
            function onRowClickHandler(evt){
                var clickedCrid = grid.getItem(evt.rowIndex).OBLECTID;
                
                dojo.forEach(map.graphics.graphics, function(graphic){
                    if ((graphic.attributes) && graphic.attributes.OBLECTID == clickedCrid) {
                        graphic.setSymbol(selectedSymbol);
                    }
                    else 
                        if ((graphic.attributes) && graphic.attributes.OBLECTID == lastClickedCrid) {
                            graphic.setSymbol(new esri.symbol.SimpleLineSymbol(esri.symbol.SimpleLineSymbol.STYLE_SOLID, color[xc % 12], 3));
                        }
                });
                lastClickedCrid = clickedCrid;
                xc++;
                map.graphics.setRenderer(renderer);
            }
            
            dojo.addOnLoad(init);
        </script>
    </head>
    <body class="claro">
        <div data-dojo-type="dijit.layout.BorderContainer" data-dojo-props="design:'headline'" style="width:100%;height:100%;margin:1;border:1px solid">
            <div data-dojo-type="dijit.layout.ContentPane" data-dojo-props="region:'top'">
                <table border="0" summary="Selected Routes">
                    <tr>
                        <td width="100px">
                            Draw&nbsp;Polygon:
                        </td>
                        <td colspan="2">
                            <button id='PolygonButton' type='button'>
                            </button>
                            <button id='FreeButton' type='button'>
                            </button>
                            <button id='deactButton' type='button'>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            ZIP Search: 
                        </td>
                        <td width="200px">
                            <input id="tZIP" title="Comma delimited list of ZIP Codes">
                            <button id='ZIPSearch' type='button'>
                            </button>
                        </td>
                        <td rowspan="2">
                            <input type="checkbox" id="ckPObox">PO Boxes
                            <br/>
                            <input type="checkbox" id="ckCRID">Carrier Routes
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Near Search:
                        </td>
                        <td>
                            <input id="tDist" title="Distance to search">
                            <button id='NearSearch' type='button'>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td colspan='3'>
                            <div id='mapStatus' name='mapStatus'>
                                &nbsp;
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            <div data-dojo-type="dijit.layout.ContentPane" data-dojo-props="region:'center'">
                <div id="map" style="width:100%; height:99%;border:0px solid #000; " data-dojo-props="region:'top'">
                </div>
                <div id='dialog1' name='dialog1'>
                </div>
            </div>
            <div data-dojo-type="dijit.layout.ContentPane" data-dojo-props="region:'trailing'">
                <table data-dojo-type="dojox.grid.DataGrid" data-dojo-id="grid" id="grid" data-dojo-props="rowSelector:'15px'" width=220px border=0 summary="Data Grid">
                    <thead>
                        <tr>
                            <th field="ZIP_CODE" width="50px" align="center" title="ZIP Code">
                                ZIP
                            </th>
                            <th field="CRID_ID" width="50px" align="center" title="Route">
                                Rte
                            </th>
                            <th field="BUS_CNT" width="40px" align="center" title="Business Count">
                                Bus
                            </th>
                            <th field="RES_CNT" width="40px" align="center" title="Residential Count">
                                Res
                            </th>
                            <th field="TOT_CNT" width="40px" align="center" title="Total">
                                Tot
                            </th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </body class="claro">
</html>
