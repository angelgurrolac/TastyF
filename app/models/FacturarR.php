<?php

class facturarr extends Eloquent
{
	protected $table = "facturarr";
	
	public function scopePropias($facturas,$id){
		$facturas =DB::table('facturarr')
		->where('facturarr.id_restaurante','=',$id)
		->leftjoin('facturas as facturas',	function($join){
							$join->on('facturarr.id_factura','=','facturas.id');
					}) 
		
	
		->select('*','facturas.id as idF','facturarr.id as idf');
	
		return $facturas;
	}

	public function scopeUnica($factura,$id){
		$factura =DB::table('facturarr')
		->where('facturarr.id','=',$id)
		->leftjoin('facturas as facturas',	function($join){
							$join->on('facturarr.id_factura','=','facturas.id');
					}) 
		
	
		->select('*','facturas.id as idF','facturarr.id as idf');
	
		return $factura;
	}
}