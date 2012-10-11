Ext.QuickTips.init();
Ext.namespace('qf');
qf = {
   load:{
      xtype: function(name){
          var output = false;
          if(!qf.comp[name] || qf.comp_err[name])
            jQuery.ajax({
               async:false,
               type:'post',
               url:'qform/loadcomponent',
               datatype:'script',
               data:{
                 name:name
               },
               success:function(r){
                        try {
                           eval(r);
                           output = name;
                           delete qf.comp_err[name];
                        } catch (e){
                           output = 'error';
                           qf.comp_err[name] = e;
                        }  
               }
            });
          return output;
      } 
   },
   comp:{},
   comp_err:{}
};
qf.load.xtype('error');
