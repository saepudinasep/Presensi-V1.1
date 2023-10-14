<style type="text/css">
h3{
	color: #66f;
}
.hideit{
	display: none;
}

.hideita{
	color: red; 
	font-weight: bold;
	display: none;
}



#blok_chat{
	border: solid 1px #ccc;
	padding: 10px;
	background: linear-gradient(white,#ffd);
	border-radius: 10px;
	font-size: small;
	height: 400px;
	overflow-y: scroll;
}		

#chat_list{
	/*border: solid 1px #ccc;*/
	font-size: small;
	padding: 0px;
	/*border: solid 1px red;*/
}
#chat_list li{
	/*margin: 10px;*/
	list-style-type: none;
	/*margin: 10px;*/
}


.abu{
	color: #aaa;
}

.abu2{
	color: #666;
}

.img_btn{
	transition: .2s;
}

.img_btn:hover{
	transform: scale(1.3);
	margin: 0 3px;
}

.chat_body{
	margin-top: 5px;
}

.img_profil{
	object-fit: cover;
	width: 50px;
	height: 50px;
	border-radius: 25px;
	border: solid 3px white;
	box-shadow: 0px 0px 3px gray;
	transition: .2s;
}

.img_profil:hover{
	transform: scale(2.5);
	-webkit-filter: grayscale(0%);
	filter: grayscale(0%);
	opacity: 100%;
}

#blok_mhs, #blok_hasil{
	border: solid 1px #ccc;
	padding: 10px;
	margin: 10px 0;
	border-radius: 15px;
}



.mhs_label{
	font-size: 8pt;
	text-align: center;
	margin: 0;
}


#total_mhs{
	margin: 5px 0 0 0;
	font-size: small;
}

/* ================================
POLLING
=================================== */

#polling{
	border: solid 1px blue; 
	padding: 10px;
}

.item_polling{
	width: 25%; 
	border: solid 1px red;
	background-color: #cfd; 
	text-align: center;
}

#tb_choice {
	margin-bottom: 10px;
}

#tb_choice tr {
	border: solid 1px #ccc;
}

#tb_choice tr:hover {
	background-color: #ffc;
	cursor: pointer;
	border: solid 2px purple;
}

#tb_choice td{
	padding: 5px 7px;
}

.poll_bar{
	border: solid 1px #ccc;
	border-radius: 10px;
}

.poll_selected{
	background-color: #cfc;
	border: solid 2px blue !important;
}



/* ==================================== */
/* SLIDER BUTTON */
/* ==================================== */
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}



.timer{
	text-align: center;
	border: solid 1px #ddd;
	border-radius: 5px;
	width: 30px;
	font-family: consolas;
}

.not_online{
	-webkit-filter: grayscale(100%);
	filter: grayscale(100%);
	opacity: 50%;
}

