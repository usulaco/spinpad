Ext.QuickTips.init();
Ext.namespace('qf');
qf = {
   load:{
      icon:function(name,cls){
          if(cls) return  '../icons/'+name+'.png';
          if(!qf.style['i-'+name]) {
              qf.style['i-'+name] = $('<style> .i-'+name+' {background-image:url(../icons/'+name+'.png) !important} </style>'); 
               $('html > head').append(qf.style['i-'+name]);
          }
        return 'i-'+name;
      },
      xtype: function(name){
          var output = false;
          if(!qf.comp[name] || qf.comp_err[name])
            jQuery.ajax({
               async:false,
               type:'post',
               url:'qform/loadcomponent',
               dataType:'script',
               data:{
                 name:name
               },
               success:function(r,n,xr){
               
               qf.ajax_completed(xr,'jquery');
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
             else output = name;
          return output;
      } 
   },
   style:{},
   comp:{},
   comp_err:{},
   ajax: {
          notice:function(r,t){
             console.info('Ajax On Complete',t);
          }
   },
   ajax_completed: function(r,t){
        Ext.iterate(qf.ajax,function(name,func){
            func(r,t);   
        });  
   }
};

// load error type component

qf.load.xtype('error');

// load css classes
//console.info(qf.load.icon('application-tree'));

$(['star-small','folders','globe-medium','applications','folders','application-tree','ui-menu-blue','users']).each(function(idx,cls){
    qf.load.icon(cls);
});

// catch global ajax on complete calls 

Ext.Ajax.on( 'requestcomplete', function( connection , response , options ) {
      qf.ajax_completed(response,'ext');
});
