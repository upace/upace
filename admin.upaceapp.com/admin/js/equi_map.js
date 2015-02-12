var currentUser = Parse.User.current();
var gymId = currentUser.get('universityId');
var rooms_data = '';
var equip_data = '';
var map_data='{';
map_data += '"mapwidth": "800",';
map_data +=	'"mapheight": "600",';
map_data +=	'"categories": [';

var middle_data = '],';
middle_data += '"levels": [';
//middle_data += '{';
//middle_data +=			'"id": "basement",';
//middle_data +=			'"title": "Basement",';
//middle_data +=			'"map": "../images/gym_map/' + gymId + '_map.png",';
//middle_data +=			'"minimap": "../images/gym_map/' + gymId + '_map.png",';
//middle_data +=			'"locations": [';

var end_data = ']}';

var Room = Parse.Object.extend("room");
var q = new Parse.Query(Room);
var c=1;
q.equalTo("universityId", gymId);
q.include('gymId');
q.find({
  success: function(results){
	  total_rooms = results.length;
	  for(i in results){
		var room = results[i];
		var ggym = room.get('gymId');
		get_room_equip(room.id,total_rooms,room,ggym);
	  }
  }
});

var c=0;
function get_room_equip(room_id,total_rooms,room,ggym)
{
	//console.log(ggym);
	//var ggym = room.get('university');
	var equipments = Parse.Object.extend('gym_equipment');
	var eqpmnts = new Parse.Query(equipments);
	//eqpmnts.equalTo('gym',gym);
	eqpmnts.equalTo('room',room_id);
	eqpmnts.include('university');
	eqpmnts.find({
		success: function(equips){
		//	var univ=equips.get('university');
			c++;
			//if(equips.length>0)  // Rooms with 0 equipment will not show
			if(equips)
			{
				
				rooms_data += '{';
				rooms_data +=	'"id": "' + room_id + '",';
				rooms_data +=	'"title": "' + room.get('name')+'('+ggym.get('name')+')' + '",';
				rooms_data +=	'"icon": "images/misc.png",';
				rooms_data +=	'"color": "#bfe79e",';
				rooms_data +=	'"show": "false"';

				room_image = room.get('map_image');
				equip_data += '{';
				equip_data +=			'"id": "' + room_id + '_room",';
				equip_data +=			'"title": "' + room.get('name') + '('+ggym.get('name')+')' +' Room",';
				if(room_image)
				{
					room_image_url = room_image.url();
					equip_data +=			'"map": "'+ room_image_url +'",';
					equip_data +=			'"minimap": "'+ room_image_url +'",';
				}
				else
				{
					equip_data +=			'"map": "../images/gym_map/' + gymId + '_map.png",';
					equip_data +=			'"minimap": "../images/gym_map/' + gymId + '_map.png",';
				}
				equip_data +=			'"locations": [';
				for(j in equips)
				{		
					equip = equips[j];
					if(equip)
					{
						notes = equip.get('notes');
						if(!notes)
						{
							notes='';
						}
						else
						{
							notes = notes.substring(0,20);
						}
						equip_data += '{';
						equip_data += 	'"id": "' + equip.id + '",';
						equip_data += 	'"title": "' + equip.get('name') + '",';
						equip_data +=	'"about": "' + notes + '",';
						equip_data +=	'"description": "' + notes + '",';
						equip_data += 	'"category": "' + room_id + '",';
						if(equip.get('typeId') == 'Rg7dmEFEFs')
						{
							equip_data +=	'"thumbnail": "images/im-2.png",';
							equip_data += 	'"type": "treadmills",';
						}
						else if(equip.get('typeId') == 'Vw7lwEP657')
						{
							equip_data +=	'"thumbnail": "images/im-1.png",';
							equip_data += 	'"type": "ellipticals",';
						}
						else if(equip.get('typeId') == '5sM4edEGn8')
						{
							equip_data +=	'"thumbnail": "images/im-3.png",';
							equip_data += 	'"type": "bikes",';
						}
						else
						{
							equip_data +=	'"thumbnail": "images/pin-red.png",';
							
						}
						
						if(equip.get('map_x'))
						{
							equip_data +=	'"x": "' + equip.get('map_x')  + '",';
						}else
						{
							equip_data +=	'"x": "' + Math.random()  + '",';
						}
						
						if(equip.get('map_y'))
						{
							equip_data +=	'"y": "' + equip.get('map_y')  + '",';
						}
						else
						{
							equip_data +=	'"y": "' + Math.random()  + '",';
						}
						
						equip_data +=	'"zoom": "5"';
						
						//console.log(c + ' - ' + total_rooms);
						
						equip_data += '},';
					}
					
					
				}
				equip_data = equip_data.replace(/,\s*$/, "");
					equip_data +=']},';
				//console.log(equip_data);
				if(c==(parseInt(total_rooms)))
				{
					//console.log(equip_data);
					equip_data = equip_data.substring(0,equip_data.length - 1);
					//console.log(equip_data);
					rooms_data += '}';
					map_data = map_data + rooms_data + middle_data + equip_data + end_data;
					//map_data = map_data.replace(/'/g, "\\'");
					//console.log(map_data);
					map_data = JSON.parse(map_data);
					//console.log(map_data);
					$('#mapplic').mapplic({
						source: map_data,
						//source: 'js/apartment.json',
						sidebar: true,
						minimap: true,
						deeplinking: true,
						fullscreen: true,
						hovertip: true,
						developer: true,
						maxscale: 1
					});

						
				}
				else
				{
						rooms_data += '},';
				}
			}
		}
	})
}

function update_equipment(equipId,map_x,map_y)
{
	 var r1 = Parse.Object("gym_equipment");
     r1.id=equipId;
	 r1.set("map_x", parseFloat(map_x));
	 r1.set("map_y", parseFloat(map_y));
	 r1.save(null,{
		success : function(){
			showSuccess('Equipment location has been changed successfully');
		},
		error : function(){
			showError('Equipment location could not be changed. Please try again later');
		}
	 })
		//console.log('Console log - ' + equipId);
}