.db_var{
	padding: 15px;
	font-size: 8pt;
	font-family: consolas;
	background: #faa;
	/*display: none;*/
}

	.btn_aksi{
		cursor: pointer;
	}

	.img_aksi{
		transition: .2s;
	}
	.img_aksi:hover{
		transform: scale(1.2);
	}

	.img_zoom{
		transition: .2s;
	}
	.img_zoom:hover{
		transform: scale(1.2);
	}


	.chat{
		border: solid 1px #ccc;
		padding: 8px 15px;
		border-radius: 12px;
		margin: 10px 50px 10px 10px;
	}

	.chat_dosen{
		background: linear-gradient(#fff,#aaf);;
		border: solid 2px blue !important;
	}

	.chat_mhs{
		background: linear-gradient(#fff,#ffefff);;
	}

	.chat_special{
		border: solid 3px red !important;
	}

	.chat_aku{
		background: linear-gradient(#dfd,#9f9) !important;;
		text-align: right;
		margin-left: 50px !important;
		margin-right: 10px !important;
	}

	.blok_jawab, .blok_polling, .blok_tf, .blok_pg{
		border: solid 1px #ccc;
		padding: 5px 10px;
		border-radius: 10px;
		margin: 10px 0;
		text-align: left !important;
	}

	.list_jawaban{
		margin: 0; padding: 0;
	}


	#menu_btn_chat div{
		padding: 5px 15px 5px 5px;
		cursor: pointer;
		transition: .2s;
	}
	#menu_btn_chat div:hover{
		background: yellow;
		padding: 5px 20px 5px 10px;
		border: solid 1px #ccc;
		border-radius: 5px;
	}

	.active_chat_btn{
		background-color: #dfd;
		border: solid 1px #ccc;
		border-radius: 5px;
	}

	.blok_input_post{
		margin-bottom: 15px;
		display: none;
	}

	.wadah{
		padding: 15px;
		border: solid 1px #ccc;
		border-radius: 10px;
		margin: 10px 0;
	}

	#blok_input_post__make_poll{
		background: #dfd;
	}

	.row_poll{
		display: grid;
		grid-template-columns: 90px 20px 25px auto;
		grid-gap: 3px;
	}

	.bar_polling{
		border: solid 1px #ccc;
		background: linear-gradient(to left, red, yellow);
		border-radius: 5px;
	}

	.count_poll{
		font-size: 8pt;
		color: #555;
	}

	.row_poll{
		border-bottom: solid 1px #ddd;
		border-radius: 5px;
		/*transition: .2s;*/
		padding: 5px;
		margin-bottom: 5px;
	}

	.row_poll:hover{
		/*margin: 5px 0;*/
		background: #ffa;
	}

	.polling_saya{
		background: #ffa;
		border: solid 2px blue;
	}

	.isi_chat_khusus{
		padding: 5px; 
		border: solid 2px blue; 
		background: #dfd; 
		margin: 5px 0; 
		border-radius: 5px
	}

	.durasi_jawab{
		padding: 0 15px !important;
		font-size: 30px;
		text-align: center;
		color: red;
		font-family: 'consolas';
		background: linear-gradient(to right,#faa, white, #faa);
	}


	/* =========================================== */
	/* BLOK UPLOAD */
	/* =========================================== */

	#blok_upload_profil{
		display: grid;
		grid-template-columns: auto 100px;
		grid-gap: 10px;

	}

	.blok_inpu_profil{
		border: solid 1px #ccc;
		border-radius: 5px;
		padding: 5px;
	}

	#blok_contoh_profil{
		display: flex;
	}

	.foto_profil{
		width: 100px;
		height: 100px;
		object-fit: cover;
		border-radius: 50%;
		border: solid 3px white;
		box-shadow: 0px 0px 3px gray;
		transition: .2s;
		margin: 10px;
		opacity: 75%;
	}

	.foto_profil:hover{
		transform: scale(1.2);
		-webkit-filter: grayscale(0%);
		filter: grayscale(0%);
		opacity: 100%;
	}

	#blok_contoh_profil{
		border: solid 1px #ccc;
		padding: 15px;
		border-radius: 10px;
		/*display: none;*/
	}

	#lihat_contoh{
		color: #379FE0;
		cursor: pointer;
		transition: .2s;
	}

	#lihat_contoh:hover{
		margin-left: 5px;
		letter-spacing: 1px;
		color: blue;
	}

	.bg_abu, .bg_abu1{
		background: #ddd;
	}
	.bg_abu:hover, .bg_abu1:hover,{
		background: #dfd;
	}
	.bg_abu2{
		background: #eee;
	}
	.bg_abu2:hover{
		background: #efe;
	}


	.point_list{
		font-family: 'century gothic';
		font-size: 12pt;
		color: #479EFF;
		/*font-weight: bold;*/
	}

	.row_list_mk_sesi{
		padding: 10px 0;
	}

	.list_mk, .item_mk{
		font-family: 'century gothic';
		font-size: 12pt;
		color: #479EFF !important;
		background: #efe !important;
	}

	#manage_mk, #manage_mk_sesi{
		font-size: small;
	}

	.link_fitur{
		color: #379FE0;
		transition: .2s;
		cursor: pointer;
	}
	.link_fitur:hover{
		letter-spacing: 1px;
		margin: 0 3px;
		color: blue;
		text-transform: uppercase;
	}

	#list_sesi_kuliah,#list_sesi_kuliah button{
		font-size: small;
		font-family: 'century gothic';
	}
	
</style>
