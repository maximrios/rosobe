<?php
	$ci = &get_instance();
	$ci->load->model('diario/lineas_model', 'lineas');
	$ci->load->library('hits/pdf');
	$ci->pdf->SetSubject('TCPDF Tutorial');
	$ci->pdf->SetKeywords('TCPDF, PDF, example, test, guide');
	$ci->pdf->AddPage();
	$ci->pdf->SetFillColor(210, 210, 210);
	$ci->pdf->SetFont('helvetica', '', 10);
	$ci->pdf->Cell(190, 8, 'FECHA, '.date('d').' / '.date('m').' / '.date('Y').' ', 0, 1, 'R', FALSE);
	$ci->pdf->Cell(190, 10, 'Detalle de Pedidos', 0, 1, 'C', FALSE);
	$ci->pdf->SetFont('helvetica', '', 8);
	foreach ($pedidos as $pedido) {
		$ci->pdf->Cell(150, 6, $pedido['idCliente'].' - '.$pedido['nombrePersona'].' '.$pedido['apellidoPersona'], 0, 0, 'L', FALSE);
		$ci->pdf->Cell(40, 6, $pedido['fechaPedido'], 0, 1, 'R', FALSE);
		$lineas = $ci->lineas->obtener($pedido['idPedido']);
		foreach ($lineas as $linea) {
			$ci->pdf->Cell(10, 6);
			$ci->pdf->Cell(40, 6, $linea['idProducto'].' - '.$linea['nombreProducto'], 0, 0, 'L', FALSE);
			$ci->pdf->Cell(20, 6, $linea['precioProductoCanillita'], 0, 0, 'R', FALSE);
			$ci->pdf->Cell(20, 6, $linea['cantidadLinea'], 0, 0, 'R', FALSE);
			$ci->pdf->Cell(20, 6, $linea['precioLinea'], 0, 0, 'R', FALSE);
			$ci->pdf->Cell(20, 6, $linea['cantidadLineaD'], 0, 0, 'R', FALSE);
			$ci->pdf->Cell(20, 6, $linea['precioLineaD'], 0, 0, 'R', FALSE);
			$ci->pdf->Cell(20, 6, $linea['pagoLineaD'], 0, 0, 'R', FALSE);
			$ci->pdf->Cell(20, 6, $linea['saldoLinea'], 0, 1, 'R', FALSE);
		}
		$ci->pdf->Cell(90, 6);
		$ci->pdf->Cell(20, 6, $pedido['precioPedido'], 0, 0, 'R', FALSE);
		$ci->pdf->Cell(20, 6);
		$ci->pdf->Cell(40, 6, $pedido['precioPedidoD'], 0, 0, 'C', FALSE);
		$ci->pdf->Cell(20, 6, $pedido['saldoPedido'], 0, 1, 'R', FALSE);
	}
	$ci->pdf->Ln(8);
	$ci->pdf->SetFont('helvetica', '', 12);
	$ci->pdf->Output('example_001.pdf', 'I');
?>