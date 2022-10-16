
<div class="row">
	
	<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
                <div class="panel-title-box" >
                    <h2 id='indicateurs'> تغيير كلمة السر </h2>
                </div>                                    
                    <ul class="panel-controls">
                        <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                    </ul> 
            </div>
			<div  class="col-md-12">
            <form class="form-horizontal">
                            <div class="panel panel-default">
                                <div class="panel-body">                                                                        
                                    <div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label"></label>
                                        <div class="col-md-6 col-xs-12">
                                            <div dir='ltr' class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-unlock-alt"></span></span>
                                                <input id='old-pass' placeholder="أدخل كلمة المرور الخاصة بحسابك الحالي "  type="password" class="form-control">
                                            </div>            
                                            <span class="help-block"> كلمة المرور الحالية </span>
                                        </div>
                                    </div>
                                    <div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label"></label>
                                        <div class="col-md-6 col-xs-12">
                                            <div  dir='ltr' class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-unlock-alt"></span></span>
                                                <input id='new-pass' placeholder="ادخل كلمة المرور الجديدة" type="password" class="form-control">
                                            </div>            
                                            <span class="help-block">كلمة المرور الجديدة</span>
                                        </div>
                                    </div>
                                    <div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label"></label>
                                        <div class="col-md-6 col-xs-12">
                                            <div  dir='ltr'class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-unlock-alt"></span></span>
                                                <input id='confirm-pass' placeholder="ادخل كلمة المرور الجديدة"  type="password" class="form-control">
                                            <input id='user-id' type='hidden' value='<?=(Session::get(Config::USER_COOKIE));?>'>
                                            </div>            
                                            <span class="help-block">تأكيد كلمة المرور الجديدة</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-footer">
                                                                     
                                    <button id='modifier' class="btn btn-primary pull-right btn-block">Modifier</button>
                                </div>
                            </div>
                            </form>
            </div>	
        </div>
	</div>
	
</div>