qf.comp.error = Ext.extend(Ext.form.FormPanel,{
        border:false,
        layout:'fit',
        padding:0,
        title:'<font color="#ff0000">{_COMPONENT_ERROR}</font>',
	initComponent:function(){   
	  var _this = this;
              _this.items = [{
                  xtype:'panel',
                  bodyStyle:{
                        'display':'table-cell',
                        'text-align':'center',
                        'vertical-align':'middle',
                        'font-family':'verdana',
                        'color':'#ff0000',
                        'font-size':'11px',
                        'border':'0px'
                  },
                  html: '<div style="text-align:center;"><div style="padding-top:15px;border-radius:4px;border:1px solid #ff0000;height:30px;width:150px;margin:auto;">ERROR</div></div>',
                  listeners:{
                      afterrender:function(){
                         $($(this.body.dom).find('div')[1]).mouseenter(function(){
                             $(this).css({'background':'#ff0000',color:'#FFF'}); 
                         }).mouseout(function(){
                             $(this).css({'background':'#FFF',color:'#ff0000'}); 
                         }).click(function(){
                            console.log(qf.comp_err); 
                         });
                         
                      }
                  }
              }];
          qf.comp.error.superclass.initComponent.call(this);
	} 
});
Ext.reg('error', qf.comp.error);