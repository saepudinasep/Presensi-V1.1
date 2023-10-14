<?php if($cadmin_level==2){ ?>
	<style type="text/css">
		#opsi_chat{
			display: flex;
		}

		#opsi_chat div{
			padding-right: 15px;
		}
	</style>
	<div id="opsi_chat">
		<div>
			<table>
				<tr>
					<td>
						<label class="switch">
						  <input type="checkbox" checked>
						  <span class="slider round"></span>
						</label>
					</td>
					<td style="padding: 0 0 12px 5px; font-size: small;">
						Normal Chat
					</td>
				</tr>
			</table>
		</div>
		<div>
			<table>
				<tr>
					<td>
						<label class="switch">
						  <input type="checkbox">
						  <span class="slider round"></span>
						</label>
					</td>
					<td style="padding: 0 0 12px 5px; font-size: small;">
						Bertanya
					</td>
				</tr>
			</table>
		</div>

		<div>
			<table>
				<tr>
					<td>
						<label class="switch">
						  <input type="checkbox">
						  <span class="slider round"></span>
						</label>
					</td>
					<td style="padding: 0 0 12px 5px; font-size: small;">
						Menjawab
					</td>
				</tr>
			</table>
		</div>

		<div>
			<table>
				<tr>
					<td>
						<label class="switch">
						  <input type="checkbox">
						  <span class="slider round"></span>
						</label>
					</td>
					<td style="padding: 0 0 12px 5px; font-size: small;">
						Images
					</td>
				</tr>
			</table>
		</div>
	</div>
<?php } ?>