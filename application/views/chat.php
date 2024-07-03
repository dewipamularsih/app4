<!-- BEGIN: Content -->
<div class="content">
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Chat</h2>
    </div>
    <div class="intro-y chat grid grid-cols-12 gap-5 mt-5">
        <!-- BEGIN: Chat Side Menu -->
        <div class="col-span-12 lg:col-span-4 xxl:col-span-3">
            <div class="tab-content">
                <div class="tab-pane active" role="tabpanel" aria-labelledby="chats-tab">
                    <!-- <div class="pr-1">
                        <div class="box px-5 pt-5 pb-5 lg:pb-0">
                            <div class="relative text-gray-700 dark:text-gray-300">
                                <input type="text" class="form-control py-3 px-4 border-transparent bg-gray-200 pr-10 placeholder-theme-8" placeholder="Search for messages or users...">
                                <i class="w-4 h-4 hidden sm:absolute my-auto inset-y-0 mr-3 right-0" data-feather="search"></i>
                            </div>
                        </div>
                    </div> -->
                    <div id="ChatMasuk" class="chat__chat-list overflow-y-auto scrollbar-hidden pr-1 pt-1">

                    </div>
                </div>
            </div>
        </div>
        <!-- END: Chat Side Menu -->
        <!-- BEGIN: Chat Content -->
        <div class="intro-y col-span-12 lg:col-span-8 xxl:col-span-9">
            <div class="chat__box box">
                <!-- BEGIN: Chat Active -->
                <div id="chat_active" class="flex hidden h-full flex-col">
                    <div class="flex flex-col border-b border-slate-200/60 px-5 py-4 dark:border-darkmode-400 sm:flex-row">
                        <?php if ($user_active !== null) : ?>
                            <div class="flex items-center">
                                <div class="image-fit relative h-10 w-10 flex-none sm:h-12 sm:w-12">
                                    <img class="rounded-full" src="<?= site_url('asset/') ?><?= $user_active->avatar ?>">
                                </div>
                                <div class="ml-3 mr-auto">

                                    <div class="text-base font-medium">
                                        <?= $user_active->nama_user ?>
                                    </div>
                                    <div class="text-xs text-slate-500 sm:text-sm">
                                        <?= $user_active->email ?>
                                    </div>

                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div id="letakpesan" class="scrollbar-hidden flex-1 overflow-y-scroll px-5 pt-5">

                    </div>
                    <div class="flex items-center border-t border-slate-200/60 pb-10 pt-4 dark:border-darkmode-400 sm:py-4">
                        <textarea rows="4" placeholder="Type your message..." class="type_msg disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&amp;[readonly]]:bg-slate-100 [&amp;[readonly]]:cursor-not-allowed [&amp;[readonly]]:dark:bg-darkmode-800/50 [&amp;[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm rounded-md placeholder:text-slate-400/90 focus:ring-primary focus:ring-opacity-20 focus:border-opacity-40 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&amp;:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10 h-[46px] resize-none border-transparent px-5 py-3 shadow-none focus:border-transparent focus:ring-0 dark:bg-darkmode-600"></textarea>

                        <button class="send_btn cursor-pointer mr-5 flex h-8 w-8 flex-none items-center justify-center rounded-full bg-primary text-white sm:h-10 sm:w-10">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="send" class="lucide lucide-send stroke-1.5 h-4 w-4">
                                <path d="m22 2-7 20-4-9-9-4Z"></path>
                                <path d="M22 2 11 13"></path>
                            </svg>
                        </button>
                    </div>
                </div>
                <!-- END: Chat Active -->
                <!-- BEGIN: Chat Default -->
                <div id="chat_close" class="h-full flex items-center">
                    <div class="mx-auto text-center">
                        <div class="w-16 h-16 flex-none image-fit rounded-full overflow-hidden mx-auto">
                            <img alt="Icewall Tailwind HTML Admin Template" src="<?= base_url('asset') ?>/user.png">
                        </div>
                        <div class="mt-3">
                            <div class="font-medium"><?= $this->session->userdata('nama_user') ?></div>
                            <div class="text-gray-600 mt-1">Please select a chat to start messaging.</div>
                        </div>
                    </div>
                </div>
                <!-- END: Chat Default -->
            </div>
        </div>
        <!-- END: Chat Content -->
    </div>
</div>
<!-- END: Content -->
<style>
    /* Updated CSS for Chat Container */
    .chat-container {
        width: 300px;
        position: fixed;
        bottom: 20px;
        right: 20px;
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
        z-index: 1000;
        /* Ensure it's above other content */
    }

    .chat-messages {
        max-height: 300px;
        overflow-y: auto;
        padding: 20px;
        background-color: #f9f9f9;
        border-bottom: 1px solid #ccc;
    }

    .chat-input {
        display: flex;
        padding: 10px;
        background-color: #fff;
        border-top: 1px solid #ccc;
    }

    .chat-input textarea {
        flex: 1;
        padding: 10px;
        border-radius: 20px;
        border: 1px solid #ccc;
        resize: none;
    }

    .chat-input button {
        margin-left: 10px;
        padding: 10px 20px;
        border: none;
        border-radius: 20px;
        background-color: #007bff;
        color: #fff;
        cursor: pointer;
        transition: background-color 0.3s ease;
        box-shadow: 0px 3px 10px rgba(0, 0, 0, 0.1);
    }

    .chat-input button:hover {
        background-color: #0056b3;
    }

    /* Added CSS for chat messages */
    .chat-message {
        margin-bottom: 10px;
        clear: both;
        overflow: hidden;
    }

    .chat-message.sent .message-content {
        background-color: #007bff;
        color: white;
        float: right;
    }

    .chat-message.received .message-content {
        background-color: #f0f0f0;
        color: #333;
        float: left;
    }

    .message-content {
        padding: 10px 15px;
        border-radius: 15px;
        max-width: 70%;
        word-wrap: break-word;
        box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
    }
