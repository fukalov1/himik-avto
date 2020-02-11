<div class="footer_area ">
    <div class="container">
        <div class="row">
            <!--section title-->
            <div class=" col-sm-12 col-md-12 col-lg-12">
                <div class="section_title service_color">
                    <h2 class="title"><span>Наши контакты</span></h2>
                </div>
            </div>
            <!--end section title-->
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A6f5a8fed79d1b3ef6e25e473a5f5ef52a11ea9657a1e32094252d8d6bae7e2ea&amp;width=100%25&amp;height=400&amp;lang=ru_RU&amp;scroll=true"></script>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="single_address fix">
                    <div class="address_icon"><span><i class="fa fa-map-marker"></i></span></div>
                    <div class="address_text"><p><span>Address:</span> {{ $address }}</p></div>
                </div>
                <div class="single_address fix">
                    <div class="address_icon"><span><i class="fa fa-phone"></i></span></div>
                    <div class="address_text"><p><span>Phone:</span> {{ $phone }}</p></div>
                </div>
                <div class="single_address fix">
                    <div class="address_icon"><span><i class="fa fa-envelope-o"></i></span></div>
                    <div class="address_text"><p><span>Email: </span> {{ $email }}</p></div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                <form action="mail.php" method="post">
                    <div class="contract_us">
                        <div class="inputt input_change">
                            <span class="message_icon"><i class="fa fa-user"></i></span>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Ваше ФИО" required>
                        </div>
                        <div class="inputt input_change">
                            <span class="message_icon"><i class="fa fa-envelope-o"></i></span>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
                        </div>
                        <div class="inputt">
                            <span class="message_icon"><i class="fa fa-external-link"></i></span>
                            <textarea class="form-control" name="message"  rows="4" id="mes" placeholder="Сообщение"></textarea>
                        </div>
                        <div class="sunmite_button">
                            <button type="submit" name="ok">Отправить сообщение</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
<div class="footer_bottom_area" id="contact">
    <div class="container">
        <div class="row">
            <div class=" col-sm-12 col-md-12 col-lg-12">
                <div class="footer_text">
                    <p> © 2020 <a href="http://himik-avto.ru/">himik-avto.ru</a>. Все права защищены.</p>
                </div>
            </div>
        </div>
    </div>
</div>
