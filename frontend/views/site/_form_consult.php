<div id="popupform1" class="popupform popupform1 frm1">
    <div class="feedback_form">
        <div class="feedback_form_lbl">
        <div class="feedback_form_lbl_wr">
            <h2><?= Yii::t('app', 'Консультация') ?></h2>
            <div class="feedback_form_txt"><?= Yii::t('app', 'Пожалуйста, заполните данные. Мы с вами свяжемся!') ?></div>
        </div>
        </div>
        <div class="feedback_form_wr">
                    
            <div class="start1">
            
                <div class="form-group">
                    <label for="exampleInputEmail1"><?= Yii::t('app', 'Имя') ?></label>
                    <input type="text" class="form-control required" name="consult-name"  placeholder="Имя">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1"><?= Yii::t('app', 'Телефон') ?></label>
                    <input type="text" class="form-control required poletelephon" name="consult-phone"  placeholder="Телефон">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1"><?= Yii::t('app', 'Вопрос') ?></label>
                    <textarea class="form-control required" name="consult-body"  placeholder="Вопрос"></textarea>
                </div> 

                <div class="form-group-desc"><?= Yii::t('app', '* нажимая кнопку «Отправить», я даю свое согласие на обработку моих персональных данных, в соответствии с Федеральным законом от 27.07.2006 года №152-ФЗ «О персональных данных»') ?></div>

                <div style="height:15px;"></div>

                <button type="submit" class="btn btn-primary post-consult"><?= Yii::t('app', 'Отправить') ?></button>   
            
            </div>
                        
            <div class="end1">
                <div><?= Yii::t('app', 'Спасибо, ваше сообщение принято.') ?></div>
            </div>
            <div class="msg-error hidden">
                <div>Ошибка.</div>
            </div>
        </div>
    </div>
</div>