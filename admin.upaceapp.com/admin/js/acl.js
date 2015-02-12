/*
 * Get acl for current user
 */
var aslnos=[];
function get_acl()
{
    
    
    var current = Parse.User.current();
    var UserRole = Parse.Object.extend("userrole");
    var UR = new Parse.Query(UserRole);
    UR.equalTo('user',current);
    UR.first({
        success:function(result){
            role=result.get('roleId');
            var RolePermission = Parse.Object.extend("role_app_permission");
            var RP = new Parse.Query(RolePermission);
            RP.equalTo('roleId',role);
            RP.include('app');
            RP.find({
                success:function(aclapps){
                    for(i in aclapps)
                    {
                        var tempapp=aclapps[i].get('app');
                        aslnos.push(tempapp.get('slNo'));
                        
                        //$('#acl_li_' + aslnos).show();
                    }
                    for(k=1;k<=21;k++)
                    {
                        if(aslnos.indexOf(k)==-1)
                        {
                             $('#acl_li_' + k).hide();
                        }
                    }
                    //console.log(aslnos);
                    //console.log(aslnos.indexOf(9));
                    
                    if(aslnos.indexOf(3)==-1 && aslnos.indexOf(4)==-1)
                    {
                        $('#acl_li_facility').hide();
                    }
                    if(aslnos.indexOf(6)==-1 && aslnos.indexOf(7)==-1)
                    {
                        $('#acl_li_staff').hide();
                    }
                    if(aslnos.indexOf(1)==-1 && aslnos.indexOf(2)==-1 && aslnos.indexOf(8)==-1) 
                    {
                        $('#acl_li_class').hide();
                    }
                    if(aslnos.indexOf(9)==-1 && aslnos.indexOf(10)==-1)
                    {
                        $('#acl_li_reservation').hide();
                    }
                    if(aslnos.indexOf(10)==-1 && aslnos.indexOf(12)==-1 && aslnos.indexOf(13)==-1 && aslnos.indexOf(14)==-1 ) 
                    {
                        $('#acl_li_equip').hide();
                    }
                   return aslnos;
                }
            })
        }
    })
    //return false;
}

/*
 *  Acl No array
 */
function get_acl_array()
{
    /*var aslnos=[];
    var current = Parse.User.current();
    var UserRole = Parse.Object.extend("userrole");
    var UR = new Parse.Query(UserRole);
    UR.equalTo('user',current);
    UR.first({
        success:function(result){
            role=result.get('roleId');
            var RolePermission = Parse.Object.extend("role_app_permission");
            var RP = new Parse.Query(RolePermission);
            RP.equalTo('roleId',role);
            RP.include('app');
            RP.find({
                success:function(aclapps){
                    for(i in aclapps)
                    {
                        var tempapp=aclapps[i].get('app');
                        aslnos.push(tempapp.get('slNo'));
                        //$('#acl_li_' + aslnos).show();
                    }
                    
                }
            })
        }
    })
    return false;*/
    
    return aslnos;
}