<h2>Información de inter&eacute;s</h2>
	<ul>
		<li>
			<script type="text/javascript">
				$(document).ready(function() {

					$("#sel2").prop("disabled", true);

					$( "#sel1" ).change(function() {
					  var value = $(this).val();
						$("#sel2").prop("disabled", false);
						$("#sel2 > option").hide();
						$("#sel2 > option[value*='" + value +"']").show();
					});					
						
				});
		 
			</script>
			<div id="tipo_analisis" class="form-group">	
				<label class="la_analysisType" for="tipo_analisis">Tipo de Análisis</label>
				<select class="in_analysisType" name="service_type" id="sel1">
					<option value="QualityAssessment" selected="selected"/>Quality assessment and read processing
					<option value="Alignment" />Alignment software
					<option value="VariantId" />Variant identification (Germline callers)
					<option value="VariantAnnot" />Variant identification (Variant annotation)						
					<option value="SomaticCallers" />Variant identification (Somatic callers)
					<option value="CNVId" />Variant identification (CNV identification)
					<option value="SVId" />Variant identification (SV identification)
					<option value="GB" />Variant visualization (Genome Browsers)
					<option value="VariantVis" />Variant visualization (CNV & SV)							
					<option value="Pipelines" />Pipelines
					<option value="Workflow" />Workflow systems
					<option value="SNP" />SNP management
					<option value="Imputation" />Imputation
					<option value="GWAS" />GWAS
					<option value="PopGen" />Population genomics and signatures of selection
					<option value="GenomicPredictions" />Genomic predictions
				</select>				
			</div>
		</li>
		<li>
			<div id="software_id" class="form-group">			
				<label class="la_software" for="software">Software</label>
				<select name="software-name" class="in_software" id='sel2'>
					<option value="Select">Select</option>
					<option value="QualityAssessment--FastQC">FastQC</option>
					<option value="QualityAssessment--FASTX">FASTX-Toolkit</option>
					<option value="QualityAssessment--Galaxy">Galaxy</option>
					<option value="QualityAssessment--htSeqTools">htSeqTools</option>
					<option value="QualityAssessment--NGSQC">NGSQC</option>
					<option value="QualityAssessment--PIQA">PIQA</option>
					<option value="QualityAssessment--PRINSEQ">PRINSEQ</option>
					<option value="QualityAssessment--SolexaQA">SolexaQA</option>
					<option value="QualityAssessment--TagCleaner">TagCleaner</option>
					<option value="QualityAssessment--TileQC">TileQC</option>

					<option value="Alignment--Bowtie">Bowtie</option>
					<option value="Alignment--BWA">BWA</option>
					<option value="Alignment--BWA-SW">BWA-SW</option>
					<option value="Alignment--ELAND">ELAND</option>
					<option value="Alignment--MAQ">MAQ</option>
					<option value="Alignment--Mosaik">Mosaik</option>
					<option value="Alignment--mrFAST">mrFAST</option>
					<option value="Alignment--mrsFAST">mrsFAST</option>
					<option value="Alignment--Novoalign">Novoalign</option>
					<option value="Alignment--SOAP2">SOAP2</option>
					<option value="Alignment--SOAP3">SOAP3</option>
					<option value="Alignment--SSAHA2">SSAHA2</option>
					<option value="Alignment--Stampy">Stampy</option>
					<option value="Alignment--YOABS">YOABS</option>

					<option value="Germline--FastQC">Atlas 2</option>
					<option value="Germline--Bambino">Bambino</option>
					<option value="Germline--Beagle">Beagle</option>
					<option value="Germline--CoNAnSNV">CoNAn-SNV</option>
					<option value="Germline--CORTEX">CORTEX</option>
					<option value="Germline--CRISP">CRISP</option>
					<option value="Germline--Dindel">Dindel</option>
					<option value="Germline--FreeBayes">FreeBayes</option>
					<option value="Germline--GATK">GATK (UnifiedGenotyper)</option>
					<option value="Germline--GSNP">GSNP</option>
					<option value="Germline--IMPUTE2">IMPUTE2</option>
					<option value="Germline--Indelocator">Indelocator</option>
					
					<option value="VariantId--FastQC">FastQC</option>
					<option value="VariantId--FASTX">FASTX-Toolkit</option>
					<option value="VariantId--Galaxy">Galaxy</option>
					<option value="VariantId--htSeqTools">htSeqTools</option>
					<option value="VariantId--hero">NGSQC</option>
					<option value="VariantId--one">One</option>

					<option value="Pipelines--BcbioNextgen">Bcbio-nextgen</option>
					<option value="Pipelines--Crossbow">Crossbow</option>
					<option value="Pipelines--Games">Games</option>
					<option value="Pipelines--GATK">GATK</option>
					<option value="Pipelines--HugeSeq">HugeSeq</option>
					<option value="Pipelines--inGap">inGap</option>
					<option value="Pipelines--MutationTaster">MutationTaster NGS pipeline</option>
					<option value="Pipelines--NgsBackbone">Ngs-backbone</option>
					<option value="Pipelines--RTG">RTG</option>
					<option value="Pipelines--SeqGene">SeqGene</option>
					<option value="Pipelines--SHORE">SHORE</option>
					<option value="Pipelines--Simplex">Simplex</option>
					<option value="Pipelines--Treat">Treat</option>
					
					<option value="Workflow--GenboreeWorkbench">Genboree Workbench</option>
					<option value="Workflow--GeneProf">GeneProf</option>
					<option value="Workflow--Galaxy">Galaxy</option>
					<option value="Workflow--Tavaxy">Tavaxy</option>
					<option value="Workflow--Yabi">Yabi</option>

					<option value="VariantAnnot--FastQC">FastQC</option>
					<option value="VariantAnnot--FASTX">FASTX-Toolkit</option>
					<option value="VariantAnnot--Galaxy">Galaxy</option>
					<option value="VariantAnnot--htSeqTools">htSeqTools</option>
					<option value="VariantAnnot--hero">NGSQC</option>
					<option value="VariantAnnot--one">One</option>

					<option value="SomaticCallers--GATK">GATK (SomaticIndelDetector)</option>
					<option value="SomaticCallers--MutationSeq">MutationSeq</option>
					<option value="SomaticCallers--MuTect">MuTect</option>
					<option value="SomaticCallers--SAMtools">SAMtools</option>
					<option value="SomaticCallers--SomaticCall">SomaticCall</option>
					<option value="SomaticCallers--SomaticSniper">SomaticSniper</option>
					<option value="SomaticCallers--SPLINTER">SPLINTER</option>
					<option value="SomaticCallers--VarScan">VarScan</option>
					
					<option value="CNVId--CNAseg">CNAseg</option>
					<option value="CNVId--CNVer">CNVer</option>
					<option value="CNVId--cnvHMM">cnvHMM</option>
					<option value="CNVId--CNVnator">CNVnator</option>
					<option value="CNVId--CNVseq">CNV-seq</option>
					<option value="CNVId--CONTRA">CONTRA</option>
					<option value="CNVId--CopySeq">CopySeq</option>
					<option value="CNVId--ExomeCNV">ExomeCNV</option>
					<option value="CNVId--RDXplorer">RDXplorer</option>
					<option value="CNVId--readDepth">readDepth</option>
					<option value="CNVId--Segseq">Segseq</option>
					
					<option value="SVId--APOLLOH">APOLLOH</option>
					<option value="SVId--BreakDancer">BreakDancer</option>
					<option value="SVId--Breakpointer">Breakpointer</option>
					<option value="SVId--BreakSeq">BreakSeq</option>
					<option value="SVId--Breakway">Breakway</option>
					<option value="SVId--CLEVER">CLEVER</option>
					<option value="SVId--ClipCrop">ClipCrop</option>
					<option value="SVId--CREST">CREST</option>
					<option value="SVId--FusionMap">FusionMap</option>
					<option value="SVId--GASVPro">GASVPro</option>
					<option value="SVId--Hydrasv">Hydra-sv</option>
					<option value="SVId--PEMer">PEMer</option>
					<option value="SVId--Pindel">Pindel</option>
					<option value="SVId--SPLITREAD">SPLITREAD</option>
					<option value="SVId--SVDetect">SVDetect</option>					
					<option value="SVId--SVMerge">SVMerge</option>
					<option value="SVId--Tigra">Tigra</option>
					<option value="SVId--VariationHunter">VariationHunter</option>							
					
					<option value="GB--hero">NGSQC</option>
					<option value="GB--one">One</option>					
					
					<option value="SNP--PLINK">PLINK</option>
					<option value="SNP--SNPQC">SNPQC</option>
					<option value="SNP--SNPPY">SNPPY</option>
					<option value="SNP--GBROWSE">GBROWSE</option>
					<option value="SNP--IGV">IGV</option>
					<option value="SNP--PGDSPIDER">PGDSPIDER</option>
					<option value="SNP--FCGENE">FCGENE</option>
					
					<option value="Imputation--FIMPUTE">FIMPUTE</option>
					<option value="Imputation--BEAGLE">BEAGLE</option>
					<option value="Imputation--IMPUTE2">Impute2</option>
					<option value="Imputation--MACH">MACH</option>
					<option value="Imputation--PEDIMPUTE">PEDIMPUTE</option>
					<option value="Imputation--ALPHAPHASE">ALPHAPHASE</option>
					<option value="Imputation--FINDHAP">FINDHAP</option>					

					<option value="PopGen--Galaxy">SWEED</option>
					<option value="PopGen--ARLEQUIN">ARLEQUIN</option>
					<option value="PopGen--SELSCAN">SELSCAN</option>
					<option value="PopGen--VCFTOOLS">VCFTOOLS</option>
					<option value="PopGen--BAYESCAN">BAYESCAN</option>
					<option value="PopGen--ADMIXTURE">ADMIXTURE</option>
					<option value="PopGen--LampLD">LampLD</option>					
					<option value="PopGen--Structure">Structure</option>					
					<option value="PopGen--FASTSTRUCTURE">FASTSTRUCTURE</option>
					<option value="PopGen--BAPS">BAPS</option>
					<option value="PopGen--LFMM">LFMM</option>
					<option value="PopGen--DIYABC">DIY-ABC</option>
					<option value="PopGen--POPABC">POPABC</option>
					<option value="PopGen--ABCTOOLBOX">ABCTOOLBOX</option>

					<option value="GWAS--FastQC">GENABEL</option>
					<option value="GWAS--GCTA">GCTA</option>
					<option value="GWAS--GEMMA">GEMMA</option>
					<option value="GWAS--hero">SSGBLUP</option>
	
					<option value="GenomicPredictions--GS3">GS3</option>
					<option value="GenomicPredictions--ASREML">ASREML</option>
					<option value="GenomicPredictions--GENSEL">GENSEL</option>
					<option value="GenomicPredictions--BGLR">BGLR</option>
					<option value="GenomicPredictions--RRBLUP">RRBLUP</option>
					<option value="GenomicPredictions--BLUPF90SUITE">BLUPF90 SUITE</option>


				</select>					
				<div class="cleaner"></div>
			</div>
		</li>
	</ul>
	<div class="cleaner">
		<p>Los aranceles se regularán de acuerdo a las características del pedido</p>
	</div>
	<li>
		<button class="submit" type="submit">Enviar</button>
	</li>			