</style>
</head>

<body>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            scrollToBottom()
            dataUser()

            function dataUser() {
                $.ajax({
                    type: "post",
                    url: "<?= site_url('chat/GetAllOrang') ?>",
                    dataType: "json",
                    success: function(r) {
                        var html = "";
                        var d = r.data;
                        d.forEach(d => {
                            html += `
						<div data-id=${d.id_user} class="coba intro-x cursor-pointer box relative flex items-center p-5 mb-5">
                                <div class="w-12 h-12 flex-none image-fit mr-1">
                                    <img alt="Icewall Tailwind HTML Admin Template" class="rounded-full" src="<?= site_url('asset/') ?>${d.avatar}">
                                    <div class="w-3 h-3 bg-theme-10 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                                </div>
                                <div class="ml-2 overflow-hidden">
                                    <div class="flex items-center">
                                        <a href="javascript:;" class="font-medium">${d.nama_user}</a>
                                        <div class="text-xs text-gray-500 ml-2"></div>
                                    </div>
                                    <div class="w-full truncate text-gray-600 mt-0.5">
                                       
                                    </div>
                                </div>
                                <div class="w-5 h-5 flex items-center justify-center absolute top-0 right-0 text-xs text-white rounded-full bg-theme-17 font-medium -mt-1 -mr-1">1</div>
                            </div>`;
                        });
                        $('#ChatMasuk').html(html);
                    }
                });
            }
            $('body').on('click', '.coba', function() {
                var id = $(this).attr('data-id');
                window.location.replace("<?= site_url('chat/') ?>" + id);

            });
            dataChat()

            function dataChat() {
                var id_balas = '<?= $id_balas ?>'
                var id_user = '<?= $this->session->userdata('id_user') ?>'
                $.ajax({
                    type: "post",
                    url: "<?= site_url('chat/loadChat') ?>",
                    data: {
                        id_user: id_user,
                        id_balas: id_balas,
                    },
                    dataType: "json",
                    success: function(r) {
                        var html = "";
                        var d = r.data;
                        id_user = <?= $this->session->userdata('id_user') ?>;
                        d.forEach(d => {
                            var today = new Date();
                            var dd = String(today.getDate()).padStart(2, '0');
                            var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                            var yyyy = today.getFullYear();
                            today = dd + '-' + mm + '-' + yyyy;
                            var times = new Date(d.waktu)
                            var time = times.toLocaleTimeString()
                            var tanggal = String(times.getDate()).padStart(2, '0');
                            var bulan = String(times.getMonth() + 1).padStart(2, '0');
                            var tahun = times.getFullYear()
                            var lengkapDB = tanggal + '-' + bulan + '-' + tahun
                            var kapan = "Today"
                            var tanggal_bulan = tanggal + "-" + bulan
                            if (lengkapDB != today) {
                                kapan = tanggal_bulan
                            }
                            var avatar = "user.png";
                            <?php if ($user_active !== null) : ?>
                                var avatar = '<?= $user_active->avatar ?>';
                            <?php endif; ?>
                            if (parseInt(d.id_user) == id_user) {
                                html +=
                                    `<div class="float-right mb-4 flex max-w-[90%] items-end sm:max-w-[49%]">
                            <div class="rounded-l-md rounded-t-md bg-primary px-4 py-3 text-white">
                                ${d.chat}
                                <div class="mt-1 text-xs text-white text-opacity-80">
                                    ${kapan} | ${time}
                                </div>
                            </div>
                            <div class="image-fit relative ml-5 hidden h-10 w-10 flex-none sm:block">
                                <img class="rounded-full" src="<?= site_url('asset/') ?>${avatar}">
                            </div>
                        </div>
                        <div class="clear-both"></div>`;
                            } else {
                                html +=
                                    ` <div class="float-left mb-4 flex max-w-[90%] items-end sm:max-w-[49%]">
                            <div class="image-fit relative mr-5 hidden h-10 w-10 flex-none sm:block">
                                <img class="rounded-full" src="<?= site_url('asset/') ?>${avatar}">
                            </div>
                            <div class="rounded-r-md rounded-t-md bg-slate-100 px-4 py-3 text-slate-500 dark:bg-darkmode-400">
                                ${d.chat}
                                <div class="mt-1 text-xs text-slate-500">
                                    ${kapan} | ${time}
                                </div>
                            </div>
                        </div>
                        <div class="clear-both"></div>`;
                            }
                        });
                        $('#letakpesan').html(html);
                        $('#chat_active').removeClass('hidden');
                        $('#chat_close').addClass('hidden');

                    }
                });
            }
            setInterval(() => {
                dataChat()
            }, 1000);
            $('.send_btn').click(function(e) {
			var pesan = $('.type_msg').val();
			var id_balas = '<?= $id_balas ?>'
            var id_user = '<?= $this->session->userdata('id_user') ?>'
			if (pesan != "") {
				$.ajax({
					type: "post",
                    url: "<?= site_url('chat/KirimPesan') ?>",
					data: {
						id_user,
						id_balas,
						pesan
					},
					dataType: "json",
					success: function(r) {
                        scrollToBottom()
						if (r.status) {
							$('.search_btn').trigger('click');
							$('.type_msg').val('');
							scrollToBottom()
						}
					}
				});
			}
		});
		
		function scrollToBottom() {
			$("#letakpesan").animate({
				scrollTop: 200000000000000000000000000000000
			}, "slow");
		}

        });
    </script>