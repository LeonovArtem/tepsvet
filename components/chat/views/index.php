<div class="box box-primary direct-chat direct-chat-primary">
    <div class="box-header with-border">
        <i class="fa fa-comments-o"></i>
        <h3 class="box-title">Чат</h3>

        <div class="box-tools pull-right">
            <!--            <span data-toggle="tooltip" title="" class="badge bg-light-blue" data-original-title="3 New Messages">3</span>-->
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="" data-widget="chat-pane-toggle"
                    data-original-title="Контакты">
                <i class="fa fa-comments"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <!-- Conversations are loaded here -->
        <div class="slimScrollDiv direct-chat-messages" style="height: 410px;">
            <div id="chat-box" class="box-body chat" style="overflow: hidden; width: auto; height: auto">
                <div class="direct-chat-msg">
                    <?= $data ?>
                </div>
            </div>
            <div class="slimScrollBar"
                 style="background: none repeat scroll 0% 0% rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 0px; z-index: 99; right: 1px; height: 187.126px;"></div>
            <div class="slimScrollRail"
                 style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 0px; background: none repeat scroll 0% 0% rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div>

        </div><!-- /.chat -->
        <!--/.direct-chat-messages-->

        <!-- Contacts are loaded here -->
        <div class="direct-chat-contacts" ">
            <ul class="contacts-list">

                <?php foreach ($users as $user): ?>
                    <li>
                        <a href="#">
                            <img class="contacts-list-img" src="<?= $user->img_profil ?>" alt="User Image">

                            <div class="contacts-list-info">
                            <span class="contacts-list-name">
                             <?= $user->username; ?>
                                <small class="label label-<?= $user->role == 1 ? 'danger' : 'success' ?> contacts-list-date pull-right">
                                    <?= $user->status->name; ?>
                                </small>
                            </span>
                                <span class="contacts-list-msg"></span>
                            </div>
                            <!-- /.contacts-list-info -->
                        </a>
                    </li>
                <?php endforeach; ?>
                <!-- End Contact Item -->
            </ul>
            <!-- /.contatcts-list -->
        </div>
        <!-- /.direct-chat-pane -->
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
        <div class="input-group">
            <input name="Chat[message]" id="chat_message" placeholder="текст сообщения..." class="form-control">
            <div class="input-group-btn">
                <button class="btn btn-primary btn-flat btn-send-comment" data-url="<?= $url; ?>"
                        data-model="<?= $userModel; ?>" data-userfield="<?= $userField; ?>"
                        data-loading="<?= $loading; ?>">Отправить
                </button>
            </div>
        </div>
    </div>
    <!-- /.box-footer-->
</div>
