{{ HTML::style('css/dist/css/bootstrap-theme.css') }}
{{ HTML::style('css/dist/css/bootstrap-theme.min.css') }}
{{ HTML::style('css/dist/css/bootstrap.css') }}
{{ HTML::style('css/dist/css/bootstrap-theme.css') }}

@extends('layout.master')
   @section('content')
       {{ Form::open(array('url'=>'products/update')) }}
          <div class="row" style="margin-left: 400px; margin-top: 100px;">
            <div class="col-lg-8">
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h3 class="panel-title"><i class="fa fa-user"></i> Update Product</h3>
                </div>
                <div class="panel-body">
                    <div class="panel-body-sub">
                      <div class="col-md-3">
                        {{ Form::label('prodcode','Code: ') }} 
                        {{ Form::text('prodcode',$product['prodcode'],array('placeholder'=>'Product Code','class' => 'form-control')) }}
                      </div>       
                    </div>
                      <div class="col-md-3">
                        {{ Form::label('prodname','Name: ') }} 
                        {{ Form::text('prodname',$product['prodname'],array('placeholder'=>'Product Name','class' => 'form-control')) }} 
                      </div>
                      <div class="col-md-3">
                        {{ Form::label('prodtype','type: ') }} 
                        {{ Form::select('prodtype',array('GEN'=>'General','ELD'=>'Electronic Device'), null,array('class'=>'form-control','style'=>'' )) }} 
                      </div>
                      <div class="col-md-3">
                        {{ Form::label('prodqty','Quantity: ') }} 
                        {{ Form::text('prodqty',$product['prodqty'],array('placeholder'=>'Quantity','class' => 'form-control')) }}
                      </div>
                      <div class="col-md-3">
                        {{ Form::label('prodprice','Price: ') }} 
                        {{ Form::text('prodprice',$product['prodprice'],array('placeholder'=>'Unit Price','class' => 'form-control')) }}  
                      </div>
                      <div class="col-md-3">
                        {{ Form::label('prodrlevel','R Level: ') }} 
                        {{ Form::text('prodrlevel',$product['prodrlevel'],array('placeholder'=>'Reorder Level','class' => 'form-control')) }}    
                      </div>
                      <div class="col-md-3">
                        {{ Form::label('prodrquant','R Quant: ') }} 
                        {{ Form::text('prodrquant',$product['prodrquant'],array('placeholder'=>'Reorder Quantity','class' => 'form-control')) }}      
                      </div>
                      <div>  
                        {{ Form::submit('Update Product', array('class' => 'btn btn-primary')) }}      
                      </div>
                  </div>
                </div>
              </div>
          </div>
          
       {{ Form::close() }}
   @endsection
  