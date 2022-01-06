$query="SELECT * 
						FROM tesis AS te
						
						INNER JOIN mencion AS me
						ON te.id_menc=me.id_menc
						

						INNER JOIN 	tutor_met AS tu_met
						ON te.id_tutor_met=tu_met.id_tu_met
						INNER JOIN 	tutor_acad AS tu_acad
						ON te.id_tutor_acad=tu_acad.id_tu_acad
						INNER JOIN 	jurado_1 AS ju1
						ON te.id_jurado_1=ju1.id_jurado_1
						INNER JOIN 	jurado_2 AS ju2
						ON te.id_jurado_2=ju2.id_jurado_2
						INNER JOIN 	jurado_3 AS ju3
						ON te.id_jurado_3=ju3.id_jurado_3



						INNER JOIN profesor AS pr
                        ON tu_met.ced_tutor_met=pr.ci_p
                        INNER JOIN profesor AS pr1
                        ON tu_acad.ced_tutor_acad=pr1.ci_p
                        INNER JOIN profesor AS pr2
                        ON ju1.id_jurado_1=pr2.ci_p
                        INNER JOIN profesor AS pr3
                        ON ju2.id_jurado_2=pr3.ci_p
                        INNER JOIN profesor AS pr4
                        ON ju3.id_jurado_3=pr4.ci_p						
						
						INNER JOIN alumno AS al 
						ON te.ced_tesis=al.ci_a
						INNER JOIN escuela AS es 
						ON al.es_a=es.escuela 
						INNER JOIN fecha AS fe
								ON te.id_fecha_te=fe.id_fecha
								WHERE id_tesis_te=$id_tesis_te
								
								
	   			 	";echo $query;
						$res=$conn->query($query);
						$row=$res->fetch_assoc();
								$f=explode('-',$row['fecha_def']);
								 $dia=$f[2]; $mess=$f[1]; $anio=$f[0];$ao=$f[0]-2000;
								$fecha_present=$dia."/".$mes."/".$ao;
								if($f[1]==1)$mes='enero';
									elseif($f[1]==2)$mes='febrero';
										elseif($f[1]==3)$mes='marzo';
											elseif($f[1]==4)$mes='abril';
												elseif($f[1]==5)$mes='mayo';
													elseif($f[1]==6)$mes='junio';
														elseif($f[1]==7)$mes='julio';
															elseif($f[1]==8)$mes='agosto';
																elseif($f[1]==9)$mes='septiembre';
																	elseif($f[1]==10)$mes='octubre';
																		elseif($f[1]==11)$mes='noviembre';
																			elseif($f[1]==12)$mes='diciembre';
								$h=explode(':',$row['hora_def']);
								$hora_present=$h[0].":".$h[1];
					
							
						$ac = array($row['escuela'],$row['ao'],$row['semestre'],$row['id_tesis_te']);
                                $acta  = implode("",$ac );