<?php

class FacturarR extends Eloquent
{
	protected $table = "FacturarR";
	
	public function scopePropias($facturas,$id){
		$facturas =DB::table('FacturarR')
		->where('FacturarR.id_restaurante','=',$id)
		->leftjoin('facturas as facturas',	function($join){
							$join->on('FacturarR.id_factura','=','facturas.id');
					}) 
		
	
		->select('*','facturas.id as idF','FacturarR.id as idf');
	
		return $facturas;
	}

	public function scopeUnica($factura,$id){
		$factura =DB::table('FacturarR')
		->where('FacturarR.id','=',$id)
		->leftjoin('facturas as facturas',	function($join){
							$join->on('FacturarR.id_factura','=','facturas.id');
					}) 
		
	
		->select('*','facturas.id as idF','FacturarR.id as idf');
	
		return $factura;
	}
}